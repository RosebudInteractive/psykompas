<?php
/*
function use_mobile_theme() {
    // Chech device is mobile or not
    if(isMobile()){
        echo 'use mobile';
        return 'psycompas-mobile'; // set theme name here, which you want to open on mobile
    }
    else {
        echo 'use common';
        return 'psycompas'; // set theme name here, which you want to open on other devices, like desktop
    }
}
// This function is to detect device is mobile or not
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
add_filter( 'stylesheet', 'use_mobile_theme' );
add_filter( 'template', 'use_mobile_theme' );
add_filter( 'current_theme', 'use_mobile_theme');*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
register_post_type( 'trening',
array(
'labels' => array( // добавляем новые элементы в консоль
'name' => __( 'Тренинги' ),
'singular_name' => __( 'Тренинги' ),
'has_archive' => true,
'add_new' => 'Добавить новый материал',
'not_found' => 'Ничего не найдено',
'not_found_in_trash' => 'В корзине материалов не найдено'
),
'public' => true,
  'has_archive' => 'trening',
'rewrite' => array( 'slug' => 'treningi/%rubrika%', 'with_front' => false ),

'hierarchical'        => true,
'supports' => array( //добавляем элементы в редактор
'title',
'editor',
'thumbnail',
'page-attributes',
'post-formats',
'comments'
),
'taxonomies' => array('rubrika','post_tag') //добавляем к записям необходимый набор таксономий

));
}
//post 1
// Make permalinks for Recipes pretty (add Cuisine to URL)
	// -------------------------------------------------------------
	function my_post_type_link_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
    if ( strpos('%rubrika%', $post_link) === 'FALSE' ) {
      return $post_link;
    }
    $post = get_post($id);
    if ( !is_object($post) || $post->post_type != 'trening' ) {
      return $post_link;
    }
    $terms = wp_get_object_terms($post->ID, 'rubrika');
    if ( !$terms ) {
      return str_replace('treningi/%rubrika%/', '', $post_link);
    }
    return str_replace('%rubrika%', $terms[0]->slug, $post_link);
  }

add_filter('post_type_link', 'my_post_type_link_filter_function', 1, 3);

function add_new_taxonomies() {	
/* создаем функцию с произвольным именем и вставляем 
в неё register_taxonomy() */	
	register_taxonomy('rubrika',
		array('trening'),
		array(
			'hierarchical' => true,
			/* true - по типу рубрик, false - по типу меток, 
			по умолчанию - false */
			'labels' => array(
				/* ярлыки, нужные при создании UI, можете
				не писать ничего, тогда будут использованы
				ярлыки по умолчанию */
				'name' => 'Рубрика',
				'singular_label' => __('Рубрика'),
				'search_items' =>  'Найти Рубрику',
				'popular_items' => 'Популярные Рубрики',
				'all_items' => 'Все Рубрики',
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => 'Редактировать Рубрику', 
				'update_item' => 'Обновить Рубрику',
				'add_new_item' => 'Добавить новую Рубрику',
				'new_item_name' => 'Название новой Рубрики',
				'separate_items_with_commas' => 'Разделяйте Рубрики запятыми',
				'add_or_remove_items' => 'Добавить или удалить платформу',
				'choose_from_most_used' => 'Выбрать из наиболее часто используемых платформ',
				'menu_name' => 'Рубрика'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
'rewrite' =>array(
            'slug' => 'treningi',
            'with_front' => false
        ),
		)
	);
}
add_action( 'init', 'add_new_taxonomies', 0 );



add_action( 'init', 'create_post_type1' );
function create_post_type1() {
register_post_type( 'statiyi',
array(
'labels' => array( // добавляем новые элементы в консоль
'name' => __( 'Статьи' ),
'singular_name' => __( 'Статьи' ),
'has_archive' => true,
'add_new' => 'Добавить новый материал',
'not_found' => 'Ничего не найдено',
'not_found_in_trash' => 'В корзине материалов не найдено'
),
'public' => true,
  'has_archive' => 'statiyi',
       'rewrite' => array( 'slug' => 'interestnoe/%rubrika1%', 'with_front' => false ),
'hierarchical'        => true,
'supports' => array( //добавляем элементы в редактор
'title',
'editor',
'thumbnail',
'page-attributes',
'post-formats',
'comments'
),
'taxonomies' => array('rubrika1', 'post_tag') //добавляем к записям необходимый набор таксономий
));
}

	// Make permalinks for PostType pretty (add Rubrika to URL)
	// -------------------------------------------------------------
	add_filter('post_type_link', 'recipe_permalink_filter_function', 1, 3);
	function recipe_permalink_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
	    if ( strpos('%rubrika1%', $post_link) === 'FALSE' ) {
	      return $post_link;
	    }
	    $post = get_post($id);
	    if ( !is_object($post) || $post->post_type != 'statiyi' ) {
	      return $post_link;
	    }
		// this calls the term to be added to the URL
	    $terms = wp_get_object_terms($post->ID, 'rubrika1');
	    if ( !$terms ) {
	      return str_replace('interestnoe/%rubrika1%/', '', $post_link);
	    }
	    return str_replace('%rubrika1%', $terms[0]->slug, $post_link);
	}
	

function add_new_taxonomies1() {	
/* создаем функцию с произвольным именем и вставляем 
в неё register_taxonomy() */	
	register_taxonomy('rubrika1',
		array('statiyi'),
		array(
			'hierarchical' => true,
			/* true - по типу рубрик, false - по типу меток, 
			по умолчанию - false */
			'labels' => array(
				/* ярлыки, нужные при создании UI, можете
				не писать ничего, тогда будут использованы
				ярлыки по умолчанию */
				'name' => 'Рубрика-Статьи',
				'singular_label' => __('Рубрика'),
				'search_items' =>  'Найти Рубрику',
				'popular_items' => 'Популярные Рубрики',
				'all_items' => 'Все Рубрики',
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => 'Редактировать Рубрику', 
				'update_item' => 'Обновить Рубрику',
				'add_new_item' => 'Добавить новую Рубрику',
				'new_item_name' => 'Название новой Рубрики',
				'separate_items_with_commas' => 'Разделяйте Рубрики запятыми',
				'add_or_remove_items' => 'Добавить или удалить платформу',
				'choose_from_most_used' => 'Выбрать из наиболее часто используемых платформ',
				'menu_name' => 'Рубрика'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
'rewrite' =>array(
            'slug' => 'interestnoe',
            'with_front' => false
        ),
		)
	);
}
add_action( 'init', 'add_new_taxonomies1', 0 );

add_action( 'init', 'create_post_type_vopros' );
function create_post_type_vopros() {
register_post_type( 'vopros',
array(
'labels' => array( // добавляем новые элементы в консоль
'name' => __( 'Вопрос-ответ' ),
'singular_name' => __( 'Вопрос-ответ' ),
'has_archive' => true,
'add_new' => 'Добавить новый материал',
'not_found' => 'Ничего не найдено',
'not_found_in_trash' => 'В корзине материалов не найдено'
),
'public' => true,
  'has_archive' => 'vopros',
'rewrite' => array( 'slug' => 'vopros-otvet/%rubrika2%', 'with_front' => false ),

'hierarchical'        => true,
'supports' => array( //добавляем элементы в редактор
'title',
'editor',
'thumbnail',
'page-attributes',
'post-formats',
'comments'
),
'taxonomies' => array('rubrika2','post_tag') //добавляем к записям необходимый набор таксономий

));
}
//post 1
// Make permalinks for Recipes pretty (add Cuisine to URL)
	// -------------------------------------------------------------
	function vopros_type_link_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
    if ( strpos('%rubrika2%', $post_link) === 'FALSE' ) {
      return $post_link;
    }
    $post = get_post($id);
    if ( !is_object($post) || $post->post_type != 'vopros' ) {
      return $post_link;
    }
    $terms = wp_get_object_terms($post->ID, 'rubrika2');
    if ( !$terms ) {
      return str_replace('vopros-otvet/%rubrika2%/', '', $post_link);
    }
    return str_replace('%rubrika2%', $terms[0]->slug, $post_link);
  }

add_filter('post_type_link', 'vopros_type_link_filter_function', 1, 3);

function add_new_taxonomies_vopros() {	
/* создаем функцию с произвольным именем и вставляем 
в неё register_taxonomy() */	
	register_taxonomy('rubrika2',
		array('vopros'),
		array(
			'hierarchical' => true,
			/* true - по типу рубрик, false - по типу меток, 
			по умолчанию - false */
			'labels' => array(
				/* ярлыки, нужные при создании UI, можете
				не писать ничего, тогда будут использованы
				ярлыки по умолчанию */
				'name' => 'Рубрика',
				'singular_label' => __('Рубрика'),
				'search_items' =>  'Найти Рубрику',
				'popular_items' => 'Популярные Рубрики',
				'all_items' => 'Все Рубрики',
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => 'Редактировать Рубрику', 
				'update_item' => 'Обновить Рубрику',
				'add_new_item' => 'Добавить новую Рубрику',
				'new_item_name' => 'Название новой Рубрики',
				'separate_items_with_commas' => 'Разделяйте Рубрики запятыми',
				'add_or_remove_items' => 'Добавить или удалить платформу',
				'choose_from_most_used' => 'Выбрать из наиболее часто используемых платформ',
				'menu_name' => 'Рубрика'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
'rewrite' =>array(
            'slug' => 'vopros-otvet',
            'with_front' => false
        ),
		)
	);
}
add_action( 'init', 'add_new_taxonomies_vopros', 0 );
add_action( 'init', 'create_post_type3' );
function create_post_type3() {
register_post_type( 'otzyv',
array(
'labels' => array( // добавляем новые элементы в консоль
'name' => __( 'Отзывы' ),
'singular_name' => __( 'Отзывы' ),
'has_archive' => true,
'add_new' => 'Добавить новый материал',
'not_found' => 'Ничего не найдено',
'not_found_in_trash' => 'В корзине материалов не найдено'
),
'public' => true,
'has_archive' => true,
'supports' => array( //добавляем элементы в редактор
'title',
'editor',
'thumbnail',
'page-attributes',
'post-formats',
'comments'
),
'taxonomies' => array('category', 'post_tag') //добавляем к записям необходимый набор таксономий
));
}
add_action( 'init', 'create_post_type4' );
function create_post_type4() {
register_post_type( 'individual',
array(
'labels' => array( // добавляем новые элементы в консоль
'name' => __( 'Индивидуальные программы' ),
'singular_name' => __( 'Индивидуальные программы' ),
'has_archive' => true,
'add_new' => 'Добавить новый материал',
'not_found' => 'Ничего не найдено',
'not_found_in_trash' => 'В корзине материалов не найдено'
),
'public' => true,
  'has_archive' => 'individual',
'rewrite' => array( 'slug' => 'individualnye-programmy/%rubrika4%', 'with_front' => false ),
'hierarchical'        => true,
'supports' => array( //добавляем элементы в редактор
'title',
'editor',
'thumbnail',
'page-attributes',
'post-formats',
'comments'
),
'taxonomies' => array('rubrika4') //добавляем к записям необходимый набор таксономий
));
}

// Make permalinks for PostType pretty (add Rubrika4 to URL)
	// -------------------------------------------------------------
	
  function individual_post_type_link_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
    if ( strpos('%rubrika4%', $post_link) === 'FALSE' ) {
      return $post_link;
    }
    $post = get_post($id);
    if ( !is_object($post) || $post->post_type != 'individual' ) {
      return $post_link;
    }
    $terms = wp_get_object_terms($post->ID, 'rubrika4');
    if ( !$terms ) {
      return str_replace('individualnye-programmy/%rubrika4%/', '', $post_link);
    }
    return str_replace('%rubrika4%', $terms[0]->slug, $post_link);
  }

add_filter('post_type_link', 'individual_post_type_link_filter_function', 1, 3);



function add_new_taxonomies4() {	
/* создаем функцию с произвольным именем и вставляем 
в неё register_taxonomy() */	
	register_taxonomy('rubrika4',
		array('individual'),
		array(
			'hierarchical' => true,
			/* true - по типу рубрик, false - по типу меток, 
			по умолчанию - false */
			'labels' => array(
				/* ярлыки, нужные при создании UI, можете
				не писать ничего, тогда будут использованы
				ярлыки по умолчанию */
				'name' => 'Рубрика-Индивидуальные программы',
				'singular_label' => __('Рубрика'),
				'search_items' =>  'Найти Рубрику',
				'popular_items' => 'Популярные Рубрики',
				'all_items' => 'Все Рубрики',
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => 'Редактировать Рубрику', 
				'update_item' => 'Обновить Рубрику',
				'add_new_item' => 'Добавить новую Рубрику',
				'new_item_name' => 'Название новой Рубрики',
				'separate_items_with_commas' => 'Разделяйте Рубрики запятыми',
				'add_or_remove_items' => 'Добавить или удалить платформу',
				'choose_from_most_used' => 'Выбрать из наиболее часто используемых платформ',
				'menu_name' => 'Рубрика'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
'rewrite' => array('slug' => 'individualnye-programmy' ),
		)
	);
}
add_action( 'init', 'add_new_taxonomies4', 1);
function prefix_pre_get_posts($query) {
     if ($query->is_category) {
          $query->set('post_type', 'any');
     }
     return $query;
}
 
add_action('pre_get_posts', 'prefix_pre_get_posts');

function prefix_pre_get_posts1($query) {
     if ($query->is_tag) {
          $query->set('post_type', 'any');
     }
     return $query;
}
 
add_action('pre_get_posts', 'prefix_pre_get_posts1');

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

// Если изображение отсутствует, то выводим изображение по умолчанию (указать путь к изображению)
  if(empty($first_img)){
    $first_img = "/wp-content/themes/twentyten/images/katalog/mem.png";
  }
  return $first_img;
}
?>
<?php
function recent_comments($src_count=10, $src_length=10000, $pre_HTML='<ul>', $post_HTML='') {
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,
SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC
LIMIT $src_count";
$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
foreach ($comments as $comment) {
$output .= "<li><a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID . "\" title=\"on " . $comment->post_title . "\">" . strip_tags($comment->com_excerpt) ."</a></li>";
}
$output .= $post_HTML;
echo $output;
}


?>
<?php

function kama_recent_comments($limit=10, $ex=45, $cat=0, $echo=1, $gravatar=''){
	global $wpdb;
	if($cat){
		$IN = (strpos($cat,'-')===false)?"IN ($cat)":"NOT IN (".str_replace('-','',$cat).")";
		$join = "LEFT JOIN $wpdb->term_relationships rel ON (p.ID = rel.object_id)
		LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id)";
		$and = "AND tax.taxonomy = 'category'
		AND tax.term_id $IN";
	}
	$sql = "SELECT comment_ID, comment_date, comment_post_ID, comment_content, post_title, guid, comment_author, comment_author_email
	FROM $wpdb->comments com
		LEFT JOIN $wpdb->posts p ON (com.comment_post_ID = p.ID) {$join}
    WHERE comment_approved = '1'
		AND comment_type = '' {$and}
	ORDER BY comment_date DESC
    LIMIT $limit"; 

    $results = $wpdb->get_results($sql);

    $out = '';
    foreach ($results as $comment){

		if($gravatar)
			$grava = "<img src='http://www.gravatar.com/avatar/". md5($comment->comment_author_email) ."?s=$gravatar alt='' width='$gravatar' height='$gravatar' />";
		$comtext = strip_tags($comment->comment_content);
		$leight = (int) iconv_strlen( $comtext, 'utf-8' );
		if($leight > $ex) $comtext =  iconv_substr($comtext,0,$ex, 'UTF-8').' …';	
		$otzivdiv="<a href='". get_comment_link($comment->comment_ID) ."' title='к записи: {$comment->post_title}'>". $comment->post_title ."</a>";
		$otzivdiv1="Рассольный»";
		if($comment->post_title=="Оставить отзыв вы можете заполнив форму"){
		$otzivdiv2=$otzivdiv1;}
		else
		{$otzivdiv2=$otzivdiv;}
		$date_otz1=strtotime($comment->comment_date);
		$date_otz2=date('d.m.y', $date_otz1);

		$out .= "\n<strong><span>".strip_tags($comment->comment_author).". ".$date_otz2."</span></strong>
<li class='allcomments'>$grava<b> </b>{$comtext}<br><br>";

	}

    if ($echo) echo $out;
	else return $out;
} ?>
<?php
function truncate($string, $length = 200, $etc = ' ', $break_words = false)
{
    if ($length == 0)
        return '';

    if (strlen($string) > $length) {
        $length -= strlen($etc);
        if (!$break_words)
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
      
        return substr($string, 0, $length).$etc;
    } else
        return $string;
}
?>
<?php
function excerpt($num) {
$limit = $num+1;
$excerpt = explode(' ', get_the_excerpt(), $limit);
array_pop($excerpt);
$excerpt = implode(" ",$excerpt)."  ";
echo $excerpt;
}


function content($num) {
$theContent = get_the_content();
$output = preg_replace('/<img[^>]+./','', $theContent);
$limit = $num+1;
$content = explode(' ', $output, $limit);
array_pop($content);
$content = implode(" ",$content)."...";
echo $content;
}

function title($num) {
$limit = $num+1;
$title = explode(' ', get_the_title(), $limit);
array_pop($excerpt);
$title = implode(" ",$title)."...";
echo $title;
}
?>
<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'PsyCompas' ) );
	register_nav_menus( array(
	'primary' => 'Меню в шапке',
	'stat_menu' => 'Меню рубрик в разделе Статьи',
	'trening_menu' => 'Меню рубрик в разделе Тренинги',
	'vopros_menu' => 'Меню рубрик в разделе Вопросы',
	'individual_menu' => 'Меню рубрик в разделе Индивидуальные',
) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}
/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );
		function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );
function psycompas_get_font_url1() {
	$font_url1 = '';

	/* translators: If there are characters in your language that are not supported
	 * by PT+Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'PT+Serif font: on or off', 'psycompas' ) ) {
		$subsets1 = 'latin,latin-ext';

		/* translators: To add an additional PT+Serif character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'PT+Serif font: add new subset (greek, cyrillic, vietnamese)', 'psycompas' );

		if ( 'cyrillic' == $subset )
			$subsets1 .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets1 .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets1 .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'PT+Serif:400italic,700italic,400,700',
			'subset' => $subsets1,
		);
		$font_url1 = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url1;
}
/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function psycompas_scripts_styles1() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'psycompas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url1 = psycompas_get_font_url1();
	if ( ! empty( $font_url1 ) )
		wp_enqueue_style( 'psycompas-fonts', esc_url_raw( $font_url1 ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'psycompas-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'psycompas-ie', get_template_directory_uri() . '/css/ie.css', array( 'psycompas-style' ), '20121010' );
	$wp_styles->add_data( 'psycompas-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'psycompas_scripts_styles1' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses psycompas_get_font_url1() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
$font_url1 = psycompas_get_font_url1();
	if ( ! empty( $font_url1 ) )
		wp_enqueue_style( 'psycompas-fonts', esc_url_raw( $font_url1 ), array(), null );
		function psycompas_mce_css1( $mce_css ) {
	$font_url1 = psycompas_get_font_url1();

	if ( empty( $font_url1 ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url1 ) );

	return $mce_css;
}
add_filter( 'mce_css', 'psycompas_mce_css1' );
/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *

 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

/**
 * от мишы :)
 */
function true_loadmore_scripts() {
    wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
    wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/loadmore.js', array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

function true_load_posts(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
	$countBlock = 0;$style='';
    $q = new WP_Query($args);
    if( $q->have_posts() ):
        while($q->have_posts()): $q->the_post();
		$countBlock++;
if($countBlock == 1) {
    $style='fisrt alpha odd';
} elseif ($countBlock  %2) {
    $style='last alpha odd';
} else {
    $style='middle alpha odd';
}
            switch(get_post_type($q->post_id)) {
                case 'trening':
                    get_template_part( 'content', 'trening' );
                    break;
				case 'individual':
                    get_template_part( 'content', 'individual' );
                    break;
                case 'statiyi':
                    get_template_part( 'content', 'statiyi' );
                    break;
                case 'vopros':
                    get_template_part( 'content', 'vopros' );
                    break;
                case 'otzyv':
                    $style='middle alpha odd';
                    include (TEMPLATEPATH . '/content-otzyv.php');
                    break;
            }
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');



function tr_pre_redefining_query($query) {
	if ($query->is_tax) { // вот оно, определение нужной страницы
		$query->set('post_type', array('post', 'trening','individual','statiyi','vopros'));
	}
	return $query;
}
 
add_filter('pre_get_posts', 'tr_pre_redefining_query');


function my_permalink_function(){
	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure('/%category%/%postname%.html');
	$wp_rewrite->flush_rules();
}
add_action('init', 'my_permalink_function');

add_filter('user_trailingslashit', 'remcat_function'); function remcat_function($link) { return str_replace("/category/", "/", $link); } add_action('init', 'remcat_flush_rules'); function remcat_flush_rules() { global $wp_rewrite; $wp_rewrite->flush_rules(); } add_filter('generate_rewrite_rules', 'remcat_rewrite'); function remcat_rewrite($wp_rewrite) { $new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2)); $wp_rewrite->rules = $new_rules + $wp_rewrite->rules; }
// -------------------------------------------------------------
	// FIX - Makes permalinks work!
	// This must come at the end of your LAST custom post type
	// REMOVE after development (when everything's working!)
	// flush_rewrite_rules(); -------------------------------------------------------------
	
	// -------------------------------------------------------------
	
/*Мои настройки*/
 
/*Мои настройки*/
 
function my_adress(){
   add_settings_field(
      'adress',
      'Телефон в шапке сайта',
      'callback_adress',
      'general'
);
   register_setting(
      'general',
      'our_adress'
);
}
add_action('admin_init', 'my_adress');
function callback_adress(){
   echo "<input class='regular-text' type='text' name='our_adress' value='". esc_attr(get_option('our_adress'))."'>";
}
