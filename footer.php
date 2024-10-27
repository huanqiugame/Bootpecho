		</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<hr />
		<div class="site-info">
			本网站使用<a href="http://www.typecho.org">Typecho</a>管理与生成，使用<a href="http://getbootstrap.com">Bootstrap</a>作为前端框架。
			<div class="btn-group" role="group">
				<a style="font-weight:bold;" class="btn btn-sm btn-info" href="<?php $this->options->feedUrl(); ?>"><?php _e('文章RSS'); ?></a>
				<a style="font-weight:bold;" class="btn btn-sm btn-warning" href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论RSS'); ?></a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/global.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/set_color_theme_p2.js'); ?>"></script>
<?php $this->footer(); ?>

<!-- 开始使用cdnjs提供Bootstrap JavaScript文件 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- 结束使用cdnjs提供Bootstrap JavaScript文件 -->
</body>
</html>
