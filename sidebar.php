<div class="offcanvas offcanvas-end" tabindex="-1" id="bs_sidebar" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasRightLabel"><?php bp_e('sidebar.menu'); ?></h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php bp_e('sidebar.close'); ?>"></button>
    </div>
    <div class="offcanvas-body">
        <div id="secondary" class="widget-area" role="complementary">
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_search">
                    <!-- <button class="search-form-input btn btn-success w-100 mb-3"><?php bp_e('sidebar.advanced_search'); ?></button> -->
                    <form class="input-group mb-3" role="search" id="searchform" method="post" action="<?php $this->options->index(); ?>">
                        <input type="text" class="form-control text" placeholder="<?php bp_e('search.placeholder'); ?>" aria-label="<?php bp_e('search.submit'); ?>" name="s" id="s">
                        <input class="btn btn-primary" type="submit" id="searchsubmit" value="<?php bp_e('search.submit'); ?>">
                    </form>
                </aside>
            <?php endif; ?>

            <h4><?php bp_e('sidebar.all_pages'); ?></h4>
            <ul>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
            </ul>

            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_recent_entries">		
                    <h4 class="widget-title"><?php bp_e('sidebar.recent_posts'); ?></h4>
                    <ul>
                        <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
                    </ul>
                </aside>
            <?php endif; ?>
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
                <aside id="recent-comments-2" class="widget widget_recent_comments">
                    <h4 class="widget-title"><?php bp_e('sidebar.recent_comments'); ?></h4>
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
                    <h4 class="widget-title"><?php bp_e('sidebar.archives'); ?></h4>
                    <ul>
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=' . urlencode(bp_t('date.archive_month')))->parse('<li><a href="{permalink}" title="{date}">{date}</a> ({count})</li>'); ?>
                    </ul>
                </aside>
            <?php endif; ?>
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
                <aside class="widget widget_categories">
                    <h4 class="widget-title"><?php bp_e('sidebar.categories'); ?></h4>
                    <ul>
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<li class="cat-item"><a href="{permalink}" title="' . htmlspecialchars(bp_t('sidebar.category_title'), ENT_QUOTES, 'UTF-8') . '">{name}</a> ({count})</li>'); ?>
                    </ul>
                </aside>
            <?php endif; ?>
            <?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
                <hr />
                <?php if (bootpecho_multilang_available()): ?>
                    <?php $bootpechoSidebarLanguages = \TypechoPlugin\MultiLanguage\Plugin::switcherLinks(); ?>
                    <?php if (count($bootpechoSidebarLanguages) > 1): ?>
                        <select class="form-select mb-3" onchange="location.href=this.value" aria-label="<?php bp_e('nav.language_switcher'); ?>">
                            <?php foreach ($bootpechoSidebarLanguages as $bootpechoSidebarLanguage): ?>
                                <option value="<?php echo htmlspecialchars($bootpechoSidebarLanguage['url'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($bootpechoSidebarLanguage['current']): ?> selected<?php endif; ?>>
                                    <?php echo htmlspecialchars($bootpechoSidebarLanguage['name'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                <?php endif; ?>
                <p><span id="bd-theme-text"><?php bp_e('sidebar.theme_current'); ?></span><span id="bd-theme-status"></span></p>
                <div id="bd-theme" aria-label="<?php bp_e('sidebar.theme_toggle'); ?>" tabindex="0" class="input-group mb-3">
                    <button type="button" class="btn btn-light text-dark form-control" data-bs-theme-value="light"><?php bp_e('theme.light'); ?></button>
                    <button type="button" class="btn btn-dark form-control" data-bs-theme-value="dark"><?php bp_e('theme.dark'); ?></button>
                    <button type="button" class="btn btn-secondary form-control" data-bs-theme-value="auto"><?php bp_e('theme.auto'); ?></button>
                </div>
                <aside class="widget widget_meta">
                    <!-- <h4 class="widget-title"><?php bp_e('sidebar.meta'); ?></h4> -->
                    <div class="input-group">
                    <?php if($this->user->hasLogin()): ?>
                        <a class="last btn btn-primary form-control" href="<?php $this->options->adminUrl(); ?>"><?php bp_e('sidebar.dashboard'); ?> (<?php $this->user->screenName(); ?>)</a>
                        <a class="btn btn-danger" href="<?php $this->options->logoutUrl(); ?>"><?php bp_e('sidebar.logout'); ?></a>
                    <?php else: ?>
                        <a class="last btn btn-primary form-control" href="<?php $this->options->adminUrl('login.php'); ?>"><?php bp_e('sidebar.login'); ?></a>
                        <?php if ($this->options->allowRegister): ?><a class="last btn btn-success form-control" href="<?php $this->options->adminUrl('register.php'); ?>"><?php bp_e('sidebar.register'); ?></a><?php endif; ?>
                    <?php endif; ?>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</div>