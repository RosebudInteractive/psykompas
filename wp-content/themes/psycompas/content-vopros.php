<article id="post-<?php the_ID(); ?>">
<header class="entry-header vopros">
<div class="autorVoprosname">
<?php $name_autor_psy_vopros = get_field('name_autor_psy_vopros');

if( !empty($name_autor_psy_vopros) ): ?>

<?php echo $name_autor_psy_vopros; ?>

<?php endif; ?> 
</div>

			<?php if ( is_single() ) : ?>
			<div class="entry-title"><span><?php the_title(); ?></span></div>
			<?php else : ?>
			<div class="vopros-title"><div><span><?php the_title(); ?></span></div></div> 
			<?php endif; // is_single() ?>
			
		     
<?php
foreach((get_the_terms($post->ID, 'rubrika2')) as $category) { 

		echo '<span class="categories-links"><a href="' . get_term_link($category) . '">' . $category->name  . '</a></span>';
		
	}
 ?>	

</header><!-- .entry-header -->


<div class="entry-content">
<div class="post-date"><span>В.</span><?php the_time('j F Y'); ?></div>
<div id="post-<?php the_ID(); ?>" class="shablonText">
<?php $psy_vopros_text = get_field('psy_vopros_text');

if( !empty($psy_vopros_text) ): ?>

<?php echo $psy_vopros_text; ?>

<?php endif; ?> 

</div>
</div> <!-- .entry-content -->
      
<div id="otvet_wrap_<?php the_ID()?>" class="otvet_wrap" style="display:none;">

<div class="entry-content">
<div class="post-date QA"><span>О.</span>
<?php 

$dateformatstring = "j F Y";
$unixtimestamp = strtotime(get_field('date_psy_otvet'));
if( !empty($unixtimestamp) ): 

echo date_i18n($dateformatstring, $unixtimestamp);
?>

<?php endif; ?> 
</div>
<div id="post-<?php the_ID(); ?>" class="shablonText QA">
<?php $qa_psy = get_field('qa_psy');

if( !empty($qa_psy) ): ?>
<div class="autorVoprosname">
<?php $name_autor_psy_vopros = get_field('name_autor_psy_vopros');

if( !empty($name_autor_psy_vopros) ): ?>

<?php echo $name_autor_psy_vopros.', добрый день!'; ?>

<?php endif; ?> 
</div>


<?php echo $qa_psy; ?>

<?php endif; ?> 
</div>
<div class="sideAutor">
        <div class="imgAutor">
         <?php $image = get_field('foto_psy_otvet');

if( !empty($image) ): ?>
  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php the_title(); ?>" width="156" />

<?php endif; ?> 
        </div>
<div class="autorStatname">
<?php $name_avtor_psy = get_field('psy_otvetchik_name');

if( !empty($name_avtor_psy) ): ?>

<?php echo $name_avtor_psy; ?>

<?php endif; ?> 
</div>
    
      <div class="post-prof"> 
<?php $psy_profesy = get_field('prof_psy_name');

if( !empty($psy_profesy) ): ?>

<?php echo $psy_profesy; ?>

<?php endif; ?> 
</div> 

        </div>
</div> <!-- .entry-content -->


</div><!-- .otvet -->
<div class="qaBtnWrap QA">
<a class="btnS" href="#" onclick="return toggleAnswer(this, '#otvet_wrap_<?php the_ID(); ?>');">
 <div class="obertkaBtn">  Ответ <span></span></div>  
</a>
</div>
<div class="lineQ"></div>

    </article>