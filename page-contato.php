<?php
// Template Name: Contato
get_header();
?>

<main class="container contato">
  <h1 class="subtitulo">Contato</h1>
  <form action="<?php echo get_template_directory_uri(); ?>/enviar.php" method="post" name="form" class="formphp grid-8 contato_form">
			<label for="nome">Nome</label>
			<input id="nome" name="nome" type="text">
			<label for="email">E-mail</label>
			<input id="email" name="email" type="text">
			<label for="telefone">Telefone</label>
			<input id="telefone" name="telefone" type="text">

			<label class="nao-aparece">Se você não é um robô, deixe em branco.</label>
			<input type="text" class="nao-aparece" name="leaveblank">
			<label class="nao-aparece">Se você não é um robô, não mude este campo.</label>
			<input type="text" class="nao-aparece" name="dontchange" value="http://">

			<label for="mensagem">Mensagem</label>
			<textarea name="mensagem" id="mensagem" rows="5"></textarea>

			<button id="enviar" name="enviar" type="submit" class="btn btn-preto">Enviar Mensagem</button>
		</form>
		
		<section class="contato-dados">
			<ul>
				<?php if(have_rows('dados')) { while(have_rows('dados')) { the_row(); ?>
				<li>
					<h3><?php the_sub_field('titulo'); ?></h3>
					<p><?php the_sub_field('valor'); ?></p>
				</li>
				<?php } }?>
			</ul>

			<h3>Redes Sociais</h3>
			<?php include(get_template_directory() . '/inc/redes-sociais.php');?>
		</section>
</main>

<?php get_footer(); ?>