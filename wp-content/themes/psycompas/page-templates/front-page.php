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
<div class="pageSite">
    <section id="marketing">
        <div class="container">
        <div id="sideBlock" class="grid-9">
            <div class="row clearfix">
                       
            </div> 

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
       <?php 
	   if ( is_front_page() ) 
{
	   
}
else {
	
?>

        <div class="breadcrumbs">
    <p><a href="/" class="custom_navigation">На главную</a> &gt; </p>             <strong><?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?></strong>       
                        
                        </div>
                        <?php }?>
                        <div class="WrapBlock">
<!--start блок тренингов-->
<?php include (TEMPLATEPATH . '/front-trening.php'); ?>
<!--start блок вопрос-->
<?php include (TEMPLATEPATH . '/front-vopros.php'); ?>
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


<?php get_sidebar(); ?>

</div>
</section>
</div>


<?php get_footer(); ?>