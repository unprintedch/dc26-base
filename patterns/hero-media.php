<?php
/**
 * Title: Hero — avec image
 * Slug: starter/hero-media
 * Categories: starter-hero
 * Keywords: hero, header, image, bannière, accueil
 * Description: Section d'ouverture avec titre, texte, boutons et image à droite.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size" style="font-weight:600;text-transform:uppercase;letter-spacing:0.05em"><?php esc_html_e( 'Bienvenue', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"xxx-large"} -->
<h1 class="wp-block-heading has-xxx-large-font-size"><?php esc_html_e( 'Un titre qui donne envie de rester', 'dc26-base' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'Une phrase de sous-titre qui explique la promesse en une ou deux lignes, sans jargon.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Commencer', 'dc26-base' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-dc26-outline-arrow"} -->
<div class="wp-block-button is-style-dc26-outline-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'En savoir plus', 'dc26-base' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-wide.svg' ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
