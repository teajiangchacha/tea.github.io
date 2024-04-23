<?php
require_once 'dbconfig.php';

//创建数据库的连接对象
function Connect($dbconfig){
    $link = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['db'],$dbconfig['port']);
    return $link;
}

//创建数据库的报错函数
function Error($link){
    if (mysqli_error($link)){
        echo "错误编号：".mysqli_error($link);
        echo "错误信息：".mysqli_error($link);
        die;
    }
}

//创建数据库的执行函数,解析数据库语句
function Excute($dbconfig,$sql){
    $link = Connect($dbconfig);
    $res = mysqli_query($link,$sql);
    Error($link);
    return $res;
}

//对于查询语句，需要创建函数来取查询结果
//获取单条记录
function QueryOne($dbconfig,$sql){
    $res = Excute($dbconfig,$sql);
    $rs = mysqli_fetch_assoc($res);
    return $rs;
}

//获取所有的数据记录
function QueryAll($dbconfig,$sql){
    $res = Excute($dbconfig,$sql);
    $rs = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $rs;
}