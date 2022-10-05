function login() {
    const form = document.forms["account"];
    const user = form["user"].value;
    const pass1 = form["pass1"].value;
    const pass2 = form["pass2"].value;
    // now that we have intputs, validate 
    /*
    The username must be between 6 and 10 characters long, inclusive.
    The username must contain only letters and digits.
    The username cannot begin with a digit.
    The password and the repeat password must match.
    The password must be between 6 and 10 characters long, inclusive.
    The password must contain only letters and digits.
    The password must have at least one lower case letter, at 
        least one upper case letter, and at least one digit.
    */
    // VALIDATION:
    const uservalid = validateUser(user);
    console.log(uservalid);
    const passvalid = validatePass(pass1, pass2);
    console.log(passvalid)
    if (uservalid && passvalid) {
        goodin();
    } else { 
        badin();
    }

    //document.getElementById("mnthpay").innerHTML = mnthpay;
    
    return true;
}
function validateUser(user) {
    const userlenTF = 6 <= user.length && user.length <= 10;
    const userchars = validChars(user);
    const userfirst = isNaN(user[0]);
    return (userlenTF && userchars && userfirst);
}
function validatePass(pass1, pass2) {
    const passmatch = pass1 == pass2;
    const passlenTF = 6 <= pass1.length && pass2.length <= 10;
    const passchars = validChars(pass1);
    var passhaslower = false;
    var passhasupper = false;
    var passhasnum = false;
    for (i = 0; i < pass1.length; i++) {
        if (isNaN(pass1[i]) && pass1[i].toUpperCase() == pass1[i]) {passhasupper = true;}
        if (isNaN(pass1[i]) && pass1[i].toLowerCase() == pass1[i]) {passhaslower = true;}  
        if (!isNaN(pass1[i])) {passhasnum = true;}
    }
    return (passmatch && passlenTF && 
        passchars && passhaslower && passhasnum && passhasupper);
}
function validChars(strng) {
    var output = true;
    for (i = 0; i < strng.length; i++) {
        if (!(!isNaN(strng[i]) 
            || (strng[i].toUpperCase() != strng[i].toLowerCase()))) {
            output = false;
        }
    }
    return output;
}
function badin() {
    console.log("Invalid username or password");
    alert("Invalid username or password");
}
function goodin() {
    console.log("User validated");
    alert("User validated");
}