<!DOCTYPE html>
<html lang="zh-CN" style="display:block;" data-bs-theme="light">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>

<!-- 开始使用cdnjs提供的Bootstrap CSS文件 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- 结束使用cdnjs提供的Bootstrap CSS文件 -->
<!-- LaTeX 渲染 -->
<?php if ($this->is('post') && $this->fields->isLatex == 1): ?>
<script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.42/dist/contrib/mhchem.min.js" integrity="sha384-fB8BH//9nBzROkMUsu/Dr35jWHIbnKesUo9rW0hfEgw8mZGnkAyBAjKX9F98OVuo"  crossorigin="anonymous"></script>

<script defer type="text/javascript" src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"></script>
<?php endif; ?>
<!-- LaTeX 渲染结束 -->


<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style.css'); ?>">
<script type="text/javascript" src="<?php $this->options->themeUrl('js/set_color_theme.js'); ?>"></script>

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>
<body class="container-xl mt-3 mb-5" style="
    <?php 
        $bodyContainerStyle = $this->fields->bodyContainerStyle;
        if (isset($bodyContainerStyle)) {
            echo $bodyContainerStyle;
        }
    ?>
    ">
    <header id="masthead" class="site-header" role="banner">
        <nav class="navbar navbar-expand bg-body-tertiary mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><?php $this->options->title() ?></a>
                <div class="navbar-nav me-auto">
                    <!-- <a class="nav-link" href="/about">关于</a> -->
                </div>
                <button class="btn ms-auto border-1 border-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#bs_sidebar" aria-controls="sidebar"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
    </header>

