<?php
/**
 * Title: Two Columns
 * Slug: dc26-base/two-columns
 * Categories: featured, text
 * Description: Une section avec deux colonnes de contenu
 * Keywords: columns, layout, content
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--60)","bottom":"var(--wp--preset--spacing--60)"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Titre Colonne 1</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Contenu de la première colonne. Vous pouvez ajouter du texte, des images, des boutons, etc.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Titre Colonne 2</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Contenu de la deuxième colonne. Vous pouvez ajouter du texte, des images, des boutons, etc.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->


