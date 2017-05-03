<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="container">
  <div class="row">
   <!-- <div class="col-md-2 col-sm-1" > </div>-->
   
    <div class="col-md-4  hidden-sm hidden-xs">
      <?php if (!empty($this->options->sidebarBlock) && in_array('ShowUserTab', $this->options->sidebarBlock)): ?>
       <div class="bd-box-moder text-center">
          <div class="bd-authr-img ">
           <?php $this->author->gravatar(98); ?>
           </div>
           <div class="bd-authr-name">
           	<a href="<?php $this->author->permalink(); ?>">
               <?php $this->author(); ?>
            </a><span class="glyphicon glyphicon-ok-circle bd-red"></span>
           </div>
           <div class="bd-author-describe">
           <?php $this->options->description(); ?></div>
           <div class="bd-count-article">	<a href="<?php $this->author->permalink(); ?>"><?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
              <?php $stat->publishedPostsNum() ?>篇文章</a>
            </div>  
       </div>
     <?php endif; ?>
     
     
      <?php $this->need('sidebar.php'); ?>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 bd-padding-none">
      <div style="background:#ffffff; padding:10px; 15px;">
        <h3 class="bd-w-title"> <a href="<?php $this->permalink() ?>" target="_blank">
          <?php $this->title() ?>
          </a> </h3>
      </div>
      <div class="bd-inline"> <span><strong>来源</strong>：</span> <span>
        <?php $this->category(','); ?>
        </span> <span>&nbsp;<strong>最后修订：</strong></span> <span>
        <?php $this->date('Y年m月d日 H:i:s'); ?>
        </span> <span></span>
        <div class="pull-right">
          <div class="tags-list hidden-xs">
          <?php $this->tags(' ', true, ''); ?>
          </div>
        </div>
      </div>
      <section class="bd-abstract">
        <p><strong>摘要：</strong>
          <?php $this->excerpt(150, '...'); ?>
        </p>
      </section>
      <div class="bd-w-box"> 
        <div class="bd-w-content  clearfix">
          <div style="clear:both"></div>
          <div class="bd-article">
            <?php $this->content(); ?>
          </div>
        </div>
      </div>
      <div>
        <div class="bd-w-box">
          <div class="bd-article-end">
            <div class="bd-article-round">终</div>
          </div>
        </div>
      </div>
      <div class="media bd-article-bq" style="margin-top:20px;margin-bottom:20px">
        <div class="media-left bd-author-imglf"> <a href="<?php $this->author->permalink(); ?>">
          <?php $this->author->gravatar(); ?>
          </a> </div>
        <div class="media-body">
          <div>
            <p>非常感谢 <a class="alert-link" href="<?php $this->author->permalink(); ?>" target="_blank">@
              <?php $this->author(); ?>
              </a>， 本文在知识共享 <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank">署名-相同方式共享 3.0</a> 协议之条款下提供。</p>
            <span>文章内容除注明转载，均为作者原创，转载前请务必署名</span></div>
        </div>
      </div>
      <?php $this->need('comments.php'); ?>
    </div>
     
<!--    <div class="col-md-2 col-sm-1"> </div>-->
  </div>
</div>
<?php $this->need('footer.php'); ?>

<script type="text/javascript"> 
/tabs随机颜色/
$(function(){ 
$(".tags-list a").each(function(){ 
$(this).css("background-color",getRandomColor()); 
}); 
}) 
function getRandomColor() 
{ 
var c = '#'; 
var cArray = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F']; 
for(var i = 0; i < 6;i++) 
{ 
var cIndex = Math.round(Math.random()*15); 
c += cArray[cIndex]; 
} 
return c; 
} 

</script> 
