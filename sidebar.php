<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

 <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>

      <div class="bd-box-moder">
        <h3>分类目录 <span class="glyphicon glyphicon-gift" > </span></h3>
        <div class="bd-span-mark"></div>
        <div class="bd-span-clear"></div>
        <div class="bd-w-type">
          <ul>
            <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
          </ul>
          <div class="bd-span-clear"></div>
        </div>
      </div>
      <div class="bd-span-clear"></div>

      <?php endif; ?>
      
     <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
      <div class="bd-box-moder">
        <h3>最新文章 <span class="glyphicon glyphicon-magnet" > </span></h3>
        <div class="bd-span-mark"></div>
        <div class="bd-span-clear"></div>
        <div class="bd-list-box">
         <ul>
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
        </div>
      </div>
      <?php endif; ?>
      
       <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRandomPosts', $this->options->sidebarBlock)): ?>
      <div class="bd-box-moder" >
        <h3>随机文章 <span class="glyphicon glyphicon-heart-empty" > </span></h3>
        <div class="bd-span-mark"></div>
        <div class="bd-span-clear"></div>
        <div class="bd-list-box">
          <?php theme_random_posts();?>
        </div>
      </div>
      <?php endif; ?>
      
      
   
      
     <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
      <div class="bd-box-moder"  id="flgd">
        <h3>热门评论 <span class="glyphicon glyphicon-fire" > </span></h3>
        <div class="bd-span-mark"></div>
        <div class="bd-span-clear"></div>
        <div class="bd-list-box">
          <ul>
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(25, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
        </div>
      </div>
      <?php endif; ?>
      
       <?php if (!empty($this->options->sidebarBlock) && in_array('ShowTabs', $this->options->sidebarBlock)): ?>
      <div class="bd-box-moder" >
        <h3>最热标签 <span class="glyphicon glyphicon-bookmark" > </span></h3>
        <div class="bd-span-mark"></div>
        <div class="bd-span-clear"></div>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=9')->to($tags); ?>
        <ul class="bd-tags-list">
          <?php while($tags->next()): ?>
          <li><a style="background-color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'>
            <?php $tags->name(); ?>
            </a></li>
          <?php endwhile; ?>
        </ul>
        <div class="bd-span-clear"></div>
        <br>
      </div>
      <br>
      <?php endif; ?>
 
   
 <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>     
 <script type="text/javascript">  
 //超出部分滚动   
 function isdh(ee)
  {
   var divh=$(ee).offset().top;
   var fdwidth = $("#flgd").width();
   $(window).scroll(function(){
     var wsh=$(window).scrollTop();
     if (wsh>=divh)
       { $(ee).css({"position":"fixed","top":"0px"});}
     else
       { $(ee).css({"position":"relative","width":fdwidth});}
    
   })
 
}
 
$(window).load(function(){

	 isdh("#flgd");   //div1为你需要该效果的div
	})
 </script>
   <?php endif; ?>