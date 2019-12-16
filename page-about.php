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

      <div class="about__lead">
        <?php the_content(); ?>
      </div>


      <div class="about__block-profile">
        <h2 class="about__ttl">Profile</h2>
        <div class="profile__img"><img src="<?php echo get_template_directory_uri(); ?>/images/img_mine.jpg" alt=""></div>
        <dl class="profile__content profileList">
          <dt class="profileList__term">Name</dt>
          <dd class="profileList__description">西村　依泰</dd>
          <dt class="profileList__term">Birth/Age</dt>
          <dd class="profileList__description">1988.04.01／30歳</dd>
          <dt class="profileList__term">Live</dt>
          <dd class="profileList__description">大阪府</dd>
          <dt class="profileList__term">Work</dt>
          <dd class="profileList__description">元小学校教諭（〜2015）<br>マークアップ・CSSコーディング（2016〜）<br>ディレクション（2018〜）</dd>
          <dt class="profileList__term">hobby</dt>
          <dd class="profileList__description">楽器（ピアノ・ギター）、推理小説、TVゲーム</dd>
          <dt class="profileList__term">Like</dt>
          <dd class="profileList__description">コーヒー、甘味</dd>
          <dt class="profileList__term">Community</dt>
          <dd class="profileList__description">Word Camp Kansai 2016 実行委員<br>Word Camp Kyoto 2017 実行委員<br>Word Camp Osaka 2018 実行委員</dd>
        </dl>
      </div>

      <div class="about__block-skill">
        <h2 class="about__ttl">Skill</h2>
        <div class="skill__content-tools">
          <h3 class="skill__ttl">Tools</h3>
          <ul class="skill__list">
            <li class="skill__list-item">Photoshop</li>
            <li class="skill__list-item">Illustrator</li>
            <li class="skill__list-item">Adobe XD</li>
            <li class="skill__list-item">Dreamweaver</li>
            <li class="skill__list-item">Atom</li>
            <li class="skill__list-item">Google Analytics</li>
            <li class="skill__list-item">Github</li>
          </ul>
        </div>
        <div class="skill__content-language">
          <h3 class="skill__ttl">Language</h3>
          <ul class="skill__list">
            <li class="skill__list-item">HTML</li>
            <li class="skill__list-item">CSS</li>
            <li class="skill__list-item">SCSS</li>
            <li class="skill__list-item">Javascript</li>
            <li class="skill__list-item">jQuery</li>
            <li class="skill__list-item">Vue.js</li>
            <li class="skill__list-item">PHP</li>
            <li class="skill__list-item">WordPress</li>
          </ul>
        </div>
      </div>
    </div>

  </section>

  <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
