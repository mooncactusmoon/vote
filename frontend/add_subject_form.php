<!-- 新增問卷 完成 -->
<h2 class="text-center my-3 font-weight-bold">增加投票問卷</h2>
<form action="./api/new_subject.php" method='post' class='col-6 m-auto'>
    <input style="width:300px;height:50px;font-size:20px;" type="text" name="subject" placeholder="請輸入投票主題" required>
    <button class="btn btn-outline-primary rounded mt-4" style="font-size:10px;" type="button" onclick="add_opt();">+</button>
    <div id="div" class="container">

        <input id="opt_t" class="mt-2 mr-1" type='text' name='options[]' value="" placeholder="請輸入投票選項" required>
        <input id="opt_h" type='hidden' name='opt_id[]' value="">
        
    </div>
<div class="mt-3 text-center"><input type="submit" class="btn btn-info" value="送出"></div>
</form>
<!-- option[]-> server $options[]=value -->