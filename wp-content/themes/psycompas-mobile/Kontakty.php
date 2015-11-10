<?php /* Template Name: Страницы: Контакты */ ?>
<?php get_header(); ?>  
<div class="pageSite">
<div id="wrapper" class="clearfix container">		

		<div id="contentWrap" class="grid-9">
         
			<?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
     <div class="kontaktWrap"> 
    <div class="wrapKont">    
<?php $e_mail = get_field( "e-mail" );
$psy_phone = get_field( "psy_phone" );
$psy_adres = get_field( "psy_adres" );
$psy_worktime = get_field( "psy_worktime" );
$psy_workday = get_field( "psy_workday" );



if( $e_mail  ) {
    
    echo '<div class="kont-block"><span id="k1" class="psyTitle">E-mail</span> <a href="mailto:'.$e_mail.'">'.$e_mail.'</a></div><br style="clear:both;">';
	echo '<div class="kont-block"><span id="k2" class="psyTitle">Телефон</span> <span>'.$psy_phone.'</span></div><br style="clear:both;">';
	echo '<div class="kont-block"><span id="k3" class="psyTitle">Адрес</span>  <span>'.$psy_adres.'</span></div><br style="clear:both;">';
	echo '<div class="kont-block"><span id="k4" class="psyTitle">Время работы</span>  <span>'.$psy_worktime.'</span></div><br style="clear:both;">';
	echo '<div class="kont-block"><span id="k5" class="psyTitle">Рабочие дни</span> <span>'.$psy_workday.'</span></div><br style="clear:both;">';
	
} else {

    echo 'empty';
    
}

// do something with $variable
?>
</div>
<div class="siteDiskipt">
<?php 	
$psy_diskript = get_field( "psy_diskript" );
if( !empty($psy_diskript) ): 
echo $psy_diskript;

 endif; ?>
</div>
</div>
<div class="siteMap">
<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=wcBBuhhY76LtPLJXkLyprQyD7-z88eW3&width=100%&height=174"></script>
</div>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
				
						<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->
</div>
<?php get_footer(); ?>