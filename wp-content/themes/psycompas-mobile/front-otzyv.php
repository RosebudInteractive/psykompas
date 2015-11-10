<div class="front-block2">
<section id="block-trening-services-block" class="block-trening-services-block block block-trening block-odd">
<div class="otzyvWrap">
<span class="title block-title">Отзывы</span>
<div class="navOtzyv unerborder"><a href="/otzyvy">Все отзывы</a></div>
</div>
<?php $args = array(
	'posts_per_page' => 1,
	'post_type' => 'otzyv',
);

$query = new WP_Query( $args );

// Цикл
$query = query_posts( $args );
if (have_posts()) : while (have_posts()) : the_post();
?>
<div class="OtzyvfrotnWrap">
<div class="otzyvContent">
  <p><?php $text_otzyv_psy = get_field('text_otzyv_psy');

if( !empty($text_otzyv_psy) ): ?>

<?php echo $text_otzyv_psy; ?>

<?php endif; ?>  </p>
          </div>
          
<div class="otzyvAutor"><?php $name_psy_otzyv = get_field('name_psy_otzyv');

if( !empty($name_psy_otzyv) ): ?>

<?php echo $name_psy_otzyv; ?>

<?php endif; ?></div>
<div class="otzyvRubrika"><a href="<?php the_field('otzyv_rubrika_psy'); ?>"><span><?php echo get_the_title(url_to_postid(get_field('otzyv_rubrika_psy'))); ?></span></a></div>

</div>
<?php endwhile; 
else: ?>
<?php endif; ?>
<?php wp_reset_query();?>
</section>
</div>