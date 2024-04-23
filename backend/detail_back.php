<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';
session_start();

$id = get('id');
$uid = $_SESSION['uid'];

$sql = "select * from messages where id=$id and uid='$uid'";
$res = QueryOne($dbconfig,$sql);

if ($uid == '16'){
    $sql = "select * from messages where id=$id";
    $res = QueryOne($dbconfig,$sql);
}

if (!$res && $uid !== '16'){
    alertMsg("您可能无权查看此留言！",'../front/list.php');
}
if ($_SESSION['uid']==''){
    alertMsg('请先登录！','../front/login.php');
}
