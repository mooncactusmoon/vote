<!-- 用於儲存題目 -->
<?php
include_once "db.php";
/**
 * 資料表的欄位名稱=>資料內容
 */
$topic=['topic'=>$_POST['subject']];
insert('topics',$topic);

//新增完之後回首頁
to("../backend/");
?>