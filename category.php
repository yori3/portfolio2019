<?php get_header(); ?>
<main id="main" class="main">
  <div class="kv page_kv">
    <p class="page_ttl"><span class="ttl_inner"><?php bloginfo( 'name' ); ?><span class="sub_title">-Web creator's Study and Try-</span></span></p>
  </div>

  <?php breadcrumb(); ?>

  <section class="section">

    <h2 class="cont_ttl">
      <!-- <?php if(in_category('trying')): ?>
        <span class="ttl_inner">Web Trying</span>
      <?php elseif(in_category('webstory')): ?>
        <span class="ttl_inner">Web Story</span>
      <?php elseif(in_category('event')): ?>
        <span class="ttl_inner">Event</span>
      <?php elseif(in_category('feeling')): ?>
        <span class="ttl_inner">Feeling</span>
      <?php else : ?>
        <span class="ttl_inner">NEWS</span>
      <?php endif; ?> -->
      <?php
      $cat_info = get_category( $cat );
       ?>
      <h2 class="cont_ttl"><span class="ttl_inner"><?php echo esc_html( $cat_info->name ); ?></span></h2>
    </h2>

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
            <h2 class="article_ttl"><?php the_title(); ?></h2>
            <time class="article_date"><?php echo get_the_date(); ?></time>
            <p class="article_content"><?php the_excerpt(); ?><?php echo $category[0]->cat_name; ?></p>
          </div>
        </a></li>
        <?php endwhile; ?>
      </ul>
  <?php else : ?>
  <p class="noPost">記事がありません</p>
    <?php endif; ?>

      <div class="pagination">
        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        	'format' => '?paged=%#%',
        	'current' => max( 1, get_query_var('paged') ),
        	'total' => $wp_query->max_num_pages,
          'prev_text' => '<',
          'next_text' => '>',
        ) );
        ?>
     </div>
   </div>
  </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
