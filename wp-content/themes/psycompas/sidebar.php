<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        
        	<?php endif;?>
        <div id="followblock" style="top: 0px; ">
        <div id="secondary" class="grid-2 omega">
<section id="secondary-nav" class="clearfix">
<span class="parent-title">Новости</span>
 <div class="news-block">
     <?php
$args =array( 'posts_per_page' => 5, 'order' =>  'DESC', 'orderby'=> 'date', 'category' => 62 );
					$myposts = get_posts($args);
					foreach($myposts as $post) : setup_postdata($post);
				?>
               <div id="newsDate"><?php the_time('d.m.Y') ?></div>
           
 <div class="postTitle" > <a  href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></div>
 
<?php endforeach; ?>       
<?php wp_reset_postdata() ?>
</div>

</section>


		</div><!-- #secondary -->
</div>
	