<?php
/**
 * The Sidebar containing the widget areas for the blog
 *
 * @package WordPress
 * @subpackage ATS
 */
?>

  <section class="section-sidebar">
    <?php if (!dynamic_sidebar()) { ?>
	    <ul>
        <?php dynamic_sidebar('sidebar'); ?>
      </ul>
    <?php } else { ?>
      <h3>Archives</h3>
      <ul>
        <?php wp_get_archives('type=yearly'); ?>
      </ul>
      
      <h3>Categories</h3>
      <ul>
        <?php wp_list_categories('title_li='); ?>
      </ul>
    <?php } ?>
  </section>           
