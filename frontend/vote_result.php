<!-- 問卷結果 -->
<?php
$sql="select * 
      from `topics`,
           `options` 
      where `topics`.`id`=`options`.`topic_id` AND 
            `topics`.`id`='{$_GET['id']}'";
$rows=q($sql);

?>
<h2 class="text-center mt-3 font-weight-bold"><?=$rows[0]['topic'];?></h2>
<ol class="list-group col-md-4 mt-3 mx-auto " style="font-size:1.5rem;">
<?php
     //顯示總投票人數
     $count=q("select sum(`count`) as 'total' from `options` where `topic_id`='{$_GET['id']}'");
     echo "<div style='color:#405e78' class='text-center'>";
     echo "總投票人數 : ". $count[0]['total'] ;
     echo "</div>";

    foreach($rows as $row){
        $array[]=[$row['opt'], $row['count']];
    }
    // foreach($rows as $row){
    //     if($row['opt']!=""){
    //         echo "<li class='list-group-item mt-2'>";
    //         echo "<span>{$row['opt']}</span>";
    //         echo "<span class='badge badge-info float-right'>{$row['count']}</span>";
    //         echo "</li>";
    //     }
    // }

   
?>



</ol>
<div
id="myChart" class="mx-auto mt-3" style="width:200%; max-width:600px; height:400px;">
</div>

<div class="text-center mt-5">
    <a class=" btn btn-info" href="index.php">回首頁</a>
</div>

<script >


var array1 = <?php echo json_encode($array);?>;
array1.unshift(["yes","no"]);
//Number()
for(var i=1 ;i<array1.length ;i++){
    array1[i][1]=Number(array1[i][1]);
}


//document.getElementById('LOL').innerHTML=array1[0][0];

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable(array1);

var options = {
    tooltip: {
        textStyle: {color: '#123b66'}, showColorCode: true
    },
    legend: { //欄位說明
        position: 'left', //left,top,right,bottom,none(不顯示),in
        textStyle: {color: '#405e78', fontSize: 15}
    },
    chartArea:{ //內圖與外框間距調整
        left:'10%',
        top:25, 
        bottom:10,
        width:"80%",
        height:"70%"
    },
    fontSize:18, //圓餅圖文字大小
    is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}

</script>

