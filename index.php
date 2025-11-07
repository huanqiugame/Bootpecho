<?php
/**
 * 以Bootstrap 5提供的组件重新思考设计的Typecho主题，修改自怡红公子为Typecho移植的WordPress主题Twenty Twelve。
 * 几乎被改得面目全非，但还是列出原作者。
 * 支持阅读量统计，使用本地统计。作者：Outsrkem
 * 包内含cdnjs分发的Bootstrap文件，在您的网站底部会有相关引用。
 * 作者链接及其他信息请见包内README.md文件。
 * 
 * @package Bootpecho
 * @author 浣秋
 * @version 1.0
 * @link https://leoworld.top
 */
 
 $this->need('header.php');
?>

<div id="primary">
    <div id="content" role="main">
        <hgroup>
        <h1 class="display-3">
                <?php if ($this->options->logoUrl): ?>
                <img height="60" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                <?php endif; ?>
                <?php if ($this->is('category')): ?>
                “<?php $this->archiveTitle("", "", ""); ?>”分类
                <?php elseif ($this->is('tag')): ?>
                “<?php $this->archiveTitle("", "", ""); ?>”标签
                <?php elseif ($this->is('author')): ?>
                “<?php $this->archiveTitle("", "", ""); ?>”的作品
                <?php elseif ($this->is('date')): ?>
                <?php $this->archiveTitle("", "", "");?>
                <?php elseif ($this->is('search')): ?>
                “<?php $this->archiveTitle("", "", ""); ?>”的搜索结果
                <?php else: ?>
                <?php $this->options->title() ?>
                <?php endif; ?>
            </h1>
            <?php if ($this->is('author') || $this->is('search') || $this->is('tag')): ?>
            <?php else: ?>
            <p class="site-description"><?php echo $this->getDescription(); ?></p>
            <?php endif; ?>
        </hgroup>
        <!-- 如果搜索结果不存在时，显示搜索框。 -->
        <?php if (!$this->have()): ?>
            <hr />
            <p>你可以尝试使用其他关键词再次搜索。</p>
            <form class="input-group mb-3" role="search" id="searchform" method="post" action="<?php $this->options->siteUrl(); ?>">
                <input type="text" class="form-control text" placeholder="搜索标题、内容、时间、作者及更多" aria-label="Search" name="s" id="s" value="<?php $this->archiveTitle("", "", ""); ?>">
                <input class="btn btn-primary" type="submit" id="searchsubmit" value="搜索">
            </form>
        <?php else: ?>
            <hr class="mb-0" />
        <?php endif; ?>

        <div id="articles" style="column-count: 1;">
            <?php while($this->next()): ?>
                    <article class="card mt-3 mb-3 rounded-4">
                        <div class="card-header border-bottom-0 rounded-4">
                            <div style="display: inline-flex; float: left;">
                            <time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年n月j日'); ?></time>｜
                            <a href="<?php $this->author->permalink(); ?>" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author"><?php $this->author(); ?></a>｜
                                <?php $this->category('、') ?>
                            </div>
                            <div style="display: inline-flex; float: right;">
                                <?php Postviews($this); ?>｜
                                <a href="<?php $this->permalink() ?>#comments" title="<?php $this->title() ?> 上的评论"><?php $this->commentsNum('无评论', '1条评论', '%d条评论'); ?></a>
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
