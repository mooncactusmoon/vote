<?php include_once "db.php";
//刪除，除了資料庫的資料以外也要刪除圖片檔案
$image=find('ad',$_GET['id']);
unlink("../img/".$image['name']);

//del要放最後面 順序不可錯誤
del('ad',$_GET['id']);
to('../backend/?do=ad');


?>