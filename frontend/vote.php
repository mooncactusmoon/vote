<?php

$id=$_GET['id'];
$subject=find('topics',$id);

$options=all('options',['topic_id'=>$id]);

?>
<h1><?=$subject['topic'];?></h1>
<ol>
<form action="./api/save_vote.php" method="post">

    <?php
    foreach ($options as $key => $opt){
        echo "<li>";
        //多選的話 name='opt[]'  單選擇可以不用加[]
        echo "<input type='radio' name='opt' value='{$opt['id']}'>";
        echo $opt['opt'];    
        echo "</li>";    
    }
    
    ?>

</ol>
<input type="submit" value="投票">
</form>