<?php
/**
 * The template for Related Articles
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
<?php 
	$current_id = get_the_ID();
//	$do_not_dupe = array ( $current_id );	

	$category = get_the_category($post->ID); 
	if($category[0]){
		$cat_name = $category[0]->slug;
	}
?>
<?php         
// test for related music
	$args = array ('posts_per_page' => '20', 'category_name' => $cat_name, 'post_type' => 'music');
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	
	$show_related_songs = true;

	endwhile; wp_reset_postdata(); else : endif; 


// test for related videos
	$args = array ('posts_per_page' => '20', 'category_name' => $cat_name, 'post_type' => 'videos');
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	
	$show_related_videos = true;

	endwhile; wp_reset_postdata(); else : endif; 


?>





<?php if ($show_related_songs==true) { ?>

<!--<div class="discog-music row">-->
	<div class="large-12 medium-12 small-12 columns">
		<!--<div class="row">-->
			<div class="large-12 medium-12 small-12 columns related-songs-header">
				<h5>Songs from this record</h5>
			</div>
		<!--</div>-->
	</div>
	<?php } ?>
	<?php         
	$args = array ('posts_per_page' => '20', 'category_name' => $cat_name, 'post_type' => 'music');
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>
	<?php 			// Retrieves the stored value from the database
//			$music_artist = get_post_meta( get_the_ID(), 'music_artist', true );
//			$music_album_title = get_post_meta( get_the_ID(), 'music_album_title', true );
			$music_song_title = get_post_meta( get_the_ID(), 'music_song_title', true );			
//			$music_year = get_post_meta( get_the_ID(), 'music_year', true );
			$soundcloud_url = get_post_meta( get_the_ID(), 'soundcloud_url', true );

?>
		<div class="related-songs large-12 medium-12 small-12 columns">

<!--	<div class="row">
		<div class="large-12 medium-12 small-12 columns">
-->			<div class="large-6 medium-6 small-12 columns">
				<?php 	if($post->post_content != "") { ?>
				<?php 		
							$dirty_embed = get_the_content();
							$cleaning_embed = str_replace("hide_related=false","hide_related=true",$dirty_embed);
							$clean_embed = str_replace("show_artwork=true","show_artwork=false",$cleaning_embed);		
							
							echo $clean_embed;
 ?>
				<?php   } ?>
			</div>
			<div class="large-6 medium-6 small-12 columns">
				<h2><?php echo $music_song_title; ?></h2>
			</div>
<!--		</div>

</div>-->	</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<?php else : ?>
	<?php endif; ?>
<!--</div>-->
<!--end row--> 



<?php if ($show_related_videos==true) { ?>
	<div class="large-12 medium-12 small-12 columns">
			<div class="large-12 medium-12 small-12 columns related-songs-header">
				<h5>Videos from this record</h5>
			</div>
		<!--</div>-->
	</div>
	<?php } ?>
	<?php         
	$args = array ('posts_per_page' => '20', 'category_name' => $cat_name, 'post_type' => 'videos');
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>
		<div class="related-songs large-12 medium-12 small-12 columns">

			<div class="large-6 medium-6 small-12 columns">
				<?php 	if($post->post_content != "") { ?>
				<?php the_content(); ?>
				<?php   } ?>
			</div>
			<div class="large-6 medium-6 small-12 columns">
				<h2><?php the_title(); ?></h2>
			</div>
<!--		</div>

</div>-->	</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<?php else : ?>
	<?php endif; ?>
<!--</div>-->
<!--end row--> 

