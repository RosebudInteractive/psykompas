<?php
/*
Template Name: FAQ
*/

get_header(); ?>
<div id="wrapper" class="clearfix container">		
		<div id="contentWrap" class="grid-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
<div class="wrapOtzyv">
			<?php 
$paged =get_query_var( 'paged' );
$countBlock = 0;$style='';
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'otzyv',
	'paged' => $paged,
	'post_status'=>'publish'
	
);

$query = query_posts( $args );
$aPosts = array();
if (have_posts()) : while (have_posts()) : the_post();$countBlock++;
if($countBlock == 1) {
    $style='first alpha odd';
} elseif ($countBlock %2) {
    $style='last alpha odd';
} else {
    $style='middle omega odd';
}
    ob_start();
    include (TEMPLATEPATH . '/content-otzyv.php');
    $aPosts[] = ob_get_clean();
?>
<?php endwhile;?>
<div class="column1" style="width: 100%;float: left;">
    <?php foreach($aPosts as $nKey=>$sPost) if (!($nKey%2)) echo $sPost;?>
</div>
<div class="column2" style="width: 100%;float: right;">
    <?php foreach($aPosts as $nKey=>$sPost) if ($nKey%2) echo $sPost;?>
</div>
</div>
 <script>
	var load_more_type = 'faq';
</script>
<?php include (TEMPLATEPATH . '/navpage.php');?>
<?php wp_reset_query();?>
<?php else: ?>
<?php endif; ?>

		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->

		</div><!-- #content -->
        

	</div><!-- #primary -->

<?php get_footer(); ?>