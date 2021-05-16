'use strict';
console.log("main js loaded.");
class Auth {
    login(data){
        $.post('//api.mcncc.linwebs.tw/user/login',data)
            .done((datas)=>{
                localStorage.setItem('token', datas.token);
                localStorage.setItem('id', datas.id);
                console.log("Login done.");
            })
    }
}

var auths = new Auth();

$( "#login" ).submit(function( event ) {
    auths.login({account: $('#account').val(),password: $('#password').val()});
    event.preventDefault();
  });