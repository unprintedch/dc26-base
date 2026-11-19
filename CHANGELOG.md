# Changelog — dc26-base

Semver. A child theme declares the minimum base version it needs (`DC26_BASE_MIN`).
Per-site pinning is done with git tags (see CLAUDE.md, rule 5).

## 1.2.2 — 2026-11-19

### Changed
- `templates/home.html` and `templates/archive.html`: back to the generic versions (the Benk blog layout of 1.2.1 now lives in `dc26-benk`). Sites that inherited the Benk layout from 1.2.1 must carry their own copy.
- `dc26/nav-drawer`: no shadow while the drawer is closed; the drawer closes on link click.

## 1.2.0 — 2026-10-25

### Added
- `dc26/scroll-image`: « Hauteur après scroll (px) » field (`max_height_scrolled`) — images resize smoothly when the page scrolls. Empty = unchanged behaviour.

### Changed
- `dc26/scroll-image`: on mobile the height is still capped at 50px, but a smaller scrolled height is now respected.

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
