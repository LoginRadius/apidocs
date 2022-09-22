SAML (Security Assertion Markup Language)
=====

-------
LoginRadius supports SAML, and through SAML you can authorize your SAML supported app.

A few quick points about the LoginRadius SAML integration:

1. LoginRadius acts as an Identity Provider (idp), meaning LoginRadius can authorize your app, your app will act as a Service Provider (sp)
2. LoginRadius supports both Identity Provider initiated and Service Provider initiated login flow
3. LoginRadius support Single Logout (SLO)
4. LoginRadius doesn't support HTTP Artifact

##Identity Provider Initiated Login

![enter image description here](https://apidocs.lrcontent.com/images/loginradius_1787858a599e61a64d2.19882177.png "")

In this LoginRadius initiates the login process and you the service provider handles the login process. For this process the login URL is

https://`<YOURLOGINRADIUSSITENAME>
`.hub.loginradius.com/SAML/IdpInitiatedSSO.aspx

## Service Provider Initiated Login
![enter image description here](https://apidocs.lrcontent.com/images/loginradius_821958a59b65d59587.14494123.png "")

In the Service Provider initiated Login you, the service provider, initiate the login process. LoginRadius will validate the login request and respond to this request. For this process the login URL is

https://`<YOURLOGINRADIUSSITENAME>`.hub.loginradius.com/SAML/spInitiatedSSO.aspx


## Single Logout (SLO)
You can request to be logged out on LoginRadius, this request will log out your users from all SSO sites. For this request the logout URL is

https://`<YOURLOGINRADIUSSITENAME>`.hub.loginradius.com/SAML/SLOService.aspx

##LoginRadius SAML settings
Please contact LoginRadius support to configure and setup SAML with your account.

These settings are available to configure

**AppName **: Any unique name which will be used by LoginRadius to identify the provider that the request is originating from.

**Audiences** : Provided by service provider, read more about it on SAML specs

**IdpCertificate** : Certificate of Identity Provider, you must provide Certificate and Key

**SpCertificate** : Certificate of Service Provider, you must provide Certificate of Service Provider, get it from the Service Provider.

**NameIdFormat** : Provide name Id format which is supported by Service Provider, the default is urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified

**AssertionConsumerService: Some parameters of Assertion Consumer Service, Provide the following properties**

1. **Binding** : binding of request, default value is urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST
2. **Location** : URL of Assertion service URL

###AvailableAttributes 
Key value pair of attributes, if value is auto property than put inside this syntax {{`<LoginRadius Userprofile property name>`}}

Allowed Attributes

- ID
- Provider
- FirstName
- MiddleName
- LastName
- FullName
- NickName
- ProfileName
- BirthDate
- Gender
- Website
- Email
- Country
- ThumbnailImageUrl
- ImageUrl
- Favicon
- ProfileUrl
- HomeTown
- State
- City
- Industry
- About
- TimeZone
- LocalLanguage
- CoverPhoto
- TagLine
- Language
- Verified
- UpdatedTime
- PhoneNumbers
- IMAccounts
- Addresses
- MainAddress
- Created
- LocalCity
- ProfileCity
- LocalCountry
- ProfileCountry
- RelationshipStatus
- Quote
- Religion
- Age
- Company
- Uid
- IsEmailSubscribed
- NoOfLogins

**LoginUrl **: Login page URL if user is not already logged in.

**AfterLogoutUrl** : Service provider logout URL, LoginRadius will redirect to this URL after logout