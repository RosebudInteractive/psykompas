<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="statStyle">
<div class="pageSite">
  <div class="obertkaDlaShablona">
          <div class="obertkaRubrika">
<?php


foreach((get_the_terms($post->ID, 'rubrika4')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>
    </div>
    <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
<div class="imgTop">
    <?php $image = get_field('psy_tren_foto');

if( !empty($image) ): ?>
  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="438" />

<?php endif; ?> 

    </div><!--end of obertkacontent-->
   <div class="priceBlock">
   <span class="psy_price">
<?php 	
$psy_cost= get_field( "psy_cost" );
if( !empty($psy_cost) ): 
echo '—'.$psy_cost.'<span> ₽</span>';

 endif; ?>
</span>
		<div class="obertkaBtn btnWrap"><a href="#writein"><div class="knopkaR btnXsmallR">
     Записаться</div>
      </a>      </div>  
  </div>
  </div>
</div>
</div>

<div id="wrapper" class="clearfix container">
  <div id="contentWrap" class="grid-9">

			<?php while ( have_posts() ) : the_post(); ?>

<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
		</div><!-- .entry-content -->
<div class="sideAutor">
   <span class="psy_price">
<?php 	
$psy_cost= get_field( "psy_cost" );
if( !empty($psy_cost) ): 
echo $psy_cost.'<span> ₽</span>';

 endif; ?>
</span>
<div class="Gpsy_age">
<?php 	
$psy_age= get_field( "psy_age" );
if( !empty($psy_age) ): 
echo '<div>Возраст</div>';
echo '<div>'.$psy_age.'</div>';

 endif; ?>
</div>
<div class="Gpsy_group">
<?php 	
$psy_group_q= get_field( "psy_group_q" );
if( !empty($psy_age) ): 
echo '<div>Размер группы</div>';
echo '<div>'.$psy_group_q.' '.'<span>чел.</span></div>';

 endif; ?>
</div>
<div class="Gpsy_timetren">
<?php 	
$psy_time_for= get_field( "psy_time_for" );
if( !empty($psy_time_for) ): 
echo '<div>Продолжительность</div>';
echo '<div>'.$psy_time_for.'</div>';

 endif; ?>
</div>
<?php 

$selected = get_field('full_psy_autor');

if( !empty($selected) ): ?>

<div class="ledG">Ведущий специалист</div> 
<div class="autorStatname">
<a href="/specialisty"> Предоставляют Все специалисты </a>
</div>
<div class="post-prof"> 

</div> 

<div class="autorStatname">

</div>
    
 <div class="post-prof"> 

</div> 


  <?php else: ;?>
<div class="ledG">Ведущий специалист</div>
 <div class="autorStatname"><a href="<?php the_field('psy_led_tren'); ?>" target="_blank"><span><?php echo get_the_title(url_to_postid(get_field('psy_led_tren'))); ?></span></a> </div>
<div class="post-prof"> 
<?php $psy_profesy = get_field('psy_led_prof');

if( !empty($psy_profesy) ): ?>

<?php echo $psy_profesy; ?>

<?php endif; ?> 
</div> 
<?php $psy_profesy = get_field('psy_led_prof2');

if( !empty($psy_profesy) ): ?>
<div class="autorStatname">

<a href="<?php the_field('psy_led_tren2'); ?>" target="_blank"><span><?php echo get_the_title(url_to_postid(get_field('psy_led_tren2'))); ?></span></a> 

</div>
    
 <div class="post-prof"> 


<?php echo $psy_profesy; ?>


</div> 
<?php endif; ?> 
<?php endif; ?> 

        
        </div>
        <br class="clear">
        <a name="writein"></a>
        <div class="formmob">
        
        <h3>Записаться</h3>
        <p>Заполните форму для того что бы записаться на программу. Мы свяжемся с вами для подтверждения.</p>
      <?php echo do_shortcode( '[contact-form-7 id="92" title="Записаться"]');?>
      </div>
<div class="other">

	<h3>Еще индивидуальные программы</h3>
    <br>
	<ul class="recent">
		<?php
		$countBlock = 0; $style='';
 $currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
$args = array(
	'posts_per_page' => 3,
	'post_type' => 'individual',
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
        <div>       <?php $image = get_field('psy_tren_foto');

if( !empty($image) ): ?>
  <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="204" />
  </a>
<?php endif; ?>  </div>
<?php


foreach((get_the_terms($post->ID, 'rubrika4')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>
        <a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
  <a class="btnS" href="<?php the_permalink() ?>" rel="bookmark">
 <div class="obertkaBtn">    Записаться</div>  
</a>    
<span class="psy_price">
<?php 	
$psy_cost= get_field( "psy_cost" );
if( !empty($psy_cost) ): 
echo $psy_cost.'<span> ₽</span>';

 endif; ?>
</span>
        </li>
	<?php endwhile;  endif;  ?>
	</ul>
</div>

			<?php endwhile; // end of the loop. ?>


  </div>
  <!-- #content -->

</div>

<!-- #primary -->
<?php get_footer(); ?>