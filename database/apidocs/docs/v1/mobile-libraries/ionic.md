Ionic Library
=====

------- 

[Get a Full Demo.](https://github.com/LoginRadius/ionic-sdk/tree/api-v1)


> ####Disclaimer

> This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.


####Download SDK
Get a copy of the Ionic SDK and demo projects [here](https://github.com/LoginRadius/ionic-sdk/tree/api-v1).

####Configure your Account
To get your app supported LoginRadius Ionic SDK, you need to slightly configure your LoginRadius user account.

- Enable cdn.loginradius.com in your site list  
Since this page is hosted in cdn.loginradius.com, please put it on your website list under Site Configuration.

![enter image description here](https://apidocs.lrcontent.com/images/jFZgGrOORkiy2GCZTXZV_Site-Configuration--LoginRadius-User-Dashboard_1872358a4455761bba1.33836918.png "")

- Add another parameter to your User Registration Email template  
By default your email template should look like this:

![enter image description here](https://apidocs.lrcontent.com/images/S9y0R7BRSlS2KIrH4fqj_Email-Templates--LoginRadius-User-Dashboard_1580458a4457d1e01d1.96850737.png "")

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
<script src="js/lrsdkservices.js"></script>
<script src="js/lrapiservices.js"></script>
```


** We also require a couple additional plugins: **
- [SafariViewControler](https://github.com/EddyVerbruggen/cordova-plugin-safariviewcontroller)
```
 cordova plugin add cordova-plugin-safariviewcontroller
```
- [Custom URL Scheme](https://github.com/EddyVerbruggen/Custom-URL-scheme)
```
cordova plugin add cordova-plugin-customurlscheme --variable URL_SCHEME=<LoginRadius Site Name>
```

- [Apache Cordova InAppBrowser](https://cordova.apache.org/en/latest/reference/cordova-plugin-inappbrowser/)'

```
 cordova plugin add cordova-plugin-inappbrowser
```

*If you using Cordova 4.0.0 or above version, you must install the [Apache Cordova Whitelist](https://cordova.apache.org/en/latest/reference/cordova-plugin-whitelist/) into your current project for Network Request.please click Whitelist link and follow the Cordova documentation.

```
cordova plugin add cordova-plugin-whitelist
```

In order to prevent looping of requests in android you will need to add the following line to your config.xml:

```
<preference name="CustomURLSchemePluginClearsAndroidIntent" value="true" />
```

In the index.html add to your head the following script which passes data from the hosted web page to your controller: 

```
<script>
	function handleOpenURL(url){
	 setTimeout(function() {
		 angular.element(document.getElementById('exampleController')).scope().lr.listen(url);
	 }, 0);
	};					  
</script>
```

In the index.html file we also fire many actions on buttons.

```
<div class="col text-center">
  
   <button class="button button-outline button-positive" ng-click="lr.login()">
    Login
   </button>
   <button class="button button-outline button-positive" ng-click="lr.register()">
    Register
   </button>
   <button class="button button-outline button-positive" ng-click="lr.social()">
    SocialLogin
   </button>
   <button class="button button-outline button-positive" ng-click="lr.forgotpassword()">
    ForgotPassword
   </button>
</div>
```
After add buttons in HTML, your must be add in your controllers.js some dependency injection.

```
.controller("ExampleController",['$scope','$cordovaInAppBrowser','APIService','SDKService', 
function ($scope,$cordovaInAppBrowser,APIService,SDKService){
}]);
```
When we click on the button they initialize the LoginRadius User registration Object:

```
 var lroptions = {};

     lroptions.apikey = '<LoginRadius API Key>';
     lroptions.siteName = '<LoginRadius Site Name>';
     lroptions.promptPasswordOnSocialLogin = '< true or false >';
	 lroptions.V2RecaptchaSiteKey = '<your recaptcha key>';
	 lroptions.facebooknative = false;
	 lroptions.googlenative = false;
	 lroptions.nativepath="Profile.html";
	 lroptions.googlewebid="<your Google Weub ID";
	 
	 $scope.lr = SDKService.getSDKContext(lroptions);
	 $scope.lrapi = APIService.getAPIContext();

  lroptions.callback = function(params) {

  //Handle the actions for: sociallogin, login, registration, and forgotpassword
  switch (params.action) {
	//Social login returns an accesstoken which can be used to pull user details including ID and UID for server side calls. 
	case "sociallogin":

	break;
	//Login returns an accesstoken which can be used to pull user details including ID and UID  for server side calls.	
	case "login":
	
	break;
	//Registration returns and email message and status which you can use to display messaging to your user. 
	case "registration":
 
	break;
	//Forgot password returns and email message and status which you can use to display messaging to your user. 
  case "forgotpassword":
	
	break;
  case "emailnotverfied":
	            
	break;
	default:
  break;
  }
 };
```
The above initialization requires options object with the following parameter:

|||
|----|----|
|apikey|Set to your LoginRadius API Key which you can get [here](https://loginradius.readme.io/get-api-key-and-secret).(required)|
|siteName|Your LoginRadius Site Name which you can get [here](http://support.loginradius.com/hc/en-us/articles/204614109-How-do-I-get-my-LoginRadius-Site-Name-).(required)|
|promptPasswordOnSocialLogin|After authentication for social login, it will prompt a password filling interface. By filling it, a user is also going to generate a traditional account besides his/her social account. If you required Prompt Password then put variables "true" else "false".(optional)|
|V2RecaptchaSiteKey|You can utilize your own Google ReCaptcha account to service your interfaces. This allows you to include additional domains and views analytics for your ReCaptcha. Follow the below steps to include your Google ReCaptcha account on your LoginRadius Registration interface. Create an Account on Google ReCaptcha:https://www.google.com/recaptcha/intro/index.html Create a ReCaptcha Site and add the domains that will be using this ReCaptcha. Add the V2RecaptchaSiteKey and V2Recaptcha parameters to your LoginRadius User Registration options object during interface initialization as per this documentation.(optional)|
|callback|Set to a function with a single parameter that will hold the response from the hosted registration.|
|facebooknative|if you want to enable facebook Native login then you need to pass 'lroptions.facebooknative= true;'|
|googlenative|if you want to enable google Native login then you need to pass 'lroptions.googlenative= true;'|
|nativepath|when you select native login option then you must be required where you want your profile data.like In demo default we get all data view in 'profile.html'.|
|inappbrowserlocation| if you want to show in inappbrowser location path with action bar then you must be add in inappbrowserlocation 'location=yes'.|

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
  <button class="button button-outline button-positive" ng-click="lr.register()">
 Register
 </button>
```
#####Social Login
Triggers the Social Login interface and will return to an action of "sociallogin" to the callback function.

 ```
<button class="button button-outline button-positive" ng-click="lr.social()">
SocialLogin
</button>
```
#####Login
Triggers the Login interface and will return with an action of "login" to the callback function.

 ```
<button class="button button-outline button-positive" ng-click="lr.login()">
Login
</button>
```
#####Forgot Password
Triggers the Forgot Password interface and will return to an action of "forgotpassword" to the callback function.

 ```
<button class="button button-outline button-positive" ng-click="lr.forgotpassword()">
ForgotPassword
</button>
```
####Native Login
#####Supported Devices
Currently, only Facebook is supported for native login with our SDK for Android and iOS.

#####Facebook Native Login
Before you can enable native login, you can also read and check instruction about
[Ionic Facebook Login](https://ionicthemes.com/tutorials/about/native-facebook-login-with-ionic-framework).

you must install the [Apache Cordova Facebook Plugin](https://github.com/Wizcorp/phonegap-facebook-plugin) into your current project for facebook native login.
To function properly, it is highly recommended you follow the [iOS installation guide](https://github.com/Wizcorp/phonegap-facebook-plugin/blob/master/platforms/ios/README.md) and the [Android installation guide](https://github.com/Wizcorp/phonegap-facebook-plugin/blob/master/platforms/android/README.md).


 ```
lroptions.apikey = "YOUR API KEY HERE";
//Enable native login if available.
lroptions.facebooknative = true;
```

<br>
* Facebook Configuration for Facebook Native Login<br>

Create a new Facebook App on the Facebook Developer site. You will need to create an Android application and get a Facebook Application ID: https://developers.facebook.com/

**Android**<br>

* Create a Development Key Hash<br>
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

* Now select My Apps and create a new app using "Add a New App".

* After the creation of App, Click on setting into left panel, Select Add Plateform and choose Android

* After generating KeyHash successfully, you need to setup below setting and fill the required fields e.g. Package Name & Class Name.
<br><br>
![enter image description here](https://apidocs.lrcontent.com/images/facebook_2670358e72c19acad92.91822294.png "")

**iOS**<br>
* After the creation of App, Click on setting into left panel, Select Add Plateform and choose iOS.
* Pass your project bundle ID, iPhone store ID and iPad store ID.

![enter image description here](https://apidocs.lrcontent.com/images/Capture-1_3102158e788489b8bf2.24336866.png "")


#####Google Native Login
Before you can enable native login, you can also read and check instruction about
[Ionic Google Login](https://ionicthemes.com/tutorials/about/google-plus-login-with-ionic-framework).

you must install the [Apache Cordova Google Plugin](https://github.com/EddyVerbruggen/cordova-plugin-googleplus) into your current project for google native login.

 ```
lroptions.apikey = "YOUR API KEY HERE";
//Enable native login if available.
lroptions.googlenative = true;
lroptions.googlewebid=""; // if you want to set google native login then you need to add your webClientId.
```

You need to set googlenative true to ebable the Google Native Login.

######Google Configuration for Google Native Login
**Android:-**<br>
* To configure Android, generate a configuration file [here](https://developers.google.com/mobile/add?platform=android&cntapi=signin). Once Google Sign-In is enabled Google will automatically create necessary credentials in Developer Console. There is no need to add the generated google-services.json file into your cordova project.
* After generating the configuration file, move to [Google Credentials Manager](https://console.developers.google.com/apis/credentials) and select your project name (Which you have created) in the header section. Now Select Credentials from the left panel and copy the Client ID available under project's **web application**.
<br><br>
![enter image description here](https://apidocs.lrcontent.com/images/Capture_758058e5ed837de044.65917717.png "")
* Now pass the  Client ID as
<br>
`
cordova plugin add cordova-plugin-googleplus --save --variable REVERSED_CLIENT_ID=myClintID
`
* After Installation set Client ID to LR options.
<br>
`
lroptions.googlewebid="<YOUR CLIENT ID>";
`

**iOS:-**<br>
* To get your iOS REVERSED_CLIENT_ID, generate a configuration file [here](https://developers.google.com/mobile/add?platform=ios&cntapi=signin). This GoogleService-Info.plist and just drag & drop in your project's "Resources" folder.
* The file contains the REVERSED_CLIENT_ID you'll need during installation and also copy CLIENT_ID from "GoogleService-Info.plist" and pass this on lroptions
<br>
`
lroptions.googlewebid="";
`

* Common Error messages:<br>
**12501 :**<br>
This is more commonly caused by an incorrect SHA1 being used to set up your project with Google. Make sure that the SHA1 of the build you are testing matches what you used in the Developer's Console.
<br>
**10 :**<br>
Make sure that the client id you're passing in to the plugin (for webClientId) is of type Web Application, not of type Android, iOS, or other.

Make sure that you're Android SDK is completely up to date (see the list posted in my initial response above).

Finally, make sure that the SHA1 you used to set up in the developer's console is the same one that ionic is using when it builds your app. If it's not, log in will not work.


####AfterLogin Redirection
1)After successful login user can start any HTML file where to call API and get data. In the demo, we get all data in Profile.html,  you must be configured in your HTML file in after successful redirection actions. in the demo, we perform many actions after redirection i the index.html file.

```
lroptions.callback = function(params) {

  //Handle the actions for: sociallogin, login, registration, and forgotpassword
  switch (params.action) {
//Social login returns an accesstoken which can be used to pull user details including ID and UID for server side calls. 
	case "sociallogin":
	sessionStorage.setItem('LRTokenKey', params.token);
  window.location = "Profile.html";
	break;
	//Login returns an accesstoken which can be used to pull user details including ID and UID  for server side calls.	
	case "login":
	sessionStorage.setItem('LRTokenKey', params.token);
	window.location = "Profile.html";
	break;
	//Registration returns and email message and status which you can use to display messaging to your user. 
	case "registration":
  var registermessage = "An email has been sent to " + params.email + ". Click on the verification link inclu  ded in this email.";
	//$(".messageinfo").html(registermessage);
	alert(registermessage);
	break;
	//Forgot password returns and email message and status which you can use to display messaging to your user. 
  case "forgotpassword":
	var forgotmessage = "An email has been sent to " + params.email + ". Click on the forgot password link incl  uded in this email.";
	//$(".messageinfo").html(forgotmessage);
	alert(forgotmessage);
	break;
  case "emailnotverfied":
	var emailnotver = "Email Verification message send successfully.Please verify your account.";
	alert(emailnotver);
	break;
	default:
  break;
  }
 };
```
2)After redirection in Profile.Html file, the user can easy call API and get all data.when a user comes profile.html file then starting a directives 'ng-init' and call a function for getting the user profile.

```
<ion-content ng-controller="ExampleController" padding="true" ng-init="loadUserprofile()">
```
3)Directives call controllers.js file function for getting user profile data.

```
$scope.loadUserprofile = function() {
$scope.lrapi.getUserprofile(function(userprofile) {
document.getElementById('userimage').src = userprofile.ImageUrl;
document.getElementById('ID').innerHTML = userprofile.ID;
document.getElementById('Provider').innerHTML = userprofile.Provider;
document.getElementById('username').innerHTML = (userprofile.FirstName || '') + ' ' + (userprofile.MiddleName || '') + ' ' + (userprofile.LastName || '');
document.getElementById('emailid').innerHTML = userprofile.Email && userprofile.Email.length > 0 ? userprofile.Email[0].Value : '';
document.getElementById('birthdate').innerHTML = userprofile.BirthDate;
document.getElementById('gender').innerHTML = userprofile.Gender;
document.getElementById('profileurl').innerHTML = userprofile.ProfileUrl;
 });
 }
```
4)We also implement a button for logout,when you click logout button that calls logout function those store in the controllers.js file.

```
<div class="col text-center">
<button class="button button-assertive"  ng-click ="Logout()">
Logout
</button>
```

Logout function in controllers.js file

```
$scope.Logout = function() {
window.location = "index.html";
 $scope.lr.sdkLogout();
}
```

####Alternate Language Support
The Ionic User registration system supports the following languages:

- English
- German
- French
- Spanish

Follow the below steps to change the Language for the SDK that you are using:

1. Search for "HostedDomain:" in lrsdkservices.js
2. update the Domain to the new Language URL as shown below

Language URLs:



- English - https://cdn.loginradius.com/hub/prod/Theme/mobile/index.html
- Spanish - https://cdn.loginradius.com/hub/prod/Theme/mobile-spanish/index.html
- German - https://cdn.loginradius.com/hub/prod/Theme/mobile-german/index.html
- French - https://cdn.loginradius.com/hub/prod/Theme/mobile-french/index.html

#### Customizing the Hosted page

Please contact LoginRadius support to get a copy of the hosted page files that are servicing the Ionic v1 SDK. 

Once you have a copy of the files you can deploy the hosted page to your servers and modify the HostedDomain location as shown in the languages section above. 

###Social APIs
After the access token is fetched, we can then safely access any of the Loginradius APIs as follows:

####User Profile API
Fetch the user's details.

```
 <p id="ID"></p>
```
```
 $scope.lrapi.getUserprofile(function (userprofile) {
    document.getElementById('ID').innerHTML = userprofile.ID;
});
```
####Album API
Fetch the user's photo albums.

```
 <table id="albums"></table>
```
```
 $scope.lrapi.getAlbums(function (data) {
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
 $scope.lrapi.getAudios(function (data) {
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
 $scope.lrapi.getCheckins(function (data) {
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
 $scope.lrapi.getCompanies(function (data) {
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
 $scope.lrapi.getContacts("0", function (data) {
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
 $scope.lrapi.getEvents(function (data) {
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
 $scope.lrapi.getFollowings(function (data) {
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
 $scope.lrapi.getGroups(function (data) {
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
 $scope.lrapi.getLikes(function (data) {
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
 $scope.lrapi.getMentions(function (data) {
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
$scope.lrapi.postMessage(to , subject , message,  function( postmessage){
    if(postmessage.isPosted == true){
        alert("Your status has been successfully posted to the given provider.");
    } else {
        alert("There is some error. Please try again");
    }
});
```
####Page API
Retrieve a liked Page based on PageID

```
 <p id="name"></p>
```
```
 $scope.lrapi.getPages("put your pageID", function(pages){
   document.getElementById('name').innerHTML = pages['Name'];
});
```
####Post API
Load the user's posts.

```
 <table id="Post"></table>
```
```
 $scope.lrapi.getPosts( function ( data){
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
 $scope.lrapi.getPhotos("put your albumID",function (data){
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
 $scope.lrapi.getVideos( function ( data){
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
 <table id="datatable"></table>
```
```
 $scope.lrapi.getStatuses( function( data){
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
title<input type="text" id="title" />
url<input type="text" id="url" />
imageurl<input type="text" id="imageurl" />
status<input type="text" id="status" />
caption<input type="text" id="caption" />
description<input type="text" id="description" />
<button type="submit" value="Submit" ng-click="post()">Post Status
</button>
```
```
$scope.post=function(){
var status = document.getElementById('status').value;
var title = document.getElementById('title').value;
var url = document.getElementById('url').value;
var imageUrl = document.getElementById('imageurl').value;
var caption = document.getElementById('caption').value;
var description = document.getElementById('description').value;
if(status == "" || status == null) {
    alert("Status cant be null. Please enter some value into the status");
} else {
    $scope.lrapi.postStatus(title,url,status,imageurl,caption,description, function(data){
    if(data.isPosted == true){
    alert("Your status has been successfully posted to the given provider.");
    } else {
    alert("There is some error. Please try again");
    }
});
}
}
```
