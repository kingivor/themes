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
				<h1>Music</h1>
			</div>
			
<?php         
$args = array (
	'post_type'		=> 'music',
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
			$music_album_title = get_post_meta( get_the_ID(), 'music_album_title', true );
			$music_song_title = get_post_meta( get_the_ID(), 'music_song_title', true );			
			$music_year = get_post_meta( get_the_ID(), 'music_year', true );
			//$soundcloud_url = get_post_meta( get_the_ID(), 'soundcloud_url', true );

?>

			<div class="large-6 medium-6 small-12 columns">
				<h2><?php echo $music_artist; ?> &mdash; <?php echo $music_album_title; ?> (<?php echo $music_year; ?>)</h2>
				<?php /*?><h3><a href="<?php the_permalink(); ?>"><?php echo $music_song_title; ?></a></h3><?php */?>
				<h3><?php echo $music_song_title; ?></h3>
				
			</div>
			<div class="large-6 medium-6 small-12 columns"> 
				<?php 	if($post->post_content != "") { 
				
							$dirty_embed = get_the_content();
							$cleaning_embed = str_replace("hide_related=false","hide_related=true",$dirty_embed);
							$clean_embed = str_replace("show_artwork=true","show_artwork=false",$cleaning_embed);		
							
							echo $clean_embed;
				
				} ?>
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
