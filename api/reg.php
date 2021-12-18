<?php include_once "db.php"; ?>
<?php

$sql1="SELECT * FROM users Where account = '{$_POST["account"]}'";
$sql2="SELECT * FROM users Where email = '{$_POST["email"]}'";
$result=$pdo->query($sql1)->fetch();
$result2=$pdo->query($sql2)->fetch();



if($result!=0 && $result2 ==0){

    echo "<script>";
    echo "alert('帳號已有人使用過，請使用其他帳號');";
    echo "history.back();";
    echo "</script>";
}else if($result == 0 && $result2 !=0){
    echo "<script>";
    echo "alert('信箱已被註冊，請使用其他信箱');";
    echo "history.back();";
    echo "</script>";
}else if($result !=0 && $result2 !=0){
    echo "<script>";
    echo "alert('【帳號】及【信箱】都有人使用過，請使用其他【帳號】及【信箱】');";
    echo "history.back();";
    echo "</script>";

}else{
    
    //由於frontend/reg.php的name都跟資料表有對到，故可以直接用$_POST來取值
    insert('users',$_POST);
    $_SESSION['success']="會員註冊成功，可以嘗試登入了";
    to("../index.php");
}
 

?>