<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';
session_start();

$key = get('key');

$sql = "select * from messages where title like '%$key%'";
$res = QueryAll($dbconfig,$sql);
if ($_SESSION['uid']==''){
    alertMsg('请先登录！','../front/login.php');
}
