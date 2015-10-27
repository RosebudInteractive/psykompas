<?php get_header(); ?>  

<div id="wrapper" class="clearfix container tren_cat">		
		<div id="contentWrap" class="grid-9">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="tren-title"><?php $posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
	echo $tag->name . ' '; 
  }
} ?></h1>
		</header>
                         <div class="front-block">
<section id="block-trening-services-block" class="block-trening-services-block block block-trening block-odd">

<div class="content block-content">
<div class="forChild">
<a href="/treningi"><div class="chekBtnchild"><span class="checkOn"></span></div></a>
<a href="/tag/dlya-detej">
<div><img src="/wp-content/themes/psycompas/images/child_psy.png" /></div>Для детей</a>
</div>
<div class="rubTren">
<nav> <?php wp_nav_menu( array( 'container_class' => 'menu-trening', 'theme_location' => 'trening_menu','items_wrap' => '<ul><li id="item-id "class="cat_style">Категории: </li>%3$s</ul>' ) ); ?>
</nav>
</div>
<div class="trening-content">
			<?php 
$thisCat = get_category(get_query_var('cat'),false);
$paged =get_query_var( 'paged' );
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'trening',
	'paged' => $paged,
	'cat' => $thisCat->cat_ID,
	'post_status'=>'publish',
	'tag'=>'dlya-detej'
	
	
);

$query = query_posts( $args );
if (have_posts()) : while (have_posts()) : the_post();?> 

				
				<?php get_template_part( 'content', 'trening' ); ?>
	
<?php endwhile; wp_pagenavi(); else: ?>
<?php endif; ?>
<?php wp_reset_query();?>
</div>
</div> 

</section> </div>
</article><!-- #post -->
		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>