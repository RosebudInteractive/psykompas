<?php get_header(); ?>
<div class="statStyle">
<div class="pageSite">
  <div class="obertkaDlaShablona">
<header class="entry-header">
			<h1 class="top-title">Статьи</h1>
		</header>
    <div class="obertkaContent">
<?php 


// задаем нужные нам критерии выборки данных из БД
$terms = get_terms('rubrika1'); 
$currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$paged =get_query_var( 'paged' );
$args = array(
	'posts_per_page' => 1,
	'post_type' => 'statiyi',
		'tax_query' => array(
		array(
			'taxonomy' =>$currentterm->taxonomy,
			'field' =>'slug',
			'terms' => $currentterm->name
		)
	),

);

$query = new WP_Query( $args );

// Цикл
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$ids[] = get_the_ID(); 
		foreach((get_the_terms($post->ID, 'rubrika1')) as $category) { 

	echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
}
?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></h2>
        
		<div class="obertkaBtn btnWrap"><a href="<?php the_permalink() ?>" rel="bookmark">
    <div class="knopkaR btnXXsmallR"> Читать</div>
      </a>      </div>  
		
<?php endwhile; ?>
<?php else :
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

echo '<span class="categories-links"><a href="' . get_term_link($term) . '">' . $term->name  . '</a></span>';


 endif; ?>
<?php	// Постов не найдено

/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
wp_reset_postdata();

?>


    </div><!--end of obertkacontent-->
    <div class="obertkaRubrika">
<span class="cat_style">Рубрики</span>
<nav> <?php wp_nav_menu( array( 'container_class' => 'menu-stat', 'theme_location' => 'stat_menu' ) ); ?>
</nav>
    </div>
    
  </div>
</div>
</div>
<div class="pageSite">
<div id="wrapper" class="clearfix container cat_mod">
  <div id="contentWrap" class="grid-9">
  <?php 


// задаем нужные нам критерии выборки данных из БД
global $paged;
$countBlock = 0; $style='';
$terms = get_terms('rubrika1'); 
$currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$paged =get_query_var( 'paged' );
$args = array(
	'posts_per_page' => 4,
	'post_type' => array('statiyi'),
	'paged' => $paged,
	'post__not_in' => $ids,
	'tax_query' => array(
		array(
			'taxonomy' =>$currentterm->taxonomy,
			'field' =>'slug',
			'terms' => $currentterm->name
		)
	),
	'post_status'=>'publish'
	
);
$query = query_posts( $args );
if (have_posts()) : while (have_posts()) : the_post();
 
$countBlock++;
if($countBlock == 1) {
    $style='first alpha odd';
} elseif ($countBlock == $query->post_count) {
    $style='last alpha odd';
} else {
    $style='middle alpha odd';
}
?>

     
<article id="post-<?php the_ID(); ?>" class="<?=$style?>">
      <div class="entry-content">
<div class="wrapNewsimg">

<span class="field-content">
<?php $image = get_field('foto_staya_psy');

if( !empty($image) ): ?>
  <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="204" />
  </a>
<?php endif; ?> 
<div class="autorStatname">
<?php $name_avtor_psy = get_field('name_avtor_psy');

if( !empty($name_avtor_psy) ): ?>

<?php echo $name_avtor_psy; ?>

<?php endif; ?> 
</div>
<div class="post-date"><?php the_time('j F Y'); ?></div></span> 
</div> 
      
<div class="shablon_wrap">
        
<?php
foreach((get_the_terms($post->ID, 'rubrika1')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>
<h2 class="stat-title"><?php the_title(); ?></h2>
<div id="post-<?php the_ID(); ?>" class="shablonText">

	<p>	<?php echo truncate(get_the_excerpt()); ?>	</p>
 </div>

<a class="btnS" href="<?php the_permalink() ?>" rel="bookmark">
 <div class="obertkaBtn">    Читать</div>  
</a>

          
       
        
        </div>
        
      </div>
      <!-- .entry-content -->
      <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
      </footer>
      <!-- .entry-meta -->
    </article>
      
    <!-- #post -->
<?php endwhile; 
include (TEMPLATEPATH . '/navpage.php');
wp_reset_query();
else: ?>
<article id="post-<?php the_ID(); ?>" class="<?=$style?>">
      <div class="entry-content">
      <h2 class="stat-title"> В этой категории пока нет статей, попробуйте выбрать другую</h2>
          </div>
      <!-- .entry-content -->
      <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
      </footer>
      <!-- .entry-meta -->
    </article>  
      
<?php endif; ?>

  </div>
  <!-- #content -->
  <?php get_sidebar(); ?>
</div>
</div>
<!-- #primary -->
<?php get_footer(); ?>
