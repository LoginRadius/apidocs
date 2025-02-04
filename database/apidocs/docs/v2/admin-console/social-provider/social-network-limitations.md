# ID provider limitations

After you finish creating apps for different social platforms, we are only granting the basic scoping to start, such as public profile(Facebook), r_basicprofile(Linkedin), etc. If you want to use some more advanced features, like posting status to your social wall or sending direct messages to your contact list, you need to be aware the settings for permissions and API call limitations for different ID providers.

This article covers different kinds of limitations for different social id providers:

1. Facebook
1. Google
1. Twitter
1. LinkedIn

| Provider  | Default Token Lifetime | Rate Limit|
|----------|-------------|------|
|Facebook  |2 hours   |600 calls / 600 seconds |
|Google|never expires    |N/A |
|Twitter  |never expires  |https://dev.twitter.com/rest/public/rate-limiting |
|LinkedIn  |  60 days  |https://dev.twitter.com/rest/public/rate-limiting|


Before moving forward, make sure you check our datapoint page, it provides useful information about the data each provider supports.

###Facebook

For an apps administrator, developer, or testers, they automatically have all permissions to access every datapoint/feature, but for normal users, the app needs to be reviewed first then the users can start to use the advanced features.

Learn how to submit an app for review [here](https://www.loginradius.com/legacy/docs/development/social-network/facebook-app-review).



**Limitations:**

Facebook is going to deprecate the support for Direct Messaging API, which means you can not send a direct message to your friends through the Facebook API. Facebook is going to only support send dialog method which can only be managed by their side, neither on your side nor on the side of LoginRadius.

API call limits: 600 calls / 600 seconds with same IP token

Default token lifetime: 2 hours



**Permissions:**



- Permissions That Do Not Require Review
Public profile (default) permissions. The default includes some basic attributes about the person, which is part of a person's public profile on Facebook. The default permissions are included as part of every permissions request but require slightly different handling on the web and native mobile platforms.
App friends. This optional permission grants your app the ability to read a list of friends who also use your app.
Email permissions. This gives you access to the person's primary email address.


- Permissions That Require Review

Permissions that require review are generally reviewed within 3 business days. Some permissions may take up to 7 days to review and are marked as such in the reference.

Extended profile properties. These permissions are all sensitive properties that may or may not be part of a person's public profile.
Extended permissions, These include the most sensitive pieces of profile information. One of these permissions is publishing stories to a person's Facebook profile. All extended permissions appear on a separate screen during the login flow so a person can decide if they want to grant them.
Open Graph permissions. These permissions are for gaining access to any Open Graph data stored in someone's profile.
Page permission, This permission allows you to administer any Facebook Pages that the person manages.



###Google



**Limitations**

Default token lifetime: It never expires, but it may stop working for the following reasons:

1. The user has revoked access
1. The token has not been used for six months
1. The user account has exceeded a certain number of token requests. (15-25 per user account)


**Permissions:**

You need to activate Google+ API in your google developers console in order to use the APIs that rely on Google+

![enter image description here](https://apidocs.lrcontent.com/images/google_2855658cfb21b718b71.61884740.png "enter image title here")




###Twitter


**Limitations:**

API rate limit: https://dev.twitter.com/rest/public/rate-limiting

Default token lifetime: It never expires

**Permission:**

You need to apply for the permission to write and send a direct message to others.


![enter image description here](https://apidocs.lrcontent.com/images/8_2667958cfb10ad75843.30693925.png "enter image title here")

 
###LinkedIn

 

**Limitations:**

API call limit: https://developer.linkedin.com/documents/throttle-limits

Default token lifetime: 60 days

 

**Permissions:**

In your LinkedIn console, you need to set the scope for your application

Instructions on what each scope means can be found here:

https://docs.microsoft.com/en-us/linkedin/shared/authentication/authentication

![enter image description here](https://apidocs.lrcontent.com/images/9_2980258cfb0f192ad99.86340222.png "enter image title here")
