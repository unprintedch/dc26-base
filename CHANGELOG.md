# Changelog — dc26-base

Semver. A child theme declares the minimum base version it needs (`DC26_BASE_MIN`).
Per-site pinning is done with git tags (see CLAUDE.md, rule 5).

## 1.1.0 — 2026-10-22
First tagged release. Code state of 2026-10-21 + Success color preset.

### Added
- Custom mobile nav system: `dc26/nav`, `dc26/nav-trigger`, `dc26/nav-drawer` blocks, icon-only and filled-pill nav link variations
- Floating white header as opt-in (`is-header-floating`); default two-state header unchanged
- Starter pattern library, WPML translations of field groups
- Button icon style variations; parallax layers with inertia
- `success` color in theme.json

### Changed
- Template top/bottom spacing removed to sit flush under the header
- FacetWP `index_row` accepts `false` (fixed fatal on member save)

### Removed (BREAKING for children that used them)
- `block-header` block and `functions/dc26-menu-walker.php` (replaced by `dc26/nav`)

## 1.0.1 — 2026-09-15 (tag `ejma-prod`)
State deployed on ejma.ch. The style.css header still reads `1.0` in this tag.

## 1.0.0 — 2026-04-23
Repo reconnected (`af8465f`), baseline.
