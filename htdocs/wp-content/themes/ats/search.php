<?php
/**
 * The template for displaying the search results
 *
 * @package WordPress
 * @subpackage ATS
 */

get_header(); ?>

  <div class="page-bg"></div>
  <header class="page-header">
    <div class="content-container">
      <h1>Search</h1>
    </div>
  </header>
    
  <div class="page-content">
    <div class="content-container group">
      <?php get_sidebar('page'); ?>

      <article class="with-sidebar">
        <?php if (have_posts()) { ?>
          <?php
            $mySearch = new WP_Query("s=$s&showposts=-1");
            $numResults = $mySearch->post_count;
          ?>
          <p>The following <?php echo $numResults; ?> items matched the search <span class="search-term"><?php echo get_search_query(); ?></span></p>

          <?php while (have_posts()) : the_post(); ?>
            <article class="group article-excerpt">
              <div class="thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('blog-thumbnail'); ?></a>
              </div>
              <div class="post-content">
                <p class="date"><?php the_time(get_option('date_format')); ?></p>
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" title="Read more">Read more &#187;</a>
              </div>
            </article>
          <?php endwhile; ?>
        <?php } ?>

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
  				
<?php get_footer(); ?>
