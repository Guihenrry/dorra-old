<?php

function dorra_custom_checkout($fields) {
  unset($fields['billing']['billing_company']);
  return $fields;
}
add_filter('woocommerce_checkout_fields', 'dorra_custom_checkout')

?>