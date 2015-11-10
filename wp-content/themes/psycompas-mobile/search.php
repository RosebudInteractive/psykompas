<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="pageSite">
<div id="wrapper" class="clearfix container">		
		<div id="contentWrap" class="grid-9">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="page-title"><?php printf( __( 'Результат поиска: ', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header>

<?php twentytwelve_content_nav( 'nav-above' ); ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>

<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>
		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #primary -->
    </div>
<?php get_footer(); ?>