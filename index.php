<?php
/**
 * 以Bootstrap 5提供的组件重新思考设计的Typecho主题，修改自怡红公子为Typecho移植的WordPress主题Twenty Twelve。
 * 几乎被改得面目全非，但还是列出原作者。
 * 支持阅读量统计，使用本地统计。作者：Outsrkem
 * 包内含cdnjs分发的Bootstrap文件，在您的网站底部会有相关引用。
 * 作者链接及其他信息请见包内README.md文件。
 * 
 * @package ReBootstrap
 * @author 浣秋
 * @version 1.0
 * @link http://huanqiu.xiaocaozz.top
 */
 
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
			<p class="site-description"><?php $this->options->description() ?></p>
		</hgroup>
        <?php while($this->next()): ?>
            <article class="card mb-3">
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
                    </h1>
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
        <nav id="nav-below" class="navigation" role="navigation">
            <h1 class="assistive-text">文章导航</h1>
            <?php $this->pageLink('<span class="meta-nav">←</span> 较新文章','prev'); ?>
            <?php $this->pageLink('早期文章<span class="meta-nav">→</span>','next'); ?>
        </nav>
    </div><!-- #content -->
</div><!-- #primary -->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
