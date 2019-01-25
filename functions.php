<?php
//css,js読み込み
function mypage_scripts(){
	wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	wp_enqueue_style('prism',get_template_directory_uri().'/css/prism.css');
	wp_enqueue_style('west_style',get_stylesheet_uri(),'','171231','all');
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js','', '20170716', false );
	wp_enqueue_script( 'cookiejs', '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js','', '20190116', true );
	wp_enqueue_script( 'prism', get_template_directory_uri().'/js/prism.js', array( 'jquery' ), '20180318', true );
	wp_enqueue_script( 'west-script', get_template_directory_uri().'/js/script.js', array( 'jquery' ), '20170716', true );
}
add_action('wp_enqueue_scripts','mypage_scripts');

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
   return 30;
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


// ビジュアルエディタ用CSS
add_editor_style('editor-style.css');

function custom_editor_settings( $initArray ) {
  $initArray['body_class'] = 'editor-area';
  return $initArray;
}

add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );



function syntaxCode($num) {//引数付き
	// extract(shortcode_atts(array(
	// 	'syntax' => 'markup',
	// 	'num' => 1,
	// ), $atts));
	if(empty($num)){
		$numInt = 0;//引数省略すると1番目を表示
	}else{
		$numInt = intval($num[0] - 1);//数字化
	}
	$i = 0;//初期値
	$loop = $numInt;//最大値
	$codeArea = SCF::get('codeArea');
	foreach ($codeArea as $field_value) {
		if($i > $num){//最大値＝表示したいカスタムフィールドの番号になったらループ終了
			break;
		}else{
			$txt = $field_value['codebox'];
			$code = '<pre><code class=”language-'.$field_value['syntaxType'].'”>';
			$code .= $txt;
			$code .= '</code></pre>';
			$i++;
		}
		// $txt = $field_value['codebox'];
		// $code = '<pre><code class=”language-'.$syntaxType[0].'”>';
		// $code .= $txt;
		// $code .= '</code></pre>';
		// $i++;
	}
	return $code;
}
add_shortcode('syntaxArea', 'syntaxCode');

function breadcrumb(){
  if(!is_front_page()&&!is_admin()){
    $str.= '<div class="breadcrumb"><ol class="breadcrumb_inner" class="cf"><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="home">';
    $str.= '<a href="'. home_url() .'" itemprop="url"><span itemprop="title">TOP</span></a></li>';
		if(is_home()){
			$str.='<li>ブログ</li>';
		}elseif(is_date()){//年別アーカイブページ
			$post_type = get_post_type( $post );
			$post_slug = get_post_type_object($post_type)->query_var;
			$str.='<li><a href="/'. $post_slug . '/"><span>'. get_post_type_object($post_type)->labels->singular_name .'</span></a></li>';
			$str.='<li><span>'. get_query_var('year') .'年</span></li>';
    }elseif(is_post_type_archive()) {//カスタム投稿アーカイブページ
      $post_type = get_post_type( $post );
			$str.='<li>'. get_post_type_object($post_type)->labels->singular_name .'</li>';
		}elseif(is_tax()){//カスタムタクソノミーアーカイブページ
			$term_id = get_queried_object_id();
			$term_info = get_term($term_id);
			$taxonomy = $term_info->taxonomy;
			$post_type = get_taxonomy($taxonomy)->object_type[0];
			$str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/'. $post_type . '/" itemprop="url"><span itemprop="title">'. get_post_type_object($post_type)->label . '</span></a></li>';
			$str.='<li>'. single_term_title('', $display = false) .'</li>';
    }elseif(is_category()) {//カテゴリ別一覧ページ
      $categories = get_the_category($post->ID);
      $cat = $categories[0];
			$cat_parent_id = $cat->category_parent;
			if($child_flug == 0){
				$str.='<li><span>'. $cat-> cat_name . '</span></li>';
			}else{
				$cate_parent = get_category($cat_parent_id);
				$str.='<li><a href="'. get_category_link($cat_parent_id). '"><span>'. $cate_parent-> cat_name . '</span></a></li>';
			}
		}elseif(is_single()){//個別ページ
			$post_type = get_post_type( $post );
			if($post_type == 'post'){
				$post_type_url = 'blog';
			}else{
				$post_type_url = $post_type;
			}
      $str.='<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/'. $post_type_url . '/" itemprop="url"><span itemprop="title">'. get_post_type_object($post_type)->labels->singular_name . '</span></a></li>';
      $str.='<li>'. get_the_title() .'</li>';
    }elseif(is_page()){//固定ページ
			$page = get_post( get_the_ID() );
			$parent_id = $page->post_parent;
			$parent_title = get_post($parent_id)->post_title;
			if($parent_id != 0 && !is_page('sp')){
				$str.= '<li class="breadcrumb_item"><a href="'. get_permalink($parent_id) .'" class="breadcrumb_link">'. $parent_title .'</a></li>';
			}
      $str.='<li>'. get_the_title() .'</li>';
    }else{
      $str.='<li>'. get_the_title() .'</li>';
    }
    $str.='</ol></div>';
  }
echo $str;
}


add_action( 'admin_print_footer_scripts', 'limit_category_select' );
function limit_category_select() {
	?>
	<script type="text/javascript">
		jQuery(function($) {
			// 投稿画面のカテゴリー選択を制限
			var cat_checklist = $('.categorychecklist input[type=checkbox]');
			cat_checklist.click( function() {
				$(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});

			// クイック編集のカテゴリー選択を制限
			var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
			quickedit_cat_checklist.click( function() {
				$(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});

			$('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>');
		});
	</script>
	<?php
}


?>
