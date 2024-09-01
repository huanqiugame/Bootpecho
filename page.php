<?php $this->need('header.php'); ?>
<div id="primary" class="site-content">
	<div id="content" role="main">			
	<article>
    	<header class="mt-3">
        	<h1 class="entry-title">
            	<?php $this->title() ?>
            </h1>
        </header>
        <div class="entry-content mt-2">
        	<?php $this->content() ?>
        </div>
        <footer class="entry-meta">
        </footer>
    </article>
	<hr />

	<?php $this->need('comments.php'); ?>
	</div>
</div>

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>


