<!-- 廣告管理 -->
<h2 class="text-center font-weight-bold">輪播圖片管理</h2>

<div class="row ">
    <div class="col-md-3">
        <form action="../api/upload_ad.php" method="post" enctype="multipart/form-data">
            
            <div class="custom-file d-block m-auto ">
                <label for="upload" class=" custom-file-label ">選擇檔案</label>
                <input type="file" name="name" id="upload" class=" custom-file-input " >
            </div>
            <div class="text-center input-group m-auto">
                <label for="intro" class="input-group-prpend input-group-text">說明</label>
                <input type="text" name="intro" id="intro" class="form-control">
            </div>
            <div class="text-center mt-3 m-auto">
                <input type="submit" value="上傳" class="btn btn-info">
            </div>    
            
        </form>
    </div>
    <div class="col-md-9">
        <h3 class="text-center">圖片列表</h3>
        <table class="table">
            <tr>
                <td>圖片</td>
                <td>說明</td>
                <td>狀態</td>
                <td>管理</td>
            </tr>

        <?php
        $rows=all('ad');
        foreach($rows as $row){
            echo "<tr>";
            echo "<td>";
            // 圖片縮小先寫死
            echo "<img src='../img/{$row['name']}' style='width:100px;height:75px;'>";
            echo "</td>";

            echo "<td>{$row['intro']}</td>";
            echo "<td>";

            echo "<a href='../api/change_status.php?id={$row['id']}'>";
            echo ($row['sh']==1)?"顯示中":"未上架";
            echo "</a></td>";

            echo "<td>";
            echo "<a class='btn btn-info' href='?do=edit_ad&id={$row['id']}'>修改</a>";
            echo "<button>重新上傳</button>";
            echo "<a class='btn btn-danger' href='../api/del_ad.php?id={$row['id']}'>刪除</a>";
            echo "</td>";

            echo "</tr>";
            
        }
        ?>
        </table>
    </div>
</div>