<?php
/**
 * Nav block template.
 */

require_once get_template_directory() . '/functions/dc26-nav-render.php';

$block_id = !empty($block['anchor']) ? $block['anchor'] : $block['id'];

$class_name = 'dc26-nav';
if (!empty($block['className'])) $class_name .= ' ' . $block['className'];

$nav_post        = get_field('nav_menu');
if ($nav_post && !($nav_post instanceof WP_Post)) {
    // WPML renvoie parfois l'ID brut au lieu de l'objet quand le menu n'a pas
    // de traduction pour la langue courante.
    $nav_post = get_post($nav_post);
}

// Aucun menu choisi : on retombe sur le wp_navigation publié le plus récent,
// comme le fait le bloc core Navigation. Évite un tiroir vide sur un nouveau site.
$is_fallback = false;
if (!($nav_post instanceof WP_Post)) {
    $latest = get_posts([
        'post_type'        => 'wp_navigation',
        'post_status'      => 'publish',
        'numberposts'      => 1,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'suppress_filters' => false,
    ]);
    $nav_post    = $latest[0] ?? null;
    $is_fallback = $nav_post instanceof WP_Post;
}
$orientation     = get_field('nav_orientation') ?: 'vertical';
$font_size       = get_field('nav_font_size') ?: 'medium';
$submenu_trigger = get_field('nav_submenu_trigger') ?: 'click';

$class_name .= ' dc26-nav--' . esc_attr($orientation);
$class_name .= ' dc26-nav--' . esc_attr($submenu_trigger);

if ($is_preview) : ?>
    <div class="admin-view-only flex items-center justify-center bg-slate-100 p-6 gap-3">
        <span class="dashicons dashicons-list-view"></span>
        <span>Nav — <?php
            if ($nav_post) {
                echo esc_html($nav_post->post_title) . ($is_fallback ? ' (menu le plus récent par défaut)' : '');
            } else {
                echo 'Aucun menu disponible';
            }
        ?></span>
    </div>
    <?php return;
endif;

if (!$nav_post) {
    if (current_user_can('edit_theme_options')) {
        echo '<p style="color:red;padding:1rem;">dc26/nav : aucun menu de navigation disponible.</p>';
    }
    return;
}

dc26_nav_render($nav_post, $class_name, $submenu_trigger, $font_size, $block_id);
