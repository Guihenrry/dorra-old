<?php $contato = get_page_by_title('contato'); ?>

<ul class="social-icons">
	<?php if(have_rows('social', $contato)) { while(have_rows('social', $contato)) { the_row(); ?>
	<li>
		<a href="<?php the_sub_field('link', $contato); ?>"  target="_blank">
		  <img src="<?php the_sub_field('icone', $contato); ?>" alt="<?php the_sub_field('nome', $contato); ?>">
		</a>
	</li>
	<?php } }?>
</ul>
