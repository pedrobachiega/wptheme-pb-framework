<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '' ); ?> <?php bloginfo( 'name' ); ?></title>
<!-- <link rel="stylesheet" type="text/css" media="screen" href="http://meyerweb.com/eric/tools/css/reset/reset.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/wp-defaults.css" />
<script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">

  <header>
    <h1>Wordpress simple</h1>
    <p>Feel free to customize it!</p>
    <nav>
      <ul>
        <?php wp_list_pages('title_li=&depth=0&sort_column=menu_order'); ?>
      </ul>
    </nav>
  </header>
