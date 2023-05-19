# Android Library

This document contains information and examples regarding the LoginRadius Android SDK. It provides guidance for working with Social Login and full User Registration.

  

> **Disclaimer**: This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

## Download SDK

Get a copy of the Android SDK and demo projects [here](https://github.com/LoginRadius/android-sdk).

  

## Setup Prerequisites

1.  Android SDK Version >= 15
    
2.  Build Tools Version = 28.0.0 (changeable in build.gradle)
    
3.  Android Studio >= 3.5.2
    

To get your app supported by LoginRadius Android SDK, you need to slightly configure your LoginRadius user account.

1.  Add parameter to your User Registration Email template. By default your email template should look like this: ![Android SDK](https://apidocs.lrcontent.com/images/pasted-image-0-18_2932662accdf9607850.41208914.png "Android SDK")
Change the following URL
```
#Url#?vtype=emailverification&vtoken=#GUID#
```
to
```
#Url#?vtype=emailverification&vtoken=#GUID#&apikey=<Your-LoginRadius-API-Key>
```
And the same change should be also applied to your **Reset Password Email Template Configuration**.

2. Generate SOTT You need to pass the SOTT value at the time of registration in Android SDK V2 and you can generate this by Admin Console.

     Open [Admin Console](https://adminconsole.loginradius.com/deployment/apps/web-apps), Click on SOTT available   in the left panel. now set the time according to the requirement and generate SOTT.  
  
	![SDK](https://apidocs.lrcontent.com/images/pasted-image-0-19_277962accf2b2e59c4.12224716.png "SDK")

## Installation

LoginRadius is now using Gradle.

Use the following dependency in your project:
```
implementation 'com.loginradius.androidsdk:androidsdk:5.0.0'
```
LoginRadius SDK is now available as an AAR dependency. You can add it using File > New Module > Import .JAR/.AAR Package. Then, add it to your build.gradle:
```
compile project(':androidsdk-release')
```
  

> **Note:** As LoginRadius supports communication over TLSv1.2 we don't recommend building your app for any Android distribution older than Android 5.0 – Lollipop. If you wish to use a distribution below 5.0, you will need to initialize the code below before the LoginRadius SDK initialize/call to prevent the following TLS error: (SSL handshake aborted: ssl=0xb80a2c10: I/O error).

```
/**
* Initialize SSL
* @param mContext
*/
public static void initializeSSLContext(Context mContext){
try {
SSLContext.getInstance("TLSv1.2");
} catch (NoSuchAlgorithmException e) {
e.printStackTrace();
}
try {
ProviderInstaller.installIfNeeded(mContext.getApplicationContext());
} catch (GooglePlayServicesRepairableException e) {
e.printStackTrace();
} catch (GooglePlayServicesNotAvailableException e) {
e.printStackTrace();
}
}
```
### SDK Initialization Values

The Android SDK requires some variables. They're needed to initialize the LoginRadius Android SDK.

  
| **Name** | **Description** | **Required** |
|--|--|--|
| **apiKey** | API Key of your LoginRadius site. You can get one from [here](/api/v2/admin-console/platform-security/api-key-and-secret/) | Yes |
| **siteName** | LoginRadius Site Name. It is needed in social web login. You can get one from [here](/api/v2/admin-console/deployment/get-site-app-name/) | Yes | 


### Initialize SDK

Before using the SDK, you must initialize the SDK with the help of the following code:
```
LoginRadiusSDK.Initialize init = new LoginRadiusSDK.Initialize();
```

#### Credential Encryption (Optional)

LoginRadius provides an extra level of security for Api Credentials inside the SDK using key store encryption, this encryption will encrypt the Api Key & Site Name, to enable this encryption you need to pass `true` into `setIsEncryption` function.
```
init.setIsEncryption(true);
```

> **Note:** For enabling encryption init.setIsEncryption(true) need to be added before initializing the API key and Site Name.

#### Initialize API credentials (Required)

Before using the SDK, you must initialize the Api credentials with the help of the following code
```
init.setApiKey("<your-api-key>");
init.setSiteName("<your-site-name>");
```

For step by step guide on getting Api Credentials from Login Radius Admin Console, please refer to this [document](/api/v2/admin-console/platform-security/api-key-and-secret/#api-key-and-secret).

#### Referer Header (Optional)

The referer header is used to determine the registration source from which the user has created the account and is synced in the RegistrationSource field for the user profile. When initializing the SDK, you can optionally specify Referer Header.
```
init.setReferer("<Referer-Header-Value>");
```

#### Custom Header (Optional)

You can optionally specify Custom Header. This feature allows you to add the Custom header in an API request, you can add multiple headers using key, value pair.
```
Map<String,String> customHeader=new HashMap<String, String>();
customHeader.put("<Custom-Header-Name>", "<Custom-Header-Value>");
customHeader.put("<Custom-Header-Name1>", "<Custom-Header-Value1>");
init.setCustomHeader(customHeader);
```

#### Encryption of Sensitive information

LoginRadius provides key store encryption for sensitive information, you can leverage the following helper functions for encryption and decryption of sensitive information stored inside your project.

> **Note:** These helper function require Android 6/Api Level 23 or higher.

##### Encryption

To encrypt the sensitive information using the helper function `encryptData()` please use the following code.
```
if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
String dataToBeEncrypted="<data-to-be-encrypted>";
String result=LoginRadiusEncryptor.encryptData(dataToBeEncrypted);
System.out.println(result);
}
```
##### Decryption

The encrypted data will be decrypted using the helper function `decryptData()` please use the following code to decrypt the data.
```
if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
String encryptedData="<encryptedData>";
String result= LoginRadiusEncryptor.decryptData(encryptedData);
System.out.println(result);
}
```
> `Build.VERSION.SDK_INT >= Build.VERSION_CODES.M` indicates that the above helper function should only be called on the API level 23 or higher

#### Manifest Settings

After creating a new Android project, follow the installation section of this document. Ensure the LoginRadius Android SDK is linked to your new project as a library. Next, add the following permissions to the AndroidManifest.xml:
```
<uses-permission android:name="android.permission.INTERNET" />
<uses-permission android:name="android.permission.ACCESS_NETWORK_STATE" />
<uses-permission android:name="android.permission.ACCESS_WIFI_STATE" />
<uses-permission android:name="android.permission.GET_ACCOUNTS" />
<uses-permission android:name="android.permission.MANAGE_ACCOUNTS" />
<uses-permission android:name="android.permission.USE_CREDENTIALS" />
```

#### Facebook Login

For Native Facebook Login Add the following meta data to your Android Manifest inside the application tag:
```
<meta-data
android:name="com.facebook.sdk.ApplicationId"
android:value="facebook_app_id" />
<meta-data
android:name="com.facebook.sdk.ClientToken"
android:value="facebook_client_token"/>
```

#### Integrate Social Login

You can set social login by two ways:

1. **Web Social Login**: Web Social Login is done by using Android WebView. It can be performed using any listener for buttons or other respective events.    You can set any configured social provider in web social login. It can be implemented with the help of following code:<br><br>

  ```
  LoginRadiusSDK.WebLogin webLogin = new LoginRadiusSDK.WebLogin();
  webLogin.setProvider(SocialProviderConstant.FACEBOOK);
  webLogin.startWebLogin(LoginActivity.this,2);
  ```
**Note :-**
  * In the Android device, the sign in with apple works in WebView because Apple does not offer a native SDK for Android Developers. Apple does not control Android, but still, if you have to add a login method on your Android app too then LoginRadius Provides to make it as painless as possible to add Sign In with Apple to your Android app. After configuration apple developer account and LoginRadius Admin Console for Apple sign in you can just change the provider name to 'Apple' in the above web login code.
```
webLogin.setProvider("Apple");
```
 * Web Social Login is not supported by Facebook or Google.<br><br>

2. **Native Social Login**: Login is done natively, utilizing the respective provider SDKs. It can be performed using any listener for buttons or other respective events. We support native login for Facebook, Google and Vkontakte at the moment. It can be implemented with the help of following code:<br><br>

```
LoginRadiusSDK.NativeLogin nativeLogin = new LoginRadiusSDK.NativeLogin();
nativeLogin.startFacebookNativeLogin(LoginActivity.this,2);
```

If you have multiple social apps configured for the same social provider then passed in the native login method as 
```
//This unique social app name will be passed in the native login as a provider name like : <BaseProviderName>+<social app name> (eg: "facebook_myproduct1" ) 
nativeLogin.setSocialAppName("");
```

**NOTE:** There's nothing special about the Intent object you use when starting an activity for a result, but you do need to pass an additional integer argument to the startActivityForResult() method. The integer argument is a "request code" that identifies your request. When you receive the result Intent, the callback provides the same request code so that your app can properly identify the result and determine how to handle it.
<br><br>
When the user is done with the subsequent activity and returns, the system calls your activity's onActivityResult() method.

```
@Override
protected void onActivityResult(int requestCode, int resultCode, Intent data){
    super.onActivityResult(requestCode, resultCode, data);
    // check if the request code is same as what is passed  here it is 2
    if(requestCode==2) {
        if (data != null){
			Log.i("Access Token",data.getStringExtra("accesstoken"));
			Log.i("Provider",data.getStringExtra("provider"));
        }
	}
}
```

After getting the access token, you need to call the following code once for the user to be visible in the Admin Console:

```
public void readAllUserProfile(String access_token) {
 QueryParams params = new QueryParams();
 params.setAccess_token(access_token);
 AuthenticationAPI api = new AuthenticationAPI();
 api.readAllUserProfile(params, new AsyncHandler < LoginRadiusUltimateUserProfile > () {
  @Override
  public void onSuccess(LoginRadiusUltimateUserProfile userProfile) {
   Toast.makeText(context, "First Name: " + userProfile.FirstName + " Last Name:" + userProfile.LastName, Toast.LENGTH_SHORT).show();
  }

  @Override
  public void onFailure(Throwable error, String errorcode) {
   Toast.makeText(context, error.getMessage(), Toast.LENGTH_SHORT).show();
  }
 });
}
```

#### Integrate Traditional Login
The following code can be used to implement traditional login:<br><br>

- Using Email<br>

```
private void doLogin() {
QueryParams params = new QueryParams();
params.setEmail("xyz@mailinator.com");
params.setPassword("123456");
params.setEmailTemplate("<email-template>"); //put your emailTemplate(optional)
AuthenticationAPI api = new AuthenticationAPI();
api.login(LoginActivity.this, params, new AsyncHandler < LoginData > () {
    @Override
    public void onSuccess(LoginData logindata) {
        List < String > result = new ArrayList < String > ();
        try {
            for (Field field: logindata.getClass().getDeclaredFields()) {
                field.setAccessible(true);
                Object value = field.get(logindata);
                Log.e("access_token", logindata.getAccessToken());
                Log.e("provider", logindata.getProfile().getProvider().toLowerCase());
                Log.e("FirstName", logindata.getProfile().getFirstName().toString());
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    @Override
    public void onFailure(Throwable error, String errorcode) {
        Toast.makeText(LoginActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();
        //this code will be use for getting pinAuthToken for calling setPinByPINAAuthToken API.
        if (errorResponse.getData() != null) { //the Data is generaic type of property for fetching any value from data then we can use property key
            LinkedTreeMap linkedTreeMap = new LinkedTreeMap();
            linkedTreeMap.putAll((Map) errorResponse.getData());
            Log.e("pinAuthToken", linkedTreeMap.get("PINAuthToken").toString());
        }
    }
});
}
```

- Using Phone<br>

```
      	 private void doLoginByPhone() {
      	  QueryParams params = new QueryParams();
      	  params.setPhone("+91xxxxxxxxxx");
      	  params.setPassword("123456");
      	  params.setLoginUrl("<login-url>");		// put your loginUrl(required)
      	  params.setSmsTemplate("<sms-template>");	//put your smsTemplate(optional)
      	  AuthenticationAPI api = new AuthenticationAPI();
      	  api.login(LoginActivity.this, params, new AsyncHandler < LoginData > () {
      	   @Override
      	   public void onSuccess(LoginData logindata) {
      	    List < String > result = new ArrayList < String > ();
      	    try {
      	     for (Field field: logindata.getClass().getDeclaredFields()) {
      	      field.setAccessible(true);
      	      Object value = field.get(logindata);
      	      Log.e("access_token", logindata.getAccessToken());
      	      Log.e("provider", logindata.getProfile().getProvider().toLowerCase());
      	      Log.e("FirstName", logindata.getProfile().getFirstName().toString());

      	     }
      	    } catch (Exception e) {
      	     e.printStackTrace();
      	    }
      	   }
      	   @Override
      	   public void onFailure(Throwable error, String errorcode) {
      	    Toast.makeText(LoginActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();

      	   }
      	  });
      	 }
```

#### Integrate Registration Service
Registration service supports traditional registration and login methods. Registration Service is done through Authentication API. 

Registration requires a parameter called SOTT. You can create the SOTT token by following this [doc](/api/v2/customer-identity-api/sott-usage/#staticsott4)

**Parameters and their Description:**

|Name|Description|Required|
|---|----|----|
|SOTT|Secure One-time Token which you can check information about sott [here](/api/v2/user-registration/sott)|Yes for Registration. <br> You can generate a long term SOTT token from the Admin Console under Deployment -> Apps -> Mobile Apps (SOTT).
|smstemplate|SMS template allow you to customize the formatting and text of sms sent by users who share your content.|NO|
|emailTemplate|Email templates allow you to customize the formatting and text of emails sent by users who share your content. Templates can be text-only, or HTML and text, in which case the user's email client will determine which is displayed. |NO <br> Go To Platform Configuration -> Standard Login -> Email Templates to get the template names|

The following code can be used to implement registration:

- Using Email<br>

```
      	private void doRegistration() {
      	   QueryParams params = new QueryParams();
      	   params.setEmailTemplate("<email-template>");		//put your emailTemplate(optional)
           String sott = "put_your_sott_here"; //Required
      	   final RegistrationData data = new RegistrationData();
      	   data.setFirstName("Lee");
      	   data.setLastName("com");
      	   data.setPassword("123456");
      	   Email emailObj = new Email();
      	   emailObj.setType("Primary");
      	   emailObj.setValue("xyz@mailinator.com");
      	   data.setEmail(new ArrayList<Email>(Arrays.asList(emailObj)));

      	   AuthenticationAPI api = new AuthenticationAPI();
      	   api.register(params,sott,data,new AsyncHandler<RegisterResponse>() {
      	       @Override
      	       public void onSuccess(RegisterResponse registerResponse) {
      	           Log.e("data",registerResponse.getIsPosted().toString());
      	       }
      	       @Override
      	       public void onFailure(Throwable error, String errorcode) {
      	           Toast.makeText(MainActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();

      	       }
      	   });
      	}
```

- Using Phone<br>

```
      	  private void doRegistrationByPhone() {
      	   QueryParams params = new QueryParams();
      	   params.setSmsTemplate("<sms-template>");	//put your smsTemplate(optional)
           String sott = "put_your_sott_here"; //Required
      	   final RegistrationData data = new RegistrationData();
      	   data.setFirstName("Lee");
      	   data.setLastName("com");
      	   data.setPassword("123456");
      	   data.setPhoneId("+91xxxxxxxxxx");
      	   Email emailObj = new Email();
      	   emailObj.setType("Primary");
      	   emailObj.setValue("xyz@mailinator.com");
      	   data.setEmail(new ArrayList < Email > (Arrays.asList(emailObj)));
      	   AuthenticationAPI api = new AuthenticationAPI();
      	   api.register(params,sott, data, new AsyncHandler < RegisterResponse > () {
      	    @Override
      	    public void onSuccess(RegisterResponse registerResponse) {
      	     Log.e("data", registerResponse.getIsPosted().toString());
      	    }
      	    @Override
      	    public void onFailure(Throwable error, String errorcode) {
      	     Toast.makeText(MainActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();

      	    }
      	   });
      	  }
```

#### Integrate Forgot Password
Following code can used for implementation of forgot password feature:

- Using Email<br>

```
      		private void doForgotPasswordByEmail() {
      		 QueryParams params = new QueryParams();
      		 params.setEmail("xyz1@mailinator.com");
      		 params.setEmailTemplate("<email-template>");												//put your emailTemplate(optional)
      		 AuthenticationAPI api = new AuthenticationAPI();
      		 api.forgotPasswordByEmail(params, new AsyncHandler<ForgotPasswordResponse>() {
      		  @Override
      		  public void onSuccess(ForgotPasswordResponse response) {
      		   Log.e("response", response.getIsPosted().toString());

      		  }
      		  @Override
      		  public void onFailure(Throwable error, String errorcode) {
      		   Toast.makeText(MainActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();

      		  }
      		 });
      		}
```

> **Note :** It is mandatory to whitelist the  `Resetpasswordurl` in the **Admin Console** under [**Deployment >Apps >Web Apps**](https://adminconsole.loginradius.com/deployment/apps/web-apps) to use the forgot password flow.

- Using Phone<br>

```
      		private void doForgotPasswordByPhoneNumber() {
      		QueryParams params = new QueryParams();
      		params.setPhone("123456789");
      		params.setSmsTemplate("<sms-template>");	//put your smsTemplate(optional)
      		AuthenticationAPI api = new AuthenticationAPI();
      		api.forgotPasswordByPhone(params, new AsyncHandler<PhoneForgotPasswordResponse>() {
      		 @Override
      		 public void onSuccess(PhoneForgotPasswordResponse response) {
      		  Log.e("response", response.getIsPosted().toString());

      		 }
      		 @Override
      		 public void onFailure(Throwable error, String errorcode) {
      		  Toast.makeText(MainActivity.this, error.getMessage(), Toast.LENGTH_LONG).show();

      		 }
      		});
      		}
```

## Advanced Options

**Native Login**<br><br>

**Note :-**
  * In the Android device, if you want to setup multiple social apps for the same social provider then you can provide a unique app name for that provider.This unique social app name will be passed in the native login as a provider name like : <BaseProviderName>+<social app name> (eg: "google_myproduct1" )

  ```
  nativeLogin.setSocialAppName("");
  ```

**Google Native Login**

1. You need to add the below code on your button to run native login

 ```
   LoginRadiusSDK.NativeLogin nativeLogin = new LoginRadiusSDK.NativeLogin();
   nativeLogin.startGoogleNativeLogin(LoginActivity.this,2);
  ```

2. Add the following activity definitions, meta data, and permissions to your     Android Manifest inside the application tag:​

   ```
   <activity android:name="com.loginradius.androidsdk.helper.GoogleSSO" />
   <meta-data android:name="com.google.android.gms.version"
   android:value="@integer/google_play_services_version"/>
   ```

3. Google Configuration for Google Native Login
<br><br> - Firstly, sign your app: https://developer.android.com/studio/publish/app-signing.html
<br>- Generate the signing certificate fingerprint and register your application
<br><br> a) Click on your package and choose New -> Google -> Google Maps Activity
<br> b) Android Studio redirect you to google_maps_api.xml 
<br> c) Find your SHA1 fingerprint into google_maps_api.xml
<br> **OR**
<br> Generate your SHA1 by key tool.
        `keytool -exportcert -alias androiddebugkey -keystore path-to-debug-or-production-keystore -list -v`
		
<br> - Create a new Google API console project on the Google Developer https://console.developers.google.com/apis/credentials
<br> - Open the Credentials page and follow these steps if your application needs to submit authorized requests: 
<br><br> a) Click Add credentials > OAuth 2.0 client ID. 
<br> b) Select Android. 
<br> c) In the Package name field, enter your Android app's package name. 
<br> d) Paste the SHA1 fingerprint into the form where requested.
<br><br> - Common Error Messages:
<br> **12501:** This is more commonly caused by an incorrect SHA1 being used to set up your project with Google. Make sure that the SHA1 of the build you are testing matches what you used in the Developer's Console.

** Google Native Login : Refresh Token / offline-access:**<br>

With the earlier Add Sign-In procedure, your app authenticates the user on the client side only; in that case, you can access the Google APIs only while the user is actively using your app. If you want your servers to be able to make Google API calls on behalf of users—possibly while they are offline— this can be achieved using refresh token.

_Configurations_:

1. Configure OAuth 2.0 web application for google provider from [LoginRadius Admin Console](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/social-login/social-providers) Under Social Provider.

2. Make sure web and android configuration are configured under Single Project in Google API Console.

3. After configuration just need to pass your google OAuth 2.0 web application client ID in LoginRadius Android SDsK to the requestServerAuthCode.<br>

   ```
   nativeLogin.setGoogleServerClientID("<web_server_client_id>");
   ```

**Facebook Native Login**

1. Please add your facebook "app_id" in your string.xml, you can get the facebook application id by https://developers.facebook.com/

   ```
   <string name="app_id">your facebook app id</string>
   ```

   You need to add the below code on your button to run native login

   ```
   LoginRadiusSDK.NativeLogin nativeLogin = new LoginRadiusSDK.NativeLogin();
   nativeLogin.startFacebookNativeLogin(LoginActivity.this,2);
   ```

2. Add the following activity definitions and meta data to your Android Manifest inside the application tag:

   ```
   <meta-data
     android:name="com.facebook.sdk.ApplicationId"
     android:value="@string/app_id" />
   ```

3. Facebook Configuration for Facebook Native Login<br>

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
     ![](https://apidocs.lrcontent.com/images/facebook_2670358e72c19acad92.91822294.png)

**Vkontakte Native Login**

1. First of all, you will need to create a valid account on Vkontakte.
   <br>
2. After the account creation, visit https://vk.com/dev. Select "My apps", tap on "Create an Application".
   <br>
3. Give appropriate title, and select "Standalone Application". Copy the Application ID. It will be required below.
   <br>
4. After filling all of the necessary details, in the app go to "Settings". Change the "Application status" to "Application on and visible to all".
   <br>
5. Provide a valid package name of the Android app in which you want to access the Vkontakte native login.
   <br>
6. Next, you have to obtain SHA1 signing certificate fingerprint for authentication. You can obtain the fingerprint using the "keytool" command. You have to obtain separate fingerprints for both release and debug version. Remove colons (":") from them and don't leave empty spaces between them. Add them in the section "Signing certificate fingerprint for Android".
   <br><br>

Now, you're ready to use Vkontakte native login. The Application ID copied in the above steps will be required here. Try the following code:
<br>

```
int vkontakteAppId = <Vkontakte-Application-ID>;
LoginRadiusSDK.NativeLogin nativeLogin = new LoginRadiusSDK.NativeLogin();
nativeLogin.startVkontakteNativeLogin(LoginActivity.this,vkontakteAppId,2);
```

**WeChat Native Login**

Create wxapi package name in built under the main package directory, and Create WXEntryActivity.java is added in the new created wxapi package to inherit WeChatNativeActivity,that exist in LoginRadius SDK.

```
import com.loginradius.androidsdk.activity.WeChatNativeActivity;
public class WXEntryActivity extends WeChatNativeActivity { }
```


in Project AndroidManifest.xml add

```
<activity android:name=".wxapi.WXEntryActivity"
 android:exported ="true"
/>
```

For initialization for the Wechat login we need setup a code for login request in any activity where you want to perform login request and get response.

```
public class LoginActivity extends AppCompatActivity {
private IWXAPI api;
private String WeChat_APP_ID  = "WeChat_APP_ID";

@Override
protected void onCreate(Bundle savedInstanceState) {
api = WXAPIFactory.createWXAPI(this, WeChat_APP_ID,true);
}

public void wechatLogin (){
WXEntryActivity.wxAppId = WeChat_APP_ID;
//WXEntryActivity.isRequired =true;
SendAuth.Req req = new SendAuth.Req();
req.scope = "snsapi_userinfo";
req.state = "wechat_sdk_Wechat login";
api.sendReq(req);
}
public void onResume(){

super.onResume();
// get response from loginradius
if(WXEntryActivity.wxError != null){
	WXEntryActivity.wxResponse.getAccess_token();
}
}
}
```

**Setup Proguard Configuration**<br><br>
If you intend to use ProGuard on the release build of your mobile application, you will need to add the following lines to your project's proguard-project.txt file to preserve information required for the SDK to function properly:

```
-keepattributes Signature
-keepattributes Exceptions
-keep class com.loginradius.** { *; }
```

Also, you need to add the configuration for support libraries of LoginRadius Android SDK. Following is the required code:

```
-keepattributes *Annotation*
-keep class okhttp3.** { *; }
-keep interface okhttp3.** { *; }
-dontwarn okhttp3.**
-dontnote okhttp3.**

-dontwarn retrofit2.**
-keep class retrofit2.** { *; }

-dontwarn okio.**
-keep class okio.** { *; }

```

## Face ID and Touch ID implementation for native android applications

Touch ID and Face ID are preferred because these authentication mechanisms let the users access their devices in a secured manner, with minimal efforts. When you adopt the LocalAuthentication framework, you streamline the consumer authentication experience in the typical case while providing a fallback option when biometrics are not available.

Below are the implementation steps to authenticate a user using Face ID or Touch ID :

1.  Login a user with email and password leveraging the LoginRadius [Login by Email](/api/v2/customer-identity-api/authentication/auth-login-by-email/) API in LoginRadius [Android SDK](/libraries/mobile-sdk-libraries/android-library/#login-by-email).
    
2.  After the successful authentication, the Access Token session will be created and validated as per the [Access Token lifetime](https://adminconsole.loginradius.com/platform-security/account-protection/session-management/token-lifetime) configured for your site.
    
3.  Now you can leverage the below method to store the token and profile value in the session.
    
  ```
  LoginUtil session = new LoginUtil(getApplicationContext());

  // You can store access_token after successful login.

  session.setLogin("<access_token>");

  // You can store access_token and userProfile after successful login.

  session.setLogin(logindata.getAccessToken(),logindata.getProfile());
 ```
  

> **Note:** For more information, please refer to the **Session Login/Logout section** in the [Android SDK](/libraries/mobile-sdk-libraries/android-library/#sessionloginlogout12) documentation.

**4.**  You can make your users authenticate using Touch ID or Face ID each time they open the app, and the session will be continued as per their Access Token lifetime.
    
**5.**  To check if the session already exists or not, use the below method:  

`session.isLogin())`
   
**6.**  Now you can implement the Touch ID and Face ID Native Code in your mobile application as per your business requirement.
    

Refer to the documentation [here](https://developer.android.com/codelabs/biometric-login#0) for more information on logging a user into your application with Touch ID or Face ID.

In the success method, that is called after the success of biometric authentication, you can implement the LoginRadius [Auth Read all Profiles by Token](/api/v2/customer-identity-api/authentication/auth-read-profiles-by-token/) API and call this API based on the session store token or you may also be able to get the profile as a wall using the below method:

  
```
Log.d("token",session.getAccessToken()); //For Getting the LoginRadius Local Store(SharedPreferences) Access Token

Log.d("profile",session.getProfile().FirstName); //For Getting the LoginRadius Local Store(SharedPreferences) Profile For
```
  

**Refer to the following flow for user’s experience while interacting with the application:**

1.  User runs the application and needs to login via their credentials (email and password).
    
2.  User closes the application and visits the application after some time (say 2 days).
    
3.  After 2 days, the application will ask the user to login again via Face ID or Touch ID.
    
4.  When a user is successfully authenticated with any of these Biometric Authentication methods, then they can proceed to use the application.

## Session Login/Logout
Session Login and Logout mathod use for store access_token and userProfile after successful login in Android SharedPreferences for long time.

```
LoginUtil session = new LoginUtil(getApplicationContext());
```

You can store access_token after successful login.

```
session.setLogin("<access_token>");
```

You can store access_token and userProfile after successful login.

```
session.setLogin(logindata.getAccessToken(),logindata.getProfile());
```


After successful login or social login loginradius access token and user profile can be accessed like this.

```
Log.d("token",session.getAccessToken()); //For Getting the LoginRadius Local Store(SharedPreferences) Access Token For Further Uses.
Log.d("profile",session.getProfile().FirstName); //For Getting the LoginRadius Local Store(SharedPreferences) Profile For Further Uses.
```

We added a small boolean function if you want to check whether the user is logged in or not.

```
Log.d("token_login", String.valueOf(session.isLogin()));
```

*Logout*

```
session.logout("<access_token>", new LoginUtil.LogoutCallBack() {
                        @Override
                        public void Response(Boolean isLogout, Boolean isError, ErrorResponse error) {
                            if(isLogout && !isError){
                                //  logout successfully
                            }else if(isLogout && isError){
                                // logout successfully from local session but get a Error from LoginRadius API.
                                Log.d("error",error.getDescription());
                            }
                        }
                    });
```

## Single Sign On
SSO allows a single identity for each customer to be created and recognized across all of your Android app properties. This makes it possible for your customers to easily navigate between the app with one social ID.

1. Add the following data sharedUserId to your Android Manifest after the package tag:​
  ```
  android:sharedUserId="com.example"
  ```
2. SSO code given below requires to be included in all the Activity where you have handled Login functionality. Use the below code for enabling the SSO Login for Android Applications.

```
public Boolean setSSOLogin(String token) {
 if (token != "" && token != null) {
  SharedPreferences.Editor editor = getSharedPreferences(Endpoint.SHAREDPREFERENCEFILEKEY, MODE_PRIVATE).edit();
  editor.putString("ssoaccesstoken", token);
  editor.apply();
  return true;
 } else {
  return false;
 }
}
```

3. In the loginradiusSso method, you must pass other app applicationId From Which app you are using to get the Loginradius token. applicationId store in your app build.gradle file.
  ```
  Context con = createPackageContext("put your second app applicationId", 0);
  ```
4. After successful login you must be added the code for the logout.

  ```
 Context con = null;
 try {
  con = createPackageContext("put your second app applicationId", 0);
 } catch (PackageManager.NameNotFoundException e) {
  e.printStackTrace();
 }
 SharedPreferences pref = con.getSharedPreferences(Endpoint.SHAREDPREFERENCEFILEKEY, MODE_PRIVATE);
 pref.edit().remove("ssoaccesstoken").apply();
 SharedPreferences.Editor editor = getSharedPreferences(Endpoint.SHAREDPREFERENCEFILEKEY, MODE_PRIVATE).edit();
 editor.remove("ssoaccesstoken");
 editor.apply();
  ```

##Advanced Configuration
**Social Login Required Fields Flow**<br><br>
After the process of social login, the SDK flow is redirected to a predefined form having a list of required and optional fields. They are needed to fill out the missing information about the user. If there is a need to customize the default form, options listed below are helpful.<br><br>
**For social web login**<br>

```
LoginRadiusSDK.WebLogin webLogin = new LoginRadiusSDK.WebLogin();
webLogin.setProvider(SocialProviderConstant.FACEBOOK);
//avoid the required fields form
webLogin.setRequired(false);
//set the color for required fields
webLogin.setFieldsColor(Col1or.parseColor("#000000"));
webLogin.startWebLogin(LoginActivity.this,2);
```

**For social native login**<br>

```
LoginRadiusSDK.NativeLogin nativeLogin = new LoginRadiusSDK.NativeLogin();
//avoid the required fields form
nativeLogin.setRequired(false);
//set the color for required fields
nativeLogin.setFieldsColor(Color.parseColor("#000000"));
nativeLogin.startFacebookNativeLogin(LoginActivity.this,2);
```

**For traditional login**<br>

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");
params.setPassword("<password>");
params.setEmailTemplate("<email-template>");    //optional
AuthenticationAPI api = new AuthenticationAPI();

//Used to enable missing/required fields flow in traditional login.
api.setAskRequiredFieldsOnTraditionalLogin(false); //true, by default

api.login(getApplicationContext(), params, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        Log.i("Login By Email","First Name: "+data.getProfile().getFirstName());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login By Email","Error: "+error.getMessage());
    }
});
```

**Social Login Custom Scope**<br><br>
There are some special permissions related to accessing a user's social account. They are known as scopes. There are some default scopes needed for user data. But, they can be overridden for some special needs. To use only specified custom scopes and ignoring the default ones, you can try out the following code:<br>

```
LoginRadiusSDK.WebLogin webLogin = new LoginRadiusSDK.WebLogin();
webLogin.setProvider(provider.getName().toLowerCase());
webLogin.setCustomScopeEnabled(true);
webLogin.startWebLogin(LoginActivity.this,2);
```

**Configure Custom Verification URL and Reset Password URL**<br><br>
When the user is being registered with the help of email, it needs to be verified through a link received in the email. A similar link is received when the user tries to recover password through email. By default, the link redirects to the default LoginRadius Identity Experience Framework. Following represents the URL of the default Identity Experience Framework:

```
https://auth.lrcontent.com/mobile/verification/index.html
```

To override the default verification and reset password url, additional parameters can be passed at the time of SDK initialization. Following code can be used for reference:<br>

```
LoginRadiusSDK.Initialize init = new LoginRadiusSDK.Initialize();
init.setApiKey("<your-api-key>");
init.setSiteName("<your-site-name>");
init.setVerificationUrl("<your-verification-url>");
init.setResetPasswordUrl("<your-reset-password-url>");
```

## LoginRadius API Showcase

This section helps you to explore various API methods of LoginRadius Android SDK. They can be used to fulfill your identity based needs related to traditional login, registration, social login and many more.

### Authentication API
This API is used to perform operations on a user account after the user has authenticated himself for the changes to be made. Generally, it is used for front end API calls. Following is the list of methods covered under this API:

- [Registration By Email](#registration-by-email)<br>
- [Login By Email](#login-by-email)<br>
- [Login By Username](#login-by-username)<br>
- [Accept Privacy Policy](#accept-privacy-policy)<br>
- [Send Welcome Email](#send-welcome-email)<br>
- [Read Complete User Profile](#read-complete-user-profile)<br>
- [Get Social Identity](#get-social-identity)<br>
- [Link Social Account](#link-social-account)<br>
- [Unlink Social Account](#unlink-social-account)<br>
- [Update User Profile](#update-user-profile)<br>
- [Check Email Availability](#check-email-availability)<br>
- [Add Email](#add-email)<br>
- [Verify Email](#verify-email)<br>
- [Verify Email By OTP](#verify-email-by-otp)<br>
- [Remove Email](#remove-email)<br>
- [Resend Verification Email](#resend-verification-email)<br>
- [Change Password](#change-password)<br>
- [Forgot Password By Email](#forgot-password-by-email)<br>
- [Validate Access Token](#validate-access-token)<br>
- [Invalidate Access Token](#invalidate-access-token)<br>
- [Get Security Questions By Email](#get-security-questions-by-email)<br>
- [Get Security Questions By Username](#get-security-questions-by-username)<br>
- [Get Security Questions By Access Token](#get-security-questions-by-access-token)<br>
- [Update Security Questions By Access Token](#update-security-questions-by-access-token)<br>
- [Login with Security Questions By Email](#login-with-security-questions-by-email)<br>
- [Login with Security Questions By Phone](#login-with-security-questions-by-phone)<br>
- [Login with Security Questions By Username](#login-with-security-questions-by-username)<br>
- [Check Username Availability](#check-username-availability)<br>
- [Set or Change Username](#set-or-change-username)<br>
- [Reset Password By Email OTP](#reset-password-by-email-otp)<br>
- [Reset Password By Reset Token](#reset-password-by-reset-token)<br>
- [Reset Password By Security Questions using Email](#reset-password-by-security-questions-using-email)<br>
- [Reset Password By Security Questions using Username](#reset-password-by-security-questions-using-username)<br>
- [Delete Account](#delete-account)<br>
- [Delete Account with Email confirmation](#delete-account-with-email-confirmation)<br>

#####Registration By Email
This API creates a user in the database as well as sends a verification email to the user.

```
QueryParams params = new QueryParams();
params.setEmailTemplate("<email-template>");	//optional
params.setPreventEmailVerification(true);	//optional
String sott = "put_your_sott_here"; //Required
final RegistrationData data = new RegistrationData();
data.setFirstName("<firstname>");
data.setLastName("<lastname>");
data.setPassword("<password>");
data.setAcceptPrivacyPolicy(true);	//optional
Email emailObj = new Email();
emailObj.setType("Primary");
emailObj.setValue("<email-address>");
data.setEmail(new ArrayList<Email>(Arrays.asList(emailObj)));

AuthenticationAPI api = new AuthenticationAPI();
api.register(params,sott,data,new AsyncHandler<RegisterResponse>() {
	@Override
	public void onSuccess(RegisterResponse registerResponse) {
		if(registerResponse.getIsPosted()){
			Log.i("Registration By Email","Please verify your email");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Registration By Email","Error: "+error.getMessage());
	}
});
```

#####Login By Email
This API retrieves a copy of the user data based on the Email.

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");
params.setPassword("<password>");
params.setEmailTemplate("<email-template>");	//optional
params.setPreventEmailVerification(true);	//optional
AuthenticationAPI api = new AuthenticationAPI();
api.login(getApplicationContext(), params, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        Log.i("Login By Email","First Name: "+data.getProfile().getFirstName());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login By Email","Error: "+error.getMessage());
    }
});
```

#####Login By Username
This API retrieves a copy of the user data based on the Username.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");
params.setPassword("<password>");
params.setEmailTemplate("<email-template>");	//optional
params.setPreventEmailVerification(true);	//optional
AuthenticationAPI api = new AuthenticationAPI();
api.login(getApplicationContext(), params, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        Log.i("Login By Username","First Name: "+data.getProfile().getFirstName());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login By Username","Error: "+error.getMessage());
    }
});
```

#####Accept Privacy Policy
This API is used to accept the current privacy policy

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.acceptPrivacyPolicy(params, new AsyncHandler<LoginRadiusUltimateUserProfile>() {
	@Override
	public void onSuccess(LoginRadiusUltimateUserProfile data) {
		Log.i("Accept Privacy Policy", data.FirstName);
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Accept Privacy Policy", "Error: "+error.getMessage());
	}
});
```

#####Send Welcome Email
This API is used to send the welcome email

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.sendWelcomeEmail(params, new AsyncHandler<UpdateResponse>() {
	@Override
	public void onSuccess(UpdateResponse data) {
		if(data.getPosted()){
			Log.i("Send Welcome Email","Success");
		}else{
			Log.i("Send Welcome Email","Failure");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Send Welcome Email","Error: "+error.getMessage());
	}
});
```

#####Read Complete User Profile
This API retrieves a copy of the user data based on the access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.readAllUserProfile(params, new AsyncHandler<LoginRadiusUltimateUserProfile>() {
    @Override
    public void onSuccess(LoginRadiusUltimateUserProfile data) {
        Log.i("Complete User Profile","Email: "+data.Email.get(0).Value);
        Log.i("Complete User Profile","UID: "+data.getUid());
        Log.i("Complete User Profile","No of Logins: "+data.getNoOfLogins());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Complete User Profile","Error: "+error.getMessage());
    }
});
```

#####Get Social Identity
This API is called just after the account linking API and it prevents the traditional profile of the second account from getting created.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.getSocialProfile(params,new AsyncHandler<LoginRadiusUltimateUserProfile>() {
	@Override
    public void onSuccess(LoginRadiusUltimateUserProfile profile) {
		if(profile!=null){
			Log.i("Get Social Profile","FirstName: "+profile.FirstName);
		}
	}

	@Override
    public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Social Profile","Error: "+error.getMessage());
	}
});
```

#####Link Social Account
This API is used to link up a social provider account with the specified account based on the access token and the social providers user access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<email-login-access-token>");
JsonObject change = new JsonObject();
change.addProperty("candidateToken", "<provider-login-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.linkAccount(params, change, new AsyncHandler <RegisterResponse> () {
    @Override
    public void onSuccess(RegisterResponse registerResponse) {
        if (registerResponse.getIsPosted()) {
            Log.i("Link Social Account","Success");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Link Social Account",error.getMessage());
    }
});
```

#####Unlink Social Account
This API is used to unlink up a social provider account with the specified account based on the access token and the social providers user access token. The unlinked account will automatically get removed from your database.

```
QueryParams params = new QueryParams();
params.setAccess_token("<email-login-access-token>");
JsonObject change = new JsonObject();
change.addProperty("Provider", "<provider-name>");
change.addProperty("ProviderId", "<provider-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.unlinkAccount(params, change, new AsyncHandler < DeleteResponse > () {
    @Override
    public void onSuccess(DeleteResponse deleteResponse) {
        if (deleteResponse.getIsDeleted()) {
            Log.i("Unlink Social Account","Success");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Unlink Social Account",error.getMessage());
    }
});
```

#####Update User Profile
This API is used to update the user profile by the access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setEmailTemplate("<email-template>");	//optional
JsonObject update = new JsonObject();
update.addProperty("FirstName", "<first-name>");
update.addProperty("LastName", "<last-name>");
AuthenticationAPI api = new AuthenticationAPI();
api.updateProfile(params, update, new AsyncHandler < UpdateProfileResponse > () {
	@Override
	public void onSuccess(UpdateProfileResponse response) {
		if (response.getIsPosted()) {
			Log.i("Update Profile","Profile updated successfully");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Update Profile","Error: "+error.getMessage());
	}
});
```

#####Check Email Availability
This API is used to check the email exists or not on your site.

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");
AuthenticationAPI api = new AuthenticationAPI();
api.checkEmailAvailability(params, new AsyncHandler<CheckAvailability>() {
    @Override
    public void onSuccess(CheckAvailability data) {
        if(data.getIsExist()){
            Log.i("Check Email","Email exists");
        }else{
            Log.i("Check Email","Email not exists");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Check Email","Error: "+error.getMessage());
    }
});
```

#####Add Email
This API is used to add additional emails to a user's account.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
JsonObject update = new JsonObject();
update.addProperty("Email", "<email-address>");
update.addProperty("Type", "Secondary");  // your email type
AuthenticationAPI api = new AuthenticationAPI();
api.addEmail(params, update, new AsyncHandler <RegisterResponse> () {
	@Override
	public void onSuccess(RegisterResponse registerResponse) {
		if (registerResponse.getIsPosted()) {
			Log.i("Add Email","Please verify your email to add your email");
		}
	}
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Add Email","Error: "+error.getMessage());
	}
});
```

#####Verify Email
This API is used to verify the email of user.

```
QueryParams params = new QueryParams();
params.setVtoken("<your-verification-token>");
params.setWelcomeEmailTemplate("<welcome-email-template>"); //optional
AuthenticationAPI api = new AuthenticationAPI();
api.verifyEmail(params, new AsyncHandler<VerifyEmailResponse>() {
    @Override
    public void onSuccess(VerifyEmailResponse data) {
        if(data.getPosted()){
            Log.i("Verify Email","Email verified");
        }else{
            Log.i("Verify Email","Email not verified");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Verify Email","Error: "+error.getMessage());
    }
});
```

#####Verify Email By OTP
This API is used to verify the email of the user using OTP.

```
QueryParams params = new QueryParams();
params.setEmail("<email>");
params.setOtp("<otp>");
JsonObject securityanswer = new JsonObject();
securityanswer.addProperty("<put-your-security-question-id>", "<put-Answer>");  //for account lockout
AuthenticationAPI api = new AuthenticationAPI();
api.verifyEmailByOtp(params, securityanswer, new AsyncHandler<VerifyEmailResponse>() {
	@Override
	public void onSuccess(VerifyEmailResponse data) {
		if(data.getPosted()){
			Log.i("Verify Email By OTP","Success");
		}else{
			Log.i("Verify Email By OTP","Failure");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Verify Email By OTP","Error: "+error.getMessage());
	}
});
```

#####Remove Email
This API is used to remove additional emails from a user's account.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
JsonObject delete = new JsonObject();
delete.addProperty("Email", "<email-address>");
AuthenticationAPI api = new AuthenticationAPI();
api.removeEmail(params, delete, new AsyncHandler < DeleteResponse > () {
	@Override
	public void onSuccess(DeleteResponse deleteResponse) {
		if (deleteResponse.getIsDeleted()) {
			Log.i("Remove Email","Email removed");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Remove Email","Error: "+error.getMessage());
	}
});
```

#####Resend Verification Email
This API resends the verification email to the user.

```
QueryParams params = new QueryParams();
params.setEmailTemplate("<email-template>");	//optional
JsonObject data = new JsonObject();
data.addProperty("email", "<email-address>");
AuthenticationAPI api = new AuthenticationAPI();
api.resendEmailVerification(params, data, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if(response.getIsPosted()){
			Log.i("Resend Email","Verification email sent again");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Resend Email","Error: "+error.getMessage());
	}
});
```

#####Change Password
This API is used to change the accounts password based on the previous password.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
JsonObject change = new JsonObject();
change.addProperty("OldPassword", "<old-password>");
change.addProperty("NewPassword", "<new-password>");
change.addProperty("ConfirmPassword","<confirm-password>");
AuthenticationAPI api = new AuthenticationAPI();
api.changePassword(params, change, new AsyncHandler <RegisterResponse> () {
	@Override
	public void onSuccess(RegisterResponse registerResponse) {
		if (registerResponse.getIsPosted()) {
			Log.i("Change Password","Password changed");
		}else{
			Log.i("Change Password","Password not changed");
		}
   }
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Change Password","Error: "+error.getMessage());
	}
});
```

#####Forgot Password By Email
This API is used to send the reset password url to a specified account.

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");
params.setEmailTemplate("<email-template>");	//optional
AuthenticationAPI api = new AuthenticationAPI();
api.forgotPasswordByEmail(params, new AsyncHandler<ForgotPasswordResponse>() {
    @Override
    public void onSuccess(ForgotPasswordResponse data) {
        if(data.getIsPosted()){
            Log.i("Forgot Password Email","Reset password link sent on your email");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Forgot Password Email","Error: "+error.getMessage());
    }
});
```

#####Validate Access Token
This api validates access token, if valid then returns a response with its expiry otherwise error.

```
QueryParams params = new QueryParams();
params.setAccess_token("<access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.validateAccessToken(params, new AsyncHandler <AccessTokenResponse> () {
	@Override
	public void onSuccess(AccessTokenResponse data) {
		Log.i("Validate Access Token","Validity: "+data.expires_in.toString());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Validate Access Token","Error: "+error.getMessage());
	}
});
```

#####Invalidate Access Token
This api call invalidates the active access token or expires an access token's validity.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.invalidateAccessToken(params, new AsyncHandler <RegisterResponse> () {
	@Override
	public void onSuccess(RegisterResponse data) {
		if(data.getIsPosted()){
			Log.i("Invalidate Access Token","Success");
		}
    }

    @Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Invalidate Access Token","Error: "+error.getMessage());
	}
});
```

#####Get Security Questions By Email
This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");

AuthenticationAPI api = new AuthenticationAPI();
api.getSecurityQuestions(params, new AsyncHandler < SecurityQuestionsResponse[] > () {
	@Override
	public void onSuccess(SecurityQuestionsResponse[] data) {
		Log.i("Security Questions","Question: "+data[0].getQuestion());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Security Questions","Error: "+error.getMessage());
	}
});
```

#####Get Security Questions By Username
This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");

AuthenticationAPI api = new AuthenticationAPI();
api.getSecurityQuestions(params, new AsyncHandler < SecurityQuestionsResponse[] > () {
	@Override
	public void onSuccess(SecurityQuestionsResponse[] data) {
		Log.i("Security Questions","Question: "+data[0].getQuestion());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Security Questions","Error: "+error.getMessage());
	}
});
```

#####Get Security Questions By Access Token
This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.

```
QueryParams params = new QueryParams();
params.setAccess_token("<access_token>");

AuthenticationAPI api = new AuthenticationAPI();
api.getSecurityQuestions(params, new AsyncHandler < SecurityQuestionsResponse[] > () {
	@Override
	public void onSuccess(SecurityQuestionsResponse[] data) {
		Log.i("Security Questions","Question: "+data[0].getQuestion());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Security Questions","Error: "+error.getMessage());
	}
});
```

#####Update Security Questions By Access Token
This API is used to update security questions by the access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
JsonObject update = new JsonObject();
JsonObject securityanswer = new JsonObject();
securityanswer.addProperty("<put-your-security-question-id>", "<put-Answer>");
update.add("securityanswer", securityanswer);

AuthenticationAPI api = new AuthenticationAPI();
api.updateSecurityQuestionByAccessToken(params, update, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if (response.getIsPosted()) {
			Log.i("Security Questions","Security Questions updated successfully");
		}
	}
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Security Questions","Error: "+error.getMessage());
	}
});
```

#####Login with Security Questions By Email
This API retrieves a copy of the user data based on the Email with help of security questions, when the account gets locked.

```
QueryParams params = new QueryParams();
params.setEmail("<email>");
params.setPassword("<password>");
params.setEmailTemplate("<email-template>");	//optional
JsonObject qaJson = new JsonObject();
qaJson.addProperty("<question-id>","<answer>"); //there can be multiple question and answer pairs
......
AuthenticationAPI api = new AuthenticationAPI();
api.loginWithSecurityQuestion(LoginActivity.this, params, qaJson, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        if(data!=null){
            Log.i("Login","Success");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login","Error: "+error.getMessage());
    }
});
```

#####Login with Security Questions By Username
This API retrieves a copy of the user data based on the Username with help of security questions, when the account gets locked.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");
params.setPassword("<password>");
params.setEmailTemplate("<email-template>");	//optional
JsonObject qaJson = new JsonObject();
qaJson.addProperty("<question-id>","<answer>"); //there can be multiple question and answer pairs
......
AuthenticationAPI api = new AuthenticationAPI();
api.loginWithSecurityQuestion(LoginActivity.this, params, qaJson, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        if(data!=null){
            Log.i("Login","Success");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login","Error: "+error.getMessage());
    }
});
```

#####Update Phone
This API is used to update the login Phone Number of users

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
JsonObject update = new JsonObject();
update.addProperty("Phone", "<mobile-phone-number>");
AuthenticationAPI api = new AuthenticationAPI();
api.updatePhone(params, update, new AsyncHandler<PhoneResponse>() {
	@Override
	public void onSuccess(PhoneResponse response) {
		if(response.getIsPosted()){
			Log.i("Update Phone","Phone updated successfully");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Update Phone","Error: "+error.getMessage());
	}
});
```

#####Check Username Availability
This API is used to check the UserName exists or not on your site.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");
AuthenticationAPI api = new AuthenticationAPI();
api.checkUsernameAvailability(params, new AsyncHandler<CheckAvailability>() {
    @Override
    public void onSuccess(CheckAvailability data) {
        if(data.getIsExist()){
            Log.i("Check Username","Username exists");
        }else{
            Log.i("Check Username","Username not exists");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Check Username","Error: "+error.getMessage());
    }
});
```

#####Set or Change Username
This API is used to set or change UserName by access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setUsername("<new-username>");
AuthenticationAPI api = new AuthenticationAPI();
api.updateUsername(params, new AsyncHandler<UpdateResponse>() {
    @Override
    public void onSuccess(UpdateResponse data) {
        if(data.getPosted()){
            Log.i("Username","Username updated successfully");
        }else{
            Log.i("Username","Username update failed");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Username","Error: "+error.getMessage());
    }
});
```

#####Reset Password By Email OTP
This API is used to reset password using the OTP received by email.

```
QueryParams params = new QueryParams();
params.setEmail("<email>");
params.setOtp("<otp>");
params.setPassword("<password>");
params.setConfirmPassword("<confirm-password>");
params.setWelcomeEmailTemplate("<welcome-email-template>"); //optional
params.setResetPasswordEmailTemplate("<reset-password-email-template>");    //optional
AuthenticationAPI api = new AuthenticationAPI();
api.resetPasswordByOtp(params, new AsyncHandler<UpdateResponse>() {
	@Override
	public void onSuccess(UpdateResponse data) {
		if(data.getPosted()){
			Log.i("Reset Password By OTP","Success");
		}else{
			Log.i("Reset Password By OTP","Failure");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Reset Password By OTP","Error: "+error.getMessage());
	}
});
```

#####Reset Password By Reset Token
This API is used to set a new password for the specified account.

```
QueryParams params = new QueryParams();
params.setResetToken("<your-reset-token>");
params.setPassword("<new-password>");
AuthenticationAPI api = new AuthenticationAPI();
api.resetPasswordByResetToken(params, new AsyncHandler<UpdateResponse>() {
    @Override
    public void onSuccess(UpdateResponse data) {
        if(data.getPosted()){
            Log.i("Reset Password","Reset password successful");
        }else{
            Log.i("Reset Password","Reset password failed");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Reset Password","Error: "+error.getMessage());
    }
});
```

#####Reset Password By Security Questions using Email
This API is used to reset password for the specified account by security question.

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");
params.setPassword("<password>");
params.setResetPasswordEmailTemplate("<reset-password-email-template>");	//optional
JsonObject update = new JsonObject();
JsonObject securityanswer = new JsonObject();
securityanswer.addProperty("<put-your-security-question-id>", "<put-Answer>");
update.add("securityanswer", securityanswer);

AuthenticationAPI api = new AuthenticationAPI();
api.resetPasswordBySecurityQuestions(params, update, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if (response.getIsPosted()) {
			Log.i("Reset Password","Reset password successful");
        }else{
            Log.i("Reset Password","Reset password failed");
        }
	}
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Reset Password","Error: "+error.getMessage());
	}
});
```

#####Reset Password By Security Questions using Username
This API is used to reset password for the specified account by security question.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");
params.setPassword("<password>");
JsonObject update = new JsonObject();
JsonObject securityanswer = new JsonObject();
securityanswer.addProperty("<put-your-security-question-id>", "<put-Answer>");
update.add("securityanswer", securityanswer);

AuthenticationAPI api = new AuthenticationAPI();
api.resetPasswordBySecurityQuestions(params, update, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if (response.getIsPosted()) {
			Log.i("Reset Password","Reset password successful");
        }else{
            Log.i("Reset Password","Reset password failed");
        }
	}
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Reset Password","Error: "+error.getMessage());
	}
});
```

#####Delete Account
This API is used to delete account using delete token.

```
QueryParams params = new QueryParams();
params.setDeleteToken("<your-delete-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.deleteAccount(params, new AsyncHandler<UpdateResponse>() {
    @Override
    public void onSuccess(UpdateResponse data) {
        if(data.getPosted()){
            Log.i("Delete Account","Account deleted");
        }else{
            Log.i("Delete Account","Account not deleted");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Delete Account","Error: "+error.getMessage());
    }
});
```

#####Delete Account with Email confirmation
API deletes the user account by the access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setDeleteUrl("<delete-url>")	//optional
params.setEmailTemplate("<email-template>")	//optional
AuthenticationAPI api = new AuthenticationAPI();
api.deleteAccountByConfirmEmail(params, new AsyncHandler<DeleteAccountResponse>() {
    @Override
    public void onSuccess(DeleteAccountResponse data) {
        if(data.getDeleteRequestAccepted()){
            Log.i("Delete Account","Delete confirmation mail sent");
        }else{
            Log.i("Delete Account","Delete confirmation mail not sent");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Delete Account","Error: "+error.getMessage());
    }
});
```

###Phone Authentication
This API is used to perform operations on a user account by Phone after the user has authenticated himself for the changes to be made. Generally, it is used for front end API calls. Following is the list of methods covered under this API:

- [Registration By Phone](#registration-by-phone)<br>
- [Login By Phone](#login-by-phone)<br>
- [Forgot Password By Phone](#forgot-password-by-phone)<br>
- [Verify OTP After Forgot Password](#verify-otp-after-forgot-password)<br>
- [Check Phone Availability](#check-phone-availability)<br>
- [Resend OTP](#resend-otp)<br>
- [Resend OTP By Access Token](#resend-otp-by-access-token)<br>
- [Verify OTP](#verify-otp)<br>
- [Verify OTP By Token](#verify-otp-by-token)<br>
- [Get Security Questions By Phone](#get-security-questions-by-phone)<br>
- [Update Phone](#update-phone)<br>
- [Reset Password By Security Questions using Phone](#reset-password-by-security-questions-using-phone)<br>
- [Remove Phone ID by Access Token](#remove-phone-id-by-access-token)<br><br>

#####Registration By Phone
This API registers the new users into your Cloud Directory and triggers the phone verification process.

```
QueryParams params = new QueryParams();
params.setSmsTemplate("<sms-template>");	//optional
params.setPreventEmailVerification(true);	//optional
String sott = "put_your_sott_here"; //Required
final RegistrationData data = new RegistrationData();
data.setFirstName("<firstname>");
data.setLastName("<lastname>");
data.setPassword("<password>");
data.setPhoneId("<mobile-phone-number>");
data.setAcceptPrivacyPolicy(true);	//optional

AuthenticationAPI api = new AuthenticationAPI();
api.register(params,sott,data,new AsyncHandler<RegisterResponse>() {
	@Override
	public void onSuccess(RegisterResponse registerResponse) {
		if(registerResponse.getIsPosted()){
			Log.i("Registration By Phone","OTP sent to your mobile number");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Registration By Phone","Error: "+error.getMessage());
	}
});
```

#####Login By Phone
This API retrieves a copy of the user data based on the Phone.

```
QueryParams params = new QueryParams();
params.setPhone("<mobile-phone-number>");
params.setPassword("<password>");
params.setSmsTemplate("<sms-template>");	//optional
AuthenticationAPI api = new AuthenticationAPI();
api.login(getApplicationContext(), params, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        Log.i("Login By Phone","First Name: "+data.getProfile().getFirstName());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login By Phone","Error: "+error.getMessage());
    }
});
```

#####Forgot Password By Phone
This API is used to send the OTP to reset the account password.

```
QueryParams params = new QueryParams();
params.setPhone("<mobile-phone-number>");
params.setSmsTemplate("<sms-template>");	//optional
AuthenticationAPI api = new AuthenticationAPI();
api.forgotPasswordByPhone(params, new AsyncHandler<PhoneForgotPasswordResponse>() {
    @Override
    public void onSuccess(PhoneForgotPasswordResponse data) {
        if(data.getIsPosted()){
            Log.i("Forgot Password Phone","OTP sent on your mobile number");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Forgot Password Phone","Error: "+error.getMessage());
    }
});
```

#####Verify OTP After Forgot Password
This API is used to reset the password.

```
JsonObject register = new JsonObject();
register.addProperty("Phone", "232323232323232"); //put phone number
register.addProperty("otp", "232323"); //put otp
register.addProperty("password", "22444"); //put password
AuthenticationAPI api = new AuthenticationAPI();
api.verifyOtpForgotPassword(register, new AsyncHandler < LoginData > () {
	@Override
	public void onSuccess(LoginData response) {
		Log.i("Verify OTP", "Access Token: "+response.getAccessToken());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Verify OTP", "Error: "+error.getMessage());
	}
});
```

#####Check Phone Availability
This API is used to check the Phone Number exists or not on your site.

```
QueryParams params = new QueryParams();
params.setPhone("<mobile-phone-number>");
AuthenticationAPI api = new AuthenticationAPI();
api.checkPhoneAvailability(params, new AsyncHandler <CheckAvailability> () {
	@Override
	public void onSuccess(CheckAvailability data) {
		if(data.getIsExist()){
			Log.i("Check Phone","Phone number exists");
		}else{
			Log.i("Check Phone","Phone number not exists");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Check Phone","Error: "+error.getMessage());
	}
});
```

#####Resend OTP
This API is used to resend a verification OTP to verify a user's Phone Number. The user will receive a verification code that they will need to input.

```
JsonObject register = new JsonObject();
register.addProperty("Phone", "<mobile-phone-number>");
AuthenticationAPI api = new AuthenticationAPI();
api.resendOtp(register, new AsyncHandler <RegisterResponse> () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if(response.getIsPosted()){
			Log.i("Resend OTP","OTP sent again to your mobile phone");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Resend OTP","Error: "+error.getMessage());
	}
});
```

#####Resend OTP By Access Token
This API is used to resend a verification OTP to verify a user's Phone Number in cases in which an active token already exists.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
AuthenticationAPI api = new AuthenticationAPI();
api.resendOtpByToken(params, new AsyncHandler < PhoneResponse > () {
	@Override
	public void onSuccess(PhoneResponse response) {
		if(response.getIsPosted()!=null){
			Log.i("Resend OTP","OTP sent again to your mobile phone");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Resend OTP","Error: "+error.getMessage());
	}
});
```

#####Verify OTP
This API is used to validate the verification code sent to verify a user's phone number.

```
QueryParams params = new QueryParams();
params.setOtp("<otp-value>");
JsonObject register = new JsonObject();
register.addProperty("Phone", "<phone-number>");
AuthenticationAPI api = new AuthenticationAPI();
api.verifyOtp(params, register, new AsyncHandler < LoginData > () {
	@Override
	public void onSuccess(LoginData response) {
		Log.i("Verify OTP", "Access Token: "+response.getAccessToken());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Verify OTP", "Error: "+error.getMessage());
	}
});
```

#####Verify OTP By Token
This API is used to consume the verification code sent to verify a user's phone number. Use this call for front-end purposes in cases where the user is already logged in by passing the user's access token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setOtp("<otp-value>");
params.setSmsTemplate("<sms-template>");	//optional
JsonObject register = new JsonObject();
register.addProperty("Phone", "<phone-number>");
AuthenticationAPI api = new AuthenticationAPI();
api.verifyOtp(params, register, new AsyncHandler < LoginData > () {
	@Override
	public void onSuccess(LoginData response) {
		Log.i("Verify OTP", "Access Token: "+response.getAccessToken());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Verify OTP", "Error: "+error.getMessage());
	}
});
```

#####Get Security Questions By Phone
This API is used to retrieve the list of questions that are configured on the respective LoginRadius site.

```
QueryParams params = new QueryParams();
params.setPhone("<mobile-phone-number>");

AuthenticationAPI api = new AuthenticationAPI();
api.getSecurityQuestions(params, new AsyncHandler < SecurityQuestionsResponse[] > () {
	@Override
	public void onSuccess(SecurityQuestionsResponse[] data) {
		Log.i("Security Questions","Question: "+data[0].getQuestion());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Security Questions","Error: "+error.getMessage());
	}
});
```

#####Login with Security Questions By Phone
This API retrieves a copy of the user data based on the Phone with help of security questions, when the account gets locked.

```
QueryParams params = new QueryParams();
params.setPhone("<mobile-phone-number>");
params.setPassword("<password>");
params.setLoginUrl("<login-url>");	//optional
params.setSmsTemplate("<sms-template>");	//optional
JsonObject qaJson = new JsonObject();
qaJson.addProperty("<question-id>","<answer>"); //there can be multiple question and answer pairs
......
AuthenticationAPI api = new AuthenticationAPI();
api.loginWithSecurityQuestion(LoginActivity.this, params, qaJson, new AsyncHandler<LoginData>() {
    @Override
    public void onSuccess(LoginData data) {
        if(data!=null){
            Log.i("Login","Success");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Login","Error: "+error.getMessage());
    }
});
```

#####Reset Password By Security Questions using Phone
This API is used to reset password for the specified account by security question.

```
QueryParams params = new QueryParams();
params.setPhone("<mobile-phone-number>");
params.setPassword("<password>");
JsonObject update = new JsonObject();
JsonObject securityanswer = new JsonObject();
securityanswer.addProperty("<put-your-security-question-id>", "<put-Answer>");
update.add("securityanswer", securityanswer);

AuthenticationAPI api = new AuthenticationAPI();
api.resetPasswordBySecurityQuestions(params, update, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if (response.getIsPosted()) {
			Log.i("Reset Password","Reset password successful");
        }else{
            Log.i("Reset Password","Reset password failed");
        }
	}
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Reset Password","Error: "+error.getMessage());
	}
});
```

#####Remove Phone ID by Access Token
This API is used to delete the Phone ID on a user's account via the access_token.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-accessToken>");
AuthenticationAPI api = new AuthenticationAPI();
api.removePhoneIDByAccessToken(params, new AsyncHandler<DeleteResponse>() {
    @Override
    public void onSuccess(DeleteResponse response) {
        if(response.getIsDeleted()){
        Log.i("Remove Phone ID","Remove Phone ID");
        }else{
         Log.i("Remove Phone ID","Account Not Remove Phone ID");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Remove Phone ID","Error: "+error.getMessage());
    }
        });
```
###PIN Authentication
This API is used to perform operations on a user account by PIN after the user has authenticated himself for the changes to be made. Generally, it is used for front end API calls. Following is the list of methods covered under this API:

- [Pin Login](#pin-login)<br>
- [Set Pin By PinAuthToken](#set-pin-by-pinauthtoken)<br>
- [Forgot Pin By Email](#forgot-pin-by-email)<br>
- [Forgot Pin By UserName](#forgot-pin-by-username)<br>
- [Forgot Pin By Phone](#forgot-pin-by-phone)<br>
- [Reset PIN by Email and OTP](#reset-pin-by-email-and-otp)<br>
- [Reset PIN by Username and OTP](#reset-pin-by-username-and-otp)<br>
- [Reset PIN by Phone and OTP](#reset-pin-by-phone-and-otp)<br>
- [Reset PIN By ResetToken](#reset-pin-by-resettoken)<br>
- [Reset PIN By SecurityAnswer And Email](#reset-pin-by-email-and-securityanswer)<br>
- [Reset PIN By SecurityAnswer And Username](#reset-pin-by-username-and-securityanswer)<br>
- [Reset PIN By SecurityAnswer And Phone](#reset-pin-by-phone-and-securityanswer)<br>
- [Change Pin By Token](#change-pin-by-token)<br>
- [Invalidate Pin Session Token](#invalidate-pin-session-token)<br>

##### PIN Login
This API is used to login a user by pin and session_token.

```
QueryParams queryParams = new QueryParams();
queryParams.setSessionToken("<sessionToken>");
PINRequiredModel pin = new PINRequiredModel();
pin.setPin("<pin>");

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.loginByPIN(queryParams, pin, new AsyncHandler < LoginData > () {
    @Override
    public void onSuccess(LoginData data) {
        Log.d("Success", data.getAccessToken());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Set Pin By PinAuthToken
This API is used to change a user's PIN using Pin Auth token.
```
PINRequiredModel pinRequiredModel = new PINRequiredModel();
pinRequiredModel.setPin("<pin>");
String pinAuthToken = "<pinAuthToken>";
PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.setPINByPinAuthToken(pinAuthToken, pinRequiredModel, new AsyncHandler < LoginData > () {
    @Override
    public void onSuccess(LoginData data) {
        Log.d("Success", data.getSessionToken());
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Forgot Pin By Email
This API sends the reset pin email to specified email address.

```
QueryParams queryParams = new QueryParams();
queryParams.setEmailTemplate("<emailtemplate>");
queryParams.setResetPinUrl("<resetPinURL>");
String email = "<email>";

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.forgotPINByEmail(queryParams, email, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Forgot Pin By UserName
This API sends the reset pin email using username. 

```
QueryParams queryParams = new QueryParams();
queryParams.setEmailTemplate("<emailtemplate>");
queryParams.setResetPinUrl("<resetPinURL>");
String userName = "<userName>";

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.forgotPINByUserName(queryParams, userName, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Forgot Pin By Phone
This API sends the OTP to specified phone number. 

```
String smsTemplate = "<smsTemplate>";
String phone = "<phone>";
PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.forgotPINByPhone(phone,smsTemplate, new AsyncHandler < PhoneResponse > () {
    @Override
    public void onSuccess(PhoneResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Reset PIN by Email and OTP
This API is used to reset pin using email and OTP.

```
ResetPINByEmailModel resetPinByEmailModel = new ResetPINByEmailModel();
resetPinByEmailModel.setEmail("<email>");
resetPinByEmailModel.setOtp("<OTP>");
resetPinByEmailModel.setPin("<PIN>");
PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.resetPINByEmailAndOTP(resetPinByEmailModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Reset PIN by UserName and OTP
 This API is used to reset pin using username and OTP.

```
ResetPINByUserNameModel resetPinByUsernameModel = new ResetPINByUserNameModel();
resetPinByUsernameModel.setOtp("<OTP>");
resetPinByUsernameModel.setUserName("<USERNAME>");
resetPinByUsernameModel.setPin("<PIN>");
PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.resetPINByUserNameAndOTP(resetPinByUsernameModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Reset PIN by Phone and OTP
This API is used to reset pin using phoneId and OTP. 

```
ResetPINByPhoneModel resetPinByPhoneModel = new ResetPINByPhoneModel();
resetPinByPhoneModel.setPhone("<phone>");
resetPinByPhoneModel.setOtp("<otp>");
resetPinByPhoneModel.setPin("<PIN>");

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.resetPINByPhoneAndOTP(resetPinByPhoneModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Reset PIN by ResetToken
This API is used to reset pin using reset token. 


```
ResetPINByResetToken resetPINByResetToken = new ResetPINByResetToken();
resetPINByResetToken.setPin("<pin>");
resetPINByResetToken.setResetToken("<resetToken>");

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.resetPINByResetToken(resetPINByResetToken, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
##### Reset PIN By SecurityAnswer And Email
This API is used to reset pin using security question answer and email. 

```
ResetPINByEmailModel resetPinByEmailModel = new ResetPINByEmailModel();
resetPinByEmailModel.setEmail("<email>");
resetPinByEmailModel.setPin("<PIN>");
Map < String, String > securityAnswer = new HashMap < String, String > ();
securityAnswer.put("<security-qustion-id>", "<security-answer>");

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
resetPinByEmailModel.setSecurityAnswer(securityAnswer);

pinApi.resetPINByEmailAndSecurityQuestion(resetPinByEmailModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
#####Reset PIN By SecurityAnswer And Username
 This API is used to reset pin using security question answer and username.
```
ResetPINByUserNameModel resetPinByUsernameModel = new ResetPINByUserNameModel();
resetPinByUsernameModel.setUserName("<USERNAME>");
resetPinByUsernameModel.setPin("<PIN>");
Map < String, String > securityAnswer = new HashMap < String, String > ();
securityAnswer.put("<security-qustion-id>", "<security-answer>");
resetPinByUsernameModel.setSecurityAnswer(securityAnswer);

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.resetPINByUserNameAndSecurityQuestion(resetPinByUsernameModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
#####Reset PIN By SecurityAnswer And Phone
This API is used to reset pin using security question answer and phone.

```
ResetPINByPhoneModel resetPinByPhoneModel = new ResetPINByPhoneModel();
resetPinByPhoneModel.setPhone("<phone>");
resetPinByPhoneModel.setPin("<PIN>");
Map < String, String > securityAnswer = new HashMap < String, String > ();
securityAnswer.put("<security-qustion-id>", "<security-answer>");
resetPinByPhoneModel.setSecurityAnswer(securityAnswer);

PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.resetPINByPhoneAndSecurityQuestion(resetPinByPhoneModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
#####Change Pin By Token
 This API is used to change a user's PIN using access token.
```
ChangePINModel changePINModel = new ChangePINModel();
changePINModel.setNewPin("newPin");
changePINModel.setOldPin("oldPin");
String accessToken = "<accessToken>";
PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.changePINByAccessToken(accessToken, changePINModel, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```
#####Invalidate Pin Session Token
This API is used to invalidate pin session token.

```
String sessionToken="<sessionToken>";
PinAuthenticationAPI pinApi = new PinAuthenticationAPI();
pinApi.invalidatePINSessionToken(sessionToken, new AsyncHandler < PostResponse > () {
    @Override
    public void onSuccess(PostResponse data) {
        Log.d("Success", String.valueOf(data.getIsPosted()));
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.e("Error", error.getMessage());
    }
});
```


###Social API
This API is used to fetch information about the social accounts of the user. It helps to get several type of information such as social profile, status, likes, messages, posts and more. Following are the methods covered under this API:

- [Social User Profile](#social-user-profile)<br>
- [Get Status](#get-status)<br>
- [Get Contacts](#get-contacts)<br>
- [Get Album](#get-album)<br>
- [Get Audio](#get-audio)<br>
- [Get CheckIn](#get-checkin)<br>
- [Get Company](#get-company)<br>
- [Get Events](#get-events)<br>
- [Get Following](#get-following)<br>
- [Get Groups](#get-groups)<br>
- [Get Likes](#get-likes)<br>
- [Get Mention](#get-mention)<br>
- [Get Photo](#get-photo)<br>
- [Get Page](#get-page)<br>
- [Get Video](#get-video)<br>
- [Post Message](#post-message)<br>
- [Get Posts](#get-posts)<br>
- [Status Update](#status-update)<br><br>

#####Social User Profile
The User Profile API is used to get social profile data from the user’s social account after authentication.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getUserProfile(params, new AsyncHandler<LoginRadiusUltimateUserProfile>() {
    @Override
    public void onSuccess(LoginRadiusUltimateUserProfile data) {
        if(data!=null){
            Log.i("Social Profile","First Name: "+data.FirstName);
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Social Profile","Error: "+error.getMessage());
    }
});
```

#####Get Status
The Status API is used to get the status messages from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, LinkedIn, Twitter, Vkontakte

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getStatus(params, new AsyncHandler<LoginRadiusStatus[]>() {
	@Override
	public void onSuccess(LoginRadiusStatus[] data) {
		if(data.length>0){
			Log.i("Get Status","Value: "+data[0].text);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Status","Error: "+error.getMessage());
	}
});
```

#####Get Contacts
The Contact API is used to get contacts/friends/connections data from the user’s social account.This is one of the APIs that makes up the LoginRadius Friend Invite System. The data will normalized into LoginRadius’ standard data format. This API requires setting permissions in your LoginRadius Admin Console.<br><br>
<b>Note:</b> Facebook restricts access to the list of friends that is returned. When using the Contacts API with Facebook you will only receive friends that have accepted some permissions with your app.<br><br>
<b>Supported Providers:</b> Facebook, Foursquare, Google, LinkedIn, Live, Twitter, Vkontakte, Yahoo

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getContact(params, new AsyncHandler<LoginRadiusContactCursorResponse>() {
	@Override
	public void onSuccess(LoginRadiusContactCursorResponse data) {
		if(data.Data.size()>0){
			Log.i("Get Contacts","Name: "+data.Data.get(0).name);
			Log.i("Get Contacts","Email: "+data.Data.get(0).emailId);
			Log.i("Get Contacts","Phone: "+data.Data.get(0).phoneNumber);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Contacts","Error: "+error.getMessage());
	}
});
```

#####Get Album
This API returns the photo albums associated with the passed in access tokens Social Profile.<br><br>
<b>Supported Providers:</b> Facebook, Google, Live, Vkontakte.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getAlbum(params, new AsyncHandler<LoginRadiusAlbum[]>() {
	@Override
	public void onSuccess(LoginRadiusAlbum[] data) {
		if(data.length>0){
			Log.i("Get Album","Title: "+data[0].title);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Album","Error: "+error.getMessage());
	}
});
```

#####Get Audio
The Audio API is used to get audio files data from the user’s social account.<br><br>
<b>Supported Providers:</b> Live, Vkontakte

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getAudio(params, new AsyncHandler<LoginRadiusAudio[]>() {
	@Override
	public void onSuccess(LoginRadiusAudio[] data) {
		if(data.length>0){
			Log.i("Get Audio","Title: "+data[0].title);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Audio","Error: "+error.getMessage());
	}
});
```

#####Get CheckIn
The Check In API is used to get check Ins data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, Foursquare, Vkontakte

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getCheckIn(params, new AsyncHandler<LoginRadiusCheckIn[]>() {
	@Override
	public void onSuccess(LoginRadiusCheckIn[] data) {
        if(data.length>0){
			Log.i("Get CheckIn","Message: "+data[0].Message);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get CheckIn","Error: "+error.getMessage());
	}
});
```

#####Get Company
The Company API is used to get the followed companies data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, LinkedIn

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getCompany(params, new AsyncHandler<LoginRadiusCompany[]>() {
	@Override
	public void onSuccess(LoginRadiusCompany[] data) {
		if(data.length>0){
			Log.i("Get Company","Name: "+data[0].Name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
        Log.i("Get Company","Error: "+error.getMessage());
	}
});
```

#####Get Events
The Event API is used to get the event data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, Live

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getEvent(params, new AsyncHandler<LoginRadiusEvent[]>() {
	@Override
	public void onSuccess(LoginRadiusEvent[] data) {
		if(data.length>0){
			Log.i("Get Events","Name: "+data[0].Name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Events","Error: "+error.getMessage());
	}
});
```

#####Get Following
Get the following user list from the user’s social account.<br><br>
<b>Supported Providers:</b> Twitter

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getFollowing(params, new AsyncHandler<LoginRadiusFollowing[]>() {
	@Override
	public void onSuccess(LoginRadiusFollowing[] data) {
		if(data.length>0){
			Log.i("Get Following","Name: "+data[0].name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Following","Error: "+error.getMessage());
	}
});
```

#####Get Groups
The Group API is used to get group data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, Vkontakte

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getGroup(params, new AsyncHandler<LoginRadiusGroup[]>() {
	@Override
	public void onSuccess(LoginRadiusGroup[] data) {
		if(data.length>0){
			Log.i("Get Groups","Name: "+data[0].name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Groups","Name: "+data[0].name);
	}
});
```

#####Get Likes
The Like API is used to get likes data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getLike(params, new AsyncHandler<LoginRadiusLike[]>() {
	@Override
	public void onSuccess(LoginRadiusLike[] data) {
		if(data.length>0){
			Log.i("Get Likes","Name: "+data[0].Name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Likes","Error: "+error.getMessage());
	}
});
```

#####Get Mention
The Mention API is used to get mentions data from the user’s social account.<br><br>
<b>Supported Providers:</b> Twitter

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getMention(params, new AsyncHandler<LoginRadiusMention[]>() {
	@Override
	public void onSuccess(LoginRadiusMention[] data) {
		if(data.length>0){
			Log.i("Get Mention","Name: "+data[0].name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Mention","Error: "+error.getMessage());
	}
});
```

#####Get Photo
The Photo API is used to get photo data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, Foursquare, Google, Live, Vkontakte

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setAlbumId("<album-id>");
SocialAPI api = new SocialAPI();
api.getPhoto(params, new AsyncHandler<LoginRadiusPhoto[]>() {
	@Override
	public void onSuccess(LoginRadiusPhoto[] data) {
		if(data.length>0){
			Log.i("Get Photo","Name: "+data[0].Name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Photo","Error: "+error.getMessage());
	}
});
```

#####Get Page
The Page API is used to get the page data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, LinkedIn

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setPageName("<page-name>");
SocialAPI api = new SocialAPI();
api.getPage(params, new AsyncHandler < LoginRadiusPage > () {
	@Override
	public void onSuccess(LoginRadiusPage data) {
		Log.i("Get Page","Location: "+data.Locations.get(0).City);
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Page","Error: "+error.getMessage());
	}
});
```

#####Get Video
The Video API is used to get video files data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook, Google, Live, Vkontakte

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getVideo(params, new AsyncHandler<LoginRadiusVideo[]>() {
	@Override
	public void onSuccess(LoginRadiusVideo[] data) {
		if(data.length>0){
			Log.i("Get Video","Name: "+data[0].Name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Video","Error: "+error.getMessage());
	}
});
```

#####Post Message
Post Message API is used to post messages to the user’s contacts.<br><br>
<b>Supported Providers:</b> Twitter, LinkedIn<br><br>
The Message API is used to post messages to the user’s contacts. This is one of the APIs that makes up the LoginRadius Friend Invite System. After using the Contact API, you can send messages to the retrieved contacts. This API requires setting permissions in your LoginRadius Admin Console.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setReceiver(URLEncoder.encode("<put receiver id>", "utf-8"));
params.setSubject(URLEncoder.encode("<put subject>", "utf-8"));
params.setMessage(URLEncoder.encode("<put message>", "utf-8"));
SocialAPI api = new SocialAPI();
api.postMessage(params, new AsyncHandler < PostAPIResponse > () {
	@Override
	public void onSuccess(PostAPIResponse data) {
		if(data.isPosted){
			Log.i("Post Message","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Post Message","Error: "+error.getMessage());
	}
});
```

#####Get Posts
The Post API is used to get post message data from the user’s social account.<br><br>
<b>Supported Providers:</b> Facebook

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
SocialAPI api = new SocialAPI();
api.getPost(params, new AsyncHandler<LoginRadiusPost[]>() {
	@Override
	public void onSuccess(LoginRadiusPost[] data) {
		if(data.length>0){
			Log.i("Get Posts","Name: "+data[0].name);
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Get Posts","Error: "+error.getMessage());
	}
});
```

#####Status Update
The Status API is used to update the status on the user’s wall.<br><br>
<b>Supported Providers:</b> Facebook, Twitter, LinkedIn

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setStatus(URLEncoder.encode("<status>", "utf-8"));
params.setUrl(URLEncoder.encode("", "utf-8"));
params.setImageUrl(URLEncoder.encode("", "utf-8"));
params.setTitle(URLEncoder.encode("", "utf-8"));
params.setDescription(URLEncoder.encode("", "utf-8"));
params.setCaption(URLEncoder.encode("", "utf-8"));
SocialAPI api = new SocialAPI();
api.updateStatus(params, new AsyncHandler < PostAPIResponse > () {
	@Override
	public void onSuccess(PostAPIResponse data) {
		if(data.isPosted){
			Log.i("Status Update","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Status Update","Error: "+error.getMessage());
	}
});
```

###One Touch Login API
This API is used to simplify the registration process to the minimum steps. It is really useful when there is a need to avoid hassles related to user registration. Following is the list of methods covered under this API:

- [One Touch Login By Email](#one-touch-login-by-email)<br>
- [One Touch Login By Phone](#one-touch-login-by-phone)<br>
- [One Touch Email Verification](#one-touch-email-verification)<br>
- [One Touch Login Ping](#one-touch-togin-ping)<br>
- [One Touch Login OTP Verification](#one-touch-login-otp-verification)<br><br>

#####One Touch Login By Email
This API is used to send login link on email id for Instant Registration

```
QueryParams params = new QueryParams();
//  params.setRedirecturl("<redirect-url>"); //optional
//  params.setOnetouchloginemailtemplate("<one-touch-login-email-template>"); //optional
//  params.setWelcomeEmailTemplate("<welcome-email-template>"); //optional

OneTouchLoginEmailModel payload = new OneTouchLoginEmailModel();
payload.setClientguid("<client-guid>");
payload.setEmail("<email>");
payload.setName("");
payload.setQqCaptchaTicket("");
payload.setQqCaptchaRandstr("");
payload.setGRecaptchaResponse("");


OneTouchLoginAPI api = new OneTouchLoginAPI();
api.loginByEmail(params,payload, new AsyncHandler <RegisterResponse> () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if (response.getIsPosted()) {
			Log.i("One Touch Login","Success");
		}
	}
	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("One Touch Login","Error: "+error.getMessage());
	}
});
```

#####One Touch Login By Phone
This API is used to send one time password on given phone number for Instant Registration

```
QueryParams params = new QueryParams();
//params.setSmsTemplate("<sms-template>"); //optional
OneTouchLoginPhoneModel payload = new OneTouchLoginPhoneModel();
payload.setPhone("<phone>");
payload.setName("");
payload.setQqCaptchaTicket("");
payload.setQqCaptchaRandstr("");
payload.setGRecaptchaResponse("");

OneTouchLoginAPI api = new OneTouchLoginAPI();
api.loginByPhone(params,payload, new AsyncHandler <PhoneDataResponse> () {
@Override
public void onSuccess(PhoneDataResponse response) {
	if (response.getData().getSid()!=null) {
		Log.i("One Touch Login","Success");
	}
}

@Override
public void onFailure(Throwable error, String errorcode) {
	Log.i("One Touch Login","Error: "+error.getMessage());
}
});
```

#####One Touch Email Verification
This API verifies the provided token for One Touch Login.

```
QueryParams params = new QueryParams();
params.setVtoken("<your-vtoken-here>");
params.setWelcomeEmailTemplate("<welcome-email-template>");
OneTouchLoginAPI api = new OneTouchLoginAPI();
api.oneTouchEmailVerification(params, new AsyncHandler<VerifyResponse>() {
@Override
public void onSuccess(VerifyResponse data) {
	if(data.getVerified()){
		Log.i("OneTouch Login","Success");
	}
}

@Override
public void onFailure(Throwable error, String errorcode) {
	Log.i("OneTouch Login","Error: "+error.getMessage());
}
});
```

#####One Touch Login Ping
This API is used to check if the One Touch Login link has been clicked or not.

```
QueryParams params = new QueryParams();
params.setClientGuid("<client-guid>");

OneTouchLoginAPI api = new OneTouchLoginAPI();
api.oneTouchLoginPing(params, new AsyncHandler <LoginData> () {
@Override
public void onSuccess(LoginData response) {
	Log.i("OneTouch Login","Access Token: "+response.getAccessToken());
}

@Override
public void onFailure(Throwable error, String errorcode) {
	Log.i("OneTouch Login","Error: "+error.getMessage());
}
});
```

#####One Touch Login OTP Verification
This API is used to verify the otp for Instant Registration

```
QueryParams params = new QueryParams();
params.setOtp("<otp>");
//params.setSmsTemplate("sms-template"); //optional
JsonObject jsonObject = new JsonObject();
jsonObject.addProperty("phone", "<phone>");

OneTouchLoginAPI api = new OneTouchLoginAPI();
api.verifyOTP(params, jsonObject, new AsyncHandler < LoginData > () {
	@Override
	public void onSuccess(LoginData response) {
		if (response!=null) {
			Log.i("One Touch Login","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("One Touch Login","Error: "+error.getMessage());
	}
});
```

###Smart Login API
This API is used to implement Smart Login. It includes methods to send Smart Login links to the customer's email, verifying them and validating their hit count. Following is the list of methods covered under this API:

- [Smart Login By Email](#smart-login-by-email)<br>
- [Smart Login By Username](#smart-login-by-username)<br>
- [Smart Login Ping](#smart-login-ping)<br>
- [Smart Login Verify By Token](#smart-login-verify-by-token)<br><br>

#####Smart Login By Email
This API sends a Smart Login link to the customer's Email Id.

```
QueryParams params = new QueryParams();
params.setEmail("<email>");
params.setClientGuid("<client-guid>");
params.setWelcomeEmailTemplate("<welcome-email-template>");
params.setSmartLoginEmailTemplate("<smart-login-email-template>"); //optional
SmartLoginAPI api = new SmartLoginAPI();
api.login(params, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if(response.getIsPosted()){
			Log.i("Smart Login","Smart Login link sent on your email");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Smart Login","Error: "+error.getMessage());
	}
});
```

#####Smart Login By Username
This API sends a Smart Login link to the customer's Email Id.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");
params.setClientGuid("<client-guid>");
params.setWelcomeEmailTemplate("<welcome-email-template>");
params.setSmartLoginEmailTemplate("<smart-login-email-template>"); //optional
SmartLoginAPI api = new SmartLoginAPI();
api.login(params, new AsyncHandler < RegisterResponse > () {
	@Override
	public void onSuccess(RegisterResponse response) {
		if(response.getIsPosted()){
			Log.i("Smart Login","Smart Login link sent on your email");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Smart Login","Error: "+error.getMessage());
	}
});
```

#####Smart Login Ping
This API is used to check that the Smart Login link has been clicked or not on server.

```
QueryParams params = new QueryParams();
params.setClientGuid("<client-guid>");

SmartLoginAPI api = new SmartLoginAPI();
api.ping(params, new AsyncHandler < LoginData > () {
	@Override
	public void onSuccess(LoginData response) {
		Log.i("Smart Login","Access Token: "+response.getAccessToken());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Smart Login","Error: "+error.getMessage());
   }
});
```

#####Smart Login Verify By Token
This API verifies the provided token for Smart Login.

```
QueryParams params = new QueryParams();
params.setVtoken("<your-vtoken-here>");
params.setWelcomeEmailTemplate("<welcome-email-template>");
SmartLoginAPI api = new SmartLoginAPI();
api.verifyToken(params, new AsyncHandler<VerifyResponse>() {
    @Override
    public void onSuccess(VerifyResponse data) {
        if(data.getVerified()){
            Log.i("Smart Login","Success");
        }
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Smart Login","Error: "+error.getMessage());
    }
});
```

###Passwordless Link Login
This API is used to implement a passwordless login flow. It includes methods for sending passwordless login links through email and username. Also, they allow to verify those links. Following is the list of methods covered under this API:

- [Passwordless Login By Email](#passwordless-login-by-email)<br>
- [Passwordless Login By Username](#passwordless-login-by-username)<br>
- [Passwordless Login Verification](#passwordless-login-verification)<br>
- [Passwordless Login Send Phone OTP](#passwordless-login-send-otp)<br>
- [Passwordless Login By Phone](#passwordless-login-by-phone)<br><br>

#####Passwordless Login By Email
This API is used to send Passwordless Login verification link by Email ID.

```
QueryParams params = new QueryParams();
params.setEmail("<email-address>");
params.setPasswordlessLoginTemplate("<password-less-login-template>");	//optional
PasswordlessLoginAPI api = new PasswordlessLoginAPI();
api.loginByEmail(params, new AsyncHandler<UpdateResponse>() {
	@Override
	public void onSuccess(UpdateResponse data) {
		if(data.getPosted()){
			Log.i("Passwordless Login","Passwordless Login link sent on your email");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Passwordless Login","Error: "+error.getMessage());
	}
});
```

#####Passwordless Login By Username
This API is used to send Passwordless Login verification link by UserName.

```
QueryParams params = new QueryParams();
params.setUsername("<username>");
params.setPasswordlessLoginTemplate("<password-less-login-template>");	//optional
PasswordlessLoginAPI api = new PasswordlessLoginAPI();
api.loginByUsername(params, new AsyncHandler<UpdateResponse>() {
	@Override
	public void onSuccess(UpdateResponse data) {
		if(data.getPosted()){
			Log.i("Passwordless Login","Passwordless Login link sent on your email");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Passwordless Login","Error: "+error.getMessage());
	}
});
```

#####Passwordless Login Verification
This API is used to verify Passwordless Login verification link.

```
QueryParams params = new QueryParams();
params.setVtoken("<verification-token>");
params.setWelcomeEmailTemplate("<welcome-email-template>"); //optional
PasswordlessLoginAPI api = new PasswordlessLoginAPI();
api.verifyLink(params, new AsyncHandler<LoginData>() {
	@Override
	public void onSuccess(LoginData data) {
		if(data!=null){
			Log.i("Passwordless Login","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Passwordless Login","Error: "+error.getMessage());
	}
});
```

#####Passwordless Login Send Phone OTP
This API is used to send OTP to phone for passwordless login

```
QueryParams params = new QueryParams();
params.setPhone("<phone>");
params.setSmsTemplate("<sms-template>");    //optional
PasswordlessLoginAPI api = new PasswordlessLoginAPI();
api.sendOtpToPhone(params, new AsyncHandler<PhoneSendOtpData>() {
	@Override
	public void onSuccess(PhoneSendOtpData data) {
		if(data.getData().getAccountSid()!=null){
			Log.i("Passwordless Login","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Passwordless Login","Error: "+error.getMessage());
	}
});
```

#####Passwordless Login By Phone
This API is used to login by phone using OTP.

```
QueryParams params = new QueryParams();
params.setPhone("<phone>");
params.setOtp("<otp>");
JsonObject securityanswer = new JsonObject();
securityanswer.addProperty("<put-your-security-question-id>", "<put-Answer>");  //for account lockout
PasswordlessLoginAPI api = new PasswordlessLoginAPI();
api.loginByPhone(params, securityanswer, new AsyncHandler<LoginData>() {
	@Override
	public void onSuccess(LoginData data) {
		Log.i("Passwordless Login","First Name: "+data.getProfile().getFirstName().toString());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Passwordless Login","Error: "+error.getMessage());
	}
});
```

###Custom Object API
This API is used to create additional custom fields for user registration. It provides methods for creating, updating and deleting custom objects. Following is the list of methods covered under this API:

- [Create Custom Object](#create-custom-object)<br>
- [Read Custom Object By Token](#read-custom-object-by-token)<br>
- [Read Custom Object by Record ID](#read-custom-object-by-record-id)<br>
- [Update Custom Object](#update-custom-object)<br>
- [Delete Custom Object](#delete-custom-object)<br><br>

#####Create Custom Object
This API is used to write information in JSON format to the custom object for the specified account.

```
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setObjectname("<put-CustomObject-name>");
JsonObject registerdata = new JsonObject();
registerdata.addProperty("<customdata1>", "<value>");
registerdata.addProperty("<customdata2>", "<value>");

CustomObjectAPI api = new CustomObjectAPI();
api.createCustomObject(params, registerdata, new AsyncHandler<CreateCustomObject>() {
	@Override
    public void onSuccess(CreateCustomObject createCustomObject) {
        Log.i("Custom Object","Custom Object ID: "+createCustomObject.getId());
    }
    @Override
    public void onFailure(Throwable error, String errorcode) {
		Log.i("Custom Object","Error: "+error.getMessage());
    }
});
```

#####Read Custom Object By Token
This API is used to retrieve the specified Custom Object data for the specified account.

```
QueryParams params = new QueryParams();
params.setObjectname("<put-CustomObject-name>");
params.setAccess_token("<your-access-token>");
CustomObjectAPI api = new CustomObjectAPI();
api.readCustomObjectByToken(params, new AsyncHandler<ReadCustomObject>() {
	@Override
	public void onSuccess(ReadCustomObject readCustomObject) {
		if(readCustomObject.getData().size()>0){
			Log.i("Custom Object","Custom Object ID: "+readCustomObject.getData().get(i).getId());
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Custom Object","Error: "+error.getMessage());
	}
});
```

#####Read Custom Object by Record ID
This API is used to retrieve the Custom Object data for the specified account.

```
QueryParams params = new QueryParams();
params.setObjectname("<put-CustomObject-name>");
params.setObjectRecordId("<put-CustomObject-recordid>");
params.setAccess_token("<your-access-token>");

CustomObjectAPI api = new CustomObjectAPI();
api.readCustomObjectById(params, new AsyncHandler<CreateCustomObject>() {
	@Override
	public void onSuccess(CreateCustomObject readCustomObject) {
		if(readCustomObject.getData().size()>0){
			Log.i("Custom Object","Custom Object ID: "+readCustomObject.getData().get(i).getId());
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Custom Object","Error: "+error.getMessage());
	}
});
```

#####Update Custom Object
This API is used to update the specified custom object data of the specified account. If the value of updatetype is 'replace' then it will fully replace custom object with the new custom object and if the value of updatetype is 'partialreplace' then it will perform an upsert type operation.

```
QueryParams params = new QueryParams();
params.setObjectname("<put-CustomObject-name>");
params.setObjectRecordId("<put-CustomObject-recordid>");
params.setAccess_token("<your-access-token>");
// params.setUpdatetype(true); // if you want to do replace all data (optional)
JsonObject updatedata = new JsonObject();
updatedata.addProperty("<customdata1>", "<value>");
updatedata.addProperty("<customdata2>", "<value>");

CustomObjectAPI api = new CustomObjectAPI();
api.updateCustomObject(params,updatedata, new AsyncHandler<CreateCustomObject>() {
	@Override
	public void onSuccess(CreateCustomObject customObject) {
		if(customObject!=null){
			Log.i("Update Custom Object","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Update Custom Object","Error: "+error.getMessage());
});
```

#####Delete Custom Object
This API is used to remove the specified Custom Object data using ObjectRecordId of a specified account.

```
QueryParams params = new QueryParams();
params.setObjectname("<put-CustomObject-name>");
params.setObjectRecordId("<put-CustomObject-recordid>");
params.setAccess_token("<your-access-token>");

CustomObjectAPI api = new CustomObjectAPI();
api.deleteCustomObject(params, new AsyncHandler<DeleteResponse>() {
	@Override
	public void onSuccess(DeleteResponse deleteResponse) {
		if(deleteResponse.getIsDeleted()){
			Log.i("Delete Custom Object","Success");
		}
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Delete Custom Object","Error: "+error.getMessage());
	}
});
```

###Configuration API
This API is used to get information about the configuration on the LoginRadius site. Following is the method covered in this API:

```
ConfigurationAPI api = new ConfigurationAPI();
api.getResponse(new AsyncHandler<ConfigResponse>() {
	@Override
	public void onSuccess(ConfigResponse data) {
		Log.i("Configuration","Site Name: "+data.getAppName());
	}

	@Override
	public void onFailure(Throwable error, String errorcode) {
		Log.i("Configuration",error.getMessage());
	}
});
```

###Projection of fields
When you want to get selected fields of data, you can pass additional info in the API method. For example, if you want only the FirstName and LastName field from the profile data, you can use the following code:

```
String fields[] = new String[]{"FirstName","LastName"};
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setFields(fields);
AuthenticationAPI api = new AuthenticationAPI();
api.readAllUserProfile(params, new AsyncHandler<LoginRadiusUltimateUserProfile>() {
	@Override
    public void onSuccess(LoginRadiusUltimateUserProfile data) {
		Log.i("Profile Data","First Name: "+data.FirstName+" Last Name: "+data.LastName);
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Profile Data","Error: "+error.getMessage());
    }
});
```

In another case, when the data is nested i.e. inside an object or an array, you can use round brackets "()" to pass the info in proper hierarchy. For example, in the above scenario, if you want to extract the Value from Email array, you can use the following code:

```
String fields[] = new String[]{"Email(Value)"};
QueryParams params = new QueryParams();
params.setAccess_token("<your-access-token>");
params.setFields(fields);
AuthenticationAPI api = new AuthenticationAPI();
api.readAllUserProfile(params, new AsyncHandler<LoginRadiusUltimateUserProfile>() {
	@Override
    public void onSuccess(LoginRadiusUltimateUserProfile data) {
		Log.i("Profile Data","Email Value: "+data.Email.get(0).Value);
    }

    @Override
    public void onFailure(Throwable error, String errorcode) {
        Log.i("Profile Data","Error: "+error.getMessage());
    }
});
```

Projection of fields can be applied to the following API methods:
<br>

- AuthenticationAPI.getSocialProfile()
- AuthenticationAPI.readAllUserProfile()
- SocialAPI.getUserProfile()

## Run Demo

You can try out the bundled demo application with SDK to explore various features. Following are some key features highlighted in the demo app:

- Login - to show login interface
- Registration - to show the registration form as per your configuration
- Forgot Password - to show forgot password interface
  <br><br>
  After importing the demo project in Android Studio, there is a need to configure API Key, Site Name and SOTT. These values are initialized in MainActivity.java.

```
LoginRadiusSDK.Initialize init = new Initialize();
init.setApiKey(getString(R.string.api_key));
init.setSiteName(getString(R.string.site_name));
```

You can configure API Key and Site Name values in the strings.xml of the demo project.

```
<resources>
    ....
    <string name="api_key">your loginradius api key</string>
    <string name="site_name">your loginradius sitename</string>
    ....
</resources>
```

To configure SOTT, replace the value in the following code in MainActivity.java:

```
String sott = "put your sott here";
```

![](https://apidocs.lrcontent.com/images/demo-screenshot_1472059f85aab875125.30106959.png)

## Reference Manual

Please find the reference manual [here](http://docs.lrcontent.com/apidocs/ref/android/index.html)
