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
dc26-base/
├── assets/
│   ├── fonts/                   # Polices locales (Source Sans, Source Serif, Roboto Slab)
│   ├── img/                     # Icônes SVG (envelope, phone, chevrons…)
│   └── vendor/                  # Swiper, Tom Select (pré-bundlés)
├── blocks/
│   ├── block-header/            # Header custom (non-ACF)
│   ├── block-video-modal/       # Vidéo en modal
│   └── toggle-panel/            # Accordion/toggle (ACF v3, avec view.js)
├── build/                       # Gitignored — généré par npm run build
├── css/
│   ├── style.css                # Entry PostCSS (importe les partials)
│   ├── editor-style.css         # Styles éditeur Gutenberg
│   ├── _header.css
│   ├── _navigation.css
│   ├── _offcanvas.css
│   ├── _header-sticky.css
│   ├── _animations.css
│   ├── _block-style.css
│   ├── _block-style_accordion.css
│   ├── _button-variants.css
│   ├── _gravityform.css
│   ├── _facet.css
│   ├── _woocommerce.css
│   ├── _currency.css
│   ├── _wpml.css
│   ├── accordion-tabs.css
│   ├── dc-tailwind.css
│   ├── facet-reset.css
│   └── login.css
├── functions/
│   ├── dc26-enqueue.php         # Enqueue CSS/JS, Swiper conditionnel
│   ├── dc26-block-register.php  # Auto-register blocs ACF (base + child)
│   ├── dc26-fonts.php           # Polices Monotype/externes
│   ├── dc26-menu-walker.php     # Nav walker accordion
│   ├── dc26-facet.php           # FacetWP — tri, normalisation dates
│   └── dc26-woocommerce.php     # Hooks WooCommerce
├── parts/
│   ├── header.html
│   ├── header-light.html        # Variante texte blanc (fonds sombres)
│   ├── header-large-title.html
│   ├── footer.html
│   ├── footer-columns.html
│   └── footer-newsletter.html
├── scripts/
│   ├── dc26-front.js            # Entry point (importe les modules)
│   ├── dc26-offcanvas.js        # Menu mobile burger
│   ├── accordion-tabs-radio.js  # Behavior accordion/tabs
│   ├── accordion-tabs-variation.js  # Variation bloc éditeur
│   ├── header-sticky.js         # Header sticky au scroll
│   ├── facet-sort-toggle.js     # FacetWP sort → boutons toggle
│   ├── scroll-behavior.js       # Shrink/hide header, parallax
│   ├── dc26-animations.js       # Animations scroll
│   └── editor-template-part-styles.js  # Limite style sticky-header aux header parts
├── styles/
│   └── blocks/                  # Variations de style JSON (display, subtitle…)
├── templates/
│   ├── index.html
│   ├── home.html
│   ├── page.html
│   ├── page-no-title.html       # Page sans wp:post-title
│   ├── single.html
│   ├── archive.html
│   └── 404.html
├── acf-json/                    # Field groups ACF — toujours syncer
├── functions.php
├── postcss.config.js
├── style.css                    # Header du thème WP
└── theme.json                   # Tokens design (couleurs, typo, spacing, layouts)
```

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
