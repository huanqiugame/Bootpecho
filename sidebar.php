<div class="offcanvas offcanvas-end" tabindex="-1" id="bs_sidebar" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasRightLabel">常用页面</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="secondary" class="widget-area" role="complementary">
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_search">
                    <!-- <button class="search-form-input btn btn-success w-100 mb-3">高级搜索</button> -->
                    <form class="input-group mb-3" role="search" id="searchform" method="post" action="<?php $this->options->siteUrl(); ?>">
                        <input type="text" class="form-control text" placeholder="搜索标题、内容、时间、作者及更多" aria-label="Search" name="s" id="s">
<input class="btn btn-primary" type="submit" id="searchsubmit" value="搜索">
                    </form>
                </aside>
            <?php endif; ?>

            <h4>所有页面</h4>
            <ul>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
            </ul>

            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_recent_entries">		
                    <h4 class="widget-title"><?php _e('近期文章'); ?></h4>		
                    <ul>
                        <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
                    </ul>
                </aside>
            <?php endif; ?>
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
                <aside id="recent-comments-2" class="widget widget_recent_comments">
                    <h4 class="widget-title"><?php _e('近期评论'); ?></h4>
                    <ul id="recentcomments">
                        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                        <?php while($comments->next()): ?>
                            <li class="recentcomments"><a href="<?php $comments->permalink(); ?>" rel="external nofollow" class="url"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </aside>
            <?php endif; ?>
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_archive">
                    <h4 class="widget-title"><?php _e('文章归档'); ?></h4>		
                    <ul>
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年n月')->parse('<li><a href="{permalink}" title="{date}">{date}</a> ({count})</li>'); ?>
                    </ul>
                </aside>
            <?php endif; ?>
            <!-- <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_categories">
                    <h4 class="widget-title"><?php _e('分类目录'); ?></h4>		
                    <ul>
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<li class="cat-item"><a href="{permalink}" title=" 查看 {name} 下的所有文章">{name}</a> ({count})</li>'); ?>
                    </ul>
                </aside>
            <?php endif; ?> -->
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_meta">
                    <h4 class="widget-title"><?php _e('功能'); ?></h4>			
                    <ul>
                    <?php if($this->user->hasLogin()): ?>
                        <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                        <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                    <?php else: ?>
                        <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
                    <?php endif; ?>
                    </ul>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</div>