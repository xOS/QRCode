<?php
/**
* PHP在线网址二维码API源码
* 地址：https://api.nange.cn/code
**/

//载入qrcode类
include "../code/phpqrcode.php";

//取得GET参数
$url        = isset($_GET["url"]) ? $_GET["url"] : 'help';
$errorLevel = isset($_GET["e"]) ? $_GET["e"] : 'L';
$PointSize  = isset($_GET["p"]) ? $_GET["p"] : '3';
$margin     = isset($_GET["m"]) ? $_GET["m"] : '0';
preg_match('/http:\/\/([\w\W]*?)\//si', $url, $matches);

//简单判断
//if ( $matches[1] != 'api.nange.cn' && $matches[1] != 'nange.cn' || $url == 'help') { //取消此行注释并注释下面一行，就能加入自定义的url过滤功能
if ( $url == 'help'){
    header("Content-type: text/html; charset=utf-8");
    echo '<title>在线二维码API接口 | 楠格</title>';
    echo '<h1>在线二维码API服务</h1>
    使用前请仔细查看参数说明：<br />
    <br />
    url&nbsp&nbsp: 二维码对应的网址<br /><br />
    m&nbsp&nbsp: 二维码白色边框尺寸,缺省值: 3px<br /><br />
    e&nbsp&nbsp: 容错级别(errorLevel)，可选参数如下(缺省值 L)：<br /><br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspL水平    7%的字码可被修正<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspM水平    15%的字码可被修正<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspQ水平    25%的字码可被修正<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspH水平    30%的字码可被修正<br /><br />
    p&nbsp&nbsp: 二维码尺寸，可选范围1-10(具体大小和容错级别有关)（缺省值：6）<br /><br />
    常规用法：<a href="https://api.nange.cn/code?m=3&e=H&p=6&url=https://www.nange.cn/" target="_blank">https://api.nange.cn/code?m=3&e=H&p=6&url=https://www.nange.cn/</a><br /><br />
    
    ';
	exit();
} else  {
    //调用二维码生成函数
    createqr($url, $errorLevel, $PointSize, $margin);
}

//简单二维码生成函数
function createqr($value,$errorCorrectionLevel,$matrixPointSize,$margin) {
    QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, $margin);
}
?>
