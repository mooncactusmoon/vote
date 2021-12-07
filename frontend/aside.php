<aside class="container col-3 member ">
        <div class="row-cols-1 d-flex flex-column">
    <?php
    if(isset($_SESSION['user'])){
        echo "<span class='pr-5 mt-3'>{$_SESSION['name']}的工作列 : )</span>";
        
        ?>
            <!-- 放置功能 -->
            <a class="px-2 mt-3 a" href="./backend/index.php?do=show_vote_list">投票管理</a>
            <a class="px-2 mt-3 a" href="./backend/index.php?do=member">會員管理</a>
            <?php
            if($_SESSION['id']==1){    
            ?>
            <a class="px-2 mt-3 a" href="./backend/index.php?do=ad">廣告管理</a>
            
            <?php
            }
            // echo "<a href='logout.php' class='btn-sm mt-5 btn-warning'>登出</a>";
            ?>

        <?php
    }else{
        ?>
        <div class="container mt-5">
            <form action="./api/check_login.php" method="post" class="text-center">
            <div class="m-auto">
                <p>會員登入</p>
                <input class="mt-3 form-control" type="text" name="account" placeholder="請輸入帳號" >
                <input class="mt-3 form-control" type="password" name="password" placeholder="請輸入密碼">
                <input class="mt-3 btn btn-info rounded" type="reset" value="重新輸入">
                <input class="mt-3 btn btn-info rounded" type="submit" value="登入">
            </div>
            </form>
        </div>
        <a href="../index.php?do=reg" class="mt-5 btn-sm  btn-light rounded">註冊新會員</a>
        </div>
        <?php
        }
        ?>
        </div>
    </aside>