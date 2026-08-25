<?php
/**
 * Title: Contact — split infos / formulaire
 * Slug: starter/contact-split
 * Categories: starter-contact
 * Keywords: contact, formulaire, coordonnées, adresse
 * Description: Coordonnées à gauche, emplacement réservé pour un formulaire à droite (à compléter avec le bloc Gravity Forms du site).
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"level":2,"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Parlons-en', 'dc26-base' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<p class="has-gray-text-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)"><?php esc_html_e( 'Une question, un projet ? Contactez-nous par le formulaire ou directement.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Adresse', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"gray-text","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
<p class="has-gray-text-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Rue de l\'Exemple 1, 1000 Lausanne', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Téléphone', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"gray-text","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
<p class="has-gray-text-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)"><?php esc_html_e( '+41 00 000 00 00', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><?php esc_html_e( 'Email', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color">contact@example.ch</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"style":{"border":{"width":"1px","style":"dashed","color":"var:preset|color|gray-cold"},"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|50","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:var(--wp--preset--color--gray-cold);border-style:dashed;border-width:1px;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"align":"center","textColor":"gray-cold"} -->
<p class="has-text-align-center has-gray-cold-color has-text-color"><?php esc_html_e( 'Emplacement du formulaire de contact — insérer ici le bloc/shortcode Gravity Forms du site.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
