<?php get_header() ?>
    <main class="main" role="main">
      <?php while (have_posts()) : the_post(); ?>
      <article class="entry">

        <div class="thumbnail cover" style="background-image: url(<?php the_field('image_bg') ?>)">
          <?php image(get_field('image_bg')) ?>
        </div>

        <div class="wrap row">

          <h1 class="h4">
            <?php the_title() ?>
            <small><?php the_field('cliente') ?></small>
          </h1>
          <div class="content">
            <?php the_field('descricao') ?>
          </div>
          <div class="meta">
            <p>
              <?php my_field('agencia', 'Agência: <strong>$1', '</strong><br>') ?>
              <?php my_field('cliente', 'Cliente: <strong>$1', '</strong>') ?>
            </p>
            <p>
              <?php my_field('periodo', 'Período: $1', '<br>') ?>
              <?php my_field('cidade', 'Cidade: $1') ?>
              <?php my_field('outros', '<br>') ?>
            </p>
          </div>

          <?php if ($images = get_field('galeria')) : ?>
          <div class="masonry">
            <h2 class="h1">Galeria de Imagens</h2>
            <div class="grid">
              <div class="grid-sizer"></div>
              <div class="gutter-sizer"></div>
              <?php foreach ($images as $i => $img) : ?>
              <div class="grid-item <?php shape($i) ?>" style="background-image: url(<?php echo $img['sizes']['gallery']; ?>)">
                <a class="fancybox" rel="group" href="<?php echo $img['url']; ?>"><?php image($img, 'gallery') ?></a>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>

          <div class="navigation">
            <div class="prev"><?php next_post_link('%link') ?></div>
            <div class="next"><?php previous_post_link('%link') ?></div>
            <!-- <a class="prev" href="#"><small>Case anterior:</small>
            Conferência Havaianas 2014</a>
            <a class="next" href="#"><small>Próximo case:</small>
            Viva a Tunaína!</a> -->
            <a class="all" href="<?php echo esc_url(get_category_link(1)); ?>">Ver todos<br>os cases</a>
          </div>
        </div>

      </article>
      <?php endwhile; ?>
    </main>
<?php get_footer() ?>