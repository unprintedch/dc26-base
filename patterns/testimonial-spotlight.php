<?php
/**
 * Title: Témoignage — spotlight
 * Slug: starter/testimonial-spotlight
 * Categories: starter-testimonials
 * Keywords: témoignage, citation, avis, client
 * Description: Une citation client unique, mise en avant en grand format centré.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"gray-light","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull has-gray-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"align":"center","width":72,"height":72,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() . '/patterns/images/placeholder-square.svg' ); ?>" alt="" style="border-radius:50%;width:72px;height:72px"/></figure>
<!-- /wp:image -->

<!-- wp:quote {"align":"center","className":"is-style-plain"} -->
<blockquote class="wp-block-quote has-text-align-center is-style-plain"><!-- wp:paragraph {"align":"center","fontSize":"xx-large"} -->
<p class="has-text-align-center has-xx-large-font-size"><?php esc_html_e( '« Une équipe à l\'écoute, un résultat qui dépasse ce qu\'on imaginait au départ. On recommande sans hésiter. »', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --><cite><?php esc_html_e( 'Prénom Nom — Fonction, Entreprise', 'dc26-base' ); ?></cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group -->
