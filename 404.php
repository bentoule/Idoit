<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?php $this->options->title(); ?>-404</title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/404.css'); ?>">
<?php if($this->options->favicon): ?>
    <link rel="shortcut icon" href="<?php $this->options->favicon(); ?>">
<?php endif;?>
</head>
<body>
<div>
<div id="content" style="height: 530px;">
<p>
对不起，您的风筝已掉线，请时光倒流回前一秒。<br>
<a href="<?php $this->options->siteUrl(); ?>" class="adaptbtn2 btn-green42 backhome"><span class="adaptbtn2">返回<?php $this->options->title(); ?></span></a><br>
</p>
</div>
</div>

</body>
</html>