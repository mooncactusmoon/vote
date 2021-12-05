<?php

$id=$_GET['id'];
$subject=find('topics',$id);

$options=all('options',['topic_id'=>$id]);

?>
<h2 class="text-center mt-3 font-weight-bold"><?=$subject['topic'];?></h2>
<ol class="list-group">
<form action="./api/save_vote.php" method="post">

    <?php
    foreach ($options as $key => $opt){
        if($opt['opt']!=""){

            echo "<label class='list-group-item  list-group-item-action'>";
            //多選的話 name='opt[]'  單選擇可以不用加[]
            echo "<input type='radio' name='opt' value='{$opt['id']}'>";
            echo $opt['opt'];    
            echo "</label>";    
        }
    }
    
    ?>

</ol>
<input type="submit" value="投票" class="btn btn-info m-3">
</form>