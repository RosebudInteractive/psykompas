<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="statStyle single-statiyi">
<div class="pageSite">
  <div class="obertkaDlaShablona">
    <header class="entry-header">
      <h1 class="top-title"><?php the_title(); ?></h1>
    </header>
    <div class="imgTop">
    <?php $image = get_field('foto_staya_psy');

if( !empty($image) ): ?>
  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="438" />

<?php endif; ?> 

    </div><!--end of obertkacontent-->

    
  </div>
</div>
</div>
<div class="pageSite">
<div id="wrapper" class="clearfix container single-statiyi">
  <div id="contentWrap" class="grid-9">

			<?php while ( have_posts() ) : the_post(); ?>

<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>

		</div><!-- .entry-content -->
        <div class="sideAutor">
        <div class="imgAutor">
         <?php $image = get_field('photo_psy');

if( !empty($image) ): ?>
  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="156" />

<?php endif; ?> 
        </div>
<div class="autorStatname">
<?php $name_avtor_psy = get_field('name_avtor_psy');

if( !empty($name_avtor_psy) ): ?>

<?php echo $name_avtor_psy; ?>

<?php endif; ?> 
</div>
    
      <div class="post-prof"> 
<?php $psy_profesy = get_field('psy_profesy');

if( !empty($psy_profesy) ): ?>

<?php echo $psy_profesy; ?>

<?php endif; ?> 
</div> 
<div class="socialBlock">
<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="large" data-yashareQuickServices="vkontakte,facebook,twitter,gplus" data-yashareTheme="counter"></div>
        </div>
        </div>
<div class="other">

	<h3>Еще статьи</h3>
    <br>
	<ul class="recent">
		<?php
		$countBlock = 0; $style='';
 $currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$args = array(
	'posts_per_page' => 3,
	'post_type' => 'statiyi',
	'paged' => $paged,
	
	'post_status'=>'publish'
	
);
	$books = new WP_Query($args); if($books->have_posts()):  while($books->have_posts()):  $books->the_post();
$permalink =   get_permalink();

$countBlock++;
if($countBlock == 1) {
    $style='first alpha odd';
} elseif ($countBlock == $books->post_count) {
    $style='last omega odd';
} else {
    $style='middle alpha odd';
}
		?>
        

        
		<li class="<?=$style?>">
        <div>       <?php $image = get_field('foto_staya_psy');

if( !empty($image) ): ?>
  <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="204" />
  </a>
<?php endif; ?>  </div>
<?php
foreach((get_the_terms($post->ID, 'rubrika1')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>
        <a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
      
  <a class="btnS" href="<?php the_permalink() ?>" rel="bookmark">
 <div class="obertkaBtn">    Читать</div>  
</a>    
        </li>
	<?php endwhile;  endif;  ?>
	</ul>
</div>

			<?php endwhile; // end of the loop. ?>


  </div>
  <!-- #content -->
  <?php get_sidebar(); ?>
</div>
</div>
<!-- #primary -->
<?php get_footer(); ?>