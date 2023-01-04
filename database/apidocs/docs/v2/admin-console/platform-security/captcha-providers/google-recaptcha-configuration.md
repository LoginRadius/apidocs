# Google reCAPTCHA with LoginRadius

[Google reCAPTCHA](https://www.google.com/recaptcha/about/) is a popular CAPTCHA-like system that provides bot protection for websites introduced on May 27, 2007. This section covers configuring reCAPTCHA with your LoginRadius implementation.

For more conceptual information on the Google reCAPTCHA, refer to the documentation [here](/authentication/concepts/customer-security/#partcaptcha0).

## Configuration

Refer to the below-mentioned steps to configure the Invisible reCAPTCHA with your LoginRadius implementation.

1. Log in to your Google account. Once you are logged in, head over to https://www.google.com/recaptcha/about/ and click on v3 Admin Console.

   ![Step 1 - v3 Admin Console](https://apidocs.lrcontent.com/images/Step-1_109076547563ae8feb0b0449.74825455.png "Step 1 - v3 Admin Console")

2. If you are already a consumer of Google reCAPTCHA, you will land on your Dashboard.

   - In case you want to configure your previous site, then select the site from the dropdown and click on settings (cog icon).

   - Or if you’re going to register a new site, then click on add (+ icon), and you will be taken to register a new site as shown in the next step.

   ![Step 2 - Setting or register a new site](https://apidocs.lrcontent.com/images/Step-2_103959808863ae90271a2332.47052030.png "Step 2 - Setting or register a new site")

3. If you are a new consumer of Google reCAPTCHA, click on Register a new site and the following screen will appear.

   ![Step 3 - Register a new site](https://apidocs.lrcontent.com/images/Step-3_194946435063ae90820127e0.16390200.png "Step 3 - Register a new site")

4. Look for the Label and provide a name for this new reCAPTCHA configuration. You can use your site's name, and then select Invisible reCAPTCHA badge under reCAPTCHA v2.

   ![Step 4 - Invisible reCAPTCHA](https://apidocs.lrcontent.com/images/Step-4_182405686863ae90aa08fe97.32617659.png "Step 4 - Invisible reCAPTCHA")

5. Scroll down to provide domains using the reCAPTCHA. This is for whitelisting purpose. If this is for your development environment, you can provide **localhost**, otherwise, provide your website's domain followed by accepting the reCAPTCHA Terms of Service. And once you are done, click on the **SUBMIT** button.

   ![Step 5 - Submit](https://apidocs.lrcontent.com/images/Step-5_134504161163ae90d57de504.64026376.png "Step 5 - Submit")

6. On successful submission, you will be shown your newly created reCAPTCHA credentials. You will need to copy it to the LoginRadius Admin Console.

   ![Step 6 - Google reCAPTCHA Keys](https://apidocs.lrcontent.com/images/Step-6_157458502063ae91075d68c1.35153480.png "Step 6 - Google reCAPTCHA Keys")

7. Navigate to [Platform Security > Auth Security > CAPTCHA Setting](https://adminconsole.loginradius.com/platform-security/account-protection/auth-security/captcha-settings) and provide your Google reCAPTCHA **SITE KEY** and **SECRET KEY** under the **Google ReCAPTCHA2 Setting** tab and click on the **SAVE** button.

   ![Step 7 - Public & Private Key](https://apidocs.lrcontent.com/images/Step-7_208186809463ae91347d6103.86924260.png "Step 7 - Public & Private Key")

## Deployment

The following explains how you can deploy the Google Invisible reCAPTCHA:

1. After configuring the Google reCAPTCHA in the Admin Console, navigate to [Deployment > JS Widgets](https://adminconsole.loginradius.com/deployment/js-widgets/settings) and click on the switch associated with **Google Recaptcha** to enable configured Google Invisible reCAPTCHA.

   ![Deployment - JS Widgets](https://apidocs.lrcontent.com/images/JS-Widgets_12046586663ae92137864a6.06256755.png "Deployment - JS Widgets")

2. Now, you can view the deployed Google Invisible reCAPTCHA option on the IDX Page (`https://<sitename>.hub.loginradius.com/auth.aspx`, where **sitename** is the name of your LoginRadius site).

   ![IDX](https://apidocs.lrcontent.com/images/Invisible-Google-reCAPTCHA_174785599063ae925f327726.73103814.png "IDX")

> **Note:**
>
> - If you have configured and deployed the Invisible reCAPTCHA, the captcha option will not be displayed on the registration page until the bot activity is detected.
> - The Google V2 reCAPTCHA has been removed from LoginRadius Admin Console, however, it will still be visible under [Deployment > JS Widgets](https://adminconsole.loginradius.com/deployment/js-widgets/settings), only if it was already enabled. In such a case, the Google Recaptcha section under the [JS Widgets](https://adminconsole.loginradius.com/deployment/js-widgets/settings) would look like:

![Deployment - Older](https://apidocs.lrcontent.com/images/V2-Google-reCAPTCHA_123929606263ae91f6a60983.01565505.png "Deployment - Older")

## Google reCAPTCHA with LoginRadiusV2.js

Once you have configured your Google reCAPTCHA account in the LoginRadius Admin Console, follow the steps below to include Google reCAPTCHA on the registration form in your LoginRadius interfaces.

**1**. Add the **v2RecaptchaSiteKey** along with the **invisibleRecaptcha** parameters to your LoginRadius JS [Initialization Object](/api/v2/user-registration/user-registration-getting-started).

```
option = {};
option.apikey = "&lt;Your LoginRadius API key>";
option.appName = "&lt;LoginRadius Site Name>";
option.v2RecaptchaSiteKey = 'Your Google recaptcha v2 Sitekey';
option.invisibleRecaptcha = true;
```

**2**. The reCAPTCHA language can be changed using the **v2RecaptchaLanguage** parameter and giving it the desired[ language code](https://developers.google.com/recaptcha/docs/language).

<!--

## **Display Different CAPTCHAs**

By default, when you set up a CAPTCHA with the LoginRadiusV2.js, it is applied to the registration form site-wide. However, if you need to use a different CAPTCHA based on the form displayed, this can be handled via our[ eventCalls](https://www.loginradius.com/docs/api/v2/deployment/js-libraries/javascript-hooks#eventcallshook17) and[ beforeInit](https://www.loginradius.com/docs/api/v2/deployment/js-libraries/javascript-hooks#beforeactioninithook0) JavaScript hooks.

In this example below, we display the Google Invisible reCAPTCHA if the user is facing the registration form. If the user is facing any other form, we show Google reCAPTCHA V2 as the CAPTCHA.

**Example:**

```
LRObject.$hooks.register('eventCalls', function(name){
    console.log(name)
    if(name == 'registration'){
      LRObject.options.invisibleRecaptcha = true;
    LRObject.options.v2Recaptcha = false;
    }
    else {
        LRObject.options.invisibleRecaptcha = false;
    LRObject.options.v2Recaptcha = true;
    }
});

LRObject.$hooks.register('beforeInit', function(name){
    console.log(name)
    if(name == 'registration'){
      LRObject.options.invisibleRecaptcha = true;
    LRObject.options.v2Recaptcha = false;
    }
    else {
        LRObject.options.invisibleRecaptcha = false;
        LRObject.options.v2Recaptcha = true;
    }
});

```
-->

## **Display Invisible reCAPTCHA at Login Form**

When the invisible reCAPTCHA is enabled from the LoginRadius Admin Console, it will be enabled for the registration form. However, if someone is making large amount of login API calls using some scripts (DDoS attack) on your application, it can disrupt the normal traffic at the LoginRadius server, we recommend implementing the Invisible reCAPTCHA feature on your login form to prevent the DDoS attack.

The Invisible reCAPTCHA feature only triggers the challenge if the form submission is detected by some bots instead of a human being. Hence, it will provide a smooth experience to users and will trigger the CAPTCHA only when the form is submitted by Bots.

Following is a step-by-step guide to implement Invisible reCAPTCHA feature on Login Form:

**1**. Enable invisible reCAPTCHA from the LoginRadius Admin Console using configuration steps provided in this document earlier.

**2**. Disable the invisible reCAPTCHA for registration form using the following code before initialization of LoginRadius Object.

```
raasoption.invisibleRecaptcha = false;
```

**3**. Add the following code to render the invisible reCAPTCHA only at the login page.

```
LRObject.$hooks.register('beforeFormRender', function(name, schema) {
LRObject.options.invisibleRecaptcha = false;

if (name == 'login' ) {

LRObject.options.invisibleRecaptcha = true;
 LRObject.util.addRecaptchaJS(); LRObject.util.captchaSchema("loginradius-recaptcha_widget_login", schema);

}
});
```

**4**. Add the following code to stop resetting the invisible reCAPTCHA.

```

LRObject.$hooks.register(‘eventCalls’, function(name){

LRObject.options.invisibleRecaptcha = false;

LRObject.options.optionalRecaptchaConfiguration.IsEnabled = true;

if (name == ‘login’ ) {

LRObject.options.invisibleRecaptcha = true;

LRObject.options.optionalRecaptchaConfiguration.IsEnabled = false;

}

});
```

You will now notice that the invisible reCAPTCHA is enabled only at the Login form.

> **Note**: The invisible reCAPTCHA is a front end element and LoginRadius supports invisible reCAPTCHA with single form submission under the same web page,e.g., it can be included only under Login or Registration form under the same page.

## **How to test invisible reCAPTCHA feature on your webpage**

In order to test the invisible reCAPTCHA on the the webpage, you can replicate the bot behavior in the follow these steps:

**1**. Open the developer tools in your browser (chrome).

**2**. Click on the **Customize and Control DevTools** icon, navigate to **More Tools** and click on **Network Conditions**.

![Devtools](https://apidocs.lrcontent.com/images/BotTesting-1-_6281624d666b918286.95419685.png "Devtools")

**3**. In the Network Conditions section, uncheck the **User browser default** checkbox and select **Googlebot** from the dropdown below.

![googlebot](https://apidocs.lrcontent.com/images/BotTesting2_20040624d66b549f170.77262382.png "googlebot")

**4**. Now, to test the invisible reCAPTCHA feature on the webpage, login with an account in the Login form. You’ll notice that when you click the login button, the reCAPTCHA is triggered with the image verifying challenge.

![reCAPTCHA](https://apidocs.lrcontent.com/images/Screenshot-43-_2943624d65c6a975e3.36495044.png "reCAPTCHA")
