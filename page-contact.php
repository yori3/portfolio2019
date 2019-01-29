<?php get_header(); ?>

<main id="main" class="main">

  <div class="kv page_kv">
    <h1 class="page_ttl"><span class="ttl_inner"><?php the_title(); ?></span></h1>
  </div>

  <?php breadcrumb(); ?>

  <section class="section">
    <div class="inner">
      <div class="contact_lead">
        <p>Webサイトの内容に関するお問い合わせはこちらのフォームからお送りください。</p>
      </div>
      <?php the_content(); ?>
    </div>

  </section>
</main>

<?php get_footer(); ?>
