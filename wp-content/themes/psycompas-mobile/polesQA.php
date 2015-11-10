<?php get_header(); ?>

<div class="statStyle qa">
<div class="pageSite">
  <div class="obertkaDlaShablona">
  <div class="obertkaContent">
    <header class="entry-header askQt">
 <h1 class="top-title">		     
<?php
foreach((get_the_terms($post->ID, 'rubrika2')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>	</h1>
    </header>
    
<h2>Напишите нам, чтобы получить бесплатную консультацию психолога. </h2>
<div class="obertkaBtn askQa btnWrap"><a href="<?php the_permalink() ?>" rel="bookmark" onclick="return openModal('#questionWin');">
   <div class="knopkaR btnNormalR">  Написать Вопрос</div>
      </a>      </div>  
		
    </div><!--end of obertkacontent-->
    <div class="obertkaRubrika askQr">
<span class="cat_style">Рубрики</span>
<nav> <?php wp_nav_menu( array( 'container_class' => 'menu-stat', 'theme_location' => 'vopros_menu' ) ); ?>
</nav>
    </div>
    
  </div>
</div>
</div>
<div class="pageSite">
<div id="wrapper" class="clearfix container ask_mod">
  <div id="contentWrap" class="grid-9">
  <?php 


// задаем нужные нам критерии выборки данных из БД
global $paged;
$currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$paged =get_query_var( 'paged' );
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'vopros',
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
// Цикл
$query = query_posts( $args );
if (have_posts()) : while (have_posts()) : the_post();?>

     
<?php get_template_part( 'content', 'vopros' ); ?>
      
    <!-- #post -->
<?php endwhile; 
include (TEMPLATEPATH . '/navpage.php');
wp_reset_query();
else: ?>
<?php get_template_part( 'content', 'page' ); ?>
<?php endif; ?>

  </div>
  <!-- #content -->
  <?php get_sidebar(); ?>
</div>
</div>
<!-- #primary -->
<?php get_footer(); ?>
