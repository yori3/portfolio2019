<?php get_header(); ?>

<main id="main" class="main">
  <div class="kv kv_home">
    <h1 class="site_title"><?php bloginfo( 'name' ); ?><span class="sub_title"><?php bloginfo( 'description' ); ?></span></h1>
    <!-- <div class="wave">
      <canvas id="wave" width="3000" height="360"></canvas>
    </div> -->
  </div>

  <section class="section about_sec fadeBlock" id="about">
    <div class="inner">
      <h2 class="cont_ttl"><span class="ttl_inner">About</span></h2>
      <div class="about_lead">
        <?php
        $page = get_page_by_path('about');
        echo apply_filters ( 'the_content', $page -> post_content );
         ?>
      </div>

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

  <section class="section works_sec fadeBlock" id="works">
    <div class="inner">
      <h2 class="cont_ttl"><span class="ttl_inner">Works</span></h2>
      <?php
        $args = array(
          'post_type' => 'works',
          'posts_per_page' => 3,
        );
        $the_query = new WP_Query($args); if($the_query->have_posts()):
      ?>
      <ul class="work_list">

      <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="work_item">
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
            <dd class="work_doc_txt"><h3 class="work_ttl"><?php echo get_post_meta($post->ID, 'project_name', true); ?></h3></dd>
            <dt class="work_doc_label">URL</dt>
            <dd class="work_doc_txt"><p class="work_url"><a href="<?php echo get_post_meta($post->ID, 'project_url', true); ?>"><?php echo get_post_meta($post->ID, 'project_url', true); ?></a></p></dd>
            <dt class="work_doc_label">公開日<br>（制作日）</dt>
            <dd class="work_doc_txt"><time class="work_date"><?php echo get_post_meta($post->ID, 'project_date', true); ?></time></dd>
            <dt class="work_doc_label">概要</dt>
            <dd class="work_doc_txt">
              <p class="work_content"><?php
              $project_text = SCF::get('project_text');
              echo nl2br($project_text);
              ?></p>
            </dd>
          </dl>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php else : ?>
      <p class="noPost">実績はまだありません</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </section>
</main>


<?php get_footer(); ?>
