
<div class="header box box1 border rounded-pill mt-3 bg-info shadow">
    <h2 class="text-center text-light pt-2"><i class="far fa-address-book">&nbsp;&nbsp;註冊會員</i></h2>
</div>
<div class="container" style="height:508px">
<form action="./api/reg.php" method="post" name="myForm" class="text-center">
    <div class="form-group row mt-4">
        <div class="col-6">
            <div class="row">

                <label for="account" class="col-sm-4 col-form-label text-center "><i
                class="fas fa-file-signature">&nbsp;&nbsp;帳號</i></label>
                <div class=" col-sm-8">
                    <div class="row">
                        <input type="text" class="form-control border-info" id="account" name="account" placeholder="請輸入至少8個字元"  pattern="[a-zA-Z0-9]{8,}">
                    </div>
                    <div class="row">
                        <p id="acc_p" >&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="row">
            <label for="name" class="col-sm-4 col-form-label text-center">
            <i class="fas fa-user-tie">&nbsp;&nbsp;姓名</i></label>
        <div class=" col-sm-8 ">
            <div class="row">
                <input type="text" class="form-control border-info" id="name" name="name" placeholder="請輸入您的大名" >
            </div>
            <div class="row">
                <p id="n_p">&nbsp;</p>
            </div>
        </div>
            </div>
        </div>
    </div>
    
    <div class="form-group row ">
        <div class="col-6">
            <div class="row">

                <label for="password" class="col-sm-4 col-form-label text-center "><i
                class="fas fa-mobile-alt">&nbsp;&nbsp;密碼</i></label>
                <div class=" col-sm-8 ">
                    <div class="row">
                        <input type="password" class="form-control border-info" id="password" name="password"  placeholder="請輸入至少8個字元" pattern="[a-zA-Z0-9]{8,}" >
                    </div>
                    <div class="row">
                        <p id="pw_p">&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">

                <label for="password" class="col-sm-4 col-form-label text-center "><i
                        class="fas ">確認密碼</i></label>
                <div class=" col-sm-8 ">
                    <div class="row">
                        <input type="password" class="form-control border-info" id="re_password"  placeholder="請輸入至少8個字元" pattern="[a-zA-Z0-9]{8,}" >
                    </div>
                    <div class="row">
                    <p id="pw_rp">&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row ">
        <label for="email" class="col-sm-2 col-form-label text-center"><i class="fas fa-at ">&nbsp;&nbsp;信箱</i></label>
        <div class="col-sm-10">
            <div class="row">
                <input type="email" class="form-control text-center border-info" id="email" name="email" placeholder="name@example.com" >
            </div>
            <div class="row">
                <p id="e_p">&nbsp;</p>
            </div>
        </div>
    </div>
    <div class="form-group row ">
        <legend class="col-form-label col-sm-4 text-center"><i class="fas fa-mars-stroke">&nbsp;&nbsp;性別</i></legend>
            <div class="col-sm-8">
                <div class="form-check-inline mr-5">  
                    <input class="form-check-input " type="radio" name="gender" id="man" value="man" checked>
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
    <div class="form-group row ">
        <label for="birthday" class="col-sm-4 col-form-label text-center">
            <i class="fas fa-birthday-cake">&nbsp;&nbsp;生日</i></label>
        <div class="col-sm-8">
            <div class="row">

                <input type="date" class="date" id="birthday" name="birthday" >
            </div>
            <div class="row"><p id="date_p">&nbsp;</p></div>
        </div>
        <input type="hidden"  id="note" name="note" value="">
    </div>
    <div><input type="button" class="btn btn-info my-5" value="加入會員" onClick="check_date()"></div>
</form>
</div>
<!-- javascrpit -->
<script>
    let account=document.getElementById("account");
    let acc_p=document.getElementById("acc_p");
    let pw_p=document.getElementById("pw_p");
    let pw_rp=document.getElementById("pw_rp");
    let e_p=document.getElementById("e_p");
    let n_p=document.getElementById("n_p");
    let date_p=document.getElementById("date_p");

    function check_date(){
        var regExp = /^[A-Za-z0-9]*$/;
        if (regExp.test(account.value)){
        acc_p.innerHTML = "";
        }else{
        acc_p.innerHTML = "<span style='color:red;'>帳號請輸入英文或數字</span>";
        }
        if(document.myForm.account.value.length <8){
            acc_p.innerHTML = "<span style='color:red;'>帳號請輸入至少8個字元</span>";
            return false;
        }else{
            acc_p.innerHTML = "";
        }
        if(document.myForm.account.value.length >25){
            acc_p.innerHTML = "<span style='color:red;'>帳號長度不得超過24個字元</span>";
            return false;
        }else{
            acc_p.innerHTML = "";
        }
  
        if(document.myForm.name.value.length == 0){
            n_p.innerHTML = "<span style='color:red;'>【姓名】請記得填寫</span>";       
            return false;
        }else{
            n_p.innerHTML = "";
        }
        if(document.myForm.name.value.length > 13 ){
            n_p.innerHTML = "<span style='color:red;'>【姓名】最多可取12個字元</span>";       
            return false;
        }else{
            n_p.innerHTML = "";
        }

        if(document.myForm.password.value.length <8){
            pw_p.innerHTML = "<span style='color:red;'>密碼請輸入至少8個字元</span>";
            return false;
        }else{
            pw_p.innerHTML = "";
        }
        if(document.myForm.password.value.length > 25){
            pw_p.innerHTML = "<span style='color:red;'>密碼長度不得超過24個字元</span>";
            return false;
        }else{
            pw_p.innerHTML = "";
        }

        if(document.myForm.password.value !=document.myForm.re_password.value){
            pw_rp.innerHTML = "<span style='color:red;'>與【密碼】輸入值不同</span>";      
            return false;
        }else{
            pw_rp.innerHTML = "";
        }

        if(document.myForm.email.value.length == 0){
            e_p.innerHTML = "<span style='color:red;'>【信箱】請記得填寫</span>";
            return false;
        }else{
            e_p.innerHTML = "";
        }

        if(document.myForm.birthday.value.length == 0){
            date_p.innerHTML = "<span style='color:red;'>請輸入【生日】</span>";
            
          
            return false;
        }
        myForm.submit();
    }

</script>
<!-- javascrpit end -->