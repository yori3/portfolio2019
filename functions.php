<?php
get_template_part('parts/fn-enqueue');

function mypage_setup(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme','mypage_setup');

//bodyに固定ページのスラッグ名を追加
function pagename_class($classes = ''){
  if (is_page()) {
    $page = get_post();
    $classes[] = $page->post_name;
  }
  return $classes;
}
add_filter('body_class', 'pagename_class');

// WordPressのバージョン情報は削除したほうがいい
remove_action('wp_head', 'wp_generator');
// ブログ投稿ツール用
remove_action('wp_head', 'rsd_link');
// Windows Live Writerは使わないので削除
remove_action('wp_head', 'wlwmanifest_link');
// Embed WPのブログカード。他サイトのアイキャッチ画像や抜粋自動埋め込み
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
// 管理画面絵文字削除
function disable_emoji()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emoji');

function custom_post_labels() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'ブログ';
	$labels->singular_name = 'ブログ';
}
add_filter( 'init', 'custom_post_labels' );


function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_mblength($length) {
	if(is_single()){
		return 160;
	}else{
		return 30;
	}
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

remove_filter('the_excerpt', 'wpautop');

function myPreGetPosts( $query ) {
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    if( $query->is_front_page() || $query->is_archive()){
      $query->set('posts_per_page', 6);
      return;
    }
}
add_action('pre_get_posts','myPreGetPosts');

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'sidebar',
		'id' => 'side_area',
		'before_widget' => '<div class="side_box">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="cont_ttl">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => 'header_widget',
		'id' => 'header_area',
		'before_widget' => '<div class="header_widget_box">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="cont_ttl">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

if ( ! function_exists( 'lab_setup' ) ) :

function lab_setup() {

	register_nav_menus( array(
		'global' => 'グローバルナビ',
	) );

}
endif;
add_action( 'after_setup_theme', 'lab_setup' );

function add_my_assets_to_block_editor() {
    wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/css/block_style.css' );
    wp_enqueue_script( 'block-custom', get_stylesheet_directory_uri() . '/js/editor/block_custom.js',array(), "", true);
}
add_action( 'enqueue_block_editor_assets', 'add_my_assets_to_block_editor' );


get_template_part('parts/fn-breadcrumb');
