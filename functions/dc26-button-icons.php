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
            'label' => __('Mail', 'dc26-base'),
        ),
        array(
            'name'  => 'dc26-icon-tel',
            'label' => __('Téléphone', 'dc26-base'),
        ),
        array(
            'name'  => 'dc26-icon-pin',
            'label' => __('Localisation', 'dc26-base'),
        ),
        array(
            'name'  => 'dc26-icon-arrow',
            'label' => __('Flèche', 'dc26-base'),
        ),
    );

    foreach ($styles as $style) {
        register_block_style('core/button', $style);
    }
});
