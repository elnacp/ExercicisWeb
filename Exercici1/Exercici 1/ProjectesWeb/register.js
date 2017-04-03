$(document).ready(function(){


    $( "#registre" ).click(function() {


        name = $("#username").val();
        email = $("#email").val();
        birthday = $("#birthday").val();
        password = $("#password").val();
        confirmation = $("#password2").val();

        alertMessage = "";
        correct = true;


        if(validationName(name)){
            if(validationEmail(email)){
                if(validationBirthday(birthday)){
                    if( validationPassword(password)){
                       if(validationPassword2(password, confirmation)){
                            correct = true;
                       }else{
                           m = "ALERT: passwords do not match \n"
                           alertMessage = alertMessage.concat(m);
                           correct = false;
                       }
                    }else{
                        m = "ALERT: Incorrect password form\n" +
                            "    6 - 12 characters\n" +
                            "    Capital letters \n" +
                            "    Low letters \n";
                        alertMessage = alertMessage.concat(m);
                        correct = false;
                    }

                }else{
                    m = "ALERT: Incorrect date \n"
                    alertMessage = alertMessage.concat(m);
                    correct = false;
                }

            }else{
                m = "ALERT: Incorrect email\n"
                alertMessage = alertMessage.concat(m);
                correct = false;
            }

        }else{
            m = "ALERT: username incorrect \n"
            alertMessage = alertMessage.concat(m);
            correct = false;
        }

        console.log(correct);

        /*
        $("#username").val("");
        $("#email").val("");
        $("#birthday").val("");
        $("#password").val("");
        $("#password2").val("");*/
        if( !correct){

            event.preventDefault();
            console.log("hola");
        }

    });


});


function validationName( name){

    if(name.length > 20 || name == ""){
        return false;
    }
    return true;
}

function validationEmail(email){

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);

}

function validationBirthday(birthday){
    var pattern = /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;
    if (birthday == null || birthday == "" || !pattern.test(birthday)) {

        return false;
    }else{
        return true;
    }

}

function validationPassword(password) {
    ok = false; //MAYUSCULAS
    ok1 = false; //MINUSCULAS
    ok2 = false; //MINIMO NUMERO
    ok3 = false; //TAMAÑO DE 6 A 12

    if( password.length >= 6 && password.length <= 12){
        ok3 = true;
    }

    for(i=0;i<password.length;i++)
    {
        if('A' <= password[i] && password[i] <= 'Z') // check if you have an uppercase
            ok = true;
        if('a' <= password[i] && password[i] <= 'z') // check if you have a lowercase
            ok1 = true;
        if('0' <= password[i] && password[i] <= '9') // check if you have a numeric
            ok2  = true;
    }

    if( ok == true && ok1 == true && ok2 == true && ok3 == true){
        return true;
    }


    return false;
}

function validationPassword2(password, confirmation){
    return password==confirmation;
}

