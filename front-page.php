<?php get_header(); ?>

<main id="main" class="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
  <div class="kv kv_home">
    <h1 class="site_title"><?php bloginfo( 'name' ); ?><span class="sub_title"><?php bloginfo( 'description' ); ?></span></h1>
  </div>

  <section class="section about_sec fadeBlock" id="about">
    <div class="inner">
      <h2 class="cont_ttl"><span class="ttl_inner">About</span></h2>
      <?php the_content(); ?>

      <div class="btn btn_more"><a href="<?php echo home_url(); ?>/about/" class="btn_body">詳しいプロフィールを見る</a></div>
    </div>
  </section>

  <section class="section blog_sec fadeBlock" id="blog">
    <div class="inner">
      <h2 class="cont_ttl"><span class="ttl_inner">Blog</span></h2>
      <?php
        $args = array(
          'posts_per_page' => 3,
        );
        $the_query = new WP_Query($args); if($the_query->have_posts()):
      ?>
      <ul class="article_list">

      <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
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
            <p class="article_content"><?php the_excerpt(); ?></p>
          </div>
        </a></li>
        <?php endwhile; ?>
      </ul>

      <div class="btn btn_more"><a href="<?php echo home_url(); ?>/blog/" class="btn_body">もっとみる</a></div>
      <?php else : ?>
      <p class="noPost">記事がありません</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </section>

<?php endwhile; ?>
<?php endif; ?>
</main>


<?php get_footer(); ?>
