    <hr>
    <footer class="foot" role="contentinfo">
      <div class="wrap">
        <address class="vcard">
          <span class="fn org"><?php bloginfo('name') ?></span>
          <span class="adr">
            <span class="street-address"><?php the_field('endereco', 'option') ?></span>
            - <?php the_field('bairro', 'option') ?>
            - <span class="locality"><?php the_field('cidade', 'option') ?></span>
            - <span class="region"><?php the_field('uf', 'option') ?></span>
          </span>
          <br>
          <span class="tel"><?php the_field('telefone_1', 'option') ?></span>
          <span class="tel"><?php the_field('telefone_2', 'option') ?></span>
          <a class="email" href="mailto:<?php email() ?>"><?php email() ?></a>
        </address>
        <?php get_template_part('social') ?>
      </div>
    </footer>
    <?php wp_footer() ?>
  </body>
</html>
