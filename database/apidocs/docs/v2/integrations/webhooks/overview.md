Overview
===
---
WebHooks allow you to build or set up integrations which subscribe to certain events on LoginRadius. When one of these events is triggered, LoginRadius will automatically send a POST payload over HTTPs to the WebHook's configured URL in real time. WebHooks can be used to update an external tracker or update a backup mirror.

**Note**: Once the request is submitted to the WebHook's configured URL, LoginRadius do not track payload deliverability.
## Events

When configuring a WebHook, you can select the events for which you would like to receive payloads. Only subscribing to the specific events you plan on handling is useful for limiting the number of HTTP requests to your server. You can change the list of subscribed events through the API at any time. By default, WebHooks are only subscribed to the push event.The following are the allowed events:

**Allowed events:** Login, Register, UpdateProfile, ResetPassword, ChangePassword, emailVerification, AddEmail, RemoveEmail, BlockAccount, DeleteAccount, SetUsername, AssignRoles, UnassignRoles, SetPassword, LinkAccount, UnlinkAccount, UpdatePhoneId, VerifyPhoneNumber, UpdateCustomobject, DeleteCustomObject, CreateCustomObject, InvalidateEmailVerification, InvalidatePhoneVerification, RemovePhoneId, RemoveRoleContext

## WebHook sample header

All webhook POST request headers will contain the following fields: host, accept, accept-encoding, content-type, request-context, request-id, signature, user-agent, content-length, connection.

Here is the sample for WebHook payload header:

![](https://apidocs.lrcontent.com/images/WebhookPayloadHeader_250215d09686fd563c7.31213874.jpg "WebHook Payload header")


## WebHook Security

All the WebHook's configured URL must use https as it is more secure. If you use https, your SSL/TLS certificate must be validated. 

A signature field  is passed in every WebHook payload header to subscribed URL in Admin Console. The signature field value contains API secret and payload body in the hashed form.  The signature data field can be used to verify the source of data for each incoming  POST request is LoginRadius. 

The following .net script can be used to generate a signature field from the LoginRadius API secret and WebHook payload Body. You can compare this generated signature with the signature field value in the WebHook payload header to validate the WebHook source of data.

* Replace ```<LoginRadius API secret>``` with API secret for your LoginRadius site in the below code
* Replace  ```<WebHook payload body>``` with WebHook payload Body in string format
* The code will write derived signature in the console.

```
using System;
using System.Text;
using System.Security.Cryptography;

public class Program
{
    private const string key = "<LoginRadius API secret>";
    private const string message = "<WebHook payload body>";
    private static readonly Encoding encoding = Encoding.UTF8; 

    static void Main(string[] args)
    {
        var keyByte = encoding.GetBytes(key);
        using (var hmacsha256 = new HMACSHA256(keyByte))
        {
            hmacsha256.ComputeHash(encoding.GetBytes(message));

            Console.WriteLine("Result: {0}", ByteToString(hmacsha256.Hash));
        }
    }
    static string ByteToString(byte[] buff)
    {
        string sbinary = "";
        for (int i = 0; i < buff.Length; i++)
            sbinary += buff[i].ToString("X2"); /* hex format */
        return sbinary;
    }    
}
```

## WebHook sample payload body 

| Event| Sample Payload| 
| ------------------------ | ------ |
|Login|[Link](/integrations/webhooks/samples/#login0) |
|Register|[Link](/integrations/webhooks/samples/#register1) |
|UpdateProfile|[Link](/integrations/webhooks/samples/#updateprofile2) |
|ResetPassword|[Link](/integrations/webhooks/samples/#resetpassword3) |
|ChangePassword|[Link](/integrations/webhooks/samples/#changepassword4) |
|emailVerification|[Link](/integrations/webhooks/samples/#emailverification5) |
|AddEmail|[Link](/integrations/webhooks/samples/#addemail6) |
|RemoveEmail|[Link](/integrations/webhooks/samples/#removeemail7) |
|BlockAccount|[Link](/integrations/webhooks/samples/#blockaccount8) |
|DeleteAccount|[Link](/integrations/webhooks/samples/#deleteaccount9) |
|SetUsername|[Link](/integrations/webhooks/samples/#setusername10) |
|AssignRoles|[Link](/integrations/webhooks/samples/#assignroles11) |
|UnassignRoles|[Link](/integrations/webhooks/samples/#unassignroles12) |
|SetPassword|[Link](/integrations/webhooks/samples/#setpassword13) |
|LinkAccount|[Link](/integrations/webhooks/samples/#linkaccount14) |
|UnlinkAccount|[Link](/integrations/webhooks/samples/#unlinkaccount15) |
|UpdatePhoneId|[Link](/integrations/webhooks/samples/#updatephoneId16) |
|VerifyPhoneNumber|[Link](/integrations/webhooks/samples/#verifyphonenumber17) |
|UpdateCustomobject|[Link](/integrations/webhooks/samples/#updatecustomobject18) |
|DeleteCustomObject|[Link](/integrations/webhooks/samples/#deletevustomobject19) |
|CreateCustomObject|[Link](/integrations/webhooks/samples/#createcustomobject20) |
|InvalidateEmailVerification|[Link](/integrations/webhooks/samples/#invalidateemailverification21) |
|InvalidatePhoneVerification|[Link](/integrations/webhooks/samples/#invalidatephoneverification22) |
|RemovePhoneId	|[Link](/integrations/webhooks/samples/#removephoneid23) |
|RemoveRoleContext|[Link](/integrations/webhooks/samples/#removerolecontext24) |

## APIs Associated With Webhook Events

| Event| API| 
| ------------------------ | ------ |
|Login  | [Passwordless Login Verification](/api/v2/customer-identity-api/passwordless-login/passwordless-login-verification) <br> [Smart Login Ping](/api/v2/customer-identity-api/smart-login/smart-login-ping) <br> [MFA Email Login](/api/v2/customer-identity-api/multi-factor-authentication/mfa-email-login)<br> [Auth Login by Email](/api/v2/customer-identity-api/authentication/auth-login-by-email) <br>[Passwordless Login Phone Verification](/api/v2/customer-identity-api/passwordless-login/passwordless-login-phone-verification)<br> [MFA Validate Google Auth Code](/api/v2/customer-identity-api/multi-factor-authentication/google-authenticator/mfa-validate-google-auth-code)<br> [MFA Validate OTP](/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/mfa-validate-otp)<br> [One Touch OTP Verification](/api/v2/customer-identity-api/one-touch-login/one-touch-otp-verification)<br> [User Profile](/api/v2/customer-identity-api/social-login/user-profile)<br> [Auth Verify Email](/api/v2/customer-identity-api/authentication/auth-verify-email)<br> [Auth Verify Email by OTP](/api/v2/customer-identity-api/authentication/auth-verify-email-by-otp)<br> [Auth Reset Password by OTP](/api/v2/customer-identity-api/authentication/auth-reset-password-by-otp)<br> [Auth Reset Password by Reset Token](/api/v2/customer-identity-api/authentication/auth-reset-password-by-reset-token)<br> [Auth Reset Password by Security Answer and Phone](/api/v2/customer-identity-api/authentication/auth-reset-password-by-phone)<br> [Phone Verification by OTP](/api/v2/customer-identity-api/phone-authentication/phone-verify-otp)<br> [Auth User Registration by Email](/api/v2/customer-identity-api/authentication/auth-user-registration-by-email)<br> [Auth Social Identity](/api/v2/customer-identity-api/authentication/auth-link-social-identities/)<br> [Auth User Registration by ReCaptcha](/api/v2/customer-identity-api/authentication/auth-user-registration-by-recaptcha/)|
|Register| [Smart Login Ping](/api/v2/customer-identity-api/smart-login/smart-login-ping)<br> [One Touch Login by Phone](/api/v2/customer-identity-api/one-touch-login/one-touch-login-by-phone-captcha)<br> [One Touch Login by Email](/api/v2/customer-identity-api/one-touch-login/one-touch-login-by-email-captcha)<br> [User Profile](/api/v2/customer-identity-api/social-login/user-profile)<br> [Account Create](/api/v2/customer-identity-api/account/account-create)<br> [Auth Account Delete](/api/v2/customer-identity-api/authentication/auth-delete-account)<br> [Auth User Registration by Email](/api/v2/customer-identity-api/authentication/auth-user-registration-by-email)<br> [Auth Social Identity](/api/v2/customer-identity-api/authentication/auth-link-social-identities/)<br> [Auth User Registration by ReCaptcha](/api/v2/customer-identity-api/authentication/auth-user-registration-by-recaptcha/)|
|UpdateProfile |                [Auth Privacy Policy Accept](/api/v2/customer-identity-api/authentication/auth-privacy-policy-accept)<br> [Account Email Delete](/api/v2/customer-identity-api/account/account-email-delete)<br> [Account Update](/api/v2/customer-identity-api/account/account-update)<br> [Upsert Email](/api/v2/customer-identity-api/account/upsert-email)<br> [Auth Update Profile by Token](/api/v2/customer-identity-api/authentication/auth-update-profile-by-token)|
|ResetPassword  |               [Phone Reset Password by OTP](/api/v2/customer-identity-api/phone-authentication/phone-reset-password-by-otp)<br> [Auth Reset Password by Reset Token](/api/v2/customer-identity-api/authentication/auth-reset-password-by-reset-token)|
|ChangePassword  |              [Auth Change Password](/api/v2/customer-identity-api/authentication/auth-change-password)|
|emailVerification |            [Passwordless Login Verification](/api/v2/customer-identity-api/passwordless-login/passwordless-login-verification)<br> [Forgot Password Token](/api/v2/customer-identity-api/account/get-forgot-password-token)<br> [Smart Login Verify Token](/api/v2/customer-identity-api/smart-login/smart-login-verify-token)<br> [Auth Verify Email](/api/v2/customer-identity-api/authentication/auth-verify-email)<br> [Auth Verify Email by OTP](/api/v2/customer-identity-api/authentication/auth-verify-email-by-otp)<br> [Auth Reset Password by Reset Token](/api/v2/customer-identity-api/authentication/auth-reset-password-by-reset-token)|
|  AddEmail   |                   [Auth Verify Emai](/api/v2/customer-identity-api/authentication/auth-verify-email)<br> [Auth Verify Email by OTP](/api/v2/customer-identity-api/authentication/auth-verify-email-by-otp)|
|  RemoveEmail   |                [Auth Remove Email](/api/v2/customer-identity-api/authentication/auth-remove-email)|
|  BlockAccount  |                [MFA Email Login](/api/v2/customer-identity-api/multi-factor-authentication/mfa-email-login)<br> [Auth Login by Email](/api/v2/customer-identity-api/authentication/auth-login-by-email)<br> [Passwordless login Phone Verification](/api/v2/customer-identity-api/passwordless-login/passwordless-login-phone-verification)<br> [MFA Validate Backup code](/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/mfa-validate-backup-code)<br> [MFA Validate Google Auth Code](/api/v2/customer-identity-api/multi-factor-authentication/google-authenticator/mfa-validate-google-auth-code)<br> [MFA Validate OTP](/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/mfa-validate-otp)<br> [One Touch OTP Verification](/api/v2/customer-identity-api/one-touch-login/one-touch-otp-verification)<br> [Account Update](/api/v2/customer-identity-api/account/account-update)<br> [Auth Unlock Account by Access Token](/api/v2/customer-identity-api/authentication/auth-unlock-account-by-access-token)<br> [Update MFA by Access Token](/api/v2/customer-identity-api/multi-factor-authentication/google-authenticator/update-mfa-by-access-token) <br>[Update MFA setting](/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/update-mfa-setting) <br>[Auth Verify Email](/api/v2/customer-identity-api/authentication/auth-verify-email)<br> [Auth Verify Email by OTP](/api/v2/customer-identity-api/authentication/auth-verify-email-by-otp)<br> [Validate MFA by Backup Code](/api/v2/customer-identity-api/multi-factor-authentication/re-authentication/validate-mfa-by-backup-code) <br>[Validate MFA by Google Authenticator code](/api/v2/customer-identity-api/multi-factor-authentication/google-authenticator/mfa-validate-google-auth-code) <br>[Validate MFA by OTP](/api/v2/customer-identity-api/re-authentication/mfa/re-auth-by-otp)<br> [Validate MFA by Password](https://www.loginradius.com/docs/api/v2/customer-identity-api/re-authentication/re-auth-validate-password)<br> [Auth Change Password](/api/v2/customer-identity-api/authentication/auth-change-password)<br> [Phone reset password by OPT](/api/v2/customer-identity-api/phone-authentication/phone-reset-password-by-otp)<br> [Auth Reset Password by Reset Token](/api/v2/customer-identity-api/authentication/auth-reset-password-by-reset-token)<br> [Auth Reset Password by Security Answer and Phone](/api/v2/customer-identity-api/authentication/auth-reset-password-by-phone)<br> [Phone Verification by OTP](/api/v2/customer-identity-api/phone-authentication/phone-verify-otp)<br> [Auth User Registration by Email](/api/v2/customer-identity-api/authentication/auth-user-registration-by-email)<br> [Auth User Registration by ReCaptcha](/api/v2/customer-identity-api/authentication/auth-user-registration-by-recaptcha/)|
|  DeleteAccount  |  [Account Delete](/api/v2/customer-identity-api/account/account-delete)<br> [Auth Account Delete](/api/v2/customer-identity-api/authentication/auth-delete-account)|
|  SetUsername  |                 [Auth Set or Change UserName](/api/v2/customer-identity-api/authentication/auth-set-or-change-user-name)|
|  AssignRoles  |                 [Role Context Profile](/api/v2/customer-identity-api/roles-management/role-context-profile)<br> [Assign Roles by UID](/api/v2/customer-identity-api/roles-management/assign-roles-by-uid)|
|  UnassignRoles  |               [Delete Additional Permission from Context](/api/v2/customer-identity-api/roles-management/delete-permissions-from-context) <br>[Unassign roles by UID](/api/v2/customer-identity-api/roles-management/unassign-roles-by-uid) <br>[Delete Role from Context](/api/v2/customer-identity-api/roles-management/delete-role-from-context/)|
| SetPassword   |                [Account Set Password](/api/v2/customer-identity-api/account/account-set-password)|
|  LinkAccount  |                 [Smart Login Ping](/api/v2/customer-identity-api/smart-login/smart-login-ping)<br> [Auth Account Delete](/api/v2/customer-identity-api/authentication/auth-delete-account)[Auth Social Identity](/api/v2/customer-identity-api/authentication/auth-link-social-identities/)<br> [Auth Link Social Identities](/api/v2/customer-identity-api/authentication/auth-link-social-identities)|
|  UnlinkAccount   |              [Auth unlink Social Identities](/api/v2/customer-identity-api/authentication/auth-unlink-social-identities)|
|  UpdatePhoneId   |              [Account Update](/api/v2/customer-identity-api/account/account-update)<br> [Update PhoneId by UID](/api/v2/customer-identity-api/account/update-phoneid-by-uid) <br>[Phone Number Update](/api/v2/customer-identity-api/phone-authentication/phone-number-update)|
|  VerifyPhoneNumber |            [Phone Verification by OTP](/api/v2/customer-identity-api/phone-authentication/phone-verify-otp)|
|  UpdateCustomobject|            [Custom object update by Access token](/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-token) <br>[Custom Object Update by UID](/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-uid)|
|  DeleteCustomObject  |          [Custom Object Delete by Record Id And Token](/api/v2/customer-identity-api/custom-object/custom-object-delete-by-objectrecordid-and-token)<br> [Delete custom Object by ObjectRecordId](/api/v2/customer-identity-api/custom-object/custom-object-delete-by-objectrecordid-and-uid)|
|  CreateCustomObject  |          [Create Custom Object by Token](/api/v2/customer-identity-api/custom-object/create-custom-object-by-token)<br> [Create Custom Object by UID](/api/v2/customer-identity-api/custom-object/create-custom-object-by-uid)|
|  InvalidateEmailVerification |  [Account Invalidate Verification Email](/api/v2/customer-identity-api/account/account-invalidate-verification-email)|
|  InvalidatePhoneVerification|   [Reset phone ID verification](/api/v2/customer-identity-api/phone-authentication/reset-phone-id-verification)|
|  RemovePhoneId         |        [Remove Phone ID by Access Token](/api/v2/customer-identity-api/phone-authentication/remove-phone-id-by-access-token)|
|  RemoveRoleContext     |        [Delete Role Context](/api/v2/customer-identity-api/roles-management/delete-context/)|


## WebHook Handling

You will receive a POST request on your server as a triggered WebHook to your server.

Trigger Method: POST

Format:
```
{
   "HookName":"login",
   "Time":"2018-07-31T09:03:18Z",
   "HookId":"50*****5-***1-4**7-9**e-fc8*****64eb",
   "Data":{
      "Identities":[
         "&ltArray of Identities&gt"
      ],
      "Password":"83c***f5559****7e7c***9708*****fd9ebbe6******62f648b0*****e0202:XD***Sxj",
      "LastPasswordChangeDate":"2018-03-05T22:13:36.48263Z",
      "PasswordExpirationDate":"2019-07-31T09:03:12.298Z",
      "LastPasswordChangeToken":"1542daac-4df0-4270-b5b5-5d7922492d7e",
      "EmailVerified":false,
      "IsActive":true,
      "IsDeleted":false,
      "Uid":"8061*****d1241******3297*****4b9",
     },
}
```
## Payload Information

The following table explains the all the components of payload:

| Element| Type| Description| 
| ------------------------ | ------ |------ |
|HookName|string |WebHook event which is triggered|
|Time |string  |The timestamp when the hook is triggered.|
|HookId|string |A uniquely generated number associated the triggered hook.|
|Data|string |The object that contains information about the account associated with the webhook.|

## Configure WebHook 
WebHook can be configured on LoginRadius in Admin Console or LoginRadius API. 

### Admin Console

**Adding webhook event to LoginRadius**
1. Go to ***Integrations >Data Sync > Web Hooks** in the LoginRadius Admin Console.

![WEBHOOK](https://apidocs.lrcontent.com/images/wb1_154775ea783409928f8.99133822.png "WEBHOOK here")

2. Click **+Add** button and enter the available webhook events in loginRadius and URL where payload data will be sent when the webhook events is triggered.
![WEBHOOK description here](https://apidocs.lrcontent.com/images/wb3_220685ea7838069a8b1.61042927.png "WEBHOOK here")

3. Successfully configured webhook will be displayed in the Web Hooks section.
![WEBHOOK](https://apidocs.lrcontent.com/images/wb2-_3_20955ea783ec7c27c8.68906798.png "WEBHOOK here")



**Removing a webhook event**

1. Click Unsubscribe to remove an webhooks event from LoginRadius.
![WEBHOOK](https://apidocs.lrcontent.com/images/wb4_202645ea7847ac64104.73907375.png "UNSUBSCRIBE WEBHOOK")


### WebHook APIs 

Following LoginRadius WebHook APIs are available to configure WebHook events on the LoginRadius Platform.
#### WebHook Subscribe API

[WebHook Subscribe](/api/v2/integrations/webhooks/webhook-subscribe/) API  allows you to add a WebHook event on your LoginRadius site.
#### WebHook Test

[WebHook Test](/api/v2/integrations/webhooks/webhook-test/) API is used to check if your LoginRadius site is enabled for WebHook events.
#### WebHook Subscribed URLs

[WebHook Subscribed URLs](/api/v2/integrations/webhooks/webhook-subscribed-urls/) API is used to fetch all the subscribed URLs for a particular webhook event configured on your LoginRadius website.
#### WebHook Unsubscribe

[WebHook Unsubscribe](/api/v2/integrations/webhooks/webhook-unsubscribe/) API allows you to remove a WebHook event form your LoginRadius website.