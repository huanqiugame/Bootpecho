<?php
 $this->need('header.php');
?>

<div id="primary">
    <div id="content" role="main">
        <hgroup>
			<h1>
				<?php if ($this->options->logoUrl): ?>
				<img height="60" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
				<?php endif; ?>
				<?php $this->options->title() ?>
            </h1>
		</hgroup>
        <hr class="mb-0" />
        <div id="articles" style="column-count: 1;">
            <?php while($this->next()): ?>
                    <article class="card mt-3 mb-3">
                        <div class="card-header">
                            <div style="display: inline-flex; float: left;">
                                <span>作者：<span><a href="<?php $this->author->permalink(); ?>" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author"><?php $this->author(); ?></a></span></span>，属于<a href="#" title="查看 中的全部文章" rel="category"><?php $this->category(',') ?></a>分类。
                            </div>
                            <div style="display: inline-flex; float: right;">
                                <?php Postviews($this); ?>
                            </div>
                        </div>
                        <div class="card-body">
                        <header>
                            <h2 class="card-title mb-2" style="display: inline;">
                                <a href="<?php $this->permalink() ?>" title="链向 <?php $this->title() ?> 的固定链接" rel="bookmark"><?php $this->sticky(); $this->title() ?></a>
                            </h2>
                            <br />
                        </header>
                        <div class="entry-content mt-2">
                            <?php $this->content('继续阅读→') ?>
                        </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary" style="display: inline-flex; float: left;">上次更新：<a title="<?php $this->date('G:i') ?>" rel="bookmark"><time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年n月j日H:i'); ?></time></a></small><small class="text-body-secondary ms-3" style="display: inline-flex; float: right;"><a href="<?php $this->permalink() ?>#comments" title="<?php $this->title() ?> 上的评论"><?php $this->commentsNum('暂无评论', '共1条评论', '共%d条评论'); ?></a></small>
                        </div>
                    </article>
            <?php endwhile; ?>
        </div>
        <hr id="beforePageNavHr" />
        <?php $this->pageNav('前一页', '后一页', 3, '...', [
            'textTag' => 'span',
            'prevClass' => '',
            'nextClass' => '',
            'itemTag' => 'li',
            'currentClass' => 'active '
        ]); ?>
        <script type="text/javascript" src="<?php $this->options->themeUrl('js/pagination.js'); ?>"></script>
        <script type="text/javascript" src="<?php $this->options->themeUrl('js/not_found.js'); ?>"></script>
    </div><!-- #content -->
</div><!-- #primary -->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
