# Multi-Factor Authentication Overview

Multi-Factor Authentication, or MFA, is a multi-step verification process that provides an extra layer of security for the consumers' accounts. With MFA, once the consumer enters their login credentials, they have to follow a specific authentication method in order to fully log in. There are several ways in which the consumer can authenticate himself including the SMS Passcode, Google Authenticator App, Email Passcode, and Security Questions.

Currently, LoginRadius supports the following authentication methods for MFA:

1. **SMS Passcode**
2. **Google Authenticator**
3. **Email Passcode**
4. **Security Questions**

With **SMS Passcode Workflow**, a text message containing an One Time Passcode (OTP) is sent to the consumer to be consumed on your website after the consumer has passed the traditional login procedure.For more details regarding the implementation please click [here](/api/v2/customer-identity-api/multi-factor-authentication/SMS-Authenticator/overview/).

With **Google Authenticator Workflow**, the user receives an OTP via an Authenticator App installed on their mobile device to be consumed on your website after the user has passed the traditional login procedure.For more details regarding the implementation please click [here](/api/v2/customer-identity-api/multi-factor-authentication/Google-Authenticator/overview/).

With **Email Passcode Workflow**, the consumer receives a verification code on their email id, they need to use this verification code as 2FA for login on the website.For more details regarding the implementation please click [here](/api/v2/customer-identity-api/multi-factor-authentication/Email-Authenticator/overview/).

With **Security Questions Workflow**, the consumer needs to set up a security question/answer at the time of registration or at first login and use that answer as 2FA for login on the website.For more details regarding the implementation please click [here](/api/v2/customer-identity-api/multi-factor-authentication/Security-Question-Authenticator/overview/).

**Flow Diagram:**
![Generalized MFA Workflow](https://apidocs.lrcontent.com/images/Generalized-MFA-Workflow_294536103026e0c0267.96536517.png "Generalized MFA Workflow")

> **Note:** The MFA feature will only work with the [Mandatory Email Verification ](/platform-features-overview/registration-services/email-workflow#email-verification)flow. It will not work with the [Optional Email Verification](/platform-features-overview/registration-services/email-workflow#email-verification) flow or No Verification Email flow.



## Customization of Label and Button in MFA:

### Button Name Change

```
LRObject.$hooks.call('setButtonsName',{"emailotp" : "Send Email to ","otpauthenticator":"Send SMS to Phone", "securityquestionsauthenticator":"Enter Security Questions", "googleauthenticator":"Set Google Authenticator app"});
```

### Label Change

```
LRObject.$hooks.call('customizeFormLabel',{
"otp":"Get verification code at %value"
});
```

`%value` is used to replace the phone and email when clicking on Verify Identity via SMS/Email.

## Various cases for Multi-Factor Authentication

**Case 1: If MFA flow is Required and No authenticator is configured and all options are enabled**

1.  Consumers will log in using email+password or phone+password or username+password and will get all authenticators.

    ![Security Question](https://apidocs.lrcontent.com/images/15--Security-Question_691661031196f19870.67252957.png "Security Question")

    - When clicked on **Verify Identity via Email**, OTP will be sent to email and the consumer can enter that OTP.

      Following screen will show:

      - When a single email is attached to a profile then it will directly show an OTP form

        ![Security Question OTP Form](https://apidocs.lrcontent.com/images/16--Security-Question_92926103120342af67.61572950.png "Security Question OTP Form")

      - When multiple emails are attached to a profile then it will show an Email dropdown to select the email.

        ![enter image description here](https://apidocs.lrcontent.com/images/17--Security-Question_7246103123c468a81.27642182.png "enter image title here")

      - Resend Verification code to send OTP to Email again.

      - **Back** button to go back to the previous screen.

    - When clicked on Security Questions Button

      - When no Security questions are set in profile, it will show complete Security Questions.

        Following screen will show:

        ![Complete Security Question](https://apidocs.lrcontent.com/images/18--Security-Question_258426103135dbbac44.05838791.png "Complete Security Question")

        In the above screen, we can set security questions and after submitting, it will enable the security question authenticator on this profile.

      - When Security questions are set in profile, in that case below screen will show:

        ![Answer Security Question](https://apidocs.lrcontent.com/images/19--Security-Question_30064610312c857ba57.34197652.png "Answer Security Question")

        If a consumer forgets the security answers and the security authenticator is not configured in profile, in that case, the customer can click on the button **Set Security Questions** . This will open all security questions from where they can set security questions and then configure the Security Questions authenticator.

    - When clicked on **Google Authenticator** button, following screen will show:

      ![Google Authentication QR Code](https://apidocs.lrcontent.com/images/20--Google-Authentication-QR-Code_10908610314280595f2.17895649.png "Google Authentication QR Code")

    - When clicked on Verify Identity Via SMS button then following screen will show:

      ![Phone Number](https://apidocs.lrcontent.com/images/21--Phone-Number_78036103145de11fe9.08856564.png "Phone Number")

      After updating the number, it will show the below screen for OTP verification:

      ![Verification Code](https://apidocs.lrcontent.com/images/22--Verification-Code_122836103149873e135.22552978.png "Verification Code")

**Case 2: When MFA flow is required and any of the authenticator is configured in profile:**

When any of the authenticator is configured in profile then Try another way to Sign In button appears on the screen which is used for backup code Login.

![Try another way to Sign In](https://apidocs.lrcontent.com/images/23--Try-another-way-to-Sign-In_16655610314e97c01d5.20155932.png "Try another way to Sign In")

When clicked on this, Backup Code form will show:

![Backup Code](https://apidocs.lrcontent.com/images/24--Backup-Code_22087610315297a6650.02925139.png "Backup Code")

**Case 3: MFA flow is Required and SMS, Email OTP and Security Questions configured on the profile then following screen will show.**

![Create MFA Setting](https://apidocs.lrcontent.com/images/25--Create-MFA-Setting_127276103157e309fa3.53993255.png "Create MFA Setting")

From here, consumers can disable any of the authenticators. If only one authenticator is configured then the disable button for authenticator is automatically disappeared as MFA flow is required, so at least 1 authenticator should be configured on the profile.

## Added Authenticator Order Change Option

`authenticatorOptionsOrder`

Default value is : `["emailotp","securityquestion","googleauth", "sms"]`

If you want to change the display order of Authenticators, then you can change the order in default value.

## Login Lockouts in different MFA Authenticators

If a consumer fails multiple times in validating the Second factor authentication, the account will be locked and the user will be asked to login again with credentials and the settings of [Brute force lockout](/api/v2/admin-console/platform-security/auth-security-configuration/#bruteforcelockout2) will be followed.

Case 1: When Lockout type is **suspend** in Bruteforce settings

- The account will be locked and the user will be asked to log back in after some time (suspension time duration mentioned in brute force Lockout ) using his credentials.

  ![Account Locked](https://apidocs.lrcontent.com/images/26--Account-Locked_12492610315dbe6ede8.22590694.png "Account Locked")

Case 2: When Lockout type is **Captcha** in Bruteforce settings

- The account will be locked and the user will be asked to log in again using his credentials and will be prompted to verify the Recaptcha.

  ![Login with valid ReCaptcha](https://apidocs.lrcontent.com/images/27--Login-with-valid-ReCaptcha_596761031644a68cc1.50279710.png "Login with valid ReCaptcha")

Case 3:When Lockout type is **Security Questions** in Bruteforce settings

- The account will be locked and the user will be asked to log in again using his credentials and will be prompted to answer the security questions which he had set during 2FA setup registration.

  ![Answers to Security Questions](https://apidocs.lrcontent.com/images/28--Answers-to-Security-Questions_1246961031679a61314.78904686.png "Answers to Security Questions")

Case 4: When Lockout type is **Block** in Bruteforce settings

- The account will be locked and the user will be asked to get the account unblocked from the administrator.

  ![Contact Admin](https://apidocs.lrcontent.com/images/29--Contact-Admin_21796610316b7be0f95.42579403.png "Contact Admin")

  > **Note:** When consumer’s account is locked and there is no other way to unlock the account, consumer can use the [Backup Codes](/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/overview/#backup-codes).

## Multi Factor Authentication with Risk Based Authentication

Risk Based Authentication is a user's action based authentication which works on a certain event which gets triggered based on consumers action. It can be described as a matrix of certain factors whose combination results in a risk profile. Based on this risk profile, additional authentication layer requirements can be added.

> **Note:** For more information on MFA with Risk Based Authentication, please refer to this document [here](/api/v2/customer-identity-api/multi-factor-authentication/MFA-with-Risk-Based-Authentication/).

## Disabling Multi-Factor Authenticator

Provided that you have MFA configured on your LoginRadius site/environment, LoginRadius provides your customers the ability to disable the Multi-Factor Authenticator on their accounts. They will only be able to disable it depending on your MFA configurations and the circumstances. Below are two scenarios and the corresponding actions which can be taken based on them.

**When MFA is configured as Mandatory in your LoginRadius Environment:** Since MFA is required in this case, the customer can only disable one of the MFA methods on their accounts. For example, assuming that the customer has both OTP and Google Authenticator enabled on their account, the customer can disable the OTP Authenticator method, but will still need to use Google Authenticator for login.

**When MFA is configured as Optional in your LoginRadius Environment:** If MFA is configured as Optional, your customers can disable both MFA methods. Which means they won't need to pass Multi-Factor Authentication to login. See the screenshot below as to how Customers can disable MFA on their accounts when using the Identity Experience Framework (Hosted).

![Disable MFA](https://apidocs.lrcontent.com/images/30--Edit-Profile_20383610317093092f0.52231556.png "Disable MFA")
