<?php
/**
 * Enqueue des assets pour le thème dc26-base
 *
 * @package dc26-base
 */

declare(strict_types=1);

/**
 * Récupère la version d'un asset basée sur filemtime pour le cache busting
 *
 * @param string $file_path Chemin relatif au répertoire du thème
 * @return string Version basée sur filemtime ou '1.0.0' en fallback
 */
function dc26_get_asset_version(string $file_path): string {
  $full_path = get_template_directory() . '/' . ltrim($file_path, '/');
  
  if (file_exists($full_path)) {
    return (string) filemtime($full_path);
  }
  
  return '1.0.0';
}


/**
 * Enqueue des styles et scripts principaux du thème
 */
function dc26_enqueue_styles(): void {
  $style_version = dc26_get_asset_version('build/style.css');
  $script_version = dc26_get_asset_version('build/app.js');
  
  wp_enqueue_style(
    'dc26-front-styles',
    get_template_directory_uri() . '/build/style.css',
    array(),
    $style_version
  );
  
  wp_enqueue_script(
    'dc26-front-scripts',
    get_template_directory_uri() . '/build/app.js',
    array('jquery'),
    $script_version,
    true
  );
  
  wp_localize_script(
    'dc26-front-scripts',
    'dc26Ajax',
    array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('dc26_ajax_nonce'),
    )
  );
}
add_action('wp_enqueue_scripts', 'dc26_enqueue_styles');
