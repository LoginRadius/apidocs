Desk.com Single Sign-On Authentication
=====

-------

Desk.com uses multipass authentication for user authentication and allows Single Sign-On (SSO) between your website and the desk.com support portal.

In order to authenticate users on your desk.com support portal, you have to pass multipass (encoded data), which is generated with user's information.

##Process for generating multipass and providing SSO
1.First of all, you need to build user data by using the following attributes that contain user information at your system.

|Key|	Required|	Value|
|--------|-----|----------|
|uid|Yes|Unique string of the user - This is the unique identifier of the user in your system, such as their guide or auto incremented id.|
|expires|Yes|Multipass expiration date in ISO 8601 format - This is to expire the hash after a given period of time for security purposes.|
|to|No|Absolute URL to redirect the user after successful login - If this is not provided, users are either redirected to the original page they were viewing/attempting to view on your portal, or they are redirected to your portal's home.|
|customer_email|Yes|Customer's email address|
|customer_name|Yes|Customer's name|
|customer_custom_key|No|The custom customer field identified by key|

Example of user information:

```
 $user_data = array(

'uid' => '123abc',

'customer_email' => 'testuser@yoursite.com',

'customer_name' => 'Test User',

'expires' => date("c", strtotime("+5 minutes"))

);

```
2.After that, generate a multipass token using the PHP SSO SDK from desk.com:   
https://github.com/assistly/multipass-examples/blob/master/php.php

In order to obtain multipass and signature, you will need to pass in the user data (user data obtained in step 1), subdomain variable (which is provided by desk.com), and API_key (which is provided by desk.com) into the above PHP SDK.

Desks.com's PHP SDK (mentioned above) will generate a multipass and signature. The multipass will contain user data in a securely encoded format. The signature is required to ensure that the received multipass is indeed coming from you (essentially from your master system) and the data is not tampered with.

3.Finally, add the generated multipass and signature to the following desk.com URL query parameters. This will perform the Single Sign-On with Desk.com, and redirect the user to this URL.   
```
http://yoursite.desk.com/customer/authentication/multipass/callback?multipass=**MULTIPASS**&signature=**SIGNATURE**
```

**MULTIPASS**: Add multipass generated in step 2.

**SIGNATURE**: Add signature generated in step 2.

For more details about the Desk.com multipass SSO, please visit: http://dev.desk.com/guides/sso/
