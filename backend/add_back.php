<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';
session_start();

$title = post('title');
$author = post('author');
$content = post('content');
$uid = $_SESSION['uid'];
if ($_SESSION['uid']==''){
    alertMsg('请先登录！','../front/login.php');
}
$sql = "insert into messages values(null,'$uid','$title','$author','$content',now(),null)";
$res = Excute($dbconfig,$sql);

if($res){
    alertMsg('留言成功！','../front/list.php');
}else{
    alertMsg('留言失败！','../front/add.php');
}
