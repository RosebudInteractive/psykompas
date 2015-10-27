<?php /* Template Name: Страницы: Вопросы и Ответы */ ?>
<?php get_header(); ?>

<div class="statStyle qa">
<div class="pageSite">
  <div class="obertkaDlaShablona">
  <div class="obertkaContent">
    <header class="entry-header askQt">
 <h1 class="top-title"><?php the_title(); ?></h1>
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
$paged =get_query_var( 'paged' );
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'vopros',
	'paged' => $paged,
);


// Цикл
$query = query_posts( $args );
if (have_posts()) : while (have_posts()) : the_post();
?>
     
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
