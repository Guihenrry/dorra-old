<?php 

$contato = get_page_by_title('contato'); 
$img_url = get_stylesheet_directory_uri() . '/img';

// Pegar o endereço do wooommerce
$countries = WC()->countries;
$base_city = $countries->get_base_city();
$base_state = $countries->get_base_state();
$address = "$base_city, $base_state";

?> 
  
  <footer class="footer">

    <div class="container footer-info">
      <section class="footer-sobre">
        <h3>Sobre a Dorrá</h3>
        <p><?php the_field('texto_sobre', $contato); ?></p>
      </section>

      <section>
        <h3>Mapa do site</h3>
        <?php
          wp_nav_menu([
            'menu' => 'mapa_do_site',
            'container' => 'nav',
            'container_class' => 'mapa-do-site',
          ]);
        ?>
      </section>

      <section>
        <h3>Redes Sociais</h3>
        <?php include(get_template_directory() . '/inc/redes-sociais.php');?>
      </section>

      <div>
        <section class="footer-pagamento">
          <h3>Pagamento</h3>
          <ul>
            <?php if(have_rows('pagamento', $contato)) { while(have_rows('pagamento', $contato)) { the_row(); ?>
            <li><img src="<?php the_sub_field('icone', $contato); ?>" alt="<?php the_sub_field('nome', $contato); ?>"></li>
            <?php } }?>
          </ul>
        </section>

        <section>
          <h3>Segurança</h3>
          <img src="<?= $img_url; ?>/selo-ssl.png" alt="selo ssh">
        </section>
      </div>
    </div>

    <small class="footer-copy"><?php bloginfo('name'); ?> &copy; <?= date('Y'); ?> - <?= $address; ?></small>
  </footer>

  <!-- Inicio footer wordpress -->
  <?php wp_footer(); ?>
  <!-- fim footer wordpress -->
  <script src="<?= get_template_directory_uri(); ?>/main.js"></script>
</body>
</html>