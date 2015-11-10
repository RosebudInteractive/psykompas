<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

    <section id="marketing">
        <div class="container">
      <div id="sideBlock" class="grid-12">
            <div class="row clearfix">
                       
            </div> 

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <div class="WrapBlock">
<!--start блок тренингов-->
<?php include (TEMPLATEPATH . '/front-trening.php'); ?>
<!--start блок отзыв-->
<?php include (TEMPLATEPATH . '/front-otzyv.php'); ?>

</div>

		<div class="entry-content">

<?php the_content( "читать полностью:  " . the_title('', '', false) ); ?>

                		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->




			<?php endwhile; // end of the loop. ?>





</div>




</div>
</section>

<?php get_footer(); ?>