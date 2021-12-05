<?php include_once "db.php"; ?>
<?php
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}

if(rows('users',$_POST)>0){
    // 如果要顯示name要另外再連接資料庫
    $_SESSION['user']=$_POST['account'];

    to("../index.php");
}else{
    $_SESSION['error']="帳號或密碼錯誤";

    to("../index.php");
}

// session 先 to(header)要在後面
?>