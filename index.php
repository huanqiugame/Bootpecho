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
                    <article class="card mt-3 mb-3" style="border-radius: 1.3em;">
                        <div class="card-header border-bottom-0 rounded-pill py-1" style="display: inline-flex; margin: 0.25em;">
                            <div style="display: inline-flex; float: left; align-items: center;">
                                <span class="me-2">
                                    <time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年n月j日'); ?></time>
                                </span>
                                <span class="me-2">
                                    <a href="<?php $this->author->permalink(); ?>" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author" class="btn btn-sm rounded-pill" style="background-color: var(--bs-body-bg); border-color: var(--bs-border-color); border-width: 0px; box-shadow: 0px 0px 50px rgba(var(--bs-body-color-rgb), 10%); display: inline-flex; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil me-1" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                        <?php $this->author(); ?>
                                    </a>
                                </span>
                                <span>
                                    <span class="btn btn-sm rounded-pill" style="background-color: var(--bs-body-bg); border-color: var(--bs-border-color); border-width: 0px; box-shadow: 0px 0px 30px rgba(var(--bs-body-color-rgb), 10%); display: inline-flex; align-items: center; cursor: default;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection me-1" viewBox="0 0 16 16">
                                            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5z"/>
                                        </svg>
                                        <?php $this->category('、') ?>
                                    </span>
                                </span>
                            </div>
                            <div style="display: inline-flex; float: right; margin-left: auto; align-items: center;">
                                <?php Postviews($this); ?>
                                <span class="ms-1" style="color: #6c757dc0;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book align-middle" viewBox="0 0 16 16">
                                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                    </svg>
                                </span>
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
