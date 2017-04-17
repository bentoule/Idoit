<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>
<?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?>
<?php $this->options->title(); ?>
</title>

<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
<script src="<?php $this->options->themeUrl('js/jquery-1.11.2.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
<!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.staticfile.org/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>

<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<div class="bd-container">
<nav class="navbar navbar-default bd-header">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a href="<?php $this->options->siteUrl(); ?>" class="navbar-brand">
      <?php if($this->options->logoUrl): ?>
      <img src="<?php $this->options->logoUrl();?>" alt="<?php $this->options->title() ?>" />
      <?php else : ?>
      <?php $this->options->title() ?>
      <?php endif; ?>
      </a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
          <?php _e('首页'); ?>
          </a></li>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
          <?php $pages->title(); ?>
          </a></li>
        <?php endwhile; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form" id="search" method="post" action="./" role="search">
            <div class="form-group">
              <input  name="s" type="text" class="bd-search-text " placeholder="Search" >
            </div>
          </form>
        </li>
        <li> 
          <!-- 如果当前用户已经登录 -->
          <?php if($this->user->hasLogin()): ?>
          <!-- 显示当前登录用户的用户名以及登出连接 --> 
            <a href="<?php $this->options->adminUrl('login.php'); ?>"><?php $this->author(); ?></a>
          <!-- 若当前用户未登录 -->
          <?php else: ?>
          <a class="current" href="<?php $this->options->adminUrl('login.php'); ?>">
            <?php _e('登录'); ?>
          </a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
</body>
</html>