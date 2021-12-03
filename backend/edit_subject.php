<!-- 編輯題目 -->
<?php
$subject=find('topics',$_GET['id']);
$options=all('options',['topic_id'=>$_GET['id']]);

?>

<form action="../api/edit_subject.php" method='post' class='col-6 m-auto'>
    <label>問卷主題 : <input type="text" name="topic" value="<?=$subject['topic'];?>" ></label>
    <input type="hidden" name="topic_id" value="<?=$subject['id'];?>">
    <!-- button標籤預設是submit,所以如果不要跳轉畫面要給他type="button"//input:button -->
    <!-- 增加選項(使用後端的方式，注意!按鈕選下去就會轉畫面，尚未submit的編輯選項就會不見) -->
    <a href="../api/add_option.php?id=<?=$subject['id'];?>">
        <button class="bg-warning rounded" style="font-size:18px;" type="button">+</button>
    </a>

    <?php
    foreach($options as $key => $opt){

        echo "<label class='list-group-item'>";
        echo "選項 " . ($key+1) . " : ";
        echo "<input type='text' name='options[]' value='{$opt['opt']}'>";
        echo "<input type='hidden' name='opt_id[]' value='{$opt['id']}'>";
        echo "</label>";
    }

    //增加表格到四格
    // if(count($options)<=4){
    //     for($i=0;$i<(4-count($options));$i++){
    //         echo "<label class='list-group-item'>";
    //         echo "選項 " . (count($options)+1+$i) . " : ";
    //         echo "<input type='text' name='options[]' value=''>";
    //         echo "<input type='hidden' name='opt_id[]' value=''>";
    //         echo "</label>";
    //     }
    // }
    ?>
<input type="submit" value="送出">
</form>