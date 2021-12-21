//增加選項的input
function add_opt(){
    //用clone的方式增加option的input
    let opt_t=document.getElementById('opt_t').cloneNode();
    let opt_h=document.getElementById('opt_h').cloneNode();
    document.getElementById('div').appendChild(opt_t);

    let but=document.createElement('button');
    but.style="font-size:5px";
    but.className="btn btn-danger btn-outline-light rounded ";
    but.innerHTML=" - ";
    but.type='button';
    but.name='lol'; 
    but.onclick = function(){
        div.removeChild(but.previousElementSibling);
        div.removeChild(but);
        
    }
    document.getElementById('div').appendChild(but);
}     

//前台增加問卷的 確認選項沒有重複
function check_opt(){
    let q=document.getElementById("q");
    let opt=document.getElementsByClassName("opt");
    console.log(opt.length); //取得選項數量
    let opt_l=opt.length;
    if(document.vote_form.q.value.length ==0){
        alert("投票主題不得為空白");
        return false;
    }
    for(let i = 0; i < (opt_l-1) ; i++){
        for(let j = 0 ; j < (opt_l - i - 1) ; j++){
            if(opt[(opt_l - 1 - i)].value == opt[j].value && opt[(opt_l - 1 - i)].value != ""){
                alert("有重複選項，請再次檢查");

                return false;
            }
        }
    }
    for(let k = 0; k <opt_l ;k++){
        if(opt[k].value.length == 0 ){
            alert("第" + (k+1) +"個投票選項是不是忘記輸入了 ？");
            return false;
        }
    }
    vote_form.submit();
}
//後台編輯投票問卷的  //確認選項不重複
function check_edit_opt(){
    let edit_q=document.getElementById("edit_q");
    let opt=document.getElementsByClassName("opt");
    console.log(opt.length); //取得選項數量
    let opt_l=opt.length;
    if(document.vote_form.edit_q.value.length ==0){
        alert("投票主題不得為空白唷");
        return false;
    }
    for(let i = 0; i < (opt_l-1) ; i++){
        for(let j = 0 ; j < (opt_l - i - 1) ; j++){
            if(opt[(opt_l - 1 - i)].value == opt[j].value && opt[(opt_l - 1 - i)].value != ""){
                alert("有重複選項，請再次檢查");

                return false;
            }
        }
    }
    vote_form.submit();
}