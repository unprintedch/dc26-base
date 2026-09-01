<?php
declare(strict_types=1);

/**
 * Helpers partagés pour le rendu des blocs dc26/nav et dc26/nav-drawer.
 */

/**
 * A navigation-link block edited via the block bindings API (Pattern Overrides /
 * "connect to page") keeps its `url` attribute frozen at whatever it was when the
 * link was last saved in the editor — WP only re-resolves the binding there, not
 * when the block is parsed and hand-rendered outside core's own render pipeline
 * (as dc26/nav does for the off-canvas drawer). If the linked page's slug changes
 * afterwards (e.g. moved under a parent), this stale url 404s here while the
 * desktop header — rendered through core's Navigation block — stays correct.
 * Re-resolve from the bound post's live permalink instead of trusting the attribute.
 */
function dc26_nav_resolve_link_url(array $attrs): string {
    $bound_field = $attrs['metadata']['bindings']['url']['args']['field'] ?? null;
    $post_id     = $attrs['id'] ?? null;

    if ($bound_field === 'link' && $post_id) {
        $permalink = get_permalink((int) $post_id);
        if ($permalink) {
            return $permalink;
        }
    }

    return $attrs['url'] ?? '';
}

function dc26_nav_parse_blocks(array $blocks): array {
    $items = [];
    foreach ($blocks as $block) {
        if (!in_array($block['blockName'], ['core/navigation-link', 'core/navigation-submenu'], true)) {
            continue;
        }
        $attrs  = $block['attrs'] ?? [];
        $item   = [
            'label'    => $attrs['label'] ?? '',
            'url'      => dc26_nav_resolve_link_url($attrs),
            'target'   => !empty($attrs['opensInNewTab']) ? '_blank' : '',
            'children' => [],
        ];
        if ($block['blockName'] === 'core/navigation-submenu' && !empty($block['innerBlocks'])) {
            $item['children'] = dc26_nav_parse_blocks($block['innerBlocks']);
        }
        $items[] = $item;
    }
    return $items;
}

function dc26_nav_render_items(array $items): void {
    foreach ($items as $item) {
        $has_children = !empty($item['children']);
        ?>
        <li class="dc26-nav__item<?php echo $has_children ? ' dc26-nav__item--has-children' : ''; ?>">
            <?php if ($has_children) : ?>
                <button
                    class="dc26-nav__link dc26-nav__submenu-toggle"
                    type="button"
                    aria-expanded="false"
                >
                    <?php echo esc_html($item['label']); ?>
                    <span class="dc26-nav__chevron" aria-hidden="true"></span>
                </button>
                <ul class="dc26-nav__submenu" hidden>
                    <?php dc26_nav_render_items($item['children']); ?>
                </ul>
            <?php else : ?>
                <a
                    class="dc26-nav__link"
                    href="<?php echo esc_url($item['url']); ?>"
                    <?php if ($item['target']) : ?>target="<?php echo esc_attr($item['target']); ?>" rel="noopener noreferrer"<?php endif; ?>
                >
                    <?php echo esc_html($item['label']); ?>
                </a>
            <?php endif; ?>
        </li>
        <?php
    }
}

function dc26_nav_render(WP_Post $nav_post, string $class_name, string $submenu_trigger, string $font_size, string $block_id): void {
    $blocks = parse_blocks($nav_post->post_content);
    $items  = dc26_nav_parse_blocks($blocks);

    if (empty($items)) {
        if (current_user_can('edit_theme_options')) {
            echo '<p style="color:orange;padding:1rem;">dc26/nav : le menu sélectionné est vide.</p>';
        }
        return;
    }
    ?>
    <nav
        id="<?php echo esc_attr($block_id); ?>"
        class="<?php echo esc_attr($class_name); ?>"
        style="--nav-font-size: var(--wp--preset--font-size--<?php echo esc_attr($font_size); ?>);"
        data-trigger="<?php echo esc_attr($submenu_trigger); ?>"
        aria-label="<?php echo esc_attr($nav_post->post_title); ?>"
    >
        <ul class="dc26-nav__list">
            <?php dc26_nav_render_items($items); ?>
        </ul>
    </nav>
    <?php
}
