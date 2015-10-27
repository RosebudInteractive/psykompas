<?php /* Template Name: Страницы: Индивидуальные программы */ ?>
<?php get_header(); ?>  
<div class="pageSite">
<div id="wrapper" class="clearfix container tren_cat indistyle">	

		<div id="contentWrap" class="grid-9">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="tren-title"><?php the_title(); ?></h1>
		</header>
                         <div class="front-block">
<section id="block-trening-services-block" class="block-trening-services-block block block-trening block-odd">

<div class="content block-content">
<div class="rubTren">
<nav> <?php wp_nav_menu( array( 'container_class' => 'menu-trening', 'theme_location' => 'individual_menu','items_wrap' => '<ul><li id="item-id "class="cat_style">Категории: </li>%3$s</ul>' ) ); ?>
</nav>
</div>
<div class="trening-content">


			<?php 
$args = array(
	'posts_per_page' => -1,
	'post_type' => 'individual',
	'post_status'=>'publish',

	
);
$query = new WP_Query( $args );
// Цикл

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>

				
				<?php get_template_part( 'content', 'individual' );  ?>
	

<?php endwhile; //wp_pagenavi(); ?>

<?php include (TEMPLATEPATH . '/navpage.php');?>
<?php wp_reset_query();?>
<?php else: ?>

<?php endif; ?>

</div>
</div> 

</section> </div>
</article><!-- #post -->
		</div><!-- #content -->
        
<?php get_sidebar(); ?>
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>