<?php 
// Template Name: Home
get_header(); 
?>

<?php
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
?>

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

<?php if(have_posts()) { while(have_posts()) {  the_post();  ?>
  <h1><?php the_title(); ?></h1>
  <main><?php the_content(); ?></main>
<?php } } ?>

<?php get_footer(); ?>