<?php
/**
 * 这是 Typecho 1.0 系统的一套响应式皮肤
 * 
 * @package Idoit
 * @author Mr.Pig
 * @version 1.06
 * @link http://www.3gjn.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="container">
  <div class="row">
 
    <div class="col-md-4  hidden-sm hidden-xs">
      <?php $this->need('sidebar.php'); ?>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 bd-padding-none">




 <?php if ($this->options->SlideRadio == 'open'): ?>
<div id="myNiceCarousel" class="carousel slide hidden-xs" data-ride="carousel">
  <!-- 圆点指示器 -->
  <ol class="carousel-indicators">
    <li data-target="#myNiceCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myNiceCarousel" data-slide-to="1"></li>
    <li data-target="#myNiceCarousel" data-slide-to="2"></li>
  </ol>

  <!-- 轮播项目 -->
 
  <div class="carousel-inner">
    <div class="item active">
    <?php if($this->options->oneimg): ?>
     <img class="hdpimg" src="<?php $this->options->oneimg(); ?>">
    <?php else: ?>
      <img  class="hdpimg" src="http://notend.b0.upaiyun.com/usr/uploads/2017/05/2818554066.jpg">
    <?php endif; ?>

      <div class="carousel-caption">
       <?php if($this->options->onetitle): ?>
       <h1><?php $this->options->onetitle(); ?></h1>
        <?php else: ?>
        <h1>我是第一张幻灯片</h1>
        <?php endif; ?>
      </div>

    </div>
    <div class="item">
     <?php if($this->options->twoimg): ?>
      <img class="hdpimg" src="<?php $this->options->twoimg(); ?>">
       <?php else: ?>
         <img class="hdpimg" src="http://notend.b0.upaiyun.com/usr/uploads/2017/05/2818554066.jpg">
      <?php endif; ?>
      <div class="carousel-caption">
       <?php if($this->options->twotitle): ?>
       <h1><?php $this->options->twotitle(); ?> </h1>
        <?php else: ?>
        <h1>我是第二张幻灯片</h1>
        <?php endif; ?>
      </div>
    </div>
    <div class="item">
     <?php if($this->options->threeimg): ?>
      <img class="hdpimg" src="<?php $this->options->threeimg(); ?>">
       <?php else: ?>
      <img class="hdpimg" src="http://notend.b0.upaiyun.com/usr/uploads/2017/05/2937522687.jpg">
     <?php endif; ?>
     <div class="carousel-caption">
       <?php if($this->options->threetitle): ?>
        <h1><?php $this->options->threetitle(); ?> </h1>
        <?php else: ?>
        <h1>我是第三张幻灯片</h1>
        <?php endif; ?>
      </div>
    </div>
  </div>


  <!-- 项目切换按钮 -->
  <a class="left carousel-control" href="#myNiceCarousel" data-slide="prev">
    <span class="icon icon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#myNiceCarousel" data-slide="next">
    <span class="icon icon-chevron-right"></span>
  </a>
</div>
<?php endif; ?>


      <?php while($this->next()): ?>
      <div class="bd-w-box  bd-margin-bottom-20">
        <div class="bd-w-header">
          <h3 class="bd-w-title"> <a href="<?php $this->permalink() ?>" target="_blank">
            <?php $this->title() ?>
            </a> </h3>
        </div>
        <div class="bd-w-content  clearfix">
          <div class="bd-w-user"> <a class="bd-user-avatar bd-avatar-img pull-right" href="<?php $this->author->permalink(); ?>" target="_blank">
            <?php $this->author->gravatar(); ?>
            </a>
            <div class="bd-user-info">
              <p><a class="bd-user-name" href="<?php $this->author->permalink(); ?>" target="_blank">
                <?php $this->author(); ?>
                </a> <span class="bd-user-form">[
                <?php $this->category(','); ?>
                ]</span></p>
              <p class="tie-date">
                <?php $this->date('Y年m月d日 H:i:s'); ?>
              </p>
            </div>
          </div>
          <p class="content">
            <?php $this->excerpt(150, '...'); ?>
          </p>

  
      <!--按钮-->
<!-- 
        <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
            <button type="button" class="btn btn-default">回复</button>
            <button type="button" class="btn btn-default">分享</button>
            <button type="button" class="btn btn-default">阅读<span style="color:red;">100</span></button>
          </div> -->

        </div>
      </div>
      <?php endwhile; ?>
      
      <!--分页-->
      
      <nav class="bd-PageNav text-center">
        <?php $this->pageNav('←','→','3','...'); ?>
      </nav>
      <div style="clear:both ;"></div>
    </div>

    <!--    <div class="col-md-4  hidden-sm hidden-xs">
     
    </div>--> 
  </div>
</div>
<div class="bd-span-clear"></div>
<?php $this->need('footer.php'); ?>
