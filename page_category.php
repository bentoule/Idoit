<?php
/**
* Template Page of Categorys Archives
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>



<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 bd-padding-none">
   
	<?php
    $stat = Typecho_Widget::widget('Widget_Stat');
    $this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    $output = '<div class="bd-box-moder">';
    while($archives->next()){
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        $y=$year; $m=$mon;
        if ($year > $year_tmp || $mon > $mon_tmp) {
            $output .= '</div>';
        }
        if ($year != $year_tmp || $mon != $mon_tmp) {
			 $year = $year_tmp;
			 $mon = $mon_tmp;
			 $output .= '<h3>'.date('Y年 n月',$archives->created).'</h3><div class="bd-span-mark"></div><div class="bd-span-clear"></div> <div class="bd-list-box"><ul>';
        }
        $output .= '<li><a href="'.$archives->permalink .'">'. $archives->title  .'</a><span class="pull-right hidden-xs">'.date('Y年n月j日',$archives->created).' <span></li>';
    }
    $output .= '</div></ul></div><br/>';
    echo $output;
    ?>
    

</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
