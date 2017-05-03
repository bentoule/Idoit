<?php function threadedComments($comments, $options) {
    $commentClass = '';
  // if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
 //  }

 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
<div id="<?php $comments->theId(); ?>" class="bd-w-box <?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
?>">
  
  <div class="media  bd-media">
    <div class="media-left"><a href="#"><?php $comments->gravatar('40', ''); ?></a></div>
    <div class="media-body">
      <h4 class="media-heading <?php echo $commentClass; ?>"> <?php $comments->author(); ?></h4>
      <div class="media-body " >
      <span class="w-author-at"><?php getCommentAt($comments->coid); ?></span><?php $comments->content(); ?>
      </div>
    </div>
    <div class="bd-media-left"><?php $comments->date('Y年m月d日 H:i:s'); ?></div>
    <div class="bd-media-right"><?php $comments->reply(); ?></div>
  </div>

<?php if ($comments->children) { ?>
<div class="comment-children">
  <?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</div>
<?php } ?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments1">
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
 <div class="bd-inline">
    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
	<?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
  </div> 
      
  <?php $comments->listComments(); ?>
      <nav class="bd-PageNav text-center">
        <?php $comments->pageNav('←','→','','...'); ?>
      </nav>
  <?php endif; ?>
  <?php if($this->allow('comment')): ?>
  <div class="cancel-comment-reply">
    <?php $comments->cancelReply(); ?>
  </div>
  
  <div class="bd-inline">
   <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    <?php _e('添加新评论'); ?>
  </div>
  <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="bd-margin-bottom-20">
    <?php if($this->user->hasLogin()): ?>
    <div class="author-oklogin">
      <?php _e('登录身份: '); ?>
      <a href="<?php $this->options->profileUrl(); ?>">
      <?php $this->user->screenName(); ?>
      </a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">
      <?php _e('退出'); ?>
      &raquo;</a>
      </div>
    <div class="bd-w-box bd-article-ly">
    <?php else: ?>
    <div class="bd-w-box bd-article-ly">
      <div class="row bd-row-pd-10">
        <div class="col-md-4 bd-row-pd-null">
          <input type="text" name="author" id="author" class="bd-textbox" placeholder="<?php _e('昵称（*）'); ?>" value="<?php $this->remember('author'); ?>" required />
        </div>
        <div class="col-md-4 bd-row-pd-null">
          <input type="text" class="bd-textbox" name="mail" id="mail"  placeholder="<?php _e('邮箱（*）'); ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
        </div>
        <div class="col-md-4 bd-row-pd-null ">
          <input type="url" name="url" id="url" class="bd-textbox"  placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
        </div>
      </div>
      <?php endif; ?>
      <div class="row bd-row-pd-10">
        <div class="col-md-12 bd-row-pd-null">
          <textarea id="<?php $this->respondId(); ?>"  name="text" id="textarea"  class="bd-textarea"  placeholder="我要吐槽，喵ヾ(≧∇≦*)ゝ" required><?php $this->remember('text'); ?>
</textarea>
          <button type="submit" class="bd-article-btn">
          <?php _e('回复'); ?>
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

<?php else: ?>
<h3>
  <?php _e('评论已关闭'); ?>
</h3>
<?php endif; ?>
</div>

<script type="text/javascript">
$(window).load(function(){
	//无分页时去掉分页CSS
	if ($( ".bd-PageNav:has(ol)" ).length==0)          
       {    
         $(".bd-PageNav").css("display","none")
       }

	})
$(function(){	
    //渲染作者与用户
	$(".comment-by-author").append('<span class="bd-by-author"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>小编</span>');
	$(".comment-by-user").append('<span class="bd-by-user"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>看倌</span');
  })	
</script>