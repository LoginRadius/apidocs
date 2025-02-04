Coldfusion Library
===
---
ColdFusion is a rapid development platform for building modern web applications. ColdFusion is designed to be expressive and powerful. The expressive characteristic allows you to perform programming tasks at a higher level than most other languages.

[Get a Full Demo](https://github.com/LoginRadius/coldfusion-sdk)

>**Note**: This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open-source library, which means you are free to download and customize the library functions based on your specific application needs.

This document contains information and examples regarding the LoginRadius Coldfusion SDK.

## Installation
>**Prerequisites:**
- Download the SDK from [Github](https://github.com/LoginRadius/coldfusion-sdk).
- Copy the lrsdk component files to your project directory.

## Quickstart Guide
This guide will help you to set up and implement Loginradius in Coldfusion. 

## Setup

Pass the token returned in the User Registration login/registration response to the code below. You can use a javascript function in the login and social login onSuccess functions. Additional details on setting up and configuring your interface are available.

```
function redirect(token) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "<YOUR_DOMAIN>"; //This is you callback page where token is retrieved.
    var _token = document.createElement("input");
    _token.type = "hidden";
    _token.name = "token";
    _token.value = token;
    form.appendChild(_token);
    document.body.appendChild(form);
    form.submit();
}

    var sl_options = {};
      sl_options.onSuccess = function(response) {
            redirect(response);          
      };
      sl_options.onError = function(errors) {
            redirect(errors);
      };
     LRObject.util.ready(function() {           
            LRObject.init('socialLogin', sl_options);       
      });
```

On your callback page, follow the instructions to implement LoginRadius SDK from the IMPLEMENTATION section below.

## Implementation
Create the LoginRadius Coldfusion component Object

```
<cfset SdkObject = createObject("component","lrsdk.authenticationapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>

```

Call the function login by email to get user data based on the LoginRadius Access Token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-readall-profiles-by-token)

 ```
<cftry>
<cfset userProfileResult = SdkObject.getProfileByToken(token)>
  <cfset Uid ='#userProfileResult.Uid#'>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>
```
Call the User Profile API in order to obtain the ID and UID of the user for use with the User Registration APIs.

## APIs
With the LoginRadius access token, ID, and UID, we can now invoke any of the following functions to retrieve user data or call the User Registration APIs.

>Use valid JSON where JSON is required. You can use the following library for handling JSON: 
https://github.com/bennadel/JsonSerializer.cfc


### Authentication APIs

The Authentication (Auth) APIs allow changes to the account once some form of authentication has been performed. For this reason, they are considered to be user-facing client-side/front-end API calls.

These API calls can be generally be executed via a generated token.

**List of APIs in this Section:**<br>
- [Auth User Registration By Email](#auth-user-registration-by-email)<br>
- [Auth Login By Email](#auth-login-by-email)<br>
- [Auth Login By Username](#auth-login-by-username)<br>
- [Auth Add email](#auth-add-email)<br>
- [Auth Forgot Password](#auth-forgot-password)<br>
- [Auth Email Availability](#auth-email-availability)<br>
- [Auth UserName Availability](#auth-username-availability)<br>
- [Auth Read Profiles by Token](#auth-read-profiles-by-token)<br>
- [Auth Privacy Policy Accept](#auth-privacy-policy-accept)<br>
- [Auth Send Welcome Email](#auth-send-welcome-email)<br>
- [Auth Social Identity](#auth-social-identity)<br>
- [Auth Validate Access token](#auth-validate-access-token)<br>
- [Auth Verify Email](#auth-verify-email)<br>
- [Auth Delete Account](#auth-delete-account)<br>
- [Auth Invalidate Access Token](#auth-invalidate-access-token)<br>
- [Security Questions By Access Token](#security-questions-by-access-token)<br>
- [Security Questions By Email](#security-questions-by-email)<br>
- [Security Questions By User Name](#security-questions-by-user-name)<br>
- [Security Questions By Phone](#security-questions-by-phone)<br>
- [Auth Verify Email By OTP](#auth-verify-email-by-otp)<br>
- [Auth Change Password](#auth-change-password)<br>
- [Auth Link Social Identities](#auth-link-social-identities)<br>
- [Auth Resend Email Verification](#auth-resend-email-verification)<br>
- [Auth Reset Password By Reset Token](#auth-reset-password-by-reset-token)<br>
- [Auth Reset Password By OTP](#auth-reset-password-by-otp)<br>
- [Auth Reset Password By Email](#auth-reset-password-by-email)<br>
- [Auth Reset Password By Phone](#auth-reset-password-by-phone)<br>
- [Auth Reset Password By Username](#auth-reset-password-by-username)<br>
- [Auth Set or Change User Name](#auth-set-or-change-user-name)<br>
- [Auth Update profile by Token](#auth-update-profile-by-token)<br>
- [Auth Update Security Question By Access Token](#auth-update-security-question-by-access-token)<br>
- [Auth Delete Account With Email Confirmation](#auth-delete-account-with-email-confirmation)<br>
- [Auth Remove email](#auth-remove-email)<br>
- [Auth Unlink Social Identities](#auth-unlink-social-identities)<br>
- [Validate Code](#validate-code)<br>
- [Get Registration Data](#get-registration-data)<br>


If you have not already initialized the user object, do so now.

```
<cfset authenticationObject = createObject("component","lrsdk.authenticationapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
       lr_api_signing = 'true'
      )>
```

##### Auth User Registration By Email
This API creates a user in the database as well as sends a verification email to the user.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-user-registration-by-email)

 ```
 /** 
  * @param payload This should have a valid JSON object with the userprofile data passed in.
  * @param verificationurl email verification url(OPTIONAL)
  * @param emailtemplate email template name (OPTIONAL)
  * @param options Prevent verification email (OPTIONAL) 
  * @return {"isPosted": "true"}
  */
Example:
  <cfset payload = "{'Email': [{'Type': 'Primary', 'Value': 'xxxx@xxxxx.com'}], 'Password': 'xxxxxx', 'FirstName' : 'firstname', 'LastName' : 'lastname'}">
 
<cftry> 
  <cfset response = authenticationObject.registerByEmail(payload, verificationurl, emailtemplate, options)> 
    <cfcatch type = "LoginRadiusException"> 
	    <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
</cftry>
 ```

##### Auth login By Email
This API retrieves a copy of the user data based on the Email.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/post-auth-login-by-email)

 ```
 /**
  * @param payload This should have a valid JSON object with the userprofile data passed in
  * @param verificationurl email verification url(OPTIONAL)
  * @param loginurl email verification url(OPTIONAL)
  * @param emailtemplate email template name (OPTIONAL)
  * @param grecaptcharesponse It is only required for locked accounts when logging in(OPTIONAL)
  * @return type object
  */
Example:
  <cfset payload = "{'Email': 'xxxx@xxxxx.com', 'Password': 'xxxxxx'}">

<cftry> 
  <cfset response = authenticationObject.loginByEmail(payload, verificationurl, loginurl, emailtemplate, grecaptcharesponse)> 
    <cfcatch type = "LoginRadiusException"> 
	    <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
</cftry> 
 ```

##### Auth login By Username
This API retrieves a copy of the user data based on the Username.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/post-auth-login-by-username)

 ```
 /**
  * @param payload This should have a valid JSON object with the userprofile data passed in
  * @param verificationurl email verification url(OPTIONAL)
  * @param loginurl email verification url(OPTIONAL)
  * @param emailtemplate email template name (OPTIONAL)
  * @param grecaptcharesponse It is only required for locked accounts when logging in(OPTIONAL)
  * @return type object
  */

Example:
  <cfset payload = "{'username': 'xxxxxxx', 'password': 'xxxxxx'}">

<cftry> 
  <cfset response = authenticationObject.loginByUsername(payload, verificationurl, loginurl, emailtemplate, grecaptcharesponse)> 
    <cfcatch type = "LoginRadiusException"> 
	    <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
</cftry> 
 ```

##### Auth Add Email
This API is used to add additional emails to a user's account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-add-email)
```
 /**
    * @param accesstoken 
    * @param email  Email to be added to the user's account
    * @param type  String to identify the type of email
    * @param verificationUrl  Email verification url(OPTIONAL)
    * @param emailtemplate  Name of the email template(OPTIONAL)
    * @return {"isPosted": "true"}
  */
<cftry>
    <cfset response = authenticationObject.addEmail(accesstoken, email, type, verificationurl, emailtemplate)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Forgot Password
This API is used to send the reset password URL to a specified account. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-forgot-password)
```
 /**
   * @param $email
   * @param resetpasswordurl Url to which user should get re-directed to for resetting the password
   * @param emailtemplate Name of the email template (OPTIONAL)
   * @return {"isPosted": "true"}
   */
<cftry>
    <cfset response = authenticationObject.forgotPassword(email, resetpasswordurl, emailtemplate)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Email Availability 
This API is used to check if the email exists or not on your site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-check-email-availability)
```
 /**
   * @param email
   * @return {"IsExist": "true"}
   */
<cftry>
    <cfset response = authenticationObject.checkEmailExist(email)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Username Availability
This API is used to check if the Username exists or not on your site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-check-user-name-availability)
```
 /**
   * @param username
   * @return {"IsExist": "true"}
   */
<cftry>
    <cfset response = authenticationObject.checkUsernameExist(username)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```
##### Auth Read Profiles By Token
This API retrieves a copy of the user data based on the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-readall-profiles-by-token)
```
 /**
   * @param accesstoken
   * @return type object
   */
<cftry>
    <cfset response = authenticationObject.getProfileByToken(accesstoken)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Privacy Policy Accept
This API is used to update the privacy policy stored in the user's profile by providing the access_token of the user accepting the privacy policy.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-privacy-policy-accept)
```
 /**
   * @param accesstoken
   * @return type object
   */
<cftry>
    <cfset response = authenticationObject.privacyPolicyAccept(accesstoken)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Send Welcome Email
This API will send a welcome email.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-send-welcome-email)
```
 /**
   * @param accesstoken
   * @param welcomeemailtemplate (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
    <cfset response = authenticationObject.sendWelcomeEmail(accesstoken, welcomeemailtemplate)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Social Identity
This API is called just before account linking API, and it prevents the raas profile of the second account from getting created.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-social-identity)
```
 /**
   * @param accesstoken
   * @return type object
   */
<cftry>
    <cfset response = authenticationObject.getSocialIdentity(accesstoken)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Validate Access Token
This API validates the access token if valid, then returns a response with its expiry otherwise error.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/token-validate)
```
 /**
   * @param accesstoken
   * @return type object
   */
<cftry>
    <cfset response = authenticationObject.validateAccessToken(accesstoken)>
    <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
    </cfcatch> 
</cftry>
```

##### Auth Verify Email
This API is used to verify the email of the user.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-verify-email)

```
 /**
   * @param verificationtoken  Verification token received in the email.
   * @param url     Mention URL to log the main URL(Domain name) in Database.
   * @param welcomeemailtemplate    Email template for a welcome email. (OPTIONAL)
   * @return type object
   */

<cftry>
<cfset statusResult = SdkObject.verifyEmail(verificationtoken, url, welcomeemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Delete Account
This API is used to delete an account by passing it a delete token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-delete-account)
```
 /**
   * @param deletetoken
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.deleteAccount(deletetoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Invalidate Access Token
This API call invalidates the active access_token or expires an access token's validity.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/token-invalidate)
```
 /**
   * @param accesstoken
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.invalidateAccessToken(accesstoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Security Questions By Access Token
This API is used to retrieve the list of questions using the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-accesstoken)
```
 /**
   * @param accesstoken
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.securityQuestionByToken(accesstoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Security Questions By Email
This API is used to retrieve the list of questions using email.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-email)
```
 /**
   * @param email
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.securityQuestionByEmail(email)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Security Questions By User Name
This API is used to retrieve the list of questions using a username.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-username)
```
 /**
   * @param username
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.securityQuestionByUsername(username)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Security Questions By Phone
This API is used to retrieve the list of questions using the phone.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-phone)
```
 /**
   * @param phone
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.securityQuestionByPhone(phone)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Verify Email by OTP
This API is used to verify the email of the user when the OTP Email verification flow is enabled.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-verify-email-by-otp)
```
 /**
   * @param payload
   * @param url Mention URL to log the main URL(Domain name) in Database.
   * @param welcomeemailtemplate (OPTIONAL)
   * @return type object
   */
Example:
  <cfset payload = "{'otp': 'xxxxxx', 'email': 'xxx@xxxx.com', 'SecurityAnswer': {'question':'answer'}, 'qq_captcha_ticket': 'xxxxx', 'qq_captcha_randstr': 'xxxxx', 'g-recaptcha-response': 'xxxxx'}">

<cftry>
<cfset response = authenticationObject.varifyEmailByOtp(payload, url, welcomeemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Change Password
This API is used to change the password of the account based on the previous password.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-change-password)
```
 /**
   * @param accesstoken
   * @param oldpassword
   * @param newpassword
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.changePassword(accesstoken, oldpassword, newpassword)>
<cfcatch type = "LoginRadiusException"> 
<cfset message = '#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Link Social Identities
This API is used to link up a social provider account with the specified account based on the access token and the social provider's user access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-link-social-identities/)
```
 /**
   * @param accesstoken
   * @param candidatetoken
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.accountLink(accesstoken, candidatetoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Resend Email Verification
This API resends the verification email to the user.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-resend-email-verification)
```
 /**
   * @param email
   * @param verificationurl Site url where email will get verified (OPTIONAL)
   * @param emailtemplate  (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.resendEmailVerification(email, verificationurl, emailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Reset Password by Reset Token
This API is used to set a new password for the specified account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-reset-token)
```
 /**
   * @param resettoken Reset token received in the email
   * @param password New password for the account
   * @param string welcomeemailtemplate (OPTIONAL)
   * @param string resetpasswordemailtemplate (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.resetPasswordByResetToken(resettoken, password, welcomeemailtemplate, resetpasswordemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Reset Password by OTP
This API is used to set a new password for the specified account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-otp)
```
 /**
   * @param email  User's Email ID
   * @param password  New password for the account
   * @param otp  One-time passcode sent on user's Email ID   
   * @param welcomeemailtemplate (OPTIONAL)
   * @param resetpasswordemailtemplate (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.resetPasswordByOTP(email, password, otp, welcomeemailtemplate, resetpasswordemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Reset Password By Email
This API is used to reset the password for the specified account by a security question.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-email)
```
 /**
   * @param payload
   * @return {"IsPosted": true}
   */
Example:
  <cfset payload = "{'securityanswer': {'Question' : 'Answer'}, 'email': 'xxx@xxxx.com', 'password': 'xxxxxx', 'resetpasswordemailtemplate': ''}">

<cftry>
<cfset response = authenticationObject.resetPasswordByEmail(payload)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```


##### Auth Reset Password By Phone
This API is used to reset the password for the specified account by a security question.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-phone)
```
 /**
   * @param payload
   * @return {"IsPosted": true}
   */

Example:
  <cfset payload = "{'securityanswer': {'Question' : 'Answer'}, 'phone': 'xxxxxx', 'password': 'xxxxxx', 'resetpasswordemailtemplate': ''}">

<cftry>
<cfset response = authenticationObject.resetPasswordByPhone(payload)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Reset Password By Username
This API is used to reset the password for the specified account by a security question.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-username)
```
 /**
   * @param payload
   * @return {"IsPosted": true}
   */
Example:
  <cfset payload = "{'securityanswer': {'Question' : 'Answer'}, 'username': 'xxxxxx', 'password': 'xxxxxx', 'resetpasswordemailtemplate': ''}">

<cftry>
<cfset response = authenticationObject.resetPasswordByUsername(payload)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Set or Change User Name
This API is used to set or change UserName by the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-set-change-user-name)
```
 /**
   * @param accesstoken
   * @param username
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.changeUsername(accesstoken, username)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Update Profile By token
This API is used to update the user's profile by passing the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-update-profile-by-token)

```
 /**
   * @param accesstoken
   * @param payload This should have a valid JSON object with the user profile data passed in.
   * @param string verificationurl (OPTIONAL)
   * @param string emailtemplate (OPTIONAL)
   * @param string smstemplate (OPTIONAL)
   * @return userprofile object
   */
Example:
<cfset payload = "{'FirstName' : 'first name', 'LastName' : 'last name', 'Gender' : 'M', 'BirthDate' : 'MM-DD-YYYY' }">
 
<cftry> 
  <cfset userProfileResult = authenticationObject.updateProfileBytoken(accesstoken, payload, verificationurl, emailtemplate, smstemplate)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Auth Update Security Question By Access token
This API is used to update security questions by the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-security-question-by-access-token)
```
 /**
   * @param accesstoken
   * @param payload
   * @return type object
   */
Example:
<cfset payload = "{'securityquestionanswer' : {'question' : 'Answer'}}">
 
<cftry>
<cfset response = authenticationObject.updateSecurityQuestionByToken(accesstoken, payload)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch>
</cftry>
```

##### Auth Delete Account With Email Confirmation
This API deletes a user account by passing the user's access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-delete-account-with-email-confirmation)
```
 /**
   * @param accesstoken
   * @param string deleteurl (OPTIONAL)
   * @param string emailtemplate (OPTIONAL)
   * @return {"IsDeleteRequestAccepted":true}
   */
<cftry>
<cfset response = authenticationObject.deleteAccountByEmailConfirmation(accesstoken, deleteurl, emailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Remove Email
This API is used to remove additional emails from a user's account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-remove-email)
```
 /**
   * @param accesstoken
   * @param email string "xxx@xxxxxxx.com"
   * @return {"IsDeleted":true}
   */
<cftry>
<cfset response = authenticationObject.removeEmail(accesstoken, email)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Unlink Social Identities
This API is used to unlink up a social provider account with the specified account based on the access token and the social provider's user access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-unlink-social-identities)
```
 /**
   * @param accesstoken
   * @param provider  Name of the provider
   * @param providerid  Unique ID of the linked account   
   * @return {"IsDeleted":true}
   */
<cftry>
<cfset response = authenticationObject.accountUnlink(accesstoken, provider, providerid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Validate Code
This API allows you to validate code for a particular dropdown member.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/validate-code)
```
 /**
   * @param params  
   * @return {"IsValid": true}
   */
Example:
params = "{'recordid': '', 'code': ''}"

<cftry>
<cfset response = authenticationObject.validateCode(params)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Auth Get Registration Data
This API is used to retrieve dropdown data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/auth-get-registration-data)
```
 /**
   * @param type     // Type of the Datasource
   * @param parentid // Id of parent dropdown member (OPTIONAL)  
   * @param skip     // Skip number of records from start (OPTIONAL) 
   * @param limit    // Retrieve number of records at a time(max limit is 50) (OPTIONAL) 
   * @return type Object
   */
Example:
params = "{'recordid': '', 'code': ''}"

<cftry>
<cfset response = authenticationObject.authGetRegistrationData(type, parentid, skip, limit)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

<br>

### PasswordLess login APIs

**List of APIs in this Section:**<br>
- [Passwordless Login By Email](#passwordless-login-by-email)<br>
- [Passwordless Login By UserName](#passwordless-login-by-username)<br>
- [Passwordless Login Verification](#passwordless-login-verification)<br>
- [Passwordless Login Phone Verification](#passwordless-login-phone-verification)<br>
- [Passwordless Login By Phone](#passwordless-login-by-phone)<br>


##### Passwordless Login By Email
This API is used to send a Passwordless Login verification link to the provided Email ID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/passwordless-login-by-email)
```
 /**
   * @param email
   * @param passwordlesslogintemplate (OPTIONAL)
   * @param verificationurl (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.passwordLessLoginByEmail(email, passwordlesslogintemplate, verificationurl)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Passwordless Login By UserName
This API is used to send a Passwordless Login Verification Link to a user by providing their UserName.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/passwordless-login-by-username)
```
 /**
   * @param username
   * @param passwordlesslogintemplate (OPTIONAL)
   * @param verificationurl (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.passwordLessLoginByUsername(username, passwordlesslogintemplate, verificationurl)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Passwordless Login Verification
This API is used to verify the Passwordless Login verification link.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/passwordless-login-verification)
```
 /**
   * @param verificationtoken
   * @param welcomeemailtemplate (OPTIONAL)
   * @return userprofile object
   */
<cftry>
<cfset response = authenticationObject.passwordLessLoginVerification(verificationtoken, welcomeemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Passwordless Login by Phone
API can be used to send a One-time Passcode (OTP) provided that the account has a verified PhoneID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/passwordless-login-by-phone)
```
 /**
   * @param phone
   * @param smstemplate (OPTIONAL)
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.phoneSendOtp(phone, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Passwordless Login Phone Verification
This API verifies an account by OTP and allows the user to login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-login-using-one-time-passcode)
```
 /**
   * @param payload
   * @param smstemplate (OPTIONAL)
   * @return type object
   */
Example:

  <cfset payload = "{'phone': 'xxxxxx', 'otp': 'xxxxxx', 'SecurityAnswer': {'question':'answer'}, 'qq_captcha_ticket': 'xxxxx', 'qq_captcha_response': 'xxxxx', 'g-recaptcha-response': 'xxxxx'}">

<cftry>
<cfset response = authenticationObject.phoneLoginUsingOtp(payload, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```
<br>

### Smart login APIs

The LoginRadius Smart Login set of APIs that do not require a password to login and are designed to help you delegate the authentication process to a different device. This type of Authentication workflow, while not limited to, is common among Smart TV apps, Smart Phone Apps, and IoT devices.

**List of APIs in this Section:**<br>
- [Smart Login By Email](#smart-login-by-email) <br>
- [Smart Login By Username](#smart-login-by-username) <br>
- [Smart Login Ping](#smart-login-ping) <br>
- [Smart Login Verify Token](#smart-login-verify-token) <br>

##### Smart Login By Email
This API sends a Smart Login link to the user's Email Id.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-by-email)
```
 /**
   * @param email
   * @param clientguid
   * @param smartloginemailtemplate (OPTIONAL)
   * @param welcomeemailtemplate (OPTIONAL)
   * @param redirecturl (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.smartLoginByEmail(email, clientguid, smartloginemailtemplate, welcomeemailtemplate, redirecturl)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Smart Login By Username
This API sends a Smart Login link to the user's Email Id.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-by-username)
```
 /**
   * @param username
   * @param clientguid
   * @param smartloginemailtemplate (OPTIONAL)
   * @param welcomeemailtemplate (OPTIONAL)
   * @param redirecturl (OPTIONAL)
   * @return {"IsPosted": true}
   */
<cftry>
<cfset response = authenticationObject.smartLoginByUsername(username, clientguid, smartloginemailtemplate, welcomeemailtemplate, redirecturl)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Smart Login Ping
This API is used to check if the Smart Login link has been clicked or not.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-ping)
```
 /**
   * @param clientguid
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.smartLoginPing(clientguid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Smart Login Verify Token
This API verifies the provided token for Smart Login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-verify-token)
```
 /**
   * @param verificationtoken
   * @param welcomeemailtemplate
   * @return type object
   */
<cftry>
<cfset response = authenticationObject.smartLoginVerifyToken(verificationtoken, welcomeemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```
<br>

### One Touch Login APIs

**List of APIs in this Section:**<br>
- [One Touch Login by Email Captcha](#one-touch-login-by-email-captcha)<br>
- [One Touch Login by Phone Captcha](#one-touch-login-by-phone-captcha)<br>
- [One Touch OTP Verification](#one-touch-otp-verification)<br>


##### One Touch Login by Email Captcha
This API is used to send a link to a specified email for a frictionless login/registration.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-login-by-email)
```
 /**
  * @param payload
  * @param redirecturl (OPTIONAL)
  * @param onetouchloginemailtemplate (OPTIONAL)
  * @param welcomeemailtemplate (OPTIONAL)
  * @return {"isPosted" : true}
  */
Example:
  <cfset payload = "{'clientguid': 'xxxxx', 'email': 'xxx@xxxxx.com', 'name': '', 'qq_captcha_ticket': 'xxxxx', 'qq_captcha_randstr': 'xxxxx', 'g-recaptcha-response': 'xxxxx'}">

<cftry>
<cfset response = authenticationObject.oneTouchLoginByEmail(payload, redirecturl, onetouchloginemailtemplate, welcomeemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### One Touch Login By Phone Captcha
This API is used to send a one-time password to a given phone number for a frictionless login/registration.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-login-by-phone)
```
 /**
  * @param payload
  * @param smstemplate (OPTIONAL)
  * @return {"isPosted" : true}
  */
Example:
  <cfset payload = "{'phone': 'xxxxxxx', 'name': '', 'qq_captcha_ticket': 'xxxxx', 'qq_captcha_randstr': 'xxxxx', 'g-recaptcha-response': 'xxxxx'}">

<cftry>
<cfset response = authenticationObject.oneTouchLoginByPhone(payload, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### One Touch OTP Verification
This API is used to verify the otp for One Touch Login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-verify-otp)
```
 /**
  * @param otp
  * @param phone
  * @param smstemplate (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = authenticationObject.oneTouchOtpVerification(otp, phone, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

<br>

### Multi Factor Authentication [MFA] API

This Multi-Factor Authentication [MFA] APIs are for managing Multi-Factor-Authentication (MFA). Note that this feature is not enabled by default. Contact our support team for more details.

**List of APIs in this Section:**<br>
- [MFA Email Login](#mfa-email-login)<br>
- [MFA User Name Login](#mfa-user-name-login)<br>
- [MFA Phone Login](#mfa-phone-login)<br>
- [MFA Validate Access Token](#mfa-validate-access-token)<br>
- [MFA Backup Code by Access Token](#mfa-backup-code-by-access-token)<br>
- [MFA Reset Backup Code By Access Token](#mfa-reset-backup-code-by-access-token)<br>
- [MFA Validate Backup code](#mfa-validate-backup-code)<br>
- [MFA Validate OTP](#mfa-validate-otp)<br>
- [MFA Validate Google Auth Code](#mfa-validate-google-auth-code)<br>
- [MFA Update Phone Number](#mfa-update-phone-number)<br>
- [MFA Update Phone Number By Token](#mfa-update-phone-number-by-token)<br>
- [Update MFA by Access Token](#update-mfa-by-access-token)<br>
- [Update MFA Setting](#update-mfa-setting)<br>
- [MFA Reset Google Authenticator by Token](#mfa-reset-google-authenticator-by-token) <br>
- [MFA Reset SMS Authenticator by Token](#mfa-reset-sms-authenticator-by-token) <br>
- [MFA Re-Authenticate](#mfa-re-authenticate) <br>
- [Validate MFA by Google Authenticator Code](#validate-mfa-by-google-authenticator-code) <br>
- [Validate MFA by Backup Code](#validate-mfa-by-backup-code) <br>
- [Validate MFA by OTP](#validate-mfa-by-otp) <br>
- [Validate MFA by Password](#validate-mfa-by-password) <br>


##### MFA Email Login
This API can be used to login by emailid on a Multi-factor authentication enabled LoginRadius site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-email-login)
```
 /**
  * @param payload
  * @param loginurl (OPTIONAL)
  * @param verificationurl (OPTIONAL)
  * @param emailtemplate (OPTIONAL)
  * @param smstemplate2fa (OPTIONAL)
  * @return type Second Factor Authentication object
  */
Example:
  <cfset payload = "{'email': 'xxxx@xxxxx.com', 'password': 'xxxxxx'}">

<cftry>
<cfset response = mfaObject.mfaEmailLogin(payload, loginurl, verificationurl, emailtemplate, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA User Name Login
This API can be used to login by username on a Multi-factor authentication enabled LoginRadius site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-user-name-login)
```
 /**
  * @param payload 
  * @param loginurl (OPTIONAL)
  * @param verificationurl (OPTIONAL)
  * @param emailtemplate (OPTIONAL)
  * @param smstemplate (OPTIONAL)
  * @param smstemplate2fa (OPTIONAL)
  * @return type Second Factor Authentication object
  */
Example:
  <cfset payload = "{'username': 'xxxxxx', 'password': 'xxxxxx'}">

<cftry>
<cfset response = mfaObject.mfaUserNameLogin(payload, loginurl, verificationurl, emailtemplate, smstemplate, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Phone Login
This API is used to log in by phone on a Multi-factor authentication enabled LoginRadius site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-phone-login)
```
 /**
  * @param payload
  * @param loginurl (OPTIONAL)
  * @param verificationurl (OPTIONAL)
  * @param emailtemplate (OPTIONAL)
  * @param smstemplate (OPTIONAL)
  * @param smstemplate2fa (OPTIONAL)
  * @return type Second Factor Authentication object
  */
Example:
  <cfset payload = "{'phone': 'xxxxxx', 'password': 'xxxxxx'}">

<cftry>
<cfset response = mfaObject.mfaPhoneLogin(payload, loginurl, verificationurl, emailtemplate, smstemplate, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Validate Access Token
This API is used to configure the Multi-factor authentication after login by using the access_token when MFA is set as optional.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-by-token)
```
 /**
  * @param accesstoken = 'xxxxxxxx'
  * @param smstemplate2fa (OPTIONAL)
  * @return type Second Factor Authentication object
  */
<cftry>
<cfset response = mfaObject.mfaValidateToken(accesstoken, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Backup Code by Access Token
This API is used to get a set of backup codes via access token to allow the user login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/backup-code-by-token)
```
 /**
  * @param accesstoken
  * @return type Backup codes object
  */
<cftry>
<cfset response = mfaObject.mfaBackupCodeByToken(accesstoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Reset Backup Code By Access Token
API is used to reset the backup codes on a given account via the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/reset-backup-code-by-token)
```
 /**
  * @param accesstoken
  * @return type Backup codes object
  */
<cftry>
<cfset response = mfaObject.mfaResetBackupCodeByToken(accesstoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Validate Backup Code
This API is used to validate the backup code provided by the user, and if valid, we return an access token allowing the user to login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/validate-backup-code)
```
 /**
  * @param secondfactorauthenticationtoken
  * @param backupcode  Backup Code for login
  * @return type object
  */
<cftry>
<cfset response = mfaObject.mfaValidateBackupCode(secondfactorauthenticationtoken, backupcode)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Validate OTP
This API is used to login via Multi-factor authentication by passing the One Time Password received via SMS.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-verify-otp)
```
 /**
  * @param secondfactorauthenticationtoken
  * @param payload  
  * @param smstemplate2fa  (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = mfaObject.mfaValidateOTP(secondfactorauthenticationtoken, payload, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Validate Google Auth Code
This API is used to login via Multi-factor-authentication by passing the google authenticator code.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-verify-google-authenticator-code)
```
 /**
  * @param secondfactorauthenticationtoken
  * @param googleauthenticatorcode
  * @param smstemplate2fa  (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = mfaObject.mfaValidateGoogleAuthCode(secondfactorauthenticationtoken, googleauthenticatorcode, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Update Phone Number
This API is used to update (if configured) the phone number by sending the verification OTP.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-update-phone-number)
```
 /**
  * @param secondfactorauthenticationtoken  
  * @param phoneno2fa  
  * @param smstemplate2fa  (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = mfaObject.mfaUpdatePhone(secondfactorauthenticationtoken, phoneno2fa, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Update Phone Number By Token
This API is used to update the Multi-factor authentication phone number by sending the verification OTP.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-update-phone-number-by-token)
```
 /**
  * @param phoneno2fa = 'xxxxxxxxxx'   The Phone Number to be Updated.
  * @param accesstoken  
  * @param smstemplate2fa  (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = mfaObject.mfaUpdatePhoneByToken(phoneno2fa, accesstoken, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Update MFA by Access Token
This API is used to Enable Multi-factor authentication by access token on user login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-mfa-by-access-token)
```
 /**
  * @param googleauthenticatorcode
  * @param accesstoken  
  * @param smstemplate  (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = mfaObject.updateMfaByGoogleAuthCode(googleauthenticatorcode, accesstoken, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Update MFA Setting
This API is used to trigger the Multi-factor authentication settings after login for secure actions.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-mfa-setting)
```
 /**
  * @param payload
  * @param accesstoken  
  * @return type object
  */
<cftry>
<cfset response = mfaObject.updateMfaByOtp(payload, accesstoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Reset Google Authenticator by Token
This API Resets the Google Authenticator configurations on a given account via the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-google-authenticator-by-token)
```
 /**
  * @param accesstoken  
  * @param googleauthenticator  pass boolean(true) to remove Google Authenticator
  * @return {"IsDeleted": true}
  */
<cftry>
<cfset response = mfaObject.mfaResetGoogleAuthenticatorByToken(accesstoken, googleauthenticator)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Reset SMS Authenticator by Token
This API resets the SMS Authenticator configurations on a given account via the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-sms-authenticator-by-token)
```
 /**
  * @param accesstoken  
  * @param otpauthenticator  pass boolean(true) to remove SMS Authenticator
  * @return {"IsDeleted": true}
  */
<cftry>
<cfset response = mfaObject.mfaResetSMSAuthenticatorByToken(accesstoken, otpauthenticator)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### MFA Re-Authenticate
This API is used to trigger the Multi-Factor Authentication workflow for the provided access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/re-auth-2fa)
```
 /**
  * @param accesstoken  
  * @param smstemplate2fa (OPTIONAL)
  * @return type object
  */
<cftry>
<cfset response = mfaObject.mfaReAuthenticate(accesstoken, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Validate MFA by Google Authenticator Code
This API is used to re-authenticate via Multi-factor-authentication by passing the google authenticator code.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/re-authentication/mfa/re-auth-by-google-authenticator-code/)

```
 /**
  * @param accesstoken  
  * @param googleauthenticatorcode = 'xxxxxxxxxx'
  * @return type object
  */
<cftry>
<cfset response = mfaObject.validateMfaByGoogleAuthCode(accesstoken, googleauthenticatorcode)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Validate MFA by Backup Code
This API is used to re-authenticate by a set of backup codes via an access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/validate-mfa-by-backup-code)
```
 /**
  * @param accesstoken  
  * @param backupcode = 'xxxxxxxxxx'
  * @return type object
  */
<cftry>
<cfset response = mfaObject.validateMfaByBackupCode(accesstoken, backupcode)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```


##### Validate MFA by OTP
This API is used to re-authenticate via Multi-factor authentication by passing the One Time Password received via SMS.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/mfa/step-up-auth-by-otp/)
```
 /**
  * @param accesstoken  
  * @param payload 
  * @param smstemplate2fa (OPTIONAL)
  * @return type object
  */
Example:
  <cfset payload = "{'otp': 'xxxxxx', 'SecurityAnswer': {'question': 'answer'}, 'qq_captcha_ticket': 'xxxxx', 'qq_captcha_randstr': 'xxxxx', 'g-recaptcha-response': 'xxxxx'}">

<cftry>
<cfset response = mfaObject.validateMfaByOtp(accesstoken, payload, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Validate MFA by Password
This API is used to re-authenticate via Multi-factor-authentication by passing the password.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/validate-mfa-by-password)
```
 /**
  * @param accesstoken  
  * @param payload
  * @param smstemplate2fa (OPTIONAL)
  * @return type object
  */

Example:
  <cfset payload = "{'Password': 'xxxxxx', 'SecurityAnswer': {'question': 'answer'}, 'qq_captcha_ticket': 'xxxxx', 'qq_captcha_randstr': 'xxxxx', 'g-recaptcha-response': 'xxxxx'}">

<cftry>
<cfset response = mfaObject.validateMfaByPassword(accesstoken, payload, smstemplate2fa)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

<br>

### Phone Authentication API

Get a list of phone authentication APIs.

- [Phone Login](#phone-login)<br>
- [Phone Forgot Password By OTP](#phone-forgot-password-by-otp)<br>
- [Phone Resend OTP](#phone-resend-otp)<br>
- [Phone Resend OTP By Token](#phone-resend-otp-by-token)<br>
- [Phone User Registration by SMS](#phone-user-registration-by-sms)<br>
- [Phone Number Availability](#phone-number-availability)<br>
- [Phone Number Update](#phone-number-update)<br>
- [Phone Reset Password By OTP](#phone-reset-password-by-otp)<br>
- [Phone Verify OTP](#phone-verify-otp)<br>
- [Phone Verification OTP By Token](#phone-verify-otp-by-token)<br>
- [Remove Phone ID by Access Token](#remove-phone-id-by-access-token)<br>


If you have not already initialized the phone authentication object, do so now.

```
<cfset phoneObject = createObject("component","lrsdk.phoneauthenticationapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>
```

##### Phone Login
This API retrieves a copy of the user data based on the Phone.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/post-auth-login-by-phone)
```
 /**
  * @param params json
  * @param loginurl  url from where user is going login(OPTIONAL)
  * @param smstemplate  sms template name(OPTIONAL)
  * @param grecaptcharesponse  It is only required for locked accounts when logging in(OPTIONAL) 
  * @return type userprofile object
  */
Example:
params = "{ 'phone' : 'xxxxxxxxx', 'password' : 'xxxxxxxxxxx' }"

<cftry>
<cfset response = phoneObject.loginByPhone(params, loginurl, smstemplate, grecaptcharesponse)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Forgot Password By OTP
This API is used to send the OTP to reset the account password.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-forgot-password-by-otp)
```
 /**
  *  @param phone = "xxxxxxxx" The Registered Phone Number
  *  @param smstemplate sms template name(OPTIONAL)
  *  @return type userprofile object
  */

<cftry>
<cfset response = phoneObject.phoneForgotPasswordByOtp(phone, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Resend OTP
This API is used to resend a verification OTP to verify a user's Phone Number.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-resend-otp)
```
 /**
  *  @param phone = "xxxxxxxx" The Registered Phone Number
  *  @param smstemplate sms template name (OPTIONAL)
  *  @return type userprofile object
  */

<cftry>
<cfset response = phoneObject.phoneResendOtp(phone, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Resend OTP By Token
This API is used to resend a verification OTP to verify a user's Phone Number in cases in which an active token already exists.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-resend-otp-by-token)
```
 /**
  *  @param accesstoken
  *  @param phone = "xxxxxxxx" The Registered Phone Number
  *  @param smstemplate sms template name (OPTIONAL)
  *  @return type object
  */

<cftry>
<cfset response = phoneObject.phoneResendOtpByToken(accesstoken, phone, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```


##### Auth User Registration By Phone
This API registers the new users into your Cloud Directory and triggers the phone verification process.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-user-registration-by-sms)

 ```
 /** 
  * @param payload This should have a valid JSON object with the userprofile data passed in.
  * @param verificationurl email verification url(OPTIONAL)
  * @param smstemplate sms template name (OPTIONAL)
  * @param options Prevent verification email (OPTIONAL) 
  * @return {"isPosted": "true"}
  */
Example:
  <cfset payload = '{"FirstName":"","LastName":"","BirthDate":"10-12-1985","Gender":"M","Password" : "*********","Email":[{"Type":"Primary","Value":"xxxxx@xxxxx.com"}],"PhoneId":"xxxxxxxxxxxx"}'>
 
<cftry> 
  <cfset response = phoneObject.registerByPhone(payload, verificationurl, smstemplate, options)> 
    <cfcatch type = "LoginRadiusException"> 
	    <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
</cftry>
 ```

##### Phone Number Availability
This API is used to check the Phone Number exists or not on your site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-number-availability)
```
 /**
  *  @param phone = "xxxxxxxx" The Registered Phone Number
  *  @return {"IsExist": true}
  */

<cftry>
<cfset response = phoneObject.checkPhoneNumberAvailability(phone)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Number Update
This API is used to update the login Phone Number of users.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-number-update)
```
 /**
  *  @param accesstoken
  *  @param phone = "xxxxxxxx" New Phone Number
  *  @param smstemplate sms template name (OPTIONAL)
  *  @return type object
  */

<cftry>
<cfset response = phoneObject.phoneNumberUpdate(accesstoken, phone, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Reset Password By OTP
This API is used to reset the password.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-reset-password-by-otp)
```
 /**
  * @param phone  The Registered Phone Number
  * @param otp  The Verification Code
  * @param password  New password
  * @param smstemplate  SMS Template Name (OPTIONAL)
  * @param resetpasswordemailtemplate  Reset Password Email Template (OPTIONAL)
  * @return {"IsPosted": true}
  */

<cftry>
<cfset response = phoneObject.phoneResetPasswordByOtp(phone, otp, password, smstemplate, resetpasswordemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Verify OTP
This API is used to validate the verification code sent to verify a user's phone number.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-verify-otp)
```
 /**
  * @param phone  The Phone Number to be verify
  * @param otp  The Verification Code
  * @param smstemplate  SMS Template Name (OPTIONAL)
  * @return {"IsPosted": true}
  */

<cftry>
<cfset response = phoneObject.phoneVerificationByOtp(phone, otp, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Phone Verification OTP by token
This API is used to consume the verification code sent to verify a user's phone number. Use this call for front-end purposes in cases where the user is already logged in by passing the user's access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-verify-otp-by-token)
```
 /**
  * @param accesstoken
  * @param otp
  * @param smstemplate (OPTIONAL)
  * @return {"IsPosted": true}
  */

<cftry>
<cfset response = phoneObject.phoneVerificationOtpByToken(accesstoken, otp, smstemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

##### Remove Phone ID by Access Token
This API is used to delete the Phone ID on a user's account via the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/remove-phone-id-by-access-token)
```
 /**
  * @param accesstoken
  * @return {"IsDeleted": true}
  */

<cftry>
<cfset response = phoneObject.removePhoneIdByAccessToken(accesstoken)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

### Account APIs

The Account Management APIs are used to manage a user's account.
These calls require the API Key and API Secret and often the User's Account UID(Unified Identifier) to perform an operation.

For this reason, these APIs are considered to be for back-end purposes.

**List of APIs in this Section:**<br>
- [Account Create](#account-create)<br>
- [Get Email Verification Token](#get-email-verification-token)<br>
- [Get Forgot Password Token](#get-forgot-password-token)<br>
- [Account Identities By Email](#account-identities-by-email)<br>
- [Account Impersonation API](#account-impersonation-api)<br>
- [Account Password](#account-password)<br>
- [Account Profiles By Email](#account-profiles-by-email)<br>
- [Account Profiles By UserName](#account-profiles-by-user-name)<br>
- [Account Profiles By Phone Id](#account-profiles-by-phone-id)<br>
- [Account Profiles By Uid](#account-profiles-by-uid)<br>
- [Account Set password](#account-set-password)<br>
- [Account Update](#account-update)<br>
- [Account Update Security Question](#account-update-security-question)<br>
- [Account Invalidate Verification Email](#account-invalidate-verification-email)<br>
- [Account Email Delete](#account-email-delete)<br>
- [Account Delete](#account-delete)<br>
- [MFA Backup Code By UID](#mfa-backup-code-by-uid)<br>
- [MFA Reset Backup Code By UID](#mfa-reset-backup-code-by-uid)<br>
- [MFA Reset Google Authenticator By UID](#mfa-reset-google-authenticator-by-uid) <br>
- [MFA Reset SMS Authenticator By UID](#mfa-reset-sms-authenticator-by-uid) <br>
- [Reset phone ID verification](#reset-phone-id-verification)<br>
- [Generate SOTT Token](#generate-sott-token)<br>
- [Add Registration Data](#add-registration-data)<br>
- [Get Registration Data](#auth-get-registration-data)<br>
- [Update Registration Data](#update-registration-data)<br>
- [Delete Registration Data](#delete-registration-data)<br>

If you have not already initialized the account object, do so now.

```
<cfset accountObject = createObject("component","lrsdk.accountapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>
```

##### Account Create
This API is used to create an account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-create)
```
 /**
  * @param params  This should have a valid JSON object
  * @return userprofile object
  */

Example:
params = "{'Email': [{'Type': 'Primary', 'Value': 'xxxx@xxxxx.com'}], 'Password': 'xxxxxx',  'EmailVerified': true, 'FirstName' : 'firstname', 'LastName' : 'lastname'}"

<cftry> 
   <cfset createProfileResult = accountObject.accountCreate (params)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Get Email Verification Token
This API Returns an Email Verification token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/email-verification-token)
```
 /**
  * @param email  = "xxxxx@xxxxxx.com"
  * @return {"VerificationToken": "*****ae92c458c*****c76a9b29"}
  */

<cftry> 
   <cfset result = accountObject.getEmailVerificationToken (email)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Get Forgot Password Token
This API Returns a forgot password token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/forgot-password-token)
```
 /**
  * @param email = "xxxxx@xxxxxx.com"
  * @return {"ForgotToken": "7be0d7b06a********f98f46ca84083"}
  */

<cftry> 
   <cfset result = accountObject.getForgotPasswordToken (email)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Identities By Email
This API is used to retrieve all of the identities (UID and Profiles), associated with a specified email.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-identities-by-email)
```
 /**
  * @param email = "xxxxx@xxxxxx.com"
  * @return Identities Object
  */

<cftry> 
   <cfset result = accountObject.accountIdentitiesByEmail (email)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Impersonation API
The API is used to get LoginRadius access token based on UID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/impersonation-api)
```
 /**
  * @param uid = "xxxxxxx"
  * @return access token
  */

<cftry> 
   <cfset result = accountObject.accountImpersonationAPI (uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Password
This API is used to retrieve the hashed password of a specified account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-password)
```
 /**
  * @param uid = "xxxxxxx"
  * @return {"PasswordHash": "xxxxxxx"}
  */

<cftry> 
   <cfset result = accountObject.getPassword (uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Profiles By Email
This API is used to retrieve all of the profile data associated with the specified account by email.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-profiles-by-email)
```
 /**
  * @param email = 'xxxx@xxxxxx.com'
  * @return userprofile Object
  */

<cftry> 
   <cfset result = accountObject.getProfileByEmail (email)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Profiles By User Name
This API is used to retrieve all of the profile data associated with the specified account by the user name.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-profiles-by-username)
```
 /**
  * @param username = 'xxxxxxxxx'
  * @return userprofile Object
  */

<cftry> 
   <cfset result = accountObject.getProfileByUsername (username)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Profiles By Phone Id
This API is used to retrieve all of the profile data associated with the account by phone number.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-profiles-by-phone-id)
```
 /**
  * @param phone = 'xxxxxxxxx'
  * @return userprofile Object
  */

<cftry> 
   <cfset result = accountObject.getProfileByPhone (phone)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Profiles By Uid
This API is used to retrieve all of the profile data associated with the account by UID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-profiles-by-uid)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @return userprofile Object
  */

<cftry> 
   <cfset result = accountObject.getProfileByUid (uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Set Password
This API is used to set the password of an account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-set-password)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param password = 'xxxxxxxxx'
  * @return type Object
  */

<cftry> 
   <cfset result = accountObject.setPassword (uid, password)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Update 
This API is used to update the information of the existing account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-update)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param payload  This should be a valid json data
  * @param nullsupport  Boolean, pass true if you wish to update any user profile field with a NULL value.
  * @return type Object
  */

Example:
<cfset payload = "{'FirstName' : 'first name', 'LastName' : 'last name', 'Gender' : 'M', 'BirthDate' : 'MM-DD-YYYY' }">

<cftry> 
   <cfset result = accountObject.accountUpdate (uid, payload, nullsupport)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Update Security Question
This API is used to update security questions configuration on an existing account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-security-question-configuration)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param payload  This should be a valid json data
  * @return type Object
  */
Example:
<cfset payload = "{'securityquestionanswer' : {'Question' : 'Answer'} }">

<cftry> 
   <cfset result = accountObject.updateSecurityQuestion (uid, payload)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Invalidate Verification Email
This API is used to invalidate the Email Verification status on an account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-invalidate-verification-email)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param verificationurl  (OPTIONAL)
  * @param emailtemplate  (OPTIONAL)
  * @return type Object
  */

<cftry> 
   <cfset result = accountObject.invalidateVerificationEmail (uid, verificationurl, emailtemplate)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Email Delete
Use this API to Remove emails from a user account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-email-delete)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param email = 'xxx@xxxxxx.com'
  * @return type Object
  */

<cftry> 
   <cfset result = accountObject.accountEmailDelete (uid, email)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Account Delete 
This API deletes the Users account and allows them to re-register for a new account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-delete)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @return {"IsDeleted": true}
  */

<cftry> 
   <cfset result = accountObject.accountDelete (uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### MFA Backup Code By UID
This API is used to get a set of backup codes to allow the user to login.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/backup-code-by-uid)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @return backup codes Object
  */

<cftry> 
   <cfset result = accountObject.mfaGetBackupCodeByUid(uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### MFA Reset Backup Code By UID
This API is used to reset the backup codes on a given account via the UID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/reset-backup-code-by-uid)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @return backup codes Object
  */

<cftry> 
   <cfset result = accountObject.mfaResetBackupCodeByUid(uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### MFA Reset Google Authenticator By UID
This API resets the Google Authenticator configurations on a given account via the UID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-google-authenticator-by-uid)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param googleauthenticator   // pass boolean(true) to remove Google Authenticator
  * @return {"IsDeleted": true}
  */

<cftry> 
   <cfset result = accountObject.mfaResetGoogleAuthenticatorByUid(uid, googleauthenticator)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### MFA Reset Google Authenticator By UID
This API resets the Google Authenticator configurations on a given account via the UID.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-google-authenticator-by-uid)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @param otpauthenticator // pass boolean(true) to remove SMS Authenticator
  * @return {"IsDeleted": true}
  */

<cftry> 
   <cfset result = accountObject.mfaResetSMSAuthenticatorByUid(uid, otpauthenticator)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Reset phone ID verification
This API allows you to reset the phone no verification of an end-users account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/reset-phone-verification)
```
 /**
  * @param uid = 'xxxxxxxxx'
  * @return {"IsPosted": true}
  */

<cftry> 
   <cfset result = accountObject.resetPhoneIdVerification(uid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```
##### Generate SOTT Token
This API allows you to generate SOTT with a given expiration time.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/generate-sott)
```
 /**
  * @param timedifference = '20' // The time difference you would like to pass, If you do not pass difference, then the default value is 10 minutes.
  * @return SOTT Token
  */

<cftry> 
   <cfset result = accountObject.generateSott(timedifference)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Add Registration Data
This API allows you to fill data in the dropDownList, which you have created for user Registration.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/add-registration-data)
```
 /**
  * @param params
  * @return {"IsPosted": true}
  */

Example:
params = "{'Data': [{'type': '', 'key': '', 'value': '', 'parentid': '', 'code': '', 'isactive': true}]}"

<cftry> 
   <cfset result = accountObject.addRegistrationData(params)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Get Registration Data
This API is used to retrieve dropdown data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/get-registration-data)
```
 /**
  * @param type     // Type of the Datasource
  * @param parentid // Id of parent dropdown member (OPTIONAL)  
  * @param skip     // Skip number of records from start (OPTIONAL) 
  * @param limit    // Retrieve number of records at a time(max limit is 50) (OPTIONAL)
  * @return type Object
  */

<cftry> 
   <cfset result = accountObject.getRegistrationData(type, parentid, skip, limit)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Update Registration Data
This API allows you to update members of dropDown.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/update-registration-data)
```
 /**
  * @param recordid     // Dropdown items record id
  * @param params
  * @return type Object
  */

Example:
params = "{'type': '', 'key': '', 'value': '', 'parentid': '', 'code': '', 'isactive': true}"

<cftry> 
   <cfset result = accountObject.updateRegistrationData(recordid, params)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Delete Registration Data
This API allows you to delete a member from the dropDownList.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/delete-registration-data)
```
 /**
  * @param recordid     // Dropdown items record id
  * @return type Object
  */

<cftry> 
   <cfset result = accountObject.deleteRegistrationData(recordid)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

<br>

### Roles Management API

The Roles Management APIs allow for a quick and easy way to define roles and assign them to users.

**List of APIs in this Section:**<br>
- [Roles Create](#roles-create)<br>
- [Get Context](#get-context)<br>
- [Roles List](#roles-list)<br>
- [Get Roles By UID](#get-roles-by-uid)<br>
- [Add Permissions To Role](#add-permissions-to-role)<br>
- [Assign Roles By UID](#assign-roles-by-uid)<br>
- [Upsert Context](#upsert-context)<br>
- [Delete Role](#delete-role)<br>
- [Unassign Roles by UID](#unassign-roles-by-uid)<br>
- [Remove Permissions](#remove-permissions)<br>
- [Delete Context](#delete-context)<br>
- [Delete Role From Context](#delete-role-from-context)<br>
- [Delete Permissions From Context](#delete-permissions-from-context)<br>


If you have not already initialized the role object, do so now.

```
<cfset roleObject = createObject("component","lrsdk.roleapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>
```

##### Roles Create
This API creates a role with permissions.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-create)
```
 /**
  * @param payload     
  * @return type Object
  */
Example:
<cfset payload= '{"roles": [{"name": "role_name","permissions": {"permission_name1": true,"permission_name2": true,"permission_name3": true}}]}'>

<cftry> 
  <cfset result = roleObject.rolesCreate (payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Get Context
This API Gets the contexts that have been configured and the associated roles and permissions.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-get-context)
```
 /**
  * @param uid     
  * @return type Object
  */
<cftry> 
  <cfset result = roleObject.getContext (uid)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Roles List
This API retrieves the complete list of created roles with permissions of your app.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-list)
```
 /**
  * @return type Object
  */
<cftry> 
  <cfset result = roleObject.rolesList ()> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Roles By UID
API is used to retrieve all the assigned roles of a particular User.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-by-uid)
```
 /**
  * @param uid  
  * @return type Object
  */
<cftry> 
  <cfset result = roleObject.getRolesByUid (uid)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Add Permissions To Role
This API is used to add permissions to a given role.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/add-permissions-to-role/)
```
 /**
  * @param role  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{"permissions": [
    "permission_name1",
    "permission_name2"
  ]}'>

<cftry> 
  <cfset result = roleObject.addPermissionToRole (role, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Assign Roles By UID
This API is used to assign your desired roles to a given user.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/assign-roles-by-uid)
```
 /**
  * @param uid  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{
  "roles": [
    "role_name"
  ]}'>

<cftry> 
  <cfset result = roleObject.assignRolesByUid (uid, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Upsert Context
This API creates a Context with a set of Roles.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-create-context)
```
 /**
  * @param uid  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{
  "rolecontext": [{
      "context": "Home",
      "roles": ["admin","user"],
      "additionalpermissions": ["X","Y","Z"],
      "expiration": "07/15/2018 8:30:08 AM"
    }]}'>

<cftry> 
  <cfset result = roleObject.upsertContext (uid, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Delete Role
This API is used to delete a role.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/delete-role)
```
 /**
  * @param role  
  * @return type Object
  */

<cftry> 
  <cfset result = roleObject.deleteRole (role)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Unassign Roles by UID
This API is used to the unassign role from a user.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/unassign-roles-by-uid)
```
 /**
  * @param uid  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{"roles": ["role_name"]}'>

<cftry> 
  <cfset result = roleObject.unassignRolesByUid (uid, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Remove Permissions
API is used to remove permissions from a role.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/remove-permissions)
```
 /**
  * @param rolename  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{"permissions": ["permission_name1"]}'>

<cftry> 
  <cfset result = roleObject.removePermission (rolename, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Delete Context
This API Deletes the specified Role Context.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-delete-context)
```
 /**
  * @param uid 
  * @param rolecontextname  
  * @return type Object
  */
<cftry> 
  <cfset result = roleObject.deleteContext (uid, rolecontextname)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Delete Role From Context
This API Deletes the specified Role from a Context.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-delete-context-role)
```
 /**
  * @param uid 
  * @param rolecontextname  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{"roles": ["admin"]}'>

<cftry> 
  <cfset result = roleObject.deleteRoleFromContext (uid, rolecontextname, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Delete Permissions From Context
This API Deletes Additional Permissions from Context.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/delete-permissions-from-context)
```
 /**
  * @param uid 
  * @param rolecontextname  
  * @param payload
  * @return type Object
  */
Example:
<cfset payload= '{"additionalpermissions": ["X"]}'>

<cftry> 
  <cfset result = roleObject.deletePermissionFromContext (uid, rolecontextname, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

<br>

### Custom Object APIs

This API is used to manage a custom object for the user and relies on the User Entity object. If you are unsure of your Object ID, you can reach out to the support team for details on this. If you haven't already initialized the User Registration Custom Object API, do so now.

**List of APIs in this Section:**<br>
- [Create Custom Object By UID](#create-custom-object-by-uid)<br>
- [Create Custom Object By Token](#create-custom-object-by-token)<br>
- [Custom Object By ObjectRecordId And UID](#custom-object-by-objectrecordid-and-uid)<br>
- [Custom Object By ObjectRecordId and Token](#custom-object-by-objectrecordid-and-token)<br>
- [Custom Object By Token](#custom-object-by-token)<br>
- [Custom Object By UID](#custom-object-by-uid)<br>
- [Custom Object Update By UID](#custom-object-update-by-uid)<br>
- [Custom Object Update By Token](#custom-object-update-by-token)<br>
- [Custom Object Update By ObjectRecordId and UID](#custom-object-update-by-objectrecordid-and-UID)<br>
- [Custom Object Update By ObjectRecordId and Token](#custom-object-update-by-objectrecordid-and-token)<br>
- [Custom Object Delete By ObjectRecordId and UID](#custom-object-delete-by-objectrecordid-and-UID)<br>
- [Custom Object Delete By ObjectRecordId and Token](#custom-object-delete-by-objectrecordid-and-token)<br>

If you have not already initialized the custom object, do so now.

```
<cfset customObject = createObject("component","lrsdk.customobjectapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET",
       lr_api_signing = "true/false"
      )>
```

##### Create Custom Object by UID
This API is used to write information in JSON format to the custom object for the specified account. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/create-custom-object-by-uid)
```
 /**
  * @param uid     
  * @param objectname     
  * @param payload     
  * @return type Object
  */

Example:
payload = "{'customdata1': 'Store my customdata1 value', 'customdata2': 'Store my customdata2 value'}"

<cftry> 
  <cfset result = customObject.createCustomObjectByUid (uid, objectname, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Create Custom Object By Token
This API is used to write information in JSON format to the custom object for the specified account. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/create-custom-object-by-token)
```
 /**
  * @param accesstoken     
  * @param objectname     
  * @param payload     
  * @return type Object
  */
Example:
payload = "{'customdata1': 'Store my customdata1 value', 'customdata2': 'Store my customdata2 value'}"

<cftry> 
  <cfset result = customObject.createCustomObjectByToken (accesstoken, objectname, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Custom Object By ObjectRecordId And UID
This API is used to retrieve the Custom Object data for the specified account. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-by-objectrecordid-and-uid)
```
 /**
  * @param uid     
  * @param objectrecordid     
  * @param objectname     
  * @return type Object
  */
<cftry> 
  <cfset result = customObject.customObjectByObjectRecordIdAndUid (uid, objectrecordid, objectname)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Custom Object By ObjectRecordId And Token
This API is used to retrieve the Custom Object data for the specified account. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-by-objectrecordid-and-token)
```
 /**
  * @param accesstoken     
  * @param objectrecordid     
  * @param objectname     
  * @return type Object
  */
<cftry> 
  <cfset result = customObject.customObjectByObjectRecordIdAndToken (accesstoken, objectrecordid, objectname)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Custom Object By UID
This API is used to retrieve all the custom objects by UID. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-by-uid)
```
 /**
  * @param uid     
  * @param objectname     
  * @return type Object
  */
<cftry> 
  <cfset result = customObject.getCustomObjectByUid (uid, objectname)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```


##### Custom Object By Token
This API is used to retrieve all the custom objects by the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-by-token)
```
 /**
  * @param accesstoken     
  * @param objectname     
  * @return type Object
  */
<cftry> 
  <cfset result = customObject.getCustomObjectByToken (accesstoken, objectname)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Custom Object Update By ObjectRecordId and UID
This API is used to update the specified custom object data. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-update-by-objectrecordid-and-uid)
```
 /**
  * @param uid     
  * @param objectrecordid     
  * @param objectname     
  * @param updatetype     
  * @param payload     
  * @return type Object
  */
Example:
payload = "{'field1': 'Store my field1 value', 'field2': 'Store my field2 value'}"

<cftry> 
  <cfset result = customObject.updateCustomObjectByUid (uid, objectrecordid, objectname, updatetype, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Custom Object Update By ObjectRecordId and Token
This API is used to update the specified custom object data. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-update-by-objectrecordid-and-token)
```
 /**
  * @param accesstoken     
  * @param objectrecordid     
  * @param objectname     
  * @param updatetype     
  * @param payload     
  * @return type Object
  */
Example:
payload = "{'field1': 'Store my field1 value', 'field2': 'Store my field2 value'}"

<cftry> 
  <cfset result = customObject.updateCustomObjectByToken (accesstoken, objectrecordid, objectname, updatetype, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```
##### Custom Object Delete By ObjectRecordId and UID
This API is used to remove the specified Custom Object data. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-delete-by-objectrecordid-and-uid)
```
 /**
  * @param uid     
  * @param objectrecordid     
  * @param objectname     
  * @param payload     
  * @return type Object
  */
<cftry> 
  <cfset result = customObject.deleteCustomObjectByUid (uid, objectrecordid, objectname, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Custom Object Delete By ObjectRecordId and Token
This API is used to remove the specified Custom Object data. 

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-delete-by-objectrecordid-and-token)
```
 /**
  * @param accesstoken     
  * @param objectrecordid     
  * @param objectname     
  * @param payload     
  * @return type Object
  */
<cftry> 
  <cfset result = customObject.deleteCustomObjectByToken (accesstoken, objectrecordid, objectname, payload)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

<br>

### Configuration API

Get a list of the configuration selected in the LoginRadius user account.

**List of APIs in this Section:**<br>
- [Get Configurations](#get-configurations)<br>
- [Get Server Time](#get-server-time)<br>

If you have not already initialized the config object, do so now.
```
<cfset configObject = createObject("component","lrsdk.configurationapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>
```

##### Get Configurations
[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/cloud-api/get-configuration)
```
 /**
   * @Return object of configurations.
   */
<cftry> 
  <cfset result = configObject.getConfigurations()> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Get Server Time
This API allows you to query your LoginRadius account for basic server information and server time information, which is useful when generating a SOTT token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/user-registration/infrastructure-get-server-time)
```
 /**
  * @param timedifference The time difference you would like to pass, If you do not pass difference, then the default value is 10 minutes.
  * @return type object
  */

<cftry> 
   <cfset result = configObject.getServerTime(timedifference)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

<br>

### WebHook APIs

WebHooks allow you to build or set up integrations that subscribe to certain events on LoginRadius.

**List of APIs in this Section:**<br>
- [WebHook Subscribe](#webhook-subscribe)<br>
- [Webhook Test](#webhook-test)<br>
- [Webhook Subscribed URLs](#webhook-subscribed-urls)<br>
- [WebHook Unsubscribe](#webhook-unsubscribe)<br>

If you have not already initialized the webhook object, do so now.
```
<cfset webHookObject = createObject("component","lrsdk.webhookapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>
```

##### WebHook Subscribe
API can be used to configure a WebHook on your LoginRadius site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/integrations/webhooks/webhook-subscribe)
```
 /**
  * @param targeturl 
  * @param event 
  * @return {"IsPosted": true}
  */

<cftry> 
  <cfset result = webHookObject.webHookSubscribe(targeturl, event)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Webhook Test
This API can be used to test a subscribed WebHook.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/integrations/webhooks/webhook-test)
```

 /**
  * @return {"IsAllowed": true}
  */

<cftry> 
   <cfset result = webHookObject.webHookTest()> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### Webhook Subscribed URLs
This API is used to fetch all the subscribed URLs for a particular event.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/integrations/webhooks/webhook-subscribed-urls)
```

 /**
  * @param event 
  * @return type object
  */

<cftry> 
   <cfset result = webHookObject.getWebHookSubscribedUrl( event )> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

##### WebHook Unsubscribe
This API can be used to unsubscribe a WebHook configured on your LoginRadius site.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/integrations/webhooks/webhook-unsubscribe)
```

 /**
  * @param targeturl 
  * @param event 
  * @return {"IsDeleted": true}
  */

<cftry> 
   <cfset result = webHookObject.webHookUnsubscribe( targeturl, event )> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 
```

<br>

### Social Login APIs

This API is used to manage a custom object for the user and relies on the User Entity object. If you are unsure of your Object ID, you can reach out to the support team for details on this. If you haven't already initialized the User Registration Custom Object API, do so now.


**List of APIs in this Section:**<br>
- [Access Token](#access-token)<br>
- [Validate Access Token](#validate-access-token)<br>
- [Invalidate Access Token](#invalidate-access-token)<br>
- [User Profile](#user-profile)<br>
- [Trackable Status Posting](#trackable-status-posting)<br>
- [Post Message API](#post-message-api)<br>
- [Get Trackable Status Stats](#get-trackable-status-stats)<br>
- [Trackable Status Fetching](#trackable-status-fetching)<br>
- [Shorten URL](#shorten-url)<br>
- [Get Active Session Details](#get-active-session-details)<br>
- [Album](#album)<br>
- [Audio](#audio)<br>
- [Check In](#check-in)<br>
- [Company](#company)<br>
- [Contact](#contact)<br>
- [Event](#event)<br>
- [Following](#following)<br>
- [Group](#group)<br>
- [Like](#like)<br>
- [Mention](#mention)<br>
- [Page](#page)<br>
- [Photo](#photo)<br>
- [Post](#post)<br>
- [Status Fetching](#status-fetching)<br>
- [Status Posting](#status-posting)<br>
- [Video](#video)<br>


If you have not already initialized the social object, do so now.

```
<cfset socialObject = createObject("component","lrsdk.socialloginapi").init(
       lr_api_key = "APIKEY",
       lr_api_secret = "APISECRET"
      )>
```

##### Access Token
This API Is used to translate the Request Token returned during authentication into an Access Token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/access-token)
```
 /**
  * @param access_token     
  * @return access token
  */
<cftry> 
  <cfset result = socialObject.loginradiusExchangeAccessToken( access_token )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Validate Access Token
This API validates access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/validate-access-token)
```
 /**
  * @param access_token     
  * @return access token
  */
<cftry> 
  <cfset result = socialObject.loginradiusTokenValidate( access_token )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Invalidate Access Token
This API invalidates the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/invalidate-access-token)
```
 /**
  * @param access_token     
  * @return {"isPosted": true}
  */
<cftry> 
  <cfset result = socialObject.loginradiusTokenInvalidate( access_token )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### User Profile
Get user profile by the access token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/user-profile)
```
 /**
 * @param access_token
 * @Return object of userProfile.
 */
<cftry> 
  <cfset result = socialObject.loginradiusGetUserProfiledata( access_token )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Trackable Status Posting
The Trackable Status API is used to update the status on the user's wall and return a Post ID value.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/trackable-status-posting)
```
 /**
 * @param access_token
 * @param status
 * @param title
 * @param url
 * @param imageurl
 * @param caption
 * @param description
 * @Return object
 */
<cftry> 
  <cfset result = socialObject.loginradiusTrackableStatusPosting( access_token, status, title, url, imageurl, caption, description )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Post Message API
The Message API is used to post messages to the user's contacts.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/post-message-api)
```
 /**
 * @param access_token
 * @param to
 * @param subject
 * @param message
 * @Return object
 */
<cftry> 
  <cfset result = socialObject.loginradiusSendMessagePost( access_token, to, subject, message )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Get Trackable Status Stats
The Trackable Status API is used to update the status on the user's wall and return a Post ID value.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/get-trackable-status-stats)
```
 /**
 * @param access_token
 * @param status
 * @param title
 * @param url
 * @param imageurl
 * @param caption
 * @param description
 * @Return object
 */
<cftry> 
  <cfset result = socialObject.loginradiusGetTrackableStatusStats( access_token, status, title, url, imageurl, caption, description )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Trackable Status Fetching
This API is used to retrieve a tracked post based on the passed in post ID value.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/trackable-status-fetching)
```
 /**
 * @param postid
 * @Return object
 */
<cftry> 
  <cfset result = socialObject.loginradiusTrackableStatusFetching( postid )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Shorten URL
The Shorten URL API is used to convert your URLs to the LoginRadius short URL - ish.re

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/shorten-url)
```
 /**
 * @param url
 * @Return object
 */
<cftry> 
  <cfset result = socialObject.loginradiusShortenUrl( url )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```

##### Get Active Session Details
This API is used to get all active sessions by Access Token.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/get-active-session-details)
```
 /**
 * @param access_token
 * @Return object
 */
<cftry> 
  <cfset result = socialObject.loginradiusGetActiveSessionDetail( access_token )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>
```
##### Album
Fetch the user's photo albums.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/album)
```
<cftry>
<cfset photoAlbumsResult = socialObject.loginradiusGetPhotoAlbums(access_token)>
	<cfcatch type = "LoginRadiusException"> 
         <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```
##### Audio
Fetch the user's checked in data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/audio)
```
<cftry>
<cfset getAudioResult = socialObject.loginradiusGetAudio(access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Check In
The Check-In API is used to get check Ins data from the user's social account.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/check-in)
```
<cftry>
<cfset getAudioResult = socialObject.loginradiusGetCheckins(access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Company
Fetch the user's followed companies.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/company)
```
<cftry>
<cfset followedCompaniesResult = socialObject.loginradiusGetFollowedCompanies(access_token)>
	<cfcatch type = "LoginRadiusException"> 
       <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Contact
Fetch the user's friends/contacts/followers.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/contact)
```
<cftry>
<cfset getContactsResult = socialObject.loginradiusGetContacts(access_token)>
	<cfcatch type = "LoginRadiusException"> 
       <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Event
Fetch the user's event data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/event)
```
<cftry>
<cfset getEventsResult = socialObject.loginradiusGetEvents(access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 

</cftry>

```

##### Following
Fetch the user's following data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/following)
```
<cftry>
<cfset getFollowingResult = socialObject.loginradiusGetFollowing(access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Group
Fetch the user's groups.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/group)
```
<cftry>
<cfset getGroupsResult = socialObject.loginradiusGetGroups (access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Like
Fetch the user's likes data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/like)
```
<cftry>
<cfset getLikesResult = socialObject.loginradiusGetLikes (access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Mention
Fetch the user's mentions.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/mention)
```
<cftry>
<cfset getMentionsResult = socialObject.loginradiusGetMentions(access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Page
Fetch a specified page data.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/page)
```
<cftry>
<cfset userProfileResult = socialObject.loginradiusGetPages (access_token, pageName)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Photo
Fetch the user's photos from a specific album.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/photo)
```
<cftry>
<cfset photoResult = socialObject.loginradiusGetPhotos(access_token, albumId)>
	<cfcatch type = "LoginRadiusException"> 
	  <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Post
Fetch the user's posts.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/post)
```
<cftry>
<cfset getPostsResult = socialObject.loginradiusGetPosts (access_token)>
	<cfcatch type = "LoginRadiusException"> 
    <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Status Fetching
Fetch the user's status updates.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/status-fetching)
```
<cftry>
<cfset getStatusResult = socialObject.loginradiusStatusFetching (access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

##### Status Posting
The Status API is used to update the status on the user's wall.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/status-posting)
```
<cftry>
<cfset userProfileResult = socialObject.loginradiusStatusPosting (access_token, title, url, imageurl, status, caption, description)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

- title is the title of the message (Optional)
- url is the web link of the status message (Optional)
- imageurl is the image URL of the status message (Optional)
- status is the status message text (Required)
- caption is the caption of the status message (Optional)
- description is the description of the status message (Optional)


##### Video
Fetch the user's video files.

[Try the following:](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/video/)
```
<cftry>
<cfset getVideoResult = socialObject.loginradiusGetVideo(access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

You can get a copy of the demo project from [Github](https://github.com/LoginRadius/coldfusion-sdk)