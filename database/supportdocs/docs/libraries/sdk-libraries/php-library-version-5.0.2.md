PHP Library
=====


-------

>Disclaimer<br>
<br>
>This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

<br>

## Installation

This document contains information and examples regarding the LoginRadius PHP SDK.

It presumes you have worked through the client-side implementation to setup your LoginRadius User Registration interfaces that will serve the initial registration and login process. Details on this can be found in the [getting started guide.](https://www.loginradius.com/legacy/docs/api/v2/user-registration/user-registration-getting-started-v2).


>**NOTE:**Please Make sure you have PHP version 5.6 or greater


###Importing Required Libraries
- To install LoginRadius SDK, run the following command
```
composer require loginradius/php-sdk:5.0.2
```
- After installing, you need to require Composer's autoloader using the following command:
```
require 'vendor/autoload.php'
```
**_or_**

- Download the LoginRadius SDK from [Github](https://github.com/LoginRadius/php-sdk).
- Copy the downloaded SDK into your project structure. Include the SDK files into your code
```
include_once "LoginRadiusSDK/Utility/Functions.php";
include_once "LoginRadiusSDK/LoginRadiusException.php";
include_once "LoginRadiusSDK/Clients/IHttpClient.php";
include_once "LoginRadiusSDK/Clients/DefaultHttpClient.php";
include_once "LoginRadiusSDK/CustomerRegistration/Social/SocialLoginAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Social/AdvanceSocialLoginAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Authentication/UserAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Authentication/AuthCustomObjectAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Account/AccountAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Account/CustomRegistrationDataAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Account/RoleAPI.php";
include_once "LoginRadiusSDK/CustomerRegistration/Account/CustomObjectAPI.php";
include_once "LoginRadiusSDK/Advance/WebHooksAPI.php";
include_once "LoginRadiusSDK/Advance/ConfigAPI.php";
```
Modify the config.php file in the SDK to include your LoginRadius Credentials

## Quickstart Guide

### Configuration

After successful install, you need to define the following LoginRadius Account info in your project anywhere before using the LoginRadius SDK or in the config file of your project:
```
define('APP_NAME', 'LOGINRADIUS_SITE_NAME_HERE'); // Replace LOGINRADIUS_SITE_NAME_HERE with your site name that provide in LoginRadius account.
define('API_KEY', 'LOGINRADIUS_API_KEY_HERE'); // Replace LOGINRADIUS_API_KEY_HERE with your site API key that provide in LoginRadius account.
define('API_SECRET', 'LOGINRADIUS_API_SECRET_HERE'); // Replace LOGINRADIUS_API_SECRET_HERE with your site Secret key that provide in LoginRadius account.

define('API_REQUEST_SIGNING', ''); // Pass boolean true if this option is enabled on you app.

define('PROTOCOL', 'PROXY_PROTOCOL'); // Replace PROXY_PROTOCOL with your proxy server protocoal ie http or https.
define('HOST', 'PROXY_HOST'); // Replace PROXY_HOST with your proxy server host.
define('PORT', 'PROXY_PORT'); // Replace PROXY_PORT with your proxy server port.
define('USER', 'PROXY_USER'); // Replace PROXY_USER with your proxy server username.
define('PASSWORD', 'PROXY_PASSWORD'); // Replace PROXY_PASSWORD with your proxy server password.

define('API_DOMAIN', 'DEFINE_CUSTOM_API_DOMAIN');   // Custom API Domain
```

>Replace 'LOGINRADIUS_SITE_NAME_HERE', 'LOGINRADIUS_API_KEY_HERE' and  'LOGINRADIUS_API_SECRET_HERE' in the above code with your LoginRadius Site Name, LoginRadius API Key, and Secret which you can get [here](https://www.loginradius.com/legacy/docs/api/v2/admin-console/platform-security/api-key-and-secret/). 

>API Request Signing:- define('API_REQUEST_SIGNING', true); if this option is enabled on you app. It will pass Secret key in header in API calling instead of parameter.

>Pass the **proxy configurations** if you want to **set Http Server Proxy Configuration** through your PHP SDK. Protocol, Host and port are required to set Http Server Proxy configuration (username and password are optional).

>If you have Custom API Domain then define 'API_DOMAIN' then replaced it with your custom API domain, Otherwise no need to define this option in configuration.

### Implementation

Importing/aliasing with the use operator.
```
use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;
use LoginRadiusSDK\Clients\IHttpClient;
use LoginRadiusSDK\Clients\DefaultHttpClient;
use LoginRadiusSDK\CustomerRegistration\Social\SocialLoginAPI;
use LoginRadiusSDK\CustomerRegistration\Social\AdvanceSocialLoginAPI;
use LoginRadiusSDK\CustomerRegistration\Authentication\UserAPI;
use LoginRadiusSDK\CustomerRegistration\Authentication\AuthCustomObjectAPI;
use LoginRadiusSDK\CustomerRegistration\Account\AccountAPI;
use LoginRadiusSDK\CustomerRegistration\Account\RoleAPI;
use LoginRadiusSDK\CustomerRegistration\Account\CustomRegistrationDataAPI;
use LoginRadiusSDK\CustomerRegistration\Account\CustomObjectAPI;
use LoginRadiusSDK\Advance\WebHooksAPI;
use LoginRadiusSDK\Advance\ConfigAPI;
```


Create a LoginRadius object using API & Secret key:
```
$accountObject = new AccountAPI (API_KEY, API_SECRET, array('output_format' => 'json', 'api_request_signing' => API_REQUEST_SIGNING));

```

### API Examples

#### Partial API response
We have an option to select fields(partial response) which you require as an API response.<br>
For this, you need to pass an extra parameter(optional) at the end of each API function.

- If any field passed does not exist in response, will be ignored.
- In case of nested, only root object is selectable.
- Values should be separated by the comma.

**Example:**

```

$fields= "email, username";
  try {
        $result = $accountObject->getProfileByEmail($email, $fields);
    }
    catch (LoginRadiusException $e) {
            $e->getErrorResponse();
    }
```

**Output Response:**

```
{
    UserName: 'test1213',
    Email: [ { Type: 'Primary', Value: 'test1213@sthus.com' } ]
}

```
If you are using a proxy server then create a LoginRadius object using API & Secret key & proxy server details.
Example:-
```

$userObject = new UserAPI(API_KEY, API_SECRET, array('output_format' => 'json', 'proxy'=> array('protocol' => PROTOCOL, 'host' => HOST, 'port' => PORT, 'user' => USER, 'password' => PASSWORD)));

```

#### Authentication APIs

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
- [Auth Resend Email verification](#auth-resend-email-verification)<br>
- [Auth Reset Password by Reset Token](#auth-reset-password-by-reset-token)<br>
- [Auth Reset Password by OTP](#auth-reset-password-by-otp)<br>
- [Auth Reset Password by Security Answer And Email](#auth-reset-password-by-security-answer-and-email)<br>
- [Auth Reset Password by Security Answer And Phone](#auth-reset-password-by-security-answer-and-phone)<br>
- [Auth Reset Password by Security Answer And UserName](#auth-reset-password-by-security-answer-and-username)<br>
- [Auth Set or Change UserName](#auth-set-or-change-user-name)<br>
- [Auth Update profile by Token](#auth-update-profile-by-token)<br>
- [Auth Update Security Question By Access token](#auth-update-security-question-by-access-token)<br>
- [Auth Delete Account With Email Confirmation](#auth-delete-account-with-email-confirmation)<br>
- [Auth Remove email](#auth-remove-email)<br>
- [Auth Unlink Social Identities](#auth-unlink-social-identities)<br>


If you have not already initialized the user object do so now

```
$authenticationObject = new UserAPI (API_KEY, API_SECRET, array('output_format' => 'json'));
```

##### Auth User Registration By Email
This API creates a user in the database as well as sends a verification email to the user.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-user-registration-by-email)
```
$payload = '{
"FirstName":"",
"LastName":"",
"Password" : "*********",
"Email":[
{
"Type":"Primary",
"Value":"xxx@xxxxxx.com"
}
]}';
$verification_url= ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)
$options = "";  (PreventVerificationEmail Specifying this value prevents the verification email from being sent).(OPTIONAL) 
  
try{
    $result= $authenticationObject->registerByEmail($payload, $verification_url, $email_template, $options);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth login By Email
This API retrieves a copy of the user data based on the Email.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/post-auth-login-by-email)
```
$payload =
'{
"email":"xxx@xxxxxx.com",
"password": "xxxxxxxx",
"securityanswer": ""
}';
$verification_url = ""; (OPTIONAL)
$login_url = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)
$g_recaptcha_response = ""; (OPTIONAL)

try{
    $result= $authenticationObject->authLoginByEmail($payload, $verification_url, $login_url, $email_template, $g_recaptcha_response);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth login By Username
This API retrieves a copy of the user data based on the Username.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/post-auth-login-by-username)
```
$payload =
'{
"username":"xxxxxx",
"password": "xxxxxxxx",
"securityanswer": ""
}';
$verification_url = ""; (OPTIONAL)
$login_url = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)
$g_recaptcha_response = ""; (OPTIONAL)

try{
    $result= $authenticationObject->authLoginByUsername($payload, $verification_url, $login_url, $email_template, $g_recaptcha_response);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Add Email
This API is used to add additional emails to a user's account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-add-email)
```
$access_token = "Acceess-Token";
$email = "Email-Id";
$type = "Type";
$verificationUrl = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->addEmail($access_token, $email, $type, $verification_url, $email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Forgot Password
This API is used to send the reset password url to a specified account. 

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-forgot-password)
```
$email = "xxx@xxxxxx.com";
$reset_password_url = "Reset-Password-Url";
$email_template = "";(OPTIONAL)

try{
    $result= $authenticationObject->forgotPassword($email, $reset_password_url, $email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Check Email Availability 
This API is used to check the email exists or not on your site.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-check-email-availability)
```
$email = "xxxx@xxxxxx.com";

try{
    $result= $authenticationObject->checkAvailablityOfEmail($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Check UserName Availability
This API is used to check the UserName exists or not on your site.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-check-user-name-availability)
```
$username = "xxxxxxxxxx";

try{
    $result= $authenticationObject->checkUsername($username);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Readall Profiles By Token
This API retrieves a copy of the user data based on the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-readall-profiles-by-token)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->getProfile($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Privacy Policy Accept
This API is used to update the privacy policy stored in the user's profile.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-privacy-policy-accept)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->privacyPolicyAccept($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Send Welcome Email
This API will send welcome email.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-send-welcome-email)
```
$access_token = "Access-Token";
$welcome_email_template = "Email-Template-Name"; (OPTIONAL)

try{
    $result= $authenticationObject->sendWelcomeEmail($access_token, $welcome_email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Social Identity
This API is called just before account linking API and it prevents the raas profile of the second account from getting created.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-social-identity)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->getSocialProfile($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```

##### Auth Validate Access Token
This api validates access token, if valid then returns a response with its expiry otherwise error.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/token-validate)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->checkTokenValidity($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Auth Verify Email
This API is used to verify the email of user.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-verify-email)
```
$vtoken = "Verification-Token";
$url = "Domain-Url";
$welcome_email_template = "";(optional)

try{
    $result= $authenticationObject->verifyEmail($vtoken, $url, $welcome_email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Delete Account
This API is used to delete an account by passing it a delete token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-delete-account)
```
$deletetoken = "Delete-Token";

try{
    $result= $authenticationObject->deleteAccount($deletetoken);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Access Token Invalidate
This api call invalidates the active access_token or expires an access token's validity.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/token-invalidate)

```
$access_token = "Acceess-Token";

try{
    $result= $authenticationObject->invalidateTokenByAccessToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Get Security Questions By Access Token
This API is used to retrieve the list of questions on the basis of token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-accesstoken)

```
$access_token = "Acceess-Token";

try{
    $result= $authenticationObject->getSecurityQuestionsByAccessToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Get Security Questions By Email
This API is used to retrieve the list of questions on the basis of email.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-email)

```
$email = "Email-Id";

try{
    $result= $authenticationObject->getSecurityQuestionsByEmail($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Get Security Questions By User Name
This API is used to retrieve the list of questions on the basis of username.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-username)

```
$username = "username";

try{
    $result= $authenticationObject->getSecurityQuestionsByUserName($username);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Get Security Questions By Phone
This API is used to retrieve the list of questions on the basis of phone.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-security-question-by-phone)

```
$phone = "Phone-Id";

try{
    $result= $authenticationObject->getSecurityQuestionsByPhone($phone);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Auth Verify Email by OTP
This API is used to verify the email of user when the OTP Email verification flow is enabled.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-verify-email-by-otp)
```
$payload = '{
"otp": "",
"email": "",
"SecurityAnswer": {
"db7****8a73e4******bd9****8c20": "Answer"
},
"qq_captcha_ticket": "",
"qq_captcha_randstr": "",
"g-recaptcha-response ": ""
}'
$url = "domain-name";
$welcome_email_template = "";(optional)

try{
    $result= $authenticationObject->verifyEmailByOtp($payload, $url, $welcome_email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Change Password
This API is used to change the accounts password based on the previous password.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-change-password)
```
$access_token = "Access-Token";
$old_password = "Old-Password";
$new_password = "New-Password";

try{
    $result= $authenticationObject->changeAccountPassword($access_token, $old_password, $new_password);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Auth Link Social Identities
This API is used to link up a social provider account with the specified account based on the access token and the social providers user access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-link-social-identities/)
```
$access_token = "Acceess-Token";
$candidate_token = "Candidate-Token";

try{
    $result= $authenticationObject->accountLink($access_token, $candidate_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Resend Email Verification
This API resends the verification email to the user.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-resend-email-verification)
```
$email = "xxxxx@xxxxx.com"
$verification_url = "Verification-Url" (optional)
$email_template = "Email-Template" (optional)

try{
    $result= $authenticationObject->resendEmailVerification($email, $verification_url, $email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Reset Password by Reset Token
This API is used to set a new password for the specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-reset-token)
```
$reset_token = "Reset-Token";
$password = "Password";
$welcome_email_template = ""; (OPTIONAL)
$reset_password_email_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->resetPassword($reset_token, $password, $welcome_email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Reset Password by OTP
This API is used to set a new password for the specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-otp)
```
$password  = "Password";
$otp  = "Otp";
$email  = "Email-Id";
$welcome_email_template = ""; (OPTIONAL)
$reset_password_email_template  = ""; (OPTIONAL)

try{
    $result= $authenticationObject->resetPasswordByOtp($password, $otp, $email, $welcome_email_template, $reset_password_email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Reset Password by Security Answer And Email
This API is used to reset password for the specified account by security question and email.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-email)
```
$payload = '{
"securityanswer": {
"cb7*******3e40ef8a****01fb****20": "Answer"
},
"email": "",
"password": "xxxxxxxxxx",
"resetpasswordemailtemplate": ""
}';

try{
    $result= $authenticationObject->resetPasswordByEmail($payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Auth Reset Password by Security Answer And Phone
This API is used to reset password for the specified account by security question and phone.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-phone)

```
$payload = '{
"securityanswer": {
"cb7*******3e40ef8a****01fb****20": "Answer"
},
"phone": "",
"password": "xxxxxxxxxx",
"resetpasswordemailtemplate": ""
}';

try{
    $result= $authenticationObject->resetPasswordByPhone($payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Auth Reset Password by Security Answer And Username
This API is used to reset password for the specified account by security question and username.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-reset-password-by-username)

```
$payload = '{
"securityanswer": {
"cb7*******3e40ef8a****01fb****20": "Answer"
},
"phone": "",
"password": "xxxxxxxxxx",
"resetpasswordemailtemplate": ""
}';

try{
    $result= $authenticationObject->resetPasswordByUserName($payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Set or Change Username
This API is used to set or change UserName by access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-set-change-user-name)
```
$access_token = "Acceess-Token";
$username = "Username";

try{
    $result= $authenticationObject->changeUsername($access_token, $username);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Update Profile By token
This API is used to update the user's profile by passing the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-update-profile-by-token)
```
$access_token = "Acceess-Token";
$payload = '{
"Prefix":"",
"FirstName":"Joe",
"MiddleName":null,
"LastName":"Smith",
"BirthDate":"10-12-1985",
"Gender":"M",
"Website":null
}';
$verification_url = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)
$sms_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->updateProfile($access_token, $payload, $verification_url, $email_template, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Update Security Question By Access token
This API is used to update security questions by the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-security-question-by-access-token)

```
$access_token = "Acceess-Token";
$payload = '{
"securityquestionanswer": {
"db7****8a73e4******bd9****8c20": "Answer"
}
}';

try{
    $result= $authenticationObject->updateSecurityQuestionByAccessToken($access_token, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Delete Account With Email Confirmation
This API deletes a user account by passing the user's access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-delete-account-with-email-confirmation)
```
$access_token = "Acceess-Token";
$delete_url = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->deleteAccountByEmailConfirmation($access_token, $delete_url, $email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Remove Email
This API is used to remove additional emails from a user's account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-remove-email)
```
$access_token = "Acceess-Token";
$email = "xxx@xxxxxxx.com"

try{
    $result= $authenticationObject->removeEmail($access_token, $email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Auth Unlink Social Identities
This API is used to unlink up a social provider account with the specified account based on the access token and the social providers user access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/auth-unlink-social-identities)
```
$access_token = "Acceess-Token";
$provider_id = "Provider-Id";
$provider = "Provider";

try{
    $result= $authenticationObject->accountUnlink($access_token, $id, $provider);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
<br>

#### Phone Authentication API


Get list of phone authentication API's.

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

##### Phone Login
This API retrieves a copy of the user data based on the Phone.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/post-auth-login-by-phone)
```
$payload =
'{
"phone":"xxxxxxxxxx",
"password": "xxxxxxxx",
"securityanswer": ""
}';
$login_url = ""; (OPTIONAL)
$sms_template = ""; (OPTIONAL)
$g_recaptcha_response = ""; (OPTIONAL)


try{
    $result= $authenticationObject->authLoginByPhone($payload, $login_url, $sms_template, $g_recaptcha_response);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```

##### Phone Forgot Password By OTP
This API is used to send the OTP to reset the account password.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-forgot-password-by-otp)
```
$phone = "Phone-Id";
$sms_template = "Sms-Template-Name"; (OPTIONAL)

try{
    $result= $authenticationObject->forgotPasswordByOtp($phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Resend OTP
This API is used to resend a verification OTP to verify a user's Phone Number.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-resend-otp)
```
$phone = "Phone-Id";
$sms_template = "Sms-Template-Name"; (OPTIONAL)

try{
    $result= $authenticationObject->resendOTP($phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Resend OTP By Token
This API is used to resend a verification OTP to verify a user's Phone Number in cases in which an active token already exists.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-resend-otp-by-token)
```
$access_token = "Access-Token";
$phone = "Phone-Id";
$sms_template = "Sms-Template-Name"; (OPTIONAL)

try{
    $result= $authenticationObject->resendOTPByToken($access_token, $phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Phone User Registration by SMS
This API registers the new users into your Cloud Directory and triggers the phone verification process.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-user-registration-by-sms)
```
$payload = '{
"Prefix":"",
"FirstName":"",
"LastName":"",
"BirthDate":"10-12-1985",
"Gender":"M",
"Website":null,
"Password" : "*********",
"Email":[
{
"Type":"Primary",
"Value":"xxxxx@xxxxx.com"
}],
"PhoneId":"xxxxxxxxxxxx"
 }';
 $verification_url = "Verification-Url"; (OPTIONAL)
 $sms_template = "Sms-Template-Name"; (OPTIONAL)


try{
    $result= $authenticationObject->registerByPhone($payload, $verification_url, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Number Availability
This API is used to check the Phone Number exists or not on your site.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-number-availability)
```
$phone = "Phone-Id";

try{
    $result= $authenticationObject->checkAvailablityOfPhone($phone);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Number Update
This API is used to update the login Phone Number of users.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-number-update)
```
$access_token = "Access-Token";
$phone = "Phone-Id";
$sms_template = "Sms-Template-Name"; (OPTIONAL)

try{
    $result= $authenticationObject->updatePhone($access_token, $phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Reset Password By OTP
This API is used to reset the password.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-reset-password-by-otp)
```
$phone = "The-Registered-Phone-Number";
$otp = "The-Verification-Code";
$password = "New-Password";
$sms_template = "Sms-Template-Name";  (OPTIONAL)
$reset_password_email_template = "Reset-Password-Email-Template"; (OPTIONAL)

try{
    $result= $authenticationObject->phoneResetPasswordByOtp($phone, $otp, $password, $sms_template, $reset_password_email_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Verify OTP
This API is used to validate the verification code sent to verify a user's phone number.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-verify-otp)
```
$otp = 'xxxxxx';
$phone = 'xxxxxxxxxx';
$sms_template = "Sms-Template-Name";  (OPTIONAL)

try{
    $result= $authenticationObject->verifyOTP($otp, $phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Verification OTP by token
This API is used to consume the verification code sent to verify a user's phone number. Use this call for front-end purposes in cases where the user is already logged in by passing the user's access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-verify-otp-by-token)
```
$access_token = 'xxxxxxxxxxxx';
$otp = 'xxxxxx';
$sms_template = "Sms-Template-Name";  (OPTIONAL)


try{
    $result= $authenticationObject->verifyOTPByToken($access_token, $otp, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Remove Phone ID by Access Token
This API is used to delete the Phone ID on a user's account via the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/remove-phone-id-by-access-token)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->deletePhoneIdByAccessToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
<br>

#### Multi Factor Authentication [MFA] API

This Multi Factor Authentication [MFA] APIs are for managing Multi-Factor-Authentication (MFA). Please note that this feature is not enabled by default. Contact our support team for more details.

**List of APIs in this Section:**<br>
- [MFA Email Login](#mfa-email-login)<br>
- [MFA UserName Login](#mfa-username-login)<br>
- [MFA Phone Login](#mfa-phone-login)<br>
- [MFA Validate Access Token](#mfa-validate-access-token)<br>
- [MFA Backup Code by Access Token](#mfa-backup-code-by-access-token)<br>
- [Reset Backup Code By Access Token](#reset-backup-code-by-access-token)<br>
- [MFA Validate Backup code](#mfa-validate-backup-code)<br>
- [MFA Validate OTP](#mfa-validate-otp)<br>
- [MFA Validate Google Auth Code](#mfa-validate-google-auth-code)<br>
- [MFA Update Phone Number](#mfa-update-phone-number)<br>
- [MFA Update Phone Number By Token](#mfa-update-phone-number-by-token)<br>
- [Update MFA By Google Auth Code](#update-mfa-by-google-auth-token)<br>
- [Update MFA Setting](#update-mfa-setting)<br>
- [MFA Reset Google Authenticator by Token](#mfa-reset-google-authenticator-by-token) <br>
- [MFA Reset SMS Authenticator by Token](#mfa-reset-sms-authenticator-by-token) <br>
- [Multi Factor Re-Authenticate](#multi-factor-re-authenticate) <br>
- [Validate MFA by Google Authenticator Code](#validate-mfa-by-google-authenticator-code) <br>
- [Validate MFA by Backup Code](#validate-mfa-by-backup-code) <br>
- [Validate MFA by OTP](#validate-mfa-by-otp) <br>
- [Validate MFA by Password](#validate-mfa-by-password) <br>


##### MFA Email Login
This API can be used to login by emailid on a Multi-factor authentication enabled LoginRadius site.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-email-login)

```
$payload =
'{
"email":"xxxx@xxxxxxx.com",
"password": "xxxxxx"
}';
$login_url = ""; (OPTIONAL)
$verification_url = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaEmailLogin($payload, $login_url, $verification_url, $email_template, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA UserName Login
This API can be used to login by username on a Multi factor authentication enabled LoginRadius site.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-user-name-login)

```
$payload =
'{
"username":"xxxxxxx",
"password": "xxxxxx"
}';
$verification_url = ""; (OPTIONAL)
$email_template = ""; (OPTIONAL)
$sms_template_2fa = ""; (OPTIONAL)


try{
    $result= $authenticationObject->mfaUserNameLogin($payload, $login_url, $verification_url, $email_template, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### MFA Phone Login
This API is used to log in by phone on a Multi-factor authentication enabled LoginRadius site.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-phone-login)

```
$payload =
'{
"phone":"xxxxxxx",
"password": "xxxxxx"
}';
$login_url = ""; (OPTIONAL)
$verification_url = ""; (OPTIONAL)
$sms_template = ""; (OPTIONAL)
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaPhoneLogin($payload, $login_url, $verification_url, $sms_template, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Validate Access Token
This API is used to configure the Multi-factor authentication after login by using the access_token when MFA is set as optional.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-by-token)

```
$access_token = "Access-Token";
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaValidateAccessToken($access_token, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### MFA Backup Code by Access Token
This API is used to get a set of backup codes via access_token to allow the user login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/backup-code-by-token)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->getBackupCodeForLoginbyAccessToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Reset Backup Code By Access Token
API is used to reset the backup codes on a given account via the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/reset-backup-code-by-token)
```
$access_token = "Access-Token";

try{
    $result= $authenticationObject->resetBackupCodebyAccessToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Validate Backup Code
This API is used to validate the backup code provided by the user and if valid, we return an access token allowing the user to login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/validate-backup-code)
```
$second_factor_auth_token = "Second-factor-authentication-token";
$backupcode = 'Backup-code-for-login';

try{
    $result= $authenticationObject->getLoginbyBackupCode($second_factor_auth_token, $backupcode);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Validate OTP
This API is used to login via Multi-factor authentication by passing the One Time Password received via SMS.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-verify-otp)

```
$second_factor_auth_token = "Second-factor-authentication-token";
$payload = '{
"otp": "",
"SecurityAnswer": {
  "db7****8a73e4******bd9****8c20": "Answer"
},
"qq_captcha_ticket": "",
"qq_captcha_randstr": "",
"g-recaptcha-response ": ""
}';
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaValidateOtp($second_factor_auth_token, $payload, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Validate Google Auth Code
This API is used to login via Multi-factor-authentication by passing the google authenticator code.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-verify-google-authenticator-code)

```
$second_factor_auth_token = "Second-factor-authentication-token";
$google_auth_code = "xxxxxxxxxx";
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaValidateGoogleAuthCode($second_factor_auth_token, $google_auth_code, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Update Phone Number
This API is used to update (if configured) the phone number by sending the verification OTP.
[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-update-phone-number)

```
$second_factor_auth_token = "Second-factor-authentication-token";
$phoneno2fa = 'xxxxxxxxxx';
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaUpdatePhoneNo($second_factor_auth_token, $phoneno2fa, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Update Phone Number By Token
This API is used to update the Multi-factor authentication phone number by sending the verification OTP.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-update-phone-number-by-token)

```
$access_token = "Access-Token";
$phoneno2fa = 'xxxxxx';
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaUpdatePhoneNoByToken($access_token, $phoneno2fa, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Update MFA By Google Auth Code
This API is used to Enable Multi-factor authentication by access token on user login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-mfa-by-access-token)

```
$access_token = "Access-Token";
$google_auth_code = "xxxxxxxxx";
$sms_template = "";(OPTIONAL)

try{
    $result= $authenticationObject->updateMfaByGoogleAuthCode($access_token, $google_auth_code, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Update MFA Setting
This API is used to trigger the Multi-factor authentication settings after login for secure actions.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-mfa-setting)

```
$access_token = "Access-Token";
$payload = '{
"otp": "",
"SecurityAnswer": {
"db7****8a73e4******bd9****8c20": "Answer"
},
"qq_captcha_ticket": "",
"qq_captcha_randstr": "",
"g-recaptcha-response ": ""
}';
$sms_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->updateMfaByOtp($access_token, $payload, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Reset Google Authenticator by Token
This API Resets the Google Authenticator configurations on a given account via the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-google-authenticator-by-token)
```
$access_token = "Access-Token";
$googleauthenticator  = true; // pass boolean(true) to remove Google Authenticator

try{
    $result= $authenticationObject->resetGoogleAuthenticatorByToken($access_token, $googleauthenticator);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### MFA Reset SMS Authenticator by Token
This API resets the SMS Authenticator configurations on a given account via the access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-sms-authenticator-by-token)
```
$access_token = "Access-Token";
$otpauthenticator = true;  //pass boolean(true) to remove SMS Authenticator


try{
    $result= $authenticationObject->resetSMSAuthenticatorByToken($access_token, $otpauthenticator);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Multi Factor Re-Authenticate
This API is used to trigger the Multi-Factor Autentication workflow for the provided access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/re-auth-2fa)
```
$access_token = "Access-Token";
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->mfaReAuthentiation($access_token, $$sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Validate MFA by Google Authenticator Code
This API is used to re-authenticate via Multi-factor-authentication by passing the google authenticator code.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/re-authentication/mfa/re-auth-by-google-authenticator-code/)
```
$access_token = "Access-Token";
$google_authenticator = 'xxxxxxxxxx';

try{
    $result= $authenticationObject->validateMfaByGoogleAuthCode($access_token, $google_authenticator);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Validate MFA by Backup Code
This API is used to re-authenticate by set of backup codes via access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/validate-mfa-by-backup-code)
```
$access_token = "Access-Token";
$backup_code = 'xxxxxxxx';

try{
    $result= $authenticationObject->validateMfaByBackupCode($access_token, $backup_code);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Validate MFA by OTP
This API is used to re-authenticate via Multi-factor authentication by passing the One Time Password received via SMS.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/re-authentication/mfa/re-auth-by-otp/)
```
$access_token = "Access-Token";
$payload = '{
"otp": "",
"SecurityAnswer": {
  "db7****8a73e4******bd9****8c20": "Answer"
},
"qq_captcha_ticket": "",
"qq_captcha_randstr": "",
"g-recaptcha-response ": ""
}';
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->validateMfaByOtp($access_token, $payload, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Validate MFA by Password
This API is used to re-authenticate via Multi-factor-authentication by passing the password.
[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/re-authentication/re-auth-by-password)
```
$access_token = "Access-Token";
$payload = '{
"Password": "",
"SecurityAnswer": {
  "db7****8a73e4******bd9****8c20": "Answer"
},
"qq_captcha_ticket": "",
"qq_captcha_randstr": "",
"g-recaptcha-response ": ""
}';
$sms_template_2fa = ""; (OPTIONAL)

try{
    $result= $authenticationObject->validateMfaByPassword($access_token, $payload, $sms_template_2fa);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
#### Password Less login APIs

**List of APIs in this Section:**<br>
- [Passwordless Login By Email](#passwordless-login-by-email)<br>
- [Passwordless Login By UserName](#passwordless-login-by-username)<br>
- [Passwordless Login Verification](#passwordless-login-verification)<br>
- [Phone Send One Time Passcode](#phone-send-one-time-passcode)<br>
- [Phone Login Using OTP](#phone-login-using-otp)<br>

##### Passwordless Login By Email
This API is used to send a Passwordless Login verification link to the provided Email ID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/passwordless-login-by-email)
```
$email = "Email-Id";
$verificationurl = ""; (OPTIONAL)
$passwordlesslogintemplate = ""; (OPTIONAL)

try{
    $result= $authenticationObject->passwordLessLoginByEmail($email, $verificationurl, $passwordlesslogintemplate);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```
##### Passwordless Login By UserName
This API is used to send a Passwordless Login Verification Link to a user by providing their UserName.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/passwordless-login-by-username)
```
$username = "username";
$verificationurl = ""; (OPTIONAL)
$passwordlesslogintemplate = ""; (OPTIONAL)


try{
    $result= $authenticationObject->passwordLessLoginByUserName($username, $verificationurl, $passwordlesslogintemplate);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Passwordless Login Verification
This API is used to verify the Passwordless Login verification link.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/passwordless-login-verification)
```
$verificationtoken = "";
$welcomeemailtemplate = ""; (OPTIONAL)

try{
    $result= $authenticationObject->passwordLessLoginVerification($verificationtoken, $welcomeemailtemplate);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Send One Time Passcode
API can be used to send a One-time Passcode (OTP) provided that the account has a verified PhoneID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-user-registration-by-sms)
```
$phone = "";
$sms_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->phoneSendOtp($phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Phone Login Using OTP
This API verifies an account by OTP and allows the user to login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-login-using-one-time-passcode)
```
$payload = '{
"phone": "",
"otp": "",
"securityanswer": {
  "db7****8a73e4******bd9****8c20": "Answer"
},
"g-recaptcha-response": "",
"qq_captcha_ticket": "",
"qq_captcha_response": ""
}';
$sms_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->phoneLoginByOtp($payload, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

####Smart login APIs

**List of APIs in this Section:**<br>
- [Smart Login By Email](#smart-login-by-email) <br>
- [Smart Login By Username](#smart-login-by-username) <br>
- [Smart Login Ping](#smart-login-ping) <br>
- [Smart Login Verify Token](#smart-login-verify-token) <br>

##### Smart Login By Email
This API sends a Smart Login link to the user's Email Id.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-by-email)
```
$clientguid = "";
$email = "";
$smartloginemailtemplate = ""; (OPTIONAL)
$redirecturl  = ""; (OPTIONAL)

try{
    $result= $authenticationObject->smartLoginbyEmail($clientguid, $email, $smartloginemailtemplate, $welcomeemailtemplate, $redirecturl);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Smart Login By Username
This API sends a Smart Login link to the user's Email Id.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-by-username)
```
$clientguid = "";
$username = "";
$smartloginemailtemplate = ""; (OPTIONAL)
$welcomeemailtemplate = ""; (OPTIONAL)
$redirecturl = ""; (OPTIONAL)

try{
    $result= $authenticationObject->smartLoginbyUserName($clientguid, $username, $smartloginemailtemplate, $welcomeemailtemplate,$redirecturl);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Smart Login Ping
This API is used to check if the Smart Login link has been clicked or not.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-ping)
```
$clientguid = "";

try{
    $result= $authenticationObject->smartLoginPing($clientguid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Smart Login Verify Token
This API verifies the provided token for Smart Login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/smart-login-verify-token)
```
$verificationtoken = "";
$welcomeemailtemplate = ""; (OPTIONAL)

try{
    $result= $authenticationObject->smartLoginVerifyToken($verificationtoken, $welcomeemailtemplate);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
####One Touch Login APIs

**List of APIs in this Section:**<br>
- [One Touch Login by Email](#one-touch-login-by-email)<br>
- [One Touch Login by Phone](#one-touch-login-by-phone)<br>
- [One Touch OTP Verification](#one-touch-otp-verification)<br>

##### One Touch Login by Email
This API is used to send a link to a specified email for a fricitonless login/registration.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-login-by-email)
```
$payload= '{
  "clientguid": "",
  "email": "",
  "name": "",
  "qq_captcha_ticket": "",
  "qq_captcha_randstr": "",
  "g-recaptcha-response ": ""
}';
$redirecturl = ""; (OPTIONAL)
$onetouchloginemailtemplate = ""; (OPTIONAL)
$welcomeemailtemplate = ""; (OPTIONAL)

try{
    $result= $authenticationObject->oneTouchLoginByEmail($payload, $redirecturl, $onetouchloginemailtemplate, $welcomeemailtemplate);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### One Touch Login By Phone
This API is used to send one time password to a given phone number for a frictionless login/registration.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-login-by-phone)
```
$payload = '{
  "phone": "",
  "name": "",
  "qq_captcha_ticket": "",
  "qq_captcha_randstr": "",
  "g-recaptcha-response ": ""
}';
$smstemplate = ""; (OPTIONAL)

try{
    $result= $authenticationObject->oneTouchLoginByPhone($payload, $smstemplate);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### One Touch OTP Verification
This API is used to verify the otp for One Touch Login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-verify-otp)
```
$otp  = "xxxxxx";
$phone = "xxxxxxxxxx"; 
$sms_template = ""; (OPTIONAL)

try{
    $result= $authenticationObject->oneTouchOtpVerification($otp, $phone, $sms_template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Account APIs

The Account Management APIs are used to manage a user's account.

These calls require the API Key and API Secret and often the User's Account UID(Unified Identifier) to perform an operation.

For this reason, these APIs are considered to be for back-end purposes.

**List of APIs in this Section:**<br>
- [Account Create](#account-create)<br>
- [GetEmail Verification Token](#get-email-verification-token)<br>
- [Get Forgot Password Token](#get-forgot-password-token)<br>
- [Account Identities By Email](#account-identities-by-email)<br>
- [Account Impersonation API](#account-impersonation-api)<br>
- [Account Password](#account-password)<br>
- [Account Profiles By Email](#account-profiles-by-email)<br>
- [Account Profiles By UserName](#account-profiles-by-user-name)<br>
- [Account Profiles By Phone ID](#account-profiles-by-phone-id)<br>
- [Account Profiles By UID](#account-profiles-by-uid)<br>
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

If you have not already initialized the user object do so now

```
$accountObject = new AccountAPI (API_KEY, API_SECRET, array('output_format' => 'json', 'api_request_signing' => API_REQUEST_SIGNING));
```

##### Account Create
This API is used to create an account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-create)
```
$payload  = '{
"FirstName":"",
"MiddleName":null,
"LastName":"",
"NickName":null,
"ProfileName":null,
"BirthDate":"10-12-1985",
"Gender":"M",
"EmailVerified":"true",
"Password" : "*********",
"Email":[
{
"Type":"Primary",
"Value":"xxxxx@xxxxx.com"
},
]}';

try{
    $result = $accountObject->create($payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Get Email Verification Token
This API Returns an Email Verification token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/email-verification-token)
```
$email = "Email-Id";

try{
    $result = $accountObject->getEmailVerificationToken($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Get Forgot Password Token
This API Returns a forgot password token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/forgot-password-token)
```
$email = "Email-Id";

try{
    $result = $accountObject->getForgotPasswordToken($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Identities By Email
This API is used to retrieve all of the identities (UID and Profiles), associated with a specified email.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-identities-by-email)
```
$email = "Email-Id";

try{
    $result = $accountObject->getIdentitiesByEmail($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Impersonation API
The API is used to get LoginRadius access token based on UID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/impersonation-api)
```
$uid = 'xxxxxxxxx';

try{
    $result = $accountObject->getAccessTokenByUid($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Password
This API is use to retrieve the hashed password of a specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-password)
```
$uid = 'xxxxxxxxxxx';

try{
    $result = $accountObject->getHashPassword($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Profiles By Email
This API is used to retrieve all of the profile data, associated with the specified account by email.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-profiles-by-email)
```
$email = 'xxxx@xxxxxx.com';

try{
    $result = $accountObject->getProfileByEmail($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Profiles By UserName
This API is used to retrieve all of the profile data associated with the specified account by user name.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-profiles-by-username)
```
$username = 'xxxxxxxxx';

try{
    $result = $accountObject->getProfileByUsername($username);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Profiles By Phone
This API is used to retrieve all of the profile data, associated with the account by phone number.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/phone-profile-by-phoneid)
```
$phone = 'xxxxxxxxxxxxx';

try{
    $result = $accountObject->getProfileByPhone($phone);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Profiles By Uid
This API is used to retrieve all of the profile data, associated with the account by UID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-profiles-by-uid)
```
$uid = 'xxxxxxxxxx';

try{
    $result = $accountObject->getProfileByUid($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Set Password
This API is used to set the password of an account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-set-password)
```
$uid = 'xxxxxx';
$password = 'xxxxxxxxxx';

try{
    $result = $accountObject->setPassword($uid, $password);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Update 
This API is used to update the information of existing account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-update)
```
$uid = "xxxxxxxxxxx";
$payload = '{
"Prefix":"",
"FirstName":"",
"MiddleName":null,
"LastName":"",
"Suffix":null,
"FullName":"",
"NickName":null,
"ProfileName":null,
"BirthDate":"10-12-1985",
"Gender":"M",
"Website":null
}';

try{
    $result = $accountObject->update($uid, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Update Security Question
This API is used to update security questions configuration on an existing account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/update-security-question-configuration)
```
$uid = "xxxxxxxxx";
$payload = '{
"securityquestionanswer": {
"questionid1": "value1",
"questionid2": "value1"
}
}';

try{
    $result = $accountObject->updateSecurityQuestionByUid($uid, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Invalidate Verification Email
This API is used to invalidate the Email Verification status on an account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-invalidate-verification-email)
```
$uid = "xxxxxxxx";
$data = true; (boolean type) if have you no body parameters

try{
    $result = $accountObject->invalidateEmail($uid, $data);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Email Delete
Use this API to Remove emails from a user Account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-email-delete)
```
$uid = "xxxxxxxxx";
$email = "xxxx@xxxxxxxx.com";

try{
    $result = $accountObject->removeEmailByUidAndEmail($uid, $email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Delete 
This API deletes the Users account and allows them to re-register for a new account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-delete)
```
$uid = 'xxxxxxxx';

try{
    $result= $accountObject->delete($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Backup Code By UID
This API is used to get a set of backup codes to allow the user login.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/backup-code-by-uid)
```
$uid = 'xxxxxxxx';

try{
    $result = $accountObject->mfaGetBackupCodeByUid($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Reset Backup Code By UID
This API is used to reset the backup codes on a given account via the UID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/reset-backup-code-by-uid)
```
$uid = 'xxxxxxxx';

try{
    $result = $accountObject->mfaResetBackupCodeByUid($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### MFA Reset Google Authenticator By UID
This API resets the Google Authenticator configurations on a given account via the UID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-google-authenticator-by-uid)
```
$uid = 'xxxxxxxx';
$googleauthenticator = true; (pass boolean true to remove Google Authenticator).

try{
    $result = $accountObject->mfaResetGoogleAuthenticatorByUid($uid, $googleauthenticator);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```

##### MFA Reset SMS Authenticator By UID
This API resets the SMS Authenticator configurations on a given account via the UID.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-reset-sms-authenticator-by-uid)
```
$uid = 'xxxxxxxx';
$otpauthenticator = true;  (pass boolean true to remove SMS Authenticator).

try{
    $result = $accountObject->mfaResetSMSAuthenticatorByUid($uid, $otpauthenticator);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Reset phone ID verification
This API Allows you to reset the phone no verification of an end users account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/reset-phone-verification)
```
$uid = 'xxxxxxxx';
$data = true; (boolean type) if you have no body data parameters
* example :-  $accountObject->resetPhoneIdVerification($uid, true);

try{
    $result = $accountObject->resetPhoneIdVerification($uid, $data);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Account Email Insert or Update
This API is used to insert or update email by uid.
```
$uid = 'xxxxxxxx';
$payload = '{
"Email" : [
{   
"type" : "Primary", 
"Value": "example@example.com"
}]}';

try{
    $result = $accountObject->updateOrInsertEmailByUid($uid, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Generate SOTT Token
This API allows you to generate SOTT with a given expiration time.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/generate-sott-token/)
```
$time_difference = "10";   // The time difference you would like to pass, If you not pass difference then the default value is 10 minutes

try{
    $result = $accountObject->generateSOTT($time_difference);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Roles Management API

The Roles Management APIs allows for a quick and easy way to define roles and assign them to users.

**List of APIs in this Section:**<br>
- [Roles Create](#roles-create)<br>
- [Get Context](#get-context)<br>
- [Roles List](#roles-list)<br>
- [Get Roles By UID](#get-roles-by-uid)<br>
- [Add Permission To Role](#add-permissions-to-role)<br>
- [Assign Roles By UID](#assign-roles-by-uid)<br>
- [Upsert Context](#upsert-context)<br>
- [Delete role](#delete-role)<br>
- [Unassign Roles by UID](#unassign-roles-by-uid)<br>
- [Remove permissions](#remove-permissions)<br>
- [Delete Context](#delete-context)<br>
- [Delete role from context](#delete-role-from-context)<br>
- [Delete permissions from context](#delete-permissions-from-context)<br>


If you still not created Role object
```
$roleObject = new RoleAPI (API_KEY, API_SECRET, array('output_format' => 'json'));
```

##### Roles Create
This API creates a role with permissions.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-create)
```

$roles = '{"Roles":[
{"Name":"Administrator",
"Permissions":{"Edit":true, "Manage":true}}]}';

try{
    $result = $roleObject->create($roles);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```


##### Get Context
This API Gets the contexts that have been configured and the associated roles and permissions.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-get-context)
```
$uid = "xxxxxxxx";

try{
    $result = $roleObject->getContext($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Roles List
This API retrieves the complete list of created roles with permissions of your app.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-list)
```

try{
    $result = $roleObject->get();
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```


##### Get Roles By UID
API is used to retrieve all the assigned roles of a particular User.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-by-uid)
```
$uid = 'xxxxxx';

try{
    $result = $roleObject->getAccountRolesByUid($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Add Permission To Role
This API is used to add permissions to a given role

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-add-permissions-to-role)
```
$role = 'xxxxxx';
$permissions = '{"Permissions":["EditUser","DeleteUser"]}';

try{
    $result = $roleObject->addPermission($role, $permissions);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Assign Roles By UID
This API is used to assign your desired roles to a given user.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-assign-to-user)
```
$uid = 'xxxxxx';
$data = '{"Roles":["Role1","Role2"]}';

try{
    $result = $roleObject->assignRolesByUid($uid, $data);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Upsert Context
This API creates a Context with a set of Roles.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-create-context)
```
$uid = "xxxxxxx";
$payload = '{
  "rolecontext": [
    {
      "context": "Home",
      "roles": ["admin","user"],
      "additionalpermissions": ["X","Y","Z"],
      "expiration": "07/15/2018 8:30:08 AM"
    },
    {
      "context": "Work",
      "roles": ["admin"],
      "additionalpermissions": ["X","Y","Z"],
      "expiration": "07/15/2018 8:30:08 AM"
    }
  ]
}';

try{
    $result = $roleObject->upsertContext($uid, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Delete Role
This API is used to delete a role.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-delete-role)
```
$role = "Name-Of-Role"; 

try{
    $result = $roleObject->delete($role);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Unassign Roles by UID
This API is used to unassign roles from a user.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-unassign-to-user)
```
$uid = "xxxxxx";
$payload = '{"Roles":["Role1","Role2"]}';

try{
    $result = $roleObject->deleteAccountRoles($uid, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Remove Permissions
API is used to remove permissions from a role.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/account-remove-permissions)
```
$role = 'Role-Name';
$permissions = '{"Permissions": ["Edit User", "Delete User"]}';

try{
    $result = $roleObject->removePermission($role, $permissions);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Delete Context
This API Deletes the specified Role Context.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-delete-context)
```
$uid = "xxxxxxx";
$roleContextName = "";

try{
    $result = $roleObject->deleteContextbyContextName($uid, $roleContextName);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Delete Roles From Context
This API Deletes the specified Role from a Context.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-delete-context-role)
```
$uid = "xxxxx";
$roleContextName  = "";
$roles = '{"roles": ["admin"]}';

try{
    $result = $roleObject->deleteRoleFromContext($uid, $roleContextName, $roles);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Delete permissions from context
This API Deletes Additional Permissions from Context.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/roles-delete-context-permission)
```
$uid = "xxxxxx";
$roleContextName = "";
$additionalPermission = '{"additionalpermissions": ["X"]}';

try{
    $result = $roleObject->deleteAdditionalPermissionFromContext($uid, $roleContextName, $additionalPermission);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Configuraton API

Get list of configuration selected in LoginRadius user account.

- [Get Configurations](#get-configurations)<br>
- [Get Server Time](#get-server-time)<br>

##### Get Configurations
This API is used to get the configurations which are set in the LoginRadius Admin Console for a particular LoginRadius site/environment.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/configuration/get-configurations)
```

try{
    $result = $configObject->getConfigurationList();
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Get Server Time
This API allows you to query your LoginRadius account for basic server information and server time information which is useful when generating an SOTT token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/configuration/get-server-time)
```
$time_difference = '10';  // The time difference you would like to pass, If you not pass difference then the default value is 10 minutes.

try{
    $result = $configObject->getServerTime($time_difference);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Social APIs

The following documentation section presumes you have worked through the client-side implementation to setup your LoginRadius Social Interfaces.

**List of APIs in this Section:**<br>
- [Access Token](#access-token)<br>
- [User Profile](#user-profile)<br>
- [Album](#album)<br>
- [Photo](#poto)<br>
- [Checkin](#check-in)<br>
- [Audio](#audio)<br>
- [Contact](#contact)<br>
- [Mention](#mention)<br>
- [Following](#following)<br>
- [Event](#event)<br>
- [Post](#post)<br>
- [Company](#company)<br>
- [Group](#group)<br>
- [Status](#status)<br>
- [Video](#video)<br>
- [Like](#like)<br>
- [Page](#page)<br>
- [Status Posting](#status-posting)<br>
- [Send message](#send-message)<br>
- [Validate Access Token](#validate-access-token)<br>
- [Invalidate Access Token](#invalidate-access-token)<br>
- [Validate key and secret](#validate-key-and-secret)<br>

If you have not already initialized the user object do so now

```
$socialLoginObject = new SocialLoginAPI (API_KEY, API_SECRET, array('output_format' => 'json'));
```

##### Access Token

Call the loginradius_exchange_access_token() function to retrieve an access token and the expiration timer.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/access-token)
```

$request_token = ""; //Token generated from a successful oauth from social platform

try{
    $accesstoken = $socialLoginObject->exchangeAccessToken($request_token);
    $access_token= $accesstoken->access_token;
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
With the access token, we can now invoke any of the following functions to grab data. However, this is dependent on the provider and permissions for each.


##### User Profile

The UserProfileAPI pulls all available user data. In this example, we just pull all fields that are Strings and not null. The LoginRadiusUltimateUserProfile object contains a large number of fields, and they can be manually retrieved from any PHP object.​

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/user-profile)
```

$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $userProfileData = $socialLoginObject->getUserProfiledata($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Album 
This API returns the photo albums associated with the passed in access tokens Social Profile.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/album)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $photoAlbums = $socialLoginObject->getPhotoAlbums($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Photo
The Photo API is used to get photo data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/photo)
```
$access_token = "Access-Token";
$album_id = "Album-Id";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $photos = $socialLoginObject->getPhotos($access_token, $album_id, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Checkin
This API is used to get checkins data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/check-in)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $checkins = $socialLoginObject->getCheckins($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Audio
This API is used to get audio data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/audio)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $audio = $socialLoginObject->getAudio($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Contact
The Contact API is used to get contacts/friends/connections data from the users social account

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/contact)
```

$access_token = "Access-Token";
$next_cursor = ""; //integer $next_cursor Offset to start fetching contacts from
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $contacts = $socialLoginObject->getContacts($access_token, $next_cursor = '', $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Mention
The Mention API is used to get mentions data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/mention)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $mentions= $socialLoginObject->getMentions($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Following
Get the following user list from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/following)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $following = $socialLoginObject->getFollowing($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```

##### Event
This API is used to get the event data from the users social account.
[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/event)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $events= $socialLoginObject->getEvents($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Post
This API is used to get the post data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/post)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $posts= $socialLoginObject->getPosts($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Company
This API is used to get the followed companies data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/company)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $followedCompanies= $socialLoginObject->getFollowedCompanies($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Group
This API is used to get the group data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/group)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $groups= $socialLoginObject->getGroups($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Status
This API is used to get the status data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/status)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $status= $socialLoginObject->getStatus($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Video
This API is used to get the video data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/video)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $videos= $socialLoginObject->getVideos($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Like
This API is used to get the likes data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/like)
```
$access_token = "Access-Token";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $likes= $socialLoginObject->getLikes($access_token, $raw);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Page
This API is used to get the pages data from the users social account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/page)
```
$access_token = "Access-Token";
$page_name = "Page-Name";
$raw = true;  // boolean $raw If true, raw data is fetched.

try{
    $pages= $socialLoginObject->getPages($access_token, $page_name);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Status Posting
Status API can extract the users status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn’t work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/post-status-posting)
```
$access_token = "";
$status = "";
$title = ""; (OPTIONAL)
$url = ""; (OPTIONAL)
$imageurl = ""; (OPTIONAL)
$caption = ""; (OPTIONAL)
$description = ""; (OPTIONAL)

try{
    $postStatus= $socialLoginObject->postStatus($access_token, $status, $title, $url, $imageurl, $caption, $description);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Send Message
This API is used to send messages to the users contacts.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/post-message-api)
```
$access_token = "Access-Token"; 
$to = ""; 
$subject = ""; 
$message = ""; 

try{
    $sendMessage= $socialLoginObject->sendMessage($access_token, $to, $subject, $message);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Validate Access Token
This API validates access token

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/token-validate)
```
$access_token = "Access-Token"; 

try{
    $validate= $socialLoginObject->tokenValidate($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Invalidate Access Token 
This API invalidates access token

[Try this](https://www.loginradius.com/legacy/docs/api/v2/social-login/token-invalidate)
```
$access_token = "Access-Token"; 

try{
    $invalidate= $socialLoginObject->tokenInvalidate($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Validate Key and Secret
This API validates key and secret.

```
try{
    $invalidatekey= $socialLoginObject->validateKeyandSecret();
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Advance Social APIs

**List of APIs in this Section:**<br>
- [Access Token via Facebook Token](#access-token-via-facebook-token)<br>
- [Access Token via Twitter Token](#access-token-via-twitter-token)<br>
- [Refresh userprofile](#refresh-user-profile)<br>
- [Refresh Token](#refresh-token)<br>
- [Get Active Sessions](#get-active-session-details)<br>
- [Trackable status fetching](#trackable-status-fetching)<br>
- [Get Trackable status stats](#get-trackable-status-stats)<br>
- [Shorten url](#shorten-url)<br>
- [Trackable status posting](#trackable-status-posting)<br>

If you have not already initialized the user object do so now

```
$advanceSocialLoginObject = new AdvanceSocialLoginAPI (API_KEY, API_SECRET, array('output_format' => 'json'));
```

##### Access Token via Facebook Token
The API is used to get LoginRadius access token by sending Facebook access token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/access-token-via-facebook-token)
```
$fb_access_token = ""; 

try{
    $result= $advanceSocialLoginObject->getAccessTokenByPassingFacebookToken($fb_access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Access Token via Twitter Token
The API is used to get LoginRadius access token by sending Twitter access token

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/access-token-via-twitter-token)
```
$tw_access_token = "";
$tw_token_secret = "";

try{
    $result= $advanceSocialLoginObject->getAccessTokenByPassingTwitterToken($tw_access_token, $tw_token_secret);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Refresh UserProfile
The User Profile API is used to get the latest updated social profile data.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/refresh-token/refresh-user-profile)
```
$access_token = "Access-Token";

try{
    $result= $advanceSocialLoginObject->refreshUserProfile($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Access Token
The Refresh Access Token API is used to refresh the LoginRadius Access Token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/refresh-token)
```
$access_token = "Access-Token";

try{
    $result= $advanceSocialLoginObject->refreshAccessToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Get Active Session Details
This api is used to get all active sessions by Access Token.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/get-active-session-details)
```
$access_token = "Access-Token";

try{
    $result= $advanceSocialLoginObject->getActiveSessionByToken($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Trackable Status Fetching
This API is used to retrieve a tracked post based on the passed in post ID value.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/trackable-status-fetching)
```
$postid = "Post-id";

try{
    $result= $advanceSocialLoginObject->trackableStatus($postid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Trackable Status Stats
The Trackable Status API is used to update the status on the user’s wall and return an Post ID value.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/get-trackable-status-stats)
```
$access_token = "Access-Token";
$status = "";
$title  = ""; (OPTIONAL)
$url = "";(OPTIONAL)
$imageurl = ""; (OPTIONAL)
$caption ""; (OPTIONAL)
$description ""; (OPTIONAL)

try{
    $result= $advanceSocialLoginObject->trackableStatusStats($access_token, $status, $title , $url , $imageurl , $caption, $description );
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```


##### Shorten URL
The Shorten URL API is used to convert your URLs to the LoginRadius short URL - ish.re

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/shorten-url)
```
$url = "url";

try{
   $result= $advanceSocialLoginObject->shortenUrl($url);
}
catch (LoginRadiusException $e){
   $e->getMessage();
   $e->getErrorResponse();
}
```


##### Trackable Status Posting
The Trackable Status API is used to update the status on the user’s wall and return an Post ID value.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/advanced-social-api/trackable-status-posting)
```
$access_token = "Access-Token";
$status = "";
$title  = ""; (OPTIONAL)
$url = "";(OPTIONAL)
$imageurl = ""; (OPTIONAL)
$caption ""; (OPTIONAL)
$description ""; (OPTIONAL)

try{
    $result= $advanceSocialLoginObject->trackableStatusPosting($access_token, $status, $title , $url, $imageurl, $caption, $description);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Custom Registration Data API

**List of APIs in this Section:**<br>
- [Add Registration Data](#add-registration-data)<br>
- [Validate code](#validate-code)<br>
- [Get Registration Data](#get-registration-data)<br>
- [Auth Get Registration Data](#auth-get-registration-data)<br>
- [Update Registration Data](#update-registration-data)<br>
- [Delete Registration Data](#delete-registration-data)<br>


##### Add Registration Data
This API allows you to fill data into a dropdown list which you have created for user Registeration.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/add-registration-data)
```

$payload = '{
"Data": [
{
"type": "",
"key": "",
"value": "",
"parentid": "",
"code": "",
"isactive": true
}]
}';

try{
    $result= $customRegistrationDataObject->addRegistrationData($payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Validate Code
This API allows you to validate code for a particular dropdown member.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/validate-code)
```

$payload = '{"recordid": "","code": ""}';

try{
    $result= $authenticationObject->validateRegistrationDataCode($payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Get Registration Data
This API is used to retrieve dropdown data.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/get-registration-data)
```
$type = "";
$parent_id = "";
$skip = "";
$limit = "";

try{
    $result= $customRegistrationDataObject->getRegistrationData($type, $parent_id, $skip, $limit);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Auth Get Registration Data
This API is used to retrieve dropdown data.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/auth-get-registration-data)
```
$type = "";
$parent_id = "";
$skip = "";
$limit = "";

try{
    $result= $authenticationObject->authGetRegistrationDataServer($type, $parent_id, $skip, $limit);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Update Registration Data
This API allows you to update a dropdown item.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/update-registration-data)
```
$recordid = "";
$payload =  '{
"IsActive": true,
"Type": "",
"Key": "",
"Value": "",
"ParentId": "",
"Code": ""
}';

try{
    $result= $customRegistrationDataObject->updateRegistrationData($recordid, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##### Delete Registration Data
This API allows you to delete an item from a dropdown list.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/custom-registration-data/delete-registration-data)
```
$recordid = "";

try{
    $result= $customRegistrationDataObject->deleteRegistrationData($recordid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Custom Object APIs

This API is used to manage a custom object for the user and relies on the User Entity object. If you are unsure of your Object ID you can reach out to the support team for details on this. If you haven't already initialized the User Registration Custom Object API do so now.
```
$authCustomObject = new AuthCustomObjectAPI (API_KEY, API_SECRET, array('output_format' => 'json'));
```

**List of APIs in this Section:**<br>
- [Insert data in custom object](#insert-data-in-custom-object)<br>
- [Update custom object data](#update-custom-object-data)<br>
- [Get custom object sets by token](#get-custom-object-sets-by-token)<br>
- [Get custom object set by id](#get-custom-object-set-by-id)<br>
- [Delete custom object set](#delete-custom-object-set)<br>

##### Insert Data in  Custom Object
This API is used to write information in JSON format to the custom object for the specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/create-custom-object-by-token)
```
$access_token = "Access-Token";
$objectname = "";
$payload = "";

try{
    $result= $authCustomObject->createCustomObject($access_token, $objectname, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Update Custom Object Data
This API is used to update the specified custom object data of the specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-update-by-objectrecordid-and-token)
```
$access_token = "Access-Token";
$objectname = "";
$object_record_id = "";
$update_type = "";
$payload = "";


try{
    $result= $authCustomObject->updateCustomObjectData($access_token, $objectname, $object_record_id, $update_type, $payload);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Get Custom Object Sets by token
This API is used to retrieve the specified Custom Object data for the specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-by-token)
```
$access_token = "Access-Token";
$object_name = "";

try{
    $result= $authCustomObject->getCustomObjectSetsByToken($access_token, $object_name);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Get Custom Object Set By ID
This API is used to retrieve the Custom Object data for the specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-by-objectrecordid-and-token)
```
$access_token = "Access-Token";
$object_name = "";
$object_record_id = "";

try{
    $result= $authCustomObject->getCustomObjectSetByID($access_token, $object_name, $object_record_id);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Delete Custom Object Set
This API is used to remove the specified Custom Object data using ObjectRecordId of a specified account.

[Try this](https://www.loginradius.com/legacy/docs/api/v2/user-registration/custom-object-delete-by-objectrecordid-and-token)
```
$access_token = "Access-Token";
$object_name = "";
$object_record_id = "";

try{
    $result= $authCustomObject->deleteCustomObjectSet($access_token, $object_name, $object_record_id);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```



#### WebHook API

The Webhook APIs allows you to build or set up integrations which subscribe to certain events on LoginRadius. When one of those events is triggered, we'll send an HTTP POST payload to the webhook's configured URL. Webhooks can be used to update an external tracker, update a backup mirror.

Each webhook can be configured on LoginRadius or a specific LoginRadius site. Once configured, they will be triggered each time one or more subscribed events occur on that LoginRadius site.

**List of APIs in this Section:**<br>
- [Webhooks settings](#web-hooks-settings)<br>
- [Webhooks Subscribe](#webhook-subscribe)<br>
- [Webhooks Subscribed URLs](#webhook-subscribed-urls)<br>
- [Webhooks Unsubscribe](#webhook-unsubscribe)<br>

```
$webhookObject = new WebHooksAPI (API_KEY, API_SECRET, array('output_format' => 'json'));
```

##### Webhooks Settings

[Try this](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-test)

```

try{
    $result= $webhookObject->webHooksSettings();
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### WebHooks Subscribe
[Try this](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-subscribe-api)

```
$target_url = "";
$event = "";

try{
    $result= $webhookObject->subscribeWebHooks($target_url, $event);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Webhooks Subscribed URLs
[Try this](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-subscribed-urls)

```

$event = "";
try{
    $result= $webhookObject->getWebHooksSubscribedUrls($event);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

##### Webhooks Unsubscribe 
[Try this](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-unsubscribe)

```
$target_url = "";
$event = "";

try{
    $result= $webhookObject->unsubscribeWebHooks($target_url, $event);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```

#### Implement Custom HTTP Client

- In order to implement custom HTTP client. Create the customhttpclient.php file in your project.

```
namespace LoginRadiusSDK\Clients\IHttpClient;
use LoginRadiusSDK\Utility\Functions;
use LoginRadiusSDK\LoginRadiusException;

class CustomHttpClient implements IHttpClient {

    public function request($path, $query_array = array(), $options = array()) {
    //custom HTTP client request handler code here
    }
}
```
- After that, pass the class name of your custom http client in global variable** $apiClient_class** in your project.
>Note
<br>
>If you manually added LoginRadius SDK then please make sure that customhttpclient.php file included in your project.
```
global $apiClient_class;
$apiClient_class = 'CustomHttpClient';
```

>Now your Custom HTTP client library will be used to handle LoginRadius APIs.

##Demo

Check out the demo and get the full SDK on our [Github](https://github.com/LoginRadius/php-sdk)

##Reference Manual
Please find the reference manual [here](https://docs.lrcontent.com/apidocs/ref/php/index.html)
