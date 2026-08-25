<?php
/**
 * Title: Témoignages — grille de 3
 * Slug: starter/testimonials-grid
 * Categories: starter-testimonials
 * Keywords: témoignages, citations, avis, clients, grille
 * Description: Trois citations clients courtes, présentées côte à côte.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Ce qu\'en disent nos clients', 'dc26-base' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"width":"1px","color":"var:preset|color|gray-light"}}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-light);border-width:1px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:quote {"className":"is-style-plain"} -->
<blockquote class="wp-block-quote is-style-plain"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Un accompagnement clair du premier jour au dernier détail.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --><cite><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"width":"1px","color":"var:preset|color|gray-light"}}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-light);border-width:1px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:quote {"className":"is-style-plain"} -->
<blockquote class="wp-block-quote is-style-plain"><!-- wp:paragraph -->
<p><?php esc_html_e( 'Résultat à la hauteur, délais respectés, communication fluide.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --><cite><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"border":{"width":"1px","color":"var:preset|color|gray-light"}}} -->
<div class="wp-block-column has-border-color" style="border-color:var(--wp--preset--color--gray-light);border-width:1px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:quote {"className":"is-style-plain"} -->
<blockquote class="wp-block-quote is-style-plain"><!-- wp:paragraph -->
<p><?php esc_html_e( 'On les recommande à toute entreprise qui veut faire les choses bien.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --><cite><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
