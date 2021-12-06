
<div class="header box box1 border rounded-pill mt-3 bg-info shadow">
    <h2 class="text-center text-light pt-2"><i class="far fa-address-book">&nbsp;&nbsp;註冊會員</i></h2>
</div>
<div class="container" style="height:508px">
<form action="./api/reg.php" method="post" id="regForm" class="text-center">
    <div class="form-group row mt-4">
        <label for="account" class="col-sm-4 col-form-label text-center "><i
        class="fas fa-file-signature">&nbsp;&nbsp;帳號</i></label>
        <div class=" col-sm-8 ">
            <input type="text" class="form-control border-info" id="account" name="account">
        </div>
    </div>
    
    <div class="form-group row mt-4">
        <label for="password" class="col-sm-4 col-form-label text-center "><i
                class="fas fa-mobile-alt">&nbsp;&nbsp;密碼</i></label>
        <div class=" col-sm-8 ">
            <input type="text" class="form-control border-info" id="password" name="password">
        </div>
    </div>
    <div class="form-group row mt-4">
        <label for="email" class="col-sm-4 col-form-label text-center"><i class="fas fa-at ">&nbsp;&nbsp;信箱</i></label>
        <input type="email" class="form-control col-sm-8 text-center border-info" id="email" name="email" placeholder="name@example.com">
    </div>
    <div class="form-group row mt-4">
        <label for="name" class="col-sm-4 col-form-label text-center">
            <i class="fas fa-user-tie">&nbsp;&nbsp;姓名</i></label>
        <div class=" col-sm-8 ">
            <input type="text" class="form-control border-info" id="name" name="name">
        </div>
    </div>
    <div class="form-group row mt-4">
        <legend class="col-form-label col-sm-4 text-center"><i class="fas fa-mars-stroke">&nbsp;&nbsp;性別</i></legend>
            <div class="col-sm-8">
                <div class="form-check-inline mr-5">  
                    <input class="form-check-input " type="radio" name="gender" id="man" value="man">
                    <label class="form-check-label" for="man">男生</label>
                </div>
                <div class="form-check-inline mr-5">
                    <input class="form-check-input " type="radio" name="gender" id="Woman" value="woman">
                    <label class="form-check-label" for="Woman">女生</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input " type="radio" name="gender" id="Third gender" value="third_gender">
                    <label class="form-check-label" for="Third gender">第三性別</label>
                </div>
            </div>
    </div>
    <div class="form-group row mt-4">
        <label for="birthday" class="col-sm-4 col-form-label text-center">
            <i class="fas fa-birthday-cake">&nbsp;&nbsp;生日</i></label>
        <div class="col-sm-8">
            <input type="date" class="date" id="birthday" name="birthday" >
        </div>
    </div>
    <div><input type="submit" class="btn btn-info mt-5" value="確認送出"></div>
</form>

<div class="container text-center mt-5">
    <a  href="index.php">回到問卷表列</a>
</div>
</div>