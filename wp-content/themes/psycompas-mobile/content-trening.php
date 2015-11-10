<?php 

$selected = get_field('psy_order_close');

if( !empty($selected) ): ?>

	<article id="post-<?php the_ID(); ?>" class="close">



<div id="trenining-<?=the_ID();?>" class="trening-row first alpha odd">
<div class="psy-date_event">
<?php 	
$psy_date = get_field( "psy_date" );
$psy_month_event=get_field( "psy_month_event" );
$psy_year_event=get_field( "psy_year_event");
if( !empty($psy_date) ): 
echo '<span class="t_day">' .$psy_date. '</span>';
echo '<span class="t_month">' .$psy_month_event. '</span>';
echo '<span class="t_year">' .$psy_year_event. '</span>';
 endif; ?> </div>
 <div class="trenWrap">
<div class="psy-content_img">
<?php $image = get_field('psy_tren_foto');

if( !empty($image) ): ?>
  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="204" height="202" />
<?php endif; ?> 
</div>

<div class="trening-psy trening-psy-nothing service-caption"> 
<?php
foreach((get_the_terms($post->ID, 'rubrika')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>
<span class="psy-content">
<span><?php the_title(); ?></span>
<span class="psy-date">
<?php 	
$psy_time_event =get_field( "psy_time_event" );
if( !empty($psy_time_event) ): 
echo $psy_time_event;

 endif; ?>
</span>
</span> 

<div class="rightTrencatzone">
<span class="psy_price">
<?php 	
$psy_cost= get_field( "psy_cost" );
if( !empty($psy_cost) ): 
echo $psy_cost.' ₽';

 endif; ?>
</span>

<span class="psy_order">
Запись закрыта
</span>

</div>
</div>

</div> 

</div>



		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
 
  <?php else: ;?>
	 
<article id="post-<?php the_ID(); ?>"      <?php post_class(); ?>>


<div id="trenining-<?=the_ID();?>" class="trening-row first alpha odd">
<div class="psy-date_event">
<?php 	
$psy_date = get_field( "psy_date" );
$psy_month_event=get_field( "psy_month_event" );
$psy_year_event=get_field( "psy_year_event");
if( !empty($psy_date) ): 
echo '<span class="t_day">' .$psy_date. '</span>';
echo '<div><span class="t_month">' .$psy_month_event. '</span><br>';
echo '<span class="t_year">' .$psy_year_event. '</span></div>';
 endif; ?> 
 
 </div>
 
 <div class="trenWrap">
<div class="psy-content_img">
<?php $image = get_field('psy_tren_foto');

if( !empty($image) ): ?>
  <a href="<?php echo get_permalink(); ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>"width="280" height="282" />
  </a>
<?php endif; ?> 
</div>

<div class="trening-psy trening-psy-nothing service-caption"> 
<?php 
foreach((get_the_terms($post->ID, 'rubrika')) as $category) { 

		echo '<span class="categories-links">' . $category->name  . '</span>';
		
	}
	
 ?>
<span class="psy-content">
<a href="<?php echo get_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
<span class="psy-date">
<?php 	
$psy_time_event =get_field( "psy_time_event" );
if( !empty($psy_time_event) ): 
echo $psy_time_event;

 endif; ?>
</span>
</span> 

<div class="rightTrencatzone">

<span class="psy_order btnWrap">
<a href="<?php echo get_permalink(); ?>" rel="bookmark">
<div class="knopka btnXsmallW">Записаться</div></a>
</span>
<span class="psy_price">
<?php 	
$psy_cost= get_field( "psy_cost" );
if( !empty($psy_cost) ): 
echo $psy_cost.' ₽';

 endif; ?>
</span>

</div>
</div>

</div> 

</div>



		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
	 
	 <?php endif; ?>