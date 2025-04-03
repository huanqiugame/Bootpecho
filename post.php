<?php $this->need('header.php'); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">			
    <article>
        <header class="mt-3">
            <h1 class="card-title mb-3 display-3" style="display: inline;">
                <a rel="bookmark"><?php $this->title() ?></a>
            </h1>
                        <br />
            <span class="by-author">By <span class="author vcard"><a class="url fn n" href="<?php $this->author->permalink(); ?>" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author"><?php $this->author(); ?></a></span></span></span>
            <small><a title="<?php $this->date('G:i') ?>" rel="bookmark"><time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年n月j日H:i'); ?></time></a><?php Postviews($this); ?></small>
            <!-- <div class="comments-link">
                <a href="<?php $this->permalink() ?>#comments" title="<?php $this->title() ?> 上的评论">
                    <?php $this->commentsNum('暂无回复', '沙发被抢', '%d 条回复'); ?>
                </a>
            </div> -->
            
        </header>
        <hr />
        <div class="entry-content mt-2">
            <div class="mb-3 ms-3 float-end p-3 toc-container border-start" id="content_sidebar">
                <div id="post-toc">
                    <strong>文章目录</strong>
                    <ul>
                        
                    </ul>
                </div>
                <hr />
                <div>
                    <strong>文章标签</strong>
                    <p><?php $this->tags(', ', true, 'none'); ?></p>
                </div>
            </div>
            <?php $this->content() ?>
        </div>
    </article>
    <!-- <nav class="nav-single">
        <h1 class="assistive-text">文章导航</h1>
        <span class="prev"><?php $this->theNext(); ?></span>
        <span class="next"><?php $this->thePrev(); ?></span>
    </nav> -->
    <hr />

    <?php $this->need('comments.php'); ?>
    </div>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/content.js'); ?>"></script>

    <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>


