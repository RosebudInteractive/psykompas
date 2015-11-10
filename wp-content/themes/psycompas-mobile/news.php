<?php
/*
Template Name: Новости
*/

get_header(); ?>
<div id="wrapper" class="clearfix container">		
		<div id="contentWrap" class="grid-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title">Новости</h1>
		</header>

		<div class="entry-content">
        

        
			<div class="news1">
                 <?php
					$myposts = get_posts( "category=3&numberposts=10" );
					foreach($myposts as $post) : setup_postdata($post);
				?>
               <div class="postmetadata"><?php the_time('d.m.Y') ?></div>
           
  <a href="<?php the_permalink() ?>" rel="bookmark">
     <h3> <?php the_title(); ?></h3>
      </a>
<div id="post-<?php the_ID(); ?>" style="margin-bottom:10px;">
		<p>	<?php echo truncate(get_the_excerpt()); ?>	</p>				

		 </div>
         
          
            <?php endforeach; ?>
</div>
			
			
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->


		</div><!-- #content -->


	</div><!-- #primary -->

<?php get_footer(); ?>