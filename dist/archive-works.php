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
        <li class="works__item"><a href="<?php the_permalink(); ?>" class="works__body">
          <div class="works__thumb">
          <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail(); ?>
          <?php else: ?>
            <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/noimage.jpg" />
          <?php endif; ?>
          </div>
          <h3 class="works__ttl"><?php the_title(); ?></h3>
          <div class="works__labels">
            <?php
            $terms = get_the_terms( get_the_ID(), 'solutions' );
            if ( !empty($terms) ) : if ( !is_wp_error($terms) ) :
            ?>
            <?php foreach( $terms as $term ) : ?>
            <span class="works__labels-item"><?php echo $term->name; ?></span>
            <?php endforeach; ?>
            <?php endif; endif; ?>
          </div>
          <div class="works__content">
            <?php the_content(); ?>
          </div>
        </a></li>
        <?php endwhile; ?>
      </ul>

      <div class="pagination">
        <?php
          $max_page = $wp_query->max_num_pages;
          $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        ?>
        <?php if($max_page == 1){ ?>
          <span class="page-numbers current">1</span>
        <?php }else{ ?>
        <?php global $wp_rewrite;
          $paginate_base = get_pagenum_link(1);
          if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
            $paginate_format = '';
            $paginate_base = add_query_arg('paged','%#%');
          }else{
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
        <?php } ?>
     </div>

  <?php else : ?>
  <p class="noPost">記事がありません</p>
  <?php endif; ?>

   </div>
  </section>
</main>


<?php get_footer(); ?>
