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
            
  







<div class="large-12 medium-12 small-12 columns events">
			
			<h1>Upcoming Events</h1>
			
<?php         

// LOOP ONE - Find all events, put the ID of all past events into an EXCLUDE FROM LOOP 2 array.
	$current_date = date('Ymj');
	$exclude_past = array();
	
	$args = array (	'post_type'		=> 'events', );
	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	
		// compare each post event date to current date.
		// if event_date is equal or greater than current date, it should be shown
		// if event_date is less than current date, add to exclude array

				$events_date = get_post_meta( get_the_ID(), 'events_date', true );	
				$this_event_date = str_replace("-","",$events_date);
				$current_id = get_the_ID();

				if ($this_event_date < $current_date) {
					//echo "THIS POST IS OLD: ".$current_id;	
					$exclude_past[] = $current_id;
				}
			
	endwhile; wp_reset_postdata();  else : endif;



// LOOP TWO

$args = array (
	'post_type'			=> 'events',
	'posts_per_page' 	=> 200,
	'meta_key' 			=> 'events_date',
	'orderby' 			=> 'meta_value',
	'order' 			=> 'ASC',
	'post__not_in' 		=> 	$exclude_past,
);


$query = new WP_Query( $args );


	 
	if ( $query->have_posts() ) : ?>

			



		<?php while ( $query->have_posts() ) : $query->the_post(); ?>






<div class="row event-listing">

<?php 			
			$events_name = get_post_meta( get_the_ID(), 'events_name', true );
			$events_date = get_post_meta( get_the_ID(), 'events_date', true );
			$events_end_date = get_post_meta( get_the_ID(), 'events_end_date', true );			
			$events_venue = get_post_meta( get_the_ID(), 'events_venue', true );
			$events_city = get_post_meta( get_the_ID(), 'events_city', true );			
			$events_ticket = get_post_meta( get_the_ID(), 'events_ticket', true );

			$events_date_pieces = explode("-",$events_date);
			$events_date_y = $events_date_pieces[0];
			$events_date_d = $events_date_pieces[2];
			$month = date("F", strtotime($events_date));

			$events_end_date_pieces = explode("-",$events_end_date);
			$events_end_date_y = $events_end_date_pieces[0];
			$events_end_date_d = $events_end_date_pieces[2];
			$month_end = date("F", strtotime($events_end_date));

?>


			<div class="large-6 medium-6 small-12 columns">
						<div class="event">
							<?php 	if($events_ticket != "") { ?>					
								<a href="<?php echo $events_ticket; ?>" class="button">TICKETS</a>							
							<?php   } ?>

				<div class="event-date">
					<?php 	if($events_end_date != "") { 
							//if it has an end date, use this display
							// else show normal single date
					?>
								<span class="event-date-m"><?php echo $month; ?></span>
								<span class="event-date-d"><?php echo $events_date_d." &mdash;"; ?></span>
								<span class="event-date-m"><?php echo $month_end; ?></span>
								<span class="event-date-d"><?php echo $events_end_date_d.","; ?></span>
								<span class="event-date-y"><?php echo $events_end_date_y; ?></span>
					
					<?php   } else { ?>
								<span class="event-date-m"><?php echo $month; ?></span>
								<span class="event-date-d"><?php echo $events_date_d.","; ?></span>
								<span class="event-date-y"><?php echo $events_date_y; ?></span>
					<?php   } ?>
				</div>




							<span class="event-name"><?php echo $events_name; ?></span>
							<?php 	if($events_venue != "") { ?>
								<span class="event-city"><?php echo $events_venue; ?></span>
							<?php   } ?>
							<?php 	if($events_city != "") { ?>
								<span class="event-city"><?php echo $events_city; ?></span>
							<?php   } ?>
							
						</div>
			</div>
			<div class="large-6 medium-6 small-12 columns"> 
				<?php 	if($post->post_content != "") { ?>
							<?php the_content(); ?>				
				<?php   } ?>
			</div>

</div>					
<?php endwhile; wp_reset_postdata(); ?>



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
