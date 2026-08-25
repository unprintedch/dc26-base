<?php
/**
 * Title: Équipe — grille
 * Slug: starter/team-grid
 * Categories: starter-team
 * Keywords: équipe, team, portraits, collaborateurs
 * Description: Grille de membres de l'équipe avec photo, nom et fonction.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'L\'équipe', 'dc26-base' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-square.svg' ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text","fontSize":"small"} -->
<p class="has-gray-text-color has-text-color has-small-font-size"><?php esc_html_e( 'Fonction', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-square.svg' ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text","fontSize":"small"} -->
<p class="has-gray-text-color has-text-color has-small-font-size"><?php esc_html_e( 'Fonction', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-square.svg' ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text","fontSize":"small"} -->
<p class="has-gray-text-color has-text-color has-small-font-size"><?php esc_html_e( 'Fonction', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-square.svg' ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<h3 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Prénom Nom', 'dc26-base' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text","fontSize":"small"} -->
<p class="has-gray-text-color has-text-color has-small-font-size"><?php esc_html_e( 'Fonction', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
