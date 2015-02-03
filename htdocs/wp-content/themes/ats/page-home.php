<?php
/**
 * The template for displaying the home page
 *
 * @package WordPress
 * @subpackage ATS
 */

get_header(); 

the_post();
?>

	<section class="section-carousel group">
		<ul class="slides group">
			<?php 
			$slides = get_field('page_carousels'); 
			if(have_rows('page_carousels')) {
				while(have_rows('page_carousels')) { 
					the_row();
					?>
					<li class="slide" style="background-image: url('<?php echo get_sub_field('slide_background_image'); ?>')">
						<div class="content-container">
							<div class="text-elements">
								<div class="description"><?php echo get_sub_field('description'); ?></div>
								<a class="bigButton subject" href="<?php echo get_sub_field('button_link'); ?>"><?php echo get_sub_field('subject'); ?></a>
							</div>
							<?php
							if(get_sub_field('graphic')) echo '<img class="infographic" src="'.get_sub_field('graphic').'" />';
							?>
							<div style="clear:both;"></div>
						</div>
					</li>
				<?php
				}
			}
			?>
		</ul>
		<nav class="nav-carousel">
			<div class="content-container"></div>
		</nav>
	</section>
    
	<div class="page-content">
		<div class="content-container group">
			<article class="with-sidebar">
				<div class="cms-copy">
					<?php the_content(); ?>
				</div>
			</article>
			<section class="section-sidebar">
				<h4>Tell us about your project</h4>
				<a href="/meet-ats/contact-us/" class="bigButton bigger"><b>Request a Demo</b> Today</a>
			</section>
			<div style="clear: both;"></div>
		</div>
	</div>

<?php get_footer(); ?>
