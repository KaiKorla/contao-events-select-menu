# Changelog

All notable changes to this project will be documented in this file.

The format is based on Keep a Changelog (<https://keepachangelog.com/en/1.1.0/>)
and this project adheres to Semantic Versioning.

## [Unreleased]

## [1.0.0] - 2025-12-08

### Added

- New form field type: `FormEventSelect` — a Contao form select field that provides events as options.
- `EventOptions` service — provides a list of event options for the select field.
- `ContaoEventFormOptions` — integration/helper class for configuring and exposing event options.
- `ContaoManagerPlugin` — integration for the Contao Manager enabling easy installation and activation.
- Initial service configuration in `Resources/config/services.yaml`.
- DCA definitions and Contao configuration under `contao/config/` and `dca/` to register the new field type.
- Translations for German (`de`) and English (`en`) backend labels.

### Changed

- (Initial release) — no changes from previous versions.

### Fixed

- (Initial release) — no bug fixes in this release.

### Security

- (Initial release) — no security-related changes in this release.

### Links

- `[Unreleased]: https://github.com/<OWNER>/<REPO>/compare/v1.0.0...HEAD`
- `[1.0.0]: https://github.com/<OWNER>/<REPO>/releases/tag/v1.0.0`
