<h1>列出所有的問題</h1>
<?php
$subjects=all('topics');
echo "<ol class='list-group'>";
foreach ($subjects as $key => $value) {
    if(rows('options',['topic_id'=>$value['id']]) > 0){
    echo "<li class='list-group-item'>";
    // ?代表當前頁面
    // 題目
    echo "<a class='d-inline-block col-md-8' href='index.php?do=vote&id={$value['id']}'>";
    echo $value['topic'];
    echo "</a>";
    //總投票數顯示
    $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$value['id']}'");
    
    echo "<span class='d-inline-block col-md-2 '>";
    echo "total : ". $count[0]['total'] ;
    echo "</span>";
    
    //看結果按鈕
    echo "<a href='?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
    echo "<button class='btn-info'>觀看結果</button>";
    echo "</a>";

    echo "</li>";
}
}
echo "</ol>";

?>
