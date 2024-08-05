# Python Library

---

> Disclaimer
> This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

##Introduction
LoginRadius offers a complete social infrastructure solution combining 30 major social platforms into one unified API. With LoginRadius, websites and mobile apps can integrate social login, enable social sharing, capture user profiles and social data, create a single sign-on experience for their users, and get comprehensive social analytics. Our social solution helps websites engage, understand, and leverage their users.

This module provides a wrapper for urllib2 or the requests library to easily access the API from 'https://api.loginradius.com/' in a more "pythonic" way. Providing easier access to essential data in a few lines of code. This will work with 1.0 or 2.0 API specifications.

For more information, visit: http://loginradius.com/

##Quickstart guide
This guide should help you install and utilize LoginRadius and its feature set quickly and painlessly. For more details, please see examples.

###Install
####Prerequisites
You will need at least Python - 2.7 or greater. LoginRadius module utilizes the [namedtuple](https://docs.python.org/2/library/collections.html#collections.namedtuple) from the collections library and the [import_module](https://docs.python.org/2/library/importlib.html) from importlib.

###From Package
Using pip

```
 pip install loginradius
```

<br>
or with easy_install

```
 easy_install loginradius
```

<br>
###From Source
You can download the latest version from PyPI
- Unzip/untar the files.
- Browse to the directory that you extracted the files to.
- Run:
```
python setup.py install
```
To install the LoginRadius module.

####Using the LoginRadius Object to access Social Login APIs
import the class

```
 from LoginRadius import LoginRadius
```

<br>
When you initialise your application, you will need to set your API Secret. This can be found in your control panel under your [Admin-console:](https://secure.loginradius.com/account#Admin-console)

When your Python application first starts up, you should set your API Secret once and only once

```
 LoginRadius.API_SECRET = "some-really-obscure-string"
```

<br>
When you receive a callback from LoginRadius after a user has authenticated with their provider it will come with a token parameter. For example, with python in CGI we can do:

```
import cgi
arguments = cgi.FieldStorage()
token = arguments.getvalue('token')
```

<br>
This is highly dependent on your framework. You should browse some of our [Examples and Use Cases](/api/v1/sdk-libraries/python) for one that fits with your web framework and code flow.

We can now construct a LoginRadius object with respect to this token.

```
login = LoginRadius(token)
```

<br>
Doing so will make an HTTP request to LoginRadius for the access token. Not to be confused with the token we just received from our callback. This new token is the basis for all API calls to LoginRadius.

With our newly constructed object, we can perform any API call listed in the online API help document. As long as your plan is set up to do so! For example, the [basic profile data](/api/v1/social-login/user-profile) is available to anyone.

We can access the profile information from the login object as a namedtuple.

```
 if login.access.valid():
    print ("Hello there, " + login.user.profile["FirstName"] + ".")
```

<br>
We first check to see if our token hasn’t expired. Be wary that storing a LoginRadius object for too long may cause the token to become invalid. The default time, at the time of writing this guide, is fifteen minutes.

The next line of code embedded in the if statement prints the user’s first name.

This data is normalized across all data providers and is stored as a python dictionary to adapt to the API if changes are made at a later date. To view all up to date items available to you in the dictionary, visit:

https://www.loginradius.com/datapoints/

The thought process behind the LoginRadius object is to provide easily accessible functions with minimal arguments. It only loads data when needed.

##Using the LoginRadius Object to access User Registration APIs
Import the class

```
from UserRegistration import UserRegistration as UR
```

<br>
create a UserRegistration object using your unique LoginRadius API Key and Secret.

```
UR.API_KEY = "some-really-obscure-string"
UR.API_SECRET = "some-really-obscure-string"
ur = UR()
```

<br>
To call any User Registration APIs. Follow the format: ur.user.Method_name
<br>
Example: ur.user.get_user_by_email('example@example.com')
<br>
**Note:** payload parameter is in json format. Example: payload ={"emailid":"example@example.com", "password":"12345678"}

<br>
###CREATE USER
 [Try This](/api/v1/user-registration/user-create)

```
 ur.user.create_user(payload)
```

<br>
###REGISTER USER
[Try This](/api/v1/user-registration/user-registration)

```
ur.user.register_user(payload)
```

<br>
###UPDATE USER
[Try This](/api/v1/user-registration/user-update)

```
ur.user.edit_user(userid, payload)
```

**userid:** The LoginRadius user identifier for a particular social platform(like "Facebook", "Twitter") attached with that user account.

<br>
###UPDATE USER BY TOKEN
[Try This](/api/v1/user-registration/user-update-by-access-token)

```
ur.user.update_user_by_token(token, payload, emailverificationurl, template)
```

<br>
###UPDATE ACCOUNT
[Try This](/api/v1/user-registration/account-update)

```
ur.user.update_account(accountid, payload):
```

<br>
###DELETE USER WITH EMAIL CONFIRMATION
[Try This](/api/v1/user-registration/user-delete-with-email-confirmation)

```
ur.user.delete_user_with_email_confirmation(userid, deleteuserlink, template)
```

<br>
userid: The LoginRadius user identifier for a particular social platform(like "Facebook", "Twitter") attached with that user account. deleteuserlink: The link handles the delete logic. template: Name of email template. Not required.

<br>
###USER AUTHENTICATION BY USERNAME
[Try This](/api/v1/user-registration/user-authentication)

```
ur.user.authenticate_user(username, password)
```

<br>
###GET USER PROFILE BY USER ID
[Try This](/api/v1/user-registration/user-profile-by-id)

```
ur.user.get_user_by_id(userid)
```

<br>
###GET USER PROFILE BY EMAIL
[Try This](/api/v1/user-registration/user-profile-by-email)

```
 ur.user.get_user_by_email(emailid)
```

<br>
###CHECK USER EMAIL AVAILABILITY
[Try This](/api/v1/user-registration/user-email-availability)

```
 ur.user.check_email(emailid)
```

<br>
###LINK ACCOUNT
[Try This](/api/v1/user-registration/account-link)

```
 ur.user.link_account(accountid, provider, providerid)
```

<br>
###UNLINK ACCOUNT
[Try This](/api/v1/user-registration/account-unlink)

```
 ur.user.unlink_account(accountid, provider, providerid)
```

<br>
###BLOCK/UNBLOCK ACCOUNT
[Try This](/api/v1/user-registration/account-block-unblock)
```
 ur.user.set_status(uid, action)
```

<br>
###CREATE REGISTRATION PROFILE
[Try This](/api/v1/user-registration/user-create-registration-profile)

```
 ur.user.create_raas_profile(accountid, password, emailid)
```

<br>
###GET USER PROFILES
[Try This](/api/v1/social-login/user-profile)
<br>
For ex: A user has linked facebook and google account then this api will retrieve both profile data.

```
 ur.user.get_account(accountid)
```

<br>
###SET USER EMAIL
[Try This](/api/v1/user-registration/user-email-add-remove)

```
 ur.user.add_or_remove_user_email(accountid, action, EmailId, EmailType)
```

<br>
###FORGOT PASSWORD TOKEN
[Try This](/api/v1/user-registration/user-password-forgot-token)

```
 ur.user.generate_forgot_password_token(email)
```

<br>
###INVALIDATE EMAIL
[Try This](/api/v1/user-registration/email-invalidate)

```
 ur.user.invalidate_email(accountid)
```

<br>
###PASSWORD RESET
[Try This](/api/v1/user-registration/account-password-reset)

```
 ur.user.password_reset(password, vtoken)
```

<br>
###ACCOUNT DELETE
[Try This](/api/v1/user-registration/account-delete)
```
 ur.user.delete_account(accountid)
```

<br>
###CHANGE ACCOUNT PASSWORD
[Try This](/api/v1/user-registration/account-password-change)

```
 ur.user.change_password(accountid, oldpassword, newpassword)
```

<br>
###GET ACCOUNT PASSWORD
[Try This](/api/v1/user-registration/account-password-get)

```
 ur.user.get_account_password(accountid)
```

<br>
###SET ACCOUNT PASSWORD
[Try This](/api/v1/user-registration/account-password-set)

```
 ur.user.set_password(accountid, password)
```

<br>
###CHANGE USERNAME
[Try This](/api/v1/user-registration/account-username-change)

```
 ur.user.change_username(accountid, oldusername, newusername)
```

<br>
###CHECK USERNAME
[Try This](/api/v1/user-registration/account-username-check-client-server)

```
 ur.user.check_username(username)
```

<br>
###TOKEN VALIDATE
[Try This](/api/v1/user-registration/token-validate)

```
 ur.user.check_token_validate()
```

<br>
###ACCESS TOKEN INVALIDATE
[Try This](/api/v1/user-registration/token-invalidate)

```
 ur.user.check_token_invalidate()
```

<br>
###DELETE ACCOUNT WITH EMAIL CONFIRMATION
[Try This](/api/v1/user-registration/account-delete-with-email-confirmation)

```
 ur.user.delete_account_with_email_confirmation(accountid, deleteuserlink)
```

<br>
###SET USERNAME
[Try This](/api/v1/user-registration/account-password-set)

```
 ur.user.set_username(accountid, newusername)
```

<br>
###RESEND EMAIL VERIFICATION
[Try This](/api/v1/user-registration/user-verification-email-resend)

```
 ur.user.resend_verification_email(emailid, link, template)
```

<br>
###GET CUSTOM OBJECT BY ACCOUNT ID
[Try This](/api/v1/user-registration/get-object-by-accountid)

```
 ur.user.get_custom_object_by_accountid(objectid, accountid)
```

<br>
###GET CUSTOM OBJECT BY MULTIPLE ACCOUNT IDS
[Try This](/api/v1/user-registration/custom-object-by-multiple-accountids)

```
 ur.user.get_custom_object_by_accountids(objectid, accountids)
```

<br>
###GET CUSTOM OBJECT BY QUERY
[Try This](/api/v1/user-registration/custom-objects-by-query)

```
 ur.user.get_custom_object_by_query(objectid, q, cursor)
```

<br>
###GET CUSTOM OBJECT STATISTICS
[Try This](/api/v1/user-registration/custom-object-stats)

```
 ur.user.get_custom_object_stats(objectid)
```

<br>
###UPSERT CUSTOM OBJECT
[Try This](/api/v1/user-registration/custom-object-create)

```
 ur.user.upsert_custom_object(objectid, accountid, payload)
```

<br>
###BLOCK/UNBLOCK CUSTOM OBJECT
[Try This](/api/v1/user-registration/delete-custom-object-set).

```
ur.user.set_custom_object_status(objectid, accountid, action)
```

<br>
###CHECK CUSTOM OBJECT
[Try This](/api/v1/user-registration/custom-object-check)

```
ur.user.check_custom_object(objectid, accountid)
```

<br>
##Breaking Down the LoginRadius Object
Like our previous example, profile is not the only attribute available to you.

- api

This should only be used in cases where you want direct access to the LoginRadiusAPI object without our wrapper. It is highly advised against using this attribute at all.

The api attribute is class of: LoginRadius.LoginRadiusAPI

- access

  Contains useful information about the access token.

- expire<br>

  A string containing the date when this access token is no longer valid.

- raw

  A dictionary containing the raw JSON response from LoginRadius for the token.

- token

  This is our access token. Essentially for every API call.

- valid()

  Invoking this will return a True or False boolean for if the access token is still valid. It is useful to check before making an API call. This method will only compare the stored expired attribute date and current UTC time. It will not make a remote call to the server to validate.

- error

  A string of the last error message encountered.

- settings

  HTTP library settings for encoding requests.

- library

  Stores a string of the HTTP library currently being used with the LoginRadius object. Currently, this value can either be ‘urllib2’ or ‘requests’. Please call \_settings(library) and not this if you intend to change it.

- urllib

  imported module of urllib.

- urllib2

  imported module of urllib2.

- json

  imported module of json.

- requests

  imported module of requests

* token

The original token from the callback.

- user

Some of these attributes may not pull any data. Please check your endpoints at https://www.loginradius.com/datapoints/

All of these attributes, by default, set raw=False to normalize data.

- profile

  Information from the user’s profile with respect to the current provider.

- photo

  Photos with regards to the album_id attribute.

  - album_id

  A string of the album_id to be set before retrieval.

- check_in

  Get a list of checked in places from this profile.

- album

Get a list of albums available on this profile.

- audio

  Get a list of audio available on this profile.

- video

  Get a list of uploaded videos on this profile

- contacts

  Get a list of contacts, you can also specify a next_cursor attribute.

  - next_cursor

    An optional string for the next cursor.

- status

  Get a list of status updated on this profile.

- group

  Get a list of groups from this profile.

- event

Get a list of events from this profile.

- mention

  Get a list of mentions from this profile.

- activity

  Get a list of activities from this profile.

- following

  Get a list of following from this profile.

- page

  Get page data with respect to what this user’s profile can see.

  - page_name

    A string containing the unique identifier for the page to fetch data from.

- like

  Get a list of likes from this profile.

- status_update(status, title='', url='', imageurl='', caption='', description='')

Perform a status update on the profile on behalf of the user. Some of these arguments may be ignored depending on the provider.

- direct_message(to, subject, message)

  Direct message another user on behalf of this user.

<br>
##Exceptions
###Handling Exceptions
A list of specific exceptions are in LoginRadius.Exceptions<br>
However, there is a catch all class from which all LoginRadius exceptions inherit from LoginRadius.LoginRadiusExceptions.

```
 from LoginRadius import LoginRadiusExceptions

try:
    print login.user.profile['FirstName']

except LoginRadiusExceptions:
    print "Something went wrong!"
    print login.error
```

<br>
The error attribute to your LoginRadius object contains a string that may help you solve why this exceptions was raised in the first place.

##Examples and Use Cases
You can find fully functional examples in examples/ in the repository.
###Accessing Raw Provider Data
If you do not want normalized data, but instead the raw return with respect to the provider, you must enable it.

````
#Let's get their first name but with the raw response from Facebook
login = LoginRadius(token)
login.user.profile.set_raw(True)
print "Hello there," + login.user.profile['first_name']```

<br>
>Warning<br>
This will of course depend on the provider each user logs in with, and it is only recommended for advanced users where normalized data is not applicable.
This will only set profile requests to raw, and not other attributes, such as status.


<br>
### Example for Get Request

````

#Let's get photo from your album
login = LoginRadius(token)
login.user.photo.album_id = 'YOUR_ALBUM_ID'
print login.user.photo```
<br>

### Example for Post Request

````
#Let's update status on your facebook wall
login = LoginRadius(token)
print login.user.status_update(status, title='', url='', imageurl='', caption='', description='')```
<br>
###Preloading Data
To reduce load times, you probably don’t want to make an external HTTP request while populating your templates. If you know what data you need beforehand, we should fetch it.

First, we should understand what happens in a normal use case.

````

login = LoginRadius(token)

#Your code here

#This makes a GET request and will be blocking.
print "Hello there," + login.user.profile['FirstName']

#We already called profile, and all this data is already loaded into the dictionary.
#This is non-blocking now.
print "What can I do for you today, " + login.user.profile['FirstName'] + "?"

```
<br>
The first time you call any attribute will block and fetch the data remotely from LoginRadius. After doing so, it is saved with respect to the attribute of our object.

However, this is not always optimal. You could call this in a thread and prepare the response in the meantime. While threading is beyond the scope of this document, here is how you load the data preemptively.

<br>
```

login = LoginRadius(token)

#Let's make sure the data is available to us.
login.user.profile.load()

#Your code here.

#This makes a GET request and will be non-blocking now.
print "Hello there," + login.user.profile['FirstName']

#We already called profile, and all this data is already loaded into the dictionary.
#This is non-blocking now.
print "What can I do for you today, " + login.user.profile['FirstName'] + "?"

```
<br>
Invoking load on any user attribute will fetch the data.

<br>
###Changing HTTP Libraries
By default, the requests module will be picked if it is version 2.0 or greater. However, you can override this and change it as you see fit.

Checking current library after constructing a LoginRadius object.

```

login = LoginRadius(token)
print login.settings.library

```
<br>
Changing the library for one LoginRadius object.

```

login = LoginRadius(token)

#Let's opt in for urllib2 instead of requests

login.change_library("urllib2")

```
<br>
Valid options are only ‘urllib2’ or ‘requests’.

Changing the library for all future constructed LoginRadius objects.

```

from LoginRadius import LoginRadius

#Changing to the urllib2 library
LoginRadius.LIBRARY = "urllib2"

```

<br>
##Reference Manual
###Data Points
When you access the python dictionary with respect to each attribute of the object, it is parsing the information reflected in this [document](https://www.loginradius.com/datapoints).

<br>
>Warning<br>
These data points are subject to change and vary with providers.

For example

```

print login.user.profile['NickName']

```
<br>
May work for some providers like Mixi, but will not work for Facebook. Instead, you would get a key value error.

###REST API
You can take advantage of the [raw API](/) if you wish and learn how it works.


Please find the reference manual [here](https://docs.lrcontent.com/apidocs/ref/python/source.html)
```
