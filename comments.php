<div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>
            <h1>评论</h1>
            <p class="comments-title">
			<?php $this->commentsNum(_t('暂无评论'), _t('共1条评论'), _t('共%d条评论')); ?></p>
            
           	<?php $comments->pageNav('上一页', '下一页', 5, '<a></a>'); ?>
            <style type="text/css">
				.page-navigator { padding:20px 0; }
			</style>
            <script type="text/javascript">
				var n = document.getElementsByClassName('page-navigator')[0], li = n.getElementsByTagName('li'), _l = li.length;
				for(i=0;i<_l;i++) {
					var c = li[i].getElementsByTagName('a')[0].innerHTML;
					if( c!='上一页' &&　c!='下一页') li[i].style.display = 'none';
				}
			</script>



            <?php $comments->listComments(); ?>
            
            <?php endif; ?>

            <?php if($this->allow('comment')): ?>

    <div class="respond" id="<?php $this->respondId(); ?>">
        <h<?php if ($this->commentsNum > 0): ?>2<?php else: ?>1<?php endif; ?> id="reply-title">发表评论 <small><?php $comments->cancelReply(); ?></small></h<?php if ($this->commentsNum > 0): ?>2<?php else: ?>1<?php endif; ?>>
        <form method="post" action="<?php $this->commentUrl() ?>" id="commentform">
        <?php if($this->user->hasLogin()): ?>
            <p>以<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>的身份登录。<a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('登出？'); ?></a></p>
        <?php else: ?>
            <p class="comment-notes">无需登录，电子邮件地址不会被公开。<span class="required">*</span>为必填。</p>							
            <div class="input-group mb-3">
                <span class="input-group-text border-warning" id="basic-addon1">姓名 <span class="required">*</span></span>
                <input id="author" name="author" type="text" class="form-control border-warning" placeholder="Author" value="<?php $this->remember('author'); ?>" aria-required="true" aria-label="Author">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">电子邮件<?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></span>
                <input id="email" name="mail" type="text" class="form-control" placeholder="Email" value="<?php $this->remember('mail'); ?>" aria-required="true" aria-label="Email">
            </div>
            <!-- <p class="comment-form-url">
                <label for="url">站点<?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
                <input id="url" name="url" type="text" value="<?php $this->remember('url'); ?>" size="30">
            </p> -->
        <?php endif; ?>
            <div class="input-group mb-3">
                <span class="input-group-text border-warning">评论<span class="required">*</span></span>
                <textarea rows="<?php if ($this->cid == 14) : ?>21<?php else : ?>6<?php endif; ?>" class="form-control border-warning" id="comment" name="text" aria-label="评论"><?php if ($this->remember('text') === null) : ?><?php $this->remember('text'); ?><?php else : ?><?php if ($this->cid == 14) : ?>## 基本信息

- 昵称：
- 班干部：

## 联系方式

- 电话：
- Email：
- 微信：
- 钉钉：

## 经历

- [] 参加过七年级上学期拔河比赛
- [] 参加过七年级元旦联欢会
- [] 参加过七年级下学期春日放歌
- [] 参加过八年级下学期班会展示
- [] 参加过九年级上学期拍手比赛
- [] 参加过九年级元旦联欢会<?php endif; ?><?php endif; ?></textarea>
            </div>
            <p class="form-submit">
                <input class="btn btn-outline-primary w-100" name="submit" type="submit" id="submit" value="提交">
            </p>
        </form>
    </div>
<?php else: ?>
	<p><?php _e('评论已关闭'); ?></p>
<?php endif; ?>

</div>