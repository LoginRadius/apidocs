# Multi-Factor Authentication Configuration

Multi-Factor Authentication, or MFA, is a multi-step verification process that provides an extra layer of security for the users' accounts. With MFA, once the user enters their login credentials or selects a social login, they are sent a specific authentication code to enter in order to completely log in. There are several ways in which the user can receive the code, including SMS, Google Authenticator application, or an email.

By default, MFA is disabled on your LoginRadius site. Following are the steps to enable MFA for your site:

1. Navigate to [Platform Security > Multi-Layered Security > Multi-Factor Authentication](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/settings) in the Admin Console and click on the switch under **Multi-Factor Authentication** in **Settings**.

   ![MFA - Settings](https://apidocs.lrcontent.com/images/MFA---Settings_280296285f97b4f00a8.74029355.png "MFA - Settings")

2. Select the relevant flow option under the **Select Flow** section and click **Save**.

   - **Optional:** End users will have the ability to enable or disable Two Factor Authentication on login.
   - **Required:** End users will be required to authenticate twice before logging in.

   ![MFA - Settings - Select Flow](https://apidocs.lrcontent.com/images/MFA---Settings---Select-Flow_67246285f9a33e8a93.30719797.png "MFA - Settings - Select Flow")

## Configuring Email Passcode

The following are the steps to implement the Email Passcode as second-factor authentication via Admin Console:

- To configure the Email Passcode for your app, navigate to [Platform Security > Multi-Layered Security > Multi-Factor Authentication > Email Passcode](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/email-passcode) and you will need to check the box **Select to enable**, to enable this feature as given in the below screen.

  ![Enable Email Passcode](https://apidocs.lrcontent.com/images/4_223526204d7056f53b7.07102954.png "Enable Email Passcode")

- If you want to customize the **Email Passcode** template, you can click on the **Add** button to add a template with the desired message you want to send to your consumers.

  ![Add Email Template](https://apidocs.lrcontent.com/images/5_93966204d7d3c7bb06.56107982.png "Add Email Template")

- Now to configure the Email settings you need to click on the **Email Passcode Settings** tab as given in the following screen. From here you can set the **Request Limit**, **Request Disable Period**, and **Multi-Factor OTP (verification code) validity limit**.

  ![Email Setting](https://apidocs.lrcontent.com/images/6_192156204d83b6bedb6.17193388.png "Email Settings")

- Once the **Email Passcode** is **enabled** for your consumers, they will get the following screen which will ask for a verification code, which was sent on their email and they can also resend the verification code.

  ![Verification Page](https://apidocs.lrcontent.com/images/Capture7_2451360a23fc142c053.50058753.png "Verification Page")

  ![Verification Page](https://apidocs.lrcontent.com/images/pasted-image-8_3103460a23ffa685296.15213981.png "Verification Page")

> **Note:** To set up an Email configuration provider you can click [here](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/email-configuration)

## Configuring SMS Passcode

- To configure Twilio as your SMS provider, see SMS configuration [here](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/sms-configuration).

- To customize the SMS template for two-factor authentication, go to [Platform Security > Multi-Layered Security > Multi-Factor Authentication > SMS Passcode](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/sms-passcode). You can add a new template or edit the existing one.

  ![SMS Passcode](https://apidocs.lrcontent.com/images/3_282466204d94b2413e3.67764706.png "SMS Passcode")

- To test MFA via SMS on your default hosted page, make a login attempt after which you will receive an OTP for the phone number provided.

  ![enter image description here](https://apidocs.lrcontent.com/images/social1_39065b0bdad7d98412.93724428.png)

- Once you enter the correct OTP, you will be able to log in and view your profile by default.

## Configuring Google Authenticator

To get the authentication codes from Google Authenticator, you can configure the settings under the **Google Authenticator** section.

- Click on **Select to enable** under the **Enable Google Authenticator App** section.

- Under **Configure the Settings** section, provide the relevant values. For **Issuer ID**, the value can be your product/company name.

- Provide valid values for **QR Code Width** and **Qr Code Height** (ideal values are 150 for both).

- Click the **Save** button to save the settings.

  ![Google Authenticator](https://apidocs.lrcontent.com/images/2_152716204da82459c08.49046541.png "Google Authenticator")

- To test MFA via the Google Authenticator app on your default hosted page, try registering as a new user. When you attempt to log in, you will be presented with the screen as shown below. Scan the QR code with the Google Authenticator app to generate a time-based authentication code. Provide the code here and repeat every time a login attempt is made.

  ![FORM](https://apidocs.lrcontent.com/images/ga_174375b0bd8ecc2fee0.21184010.png)

## Configuring Security Questions

The following are the steps to implement the multi-factor authentication by security questions via Admin Console:

- To configure MFA by security questions for your app, navigate to [Platform security > Multi-Layered Security > Multi-Factor authentication > Security Questions](https://adminconsole.loginradius.com/platform-security/multi-layered-security/multi-factor-authentication/security-questions) and **Enable** security question for MFA. Please see the image below for your reference.

  ![Enable Security Questions](https://apidocs.lrcontent.com/images/7_284466204db1bd04ee5.39249114.png "Enable Security Questions")

- Select the number of security questions that you want to appear at the time of authentication and **Save** it.

  ![Select Security Questions](https://apidocs.lrcontent.com/images/8_255816204db55b66068.88330165.png "Select Security Questions")

> **Note:** You can configure new security questions, modify/update previously added questions, and also set a failure attempt limit for them from [here](https://adminconsole.loginradius.com/platform-security/multi-layered-security/security-question/settings).
