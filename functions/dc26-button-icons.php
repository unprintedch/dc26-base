<?php

declare(strict_types=1);

/**
 * Register icon style variations for the native core/button block.
 * CSS lives in css/_button-icons.css (bundled into build/style.css).
 */
add_action('init', function (): void {
    $styles = array(
        array(
            'name'  => 'dc26-icon-mail',
            'label' => __('Icône : mail', 'dc26-base'),
        ),
        array(
            'name'  => 'dc26-icon-tel',
            'label' => __('Icône : téléphone', 'dc26-base'),
        ),
        array(
            'name'  => 'dc26-icon-pin',
            'label' => __('Icône : localisation', 'dc26-base'),
        ),
        array(
            'name'  => 'dc26-icon-arrow',
            'label' => __('Icône : flèche', 'dc26-base'),
        ),
    );

    foreach ($styles as $style) {
        register_block_style('core/button', $style);
    }
});
