let password = document.getElementById('current-password');
let eyeicon = document.getElementById('eye-icon');




eyeicon.onclick = function(){
    
    if(password.type == "password"){
       password.type = "text";
      eyeicon.src = "visual.png";

    }
    else
    {
        password.type = 'password';
        eyeicon.src = "hide.png";
    }


}
