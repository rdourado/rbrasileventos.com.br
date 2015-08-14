<?php get_header() ?>
    <main class="main" role="main">
      <div class="cases wrap row">
        <h2 class="h1">Confira nossos últimos cases de sucesso</h2>
        <ul class="cases-list">
<?php
          while (have_posts()) : the_post();
          if (has_post_thumbnail()) :
?>
          <li class="cases-item">
            <a class="cover" href="<?php the_permalink() ?>" style="background-image: url(<?php
            $value = wp_get_attachment_image_src(get_post_thumbnail_id(), 'gallery');
            echo $value[0];
            ?>)">
              <div class="content">
                <strong><?php the_field('cliente') ?></strong>
                <?php the_title() ?>
              </div>
            </a>
          </li>
<?php
          endif;
          endwhile;
?>
        </ul>
        <!-- <div class="more">
          <a class="btn green" href="#">Carregar mais cases</a>
        </div> -->
      </div>
    </main>
<?php get_footer() ?>