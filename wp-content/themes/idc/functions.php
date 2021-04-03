<?php
define('THEME_PATH',dirname(__FILE__));
define('THEME_URL',get_bloginfo('stylesheet_directory'));
define('IMG',get_bloginfo('stylesheet_directory')."/images");
define('HOME',home_url());
//remove_action( 'load-update-core.php', 'wp_update_plugins' );
//add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
require_once(THEME_PATH.'/includes/theme_support.php');
add_action('wp_enqueue_scripts','add_asset');
function add_asset(){
	$v = "1.0.2";
	wp_enqueue_script('jquery');
    wp_enqueue_style('bootstrap.min',THEME_URL.'/css/bootstrap.min.css',array(), $v, 'all');
    wp_enqueue_script('owl.carousel.min',THEME_URL.'/js/owl.carousel.min.js');
    wp_enqueue_script('main',THEME_URL.'/js/main.js',array(), $v);
    wp_enqueue_style('owl.carousel',THEME_URL.'/css/owl.carousel.css');
    wp_enqueue_style('default',THEME_URL.'/css/default.css',array(), $v, 'all');
    wp_enqueue_style('theme',THEME_URL.'/css/theme.css',array(), $v, 'all');
    wp_enqueue_style('responsive',THEME_URL.'/css/responsive.css',array(), $v, 'all');
}
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(); 
}
require_once(THEME_PATH.'/includes/create_post_type.php');
create_post_type("Products","product","product",array( 'title','editor','thumbnail'));
?>