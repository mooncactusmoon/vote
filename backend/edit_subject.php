<!-- 編輯題目 -->
<?php
$subject=find('topics',$_GET['id']);
$options=all('options',['topic_id'=>$_GET['id']]);

?>

<form action="../api/edit_subject.php" method='post' class='col-6 m-auto'>
    <label>問卷主題 : <input type="text" name="topic" value="<?=$subject['topic'];?>" ></label>
    <input type="hidden" name="topic_id" value="<?=$subject['id'];?>">

    <?php
    foreach($options as $key => $opt){

        echo "<label class='list-group-item'>";
        echo "選項 " . ($key+1) . " : ";
        echo "<input type='text' name='options[]' value='{$opt['opt']}'>";
        echo "<input type='hidden' name='opt_id[]' value='{$opt['id']}'>";
        echo "</label>";
    }

    //增加表格到四格
    if(count($options)<=4){
        for($i=0;$i<(4-count($options));$i++){
            echo "<label class='list-group-item'>";
            echo "選項 " . (count($options)+1+$i) . " : ";
            echo "<input type='text' name='options[]' value=''>";
            echo "<input type='hidden' name='opt_id[]' value=''>";
            echo "</label>";
        }
    }
    ?>
<input type="submit" value="送出">
</form>