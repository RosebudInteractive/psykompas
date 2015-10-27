<?php get_header(); ?>  
<div class="pageSite">
<div id="wrapper" class="clearfix container tren_cat indistyle">	

		<div id="contentWrap" class="grid-9">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
<h1 class="tren-title">Индивидуальные программы</h1>
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
$currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$paged =get_query_var( 'paged' );
$args = array(
'posts_per_page' => -1,
	'post_type' => 'individual',
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' =>$currentterm->taxonomy,
			'field' =>'slug',
			'terms' => $currentterm->name
		)
	),
	'post_status'=>'publish'
	
);
$query1 = new WP_Query( $args );
// Цикл
if ($query1->have_posts()) : while ($query1->have_posts()) : $query1->the_post();?>

				
				<?php get_template_part( 'content', 'individual' );  ?>
	

<?php endwhile; //wp_pagenavi(); ?>

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