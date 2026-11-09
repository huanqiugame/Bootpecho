<div class="offcanvas offcanvas-end bootpecho-sidebar" tabindex="-1" id="bs_sidebar" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasRightLabel"><?php bp_e('sidebar.menu'); ?></h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php bp_e('sidebar.close'); ?>"></button>
    </div>
    <div class="offcanvas-body">
        <div id="secondary" class="widget-area" role="complementary">
            <form class="input-group sidebar-search" role="search" id="searchform" method="post" action="<?php $this->options->index(); ?>">
                <input type="text" class="form-control text" placeholder="<?php bp_e('search.placeholder_short'); ?>" aria-label="<?php bp_e('search.submit'); ?>" name="s" id="s">
                <button class="btn btn-secondary" type="submit" id="searchsubmit"><?php bp_e('search.submit'); ?></button>
            </form>

            <nav class="sidebar-section" aria-labelledby="sidebar-pages-title">
                <h3 class="sidebar-section-title" id="sidebar-pages-title"><?php bp_e('sidebar.all_pages'); ?></h3>
                <ul class="sidebar-links">
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                    <li><a class="sidebar-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                <?php endwhile; ?>
                </ul>
            </nav>

            <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                <nav class="sidebar-section" aria-labelledby="sidebar-recent-posts-title">
                    <h3 class="sidebar-section-title" id="sidebar-recent-posts-title"><?php bp_e('sidebar.recent_posts'); ?></h3>
                    <ul class="sidebar-links">
                        <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a class="sidebar-link" href="{permalink}" title="{title}">{title}</a></li>'); ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
                <nav class="sidebar-section" aria-labelledby="sidebar-categories-title">
                    <h3 class="sidebar-section-title" id="sidebar-categories-title"><?php bp_e('sidebar.categories'); ?></h3>
                    <ul class="sidebar-links">
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<li><a class="sidebar-link" href="{permalink}" title="' . htmlspecialchars(bp_t('sidebar.category_title'), ENT_QUOTES, 'UTF-8') . '"><span class="sidebar-link-label">{name}</span><span class="sidebar-count">{count}</span></a></li>'); ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
                <nav class="sidebar-section" aria-labelledby="sidebar-archives-title">
                    <h3 class="sidebar-section-title" id="sidebar-archives-title"><?php bp_e('sidebar.archives'); ?></h3>
                    <ul class="sidebar-links">
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=' . urlencode(bp_t('date.archive_month')))->parse('<li><a class="sidebar-link" href="{permalink}" title="{date}"><span class="sidebar-link-label">{date}</span><span class="sidebar-count">{count}</span></a></li>'); ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
                <section class="sidebar-section" aria-labelledby="sidebar-comments-title">
                    <h3 class="sidebar-section-title" id="sidebar-comments-title"><?php bp_e('sidebar.recent_comments'); ?></h3>
                    <ul class="sidebar-comments">
                        <?php $this->widget('Widget_Comments_Recent', 'pageSize=5')->to($comments); ?>
                        <?php while($comments->next()): ?>
                            <li class="recentcomments"><a class="sidebar-comment" href="<?php $comments->permalink(); ?>" rel="external nofollow"><span class="sidebar-comment-author"><?php $comments->author(false); ?></span><span class="sidebar-comment-excerpt"><?php $comments->excerpt(50, '...'); ?></span></a></li>
                        <?php endwhile; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
                <section class="sidebar-section" aria-labelledby="sidebar-meta-title">
                    <h3 class="sidebar-section-title" id="sidebar-meta-title"><?php bp_e('sidebar.settings'); ?></h3>

                    <?php if (bootpecho_multilang_available()): ?>
                        <?php $bootpechoSidebarLanguages = \TypechoPlugin\MultiLanguage\Plugin::switcherLinks(); ?>
                        <?php if (count($bootpechoSidebarLanguages) > 1): ?>
                            <div class="sidebar-field">
                                <select class="form-select form-select-sm" id="sidebar-language" aria-label="<?php bp_e('sidebar.language'); ?>" onchange="location.href=this.value">
                                    <?php foreach ($bootpechoSidebarLanguages as $bootpechoSidebarLanguage): ?>
                                        <option value="<?php echo htmlspecialchars($bootpechoSidebarLanguage['url'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($bootpechoSidebarLanguage['current']): ?> selected<?php endif; ?>>
                                            <?php echo htmlspecialchars($bootpechoSidebarLanguage['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="sidebar-field">
                        <span id="bd-theme-text" class="visually-hidden"><?php bp_e('sidebar.theme_current'); ?></span><span id="bd-theme-status" class="visually-hidden"></span>
                        <div id="bd-theme" aria-label="<?php bp_e('sidebar.theme_toggle'); ?>" tabindex="0" class="btn-group w-100 sidebar-segmented" role="group">
                            <button type="button" class="btn btn-outline-secondary" data-bs-theme-value="light"><?php bp_e('theme.light'); ?></button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-theme-value="dark"><?php bp_e('theme.dark'); ?></button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-theme-value="auto"><?php bp_e('theme.auto'); ?></button>
                        </div>
                    </div>

                    <div class="d-grid gap-2 sidebar-meta-actions">
                        <?php if($this->user->hasLogin()): ?>
                            <a class="btn btn-outline-secondary btn-sm" href="<?php $this->options->adminUrl(); ?>"><?php bp_e('sidebar.dashboard'); ?> (<?php $this->user->screenName(); ?>)</a>
                            <a class="btn btn-outline-danger btn-sm" href="<?php $this->options->logoutUrl(); ?>"><?php bp_e('sidebar.logout'); ?></a>
                        <?php else: ?>
                            <a class="btn btn-outline-secondary btn-sm" href="<?php $this->options->adminUrl('login.php'); ?>"><?php bp_e('sidebar.login_register'); ?></a>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </div>
</div>
