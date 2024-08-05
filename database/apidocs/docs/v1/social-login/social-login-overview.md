Social Login Overview
===
---

##Basic Setup#
The Basic Setup will show you how to setup social login via the LoginRadius Admin Console, as well as demonstrate the basics of the social login workflow. For a more technical overview scroll down to [Advanced Setup](#advancedsetup4).
___
###Requirements###
You will need to have the following details gathered before beginning the integration process.

1. A LoginRadius account.
2. A site configured that you will implement Social Login on. This site can be a dev, staging, local, or live site.
3. Developer accounts for your desired social ID providers.


###Social Login Implementation Flow Chart###
   ![2 Image](https://files.readme.io/9650681-Setup-and-Configuration-of-a-LoginRadius-Account.png "2 image")
###Steps to Implement:###
Below is an overview of the process you will take when setting up LoginRadius Social Login on your site.

1. If you already have an account, login to your LoginRadius Admin Console [here](https://secure.loginradius.com/account). Otherwise,​ you can get signed up for a new site  [here](https://www.loginradius.com/pricing).
2. Select your LoginRadius site from the drop-down list in the upper right corner.

3. Navigate to API Configuration -> Social Login on the top panel.

4. You will land on the site configuration tab and will need to include the Website URL on this page.

5. Next, navigate to API Configuration > Social Login. Select your desired providers and follow the displayed step-by-step guides to [configure the Social Provider apps](/api/v2/admin-console/social-provider/configure-social-apps) that will service your account.

6. You will now need to configure the selected Social Providers.

7. Next add the interface code to your webpage.

8. With the initial interface, you are now able to get users logging into your site. With a successfully authenticated user, you can now access the additional APIs we have available, either through our APIs detailed [here](http://apidocs.loginradius.com/), or through the built in features of our [CMS plugins](/api/v1/cms-turn-key-plugins/cmsplugins/general-cms-integrations) .

9. (Optional) Setup a custom interface branded to your site's theme. Follow [these instructions](http://support.loginradius.com/hc/en-us/articles/203357307-How-do-I-setup-a-fully-customizable-interface-) to replace the default LoginRadius interface with a custom interface. (Available with Pro Essentials and higher plans)

10. (Optional) Select extended permissions for accessing our advanced APIs by navigating to your LoginRadius Admin Console->Social Login->Social Data Settings and check off the desired permissions for each provider. (Available with Pro Essentials and higher plans)



___

##Advanced Setup##



In this section, you will familiarize with yourself with LoginRadius social login APIs, including how to set your account up, how to use the most common Social APIs and all the advanced APIs you might need to use in the future.

The below chart goes over the logical flow of the Social login system and the process for retrieving data from the Social Providers.
![enter image description here](https://apidocs.lrcontent.com/images/Social-Sequence_1715958ac099c6683e7.20175363.png "")



1. Display the Social Login interface on your page, using either a pre-defined template or the fully customizable interface.
2. Once a user has selected the Social Provider they would like to use they will be prompted to input their credentials in an authentication interface that is managed by the Social Providers. Permission to access their data will also happen at this time.
3. After successful authentication the interface will return a [Request-Token](http://support.loginradius.com/hc/en-us/articles/203885385-About-LoginRadius-Tokens) to your page.
4. Using the Request-Token you can generate a LoginRadius Access-Token([Access-Token API](/api/v1/social-login/access-token)) for use with the API calls.
5. The [Access-Token](http://support.loginradius.com/hc/en-us/articles/203885385-About-LoginRadius-Tokens) will be returned in JSON format for use with additional API calls.
6. Request [User Profile data](/api/v1/social-login/user-profile) or extended data like [Groups](/api/v1/social-login/group) and [Contacts](/api/v1/social-login/contact) via the LoginRadius Social APIs. If the user has granted permissions you can also [message friends](/api/v1/social-login/post-message-api) or do [Push Notifications](/api/v1/social-login/post-status-posting).
7. All of the API endpoints return normalized responses in JSON format. View all available datapoints [here](https://www.loginradius.com/datapoints/).
