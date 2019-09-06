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

// Incluir funções que formata e lista produtos
include(get_template_directory() . '/inc/product-list.php');


// Rmover algumas class do body_class
function remove_some_body_class($classes) {
  $woo_class = array_search('woocommerce', $classes);
  $woopage_class = array_search('woocommerce-page', $classes);
  // verifica se é a pagina de arquivo ou produto
  $is_page = in_array('archive', $classes) || in_array('product-template-default', $classes);


  if ($woo_class && $woopage_class && $is_page) {
    unset($classes[$woo_class]);
    unset($classes[$woopage_class]);
  }
  return $classes;

}
add_filter('body_class', 'remove_some_body_class');

// Remover força de senha do woocommerce
function fa_remove_password_strength() {
  wp_dequeue_script( 'wc-password-strength-meter' );
  wp_deregister_script( 'wc-password-strength-meter' );
}
add_action( 'wp_enqueue_scripts', 'fa_remove_password_strength', 99999 );

// include função que altera o menu da minha conta 
include(get_template_directory() . '/inc/user-custom-menu.php');
// include função que altera os do checkout
include(get_template_directory() . '/inc/custom-checkout.php');
?>
