<!-- 問卷結果 -->
<?php
$sql="select * 
      from `topics`,
           `options` 
      where `topics`.`id`=`options`.`topic_id` AND 
            `topics`.`id`='{$_GET['id']}'";
$rows=q($sql);

?>
<h2 class="text-center mt-3 font-weight-bold"><?=$rows[0]['topic'];?></h2>
<ol class="list-group col-md-4 mt-3 mx-auto " style="font-size:1.5rem;">
<?php
     //顯示總投票人數
     $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$_GET['id']}'");
     echo "<div style='color:blue' class='text-center'>";
     echo "總投票人數 : ". $count[0]['total'] ;
     echo "</div>";

    // 包含空選項都顯示
    // foreach($rows as $row){
    //     echo "<li class='list-group-item'>";
    //     echo "<span>{$row['opt']}</span>";
    //     echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
    //     echo "</li>";
    // }
    foreach($rows as $row){
        if($row['opt']!=""){
            echo "<li class='list-group-item mt-2'>";
            echo "<span>{$row['opt']}</span>";
            echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
            echo "</li>";
        }
    }

   
?>

</ol>