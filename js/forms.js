function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, email, password, conf,Fname,Lname,State,Univ) {
// Validate if a state exists
var stateCheck=false;   
var stateList = new Array();
// LOTS of initializating for the array
stateList[0]="NA";
stateList[1]="AL";
stateList[2]="AK";
stateList[3]="AZ";
stateList[4]="AR";
stateList[5]="CA";
stateList[6]="CO";
stateList[7]="CT";
stateList[8]="DE";
stateList[9]="DC";
stateList[10]="FL";
stateList[11]="GA";
stateList[12]="HI";
stateList[13]="ID";
stateList[14]="IL";
stateList[15]="IN";
stateList[16]="IA";
stateList[17]="KS";
stateList[18]="KY";
stateList[19]="LA";
stateList[20]="ME";
stateList[21]="MD";
stateList[22]="MI";
stateList[23]="MN";
stateList[24]="MS";
stateList[25]="MO";
stateList[26]="MT";
stateList[27]="NE";
stateList[28]="NY";
stateList[29]="NV";
stateList[30]="NH";
stateList[31]="NJ";
stateList[32]="NM";
stateList[33]="NC";
stateList[34]="ND";
stateList[35]="OH";
stateList[36]="OK";
stateList[37]="OR";
stateList[38]="PA";
stateList[39]="RI";
stateList[40]="SC";
stateList[41]="SD";
stateList[42]="TN";
stateList[43]="UT";
stateList[44]="VT";
stateList[45]="VA";
stateList[46]="WA";
stateList[47]="WV";
stateList[48]="WI";
stateList[49]="WY";
stateList[50]="TX";
// loop for checking
for(var i = 0; i < stateList.length; i++) {
    if(stateList[i] == State.value) 
	{
    stateCheck=true;
	}
}
   // Check each field has a value
    if (uid.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == ''|| 
          Fname.value == ''|| 
          Lname.value == ''|| 
          stateCheck == false ||
          Univ.value == '') {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
 // debug data passing verification Returned info
//alert( uid.value+p.value+Fname.value+Lname.value+Univ.value+State.value)
    // Finally submit the form. 
    form.submit();
    return true;
}