<?php
function breadcrumb(){
  if(!is_front_page()&&!is_admin()){
    $str.= '<div class="breadcrumb"><ol class="breadcrumb_inner"><li class="home">';
    $str.= '<a href="'. home_url() .'"><span>TOP</span></a></li>';
		if(is_home()){
			$str.='<li>ブログ</li>';
		}elseif(is_date()){//年別アーカイブページ
			$post_type = get_post_type( $post );
			$post_slug = get_post_type_object($post_type)->query_var;
			$str.='<li><a href="'. home_url(). '/'. $post_slug . '/"><span>'. get_post_type_object($post_type)->labels->singular_name .'</span></a></li>';
			$str.='<li><span>'. get_query_var('year') .'年</span></li>';
    }elseif(is_post_type_archive()) {//カスタム投稿アーカイブページ
      $post_type = get_post_type( $post );
			$str.='<li>'. get_post_type_object($post_type)->labels->singular_name .'</li>';
    }elseif(is_category()) {//カテゴリ別一覧ページ
      $catId = get_query_var( 'cat' );
      $cat_info = get_category( $catId );
			$cat_parent_id = $cat_info->category_parent;
			if($cat_parent_id == 0){//親カテゴリ
				$str.='<li><span>'. $cat_info-> cat_name . '</span></li>';
			}else{//子カテゴリ
				$cate_parent = get_category($cat_parent_id);
				$str.='<li><a href="'. get_category_link($cat_parent_id). '"><span>'. $cate_parent-> cat_name . '</span></a></li>';
        $str.='<li><span>'. $cat_info-> cat_name . '</span></li>';
			}
		}elseif(is_tax()){//カスタムタクソノミーアーカイブページ
			$term_id = get_queried_object_id();
			$term_info = get_term($term_id);
			$taxonomy = $term_info->taxonomy;
			$post_type = get_taxonomy($taxonomy)->object_type[0];
			$str.='<li><a href="'. home_url(). '/'. $post_type . '/"><span>'. get_post_type_object($post_type)->label . '</span></a></li>';
			$str.='<li>'. single_term_title('', $display = false) .'</li>';
		}elseif(is_single()){//個別ページ
			$post_type = get_post_type( $post );
			if($post_type == 'post'){
				$post_type_url = 'blog';
			}else{
				$post_type_url = $post_type;
			}
      $str.='<li><a href="/'. $post_type_url . '/"><span>'. get_post_type_object($post_type)->labels->singular_name . '</span></a></li>';
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
