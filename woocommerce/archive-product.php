<?php get_header(); ?>
<?php
$products = [];

if (have_posts()) { while(have_posts()) { the_post();
  $products[] = wc_get_product(get_the_ID());
} }

$data = [];
$data['products'] = format_products($products);
?>

<div class="container">
  <div class="separador breadcrumb">
    <?php woocommerce_breadcrumb(['delimiter' => ' > ']); ?>
  </div>
</div>

<article class="container products-archive">
  <nav class="filtro">
    <div class="filtro-item">
      <h2>Categorias</h2>
      <?php wp_nav_menu([
        'menu' => 'categorias',
        'menu_class' => 'filtro-categorias',
        'container' => false,
      ]); ?>
    </div>

    <div class="filtro-item filtro-attribute"> 
      <?php
        // Puxa uma lista com todos os atributos
        $attribute_taxonomies = wc_get_attribute_taxonomies();
        // Loop por cada um dos atributos
        foreach($attribute_taxonomies as $attribute) {
          // Utiliza a função the_widget de WordPress
          // para mostrar o widget já existente de WooCommerce
          the_widget('WC_Widget_Layered_Nav', [
            'title' =>  $attribute->attribute_label,
            'attribute' => $attribute->attribute_name,
          ]);
        }
      ?>
    </div>

    <div class="filtro-item">
      <h2>Preço</h2>
      <form class="filtro-preco">
        <label for="min_price">De R$</label>
        <input required type="text" name="min_price" id="min_price" value="<?php $_GET['min_price'] ?>">
        <label for="max_price">Até R$</label>
        <input required type="text" name="max_price" id="max_price" value="<?php $_GET['max_price'] ?>">
        <button type="submit">Filtrar</button>
      </form>
    </div>
  </nav>

  <main>
    <?php if ($data['products'][0]) {?>
      <?php woocommerce_catalog_ordering(); ?>
      <?php dorra_product_list($data['products']); ?>
      <?= get_the_posts_pagination(); ?>
    <?php } else {?>
      <p>Nenhum resultado para a sua busca</p>
    <?php } ?>
  </main>
</article>


<?php get_footer(); ?>