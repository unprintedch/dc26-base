# dc26-base

Thème parent WordPress FSE (Full Site Editing). Sert de base à tous les child themes dc26-*.

## Prérequis

- WordPress 6.8+
- PHP 8.2+
- Node.js 20+ / npm
- ACF PRO 6.6+

## Installation

```bash
npm install
npm run build
```

## Build

```bash
npm run dev          # watch CSS + JS
npm run build        # production (CSS + JS)
npm run build:main   # CSS uniquement
npm run build:js     # JS uniquement
```

`build/` est gitignored — toujours lancer `npm run build` après le clone.

## Structure

```
dc26-base/                       # v2 : socle minimal (voir docs/architecture-base-v2.md)
├── assets/fonts, assets/img
├── blocks/                      # nav, nav-drawer, nav-trigger, scroll-image
├── build/                       # Gitignored — généré par npm run build
├── css/
│   ├── style.css                # Entry PostCSS
│   ├── editor-style.css         # alignfull + aperçu des styles de lien de navigation
│   ├── _navigation.css, _nav-responsive.css, _offcanvas.css
├── functions/                   # enqueue, block-register, fonts, nav-render
├── parts/                       # header.html, footer.html (squelettes)
├── scripts/                     # dc26-front.js, dc26-offcanvas.js
├── styles/blocks/               # Variations de style JSON
├── templates/                   # index, page, page-no-title, single, archive, 404
├── acf-json/                    # Groupes ACF des blocs de la base (+ fr/de/en)
├── functions.php, style.css, theme.json
```

Tout le reste (header sticky, animations, patterns, styles de boutons, Swiper, FacetWP…) est dans `dc26-library` : `add-module.sh <enfant> <module>`.

## Child themes

Ne jamais modifier ce thème directement depuis un projet child. Toute feature réutilisable doit être développée ici en premier, puis les child themes en héritent automatiquement.

Child themes actifs :
- `dc26-leiravello` — cabinet d'avocats Leiravello & Associés
- `dc26-kaws` — e-commerce WooCommerce The Honourable Merchants Group

## Blocs ACF v3

`dc26-block-register.php` scanne `blocks/` dans le thème parent ET dans le child theme actif. Chaque bloc suit la structure :

```
blocks/{name}/
├── block.json     # namespace dc26/
├── render.php
├── style.css      # auto-registered
└── view.js        # (optionnel)
acf-json/
└── group_dc26_{name}.json
```

## Plugins requis

- Advanced Custom Fields PRO 6.6+
- FacetWP (fonctionnalités de filtrage)
- Gravity Forms (formulaires)
- WooCommerce (e-commerce, selon le site)
