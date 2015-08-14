<?php
/*
Template name: Marcas
*/
$i = 0;
?>
<?php get_header() ?>
    <main class="main" role="main">
      <div class="quotes">
        <?php while (have_rows('a_quotes')) : the_row(); ?>
        <div class="welcome cover" style="background-image: url(<?php the_sub_field('image_bg') ?>)">
          <div class="wrap">
            <blockquote class="content">
              <?php the_sub_field('quote') ?>
              <footer class="footer"><?php tag(get_sub_field('footer'), '[', ']', '<small>', '</small>') ?></footer>
            </blockquote>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php while (have_rows('b_list')) : the_row(); ?>
      <div id="lista-<?php echo ++$i; ?>" class="brands wrap row">
        <h2 class="h1"><?php the_sub_field('title') ?></h2>
        <?php if ($images = get_sub_field('list')) : ?>
        <ul class="brands-list">
          <?php foreach ($images as $img) : ?>
          <li class="brands-item"><?php image($img, 'brand') ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
      <?php endwhile; ?>
    </main>
<?php get_footer() ?>