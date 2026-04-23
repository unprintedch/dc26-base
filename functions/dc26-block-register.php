<?php
// Register blocks from parent theme and child theme (if active)
add_action( 'init', 'dc26_acf_blocks' );
function dc26_acf_blocks(): void {
    error_log( '[dc26] ACF active: ' . ( function_exists( 'acf_register_block_type' ) ? 'YES' : 'NO' ) );
    $template_dir     = get_template_directory();
    $stylesheet_dir   = get_stylesheet_directory();
    $template_uri     = get_template_directory_uri();
    $stylesheet_uri   = get_stylesheet_directory_uri();

    // Child first so its blocks take priority over parent blocks of the same name
    $sources = array();
    if ( $stylesheet_dir !== $template_dir ) {
        $sources[ $stylesheet_dir . '/blocks/' ] = $stylesheet_uri;
    }
    $sources[ $template_dir . '/blocks/' ] = $template_uri;

    $registered = array();

    foreach ( $sources as $blocks_dir => $theme_uri ) {
        error_log( '[dc26] scanning: ' . $blocks_dir . ' — exists: ' . ( is_dir( $blocks_dir ) ? 'yes' : 'no' ) );
        if ( ! is_dir( $blocks_dir ) ) {
            continue;
        }

        foreach ( scandir( $blocks_dir ) as $block ) {
            if ( in_array( $block, array( '.', '..' ), true ) ) {
                continue;
            }

            $block_path      = $blocks_dir . $block;
            $block_json_path = $block_path . '/block.json';

            error_log( '[dc26] block: ' . $block . ' — registered' );
            if ( ! is_dir( $block_path ) || ! file_exists( $block_json_path ) ) {
                error_log( '[dc26] block: ' . $block . ' — SKIPPED (no dir or block.json)' );
                continue;
            }

            // Child block overrides parent block of the same name
            if ( isset( $registered[ $block ] ) ) {
                continue;
            }
            $registered[ $block ] = true;

            $args = array();

            // Register style if present
            if ( file_exists( $block_path . '/style.css' ) ) {
                wp_register_style(
                    "dc26-block-{$block}-style",
                    $theme_uri . "/blocks/{$block}/style.css",
                    array(),
                    filemtime( $block_path . '/style.css' )
                );
                $args['style'] = "dc26-block-{$block}-style";
            }

            // Register script if declared in block.json or as script.js
            $block_json = json_decode( file_get_contents( $block_json_path ), true );

            if ( isset( $block_json['script'] ) ) {
                $script_path      = str_replace( 'file:./', '', $block_json['script'] );
                $script_full_path = $block_path . '/' . $script_path;

                if ( file_exists( $script_full_path ) ) {
                    $script_deps = array( 'wp-blocks', 'wp-element', 'wp-editor', 'swiper-js' );
                    if ( preg_match( '/(^|\/)view(\.min)?\.js$/', $script_path ) ) {
                        $script_deps = array();
                    }

                    wp_register_script(
                        "dc26-block-{$block}-script",
                        $theme_uri . "/blocks/{$block}/{$script_path}",
                        $script_deps,
                        filemtime( $script_full_path ),
                        true
                    );
                    $args['script'] = "dc26-block-{$block}-script";
                }
            } elseif ( file_exists( $block_path . '/script.js' ) ) {
                wp_register_script(
                    "dc26-block-{$block}-script",
                    $theme_uri . "/blocks/{$block}/script.js",
                    array( 'wp-blocks', 'wp-element', 'wp-editor', 'swiper-js' ),
                    filemtime( $block_path . '/script.js' ),
                    true
                );
                $args['script'] = "dc26-block-{$block}-script";
            }

            $result = register_block_type( $block_path, $args );
            error_log( '[dc26] register_block_type(' . $block . '): ' . ( $result ? $result->name : 'FAILED' ) );
        }
    }
}

add_action( 'init', function () {
	register_block_style(
		'core/template-part',
		[
			'name'  => 'sticky-header',
			'label' => __( 'Sticky header', 'dc26-oav' ),
		]
	);

	register_block_style(
		'core/button',
		[
			'name'  => 'dc26-ghost-arrow',
			'label' => __( 'Sans fond + fleche', 'dc26-oav' ),
		]
	);

	register_block_style(
		'core/button',
		[
			'name'  => 'dc26-ghost-download',
			'label' => __( 'Sans fond + download', 'dc26-oav' ),
		]
	);

	register_block_style(
		'core/buttons',
		[
			'name'  => 'dc26-buttons-doc-list',
			'label' => __( 'Liste docs alignee', 'dc26-oav' ),
		]
	);

	register_block_style(
		'core/page-list',
		[
			'name'  => 'dc26-page-grid-buttons',
			'label' => __( 'Grille boutons', 'dc26' ),
		]
	);
} );




// require_once( get_template_directory() . '/blocks/block-variation.php' );
// remove_theme_support( 'core-block-patterns' );

