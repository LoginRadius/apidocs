#Configuring Tencent Captcha with LoginRadius

##Overview

[Tencent Captcha](https://open.captcha.qq.com/) is a popular China-based CAPTCHA service. It is part of Tencent QQ owned by the Chinese technology giant Tencent Holdings Limited. QQ also offers services that provide online social games, music, shopping, microblogging, movies, and group and voice chat software. This section describes configuring a Tencent Captcha with LoginRadius.

To configure Tencent Captcha, follow the steps listed below:

1.&nbsp;You need to have a QQ account in order to configure Tencent Captcha. If you don’t have one, you can create one [here](https://ssl.zc.qq.com/v3/index-en.html).

2.&nbsp;After creating a QQ account, log in with the valid credentials at [https://007.qq.com/captcha/](https://007.qq.com/captcha/)

![](https://apidocs.lrcontent.com/images/1_193425aeaf80d3d5f01.97634629.png)

3.&nbsp;After logging in, you’ll be presented with the page as shown below. To begin, tap on the highlighted button to create an application.

![](https://apidocs.lrcontent.com/images/1_300035ced6f58709963.30682153.png)

4.&nbsp;On the next screen, fill out the necessary details, and complete the registration by tapping the highlighted button.

![](https://apidocs.lrcontent.com/images/2_150295ced6f6616de95.93701457.png)

5.&nbsp;Once the details have been verified successfully, your App ID and App Secret Key will be generated. You can get them in the Admin Console as highlighted in the screenshot below.

![](https://apidocs.lrcontent.com/images/3_230125ced6fa79b3320.81075366.png)

6.&nbsp;To enable Tencent Captcha, you will need to provide the App ID and App Secret Key in the Admin Console under: Platform Security → Account Protection → Auth Security → (left sidebar) CAPTCHA Setting

![Tencent Captcha Location](https://apidocs.lrcontent.com/images/ac38_97975e93497ccbdb81.26824524.png "Tencent Captcha Location")

7.&nbsp; Once you have entered the App ID and App Secret Key in the corresponding fields, be sure to hit "Save."


8.&nbsp;In your front-end code, add `tencentCaptchaAppid` along with the `tencentCaptcha` or `tencentCaptchaAsFallback` parameters to your LoginRadius JavaScript [Initialization Object](/api/v2/user-registration/user-registration-getting-started#initializationofloginradiusobject3) as shown below.

```
options = {};
options.apikey = "<Your LoginRadius API key>";
options.appName = "<LoginRadius Site Name>";
options.tencentCaptchaAppid = "<TENCENT_CAPTCHA_APP_ID>"
//If you want only Tencent Captcha to be enabled
options.tencentCaptcha = true;
//If you want Tencent Captcha to work when Google reCAPTCHA doesn’t
//options.tencentCaptchaAsFallback = true;
```

>**Note:** At any point in time, only **one** of the two options i.e. **tencentCaptcha** and **tencentCaptchaAsFallback** can be enabled.
