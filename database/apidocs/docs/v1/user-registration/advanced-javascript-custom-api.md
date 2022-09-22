# Advanced JavaScript Custom API

---

This document describes the process for utilizing the LoginRadius registration APIs to perform actions such as Login, Forgot Password and User Registration with the custom designed form.
The Following JavaScript functions call LoginRadius' various API to support the custom designed registration​ forms.

###Initialization
You will first need to initialize the APIs with your LoginRadius API key.

```
var options= {};
options.apikey = "<LoginRadius API Key>";
LoginRadiusRaaS.api.init(options);
```

###Login
To implement login, call **LoginRadiusRaaS.api.login** function with user's email address and password.

```

LoginRadiusRaaS.api.login({
            emailid: "Kunal@xxx.com",
            password: "123xxx789"
        }, function(response) {
        // On Success this callback will call
        // response will be { access_token :"<token>", expires_in :"<date and time>" }
        // you can use token response.access_token and get user profile using your
        // LoginRadius SDK.
            alert(JSON.stringify(response));
        }, function(errors) {
        // on failure this function will call ‘errors’ which is an array of errors with message.
        // every kind of error will be returned in this method
        // you can run a loop on this array to identify the description and other aspect of error.
            alert(JSON.stringify(errors));
        }
```

> On Success

> The above function success will return a response as ’{ access_token :’<token>’,expires_in : ‘<date and time>’}’. You can use this response to get the user profile data using LoginRadius SDK.

###Periodic Password Reset
To implement reset password, call **LoginRadiusRaaS.api.periodicPasswordReset** with token and new password of the user.
This method resets user's password periodically.

```
LoginRadiusRaaS.api.periodicPasswordReset({
    newpassword: "123xxx789",
    token: "access_token"
}, userprofile, accessToken, function(response) {
    //success
    alert(JSON.stringify(response));
}, function(errors) {
    //failure
    alert(JSON.stringify(errors));
});
alert(JSON.stringify(response));
});
```

> On Success

> The above function success will return a JSON array ’{ isPosted : true }’ as the response.

###Forgot password

To implement forgot password, call **LoginRadiusRaaS.api.forgotPassword** with user's email address.

```
LoginRadiusRaaS.api.forgotPassword({
    emailid: "xxx@xxx.com"
}, function(response) {
    alert(JSON.stringify(response));
}, function(errors) {
    alert(JSON.stringify(errors));
});
```

> On Success

> The above function success callback will return a JSON array ’{ isPosted : true }’ as the response.

###Reset Password
To implement reset password, call **LoginRadiusRaaS.api.resetPassword** with the new, confirm password and verification token(vtoken).
Here vtoken is the verification token which is the part of the reset password email.

```
LoginRadiusRaaS.api.resetPassword({
     vtoken: "5f0fc908xxxxxxxxxx800d2468a93d73",
     confirmpassword: "123xxx789",
     newpassword: "123xxx789"
 }, function(response) {
     alert(JSON.stringify(response));
 }, function(errors) {
     alert(JSON.stringify(errors));
 });
```

> On Success

> The above functions success callback will return a JSON​ array ’{ isPosted : true }’ as the response.

###User Registration
To implement the Registration form, call** LoginRadiusRaaS.api.registration** with all user registration fields and their values. These fields can be extended and configured from LoginRadius Admin-console.

```
LoginRadiusRaaS.api.registration({
        name: "Kxxxl"
        password: "99xxx999",
        confirmpassword: "99xxx999",
        emailid: "Kunal@xxx.com",
        g-recaptcha-response: "scsasasfff"
    },
    function(response) {
        alert(JSON.stringify(response));
    },
    function(errors) {
        alert(JSON.stringify(errors));
    });
```

> On Success

> The above function success callback will return a JSON array ’{ isPosted : true }’ as the response.

###Email Verification
On your custom email verification page to implement verification email, call **LoginRadiusRaaS.api.emailVerification** with verification token(i.e. vtoken).This function needs to be included on the page that the link in your parameter - "option.emailVerificationUrl" is pointing to.

Alternatively, if in the email template of your LoginRadius user admin-console you have specified the verification email other than #Url#, then you can directly put it on that page as well.

```
LoginRadiusRaaS.api.emailVerification({
        vtoken: "<VTOKEN>"
    },
    function(response) {
        alert(JSON.stringify(response));
    },
    function(errors) {
        alert(JSON.stringify(errors));
    });
```

> Email Verification Default Settings

> By default one account can just require three verification emails every day​.
> The default expiration for the email verification link is 7 days.

###Social Login
To implement the Social Login, call **LoginRadiusRaaS.api.socialLogin** with the token, here token is the callback response after the social login process. This will also prompt a required field filling interface. By filling it, the user's account will be generated.

```
LoginRadiusRaaS.api.socialLogin({
    token: "xxxxxxxx-xxx-4337-xxxx-d624703ffe55"
}, function(response) {
    //success
    alert(JSON.stringify(response));
}, function(errors) {
    // failure
    alert(JSON.stringify(errors));
}, function(token, schema, userprofile) {
    //in case of missing field
    LoginRadiusRaaS.api.updateSocialData({
        token: token // all  properties which need to be update
    }, userprofile, function(response) {
        // success
        alert(JSON.stringify(response));
    }, function(errors) {
        //failure
        alert(JSON.stringify(errors));
    });
});
```
