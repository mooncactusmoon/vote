<h2 class="text-center mt-3 font-weight-bold" id="title">截止投票區 <i class="fas fa-ban"></i></h2>

<!-- 呈現關閉的投票 -->

<?php
// $subjects=all('topics',['sh'=>0]); //只顯示關閉的問卷
$s="SELECT count(*) FROM `topics` WHERE `sh` = '0'";
$num=$pdo->query($s)->fetchColumn(); //要顯示的總數
if($num==0){
    echo "<div class='text-center font-weight-bold m-5'>";
    echo "尚無截止投票";
    echo "</div>";
}else{
    $div=6; //設定每頁要幾個問卷
    $pages=ceil($num/$div); //頁數
    $now=$_GET['p']??1; //當前頁
    $start=($now-1)*$div;
    $sq="SELECT * FROM `topics` WHERE `sh` = '0' LIMIT $start,$div"; //由舊到新
    $sq2="SELECT * FROM `topics` WHERE `sh`= '0' ORDER BY `id` DESC LIMIT $start,$div;";//新到舊
    $subject=$pdo->query($sq)->fetchAll(PDO::FETCH_ASSOC);
    $subject2=$pdo->query($sq2)->fetchAll(PDO::FETCH_ASSOC);

//控制問卷排序方式
if(isset($_GET['id'])){
    if($_GET['id']==1){
        // $array=$subjects;
        $array=$subject;
        echo "<button class='btn btn-light'><a href='?do=close_vote_list'>改從新排到舊</a></button>";
        if(($now-1)>0){
            $p=$now-1;
            echo "<a href='?do=close_vote_list&id=1&p=$p'><i class='fas fa-angle-double-left'></i></a>";
         }
         
         for($i=1;$i<=$pages;$i++){
            if($i==$now){ //判斷頁碼是否當前頁面
                $fontsize="24px";
            }else{
                $fontsize="16px";
            }
            echo "<a href='?do=close_vote_list&id=1&p=$i'>&nbsp;$i&nbsp;</a>";
         }
         
         if(($now+1)<=$pages){
            $p=$now+1;
            echo "<a href='?do=close_vote_list&id=1&p=$p'><i class='fas fa-angle-double-right'></i></a>";
         }
    }

    }else{
    // $array=array_reverse($subjects);
    $array=$subject2;
    echo "<button class='btn btn-light'><a href='?do=close_vote_list&id=1'>改從舊排到新</a></button>";
    if(($now-1)>0){
        $p=$now-1;
        echo "<a href='?do=close_vote_list&p=$p'><i class='fas fa-angle-double-left'></i></a>";
     }
     for($i=1;$i<=$pages;$i++){
        if($i==$now){ //判斷頁碼是否當前頁面
            $fontsize="24px";
        }else{
            $fontsize="16px";
        }
        echo "<a href='?do=close_vote_list&p=$i'>&nbsp;$i&nbsp;</a>";
     }
     
     if(($now+1)<=$pages){
        $p=$now+1;
        echo "<a href='?do=close_vote_list&p=$p'><i class='fas fa-angle-double-right'></i></a>";
     }
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
}
echo "</div>";
// echo "<br><br><a href='#title' class='text-center'>TOP</a> ";
echo "</div>";

?>
