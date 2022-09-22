ASP.Net Core Library
===
---
[Get a Full Demo](https://github.com/LoginRadius/dot-net-core-sdk)

>Disclaimer
This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.


##Installation
This documentation presumes you have worked through the client-side implementation to setup your LoginRadius User Registration interfaces that will service the initial registration and login process. Details on this can be found in the [getting started guide](/api/v1/getting-started/introduction).

###Importing Required Libraries

- To install LoginRadius - User Registration SDK, run the following command in the NuGet Package Manager Console.

**NuGet Command**

```
PM> Install-Package LoginRadiusSDK.NETCore
```
or 
- To install LoginRadius -  Download the User Registration SDK from [Github](https://github.com/LoginRadius/dot-net-core-sdk)

- & Copy LoginradiusCoreSdk.dll and LoginradiusCoreSdk.pdb files into your References directory of your project.


###Quickstart Guide
The User Registration system relies on two identifiers which you can retrieve as follows:

Create a LoginRadiusCallback object to get LoginRadius access token.

**C#**

```
LoginRadiusCallback callback = new LoginRadiusCallback();

```
If the request is a LoginRadius callback and the user has successfully logged in and you can pass the token returned in the User Registration login response to the code behind. You can use a javascript function in the login and social login onSuccess functions. Additional details on setting up and configuring your interface are available [here](/api/v1/user-registration/user-registration).

###JavaScript
 ```
function redirect(token) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "/callback";
    var _token = document.createElement("input");
    _token.type = "hidden";
    _token.name = "token";
    _token.value = token;
    form.appendChild(_token);
    document.body.appendChild(form);
    form.submit();
}

LoginRadiusRaaS.init(raasoption, 'sociallogin', function(response) {
    // On Success this callback will call
    // response will be string as token
    redirect(response);
  
}, function(errors) {
    // on failure this function will call ‘errors’ which is an array of errors with message and description and error code.
    // error will be returned in this method
}, "social-login-container");

```
>On Success
The above function success will return a response as ’{ token: ’<token>’}’. You can use this response (Token) can be passed to LoginRadiusCallback object to fetch LoginRadius Access Token to get the user profile data using LoginRadius.Net SDK.
Verify on your callback page that this is a valid LoginRadius Callback and pull in the user's details

**C#**
 
```
 if (!string.IsNullOrEmpty(HttpContext.Request.Form["token"]))
            {
                var lrCallback = new LoginRadiusCallback();
                var accesstoken = lrCallback.GetAccessToken("Your Loginradius API Secret", HttpContext.Request.Form["token"]);
                
               
                //create client with the help of access token as parameter
                var client = new LoginRadiusClient(accesstoken);
                //create object to execute user profile api to get user profile data.
                var userprofile = new UserProfileApi();
                //To get ultimate user profile data with the help of user profile api object as parameter.
                // and pass "LoginRadiusUltimateUserProfile" model as interface to map user profile data.
                var userProfileData = client.GetResponse<LoginradiusCoreSdk.Models.UserProfile.RaasUserprofile>(userprofile);

				
				HttpContext.Session.SetString("access_token", Convert.ToString(accesstoken.access_token));
				HttpContext.Session.SetString("Uid", userProfileData.Uid);
				HttpContext.Session.SetString("ID", userProfileData.ID);
                
            }
```
Finally, Set the following parameters in your web.config to be used with User Registration APIs. You can get the LoginRadius Key and Secret with [this document](/api/v1/getting-started/get-api-key-and-secret) and your Site Name with this [document](https://support.loginradius.com/hc/en-us/articles/204614109-How-do-I-get-my-LoginRadius-Site-Name-)


###App credentials 
**appsettings.json**
```
"loginradius": {
    "apisecret": "LoginRadius secret key",
    "apikey": "LoginRadius API Key",
    "appname": "LoginRadius APP Name "
}
```
or 
**C#**
```
using LoginradiusCoreSdk.Entity.AppSettings;
LoginRadiusAppSettings.AppSettingInitialization("put your appKey here", "put your appsecret here", "put your appname here");
            
```


------- 

###User APIs
Create the LoginRadius User APIs object that processes​ the user API requests.

**C#**
```
private readonly LoginRadiusUserProfileEntity _lrUserApisEntity = new LoginRadiusUserProfileEntity();
```
###Create User
Create a new User Account in your LoginRadius Cloud Directory bypassing email verification. This will return a User Profile Object or a LoginRadius Exception in case of failure. 

[Try This](/api/v1/user-registration/user-create)


**C#**
```
// Object of User model class that sets the information of the new user
User newUser = new User {
FirstName = "First Name",
LastName = "Last Name",
Gender = "M/F",
EmailId = "Email@Email.com",
Password = "Password",
BirthDate = "mm-dd-yyyy"
};
// Pass User class object(newUser) to CreateUser API.
var response = _lrUserApisEntity.CreateUser(newUser);

```
###Register User
Create a new user account in your LoginRadius Cloud Directory. 

[Try This](/api/v1/user-registration/user-registration)

**C#**
```
UserRegistrationModel newUser = new UserRegistrationModel
{
  FirstName = "First Name",
  LastName = "Last Name",
  Gender = "M/F",
  EmailId = "Email@Email.com",
  Password = "Password",
  BirthDate = "mm-dd-yyyy"
 };

// Pass User class object(newUser) to RegisterUser API.
var response = _lrUserApisEntity.RegisterUser(newUser);
```
###Edit User
Update a user's details by passing in a User Object. 

[Try This](/api/v1/user-registration/user-update)

**C#**
                
```
User updatedUser = new User
{
  FirstName = "First",
  LastName = "Last",
  Gender = "M",
  BirthDate = "10-12-1985"
};

// Pass User class object(newUser) to Edit User API.
var response = _lrUserApisEntity.UpdateUser(HttpContext.Session.GetString("ID"), updatedUser);
```

###Change Password
Update the users' password by passing in the existing password. 

[Try This](/api/v1/user-registration/account-password-change)

**C#**
```
var response = _lrUserApisEntity.ChangePassword(HttpContext.Session.GetString("ID"), "Old Password"  ,"new Password");
```

###Set Password
Sets the users password 

[Try This](/api/v1/user-registration/account-password-set)

**C#**
```
var response = _lrUserApisEntity.SetPassword(HttpContext.Session.GetString("ID"), "Password");
```
###Get User
Used to retrieve a copy of user details and has one supported overload. 

[Try This](/api/v1/social-login/user-profile)

**C#**
```
var response = _lrUserApisEntity.GetUser(HttpContext.Session.GetString("ID"));
```
You can also retrieve this based on user credentials. 

[Try This](/api/v1/user-registration/user-authentication)

C#
```
var response = _lrUserApisEntity.AuthenticateUser("Email Address", "Password");
```
You can also retrieve the user profile by the following method that accepts email address.
[Try This](/api/v1/user-registration/user-profile-by-email)


**C#**
```
var response = _lrUserApisEntity.GetUserbyEmail("Email Address");
```
###Get Hashed Password
Retrieves the password hash for a user.

 [Try This](/api/v1/user-registration/account-password-get)

**C#**
```
var response = _lrUserApisEntity.GetHashPassword(HttpContext.Session.GetString("ID"));
```
###Delete User with Email Confirmation:
Remove a user's account from LoginRadius system. For security and misclick concerns, it will send a delete confirmation email to user's email inbox to ask the ​user to confirm the action.

[Try This](/api/v1/user-registration/user-delete-with-email-confirmation)

**C#**
 ```
var response = _lrUserApisEntity.DeleteUser(HttpContext.Session.GetString("ID"),"Link to send out confirmation","Email Template");
```
###VerifyEmail
This api is used to verify your email.

**C#**
```
LoginRadiusClientAuthenticationEntity _LoginRadiusClientAuthenticationEntity = new LoginRadiusClientAuthenticationEntity();
var response  = _LoginRadiusClientAuthenticationEntity.VerifyEmail(vtoken,url,welcomeEmailTemplate);
```


###Check Email Availability
Checks for the existence of the specified email in your Cloud Directory. 

[Try This](/api/v1/user-registration/user-email-availability)

**C#**
```
var response = _lrUserApisEntity.CheckUserEmail("Email Address to check");
```
###Account APIs
Create the Account Entity API object that processes​ the account API requests.

**C#**
```
private readonly LoginRadiusAccountEntity _lrAccountApisEntity = new LoginRadiusAccountEntity();
```
###Create User Registration Profile
Creates a traditional email and password login account for the specified Account ID. 

[Try This](/api/v1/user-registration/user-create-registration-profile)

**C#**
```
var response = _lrAccountApisEntity.UserCreateRegistrationProfile(HttpContext.Session.GetString("Uid"), "Email", "Password");
```
###Get Account
Gets a list of the User Registration Profiles for the Account ID. 

[Try This](/api/v1/user-registration/account-profiles)

**C#**
```
var response = _lrAccountApisEntity.GetAccountProfiles(HttpContext.Session.GetString("Uid"));
```
###Set Account Status
Disable or enable  an account by passing in true or false.

[Try This](/api/v1/user-registration/account-block-unblock)

**C#**
```
var response = _lrAccountApisEntity.SetAccountStatus(HttpContext.Session.GetString("Uid"), true / false);
```
###Delete Account
Deletes all of the users associated with this account. 


[Try This](/api/v1/user-registration/account-delete)

**C#**
```
var response = _lrAccountApisEntity.DeleteAccount(HttpContext.Session.GetString("Uid"));
```
###Delete Account with Email Confirmation
Deletes the User account with email confirmation.

[Try This](/api/v1/user-registration/account-delete-with-email-confirmation)


**C#**
```
var response = _lrAccountApisEntity.DeleteAccountWithEmailConfirmation(HttpContext.Session.GetString("Uid"),"Delete confirmation link","template");
```
###Change Account Password
Change the accounts password based on the previous password.

[Try This](/api/v1/user-registration/account-password-change)

**C#**
```
var response = 
_lrAccountApisEntity.ChangeAccountPassword(HttpContext.Session.GetString("Uid"),"old password","New Password");
```
###Get Account Password
Retrieve the accounts encrypted hashed password based on account 

[Try This](/api/v1/user-registration/account-password-get)


**C#**
```
var response = _lrAccountApisEntity.GetAccountPassword(HttpContext.Session.GetString("Uid"));
```
###Set Account Password
Set a new password for the specified account. It is meant to be used as an admin feature or post authentication.

[Try This](/api/v1/user-registration/account-password-set)

**C#**
```
var response = _lrAccountApisEntity.SetAccountPassword(HttpContext.Session.GetString("Uid"),"Password");
```
###Check Account UserName Availability
Checks for the requested username exists or not on your site.

[Try This](/api/v1/user-registration/account-username-check-client-server)

**C#**
```
var response = _lrAccountApisEntity.CheckAccountUsername("UserName to be check");
```
###Change Account UserName
Changes the account's username by account ID.

[Try This](/api/v1/user-registration/account-username-change)

**C#**
```
var response = _lrAccountApisEntity.ChangeAccountUsername(HttpContext.Session.GetString("Uid"),"Current UserName","New UserName");
```
###Set Account UserName
Sets account username.

[Try This](/api/v1/user-registration/account-username-set)

**C#**
```
var response = _lrAccountApisEntity.SetAccountUsername(HttpContext.Session.GetString("Uid"),"New UserName");

```
###Email Add/Remove
Add or Remove additional emails to a user's account.

[Try This](/api/v1/user-registration/user-email-add-remove)

**C#**
```
var response = _lrAccountApisEntity.UserEmailAddOrRemove(HttpContext.Session.GetString("Uid"),"Action(Add or remove)","Email","Email Type");
```
###Link Social Account
Links the specified Social Provider account with the Account.

[Try This](/api/v1/user-registration/account-link)

**C#**
```
var response = _lrAccountApisEntity.LinkAccount(HttpContext.Session.GetString("Uid"), "Provider Name", "Provider ID");
```
>Info
- Providers name should be the lowercase name of the provider ie. facebook
- Provider ID should be the user ID of this user's​ account which can be retrieved with the User Profile API.

###Unlink Social Account
Unlinks the specified Social Provider account with the Account. 

[Try This](/api/v1/user-registration/account-unlink)

**C#**
```
var response = _lrAccountApisEntity.UnlinkAccount(HttpContext.Session.GetString("Uid"), "Provider Name", "Provider ID");
```
>-Providers name should be the lowercase name of the provider ie. facebook
-Provider ID should be the user ID of this user's account which can be retrieved with the User Profile API.

###Get Password Forgot Token
Retrieves a forgot password token so you can manually pass into the reset password page and reset someone's password.

[Try This](/api/v1/user-registration/user-password-forgot-token)


**C#**
```
var response = _lrAccountApisEntity.GetPasswordForgotToken("Email Address");
```
###Resend User Verification Email
Resends verification email to specified user.

[Try This](/api/v1/user-registration/user-verification-email-resend)

**C#**
```
var response = _lrAccountApisEntity.ResendUserVerificationEmail("Email Address","Link","Email template Name");
```
##Social APIs
The following documentation section presumes you have worked through the client-side implementation to setup your LoginRadius Social interfaces, Details on this can be found in the Social Login getting started guide.

Create client object (by passing the accessToken fetched previously) to make a request to get user data.

**C#**
```
LoginRadiusClient client = new LoginRadiusClient(HttpContext.Session.GetString("access_token"));
```
With the access token, we can now invoke any of the following functions to grab data. However, this is dependent on the provider and permissions for each.

###User Profile
The UserProfileAPI pulls all available user data. In this example, we just pull all fields that are Strings and not null. The LoginRadiusUltimateUserProfile object contains a large number of fields, and they can be manually retrieved like any C# object.

Reference:

**C#**
```
UserProfileApi userprofile = new UserProfileApi();
 var userProfileData = client.GetResponse <LoginRadiusUltimateUserProfile>(userprofile);
 //userProfileData.Id
 //userProfileData.Provider
 //userProfileData.FirstName
 //userProfileData.LastName
```
###Album
Fetch the user’s photo albums.

Reference:

**C#**
```
var userAlbums = new AlbumApi();
var userAlbumData = client.GetResponse<List<LoginRadiusAlbum>>(userAlbums);
```
###Audio
Load the user’s audio files.

Reference:


**C#**
```
AudioApi audios = new AudioApi();
var userAudios = client.GetResponse<List<LoginRadiusAudio>>(audios);
```
###Check In
Loads the user’s checked in data.

Reference:


**C#**
```
var checkIn = new CheckInApi();
var userCheckInData = client.GetResponse<List<LoginRadiusCheckIn>>(checkIn);
```
###Company
Load the user’s companies they’ve worked for or are working for.

Reference:


**C#**
```
var company = new CompanyApi();
var userCompanyData = client.GetResponse<List<LoginRadiusCompany>>(company);
```
###Contact
Load the user’s contacts.

Reference:


**C#**
```
var userContacts = new ContactApi();
var userContactsData = client.GetResponse<LoginRadiusContact>(userContacts);
```
###Event
Load the user’s event data.

Reference:


**C#**
```
var userEvent = new EventApi();
var userEventData = client.GetResponse<List<LoginRadiusEvent>>(userEvent);
```
###Following
Load the user’s following.

Reference:


**C#**
```
var following = new FollowingApi();
var userFollowingData = client.GetResponse<List<LoginRadiusFollowing>>(following);
```
###Group
Load the user’s groups.

Reference:


**C#**
```
var userGroups = new GroupApi();
var userGroupsData = client.GetResponse<List<LoginRadiusGroup>>(userGroups);
```
###Like
Load the user’s like data.


**C#**
```
var userLikes = new LikeApi();
var userLikeData = client.GetResponse<List<LoginRadiusLike>>(userLikes);
```
###Mention
Load the user’s mentions.


**C#**
```
MentionApi mentions = new MentionApi();
var userMentions = client.GetResponse<List<LoginRadiusMention>>(mentions);
```
###Message
Send a direct message to another user.

**C#**
```
MessageApi sendMessage = new MessageApi
{
    To = "<User_ID>",//User that you want to send a message to retrieved from the contacts API.
    Subject = "<Messages_Subject>",
    Message = "<Messages_Body>"
};

var response = client.GetResponse<LoginRadiusPostResponse>(sendMessage);
```
###Page
Load the user’s page data.


**C#**
```
PageApi pages = new PageApi("Page_Name");
var userpages = client.GetResponse<LoginRadiusPage>(pages);
```
###Post
Load the user’s post


**C#**
```
var userPosts = new PostApi();
var userPostsData = client.GetResponse<List<LoginRadiusPost>>(userPosts);
```
###Photo
Load the user’s photos from an album.


**C#**
```
var userPhotos = new PhotoApi(albumId);
var userPhotosData = client.GetResponse<List<LoginRadiusPhoto>>(userPhotos);
```
###Status
Status API can extract the user’s status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn’t work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

#####Fetching

Retrieving a list of status updates.


**C#**
```
var userStatus = new StatusApi();
var userStatusData = client.GetResponse<List<LoginRadiusStatus>>(userStatus);
```
###Posting
Posting a new status update to the user’s profile.

**C#**
```
StatusUpdateApi statusUpdate = new StatusUpdateApi
{
//fill fields to update
 Title = title,
 Status = status,
 Imageurl = ImageUrl,
 Url = url,
 Caption = caption,
 Description = description
};
                
var response = client.GetResponse<LoginRadiusPostResponse>(statusUpdate);

```
###Video
Load the user’s video files.


**C#**

```
var userVideos = new VideoApi();
var userVideosData = client.GetResponse<LoginRadiusVideo>(userVideos);
Using Next Cursor
```
**C#**
```
var userVideos = new VideoApi(nextcursor: "0");
//Next Cursor is the value of next data set to be fetched.
var userVideosData = client.GetResponse<LoginRadiusVideo>(userVideos);
```
##Custom Object APIs
These APIs are used to manage a custom object for the user and relies on the Custom Object Entity. If you are unsure of your Object ID you can reach out to the support team for details on this. Create the User Entity object to service these requests.

Create the LoginRadius Custom Object APIs object that processes​ the custom object API requests.

**C#**
```
private readonly LoginRadiusCustomObjectEntity _lrCustomObjectApisEntity = new LoginRadiusCustomObjectEntity();

```
###Get Custom Object
Use these API to get the Custom Object for a User it has several​ available overloads.

The first​ overload is retrieving based on the Object ID

[Try This](/api/v1/user-registration/get-object-by-objectid)

**C#**
```
var response = _lrCustomObjectApisEntity.GetCustomObjectbyObjectId("Custom objectID");
```
You can retrieve the Custom Object for a specific user based on Account ID and Object ID.

[Try This](/api/v1/user-registration/get-object-by-accountid)

**C#**
```
var response = _lrCustomObjectApisEntity.GetCustomObjectbyAccountId(HttpContext.Session.GetString("Uid"), "ObjID");
```
You can retrieve the Objects for multiple Account IDs.

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

**C#**
```
List<string> lAccountIds = new List<string>();
lAccountIds.Add(HttpContext.Session.GetString("Uid"));
lAccountIds.Add("Account ID 2");

var response = _lrCustomObjectApisEntity.GetCustomObjectbyMultipleAccountId(lAccountIds, "ObjID");
```
You can get the Objects based on a custom XML query. 

[Try This](/api/v1/user-registration/custom-objects-by-query)

**C#**
```
var response = _lrCustomObjectApisEntity.GetCustomObjectbyQuery("ObjID", "query", "cursor");

```

>-Cursor allows you to page through large data sets.


###Get All Custom Objects
Retrieve a list of all of the custom objects from the LoginRadius Cloud Directory. 

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)


**C#**
```
var response = _lrCustomObjectApisEntity.GetAllCustomObject("Custom objectID","Cursor value");
```
###Delete Custom Object
Deletes the Custom Object for the specified account. 

[Try This](/api/v1/user-registration/delete-custom-object-set)

**C#**
```
var response = _lrCustomObjectApisEntity.DeleteCustomObject(HttpContext.Session.GetString("Uid"), "ObjID",isblock(true/false));
```
###Get Custom Object Statistics
Gets information on the specified custom object. 
[Try This](/api/v1/user-registration/custom-object-stats)

**C#**
```
var response = _lrCustomObjectApisEntity.GetCustomObjectStats("ObjID");
```
###Upsert Custom Object
Creates or Updates the Custom Object. 

[Try This](/api/v1/user-registration/custom-object-create)


**C#**
```
var response= _lrCustomObjectApisEntity.UpsertCustomObject(HttpContext.Session.GetString("Uid"), "ObjID", CustomObject);
```
>CustomObject should be valid object.


###Handle Exception
LoginRadius SDK handles the exceptions that are thrown by the APIs and returns an error object that contains the detail of exception including the error codes of LoginRadius. You may deserialize this object for additional details.

**C#**
```
try
{
// API Calls goes here.
}
catch (LoginRadiusException exception)
{
// Exception handling goes here or Deserialize exception object.
}

```
###Demo
We have configured a sample ASP.net project with extended social profile data, push notifications, and friend invites​ examples.
You can get a copy of our demo project at [GitHub](https://github.com/LoginRadius/dot-net-core-sdk).
