<h2 class="text-center">登入頁</h2>
<form action="./api/check_login.php" method="post" class="text-center">
    <table id="loginForm" class="m-auto">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="account" ></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="password" ></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="登入">
                <input type="reset" value="重製">
            </td>   
        </tr>
    </table>
</form>