<?php
/*
Template name: Sobre
*/
?>
<?php get_header() ?>
    <main class="main" role="main">

      <div class="welcome cover" style="background-image: url(<?php the_field('a_image_bg') ?>)">
        <div class="wrap">
          <div class="content">
            <?php the_field('a_text') ?>
          </div>
        </div>
      </div>

      <div class="complement cover" style="background-image: url(<?php the_field('b_image_bg') ?>)">
        <div class="wrap">
          <div class="image">
            <?php image(get_field('b_image')) ?>
          </div>
          <div class="content">
            <?php the_field('b_text') ?>
          </div>
        </div>
      </div>

      <div class="banners wrap">
        <ul class="banners-list">
          <li class="banners-item">
            <a href="#" style="background-image: url(<?php url() ?>img/lightbulb.png)">Conheças as agências de publicidade que acreditam em nosso trabalho.</a>
          </li>
          <li class="banners-item">
            <a href="#" style="background-image: url(<?php url() ?>img/speaker.png)">Ao longo do tempo nossa carta de marcas vem só aumentando.</a>
          </li>
        </ul>
      </div>

      <div class="work wrap row">
        <h2 class="h1">O que fazemos</h2>
        <?php the_field('c_text') ?>
        <div class="board-wrap">
          <div class="board-item">
            <ul class="content">
              <?php while (have_rows('c_list_1')) : the_row(); ?>
              <li><?php tag(get_sub_field('item'), '[', ']', '<small>', '</small>') ?></li>
              <?php endwhile; ?>
            </ul>
          </div>
          <div class="board-item cover" style="background-image: url(<?php the_field('c_image_1') ?>)"></div>
          <div class="board-item">
            <ul class="content">
              <?php while (have_rows('c_list_2')) : the_row(); ?>
              <li><?php tag(get_sub_field('item'), '[', ']', '<small>', '</small>') ?></li>
              <?php endwhile; ?>
            </ul>
          </div>
          <div class="board-item cover" style="background-image: url(<?php the_field('c_image_2') ?>)"></div>
        </div>
      </div>

      <?php if (get_field('e_image_bg') && get_field('e_text')) : ?>
      <div class="features cover" style="background-image: url(<?php the_field('e_image_bg') ?>)">
        <div class="wrap">
          <div class="image">
            <?php image(get_field('e_image')) ?>
          </div>
          <div class="content row">
            <?php the_field('e_text') ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="team wrap">
        <h2 class="h1">Nossa equipe</h2>
        <ul class="team-list">
          <?php while (have_rows('d_list')) : the_row(); ?>
          <li class="team-item">
            <?php image(get_sub_field('image'), 'avatar') ?>
            <h3 class="h3">
              <small><?php the_sub_field('job') ?></small>
              <?php the_sub_field('name') ?>
            </h3>
            <p class="footer">
              <?php echo antispambot(get_sub_field('email')); ?>
              <br><?php the_sub_field('phone') ?>
            </p>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>

      <div class="location">
        <div class="wrap">
          <h2 class="h1">Onde nos encontrar</h2>
        </div>
        <div class="map"></div>
        <div class="content">
          <address class="vcard">
            <span class="fn org"><?php bloginfo('name') ?></span>
            <br>
            <span class="adr">
              <span class="street-address"><?php the_field('endereco', 'option') ?></span>
              - <br><?php the_field('bairro', 'option') ?> -
              <span class="locality"><?php the_field('cidade', 'option') ?></span>
              <span class="region"><?php the_field('uf', 'option') ?></span>
            </span>
            <br>
            <br>
            <span class="tel"><?php the_field('telefone_1', 'option') ?></span>
            <br>
            <span class="tel"><?php the_field('telefone_2', 'option') ?></span>
            <br>
            <br>
            <a class="email" href="mailto:<?php email() ?>"><?php email() ?></a>
          </address>
          <p>Ou se você preferir,
          <a class="btn green" href="mailto:<?php email() ?>">Fale com nosso atendimento</a></p>
        </div>
      </div>

    </main>
<?php get_footer() ?>