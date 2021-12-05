<!-- 會員管理 尚未完成-->
<?php
$sql="SELECT * FROM `users` 
        WHERE `account`='{$_SESSION['user']}'";

$user=$pdo->query($sql)->fetch();
?>
<h2 class="text-center mt-3 font-weight-bold">編輯會員資料</h2>
<div class="container" style="height:508px">
<form action="../api/edit_user.php?user=<?=$_SESSION['user'];?>" method="post" id="regForm" class="text-center">
    <table class="m-auto">
        <tr>
            <td>帳號 : </td>
            <td><?=$user['account'];?></td>
        </tr>
        <tr>
            <td>信箱 : </td>
            <td><input type="text" name="email" value="<?=$user['email'];?>" ></td>
        </tr>
        <tr>
            <td>姓名 : </td>
            <td><input type="text" name="name" value="<?=$user['name'];?>"></td>
        </tr>
        <tr>
            <td>性別 : </td>
            <td>
            <input type="radio" id="man" name="gender" value="man">
                            <label for="man">man&nbsp;</label>
                            <input type="radio" id="woman" name="gender" value="woman">
                            <label for="woman">woman&nbsp;</label>
                            <input type="radio" id="third_gender" name="gender" value="third_gender">
                            <label for="third_gender">Third gender</label>
            </td>
        </tr>
        <tr>
            <td>生日 : </td>
            <td><input type="date" name="birthday" value="<?=$user['birthday'];?>"></td>
        </tr>
    </table>
    <div><input type="submit" value="確認送出"></div>
</form>
</div>
<div class="container text-center mt-5">

    <a  href="index.php">回到問卷表列</a>
</div>