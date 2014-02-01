<?php
/**
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
<?php get_header(); ?>


<?php 			// Retrieves the stored value from the database
			$discog_artist = get_post_meta( get_the_ID(), 'discog_artist', true );
			$discog_title = get_post_meta( get_the_ID(), 'discog_title', true );
			$discog_year = get_post_meta( get_the_ID(), 'discog_year', true );
	//		$discog_tracks = get_post_meta( get_the_ID(), 'discog_tracks', true );
	//		$discog_notes = get_post_meta( get_the_ID(), 'discog_notes', true );
	//		$discog_cats = get_post_meta( get_the_ID(), 'discog_cats', true );

?>

<?php						
while ( have_posts() ) : the_post(); ?>
<?php						
// WHILE START
?>

<div id="primary" class="site-content">
	<div id="content" role="main" class="row">
		<div class="row">
					<div class="large-12 medium-12 small-12 columns">

			<div class="large-6 medium-6 small-12 columns">
		
				<?php /*?><?php echo next_post_link( $format, $link, $in_same_cat = false, $excluded_terms = '', $taxonomy = 'discography' ); ?><?php */?>
				<div id="discog-nav">
					<div id="single-nav-left"> <?php previous_post_link('%link', 'Previous', FALSE); ?></div>
					<div id="single-nav-right"><?php next_post_link('%link', 'Next', FALSE); ?></div>
				</div>
		
				<h4><?php echo $discog_artist; ?></h4>
				<h2><?php echo $discog_title; ?></h2>
				<h3><?php echo $discog_year; ?></h3>
				
				<?php 	if($post->post_content != "") { ?>
							<h5>Track Listing</h5>
							<?php the_content(); ?>
				
				<?php   } ?>
				
				
			</div>
			<div class="large-6 medium-6 small-12 columns"> 
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
		<!--END ROW--> 

		

	<?php include (ABSPATH . '/wp-content/themes/moroder/related-music.php'); ?>

		
		
		
					<?php endwhile; ?>
		
	</div>
	<!-- .row -->
		</div>	
	<?php /*?> <?php get_sidebar(); ?><?php */?>
</div>



<?php get_footer(); ?>
