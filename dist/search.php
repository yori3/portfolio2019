<?php get_header(); ?>
<?php breadcrumb(); ?>
<main id="main">
  <section class="article">
    <h2 class="cont_ttl"><span class="ttl_inner">SEARCH</span></h2>


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
          <h3 class="article_ttl"><?php the_title(); ?></h3>
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
  </section>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
