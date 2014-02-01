<?php
/**
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
            
  







<div class="discog">
			
			<h1>Discography.php</h1>
			
			
			<!-- FILTER CONTROLS -->

				<div id="Filters" class="group">
					<div class="drop_down wf controls large-4 medium-6 small-12 columns">

						<h2>Record Type</h2>
						<ul class="anim250">
							<li data-dimension="records" data-filter="all" class="active">All</li>
							<li data-dimension="records" data-filter="albums">Studio Albums</li>
							<li data-dimension="records" data-filter="singles">Singles</li>
							<li data-dimension="records" data-filter="comps">Compilations</li>
							<li data-dimension="records" data-filter="soundtracks">Soundtracks</li>
							<li data-dimension="records" data-filter="productions">Productions</li>
						</ul>
					</div>
<!--					<div class="drop_down wf controls large-4 medium-6 small-12 columns">
						<h2>Decades</h2>
						<ul class="anim250">
							<li data-dimension="decade" data-filter="all" class="active">All</li>
							<li data-dimension="decade" data-filter="60s">60s</li>
							<li data-dimension="decade" data-filter="70s">70s</li>
							<li data-dimension="decade" data-filter="80s">80s</li>
							<li data-dimension="decade" data-filter="90s">90s</li>							
						</ul>
					</div>
-->					<div class="controls large-4 medium-6 small-12 columns">
						<h2>Sort Controls</h2>
						<ul>
							<li class="sort active" data-sort="data-name" data-order="desc">A-Z</li>
							<li class="sort" data-sort="data-name" data-order="asc">Z-A</li>
							<li class="sort" data-sort="data-year" data-order="desc">Old to New</li>
							<li class="sort" data-sort="data-year" data-order="asc">New to Old</li>
<!--							<li class="sort active" data-sort="default" data-order="desc">Default</li>-->
						</ul>
					</div>
					
				</div>

<!--				<div id="Sorts" class="group">
					<div id="ToList" class="button active"><i></i>List View</div>
					<div id="ToGrid" class="button"><i></i>Grid View</div>
				</div>
-->				
				
				<!--
			<div class="controls">	
				<h3>Filter Controls</h3>
				<ul>
					<li data-dimension="type" class="filter" data-filter="all">Show All</li>
					<li data-dimension="type" class="filter" data-filter="albums">Studio Albums</li>
					<li data-dimension="type" class="filter" data-filter="singles">Singles</li>
					<li data-dimension="type" class="filter" data-filter="comps">Compilations</li>
					<li data-dimension="type" class="filter" data-filter="soundtracks">Soundtracks</li>
					<li data-dimension="type" class="filter" data-filter="productions">Productions</li>
				</ul>
			</div>
			<div class="controls">	
				<h3>Decades</h3>
				<ul>
					<li data-dimension="decade" class="filter" data-filter="all">Show All</li>
					<li data-dimension="decade" class="filter" data-filter="60s">'60s</li>
					<li data-dimension="decade" class="filter" data-filter="70s">'70s</li>
					<li data-dimension="decade" class="filter" data-filter="80s">'80s</li>
					<li data-dimension="decade" class="filter" data-filter="90s">'90s</li>
					<li data-dimension="decade" class="filter" data-filter="00s">'00s</li>
					<li data-dimension="decade" class="filter" data-filter="10s">'10s</li>					
				</ul>
			</div>
			-->
			<!-- SORT CONTROLS -->
				
			
			
			<!-- GRID -->
			
			<ul id="Grid">
				
				<p class="fail-message">No matches. Try different filters.</p>
				




<?php         
$args = array (
	'post_type'		=> 'discography',
);

$query = new WP_Query( $args );
	 
	if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		
				
		<?php
 
			// Retrieves the stored value from the database
			$discog_artist = get_post_meta( get_the_ID(), 'discog_artist', true );
			$discog_title = get_post_meta( get_the_ID(), 'discog_title', true );
			$discog_year = get_post_meta( get_the_ID(), 'discog_year', true );
			$discog_tracks = get_post_meta( get_the_ID(), 'discog_tracks', true );
			$discog_notes = get_post_meta( get_the_ID(), 'discog_notes', true );
			$discog_cats = get_post_meta( get_the_ID(), 'discog_cats', true );
 
?>			
			
					
<li class="mix <?php echo $discog_cats; ?>" data-name="<?php echo $discog_title; ?>" data-year="<?php echo $discog_year; ?>">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('disco_200'); ?>
	</a>
</li>
					

					<?php endwhile; wp_reset_postdata(); ?>
					<?php else : ?>
					<?php endif; ?>
					














				


				<li class="gap"></li> <!-- "gap" elements fill in the gaps in justified grid -->
				<li class="gap"></li> <!-- "gap" elements fill in the gaps in justified grid -->
				<li class="gap"></li> <!-- "gap" elements fill in the gaps in justified grid -->
				<li class="gap"></li> <!-- "gap" elements fill in the gaps in justified grid -->
			</ul>
			
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
