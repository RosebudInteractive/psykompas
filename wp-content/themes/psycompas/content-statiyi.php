 <article id="post-<?php the_ID(); ?>" class="middle alpha odd">
      <div class="entry-content">
<div class="wrapNewsimg">

<span class="field-content">
<?php $image = get_field('foto_staya_psy');

if( !empty($image) ): ?>
  <a href="<?php echo get_permalink(); ?>" rel="bookmark"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="204" />
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

<a class="btnS" href="<?php echo get_permalink(); ?>" rel="bookmark">
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