<!-- 刪除已有選項 -->
<?php include_once "db.php";
$subject=find('options',$_GET['id']);
// echo "<pre>";
// print_r($subject);
// echo "</pre>";

$id=$subject['topic_id'];
//del要放最後面 順序不可錯誤
del('options',$_GET['id']);

$_SESSION['ok']="投票問卷已更新";
to("../backend/?do=edit_subject&&id=$id");


?>