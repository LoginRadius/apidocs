# Security Questions Authenticator

## Overview

In Multi-factor authentication via security questions, consumers can authenticate themselves with the help of security questions that they have set during the time of registration.

**Flow Diagram:**
![MFA by Security Questions](https://apidocs.lrcontent.com/images/MFA-by-Security-Questions_255616103043e35a593.26372737.png "MFA by Security Questions")

### MFA Security Question feature configuration via Admin Console

The following are the steps to implement the multi-factor authentication by security questions via Admin Console:

1. To configure MFA by security questions for your app, navigate to[ Platform security > Multi-Layered Security > Multi-Factor authentication > Security question](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/security-questions) and the following screen will appear:

   ![Security Questions](https://apidocs.lrcontent.com/images/12--Security-Question_3239161030d4c52e8e6.11034285.png "Security Questions")

2. Now you will need to check the box Enable security question for MFA . Please see the image below for your reference.

   ![Security Questions](https://apidocs.lrcontent.com/images/13--Security-Question_2302661030da9389510.39602092.png "Security Questions")

3. Select the number of security questions that you want to appear at the time of authentication and Save it.

   ![Security Questions](https://apidocs.lrcontent.com/images/14--Security-Question_231461030dcecbd888.18420854.png "Security Questions")

> **Note:** You can configure new security questions, modify/update previously added questions and also set a failure attempt limit for them. To know more about it, see this document here

### Security Question API implementation

Follow the steps below to implement MFA using a mix of front-end and back-end API calls.

> **Note:** If an API call requires an API Secret, it should be called from the back-end. Otherwise, the API call can also be used on the front-end.

1. Set up a login workflow using the preferred method. Each method depends on how you want the user to authenticate for the first factor.

   You can use the following first factor methods:

   - MFA Email Login API: To have a Standard Login flow requiring email and password.

   - MFA UserName Login API: To use UserName and Password as opposed to Email and Password.

   - MFA Phone Login: If your API has been configured for Phone-based Authentication, use this API to authenticate the user via phone.

   Upon successful login, the user will receive a JSON response containing information relevant to performing the Security questions Authenticator login:

   ```

   {
   "SecondFactorAuthentication": {
   "SecondFactorAuthenticationToken": "b1fbbba5-2a5e-41a2-96da-c216df36e6f4",
   "ExpireIn": "2021-04-06T08:36:53.3005592Z",
   "QRCode": "http://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=otpauth%3A%2F%2Ftotp%2Fanil1%40mail7.io%3Fsecret%3DHBRWENLDHEZGIMBYHFTDINJSMVRDANDBHE4WINJTMYZTCYZSGFRA%26issuer%3Ddev-aniltest",
   "ManualEntryCode": "HBRWENLDHEZGIMBYHFTDINJSMVRDANDBHE4WINJTMYZTCYZSGFRA",
   "IsGoogleAuthenticatorVerified": false,
   "IsEmailOtpAuthenticatorVerified": false,
   "IsOTPAuthenticatorVerified": false,
   "OTPPhoneNo": null,
   "OTPStatus": null,
   "Email": [
   "x**z@e****le.c*m"
   ],
   "EmailOTPStatus": {
   "Email": "x**z@e\*\***e.c\*m"
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

2. If "IsSecurityQuestionAuthenticatorVerified"
   : true in response then you can prompt the consumer to select a security question from the list by leveraging [Verify MFA Security Question by MFA Token](/api/v2/customer-identity-api/multi-factor-authentication/security-question-authenticator/verify-mfa-security-question-by-mfa-token/) API. This API takes a **second-factor authentication token**, **Question ID**, **Answer**, and **API Key** as input.

3. In the case of optional MFA, you can use [Verify MFA Security Question By Access Token](/api/v2/customer-identity-api/multi-factor-authentication/security-question-authenticator/verify-mfa-security-question-by-access-token/) to set up the MFA Security Question Authenticator on your profile after login. This API takes an API key, access_token, New Question ID/ Answer, and ReplaceSecurityQuestionAnswer as true/false to the confirmation.

4. For those consumers who never configured the security question on their profile to log in by setting up the Security Question’s Answer using the [update MFA security question by MFA Token](/api/v2/customer-identity-api/multi-factor-authentication/security-question-authenticator/update-mfa-security-question-by-mfa-token/) API. This API takes an API key, **second-factor authentication token**, and Security Question and the Answer.

5. Provide additional workflows or options to the consumer by leveraging more MFA security question authenticator APIs. For example, allowing your consumers to reset the security questions authenticator settings after login by leveraging the [DELETE Reset MFA Security Question Authenticator Settings](/api/v2/customer-identity-api/multi-factor-authentication/security-question-authenticator/delete-reset-mfa-security-question-authenticator-settings/). Also, you can reset the security questions authenticator settings by leveraging this [DELETE Reset MFA Security Question Authenticator Settings by UID](/api/v2/customer-identity-api/multi-factor-authentication/security-question-authenticator/delete-reset-mfa-security-question-authenticator-settings-uid/) API from the server-side.