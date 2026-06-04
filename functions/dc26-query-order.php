<?php
declare(strict_types=1);

// Expose menu_order in REST API for posts (needed for manual ordering).
add_action( 'rest_api_init', function (): void {
	register_rest_field( 'post', 'menu_order', [
		'get_callback'    => fn( array $post ): int => (int) get_post( $post['id'] )->menu_order,
		'update_callback' => function ( int $value, WP_Post $post ): void {
			wp_update_post( [ 'ID' => $post->ID, 'menu_order' => $value ] );
		},
		'schema' => [
			'type'        => 'integer',
			'description' => 'Ordre d\'affichage manuel',
			'context'     => [ 'view', 'edit' ],
		],
	] );
} );

add_action( 'enqueue_block_editor_assets', function (): void {
	wp_enqueue_script(
		'dc26-query-order',
		get_theme_file_uri( 'assets/js/editor/query-order.js' ),
		[ 'wp-blocks', 'wp-element', 'wp-components', 'wp-block-editor', 'wp-hooks', 'wp-compose' ],
		(string) filemtime( get_theme_file_path( 'assets/js/editor/query-order.js' ) ),
		true
	);
} );

add_filter( 'query_loop_block_query_vars', function ( array $query, WP_Block $block ): array {
	$orderby = $block->context['query']['orderby'] ?? '';

	if ( $orderby === 'menu_order' ) {
		$query['orderby'] = 'menu_order';
		$query['order']   = 'ASC';
	}

	return $query;
}, 10, 2 );
