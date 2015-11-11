<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <meta name="robots" content="index,follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="apple-touch-icon" sizes="57x57" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php get_template_directory(); ?>/fav/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/android-chrome-144x144.png" sizes="144x144">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/android-chrome-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/android-chrome-72x72.png" sizes="72x72">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/android-chrome-48x48.png" sizes="48x48">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/android-chrome-36x36.png" sizes="36x36">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php get_template_directory(); ?>/fav/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php get_template_directory(); ?>/fav/manifest.json">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
    

	<link rel="stylesheet" type="text/css" href="/wp-content/themes/psycompas/css/styledrop.css" />
	<script type='text/javascript' src='/wp-content/themes/psycompas/js/select.js'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript" src="/wp-content/themes/psycompas/js/ui.core.js"></script>
   	<script type="text/javascript" src="/wp-content/themes/psycompas/js/jquery.cookie.js">
	
	
	
	</script>
	
   </head>

<body <?php body_class(); ?>>
	<header id="header" class="clearfix">
    <div class="container">


<span id="logo">
 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png"></a> 
</span>


         <nav id="access" role="navigation">			
         	<!-- Main Menu -->

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '','items_wrap' => '<ul>%3$s<li id="item-id"><a href="/?theme=common">Обычная версия сайта</a> </li></ul>' ) ); ?>

 
		</nav><!-- #site-navigation -->    
         	
        <span class="toggle-mobile"><span class="icon">Переключение навигации</span></span>

 
         <div class="phone_call btnWrap"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Заказать звонок" rel="home" onclick="return openModal('#callWin');"> <div class="knopkaR btnNormalR">Заказать звонок</div></a></div>
   
    </div>
	</header><!-- #masthead -->


<div id="primary" class="full-page">