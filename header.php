<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="zh-CN" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="zh-CN" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="zh-CN" style="display:block;" data-bs-theme="light">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<!-- 使用url函数转换相关路径 -->
<!--[if lt IE 9]>
<script src="<?php $this->options->themeUrl('js/html5.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('ie.css'); ?>" />
<![endif]-->

<!-- 开始使用cdnjs提供的Bootstrap CSS文件 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- 结束使用cdnjs提供的Bootstrap CSS文件 -->

<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style.css'); ?>">

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>
<body class="container mt-3 mb-5">

<div id="page">
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-expand bg-body-tertiary mb-3">
			<div class="container-fluid">
				<a class="navbar-brand" href="/"><?php $this->options->title() ?></a>
				<!-- <div class="navbar-nav me-auto">
					<a class="nav-link" href="/index.php/about">关于</a>
				</div> -->
				<button class="btn ms-auto border-1 border-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#bs_sidebar" aria-controls="sidebar"><span class="navbar-toggler-icon"></span></button>
			</div>
		</nav>
	</header><!-- #masthead -->
    <div class="crumbs_patch">
        <a href="<?php $this->options->siteUrl(); ?>">Home</a> &raquo;</li>
        <?php if ($this->is('index')): ?><!-- 页面为首页时 -->
            文章发布
        <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
            <?php $this->category(); ?> &raquo; <?php $this->title() ?>
        <?php else: ?><!-- 页面为其他页时 -->
            <?php $this->archiveTitle(' &raquo; ','',''); ?>
        <?php endif; ?>
    </div>


	<div id="main">


