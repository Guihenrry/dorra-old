<?php 

get_header(); 

$img_url = get_template_directory_uri() . '/img';

function format_single_product($id, $img_size = 'medium') {
  $product = wc_get_product($id);
  
  $gallery_ids = $product->get_gallery_attachment_ids();
  $gallery = [];
  if ($gallery_ids) {
    foreach($gallery_ids as $img_id) {
      $gallery[] = wp_get_attachment_image_src($img_id, $img_size)[0];
    }
  }

  $cuidados = [];
  if(have_rows('cuidados')) {
    while(have_rows('cuidados')) {
      the_row();
      $cuidados[] = [
        'src' => get_sub_field('icone'),
        'alt' => get_sub_field('descricao'),
      ];
    }
  }

  return [
    'id' => $id,
    'name' => $product->get_name(),
    'price' => $product->get_price_html(),
    'oferta' => $product->is_on_sale(),
    'link' => $product->get_permalink(),
    'sku' => $product->get_sku(),
    'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
    'gallery' => $gallery,
    'description' => $product->get_description(),
    'short_description' => $product->get_short_description(),
    'img_detalhe' => get_field('imagem_detalhe'),
    'cuidados' => $cuidados,
  ];
}
?>

<div class="container">
  <div class="separador breadcrumb">
    <?php woocommerce_breadcrumb(['delimiter' => ' > ']); ?>
  </div>
</div>

<div class="container notificacao">
  <?php wc_print_notices(); ?>
</div>

<?php 
if(have_posts()) { while(have_posts()) { the_post(); 
  $produto = format_single_product(get_the_ID(), 'medium');
?>

<main class="container produto <?php if($produto['oferta']) { echo 'oferta'; } ?> ">
  <div class="product-gallery">
    <div class="produto-gallery-main">
      <img data-gallery="main" src="<?= $produto['img'] ?>" alt="<?= $produto['name'] ?>">
    </div>

    <?php if ($produto['gallery']) { ?>
    <ul class="produto-gallery-list">
      <li><img data-gallery="list" src="<?= $produto['img'] ?>" alt="<?= $produto['name'] ?>"></li>
      <?php foreach($produto['gallery'] as $img) {?>
        <li><img data-gallery="list" src="<?= $img; ?>" alt="<?= $produto['name'] ?>"></li>
      <?php } ?>
    </ul>
    <?php } ?>
  </div> 

  <div class="produto-datail"> 
    <h1><?= $produto['name'] ?></h1>
    <p class="preco"><?= $produto['price']; ?></p>
    <?php woocommerce_template_single_add_to_cart(); ?>
    <a href="#" class="tabela-medidas" data-modal="open">Tabela de medidas</a>
  </div>

  <div class="produto-descricao">
    <div>
      <h3>Descrição</h3>

      <?php if($produto['sku']) { ?>
      <span class="sku"><?= $produto['sku']; ?></span>
      <?php } ?>

      <p class="descricao"><?= $produto['description']; ?></p> 
      <div class="short_description">
        <?= $produto['short_description']; ?>
      </div>

      <?php if($produto['cuidados']) { ?>
      <h3>Cuidados</h3>
      <ul class="cuidado-list">
        <?php foreach($produto['cuidados'] as $cuidado) { ?>
        <li><img src="<?= $cuidado['src']; ?>" alt="<?= $cuidado['alt']; ?>"></li>
        <?php } ?>
      </ul>
      <?php } ?>
    </div>

    <?php if($produto['img_detalhe']) { ?>
    <div class="img-detalhe">
      <img src="<?= $produto['img_detalhe']; ?>" alt="<?= $produto['name']; ?>">
    </div>
    <?php }?>

  </div>
</main>
<?php } } // Fecha o loop ?>

<?php
  $related_ids = wc_get_related_products( $produto['id'], 3);
  $related_products = [];
  foreach($related_ids as $product_id ) {
    $related_products[] = wc_get_product($product_id);
  }
  $related = format_products($related_products);
?>

<section class="relacionados">
  <div class="container">
    <h2 class="subtitulo separador">Você pode gostar também</h2>
    <?php  dorra_product_list($related); ?>
  </div>
</section>

<section  class="modal-container" data-modal="container">
  <div class="modal-medidas">
    <h2>Tabela de Medidas</h2>
    <img src="<?= $img_url . '/img-medidas.jpg' ?>" alt="medidas">
    <div class="medidas-info">
      <p>Compare as medidas do seu corpo com esta tabela. Aqui neste site você pode <a href="#">imprimir uma fita metrica</a></p>
      <table>
        <tr>
          <th>Tamanho</th>
          <th>Busto</th>
          <th>Cintura</th>
          <th>Quadril</th>
        </tr>
        <tr>
          <td>P</td>
          <td>66-72</td>
          <td>60-66</td>
          <td>70-76</td>
        </tr>
        <tr>
          <td>M</td>
          <td>72-84</td>
          <td>66-72</td>
          <td>76-82</td>
        </tr>
        <tr>
          <td>G</td>
          <td>84-90</td>
          <td>72-84</td>
          <td>82-94</td>
        </tr>
      </table>
    </div>
    <button data-modal="close" class="fechar">Fechar</button>
  </div>
</section>

<?php get_footer(); ?>
