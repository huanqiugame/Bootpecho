<footer id="colophon" role="contentinfo">
    <hr />
    <div class="site-info" style="color: gray;">
        <div role="group" class="mb-2">
            <a class="me-3 footer-link" href="<?php $this->options->feedUrl(); ?>"><?php _e('文章RSS'); ?></a>
            <a class="footer-link" href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论RSS'); ?></a>
        </div>
        <span>本网站使用<a class="footer-link" href="http://www.typecho.org">Typecho</a>管理与生成，使用<a class="footer-link" href="http://getbootstrap.com">Bootstrap 5</a>作为前端框架。请前往<a class="footer-link" href="https://github.com/huanqiugame/Bootpecho">GitHub查看主题Bootpecho源码</a>。</span>
    </div>
</footer>


<?php if ($this->is('post') || $this->is('page')): ?>
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/page.js'); ?>"></script>
<?php endif; ?>
<?php if (!$this->is('post') && !$this->is('page')): ?> <!-- 如果是front的话 -->
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/front.js'); ?>"></script>
<?php endif; ?>
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
