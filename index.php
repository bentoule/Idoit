<?php
/**
 * 这是 Typecho 1.0 系统的一套响应式皮肤
 * 
 * @package Idoit
 * @author Mr.Pig
 * @version 1.0
 * @link http://3gjn.com
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
      <?php while($this->next()): ?>
      <div class="bd-w-box">
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
          <!--  <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
            <button type="button" class="btn btn-default">回复</button>
            <button type="button" class="btn btn-default">分享</button>
            <button type="button" class="btn btn-default">收藏</button>
          </div>--> 
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
