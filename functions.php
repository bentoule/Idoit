<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
	
	 $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为http://www.xxxx.com/icon.png,支持 https:// 或 //,留空则不设置favicon'));
     $form->addInput($favicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	 
	$bgimgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgimgUrl', NULL, NULL, _t('背景图片地址'), _t('在这里填入一个图片URL地址, 作为网站背景图'));
    $form->addInput($bgimgUrl);
	
	
	$SlideRadio = new Typecho_Widget_Helper_Form_Element_Radio('SlideRadio',
        array('open' => _t('开启'),
            'close' => _t('关闭'),
        ),
        'oneList', _t('首页幻灯片'), _t('默认关闭，根据自己的喜好去做切换吧'));
    $form->addInput($SlideRadio);


    $CodeRadio = new Typecho_Widget_Helper_Form_Element_Radio('CodeRadio',
        array('open' => _t('开启'),
            'close' => _t('关闭'),
        ),
        'oneList', _t('文章代码亮高'), _t('默认关闭，根据自己的喜好去做切换吧'));
    $form->addInput($CodeRadio);


	 
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
	 'ShowRandomPosts' => _t('显示随机文章'),
    'ShowCategory' => _t('显示分类'),
	'ShowTabs' => _t('显示标签'),
	'ShowUserTab' => _t('显示文章页用户卡片')
	),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowRandomPosts', 'ShowCategory','ShowTabs','ShowUserTab'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
   


$onetitle = new Typecho_Widget_Helper_Form_Element_Text('onetitle', NULL, NULL, _t('首页第一张幻灯片标题'), _t('在这里填入幻灯片标题如“<  a href="#">哈哈我是一个链接< /a>”'));
    $form->addInput($onetitle);

$oneimg = new Typecho_Widget_Helper_Form_Element_Text('oneimg', NULL, NULL, _t('首页第一张幻灯片图片来链接'), _t('在这里填入幻灯片链接，已“http://”或"htps://"开头'));
    $form->addInput($oneimg);

$twotitle = new Typecho_Widget_Helper_Form_Element_Text('twotitle', NULL, NULL, _t('首页第二张幻灯片标题'), _t('在这里填入幻灯片标题'));
    $form->addInput($twotitle);

 $twoimg = new Typecho_Widget_Helper_Form_Element_Text('twoimg', NULL, NULL, _t('首页第二张幻灯片图片来链接'), _t('在这里填入幻灯片链接，已“http://”或"htps://"开头'));
    $form->addInput($twoimg);
$threetitle = new Typecho_Widget_Helper_Form_Element_Text('threetitle', NULL, NULL, _t('首页第三张幻灯片标题'), _t('在这里填入幻灯片标题'));
    $form->addInput($threetitle);
 $threeimg = new Typecho_Widget_Helper_Form_Element_Text('threeimg', NULL, NULL, _t('首页第三张幻灯片图片来链接'), _t('在这里填入幻灯片链接，已“http://”或"htps://"开头'));
    $form->addInput($threeimg);
    
}

/*@作者*/
function getCommentAt($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-'.$parent.'">@'.$author.'</a>';
        echo $href;
    } else {
        echo '';
    }
}

/*获取随机文章*/
function theme_random_posts(){
	$defaults = array(
		'number' => 5,
		'before' => '<ul class="list">',
		'after' => '</ul>',
		'xformat' => '<li><a href="{permalink}" title="{title}">{title}</a></li>'
	);
	$db = Typecho_Db::get();
	$sql = $db->select()->from('table.contents')
		->where('status = ?','publish')
		->where('type = ?', 'post')
		->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
		->limit($defaults['number'])
		->order('RAND()');
	$result = $db->fetchAll($sql);
	echo $defaults['before'];
	foreach($result as $val){
		$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
		echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
	}
	echo $defaults['after'];
}


//获取文章第一张图片
function img_postthumb($cid) {
   $db = Typecho_Db::get();
   $rs = $db->fetchRow($db->select('table.contents.text')
       ->from('table.contents')
       ->where('table.contents.cid=?', $cid)
       ->order('table.contents.cid', Typecho_Db::SORT_ASC)
       ->limit(1));

   preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
   $img_src = $thumbUrl[1][0];  //将赋值给img_src
   $img_counter = count($thumbUrl[0]);  //一个src地址的计数器

   switch ($img_counter > 0) {
       case $allPics = 1:
           echo $img_src;  //当找到一个src地址的时候，输出缩略图
           break;
       default:
           echo "http://baidu.com/404";  //没找到(默认情况下)，不输出任何内容
   };
}