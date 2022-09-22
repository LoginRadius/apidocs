# Customer Security Introduction

**Customer Security** is an essential part of Customer Experience. LoginRadius emphasis on customer security to prevent harmful and malicious activities and ensures that the customer profiles and data are protected from fraudulent activity.

The following aspects of customer security are available in the LoginRadius Identity Platform:

- [Captcha](#partcaptcha0): It is a technique, which distinguishes between humans and bots. CAPTCHA is mainly used as a security check to ensure only humans can pass through. Generally, bots are not capable of solving a captcha.

- [Access Restriction](#partaccessrestriction9): This feature allows you to restrict or permit only specific users for registration. You can apply it by either blacklisting or whitelisting users with the specific domain(s) and email(s) to create accounts on your application.

- [Brute Force Lockout](#partbruteforcelockout11): This feature allows you to set the number of maximum failed login attempts allowed for the customers until the application triggers a security action. The following predefined list security actions from which you can choose one:

  - Suspend customer’s account for a defined period

  - Populate security questions

  - Populate CAPTCHA

  - Block customer’s account

- [Force Logout](#partforcelogout14): If enabled, upon Password Reset or Password Change, it will expire all active sessions of a customer except the session in which the password has been reset/changed.

For more security aspects supported by LoginRadius Identity Platform, you can refer to the [Session Management](/authentication/concepts/session-management/) and [Password Policy](/authentication/concepts/password-policy) documents.

> **Pre-requisites**: Basic knowledge of HTML and JavaScript.

## Part 1 - CAPTCHA

LoginRadius Identity Platform provides you the feature to add another layer of security to your registration form by configuring CAPTCHA, which ensures that the person registering is not a bot.

As a part of your Login and Registration flows, LoginRadius CAPTCHA settings allow you to enable the following :

- [Google reCaptcha:](#googlerecaptchaconfiguration2) reCAPTCHA is a service from Google that protects web applications from spam and abuse. It is easy for humans to solve, but hard for “bots” and other malicious software to figure out.

  Currently, LoginRadius supports two different versions of the Google reCAPTCHA.

  - **reCAPTCHA v2**: This is the second version of the reCAPTCHA service. With this, customers are presented with descriptions along with a set of images to identify based on the description.

  - **Invisible reCAPTCHA**: This version provides a better experience to the customers by tracking mouse movements to identify if a human is interacting with the application or it is a bot. If identified as a bot, it displays the CAPTCHA option on the screen.

  > **Note**: You can select one of the reCAPTCHA options while configuring CAPTCHA settings in Google.

- [QQ Tencent Captcha:](#tencentcaptchaconfiguration3) Tencent Captcha is a popular China-based CAPTCHA service. It prevents bot registration and protects web applications from spam and abuse.

  The following explains the configuration and deployment of above CAPTCHA features:

  ### Captcha Configuration

  This section focuses on the configuration methods for the following CAPTCHA:

  - [Google Recaptcha](/authentication/concepts/customer-security/#googlerecaptchaconfiguration2)
  - [Tencent Captcha](/authentication/concepts/customer-security/#tencentcaptchaconfiguration3)

  #### Google reCAPTCHA Configuration

  This section covers the required configurations that you need to perform to implement the Google reCAPTCHA functionality.

  **Step 1:** Log in to your Google account, navigate to https://www.google.com/recaptcha/intro/v3.html, and select **Admin console** on the top right, as highlighted in the following screen:

  ![home page](https://apidocs.lrcontent.com/images/cs1_1_89_113705e84f763519b55.09085728.png "home page")

  You will be redirected to the reCAPTCHA's configuration section.

  **Step 2:** Click the **+ (create)** button, as highlighted in the following screen:

  ![plus button](https://apidocs.lrcontent.com/images/image2_222985e84c983618741.90367243.png "plus button")

  The following screen will appear:

  ![captcha type](https://apidocs.lrcontent.com/images/image3_289305e84ca10a125d2.55348353.png "captcha type")

  **Step 3:** Enter the name/label for the reCAPTCHA configuration (you can use your application’s name) and select the version of the reCAPTCHA you would like to use.

  Upon selecting the reCAPTCHA type, the following screen will appear:

  ![local host](https://apidocs.lrcontent.com/images/image4_170925e84cc5dee7935.28123208.png "local host")

  **Step 4:** Enter the domain where this reCAPTCHA will be used.

  The purpose is to whitelist your application domain. If you are implementing in your development environment, enter **localhost**.

  **Step 5:** Accept the reCaptcha terms of service and then click the **Register** button, as highlighted in the following screen:

![term and condition](https://apidocs.lrcontent.com/images/image5_129275e84cd2dec29b6.28753277.png "term and condition")

**Step 6:** Upon registration, reCAPTCHA credentials will be generated, as highlighted in the following screen.

![keys](https://apidocs.lrcontent.com/images/image6_107445e84cd637363e8.15038585.png "keys")

Make a note of these credentials for configuring reCAPTCHA in the LoginRadius Identity Platform.

**Step 7:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account and navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/auth-security/captcha-settings target=_blank>**Platform Security > Account Protection > Auth Security**</a>.

The following screen will appear:

![Security](https://apidocs.lrcontent.com/images/8_421162040dba9a1397.96188706.png "Security")

**Step 8:** In the Google ReCAPTCHA2 Settings tab, enter the Google reCAPTCHA credentials obtained from **Step 6** and click the Save button.

![google recaptcha settings](https://apidocs.lrcontent.com/images/image8_254275e84cdb63997b9.14886098.png "google recaptcha settings")

Google reCAPTCHA is now configured, for deployment details, refer to the [Captcha Deployment](/authentication/concepts/customer-security/#captchadeployment4) section.

#### Tencent Captcha Configuration

This section covers the required configurations that you need to perform to implement the Tencent CAPTCHA functionality.

**Step 1:** Sign Up on [QQ](https://ssl.zc.qq.com/v3/index-en.html). The following displays the sign-up screen:

![QQ signup](https://apidocs.lrcontent.com/images/step1_148115e84d49907fa91.56842470.png "QQ signup")

**Step 2:** Once you are logged into the QQ account, scan the QR code [here](https://007.qq.com/captcha/) to configure Tencent Captcha.

![QR code](https://apidocs.lrcontent.com/images/step2_184665e84d4c1985971.70273225.png "QR code")

**Step 3:** Create an application by clicking the highlighted button in the following screen:

![create application](https://apidocs.lrcontent.com/images/step3_259925e84dae4e16649.79626652.png "create application")

**Step 4:** Enter the required details for the application and register as displayed in the following screen:

![register](https://apidocs.lrcontent.com/images/step4_208785e84db1fdaf0c8.98236282.png "register")

**Step 5:** Once the application is registered, your App credentials will be generated. The following screen displays the generated credentials:

![app credentials](https://apidocs.lrcontent.com/images/step5_206575e84db64c4eaf3.48437301.png "app credentials")

Make a note of these credentials since it is required to configure Tencent Captcha in the LoginRadius Identity Platform.

**Step 6:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account, navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/auth-security/captcha-settings target=_blank>**Platform Security > Account Protection > Auth Security**]</a> and select the QQ Tencent CAPTCHA Settings tab.

The following screen will appear:

![captcha settings](https://apidocs.lrcontent.com/images/step6_258495e84db96b79420.52220651.png "captcha settings")

**Step 7:** Enter the **App credentials** obtained from **step 5** and click the Save button.

![QQ settings](https://apidocs.lrcontent.com/images/step7_14645e84dbecc108e1.43231902.png "QQ settings")

Tencent CAPTCHA is now configured, for deployment details, refer to the [Captcha Deployment](/authentication/concepts/customer-security/#captchadeployment4) section.

### Captcha Deployment

This section focuses on the deployment methods for the following CAPTCHA:

- [Google Recaptcha](#googlerecaptchadeployment5)
- [Tencent Captcha](#tencentcaptchadeployment6)

#### Google reCAPTCHA Deployment

The following explains how you can deploy the Google reCAPTCHA:

**Step 1.** After [**configuring**](/authentication/concepts/customer-security/#captchaconfiguration1) the Google reCAPTCHA in the LoginRadius Identity Platform, navigate to <a href = https://adminconsole.loginradius.com/deployment/js-widgets/settings target=_blank>**Deployment > JS Widgets**</a>. The following screen will appear:

![Js Widgets - Settings](https://apidocs.lrcontent.com/images/Js-Widgets---Settings_145706281c0b1909844.05708943.png "Js Widgets - Settings")

**Step 2.** Click on the switch to enable the respective version of the Google reCAPTCHA under the **Google Recaptcha** section.

![Js-Widgets-Settings - Google ReCaptcha](https://apidocs.lrcontent.com/images/Js-Widgets-Settings---Google-ReCaptcha_115296281f5e25dadd8.35880017.png "Js-Widgets-Settings - Google ReCaptcha")

You can view the enabled Google reCAPTCHA option on the IDX Page (<https://<sitename>.hub.loginradius.com/auth.aspx>, where [sitename](/api/v2/admin-console/deployment/get-site-app-name/) is the name of your LoginRadius Site)

The following displays the configured **Google V2 Recaptcha** option on IDX Page:

![captcha on idx](https://apidocs.lrcontent.com/images/recaptchaonidx_194745e84e72a9149f3.57475794.png "captcha on idx")

> **Note:** If you have configured and deployed the **Invisible reCAPTCHA**, the captcha option will not be displayed on the registration page until the bot activity is detected.

#### Tencent CAPTCHA Deployment

After [configuring](/authentication/concepts/customer-security/#tencentcaptchaconfiguration3) the credentials in the LoginRadius Identity Platform, you can implement the Tencent CAPTCHA using one of the following options:

- [IDX](#idxdeployment7)
- [JavaScript Libraries](#javascriptdeployment8)

#### IDX Deployment

The following explains how you can deploy the **Tencent CAPTCHA** using **IDX**:

**Step 1:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account and navigate to <a href = https://adminconsole.loginradius.com/deployment/idx target=_blank>**Deployment >Identity Experience Framework Hosted**</a>.

The following screen will appear:

![idx page](https://apidocs.lrcontent.com/images/U6_58335ee215753ab444.33650508.png "idx page")

**Step 2:** Make sure that the **Authentication Pages** option is selected from the left hand side panel. Click the **script (End or Before)** folder from the left navigation panel. For example, click the **Before Script** folder and default **Auth - Before Script** file will be displayed as shown in the screen below:

![before script](https://apidocs.lrcontent.com/images/U7_215665ee2158772d656.46675228.png "before script")

**Step-3:** Include the following code in **Auth - Before Script** file to load the Tencent Captcha interface in your web application:

```
options = {};
options.apikey = "<Your LoginRadius API key>";
options.appName = "<LoginRadius Site Name>";
options.tencentCaptchaAppid = "<TENCENT_CAPTCHA_APP_ID>"
//If you want only Tencent Captcha to be enabled
options.tencentCaptcha = true;
//If you want Tencent Captcha to work when Google reCAPTCHA doesn’t
//options.tencentCaptchaAsFallback = true;
var LRObject= new LoginRadiusV2(option);

```

> **Note:** At any point in time, only **one** of the two options i.e. **tencentCaptcha** and **tencentCaptchaAsFallback** can be enabled.

> If **tencentCaptchaAsFallback** is enabled, **within China**, the application will display the **TencentCAPTCHA option**, and **outside of China**, the application will display the **Google reCAPTCHA** option.

#### JavaScript Deployment

The following explains how you can deploy **Tencent CAPTCHA** using **LoginRadius JS Libraries**:

**Step 1:** Include the **LoginRadius JavaScript Libraries**, as explained below:

Add the following JavaScript to head tag just before closing the body tag of Index.html file:

```
https://auth.lrcontent.com/v2/js/LoginRadiusV2.js

```

> **Note:** It is recommended to utilize the script from our CDN domain (https://auth.lrcontent.com/v2/js/LoginRadiusV2.js) rather than making a local copy.

**Step 2:** Initialize the LoginRadiusV2 Object as explained below:

Add this JavaScript code to initialize LoginRadiusV2 Object on your website.

```
var commonOptions = {};
commonOptions.apiKey = "<your loginradius API key>";
commonOptions.appName = "<LoginRadius site name>";
commonOptions.phoneLogin = True;
var LRObject= new LoginRadiusV2(commonOptions);

```

**Step 3:** Include the following code to load the **Tencent CAPTCHA** interface in your web application:

```
options = {};
options.apikey = "<Your LoginRadius API key>";
options.appName = "<LoginRadius Site Name>";
options.tencentCaptchaAppid = "<TENCENT_CAPTCHA_APP_ID>"
//If you want only Tencent Captcha to be enabled
options.tencentCaptcha = true;
//If you want Tencent Captcha to work when Google reCAPTCHA doesn’t
//options.tencentCaptchaAsFallback = true;
var LRObject= new LoginRadiusV2(option);

```

## Part 2 - Access Restriction

The **Access Restriction** feature can be used to block registration from spam or disposable emails and allows you to control access or registration to your LoginRadius Identity Platform by configuring the whitelist or blacklist settings.

- **Whitelist Settings** can be used to allow access to specific email addresses and domains that are added to the whitelist.

- **Blacklist Settings** can be used to prevent access to specific email addresses and domains that are added to the blacklist.

### Access Restriction Configuration

This section covers the required configurations that you need to perform to implement the Access Restriction functionality.

**Step 1:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account, navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/auth-security/access-restriction target=_blank> **Platform Security > Account Protection > Auth Security**</a> and select the **Access Registration** option from the left navigation panel.

The following screen will appear:

![access restriction](https://apidocs.lrcontent.com/images/step1_256895e84ee5b529180.65271140.png "access restriction")

**Step 2:** Select the **Restriction Type** to Whitelist or Blacklist the email address(s) or domain(s) as per your business requirements:

To **Whitelist** the email address or domains, select the **Whitelist** option, and add the email address(s) or domain(s) under the **Configuration** section as highlighted in the following screen:

![whitelist](https://apidocs.lrcontent.com/images/step2_112035e84ee811d4302.59086305.png "whitelist")

Click the **Save** button to save your settings.

For example, To allow only your company users to register on your application, you can whitelist your company’s domain in this section.

OR

To **Blacklist** the email address(s) or domain(s), select the **Blacklist** option, and add the email address(s) or domain(s) under the **Configuration** section, as highlighted in the following screen:

![blacklist](https://apidocs.lrcontent.com/images/step3_293795e84eea77a4dc1.77684608.png "blacklist")

Click the **Save** button to save your settings.

For example, To only allow the professional users to register on your application, you can blacklist domains of generic email services like Google, Yahoo, and more.

> **Note:** Once configured, the **Access Restriction** will reflect on your IDX or JavaScript implementation i.e., no separate deployment is required for this feature.

## Part 3 - Brute Force Lockout

The **Brute Force Lockout** feature allows you to restrict account access based on failed login attempts. Once the limit of failed login attempts is reached, the customer will either get blocked or prompted to complete an additional security step to log in.

### Brute Force Lockout Configuration

This section covers the required configurations that you need to perform in the LoginRadius Identity Platform to implement the Brute Force Lockout functionality.

**Step 1:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account, navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/auth-security/captcha-settings target=_blank>**Platform Security >Account Protection > Auth Security**</a> and select the **Brute Force Lockout** option from the left navigation panel.

The following screen will appear:

![brute force](https://apidocs.lrcontent.com/images/step1_250415e84f09bcdb7c1.70809096.png "brute force")

**Step 2:** Set the maximum number of allowed failed login attempts in the **Brute Force Lockout Threshold** field. If the customer reaches this threshold value, their account will be locked out.

![threshold](https://apidocs.lrcontent.com/images/step2_280565e84f0e024a4e9.26833710.png "threshold")

**Step 3:** Select the **Lockout Type** you wish to trigger when the threshold limit is reached. The following screen displays the available lockout type options:

![lockout type](https://apidocs.lrcontent.com/images/step3_115845e84f1018f08c6.66335986.png "lockout type")

The LoginRadius Identity Platform supports the following four lockout types:

- **Suspend:** Select this option to prevent the customer from logging in for a specified amount of time mentioned in **Suspend Effective Period**, once the account is locked.

> **Suspend Effective Period** is the Effective period for which the account is suspended. Default Suspend Effective Period is 900 seconds.

- **Captcha:** Select this option to prompt the customer to complete a [Captcha](#partcaptcha0) to log in, if the account is locked.

> **Pre-requisites:** You must have [Google reCAPTCHA V2](#googlerecaptchaconfiguration2) or [Tencent Captcha](#tencentcaptchaconfiguration3) configured in your LoginRadius Identity Platform.

- **Security Question:** Select this option to prompt the customer to answer a [Security Question](/api/v2/admin-console/platform-security/security-question/) to log in, if the account is locked.

> **Pre-requisites:** At least one Security Question must be configured in your account, and the customer who is being prompted to answer the question must have already provided a valid answer.

To handle this further, you can implement the logic in your application, for the scenario, where the security question is answered wrong by the customer.

- **Block:** Select this option to block the customer, on reaching the failed login attempt threshold. It will prevent the customer from logging in until unblocked by your admin team. Blocked customers can be managed from the [Profile Management](/authentication/concepts/customer-management/#partblockedcustomers1) tab.

> **Note:** If a customer did not reach the **Brute Force Lockout Threshold** and logged in successfully, the API's counter for the failed login attempts will be reset to zero automatically.

You can get the locked customer profile by calling [Account Profiles by Email API](/api/v2/customer-identity-api/account/account-profiles-by-email/).
In the response, you will get a field named **IsLoginLocked** with the value set as **true** and **LoginLockedType** with the LockoutType value.

### Unlocking Account

Please refer the following ways to unlock your locked account regardless of if you've passed the given challenges:

1. **Admin Console:** You can unblock the account directly via the Admin Console. Please refer to our Customer management [document](/customer-management/profile-view/)for more details regarding the same.

2. **Account update API:** You can leverage our [Account Update API](/api/v2/customer-identity-api/account/account-update/) to unlock the locked account.
   <br><br>**Case 1:** For Lockout type: Suspend, Recaptcha, and Security Question
   <br><br>Update the **"IsLoginLocked"** field on the user's profile by [Account Update API](/api/v2/customer-identity-api/account/account-update/) to unblock the account. For example,

```
{
"IsLoginLocked": false
}
```

<b><br> **Case 2:** For Lockout Type: Block
<br><br>Update the **“IsActive”** and **"IsLoginLocked"** field together on the user's profile by [Account Update API](/api/v2/customer-identity-api/account/account-update/) to unblock the account. For example,

```
{
"IsLoginLocked" : false,
"IsActive" : true
}
```

- **Auth Unlock Account By Access Token API:** You can also leverage our [Auth Unlock Account by Access Token API](/api/v2/customer-identity-api/authentication/auth-unlock-account-by-access-token) with a valid access_token, please note that this API is applicable for the Recaptcha, and Security Question Lockout Types.

> **Note:**

- You can leverage our [Account impersonation API](/api/v2/customer-identity-api/account/account-impersonation-api/) in order to get a valid Access Token.
- Once configured, no separate deployment is required to access this feature in the IDX or JS implementation of the LoginRadius Identity Platform

## Part 4 - Force Logout

Enabling **Force Logout** allows you to expire all active sessions of a customer on Password Reset or Change, except the session in which the password has been reset/changed.

### Force Logout Configuration

This section covers the required configurations that you need to perform to implement the Force Logout functionality.

**Step 1:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account, navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/session-management/force-logout target=_blank>**Platform Security > Account Protection > Session Management** </a> and select **Force Logout** option from the left navigation panel.

The following screen will appear:

![force logout](https://apidocs.lrcontent.com/images/step1_284125e84f3fd301b29.34232201.png "force logout")

**Step 2:** Select the **Force Logout** checkbox to enable this feature, as highlighted in the following screen:

![enable force logout](https://apidocs.lrcontent.com/images/step2_272945e84f42261e025.43886242.png "enable force logout")

> **Note:** Once configured, no separate deployment is required to access this feature in the IDX or JS implementation of the LoginRadius Identity Platform

## Part 5 - Next Steps

The following is the list of features you might want to add-on to the above implementation:

[Session Management](/authentication/concepts/session-management/)

[Password Policy](/authentication/concepts/password-policy/)
