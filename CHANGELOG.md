# Changelog — dc26-base

Semver. A child theme declares the minimum base version it needs (`DC26_BASE_MIN`).
Per-site pinning is done with git tags (see CLAUDE.md, rule 5).

## 2.0.0 — non publié (en cours sur main)

La base v2 est un socle minimal. Décisions : `docs/architecture-base-v2.md` (racine du projet). La v1 reste en maintenance sur la branche `v1` (dernier tag `v1.2.2`). Un site ne passe en v2 que le jour de sa migration : `deploy-base.sh` refuse un tag v2 tant que le `base-version` de l'enfant n'est pas en v2.

### Removed
- BREAKING: blocs `dc26/toggle-panel` et `dc26/block-video-modal`.
- BREAKING: tri manuel `menu_order` du Query Loop (`query-order`) et lien sur le bloc Cover (`coverLinkUrl`, `cover-block-link`).
- BREAKING: code OAV des facettes : `dc26-facet.php`, `facet-sort-toggle.js` et le tri `sort_firm` (désormais dans `dc26-oav`).
- BREAKING: Gravity Forms n'est plus activé automatiquement ni exigé (`Requires Plugins`).
- BREAKING: Swiper (fichiers vendor, chargement conditionnel, handle `swiper-js`, dépendance ajoutée aux scripts de blocs) → module `swiper` de `dc26-library`.
- Tom Select (fichiers vendor) → module `tom-select` de `dc26-library`.
- `dc26-woocommerce.php` (vide), `css/_woocommerce.css` et `css/_currency.css` (jamais chargés).
- BREAKING: `templates/home.html` (identique à `index.html`) et les parts `header-light`, `header-large-title`, `footer-columns`, `footer-newsletter`.

### Changed
- BREAKING: templates et parts réduits à un squelette structurel : plus de styles en ligne (marges, bordures, tailles de texte), plus de classe `is-style-sticky-header` sur le header, `single.html` sans date, catégories, image mise en avant ni étiquettes, `footer.html` réduit au © et au titre du site. Un enfant qui comptait sur la mise en page de la base doit copier les fichiers de `v1.2.2` dans son thème avant de passer en v2.

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
