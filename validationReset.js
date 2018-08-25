function passValidation()
{
     var pass = document.getElementById('password').value;
     
    if(pass=='')
        {
            document.getElementById('passError').innerHTML='* Password Cannot be empty';
            document.getElementById('passError').style.color='black';
            return false;
        }
    if(!pass.match(/[a-z]/g)){
        document.getElementById('passError').innerHTML='* LowerCase Character missing';
        document.getElementById('passError').style.color='black';
        return false;
    }
    if(!pass.match(/[A-Z]/g)){
        document.getElementById('passError').innerHTML='* UpperCase Character missing';
        document.getElementById('passError').style.color='black';
        return false;
    }
    if(!pass.match(/[0-9]/g)){
        document.getElementById('passError').innerHTML='* Numeric Character missing';
        document.getElementById('passError').style.color='black';
        return false;
    }
    

    else if(pass.length<8)
    {
        document.getElementById('passError').innerHTML='* Password must be 8 character long';
        document.getElementById('passError').style.color='black';
        return false;
    }
    else{
        document.getElementById('passError').innerHTML='Valid';
        document.getElementById('passError').style.color='black';
       
    }
    
}

function emailValidation()
{
    var email = document.getElementById('email').value;  

    if(email == ''){
        document.getElementById('emailError').innerHTML="* This field can't be empty";
            document.getElementById('emailError').style.color='black';
            return false;
    }
      else
    if(!email.match(/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.(com|org|in|gov|info|yahoo|live|)$/))
        {
            document.getElementById('emailError').innerHTML="* Invalid Email! Your email needs to be like someone@email.com ";
            document.getElementById('emailError').style.color='black';
            return false;
        }else{  
                $.ajax({
                
                    url: "checkdata.php",
                    method: "POST",
                    data: {email: email},
                    success: function (response) {
                        response = response.trim();
                        if(response == "No" ){ 

                               document.getElementById('emailError').innerHTML="* This email doesn't have an account";
                               document.getElementById('emailError').style.color='black';
                              errors=true;
                              $('#mainForm').attr('onsubmit', 'return false'); 
                        } else{
                            document.getElementById('emailError').innerHTML="";
                              errors=true;
                              $('#mainForm').attr('onsubmit', 'return true');
                        }

                    }

                });
              


        }



}
