<?php 
// Adicionar suporte ao woocommerce
function dorra_add_woocommerce_support() {
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'dorra_add_woocommerce_support');

// Registrar o css ao tema 
function dorra_css() {
  wp_register_style('dorra-style', get_template_directory_uri() . '/style.css' , [], '1.0.0', false);
  wp_enqueue_style('dorra-style');
}
add_action('wp_enqueue_scripts', 'dorra_css');

// Total de produtos ppr pagina na pagina de de arquivo (loja)
function dorra_loop_shop_per_page() {
  return 6;
}
add_filter('loop_shop_per_page', 'dorra_loop_shop_per_page');

// Adicionar tamanhos de imagens
function dorra_custom_images() {
  update_option('medium_crop', 1);
  // banner
  add_image_size('banner', 1260, 450, ['center', 'top']);
  // slide
  add_image_size('slide', 570, 680, ['center', 'top']);
}
add_action('after_setup_theme', 'dorra_custom_images');

?>