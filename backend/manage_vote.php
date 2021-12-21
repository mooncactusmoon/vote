<h2 class="text-center mt-3 font-weight-bold">投票管理
    <a href="../index.php?do=add_subject_form">
        <button class="btn btn-info rounded ">新增投票</button>
    </a>
</h2>
<?php
$subjects=all('topics');
//控制問卷排序方式
if(isset($_GET['id'])){
    if($_GET['id']==1){
        $array=$subjects;
        echo "<button class='btn btn-light'><a href='?do=show_vote_list'>改從新排到舊</a></button>";
    }

    }else{
    $array=array_reverse($subjects);
    echo "<button class='btn btn-light'><a href='?do=show_vote_list&id=1'>改從舊排到新</a></button>";
}
//控制問卷排序方式 end
$cou=count($array);
echo "<input type='hidden' id='cou' value='$cou'>";


echo "<ol class='list-group'>";
foreach ($array as $key => $value) {
    
    echo "<li class='list-group-item'>";
    // ?代表當前頁面
    // 題目
    // echo "<a class='d-inline-block col-md-8' href='../index.php?do=vote&id={$value['id']}'>";
    echo "<span class='d-inline-block col-md-6 t'>".$value['topic']."</span>";
    // echo "</a>";


    // 投票開啟或關閉
    echo "<span class='d-inline-block col-md-2 '>";
    echo "<a href='../api/change_vote_status.php?id={$value['id']}'>";
    echo ($value['sh']==1)?"<button class='sh btn btn-success btn-sm'>開啟中</button>":"<button class='sh btn btn-sm btn-secondary'>關閉中</button>";
    echo "</a></span>";

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
<!-- 嘗試做投票標題隨狀態變色(未完成) -->
<!-- <script>
let cou=document.getElementById("cou");
let t=document.getElementsByClassName("t");
let sh=document.getElementsByClassName("sh");
    if(sh.innerHTML="開啟中"){
    t.style = "color:black";
    }else{
    t.style = "color:red";
    }
</script> -->