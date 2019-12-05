<?php get_header(); ?>

<main id="main" class="main">
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="kv page_kv">
    <h1 class="page_ttl"><span class="ttl_inner"><?php the_title(); ?></span></h1>
  </div>

  <?php breadcrumb(); ?>

  <section class="section">
    <div class="inner">

      <div class="about_lead">
        <?php the_content(); ?>
      </div>


      <div class="profile_area about_area">
        <h2 class="about_area_ttl">Profile</h2>
        <div class="profile_img"><img src="<?php echo get_template_directory_uri(); ?>/images/img_mine.jpg" alt=""></div>
        <div class="profile_content">
          <dl class="about_list">
            <dt class="about_label">Name</dt>
            <dd class="about_txt">西村　依泰</dd>
            <dt class="about_label">Birth/Age</dt>
            <dd class="about_txt">1988.04.01／30歳</dd>
            <dt class="about_label">Live</dt>
            <dd class="about_txt">大阪府</dd>
            <dt class="about_label">Work</dt>
            <dd class="about_txt">元小学校教諭（〜2015）<br>マークアップ・CSSコーディング（2016〜）<br>ディレクション（2018〜）</dd>
            <dt class="about_label">hobby</dt>
            <dd class="about_txt">楽器（ピアノ・ギター）、推理小説、TVゲーム</dd>
            <dt class="about_label">Like</dt>
            <dd class="about_txt">コーヒー、甘味</dd>
            <dt class="about_label">Community</dt>
            <dd class="about_txt">Word Camp Kansai 2016 実行委員<br>Word Camp Kyoto 2017 実行委員<br>Word Camp Osaka 2018 実行委員</dd>
          </dl>
        </div>
      </div>

      <div class="skill_area about_area">
        <h2 class="about_area_ttl">Skill</h2>
        <div class="skill_content tools">
          <h3 class="about_box_ttl">Tools</h3>
          <ul class="about_list">
            <li class="about_txt">Photoshop</li>
            <li class="about_txt">Illustrator</li>
            <li class="about_txt">Adobe XD</li>
            <li class="about_txt">Dreamweaver</li>
            <li class="about_txt">Atom</li>
            <li class="about_txt">Google Analytics</li>
            <li class="about_txt">Github</li>
          </ul>
        </div>
        <div class="skill_content language">
          <h3 class="about_box_ttl">Language</h3>
          <ul class="about_list">
            <li class="about_txt">HTML</li>
            <li class="about_txt">CSS</li>
            <li class="about_txt">SCSS</li>
            <li class="about_txt">Javascript</li>
            <li class="about_txt">jQuery</li>
            <li class="about_txt">Vue.js</li>
            <li class="about_txt">PHP</li>
            <li class="about_txt">WordPress</li>
          </ul>
        </div>
      </div>
    </div>

  </section>

  <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
