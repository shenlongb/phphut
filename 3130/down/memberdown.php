<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/down.inc.php");


//定义模块名和页面名
PageSet("down","memberdown");


//输出
PrintPage();


?>