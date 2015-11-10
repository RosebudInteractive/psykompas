<?php /* Template Name: Страницы: Тренинги */ ?>
<?php get_header(); ?>  

<div id="wrapper" class="clearfix container tren_cat">		
		<div id="contentWrap" class="grid-12">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<h1 class="tren-title"><?php the_title(); ?></h1>
		</header>
                         <div class="front-block">
<section id="block-trening-services-block" class="block-trening-services-block block block-trening block-odd">

<div class="content block-content">
<div class="rubTren">
<nav> <?php wp_nav_menu( array( 'container_class' => 'menu-trening', 'theme_location' => 'trening_menu','items_wrap' => '<ul><li id="item-id "class="cat_style">Категории: </li>%3$s</ul>' ) ); ?>
</nav>
</div>
<div class="trening-content">
			<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'trening',
	'paged' => $paged,
	'post_status'=>'publish'
	
);

// Цикл
$query = query_posts( $args );
if (have_posts()) : while (have_posts()) : the_post();?>

<?php get_template_part( 'content', 'trening' ); ?>
	
<?php endwhile; ?>
<?php include (TEMPLATEPATH . '/navpage.php');?>
<?php wp_reset_query();?>
<?php else: ?>
<?php endif; ?>
</div>
</div> 

</section> </div>
</article><!-- #post -->
		</div><!-- #content -->
        

	</div><!-- #primary -->

<?php get_footer(); ?>