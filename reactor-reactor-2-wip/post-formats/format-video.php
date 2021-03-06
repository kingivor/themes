<?php
/**
 * The template for displaying the video post format
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */
if ( is_page_template('page-templates/front-page.php') ) {
    $post_meta = reactor_option('frontpage_post_meta', 1);
}
elseif ( is_page_template('page-templates/news-page.php') ) {
    $post_meta = reactor_option('newspage_post_meta', 1);
} else {
    $post_meta = reactor_option('post_meta', 1);
}
if ( is_page_template('page-templates/front-page.php') ) {
    $comments_link = reactor_option('frontpage_comment_link', 1);
}
elseif ( is_page_template('page-templates/news-page.php') ) {
    $comments_link = reactor_option('newspage_comment_link', 1);
} else {
    $comments_link = reactor_option('comment_link', 1);
}
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-body">

            <header class="entry-header">
                <?php if ( reactor_option('tumblog_icons', false) && ( is_home() || is_archive() ) && current_theme_supports('reactor-tumblog-icons') ) :
                echo reactor_tumblog_icon();
                endif; ?>

                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __('%s', 'reactor'), the_title_attribute('echo=0') ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
            	<div class="panel">
                    <?php if ( $post_meta && current_theme_supports('reactor-post-meta') ) :
                    reactor_post_meta();
                    endif; ?>

                    <?php if ( comments_open() && $comments_link ) : ?>
                    <div class="comments-link">
                        <i class="icon social foundicon-chat" title="Comments"></i>
                        <?php comments_popup_link('<span class="leave-comment">' . __('Leave a Comment', 'reactor') . '</span>', __('1 Comment', 'reactor'), __('% Comments', 'reactor') ); ?>
                    </div><!-- .comments-link -->
                    <?php endif; ?>

                    <?php if ( is_single() ) :
                    edit_post_link( __('Edit', 'reactor'), '<div class="edit-link"><span>', '</span></div>');
                    endif; ?>

                    <?php if ( is_single() ) : ?>
                    $exclude = ( reactor_option('frontpage_exclude_cat', 1) ) ? reactor_option('frontpage_post_category', '') : ''; ?>
                    <nav class="nav-single">
                        <span class="nav-previous alignleft">
                        <?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'reactor') . '</span> %title', false, $exclude); ?>
                        </span>
                        <span class="nav-next alignright">
                        <?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'reactor') . '</span>', false, $exclude); ?>
                        </span>
                    </nav><!-- .nav-single -->
                    <?php endif; ?>

                    <?php // If comments are open or we have at least one comment, load up the comment template
                    if ( is_single() && ( comments_open() || '0' != get_comments_number() ) ) :
                    comments_template('', true);
                    endif; ?>
               </div>
            </footer><!-- .entry-footer -->

        </div><!-- .entry-body -->
	</article><!-- #post -->
