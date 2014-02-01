<?php
/**
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main" class="row">
		<div class="row">
			<div class="large-12 medium-12 small-12 columns">
            
  







<div class="music">
			<div class="large-12 medium-12 small-12 columns">
				<h1>Videos</h1>
			</div>
			
<?php         
$args = array (
	'post_type'		=> 'videos',
	'posts_per_page' => 5,
	'paged' => $paged,
);

$query = new WP_Query( $args );


	 
	if ( $query->have_posts() ) : ?>
<!--<div class="row">-->
			<div class="large-12 medium-12 small-12 columns">
				<div id="music-nav">
				
					<?php wp_pagenavi(); ?>
<?php /*?>					
	THESE BUTTONS WORKED. JUST NEEDED PAGE NAVI TO MAKE IT NICER
					<div id="single-nav-left"> <?php previous_posts_link( 'Newer Entries' ); ?></div>
					<div id="single-nav-right"><?php next_posts_link( 'Older Entries' ); ?></div>
<?php */?>				</div>
			</div>
<!--</div>-->
			
<!--<div class="row">-->


		<?php while ( $query->have_posts() ) : $query->the_post(); ?>


<?php 			// Retrieves the stored value from the database
			$music_artist = get_post_meta( get_the_ID(), 'music_artist', true );
			$embed = get_post_meta( get_the_ID(), 'embed', true );
?>

			<div class="large-6 medium-6 small-12 columns">
				<h2><?php echo $music_artist; ?></h2>				
				<h3><?php the_title(); ?></h3>
				
			</div>
			<div class="large-6 medium-6 small-12 columns"> 

							<?php the_content(); ?>

			</div>

					<?php endwhile; wp_reset_postdata(); ?>

<!--</div>-->

					<?php else : ?>
					<?php endif; ?>
					






			
		</div>

          
      <!-- .columns -->
      
    </div>
    <!-- .row --> 
  </div>
  <!-- #content -->
  
  <?php reactor_content_after(); ?>
</div>
<!-- #primary -->


<?php get_footer(); ?>
