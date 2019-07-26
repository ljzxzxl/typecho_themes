<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
        array('ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项')),
        array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}

/**
* 获取必应每日壁纸、故事
* @author  華強博客
* @link    http://www.yanghuaqiang.com
* @return  string
*/
function bing(){
    //删除之前的图片和故事
    for ($i=1; $i <=30 ; $i++) { 
        @unlink(date('Ymd',time()-24*3600*$i).'.jpg');
        @unlink(date('Ymd',time()-24*3600*$i).'.json');
        @unlink(date('Ymd',time()-24*3600*$i).'_img.json');
    }

    $img_name   = date('Ymd').'.jpg'; //每日图片
    $coverstory = date('Ymd').'.json'; //每日故事 json格式
    $img_info = date('Ymd').'_img.json'; //图片信息 json格式

    if (!file_exists($img_name)) {
        $url = "http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1";
        $result = file_get_contents($url);
        $output = json_decode($result,true);
        $img_url = $output["images"][0]["url"];
        $img = file_get_contents("http://cn.bing.com".$img_url);  
        @file_put_contents($img_name,$img); //写入图片
        @file_put_contents($img_info,json_encode($output["images"][0])); //写入文本
    }
    if (!file_exists($coverstory)) {
        $json = file_get_contents('http://cn.bing.com/cnhp/coverstory/');
        @file_put_contents($coverstory,$json); //写入文本
    }
    //如果封面故事为空
    $bing = file_get_contents($coverstory);
    if (empty($bing)){
        $bing = file_get_contents($img_info);
    }
    $coverstory = json_decode($bing,true);
    return $coverstory;
}

/**
* 获取文章第一张图片地址
* @author  華強博客
* @link    http://www.yanghuaqiang.com
* @param   $cid 文章id
* @return  string
*/
function img_thumb($cid) {
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.cid=?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));
    $num = preg_match_all("/http(.*?)(.jpg|.png)/", $rs['text'], $imgUrl);
    if($num==0){
        return '';
    }else{
        return $imgUrl[0][0];
    }
}

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

/**
 * 设置首页文章分页条数
 */
function themeInit($archive) {
    if ($archive->is('index')) {
        $archive->parameter->pageSize = 10; // 自定义条数
    }
}

/**
 * 秒转时间，格式 年 月 日 时 分 秒
 *
 * @author Roogle
 * @return string
 */
function getBuildTime(){
    // 在下面按格式输入本站创建的时间
    $site_create_time = strtotime('2018-04-18 12:00');
    $time = time() - $site_create_time;
    if(is_numeric($time)){
        $time_str = '';
        $value = array(
            "years" => 0, "days" => 0, "hours" => 0,
            "minutes" => 0, "seconds" => 0,
        );
        if($time >= 31556926){
            $value["years"] = floor($time/31556926);
            $time = ($time%31556926);
            $time_str .= $value['years'].'年';
        }
        if($time >= 86400){
            $value["days"] = floor($time/86400);
            $time = ($time%86400);
            $time_str .= $value['days'].'天';
        }
        if($time >= 3600){
            $value["hours"] = floor($time/3600);
            $time = ($time%3600);
            $time_str .= $value['hours'].'小时';
        }
        if($time >= 60){
            $value["minutes"] = floor($time/60);
            $time = ($time%60);
            $time_str .= $value['minutes'].'分';
        }
        $value["seconds"] = floor($time);
        echo $time_str;
    }else{
        echo '';
    }
}