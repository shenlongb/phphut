<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

define( "ROOTPATH", "../../" );
include( ROOTPATH."includes/admin.inc.php" );
include( "language/".$sLan.".php" );
needauth( 0 );
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n";
echo "<s";
echo "cript  language=\"javascript\">\r\nvar PDV_RP=\"";
echo ROOTPATH;
echo "\";\r\n</script>   \r\n";
echo "<s";
echo "cript  language=\"javascript\" src=\"../js/base.js\"></script>   \r\n";
echo "<s";
echo "cript  language=\"javascript\" src=\"js/frame.js\"></script>   \r\n\r\n</head>\r\n\r\n<body class=\"framebody\">\r\n\r\n<table width=\"100%\" height=\"100%\"  border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n<td width=\"150\" valign=\"top\">\r\n\r\n<div class=\"frameleft\">\r\n\r\n<ul class=\"menulist\">\r\n<li id=\"m1\" class=\"menulist\">";
echo $strSetMenu1;
echo "</li>\r\n<li id=\"m2\" class=\"menulist\">";
echo $strSetMenu2;
echo "</li>\r\n<li id=\"m6\" class=\"menulist\">";
echo $strSetMenu6;
echo "</li>\r\n<li id=\"m8\" class=\"menulist\">";
echo $strSetMenu8;
echo "</li>\r\n</ul>\r\n\r\n<ul class=\"menulist\">\r\n<li id=\"m3\" class=\"menulist\">";
echo $strSetMenu3;
echo "</li>\r\n<li id=\"m4\" class=\"menulist\">";
echo $strSetMenu4;
echo "</li>\r\n<li id=\"m5\" class=\"menulist\">";
echo $strSetMenu5;
echo "</li>\r\n</ul>\r\n\r\n<ul class=\"menulist\">\r\n<li id=\"m11\" class=\"menulist\">";
echo $strSetMenu11;
echo "</li>\r\n<li id=\"m12\" class=\"menulist\">";
echo $strSetMenu12;
echo "</li>\r\n</ul>\r\n\r\n</div>\r\n\r\n</td>\r\n<td valign=\"top\">\r\n\r\n<div class=\"framemain\">\r\n\t<iframe id=\"framecon\" src='config.php'  name='con' width='100%' height='100%' scrolling='yes' marginheight='0'  frameborder='0'>IE</iframe> \r\n</div>\r\n\r\n</td>\r\n</tr>\r\n</table>\r\n\t\r\n\r\n</body>\r\n</html>\r\n";
?>
