<?php
/**
* PHP在线网址二维码API源码
* 文章地址：http://www.vmgirls.com/qr
**/

//载入qrcode类
include "./phpqrcode.php";

//取得GET参数
$url        = isset($_GET["url"]) ? $_GET["url"] : 'help';
$errorLevel = isset($_GET["e"]) ? $_GET["e"] : 'L';
$PointSize  = isset($_GET["p"]) ? $_GET["p"] : '3';
$margin     = isset($_GET["m"]) ? $_GET["m"] : '0';
preg_match('/http:\/\/([\w\W]*?)\//si', $url, $matches);

//简单判断
//if ( $matches[1] != 'www.vmgirls.com' && $matches[1] != 'www.vmgirls.com' || $url == 'help') { //取消此行注释并注释下面一行，就能加入自定义的url过滤功能
if ( $url == 'help'){
    header("Content-type: text/html; charset=utf-8");
    echo '<title>在线二维码API接口 | 唯美女生</title>';
    echo '<h1>在线二维码API服务</h1>
    使用前请仔细查看参数说明：<br />
    <br />
    url: 二维码对应的网址<br /><br />
    m&nbsp&nbsp: 二维码白色边框尺寸,缺省值: 3px<br /><br />
    e&nbsp&nbsp: 容错级别(errorLevel)，可选参数如下(缺省值 L)：<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspL水平    7%的字码可被修正<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspM水平    15%的字码可被修正<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspQ水平    25%的字码可被修正<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbspH水平    30%的字码可被修正<br />
    p&nbsp&nbsp: 二维码尺寸，可选范围1-10(具体大小和容错级别有关)（缺省值：6）<br /><br />
    常规用法：<a href="http://www.vmgirls.com/qr/?m=3&e=H&p=6&url=http://www.vmgirls.com/" target="_blank">http://www.vmgirls.com/qr/?m=3&e=H&p=6&url=http://www.vmgirls.com/</a><br /><br />
    
    CDN 加速：<br />
    格	式：http://www.vmgirls.com/qr/$m_$e_$p_$url_cdn.png <br />
    示	例：<a href="http://www.vmgirls.com/qr/3_h_6_http://www.vmgirls.com_cdn.png" target="_blank">http://www.vmgirls.com/qr/3_h_6_http://www.vmgirls.com_cdn.png</a><br />
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