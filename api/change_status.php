<!-- 決定廣告圖的出現 -->
<?php include_once "db.php";

$id=$_GET['id'];
$img=find('ad',$id);
$img['sh']=($img['sh']+1)%2;
update('ad',['sh'=>$img['sh']],['id'=>$img['id']]);

to("../backend/?do=adImg");
?>