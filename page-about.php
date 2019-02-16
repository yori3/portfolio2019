<?php get_header(); ?>

<main id="main" class="main">

  <div class="kv page_kv">
    <h1 class="page_ttl"><span class="ttl_inner"><?php the_title(); ?></span></h1>
  </div>

  <?php breadcrumb(); ?>

  <section class="section">
    <div class="inner">

      <div class="about_lead">
        <p>Webクリエイター　西村依泰（yori3）のポートフォリオサイトです。</p>
        <p>サイト名の「WeST」は「Web creator's Study and Try」の略で、<br>このサイトを通して、Web制作に関する知識や技術を学び、<br>共有していくことを目的としています。</p>
        <p>ブログなどを通して、新しく知ったことや、実践したことを発信し、<br>また、様々な情報を収集していき、<br>Webクリエイターとしての発展を目指しています。</p>
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
          <dl class="about_list">
            <dt class="about_label">Photoshop</dt>
            <dd class="about_txt">★★★★</dd>
            <dt class="about_label">Illustrator</dt>
            <dd class="about_txt">★★</dd>
            <dt class="about_label">Dreamweaver</dt>
            <dd class="about_txt">★★★★</dd>
            <dt class="about_label">Atom</dt>
            <dd class="about_txt">★★★★</dd>
            <dt class="about_label">Google Analytics</dt>
            <dd class="about_txt">★★★</dd>
            <dt class="about_label">Github</dt>
            <dd class="about_txt">★★</dd>
          </dl>
        </div>
        <div class="skill_content language">
          <h3 class="about_box_ttl">Language</h3>
          <dl class="about_list">
            <dt class="about_label">HTML</dt>
            <dd class="about_txt">★★★★</dd>
            <dt class="about_label">CSS</dt>
            <dd class="about_txt">★★★★★</dd>
            <dt class="about_label">jQuery</dt>
            <dd class="about_txt">★★★★</dd>
            <dt class="about_label">PHP</dt>
            <dd class="about_txt">★★★</dd>
            <dt class="about_label">WordPress</dt>
            <dd class="about_txt">★★★★</dd>
          </dl>
        </div>
      </div>
    </div>

  </section>
</main>

<?php get_footer(); ?>
