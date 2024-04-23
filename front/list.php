<?php
require_once '../backend/list_back.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zxy_留言</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css">
    <link rel="stylesheet" href="../static/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    <style>
        .borde{
            border: 3px solid darksalmon;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid text-bg-warning">
        <a class="navbar-brand" href="#">Web安全实训</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../front/list.php">首页</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        网站导航
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../front/add.php">增加留言</a></li>
                        <li><a class="dropdown-item" href="../front/list.php">查看留言</a></li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-nav" style="margin-left: 600px">
                <input type="text" id="inp" name="inp">
<!--                <input type="button" class="bi bi-search" value="search" id="btn">-->
                <a href="#" class="btn btn-dark btn-sm" role="button" id="btn"><i class="bi bi-search"></i></a>
            </div>
            <ul class="navbar-nav ms-auto">
                <li><a href="#" class="btn btn-warning btn-sm row ">普通</a></li>
                <li><a href="#" class="btn btn-sm"> <img src="<?=$_SESSION['img']?>" width="25" class="rounded-circle" alt=""> <?=$_SESSION['uname']?></a></li>
                <li><a href="../backend/login_out.php" class="btn btn-sm btn-dark"><span class="bi bi-box-arrow-in-right " ></span>退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<div class="container">
    <p class="h6 bold">
        以下为您搜索的内容：<span id="sp"></span>
    </p>
</div>
<br>
<br>
<div class="container">
    <table class="table table-hover text-center">
        <thead class="text-center text-bg-dark">
        <tr>
            <th>序号</th>
            <th>标题</th>
            <th>作者</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody class="text-bg-light">

        <?php
        foreach ($res as $k=>$v):
        ?>

          <tr>
            <td><?=$k+1?></td>
            <td><?=$v['title']?></td>
            <td><?=$v['author']?></td>
            <td><?=$v['create_time']?></td>
            <td>
                <a href="../front/modify.php?id=<?=$v['id']?>" class="btn btn-warning btn-sm" role="button">修改</a>
                <a href="../front/detail.php?id=<?=$v['id']?>" class="btn btn-dark btn-sm" role="button">详情</a>
                <a href="../backend/del_back.php?id=<?=$v['id']?>" class="btn btn-danger btn-sm" role="button" onclick="return confirm('您确定要删除吗？')">删除</a>
            </td>
          </tr>

        <?php
        endforeach;
        ?>

        </tbody>
    </table>
</div>

<script src="../static/bootstrap.bundle.min.js"></script>
<script>
    function checkinput(obj) {
        let inp = obj.value;
        if (inp.match(/['"<>{}]/)||inp.length==0){
            obj.className = 'form-control is-invalid';
        }else{
            obj.className = 'form-control is-valid';
        }
    }
    function checkError() {
        let a = document.getElementsByClassName('is-invalid');
        if (a.length!==0){
            alert("您的输入存在不合理,请查证后再提交.");
            return false;
        }
    }

    let inp = document.getElementById('inp');
    let btn = document.getElementById('btn');
    btn.onclick = function () {
        location.href = '../front/list.php?key=' + inp.value;
    }

    let str = location.search;
    console.log(decodeURIComponent(str.split('key=')[1]));
    if(str!=''){
        let str1 = decodeURIComponent(str.split('key=')[1]);
        document.getElementById('sp').innerHTML = str1;
    }
</script>
</body>

