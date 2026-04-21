# Contributing to Basekit

This page is for developers who want to contribute to the Basekit package itself.

## Prerequisites

You will need the following tools installed locally:

- PHP 8.3+
- Composer
- Node.js & npm
- `tailwindcss` and PostCSS (installed via `npm install`)

## Setting Up the Package Locally

Clone the repository and install both PHP and Node dependencies:

```bash
git clone https://github.com/basekit-laravel/basekit-laravel-ui.git
cd basekit-laravel-ui
composer install
npm install
```

## Rebuilding the CSS

For package development, this is not automatic.

The package commits preprocessed CSS in `resources/css/dist/v1/`, and `basekit:ui:build` reads from that dist directory when assembling the final bundle. If you change source CSS under `resources/css/v1/`, you should regenerate the dist files before committing.

### 1. Build source CSS

Preprocesses the source CSS into `resources/css/dist/v1/` and writes minified copies:

```bash
npm run css:dist
```

### 2. Bundle for distribution

Builds the final package bundle from the preprocessed dist files:

```bash
npm run build:dist
```

Run both together:

```bash
npm run css:dist && npm run build:dist
```

If you only run `npm run build:dist`, it does not rebuild `resources/css/dist/v1/` first.

## Regenerating the Styleguide

The VitePress docs include a pre-rendered styleguide snapshot at `docs/public/styleguide.html`. After modifying component Blade views, regenerate it directly from the package:

```bash
composer styleguide
```

This runs `./vendor/bin/testbench basekit:ui:styleguide` using [Orchestra Testbench](https://packages.tools/testbench/). The generated file is committed to the repository and served statically by VitePress.

## Running Tests

```bash
composer test
```

Or with coverage:

```bash
composer test:coverage
```

## Code Style

The project uses Laravel Pint for PHP code style:

```bash
composer lint
```

## Submitting Changes

1. Fork the repository and create a feature branch
2. Make your changes and add tests where applicable
3. Run `npm run css:dist && npm run build:dist` if you modified any CSS
4. If you modified component Blade views, regenerate the styleguide snapshot:
   ```bash
   composer styleguide
   ```
5. Open a pull request against the `main` branch

## Next Steps

- [Installation Guide](/guide/installation) — set up the package in a host app for testing
- [Theming Guide](/guide/theming) — understand the CSS variable system
- [Component Reference](/components) — browse all available components
