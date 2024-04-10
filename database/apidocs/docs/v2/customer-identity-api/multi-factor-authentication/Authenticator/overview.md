# Authenticator Workflow

## Overview

In the Authenticator flow, consumers get an Authenticator Code via the Authenticator App installed on their mobile device to be consumed at the time of the 2nd step of MFA.

**Flow Diagram:**
![Authenticator Flow](https://apidocs.lrcontent.com/images/flow_1019494402661614e6684b71.02082616.png "Authenticator Flow")

To implement the Authenticator workflow, take the following steps:

1. Configure the [Multi-Factor Authentication settings in the Admin Console](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/google-authenticator)

   Next, you will need to decide how you will implement the Authenticator Workflow.

2. There are 2 different ways to implement Authenticator MFA with LoginRadius:

   - [Authenticator Implementation with the LoginRadius JavaScript Interface](#authenticator-implementation-with-the-loginradius-javascript-interface)
   - [Authenticator API Implementation](#authenticator-api-implementation)

### Admin Console Configuration for Authenticator

To implement this, please follow the below steps:

1.  The first step to configure Authenticator is to enable it in your LoginRadius Admin Console.

    > **Note:** LoginRadius supports configuring Google Authenticator, Microsoft Authenticator, Twilio Authy Authenticator, LastPass, Dashlane, Duo, and various other authenticator applications that support both time-based one-time passwords (TOTP) and HMAC-based one-time passwords (HOTP) for authentication. You can conveniently manage these settings through the [Platform Security > Multi Factor Authentication > Authenticator Apps](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/authenticator-apps) section of the Admin Console. For further information, please reach out to [LoginRadius support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

2.  Navigate to [Platform Security > Multi-Factor Authentication > Authenticator Apps](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/authenticator-apps) under the Admin Console.

3.  Click on **Authenticator** from the left-hand panel.

4.  Click on the toggle button to enable the Authenticator App 

    ![Authenticator](https://apidocs.lrcontent.com/images/AuthenticatorApp_1717715456575feffde73a7.07653235.png "Authenticator")

5.  Under **ISSUER ID**, you will need to enter an ID that will represent your website/app name in the Authenticator.

6.  Under QR Code Width and QR Code Height, you can specify in pixels the dimensions of the QR Code that will be presented to the end-user for scanning.

7.  Hit **Save** and click **Settings** on the left-hand side.

8.  Select the **Settings** tab and choose **Enable**.

9.  Under the **Select Flow** dropdown, If you choose **Required** workflow, MFA will be mandatory for all consumers. Consumers will be required to authenticate twice before logging in.

    If you choose **Optional**, MFA will be optional. consumers will have the ability to enable or disable MFA on login.

    ![MFA](https://apidocs.lrcontent.com/images/MFA2_687293866575ffd8abb1c7.15430598.png "MFA")

### Authenticator Implementation with the LoginRadius JavaScript Interface

Follow the steps below to integrate MFA using the LoginRadius JavaScript Interface.

1.  Has the JavaScript Login interface been initialized on your page, as [shown here](/api/v2/user-registration/user-registration-getting-started#login6).

2.  Add the desired parameter options for MFA in your [initialization options](/api/v2/user-registration/user-registration-getting-started#initializationofloginradiusobject3).

    Here are the available options:

    - twoFactorAuthentication (Required): This option is required and needs to be set to true to ensure that the JavaScript interface will load the Multi-Factor prompts.

    - qrCodeAuthentication (Required): This option is required and needs to be set to true to ensure that the JavaScript interface will load the Authenticator prompts.

3.  Upon successful login, you can add an additional interface for the customer to be able to customize their Multi-Factor settings. For example, disable Multi-Factor (if the MFA workflow mode is optional).

    If you wish to add this, please see our [JavaScript Interface instructions](/api/v2/user-registration/user-registration-getting-started#createtwofactorauthentication26).

### Authenticator API Implementation

Follow the steps below to implement MFA using a mix of front-end and back-end API calls:

> **Note:** As a general rule, if an API call requires an API Secret, it should be called from the back-end. Otherwise, the API call can also be used on the front end.

1.  Set up a login workflow using the preferred method. Each method depends on how you want the user to authenticate for the first factor.

    You can use the following first-factor methods:

    - **MFA Email Login API:** To have a Standard Login flow requiring email and password.

    - **MFA UserName Login API:** To use UserName and Password as opposed to Email and Password.

    - **MFA Phone Login:** If your API has been configured for Phone-based Authentication, use this API to authenticate the user via phone.

    Upon successful login, the user will receive a JSON response containing information relevant to performing the Authenticator login:

    ```

    {
    "SecondFactorAuthentication": {
    "SecondFactorAuthenticationToken": "32ba53ff-XXXX-XXX-XXX-XXXXXXXXXXXX",
    "ExpireIn": "2017-08-31T01:39:28.1427384Z",
    "QRCode": "http://chart.googleapis.com/chart?cht=XXXXXXXXXXXXX",
    "ManualEntryCode": "XXXXXXXXXXXXXXXXXXXX",
    "IsGoogleAuthenticatorVerified": false,
    "IsAuthenticatorVerified": false,
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

    > **Note:** The response contains a link to the QR code to be displayed to the user.

2.  Allow the consumer to log in by providing the passcode received via their Authenticator mobile app using either the [MFA Validate Authenticator Code](/api/v2/customer-identity-api/multi-factor-authentication/authenticator/mfa-validate-authenticator-code), which takes the passcode, or the second-factor authentication token.

3. In the case of optional MFA, you can use [MFA Verify Authenticator Code](/api/v2/customer-identity-api/multi-factor-authentication/authenticator/mfa-verify-authenticator-code) API to validate an Authenticator Code as part of the MFA process.

4.  Provide additional workflows or options to the consumer by leveraging the MFA API. For example, allow your consumers to remove Multi-Factor Authentication from their login process by using the [MFA Reset Authenticator by Token API](/api/v2/customer-identity-api/multi-factor-authentication/authenticator/mfa-reset-authenticator-by-token/) API call, and you can remove MFA from their login by calling [MFA Reset Authenticator by UID API](/api/v2/customer-identity-api/multi-factor-authentication/authenticator/mfa-reset-authenticator-by-uid/) API on the server-side.
