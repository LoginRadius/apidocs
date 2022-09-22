#Twitter App Review
----

Unlike other Social Providers, Twitter does not require you to go through an App Review process for additional permissions/scopes. Instead they require you to explicitly configure your Twitter App in order to be able to gain access to the desired permissions/scopes. 

Another notable difference with Twitter is that by default, Twitter does not give you acccess to the customer's email upon a successful social login. You can follow the steps below to gain access to the customer's email. 

####How to Request Email Addresses from Twitter

In order to retrieve a user's Email address during the authentication process, Twitter requires you to request permission. You can follow the below steps to request access to this field from Twitter and have the Email returned in the normalized LoginRadius User Profile Data. 

1. Navigate to your [Twitter Apps](https://apps.twitter.com/). 

2. Select Your Twitter App that needs Email address during the authentication process.

3. Go to Settings tab and add your Privacy Policy and Terms of Service URLs (They are required to get emails from twitter)

    ![twitter settings add PP & ToS](https://apidocs.lrcontent.com/images/Screen-Shot-2017-05-23-at-3-21-34-PM_156795924b80a979ec7.86103592.png "twitter settings add PP & ToS")

5. Navigate to the Permissions tab. There will be a new section called "Additional Permissions". Enable the "Request Email addresses from users" permission. Once this is complete, the Email address will be returned in the LoginRadius User Profile.

    ![enter image description here](https://apidocs.lrcontent.com/images/Twitter3_2474558cfb9c8d783b9.13752949.png "")
