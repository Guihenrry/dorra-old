<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
  <!-- Inicio head Wordppres -->
  <?php wp_head(); ?>
  <!-- Fim head Wordpress -->
</head>
<body <?php body_class(); ?>>

<?php
  $cart_count = WC()->cart->get_cart_contents_count();
?>

<header class="header">
  <a href="http://localhost/dorra/">Dorrá</a>
  <div class="busca" >
    <form action="<?php bloginfo('url'); ?>/loja" method="get" role="search">
      <input type="text" name="s" id="s" placeholder="Buscar" value="<?php the_search_query()?>">
      <input type="text" name="post_type" value="product" class="hidden">
      <input type="submit" value="Buscar" id="searchbutton">
    </form>
  </div>
  <nav>
    <a href="/dorra/minha-conta" class="minha-conta">Minha Conta</a>
    <a href="/dorra/carrinho" class="carrinho">Carrinho 
      <?php if($cart_count) { ?>
      <span class="carrinho-count"><?= $cart_count; ?></span> 
      <?php }?>
    </a>
  </nav>
</header>
