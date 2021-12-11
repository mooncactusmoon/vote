<!-- 前端廣告出現區 -->

<?php
$images=all('ad',['sh'=>1]);
foreach($images as $key => $image){
    if($key==0){
        echo "<div class='rounded my-1'>";
    }else{
        echo "<div class='rounded my-1'>";
    }
    echo "<img src='./img/{$image['name']}' alt='{$image['intro']}' class='d-block w-100'></div>";
}
?>       
 
