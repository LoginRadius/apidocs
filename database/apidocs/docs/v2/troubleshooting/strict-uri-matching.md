Strict URI Matching
====


-------
## Configuration for Facebook

As of March 2018 Facebook has rolled out [Strict URI Matching](https://developers.facebook.com/blog/post/2017/12/18/strict-uri-matching/) enforcing that all the redirect URIs used by a Facebook App need to be listed in the Valid OAuth Redirect URIs.

Failure to implement these changes will result in the following error:

![Warning
Can't Load URL: The domain of this URL isn't included in the app's domains. To be able to load this URL, add all domains and subdomains of your app to the App Domains field in your app settings.](https://apidocs.lrcontent.com/images/Screenshot-2018-03-19-09-36-49_278295aafe74212cf27.45095688.png "Facebook Strict URL Matching error")

Please see the steps below for details on configuring your Facebook app for Strict URI Matching

1. Login to your LoginRadius Admin Console and go to:

	Platform Configuration ➔ Authentication Configuration ➔ Social Login
	
2. Click on the "Facebook" icon under "Configure the selected id Providers"

3. You will be presented the steps to configure Facebook, skip to step 6 and note down the full site URL that is provided:

    ![](https://apidocs.lrcontent.com/images/pasted-image-0_84795eb6aaafc0ce46-83145244_234445ec42c9ce66e36.38052993.png "")
	
	The URL should look like this : https://<< Your LoginRadius sitename >>.hub.loginradius.com:443/socialauth/validate.sauth
	
4. Login to your Facebook App via the following URL: [https://developers.facebook.com/apps/](https://developers.facebook.com/apps/)

5. Once you're logged in to your Facebook App, you will need to get to the Valid OAuth redirect URIs field, and apply the URL from your LoginRadius Admin Console, make sure that the URL is added exactly as shown in the Admin Console.

	Note: The Valid OAuth redirect URIs field may be located at a different location depending on the version of the Facebook App you're using, in the most recent version you can find this field under:
	
	Products ➔ Facebook Login ➔ Settings
	
	The final result should look like so:
	![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-2018-03-19-08-51-09_59975aafdcb54d6294.67838072.png "enter image title here")
 
6. Make sure to hit the "Save Changes" button

## Configuration for Twitter

As of June 2018 Twitter has enforced to [whitelist callback URLs](https://twittercommunity.com/t/action-required-sign-in-with-twitter-users-must-whitelist-callback-urls/105342) that is all the callback URLs used by a Twitter App need to be whitelisted.

Failure to implement call back URL changes will result in the following error:

![enter image description here](https://apidocs.lrcontent.com/images/twitter_err_224855b2100fbdb1aa7.14331054.png "twitter error")

Please see the steps below for details on configuring your Twitter app for Strict URI Matching


1. Login to your LoginRadius Admin Console and go to:

	Platform Configuration ➔ Authentication Configuration ➔ Social Login

2. Click on the "Twitter" icon under "Configure the selected id Providers"

3. You will be presented the steps to configure Twitter, skip to step 3 and note down the call back URL that is provided:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/11_94215eb6aba9a29c79.38270792.png "enter image title here")
<br><br>The URL should look like this : https://<< Your LoginRadius sitename >>.hub.loginradius.com:443/socialauth/validate.sauth
<br><br>**Note:** For HTTP users, the URL should be: http://<< Your LoginRadius sitename >>.hub.loginradius.com/socialauth/validate.sauth
4. Login to your Twitter App via the following URL: [https://apps.twitter.com/](https://apps.twitter.com/)

5. Once you're logged in to your Twitter App, you will need to get to the Valid callback url field, and apply the URL from your LoginRadius Admin Console, make sure that the URL is added exactly as shown in the Admin Console.

	Twitter Login ➔ Twitter App ➔ Settings

	The final result should look like so:
	<br><br>![enter image description here](https://apidocs.lrcontent.com/images/tt1_318365b210df36e1f95.07116197.png "")

6. Make sure to hit the "Update Settings" button.

If you’re still unable to resolve the issue, please raise a support ticket [here](https://secure.loginradius.com/support/support-tickets).