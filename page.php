<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<br>
<div class="container">
    <div class="row">
     <!-- <div class="col-md-2 col-sm-1" > </div>-->
      <div class="col-md-12 col-sm-12 col-xs-12 bd-padding-none">
        <div class="bd-w-box">
          <div class="bd-w-header">
            <h3 class="bd-w-title"> <a href="<?php $this->permalink() ?>" target="_blank"> <?php $this->title() ?></a> </h3>
          </div>
          <div class="bd-w-content  clearfix">
            <div class="bd-article">
              <?php $this->content(); ?>
            </div>
          </div>
        </div>
         <?php $this->need('comments.php'); ?>
      </div>
     <!-- <div class="col-md-2 col-sm-1"> </div>-->
    </div>
  </div>
  
<?php $this->need('footer.php'); ?>