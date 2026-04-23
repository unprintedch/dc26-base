# CLAUDE.md — dc26-base

Theme de base. Toute nouvelle fonctionnalité réutilisable doit être développée ici en premier.

## Commands

```bash
npm install       # First time
npm run dev       # Watch CSS + JS
npm run build     # Production build
```

`build/` est gitignored — toujours lancer `npm run build` après le clone.

## Functions

| Fichier | Rôle |
|---------|------|
| `dc26-enqueue.php` | Enqueue CSS/JS, chargement conditionnel Swiper |
| `dc26-fonts.php` | Fonts Monotype/externes via filtres `dc26_monotype_font_url` et `dc26_custom_font_families` |
| `dc26-block-register.php` | Auto-register blocs + styles de blocs |
| `dc26-menu-walker.php` | Custom nav walker accordion |
| `dc26-facet.php` | FacetWP — tri "Par étude", normalisation dates en année |
| `dc26-woocommerce.php` | Placeholder WooCommerce |

## Blocks

| Bloc | Description |
|------|-------------|
| `block-header` | Header custom |
| `block-video-modal` | Vidéo en modal |
| `toggle-panel` | Accordion/toggle avec `view.js` front-end |

## Scripts

| Fichier | Rôle |
|---------|------|
| `dc26-front.js` | Entry point (importe offcanvas, facet-sort, header-sticky) |
| `dc26-offcanvas.js` | Menu mobile burger + overlay + Escape |
| `accordion-tabs-radio.js` | Comportement accordion/tabs front-end |
| `accordion-tabs-variation.js` | Variation bloc éditeur (Sur place, Téléphone, En ligne) |
| `header-sticky.js` | Header sticky au scroll (seuil 64px) |
| `facet-sort-toggle.js` | Convertit le select FacetWP `sort_firm` en boutons toggle |
| `editor-template-part-styles.js` | Limite le style `sticky-header` aux header template parts |
| `scroll-behavior.js` | Scroll avancé : shrink/hide header, animations, parallax |

## Block Styles enregistrés

- `sticky-header` — template-part blocks
- `dc26-ghost-arrow` — button blocks
- `dc26-ghost-download` — button blocks
- `dc26-buttons-doc-list` — buttons group
