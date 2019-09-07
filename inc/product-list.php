<?php

// Formata lista de produtos que veio do wc_get_products
function format_products($products, $img_size = 'medium') {
  $products_final = [];

  foreach($products as $product) {
    $products_final[] = [
      'name' => $product->get_name(),
      'price' => $product->get_price_html(),
      'link' => $product->get_permalink(),
      'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
      'oferta' => $product->is_on_sale(),
    ]; 
  }

  return $products_final;
} 


// Retorna HTML com lista de produtos


function dorra_product_list($products) { ?>
  <ul class="produtos-lista">
    <?php foreach($products as $product) { ?>
    <li class="produto-item <?php if($product['oferta']) { echo 'oferta'; } ?>">
      <a href="<?= $product['link']; ?>">
        <div class="produto-info">
          <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
          <span class="preco"><?= $product['price']; ?></span>
          <h2><?= $product['name']; ?></h2>
        </div>
        <div class="produto-overlay">
          <span class="btn-link">Ver Mais</span>
        </div>
      </a>
    </li>
    <?php }?>
  </ul>
<?php  
}
?>