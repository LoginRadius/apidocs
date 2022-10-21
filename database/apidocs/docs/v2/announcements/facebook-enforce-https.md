# Facebook Enforces HTTPS for Facebook Login

As part of improved security processes for Facebook apps, Facebook now [requires all applications](https://developers.facebook.com/blog/post/2018/06/08/enforce-https-facebook-login/) to leverage HTTPS when using the Facebook Login feature. This is enabled by default for all new applications since March 2018, If your application was created before this you will need to directly enable this from your Facebook app. 

This will become a mandatory setting as of October 6, 2018. Facebook will automatically enable this feature and your Facebook logins will no longer work if you are not leveraging an HTTPS url. 

LoginRadius encourages our clients to always comply with security best practices and defaulting HTTPS for social login requests has been standard in our platform for some time. Previous communication has been sent out detailing the process to upgrade your LoginRadius account to HTTPS should you still be using HTTP. 

## Is my site using HTTPS?

You can verify whether your site is using HTTPS or HTTP by following the below steps. 

1. Log in into [**Admin Console**](https://adminconsole.loginradius.com/).
2. Select the LoginRadius site for your website.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/fb1_223095eb82ba3c3a289.32636294.png "enter image title here")
3. From the menu options on the top select Platform Configuration → Social Login.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/fb2_180695eb82bdff02166.95857150.png  "enter image title here")

4. Click on "Social Providers" tab on the left, as shown in the above image.

5. Select one of the configured providers.
6. Go through the provider steps until the LoginRadius url is displayed. This will generally be in one of the following formats: 
    - `<LoginRadius Site Name>.hub.loginradius.com`
    - `<LoginRadius Site Name>.hub.loginradius.com:443/socialauth/validate.sauth`
7. The URL will display either HTTPS or HTTP. 

Another method of verifying is: 

1. Navigate to the page where you have implemented your Social Login interface. 
2. Right click on one of the Social providers you have configured and inspect the html code. 
3. The code block will contain the relevant LoginRadius redirect link in either HTTP or HTTPS format like: 
```
return LRObject.util.openWindow('https://<LoginRadius Site Name>.hub.loginradius.com/RequestHandler.aspx?
```

## Updating to HTTPS

In order to update your applications to support HTTPS configuration changes are required from the LoginRadius operations team. This will cause all social provider endpoints to be generated in HTTPS format. In order to ensure that this transition is seamless you should follow the [upgrade document](/api/v2/admin-console/social-provider/configure-social-apps) and updated all of your configured social providers to support an HTTPS redirect flow. 

Once you have made the required configuration changes on each of your social provider apps to support HTTPS, you can reach out to LoginRadius support or your Customer Success Manager in order to have the HTTPS feature enabled. 