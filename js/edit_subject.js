//增加選項的input
function add_opt(){
    //用clone的方式增加option的input
    let opt_h=document.getElementById('opt_h').cloneNode();
    let opt_t=document.getElementById('opt_t').cloneNode();
    document.getElementById('div').appendChild(opt_t);
    //刪除多餘的input ?
    //限制input個數 ?

}
            
