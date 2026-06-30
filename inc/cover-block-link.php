<?php
declare(strict_types=1);

// Editor: enqueue the Gutenberg extension + editor styles.
add_action('enqueue_block_editor_assets', function (): void {
    wp_enqueue_script(
        'dc-cover-block-link',
        get_template_directory_uri() . '/inc/cover-block-link.js',
        ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-hooks', 'wp-compose'],
        (string) filemtime(get_template_directory() . '/inc/cover-block-link.js'),
        true
    );
    wp_enqueue_style(
        'dc-cover-block-link-editor',
        get_template_directory_uri() . '/inc/cover-block-link-editor.css',
        [],
        (string) filemtime(get_template_directory() . '/inc/cover-block-link-editor.css')
    );
});

// Front: enqueue the overlay styles.
add_action('wp_enqueue_scripts', function (): void {
    wp_enqueue_style(
        'dc-cover-block-link',
        get_template_directory_uri() . '/inc/cover-block-link.css',
        [],
        (string) filemtime(get_template_directory() . '/inc/cover-block-link.css')
    );
});

// Front: inject the overlay <a> into cover blocks that have a link.
add_filter('render_block', function (string $block_content, array $block): string {
    if ($block['blockName'] !== 'core/cover') {
        return $block_content;
    }

    $url     = $block['attrs']['coverLinkUrl'] ?? '';
    $new_tab = $block['attrs']['coverLinkNewTab'] ?? false;

    if (empty($url)) {
        return $block_content;
    }

    $target  = $new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';
    $overlay = '<a class="wp-block-cover__link" href="' . esc_url($url) . '"' . $target . ' aria-hidden="true" tabindex="-1"></a>';

    return preg_replace(
        '/(<div[^>]+wp-block-cover[^>]*>)/i',
        '$1' . $overlay,
        $block_content,
        1
    );
}, 10, 2);
