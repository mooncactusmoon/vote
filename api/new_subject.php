<!-- 新增問卷+題目api完成 -->
<?php
include_once "db.php";
/**
 * 資料表的欄位名稱=>資料內容
 */

$topic=['topic'=>$_POST['subject']];


$sql="SELECT * FROM `topics` WHERE `topic`='{$_POST['subject']}'";
$result=$pdo->query($sql)->fetch();
if($result!=0){
    echo "<script>";
    echo "alert('投票主題已被使用過，請換主題');";
    echo "history.back();";
    echo "</script>";
}else{
    insert('topics',$topic);
    $t_id=$pdo->query($sql)->fetch();
    $topic_id=$t_id['id'];
    $options=$_POST['options'];

    foreach($options as $key => $opt){
        $arr=['opt'=>$opt,'topic_id'=> $topic_id ];
        insert('options',$arr);
    }
    //新增完之後回首頁
    to("../index.php");
}




//  判斷 問卷題目有無和資料庫重複 

?>