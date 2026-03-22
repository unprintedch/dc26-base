<?php
/**
 * Gestion optionnelle des polices personnalisées (ex: Monotype / fonts.com)
 *
 * Ce fichier fournit deux points d'extension pour importer des polices
 * externes sans les embarquer dans le thème de base.
 *
 * --- Utilisation dans un thème enfant ou wp-config.php ---
 *
 * 1. Enqueue d'une feuille CSS Monotype :
 *
 *    add_filter( 'dc26_monotype_font_url', function() {
 *        return 'https://fast.fonts.net/cssapi/votre-projet-id.css';
 *    } );
 *
 * 2. Enregistrement de la famille dans le sélecteur de polices WordPress :
 *
 *    add_filter( 'dc26_custom_font_families', function( array $families ): array {
 *        $families[] = [
 *            'fontFamily' => "'HelveticaNeue LT', Arial, sans-serif",
 *            'name'       => 'Helvetica Neue LT',
 *            'slug'       => 'custom-font',
 *        ];
 *        return $families;
 *    } );
 *
 *    Vous pouvez ensuite utiliser la police dans theme.json d'un thème enfant
 *    ou cibler la variable CSS générée :
 *    var(--wp--preset--font-family--custom-font)
 *
 * @package dc26-base
 */

declare(strict_types=1);

/**
 * Enqueue la feuille CSS Monotype/externe si une URL est fournie via le filtre.
 * Chargée sur le front-end et dans l'éditeur de blocs.
 */
function dc26_enqueue_monotype_fonts(): void {
	$url = (string) apply_filters( 'dc26_monotype_font_url', '' );

	if ( empty( $url ) ) {
		return;
	}

	wp_enqueue_style(
		'dc26-custom-fonts',
		esc_url_raw( $url ),
		[],
		null  // pas de version : URL externe gérée côté Monotype
	);
}
add_action( 'wp_enqueue_scripts', 'dc26_enqueue_monotype_fonts', 5 );
add_action( 'enqueue_block_editor_assets', 'dc26_enqueue_monotype_fonts', 5 );

/**
 * Injecte les familles de polices personnalisées dans theme.json
 * à partir du filtre dc26_custom_font_families.
 *
 * @param WP_Theme_JSON_Data $theme_json
 * @return WP_Theme_JSON_Data
 */
function dc26_inject_custom_font_families( WP_Theme_JSON_Data $theme_json ): WP_Theme_JSON_Data {
	$families = (array) apply_filters( 'dc26_custom_font_families', [] );

	if ( empty( $families ) ) {
		return $theme_json;
	}

	$data = $theme_json->get_data();
	$existing = $data['settings']['typography']['fontFamilies'] ?? [];
	$data['settings']['typography']['fontFamilies'] = array_merge( $existing, $families );

	return $theme_json->update_with( $data );
}
add_filter( 'wp_theme_json_data_theme', 'dc26_inject_custom_font_families' );
