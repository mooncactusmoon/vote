<?php

$id=$_GET['id'];
$subject=find('topics',$id);

?>
<h1><?=$subject['topic'];?></h1>