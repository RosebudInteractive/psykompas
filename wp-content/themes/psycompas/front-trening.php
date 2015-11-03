            <div class="front-block">
<section id="block-trening-services-block" class="block-trening-services-block block block-trening block-odd">
 
<span class="title block-title">Ближайшие тренинги</span>
<div class="navTren"><a href="/treningi">Полное расписание тренингов</a></div>

<div class="content block-content">
<div class="trening-content">
      <?php

	$args = array(
	'posts_per_page' => 3,
	'post_type' => 'trening',
);
	$myposts = new WP_Query( $args );
	if($myposts->have_posts()):  while($myposts->have_posts()):  $myposts->the_post();
  $permalink =   get_permalink();	?>
<div id="trenining-<?=the_ID();?>" class="grid-3-1 trening-row first alpha odd">

<div class="psy-content">
<?php $image = get_field('psy_tren_foto');

if( !empty($image) ): ?>
  <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="280" height="282" />
  </a>
<?php endif; ?> 
</div>

<div class="trening-psy trening-psy-nothing service-caption"> 
<?php
foreach((get_the_terms($post->ID, 'rubrika')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>
<span class="psy-content">
<a href="<?php the_permalink() ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
</span> 
<span class="psy-date">
<?php 	
$psy_date = get_field( "psy_date" );
$psy_time_event =get_field( "psy_time_event" );
$psy_month_event=get_field( "psy_month_event" );
if( !empty($psy_date) ): 
echo $psy_date.' '.$psy_month_event.' '.$psy_time_event;

 endif; ?>
</span>
<span class="psy_order btnWrap">
<a href="<?php the_permalink() ?>" rel="bookmark"><div class="knopka btnXsmallW">Записаться</div></a>

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
    <?php endwhile;  endif; 
	// Восстанавливаем оригинальные данные поста
wp_reset_postdata();
	 ?>
<?php wp_reset_query(); ?>

</div>
</div> 

</section> </div>