<?php
/**
 * Title: CTA — bannière pleine largeur
 * Slug: starter/cta-banner
 * Categories: starter-cta
 * Keywords: cta, appel à l'action, bannière, conversion
 * Description: Bannière pleine largeur colorée avec titre, texte court et bouton.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"xxx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xxx-large-font-size"><?php esc_html_e( 'Prêt à vous lancer ?', 'dc26-base' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"><?php esc_html_e( 'Une phrase courte qui donne envie de passer à l\'action maintenant.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background wp-element-button"><?php esc_html_e( 'Commencer maintenant', 'dc26-base' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
