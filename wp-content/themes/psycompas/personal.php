<?php
/*
Template Name: Сотрудники
*/

get_header(); ?>

<div class="pageSite">

<div id="wrapper" class="clearfix container">		
		<div id="contentWrap" class="grid-9">
        
        
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title">Специалисты</h1>
		</header>

		<div class="entry-content">
			<div class="shablon_wrap">
          <?php query_posts( array('cat'=>8, 'paged'=>get_query_var('paged'), 'posts_per_page'=>'8' ) ); ?>


<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div id="sotr-<?php the_ID(); ?>" class="news1">
<div class="wrapNewsimg">

<span class="field-content">
<?php $image = get_field('photo_psy');

if( !empty($image) ): ?>
  <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="282" height="285" onclick="jQuery('#sotr-fulle-<?php the_ID(); ?>').toggle();return false;" />
  </a>
<?php endif; ?> 
 <div class="sotr_about"><a href="<?php the_permalink() ?>" rel="bookmark"  onclick="jQuery('#sotr-fulle-<?php the_ID(); ?>').toggle();return false;"><span>+</span><span class="podrobnee">Подробнее</span></a></div>
</span> 
          </div> 

     <div class="sotr_title"> <?php the_title(); ?></div>
    
      <div class="post-prof"> 
<?php $psy_profesy = get_field('psy_profesy');

if( !empty($psy_profesy) ): ?>

<?php echo $psy_profesy; ?>

<?php endif; ?> 
</div> 

   	</div>

<div id="sotr-fulle-<?php the_ID(); ?>" class="opener" style="display:none;">
<div class="openWrap">
<a href="#" class="closeS" title="Закрыть" onclick="return closeModal('#sotr-fulle-<?php the_ID(); ?>');">закрыть</a>
        <div class="wrapNewsimg">
            <span class="field-content">
            <?php $image = get_field('about_photo_psy');

            if( !empty($image) ): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="672" height="360" />
            <?php endif; ?>

            </span>
        </div>
        <div class="padSpec">
<div class="sotr_title"> <?php the_title(); ?></div>
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
 <div class="sotr_email">
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
<?php endwhile; ?>
<?php wp_reset_query();?>
	
        </div>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
        
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
	
<?php else : ?>
	
<?php endif; ?>


		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>