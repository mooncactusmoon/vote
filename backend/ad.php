<!-- 廣告管理 -->
<form action="../api/upload_ad.php" method="post" enctype="multipart/form-data">

<div class="custom-file w-25 d-block m-auto ">
    <label for="upload" class=" custom-file-label ">選擇檔案</label>
    <input type="file" name="name" id="upload" class=" custom-file-input " >
</div>
<div class="text-center input-group w-25 m-auto">
    <label for="intro" class="input-group-prpend input-group-text">說明</label>
    <input type="text" name="intro" id="intro" class="form-control">
</div>
<div class="text-center mt-3 w-25 m-auto">
    <input type="submit" value="上傳" class="btn btn-info">
</div>    

</form>