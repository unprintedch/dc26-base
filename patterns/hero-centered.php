<?php
/**
 * Title: Hero — centré sans image
 * Slug: starter/hero-centered
 * Categories: starter-hero
 * Keywords: hero, header, centré, accueil, page
 * Description: Section d'ouverture centrée, sans média, pour une page de contenu (à propos, contact...).
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50"}}},"backgroundColor":"gray-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-small-font-size" style="font-weight:600;text-transform:uppercase;letter-spacing:0.05em"><?php esc_html_e( 'À propos', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size"><?php esc_html_e( 'Une histoire, un lieu, une équipe', 'dc26-base' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-text","fontSize":"large"} -->
<p class="has-text-align-center has-gray-text-color has-text-color has-large-font-size"><?php esc_html_e( 'Un paragraphe d\'introduction qui pose le contexte de la page en deux ou trois lignes.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Nous contacter', 'dc26-base' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
