<!DOCTYPE html>
<html <?php language_attributes('html') ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <?php wp_head() ?>
  </head>
  <body <?php body_class('no-js') ?>>
    <header class="head" role="banner">
      <div class="wrap">
        <h1 class="logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name') ?></a></h1>
        <nav class="nav" role="navigation">
          <?php wp_nav_menu( array(
              'theme_location' => 'primary',
              'container' => '',
              'menu_class' => 'menu',
              'depth' => 1,
            ) ) ?>
          <?php get_template_part('social') ?>
        </nav>
      </div>
    </header>
    <hr>
