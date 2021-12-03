<?php include_once "./api/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷系統</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>       
        body{
            background-color: #f2f5f5;
        }
        .container{
            min-height: 596px;
        }
    </style>
</head>

<body>

<!-- 輪播 -->
<div class="jumbotron p-0 mb-0" style="overflow:hidden;height:200px;">
<a href="?">

    <div id="carouselExampleIndicators" class="carousel slide position-relative" data-ride="carousel">
        <div class="carousel-inner position-absolute" style="top:-250px;">
            <div class="carousel-item active">
                <img src="./img/dessert-02.jpg" class="d-block w-100" alt="123">
            </div>
            <div class="carousel-item">
                <img src="./img/dessert-06.jpg" class="d-block w-100" alt="321">
            </div>
            <div class="carousel-item">
                <img src="./img/dessert-07.jpg" class="d-block w-100" alt="000">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</a>
</div>
<!-- 輪播 end -->

<!-- nav -->
<nav class="bg-light shadow-sm py-3 px-2 text-right mb-4 d-flex justify-content-between">
    <div>&nbsp;</div>
<?php

if(isset($_SESSION['error'])){
    echo "<span class='float-left text-danger'>". $_SESSION['error'] ."</span>";
}

if(isset($_SESSION['user'])){
    echo "<span class='pr-5 '>歡迎，{$_SESSION['user']} : )</span>";
    echo "<a href='logout.php' class='btn-sm btn-warning'>登出</a>";
}else{
?>
<div class="">
    <a href="?do=login" class="mr-2 btn-sm btn-warning">會員登入</a>
    <a href="?do=reg" class=" btn-sm  btn-warning">註冊新會員</a>
</div>
<?php
}
?>
</nav>
<!-- nav end -->
<div class="container">

    <?php
    //判斷有沒有傳值，來決定顯現畫面
    $do=(isset($_GET['do']))?$_GET['do']:'show_vote_list';
    $file="./frontend/".$do.".php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./frontend/show_vote_list.php";
    }
    
    ?>
</div>

<div class="p-3 text-center text-light bg-dark">
    &copy;cacuts月
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>