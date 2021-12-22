<aside class="container col-3 member ">
    <div class="row-cols-1 d-flex flex-column">
            <!-- 放置功能 -->
        <?php
        if (isset($_SESSION['user'])) {
            echo "<span class='text-center mt-3 font-weight-bold'><ins>{$_SESSION['name']}</ins></span>";
            echo "<span class='text-center  '>的工作列</span>";

        ?>
            <a class="px-2 mt-3 a" href="./index.php">進入可投票區</a>
            <a class="px-2 mt-3 a" href="./index.php?do=close_vote_list">查看截止投票</a>
            <a class="px-2 mt-3 a" href="./index.php?do=add_subject_form">新增投票主題</a>
            <a class="px-2 mt-3 a" href="./index.php?do=member">會員資料管理</a>
            <?php
            if ($_SESSION['id'] == 1) {
            ?>
                <a class="px-2 mt-3 a" href="./backend/index.php?do=show_vote_list">投票管理</a>
                <a class="px-2 mt-3 a" href="./backend/index.php?do=adImg">廣告管理</a>

            <?php
            }
            echo "<a href='logout.php' class='btn-sm mt-5 btn-warning w-75 mx-auto'>登出</a>";
            ?>
        <?php
        } else {
        ?>
            <div class="container mt-5">
                <form action="./api/check_login.php" method="post" class="text-center">
                    <div class="m-auto">
                        <p>會員登入</p>
                        <input class="mt-3 form-control" type="text" name="account" placeholder="請輸入帳號" required>
                        <input class="mt-3 form-control" type="password" name="password" placeholder="請輸入密碼" required>
                        <!-- <input class="mt-3 btn btn-info rounded" type="reset" value="重新輸入"> -->
                        <input class="mt-3 btn btn-info rounded" type="submit" value="登入">
                    </div>
                </form>
            </div>
            <a href="./index.php?do=reg" class="mt-5 btn-sm  btn-light rounded">註冊新會員</a>
    </div>
<?php
        }
?>

</div>
</aside>