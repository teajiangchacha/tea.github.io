<?php
require_once '../common/db_func.php';
require_once '../common/commom_fuc.php';

$uname = post('uname');
$upass = post('upass');
$upass_hash = hash('sha256',$upass);
$rpass = post('rpass');
$rpass_hash = hash('sha256',$rpass);
$sex = post('sex');
$img = isset($_FILES['img'])?$_FILES['img']:'';


//if ($_SESSION['uid']==''){
//    alertMsg('请先登录！','../front/login.php');
//}
if ($upass_hash !== $rpass_hash){
    alertMsg('两次密码不一致!','../front/regis.php');
}
//获取后缀
$file_ext = strrchr($img['name'],'.');
//生成一个全新的文件地址
$folder_path = '../front/uploads/'.date('Ymd');
//如果当前目录的路径不存在，则自动创建
if (!file_exists($folder_path)){
    mkdir($folder_path,0777,true);
}
//再定义完整的文件地址
$img_path = $folder_path.'/'.time().rand(10000,9999999).$file_ext;

if ($img['error']!=0){
//    move_uploaded_file($img['tep_name'],$img_path);
    $img_path = '../front/default/7071.jpg';
}

$sql = "select * from users where uname='$uname'";
$res = QueryOne($dbconfig,$sql);
if ($res){
    alertMsg('当前用户名已存在!','../front/regis.php');
}

$sql = "insert into users values(null,'$uname','$upass_hash','$sex','$img_path',now())";

$res = Excute($dbconfig,$sql);

if ($res){
    move_uploaded_file($img['tmp_name'],$img_path);
    alertMsg('注册成功！','../front/login.php');
}else{
    alertMsg('注册失败！','../front/regis.php');
}