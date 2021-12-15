刪除整個問卷
<?php
include_once "db.php";

$id=$_GET['id']; // 問卷主題id
del('topics',$id);

$sql="DELETE FROM `options` WHERE `topic_id` = $id";
$pdo->exec($sql);

to("../backend/index.php");
// echo "<script>window.location.href='../backend/index.php';</script>";
?>