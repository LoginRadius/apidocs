# Email Authenticator

  

## Overview


In the email authenticator flow, consumers get the OTP on their registered email in profile to be consumed at the time of the 2nd step of MFA.

**Flow Diagram:**
![MFA by Email Authenticator](https://apidocs.lrcontent.com/images/MFA-by-Email-Authenticator_2866361030400ce4af0.34137175.png "MFA by Email Authenticator")

### Email MFA configuration via Admin Console

The following are the steps to implement the second-factor authentication via Admin Console:

1.  To configure Email Authenticator for your app, navigate to [Platform Security > Multi-Layered Security > Multi-Factor Authentication > Email Passcode](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/email-passcode), and the following screen will appear.

    ![Email Passcode](https://apidocs.lrcontent.com/images/8--Email-Passcode_969361030976c3f6a3.29426362.png "Email Passcode")

2.  Now you will need to check the box **Select to enable**, to enable the feature as given in the below screen.

    ![Email Passcode](https://apidocs.lrcontent.com/images/6--Email-Passcode_19018610309045398b2.97687998.png "Email Passcode")

3.  If you want to add a new **Email Authenticator** template, you can click on the **Add** button to add a template with the desired message you want to send to your consumers.

    ![Email Passcode](https://apidocs.lrcontent.com/images/7--Email-Passcode_250946103093b8d5d42.10897189.png "Email Passcode")

4.  Now to configure the Email settings you need to click on the **Email Passcode Settings** tab as given in the following screen.

    ![Email Passcode](https://apidocs.lrcontent.com/images/8--Email-Passcode_78516103097629ba01.81155022.png "Email Passcode")

5.  From here you can set the **Request Limit, Request Disable Period,** and **Multi-Factor OTP (verification code) validity limit**.

    ![Email Passcode](https://apidocs.lrcontent.com/images/9--Email-Passcode_1608561030a4544a380.34185158.png "Email Passcode")

6.  Once the **Email Authenticator** is **enabled** for your consumers, they will get the following screen. If they have added multiple emails then they have to select one of the emails from the drop-down list on which verification code will be sent.

    ![Login with Email](https://apidocs.lrcontent.com/images/10--Login-with-Email_3032361030a76bb4321.32024490.png "Login with Email")

7.  Verification code received on the email will be entered here for verification and if code is not received due to any reason they can resend verification code.

    ![Login with Email](https://apidocs.lrcontent.com/images/11--Login-with-Email_2392661030aaa89e991.83767230.png "Login with Email")

> **Note:** To set up an Email configuration provider you can click [here](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/email-configuration).

### Email Authenticator JS implementation

The following code can be used to Customize the button for 2FA using an email authenticator:

```

LRObject.$hooks.register('beforeFormRender', function (name, _schema) {
if(name === 'twofaemailotp'){
LRObject.$hooks.call('setButtonsName',{
'twofaemailotp' : "Verify Email OTP ",
'resendotp':'Resend VErification code to Email',
});
}
});

LRObject.$hooks.call('setButtonsName',{
emailotp : "Send Email to ",
"sendotp":"Send SMS to Phone",
registration:'Register'
});

```

### Email Authenticator API implementation

Follow the steps below to implement MFA via our MFA API which uses a mix of front-end and back-end API calls.

> **Note:** As a general rule, if an API call requires an API Secret, it should be called from the back-end. Otherwise, the API call can also be used on the front end.

1.  Set up a login workflow using the preferred method. Each method depends on how you want the consumer to authenticate for the first factor. The API will then automatically handle the delivery of the OTP.

    You can use the following methods for the first factor:

    - [MFA Email Login API](/api/v2/user-registration/2fa-email-login): To have a Standard Login flow requiring email and password.

    - [MFA Phone Login](/api/v2/user-registration/2fa-phone-login): If your API has been configured for phone-based authentication, use this API to authenticate the user by phone.

    Once a consumer logs in via one of these APIs, you will receive an API response to proceed to the next step, which will look like this:

    ```

    SecondFactorAuthentication": {
    "SecondFactorAuthenticationToken": "32ba53ff-XXXX-XXX-XXX-XXXXXXXXXXXX",
    "ExpireIn": "2017-08-31T01:39:28.1427384Z",
    "QRCode": "http://chart.googleapis.com/chart?cht=XXXXXXXXXXXXX",
    "ManualEntryCode": "XXXXXXXXXXXXXXXXXXXX",
    "IsGoogleAuthenticatorVerified": false,
    "IsEmailOtpAuthenticatorVerified": false,
    "IsOTPAuthenticatorVerified": false,
    "OTPPhoneNo": null,
    "OTPStatus": null,
    "Email": [
    "xyz@example.com"
    ],
    "EmailOTPStatus": {
    "Email": "xyz@example.com"
    }
    }
    },
    "Profile":null,
    "access_token":"00000000-0000-0000-0000-000000000000",
    "expires_in":"0001-01-01T00:00:00"
    }

    ```

    **Note:**

    - **IsEmailOtpAuthenticatorVerified**: It will be true if email authenticator is enabled on the profile.
    - **Email**: All registered emails on profile.
    - **EmailOTPStatus**: If OTP has been sent to an email already. In the case where only email authenticator is enabled and only one email is registered in profile.

2.  If `IsEmailOtpAuthenticatorVerified` is false in the response then you can prompt the consumer to select an email from the email list by using [Send MFA Email OTP By MFA Token ](/api/v2/customer-identity-api/multi-factor-authentication/email-authenticator/send-mfa-email-otp-by-mfa-token/)API to trigger the OTP.

3.  Allow the consumer to log in by providing the OTP they received on email using the [Verify MFA Email Otp by MFA Token](/api/v2/customer-identity-api/multi-factor-authentication/email-authenticator/verify-mfa-email-otp-by-mfa-token/) API.

    > **Note:** You will need to provide this API call with the second-factor authentication token from the first-factor authentication with the OTP.

4.  In the case of optional MFA you can use [ Verify Email OTP By Access Token](/api/v2/customer-identity-api/multi-factor-authentication/email-authenticator/verify-mfa-email-otp-by-access-token/) to set up the MFA Email OTP authenticator on profile after login.

5.  After the login you can allow your consumer to trigger the OTP by using [Send MFA Email OTP By Access Token](/api/v2/customer-identity-api/multi-factor-authentication/email-authenticator/send-mfa-email-otp-by-access-token/)API.

6.  Provide additional workflows or options to the consumer by leveraging more MFA Email OTP API. For example, allowing your consumers to reset MFA email otp settings with the [DELETE Reset MFA Email OTP Authenticator Settings](/api/v2/customer-identity-api/multi-factor-authentication/email-authenticator/reset-mfa-email-otp-authenticator-settings-by-access-token/), and also you can leverage this by calling this [ DELETE Reset MFA Email OTP Authenticator Settings by Uid](/api/v2/customer-identity-api/multi-factor-authentication/email-authenticator/reset-mfa-email-otp-authenticator-settings-by-uid/) API at server side.

### Sample Email template

The below email template is used when email authenticator flow is selected:

```

Type: SECONDFACTORAUTHENTICATION=16

DefaultEmailTemplate
{
Type: "secondfactorauthentication",
Subject: "Verification Email",
Content: "Hi #Name#, <br/><br/>Your 2FA login verification code is <b> #OTP# <b><br/><br/>Regards<br/>",
},

```