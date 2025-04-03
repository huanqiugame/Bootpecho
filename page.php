<?php $this->need('header.php'); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">			
    <article>
        <header class="mt-3">
            <h1 class="entry-title display-3">
                <?php $this->title() ?>
            </h1>
        </header>
        <div class="entry-content mt-2">
            <div class="mb-3 ms-3 float-end rounded p-3 card toc-container" id="content_sidebar">
                <div id="post-toc">
                    <strong class="card-title">文章目录</strong>
                    <ul>
                        
                    </ul>
                </div>
                <hr />
                <div>
                    <strong class="card-title">文章标签</strong>
                    <p><?php $this->tags(', ', true, 'none'); ?></p>
                </div>
            </div>
            <?php $this->content() ?>
        </div>
        <footer class="entry-meta">
        </footer>
    </article>
    <hr />

    <?php $this->need('comments.php'); ?>
    </div>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/content.js'); ?>"></script>

    <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>


