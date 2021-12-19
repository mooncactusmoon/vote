<h2 class="text-center mt-3 font-weight-bold" id="title">投票題目表列</h2>


<?php
$subjects=all('topics',['sh'=>1]); //只顯示有開的問卷
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
        // echo "<li class='list-group-item'>";
    echo "<div class='col col-sm-4 col-12 mt-3 '>";
    echo "<div class='card border-light text-info' style='width: 10rem;height:300px'>";
    echo "<img class='card-img-top' src='./img/vote.jpg' alt='Card image cap' >";
    // echo "<div class='card-body'>";
    // echo "<h5 class='card-title'>";
    // ?代表當前頁面
    // 題目 (判斷登入的會員才能使用投票功能)
    if(isset($_SESSION['user'])){

        // echo "<a class='d-inline-block col-md-8 ' href='index.php?do=vote&id={$value['id']}'>";
        echo "<div style='height:60px' class='text-center my-auto'><a  href='index.php?do=vote&id={$value['id']}'>";
        echo $value['topic'];
        echo "</a></div>";
        // echo "</h5>";
    }else{
        // echo "<span class='d-inline-block col-md-8'>".$value['topic']."</span>";
        echo "<div style='height:60px' class='text-center my-auto'>".$value['topic']."</div>";
        // echo "</h5>";
    }
    //總投票數顯示
    $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$value['id']}'");
    
    echo "<p class='card-text mb-0'>";
    echo "<span >";
    // echo "<span class='d-inline-block col-md-2 '>";
    echo "<i class='fas fa-person-booth'></i> : ". $count[0]['total'] ;
    echo "</span></p>";
    
    //看結果按鈕
    echo "<a href='?do=vote_result&id={$value['id']}' class=' text-center p-0'>";
    // echo "<a href='?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2 text-center p-0'>";
    echo "<button class='btn-info rounded mb-2'>觀看結果</button>";
    echo "</a>";

    // echo "</li>";
    // echo "</div>";
    echo "</div>";
}
echo "</div>";
}
// echo "</ol>";
echo "</div>";
echo "<br><br><a href='#title' class='text-center'>TOP</a> ";
echo "</div>";

?>
