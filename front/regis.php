<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zxy_注册</title>
    <link rel="stylesheet" href="../static/bootstrap.min.css">
    <link rel="stylesheet" href="../static/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    <style>
        .borde{
            border: 3px solid darksalmon;
        }
        .bold{
            font-weight: bold;
        }
        .c{
            width: 700px;
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
                <li><a href="regis.php" class="btn btn-sm btn-dark"><span class="bi bi-person"></span> 注册 </a></li>
                <li><a href="login.php" class="btn btn-sm btn-dark"><span class="bi bi-box-arrow-in-right"></span> 登录</a></li>
            </ul>
        </div>
    </div>
</nav>



<br>
<br>

<!--表单-->
<div class="container borde bg-light">
    <form action="../backend/regis_back.php" method="post" enctype="multipart/form-data" onsubmit="return checkError()">
        <div class="mb-3 mt-3 row g-2">
            <label for="uname" class="col-form-label col-md-1 offset-md-3">用户名:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="uname" name="uname" onblur="checkinput(this)">
            </div>
        </div>
        <div class="mb-3 mt-3 row g-2">
            <label for="upass" class="col-form-label col-md-1 offset-md-3">密码:</label>
            <div class="col-md-5">
                <input type="password" class="form-control" id="upass" name="upass" onblur="checkinput(this)">
            </div>
        </div>
        <div class="mb-3 row g-2">
            <label for="rpass" class="col-form-label offset-md-3 col-md-1">确认密码:</label>
            <div class="col-md-5">
                <input type="password" class="form-control" id="rpass" name="rpass" onblur="checkinput(this)">
            </div>
        </div>

        <div class="mb-3 row g-2">
            <label for="img" class="col-form-label offset-md-3 col-md-1">头像:</label>
            <div class="col-md-5">
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </div>

        <div class="mb-3 row g-2 form-check">
            <label for="" class="col-form-label offset-md-3 col-md-1">性别:</label>
            <label for="" class="col-md-1 form-check-label">
                <input type="radio" name="sex" class="form-check-input" value="m">男
            </label>
            <label for="" class="col-md-1 form-check-label">
                <input type="radio" name="sex" class="form-check-input" value="fm" checked>女
            </label>
        </div>
        <div class="offset-md-6 col-md-1">
            <input type="submit" class="btn btn-success btn-xs" value="注册">
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
            alert("您的输入有误！请重新提交！");
            return false;
        }
    }
</script>

</body>
</html>