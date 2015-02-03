<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage ATS
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php 
global $page_name; bloginfo('name'); ($page_name) ? print " | ".$page_name: wp_title(' | ', true, 'left');
?></title>

<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts.css" type="text/css" media="screen, print" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script>var templateUrl = '<?= get_bloginfo("template_url"); ?>/';</script>
<?php wp_head(); ?>

</head>

  <?php if (is_front_page()) { ?>
	  <body id="home">
	<?php } else if (is_archive()) { ?>
	  <body class="archive">
	<?php } else if (is_home()) { ?>
	  <body class="blog">
	<?php } else if (is_single()) { ?>
	  <body class="single">
	<?php } else if (is_search()) { ?>
	  <body id="search">
	<?php } else if (is_404()) { ?>
	  <body id="404">
	<?php } else if (is_page()) { ?>
  	<body class="page" id="<?php echo $post->post_name; ?>">
  <?php } else { ?>
  	<body class="<?php echo $post->post_type; ?>" id="<?php echo $post->post_name; ?>">
  <?php } ?>

	  <a id="top"></a>

	  <div class="main-container">
      <header role="banner" class="group">
        <nav class="nav-banner">
          <div class="content-container group">
            <?php wp_nav_menu(array('container' => '', 'menu_class' => 'group', 'theme_location' => 'banner_menu')); ?>
            <div id="quick-contact">
              <?php echo do_shortcode('[gravityform id="2" name="Quick Contact" ajax="true" title="false" description="false"]'); ?>
            </div>
          </div>
        </nav>

        <nav class="nav-primary" role="navigation">
          <div class="content-container group">
			<a href="/" title="Home" class="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo_ats.png" alt="ATS"></a>
            <?php wp_nav_menu(array('container' => '', 'menu_class' => 'group', 'theme_location' => 'primary_menu')); ?>
            <section class="section-search">
              <form role="search" method="get" id="searchform" action="/">
	              <input type="text" value="" name="s" id="s" placeholder="Search ATSid.com">
	              <input type="submit" id="searchsubmit" value=""><div style="clear: both;"></div>
				</form>
			</section>
          </div>
        </nav>
      </header>

