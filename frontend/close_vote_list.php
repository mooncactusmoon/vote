<h2 class="text-center mt-3 font-weight-bold" id="title">截止投票區</h2>

<!-- 呈現關閉的投票 -->

<?php
$subjects=all('topics',['sh'=>0]); //只顯示關閉的問卷
// echo "<ol class='list-group'>";

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
echo "<div class='container text-center' style='font-size:20px'>";
echo "<div class='row'>";

foreach ( $array as $key => $value) {
    if(rows('options',['topic_id'=>$value['id']]) > 0){
    
    echo "<div class='col col-sm-4 col-12 mt-3 '>";
    echo "<div class='card border-light text-info' style='width: 10rem;height:200px'>";
 
    // 題目 (因為是關閉的 所以只能看結果)
   
        
    echo "<div style='height:60px' class='text-center my-auto'>".$value['topic']."</div>";
        
    
    
    $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$value['id']}'");
    
    echo "<p class='card-text mb-0'>";
    echo "<span >";
    
    echo "<i class='fas fa-person-booth'></i> : ". $count[0]['total'] ;
    echo "</span></p>";
    
    //看結果按鈕
    echo "<a href='?do=vote_result&id={$value['id']}' class=' text-center p-0'>";
    
    echo "<button class='btn-info rounded mb-2'>觀看結果</button>";
    echo "</a>";

    
    echo "</div>";
}
echo "</div>";
}

echo "</div>";
echo "<br><br><a href='#title' class='text-center'>TOP</a> ";
echo "</div>";

?>
