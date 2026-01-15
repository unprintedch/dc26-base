<?php
/**
 * Title: Hero Section
 * Slug: dc26-base/hero-section
 * Categories: featured
 * Description: Une section hero avec titre, sous-titre et bouton
 * Keywords: hero, banner, call-to-action
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--80)","bottom":"var(--wp--preset--spacing--80)"}},"color":{"background":"var(--wp--preset--color--primary)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--primary);padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":1,"textAlign":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"color":{"text":"var(--wp--preset--color--white)"}}} -->
		<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color" style="font-size:3rem;font-weight:700">Titre Principal</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"var(--wp--preset--color--white)"},"spacing":{"margin":{"top":"var(--wp--preset--spacing--40)"}}}} -->
		<p class="has-text-align-center has-white-color has-text-color" style="margin-top:var(--wp--preset--spacing--40)">Votre sous-titre ou description ici</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var(--wp--preset--spacing--50)"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:button {"backgroundColor":"secondary","textColor":"white"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-secondary-background-color has-text-color has-background wp-element-button">Appel à l'action</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->


