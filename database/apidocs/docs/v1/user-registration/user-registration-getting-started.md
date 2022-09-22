# User Registration Getting Started

---

Developing and managing an online identity solution continues to be challenging in terms of addressing security concerns, performance issues, or the high cost of the development and maintenance of the solution. LoginRadius provides a complete User Registration platform that can be implemented on any application.

<iframe src="https://www.youtube.com/embed/pzEG890G2Jg" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

{{table_container}}

##LoginRadius User Registration

This solution covers:

- Online user registration (Registration Form)
- The creation of usernames and passwords (Login Form)
- Social Login
- Email verification
- Human verification (CAPTCHA)
- Social and Traditional Account linking
- User data storage and authentication API
- Forgotten usernames or passwords service API

It allows integration of the Login/Registration system across your website. This tool gives you flexibility in terms of design, structure, fields, and content validations during implementation on your site.

## ##Installation

In this section, we go over the client-side methods that are available for setting up and configuring the various User Registration interfaces.
###References
Add the JavaScript framework reference to your web page – LoginRadius User Registration framework

```
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js"></script>
```

###Initialization
This method takes five parameters, the signature of this method is:

```
LoginRadiusRaaS.init(options, action, onSuccess, OnError, containerId, idclassprefix);
```

Here is a table about the type and description of each parameter.

| Parameter     | Type     | Description                                                                                                                                                                                                                                                  |
| ------------- | -------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| options       | Object   | See below for a sample options object initialization.                                                                                                                                                                                                        |
| action        | String   | Which action to perform. Allowed actions are login, registration, resetpassword, forgotpassword, emailverification and sociallogin                                                                                                                           |
| onSuccess     | Function | Callback function to be called on successful action. Signature of this callback function should be function(response,data) {} because on success response will be returned and data is original form data as JSON type.                                      |
| onError       | Function | Callback function to be called on error (validation error, user name exists, CAPTCHA error etc.) of action. Signature of this callback function should be function(errors) {} because on error, errors will be returned and this will be an array of errors. |
| containerId   | String   | Id of div or any html element where the form of this action will be rendered.                                                                                                                                                                                |
| idclassprefix | String   | This is an optional parameter, this is required when using two forms on the same page, example values are "registration-form1", "registration-form2" etc.                                                                                                    |

**Sample onSuccess Function**

```
function(response) {
    // On Success this callback will call
    // response will be { isPosted : true }
    // in this case user will get an email verification
    console.log(response);
}
```

**Sample onError Function**

```
function(response) {
    // On Error this callback will call
    // response will be {
	//					  "description": "Description of the Error",
	//					  "errorCode": XXX,
	//					  "message": "Detailed Error Message",
	//					  "isProviderError": false,
	//					  "providerErrorResponse": null
	//					}
    console.log(response);
}
```

A detailed table for "options" parameter from above:

| Name                               | Type    | Description                                                                                                                                                                                                       | Required  |
| ---------------------------------- | ------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------- |
| apikey                             | String  | Apikey of your site.                                                                                                                                                                                              | Yes       |
| appName                            | String  | Set to your LoginRadius site name, this is required for User Registration to work with Single Sign On API.                                                                                                        | Yes       |
| emailVerificationUrl               | URL     | Set dynamic URL for email verification                                                                                                                                                                            | Yes       |
| forgotPasswordUrl                  | URL     | Set dynamic URL for reset password                                                                                                                                                                                | Yes       |
| inFormvalidationMessage            | Boolean | Set value true if you want to show form validation message just below the form elements.                                                                                                                          | Recommend |
| termsAndConditionHtml              | String  | This html is shown just above the submit button and displays terms and conditions text to user.                                                                                                                   | No        |
| formRenderDelay                    | Int     | Set the delay in milliseconds before rendering the User Registration interface.                                                                                                                                   | No        |
| passwordlength                     | Object  | Set password length, object must be in form `{min : 10, max :32}`                                                                                                                                                 | Recommend |
| V2Recaptcha                        | Boolean | Set value true if you want to replace ReCAPTCHA version 1 with version 2 on registration form. Default value is false, you can pass ‘1’ or true into it.                                                          | Recommend |
| invisibleRecaptcha                 | Boolean | Set value true if you want to replace V2Recaptcha with invisibleRecaptcha on registration form. Default value is false, you can pass ‘1’ or true into it.                                                         | No        |
| V2RecaptchaSiteKey                 | String  | Your V2 Google reCaptcha Public Key                                                                                                                                                                               | Recommend |
| V2RecaptchaLanguage                | String  | The Google ReCaptcha [language code](https://developers.google.com/recaptcha/docs/language)                                                                                                                       | No        |
| enableLoginOnEmailVerification     | Boolean | Log user in after the verification link is clicked in the verification email.                                                                                                                                     | Recommend |
| promptPasswordOnSocialLogin        | Boolean | After authentication for social login, it will prompt a password filling interface. By filling it, user is also going to generate a traditional account besides his/her social account.                           | No        |
| enableUserName                     | Boolean | Enable users to login with either username or email.                                                                                                                                                              | No        |
| forgotPasswordTemplate             | String  | Forgot password template name                                                                                                                                                                                     | No        |
| emailVerificationTemplate          | String  | Email Verification template name                                                                                                                                                                                  | No        |
| askEmailAlwaysForUnverified        | Boolean | Every time an unverified user with social account which doesn't provide email (social login user(twitter,vk) ) tries to login, it would ask for new email address.                                                | No        |
| DisabledEmailVerification          | Boolean | Enabling this property would allow the user to login without verifying email Id and no email would be sent to the user. <br>Note: This option also has to be enabled by LoginRadius support from backend          | No        |
| OptionalEmailVerification          | Boolean | Enabling this property would allow the user to login without verifying email Id and the user would also get a verification email.<br>Note: This option also has to be enabled by LoginRadius support from backend | No        |
| enableRememberMe                   | Boolean | Enabling this property would allow the users to check 'keep me sign in' option<br>Note: This option also has to be enabled by LoginRadius support from backend                                                    | No        |
| askRequiredFieldOnTraditionalLogin | Boolean | Enabling this property would prompt an interface of required fields for a traditional legacy or old user account, if the registration schema has changed.                                                         | No        |
| oneClickSignin                     | Boolean | To initiate one click login.<br>\*\* This also has to be enabled from LoginRadius backend.Raise a support ticket to initiate the request.                                                                         |           |
| oneClickSigninUrl                  | String  | URL where the one click login will be handled                                                                                                                                                                     |           |
| oneClickLoginButtonLabel           | String  | The label that you want to have the one click button to have.                                                                                                                                                     |           |
| checkPasswordStrength              | Boolean | To enable password strength                                                                                                                                                                                       |           |
| askOptionalFieldsOnRegistration    | Boolean | To prompt optional fields for the first time i.e. during the social account registration                                                                                                                          |           |

> **Note**

> For "V2Recaptcha" and "enableLoginOnEmailVerification" make sure to contact LoginRadius support to make this parameter accessible.

**Sample options initialization**

```
option = {};
option.apikey = "<Your LoginRadius API key>";
option.appName = "<LoginRadius Site Name>";
option.emailVerificationUrl = "<email verification url>";
option.forgotPasswordUrl = "<forgot password url>";
option.emailVerificationTemplate="<email verification template ID>";
option.forgotPasswordTemplate="<forgot password template ID>";
option.V2Recaptcha = true;

```

###Registration
To implement the Registration form, call LoginRadiusRaaS.init with the registration action.

JavaScript code:

```
$LR.util.ready(function() {
  //option object should be defined as given in 'Sample options initialization' above.
  LoginRadiusRaaS.init(option, 'registration', function(response) {
    // On Success
    console.log(response);
  }, function(errors) {
    // On Errors
    console.log(errors);
  }, "registration-container");
});
```

HTML code:

```
<div id="registration-container"></div>
```

> Note

> The init functions success callback will return a json array ’{ isPosted : true }’ as the response.

![enter image description here](https://apidocs.lrcontent.com/images/register-boarder_1265558ac174e941f64.81115491.png)

###Login
To implement login, call LoginradiusRaaS.init with the login action.

Javascript code:

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    LoginRadiusRaaS.init(option, 'login', function(response) {
        // On Success this callback will call
        // response will be { access_token : ’<token>’,  expires_in : ‘<date and   time>’ }
        // you can use token response.access_token and get user profile using your
        // LoginRadius SDK technology.
    }, function(errors) {
        // on failure this function will call ‘errors’ which is an array of errors with message.
        // every kind of error will be returned in this method
        // you can run a loop on this array.
    }, "login-container");
});
```

HTML code:

```
<div id="login-container"></div>
```

> Note

> The init functions success callback will return a response as ’{ access_token : ’`<token>`’, expires_in : ‘`<date and time>`’ }’. You can use this response to get the user profile data using LoginRadius Social Login SDK.

![enter image description here](https://apidocs.lrcontent.com/images/login-boarder_3245358ac178d7e5303.57750037.png)
###Social Login
A. Social Login interface
The following code generates raw Login Interface for the social platform providers, click the provider will allow the user to perform social login. But actual handle the return response, you also need to implement step B.

JavaScript code:

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    option.templatename = "loginradiuscustom_tmpl";
    option.hashTemplate = true;
    LoginRadiusRaaS.CustomInterface(".interfacecontainerdiv", option);
});
```

HTML code:

```
<div class="interfacecontainerdiv"></div>
```

Interface template code:

You can change this template according to your design requirements and can refer to documentation in order to further customize the interface.

```
<script type="text/html" id="loginradiuscustom_tmpl">
    <a class="lr-provider-label" href="javascript:void(0)" onclick="return  $LR.util.openWindow('<#= Endpoint #>&is_access_token=true&callback=<#= window.location #>');" title="<#= Name #>" alt="Sign in with <#=Name#>">
        <#=Name#>
    </a>
</script>
```

B. Handle Social Login Response
Continue on step A, when a user logs in with selected social provider. If the returned profile contains has missing fields from what you have defined as "required" in your LoginRadius user Admin-console(or like Twitter doesn't return email which is required by default), it will prompt a form to let the user input the needed information. If email is missing from the profile the user also needs to go verify his email address.

JavaScript code:

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    LoginRadiusRaaS.init(option, 'sociallogin', function(response) {
        // On Success this callback will call
        // response will be string as token
    }, function(errors) {
        // on failure this function will call ‘errors’ which is an array of errors with message.
        // every kind of error will be returned in this method
        // you can run a loop on this array.
    }, "social-login-container");
});
```

HTML code:

```
<div id="social-login-container"></div>
```

###Forgot Password
To implement forgot password, call LoginradiusRaaS.init with forgotpassword action.

JavaScript code:

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    LoginRadiusRaaS.init(option, 'forgotpassword', function(response) {
        // On Success this callback will call
        // response will be { isPosted : true }
        // in this case user will get an email for password resetting
    }, function(errors) {
        // on failure this function will call ‘errors’ which is an array of errors with message.
        // every kind of error will be returned in this method
        // you can run a loop on this array.
    }, "forgotpassword-container");
});
```

HTML code:

```
<div id="forgotpassword-container"></div>
```

> Note

> The init functions success callback will return a json array ’{ isPosted : true }’ as the response.

![enter image description here](https://apidocs.lrcontent.com/images/forgotpassword-boarder_2064058ac17b35db5f4.35579566.png)

###Reset Password
To implement reset password, call `LoginradiusRaaS.init` with the resetpassword action.

JavaScript code:

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    LoginRadiusRaaS.init(option, 'resetpassword', function(response) {
        // On Success this callback will call
        // response will be { isPosted : true }
    }, function(errors) {
        // on failure this function will call 'errors' which is an array of errors with message.
        // every kind of error will be returned in this method
        // you can run a loop on this array.
    }, "resetpassword-container");
});
```

HTML code:

```
<div id="resetpassword-container"></div>
```

> Note

> The init functions success callback will return a json array ’{ isPosted : true }’ as the response.

![enter image description here](https://apidocs.lrcontent.com/images/resetpassword-boarder_2903758ac18036f7468.96685811.png)
###Email Verification
On your email verification page to implement verification email, call LoginradiusRaaS.init with "emailverification" action. This function needs to be included on the page that the link in your parameter - "option.emailVerificationUrl" is pointing to.

Alternatively, if in the email template of your LoginRadius user admin-console you have specified the verification email other than #Url#, then you can directly put it on that page as well.

> **Email Verification Default Settings**

> By default one account can just require three verification emails everyday.
> The default expiration for the email verification link is 7 days.

JavaScript code:

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    LoginRadiusRaaS.init(option, 'emailverification', function(response) {
      // succeed
      // console.log(response);
    }, function(errors) {
      // error
      // console.log(errors)
    });
});
```

If you have enabled the parameter "enableLoginOnEmailVerification" for your User Registration options, then you need to handle this a little bit differently.

```
$LR.util.ready(function() {
    //option object should be defined as given in 'Sample options initialization' above.
    LoginRadiusRaaS.init(option, 'emailverification', function(response) {
      if (response.data.access_token != null && response.data.access_token != "") {
          // user will be logged in
          // console.log(response.access_token);
      } else {
          // feature not enabled, handle resposne
          // console.log(response);
      }
    }, function(errors) {
      // error
      // console.log(errors)
    });
});
```

> Note

> The init functions success callback will return a json array ’{ isPosted : true }’ as the response.

###Account Linking

Account Linking allows you to provide a manner for customers to link their social provider accounts into a single unified account. For more details on this feature please read our account linking documentation [here](/libraries/identity-experience-framework/features-use-cases/#accountlinking2)

This section covers the technical aspects of implementing Account Linking, the steps shown here will only work when the user is logged in.

The steps for Account linking shown here will only work when the user is logged in.

#####Scenarios of Account Linking

1. When a user has an account, connected with one social provider having a UID (Account ID) for example 123456 and tries to link with another social provider through which the user has already created a different account with UID for example 456789. In such case, the account would be linked but UID of the linked account would be of the existing account in which user was logged in. (In this case, it would be 123456).

> 1. User is currently logged in Account 1 with UID of 123456.
>
> 2. Tries to link existing Account 2 with UID 456789.
>
> 3. Once linked, the UID 456789 is removed and is replaced by 123456. The UID 456789 will be lost in this case.

2.When a user has an account, connected with multiple social provider and tries to link with another account which has one social provider. The new account will be connected with the existing logged in account and the new accounts uid will replace the existing logged in accounts uid.

> 1. User currently logged in Account 1 with UID of 123456 which has two social providers connected (FB, Google)
>
> 2. Tries to link existing Account 2 with UID of 456789 which has one social provider (Twitter)
>
> 3. Once linked, the UID 456789 is removed and is replaced by 123456. The UID 456789 will be lost in this case

#####Implementation Flow

We provide 2 different implementation flows, one being with out front-end JavaScript interfaces,
the other using our back-end API calls.

1. Add Account Linking Interface

a. Add javascript code

b. Add HTML Code

c. Add template code

2. Add REST APIs for Account Linking and Unlinking

a. Account Linking REST API

b. Account Unlinking REST API

#####Account Linking Interface

a. **Javascript code**

Add the JavaScript framework reference to your web page – first the LoginRadius JS framework and then the LoginRadius User Registration framework.

```
<script src="https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js"></script>
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js"></script>
```

To implement account linking interface, Call LoginRadius.init with the accountlinking action :

```
$SL.util.ready(function() {
  var raasoption = {};
  raasoption.apikey = "<Your API key>";
  raasoption.templatename = "loginradiuscustom_tmpl";
  raasoption.hashTemplate = true;
  LoginRadiusRaaS.CustomInterface(".interfacecontainerdiv", raasoption);
  LoginRadiusRaaS.init(raasoption, 'accountlinking', function(response) {
    // On Success
    console.log(response);
  }, function(errors) {
    // On Errors
    console.log(errors);
  }, "interfacecontainerdiv");
});
```

> Note

> The init functions success callback will return

> 1. When different social providers have the same email address then a json array ’{ isPosted: true }’ as the response.
> 2. Otherwise an accesstoken token as response.

b. Add HTML code

```
<div class="interfacecontainerdiv" id="interfacecontainerdiv"></div>
```

c. Add Template Code

```
<script type="text/html" id="loginradiuscustom_tmpl">
<# if(isLinked) { #>
 <div class="lr-linked">
<a class="lr-provider-label" href="javascript:void(0)" title="<#= Name #>" alt="Connected">
<#=Name#> is connected
</a>
</div>
<# }  else {#>
 <div class="lr-unlinked">
<a class="lr-provider-label" href="javascript:void(0)" onclick="return  $SL.util.openWindow('<#= Endpoint #>&is_access_token=true&ac_linking=true&callback=<#= window.location #>');" title="<#= Name #>" alt="Sign in with <#=Name#>">
<#=Name#></a>	   </div>
  <# } #>
</script>
```

> Note

> This account linking template shows linked account and unlinked
> account on the basis of the variable **isLinked** as used above.

#####REST APIs for Account Linking and Unlinking
While it's easy to implement account linking using our JavaScript interfaces, we also
provide API calls that you can make server-side to accomplish the same goal:

a. **Account Linking REST API**
You can use our [Account Link API](/api/v1/user-registration/account-link) to link accounts.

b). **Account Unlink · LoginRadius API Documentation**
You can use our [Account Unlink API](/api/v1/user-registration/account-unlink) to unlink accounts.

###Delete Users
If you want to provide your user an option to remove his profile from your database, you need to first call this Delete User (Client-side) ] API manually.

When you call this API, you need to pass-in the deleteUserLink, it will send the user an confirmation email containing the link to your user profile delete page. And after user confirm the delete action by clicking the link, they will be redirected to your page which host the following code to finish the operation.

```
 LoginRadiusRaaS.init(option.appName, 'deleteuser', function(response) {
   // On Success
   // console.log(response);
 }, function(response) {
   // On Error
   // console.log(response);
 });
```

###Logout Users

If you want to clear all of the LoginRadius managed session values(Local Storage, Session Storage, Cookies), SSO Session, and invalidate access tokens, then you can call the below function.
You should pass in your LoginRadius Site Name.

```
 LoginRadiusRaaS.logout(appName , function (response) {
                		alert("successfully logout.");
           		 }, function (errors) {
                		console.log(errors);
            	});
```

## ##What's Next

After you have finished the basic implementations for each action, you may want to customize the flow and the chart a little, such as showing a loading animation, customizing your own validation rules, etc. For the advanced usage of User Registration as a Service, goto the next doc here:
[Advanced Customization](/api/v1/user-registration/advanced-customization)

Depending on the social providers you have selected for your application/website, you should review what data points are available to you. While LoginRadius does normalize the data, we cannot guarantee the provider will supply all our data points.

An updated chart of all data points based on providers can be found here:

http://www.loginradius.com/datapoints

User Registration provides some default field settings and details on these can be found here:

http://support.loginradius.com/hc/en-us/articles/204279815-User-Registration-Fields-and-Default-Constraints
