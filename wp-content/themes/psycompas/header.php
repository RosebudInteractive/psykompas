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
	<script async type='text/javascript' src='/wp-content/themes/psycompas/js/select.js'></script>
    <script async src='https://www.google.com/recaptcha/api.js'></script>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script  type='text/javascript' src='/wp-includes/js/jquery/jquery.js?ver=1.11.3'></script>
    <script async type='text/javascript' src='/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
    <script async type='text/javascript' src='/wp-content/themes/psycompas/loadmore.js?ver=4.3.1'></script>
	<script async type="text/javascript" src="/wp-content/themes/psycompas/js/ui.core.js"></script>
   	<script async type="text/javascript" src="/wp-content/themes/psycompas/js/jquery.cookie.js"></script>
   	<script async type="text/javascript" src="/wp-content/themes/psycompas/js/jquery.scroll-follow.js"></script>	
	<script type="text/javascript">
   		jQuery( document ).ready( function ()
			{
				jQuery( '#followblock' ).scrollFollow(
					{
						speed: 1000,
						offset: 60,
						killSwitch: 'offLink',
						onText: 'Не преследуй меня!',
						offText: 'Давай за мной!'
					}
				);
			}
		);
   	</script>
</head>

<body <?php body_class(); ?>>
<div class="pageSite">
	<header id="header" class="clearfix">
    <div class="container">
        <hgroup>
        <div class="grid-4">
			<!-- <h1 id="logo">
 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php bloginfo( 'name' ); ?></a> 
</h1> -->
<span id="logo">
 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php bloginfo( 'name' ); ?></a> 
</span>
            </div>
            <div class="grid-4-1">
                        <div class="F-contakts"><a href="mailto: <?php bloginfo('admin_email'); ?>" title="Написать нам" target="_blank">       <?php bloginfo('admin_email'); ?></a>
   <span> <?php echo  get_option('our_adress');  ?></span>       
         </div>
         </div>
         <div class="grid-2-1">
         <div class="phone_call btnWrap"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Заказать звонок" rel="home" onclick="return openModal('#callWin');"> <div class="knopkaR btnNormalR">Заказать звонок</div></a></div>
         </div>
		<nav id="access" role="navigation" class="grid-12">			
         	<!-- Main Menu -->
				<div id="mainmenu" class="menu-main-container grid-7">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '') ); ?>
           
            </div>
             <div class="grid-2-1">
             <div class="askQ btnWrap"><a href="#" title="psycompas.ru" rel="home" onclick="return openModal('#questionWin');"><div class="knopka btnsmallW">
Задать вопрос психологу</div></a></div>
             <div class="answerQ"><a href="/vopros-otvet">Ответы</a></div>
             </div>
		</nav><!-- #site-navigation -->

		</hgroup>
</div>

	</header><!-- #masthead -->
    </div>

<div id="primary" class="full-page">