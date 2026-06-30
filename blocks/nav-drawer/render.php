<?php
/**
 * Nav Drawer block template.
 */

$block_id = !empty($block['anchor']) ? $block['anchor'] : 'dc26-nav-drawer';

$class_name = 'dc26-nav-drawer';
if (!empty($block['className'])) $class_name .= ' ' . $block['className'];

$position       = get_field('nd_position') ?: 'right';
$width          = get_field('nd_width') ?: '420';
$bg_color       = get_field('nd_bg_color') ?: 'white';
$show_overlay   = get_field('nd_show_overlay') !== false;
$show_close_btn = get_field('nd_show_close_btn') !== false;

$class_name .= ' dc26-nav-drawer--' . esc_attr($position);
?>

<?php if ($show_overlay && !$is_preview) : ?>
<div class="dc26-nav-drawer__overlay" aria-hidden="true"></div>
<?php endif; ?>

<div
    id="<?php echo esc_attr($block_id); ?>"
    class="<?php echo esc_attr($class_name); ?>"
    style="--drawer-width: <?php echo esc_attr($width); ?>px; --drawer-bg: var(--wp--preset--color--<?php echo esc_attr($bg_color); ?>);"
    <?php if (!$is_preview) : ?>
    role="dialog"
    aria-modal="true"
    aria-hidden="true"
    aria-label="<?php esc_attr_e('Menu de navigation', 'dc26'); ?>"
    <?php endif; ?>
>
    <?php if ($show_close_btn && !$is_preview) : ?>
    <button class="dc26-nav-drawer__close" type="button" aria-label="<?php esc_attr_e('Fermer le menu', 'dc26'); ?>">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php endif; ?>

    <div class="dc26-nav-drawer__content">
        <InnerBlocks />
    </div>
</div>
