<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
	
	 $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为http://www.xxxx.com/icon.png,支持 https:// 或 //,留空则不设置favicon'));
     $form->addInput($favicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	 
	 
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
	 'ShowRandomPosts' => _t('显示随机文章'),
    'ShowCategory' => _t('显示分类'),
	'ShowTabs' => _t('显示标签')
	),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowRandomPosts', 'ShowCategory','ShowTabs'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
    
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