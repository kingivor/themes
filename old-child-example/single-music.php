<?php
/**
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
<?php get_header(); ?>


<?php 			// Retrieves the stored value from the database
			$music_artist = get_post_meta( get_the_ID(), 'music_artist', true );
			$music_album_title = get_post_meta( get_the_ID(), 'music_album_title', true );
			$music_song_title = get_post_meta( get_the_ID(), 'music_song_title', true );			
			$music_year = get_post_meta( get_the_ID(), 'music_year', true );
			$soundcloud_url = get_post_meta( get_the_ID(), 'soundcloud_url', true );

?>

<?php						
while ( have_posts() ) : the_post(); ?>
<?php						
// WHILE START
?>

<div id="primary" class="site-content">
	<div id="content" role="main">

		<div class="row">
		
			<div class="large-6 medium-6 small-12 columns">
				<div id="discog-nav">
					<div id="single-nav-left"> <?php previous_post_link('%link', 'Previous', FALSE); ?></div>
					<div id="single-nav-right"><?php next_post_link('%link', 'Next', FALSE); ?></div>
				</div>
			</div>

		</div>



		<div class="row">
		
			<div class="large-6 medium-6 small-12 columns">
		
				<h4><?php echo $music_artist; ?></h4>
				<h2><?php echo $music_album_title; ?> (<?php echo $music_year; ?>)</h2>
				<h5><?php echo $music_song_title; ?></h5>
				<?php /*?><h3><?php echo $music_year; ?></h3><?php */?>
			</div>

			<div class="large-6 medium-6 small-12 columns"> 
				<?php 	if($post->post_content != "") { ?>
							<?php the_content(); ?>				
				<?php   } ?>
			</div>
		</div>
		<!--END ROW--> 
		
		



		
		
		
					<?php endwhile; ?>
		
	</div>
	<!-- .row -->
	
	<?php /*?> <?php get_sidebar(); ?><?php */?>
</div>



<?php get_footer(); ?>
