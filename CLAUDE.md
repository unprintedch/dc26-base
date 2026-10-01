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

## Règles de compatibilité (base partagée par tous les sites)

`dc26-base` est le thème parent de **tous** les sites dc26-*. Ce qui change ici change partout au prochain déploiement. La base apporte de nouvelles possibilités **sans modifier ce que les sites utilisent déjà**.

1. **Additif par défaut.** Nouveau rendu / nouveau comportement = nouvelle variation **opt-in** (style de bloc, classe `is-…` ajoutée explicitement, nouveau template-part comme `header-light.html`, nouveau pattern, nouveau bloc). Un site qui ne l'active pas ne voit aucune différence.
2. **Ne jamais changer un défaut existant** : rendu d'un template-part / template, valeurs de `theme.json`, CSS d'un bloc existant, markup d'un `render.php`, noms de classes ou de presets. Corriger un vrai bug reste permis, mais sans changer l'apparence voulue.
3. **Breaking change inévitable** → l'annoncer (commit `BREAKING:` + note dans `STATUS.md`), le faire derrière une nouvelle version majeure, et migrer les sites un par un.
4. **Les enfants se personnalisent par les points d'extension prévus** : presets `theme.json`, surcharge de template-parts, classes documentées. Ils ne dépendent pas des détails internes de la base.
5. **Déploiement figé par site.** Un site ne reçoit pas la base depuis le dossier de travail mais depuis un tag git (ex. `ejma-prod`, voir `themes/dc26-ejma/deploy.sh --base`). Changer de version de base pour un site est un acte volontaire, vérifié d'abord (staging, captures).
6. **Avant tout changement de la base** : se demander « un site existant va-t-il changer d'aspect sans l'avoir demandé ? ». Si oui → en faire une variation opt-in.

Exemple : le header flottant blanc (`css/_header-floating.css`) n'est actif que si le template-part porte `is-header-floating` ; le header par défaut (transparent au top, pilule floutée au scroll) est inchangé.
