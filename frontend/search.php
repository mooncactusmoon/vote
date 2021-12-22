<?php
//取得符合類似條件的資料
function find_like($table, $topic,$sh) {
    global $pdo;
    $sql = "SELECT * FROM `$table` WHERE ";
    if (is_array($topic)) {
        foreach ($topic as $key => $value) {
            $tmp = "`topic` LIKE '%{$value}%' && `sh` = '$sh'";
        }
        $sql = $sql . $tmp;
    }
    // echo $sql;
    $rows = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>

<h2 class="text-center mt-3 font-weight-bold text-secondary"><i class="fas fa-search"></i>搜尋"<?=$_POST['search']?>"的結果</h2>
<h4 class="text-center mt-4 font-weight-bold text-danger"><i class="fas fa-fire "></i>當期投票</h4>
<?php
$search1=find_like('topics',['topic'=>$_POST['search']],1); //已開啟的問卷
$search2=find_like('topics',['topic'=>$_POST['search']],0); //已關閉的問卷
//顯示開啟問卷
echo "<div class='container text-center' style='font-size:20px'>";
echo "<div class='row row-cols-1 row-cols-md-3'>";
foreach($search1 as $key => $value){
    echo "<div class='col mb-4 mt-3 '>";
    echo "<div class='card border-light text-info' style='width: 10rem;height:300px'>";
    echo "<img class='card-img-top' src='./img/vote.jpg' alt='Card image cap' >";
    if(isset($_SESSION['user'])){ //登入者可投票
        echo "<div style='height:60px' class='text-center my-auto'><a  href='index.php?do=vote&id={$value['id']}'>";
        echo $value['topic'];
        echo "</a></div>";
    }else{ 
        echo "<div style='height:60px' class='text-center my-auto'>".$value['topic']."</div>";
    }
    //總投票數顯示
    $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$value['id']}'");
    
    echo "<p class='card-text mb-0'>";
    echo "<span >";
    echo "<i class='fas fa-person-booth'></i> : ". $count[0]['total'] ;
    echo "</span></p>";
    
    //看結果按鈕
    echo "<a href='?do=s_vote_result&id={$value['id']}' class=' text-center p-0'>";
    echo "<button class='btn-info rounded mb-2'>觀看結果</button>";
    echo "</a>";

    echo "</div>";
    echo "</div>";
}
echo "</div>";
if(count($search1)==0){
    echo "查無相關問卷";
}
echo "</div>";
//顯示開啟問卷 END
?>
<h4 class="text-center mt-3 font-weight-bold text-danger"><i class="far fa-times-circle "></i>過期投票</h4>
<?php
//顯示關閉問卷
echo "<div class='container text-center' style='font-size:20px'>";
echo "<div class='row'>";
foreach($search2 as $key => $value){
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
    echo "<a href='?do=s_vote_result&id={$value['id']}' class=' text-center p-0'>";
    
    echo "<button class='btn-info rounded mb-2'>觀看結果</button>";
    echo "</a>";

    
    echo "</div>";
    echo "</div>";
}
echo "</div>";
if(count($search2)==0){
    echo "查無相關問卷";
}
//顯示關閉問卷 END
?>
<br><br>