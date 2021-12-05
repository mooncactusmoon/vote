<h2 class="text-center mt-3 font-weight-bold">投票管理
    <a href="?do=add_subject_form">
        <button class="btn btn-info rounded ">新增問卷</button>
    </a>
</h2>
<?php
$subjects=all('topics');
echo "<ol class='list-group'>";
foreach ($subjects as $key => $value) {
    
    echo "<li class='list-group-item'>";
    // ?代表當前頁面
    // 題目
    echo "<a class='d-inline-block col-md-8' href='../index.php?do=vote&id={$value['id']}'>";
    echo $value['topic'];
    echo "</a>";


    //總投票數顯示
    // $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$value['id']}'");
    
    // echo "<span class='d-inline-block col-md-2 '>";
    // echo "total : ". $count[0]['total'] ;
    // echo "</span>";

    //管理題目
    echo "<a href='?do=edit_subject&id={$value['id']}' class='d-inline-block col-md-2 text-center '>";
    echo "<button class='btn-dark rounded'>管理</button>";
    echo "</a>";


    
    //看結果按鈕
    echo "<a href='../index.php?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2  p-0 text-center'>";
    echo "<button class='btn-info rounded'>觀看結果</button>";
    echo "</a>";

    echo "</li>";
}

echo "</ol>";

?>
