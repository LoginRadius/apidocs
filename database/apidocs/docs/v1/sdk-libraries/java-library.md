# Java Library

---

This document contains information and examples regarding the LoginRadius Java SDK. It provides guidance for working with social authentication, user profile data, and sending messages with a variety of social networks such as Facebook, Google, Twitter, Yahoo, LinkedIn, and more.

[Get a Full Demo](https://github.com/LoginRadius/Java-SDK/tree/api-v1)

> Disclaimer

> This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

{{table_container}}

##Installation
This documentation presumes you have worked through the client-side implementation to setup your LoginRadius User Registration interfaces that will service the initial registration and login process. Details on this can be found in the [getting started guide](/api/v1/user-registration/user-registration-getting-started).

Use the following dependency in your project:

You can also compile the source by running the following commands. This will generate the javadocs in java-sdk/target/apidocs

`$ git clone https://github.com/LoginRadius/java-sdk.git`

`$ cd java-sdk`

`$ mvn install #` Requires maven, download from `http://maven.apache.org/download.html`

`$ mvn dependency:copy-dependencies #` This will generate all dependencies here: java-sdk/target/dependency

The jars are also available [Maven](http://search.maven.org/#search%7Cga%7C1%7Cloginradius). Select the directory for the latest version and download the jar files.

##Quickstart Guide
The User Registration system relies on two identifiers which you can retrieve as follows:

Pass the token returned in the User Registration login response to the code behind. You can use a javascript function in the login and sociallogin onSuccess functions. Additional details on setting up and configuring your interface is available here. You can set the action in the redirect function to the desired servlet or .jsp.

```
function redirect(token) {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "callback";
    var _token = document.createElement("input");
    _token.type = "hidden";
    _token.name = "token";
    _token.value = token;
    form.appendChild(_token);
    document.body.appendChild(form);
    form.submit();
}
LoginRadiusRaaS.init(raasoption, 'sociallogin', function (response) {
            // On Success this callback will call
            // response will be string as token
            redirect(response);

        }, function (errors) {
            // on failure this function will call ‘errors’ which is an array of 						errors with message.
            // every kind of error will be returned in this method
            // you can run a loop on this array.
        }, "social-login-container");

```

On you callback page create a callback Object and retrieve an access Token

```
LoginRadiusCallbackHelper callbackhelper = new LoginRadiusCallbackHelper("Your-API-Secret");
AccessToken accessToken = callbackhelper.GetLoginRadiusToken(request);
```

If the access token was successfully retrieved create a client and retrieve the user profile, capturing the ID and UID of the user profile.

if(accessToken!=null){
UserProfileAPI userProfile= new UserProfileAPI();
LoginRadiusClient client= new LoginRadiusClient(accessToken);
RaaSUserDetails user= client.getResponse(userProfile,RaaSUserDetails.class);
LinkedTreeMap linkedMap = (LinkedTreeMap) user.getCustomFields();
out.println(linkedMap.get("Put-Your-CustomField-Name"));
String ID= user.ID;
String UID= user.Uid;
}
Finally initialize the User Registration SDK

RaaSConfiguration configSettings = new RaaSConfiguration("YOUR-APP-KEY", "YOUR-APP-SECRET");
//or
RaaSConfiguration configSettings = new RaaSConfiguration("YOUR-APP-KEY", "YOUR-APP-SECRET", "CUSTOM-ONJECT-ID");
new RaaSClientConfig(configSettings);
##User API
Initialize the User SDK to manage the User API requests

```
 UserProfileAPI userAPI= new UserProfileAPI();
```

####Get User details after authentication
[Try This](/api/v1/user-registration/user-authentication)

```
    /**
    *
 * @param String UserName
 * @param String Password
 */
RaaSUserDetails userDetails = userAPI.getUserAfterAuthentication(UserName, Password);
```

####Create New User
Create a new User in your LoginRadius Cloud Directory bypassing email verification. This will return a User Profile Object or a LoginRadius Exception.

[Try This](/api/v1/user-registration/user-create)

```
   /* Create a JSON String object to post to
  * the create-user end point. The example here creates the JSONObject
  * using google GSON
	*/
	JsonObject userdetails = new JsonObject();
	userdetails.addProperty("emailid", "john.doe@gmail.com");
	userdetails.addProperty("password", "password");
	userdetails.addProperty("gender", "M");
	userdetails.addProperty("firstname", "firstname");

	userdetails.addProperty("lastname", "lastname");
	userdetails.addProperty("birthdate", "01-31-1980");
	userdetails.addProperty("city", "Canada");

// Add custom fields as follows after enabling these fields in the user account
//Admin-console
	JsonObject customfield = new JsonObject();
	customfield.addProperty("iOS", 3314);
	customfield.addProperty("Android", 4415);
	userdetails.add("customfields", customfield);
RaaSUserDetails user= userAPI.createUser((userdetails.toString());
```

####Create User Registration Profile from User Id

[Try This](/api/v1/user-registration/user-create-registration-profile)

/\*\* \*
_ @param String emailId
_ @param String password
_ @param String accountId
_ @return
\*/

    userAPI.createRegistrationProfile(emailId, password, accountId);

####Delete User with Email Confirmation

[Try This](/api/v1/user-registration/user-delete-with-email-confirmation)

    /**
     *
     * @param String userid
     * @param String deleteuserlink
     * @param String template
     *
     */
    userAPI.deleteUserWithEmailConfirmation(userid, deleteuserlink, template);

####User Email Add/Remove
[Try This](/api/v1/user-registration/user-email-add-remove)

/\*\* \*
_ @param String accountid
_ @param String action
_ @param String emailid
_ @param String emailtype
_ @return
_/
userAPI.userEmailAddRemove(accountid, action, emailid, emailtype);

####Check email availability

[Try This](/api/v1/user-registration/user-email-availability)

    /**
     * @param String emailId
     * @return
     */

    userAPI.checkEmailAvailability(emailId);

####User Password Forgot Token
[Try This](/api/v1/user-registration/user-password-forgot-token)

     /**
     * @param emailId
     * @return
      userAPI.getForgotPassWordToken(emailId);

####Get user Profile from user Id
[Try This](/api/v1/social-login/user-profile)

     /**
     * @param String userId ID
     * @return
     */
    userAPI.getUserByUserId(userId);

####Get user profile from email

[Try This](/api/v1/user-registration/user-profile-by-email)

     /**
     *
     * @param String emailId
     * @return
     */

    userAPI.getUserbyEmail(emailId);

####Resend User Verification Email

[Try This](/api/v1/user-registration/user-verification-email-resend)

    /**
     *
     * @param String emailId
     * @param String link
     * @param String template
     * @return
     */

    userAPI.getUserEmailVerificationResend(emailId, link, template);

####Register User
Create a new user in your LoginRadius Cloud Directory.

[Try This](/api/v1/user-registration/user-create-registration-profile)

/_ Create a JSON String object to post to
_ the create-user end point. The example here creates the JSONObject
_ using google GSON
_/   
 JsonObject userdetails = new JsonObject();
userdetails.addProperty("emailid", "john.doe@gmail.com");
userdetails.addProperty("password", "password");
// userDetails.put("address1", "freak@gmail.com");
userdetails.addProperty("gender", "M");
userdetails.addProperty("firstname", "RTT");
userdetails.addProperty("lastname", "R00T");

    		userdetails.addProperty("birthdate", "01-31-1980");
    		userdetails.addProperty("city", "KON");
    		JsonObject customfield = new JsonObject();
    		customfield.addProperty("iOS", 3314);
    		customfield.addProperty("Android", 4415);

    		userdetails.add("CustomFields", customfield);
    		userdetails.addProperty("nickname", "nick-name");
    		userdetails.addProperty("timezone", "PST);
    		userdetails.addProperty("Country", "Pakistan");
    		userdetails.addProperty("placeslived", "City-1, City-2 , City-3, City-4");
    		userdetails.addProperty("postalcode", "212-314-RR");
    		userdetails.addProperty("company", "mycompany");
    		userdetails.addProperty("about", "About-me");
    		userdetails.addProperty("phonenumber", "714-334-1334");
    		RaaSResponse details = upapi.registerUser(userdetails.toString());

####Update/Edit User
Update a users details by passing in a User Object.

[Try This](/api/v1/user-registration/user-update)

```
   /* Create a JSON String object to post to
  * the create-user end point. The example here creates the JSONObject
  * using google GSON
	*/
	JsonObject userdetails = new JsonObject();
	userdetails.addProperty("gender", "F");
	userdetails.addProperty("firstname", "John");

	userdetails.addProperty("lastname", "Doe");
	userdetails.addProperty("birthdate", "07-24-1980");
	userdetails.addProperty("city", "Canada");

// Add custom fields as follows after enabling these fields in the user account
//Admin-console
	JsonObject customfield = new JsonObject();
	customfield.addProperty("iOS", 3314);
	customfield.addProperty("Android", 4415);
	userdetails.add("CustomFields", customfield);
        RaaSResponse resp = userAPI.editUser(userId, userDetails.toString())
```

####Validate the access token
[Try This](/api/v1/user-registration/token-validate)

    userAPI.validateAccessToken(access_token);

####Invalidate the access token
[Try This](/api/v1/user-registration/token-invalidate)

    userAPI.invalidateAccessToken(access_token);

####Change Password
Update the user's password by passing in the existing password. This is a deprecated method and users are not encouraged to use this.

[Try This](/api/v1/user-registration/account-password-change)

     LoginRadiusPostResponse postResponse = userAPI.changePassword(ID,OldPassword,NewPassword);

####Set Password
Sets the user's password.This is a deprecated method and users are not encouraged to use this. Instead, use the set password API in the account API section.

[Try This](/api/v1/user-registration/account-password-set)

    RaaSResponse resp = userAPI.setPassword(userID, new-Password);

##Account API
Initialize the Account SDK to manage the Account API requests

    AccountAPI accountAPI= new AccountAPI();

####Get Account
Gets a list of the User Registration Profiles for the Account ID.

[Try This](/api/v1/user-registration/account-profiles)

    RaaSUserDetails[] accountDetails = accountAPI.getAllProfilesFromAccount(UID);

####Set Account Status [block/unblock]
Enable or disable an account by passing in true or false.

[Try This](/api/v1/user-registration/account-block-unblock)

```
Boolean isBlock=true;
RaaSResponse resp = accountAPI.setAccountStatus(UID,isBlock);
```

####Delete Account
Deletes all of the users associated with this account.

[Try This](/api/v1/user-registration/account-delete)

    RaaSResponse resp = accountAPI.deleteAccount(UID);

####Delete Account with email confirmation

[Try This](/api/v1/user-registration/account-delete-with-email-confirmation)

    accountAPI.deleteAccountWithEmailConfirmation(accountId,  deleteUserLink,template);

####Link Social Account
Links the specified Social Provider account with the Account.

[Try This](/api/v1/user-registration/account-link)

    RaaSResponse resp = accountAPI.linkAccount(UID, providername, providerID);

> -Providers name should be the lower case name of the provider ie. facebook

> -Provider ID should be the user ID of this users account which can be retrieved with the User Profile API.

####Unlink Social Account
Unlinks the specified Social Provider account with the Account.

[Try This](/api/v1/user-registration/account-unlink)

    RaaSResponse resp = accountAPI.unlinkAccount(UID,providername,provider-ID);

> -Providers name should be the lower case name of the provider ie. facebook
> -Provider ID should be the user ID of this users account which can be retrieved with the User Profile API.

####Change account password

[Try This](/api/v1/user-registration/account-password-change)

    RaaSResponse response = accountAPI.changeAccountPassword( accountId,  oldPassword,  newPassword);

####Get Hashed Password
Retrieves the password hash for a user.

[Try This](/api/v1/user-registration/account-password-get)

    RaaSHashPassword hashpassword = accountAPI.getHashPassword( accountId);

####Set the account password

[Try This](/api/v1/user-registration/account-password-set)

    accountAPI.setAccountPassword(accountid,password);

####Change username of the account
[Try This](/api/v1/user-registration/account-username-change)

    RaaSResponse response = accountAPI.changeUserName( accountId,oldusername,  newusername);

####Check username availability
[Try This](/api/v1/user-registration/account-username-check-client-server)

    RaaSResponse response = accountAPI.checkUserName(username);

####Set username for the account
[Try This](/api/v1/user-registration/account-username-set)

    RaaSResponse response = accountAPI.setUserName(accountId,  oldusername,  newusername);

##Custom Object API
####Custom Object Create/Update (POST)
This API is used to write information in JSON format to the custom object for the specified account.

[Try This](/api/v1/user-registration/custom-object-create)

```
 // Initiate custom object API
CustomObjectAPI customObj=  new CustomObjectAPI();
```

    //Create a JSONObject. The following example shows how to create json object //using Google GSON.

    		JsonObject object = new JsonObject();
    		object.addProperty("emailid", "john.doe@gmail.com");
    		object.addProperty("password", "Login");
    		object.addProperty("gender", "male");
    		object.addProperty("pid", "23345114gg22");
    		object.addProperty("cardnumber", "44567");
    		JsonObject address = new JsonObject();
    		address.addProperty("address1", "DETAILS-OF-ADDRESS-1");
    		address.addProperty("address2", "DETAILS-OF-ADDRESS-2");
    		address.addProperty("address3", "DETAILS-OF-ADDRESS-3");

    		object.add("address", address);


    		RaaSResponse response =  custom.objectCreateUpdate("ACCOUNT-ID", "CUSTOMOBJECT-ID", object.toString());

####Custom Object by Account ID (GET)
[Try This](/api/v1/user-registration/get-object-by-accountid)

RaaSCustomObjectResponse response = custom.getObjectByAccountid("CUSTOMOBJECT-ID", "ACCOUNT-ID");

####Custom Object by Multiple Account IDs (GET)
[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

    RaaSCustomObjectResponse[] responseset = custom.getObjectByAccountIds("CUSTOMOBJECT-ID", "ACCOUNT-ID-1,ACCOUNT-ID-2");

####Custom Object Check (GET)
[Try This](/api/v1/user-registration/custom-object-check)

    LoginRadiusPresenceResponse response =  custom.checkForCustomObject("CUSTOMOBJECT-ID", "ACCOUNT-ID");

####Custom Objects by Object ID (GET)
This API is used to retrieve all of the Custom objects based on the Object ID.

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

    RaaSCustomObjectResponse[] responseset = custom.getObjectByObjectid("CUSTOMOBJECT-ID", "INDEX-VALUE");

####Custom Objects by Query (GET)

[Try This](/api/v1/user-registration/custom-objects-by-query)

    RaaSCustomObjectResponse response = custom.getObjectByQuery("CUSTOMOBJECT-ID", "EXPRESSION", "INDEX-VALUE");

####Custom Object Delete (POST)
This API is used to remove the specified Custom Object based on the account ID(UID).

[Try This](/api/v1/user-registration/delete-custom-object-set)

```
RaaSResponse response = custom.deleteCustomObject("CUSTOMOBJECT-ID", "ACCOUNT-ID", true);
```

####Custom Object Stats (GET)
[Try This](/api/v1/user-registration/custom-object-stats)

```
RaaSCustomObjectStats stats = custom.getCustomObjectStats("CUSTOMOBJECT-ID");

System.out.println("UserProfileAPI.main()" + stats.getRemainingMemory());
System.out.println("UserProfileAPI.main()" + stats.getTotalUsedMemory());
System.out.println("UserProfileAPI.main()" + stats.getTotalRecords());
```

##Social API
The following documentation section presumes you have worked through the client-side implementation to setup your LoginRadius Social interfaces, Details on this can be found in the Social Login getting started guide.

####Getting the Access Token
Create a LoginRadius Callback Object to get the access token.

```
LoginRadiusCallbackHelper callbackhelper = new LoginRadiusCallbackHelper("Your-API-Secret");
AccessToken accessToken = callbackhelper.GetLoginRadiusToken(request);

```

> Note

> Replace API_SECRET in the above code with your LoginRadius API Secret.

Perform a check to ensure our access token is not null.

```
 if(accessToken !=null){
    //store accessToken in session to post status and send a direct message.
}
```

Create a Client Object by passing the access token we fetched in the previous step to make a request to any end point.

```
 LoginRadiusClient client = new LoginRadiusClient(accessToken);
```

With the access token, we can now invoke any of these functions to grab data. However, this is dependent on the provider and permissions for each.

####Album
Fetch the user’s photo albums.

```
LoginRadiusAPI albums=new LoginRadiusGetAPI("album");
LoginRadiusAlbum[] userAlbum=client.getResponse(albums,LoginRadiusAlbum[].class);
```

####Audio
Load the user’s audio files.

```
LoginRadiusAPI audios=new LoginRadiusGetAPI("audio");
LoginRadiusAudio[] userAudio=client.getResponse(audios,LoginRadiusAudio[].class);
```

####Check In
Load the user’s checked in data.

```
LoginRadiusAPI checkins=new LoginRadiusGetAPI("checkin");
LoginRadiusCheckIn[] userCheckins=client.getResponse(checkins,LoginRadiusCheckIn[].class);
```

####Company
Load the user’s companies they’ve worked for or are working for.

```
LoginRadiusAPI companies=new LoginRadiusGetAPI("company");
LoginRadiusCompany[] userFollowCompanies=client.getResponse(companies,LoginRadiusCompany[].class);
```

####Contact
Load the user’s contacts.

```
LoginRadiusAPI contacts=new LoginRadiusGetAPI("contact");
LoginRadiusContactCursorResponse userContacts=client.getResponse(contacts,LoginRadiusContactCursorResponse.class)
```

####Event
Load the user’s event data.

```
LoginRadiusAPI events =new LoginRadiusGetAPI("event");
LoginRadiusEvent[] userEvents=client.getResponse(events,LoginRadiusEvent[].class);
```

####Following
Load the user’s following.

```
LoginRadiusAPI followings =new LoginRadiusGetAPI("following");
LoginRadiusFollowing[] userfollowing=client.getResponse(followings,LoginRadiusFollowing[].class);
```

####Group
Load the user’s groups.

```
LoginRadiusAPI groups=new LoginRadiusGetAPI("group");
LoginRadiusGroup[] userGroups=client.getResponse(groups,LoginRadiusGroup[].class);
```

####Like
Load the user’s like data.

```
LoginRadiusAPI likes=new LoginRadiusGetAPI("like");
LoginRadiusLike[] userLikes=client.getResponse(likes,LoginRadiusLike[].class);
```

####Mention
Load the user’s mentions.

```
LoginRadiusAPI mentions=new LoginRadiusGetAPI("mention");
LoginRadiusMention[] userMentions=client.getResponse(mentions,LoginRadiusMention[].class);
```

####Message
Send a direct message to a user's friend.

```
Map<String,String> params = new HashMap<String,String>();
params.put("to", URLEncoder.encode(_to, "UTF-8"));
params.put("subject", URLEncoder.encode(_subject, "UTF-8"));
params.put("message", URLEncoder.encode(_message, "UTF-8"));

LoginRadiusAPI  messageapi = new LoginRadiusPostAPI("message", params);


LoginRadiusPostResponse response=client.getResponse(messageapi,LoginRadiusPostResponse.class);
```

####Page
Load the user’s page data.

```
Map<String, String> params = new HashMap<String,String>();
params.put("pagename", "PAGE-NAME-GOES-HERE");
LoginRadiusAPI pages=new LoginRadiusGetAPI("page",params);
LoginRadiusPage page=client.getResponse(pages,LoginRadiusPage.class);

```

####Post
Load the user’s post

```
LoginRadiusAPI posts=new LoginRadiusGetAPI("post");
LoginRadiusPost[] userPosts = client.getResponse(posts,LoginRadiusPost[].class);

```

####Photo
Load the user’s photos from an album.

```
Map<String, String> params = new HashMap<String,String>();
params.put("albumid", "Album ID goes here");
LoginRadiusAPI photos =new LoginRadiusGetAPI("photo", params);
LoginRadiusAlbum[] userPhotos = client.getResponse(photos,LoginRadiusPhoto[].class);
```

####Status
Status API can extract the user’s status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn’t work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

####Fetching status

Retrieving a list of status updates.

```
LoginRadiusAPI status=new LoginRadiusGetAPI("status");
LoginRadiusStatus[] userStatus=client.getResponse(status,LoginRadiusStatus[].class);
```

####Posting status

Posting a new status update to the user’s profile.

```
Map<String,String> params = new HashMap<String,String>();
params.put("title", URLEncoder.encode(request.getParameter("title"), "UTF-8"));
params.put("url", URLEncoder.encode(request.getParameter("url"), "UTF-8"));
params.put("imageurl", URLEncoder.encode(request.getParameter("imageUrl"), "UTF-8"));
params.put("status", URLEncoder.encode(request.getParameter("status"), "UTF-8"));
params.put("caption", URLEncoder.encode(request.getParameter("caption"), "UTF-8"));
params.put("description", URLEncoder.encode(request.getParameter("description"), "UTF-8"));

LoginRadiusAPI  status = new LoginRadiusPostAPI("status", params);

LoginRadiusPostResponse response= client.getResponse(status,LoginRadiusPostResponse.class);
```

####User Profile
The UserProfileAPI pulls all available user data. The LoginRadiusUltimateUserProfile object contains a large number of fields, and they can be manually retrieved like any Java object.

```
LoginRadiusAPI userprofileapi=new LoginRadiusGetAPI("userprofile");
LoginRadiusUltimateUserProfile userProfileData = client.getResponse(userprofileapi,LoginRadiusUltimateUserProfile.class);
//userProfileData.Id
//userProfileData.Provider
//userProfileData.FirstName
//userProfileData.LastName
```

####Video
Load the user’s video files.

```
LoginRadiusAPI videos=new LoginRadiusGetAPI("video");
LoginRadiusVideo[] userVideos=client.getResponse(videos,LoginRadiusVideo[].class);
```

##Demo
We have configured a sample Java project with extended social profile data, push notifications, friend invite, and advanced user insights data examples.

You can get a copy of our demo project at [GitHub](https://github.com/LoginRadius/Java-SDK/tree/api-v1).

##Reference Manual
Please find the reference manual [here](http://docs.lrcontent.com/apidocs/ref/java/index.html).
