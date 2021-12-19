<!-- 開啟或關閉問卷 -->
<?php include_once "db.php";

$id=$_GET['id'];
$topic=find('topics',$id);
$topic['sh']=($topic['sh']+1)%2;
update('topics',['sh'=>$topic['sh']],['id'=>$topic['id']]);

to("../backend/index.php");
?>