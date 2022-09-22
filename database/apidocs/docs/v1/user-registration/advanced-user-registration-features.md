Advanced User Registration Features
===
---

Advanced user registration features are the advanced features that can be integrated with LoginRadius registration form.

##One Click Login Feature
Enabling this option on the LoginRadius site lets the end user enter his email address and click on the one click sign in button. A verification email gets sent to the user's email address and on click of link included in the verification email, the user is logged into the account. The user can also log in to the account if they forgot their password without using the password reset interface.


> One click login has to be enabled on your LoginRadius site in order to use this feature, Please reach out LoginRadius support team if you need more details about it.

###STEPS TO IMPLEMENT:
Step 1: Add the JavaScript framework reference to your web page – LoginRadius User Registration framework, If you have already referenced it please skip this ​step.

**JavaScript**
```
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js"></script>
```
Step 2: Add the One Click Login parameter in User Registration JS:

**JavaScript**
```
var raasOptions={};
    raasOptions.apiKey="Your LoginRadius API Key";
    raasOptions.oneClickSignin=true;
    raasOptions.oneClickSigninUrl="Site URL"; //URL Where the one click login event will be handled
```
One click login button text can be customized​ using the following parameter:
**JavaScript**
```
raasOptions.oneClickLoginButtonLabel="Click Me"; //One Click Login Button Label
```
Step 3: Handle One Click Login Event - The following logic can be added to the page where you want to handle the one click login event, More precisely, Add the following logic on configured raasOptions.oneClickSigninUrl.

**JavaScript**
```
if (vtype == "oneclicksignin") {
    LoginRadiusRaaS.init(raasoption, 'oneclicksignin', function(response) {
        if (response.access_token) {
            // Handle the access token to Login a user
        }
    }, function(response) {
        //error    
    });
}
```
##Password Strength Feature
Password strength is a measure of the effectiveness of a password in resisting guessing and brute-force attacks. In its usual form, it estimates how many trials an attacker who does not have direct access to the password would need, on average, to guess it correctly. The strength of a password is a function of length, complexity, and unpredictability.

###STEPS TO IMPLEMENT:
Step 1: Add the JavaScript framework reference to your web page – LoginRadius User Registration framework, If you have already referenced it please skip the ​step.

**JavaScript**
```
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js"></script>
```
Step 2: Configure the Password strength parameter to User Registration JS:

**JavaScript**
```
var raasOptions={};
    raasOptions.checkPasswordStrength = true; 
```
Step 3: Hook to customise​ the password strength:

 > The hook is not necessary to use Password strength feature, In cases where the hook is not configured the default colour​ and message scheme will be used.

**\#min_length** can be used to show your minimum length of the password in messages.

**JavaScript**
```
LoginRadiusRaaS.$hooks.setPasswordMeterConfiguration([{
    case: "Worst", // Case Can not be changed
    message: "#min_length length is required",//Your minimum password length message.
    color: "Red" // Above message color
}, {
    case: "Bad", // Case Can not be changed
    message: "Bad",
    color: "Red"
}, {
    case: "weak", // Case Can not be changed
    message: "weak",
    color: "yellow"
}, {
    case: "Good", // Case Can not be change
    message: "Good",
    color: "Green"
}, {
    case: "Strong", // Case Can not be changed
    message: "Strong",
    color: "Green"
}, {
    case: "Secure", // Case Can not be changed
    message: "Secure",
    color: "Blue"
}]);
```
In case of any missed case, the default configuration of password strength feature will be used for the missing case.
