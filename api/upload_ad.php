<?php include_once "db.php";

if(!empty($_FILES['name']['tmp_name'])){
    $intro=$_POST['intro'];
    $filename=$_FILES['name']['name'];

    move_uploaded_file($_FILES['name']['tmp_name'],'../img/'.$filename);

    insert('ad',['name'=>$filename,'sh'=>0,'intro'=>$intro]);
}
to("../backend/?do=ad");
?>