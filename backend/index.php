<?php include_once "../api/db.php" ?>
<?php
if ($_SESSION['id'] != 1) { //只有管理者能看到後台
    // if(!isset($_SESSION['user'])){ //這是有登入者都能看到後台
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f5f5;
            font-family: Microsoft JhengHei;
        }
        h2{
            color:#1c275e;
        }
        header {
            height: 200px;
            overflow: hidden;
        }

        .img {
            filter: contrast(50%);
        }

        section {
            height: 625px;
            overflow: scroll;
        }

        section::-webkit-scrollbar {
            display: none;
        }

        .ad {
            background-color: #CCC;
        }

        .member {
            text-align: center;
            background-color: #0b1f5c;
            color: #abdeeb;
            font-size: 20px;
        }

        .a {
            color: #cab9fa;
            height: 40px;
        }

        .a:hover {
            background: #82b3e0;
            color: #2d02a3;
            text-decoration: none;
            font-weight: 900;

        }

        footer {
            position: fixed;
            bottom: 0px;
            width: 1110px;
        }
    </style>
</head>

<body>


    <!-- nav -->
    <nav class="bg-light shadow-sm py-2 px-2 text-right my-0 d-flex justify-content-between">
        <div class="my-0">
            <!-- &nbsp; -->
            <a href="../index.php">
                <img src="../img/logo1.png" alt="LOGO" width="55px" height="40px">
            </a>
        </div>
        <!-- <div> -->
        <!-- 放置功能 -->
        <!-- <a class="px-2" href="?do=show_vote_list">問卷管理</a>
        <a class="px-2" href="?do=member">會員管理</a>
        <a class="px-2" href="?do=ad">廣告管理</a> -->
        <!-- </div> -->
        <?php


        if (isset($_SESSION['user'])) {
            echo "<span class='pr-5 my-auto'>{$_SESSION['name']}您好，這裡是後臺編輯區</span>";
            // echo "<a href='../logout.php' class='btn-sm btn-warning my-auto'>登出</a>";
        }

        ?>
        <form class="form-inline " action="../index.php?do=search" method="post">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </nav>
    <!-- nav end -->

    <!-- header -->
    <header class="container bg-warning">
        <div class="row">
            <a href="index.php">
                <img class="img" src="../img/vote-header.jpg" alt="標題圖">
            </a>
        </div>
    </header>
    <!-- header end -->

    <!-- main 包含了 aside(sidebar) section -->
    <main class="d-flex row px-0 container mx-auto">


        <!-- sidebar -->
        <aside class="container col-3 member ">
            <div class="row-cols-1  d-flex flex-column">
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<span class='text-center mt-3 font-weight-bold'><ins>{$_SESSION['name']}</ins></span>";
                    echo "<span class='text-center  '>的工作列</span>";
                }
                ?>
                <!-- 放置功能 -->
                <a class="px-2 mt-3 a" href="../index.php">進入當期投票</a>
                <a class="px-2 mt-3 a" href="../index.php?do=close_vote_list">查看截止投票</a>
                <a class="px-2 mt-3 a" href="../index.php?do=add_subject_form">新增投票主題</a>
                <a class="px-2 mt-3 a" href="../index.php?do=member">會員資料管理</a>
                <?php
                if ($_SESSION['id'] == 1) {
                ?>
                    <a class="px-2 mt-3 a" href="?do=manage_vote">投票管理</a>
                    <a class="px-2 mt-3 a" href="?do=adImg">廣告管理</a>

                <?php
                }
                echo "<a href='../logout.php' class='btn-sm mt-5 btn-warning w-75 mx-auto'><i class='fas fa-sign-out-alt'>登出</i></a>";
                ?>
            </div>
        </aside>
        <!-- sidebar end -->


        <!-- section -->

        <section class="container col-7">

            <?php
            //判斷有沒有傳值，來決定顯現畫面
            $do = (isset($_GET['do'])) ? $_GET['do'] : 'manage_vote';
            $file = $do . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "manage_vote.php";
            }

            ?>
        </section>
        <!-- section end -->



        <!-- ad bar -->
        <div class="container col-2 ad ">
            <?php
            $images = all('ad', ['sh' => 1]);
            foreach ($images as $key => $image) {
                if ($key == 0) {
                    echo "<div class='rounded my-1'>";
                } else {
                    echo "<div class='rounded my-1'>";
                }
                echo "<img src='../img/{$image['name']}' alt='{$image['intro']}' class='d-block w-100'></div>";
            }
            ?>
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
    <script src="../js/edit_subject.js"></script>
</body>

</html>