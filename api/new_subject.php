<!-- 新增問卷+題目api完成 -->
<?php
include_once "db.php";
/**
 * 資料表的欄位名稱=>資料內容
 */
$topic=['topic'=>$_POST['subject']];
insert('topics',$topic);

$sql="SELECT * FROM `topics` WHERE `topic`='{$_POST['subject']}'";
$t_id=$pdo->query($sql)->fetch();

$topic_id=$t_id['id'];

$options=$_POST['options'];


foreach($options as $key => $opt){
    $arr=['opt'=>$opt,'topic_id'=> $topic_id ];
    insert('options',$arr);
}

//新增完之後回首頁
to("../backend/index.php");
?>