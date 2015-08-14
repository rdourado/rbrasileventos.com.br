<div class="social">
  <?php if (get_field('facebook', 'option')) { ?>
    <a class="icon facebook" href="<?php the_field('facebook', 'option') ?>" target="_blank">Facebook</a>
  <?php } if (get_field('instagram', 'option')) { ?>
    <a class="icon instagram" href="<?php the_field('instagram', 'option') ?>" target="_blank">Instagram</a>
  <?php } if (get_field('youtube', 'option')) { ?>
    <a class="icon youtube" href="<?php the_field('youtube', 'option') ?>" target="_blank">Youtube</a>
  <?php } ?>
</div>
