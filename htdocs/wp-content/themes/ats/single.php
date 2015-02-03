<?php
/**
 * The template for displaying a blog post detail page
 *
 * @package WordPress
 * @subpackage ATS
 */

get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="page-bg" <?php if (get_field('page_background_image')) { echo 'style="background-image: url(' . get_field('page_background_image') . ')"'; } ?>></div>
    <header class="page-header">
      <div class="content-container">
        <h1>In the News</h1>
      </div>
    </header>
      
    <div class="page-content">
      <div class="content-container group">
        <?php get_sidebar('page'); ?>

        <article class="with-sidebar">
          <div class="page-meta group">
            <nav class="nav-breadcrumbs">
              <?php echo ats_breadcrumbs(); ?>
            </nav>
            <div class="social-share">
              <div class="fb-like fb_iframe_widget" data-send="false" data-layout="button_count" data-width="89" data-show-faces="false" data-action="recommend" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=recommend&amp;app_id=&amp;href=http%3A%2F%2Fatsid.com%2Fcontracts-and-partnerships%2Fcontract-vehicles&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=89"><span style="vertical-align: bottom; width: 121px; height: 20px;"><iframe name="f3484613c" width="89px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?action=recommend&amp;app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2FbLBBWlYJp_w.js%3Fversion%3D41%23cb%3Df2571b975%26domain%3Datsid.com%26origin%3Dhttp%253A%252F%252Fatsid.com%252Ff24a897eac%26relation%3Dparent.parent&amp;href=http%3A%2F%2Fatsid.com%2Fcontracts-and-partnerships%2Fcontract-vehicles&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=89" class="" style="border: none; visibility: visible; width: 121px; height: 20px;"></iframe></span></div>            
              <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250"><img src="<?php bloginfo('template_url'); ?>/images/share.png" /></a>
              <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
            </div>
          </div>
          
          <div class="cms-copy">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>

          <nav class="nav-pagination">
            <?php
              global $wp_query;
              $big = 999999999; // need an unlikely integer

              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
              ) );
            ?>
          </nav>
        </article>
      </div>
    </div>
  <?php endwhile; ?>

<?php get_footer(); ?>
