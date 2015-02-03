<?php
/**
 * The page sidebar
 *
 * @package WordPress
 * @subpackage ATS
 */
?>

<section class="section-sidebar">	
	
	<?php
	if(is_single() || is_home() || is_archive()) {
		$parent_page = get_page_by_path("meet-ats");
		$parent = $parent_page->ID;
	}
	else {
		if($post->post_parent)	{
			$ancestors = get_post_ancestors($post->ID);
			$root = count($ancestors)-1;
			$parent = $ancestors[$root];
		}
		else $parent = $post->ID;
	}
	$sidebarNav = wp_list_pages('child_of='.$parent.'&title_li=&echo=0&sort_column=menu_order');
	echo '<nav class="nav-sidebar"><ul>';
	echo '<li><a class="sectionTitle" href="'.get_permalink($parent).'">'.get_the_title($parent).'</a></li>';
	if($sidebarNav) echo $sidebarNav;
	echo '</ul></nav>';
	?>
	
	
	<!--
    <section class="section-referral">
      <a href="/contact-us?referral=customer" title="Contact Us">
        <div class="content">

          <h4><?php /*echo $customer_referral->post_title;*/ ?></h4>
          <?php /*echo apply_filters('the_content', $customer_referral->post_content);*/ ?>
        </div>
      </a>
    </section>
    -->
    
    <section class="section-news">
      <h4>In the News</h4>
      <ul>
        <?php
		$news = new WP_Query("posts_per_page=3&status=publish&order=DESC&order_by=date");
		while($news->have_posts()) { $news->the_post();
        	?>
			<li>
				<p class="date"><?php the_date(); ?></p>
				<p class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
			</li>
        <?php
		}
		wp_reset_query();
        ?>
      </ul>
    </section>

	<?php 
	if($testimonials) {
		
		echo '<section class="section-testimonials"><div class="content">';
		echo (get_the_title($parent) == "Careers") ? '<h4>Employee Testimonials</h4>': '<h4>Client Testimonials</h4>';
		echo '<ul class="slides group">';
		
		while($testimonials->have_posts()) { 
			$testimonials->the_post();
			echo '<li class="slide">';
			the_content();
			echo '<p class="source">-'.get_the_title().'</p>';
			echo '<p class="source-description">'.get_field('source_description').'</p>';
			echo '<a href="/testimonials" title="see more testimonials">> see more testimonials</a>';
			echo '</li>';
		}
		wp_reset_query();
		echo '</ul></div></section>';
	}
	?>

</section>           
