<?php include_once "db.php";?>
<!-- 讓題目增加選項框 -->
<?php

$id=$_GET['id'];
insert('options',['opt'=>"",'topic_id'=>$id]);

to("../backend/?do=edit_subject&id=$id");
?>