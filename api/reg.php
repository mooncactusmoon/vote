<?php include_once "db.php"; ?>
<?php
//由於frontend/reg.php的name都跟資料表有對到，故可以直接用$_POST來取值
insert('users',$_POST);

to("../index.php");

?>