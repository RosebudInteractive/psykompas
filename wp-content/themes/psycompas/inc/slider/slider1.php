<?php

// Подключаем стили и скрипт слайдера

function wptuts_slider_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'flex-style', get_template_directory_uri() . '/inc/slider/css/flexslider.css' );	
		wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/inc/slider/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'wptuts_slider_scripts' );


// Инициализируем слайдер
	
	function wptuts_slider_initialize() { ?>
		<script type="text/javascript" charset="utf-8">
			jQuery(window).load(function() {
			  jQuery('.flexslider').flexslider({
			    animation: "slide", // вид анимация 
			    direction: "horizontal", // ориентация слайдов
		    	slideshowSpeed: 7000, // скорость смены слайдов
		    	animationSpeed: 600 // скорость анимации
			  });
			});
		</script>
	<?php }
	add_action( 'wp_head', 'wptuts_slider_initialize' );
	
	
// Создаем шаблон для слайдера
	
	function wptuts_slider_template($idc) {
		
		// Сформируем запрос к БД
		$args = array(
			'post_type' => 'slides',
            'posts_per_page' => 5,
			'tax_query' => array(
					array(
						'taxonomy' => 'cat-slides',
            			'field' => 'slug',
            			'terms' => $idc
					)
			)
		);	
		
		// Выполним запрос
		$the_query = new WP_Query( $args );
		
		// Проверка на наличие записей
		if ( $the_query->have_posts() ) {
		// Формируем шаблон для слайдера ?>
		<div class="flexslider">
			<ul class="slides">
			
				<?php		
				// Цикл
				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li>
					
					<?php // Если в записи есть ссылка то создаем ее для слайда
					if ( get_post_meta( get_the_id(), 'wptuts_slideurl', true) != '' ) { ?>
						<a href="<?php echo esc_url( get_post_meta( get_the_id(), 'wptuts_slideurl', true ) ); ?>">
					<?php }
					
					// Изображение
					echo the_post_thumbnail();
					   
					// Закрываем ссылку
					if ( get_post_meta( get_the_id(), 'wptuts_slideurl', true) != '' ) { ?>
						</a>
					<?php } ?>
					
				    </li>
				<?php endwhile; ?>
		
			</ul><!-- .slides -->
		</div><!-- .flexslider -->
		
		<?php }
		
		// Сброс данных записи
		wp_reset_postdata();
	} // конец функции

// Шорткод слайдера с параметром использовать [slider cat="ярлык категории"]
function wptuts_slider_shortcode($attr) {
	ob_start();
	wptuts_slider_template($attr['cat']);
	$slider = ob_get_clean();
	return $slider;
}
add_shortcode( 'slider', 'wptuts_slider_shortcode' );