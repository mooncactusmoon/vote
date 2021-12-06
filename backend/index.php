<?php include_once "../api/db.php" ?>
<?php
if(!isset($_SESSION['user'])){
    to("../index.php");
    exit();
}
?>

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
          font-family: Microsoft JhengHei;
      }

      header{
          height: 200px;
          overflow: hidden;
      }
      section{
            height:620px;
            overflow: scroll;
        }
      section::-webkit-scrollbar {
        display: none;
        }
      .ad{
          background-color: #CCC;
      }
      .member{
          background-color:#0b1f5c;
          color: #475FA8;
          font-size: 20px;
      }

      footer{
          position: fixed;
          bottom: 0px;
          width: 1110px;
      }
  </style>
</head>

<body>

<!-- 輪播  用陣列去顯示圖片-->

    <!-- <div class="jumbotron p-0 mb-0" style="overflow:hidden;height:200px;">
    <a href="index.php">
    <div id="carouselExampleIndicators" class="carousel slide position-relative" data-ride="carousel">
        <div class="carousel-inner position-absolute" style="top:-250px;">
    <?php
    $images=all('ad',['sh'=>1]);
    foreach($images as $key => $image){
    if($key==0){

        echo "<div class='carousel-item active'>";
    }else{
        echo "<div class='carousel-item'>";

    }
    echo "<img src='../img/{$image['name']}' alt='{$image['intro']}' class='d-block w-100'></div>";
    }


    ?>      
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
    </div> -->
<!-- 輪播 end -->

<!-- nav -->
<nav class="bg-light shadow-sm py-3 px-2 text-right my-0 d-flex justify-content-between">
<div class="my-0">
        <!-- &nbsp; -->
        <a href="../index.php">
            <img src="../img/vote.png" alt="LOGO" width="80px" height="35px" >
        </a>
        <a class="px-2" href="../index.php">回投票表列</a>
    </div>
    <!-- <div> -->
        <!-- 放置功能 -->
        <!-- <a class="px-2" href="?do=show_vote_list">問卷管理</a>
        <a class="px-2" href="?do=member">會員管理</a>
        <a class="px-2" href="?do=ad">廣告管理</a> -->     
    <!-- </div> -->
<?php

if(isset($_SESSION['error'])){
    echo "<span class='float-left text-danger'>". $_SESSION['error'] ."</span>";
}

if(isset($_SESSION['user'])){
    echo "<span class='pr-5 '>歡迎，{$_SESSION['user']} : )</span>";
    // echo "<a href='../logout.php' class='btn-sm btn-warning'>登出</a>";
}
?>
</nav>
<!-- nav end -->

<!-- header -->
<header class="container bg-warning">
    <div class="row">
        <img  src="../img/vote-header.jpg" alt="標題圖">
    </div>
</header>
<!-- header end -->

<!-- main 包含了 aside(sidebar) section -->
<main class="d-flex row px-0 container mx-auto">


<!-- sidebar -->
    <aside class="container col-3 member ">
    <div class="row-cols-1 text-center d-flex flex-column">
        <?php
        if(isset($_SESSION['user'])){
            echo "<span class='pr-5 '>{$_SESSION['user']}的工作列 : )</span>";
            echo "<a href='../logout.php' class='btn-sm btn-warning'>登出</a>";
        }
        ?>
            <!-- 放置功能 -->
            <a class="px-2" href="?do=show_vote_list">投票管理</a>
            <a class="px-2" href="?do=member">會員管理</a>
            <a class="px-2" href="?do=ad">廣告管理</a>
        </div>
    </aside>
<!-- sidebar end -->


<!-- section -->

<section class="container col-7">

    <?php
    //判斷有沒有傳值，來決定顯現畫面
    $do=(isset($_GET['do']))?$_GET['do']:'manage_vote';
    $file=$do.".php";
    if(file_exists($file)){
        include $file;
    }else{
        include "manage_vote.php";
    }
    
    ?>
</section>
<!-- section end -->



<!-- ad bar -->
<div class="container col-2 ad ">
AD
</div>
<!-- ad bar end -->


</main>
<!-- main end -->

<!-- footer -->
<footer class="py-3 text-center text-light bg-dark container-fluid">
    &copy;Cacuts月
</footer>
<!-- footer end -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>