<?php include_once "db.php"; ?>
<?php
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}

if(rows('users',$_POST)>0){
    $_SESSION['user']=$_POST['account'];  //顯示帳號
    // 顯示name要另外再連接資料庫
   $sql="SELECT * FROM `users` WHERE `account`='{$_POST['account']}'";
    $user=$pdo->query($sql)->fetch();
    
    echo $user['name'];
    echo $user['id'];
    $_SESSION['name']=$user['name']; //顯示姓名
    $_SESSION['id']=$user['id']; //顯示唯一ID
    to("../index.php");
}else{
    $_SESSION['error']="帳號或密碼錯誤";

    to("../index.php");
}

// session 先 to(header)要在後面
?>