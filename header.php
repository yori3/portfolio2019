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
<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:400,600|Noto+Sans+JP:400,700|Poppins:400,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@3.3.1/dist/css/yakuhanjp.min.css">
<?php
if(is_front_page()){
  $title = 'WeST -yori3&#039;s portfolio-';
  $description = 'Webクリエイター　西村依泰（yori3）のポートフォリオサイトです。ブログなどを通して、新しく知ったことや、実践したことを発信し、また、様々な情報を収集していき、Webクリエイターとしての発展を目指しています。';
}elseif(is_page() || is_single()){
  $title = get_the_title();
  $description = get_the_excerpt();
}else{
  $title = 'WeST -yori3&#039;s portfolio-';
  $description = 'Webクリエイター　西村依泰（yori3）のポートフォリオサイトです。ブログなどを通して、新しく知ったことや、実践したことを発信し、また、様々な情報を収集していき、Webクリエイターとしての発展を目指しています。';
}

?>
<meta name="description" content="<?php echo $description; ?>">

<?php
global $post;
if (has_post_thumbnail()){
  $ogimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'large')[0];
}else{
  $ogimage = get_template_directory_uri().'/images/ogp.jpg';
}

?>
<!-- <meta property="og:type" content="website">
<meta property="og:url" content="<?php //echo home_url();?>">
<meta property="og:site_name" content="<?php //bloginfo( 'name' ); ?>">
<meta property="og:title" content="<?php //echo $title; ?>">
<meta property="og:description" content="<?php //echo $description; ?>">
<meta property="og:image" content="<?php //echo $ogimage ?>"> -->

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
    <div class="site_logo"><a href="<?php echo home_url(); ?>">
      <svg class="logo_mark">
        <use xlink:href="#logo"/>
      </svg>
    </a></div>
    <nav class="gnav">
      <button class="gnav_toggle"><span class="gnav_toggle_body"></span></button>
      <?php
    		wp_nav_menu( array(
    			'theme_location' => 'global',
    			'container'      => 'div',
          'container_class'      => 'gnav_inner',
    			'depth'          => 1,
    		) );
    	?>

    </nav>
  </div>
</header>
