var errors;

// first NAME VALIDATIONS
	function fnameValidation()
{
    var fname = document.getElementById('fname').value;




     
    if(fname==''){
            document.getElementById('fnameError').innerHTML="* This field cannot be empty";
            document.getElementById('fnameError').style.color='black';
            return false;
    }
    if(!fname.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
        {
           
            document.getElementById('fnameError').innerHTML="* It can contain only letters";
            document.getElementById('fnameError').style.color='black';
            return false;
        }
    
    else
     {
            document.getElementById('fnameError').innerHTML="Valid";
            document.getElementById('fnameError').style.color='black';
            
     }
    
}



//last name validations
    function lnameValidation()
{
    var lname = document.getElementById('lname').value;




     
    if(lname==''){
            document.getElementById('lnameError').innerHTML="* This field cannot be empty";
            document.getElementById('lnameError').style.color='black';
            return false;
    }
    if(!lname.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
        {
           
            document.getElementById('lnameError').innerHTML="* It can contain only letters";
            document.getElementById('lnameError').style.color='black';
            return false;
        }
    
    else
     {
            document.getElementById('lnameError').innerHTML="Valid";
            document.getElementById('lnameError').style.color='black';
            
     }
    
}



//username validation
    function usernameValidation()
{
    var username = document.getElementById('username').value;


    if(!username.match((/^[a-zA-Z].*[\s\.]*$/g)))
        {
           
            document.getElementById('usernameError').innerHTML="* It can contain only letters";
            document.getElementById('usernameError').style.color='black';
            return false;
        }
    
    else
     {
            document.getElementById('usernameError').innerHTML="Valid";
            document.getElementById('usernameError').style.color='black';
            
     }
    
}

//FUNCTION VALIDATIONS

	function emailValidation()
{
    var email = document.getElementById('email').value;  

      
    if(email==''){
            document.getElementById('emailError').innerHTML="* Email Field cannot be empty";
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
                        if(response == "Yes" ){ 

                               document.getElementById('emailError').innerHTML="* Email already exists in our database";
                               document.getElementById('emailError').style.color='black';
                              errors=true;
                              $('#mainForm').attr('onsubmit', 'return false');
                        }else{
                               document.getElementById('emailError').innerHTML="Valid";
                               document.getElementById('emailError').style.color='black';
                               errors=false;

                               $('#mainForm').attr('onsubmit', 'return true');
                            
                        }

                    }

                });
              


        }

}

//PASSWORD VALIDATION
function passValidation()
{
     var pass = document.getElementById('password').value;
     
    if(pass=='')
        {
            document.getElementById('passError').innerHTML='* Password cannot be empty';
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


function locationValidation(){
    var location = document.getElementById('location').value;
     
    if(location=='')
        {
            document.getElementById('locationError').innerHTML='* Location cannot be empty';
            document.getElementById('locationError').style.color='black';
            return false; 
        }
        else
         {
            document.getElementById('locationError').innerHTML='Valid';
            document.getElementById('locationError').style.color='black';
         }

}


function phoneValidation(){
    var phone = document.getElementById('phone').value;
     
    if(phone=='')
        {
            document.getElementById('phoneError').innerHTML='* Phone cannot be empty';
            document.getElementById('phoneError').style.color='black';
            return false; 
        }
        else
            if(!phone.match(/^[0-9]+$/g)){
                document.getElementById('phoneError').innerHTML='* Phone can contain only numbers';
            document.getElementById('phoneError').style.color='black';

            }
        else
            if(phone.length<10) {
                 document.getElementById('phoneError').innerHTML='Your phone number needs to have 10 character';
                 document.getElementById('phoneError').style.color='black';
            }

        else
            document.getElementById('phoneError').innerHTML='Valid';
            document.getElementById('phoneError').style.color='black';



}




//FORM VALIDATION
 


function validateFormVet()
{
       
    if(nameValidation()==false || errors==false || passValidation()==false || locationValidation()==false || phoneValidation()==false)
        {   
            
           alert("Please check your information again");            
          return false;
        }
    else{
       
        return true;
    }
    
   
} 
