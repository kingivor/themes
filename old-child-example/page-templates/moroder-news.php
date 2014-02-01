<?php
/**
 * Template Name: Moroder News
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
			<div class="large-12 medium-12 small-12 columns">
            
  

				
  <!--EVENTS and NEWS-->              
  
    			<!--<div class="row">-->
                    
					<div class="large-8 medium-8 small-12 columns">
                        
<?php dynamic_sidebar( 'Facebook' ); ?>



                    </div>            

					
					
					<div class="large-4 medium-4 small-12 columns">
                        <h2>Twitter</h2>
						
						<?php /*?><blockquote class="twitter-tweet" lang="en"><p>Hope you got to listen! Happy 30th <a href="https://twitter.com/search?q=%23Scarface&amp;src=hash">#Scarface</a>! <a href="http://t.co/bQNKPpzqOI">http://t.co/bQNKPpzqOI</a></p>&mdash; Giorgio Moroder (@giorgiomoroder) <a href="https://twitter.com/giorgiomoroder/statuses/410852734623940608">December 11, 2013</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script><?php */?>



<?php
	/* your parameters */
	$jltw_args = array(
		'username'	=> 'giorgiomoroder',
		'nb_tweets'	=> 5,
		'avatar'	=> false,
		'cache'		=> 1600,
		'transition'	=> false,
		'delay'		=> 10,
		'links'		=> true
	);

	/* set variable */

	$list_of_tweets = get_jltw($jltw_args);

	/* more later */
	echo $list_of_tweets;
?>


						
                    </div>            

                    
     			<!--</div>--><!--end row-->






          
      <!-- .columns -->
      
    </div>
    <!-- .row --> 
	
<?php /*?>	  <?php get_sidebar(); ?>
<?php */?>	
  </div>
  <!-- #content -->
  
  <?php reactor_content_after(); ?>
</div>
<!-- #primary -->


<?php get_footer(); ?>
