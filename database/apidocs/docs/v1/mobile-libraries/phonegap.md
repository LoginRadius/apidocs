# PhoneGap Library

---

[Get a Full Demo.](https://github.com/LoginRadius/phonegap-sdk/tree/api-v1)

> Disclaimer

> This library is meant to help you with an implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

####Download SDK
Get a copy of the PhoneGap SDK and demo projects [here](https://github.com/LoginRadius/phonegap-sdk/tree/api-v1).

####Configure your Account
To get your app supported LoginRadius PhoneGap SDK, you need to slightly configure your LoginRadius user account.

- Enable cdn.loginradius.com in your site list  
  Since this page is hosted in cdn.loginradius.com, please put it on your website list under Site Configuration.

![enter image description here](https://apidocs.lrcontent.com/images/SBBnsRwgRAKgTOzu2gnK_Unsdsdtitled_879158a435aaba8e50.66728237.png)

- Add another parameter to your User Registration Email template  
  By default your email template should look like this:

![enter image description here](https://apidocs.lrcontent.com/images/dPLEOvq9SN2rQZCsiFxU_Unsdsdtitled_1654858a4371f0ae914.66053015.png)

Change from

```
#Url#?vtype=emailverification&vtoken=#GUID#
```

to

```
#Url#?vtype=emailverification&vtoken=#GUID#&apikey=<Your-LoginRadius-API-Key>
```

And the same change should be also applied to your "Reset Password Email Template Configuration".

####Installation
Get a copy of the LoginRadius User Registration SDK from git and include this in your project. Include the reference on the page:

```
<script src="js/LoginRadiusPhoneGapSDK.js"></script>
<script src="js/LoginRadiusSDK.2.0.0.js"></script>
```

Our Cordova platform versions:

```
android 6.2.3
ios 4.4.0
```

We also require an additional plugin:

- Before you can add this SDK, you must install the [Apache Cordova InAppBrowser ](http://docs.phonegap.com/en/edge/cordova_inappbrowser_inappbrowser.md.html)into your current project.please click InAppBrowser link and follow the PhoneGap documentation.

```
cordova plugin add cordova-plugin-inappbrowser
cordova plugin add cordova-plugin-whitelist
```

In the onDeviceReady initialize the LoginRadius User registration Object:

```
var options = {};
//Set Your LoginRadius account details
options.apikey = '<LoginRadius API Key>';
options.promptPasswordOnSocialLogin='< true or false >';
options.facebooknative = false;
options.googlenative = false;
options.SafariViewController=true;
options.V2RecaptchaSiteKey='<your recaptcha key>';
//Initialize the function that will handle the responses from the hosted registration page.
options.callback=function (params){
//Handle the actions for: sociallogin, login, registration, and forgotpassword
switch(params.action) {
//Social login returns an accesstoken which can be used to pull user details(Using HTML SDK) including ID and UID for server side calls.
case "sociallogin":
//handle Social functionality
break;
//Login returns an accesstoken which can be used to pull user details(Using HTML SDK) including ID and UID for server side calls.
case "login":
//handle Email and Password Functionality
break;
//Registration returns and email message and status which you can use to display messaging to your user.
case "registration":
//Handle successful registration messaging
break;
//Forgot password returns and email message and status which you can use to display messaging to your user.
case "forgotpassword":
//Handle Forgot passworf messaging
break;
default:
alert('action not defined');
break;
}

};
//Initialize the LoginRadius User Registration object
$LR.init(options);
```

The above initialization requires options object with the following parameters:

|                             |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        |
| --------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| apikey                      | Set to your LoginRadius API Key which you can get [here](https://loginradius.readme.io/get-api-key-and-secret).(required)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| promptPasswordOnSocialLogin | After authentication for social login, it will prompt a password filling interface. By filling it, a user is also going to generate a traditional account besides his/her social account. If you required Prompt Password then put variables "true" else "false".(optional)                                                                                                                                                                                                                                                                                                                                                            |
| V2RecaptchaSiteKey          | You can utilize your own Google ReCaptcha account to service your interfaces. This allows you to include additional domains and views analytics for your ReCaptcha. Follow the below steps to include your Google ReCaptcha account on your LoginRadius Registration interface. Create an Account on Google ReCaptcha:https://www.google.com/recaptcha/intro/index.html Create a ReCaptcha Site and add the domains that will be using this ReCaptcha. Add the V2RecaptchaSiteKey and V2Recaptcha parameters to your LoginRadius User Registration options object during interface initialization as per this documentation.(optional) |
| callback                    | Set to a function with a single parameter that will hold the response from the hosted registration.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| SafariViewController        | if you want to do login with SafariViewController then you must be pass value as <true>.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               |

Create the options object and pass it into the init function.

```
$LR.init(options);
```

The object passed into the callback function will contain fields that you can use to accomplish various functionality and will always contain an action which you can use to determine the behavior:

#####sociallogin Action
The object will contain:

- token - The LoginRadius access token which you can use to retrieve user data with the HTML SDK.
- status - a Boolean to determine if the login was successful.

#####login Action
The object will contain:

- token - The LoginRadius access token which you can use to retrieve user data with the HTML SDK.
- status - a Boolean to determine if the login was successful.
- lrUid - The Account ID for the User which can also be pulled from the user object using the access token. This is used in server side calls.

#####registration Action
The object will contain:

- email - The email used during registration which you can use to display messaging to the user on next steps.
- status - a Boolean to determine if the login was successful.

#####forgotpassword Action
The object will contain:

- email - The email used during registration which you can use to display messaging to the user on next steps.
- status - a Boolean to determine if the login was successful.

####Activation
Finally, setup elements to trigger the functions that will direct your users to the relevant hosted interface.

#####Registration
Triggers the Registration interface and will return with an action of "registration" to the callback function.

```
<a onclick="$LR.util.lrRegister();"> Register</a>
```

#####Social Login
Triggers the Social Login interface and will return with an action of "sociallogin" to the callback function.

```
<a onclick="$LR.util.lrSocial();">Social Login</a>
```

#####Login
Triggers the Login interface and will return with an action of "login" to the callback function.

```
<a onclick="$LR.util.lrLogin();">Login</a>
```

#####Forgot Password
Triggers the Forgot Password interface and will return with an action of "forgotpassword" to the callback function.

```
<a onclick="$LR.util.lrForgotPassword();">Forgot Password</a>
```

####AfterLogin Redirection
1)After successful login user can start any HTML file where to call API and get data. In the demo, we get all data in Profile.html,you must be configured in your HTML file in after successful redirection actions. in the demo, we perform many actions after redirection in index.html file.

```
options.callback = function(params) {
//Handle the actions for: sociallogin, login, registration, and forgotpassword
switch (params.action) {
//Social login returns an accesstoken which can be used to pull user details(Using HTML SDK) including ID and UID for server side calls.
case "sociallogin":
sessionStorage.setItem('LRTokenKey', params.token);
window.location = "Profile.html";
break;
//Login returns an accesstoken which can be used to pull user details(Using HTML SDK) including ID and UID for server side calls.
case "login":
sessionStorage.setItem('LRTokenKey', params.token);
window.location = "Profile.html";
break;
//Registration returns and email message and status which you can use to display messaging to your user.
case "registration":
var registermessage = "An email has been sent to " + params.email + ".  Click on the verification link included in this email.";
$(".messageinfo").html(registermessage);
break;
//Forgot password returns and email message and status which you can use to display messaging to your user.
case "forgotpassword":
var forgotmessage = "An email has been sent to " + params.email + ".    Click on the forgot password link included in this email.";
$(".messageinfo").html(forgotmessage);
break;
default:
alert('action not defined');
break;
}
```

2)After redirection in Profile.Html file,user can easy call API and get all data

```
<body>
  <!--Show the user's profile after Login -->
  <div class="sociallogin_userprofile" id="sociallogin_userprofile">
    <table border="0">
      <tr>
        <td class="userprofile_label" colspan="2"><img id="userimage" height="150px;" alt="profile_image" />
          <span style="text-align:right;float:right;vertical-align: top;border: 0;">
          <a class="" href="#" onclick="Logout();" style="border:0;color:#9095AA">Logout</a>
          </span>
        </td>
      </tr>
      <tr>
        <td class="userprofile_label">ID</td>
        <td id="ID" class="userprofile_value"></td>
      </tr>
      <tr>
        <td class="userprofile_label">Provider</td>
        <td id="Provider" class="userprofile_value"></td>
      </tr>
      <tr>
        <td class="userprofile_label">Name</td>
        <td id="username" class="userprofile_value"></td>
      </tr>
      <tr>
        <td class="userprofile_label">EmailID</td>
        <td id="emailid" class="userprofile_value"></td>
      </tr>
      <tr>
        <td class="userprofile_label">Birth Date</td>
        <td id="birthdate" class="userprofile_value"></td>
      </tr>
      <tr>
        <td class="userprofile_label">Gender</td>
        <td id="gender" class="userprofile_value"></td>
      </tr>
      <tr>
        <td class="userprofile_label">Profile Url</td>
        <td id="profileurl" class="userprofile_value"></td>
      </tr>
    </table>
  </div>
  <!-- Scripts for LoginRadius. We need the HTML 5 SDK and the PhoneGap SDK -->
  <script src="js/LoginRadiusSDK.2.0.0.js"></script>
  <!-- Custom Scripts -->
  <script type="text/javascript" charset="utf-8">
    //Logout cleanup
    function Logout() {
        sessionStorage.removeItem('LRTokenKey');
        window.location = "index.html";
    }

    //Device APIs are available
    window.onload = function() {
        var token = LoginRadiusSDK.getToken();

        //Don't rely on the token for any sensitive transactions, only for getting data.
        if (token) {
            loadUserprofile();
        } else {
            window.location.href = "index.html";
        }

        //Invoke the user profile API from the HTML 5 SDK.
        function loadUserprofile() {
            LoginRadiusSDK.getUserprofile(function(userprofile) {
                document.getElementById('sociallogin_userprofile').style.display = "block";
                document.getElementById('userimage').src = userprofile.ImageUrl;
                document.getElementById('ID').innerHTML = userprofile.ID;
                document.getElementById('Provider').innerHTML = userprofile.Provider;
                document.getElementById('username').innerHTML = (userprofile.FirstName || '') + ' ' + (userpr                ofile.MiddleName || '') + ' ' + (userprofile.LastName || '');
                document.getElementById('emailid').innerHTML = userprofile.Email && userprofile.Email.length                 > 0 ? userprofile.Email[0].Value : '';
                document.getElementById('birthdate').innerHTML = userprofile.BirthDate;
                document.getElementById('gender').innerHTML = userprofile.Gender;
                document.getElementById('profileurl').innerHTML = userprofile.ProfileUrl;
            });
        }


    }
  </script>
</body>
```

###Social Login
####PhoneGap Installation
This guide assumes you have followed the PhoneGap Docs and are comfortable adding plugins, platforms, and deploying your build. You can get a copy of the Demo App on your LoginRadius account admin-console under mobile SDK settings.

#####Importing Required Libraries

- Download the PhoneGap SDK from [Github](https://github.com/LoginRadius/phonegap-sdk).
- In any web page you can include the two scripts like so:

```
<script src="js/LoginRadiusSDK.2.0.0.js"></script>
<script src="js/LoginRadiusPhoneGapSDK.js"></script>
```

- We also require an additional plugin:

```
Cordova plugin add org.apache.cordova.inappbrowser
```

####Configuring the SDK
From our quickstart guide, we used an options array to specify an API key. We can use the same array to enable native login. From the quickstart snippet of code:

```
var options = {};

 //Set our API Key
 options.apikey = '<LoginRadius API Key>';

 //Toggle native, defaults to false
 options.native = false;

 //Initialize our interface. After this is invoked, your users should be able to login
 $LR.init(options);

 //We can bind a login function
 $LR.onLogin = function() {
     alert("This is a callback from our SDK after logging in!");
     loadUserprofile();
 };
```

Invoke the user profile API from the LoginRadiusSDK.After successful login user can start any HTML file where to call API and get data. In the demo, we get all data in index.html you must be configured in your HTML file in after successful redirection actions.

```
function loadUserprofile() {
            LoginRadiusSDK.getUserprofile(function(userprofile) {
                document.getElementById('sociallogin_userprofile').style.display = "block";
                document.getElementById('userimage').src = userprofile.ImageUrl;
                document.getElementById('ID').innerHTML = userprofile.ID;
                document.getElementById('Provider').innerHTML = userprofile.Provider;
                document.getElementById('username').innerHTML = (userprofile.FirstName || '') + ' ' + (userpr                ofile.MiddleName || '') + ' ' + (userprofile.LastName || '');
                document.getElementById('emailid').innerHTML = userprofile.Email && userprofile.Email.length                 > 0 ? userprofile.Email[0].Value : '';
                document.getElementById('birthdate').innerHTML = userprofile.BirthDate;
                document.getElementById('gender').innerHTML = userprofile.Gender;
                document.getElementById('profileurl').innerHTML = userprofile.ProfileUrl;
            });
        }
```

#####Activation
Finally, setup elements to trigger the functions that will direct your users to the relevant provider interface

```
<a href="#" onclick="$LR.login('Facebook');"><img src="img/Facebook.png"></a>
<a href="#" onclick="$LR.login('Twitter');"><img src="img/Twitter.png"></a>
<a href="#" onclick="$LR.login('Google');"><img src="img/Google.png"></a>
```

####Native Login
#####Supported Devices
Currently, only Facebook is supported for native login with our SDK for Android and iOS.

#####Facebook Native Login
Before you can enable native login, you must install the [Apache Cordova Facebook Plugin](https://github.com/Wizcorp/phonegap-facebook-plugin) into your current project for facebook native login.

To function properly, it is highly recommended you follow the [iOS installation guide](https://github.com/Wizcorp/phonegap-facebook-plugin/blob/master/platforms/ios/README.md) and the [Android installation guide](https://github.com/Wizcorp/phonegap-facebook-plugin/blob/master/platforms/android/README.md).

We can use the same array to enable native login and pass permissions of facebook native:

```
options.apikey = "YOUR API KEY HERE";

//Enable native login if available.
options.facebooknative = false;
```

There is also a permission option available. If your user has not previously authorized your application, you need to request a list of permissions. It is safe to pass in the same array for each login. However, these permissions should be with respect to those you set in your LoginRadius Admin Console. By default, our SDK will ask for the user's public profile, which is several data points. Such as id, name, first name, last name, link to their profile, gender, locale, and an age range. You can override this default functionality by setting options.permissions to an array of string permissions. Additional permissions can be found in [Facebook's documentation](https://developers.facebook.com/android/login-with-facebook/v2.1#step3)

<br>
* Facebook Configuration for Facebook Native Login<br>

Create a new Facebook App on the Facebook Developer site. You will need to create an Android application and get a Facebook Application ID: https://developers.facebook.com/

**Android**<br>

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

**iOS**<br>

- After the creation of App, Click on setting into left panel, Select Add Plateform and choose iOS.
- Pass your project bundle ID, iPhone store ID and iPad store ID.

![enter image description here](https://apidocs.lrcontent.com/images/Capture-1_3102158e788489b8bf2.24336866.png)

#####Google Native Login
Before you can enable native login, you must install the [Apache Cordova Google Plugin](https://github.com/EddyVerbruggen/cordova-plugin-googleplus) into your current project for google native login.

```
options.apikey = "YOUR API KEY HERE";

//Enable native login if available.
options.googlenative = false;
options.googlewebid="";         // if you set google native login then you must be add your webClientId
```

You need to set googlenative true to enable the Google Native Login.

######Google Configuration for Google Native Login
**Android:-**<br>

- To configure Android, generate a configuration file [here](https://developers.google.com/mobile/add?platform=android&cntapi=signin). Once Google Sign-In is enabled Google will automatically create necessary credentials in Developer Console. There is no need to add the generated google-services.json file into your cordova project.
- After generating the configuration file, move to [Google Credentials Manager](https://console.developers.google.com/apis/credentials) and select your project name (Which you have created) in the header section. Now Select Credentials from the left panel and copy the Client ID available under project's **web application**.
  <br><br>
  ![enter image description here](https://apidocs.lrcontent.com/images/Capture_758058e5ed837de044.65917717.png)

- After Installation set Client ID to LR options.
  <br>
  `options.googlewebid="<YOUR CLIENT ID>";`

**iOS:-**<br>

- To get your iOS REVERSED_CLIENT_ID, generate a configuration file [here](https://developers.google.com/mobile/add?platform=ios&cntapi=signin). This GoogleService-Info.plist and just drag & drop in your project's "Resources" folder.
- The file contains the REVERSED_CLIENT_ID you'll need during installation and also copy CLIENT_ID from "GoogleService-Info.plist" and pass this on lroptions
  <br>
- Now pass the iOS Client ID as
  <br>
  `cordova plugin add cordova-plugin-googleplus --save --variable REVERSED_CLIENT_ID=myReversediOSClientID`
- Pass your WEB Client ID on (to parity with Android)
  `options.googlewebid="";`

#####Solution to common Runtime or Compile Errors
**Android platform, replace is undefined:**<br>
on line 202, on file `platforms/android/cordova/lib/emulator.js` <br>
replace `var num = target.split('(API level ')[1].replace(')', '');` <br>
with `var num = target.match(/\d+/)[0];`

**iOS platform, replace is undefined:**<br>
on your root directory phonegap project run `cd platforms/ios/cordova && npm install ios-sim`

**iOS Google native, Google 400 Error:**<br>
on invalid request Custom scheme URIs are not allowed for 'Web' client type
this means your cordova-plugin-googleplus 's reversed client id is using the web type, generate the ios and put the reversed client id there.

**iOS Google native, Keychain Error:**<br>
Cordova would not trigger any keychain setup by Google, you need to run your phonegap app via XCode in order for it to work

**Modifying config.xml did not update platform config:**<br>
If you have already generated the platforms and you are modifying the variables config.xml on some plugins, run the commands below to update your platform with those settings variable changes. Also, same would apply to android platform.

```
phonegap platform remove ios
phonegap platform add ios
```

**Google native, 12501 :**<br>
This is more commonly caused by an incorrect SHA1 being used to set up your project with Google. Make sure that the SHA1 of the build you are testing matches what you used in the Developer's Console.
<br>
**Google native, 10 :**<br>
Make sure that the client id you're passing in to the plugin (for webClientId) is of type Web Application, not of type Android, iOS, or other.

Make sure that you're Android SDK is completely up to date (see the list posted in my initial response above).

Finally, make sure that the SHA1 you used to set up in the developer's console is the same one that ionic is using when it builds your app. If it's not, log in will not work.

###Social APIs
After the access token is fetched, we can then safely access any of the Loginradius APIs as follows:

####User Profile API
Fetch the user's details.

```
<p id="ID"></p>
```

```
LoginRadiusSDK.getUserprofile(function (userprofile) {
    document.getElementById('ID').innerHTML = userprofile.ID;
});
```

####Album API
Fetch the user's photo albums.

```
<table id="albums"></table>
```

```
LoginRadiusSDK.getAlbums(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Title '+(i+1);
        col_2.innerHTML = data[i]['Title'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('albums').appendChild(row);
    }
});
```

####Audio API
Load the user's audio files.

```
<table id="audios"></table>
```

```
LoginRadiusSDK.getAudios(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Title '+(i+1);
        col_2.innerHTML = data[i]['Title'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('audios').appendChild(row);
    }
});
```

####Check In API
Loads the user's checked in data.

```
<table id="Checkins"></table>
```

```
LoginRadiusSDK.getCheckins(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'PlaceTitle '+(i+1);
        col_2.innerHTML = data[i]['PlaceTitle'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Checkins').appendChild(row);
    }
});
```

####Company API
Load the user's companies they've worked for or are working for.

```
<table id="Company"></table>
```

```
LoginRadiusSDK.getCompanies(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Company').appendChild(row);
    }
});
```

####Contact API
Load the user's contacts.

```
<table id="Contacts"></table>
```

```
LoginRadiusSDK.getContacts("0", function (data) {
     for(var i=0;i<data.Data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data.Data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Contacts').appendChild(row);
    }
});
```

####Event API
Load the user's event data.

```
<table id="Events"></table>
```

```
LoginRadiusSDK.getEvents(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Events').appendChild(row);
    }
});
```

####Following API
Load the user's following.

```
<table id="Following"></table>
```

```
LoginRadiusSDK.getFollowings(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Following').appendChild(row);
    }
});
```

####Group API
Load the user's groups.

```
<table id="Group"></table>
```

```
LoginRadiusSDK.getGroups(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Group').appendChild(row);
    }
});
```

####Like API
Load the user's like data.

```
<table id="Like"></table>
```

```
LoginRadiusSDK.getLikes(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Like').appendChild(row);
    }
});
```

####Mention API
Load the user's mentions.

```
<table id="Mention"></table>
```

```
LoginRadiusSDK.getMentions(function (data) {
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Text '+(i+1);
        col_2.innerHTML = data[i]['Text'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Mention').appendChild(row);
    }
});
```

####Message API
Send a Direct Message to a user.

```
<input type="text" id="receiver" />
<input type="text" id="subject" />
<input type="text" id="message" />
```

```
var to = document.getElementById('receiver').value;
var subject = document.getElementById('subject').value;
var message = document.getElementById('message').value;
LoginRadiusSDK.postMessage(to , subject , message,  function( postmessage){
    if(postmessage.isPosted == true){
        alert("Your status has been successfully posted to the given provider.");
    } else {
        alert("There is some error. Please try again");
    }
});

```

####Post API
Load the user's posts.

```
<table id="Post"></table>
```

```
LoginRadiusSDK.getPosts( function ( data){
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Message '+(i+1);
        col_2.innerHTML = data[i]['Message'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Post').appendChild(row);
    }
});
```

####Photo API
Load the user's photos from an album.

```
<table id="Photos"></table>
```

```
LoginRadiusSDK.getPhotos("put your albumID",function (data){
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Photos').appendChild(row);
    }
});
```

####Video API
Load the user's video files.

```
<table id="Video"></table>
```

```
LoginRadiusSDK.getVideos( function ( data){
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Name '+(i+1);
        col_2.innerHTML = data[i]['Name'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('Video').appendChild(row);
    }
});
```

####Status API
Status API can extract the user's status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn't work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

#####Fetching

Retrieving a list of status updates.

```
LoginRadiusSDK.getStatuses( function( data){
    for(var i=0;i<data.length;i++){
        var row = document.createElement('tr');
        var col_1 = document.createElement('td');
        var col_2 = document.createElement('td');
        col_1.innerHTML = 'Status '+(i+1);
        col_2.innerHTML = data[i]['Text'];
        row.appendChild(col_1);
        row.appendChild(col_2);
        document.getElementById('datatable').appendChild(row);
    }
});
```

#####Posting
Posting a new status update to the user's profile.

```
<input type="text" id="title" />
<input type="text" id="url" />
<input type="text" id="imageurl" />
<input type="text" id="status" />
<input type="text" id="caption" />
<input type="text" id="description" />
```

```
var status = document.getElementById('status').value;
var title = document.getElementById('title').value;
var url = document.getElementById('url').value;
var imageUrl = document.getElementById('imageurl').value;
var caption = document.getElementById('caption').value;
var description = document.getElementById('description').value;
if(status == "" || status == null) {
    alert("Status cant be null. Please enter some value into the status");
} else {
    LoginRadiusSDK.postStatus(title,url,status,imageurl,caption,description, function(data){
    if(data.isPosted == true){
    alert("Your status has been successfully posted to the given provider.");
    } else {
    alert("There is some error. Please try again");
    }
});
}
```
