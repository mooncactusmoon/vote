<!-- 完成 -->

<?php include_once "db.php";

$id=$_POST['id'];
$email=$_POST['email'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];

//更新的sql語法 
$sql_users="UPDATE `users` SET `email`='$email',`name`='$name',`gender`='$gender',`birthday`='$birthday' WHERE `id`='$id'";

//執行更新(不需要用fetch拿回來)
$pdo->exec($sql_users);

echo $sql_users;
$_SESSION['ok']="會員資料已更新";
to("../backend/index.php?do=member");

?>