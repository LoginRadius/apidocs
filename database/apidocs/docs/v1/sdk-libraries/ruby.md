Ruby Library
===
---

Welcome to LoginRadius’ Ruby SDK documentation!

>Disclaimer
This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

##Setup
- Add social login, login page, registration page and other interface code from [here](/api/v1/user-registration/user-registration-getting-started)

- Setup the callback URL in your LoginRadius user account, this is the URL where a user would be redirected after authentication for handle user profile data. Example:- `www.example.com/callback`

##Installation
Add this line to your application's Gemfile:


````
 gem "login_radius", :path => "gemfilepath";
````

Or


````
 gem "login_radius", '~>2.0.0'
````


And then execute:


````
 $ bundle
````



Or install it yourself as:


````
 $ gem install login_radius
````

OR

````
 gem install --local LOCAL_FILE_PATH/login_radius-2.0.0.gem # if local install login_radius gem file
````

Followed by executing:
login_radius gem file

````
 bundle install
````

##Usage

Take a peek:

```
 @LoginRadiusConfig = {
	:sitename => "LOGINRADIUS_SITENAME",
	:appkey => "LOGINRADIUS_APPKEY",
	:appsecret => "LOGINRADIUS_APPSECRET",
	:objectId => "LOGINRADIUS_OBJECTID"
}

@userRegister = LoginRadiusRaas::RaasApi.new(@LoginRadiusConfig);
```

##How to get a token and actually make a client
On the LoginRadius website, you are able to enter your own callback URL for your LoginRadius site. You will need to setup a route on whatever framework you use, maybe "/callback." Then, get the gem forward (www.example.com) and use it to set up a public web address for your localhost server. Then, you can enter the callback on LoginRadius as `https://example.com/callback`, for instance.

Paste their example login stuff onto your index page, and then enter Provider configuration on their LoginRadius site.

Now you're ready to go with testing!

When LoginRadius hits your callback after a user logs in, you'll see parameters like this:

Parameters: {"token"=>"Your Token Here"}

This token is the token used in the above example. This is what you'll need to get your access token and user's profile. Just paste it into the code above, and you can immediately grab their user profile on the callback, login, and grab their contacts.


##Some examples
Below is just code exemplifying some of the more interesting methods and what they return.
<br>
````
 @access_token = @userRegister.get_access_token(params[:token])
````
<br>
Will return false, indicating you don't have access to that stream.


###User Profile
````
 @userRegister.get_user_profile(@access_token[:access_token])
 =>object of full user profile data
And, finally, you can handle all user authentication with help of following functions:
````

##Social APIs
````
@userRegister.get_albums(accessToken)
@userRegister.get_photo(accessToken)
@userRegister.get_checkins(accessToken)
@userRegister.get_audio(accessToken)
@userRegister.send_message(accessToken, to, subject, message)
@userRegister.get_contacts(accessToken)
@userRegister.get_mentions(accessToken)
@userRegister.get_following(accessToken)
@userRegister.get_events(accessToken)
@userRegister.get_posts(accessToken)
@userRegister.get_posts(accessToken)
@userRegister.get_followed_companies(accessToken)
@userRegister.get_groups(accessToken)
@userRegister.get_status(accessToken)
@userRegister.post_status(accessToken, title, url, imageurl, status, caption, description)
@userRegister.get_videos(accessToken)
@userRegister.get_likes(accessToken)
@userRegister.get_pages(accessToken, pageName)

````

##User APIs:
###user_create_profile(params)
This API is used to create a new user on your site. This API bypasses the normal email verification process and manually creates the user for your system.
<br>
```
params = {
   :emailid => "example@example.com",
   :password => "FakePass",
   :firstname => "Joe",
   :lastname => "Smith",
   :gender => "M",
   :birthdate => "11-08-1987",
   :Country => "USA",
   :city => "Chicago",
   :state => "Illinois ",
   :phonenumber => "1232333232",
   :address1 => "23/43, II Street",
   :address2 => "Near Paris garden",
   :company => "Orange Inc.",
   :postalcode => "43435",
   :emailsubscription => "true",
   :customfields => {
    	:example_field1 => "some data 1",
    	:example_field2 => "some data 2",
    	:example_field3 => "some data 3"
   }
 }

@userRegister.user_create_profile(params)
```
<br>
###User Registration(params)
This API used to register user from the server side, a verification email will be sent to provided email address.
<br>
````
  params = {
   :emailid => "example@example.com",
   :password => "FakePass",
   :firstname => "Joe",
   :lastname => "Smith",
   :gender => "M",
   :birthdate => "11-08-1987",
   :Country => "USA",
   :city => "Chicago",
   :state => "Illinois ",
   :phonenumber => "1232333232",
   :address1 => "23/43, II Street",
   :address2 => "Near Paris garden",
   :company => "Orange Inc.",
   :postalcode => "43435",
   :emailsubscription => "true",
   :customfields => {
     :example_field1 => "some data 1",
     :example_field2 => "some data 2",
     :example_field3 => "some data 3",
   },
   :EmailVerificationUrl => "http://yoursite.com/verifyemail"
 }
@userRegister.user_registration(params)
````
<br>
###User Edit Profile(userId, params)
This API is used to Modify/Update details of an existing user.

````
 params = {
  :firstname => 'first name',
  :lastname => 'last name',
  :gender => 'm',
  :birthdate => 'MM-DD-YYYY',
 }

@userRegister.user_edit_profile(userId, params)

````
<br>
###Check Email(email)
This API is used to check email of an existing user.

````
email = "example@provider.com"
@userRegister.check_email(email)

````
<br>
###User Forgot Password Token(email)
This API is used to get the token for forgot the password of an existing user.

````
email = "example@provider.com"
@userRegister.user_forgot_password_token(email)

````
<br>
###User Delete(uid)
This API deletes the RaaS account of the user and allowing them to begin the registration process.

````
uid = 'xxxxxxxxxx'
@userRegister.user_delete(uid)

````
<br>
###User Set_password(params)
This API is used to create a user using the currently logged in a social provider.

````
  params = {
  :accountid => uid,
  :password => 'xxxxxxxxxx',
  :emailid => 'example@doamin.com'
 }

@userRegister.user_set_password(params)

````
<br>
###User Change Password(uid, oldPassword, newPassword)
This API is used to Update/Change the user’s password.

````
userId => 'xxxxxxxxxx';
oldpassword => 'xxxxxxxxxx';
newpassword => 'xxxxxxxxxx';
@userRegister.user_change_password(uid, oldPassword, newPassword)

````
<br>
###User Set Password(userId, password)
This API is used to set the password of the user, used in the admin section.

````
userId = 'xxxxxx'; // RaaS account ID only not Social Account ID
password = 'xxxxxxxxxx';
@userRegister.user_set_password(userId, password)

````
<br>
###User Authentication(username, password)
This API is used to authenticate users and returns the profile data associated with the authenticated user.

````
username = 'username';//email id
password = 'xxxxxxxxxx';
@userRegister.user_authentication(username, password)

````
<br>
###User Get Profile By Id(userId)
This API retrieves the profile data associated with the specific user using the user's unique UserID.

````
userId = 'xxxxxxxxxx';
@userRegister.user_get_profile_by_id(userId)

````
<br>
###User Get Profile By Email(email)
This API retrieves the profile data associated with the specific user using the user's unique Email Address.

````
email = 'xxxxxxxxxx@xxxxxxxx.xxx';
@userRegister.user_get_profile_by_email(email)

````
<br>
###User Set Status(uid, action)
This API is used to block or unblock a user using the user's unique UserID (UID).


````
uid = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
action = true/false(boolean)
@userRegister.user_set_status(uid, action)

````
<br>
##Account APIs:
####Account Link(params)
This API is used to link a user account with a specified providers user account.

````
  params = {
	  :accountid => uid,
	  :provider => Provider Name,
	  :providerid => Social ID
 }

@userRegister.account_link(params)

````
<br>
###Account Unlink(params)
This API is used to unlink a user account with a specified providers user account.

````
  params = {
  :accountid => uid,
  :provider => Provider Name,
  :providerid => Social ID
 }

@userRegister.account_unlink(params)

````
<br>
###Account Delete(accountid)
This API is used to delete a user account.

````
@userRegister.account_delete(accountid)

````
<br>
###Account Change_username(Uid, currentusername, newusername)
This API is used to changed username for a user account.

````
 @userRegister.account_change_username(Uid,currentusername,newusername)

````
<br>
###Account Set Username(Uid,username)
This API is used to set the username for a user account.

````
 @userRegister.account_set_username(Uid,username)

````
<br>
###Account Check Username(username)
This API is used to check username for a user account.

````
@userRegister.account_check_username(username)

````
<br>
###Account Get Profiles By Uid(uid)
This API is used to retrieve all of the profile data from each of the linked social provider accounts associated with the account. For ex: A user has linked facebook and google account then this API will retrieve both profile data.

````
uid = xxxxxxxxxx;
@userRegister.account_get_profiles_by_uid(uid)

````
<br>
##Custom Object APIs:
###Custom Object Get By Accountid( objectId, accountId ):
This API is used to retrieve all of the custom objects by account ID (UID).

````
objectId = 'xxxxxxxxxxxx',
accountId = 'xxxxxxxxxxxx'

@userRegister.custom_object_get_by_accountid(objectId, accountId)

````
<br>
###Custom Object Get By Recordid(objectId, recordId)
This API is used to retrieve all of the custom objects by an object’s unique ID.

````

 objectId = 'xxxxxxxxxxxx';
 recordId = 'xxxxxxxxxxxx';

@userRegister.custom_object_get_by_recordid(objectId, recordId)

````
<br>
###Custom Object Get By Accountids!(objectId, accountIds)
This API is used to retrieve all of the custom objects via a list of account IDs(UID) separated by, (Max 20).

````
objectId = 'xxxxxxxxxxxx';
accountIds = 'xxxxxxxxxxxx,xxxxxxxxxxxx,xxxxxxxxxxxx';

@userRegister.custom_object_get_by_accountids!(objectId, accountIds)
````
<br>
###Custom Object Get By Query(objectId, query, nextCursor)
This API is used to retrieve all of the custom objects by an object’s unique ID and filtered by a query

````
  objectId = 'xxxxxxxxxx';
 query = "<Expression LogicalOperation='AND'>
  <Field Name='Provider' ComparisonOperator='Equal'>facebook</Field>
  <Expression LogicalOperation='OR'>
  <Field Name='Gender' ComparisonOperator='Equal'>M</Field>
  <Field Name='Gender' ComparisonOperator='Equal'>U</Field>
 </Expression>
  </Expression>";
# ------------------ OR ------------------
 query = "<Field Name='Gender' ComparisonOperator='Equal'>F</Field>";

 nextCursor=>1; (optional)
 );
@userRegister.custom_object_get_by_query(objectId, query, nextCursor)

````
<br>
###Custom Object Get All Objects!(objectId, nextCursor)
This API is used to retrieve all records from a custom object.

````
 obejctId = 'xxxxxxxxxx';
 nextCursor = 1; (optional)

@userRegister.custom_object_get_all_objects!(objectId, nextCursor)

````
<br>
###Custom Object Get Stats(objectId)
This API is used to retrieve stats associated with a custom object

````
objectId = 'xxxxxxxxxx';
@userRegister.custom_object_get_stats(objectId)

````
<br>
###Custom Object Upsert(objectId, accountId, param)
This API is used to save custom objects, by providing ID of an object, to a specified account if the object does not exist it will create a new object.

````
 objectId = 'xxxxxxxxxx';
 accountId = 'xxxxxxxxxx';
 param = {
  firstname => 'first name',
  lastname => 'last name',
  gender => 'm',
  birthdate => 'MM-DD-YYYY',
  ....................
  ....................
 }

@userRegister.custom_object_upsert(objectId, accountId, param)

````
<br>
###Custom Object Set Status(objectId, accountId, action)
This API is used to block Custom Object.

````
objectId = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
accountId = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
action = true/false(boolean)
@userRegister.custom_object_set_status(objectId, accountId, action)

````

##Configure Demo:
- Create a new Project in aptana with the name of "userregistration".
- Remove all created files and copy paste Demo files.
- Changed Loginradius site settings in file \app\helpers\application_helper.rb
- Now install all req. Gem file


````
 $ bundle install
````

- Install login_radius-2.0.0.gem file


````
 $ gem install --local LOCAL_FILE_PATH/login_radius-2.0.0.gem
````


- Now run ROR server by following cmd.


````
 $ rails server
````


##Reference Manual
Please find the reference manual [here](http://docs.lrcontent.com/apidocs/ref/ruby/index.html).