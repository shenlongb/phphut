<?phpdefine( "ROOTPATH", "" );include( "./includes/admin.inc.php" );include( "base/language/".$sLan.".php" );?><!DOCTYPE html><html lang="en"><head>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    <title><?php echo $strAdminTitle; ?></title>    <link href="base/templates/css/common.css" rel="stylesheet" type="text/css" />    <script type="text/javascript" src="base/js/base.js"></script>    <script type="text/javascript" src="base/js/form.js"></script>    <script type="text/javascript" src="base/js/admin.js"></script><style type="text/css">.login { width:100%; height:100%; background:#ffffff; padding: 0; margin:0; }.login_new { width:533px;height:248px; margin: 0 auto; background:url(base/templates/images/loginbg.gif) }</style></head><body><div class="login">    <div class="login_new">        <table width="90%" height="248" border="0" align="center" cellpadding="0" cellspacing="0">            <tr>                <td width="155" align="right" style="padding-right:30px">                    <img src="base/templates/images/2.png" width="103" height="114">                </td>                <td>                    <div  id="notice" class="noticediv"></div>                    <table border="0" cellpadding="1" cellspacing="1" style="margin:10px 0px">                        <form action="" method="post"  id="adminLoginForm">                            <tr>                                <td align="center" width="80"><?php echo $strAdminUser; ?></td>                                <td rowspan="4" width="3"></td>                                <td>                                    <input type="text" id="user" name="user" size="18" class="input" style="width:130px" />                                </td>                            </tr>                            <tr>                                <td align="center" width="80"><?php echo $strAdminPass; ?></td>                                <td><input type="password" id="password" name="password" size="18"  class="input" style="width:130px" /></td>                            </tr>                            <tr>                                <td width="80" align="center"><?php echo $strAdminImg; ?></td>                                <td>                                    <table border="0" cellspacing="0" cellpadding="0" height="20">                                        <tr>                                            <td width="1"><input type="text" id="ImgCode" name="ImgCode" style="width:65px"  class="input" /></td>                                            <td style="padding:0px 3px">                                                <img id="codeimg" src="codeimg.php" width="60" height="18" style="border:1px #dddddd solid;cursor:pointer" />                                            </td>                                        </tr>                                    </table>                                </td>                            </tr>                            <tr>                                <td width="80" height="39" align="center"><input name="act" type="hidden" id="act" value="adminlogin"></td>                                <td height="30" >                                    <input type="submit" name="Submit" value="<?php echo $strAdminSubmit; ?>" class="button" />                                </td>                            </tr>                        </form>                    </table>                </td>            </tr>        </table>    </div></div><script type="application/javascript">    $(function () {        var height = $(window).height();        var height_new = $('.login_new').height();        var height_ok = (height-height_new)/2-height_new/3;        $('.login_new').css('margin',height_ok+'px auto 0 auto');    })</script></body></html>