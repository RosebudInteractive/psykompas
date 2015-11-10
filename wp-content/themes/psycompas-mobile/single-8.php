 <?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="statStyle personal_style">
<div class="pageSite">
  <div class="obertkaDlaShablona">
    <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
<div class="imgTop">
        <div class="wrapNewsimg">
            <span class="field-content">
            <?php $image = get_field('about_photo_psy');

            if( !empty($image) ): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="672" height="360" />
            <?php endif; ?>

            </span>
        </div>

    </div><!--end of obertkacontent-->
    <div class="post-prof">
            <?php $psy_profesy = get_field('psy_profesy');

            if( !empty($psy_profesy) ): ?>

                <?php echo '<span>—</span>'. $psy_profesy; ?>

            <?php endif; ?>
        </div>
        <div class="sotr_tel"><?php $psy_telefon = get_field( "psy_telefon" );
if( !empty($psy_telefon) ): 
echo $psy_telefon;

 endif; ?></div>
      <div class="sotr_email"><?php $e_mail_psy = get_field( "e-mail_psy" );
if( !empty($e_mail_psy) ): 

echo '<a href="mailto:'.$e_mail_psy.'">'.$e_mail_psy.'</a>';

 endif; ?></div>  
 <div class="sotr_individual_work">
 <?php $psy_indi_autor = get_field( "psy_indi_autor" );
if( !empty($psy_indi_autor) ): ?>
 <div  style="font-weight:700; margin-bottom:5px;">Индивидуальные программы:</div>
<div><a href="<?php the_field('psy_indi_autor'); ?>" target="_blank"><span><?php echo get_the_title(url_to_postid(get_field('psy_indi_autor'))); ?></span></a></div>

 <?php $psy_indi_autor1 = get_field( "psy_indi_autor1" );
if( !empty($psy_indi_autor1) ): ?>
<div><a href="<?php the_field('psy_indi_autor1'); ?>" target="_blank"><span><?php echo get_the_title(url_to_postid(get_field('psy_indi_autor1'))); ?></span></a></div>
 <?php $psy_indi_autor2 = get_field( "psy_indi_autor2" );
if( !empty($psy_indi_autor2) ): ?>
<div><a href="<?php the_field('psy_indi_autor2'); ?>" target="_blank"><span><?php echo get_the_title(url_to_postid(get_field('psy_indi_autor2'))); ?></span></a></div>
 <?php $psy_indi_autor3 = get_field( "psy_indi_autor3" );
if( !empty($psy_indi_autor1) ): ?>
<div><a href="<?php the_field('psy_indi_autor3'); ?>" target="_blank"><span><?php echo get_the_title(url_to_postid(get_field('psy_indi_autor3'))); ?></span></a></div>
 <?php endif; ?>
 <?php endif; ?>
 <?php endif; ?>
 <?php endif; ?>
 </div>
   </div>
</div>
</div>
<div class="pageSite">
<div id="wrapper" class="clearfix container">		
		<div id="contentWrap" class="grid-9">

			<?php while ( have_posts() ) : the_post(); ?>
            
<div id="sotr-fulle-<?php the_ID(); ?>" class="opener">
<div class="openWrap">

        <div class="padSpec">

 <div class="sotr_story">
 <?php $about_psy_spec = get_field( "about_psy_spec" );
if( !empty($about_psy_spec) ): 
echo $about_psy_spec;

 endif; ?>
 
 </div>
        		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

        </div>
        </div>
		</div>
        			<?php endwhile; // end of the loop. ?>


		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #wrapper -->
    </div>

<?php get_footer(); ?>

