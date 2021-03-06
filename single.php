<?php get_header(); ?>
<main id="main" class="main">
<?php breadcrumb(); ?>
<article class="post_area">

<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
?>
<div class="post_header">
  <div class="post_thumb">
    <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail(); ?>
    <?php else: ?>
      <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/noimage.jpg" />
    <?php endif; ?>
  </div>
  <div class="post_header_inner">
    <h1 class="article_ttl post_ttl"><?php the_title(); ?></h1>
    <time class="article_date post_date"><?php echo get_the_date(); ?></time>

    <?php if(get_the_tags() != ""){ ?>
    <div class="post__tags">
      <?php
        $tagList = get_the_tags();
        foreach($tagList as $tags){
          echo '<span class="post__tagsItem">'. $tags->name .'</span>';
        }
      ?>
    </div>
    <?php } ?>


  </div>
</div>

<div class="post_content contents">
  <?php the_content(); ?>
</div>

<?php
  endwhile;
?>

<?php endif; ?>

</article>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
