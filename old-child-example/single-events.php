<?php
/**
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>
<?php get_header(); ?>


<?php 			// Retrieves the stored value from the database
			$events_name = get_post_meta( get_the_ID(), 'events_name', true );
			$events_date = get_post_meta( get_the_ID(), 'events_date', true );
			$events_venue = get_post_meta( get_the_ID(), 'events_venue', true );
			$events_city = get_post_meta( get_the_ID(), 'events_city', true );			
			$events_ticket = get_post_meta( get_the_ID(), 'events_ticket', true );

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
		

<?php 
	
	$events_date_pieces = explode("-",$events_date);
	$events_date_y = $events_date_pieces[0];
	$events_date_d = $events_date_pieces[2];
	$month = date("M", strtotime($events_date));

?>


						<div class="event">
							<a href="<?php echo $events_ticket; ?>" class="button">TICKETS</a>							
							<div class="event-date">
								<span class="event-date-m"><?php echo $month; ?></span>
								<span class="event-date-d"><?php echo $events_date_d; ?></span>
								<span class="event-date-y"><?php echo $events_date_y; ?></span>														
							</div>
							<span class="event-name"><?php echo $events_name; ?></span>
							<span class="event-city"><?php echo $events_venue; ?> (<?php echo $events_city; ?>)</span>
						</div>


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
