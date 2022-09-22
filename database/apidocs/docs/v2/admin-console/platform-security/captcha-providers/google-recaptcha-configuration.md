
# **Configuring Google reCAPTCHA with LoginRadius**


## **Overview**

[Google reCAPTCHA](https://www.google.com/recaptcha/about/) is a popular CAPTCHA-like system that provides bot protection for websites introduced on May 27, 2007. This section covers configuring reCAPTCHA with your LoginRadius implementation.

Currently, LoginRadius supports two different versions of the **Google v2reCAPTCHA**.

*   **Checkbox**: In this version of v2reCaptcha "I'm not a robot" Checkbox requires the consumer to click it indicating the consumer is not a robot.

*   **Invisible reCAPTCHA**: This version of v2reCaptcha provides a better experience to the consumer by tracking mouse movements to identify if a human is interacting with the website.


## **Configuration**

1. Log in to your Google account. Once you are logged in, head over to [https://www.google.com/recaptcha/about/](https://www.google.com/recaptcha/about/) and click on **v3 Admin Console.** 
 
  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/sss_1761260d4d1b8ba72c3.54182181.png "GOOGLE ReCAPTCHA2")

2. If you are already a consumer of **Google reCAPTCHA**, you will land on your Dashboard. 
 - In case you want to configure your previous site, then select the site from the dropdown and click on settings (cog icon) 
 - Or if you’re going to register a new site, then click on add (**+** icon), and you will be taken to **Register a new site **as shown in step 3.
 
  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g2_2272660d4cd181cb675.15865038.png "GOOGLE ReCAPTCHA2")

3. If you are a new consumer of Google reCAPTCHA, click on **Register a new site** and the following screen will appear.

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g3_2252060d4cd8142ef60.89428066.png "GOOGLE ReCAPTCHA2")

4. Look for **the Label** and provide a name for this new reCAPTCHA configuration, you can use your **site's name**, and select which version of reCAPTCHA you would like to use.

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g4_504760d4cec0bfa3b6.83421978.png "GOOGLE ReCAPTCHA2")

5. Once you have selected the reCAPTCHA version, scroll down to provide domains using the reCAPTCHA. This is for whitelisting purposes. If this is for your development environment, you can provide **localhost**. Otherwise, provide your website's domain. 

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g5_178160d4ced9e5e227.67463896.png "GOOGLE ReCAPTCHA2")

6. Google requires that you accept the reCAPTCHA Terms of Service.

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g6_1114460d4ceec869d95.38250208.png "GOOGLE ReCAPTCHA2")

7.  Once you are done, click on **SUBMIT**. 

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g7_2005860d4cf00d360d8.89205316.png "GOOGLE ReCAPTCHA2")

8. You will be shown your newly created reCAPTCHA credentials. You will need to copy it to the LoginRadius Admin Console. 

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g8_2097960d4cf171c0a44.38659469.png "GOOGLE ReCAPTCHA2")

9. In the LoginRadius Admin Console Navigate to [Platform Security > Account Protection > Auth Security > CAPTCHA Setting](https://adminconsole.loginradius.com/platform-security/account-protection/auth-security/captcha-settings)

10. And select **GOOGLE ReCAPTCHA2 Setting.** 

  ![GOOGLE ReCAPTCHA2](https://apidocs.lrcontent.com/images/g9_2712060d4cf3c8a7978.28012862.png "Admin Console")

11. Provide your Google reCAPTCHA key and secret and click on **SAVE** .
You are now ready to start using reCAPTCHA with LoginRadius. 


## **Google reCAPTCHA with LoginRadiusV2.js**

Once you have configured your Google reCAPTCHA account in the LoginRadius Admin Console, follow the steps below to include Google reCAPTCHA on the registration form in your LoginRadius interfaces.

**1**. Add the **v2RecaptchaSiteKey** along with the **v2Recaptcha** or **invisibleRecaptcha** parameters to your LoginRadius JS[ Initialization Object](https://www.loginradius.com/docs/api/v2/user-registration/user-registration-getting-started).

```
option = {};

option.apikey = "&lt;Your LoginRadius API key>";

option.appName = "&lt;LoginRadius Site Name>";

option.v2RecaptchaSiteKey = 'Your Google recaptcha v2 Site

key';

//To use Google reCAPTCHA V2 set the following:

option.v2Recaptcha = true;

//If you would like to set Google Invisible ReCaptcha:

option.invisibleRecaptcha = true;
```

**2**. The reCAPTCHA language can be changed using the **v2RecaptchaLanguage** parameter and giving it the desired[ language code](https://developers.google.com/recaptcha/docs/language).


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

>**Note**: The invisible reCAPTCHA is a front end element and LoginRadius supports invisible reCAPTCHA with single form submission under the same web page,e.g., it can be included only under Login or Registration form under the same page. 

## **How to test invisible reCAPTCHA feature on your webpage**

In order to test the invisible reCAPTCHA on the the webpage, you can replicate the bot behavior in the follow these steps:

**1**. Open the developer tools in your browser (chrome).

**2**. Click on the **Customize and Control DevTools** icon, navigate to **More Tools** and click on **Network Conditions**.

![Devtools](https://apidocs.lrcontent.com/images/BotTesting-1-_6281624d666b918286.95419685.png "Devtools")

**3**. In the Network Conditions section, uncheck the **User browser default** checkbox and select **Googlebot** from the dropdown below.

![googlebot](https://apidocs.lrcontent.com/images/BotTesting2_20040624d66b549f170.77262382.png "googlebot")

**4**. Now, to test the invisible reCAPTCHA feature on the webpage, login with an account in the Login form. You’ll notice that when you click the login button, the reCAPTCHA is triggered with the image verifying challenge.

![reCAPTCHA](https://apidocs.lrcontent.com/images/Screenshot-43-_2943624d65c6a975e3.36495044.png "reCAPTCHA")
