<?php if( !is_front_page() && !is_page('confirm')) : ?>
<div class="btn btn_top"><a class="btn_body btn_return" href="<?php echo home_url(); ?>">トップへ戻る</a></div>
<?php endif; ?>

<div class="btn_totop"><a href="#top" class="totop_body"></a></div>

<footer class="footer">
  <p class="copyright">copyright &copy; Yoriyasu Nishimura All Rights Reserved.</p>
</footer>

<div class="cookie_box">
  <p class="inner">当サイトではクッキーを利用しています。 We use cookies on this site.<br><a href="<?php echo home_url(); ?>/privacy/">Read my privacy polisy.</a></p>
  <div class="cookie_box_close">閉じる</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
