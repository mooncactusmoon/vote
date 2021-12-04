<!-- 問卷結果 -->
<?php
$sql="select * 
      from `topics`,
           `options` 
      where `topics`.`id`=`options`.`topic_id` AND 
            `topics`.`id`='{$_GET['id']}'";
$rows=q($sql);

?>
<h1><?=$rows[0]['topic'];?></h1>
<ol class="list-group col-md-4" style="font-size:1.5rem;">
<?php
    // 包含空選項都顯示
    // foreach($rows as $row){
    //     echo "<li class='list-group-item'>";
    //     echo "<span>{$row['opt']}</span>";
    //     echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
    //     echo "</li>";
    // }
    foreach($rows as $row){
        if($row['opt']!=""){
            echo "<li class='list-group-item'>";
            echo "<span>{$row['opt']}</span>";
            echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
            echo "</li>";
        }
    }

    //顯示總投票人數
    $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$_GET['id']}'");
    echo "total : ". $count[0]['total'] ;
?>

</ol>