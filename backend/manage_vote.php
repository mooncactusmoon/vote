<h2 class="text-center mt-3 font-weight-bold">投票管理 <i class="fas fa-tasks"></i>
    </h2>
<?php
$subjects=all('topics');
$s="SELECT count(*) FROM `topics`";
$num=$pdo->query($s)->fetchColumn();
$div=8; //設定每頁要幾個問卷
$pages=ceil($num/$div); //頁數
$now=$_GET['p']??1; //當前頁
$start=($now-1)*$div;
$sq="SELECT * FROM `topics` LIMIT $start,$div"; //由舊到新
$sq2="SELECT * FROM `topics` ORDER BY `id` DESC LIMIT $start,$div;";//新到舊
$subject=$pdo->query($sq)->fetchAll(PDO::FETCH_ASSOC);
$subject2=$pdo->query($sq2)->fetchAll(PDO::FETCH_ASSOC);
//控制問卷排序方式
if(isset($_GET['id'])){
    if($_GET['id']==1){
        $array=$subject;
        echo "<button class='btn btn-light my-3'><a href='?do=manage_vote'>改從新排到舊</a></button>";
        if(($now-1)>0){
            $p=$now-1;
            echo "<a href='?do=close_vote_list&id=1&p=$p'><i class='fas fa-angle-double-left mx-2'></i></a>";
        }

        for($i=1;$i<=$pages;$i++){
            if($i==$now){ //判斷頁碼是否當前頁面
                $fontsize="24px";
            }else{
                $fontsize="16px";
            }
            echo "<a href='?do=manage_vote&id=1&p=$i' style='font-size:$fontsize;' class='mx-1'>&nbsp;$i&nbsp;</a>";
         }
         
         if(($now+1)<=$pages){
            $p=$now+1;
            echo "<a href='?do=manage_vote&id=1&p=$p'><i class='fas fa-angle-double-right mx-1'></i></a>";
         }
    }

    }else{
        $array=$subject2;
    echo "<button class='btn btn-light my-3'><a href='?do=manage_vote&id=1'>改從舊排到新</a></button>";
    if(($now-1)>0){
        $p=$now-1;
        echo "<a href='?do=manage_vote&p=$p'><i class='fas fa-angle-double-left mx-2'></i></a>";
     }
     for($i=1;$i<=$pages;$i++){
        if($i==$now){ //判斷頁碼是否當前頁面
            $fontsize="24px";
        }else{
            $fontsize="16px";
        }
        echo "<a href='?do=manage_vote&p=$i' style='font-size:$fontsize;' class='mx-1'>&nbsp;$i&nbsp;</a>";
     }
     
     if(($now+1)<=$pages){
        $p=$now+1;
        echo "<a href='?do=manage_vote&p=$p'><i class='fas fa-angle-double-right mx-1'></i></a>";
     }
}
//控制問卷排序方式 end
$cou=count($array);
echo "<input type='hidden' id='cou' value='$cou'>";


echo "<ol class='list-group'>";
foreach ($array as $key => $value) {
    
    echo "<li class='list-group-item'>";
    echo "<span class='d-inline-block col-md-6 t'>".$value['topic']."</span>";


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
