<!-- 刪除已有選項 -->
<?php include_once "db.php";


//del要放最後面 順序不可錯誤
del('options',$_GET['id']);
to('../backend/?do=edit_subject');


?>