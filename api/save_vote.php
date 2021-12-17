<?php 
include_once "db.php";


echo $_SESSION['id'];
$opt_id=$_POST['opt'];
$opt=find("options",$opt_id);
//$opt['count']++;
//$opt['count']+=1;
$opt['count']=$opt['count']+1;
$arr=[
    // 'id'=>'',
'user_id'=>"{$_SESSION['id']}",
'topic_id'=>"{$opt['topic_id']}",
'ans'=>"{$opt_id}"
];

update('options',['count'=>$opt['count']],['id'=>$opt_id]);

insert('polls',$arr);

to("../index.php?do=vote_result&id={$opt['topic_id']}");

?> 