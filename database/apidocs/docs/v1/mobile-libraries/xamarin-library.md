Xamarin Library
=====

----------
> Disclaimer

> This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.


###Download SDK
You can download the SDK from the Xamarin Component Store.  
[Link](https://components.xamarin.com/view/loginradiussdk)

###Configure your LoginRadius Account
To get your app supported LoginRadius IOS SDK, you need to slightly configure your LoginRadius user account.

- Enable cdn.loginradius.com in your site list

Since this page is hosted in cdn.loginradius.com, please put it under your website URL list in Site Settings

![enter image description here](https://apidocs.lrcontent.com/images/L1VnZxAkSzaSVRdBQMU5_Site-Configuration--LoginRadius-User-Dashboard_399758a42bf05a47f3.72671930.png "")

###Configure Registration Service
For configuring user registration service please refer to [this](/api/v1/user-registration/user-registration-overview) document.

###Configure Social Login
For Social login configuration please refer to [this](/api/v2/admin-console/social-provider/configure-social-apps) doc.

###Initialize SDK
Initialize the SDK with your API key and Sitename

Details on obtaining Site name [here](/api/v2/admin-console/platform-configuration/get-site-app-name) and API key [here](/api/v1/getting-started/get-api-key-and-secret/)

```
LoginRadiusSDK.ApiKey = <your API key>
LoginRadiusSDK.SiteName = <your site name>
```

###Integrate Registration Service
Registration service supports traditional registration and login methods using hosted pages

Supported actions are** login, registration, forgotpassword, social**

Supported languages are **spanish, french, german**. For customization please contact [LoginRadius Support](http://support.loginradius.com/hc/en-us/requests/new)

```
// Pass a UIViewController/Activity as parent

LoginRadiusResponse res = await LoginRadiusSDK.RegistrationService (action: "login", language: null, parent: this);
```

####Supported Actions
Supported actions are

- login - to show login interface

![enter image description here](https://apidocs.lrcontent.com/images/WawGiGXQZOVoZWYReGFo_login_1840558a42d56cb7c12.24926959.png "")

- registration - to show the registration form as per your configuration

![enter image description here](https://apidocs.lrcontent.com/images/QEjyo9sFQkCSNcVkjgXG_registration_445358a42d6da1ca88.13531469.png "")
 
- forgotpassword - to show forgot password interface

![enter image description here](https://apidocs.lrcontent.com/images/xhO1sGeJRmEYszs2LNKy_forgotpassword_384658a42d926cf465.97173251.png "")
 
- social - to show a list of social login providers for login

![enter image description here](https://apidocs.lrcontent.com/images/YDyV8oxvSuKvd6jsN6H8_social_1336358a42daedb1826.78117474.png "")

#####Customize Your Form
If you want a customized form so it is more close to your colour scheme or culture, you can contact us at support@loginradius.com, since all the forms are essentially HTML and CSS, you can host the central mobile page yourself as well, and give it a different outlooking.

###Integrate Social Login
####Social Login
Social Login with the given provider.

Provider name is uncapitalized. e.g facebook, twitter, linkedin, google e.t.c  
For complete list of social login providers: Ref to this [support doc](/getting-started/general-questions/supported-social-networks)

```
// Pass a UIViewController/Activity as parent

LoginRadiusResponse res = await LoginRadiusSDK.SocialLogin (provider: "facebook", parent: this);
```
This version doesn't support native login. We'll be adding this feature in the next release.

###Logout
####Logout
Log out the user.

```
LoginRadiusSDK.Logout();
```

###Access Token and User Profile
After successful login or social login loginradius access token and user profile can be accessed by

```
string user_profile = LoginRadiusSettings.LoginRadiusUserProfile;
string accesss_token = LoginRadiusSettings.LoginRadiusAccessToken;
```

###Calling API's
You can access the LoginRadius User API's, Social API's using our REST client or your own networking library.

Example using the REST client distributed as part of the component.

To get user's company details with the [API](/api/v1/social-login/company)

```
/// <param name="url">absolute API end point</param>
/// <param name="parameter">Dictionary of parameters</param>
/// <param name="method">HTTP method</param>

string response = RestClient.Request (url: "https://api.loginradius.com/api/v2/company",  parameter:new HttpRequestParameter {{"access_token", LoginRadiusSettings.LoginRadiusAccessToken }}, method: HttpMethod.GET);
```


###Demo
Check the demo app in the downloaded SDK for social login and user registration in action by setting your API key and sitename as mentioned above in the initialization section.

Link to [Github repo](https://github.com/LoginRadius/xamarin-sdk/tree/api-v1)
