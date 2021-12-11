<!-- 修改廣告圖 -->
<?php include_once "db.php";
$ad=find("ad",$_POST['id']);

if(!empty($_FILES['name']['tmp_name'])){
    $intro=$_POST['intro'];
    $filename=$_FILES['name']['name'];

    move_uploaded_file($_FILES['name']['tmp_name'],'../img/'.$filename);

}
$intro=$_POST['intro'];

if(isset($filename)){
    update('ad',['name'=>$filename,'intro'=>$intro],['id'=>$_POST['id']]);
}else{
    update('ad',['intro'=>$intro],['id'=>$_POST['id']]);

}

to("../backend/?do=adImg");
?>