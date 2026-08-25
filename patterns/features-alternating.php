<?php
/**
 * Title: Features — alternée image/texte
 * Slug: starter/features-alternating
 * Categories: starter-features
 * Keywords: features, avantages, alterné, image, texte
 * Description: Deux rangées image/texte qui alternent de côté, pour détailler des points successifs.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|70"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-wide.svg' ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:heading {"level":3,"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Premier point détaillé', 'dc26-base' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'Un paragraphe qui développe ce point sur deux à trois lignes, avec assez de contexte pour convaincre sans noyer le lecteur.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dc26-ghost-arrow"} -->
<div class="wp-block-button is-style-dc26-ghost-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'En savoir plus', 'dc26-base' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide","verticalAlignment":"center"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:heading {"level":3,"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Deuxième point détaillé', 'dc26-base' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'Un paragraphe qui développe ce point sur deux à trois lignes, avec assez de contexte pour convaincre sans noyer le lecteur.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dc26-ghost-arrow"} -->
<div class="wp-block-button is-style-dc26-ghost-arrow"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'En savoir plus', 'dc26-base' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-wide.svg' ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
