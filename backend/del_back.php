<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';
session_start();

$id = get('id');
$uid = $_SESSION['uid'];

if ($uid==''){
    alertMsg("请先登录！",'../front/login.php');
}

//在删除留言时，先查询该留言，如果能查询到，说明此用户可以操作该留言
$sql = "select * from messages where id = $id and uid = '$uid'";
$res = QueryOne($dbconfig,$sql);

if ($uid == '16' ){
    $sql = "delete from messages where id=$id";
    $res = Excute($dbconfig,$sql);
    alertMsg('删除成功！','../front/list.php');
}else{
    alertMsg('删除失败！','../front/list.php');
}
