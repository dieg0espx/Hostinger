function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}

var save = false;
function toggleSwitch(){saveCredentials(save = !save);}

var localEmail = getCookie('email');
var localPassword = getCookie('password');


const slider = document.getElementById('slider');
if(!localEmail == "" && !localPassword == "") {
    document.getElementById('login-email').value = localEmail;
    document.getElementById('login-password').value = localPassword;
    slider.checked = true;
    save = true;
}

function saveCredentials(save){
    console.log(save);
    if(save == true) {
        var email = document.getElementById('login-email').value;
        var password = document.getElementById('login-password').value;
        document.cookie = "email=" + email;
        document.cookie = "password=" + password;
    } else {
        document.cookie = "email=" + "" ;
        document.cookie = "password=" + "";
    }
}   

var ss = document.getElementById('orderScreen');
ss.addEventListener('scroll', () => {
   var x = ss.pageYOffset;
   if(x == 0 ) {
       console.log("Is 0");
   } else {
       console.log("Not cero");
   }
})


// const splash = document.getElementById('splashScreen');  

// document.addEventListener('DOMContentLoaded', (e) => {
//     setTimeout(() => {
//         splash.style.display = "none";
//     }, 4000);
// })



