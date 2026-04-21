<?php

namespace BasekitLaravel\BasekitLaravelUi;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use BasekitLaravel\BasekitLaravelUi\Commands\BasekitBuildCommand;
use BasekitLaravel\BasekitLaravelUi\Commands\BasekitMigrateThemeCommand;
use BasekitLaravel\BasekitLaravelUi\Commands\BasekitStyleguideCommand;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\Alert;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\EmptyState;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\Progress;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\Skeleton;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\Spinner;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\Toast;
use BasekitLaravel\BasekitLaravelUi\View\Components\Feedback\Tooltip;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Button;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Checkbox;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Input;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\MultiSelect;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Radio;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Select;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Textarea;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Toggle;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\Avatar;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\Badge;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\Card;
use BasekitLaravel\BasekitLaravelUi\View\Components\Layout\Container;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\DescriptionList;
use BasekitLaravel\BasekitLaravelUi\View\Components\Layout\Divider;
use BasekitLaravel\BasekitLaravelUi\View\Components\Layout\Grid;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\ListComponent;
use BasekitLaravel\BasekitLaravelUi\View\Components\Layout\Stack;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\Stat;
use BasekitLaravel\BasekitLaravelUi\View\Components\Display\Table;
use BasekitLaravel\BasekitLaravelUi\View\Components\Navigation\Breadcrumb;
use BasekitLaravel\BasekitLaravelUi\View\Components\Navigation\DropdownMenu;
use BasekitLaravel\BasekitLaravelUi\View\Components\Navigation\Link;
use BasekitLaravel\BasekitLaravelUi\View\Components\Navigation\Pagination;
use BasekitLaravel\BasekitLaravelUi\View\Components\Navigation\Tabs;
use BasekitLaravel\BasekitLaravelUi\View\Components\Dialog\Accordion;
use BasekitLaravel\BasekitLaravelUi\View\Components\Dialog\Modal;

class BasekitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/basekit-laravel-ui.php',
            'basekit-laravel-ui'
        );

        // Backward-compatible alias used by component prop resolvers.
        // Keeps `basekit.components.*` lookups working in all contexts
        // (including styleguide generation) without relaxing validation logic.
        $basekitConfig = config('basekit-laravel-ui');
        if (is_array($basekitConfig)) {
            config(['basekit' => $basekitConfig]);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPublishing();
        $this->registerCommands();

        $componentPrefix = $this->componentAliasPrefix();

        // Map anonymous package components (resources/views/components/*) to the configurable alias prefix.
        Blade::anonymousComponentNamespace('basekit::components', $componentPrefix);

        $this->registerComponents();

        Blade::component('basekit::components.styleguide-wrapper', 'styleguide-wrapper');
        Blade::component('basekit::components.styleguide-wrapper', "{$componentPrefix}::styleguide-wrapper");
    }

    /**
     * Register package publishing.
     */
    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish configuration
            $this->publishes([
                __DIR__.'/../config/basekit-laravel-ui.php' => config_path('basekit-laravel-ui.php'),
            ], 'basekit-laravel-ui-config');

            // Publish CSS theme (v1)
            $distPath = __DIR__.'/../resources/dist/v1';
            $cssPath = __DIR__.'/../resources/css';
            $publishSource = File::isDirectory($distPath) ? $distPath : $cssPath;

            $this->publishes([
                $publishSource => public_path('vendor/basekit-laravel/v1'),
            ], 'basekit-laravel-ui-css-v1');

            // Publish views (for direct customization)
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/basekit-laravel'),
            ], 'basekit-views');
        }

        // Load package views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'basekit');
    }

    /**
     * Register package commands.
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                BasekitBuildCommand::class,
                BasekitMigrateThemeCommand::class,
                BasekitStyleguideCommand::class,
            ]);
        }
    }

    /**
     * Register Blade components based on configuration.
     */
    protected function registerComponents(): void
    {
        $this->registerComponentIfEnabled('button', Button::class);
        $this->registerComponentIfEnabled('input', Input::class);
        $this->registerComponentIfEnabled('textarea', Textarea::class);
        $this->registerComponentIfEnabled('checkbox', Checkbox::class);
        $this->registerComponentIfEnabled('radio', Radio::class);
        $this->registerComponentIfEnabled('select', Select::class);
        $this->registerComponentIfEnabled('multi-select', MultiSelect::class);
        $this->registerComponentIfEnabled('toggle', Toggle::class);

        // Feedback Components
        $this->registerComponentIfEnabled('toast', Toast::class);
        $this->registerComponentIfEnabled('tooltip', Tooltip::class);
        $this->registerComponentIfEnabled('progress', Progress::class);
        $this->registerComponentIfEnabled('spinner', Spinner::class);
        $this->registerComponentIfEnabled('skeleton', Skeleton::class);
        $this->registerComponentIfEnabled('empty-state', EmptyState::class);

        // Navigation Components
        $this->registerComponentIfEnabled('breadcrumb', Breadcrumb::class);
        $this->registerComponentIfEnabled('pagination', Pagination::class);
        $this->registerComponentIfEnabled('tabs', Tabs::class);
        $this->registerComponentIfEnabled('dropdown-menu', DropdownMenu::class);
        $this->registerComponentIfEnabled('link', Link::class);

        // Layout Components
        $this->registerComponentIfEnabled('container', Container::class);
        $this->registerComponentIfEnabled('divider', Divider::class);
        $this->registerComponentIfEnabled('grid', Grid::class);
        $this->registerComponentIfEnabled('stack', Stack::class);

        // Display Components
        $this->registerComponentIfEnabled('avatar', Avatar::class);
        $this->registerComponentIfEnabled('badge', Badge::class);
        $this->registerComponentIfEnabled('card', Card::class);
        $this->registerComponentIfEnabled('description-list', DescriptionList::class);
        $this->registerComponentIfEnabled('list', ListComponent::class);
        $this->registerComponentIfEnabled('stat', Stat::class);
        $this->registerComponentIfEnabled('table', Table::class);

        // Feedback Components
        $this->registerComponentIfEnabled('alert', Alert::class);

        // Overlay Components
        $this->registerComponentIfEnabled('modal', Modal::class);
        $this->registerComponentIfEnabled('accordion', Accordion::class);
    }

    /**
     * Register a component if it is enabled in the configuration.
     */
    protected function registerComponentIfEnabled(string $name, string $class): void
    {
        if ((bool) config("basekit-laravel-ui.components.{$name}.enabled", true)) {
            Blade::component($class, "{$this->componentAliasPrefix()}::{$name}");
        }
    }

    protected function componentAliasPrefix(): string
    {
        return (string) config('basekit-laravel-ui.component_prefix', 'basekit-ui');
    }
}
