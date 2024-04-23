<?php
header("Content-type:text/html;charset=utf-8");

function get($name){
    return isset($_GET[$name])?$_GET[$name]:'';
}

function post($name){
    return isset($_POST[$name])?$_POST[$name]:'';
}

//创建一个通用的提示函数
function alertMsg($msg,$url){
    echo <<<str
<script>alert('$msg');location.href='$url';</script>
str;
die;
}

