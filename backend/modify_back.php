<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';
session_start();

$id = get('id');
$uid = $_SESSION['uid'];
$title = post('title');
$author = post('author');
$content = post('content');

$sql = "update messages set title='$title',author='$author',content='$content',modify_time=now() where id=$id and uid='$uid'";

$res = Excute($dbconfig,$sql);

if($res){
    alertMsg('修改成功！','../front/list.php');
}else{
    alertMsg('修改失败！','../front/list.php');
}
if ($_SESSION['uid']==''){
    alertMsg('请先登录！','../front/login.php');
}
