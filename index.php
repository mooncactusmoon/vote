<?php include_once "./api/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷系統</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>  
        body{
            background-color: #f2f5f5;
            font-family: Microsoft JhengHei;
        }
        nav{
            background-color: #dfeded;
        }
        header{
            height: 200px;
            overflow: hidden;
        }
        section{
            height:624.5px;
            overflow: scroll;
        }
        .card{
            transition: all .5s ease;
            border-radius: 5px;
        }
        .card:hover{
            box-shadow: 0px 10px 10px rgba(0,0,0,.25);
            background-color: #dfeded;
        }
        section::-webkit-scrollbar {
        display: none;
        }
        .ad{
            background-color: #CCC;
        }
        .member{
            text-align: center;
          background-color:#0b1f5c;
          color: #abdeeb;
          font-size: 20px;
        }
        .a{
          color:#cab9fa;
          height: 40px;
      }
      .a:hover{
          background : #82b3e0;
          color: #2d02a3;
          text-decoration: none;
          font-weight:900;

      }

        footer{
            position: fixed;
            bottom: 0px;
            width: 1110px;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body >

<!-- nav -->
    <nav class="container-fluid shadow-sm py-2 px-2 text-right  d-flex justify-content-between my-0">
    <div class="my-0">
        <!-- &nbsp; -->
        <a href="index.php">
            <img src="./img/logo1.png" alt="LOGO" width="55px" height="40px" >
        </a>
    </div>
    <?php
    if(isset($_SESSION['success'])){
        echo "<span class='pr-5 mx-auto text-info  font-weight-bold'>{$_SESSION['success']}</span>";
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo "<script>alert('帳號或密碼錯誤，請再試一次')</script>";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['user'])){
    echo "<span class='pr-5 my-auto'>{$_SESSION['name']}歡迎，點選問卷即可加入投票唷 : )</span>";
    echo "<a href='logout.php' class='btn-sm btn-warning my-auto'>登出</a>";
    }
    ?>
    </nav>
<!-- nav end -->

<!-- header -->

<header class="container bg-warning">
    <div class="row">
    <a  href="index.php">
    <img src="./img/vote-header.jpg" alt="標題圖" >
    </a>
    </div>
</header>
<!-- header end -->

<!-- main 包含了 aside(sidebar) section -->
<main class="d-flex row px-0 container mx-auto">

<!-- sidebar -->
<?php include "./frontend/aside.php";?>
<!-- sidebar end -->


<!-- section -->
<section class="container col-7">

    <?php
    //判斷有沒有傳值，來決定顯現畫面
    $do=(isset($_GET['do']))?$_GET['do']:'show_vote_list';
    $file="./frontend/".$do.".php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./frontend/show_vote_list&id=0.php";
    }
    
    ?>
</section>
<!-- section end -->



<!-- ad bar -->
<div class="container col-2 ad ">
<?php include "./frontend/adImg.php";?>
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
<script src="./js/edit_subject.js"></script>

</body>

</html>