# Bibliothèque de patterns "starter"

Patterns Gutenberg natifs pour composer rapidement des pages standard (landing, à propos, contact...) depuis l'inserter, sans plugin tiers ni builder externe. Vit dans `dc26-base` — hérité automatiquement par tous les thèmes enfants (`Template: dc26-base`), y compris ceux qui n'ont pas leur propre `theme.json`.

## Règle non négociable

**Un pattern ne porte jamais de donnée structurée, filtrable, triable ou calculée** (pas de CPT, pas de champ ACF, pas de requête). Dès qu'un besoin de ce type apparaît en cours de route, ce n'est plus un pattern — c'est un CPT + bloc ACF (`blockVersion: 3`). S'arrêter et vérifier avec David avant de trancher seul.

Voir [`agenda-event-architecture.md`](../../../agenda-event-architecture.md) (racine du projet) pour la décision complète et le cas de référence (liste d'événements filtrée/triée = bloc ACF, jamais un pattern).

## Enregistrement

Auto-enregistrement natif WP : tout `.php` avec un header valide dans ce dossier est détecté automatiquement (WP ≥ 6.0, parent **et** enfant scannés). Aucun `register_block_pattern()` à écrire. Seules les catégories custom nécessitent un appel PHP — voir `dc26-base/inc/patterns.php`, chargé depuis `functions.php`.

## Convention de nommage

- **Slug de pattern** : `starter/{nom-en-anglais-kebab-case}` — ex. `starter/hero-media`. Le nom de fichier correspond au dernier segment du slug (`hero-media.php`).
- **Slug de catégorie** : plat, préfixé `starter-`, un par type de section — `starter-hero`, `starter-features`, `starter-social-proof`, `starter-testimonials`, `starter-pricing`, `starter-team`, `starter-faq`, `starter-cta`, `starter-contact`, plus `starter-pages` pour les pages complètes. Déclarées dans `dc26-base/inc/patterns.php`.
- **Contenu placeholder et labels UI** : en français (thème pour clients francophones). Le `Slug:` reste en anglais (convention WP).
- **Images placeholder** : bundlées en local dans `patterns/images/*.svg`, référencées via `esc_url( get_template_directory_uri() . '/patterns/images/xxx.svg' )` — jamais de blocs image vides ni d'URL externe.

## Deux usages distincts

- **Patterns de section** (`hero-media.php`, `features-grid.php`, ...) : une catégorie précise, pensés pour être insérés individuellement dans n'importe quelle page.
- **Patterns de page complète** (`page-landing.php`, `page-about.php`, `page-contact.php`) : catégorie `starter-pages`, header `Block Types: core/post-content` (apparaissent dans le flux natif "nouvelle page"), et composés en **imbriquant** les patterns de section via `<!-- wp:pattern {"slug":"starter/xxx"} /-->` — jamais en copiant leur HTML. Un changement dans un pattern de section ne doit jamais être dupliqué à la main dans une page complète : on référence, on ne copie pas.

### `core/pattern` n'est pas synchronisé

`<!-- wp:pattern {"slug":"..."} /-->` est un raccourci d'insertion, pas un bloc réutilisable (`core/block`). Dès qu'un utilisateur insère `page-landing` dans une vraie page, WordPress développe immédiatement le contenu complet dans cette page — éditer `hero-media.php` après coup ne met **pas** à jour les pages déjà créées à partir de lui. C'est voulu (chaque page doit pouvoir diverger librement), mais à savoir avant de promettre une maintenance centralisée.

### Titre de page

Les patterns hero portent leur propre `<h1>` marketing. Une page complète qui les utilise doit donc utiliser le template `page-no-title` (déjà défini dans `dc26-base/theme.json` → `customTemplates`) pour éviter un titre de page dupliqué au-dessus du hero.

## Ajouter un nouveau pattern

1. Vérifier qu'un pattern équivalent n'existe pas déjà (liste ci-dessous).
2. Créer `patterns/{slug}.php` avec le header standard (`Title`, `Slug: starter/...`, `Categories`, `Keywords`, `Description`, `Viewport Width` ; ajouter `Block Types: core/post-content` uniquement pour une page complète).
3. N'utiliser que des blocs core, et uniquement les presets `theme.json` existants — jamais de couleur/taille/spacing en dur. Si un token manque, l'ajouter d'abord à `theme.json` (slug avant tout).
4. Réutiliser les styles de bloc déjà enregistrés dans `dc26-base/functions/dc26-block-register.php` plutôt que d'en recréer (`dc26-ghost-arrow`, `dc26-ghost-download`, `dc26-outline-arrow` pour `core/button` ; `dc26-buttons-doc-list` pour `core/buttons` ; `check`, `dc26-check-cross` pour `core/list`).
5. Si le pattern est une nouvelle catégorie de section, l'ajouter dans `dc26-base/inc/patterns.php`.
6. Tester dans l'éditeur (inserter + aucune erreur "bloc invalide") avant de committer.

## Patterns disponibles

**Sections**
| Pattern | Slug | Catégorie |
|---|---|---|
| Hero avec image | `starter/hero-media` | `starter-hero` |
| Hero centré sans image | `starter/hero-centered` | `starter-hero` |
| Features grille 3 colonnes | `starter/features-grid` | `starter-features` |
| Features alternée image/texte | `starter/features-alternating` | `starter-features` |
| Logos clients | `starter/social-proof-logos` | `starter-social-proof` |
| Ligne de stats | `starter/social-proof-stats` | `starter-social-proof` |
| Témoignage spotlight | `starter/testimonial-spotlight` | `starter-testimonials` |
| Témoignages grille de 3 | `starter/testimonials-grid` | `starter-testimonials` |
| Pricing 3 tiers | `starter/pricing-3-tiers` | `starter-pricing` |
| Équipe grille | `starter/team-grid` | `starter-team` |
| FAQ accordéon | `starter/faq-accordion` | `starter-faq` |
| CTA bannière | `starter/cta-banner` | `starter-cta` |
| Contact split | `starter/contact-split` | `starter-contact` |

**Pages complètes** (`starter-pages`, `Block Types: core/post-content`)
| Pattern | Slug | Composition |
|---|---|---|
| Landing | `starter/page-landing` | hero-media → social-proof-logos → features-grid → features-alternating → testimonials-grid → pricing-3-tiers → faq-accordion → cta-banner |
| À propos | `starter/page-about` | hero-centered → social-proof-stats → features-alternating → team-grid → testimonial-spotlight → cta-banner |
| Contact | `starter/page-contact` | hero-centered → contact-split → faq-accordion |
