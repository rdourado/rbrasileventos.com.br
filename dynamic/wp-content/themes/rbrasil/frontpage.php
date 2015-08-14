<?php
/*
Template name: Frontpage
*/
?>
<?php get_header() ?>
<?php while (have_posts()) : the_post(); ?>

    <div class="jumbotron cover" style="background-image: url(<?php the_field('a_image_bg') ?>)">
      <div class="wrap row">
        <div class="content">
          <?php the_field('a_text') ?>
        </div>
        <?php get_template_part('social') ?>
      </div>
    </div>

    <main class="main" role="main">

      <?php $loop = new WP_Query('posts_per_page=6'); ?>
      <div class="cases wrap row">
        <h2 class="h1">Confira nossos últimos cases de sucesso</h2>
        <ul class="cases-list">
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          <li class="cases-item">
            <a class="cover" href="<?php the_permalink() ?>" style="background-image: url(http://dummyimage.com/300x300)">
              <div class="content">
                <strong>Schin</strong>
                <?php the_title() ?>
              </div>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
        <p class="more">
          <span>Nossa experiência vai te surpreender.<br>Um pouco dela você encontrará aqui:</span>
          <a class="btn green" href="#">Conheça outros cases</a>
        </p>
      </div>
      <?php wp_reset_postdata() ?>

      <?php if (get_field('b_image_bg') && get_field('b_text')) : ?>
      <div class="features cover" style="background-image: url(<?php the_field('b_image_bg') ?>)">
        <div class="wrap">
          <div class="image">
            <?php image(get_field('b_image')) ?>
          </div>
          <div class="content row">
            <?php the_field('b_text') ?>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="partners row">
        <?php if ($images = get_field('c_gallery')) : ?>
        <div class="wrap">
          <h2 class="h1">Agências parceiras</h2>
          <ul class="partners-list">
            <?php foreach ($images as $img) : ?>
            <li class="partners-item"><?php image($img, 'brand') ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>

      <?php if ( $location = get_field('mapa', 'option') ) : ?>
      <div class="location">
        <div class="wrap">
          <h2 class="h1">Onde nos encontrar</h2>
        </div>
        <div class="map">
          <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
        <div class="content">
          <address class="vcard">
            <span class="fn org"><?php bloginfo('name') ?></span>
            <br>
            <span class="adr">
              <span class="street-address"><?php the_field('endereco', 'option') ?></span>
              -
              <br>
              <?php the_field('bairro', 'option') ?> -
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
      <?php endif; ?>

    </main>
<?php endwhile; ?>
<?php get_footer() ?>