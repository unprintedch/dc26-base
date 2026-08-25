<?php
/**
 * Title: FAQ — accordéon
 * Slug: starter/faq-accordion
 * Categories: starter-faq
 * Keywords: faq, questions, accordéon, aide
 * Description: Liste de questions fréquentes en accordéon natif (bloc Details), sans JS custom.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|50","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Questions fréquentes', 'dc26-base' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|60"}}}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:details {"showContent":true} -->
<details class="wp-block-details" open><summary><?php esc_html_e( 'Première question fréquente ?', 'dc26-base' ); ?></summary>
<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'La réponse détaillée à cette question, en un ou deux paragraphes.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Deuxième question fréquente ?', 'dc26-base' ); ?></summary>
<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'La réponse détaillée à cette question, en un ou deux paragraphes.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Troisième question fréquente ?', 'dc26-base' ); ?></summary>
<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'La réponse détaillée à cette question, en un ou deux paragraphes.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Quatrième question fréquente ?', 'dc26-base' ); ?></summary>
<!-- wp:paragraph {"textColor":"gray-text"} -->
<p class="has-gray-text-color has-text-color"><?php esc_html_e( 'La réponse détaillée à cette question, en un ou deux paragraphes.', 'dc26-base' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
