<?php
//css,js読み込み
function mypage_scripts(){
	define('TEMPLATE_CSS_DIRE', get_template_directory_uri().'/css/');
  define('TEMPLATE_JS_DIRE', get_template_directory_uri().'/js/');
  define('TEMPLATE_CSS_PATH', get_template_directory().'/css/');
  define('TEMPLATE_JS_PATH', get_template_directory().'/js/');

  function wp_css($file_name){
    wp_enqueue_style('site_'.$file_name,TEMPLATE_CSS_DIRE.$file_name.'.css', array(), date('Ymd', filemtime(TEMPLATE_CSS_PATH.$file_name.'.css')));
  }

  function wp_js($file_name, $bool = true){
    wp_enqueue_script('site_'.$file_name,TEMPLATE_JS_DIRE.$file_name.'.js', array('jquery'), date('Ymd', filemtime(TEMPLATE_JS_PATH.$file_name.'.js')), $bool);
  }

	wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	wp_enqueue_style('ionicons','//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');

	wp_css('style');

  if(is_front_page()){
		wp_css('top');
  }elseif(is_home() || is_date() || is_single()) {
		wp_css('prism');
		wp_css('blog');
  }elseif(is_post_type_archive() || is_tax()) {
    $post_type = get_post_type( $post );
    wp_css($post_type);
  }elseif(is_page()){
    $page = get_post( get_the_ID() );
    $parent_id = $page->post_parent;
    $parent_slug = get_post($parent_id)->post_name;
    if($parent_id != 0){
    var_dump($parent_slug);
      wp_css($parent_slug);
    }else{
      $slug_name = basename(get_permalink());
      wp_css($slug_name);
    }
  }


	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js','', '20170716', false );
	wp_enqueue_script( '', '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js','', '', true );

	if(is_single()){
		wp_js('prism');
	}

	wp_js('script');
}
add_action('wp_enqueue_scripts','mypage_scripts');
