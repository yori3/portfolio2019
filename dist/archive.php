<?php get_header(); ?>

<main id="main" class="main">
  <?php $postTypeSlug = get_query_var('post_type'); ?>
  <div class="kv page_kv">
    <h1 class="page_ttl"><span class="ttl_inner"><?php echo $postTypeSlug; ?></span></h1>
  </div>

  <?php breadcrumb(); ?>

  <section class="section">
    <div class="inner">

      <?php if (have_posts()) : ?>
      <ul class="article_list">
      <?php while (have_posts()) : the_post(); ?>
        <li class="article_item"><a href="<?php the_permalink(); ?>" class="article_body">
          <div class="article_thumb">
          <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
          <?php else: ?>
            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/noimage.jpg" />
          <?php endif; ?>
          </div>
          <div class="article_doc">
            <h2 class="article_ttl"><?php the_title(); ?></h3>
            <time class="article_date"><?php echo get_the_date(); ?></time>
            <p class="article_content"><?php the_excerpt(); ?></p>
          </div>
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
             'prev_text' => '',
             'next_text' => '',
         )); ?>
     </div>
    </div>
  </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
