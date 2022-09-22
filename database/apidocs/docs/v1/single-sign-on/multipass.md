Multipass
========

--------
The simplest method of SSO to pass authentication state to SSO site, Through LoginRadius multipass integration you can enable your site to allow user to get login.

A few quick points about the LoginRadius Multipass integration:



1. LoginRadius acts as an Identity Provider, meaning LoginRadius can authorize your app, your app will act as a Service Provider
2. LoginRadius support two apps directly, Desk.com and Shopify
3. LoginRadius support Single Logout (SLO)
4. Customizable properties

##1. Login
If user is not logged in on your service provider app, than redirect user to LoginRadius Multipass SSO URL, this validate your request and response with your defined request

Login URL is

https://`<YOUR LOGINRADIUS SITE NAME>`.hub.loginradius.com/Multipass/login.aspx

Response will be encrypted with on encryption which you set in settings.

LoginRadius support following encryption algorithms

###Signing



1. HMAC_SHA1
2. HMAC_SHA256
3. MD5
4. SHA1

###Encryption



1. AES128-cbc
2. Shopify style encryption and encoding
3. Desk.com style encryption and encoding

##2. Logout
You can request logout on LoginRadius by redirecting logout request on LoginRadius Multipass logout URL.

Logout URL is

https://`<YOUR LOGINRADIUS SITE NAME>`.hub.loginradius.com/multipass/logout.aspx

##LoginRadius Multipass settings
Please contact LoginRadius support to configure and setup Multipass with your account.

**AppName** : any unique name, on basis of this LoginRadius identify for which service provider request come

**Credentials**: Encryption key and secret.

**Attributes**: Key value pair of attributes, if value is auto property than put inside this syntax {{`<LoginRadius Userprofile property name>`}}

**LoginUrl** : Login page URL if user is not already logged in.

**AfterLogoutUrl** : Service provider logout URL, LoginRadius will redirect to this URL after logout