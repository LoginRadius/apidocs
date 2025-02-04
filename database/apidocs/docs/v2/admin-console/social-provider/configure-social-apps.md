#How do I configure social ID providers?


## Configure Social ID Providers

To activate a Social Login provider for your interface, please follow these steps:

1. Log into your [LoginRadius Admin Console](https://adminconsole.loginradius.com/dashboard)
2. Select the LoginRadius site for your website. 
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/211_165406204164839cfb3.37322749.png "enter image title here")
3. From the menu options on the top select **Platform Configuration → Authentication Configuration → Social Login**. 
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/pasted-image-0-1_270045e7324d8d70650.74486661.png  "")

4. Click on **"Social Providers"** tab on the left and click **"Add/Remove ID Providers"**. 
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/unnamed-1_223885e73276af0f607.62247363.png "")
5. Select the providers you would like to provide Social Login with.
6. Follow the step-by-step guides provided in order to configure the selected providers.

## Remove Social ID Providers

To remove a Social Login Provider for your interface, you simply have to follow the above [Configure Social ID Providers](#configuresocialidproviders0)  steps and then deselect the configured Social ID provider which you want to remove from the interface. 
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/acsp4_22885e934da363b081.75785933.png "")

Once clicked on deselct sign will generate a confirm pop up box. Click on confirm button to remove the social provide. 

![enter image description here](https://apidocs.lrcontent.com/images/acsp3_109355e934e034d56c3.46939883.png "enter image title here")

## Updating Existing Apps

You can reuse existing apps that your website is currently using or update applications to support additional details. You can follow the below steps to handle this:

1. Follow Steps 1-5 as shown above.
2. Once you have selected a Social Provider, go to the step that covers setting valid Redirect URIs or Website URIs and modifies the existing URI to point to the URI as provided in the doc. This will generally be in one of the following formats: 
    - `<LoginRadius Site Name>.hub.loginradius.com`
    - `<LoginRadius Site Name>.hub.loginradius.com:443/socialauth/validate.sauth`
6. Save the configuration and proceed with the rest of the step-by-step guide.

## Impact on changing App

Once you change/update Client ID and Client secret to the configured social provider this will lead to the impact as below:

The user will experience the same behaviour as they have experienced first time while registering with that social provider. The specific social provider will ask for allowing access to email or public profile (whatever data points your app is fetching from that social provider).

LoginRadius will link this account with the existing profile (based on the email address), so it will generate new provide [ID](https://www.loginradius.com/legacy/docs/getting-started/introduction/glossary) but [UID](https://www.loginradius.com/legacy/docs/getting-started/introduction/glossary)  will remain the same and will not change. And for each of these users, there will be 2 social provider IDs under the same UID.

>**Note:** It will not impact those users who have registered via the standard registration process or the users who have logged in via social providers other than that updated one.

We recommend that you verify the changes on your dev app first, and if all looks good, then port the same changes in your live environment.



> **Additional Note**: We also provide a feature under which you can create multiple instances of same social provider on your Login/Registration page.

> For more details refer to our document on configuring [Multiple Social Apps](https://www.loginradius.com/legacy/docs/api/v2/admin-console/social-provider/multiple-social-apps/).