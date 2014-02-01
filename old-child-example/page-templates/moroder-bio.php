<?php
/**
 * Template Name: Moroder Bio
 *
 * @package Reactor
 * @subpackge Page-Templates
 * @since 1.0.0
 */
?>
<?php get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main" class="row">
		<div class="row">
			<div class="large-12 medium-12 small-12 columns biography">

			<div class="large-12 medium-12 small-12 columns biography">
				<div class="entry-body">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php the_title(); ?>
						</h1>
					</header>
					<!-- .entry-header -->
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="entry-content">
						<?php the_content('Read more...'); ?>
					</div>
					<!-- .entry-content -->
					<?php endwhile; else: endif; ?>
					<?php /*?></div><?php */?>
					
					<!-- .columns --> 
</div>					
				</div>
				<!-- .row --> 
			</div>
		</div>
		<?php /*?><?php get_sidebar(); ?><?php */?>
	</div>
	<!-- #content -->
	
	<?php reactor_content_after(); ?>
</div>
<!-- #primary -->

<?php get_footer(); ?>
