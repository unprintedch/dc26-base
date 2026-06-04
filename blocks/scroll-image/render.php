<?php
declare(strict_types=1);

/**
 * Scroll Image block template.
 *
 * @param array  $block      Block settings and attributes.
 * @param string $content    Inner HTML.
 * @param bool   $is_preview True in the block editor preview.
 * @param int    $post_id    Current post ID.
 */

$block_id   = !empty($block['anchor']) ? $block['anchor'] : $block['id'];
$class_name = 'dc26-scroll-image';
if (!empty($block['className'])) $class_name .= ' ' . $block['className'];

$img_default  = get_field('image_default');
$img_scroll   = get_field('image_scroll');
$threshold    = (int) (get_field('scroll_threshold') ?: 64);
$max_height   = (int) (get_field('max_height') ?: 0);
$link_home    = (bool) get_field('link_home');

if ($is_preview) {
    $label = $img_default ? esc_html($img_default['title']) : 'Image par défaut non définie';
    echo '<div style="padding:1.5rem;background:#f5f6f7;text-align:center;border:1px dashed #B9C0C9;">';
    echo '<strong>Image Scroll</strong> — ' . esc_html($label);
    echo '</div>';
    return;
}

if (!$img_default && !$img_scroll) {
    return;
}

$inline_style = $max_height ? ' style="--si-max-height:' . esc_attr((string) $max_height) . 'px"' : '';
?>
<div
    id="<?php echo esc_attr($block_id); ?>"
    class="<?php echo esc_attr($class_name); ?>"
    data-scroll-threshold="<?php echo esc_attr((string) $threshold); ?>"<?php echo $inline_style; ?>
>
    <?php if ($link_home) : ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="dc26-scroll-image__link" aria-label="<?php esc_attr_e('Accueil', 'dc26'); ?>">
    <?php endif; ?>

    <div class="dc26-scroll-image__wrap">

        <?php if ($img_default) : ?>
        <img
            class="dc26-scroll-image__default"
            src="<?php echo esc_url($img_default['url']); ?>"
            alt="<?php echo esc_attr($img_default['alt']); ?>"
            width="<?php echo esc_attr((string) ($img_default['width'] ?? '')); ?>"
            height="<?php echo esc_attr((string) ($img_default['height'] ?? '')); ?>"
            loading="eager"
            decoding="async"
        >
        <?php endif; ?>

        <?php if ($img_scroll) : ?>
        <img
            class="dc26-scroll-image__on-scroll"
            src="<?php echo esc_url($img_scroll['url']); ?>"
            alt="<?php echo esc_attr($img_scroll['alt']); ?>"
            width="<?php echo esc_attr((string) ($img_scroll['width'] ?? '')); ?>"
            height="<?php echo esc_attr((string) ($img_scroll['height'] ?? '')); ?>"
            loading="eager"
            decoding="async"
        >
        <?php endif; ?>

    </div>

    <?php if ($link_home) : ?>
    </a>
    <?php endif; ?>

</div>
