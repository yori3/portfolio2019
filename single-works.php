<?php get_header(); ?>
<?php breadcrumb(); ?>
<main id="main" class="main">
<article class="post_area">

<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
?>
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
  <dd class="work_doc_txt"><h3 class="work_ttl"><?php echo get_post_meta($post->ID, project_name, true); ?></h3></dd>
  <dt class="work_doc_label">URL</dt>
  <dd class="work_doc_txt"><p class="work_url"><?php echo get_post_meta($post->ID, project_url, true); ?></p></dd>
  <dt class="work_doc_label">公開日（制作日）</dt>
  <dd class="work_doc_txt"><time class="work_date"><?php echo get_post_meta($post->ID, project_date, true); ?></time></dd>
  <dt class="work_doc_label">概要</dt>
  <dd class="work_doc_txt">
    <p class="work_content"><?php
    $project_text = SCF::get('project_text');
    echo nl2br($project_text);
    ?></p>
  </dd>
</dl>


<?php
  endwhile;
?>

<?php endif; ?>

</article>

</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
