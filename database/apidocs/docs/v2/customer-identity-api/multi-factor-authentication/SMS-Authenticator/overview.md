# SMS Passcode Authenticator

## Overview

In the SMS Passcode flow, consumers get the OTP on their phone number to be consumed at the time of the 2nd step of MFA.

**Flow Diagram:**
![MFA by SMS Passcode](https://apidocs.lrcontent.com/images/MFA-by-SMS-Passcode_802610302d15010e9-85108984-1_189197801965bc94f7aadd12.74528411.png "MFA by SMS Passcode")

To implement the SMS Passcode workflow, you will need to take the following steps:

1. Configure the [SMS Passcode settings in the Admin Console.](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/sms-passcode)

2. You can implement the SMS passcode using any of the following methods:

   - [SMS Implementation with the LoginRadius JavaScript Interface](#smsimplementationwiththeloginradiusjavascriptinterface2)

   - [SMS API Implementation.](#smsapiimplementation3)

### SMS Configuration

1. Configure SMS passcode as MFA via Admin console by navigating to the:[ Platform Security → Multi-Layered Security → Multi-Factor Authentication](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/sms-passcode)

2. Choose **Enable** under **Multi-Factor Authentication > Settings.**

3. In the dropdown, choose the desired workflow. If you select **Required**, MFA will be mandatory for all consumers. For example, the consumer will be required to authenticate twice before logging in. If you choose Optional, MFA will be **optional.** For example, the consumer will have the ability to enable or disable MFA on login.

   ![MFA](https://apidocs.lrcontent.com/images/Multi-Factor-authentication-LoginRadius-User-Dashboard_685462bb27ab2e4870.36616272.png "MFA")

   To configure Twilio as your SMS provider, go to [Platform Configuration→Identity Workflow→Communication Configuration→SMS Configuration](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/sms-configuration)

   ![SMS Configuration](https://apidocs.lrcontent.com/images/2--SMS-Configuration_31814610306c7d2e4d5.86864674.png "SMS Configuration")

### SMS Implementation with the LoginRadius JavaScript Interface

Follow the steps below to integrate MFA using the LoginRadius JavaScript Interface:

1. Have the JavaScript Login interface initialized on your page as [shown here](https://www.loginradius.com/legacy/docs/api/v2/user-registration/user-registration-getting-started#login6).

2. Add the desired parameter options for MFA in your [initialization options](https://www.loginradius.com/legacy/docs/api/v2/user-registration/user-registration-getting-started#initializationofloginradiusobject3).

   Here are the available options:

   - two-factor authentication (Required): This option is required and needs to be set to true to ensure that the JavaScript interface will load the Multi-Factor prompts.

   - smsTemplate2FA (Optional): Takes the template name of the SMS template you have configured in your LoginRadius Admin Console. If this option is not provided, the default template will be used.

3. Upon successful login, you can add an additional interface for the customer to be able to customize their Multi-Factor setting.

   For example, change the Multi-Factor Phone or disable Multi-Factor (if MFA is optional)

   If you wish to add this, read our [JavaScript Interface instructions](https://www.loginradius.com/legacy/docs/api/v2/user-registration/user-registration-getting-started#createtwofactorauthentication26)

### SMS API Implementation

Follow the steps below to implement MFA via our MFA API which uses a mix of front-end and back-end API calls.

> **Note:** As a general rule, if an API call requires an API Secret, it should be called from the back-end. Otherwise, the API call can also be used on the front end.

1. Set up a login workflow using the preferred method. Each method depends on how you want the consumer to authenticate for the first factor. The API will then automatically handle the delivery of the SMS message.

   You can use the following methods for the first factor:

   - [MFA Email Login API](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-email-login): To have a Standard Login flow requiring email and password.

   - [MFA UserName Login API](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-user-name-login): To use UserName and Password as opposed to email and password.

   - [MFA Phone Login](https://www.loginradius.com/legacy/docs/api/v2/user-registration/2fa-phone-login): If your API has been configured for phone-based authentication, use this API to authenticate the user by phone.

   Once a user logs in via one of these APIs, you will receive an API response to proceed to the next step, which will look like this:

   ```
   {
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
         "x**z@e****le.c*m"
       ],
       "EmailOTPStatus": {
         "Email": "x**z@e****e.c*m"
       },
       "IsSecurityQuestionAuthenticatorVerified": false,
       "SecurityQuestions": [
         {
           "QuestionId": "<QuestionId>",
           "Question": "<Question>"
         }
       ]
     },
     "Profile": null,
     "access_token": "00000000-0000-0000-0000-000000000000",
     "expires_in": "0001-01-01T00:00:00"
   }
   ```

   It is important to note that if the field IsOTPAuthenticatorVerified returns null, it means the consumer has not set up a verified phone number to receive the OTP. In this case, you will need to prompt the consumer for verification via our [update phone number API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/mfa-update-phone-number/).

2. You can allow the consumer to log in by providing the OTP they received via SMS by leveraging [MFA Validate OTP API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-validate-otp).

   > **Note:** You will need to provide this API call with the API Key and second-factor authentication token from the first-factor authentication with the OTP received on the phone number provided in step 1.

3. You can allow the consumer to update the phone after login by leveraging the [MFA Update Phone Number API by token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/mfa-update-phone-number-by-token/) API call.

4. You can allow your consumers to Update the Multi-factor authentication settings after login by using the [Update MFA settings](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/update-mfa-setting/) API call.

5. Provide additional workflows or options to the consumer by leveraging more MFA SMS Authenticator APIs. For example, allowing your consumers to reset the SMS authenticator configurations after login by leveraging the [MFA Reset SMS Authenticator by Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/mfa-reset-sms-authenticator-by-token/) API. Also you can reset the SMS authenticator configuration by leveraging this [Reset MFA SMS Authenticator Settings by UID ](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/sms-authenticator/mfa-reset-sms-authenticator-by-uid/)API calling at server side.