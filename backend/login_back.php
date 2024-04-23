<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';
session_start();

$uname = post('uname');
$upass = post('upass');
$upass_hash = hash('sha256',$upass);

$sql = "select * from users where uname='$uname' and upass = '$upass_hash'";
$res = QueryOne($dbconfig,$sql);

    if( $uname=='11' && $upass=='11'){
        $_SESSION['uname']=$res['uname'];
        $_SESSION['img']=$res['img'];
        $_SESSION['uid']=$res['id'];
        alertMsg('欢迎管理员登录！','../front/list.php');
    }else if ($res){
    $_SESSION['uname']=$res['uname'];
    $_SESSION['img']=$res['img'];
    $_SESSION['uid']=$res['id'];

alertMsg('登录成功！', '../front/list.php');
} else{
    alertMsg('登录失败！','../front/login.php');
}


if ($_SESSION['uid']==null){
    alertMsg('请先登录！','../front/login.php');
}
