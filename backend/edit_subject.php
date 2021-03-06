<!-- 編輯題目 -->
<?php

$subject=find('topics',$_GET['id']);
$options=all('options',['topic_id'=>$_GET['id']]);

?>
<div class="container">
    <div class="row">
        <div class="col-8">

            <h2 class="text-right mt-3 font-weight-bold">編輯投票問卷 <i class="fas fa-tools"></i></h2>
        </div>
        <div class="col-4">
            <button class="btn btn-outline-danger btn-sm mt-3" id="d" >刪除此投票</button>
        </div>
    </div>
</div>
    <?php
       if(isset($_SESSION['ok'])){
        echo "<span style='color:#de1616;'><b>".$_SESSION['ok']."</b></span>";
        unset($_SESSION['ok']);
    }
   ?>

<form name="vote_form" action="../api/edit_subject.php" method='post' class='col-6 mt-3 mx-auto'>
    <label>投票主題 : <input type="text" name="topic" id="edit_q" maxlength="13" value="<?=$subject['topic'];?>" ></label>
    <input type="hidden" name="topic_id" id="topic_id" value="<?=$subject['id'];?>">
    <!-- button標籤預設是submit,所以如果不要跳轉畫面要給他type="button"//input:button -->
    <!-- 增加選項(使用後端的方式，注意!按鈕選下去就會轉畫面，尚未submit的編輯選項就會不見) -->

    <?php
    foreach($options as $key => $opt){
        //a href='../api/del_opt.php?id={$opt['id']}'
        echo "<label class='list-group-item'>";
        echo "選項 " . ($key+1) . " : ";
        echo "<button name='delete' type='button' class='btn btn-danger' >刪除</button>";
        echo "<input type='text' name='options[]' class='opt' value='{$opt['opt']}'>";
        echo "<input type='hidden' name='opt_id[]' value='{$opt['id']}'>";
        echo "</label>";
    }

    //增加表格到四格
    // if(count($options)<=4){
    //     for($i=0;$i<(4-count($options));$i++){
    //         echo "<label class='list-group-item'>";
    //         echo "選項 " . (count($options)+1+$i) . " : ";
    //         echo "<input type='text' name='options[]' value=''>";
    //         echo "<input type='hidden' name='opt_id[]' value=''>";
    //         echo "</label>";
    //     }
    // }
    ?>

<!-- 嘗試用JS動態新增選項欄位 -->
<button class="btn btn-outline-primary rounded mt-4" style="font-size:10px;" type="button" onclick="add_opt();">+</button>
    <div id="div" class="container">

        <input id="opt_t" type='text' class="mt-2 mr-1 opt" name='options[]' value="" placeholder="請輸入投票選項">
        <input id="opt_h" type='hidden' name='opt_id[]' value="">
    </div>
    <!-- 連接資料庫? 防止一樣的選項? -->
    
<!-- 嘗試用JS動態新增選項欄位 end -->

<!-- <input type="submit" value="送出" class="btn btn-primary mt-3 "> -->
<input type="button" class="btn btn-info my-5" value="送出" onClick="check_edit_opt()">
</form>



<script>
    //刪除選項
var elements = document.getElementsByName("delete");  
    for(var i=0 ; i<elements.length ; i++){
        elements[i].addEventListener('click', function(e){
            let middle = this.nextElementSibling;
            let last = middle.nextElementSibling;
            let msg = "您真的確定要刪除 (" + middle.value + ") 嗎" + "\n\n請確認！";
            if (confirm(msg)==true){
                window.location = '../api/del_opt.php?id=' + last.value ;
               
            }else{
                return false;
            }

        }, false);
    }
    //刪除選項 end

    //刪除整個問卷
const d=document.getElementById("d");
const topic_id=document.getElementById("topic_id");

d.addEventListener('click', function(e){
    let m = "您真的要刪除此問卷嗎?";
    if(confirm(m)==true){
        window.location = "../api/del_subject.php?id=" + topic_id.value;
    }else{
        return false;
    }
},false);
   //刪除整個問卷 end
</script>

