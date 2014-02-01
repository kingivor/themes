<?php
/**
 * Template Name: Moroder Splash
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<div id="primary" class="site-content">
<div id="content" role="main">
	<div class="row">
		<div class="large-12 medium-12 small-12 columns">
			<div class="row">
				<div class="large-12 medium-12 small-12 columns splash-image"> 
				
				
<?php         
	$args = array (
		'post_type'		=> 'splash',
		'posts_per_page'		=> '1',
	);

	$query = new WP_Query( $args );
	 
	if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php /*?><!--<a href="/moroder/home"> --><?php */?>
						<?php the_post_thumbnail(); ?>
					<!--</a> -->

		<?php endwhile; wp_reset_postdata(); ?>
		<?php else : ?>
		<?php endif; ?>					
					
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>