<?php

// Пользовательский тип записи для слайдера
	
	function register_slides_posttype() {
		$labels = array(
			'name' 				=> _x( 'Слайды', 'post type general name' ),
			'singular_name'		=> _x( 'Слайд', 'post type singular name' ),
			'add_new' 			=> __( 'Добавить новый' ),
			'add_new_item' 		=> __( 'Добавить новый слайд' ),
			'edit_item' 		=> __( 'Редактировать слайд' ),
			'new_item' 			=> __( 'Новый слайд' ),
			'view_item' 		=> __( 'Смотреть слайд' ),
			'search_items' 		=> __( 'Найти слайды' ),
			'not_found' 		=> __( 'Слайд' ),
			'not_found_in_trash'=> __( 'Слайд' ),
			'parent_item_colon' => __( 'Слайд' ),
			'menu_name'			=> __( 'Слайды' )
		);
		
		$supports = array('title','thumbnail','cat-slides');
		
		$post_type_args = array(
			'labels' 			=> $labels,
			'singular_label' 	=> __('Slide'),
			'public' 			=> true, // публичный тип
			'show_ui' 			=> true, // отображать на панели админа
			'publicly_queryable'=> true, // разрешаем запросы к этому типу записей из шаблона
			'query_var'			=> true, 
			'capability_type' 	=> 'post', // группа разрешений
			'has_archive' 		=> false, // без поддержки архивов
			'hierarchical' 		=> true, // иерархический, будут категории
			'rewrite' 			=> array('slug' => 'slides', 'with_front' => false ), // правило записи урлов, префикс slides но не показываем 
			'supports' 			=> $supports,
			'menu_position' 	=> 27, // Позиция в меню
			'menu_icon' 		=> get_template_directory_uri() . '/inc/slider/images/icon.png' // иконка на панели в админке
		 );
		 register_post_type('slides',$post_type_args);
	}
	add_action('init', 'register_slides_posttype');

// Таксономия для слайдов
function my_taxonomies_slider() {
  $labels = array(
    'name'              => _x( 'Категории слайдов', 'taxonomy general name' ),
    'singular_name'     => _x( 'Категория слайдов', 'taxonomy singular name' ),
    'search_items'      => __( 'Найти категорию слайдов' ),
    'all_items'         => __( 'Все категории слайдов' ),
    'parent_item'       => __( 'Родительская категория слайдов' ),
    'parent_item_colon' => __( 'Родительская категория слайдов:' ),
    'edit_item'         => __( 'Редактировать категорию слайдов' ), 
    'update_item'       => __( 'Обновить категорию слайдов' ),
    'add_new_item'      => __( 'Добавить новую категорию слайдов' ),
    'new_item_name'     => __( 'Новая категория слайдов' ),
    'menu_name'         => __( 'Категории слайдов' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true, // если true значит используются категории, иначе теги
  );
  register_taxonomy( 'cat-slides', 'slides', $args );
}
add_action( 'init', 'my_taxonomies_slider',0);

// Meta Box для URL картинки

	$slidelink_2_metabox = array( 
		'id' => 'slidelink', // идентификатор
		'title' => 'Ссылка на слайд', // заголовок
		'page' => array('slides'), // для всех записей типа slides
		'context' => 'normal',
		'priority' => 'default',
		'fields' => array( // единственное поле для URL
					
					array(
						'name' 			=> 'URL слайда',
						'desc' 			=> '',
						'id' 				=> 'wptuts_slideurl',
						'class' 			=> 'wptuts_slideurl',
						'type' 			=> 'text',
						'rich_editor' 	=> 0,			
						'max' 			=> 0				
					),
					)
	);			
				
	add_action('admin_menu', 'wptuts_add_slidelink_2_meta_box');
	function wptuts_add_slidelink_2_meta_box() {
	
		global $slidelink_2_metabox;		
	
		foreach($slidelink_2_metabox['page'] as $page) {
			add_meta_box($slidelink_2_metabox['id'], $slidelink_2_metabox['title'], 'wptuts_show_slidelink_2_box', $page, 'normal', 'default', $slidelink_2_metabox);
		}
	}
	
	// функция отображения метабокса
	function wptuts_show_slidelink_2_box()	{
		global $post;
		global $slidelink_2_metabox;
		global $wptuts_prefix;
		global $wp_version;
		
		// используем nonce для проверки
		echo '<input type="hidden" name="wptuts_slidelink_2_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
		
		echo '<table class="form-table">';
	
		foreach ($slidelink_2_metabox['fields'] as $field) {
			
			// получаем текущие данные записи
			$meta = get_post_meta($post->ID, $field['id'], true);
			
			echo '<tr>',
					'<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
					'<td class="wptuts_field_type_' . str_replace(' ', '_', $field['type']) . '">';
			switch ($field['type']) {
				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
					break;
			}
			echo    '<td>',
				'</tr>';
		}
		
		echo '</table>';
	}	
	
	// Сохранение введенной ссылки
	add_action('save_post', 'wptuts_slidelink_2_save');
	function wptuts_slidelink_2_save($post_id) {
		global $post;
		global $slidelink_2_metabox;
		
		// проверка
		if (!wp_verify_nonce($_POST['wptuts_slidelink_2_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}
	
		// проверка автосохранения
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
	
		// проверка разрешения прав на редактирование
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		foreach ($slidelink_2_metabox['fields'] as $field) {
		
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
			
			if ($new && $new != $old) {
				if($field['type'] == 'date') {
					$new = wptuts_format_date($new);
					update_post_meta($post_id, $field['id'], $new);
				} else {
					if(is_string($new)) {
						$new = $new;
					} 
					update_post_meta($post_id, $field['id'], $new);
					
				}
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}