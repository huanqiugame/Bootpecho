<?php
/**
 * MultiLanguage 插件是否已启用。
 */
function bootpecho_multilang_available() {
    if (!class_exists('\TypechoPlugin\MultiLanguage\Plugin')) {
        return false;
    }

    if (class_exists('\Typecho\Plugin') && !\Typecho\Plugin::exists('MultiLanguage')) {
        return false;
    }

    return true;
}

/**
 * 当前语言代码；未启用 MultiLanguage 插件时回退到中文。
 */
function bootpecho_lang() {
    if (bootpecho_multilang_available()) {
        return strtolower(\TypechoPlugin\MultiLanguage\Plugin::currentLang());
    }

    return 'zh-cn';
}

/**
 * 是否使用中文界面。
 */
function bootpecho_is_zh() {
    return strpos(bootpecho_lang(), 'zh') === 0;
}

/**
 * 载入当前语言的主题文案表；缺失的语言回退到英文。
 *
 * @return array<string, string>
 */
function bootpecho_translations() {
    static $translations = null;

    if ($translations !== null) {
        return $translations;
    }

    $language = bootpecho_lang();
    $file = __DIR__ . '/lang/' . $language . '.php';

    if (!is_file($file)) {
        $file = __DIR__ . '/lang/' . (bootpecho_is_zh() ? 'zh-cn' : 'en') . '.php';
    }

    $translations = is_file($file) ? require $file : [];

    return $translations;
}

/**
 * 按翻译键读取主题文案，支持 sprintf 占位符。
 *
 * @param string $key 翻译键
 * @param mixed ...$args 占位符参数
 * @return string
 */
function bp_t($key, ...$args) {
    $translations = bootpecho_translations();
    $text = isset($translations[$key]) ? $translations[$key] : $key;

    return $args ? vsprintf($text, $args) : $text;
}

/**
 * 输出指定翻译键的主题文案。
 *
 * @param string $key 翻译键
 * @param mixed ...$args 占位符参数
 */
function bp_e($key, ...$args) {
    echo bp_t($key, ...$args);
}

/**
 * 是否显示并统计文章阅读量；未保存过设置时默认开启。
 */
function bootpecho_show_post_views() {
    return (string) Helper::options()->showPostViews !== '0';
}

function themeConfig($form) {
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());

    $showPostViews = new Typecho_Widget_Helper_Form_Element_Radio('showPostViews',
    array(1 => _t('显示并统计'),
    0 => _t('隐藏且不统计')),
    1, _t('阅读量'), _t('关闭后不会输出阅读量相关代码，也不会更新文章的阅读次数。'));
    $form->addInput($showPostViews);
}

function themeFields($layout) {
	$isLatex = new Typecho_Widget_Helper_Form_Element_Radio('isLatex', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('LaTeX 渲染'), _t('默认关闭增加网页访问速度。如文章内存在LaTeX语法则需要启用。'));
	$layout->addItem($isLatex);
    $tocNoFloat = new Typecho_Widget_Helper_Form_Element_Radio('tocNoFloat', 
	array(1 => _t('目录固定在文章开头'),
	0 => _t('目录随滚动浮动在正文右侧（如果宽度足够）')),
	0, _t('目录是否固定'), _t('默认浮动。对于简洁的文章，请选择固定在文章开头。'));
    $layout->addItem($tocNoFloat);

    // $articleContainerStyle 用于 Post 和 Page 中
    $articleContainerStyle = new Typecho_Widget_Helper_Form_Element_Text('articleContainerStyle', NULL, NULL, _t('文章主体容器额外样式'), _t('不包括文章标题、信息、目录和页脚，纯粹正文部分的容器样式。直接填入style=""的CSS样式。'));
    $layout->addItem($articleContainerStyle);

    // $articleContainerStyle 用于 Post 和 Page 中
    $bodyContainerStyle = new Typecho_Widget_Helper_Form_Element_Text('bodyContainerStyle', NULL, NULL, _t('文章全页面容器额外样式'), _t('包括从顶部导航栏到底部页脚的容器样式。直接填入style=""的CSS样式。'));
    $layout->addItem($bodyContainerStyle);
}

function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' commentbyauthor';
        } else {
            $commentClass .= ' commentbyuser';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' :  'comment-parent';
?>
 
<li id="li-comment-<?php $comments->theId(); ?>" class="mb-3 comment comments-area<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

	<article id="<?php $comments->theId(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php $comments->gravatar('40', ''); ?>
                <span class="fn">
                	<?php $comments->author(); ?> 
                </span>
                <small href="<?php $comments->permalink(); ?>">
                	<time datetime="<?php $comments->date('c'); ?>">
                    <?php $comments->date(bp_t('date.comment')); ?>
                    </time>
                </small>
            </header>
			<section class="comment-content comment">
				<?php $comments->content(); ?>
            </section>
			<div class="reply badge" style="font-size: 105%;">
				<?php 
					$comments->reply(bp_t('comments.reply'));
					_e('<span>↓</span>');
				?>
                
            </div>
		</article>
        <hr style="border-style: dashed;" />
<?php if ($comments->children) { ?>
    <div class="children mt-2">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>

<?php function Postviews($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if ($archive->is('single')) {
        $cookie = Typecho_Cookie::get('contents_views');
        $cookie = $cookie ? explode(',', $cookie) : array();
        if (!in_array($cid, $cookie)) {
            $db->query($db->update('table.contents')
                ->rows(array('views' => (int)$exist+1))
                ->where('cid = ?', $cid));
            $exist = (int)$exist+1;
            array_push($cookie, $cid);
            $cookie = implode(',', $cookie);
            Typecho_Cookie::set('contents_views', $cookie);
        }
    }
    echo $exist == 0 ? '0' : '' .$exist;
}

function formatPostDate($post) {
    $currentDate = time();
    $dateFormat = '';
    if (date('Y', $currentDate) == $post->date('Y')) {
        if (date('mj', $currentDate) == $post->date('mj')) {
            return 'H:i';
        } else {
            return bp_t('date.month_day_time');
        }
    } else {
    }
}
