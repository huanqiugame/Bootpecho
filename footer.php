<footer id="colophon" role="contentinfo">
    <hr />
    <div class="site-info">
        <div role="group" class="mb-2">
            <a class="me-3 footer-link" href="<?php $this->options->feedUrl(); ?>"><?php bp_e('footer.posts_rss'); ?></a>
            <a class="footer-link" href="<?php $this->options->commentsFeedUrl(); ?>"><?php bp_e('footer.comments_rss'); ?></a>
        </div>
        <span><?php bp_e(
            'footer.site_info',
            '<a class="footer-link" href="http://www.typecho.org">Typecho</a>',
            '<a class="footer-link" href="http://getbootstrap.com">Bootstrap 5</a>',
            '<a class="footer-link" href="https://github.com/huanqiugame/Bootpecho">' . bp_t('footer.theme_link') . '</a>'
        ); ?></span>
    </div>
</footer>


<?php if ($this->is('post') || $this->is('page')): ?>
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/page.js'); ?>"></script>
<?php endif; ?>
<?php if (!$this->is('post') && !$this->is('page')): ?> <!-- 如果是front的话 -->
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/front.js'); ?>"></script>
<?php endif; ?>
<script type="text/javascript">
window.BootpechoI18n = <?php echo json_encode([
    'noResults' => bp_t('search.no_results'),
    'tocMissing' => bp_t('js.toc_missing'),
], JSON_UNESCAPED_UNICODE); ?>;
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/set_color_theme_p2.js'); ?>"></script>
<?php $this->footer(); ?>

<!-- 开始使用cdnjs提供Bootstrap JavaScript文件 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- 结束使用cdnjs提供Bootstrap JavaScript文件 -->

<!-- 开始LaTeX渲染设置 -->
<?php if ($this->is('post') && $this->fields->isLatex == 1): ?>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    renderMathInElement(document.body, {
      delimiters: [{
          left: "$$",
          right: "$$",
          display: true
      }, {
          left: "$",
          right: "$",
          display: false
      }],
      ignoredTags: ["script", "noscript", "style", "textarea", "pre", "code"],
      ignoredClasses: ["nokatex"]
    });
  });
</script>
<?php endif; ?>
<!-- 结束LaTeX渲染设置 -->

</body>
</html>
