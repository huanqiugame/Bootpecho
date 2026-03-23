<?php $this->need('header.php'); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">			
    <article>
        <header class="mt-3">
            <h1 class="card-title mb-3 display-5">
                <?php $this->title() ?>
            </h1>
            <div style="display: inline-flex; align-items: center; color: gray;">
                <span class="me-2">
                    <a href="<?php $this->author->permalink(); ?>" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author" class="btn btn-sm rounded-pill" style="background-color: var(--bs-body-bg); border-color: var(--bs-border-color); border-width: 0px; box-shadow: 0px 0px 50px rgba(var(--bs-body-color-rgb), 10%); display: inline-flex; align-items: center; color: gray;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil me-1" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                    </svg>
                        <?php $this->author(); ?>
                    </a>
                </span>
            
            <span title="<?php $this->date('G:i') ?>" rel="bookmark" class="ms-2 me-3">
                <time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y年n月j日 H:i'); ?></time>
            </span>
            <?php Postviews($this); ?>
            <span class="ms-1" style="color: #6c757dc0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book align-middle" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                </svg>
            </span>
            <!-- <div class="comments-link">
                <a href="<?php $this->permalink() ?>#comments" title="<?php $this->title() ?> 上的评论">
                    <?php $this->commentsNum('暂无回复', '沙发被抢', '%d 条回复'); ?>
                </a>
            </div> -->
            </div>
            
        </header>
        <br />
        <div style="
                <?php 
                $containerStyle = $this->fields->containerStyle;
                if (isset($containerStyle)) {
                    echo $containerStyle;
                }
                ?>
            " class="
                <?php 
                $containerClass = $this->fields->containerClass;
                if (isset($containerClass)) {
                    echo $containerClass;
                }
                ?>
            ">
            <div class="mb-3 ms-3 float-end p-3 toc-container border-start
                <?php 
                $tocNoFloat = $this->fields->tocNoFloat;
                if (isset($tocNoFloat)) {
                    echo "toc-container-no-float border rounded-4";
                }
                ?>
            " id="content_sidebar">
                <div id="post-toc">
                    <strong>文章目录</strong>
                    <ul>
                        
                    </ul>
                </div>
                <hr />
                <div>
                    <strong>文章标签</strong>
                    <p><?php $this->tags('、', true, '无'); ?></p>
                </div>
            </div>
            <div class="entry-content mt-2">
                <?php $this->content() ?>
            </div>
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


