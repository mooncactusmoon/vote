//增加選項的input
function add_opt(){
    //用clone的方式增加option的input
    let opt_t=document.getElementById('opt_t').cloneNode();
    let opt_h=document.getElementById('opt_h').cloneNode();
    document.getElementById('div').appendChild(opt_t);
    //刪除多餘的input ?
    //限制input個數 ?

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
