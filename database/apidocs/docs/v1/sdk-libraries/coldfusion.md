Coldfusion Library
===
---
[Get a Full Demo](https://github.com/LoginRadius/coldfusion-sdk)

>Disclaimer

>This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

This document contains information and examples regarding the LoginRadius Coldfusion SDK.

{{table_container}}

##Installation
###Importing Required Libraries


- Download the SDK from [Github](https://github.com/LoginRadius/coldfusion-sdk).
- Copy the SDK component file (LoginRadiusSDK.cfc) to your project directory.

##Quickstart Guide
###Setup
Pass the token returned in the User Registration login/registration response to the code below. You can use a javascript function in the login and social login onSuccess functions. Additional details on setting up and configuring your interface is available.

```
function redirect(token) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "<YOUR_DOMAIN>"; //This is you callback page where token is retrieved.
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

On your callback page, follow the instructions to implement loginradius sdk from the IMPLEMENTATION section below.

###Implementation
Create the LoginRadius Coldfusion component Object

```
<cfset SdkObject = createObject("component","sdk.loginradiussdk").init(
        raas_api_key = "APIKEY",
        raas_api_secret = "APISECRET"
      )>

```

Call the function loginradiusExchangeAccessToken to get a LoginRadius accesstoken and expiry time using LoginRadius Token

[Try This](/api/v1/social-login/access-token)

 ```
<cftry>
<cfset accessTokenResult = SdkObject.loginradiusExchangeAccessToken(token)>
  <cfset access_token ='#accessTokenResult.access_token#'>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>
```
Call the User Profile API in order to obtain the ID and UID of the user for use with the User Registration APIs.

###APIs
With the LoginRadius access token, ID, and UID, we can now invoke any of the following functions to retrieve user data or call the User Registration APIs.

>Please use valid JSON where JSON is required. You can use the following library for handling JSON: 
https://github.com/bennadel/JsonSerializer.cfc


###Authenticate User
Used to retrieve a copy of user details 

[Try This](/api/v1/user-registration/user-authentication)

 ```
<cftry> 
  <cfset ProfileResult = SdkObject.loginradiusAuthenticateUser (username/EmailID, password)> 
    <cfcatch type = "LoginRadiusException"> 
	    <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
</cftry> 
 ```

###Add/Remove Email
Add or remove a particular email from one user's account.

[Try This](/api/v1/user-registration/user-email-add-remove)


```
<cftry>
<cfset ProfileResult = SdkObject.loginradiusAddRemoveEmail (accountid, action, emailid, emailtype)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Set Username
Set user name by Account Id.

[Try This](/api/v1/user-registration/account-username-set)

```
<cftry>
<cfset statusResult = SdkObject.loginradiusSetUsername (accountid, newusername)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Block/unblock User
Block or un-block a user using the users unique UserID (UID).

[Try This](/api/v1/user-registration/account-block-unblock)

```
<cftry>
<cfset statusResult = SdkObject.loginradiusSetStatus (uid, isblock)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

###Create New User
Create a new User in your LoginRadius Cloud Directory bypassing email verification. This will return a User Profile Object or a LoginRadius Exception. 

[Try This](/api/v1/user-registration/user-create)

```
<cftry> 
   <cfset createUserResult = SdkObject.loginradiusCreateUser (params)> 
     <cfcatch type = "LoginRadiusException"> 
       <cfset message ='#cfcatch.message#'> 
     </cfcatch> 
 </cftry> 

```

params- This should have a valid JSON object with the userprofile data passed in.

Example:


```
 params = "{ 'emailid' : 'example@domain.com', 'password' : 'xxxxxxxxxxx', 'firstname' : 'firstname', 'lastname' : 'last name',  'gender' :'m', 'birthdate' : 'MM-DD-YYYY'}"

```

###Register User
Create a new user in your LoginRadius Cloud Directory. 

[Try This](/api/v1/user-registration/user-registration)


```
<cftry> 
  <cfset userRegistrationResult = SdkObject.loginradiusUserRegistration (params)> 
 	<cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```

params- This should have a valid JSON object with the userprofile data passed in.

Example:


```

 params = "{ 'emailid' : 'example@domain.com', 'password' : 'xxxxxxxxxxx', 'firstname' : 'firstname', 'lastname' : 'last name',  'gender' :'m', 'birthdate' : 'MM-DD-YYYY'}"

```

###Account Password Get
Retrieves the password hash from the user profile associated with the user account.. 

[Try This](/api/v1/user-registration/account-password-get)

```
<cftry> 
  <cfset hashedPasswordResult = SdkObject.loginradiusGetHashedPassword ( accountid )> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry> 

```

###Change Password
Update the users password by passing in the existing password. 

[Try This](/api/v1/user-registration/account-password-change)

```
<cftry> 
  <cfset changePasswordResult = SdkObject.loginradiusChangePassword (userid, params)> 
  <cfcatch type = "LoginRadiusException"> 
   	<cfset message ='#cfcatch.message#'> 
  </cfcatch> 
 </cftry>

```

params- This should have a valid JSON object with the Update password data passed in.

Example:


```

 params = { 'oldpassword' = 'xxxxxxxxx', 'newpassword' = 'xxxxxxxxxxx' }

```

###Set Password
Sets the users password 

[Try This](/api/v1/user-registration/account-password-set)


```
<cftry> 
  <cfset setPasswordResult = SdkObject.loginradiusSetPassword (accountid, params)>
</cftry>

```

params- This should have a valid JSON object with the password data passed in.

Example:


```

 params = { 'password' = 'xxxxxxxxx' }


```

###Get Profile Data using User id
Retrieves profile data using users unique user id.

[Try This](/api/v1/social-login/user-profile)


```
<cftry>
<cfset ProfileResult = SdkObject.loginradiusGetProfileData (id)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Get User Profile Data by Email
Retrieves profile data using email address.

[Try This](/api/v1/user-registration/user-profile-by-email)

```
<cftry>
<cfset ProfileResult = SdkObject.loginradiusGetProfileDataByEmail (emailid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

###Edit User
Update a users details by passing in a User Object. 

[Try This](/api/v1/user-registration/user-update)

```

 <cftry> 
  <cfset uditProfileResult = SdkObject.loginradiusUpdateUserProfile (userid, params)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```

params- This should have a valid JSON object with the user profile data passed in.

Example:


```

 params = "{'firstname' : 'first name', 'lastname' : 'last name', 'gender' : 'm', 'birthdate' : 'MM-DD-YYYY' }"

```

The Account APIs manage all interactions with the User Account which may have multiple User Profiles associated with it. It is based on the Account ID(UID)

###Create User Registration Profile
Gets a list of the User Registration Profiles for the Account ID. 

[Try This](/api/v1/social-login/user-profile)

```
<cftry> 
  <cfset getAccountsResult = SdkObject.loginradiusGetAccounts (accountid)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```


###Update Account Profile
Modify/Update details of an existing user.

[Try This](/api/v1/user-registration/account-update)

```
<cftry>
<cfset uditProfileResult = SdkObject.loginradiusUpdateAccountProfile (accountId, params)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Update Profile By Access Token
Modify/Update details of an existing user.

[Try This](/api/v1/user-registration/user-update-by-access-token)

```
<cftry>
<cfset uditProfileResult = SdkObject.loginradiusUpdateProfileByAccessToken (access_token, params, emailverificationurl, template)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```


###Create User Registration Profile

Creates a traditional email and password login account for the specified Account ID. 

[Try This](/api/v1/user-registration/user-create-registration-profile)

```
<cftry> 
   <cfset createRaasProfileResult = SdkObject.loginradiusCreateRegistrationProfile (params)> 
   <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
    </cfcatch> 
 </cftry> 

```

params- This should have a valid JSON object with the Traditional user data passed in.

Example:


```

 params = "{ 'accountid' : 'xxxxxxxxx', 'password' : 'xxxxxxxxxxx', 'emailid' : 'example@domain.com' }"

```


###Delete Account with email confirmation
Delete user using the users unique UserID (UID).

[Try This](/api/v1/user-registration/account-delete-with-email-confirmation)


```
<cftry>
<cfset deleteUserResult = SdkObject.loginradiusDeleteAccountWithEmailConfirmation ( uid, deleteuserlink, template)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Delete Account
Delete user using the users unique UserID (UID).

[Try This](/api/v1/user-registration/account-delete)


```
<cftry>
<cfset deleteUserResult = SdkObject.loginradiusDeleteAccount (uid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Resend Verification Email
Resend verification email

[Try This](/api/v1/user-registration/user-verification-email-resend)


```
<cftry>
<cfset deleteUserResult = SdkObject.loginradiusResendVerificationEmail (email, ink, template)>
<cfcatch type = "LoginRadiusException"> 
cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

###Access Token Invalidate
Used to invalidate access token.

[Try This](/api/v1/user-registration/token-invalidate)

```
<cftry>
<cfset deleteUserResult = SdkObject.loginradiusTokenInvalidate (access_token)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

###Token Validate
Used to validate access token.

[Try This](/api/v1/user-registration/token-validate)

```
<cftry>
<cfset deleteUserResult = SdkObject.loginradiusTokenValidate (access_token)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

###Get Active Session Detail
Retrieve Active Session Details by Access Token.

[Try This](/api/v2/user-registration/get-active-session-details)

```
 <cftry>
<cfset deleteUserResult = SdkObject.loginradiusGetActiveSessionDetail (access_token)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

###Link Social Account
Links the specified Social Provider account with the Account.

[Try This](/api/v1/user-registration/account-link)


```
<cftry> 
  <cfset linkingResult = SdkObject.loginradiusAccountLink (params)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
   </cfcatch> 
 </cftry>

```

params- This should have a valid JSON object with the account linking data passed in.

Example:


```
params = "{ 'accountid' : 'UID of Account', 'provider' : 'Social Provider Name', 'providerid':'ID of Social Profile' }"

```


###Unlink Social Account
Unlinks the specified Social Provider account with the Account.

[Try This](/api/v1/user-registration/account-unlink)

```
<cftry> 
  <cfset unlinkingResult = SdkObject.loginradiusAccountUnLink (params)> 
   <cfcatch type = "LoginRadiusException"> 
   		<cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```

params- This should have a valid JSON object with the account unlinking data passed in.

Example:


```

 params = "{  'accountid' : 'UID of Account', 'provider' : 'Social Provider Name', 'providerid':'ID of Social Profile' }"

```


###Change Username
Changing user name by accountid.

[Try This](/api/v1/user-registration/account-username-change)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusChangeUsername  (accountId, params)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

params- This should have a valid JSON object.

Example:


```
params = "{  'oldusername' : 'abc', 'newusername' : 'xyz'}"

```
###Check Username
Used to check username(Server) exists or not on your site.

[Try This](/api/v1/user-registration/account-username-check-client-server)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusCheckUsername  (accountid, params)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Delete User by Email Confirmation
Remove an user's account from LoginRadius system.

[Try This](/api/v1/user-registration/account-delete-with-email-confirmation)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusDeleteUserWithEmailConfirmation  (userid, deleteuserlink, template)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```


###Check email availability
Check email exist from LoginRadius system.

[Try This](/api/v1/user-registration/user-email-availability-server)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusCheckEmailAvailablity  (emailid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```

###Get forgot password token
Forgot password token so you can manually pass into the reset password page and reset some's password.

[Try This](/api/v1/user-registration/user-password-forgot-token)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusGetForgotPasswordToken  (emailid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>
```


###Reset Password Account
Reset the password for an account. It does not require to know the previous(old) password.

[Try This](/api/v1/user-registration/account-password-reset)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusResetAccountPassword  (VerificationToken, password, welcomeemailtemplate)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

##Custom Object API
This API is used to manage a custom object for the user and relies on the User Entity object. If you are unsure of your Object ID you can reach out to the support team for details on this. It utilizes Both Custom Object ID(ObjID) and Account ID(UID).

###Upsert Custom Object
Creates or Updates the Custom Object. 

[Try This](/api/v1/user-registration/custom-object-create)


```
<cftry> 
  <cfset upsertCustomObjectsResult = SdkObject.loginradiusUpsertCustomObjects (accountid, ObjID, params)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```

params- This should have a valid JSON object as per your desired custom object schema.

Example:


```
params = '{ "field1" : "field1 data", "field2" : "field2 data" }'
```


###Get Object by Account ID
You can retrieve the Custom Object for a specific user based on Account ID and Object 

[Try This](/api/v1/user-registration/get-object-by-accountid)

```
<cftry> 
  <cfset retrieveCustomObjectsByAccountIdResult = SdkObject.loginradiusRetrieveCustomObjectsByAccountId ( accountid, ObjID)> 
  <cfcatch type = "LoginRadiusException"> 
     <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```


###Get Object by Multiple Account IDs
You can retrieve the Objects for multiple Account IDs. 

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

```
<cftry> 
  <cfset createCustomObjectsByMultipleAccountIds Result = SdkObject.loginradiusCreateCustomObjectsByMultipleAccountIds (accountids, objectid)> 
  <cfcatch type = "LoginRadiusException"> 
      <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```

accountids- Should be passed in as a comma separated string of Account IDs(UID)

###Get Objects by Query
You can get the Objects based on a custom XML query. 

[Try This](/api/v1/user-registration/custom-objects-by-query)


```
<cftry> 
  <cfset retrieveCustomObjectsByQueryResult = SdkObject.loginradiusRetrieveCustomObjectsByQuery (query, ObjID, indexvalue)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry> 
```

###Get All Custom Objects
Retrieve a list of all of the custom objects from the LoginRadius Cloud Directory.  

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)


```
<cftry> 
  <cfset retrieveRecordsByObjectIdResult = SdkObject.loginradiusRetrieveRecordsByObjectId ( ObjID, indexvalue)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'>
   </cfcatch> 
</cftry>

```

###Delete Custom Object
Gets information on the specified custom object. 

[Try This](/api/v1/user-registration/delete-custom-object-set)


```
<cftry> 
  <cfset getAccountsResult = SdkObject.loginradiusDeleteCustomObject  (ObjID, UID, isblock)> 
  <cfcatch type = "LoginRadiusException"> 
    <cfset message ='#cfcatch.message#'> 
  </cfcatch> 
</cftry>

```

###Check Custom Object
Set status of the custom objects by account IDs (UID). 

[Try This](/api/v1/user-registration/custom-object-check)

```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusCheckCustomObject (objectid, accountid)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

###Retrieve Stats of Custom Object
Get the current storage information for a specified Custom Object.

[Try This](/api/v1/user-registration/custom-object-stats)


```
<cftry>
<cfset getAccountsResult = SdkObject.loginradiusRetrieveStatsCustomObjects   (objectid, cursor)>
<cfcatch type = "LoginRadiusException"> 
<cfset message ='#cfcatch.message#'>
</cfcatch> 
</cftry>

```

##Social Login API
###Get User Profile
Get userprofile by access token


```
<cftry>
<cfset profileResult = SdkObject.loginradiusGetUserProfiledata(access_token)>
	<cfcatch type = "LoginRadiusException"> 
         <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```


###Albums
Fetch the user’s photo albums.



```
<cftry>
<cfset photoAlbumsResult = SdkObject.loginradiusGetPhotoAlbums(access_token)>
	<cfcatch type = "LoginRadiusException"> 
         <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```



###Audio

Fetch the user's checked in data.


```
<cftry>
<cfset getAudioResult = SdkObject.loginradiusGetAudio(accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```


###Company
Fetch the user's followed companies.

```
<cftry>
<cfset followedCompaniesResult = SdkObject.loginradiusGetFollowedCompanies  (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
       <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

###Contact
Fetch the user's friends/contacts/followers.


```
<cftry>
<cfset getContactsResult = SdkObject.loginradiusGetContacts(accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
       <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

###Event
Fetch the user's event data.


```
<cftry>
<cfset getEventsResult = SdkObject.loginradiusGetEvents (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 

</cftry>

```

###Following
Fetch the user's following data.


```
<cftry>
<cfset getFollowingResult = SdkObject.loginradiusGetFollowing (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
      <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```


###Group
Fetch the user's groups.


```
<cftry>
<cfset getGroupsResult = SdkObject.loginradiusGetGroups (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

###Like
Fetch the user's likes data.


```
<cftry>
<cfset getLikesResult = SdkObject.loginradiusGetLikes (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

###Mention
Fetch the user's mentions.


```
<cftry>
<cfset getMentionsResult = SdkObject.loginradiusGetMentions(accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```


###Page
Fetch a specified page data.


```
<cftry>
<cfset userProfileResult = SdkObject.loginradiusGetPages (accessTokenResult.access_token, pageName)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```


###Post
Fetch the user's posts.


```
<cftry>
<cfset getPostsResult = SdkObject.loginradiusGetPosts (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
    <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

###Photo
Fetch the user's photos from a specific album.


```
<cftry>
<cfset photoResult = SdkObject.loginradiusGetPhotos(accessTokenResult.access_token, albumId)>
	<cfcatch type = "LoginRadiusException"> 
	  <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

###Status
Status API can extract the user’s status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn’t work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

###Fetching
Fetch the user's status updates.

```
<cftry>
<cfset getStatusResult = SdkObject.loginradiusGetStatus (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```
###Posting
Post a new status update do the user's profile.


```
<cftry>
<cfset userProfileResult = SdkObject.loginradiusPostStatus (accessTokenResult.access_token, title, url, imageurl, status, caption, description)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```

- title is the title of the message (Optional)
- url is the web link of the status message (Optional)
- imageurl is the image URL of the status message (Optional)
- status is the status message text (Required)
- caption is the caption of the status message (Optional)
- description is the description of the status message (Optional)

###User Profile
Fetch the user's profile data.


```
<cftry>
	<cfset userProfileResult = SdkObject.loginradiusGetUserProfiledata(accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
		<cfdump var = 'Error: #cfcatch.message#'>
	</cfcatch> 
</cftry>

```


###Video
Fetch the user's video files.


```
<cftry>
<cfset getVideoResult = SdkObject.loginradiusGetVideo (accessTokenResult.access_token)>
	<cfcatch type = "LoginRadiusException"> 
     <cfdump var = 'Error: #cfcatch.message#'>
  </cfcatch> 
</cftry>

```


You can get a copy of the demo project from [Github](https://github.com/LoginRadius/coldfusion-sdk)