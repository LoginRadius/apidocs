PHP Library
===
---
[Get a Full Demo](https://github.com/LoginRadius/php-sdk)

>Disclaimer
This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

{{table_container}}

##Installation

This document contains information and examples regarding the LoginRadius PHP SDK.
It presumes you have worked through the client-side implementation to setup your LoginRadius User Registration interfaces that will service the initial registration and login process. Details on this can be found in the getting [started guide](/api/v1/user-registration/user-registration-getting-started).

###Importing Required Libraries
- To install LoginRadius SDK, run the following command


```
    composer require loginradius/php-sdk:3.0.0
```

- After installing, you need to require Composer's autoloader using following command:

```
    require 'vendor/autoload.php'
```

*or* 

- Download the LoginRadius SDK from [Github](https://github.com/LoginRadius/php-sdk).

- Copy the downloaded SDK into your project structure. Include the SDK files into your code.

```
    include_once "LoginRadiusSDK/LoginRadius.php";
    include_once "LoginRadiusSDK/LoginRadiusException.php";
    include_once "LoginRadiusSDK/Clients/IHttpClient.php";
    include_once "LoginRadiusSDK/Clients/DefaultHttpClient.php";
    include_once "LoginRadiusSDK/SocialLogin/GetProvidersAPI.php";
    include_once "LoginRadiusSDK/SocialLogin/SocialLoginAPI.php";
    include_once "LoginRadiusSDK/CustomerRegistration/UserAPI.php";
    include_once "LoginRadiusSDK/CustomerRegistration/AccountAPI.php";
    include_once "LoginRadiusSDK/CustomerRegistration/CustomObjectAPI.php";

```

Modify the config.php file in the SDK to include your LoginRadius Credentials

##Quickstart Guide
###Configuration
After successful install, you need to define the following LoginRadius Account info in your project anywhere before using the LoginRadius SDK or in the config file of your project:

```
define('LR_APP_NAME', 'LOGINRADIUS_SITE_NAME_HERE'); // Replace 
LOGINRADIUS_SITE_NAME_HERE with your site name that provide in LoginRadius account.
define('LR_API_KEY', 'LOGINRADIUS_API_KEY_HERE'); // Replace LOGINRADIUS_API_KEY_HERE with your site API key that provide in LoginRadius account.
define('LR_API_SECRET', 'LOGINRADIUS_API_SECRET_HERE'); // Replace LOGINRADIUS_API_SECRET_HERE with your site Secret key that provide in LoginRadius account.
```

>Replace `LOGINRADIUS_SITE_NAME_HERE`, `LOGINRADIUS_API_KEY_HERE` and `LOGINRADIUS_API_SECRET_HERE` in the above code with your LoginRadius Site Name, LoginRadius API Key and Secret which you can [get here](/api/v1/getting-started/get-api-key-and-secret).

###Implementation
Importing/aliasing with the use operator.

```
    use LoginRadiusSDK\LoginRadius;
    use LoginRadiusSDK\LoginRadiusException;
    use LoginRadiusSDK\Clients\DefaultHttpClient;
    use LoginRadiusSDK\Clients\IHttpClient;
    use LoginRadiusSDK\SocialLogin\GetProvidersAPI;
    use LoginRadiusSDK\SocialLogin\SocialLoginAPI;
    use LoginRadiusSDK\CustomerRegistration\UserAPI;
    use LoginRadiusSDK\CustomerRegistration\AccountAPI;
    use LoginRadiusSDK\CustomerRegistration\CustomObjectAPI;
```

Create a LoginRadius object using API & Secret key:

```
    // Social APIs
    $getProviderObject = new GetProvidersAPI(LR_API_KEY, LR_API_SECRET,     array('authentication'=>false, 'output_format' => 'json'));

    $socialLoginObject = new SocialLoginAPI (LR_API_KEY, LR_API_SECRET,array('authentication'=>false, 'output_format' => 'json'));

    // Customer Registration APIs
    $userObject = new UserAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));

    $accountObject = new AccountAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));

    $customObject = new CustomObjectAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));

```

###GetProvidersAPIs
Get list of provider selected in LoginRadius user account.

```
try{
    $providers = $getProviderObject->getProvidersList();
    }
    catch (LoginRadiusException $e){
        $e->getMessage();
        $e->getErrorResponse();
    }
```

##Social APIs
The following documentation section presumes you have worked through the client-side implementation to setup your LoginRadius Social interfaces, Details on this can be found in the [Social Login getting started guide](/api/v1/social-login/social-login-getting-started), Setup the callback URL in your LoginRadius User account, Details on the Callback URL are available [here](https://support.loginradius.com/hc/en-us/articles/203540719-Callback-URL-description-and-usage).

###Get Access token
Call the loginradius_exchange_access_token() function to retrieve an access token and the expiration timer:

[Try This](/api/v1/social-login/access-token)

```
try{
    $accesstoken = $socialLoginObject->exchangeAccessToken($request_token);//$request_token loginradius token get from social/traditional interface after success authentication.
    $access_token= $accesstoken->access_token;
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
```
With the access token, we can now invoke any of the following functions to grab data. However, this is dependent on the provider and permissions for each.

###Get User Profile Data
The UserProfileAPI pulls all available user data. In this example, we just pull all fields that are Strings and not null. The LoginRadiusUltimateUserProfile object contains a large number of fields, and they can be manually retrieved like any PHP object.​

[Try This](/api/v1/social-login/user-profile)

```
try{
    $userProfileData = $socialLoginObject->getUserProfiledata($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
```

###Get photo Albums Data
Fetch the user’s photo albums:

[Try This](/api/v1/social-login/album)

```
try{
    $photoAlbums = $socialLoginObject->getPhotoAlbums($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
```

###Get photos Data
Get photo data from the user’s social account

[Try This](/api/v1/social-login/photo)


```
try{
    $photos = $socialLoginObject->getPhotos($access_token, $album_id);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
```

###Get Checkins Data
Load the user’s checked in data.

[Try This](/api/v1/social-login/check-in)


    try{
    $checkins = $socialLoginObject->getCheckins($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Audio Data
Load the user’s audio files.

[Try This](/api/v1/social-login/audio)


    try{
    $audio = $socialLoginObject->getAudio($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Contacts Data
Load a list of the users friends/contacts/followers.

[Try This](/api/v1/social-login/contact)

 
    try{
    $contacts = $socialLoginObject->getContacts($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Mentions Data
Load the user’s mentions.

[Try This](/api/v1/social-login/mention)

 
    try{
    $mentions= $socialLoginObject->getMentions($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Following Data
Load the user’s following.

[Try This](/api/v1/social-login/following)

 
    try{
    $following = $socialLoginObject->getFollowing($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }


###Get Events Data
Load the user’s event data.

[Try This](/api/v1/social-login/event)

 
    try{
    $events= $socialLoginObject->getEvents($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Posts Data
Load the user’s post.

[Try This](/api/v1/social-login/post)

 
    try{
    $posts= $socialLoginObject->getPosts($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Followed Companies Data
Load the users followed companies.

[Try This](/api/v1/social-login/following)

    try{
    $followedCompanies= $socialLoginObject->getFollowedCompanies($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
###Get groups Data
Load the user’s groups.

[Try This](/api/v1/social-login/group)

    try{
    $groups= $socialLoginObject->getGroups($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }


###Get status Data
Posting a new status update to the user’s profile.

[Try This](/api/v1/social-login/status)


    try{
    $status= $socialLoginObject->getStatus($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Videos Data
Load the user’s video files.

[Try This](/api/v1/social-login/video)

 
    try{
    $videos= $socialLoginObject->getVideos($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Likes Data
Load the user’s like data.

[Try This](/api/v1/social-login/like)


    try{
    $likes= $socialLoginObject->getLikes($access_token);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get Pages Data
Load the user’s page data.

[Try This](/api/v1/social-login/page)

    try{
    $pages= $socialLoginObject->getPages($access_token, $page_name);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
###Post Status
Status API can extract the user’s status updates. This API is much more specific to the provider being used in that it works with Facebook or Twitter, but wouldn’t work if the user logged in with Github. The API will check the provider being used against those available and will return an error if it is not supported.

[Try This](/api/v1/social-login/status-posting)

 
    try{
    $postStatus= $socialLoginObject->postStatus($access_token, $title, $url, $imageurl, $status, $caption, $description);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Send Message
Send a direct message to another user.

[Try This](/api/v1/social-login/post-message-api)

     try{
    $sendMessage= $socialLoginObject->sendMessage($access_token, $to, $subject, $message);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
##User APIs
If you have not already initialized the user object do so now

```
$userObject = new UserAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));
```
###Create User
This API is used to create a new user on your site. This API bypasses the normal email verification process and manually creates the user for your system. 

[Try This](/api/v1/user-registration/user-create)

     /**
     * $data = array("emailid" => "example@example.com",
     * "password" => "FakePass",
     * "firstname" => "Joe",
     * "lastname" => "Smith",
     * "gender" => "M",
     * "birthdate" => "11-08-1987",
     * "Country" => "USA",
     * "city" => "Chicago",
     * "state" => "Illinois ",
     * "phonenumber" => "1232333232",
     * "address1" => "23/43, II Street",
     * "address2" => "Near Paris garden",
     * "company" => "Orange Inc.",
     * "postalcode" => "43435",
     * "emailsubscription" => "true",
     * "customfields" => array(
     *      "example_field1" => "some data 1",
     *      "example_field2" => "some data 2",
     *      "example_field3" => "some data 3"
     * )
     * );
     * /
    try{
    $profile= $userObject->create($data);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Register User
This API used to register user from server side, verification email will be sent to provided email address 

[Try This](/api/v1/user-registration/user-registration)

    /**
    * $data = array("emailid" => "example@example.com",
    * "password" => "FakePass",
    * "firstname" => "Joe",
    * "lastname" => "Smith",
    * "gender" => "M",
    * "birthdate" => "11-08-1987",
    * "Country" => "USA",
    * "city" => "Chicago",
    * "state" => "Illinois ",
    * "phonenumber" => "1232333232",
    * "address1" => "23/43, II Street",
    * "address2" => "Near Paris garden",
    * "company" => "Orange Inc.",
    * "postalcode" => "43435",
    * "emailsubscription" => "true",
    * "customfields" => array(
    * "example_field1" => "some data 1",
    *  "example_field2" => "some data 2",
    *  "example_field3" => "some data 3"
    * ),
    * "EmailVerificationUrl" => "http://yoursite.com/verifyemail",
    * "template" => "verification-default"
    * );
    */
    try{
    $profile= $userObject->registration($data);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
###Update User
This API is used to Modify/Update details of an existing user. 

[Try This](/api/v1/user-registration/user-update)

    /**
    * $param $user_id
    * $data = array(
    * 'firstname' => 'first name',
    * 'lastname' => 'last name',
    * 'gender' => 'm',
    * 'birthdate' => 'MM-DD-YYYY',
    * ....................
    * ....................
    * ); 
    */
    try{
    $result= $userObject->edit($user_id, $data);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
>This function is used to Modify/Update details of an existing user.

###Delete User with Email Confirmation
This API is used to remove an user's account from LoginRadius system. For security and mis-click concerns, it will send a delete confirmation email to user's email inbox to ask user to confirm the action.

[Try This](/api/v1/user-registration/user-delete-with-email-confirmation)


    /**
    * $user_id = 'xxxxxxxxxxxxxxxxx'; // The LoginRadius user identifier for a particular social platform(like "Facebook", "Twitter") attached with that user account.
    * $deleteuserlink Website link where delete user link will handle.
    *
    */
    try{
    $result= $userObject->deleteUserEmail($user_id, $delete_user_link);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###User Authentication
Retrieve the user based on user credentials. 

[Try This](/api/v1/user-registration/user-authentication)

    /**
    * $userName = 'username'; (or email)
    * $password = 'xxxxxxxxxx'; 
    */
   
    try{
    $result= $userObject->signIn($userName, $password);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
###Get User Profile By User ID
This API retrieves the profile data associated with the specific user using the users unique UserID

[Try This](/api/v1/user-registration/user-profile-by-id)

    /**
    * $user_id = 'xxxxxxxxxx';
    */
    try{
    $result= $userObject->getProfileByID($user_id);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }

###Get User Profile By Email
This API retrieves the profile data associated with the specific user using the passing in email address.

[Try This](/api/v1/user-registration/user-profile-by-email)

     /**
     * $email = 'example@doamin.com';
     */
    try{
    $result= $userObject->getProfileByEmail($email);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
###Check User Email Availability
This API is used to check the availability of an email from your Customer registration system.

[Try This](/api/v1/user-registration/user-email-availability)

     /**
     * $email = 'example@doamin.com';
     */
    try{
    $result= $userObject->checkEmail($email);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
##Account APIs
###Link Account
This API is used to link a user account with a specified providers user account. 

[Try This](/api/v1/user-registration/account-link)

     /**
     * @param type $uid
     * @param type $id
     * @param type $provider
     */
    try{
    $result = $accountObject->accountLink($uid, $id, $provider);
    }
    catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
    }
###Unlink Account
This API is used to unlink a user account with a specified providers user account. 

[Try This](/api/v1/user-registration/account-unlink)

```
 /**
 * @param type $uid
 * @param type $id
 * @param type $provider
 */
try{
    $result = $accountObject->accountUnlink($uid, $id, $provider);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Block/Unblock Account
This API is used to block or un-block a user using the users unique UserID (UID).

[Try This](/api/v1/user-registration/account-block-unblock)

```
 /**
 * $uid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
 * $action = true/false(boolean)
 */
try{
    $result= $accountObject->setStatus($uid, true/false);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```

###Create Registration Profile
This API is used to create a user using the currently logged in social provider. 

[Try This](/api/v1/user-registration/user-create-registration-profile)

```
 /**
 * $data = array(
 *      'accountid'=> uid,
 *      'password'=> 'xxxxxxxxxx',
 *      'emailid'=> 'example@doamin.com'
 * );
 */
try{
    $result = $accountObject->createUserRegistrationProfile($data);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Get User Profiles
This API is used to retrieve all of the profile data from each of the linked social provider accounts associated with the account. For ex: A user has linked facebook and google account then this api will retrieve both profile data.

[Try This](/api/v1/user-registration/account-profiles)

```
 /**
 * $uid = 'xxxxxxxxxxx';
 */
try{
    $result = $accountObject->getAccounts($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Set User Email
This API is used to add or remove a particular email from one user's account. 

[Try This](/api/v1/user-registration/user-email-add-remove)

```
 /**
 * $uid = 'xxxxxxxxxxx';
 * $action Add or remove
 * $data = array(
 *      'emailid'=> 'example@doamin.com',
 *      'emailType'=> 'Business', //Email Type like "Business" or Personal
 *
 * );
 */
try{
    $result = $accountObject->userAdditionalEmail($uid, $action, $data);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Forgot Password token
This API generates a forgot password token so you can manually pass into the reset password page and reset some's password. 

[Try This](/api/v1/user-registration/user-password-forgot-token)

```
 /**
 * $email = 'example@doamin.com';
 */
try{
    $result = $accountObject->forgotPassword($email);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Account Delete
Delete an account from your LoginRadius app.

[Try This](/api/v1/user-registration/account-delete)

```
 /**
 * $uid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; 
 */
try{
    $result = $accountObject->deleteAccount($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Change Account Password
This API is used to change the password field of an account, you need to know the old password before you change it.

[Try This](/api/v1/user-registration/account-password-change)

```
 /**
 * $uid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; 
 * $old_password => 'xxxxxxxxxx';
 * $new_password => 'xxxxxxxxxx';
 */
try{
    $result = $accountObject->changeAccountPassword($uid, $old_password, $new_password);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Get Account Password
This API is used to get the password field of an account. 

[Try This](/api/v1/user-registration/account-password-get)


```
 /**
 * $uid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
 */
try{
    $result = $accountObject->getHashPassword($uid);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Set Account Password
This API is used to set a password for an account. It does not require to know the previous(old) password.

[Try This](/api/v1/user-registration/account-password-set)

```
 /**
 * $uid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
 * $password = 'xxxxxxxxxx';
 */
try{
    $result = $accountObject->setPassword($uid, $password);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Change UserName
This API is used for changing user name by account Id.

[Try This](/api/v1/user-registration/account-username-change)

```
 /**
 * $uid = 'xxxxxx'; // UID, the identifier for each user account, it may have multiple IDs(identifier for each social platform) attached with
 * @param type $uid
 * @param type $username
 * @param type $new_username
 */
try{
    $result = $accountObject->changeUsername($uid, $username, $new_username);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Check UserName
This API is used to check username exists or not on your site. 

[Try This](/api/v1/user-registration/account-username-check-client-server)

 ```
/**
 * $username = 'xxxxxx'; //Username that you want to validate
 */
try{
    $result = $accountObject->checkUsername($username);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

```

###Set UserName
This API is used for set user name by user Id.

[Try This](/api/v1/user-registration/account-username-set)

```
 /**
 * $uid = 'xxxxxx'; // UID, the identifier for each user account, it may have multiple IDs(identifier for each social platform) attached with
 * $newusername = 'xxxxxx'  //New username
 */
try{
    $result = $accountObject->setUsername($uid, $newusername);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Resend Email Verification
This API is used to generate an email-token that can be sent out to a user in a link in order to verify their email.

[Try This](/api/v1/user-registration/user-verification-email-resend)

```
 /**
 * $email = 'example@doamin.com' //email id //required
 * $link  = 'example.com' //Verification Url link address //required
 * $template = 'xxxxx'  //Verification Email Template
 */
try{
    $result = $accountObject->resendEmailVerification($email, $link, $template);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
##Custom Object APIs
This API is used to manage a custom object for the user and relies on the User Entity object. If you are unsure of your Object ID you can reach out to the support team for details on this. If you haven't already initialized the User Registration Custom Object API do so now.

```
$customObject = new CustomObjectAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));
```
###Get Custom Object by Account ID
You can retrieve the Custom Object for a specific user based on Account ID and Object ID. 

[Try This](/api/v1/user-registration/get-object-by-accountid)

```
 /**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $account_id = 'xxxxxxxxxxxx';
 *
 */
try{
    $result= $customObject->getObjectByAccountid($object_id, $account_id);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Get Custom Object by multiple Account IDs
You can retrieve the Objects for multiple Account IDs. 

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

```
 /**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $account_ids = 'xxxxxxxxxxxx,xxxxxxxxxxxx,xxxxxxxxxxxx';
 *
 */
try{
    $result= $customObject->getObjectByAccountIds($object_id, $account_ids);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Get Custom Object by Query
You can get the Objects based on a custom XML query. 

[Try This](/api/v1/user-registration/custom-objects-by-query)

```
 /**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $query = "<Expression LogicalOperation='AND'>
 *              <Field Name='Provider' ComparisonOperator='Equal'>facebook</Field>
 *              <Expression LogicalOperation='OR'>
 *                  <Field Name='Gender' ComparisonOperator='Equal'>M</Field>
 *                  <Field Name='Gender' ComparisonOperator='Equal'>U</Field>
 *              </Expression>
 *          </Expression>";
 * ------------------ OR ------------------
 * $query = "<Field Name='Gender' ComparisonOperator='Equal'>F</Field>";
 *
 * $nextCursor=>[1]; (optional)
 */
try{
    $result= $customObject->getObjectByQuery($object_id, $query, $next_cursor);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```


> -See [this link](/api/v1/user-registration/custom-objects-by-query) for a sample XML Query

>-Cursor allows you to page through large datasets

Get All Custom Objects
Retrieve a list of all of the custom objects from the LoginRadius Cloud Directory. 

[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

```
 /**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $nextCursor=>[1]; (optional)
 */
try{
    $result= $customObject->getAllObjects($object_id, $next_cursor);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Get Custom Object Statistics
Gets information on the specified custom object. 

[Try This](/api/v1/user-registration/custom-object-stats)

 ```
/**
 *
 * $object_id = 'xxxxxxxxxxxx';
 */
try{
    $result= $customObject->getStats($object_id);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Upsert Custom Object
Creates or Updates the Custom Object.

[Try This](/api/v1/user-registration/custom-object-create)

 ```
/**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $account_id = 'xxxxxxxxxx';
 * $data = array(
 *  firstname => 'first name',
 *  lastname => 'last name',
 *  gender => 'm',
 *  birthdate => 'MM-DD-YYYY',
 *  ....................
 *  ....................
 * );
 */
try{
    $result= $customObject->upsert($object_id, $account_id, $data);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Block/Unblock Custom Object
This API is used to block Custom Object.

```
 /**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $account_id = 'xxxxxxxxxx';
 * $action = true/false(boolean)
 */
try{
    $result= $customObject->setStatus($object_id, $account_id, $action);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}
```
###Check Custom Object
This API is used to check the existence of a custom object under an account id.

```
 /**
 *
 * $object_id = 'xxxxxxxxxxxx';
 * $account_id = 'xxxxxxxxxx';
 */
try{
    $result= $customObject->checkObject($object_id, $account_id);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
} 
```
###Implement Custom HTTP Client
- In order to implement custom http client. Create the customhttpclient.php file in your project.


```
namespace LoginRadiusSDK\Clients\IHttpClient;
use LoginRadiusSDK\LoginRadius;
use LoginRadiusSDK\LoginRadiusException;

class CustomHttpClient implements IHttpClient {
public function request($path, $query_array = array(), $options = array()) {
//custom HTTP client request handler code here
    }
}
```

- After that, pass the class name of your custom http client in global variable $apiClient_class in your project.


```
global $apiClient_class;
$apiClient_class = 'CustomHttpClient';
```
>Now your Custom HTTP client library will be used to handle LoginRadius APIs.

##Demo
Check out the demo and get the full SDK on our [Github](https://github.com/LoginRadius/php-sdk)

###Reference Manual
Please find the reference manual [here](http://docs.lrcontent.com/apidocs/ref/php/index.html).

