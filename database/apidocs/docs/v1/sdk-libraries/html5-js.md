HTML5 Library
===
---

HTML5 SDK provides an approach to access LoginRadius service with only HTML and Javascript Get a Full Demo

>Disclaimer
This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.


##Installation
In order to utilize the HTML5/JS SDK, you will either need to select HTML5 as your web technology on your LoginRadius admin-console or include $ui.is_access_token=true; in your interface script.

If you are implementing the full User Registration system then you can refer to the documentation found [here](/api/v1/user-registration/user-registration-getting-started )

##Importing Required Libraries
- To install LoginRadius - HTML5 SDK, run the following command in the bower Package.

####Bower Command
```
bower install html5-sdk
```



- Download the SDK from [Github](https://github.com/LoginRadius/HTML5-SDK).
- Include the SDK javascript file on your website.
####HTML

```
<script src="LoginRadiusSDK.2.0.1.js" type="text/javascript"></script>
```

##Getting the Access Token
Set a callback by passing a function into the setLoginCallback function.

####JavaScript
```
LoginRadiusSDK.setLoginCallback(Successfullylogin);
function Successfullylogin(){
    // implement LoginRadius SDK API functions in this function
}

```
If the request is a LoginRadius callback and the user has successfully logged in with the provider.

>Note
Call all LoginRadiusSDK API functions after invoking the callback function. Also, please make sure that all the API functions, including LoginRadiusCallback, are asynchronous.

##APIs
With the access token, we can now invoke any of these functions to grab data. However, this is dependent on the provider and permissions for each.

##Album
Fetch the user's photo albums.

####JavaScript

 ```
LoginRadiusSDK.getAlbums( function (albums) {
  // process returned albums object
});
```

##Audio
Load the user’s audio files.

####JavaScript
 ```
LoginRadiusSDK.getAudios( function ( audios){
  // process returned audios object
});
```
##Check In
Load the user’s checked in data.

####JavaScript
```
 LoginRadiusSDK.getCheckins( function ( checkins ){
  // process returned checkins object
});
```
##Company
Load the user’s companies they’ve worked for or are working for.

####JavaScript
```
 LoginRadiusSDK.getCompanies( function ( companies) {
  // process returned companies object
});
```
##Contact
Load the user’s contacts.

####JavaScript
```
 LoginRadiusSDK.getContacts(cursor , function( contacts){
  // process returned contacts object
});
```
##Event
Load the user’s event data.

####JavaScript
```
 LoginRadiusSDK.getEvents( function ( events){
// process returned events object
});
```
##Following
Load the user’s following.

####JavaScript
```
 LoginRadiusSDK.getFollowings( function( followings){
  // process returned followings object
});
```
##Group
Load the user’s groups.

####JavaScript
```
 LoginRadiusSDK.getGroups( function( groups){
  // process returned groups object
});
```
##Like
Load the user’s like data.

####JavaScript
```
 LoginRadiusSDK.getLikes( function ( likes){
  // process returned likes object
});
```
##Mention
Load the user’s mentions.

####JavaScript
```
 LoginRadiusSDK.getMentions( function( mentions){
// process returned mentions object
});
```
##Message
Send a Direct Message to a user.

####JavaScript
```
 LoginRadiusSDK.postMessage(to , subject , message,  function( postmessage){
  // process returned postmessage object
});
```
##Page
Retrieve a liked Page based on PageID

####JavaScript
```
 LoginRadiusSDK.getPage(pagename, function(pages){
// process returned pages object
});
```
##Post
Load the user’s posts.

####JavaScript
```
 LoginRadiusSDK.getPosts( function ( posts){
  // process returned posts object
});
```
##Photo
Load the user’s photos from an album.

####JavaScript
```
 LoginRadiusSDK.getPhotos(albumid , function (photos){
  // process returned photos object
});
```
##Status
Status API can extract the user’s status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn’t work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

##Fetching
Retrieving a list of status updates.

####JavaScript
```
 LoginRadiusSDK.getStatuses( function( statuses){
  // process returned photos object
});
```
##Posting
Posting a new status update to the user’s profile.

####JavaScript
```
 //All arguments are optional except for the status argument.
LoginRadiusSDK.postStatus(title, url, imageUrl, status, caption, description, function( poststatus) {
  // process returned post status object
});
```
##User Profile
The User Profile API pulls all available user data. In this example, we just pull all fields that are Strings and not null. The LoginRadius User Profile object contains a large number of fields, and they can be manually retrieved from any JavaScript object.

####JavaScript
```
 LoginRadiusSDK.getUserprofile( function( profile) {
  // process returned profile object
});
```
##Video
Load the user’s video files.

####JavaScript
```
 LoginRadiusSDK.getVideos( function ( videos){
  // process returned videos object
});
```
##Full Example
This example includes the login script and the SDK to grab user profile data and then populates the profile div. Feel free to copy and paste the example to your own website!

####HTML
```
 <!DOCTYPE html>
<html>
<head>
    <!-- Your head content -->
</head>
<body>

    <!-- Your page content -->

    <!-- Profile div to be filled with user profile data -->
    <div id="profile"></div>

    <!-- Place the div that contains the login interface somewhere on your page. -->
    <div id="interfacecontainerdiv" class="interfacecontainerdiv"></div>

    <!-- Scripts for LoginRadius can be placed before the closing body tag. -->
    <script src="https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js"></script>
    <script src="LoginRadiusSDK.2.0.1.js"></script>

    <!-- We have to initialize the login interface. You will need to supply your API key. -->
    <script type="text/javascript">
        var options={};
        options.login=true;
        LoginRadius_SocialLogin.util.ready(function () {
            $ui = LoginRadius_SocialLogin.lr_login_settings;
            $ui.interfacesize = "";
            $ui.apikey = "<LoginRadius-API-key>";
            $ui.is_access_token = true;
            $ui.callback=window.location.href;
            $ui.lrinterfacecontainer ="interfacecontainerdiv";
            LoginRadius_SocialLogin.init(options);  });
    </script>

    <!-- We can register a callback on a successful login and then perform any API calls. -->
    <script type="text/javascript">
        LoginRadiusSDK.onlogin = SuccessLogin;
        function SuccessLogin() {
            LoginRadiusSDK.getUserprofile(function (data) {
                document.getElementById("profile").innerHTML = JSON.stringify(data);
            });
        };
    </script>
</body>
</html>
```
Reference
Please find the reference manual [Here](https://docs.lrcontent.com/apidocs/ref/html5/index.html)