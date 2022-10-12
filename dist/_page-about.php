<?php get_header(); ?>

<main id="main" class="main">
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="kv page_kv">
    <h1 class="page_ttl"><span class="ttl_inner"><?php the_title(); ?></span></h1>
  </div>

  <?php breadcrumb(); ?>

  <section class="section">
    <div class="inner contents">

      <!-- <div class="about__lead">
      </div> -->
      <?php the_content(); ?>


      <!-- <div class="about__block about__block-profile">
        <h2 class="about__ttl">Profile</h2>
        <div class="profile__img"><img src="<?php echo get_template_directory_uri(); ?>/images/img_mine.jpg" alt=""></div>
        <dl class="profile__content profileList">
          <dt>Name</dt>
          <dd>西村　依泰</dd>
          <dt>Birth/Age</dt>
          <dd>1988.04.01／30歳</dd>
          <dt>Live</dt>
          <dd>大阪府</dd>
          <dt>Work</dt>
          <dd>元小学校教諭（〜2015）<br>マークアップ・CSSコーディング（2016〜）<br>ディレクション（2018〜）</dd>
          <dt>hobby</dt>
          <dd>楽器（ピアノ・ギター）、推理小説、TVゲーム</dd>
          <dt>Like</dt>
          <dd>コーヒー、甘味</dd>
          <dt>Community</dt>
          <dd>Word Camp Kansai 2016 実行委員<br>Word Camp Kyoto 2017 実行委員<br>Word Camp Osaka 2018 実行委員</dd>
        </dl>
      </div> -->

      <!-- <div class="about__block about__block-skill">
        <h2 class="about__ttl">Skill</h2>
        <div class="skill__content skill__content-tools">
          <h3>Tools</h3>
          <ul>
            <li>Photoshop</li>
            <li>Illustrator</li>
            <li>Adobe XD</li>
            <li>Dreamweaver</li>
            <li>Atom</li>
            <li>Google Analytics</li>
            <li>Github</li>
          </ul>
        </div>
        <div class="skill__content skill__content-language">
          <h3>Language</h3>
          <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>SCSS</li>
            <li>Javascript</li>
            <li>jQuery</li>
            <li>Vue.js</li>
            <li>PHP</li>
            <li>WordPress</li>
          </ul>
        </div>
      </div> -->
    </div>

  </section>

  <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
