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
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head >\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<link  href=\"css/style.css\" type=\"text/css\" rel=\"stylesheet\">\r\n<title>";
echo $strAdminTitle;
echo "</title>\r\n</head>\r\n<body class=\"welcome\">\r\n<table width=\"100%\" height=\"100%\"  border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"welcome\">\r\n  <tr>\r\n    <td valign=\"bottom\" class=\"welcome_version\">\r\n      ";
echo $strDesktopVer;
echo " V";
echo PHPWEB_VERSION;
echo " / ";
echo PHPWEB_RELEASE;
echo " <br />\r\n\t  ";
echo $strDesktopAuth;
echo " ";
echo showauthtype( );
echo " <br />\r\n\t  ";
echo $strDesktopUser;
echo " ";
echo $GLOBALS['CONF']['phpwebUser'];
echo "   </td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>\r\n";
?>
