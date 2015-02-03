<?php
/**
 * The template for displaying a default content page
 *
 * @package WordPress
 * @subpackage ATS
 */

get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="page-bg" <?php if (get_field('page_background_image')) { echo 'style="background-image: url(' . get_field('page_background_image') . ')"'; } ?>></div>
    <header class="page-header">
      <div class="content-container">
        <h1><?php the_title(); ?></h1>
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
			
			
			
			<?php 
			// HISTORY PAGE
			if($post->post_name == "history") {
				echo '<div class="cms-copy">';
				?>

<script>$ = jQuery;</script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<script src="/wp-content/themes/ats/js/iscroll.js"></script>
<script src="/wp-content/themes/ats/timeline/timeline.js"></script>
<link href="/wp-content/themes/ats/timeline/timeline.css" type="text/css" rel="stylesheet" media="screen" />

<div id="timelineBox" title="Click, Drag, and Move"><div id="timelineSlider">
	<div id="timeline">
		<?php
		$years = array();
		while(have_rows('timeline', $post->ID)) {
			the_row();
			$theYear = get_sub_field('year');
			$years[$theYear] = array();
			while(have_rows('events')) {
				the_row();
				array_push($years[$theYear], get_sub_field('details'));
			}
		}	
		for($i=1977; $i<=2017; $i++) {
			if($years[$i]) { ?>
				<div class="year"><a><span><?php echo $i; ?></span></a>
					<div class="factoids"><line></line><ul>
						<?php
						foreach($years[$i] as $k => $v) {
							echo '<li>'.$v.'</li>';
						}
						?>
					</ul></div>
				</div>
			<?php
			}
			else echo '<div class="year empty"><a><span>'.$i.'</span></a></div>';
		}
		?>
	</div>
</div><img src="/wp-content/themes/ats/images/timeline-title.png" id="timelineTitle" /></div>

				<?php 
				the_content();
				echo '</div>';
			}
			
			// CONTACT PAGE
			else if($post->post_name == "contact-us") {
				the_content();
			}
			
			// ALL OTHER PAGES
			else {
				echo '<div class="cms-copy">';
				the_content();
				echo '</div>';
			}
			?>
        </article>
      </div>
    </div>
  <?php endwhile; ?>
  
<?php get_footer(); ?>
