<?php $this->need('header.php'); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
            <article id="post-0" class="post error404 no-results not-found">
                <header class="entry-header">
                    <h1 class="entry-title">404 Not Found</h1>
                </header>

                <div class="entry-content">
                    <p><?php bp_e('404.message'); ?></p>
                    <form class="input-group mb-3" role="search" id="searchform" method="post" action="<?php $this->options->index(); ?>">
                        <input type="text" class="form-control text" placeholder="<?php bp_e('search.placeholder'); ?>" aria-label="<?php bp_e('search.submit'); ?>" name="s" id="s">
                        <input class="btn btn-primary" type="submit" id="searchsubmit" value="<?php bp_e('search.submit'); ?>">
                    </form>
                </div>
            </article>

        </div><!-- #content -->
    </div><!-- #primary -->


<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
