<!DOCTYPE html>
<html lang="ja">
<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N935XMH');</script>
<!-- End Google Tag Manager -->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,700|Press+Start+2P|Orbitron:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<?php include_once 'images/logo.svg'; ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N935XMH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="header" id="header">
  <div class="header_main">
    <div class="site_logo"><a href="<?php home_url(); ?>">
      <svg class="logo_mark">
        <use xlink:href="#logo"/>
      </svg>
    </a></div>
    <nav class="gnav">
      <button class="gnav_toggle"><span class="gnav_toggle_body"></span></button>
      <ul class="gnav_inner">
        <li class="gnav_item"><a href="<?php echo home_url(); ?>/about/" class="gnav_body">プロフィール</a></li>
        <li class="gnav_item"><a href="<?php echo home_url(); ?>/blog/" class="gnav_body">ブログ</a></li>
        <li class="gnav_item"><a href="<?php if(!is_front_page()){ echo home_url();} ?>#works" class="gnav_body">実績</a></li>
        <li class="gnav_item"><a href="<?php echo home_url(); ?>/contact/" class="gnav_body">お問い合わせ</a></li>
      </ul>
    </nav>
  </div>
</header>
