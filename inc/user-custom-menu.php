<?php 

function dorra_account_custom_menu($menu_links) {
  unset($menu_links['downloads']);

  return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'dorra_account_custom_menu');
?>