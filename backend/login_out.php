<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';

session_start();
$_SESSION['uname']=null;
$_SESSION['img']=null;
$_SESSION['uid']=null;
if ($_SESSION['uid']==''){
    alertMsg('请先登录！','../front/login.php');
}
setcookie('PHPSESSID','',time()-1,'/');
alertMsg('退出成功！','../front/login.php');