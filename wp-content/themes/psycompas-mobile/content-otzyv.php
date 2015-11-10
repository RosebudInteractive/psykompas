<div class="otzyvBlock <? echo $style;?>" >
  <p><?php $text_otzyv_psy = get_field('text_otzyv_psy');

if( !empty($text_otzyv_psy) ): ?>

<?php echo $text_otzyv_psy; ?>

<?php endif; ?> </p>
  <div class="otzyvName"><?php $name_psy_otzyv = get_field('name_psy_otzyv');

if( !empty($name_psy_otzyv) ): ?>

<?php echo $name_psy_otzyv; ?>

<?php endif; ?></div>


</div>
<footer class="entry-meta">
			<?php edit_post_link( __( 'Редактировать', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->