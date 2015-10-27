<?php if ( in_category( '8') ) : 

  include (TEMPLATEPATH . '/single-8.php');
  
  
elseif ( in_category( array( '71','72','73')) ) : 
include (TEMPLATEPATH . '/single-71.php');

elseif ( in_category( array( '74','75','76','77')) ) : 
include (TEMPLATEPATH . '/single-74.php');

 else: ?>
  
  <?php
/**
 * The Template for displaying all single posts
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

				<?php get_template_part( 'content', get_post_format() ); ?>


			<?php endwhile; // end of the loop. ?>


		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #wrapper -->
</div>
<?php get_footer(); ?>

<?php endif; ?>