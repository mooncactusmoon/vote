<!-- 修改編輯個別廣告圖 -->
<?php include_once "../api/db.php"; ?>

<h2 class="text-center mt-3 font-weight-bold">修改廣告圖</h2>
<?php
$ad=find('ad',$_GET['id']);

?>
<div class="m-auto">
    <img src="../img/<?=$ad['name'];?>" style="width:250px;">
    
    <form action="../api/edit_ad.php" method="post" enctype="multipart/form-data">
        
        <div class="custom-file d-block mx-auto my-2" style="width:350px;">
            <label for="upload" class=" custom-file-label "><?=$ad['name'];?></label>
            <input type="file" name="name" id="upload" class=" custom-file-input " >
        </div>
        <div class="text-center input-group mx-auto my-2" style="width:350px;">
            <input type="text" name="intro" id="intro" class="form-control" value="<?=$ad['intro'];?>" required>
            <label for="intro" class="input-group-prpend input-group-text">說明</label>
        </div>
        <div class="text-center mt-3 m-auto">
            <input type="hidden" name="id" value="<?=$ad['id'];?>">
            <input type="submit" value="修改" class="btn btn-info">
        </div>    
        
    </form>

</div>