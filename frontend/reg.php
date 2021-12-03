<!-- 需要修改讓有登入錯誤訊息在這裡不顯示 -->
<h2 class="text-center">註冊</h2>
<form action="./api/reg.php" method="post" id="regForm" class="text-center">
    <table class="m-auto">
        <tr>
            <td>帳號 : </td>
            <td><input type="text" name="account" ></td>
        </tr>
        <tr>
            <td>密碼 : </td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>信箱 : </td>
            <td><input type="text" name="email" ></td>
        </tr>
        <tr>
            <td>姓名 : </td>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <td>性別 : </td>
            <td><input type="text" name="gender" ></td>
        </tr>
        <tr>
            <td>生日 : </td>
            <td><input type="date" name="birthday"></td>
        </tr>
    </table>
    <div><input type="submit" value="確認送出"></div>
</form>