<?php
require_once '../backend/detail_back.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zxy_详情</title>
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
            <ul class="navbar-nav ms-auto">
                <li><a href="#" class="btn btn-sm"> <img src="<?=$_SESSION['img']?>" width="25" class="rounded-circle" alt=""><?=$_SESSION['uname']?></a></li>
                <li><a href="../backend/login_out.php" class="btn btn-sm btn-dark"><span class="bi bi-box-arrow-in-right"></span>退出</a></li>
            </ul>
        </div>
    </div>
</nav>

<!--表单-->
<div class="container borde bg-light">
    <form action="../backend/add_back.php" method="post" enctype="multipart/form-data" onsubmit="return checkError()" disabled>
        <div class="mb-3 mt-3 row g-2">
            <label for="title" class="col-form-label col-md-1 offset-md-3">留言标题:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="title" name="title" value="<?=$res['title']?>" disabled>
            </div>
        </div>
        <div class="mb-3 mt-3 row g-2">
            <label for="author" class="col-form-label col-md-1 offset-md-3 " >留言作者:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="author" name="author" value="<?=$_SESSION['uname'] ?>" disabled>
            </div>
        </div>

        <div class="mb-3 row g-2">
            <label for="content" class="col-form-label offset-md-3 col-md-1" >留言内容:</label>
            <div class="col-md-5">
           <textarea name="content" id="content" cols="30" class="form-control" rows="10" disabled>
               <?=$res['content']?>
           </textarea>

            </div>
        </div>

        <div class="mb-3 mt-3 row g-2">
            <label for="create_time" class="col-form-label col-md-1 offset-md-3 " disabled >创建时间:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="create_time" name="create_time" value="<?=$res['create_time'] ?>" disabled>
            </div>
        </div>

        <div class="mb-3 mt-3 row g-2">
            <label for="modify_time" class="col-form-label col-md-1 offset-md-3 " disabled>修改时间:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="modify_time" name="modify_time" value="<?=$res['modify_time'] ?>" disabled>
            </div>
        </div>

        <div class="offset-md-6 col-md-1">
<!--            <input type="submit" class="btn btn-success btn-xs" value="返回">-->
            <a href="../front/list.php" class="btn btn-warning btn-sm " role="button">返回</a>
        </div>
        <br>
    </form>
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
</script>
</body>

