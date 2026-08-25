<?php
declare(strict_types=1);

/**
 * Bibliothèque de patterns "starter" — catégories custom.
 *
 * Les patterns eux-mêmes vivent dans /patterns/ et sont auto-enregistrés
 * nativement par WP (tout .php avec un header valide dans le dossier
 * /patterns/ du thème parent ou du thème enfant actif). Seules les
 * catégories custom nécessitent un appel PHP explicite ici.
 *
 * Règle non négociable : contenu 100% éditorial (blocs core uniquement).
 * Jamais de donnée structurée / CPT / champ ACF dans un pattern.
 * Voir /agenda-event-architecture.md (racine du projet) et /patterns/README.md.
 */
add_action('init', function (): void {
    $categories = [
        'starter-hero'         => __('Starter – Hero', 'dc26-base'),
        'starter-features'     => __('Starter – Features', 'dc26-base'),
        'starter-social-proof' => __('Starter – Preuve sociale', 'dc26-base'),
        'starter-testimonials' => __('Starter – Témoignages', 'dc26-base'),
        'starter-pricing'      => __('Starter – Tarifs', 'dc26-base'),
        'starter-team'         => __('Starter – Équipe', 'dc26-base'),
        'starter-faq'          => __('Starter – FAQ', 'dc26-base'),
        'starter-cta'          => __('Starter – Appel à l\'action', 'dc26-base'),
        'starter-contact'      => __('Starter – Contact', 'dc26-base'),
        'starter-pages'        => __('Starter – Pages complètes', 'dc26-base'),
    ];

    foreach ($categories as $slug => $label) {
        register_block_pattern_category($slug, ['label' => $label]);
    }
}, 9);
