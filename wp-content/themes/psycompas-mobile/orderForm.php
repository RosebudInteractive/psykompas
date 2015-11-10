<?php /* Template Name: Order  */ ?>
<?php get_header(); ?> 
<script type="text/javascript">
function out(){  
var val = document.getElementById('sel').value  
var parent = document.getElementById('list');   

document.getElementById('changeName').value=val;

}
	
</script> 
	<div class="block">
	<form name="myForm">
	<span class="jkfdskljdfs">Кому*</span>
	<select onBlur="out()" id="sel" style="font-size: 16px;    height: 24px;border: 1px solid #888888;    left: -247px;    margin-bottom: 0;    margin-left: 50%;    margin-top: 68px;    position: absolute;    text-align: center;    width: 398px;">
	<option  value="1052">PsyCompas</option>
		   <?php 
	$books = new WP_Query('post_type=trening&post_status=publish'); if($books->have_posts()):  while($books->have_posts()):  $books->the_post(); ?>
  <option id="list" value="<?php the_ID(); ?>"><?php the_title(); ?></option>
    <?php endwhile;  endif;  ?>
	</select>
	</form>
	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
    <?php comments_template( '/comments_order.php'); ?>  
    <?php kama_recent_comments(1000, 40000); ?>
	<?php the_content(); ?>
    <?php endwhile;  endif; ?>
	</div>
<?php get_footer(); ?>  