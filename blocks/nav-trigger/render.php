<?php
/**
 * Nav Trigger block template.
 *
 * @param array  $block      Block settings and attributes.
 * @param string $content    Inner HTML (empty unless InnerBlocks used).
 * @param bool   $is_preview True in the block editor preview.
 * @param int    $post_id    Current post ID.
 * @param array  $context    Context from parent block.
 */

$block_id = !empty($block['anchor']) ? $block['anchor'] : $block['id'];

$class_name = 'dc26-nav-trigger';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$icon_type      = get_field('nt_icon_type') ?: 'lines';
$icon_image     = get_field('nt_icon_image');
$color_scheme   = get_field('nt_color_scheme') ?: 'dark';
$position       = get_field('nt_position') ?: 'right';
$hide_on_mobile = get_field('nt_hide_on_mobile');

$class_name .= ' dc26-nav-trigger--' . esc_attr($color_scheme);
$class_name .= ' dc26-nav-trigger--' . esc_attr($position);
if ($hide_on_mobile) {
    $class_name .= ' dc26-nav-trigger--hide-mobile';
}

if ($is_preview) : ?>
    <div class="admin-view-only flex items-center justify-center bg-slate-100 p-6 gap-3">
        <span class="dashicons dashicons-menu"></span>
        <span>Nav Trigger — <?php echo esc_html($color_scheme); ?> / <?php echo esc_html($position); ?></span>
    </div>
    <?php return;
endif; ?>

<div
    id="<?php echo esc_attr($block_id); ?>"
    class="<?php echo esc_attr($class_name); ?>"
>
    <button
        class="dc26-nav-trigger__button"
        type="button"
        aria-expanded="false"
        aria-label="<?php esc_attr_e('Ouvrir le menu', 'dc26'); ?>"
        aria-controls="dc26-nav-drawer"
    >
        <?php if ($icon_type === 'custom' && $icon_image) : ?>
            <?php echo wp_get_attachment_image($icon_image['ID'], 'full', false, ['class' => 'dc26-nav-trigger__icon']); ?>
        <?php else : ?>
            <span class="dc26-nav-trigger__lines" aria-hidden="true">
                <span></span>
                <span></span>
                <span></span>
            </span>
        <?php endif; ?>
    </button>
</div>
