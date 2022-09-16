function lettersNumbersCheck(name)
{
   var regEx = /^[0-9a-zA-Z]+$/;
   if(name.value.match(regEx))
     {
      return true;
     }
   else
     {
     return false;
     }
} 
function validateForm(){
    let validate = true;
    var rollNo = document.getElementById('rollNo').value;
    var name = document.forms['myform']["name"].value;
    var email = document.forms['myform']["email"].value;
    var sem = document.forms['myform']["sem"].value;
    var pno = document.forms['myform']["pno"].value;

    if(rollNo.length>12 && lettersNumbersCheck(rollNo)){
        document.getElementById('r').innerHTML = "Roll Number is too Long";
        validate = false;
    }
    if(name.length>=55 && lettersNumbersCheck(name)){
        document.getElementById('n').innerHTML = "Name is too Long";
        validate = false;
    }
    if(email.length>=255){
        document.getElementById('e').innerHTML = "Email is too Long";
        validate = false;
    }
    if(sem<1 || sem>8) {
        document.getElementById('s').innerHTML = "Insert value range (1 - 8)";
        validate = false;
    }
    if(pno.length != 10 && isNaN(pno)){
        document.getElementById('p').innerHTML = "Invalid Phone Number";
        validate = false;
    }
    return  validate;
}