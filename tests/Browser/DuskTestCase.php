<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use BasekitLaravel\BasekitLaravelUi\Tests\TestCase;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Concerns\ProvidesBrowser;
use Laravel\Dusk\Chrome\SupportsChrome;
use Symfony\Component\Process\Process;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

/**
 * Base DuskTestCase for browser testing the package.
 *
 * Extends the package's Orchestra Testbench TestCase and composes
 * in Dusk's browser and Chrome traits.  Starts an HTTP server and
 * ChromeDriver in setUpBeforeClass so that every test in the class
 * shares the same server lifecycle.
 */
abstract class DuskTestCase extends TestCase
{
    use ProvidesBrowser;
    use SupportsChrome;

    /**
     * The background HTTP server process.
     */
    protected static ?Process $serverProcess = null;

    /**
     * Base URL of the test HTTP server.
     */
    protected static string $duskBaseUrl = 'http://localhost:9615';

    /**
     * Start ChromeDriver and the HTTP server before any test runs.
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        static::useChromedriver(
            realpath(__DIR__.'/../../vendor/laravel/dusk/bin/chromedriver-linux')
        );

        static::startChromeDriver(['--port=9515']);
        static::startServer();
    }

    /**
     * Stop ChromeDriver and the HTTP server after all tests complete.
     */
    public static function tearDownAfterClass(): void
    {
        static::closeAll();
        static::stopServer();
        static::stopChromeDriver();
        parent::tearDownAfterClass();
    }

    /**
     * Configure the Dusk browser base URL and storage paths.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Browser::$baseUrl = static::$duskBaseUrl;
        Browser::$storeScreenshotsAt = __DIR__.'/screenshots';
        Browser::$storeConsoleLogAt = __DIR__.'/console';
        Browser::$storeSourceAt = __DIR__.'/source';
    }

    /**
     * Create a new Browser instance.
     */
    protected function newBrowser($driver)
    {
        return new BasekitBrowser($driver);
    }

    /**
     * Override the default driver to use our chromedriver.
     */
    protected function driver()
    {
        $options = [
            '--headless',
            '--no-sandbox',
            '--disable-gpu',
            '--disable-dev-shm-usage',
            '--window-size=1280,1024',
        ];

        $chromeOptions = new ChromeOptions();
        $chromeOptions->addArguments($options);

        $chromePath = static::resolveChromeBinary();

        if ($chromePath) {
            $chromeOptions->setBinary($chromePath);
        }

        $capabilities = DesiredCapabilities::chrome()
            ->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            $capabilities
        );
    }

    /**
     * Resolve the Chrome binary path from known locations.
     */
    protected static function resolveChromeBinary(): ?string
    {
        // 1. Explicit env var
        $env = $_ENV['DUSK_CHROME_BINARY']
            ?? $_SERVER['DUSK_CHROME_BINARY']
            ?? getenv('DUSK_CHROME_BINARY');

        if ($env && is_executable($env)) {
            return $env;
        }

        // 2. Project-local Chrome for Testing (tests/Browser/bin/chrome/linux-*/chrome-linux64/chrome)
        $binDir = __DIR__.'/bin/chrome';
        if (is_dir($binDir)) {
            $found = glob($binDir.'/linux-*/chrome-linux64/chrome');
            if ($found && is_executable($found[0])) {
                return $found[0];
            }
        }

        // 3. System Chrome / Chromium
        $candidates = [
            'google-chrome-stable',
            'google-chrome',
            'chromium-browser',
            'chromium',
        ];

        foreach ($candidates as $candidate) {
            $path = trim((string) shell_exec("which {$candidate} 2>/dev/null"));
            if ($path !== '' && is_executable($path)) {
                return $path;
            }
        }

        return null;
    }

    /**
     * The base URL the browser navigates to.
     */
    protected function baseUrl(): string
    {
        return static::$duskBaseUrl;
    }

    /**
     * Start the PHP built-in HTTP server.
     */
    protected static function startServer(): void
    {
        $url = parse_url(static::$duskBaseUrl);
        $host = $url['host'] ?? 'localhost';
        $port = $url['port'] ?? 9615;

        $publicPath = realpath(__DIR__.'/../../vendor/orchestra/testbench-core/laravel/public');

        static::$serverProcess = Process::fromShellCommandline(sprintf(
            'php -S %s:%d -t %s %s/server.php 2>&1',
            $host,
            $port,
            $publicPath,
            dirname($publicPath),
        ));

        static::$serverProcess->start();

        static::waitForServer(static::$duskBaseUrl, 30);
    }

    /**
     * Stop the HTTP server process.
     */
    protected static function stopServer(): void
    {
        if (static::$serverProcess && static::$serverProcess->isRunning()) {
            static::$serverProcess->stop(5);
        }
    }

    /**
     * Poll the server until it responds or times out.
     */
    protected static function waitForServer(string $url, int $timeoutSeconds = 10): void
    {
        $deadline = time() + $timeoutSeconds;

        while (time() < $deadline) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 1,
                CURLOPT_CONNECTTIMEOUT => 1,
                CURLOPT_NOBODY => true,
            ]);
            curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($code > 0) {
                return;
            }

            usleep(200_000); // 200ms
        }

        throw new \RuntimeException("HTTP server did not start within {$timeoutSeconds}s at {$url}");
    }
}
