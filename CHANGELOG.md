# Changelog

All notable changes to `basekit-laravel-ui` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.8.1...v2.0.0) (2026-08-18)


### ⚠ BREAKING CHANGES

* **ui:** remove deprecated APIs and apply breaking changes

### Features

* **a11y:** comprehensive accessibility audit and copy button fix ([de5c4a3](https://github.com/basekit-laravel/basekit-laravel-ui/commit/de5c4a3b048d78484f02dd6c7540f7c29a7b1070))
* **styleguide:** redesign with preview/code toggle, search filtering, collapsible sections ([1bd1237](https://github.com/basekit-laravel/basekit-laravel-ui/commit/1bd123701f0a3984d9c2f5bd9d1fd00f53b285d6))
* **ui:** remove deprecated APIs and apply breaking changes ([ea1e904](https://github.com/basekit-laravel/basekit-laravel-ui/commit/ea1e904a894968e454f843021aed7f6f4ba45014))


### Bug Fixes

* correct CSS dist publish path in BasekitServiceProvider ([062ac07](https://github.com/basekit-laravel/basekit-laravel-ui/commit/062ac075b912877976eb7ce94f28965eb928cf2d))
* **navigation:** add Escape key handler to dropdown menu ([aa6d611](https://github.com/basekit-laravel/basekit-laravel-ui/commit/aa6d611829b0fa498ebba2f4830d5009bc120e9f))
* resolve ChromeDriver dynamically instead of using Dusk-bundled binary ([41042ca](https://github.com/basekit-laravel/basekit-laravel-ui/commit/41042caabbf075a8a6868451cb818020e39a0ff7))
* **ui:** improve component API consistency ([3b6de7a](https://github.com/basekit-laravel/basekit-laravel-ui/commit/3b6de7a42bb9045d0ffa283c782561c168f8c590))

## [1.8.1](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.8.0...v1.8.1) (2026-08-16)


### Bug Fixes

* **feedback:** remove bottom margin on title-only alert and toast ([7dccf45](https://github.com/basekit-laravel/basekit-laravel-ui/commit/7dccf4575a3401894fb502269bf75eb50ded211f))

## [1.8.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.7.3...v1.8.0) (2026-08-15)


### Features

* **form:** add fieldset group component and border-only color shortcuts ([defb74d](https://github.com/basekit-laravel/basekit-laravel-ui/commit/defb74d52234e1a9485675b1f8598ab5e0d34d9f))

## [1.7.3](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.7.2...v1.7.3) (2026-08-15)


### Bug Fixes

* **form:** reserve message slot to prevent validation layout shift ([1fa8686](https://github.com/basekit-laravel/basekit-laravel-ui/commit/1fa86867b23850efea3ee6ac68d73aa31d767d91))

## [1.7.2](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.7.1...v1.7.2) (2026-08-14)


### Miscellaneous Chores

* restore package-lock.json for ci ([5562685](https://github.com/basekit-laravel/basekit-laravel-ui/commit/556268516b9c632bb7615515e53cc868761df63b))
* stop tracking package-lock.json ([c522101](https://github.com/basekit-laravel/basekit-laravel-ui/commit/c52210199bfdf372098dfec6814d1487a7c0cd0d))

## [1.7.1](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.7.0...v1.7.1) (2026-08-14)


### Bug Fixes

* **form:** keep input error border on hover/focus ([cc93487](https://github.com/basekit-laravel/basekit-laravel-ui/commit/cc9348732ef7f1e2933dd47a50a1f3a868d9fe4b))

## [1.7.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.7...v1.7.0) (2026-08-13)


### Features

* **theme:** add reusable seo and theme-variables components ([974cc4c](https://github.com/basekit-laravel/basekit-laravel-ui/commit/974cc4c44ddd0a51236f389c63200cccc9891a58))
* **ui:** add reusable copy-button component ([7ed0e95](https://github.com/basekit-laravel/basekit-laravel-ui/commit/7ed0e9596a7396f643ddc0e042069b4a74096783))


### Bug Fixes

* **form:** treat empty error strings as no error state ([3a47c02](https://github.com/basekit-laravel/basekit-laravel-ui/commit/3a47c0288c5b2d63632ea6463e62889dcd86be2a))

## [1.7.0] - 2026-08-13

### Features

* add `copy-button` component — copies a value to the clipboard via `navigator.clipboard` with transient "copied" feedback; value is passed through a `data-*` attribute (no inline JS interpolation)

## [1.6.7](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.6...v1.6.7) (2026-08-04)


### Bug Fixes

* styleguide generation ([137553d](https://github.com/basekit-laravel/basekit-laravel-ui/commit/137553d6005c508a9702a7a4c646f6a8864b7b35))

## [1.6.6](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.5...v1.6.6) (2026-08-03)


### Bug Fixes

* **form:** button secondary border ([4b68266](https://github.com/basekit-laravel/basekit-laravel-ui/commit/4b682666e83dc233edeeac5f1a8ac5e55d4adf8e))
* php version in CI.yml ([3dd21a7](https://github.com/basekit-laravel/basekit-laravel-ui/commit/3dd21a73529803cfb1a252d3f66699d63a80f104))


### Miscellaneous Chores

* Stop tracking composer.lock ([34aa80e](https://github.com/basekit-laravel/basekit-laravel-ui/commit/34aa80e53fc8ccd445d6419ccb23671444b7775d))
* update php packages ([4f4bda7](https://github.com/basekit-laravel/basekit-laravel-ui/commit/4f4bda79d59538449e54c4c37b363dd515a07eb2))

## [1.6.5](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.4...v1.6.5) (2026-08-01)


### Bug Fixes

* button & input css issues ([3f667ef](https://github.com/basekit-laravel/basekit-laravel-ui/commit/3f667efc7a3f8989b62001f04068783c38f23b2b))


### Miscellaneous Chores

* update blade-heroicons 2.0 =&gt; 2.7, update pest to v4 =&gt; v5 ([c14607e](https://github.com/basekit-laravel/basekit-laravel-ui/commit/c14607ea50c6e757c73f1680d2eb799884335fe1))

## [1.6.4](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.3...v1.6.4) (2026-07-26)


### Bug Fixes

* card, select, navigation and link components css ([5275bd2](https://github.com/basekit-laravel/basekit-laravel-ui/commit/5275bd25d052b3915424b1c4e614d84f156785a1))


### Miscellaneous Chores

* **deps-dev:** bump phpstan/phpstan-strict-rules from 2.0.11 to 2.0.12 ([ecbdbb5](https://github.com/basekit-laravel/basekit-laravel-ui/commit/ecbdbb556ce84a3ad5d8cbb44883689171035962))
* **deps-dev:** bump phpstan/phpstan-strict-rules from 2.0.11 to 2.0.12 ([5708b0d](https://github.com/basekit-laravel/basekit-laravel-ui/commit/5708b0d7c58a8ba7390d37eb18ae3b62bb54ec29))

## [1.6.3](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.2...v1.6.3) (2026-07-21)


### Bug Fixes

* dark mode issues ([72f23b1](https://github.com/basekit-laravel/basekit-laravel-ui/commit/72f23b149b8f4b89afa2ea66928317b538025924))
* **navigation:** responsive pagination ([d1be4a0](https://github.com/basekit-laravel/basekit-laravel-ui/commit/d1be4a08add2fc50d6cae4269c67028d3e9fc28b))

## [1.6.2](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.1...v1.6.2) (2026-07-19)


### Bug Fixes

* **form:** checkbox margin adjustment ([8981d86](https://github.com/basekit-laravel/basekit-laravel-ui/commit/8981d86b6265d743ec8dc050c40de8087be0b126))

## [1.6.1](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.6.0...v1.6.1) (2026-07-19)


### Miscellaneous Chores

* **deps-dev:** bump rector/rector from 2.5.4 to 2.5.7 ([#33](https://github.com/basekit-laravel/basekit-laravel-ui/issues/33)) ([1efb0c9](https://github.com/basekit-laravel/basekit-laravel-ui/commit/1efb0c959a89a2c436f299712f4d21195059020e))

## [1.6.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.5.1...v1.6.0) (2026-07-11)


### Features

* add dark mode overrides ([283ab01](https://github.com/basekit-laravel/basekit-laravel-ui/commit/283ab0102db28df66d21c67b20d5a04e1ceacad1))

## [1.5.1](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.5.0...v1.5.1) (2026-07-08)


### Miscellaneous Chores

* **deps-dev:** bump pestphp/pest from 4.7.4 to 4.7.5 ([#27](https://github.com/basekit-laravel/basekit-laravel-ui/issues/27)) ([78a6dcf](https://github.com/basekit-laravel/basekit-laravel-ui/commit/78a6dcfd6130612ac2bf2d2879b5d897d8b5be1e))
* **deps-dev:** bump phpstan/phpstan from 2.2.4 to 2.2.5 ([#29](https://github.com/basekit-laravel/basekit-laravel-ui/issues/29)) ([4a16b36](https://github.com/basekit-laravel/basekit-laravel-ui/commit/4a16b36a4923ea317d9b8b414492cebf8138d9b8))
* **deps-dev:** bump rector/rector from 2.5.2 to 2.5.4 ([#28](https://github.com/basekit-laravel/basekit-laravel-ui/issues/28)) ([69beac8](https://github.com/basekit-laravel/basekit-laravel-ui/commit/69beac8ed127f032f4012123e2715dc493db6052))

## [1.5.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.4.1...v1.5.0) (2026-07-08)


### Features

* customizable colors for components ([6cdf4fe](https://github.com/basekit-laravel/basekit-laravel-ui/commit/6cdf4feb04787e11716bf854e3420c9521cdab5f))

## [1.4.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.3.0...v1.4.0) (2026-07-03)


### Features

* add 'as' and 'href' prop to button component ([a9bc569](https://github.com/basekit-laravel/basekit-laravel-ui/commit/a9bc569563cf7da4d016e300d81a6d70a037825f))

## [1.3.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.2.4...v1.3.0) (2026-07-03)


### Features

* add rounded prop to Button component ([97f376d](https://github.com/basekit-laravel/basekit-laravel-ui/commit/97f376d98df3a8591a5ce48ca5ba7dbe942c4832))

## [1.2.4](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.2.3...v1.2.4) (2026-07-03)


### Miscellaneous Chores

* **deps-dev:** bump laravel/pint from 1.29.1 to 1.29.3 ([#20](https://github.com/basekit-laravel/basekit-laravel-ui/issues/20)) ([b1bc13d](https://github.com/basekit-laravel/basekit-laravel-ui/commit/b1bc13d5be00402cfcb650f3d14ecc0d911ef8c8))
* **deps-dev:** bump pestphp/pest from 4.7.0 to 4.7.4 ([#23](https://github.com/basekit-laravel/basekit-laravel-ui/issues/23)) ([8987aaa](https://github.com/basekit-laravel/basekit-laravel-ui/commit/8987aaaafce3b53818eccd70a0387f7c86dc8916))
* **deps-dev:** bump phpstan/phpstan from 2.2.2 to 2.2.4 ([#22](https://github.com/basekit-laravel/basekit-laravel-ui/issues/22)) ([14b4031](https://github.com/basekit-laravel/basekit-laravel-ui/commit/14b4031eb057a06aa7418cef2eb8f428b033e15c))
* **deps-dev:** bump rector/rector from 2.4.5 to 2.5.2 ([#21](https://github.com/basekit-laravel/basekit-laravel-ui/issues/21)) ([18f1d22](https://github.com/basekit-laravel/basekit-laravel-ui/commit/18f1d22423f4f7ba96251f1b3aad447fc22a0687))

## [1.2.3](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.2.2...v1.2.3) (2026-05-29)

### Bug Fixes

- **display:** card bordered footer ([8613982](https://github.com/basekit-laravel/basekit-laravel-ui/commit/86139829d76b5eff3849b8e0c9fe66089b4dd6c4))

### Miscellaneous Chores

- fix code quality issues ([79e03e7](https://github.com/basekit-laravel/basekit-laravel-ui/commit/79e03e7b4fcc59d13d463c8b248ce98774aa595b))
- **deps-dev:** bump phpstan/phpstan from 2.1.54 to 2.1.56 ([#15](https://github.com/basekit-laravel/basekit-laravel-ui/issues/15)) ([26248fd](https://github.com/basekit-laravel/basekit-laravel-ui/commit/26248fd8b68e42ba4f4dd6fb086debee85a3c7b1))
- **deps-dev:** bump rector/rector from 2.4.3 to 2.4.5 ([#14](https://github.com/basekit-laravel/basekit-laravel-ui/issues/14)) ([56efb0f](https://github.com/basekit-laravel/basekit-laravel-ui/commit/56efb0f06bfa3339cde6c820e0be2b4182491816))

## [1.2.2](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.2.1...v1.2.2) (2026-05-17)

### Miscellaneous Chores

- **deps-dev:** bump pestphp/pest from 4.6.3 to 4.7.0 ([#9](https://github.com/basekit-laravel/basekit-laravel-ui/issues/9)) ([61950e2](https://github.com/basekit-laravel/basekit-laravel-ui/commit/61950e2908117f44e99c8dbd2a41c8a104687710))
- **deps-dev:** bump phpstan/phpstan-strict-rules from 2.0.10 to 2.0.11 ([#10](https://github.com/basekit-laravel/basekit-laravel-ui/issues/10)) ([f08af5c](https://github.com/basekit-laravel/basekit-laravel-ui/commit/f08af5cee5d86702387fbcad387b39d3af86169b))
- **deps-dev:** bump rector/rector from 2.4.2 to 2.4.3 ([#11](https://github.com/basekit-laravel/basekit-laravel-ui/issues/11)) ([3bdf3ab](https://github.com/basekit-laravel/basekit-laravel-ui/commit/3bdf3ab04105a090a9eb3dc78844987e8aebd148))

## [1.2.1](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.2.0...v1.2.1) (2026-04-29)

### Miscellaneous Chores

- **deps-dev:** bump phpstan/phpstan from 2.1.51 to 2.1.54 ([#7](https://github.com/basekit-laravel/basekit-laravel-ui/issues/7)) ([16755e5](https://github.com/basekit-laravel/basekit-laravel-ui/commit/16755e50d59d8d39bdd64eefc39165c1c7471ca4))

## [1.2.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.1.0...v1.2.0) (2026-04-29)

### Features

- add dependabot ([0abca85](https://github.com/basekit-laravel/basekit-laravel-ui/commit/0abca85663c262a639b201a82a37d5dc52312b99))

### Bug Fixes

- StyleguideCommand phpstan errors ([cb8c0f9](https://github.com/basekit-laravel/basekit-laravel-ui/commit/cb8c0f9a9b073f93982728c7a831d4c77f0c7323))

### Miscellaneous Chores

- format BasekitStyleguideCommand.php ([cbd9eec](https://github.com/basekit-laravel/basekit-laravel-ui/commit/cbd9eec2ea6c0b6e434529a254b7dfe64b9c38bb))

## [1.1.0](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.0.1...v1.1.0) (2026-04-26)

### Features

- add advanced-demo.html ([59aca8e](https://github.com/basekit-laravel/basekit-laravel-ui/commit/59aca8e2e1a10f1c7ceeec506cffec2e85229543))

### Bug Fixes

- container component's css ([59aca8e](https://github.com/basekit-laravel/basekit-laravel-ui/commit/59aca8e2e1a10f1c7ceeec506cffec2e85229543))

### Miscellaneous Chores

- remove unnecessary files ([59aca8e](https://github.com/basekit-laravel/basekit-laravel-ui/commit/59aca8e2e1a10f1c7ceeec506cffec2e85229543))

## [1.0.1](https://github.com/basekit-laravel/basekit-laravel-ui/compare/v1.0.0...v1.0.1) (2026-04-22)

### Bug Fixes

- doc logo ([e751963](https://github.com/basekit-laravel/basekit-laravel-ui/commit/e75196395a9bfe5e3380a639318f7d0d63a6010b))
- release-please workflow ([d72f954](https://github.com/basekit-laravel/basekit-laravel-ui/commit/d72f954616a5e777ccf4dc176593f3f4109d4f45))

## [1.0.0] - 2026-04-22

### 🚀 Features

- Initial release of basekit-laravel-ui
  [v1.0.0]: https://github.com/basekit-laravel/basekit-laravel-ui/releases/tag/v1.0.0
