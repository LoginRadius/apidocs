# Android Library

---

This document contains information and examples regarding the LoginRadius Android SDK. It provides guidance for working with Social Login and full User Registration.

[Get a Full Demo](https://github.com/LoginRadius/android-sdk/tree/api-v1)

> ####Disclaimer

> This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

###Demo
####Installation
To download the SDK and view the Demo, please go to the [LoginRadius github repository](https://github.com/LoginRadius/android-sdk/tree/api-v1) to get them. Using the latest android studio, import the demo project.

####Setup

1. The android SDK version should >= 16
2. Build tool version "23.0.3" (changeable in build.gradle)
3. Android Studio >= 2.1.1

To get your app supported by LoginRadius Android SDK, you need to slightly configure your LoginRadius user account.

- Enter cdn.loginradius.com in your site list

Since this page is center hosted in cdn.loginradius.com, please put it on your website list under Site Configuration.

![enter image description here](https://apidocs.lrcontent.com/images/Site-Configuration_541594219c895b546.50621384.png)

- Add another parameter to your User Registration Email template

By default your email template should look like this:

![enter image description here](https://apidocs.lrcontent.com/images/Email-Workflow_263085942108319f592.39418868.png)

Change from

```
#Url#?vtype=emailverification&vtoken=#GUID#
```

to

```
#Url#?vtype=emailverification&vtoken=#GUID#&apikey=<Your-LoginRadius-API-Key>
```

And the same change should be also applied to your "Reset Password Email Template Configuration".

LoginRadius ApiKey and SiteName

1.SETTINGS VALUES

To work with any of the LoginRadius social services, you will require an api_key and site_name from LoginRadius. You can gather the keys specific to your account from the LoginRadius admin-console as outlined here and in the following image. Any usage of these values will be highlighted in this document.
You can set a string to store this in your res/values/

![enter image description here](https://apidocs.lrcontent.com/images/API-Credentials_21012594210eb9b2c86.93717698.png)

2.Define two required variables are LoginRadius API Key and Site Name(App Name) in your app **String.xml** file.(required)

```
<string name="loginradius_api_key">LoginRadius api key</string>
<string name="loginradius_site_name">LoginRadius site name</string>
```

####Run Demo
After configuring sitename(app name) and API key Demo Ready for Run.

- login - to show login interface
- registration - to show the registration form as per your configuration
- forgotpassword - to show forgot password interface
- social - to show a list of social login providers for login

![enter image description here](https://apidocs.lrcontent.com/images/f541e4a-IMoaB8CuQfKT0HTWvTwO_login_269258a420b4b09a83.48118494.png)

###AndroidSDK
####Download SDK
To download the SDK and view the AndroidSDK, please go to the [LoginRadius github repository](https://github.com/LoginRadius/android-sdk/tree/api-v1) to get them.

####System Requirements

1. The android SDK version should >= 16
2. Build tool version "23.0.3" (changeable in build.gradle)
3. Android Studio >= 2.1.1

####Configure your LoginRadius Account
To get your app supported by LoginRadius Android SDK, you need to slightly configure your LoginRadius user account.

- Enter cdn.loginradius.com in your site list

Since this page is center hosted in cdn.loginradius.com, please put it on your website list under Site Configuration.

> Note:

> If you've already configured the site and User Registration Email template on your LoginRadius Admin-console, Please skip the step and if not please configure from [here](#setup3).

####Installation and Setup

- Setup Android SDK in your Android Studio IDE by importing it as a module project
- Open the Project structure of Android SDK and add play-services Library Dependency.
- Project Structure can be opened by right-clicking on Android SDK and accessing Open module settings->Dependencies

  \*Open your project with Android Studio, and use the secondary menu to find the location to import the module as shown in the below image.

![enter image description here](https://apidocs.lrcontent.com/images/qiL6vxEdRvr34Z3dimqQ_1_818458a42243c26761.10080744.jpg)

- Navigate to File->New->Import Module

![enter image description here](https://apidocs.lrcontent.com/images/5UY3aok4Q6XkTksuOInT_2_628458a422841a5172.59843574.jpg)

- Select the downloaded library by browsing to the file location

We use some library in android SDK. Import Library Dependency for play services and Module Dependency for Facebook SDK

```
 dependencies {
    compile('com.facebook.android:facebook-android-sdk:4.+') {
        exclude module: 'support-v4'
    }
    compile 'com.squareup.picasso:picasso:2.3.2'
    compile files('libs/android-async-http-1.4.8.jar')
    compile 'com.android.support:appcompat-v7:23.1.1'
    compile 'com.google.code.gson:gson:2.6.2'
    compile files('libs/sendgrid-0.1.2-jar.jar')
    compile files('libs/universal-image-loader-1.9.5.jar')
    compile 'com.google.android.gms:play-services-auth:9.0.1'
    compile 'com.android.support:design:23.1.1'

}
```

####ApiKey and SiteName
1.SETTINGS VALUES

To work with any of the LoginRadius social services, you will require an api_key and site_name from LoginRadius.For more details regarding API key and SiteName please click [here](/api/v1/mobile-libraries/android#section-loginradius-apikey-and-sitename)

```
 <string name="loginradius_api_key">LoginRadius api key</string>
 <string name="loginradius_site_name">LoginRadius site name</string>

```

#####Manifest Settings
After creating a new Android project, follow the installation section of this document. Ensure the LoginRadius Android SDK is linked to your new project as a library. Next, add the following permissions to the AndroidManifest.xml:

SOCIAL APIS In the past two examples, we logged in the user and the application retrieved their name. However, there is a lot of additional information that we can retrieve from the user such as their posts, tweets, and contacts. In this tutorial, we will be using the different loginradius APIs to extract their information.

Available user information depends on the user's privacy settings as well as the Data & Permission Settings that are managed from the LoginRadius website. Some social sites provide different information than each other, but LoginRadius formats all the various information into a standard format to make it easy to use.  
To begin, configure the SDK as outlined before. Create a new project, link the SDK, and edit the Android Manifest. For this tutorial, native login will be enabled for Facebook and Google.

```
 <uses-permission android:name="android.permission.INTERNET" />
 <uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" />
 <uses-permission android:name="android.permission.ACCESS_WIFI_STATE" />
 <uses-permission android:name="android.permission.GET_ACCOUNTS" />
 <uses-permission android:name="android.permission.MANAGE_ACCOUNTS" />
 <uses-permission android:name="android.permission.USE_CREDENTIALS" />
```

####Setup User Registration Trigger
After the import has been completed, go into the activity to trigger the login activity.In its layout. XML define after several buttons Bind the OnClick listener to those buttons in the OnCreate method on "MainActivity.java" or other Activity and get a value of string.xml and put in Intent.

```
 Button loginBt, signinBt, socialBt, forgetBt;
 Button.OnClickListener listener;
 @Override
 protected void onCreate(Bundle savedInstanceState) {
  super.onCreate(savedInstanceState);
  setContentView(R.layout.activity_main);
  getSupportActionBar().hide();

  /*   Apikey ,Sitename and applicationid is necessary for implementing Loginradius SDK
   *  */
  final String apiKey = getString(R.string.loginradius_api_key);
  final String siteName = getString(R.string.loginradius_site_name);

  /*  if you want native facebook login then pass app_id in string */
  final String facebook_native = getString(R.string.facebook_native);
  final String google_native = getString(R.string.google_native);

  /*
     optional for user recaptchakey,promptpassword,messagelogin,messageforgotpass
   */
  final String V2RecaptchaSiteKey = getString(R.string.V2RecaptchaSiteKey);
  final String promptpassword = getString(R.string.promptPasswordOnSocialLogin);
  final String messagelogin = getString(R.string.Toast_message_for_login);
  final String messageforgotpass = getString(R.string.Toast_message_for_ForgotPassword);

  if (getIntent().getBooleanExtra("EXIT", false)) {
   finish();
  }

  listener = new View.OnClickListener() {
   public void onClick(View v) {
    Intent intent = new Intent(MainActivity.this, WebviewActivity.class);
    intent.putExtra("V2RecaptchaSiteKey", V2RecaptchaSiteKey);
    intent.putExtra("keyname", apiKey);
    intent.putExtra("sitename", siteName);
    intent.putExtra("promptpassowrd", promptpassword);
    intent.putExtra("facebook_native", facebook_native);
    intent.putExtra("google_native", google_native);
    intent.putExtra("toast_message_for_login", messagelogin);
    intent.putExtra("toast_message_for_ForgotPassword", messageforgotpass);

    switch (v.getId()) {
     case R.id.login_bt:
      intent.putExtra("action", "LOGIN");
      break;
     case R.id.signin_bt:
      intent.putExtra("action", "SIGNIN");
      // do stuff;
      break;
     case R.id.social_bt:
      intent.putExtra("action", "SOCIAL");
      break;
     case R.id.forget_bt:
      intent.putExtra("action", "FORGOT");
      break;
     default:
      return;
    }
    startActivityForResult(intent, 2);
   }
  };
  initWidget();
 }

 private void initWidget() {
  //initialize button
  loginBt = (Button) findViewById(R.id.login_bt);
  signinBt = (Button) findViewById(R.id.signin_bt);
  socialBt = (Button) findViewById(R.id.social_bt);
  forgetBt = (Button) findViewById(R.id.forget_bt);
  //set on Click listener
  loginBt.setOnClickListener(listener);
  signinBt.setOnClickListener(listener);
  socialBt.setOnClickListener(listener);
  forgetBt.setOnClickListener(listener);
 }

 //Starting another activity doesn't have to be one-way. You can also start another activity and receive a result back.When the user is done with the subsequent activity and returns, the system calls your activity's below mention onActivityResult() method.
 @Override
 protected void onActivityResult(int requestCode, int resultCode, Intent data) {
  super.onActivityResult(requestCode, resultCode, data);
  // check if the request code is same as what is passed  here it is 2
  if (requestCode == 2) {
   if (data != null) {
    String accessToken = data.getStringExtra("accesstoken");
    String provider = data.getStringExtra("provider");
    Intent intent = new Intent(getApplication(), UserProfileActivity.class);
    intent.putExtra("accesstoken", accessToken);
    intent.putExtra("provider", provider);
    startActivity(intent);
   }
  }
 }

 //when you go successfully login you get loginradius accesstoken and provider in onActivityResult function after that you can easily to move your activity where you want
 @Override
 public void onBackPressed() {
  super.onBackPressed();
  Intent intent = new Intent(getApplication(), MainActivity.class);
  intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
  intent.putExtra("EXIT", true);
  startActivity(intent);
 }
 }
```

####Get LoginRadius access_token on successful login
After successful login user can start any activity where to call other API and get data. In the demo, we get all data in UserProfileActivity.when you configure your ' ApplicationActivityId ' in the string.xml and AndroidManifests.xml.In Manifests where you put your ApplicationActivityId in '<intent-filter>'  
that's your AfterLogin Redirection Activity and you get all data in this activity.

Example: UserProfileActivity.java
In UserProfileActivity we get token and call all loginradius API

```
  public class UserProfileActivity extends Activity {
 @Override
 protected void onCreate(Bundle savedInstanceState) {
  super.onCreate(savedInstanceState);
  final Intent intent = getIntent();
  setContentView(R.layout.activity_user_profile);

   if (intent != null) {
   String token = intent.getStringExtra("accesstoken");
   lrAccessToken accessToken = new lrAccessToken();
   accessToken.access_token = token;
   accessToken.provider = "facebook"; // just for demo
   getUserData(accessToken);

  }
 }
 private void getUserData(lrAccessToken accessToken) {
  UserProfileAPI userAPI = new UserProfileAPI();
  userAPI.getResponse(accessToken, new AsyncHandler < LoginRadiusUltimateUserProfile > () {
   @Override
   public void onSuccess(LoginRadiusUltimateUserProfile userProfile) {

    /**
     * While we could easily pull any desired fields, we can also just grab every
     * fields that is not null. Many fields are not strings, but you can extract
     * their information manually.
     */
    try {
     for (Field field: userProfile.getClass().getDeclaredFields()) {
      field.setAccessible(true);
      Object value = field.get(userProfile);
      if (value != null && value instanceof String) {
       result.add(field.getName() + ": " + value);
      }
     }
    } catch (Exception e) {
     e.printStackTrace();
    }
   }
   @Override
   public void onFailure(Throwable error, String errorcode) {
    if (errorcode.equals("lr_API_NOT_SUPPORTED")) {

    }
   }
  });
 }
}
```

####Advanced options
#####Native Login
######Google Native Login

1. Add the following permissions to your String.xml inside the application: if you want to enable google_native login then set the "true" value to the google_native string, if you don't want google_native login then let it be blank or false.

```
 <string name="google_native"></string>
 <string name="google_native">true</string>
```

2.Add the following activity definitions, meta data, and permissions to your Android Manifest inside the application tag:

```
 <activity android:name="com.loginradius.sdk.ui.GoogleSSO"/>
 <meta-data android:name="com.google.android.gms.version"
 android:value="@integer/google_play_services_version"/>
```

3.Google Configuration for Google Native Login<br>

- Firstly Signing Your App
  <br>
  https://developer.android.com/studio/publish/app-signing.html

* Generate the signing certificate fingerprint and register your application

  1.Click on your package and choose New -> Google -> Google Maps Activity<br>
  2.Android Studio redirect you to google_maps_api.xml <br>
  Find your SHA1 fingerprint into google_maps_api.xml
  <br>
  OR
  <br>
  Generate your SHA1 by key tool.
  <br>
  `keytool -exportcert -alias androiddebugkey -keystore path-to-debug-or-production-keystore -list -v`

* Create a new Google API console project on the Google Developer https://console.developers.google.com/apis/credentials
  <br>
  Open the Credentials page.
  Follow these steps if your application needs to submit authorized requests:

1.  Click Add credentials > OAuth 2.0 client ID.
2.  Select Android.
3.  In the Package name field, enter your Android app's package name.
4.  Paste the SHA1 fingerprint into the form where requested.

- Common Error messages:<br>
  **12501 :**<br>
  This is more commonly caused by an incorrect SHA1 being used to set up your project with Google. Make sure that the SHA1 of the build you are testing matches what you used in the Developer's Console.

######Facebook Native Login

1.Please add your "app_id" in your string.xml if you want to enable facebook_native login then set the "true" value to facebook_native string, if you don't want facebokk_native login then let it be blank or false

```
 <string name="app_id">your facebook app id</string>
 <string name="facebook_native"></string>
 <string name="facebook_native">true</string>
```

<br>
2.Add the following activity definitions and meta data to your Android Manifest inside the application tag:

```
 <meta-data
  android:name="com.facebook.sdk.ApplicationId"
  android:value="@string/app_id" />
  <activity
  android:name="com.facebook.FacebookActivity"
  android:configChanges="keyboard|keyboardHidden|screenLayout|screenSize|orientation"
  android:label="@string/app_name"
  android:theme="@android:style/Theme.Translucent.NoTitleBar" />
```

<br>
3.Facebook Configuration for Facebook Native Login<br>

Create a new Facebook App on the Facebook Developer site. You will need to create an Android application and get a Facebook Application ID: https://developers.facebook.com/

- Create a Development Key Hash<br>
  Facebook uses the key hash to authenticate interactions between your app and the Facebook app. If you run apps that use Facebook Login, you need to add your Android development key hash to your Facebook developer profile.<br>
  You need to add this code under activity onCreate method.Put your activity package name in this code. After that run the below code and you'll get KeyHash in logs.
  <br>

```
try {
       PackageInfo info = getPackageManager().getPackageInfo(
               "put-your-Activity-package-name",
               PackageManager.GET_SIGNATURES);
       for (Signature signature : info.signatures) {
           MessageDigest md = MessageDigest.getInstance("SHA");
           md.update(signature.toByteArray());
           Log.d("KeyHash:", Base64.encodeToString(md.digest(), Base64.DEFAULT));
           }
   } catch (NameNotFoundException e) {
   } catch (NoSuchAlgorithmException e) {
   }
```

- Now select My Apps and create a new app using "Add a New App".

- After the creation of App, Click on setting into left panel, Select Add Plateform and choose Android

- After generating KeyHash successfully, you need to setup below setting and fill the required fields e.g. Package Name & Class Name.
  <br><br>
  ![enter image description here](https://apidocs.lrcontent.com/images/facebook_2670358e72c19acad92.91822294.png)

#####Ask password when user get login through social
After authentication for social login, it will prompt a password filling interface. By filling it, a user is also going to generate a traditional account besides his/her social account.  
If you required Prompt Password then put variables "true" else "false".(optional)

```
 <string name="promptPasswordOnSocialLogin">true</string>
```

#####Set your own Google Recaptcha key
You can utilize your own Google ReCaptcha account to service your interfaces. This allows you to include additional domains and views analytics for your ReCaptcha. Follow the below steps to include your Google ReCaptcha account on your LoginRadius Registration interface.

Create an Account on Google ReCaptcha:https://www.google.com/recaptcha/intro/index.html Create a ReCaptcha Site and add the domains that will be using this ReCaptcha. Add the V2RecaptchaSiteKey and V2Recaptcha parameters to your LoginRadius User Registration options object during interface initialization as per this documentation.
Put Recaptcha key in a string for Adding manual Recaptcha v2 in android.(optional)

```
 <string name="V2RecaptchaSiteKey">Your Recaptcha key </string>
```

#####Customize Toast messages
If you want to Change Toast Messages according to your requirements. Put following lines of code in **String.xml** (optional)

```
 <string name="Toast_message_for_login">Welcome in LoginRadius</string>
 <string name="Toast_message_for_ForgotPassword">Please check your Email</string>
```

#####Setup Proguard configuration
If you intend to use ProGuard on the release build of your mobile application, you will need to add the following lines to your project's proguard-project.txt file to preserve information required for the SDK to function properly:

```
 -keepattributes Signature
 -keepattributes Exceptions
 -keep class com.loginradius.** { *; }
 -dontwarn com.squareup.picasso.**
```

#####Alternative Language Setup
The Android User registration system supports the following languages:

- English
- German
- French
- Spanish

Follow the below steps to change the Language for the SDK that you are using:

1. Go to the source ([Github file location](https://github.com/LoginRadius/android-sdk/tree/api-v1/SDK/src/androidSDK))
2. Navigate to StrResource.java ([Github file location](https://github.com/LoginRadius/android-sdk/blob/api-v1/SDK/src/androidSDK/src/main/java/com/loginradius/userregistration/resource/StrResource.java))
3. Update the BASEPAGE parameter to the desired language URL as shown below

Language URLs:

- English - https://cdn.loginradius.com/hub/prod/Theme/mobile-v2/index.html
- Spanish -https://cdn.loginradius.com/hub/prod/Theme/mobile-spanish-v2/index.html
- German - https://cdn.loginradius.com/hub/prod/Theme/mobile-german/index.html
- French - https://cdn.loginradius.com/hub/prod/Theme/mobile-french/index.html

#####Embedded Social Login Button

We can use the lrLoginManager object's performLogin function to log in a Social User at any time. In this example, we will be attaching this function to a custom button.

######Manifest Settings
First set up the required configurations, create a new Android project and link the LoginRadius Android SDK as a library.

In AndroidManifest.xml, add the required permissions and activities. If using Native Login, remember to include the extra configurations specified in the Natvie Login section:

```
 <uses-permission android:name="android.permission.INTERNET"/>
 <uses-permission android:name="android.permission.ACCESS_NETWORK_STATE"/>

 <activity android:name="com.loginradius.sdk.ui.WebLogin"
              android:configChanges="screenSize|orientation"/>
 <activity android:name="com.loginradius.sdk.ui.GoogleSSO"/>
```

For the layout, this tutorial will be using a button and a progress bar. The progress bar will be explained when adding code to MainActivity.java. The button image used here will be the Yahoo logo, though feel free to use any provider. The following items are in a Relative Layout:

```
 <Button
    android:id="@+id/btnLogin"
    android:layout_width="wrap_content"
    android:layout_height="wrap_content"
    android:centerInParent="true"
    android:background="@drawable/lr_yahoo"
    android:enabled="false" />
 <ProgressBar
    android:id="@+id/pbAuthenticating"
    android:layout_width="wrap_content"
    android:layout_height="wrap_content"
    android:layout_centerInParent="true"/>
```

######MainActivity
For MainActivity.java, we will first authenticate our API key with the LoginRadius server.

```
 public class MainActivity extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContextView(R.layout.activity_main);

        /** Authenticate with LoginRadius server **/
        lrLoginManager.getAppConfiguration("<api_key>",
new AsyncHandler<AppInformation>() {
            @Override
            public void onSuccess(AppInformation appInfo) {
                setupView(appInfo);
            }
            @Override public void onFailure(Throwable error,
String errorCode) {}
        });
    }
```

Since getting the AppInformation requires sending an online query, we cannot be sure how long the query will take. You can handle this delay however you would like, but in this example, we disable the login button by default and overlay a progress bar overtop.

######Layouts Setup
Once the AppInformation is returned, we call the setupView function, which attaches a click listener to the button, and hides the progress bar:

```
 private void setupView(final AppInformation appInfo) {

    Button btnLogin = (Button) findViewById(R.id.btnLogin);
    ProgressBar pBar = (ProgressBar) findViewById(R.id.pbAuthenticating);

    btnLogin.setOnClickListener(new OnClickListener() {
        /** Perform login through Yahoo **/
        lrLoginManager.performLogin(MainActivity.this,
Provider.findByName("yahoo", appInfo.Providers),
new AsyncHandler<lrAccessToken>() {
            @Override
            public void onSuccess(lrAccessToken token) {
                getProfileInfo(token);
            }
            @Override
            public void onFailure(Throwable error, String errorcode) {}
        });
    });
    btnLogin.setEnabled(true);
    pBar.setVisibility(View.GONE);
}
```

When the button is clicked, we provide the activity, a provider, and a callback function to the lrLoginManager to have the user log in. The provider parameter requires an object rather than a String, so we extract the object from the AppInformation by matching the names as seen, a static helper function is provided for this. The callback function supplied is returned the user's access token.

######Perform Login
The performLogin function can differentiate between the providers, along with using Native Login if it has been enabled.

The final function, getProfileInfo, gets the user's name and says hello:

```
 private void getProfileInfo(lrAccessToken token) {

    UserProfileAPI userProfile = new UserProfileAPI();
    userProfile.getResponse(token, new AsyncHandler<LoginRadiusUltimateUserProfile>() {
        @Override
        public void onSuccess(LoginRadiusUltimateUserProfile profile) {
            Toast.makeText(getApplicationContext(), "Hello, " + profile.FirstName, Toast.LENGTH_SHORT).show();
        }
        @Override
        public void onFailure(Throwable error, String errorcode) {}
    });
}
```

#####LoginRadius API reference
######UserProfile API

The getUserData function uses the UserProfileAPI to pull available user data. In this example, we just pull all fields that are Strings and not null. The LoginRadiusUltimateUserProfile object contains a large number of fields, and they can be manually retrieved like any Java object.

```
 private void getUserData(lrAccessToken token) {
    /** Get Profile Info **/
    UserProfileAPI userAPI = new UserProfileAPI();
    userAPI.getResponse(token, new
                            AsyncHandler<LoginRadiusUltimateUserProfile>() {
        @Override
        public void onSuccess(LoginRadiusUltimateUserProfile uProfile) {
            List<String> result = new ArrayList<String>();
             try {
             for (Field field : userProfile.getClass().getDeclaredFields()) {
                    field.setAccessible(true);
                    Object value = field.get(userProfile);
                    if (value != null && value instanceof String) {
                        result.add(field.getName() + ": " + value);
                    }
             }
             } catch (Exception e) { e.printStackTrace(); }
             info.addAll(result);
             adapter.notifyDataSetChanged();
        }
        @Override
        public void onFailure(Throwable error, String errorcode) {
            if (errorcode.equals("lr_API_NOT_SUPPORTED")) {
                info.add("UserProfileAPI not supported by provider.");
                adapter.notifyDataSetChanged();
            }
        }
    });
}
```

######Status API

The StatusAPI class provides the ability to extract the user's statuses. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn't work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

```
 private void getStatus(lrAccessToken token) {
    StatusAPI statusAPI = new StatusAPI();
    statusAPI.getResponse(token, new AsyncHandler<LoginRadiusStatus[]>() {
        @Override
        public void onSuccess(LoginRadiusStatus[] data) {
            if (data.length == 0 || data[0] == null) return;
                info.add("Recent status: " + data[0]);
                adapter.notifyDataSetChanged();
            }
        @Override
        public void onFailure(Throwable error, String errorcode) {
            if (errorcode.equals("lr_API_NOT_SUPPORTED")) {
                info.add("StatusAPI is not supported by this provider.");
                adapter.notifyDataSetChanged();
            }
        }
    });
}
```

######Contact API

The last function uses the ContactAPI to load the first ten contacts found into the list view.

````
 private void getContacts(lrAccessToken token) {
    ContactAPI contactAPI = new ContactAPI();
    contactAPI.getResponse(token, new
                       AsyncHandler<LoginRadiusContactCursorResponse>() {
        @Override
        public void onSuccess(LoginRadiusContactCursorResponse data) {
            int index=0;
            for (LoginRadiusContact c : data.Data) {
                if (index>=10) break;
                info.add("Contact " + index + ": " + c.name);
                index++;
            }
            adapter.notifyDataSetChanged();
        }
        @Override
        public void onFailure(Throwable error, String errorcode) {
            if (errorcode.equals("lr_API_NOT_SUPPORTED")) {
                info.add("ContactAPI is not supported by this provider.");
                adapter.notifyDataSetChanged();
            }
        }
    });
}```

######Post API

The Post API is used to get the posts that have been shared on the user's page.

````

private void getPosts(lrAccessToken token) {
PostAPI postAPI = new PostAPI();
postAPI.getResponse(token, new AsyncHandler<LoginRadiusPost[]>() {
@Override
public void onSuccess(LoginRadiusPost[] data) {
if (data.length == 0 || data[0] == null) return;
info.add("Recent post: " + data[0]);
adapter.notifyDataSetChanged();
}
@Override
public void onFailure(Throwable error, String errorcode) {
if (errorcode.equals("lr_API_NOT_SUPPORTED")) {
info.add("PostAPI is not supported by this provider.");
adapter.notifyDataSetChanged();
}
}
});
}

```

######Post Status

Posting a status through a Social Media provider is accomplished through the StatusUpdateAPI and is available currently on Facebook, Twitter, LinkedIn. In this example, we will be allowing the user to post a status through Facebook or LinkedIn. We will be making the layout a bit more elaborate this time so that the user does not try to post anything until the API is ready. The details are as follows.

As usual, we'll set up the AndroidManifest.xml file to allow Native Login:

```

<uses-permission android:name="android.permission.INTERNET"/>
<uses-permission android:name="android.permission.ACCESS_NETWORK_STATE"/>
<uses-permission android:name="android.permission.GET_ACCOUNTS"/>
<uses-permission android:name="android.permission.MANAGE_ACCOUNTS"/>
<uses-permission android:name="android:permission.USE_CREDENTIALS"/>

<activity android:name="com.loginradius.sdk.ui.WebLogin"/>
<activity android:name="com.loginradius.sdk.ui.GoogleSSO"/>
<meta-data
  android:name="com.facebook.sdk.ApplicationId"
  android:value="@string/app_id" />
<activity
  android:name="com.facebook.FacebookActivity"  
            android:configChanges="keyboard|keyboardHidden|screenLayout|screenSize|orientation"
  android:label="@string/app_name"
  android:theme="@android:style/Theme.Translucent.NoTitleBar" />
<meta-data android:name="com.google.android.gms.version"
           android:value="@integer/google_play_services_version"/>
```

It will hold a list of available providers (just Facebook and LinkedIn for now) and will authenticate the user once a provider has been chosen.

```
 private void launchLoginDialog(final AppInformation appInfo) {
    /* Only allowing linkedin or facebook in this demo */
    final CharSequence[] items = {"LinkedIn", "Facebook"};

    txtLoading.setText("Performing log in..");

    /* Create AlertDialog for user to choose provider */
    AlertDialog.Builder builder = new AlertDialog.Builder(this);
    builder.setTitle("Choose Provider");
    builder.setItems(items, new DialogInterface.OnClickListener() {
        @Override
        public void onClick(DialogInterface dialog, int which) {
            /* Perform Login */
            lrLoginManager.performLogin(MainActivity.this,
                    Provider.findByName(items[which].toString(), appInfo.Providers),
                    new AsyncHandler<lrAccessToken>() {
                        @Override
                        public void onSuccess(lrAccessToken token) {
                            setupLayout(token);
                        }
                        @Override
                        public void onFailure(Throwable error, String errorcode) {}
            });
        }
    }).setCancelable(false).create().show();
}
private void setupLayout(lrAccessToken token) {}

```

######Status Update API

We can use the Status Update API now that we have the lrAccessToken. It can take a title, URL, image URL, caption, status, and description. We will just be using the status field in this example. First, we will set up the layout and then attach the post on a button click. We have to encode the status field so that it works with a post call. If successful, we will give the user a little toast and then clear the EditText view.

```
 private void setupLayout(final lrAccessToken token) {
 /* Hide loading layouts. Show main */
 progressBar.setVisibility(View.GONE);
 txtLoading.setVisibility(View.GONE);
 wrapper.setVisibility(View.VISIBLE);

 /* On Button Click */
 btnPost.setOnClickListener(new OnClickListener() {
  @Override
  public void onClick(View v) {
   /* Make sure post isn't empty */
   if (txtPost.getText().toString().trim().length() == 0)
    return;
   try {
    /* Create API instance  and set status */
    StatusUpdateAPI statusAPI = new StatusUpdateAPI();
    statusAPI.setStatus(URLEncoder.encode(
     txtPost.getText().toString().trim(), "utf-8"));
    statusAPI.setUrl(URLEncoder.encode("", "utf-8"));
    statusAPI.getResponse(token, new AsyncHandler < PostAPIResponse > () {
     @Override
     public void onSuccess(PostAPIResponse data) {
      /* It worked! */
      Toast.makeText(MainActivity.this, "Success!",
       Toast.LENGTH_SHORT).show();
      txtPost.setText("");
     }
     @Override
     public void onFailure(Throwable error, String errorcode) {}
    });
   } catch (UnsupportedEncodingException e) {
    e.printStackTrace();
   }
  }
 });
}
```

####Reference Manual
Please find the reference manual [here](http://docs.lrcontent.com.s3.amazonaws.com/apidocs/ref/android/index.html)
