<?php $this->need('header.php'); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
            <article id="post-0" class="post error404 no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title">404 Not Found</h1>
                </header>

                <div class="entry-content">
                    <p>我们可能无法找到您需要的内容。或许搜索功能可以帮到您。</p>
                    <form class="input-group mb-3" role="search" id="searchform" method="post" action="<?php $this->options->siteUrl(); ?>">
                        <input type="text" class="form-control text" placeholder="搜索标题、内容、时间、作者及更多" aria-label="Search" name="s" id="s">
                        <input class="btn btn-primary" type="submit" id="searchsubmit" value="搜索">
                    </form>
                </div>
            </article>

        </div><!-- #content -->
    </div><!-- #primary -->


<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
