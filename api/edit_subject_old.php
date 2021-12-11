<!-- 編輯題目 -->
<?php
include_once "db.php";
/**
 * 資料表的欄位名稱=>資料內容
 */
$topic=$_POST['topic'];
$topic_id=$_POST['topic_id'];

update('topics',['topic'=>$topic],['id'=>$topic_id]);


$options=$_POST['options'];
$opt_id=$_POST['opt_id'];
foreach($options as $key => $opt){
    //判斷選項是否有，若是沒有則刪除
    if($opt!==""){
        update('options',['opt'=>$opt],['id'=>$opt_id[$key]]);
    }else{
        del('options',$opt_id[$key]);
    }
    // if(array_key_exists($key,$opt_id)){
    //     update('options',['opt'=>$opt],['id'=>$opt_id[$key]]);
    // }else{
    //     insert('options',['opt'=>$opt,'topic_id'=>$topic_id]);
    // }
}

to("../backend/index.php");
?>