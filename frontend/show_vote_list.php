<h2 class="text-center mt-3 font-weight-bold" id="title">當期投票主題 <i class="fas fa-vote-yea"></i></h2>


<?php
// $subjects=all('topics',['sh'=>1]); //只顯示有開的問卷
$s="SELECT count(*) FROM `topics` WHERE `sh` = '1'";
$num=$pdo->query($s)->fetchColumn(); //要顯示的總數
$div=6; //設定每頁要幾個問卷
$pages=ceil($num/$div); //頁數
$now=$_GET['p']??1; //當前頁
$start=($now-1)*$div;
$sq="SELECT * FROM `topics` WHERE `sh` = '1' LIMIT $start,$div"; //由舊到新
$sq2="SELECT * FROM `topics` WHERE `sh`= '1' ORDER BY `id` DESC LIMIT $start,$div;";//新到舊
$subject=$pdo->query($sq)->fetchAll(PDO::FETCH_ASSOC);
$subject2=$pdo->query($sq2)->fetchAll(PDO::FETCH_ASSOC);


//控制問卷排序方式
if(isset($_GET['id'])){
    if($_GET['id']==1){
        // $array=$subjects;
        $array=$subject;
        echo "<button class='btn btn-light'><a href='?do=show_vote_list'>改從新排到舊</a></button>";
        if(($now-1)>0){
            $p=$now-1;
            echo "<a href='?do=show_vote_list&id=1&p=$p'><i class='fas fa-angle-double-left mx-2'></i></a>";
         }
         
         for($i=1;$i<=$pages;$i++){
            if($i==$now){ //判斷頁碼是否當前頁面
                $fontsize="20px";
            }else{
                $fontsize="14px";
            }
            echo "<a href='?do=show_vote_list&id=1&p=$i' class='mx-1' style='font-size:$fontsize;'>&nbsp;$i&nbsp;</a>";
         }
         
         if(($now+1)<=$pages){
            $p=$now+1;
            echo "<a href='?do=show_vote_list&id=1&p=$p'><i class='fas fa-angle-double-right mx-1'></i></a>";
         }
    }

    }else{
    // $array=array_reverse($subjects);
    $array=$subject2;
    echo "<button class='btn btn-light'><a href='?do=show_vote_list&id=1'>改從舊排到新</a></button>";
    if(($now-1)>0){
        $p=$now-1;
        echo "<a href='?do=show_vote_list&p=$p'><i class='fas fa-angle-double-left mx-2'></i></a>";
     }
     for($i=1;$i<=$pages;$i++){
        if($i==$now){ //判斷頁碼是否當前頁面
            $fontsize="20px";
        }else{
            $fontsize="14px";
        }
        echo "<a href='?do=show_vote_list&p=$i' style='font-size:$fontsize;' class='mx-1'>&nbsp;$i&nbsp;</a>";
     }
     
     if(($now+1)<=$pages){
        $p=$now+1;
        echo "<a href='?do=show_vote_list&p=$p'><i class='fas fa-angle-double-right mx-1'></i></a>";
     }
}
//控制問卷排序方式 end

// echo "<ol class='list-group'>";
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

echo "</div><br>";
// echo "<br><br><a href='#title' class='text-center'>TOP</a> ";
echo "</div>";

?>
