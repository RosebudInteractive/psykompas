<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="pageSite">
<div id="wrapper" class="clearfix container">		
		<div id="contentWrap" class="grid-9">
	<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>
		
		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>