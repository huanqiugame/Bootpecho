<?php $this->need('header.php'); ?>

<!-- 文章限制容器 -->
<div id="main">
    <div id="post" class="m-auto">

<div class="crumbs_patch">
        <?php $this->category(); ?>
        &raquo;
</div>

<div id="primary" class="site-content">
    <div role="main">			
    <article id="article-container" style="
            <?php 
                if ($this->fields->tocNoFloat == 1) {
                    echo "display: block;";
                }
            ?>
            ">
        <header class="entry-header">
            <h1 class="card-title mb-3 display-5">
                <?php $this->title() ?>
            </h1>
            <div class="post-meta">
                <a href="<?php $this->author->permalink(); ?>" title="<?php ob_start(); $this->author(); bp_e('post.author_posts', ob_get_clean()); ?>" rel="author" class="post-meta-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                    </svg>
                    <span><?php $this->author(); ?></span>
                </a>
                <span class="post-meta-item" title="<?php $this->date('G:i') ?>" rel="bookmark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                    <time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date(bp_t('date.post')); ?></time>
                </span>
                <?php if (bootpecho_show_post_views()): ?>
                <span class="post-meta-item" title="<?php bp_e('post.views'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
                    <span><?php Postviews($this); ?></span>
                </span>
                <?php endif; ?>
                <!-- <div class="comments-link">
                    <a href="<?php $this->permalink() ?>#comments" title="<?php $this->title() ?> 上的评论">
                        <?php $this->commentsNum('暂无回复', '沙发被抢', '%d 条回复'); ?>
                    </a>
                </div> -->
            </div>
        </header>
        <div class="toc-container
                <?php 
                if ($this->fields->tocNoFloat == 1) {
                    echo "toc-container-no-float";
                }
                ?>
            " id="content_sidebar">
            <div class="post-tags">
                <strong><?php bp_e('post.tags'); ?></strong>
                <p><?php $this->tags(bp_t('post.tags_separator'), true, bp_t('post.tags_empty')); ?></p>
            </div>
            <div class="toc-only-container">
                <div id="post-toc" style="
                    <?php 
                        if ($this->fields->tocNoFloat == 1) {
                            echo "max-height: 100%;";
                        }
                    ?>
                ">
                    <strong class="post-sidebar-title"><?php bp_e('post.toc'); ?></strong>
                    <button class="btn post-toc-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#post-toc-content" aria-expanded="true" aria-controls="post-toc-content"><?php bp_e('post.toc_toggle'); ?></button>
                    <ul id="post-toc-content" class="collapse show"></ul>
                    <!-- ul 里面不要有内容 -->
                </div>
            </div>
        </div>
        <div style="
                <?php 
                $articleContainerStyle = $this->fields->articleContainerStyle;
                if (isset($articleContainerStyle)) {
                    echo $articleContainerStyle;
                }
                ?>
            " class="content-container">
            <div class="entry-content">
                <?php $this->content() ?>
            </div>
        </div>
    </article>
    <!-- <nav class="nav-single">
        <h1 class="assistive-text"><?php bp_e('post.nav'); ?></h1>
        <span class="prev"><?php $this->theNext(); ?></span>
        <span class="next"><?php $this->thePrev(); ?></span>
    </nav> -->
    <hr />

    <?php $this->need('comments.php'); ?>
    </div>
</div>

    </div><!-- id="post" -->
</div><!-- #main .wrapper -->

    <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>


