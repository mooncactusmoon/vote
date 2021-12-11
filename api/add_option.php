<?php include_once "db.php";?>
<!-- 讓題目增加選項框 -->
<?php


foreach($options as $key => $opt){
    $arr=['opt'=>$opt,'topic_id'=> $id ];
    insert('options',$arr);
}


// to("../backend/?do=edit_subject&id=$id");
?>