# AGENTS.md

## What this is

A Laravel **package** (`basekit-laravel/basekit-laravel-ui`), not a full app.  
35 Blade components + Tailwind 4 CSS + Alpine.js, for Laravel 12/13, PHP 8.3+.

Run commands with `composer <script>` or `./vendor/bin/...` — there is no `artisan` unless using `testbench`.

## Commands

| Action | Command |
|--------|---------|
| All tests | `composer test` (alias: `pest`) |
| Single test | `./vendor/bin/pest tests/Feature/SomeTest.php` |
| Lint (check) | `composer lint:check` (Pint `--test`) |
| Lint (fix) | `composer lint` |
| Static analysis | `composer analyze` (PHPStan level 8) |
| Full quality gate | `composer quality` (runs lint:check → analyze → test sequentially) |
| Rector (DRY run) | `composer rector:check` |
| Build CSS | `./vendor/bin/testbench basekit:ui:build` or `npm run build:dist` |
| Build CSS (watch) | `./vendor/bin/testbench basekit:ui:build --watch` |
| PostCSS + minify | `npm run css:dist` (generates `resources/css/dist/v1/`) |
| Styleguide snapshot | `composer styleguide` or `./vendor/bin/testbench basekit:ui:styleguide` |
| Docs dev server | `npm run docs:dev` (VitePress) |
| Docs build | `npm run docs:build` |

## Testing quirks

- Uses **Pest + Orchestra Testbench** with `Blade::render()` — no HTTP tests.
- Cache driver **must** be `'array'` for tests (set in `TestCase::setUp()` and `testbench.yaml`).
- The List component class is `ListComponent` (not `List`) to avoid the PHP reserved word.
- CI runs: `lint:check → analyze → test [--no-coverage] → build → styleguide → advanced-demo → verify-doc-token-sync`.
- The `verify-doc-token-sync.sh` script checks that `--surface-base` CSS tokens in theme.css match docs.

## Architecture notes

- All 35 components use the `<x-basekit-ui::...>` prefix, regardless of internal category.
- `src/View/Components/Support/ComponentPropResolver` centralizes all size/variant/orientation resolution.
- Enums implement `DefaultBackedEnum` interface (contract: `public static function default(): self`).
- **Config quirk**: `mergeConfigFrom()` is shallow. `BasekitBuildCommand::resolveComponentConfig()` deep-merges user config with package defaults so partial overrides don't lose nested keys.
- **Backward-compat alias**: ServiceProvider copies `basekit-laravel-ui.*` config → `basekit.*` so prop resolvers can use `basekit.components.*` keys.
- CSS uses BEM with `bk-` prefix. Build concatenates pre-built dist files (`resources/css/dist/v1/`) and resolves `@custom-media --bk-*` → standard `@media (min-width: ...)` — it does NOT run PostCSS.
- **Alert is registered after Display components** in `BasekitServiceProvider.php:176` (out of category order).

## Style / lint

- Pint uses `laravel` preset with `single_quote: true`.
- PHPStan at **level 8** on `src/`.
- Rector applies PHP 8.3, code quality, dead code, early return, type declaration sets.
- Conventional commits required (enforced by `cliff.toml`). Changelog generated via `git-cliff`.
- Release flow: Release Please (googleapis) on push to master → merge master into develop.

## CSS build pipeline

```
npm run css:dist          # PostCSS-import + nesting + preset-env + autoprefixer → resources/css/dist/v1/
testbench basekit:ui:build # Concatenates dist files for enabled components → public/vendor/basekit-laravel/v1/basekit-ui.css
```

For minification, set `POSTCSS_MINIFY=true` or use the `minify-dist.js` tool.
