<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h1 class="display-5"><?php bp_e('comments.title'); ?></h1>
    <p class="comments-title">
    <?php $this->commentsNum(bp_t('comments.count_none'), bp_t('comments.count_one'), bp_t('comments.count_many')); ?></p>
    
    <?php $comments->pageNav(bp_t('comments.prev'), bp_t('comments.next'), 5, '<a></a>'); ?>
    <style type="text/css">
        .page-navigator { padding:20px 0; }
    </style>
    <script type="text/javascript">
        var n = document.getElementsByClassName('page-navigator')[0], li = n.getElementsByTagName('li'), _l = li.length;
        var previousLabel = <?php echo json_encode(bp_t('comments.prev'), JSON_UNESCAPED_UNICODE); ?>;
        var nextLabel = <?php echo json_encode(bp_t('comments.next'), JSON_UNESCAPED_UNICODE); ?>;
        for(i=0;i<_l;i++) {
            var c = li[i].getElementsByTagName('a')[0].innerHTML;
            if( c!=previousLabel && c!=nextLabel) li[i].style.display = 'none';
        }
    </script>


    <?php $comments->listComments(); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>

    <div class="respond" id="<?php $this->respondId(); ?>">
        <h1 id="reply-title" class="display-<?php if ($this->commentsNum > 0): ?>6<?php else: ?>5<?php endif; ?>"><?php bp_e('comments.leave'); ?> <small><?php $comments->cancelReply(bp_t('comments.cancel_reply')); ?></small></h1>
        <form method="post" action="<?php $this->commentUrl() ?>" id="commentform">
        <?php if($this->user->hasLogin()): ?>
            <?php
            $commentUser = '<a href="' . htmlspecialchars((string)$this->options->profileUrl, ENT_QUOTES, 'UTF-8') . '">'
                . htmlspecialchars((string)$this->user->screenName, ENT_QUOTES, 'UTF-8') . '</a>';
            $commentLogout = '<a href="' . htmlspecialchars((string)$this->options->logoutUrl, ENT_QUOTES, 'UTF-8') . '" class="text-danger btn btn-sm">'
                . bp_t('comments.logout') . '</a>';
            ?>
            <p><?php bp_e('comments.logged_in_as', $commentUser, $commentLogout); ?></p>
        <?php else: ?>
            <p class="comment-notes"><?php bp_e('comments.notes', '<span class="required">*</span>'); ?></p>
            <div class="input-group mb-3">
                <span class="input-group-text border-warning"><?php bp_e('comments.name'); ?> <span class="required">*</span></span>
                <input id="author" name="author" type="text" class="form-control border-warning" placeholder="<?php bp_e('comments.name_placeholder'); ?>" value="<?php $this->remember('author'); ?>" aria-required="true" aria-label="<?php bp_e('comments.name_placeholder'); ?>" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text <?php if ($this->options->commentsRequireMail): ?>border-warning<?php endif; ?>"><?php bp_e('comments.email'); ?><?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></span>
                <input id="email" name="mail" type="text" class="form-control <?php if ($this->options->commentsRequireMail): ?>border-warning<?php endif; ?>" placeholder="<?php bp_e('comments.email'); ?>" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?>aria-required="true" required<?php endif; ?> aria-label="<?php bp_e('comments.email'); ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text <?php if ($this->options->commentsRequireURL): ?>border-warning<?php endif; ?>"><?php bp_e('comments.website'); ?><?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></span>
                <input id="url" name="url" type="text" class="form-control <?php if ($this->options->commentsRequireURL): ?>border-warning<?php endif; ?>" placeholder="example.com" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?>aria-required="true" required<?php endif; ?> aria-label="<?php bp_e('comments.website'); ?>">
            </div>
        <?php endif; ?>
            <div class="input-group mb-3">
                <span class="input-group-text border-warning"><?php bp_e('comments.comment'); ?><span class="required">*</span></span>
                <textarea rows="6" class="form-control border-warning" id="comment" name="text" aria-label="<?php bp_e('comments.comment'); ?>" required><?php echo $this->remember('text'); ?></textarea>
            </div>
            <input class="form-submit btn btn-outline-primary w-100" name="submit" type="submit" id="submit" value="<?php bp_e('comments.submit'); ?>">
        </form>
    </div>
<?php else: ?>
    <p><?php bp_e('comments.closed'); ?></p>
<?php endif; ?>

</div>
