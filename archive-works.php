<?php get_header(); ?>

<main id="main" class="main">

  <div class="kv page_kv">
    <h1 class="page_ttl"><span class="ttl_inner">WORKS</span></h1>
  </div>

  <?php breadcrumb(); ?>
  
  <section class="section">

    <div class="inner">

      <?php if (have_posts()) : ?>
      <ul class="article_list">
      <?php while (have_posts()) : the_post(); ?>
        <li class="work_item"><a href="<?php the_permalink(); ?>" class="work_body">
          <div class="work_thumb">
          <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
          <?php else: ?>
            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/noimage.jpg" />
          <?php endif; ?>
          </div>
          <div class="work_label_wrap">
            <?php
            $terms = get_the_terms( get_the_ID(), 'solutions' );
            if ( !empty($terms) ) : if ( !is_wp_error($terms) ) :
            ?>
            <?php foreach( $terms as $term ) : ?>
            <span class="work_label"><?php echo $term->name; ?></span>
            <?php endforeach; ?>
            <?php endif; endif; ?>
          </div>
          <dl class="work_doc">
            <dt class="work_doc_label">サイト名</dt>
            <dd class="work_doc_txt"><h3 class="work_ttl"><?php echo get_post_meta($post->ID, project_name, true); ?></h3></dd>
            <dt class="work_doc_label">URL</dt>
            <dd class="work_doc_txt"><p class="work_url"><?php echo get_post_meta($post->ID, project_url, true); ?></p></dd>
            <dt class="work_doc_label">公開日（制作日）</dt>
            <dd class="work_doc_txt"><time class="work_date"><?php echo get_post_meta($post->ID, project_date, true); ?></time></dd>
            <dt class="work_doc_label">概要</dt>
            <dd class="work_doc_txt">
              <p class="work_content"><?php
              $project_text = SCF::get('project_text');
              echo nl2br($project_text);
              ?></p>
            </dd>
          </dl>
        </a></li>
        <?php endwhile; ?>
      </ul>
  <?php else : ?>
  <p class="noPost">記事がありません</p>
    <?php endif; ?>

      <div class="pagination">
         <?php global $wp_rewrite;
         $paginate_base = get_pagenum_link(1);
         if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
             $paginate_format = '';
             $paginate_base = add_query_arg('paged','%#%');
         }
         else{
             $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
             user_trailingslashit('page/%#%/','paged');;
             $paginate_base .= '%_%';
         }
         echo paginate_links(array(
             'base' => $paginate_base,
             'format' => $paginate_format,
             'total' => $wp_query->max_num_pages,
             'mid_size' => 1,
             'current' => ($paged ? $paged : 1),
             'prev_text' => '<',
             'next_text' => '>',
         )); ?>
     </div>
   </div>
  </section>
</main>


<?php get_footer(); ?>
