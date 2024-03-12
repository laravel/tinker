# Release Notes

## [Unreleased](https://github.com/laravel/tinker/compare/v2.9.0...master)

## [v2.9.0](https://github.com/laravel/tinker/compare/v2.8.2...v2.9.0) - 2024-01-04

* Update PsySH dependency to v0.12 by [@bobthecow](https://github.com/bobthecow) in https://github.com/laravel/tinker/pull/170
* [2.x] Merging develop by [@nunomaduro](https://github.com/nunomaduro) in https://github.com/laravel/tinker/pull/171

## [v2.8.2](https://github.com/laravel/tinker/compare/v2.8.1...v2.8.2) - 2023-08-15

- [2.x] Adds type checking by [@nunomaduro](https://github.com/nunomaduro) in https://github.com/laravel/tinker/pull/160
- [2.x] Remove unused `orchestra/testbench` deps by [@crynobone](https://github.com/crynobone) in https://github.com/laravel/tinker/pull/166

## [v2.8.1](https://github.com/laravel/tinker/compare/v2.8.0...v2.8.1) - 2023-02-15

- Cast ProcessResult objects by @mpociot in https://github.com/laravel/tinker/pull/159

## [v2.8.0](https://github.com/laravel/tinker/compare/v2.7.3...v2.8.0) - 2023-01-10

### Added

- Laravel v10 support

## [v2.7.3](https://github.com/laravel/tinker/compare/v2.7.2...v2.7.3) - 2022-11-09

### Changed

- Set raw output when using `--execute` by @innocenzi in https://github.com/laravel/tinker/pull/155

## [v2.7.2](https://github.com/laravel/tinker/compare/v2.7.1...v2.7.2) - 2022-03-23

### Fixed

- Add Laravel app instance to command by @driesvints in https://github.com/laravel/tinker/pull/146

## [v2.7.1](https://github.com/laravel/tinker/compare/v2.7.0...v2.7.1) - 2022-03-15

### Fixed

- Fix command resolving by @driesvints in https://github.com/laravel/tinker/pull/144 and https://github.com/laravel/tinker/commit/1e2d500585a4e546346fadd3adc6f9c1a97e15f4

## [v2.7.0 (2022-01-12)](https://github.com/laravel/tinker/compare/v2.6.3...v2.7.0)

### Changed

- Laravel 9 and psych v0.11.x support ([#139](https://github.com/laravel/tinker/pull/139))

## [v2.6.3 (2021-12-07)](https://github.com/laravel/tinker/compare/v2.6.2...v2.6.3)

### Changed

- Add `migrate:install` to whitelisted commands ([#137](https://github.com/laravel/tinker/pull/137))

## [v2.6.2 (2021-09-28)](https://github.com/laravel/tinker/compare/v2.6.1...v2.6.2)

### Added

- Added custom caster support ([#133](https://github.com/laravel/tinker/pull/133))

## [v2.6.1 (2021-03-02)](https://github.com/laravel/tinker/compare/v2.6.0...v2.6.1)

### Fixed

- Display hidden/appended attributes for models ([#123](https://github.com/laravel/tinker/pull/123))

## [v2.6.0 (2021-01-26)](https://github.com/laravel/tinker/compare/v2.5.0...v2.6.0)

### Added

- Add Stringable caster ([#121](https://github.com/laravel/tinker/pull/121))

## [v2.5.0 (2020-10-29)](https://github.com/laravel/tinker/compare/v2.4.2...v2.5.0)

### Added

- PHP 8 Support ([#116](https://github.com/laravel/tinker/pull/116))

## [v2.4.2 (2020-08-11)](https://github.com/laravel/tinker/compare/v2.4.1...v2.4.2)

### Fixed

- Fix missing output while using execute option ([#109](https://github.com/laravel/tinker/pull/109))

## [v2.4.1 (2020-07-07)](https://github.com/laravel/tinker/compare/v2.4.0...v2.4.1)

### Fixed

- Fixed execute not unregistering loader and exit code ([#100](https://github.com/laravel/tinker/pull/100))

## [v2.4.0 (2020-04-07)](https://github.com/laravel/tinker/compare/v2.3.0...v2.4.0)

### Changed

- Forward input options to psysh ([#98](https://github.com/laravel/tinker/pull/98))

## [v2.3.0 (2020-03-17)](https://github.com/laravel/tinker/compare/v2.2.0...v2.3.0)

### Added

- Allow Laravel 8 ([#90](https://github.com/laravel/tinker/pull/90))
- Allow psy/psysh 0.10 ([#95](https://github.com/laravel/tinker/pull/95))

## [v2.2.0 (2020-02-05)](https://github.com/laravel/tinker/compare/v2.1.0...v2.2.0)

### Added

- Support vendor class aliasing ([#88](https://github.com/laravel/tinker/pull/88))
- Add `--execute` option to console command ([#89](https://github.com/laravel/tinker/pull/89))

## [v2.1.0 (2020-01-14)](https://github.com/laravel/tinker/compare/v2.0.0...v2.1.0)

### Added

- Add `HtmlString` caster ([#87](https://github.com/laravel/tinker/pull/87))

## [v2.0.0 (2019-11-26)](https://github.com/laravel/tinker/compare/v1.0.10...v2.0.0)

### Added

- Allow Laravel 7 ([#74](https://github.com/laravel/tinker/pull/74))

### Changed

- Require PHP 7.2 as the new minimum version ([8d6104c](https://github.com/laravel/tinker/commit/8d6104cf50695e3f256d0389626c692e144d946b))
- Allow Symfony 5 ([49982fd](https://github.com/laravel/tinker/commit/49982fd563035025998efe7f32d005bc6da2ce0a))
- Laravel now only check for `DeferrableProvider` ([#81](https://github.com/laravel/tinker/pull/81))

### Removed

- Drop support for old Psysh versions ([a05922f](https://github.com/laravel/tinker/commit/a05922fa3b959d92efd16defe8e30a9895a69727))
- Drop Symfony 3.x support ([7175b49](https://github.com/laravel/tinker/commit/7175b4931917d507989cda2c753113f71aa18816))
- Drop support for Laravel 5.x ([4f3e609](https://github.com/laravel/tinker/commit/4f3e6098dff7ec4c0eedc5348184838598bc30c8))

## v1.0.0 (2016-12-30)

Initial commit.
