
<form action="../api/save_subject.php" method="POST" class="col-sm-6 m-auto">
    <label>問卷主題 : <input type="text" name="subject"></label>
    <label class="list-group-item">選項一 : <input type="text" name="options[]"></label>
    <label class="list-group-item">選項二 : <input type="text" name="options[]"></label>
    <label class="list-group-item">選項三 : <input type="text" name="options[]"></label>
    <label class="list-group-item">選項四 : <input type="text" name="options[]"></label>
    <input type="submit" value="送出">
    <!-- option[]-> server $options[]=value -->
</form>
