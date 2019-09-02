<?php 
// Template Name: Home
get_header(); 

  $img_url = get_template_directory_uri() . '/img';

  // Formatar Dados do Banner
  $banner = [];
  if (have_rows('banner')) { while(have_rows('banner')) { the_row();
    $id_imagem = get_sub_field('imagem');
    $banner[] = [
      'src' => wp_get_attachment_image_src($id_imagem, 'banner')[0],
      'alt' => get_sub_field('descricao_imagem'),
    ];
  } }

  // Novidades pegar ultimos 6 produtos adicionados
  $novidades = wc_get_products([
    'limit' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
  ]);

  // Slide pega os 6 ultimos produtos com a tag slide
  $produtos_slide = wc_get_products([
    'limit' => 6,
    'tag' => ['slide'],
  ]);

  // Mais Populares pega os 6 produtos mais vendidos
  $mais_populares = wc_get_products([
    'limit' => 6,
    'meta_key' => 'total_sales',
    'orderby'  => 'meta_value_num',
    'order' => 'DESC',
  ]);


  $data = [];
  $data['novidades'] = format_products($novidades);
  $data['slide'] = format_products($produtos_slide, 'slide');
  $data['mais_populares'] = format_products($mais_populares);
?>

<?php if(have_posts()) { while(have_posts()) {  the_post();  ?>

<section class="banner">
	<ul data-slide="banner">
		<?php foreach($banner as $item) { ?>
		<li><img src="<?= $item['src']; ?>" alt="<?= $item['alt']; ?>"></li>
		<?php } ?>
	</ul>
</section>

<section class="vantagens">
	<ul data-slide="vantagem">
		<?php if (have_rows('vantagens')) { while(have_rows('vantagens')) { the_row(); ?>
		<li>
			<img src="<?php the_sub_field('icone'); ?>" alt="icone" class="icon">
			<p><?php the_sub_field('texto'); ?></p>
		</li>
		<?php } } ?>
	</ul>
</section>

<section class="container">
	<h2 class="subtitulo separador">Novidades</h2>
	<?php  dorra_product_list($data['novidades']); ?>
</section>

<section class="slide-wrapper">
  <ul class="slide">
    <?php foreach($data['slide'] as $product) {?>
    <li class="slide-item">
      <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
      <div class="slide-info">
        <div>
          <span class="slide-preco"><?= $product['price']; ?></span>
          <h2><?= $product['name']; ?></h2>
        </div>
        <div>
          <a href="<?= $product['link']; ?>" class="btn-link">Ver Produto</a>
        </div>
      </div>
    </li>
    <?php }?>
  </ul>
</section>

<section class="container">
	<h2 class="subtitulo separador">Mais Populares</h2>
	<?php  dorra_product_list($data['mais_populares']); ?>
</section>

<section class="container quotes">
  <ul data-slide="quote">
    <?php if(have_rows('quote')) { while(have_rows('quote')) { the_row(); ?>
    <li>
      <blockquote>
        <p><?php the_sub_field('comentario'); ?></p>
        <cite><?php the_sub_field('autor'); ?></cite>
      </blockquote>
    </li>
    <?php } } ?>
  </ul>
</section>

<?php } } ?>
<?php get_footer(); ?>
