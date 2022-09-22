# Overview

Sign In with Apple is Apple's new authentication method for customers to sign-in in LoginRadius apps and websites with an Apple Id. Sign In with Apple allows the customers to choose randomly-created unique email addresses rather than their real email address with LoginRadius applications. Sign In with Apple uses OAuth and OIDC to authenticate LoginRadius apps and returns code and id_token to the configured LoginRadius URL. You can set a social Provider configuration in LoginRadius to verify the id_token from Apple and give access to the customer into LoginRadius apps and websites. It requires configuring the Apple developer account and configuration under social provider settings in LoginRadius Admin console to enable Sign In with Apple in LoginRadius. Here are the step by step instructions to set up Sign In with Apple in LoginRadius:

## Implement Sign in with Apple

With **Sign In with Apple**, you can include LoginRadius Apple authentication for your native Apple applications, web applications, or applications that run on other platforms (such as Android).

## Prerequisites
- Apple Developer account(https://developer.apple.com/programs/), which is a paid account with Apple. (There is no free trial available unless you are part of their iOS Developer University Program.)
- Configure LoginRadius Registration

>**Note:** This document presumes that you have worked through the client-side implementation to setup your LoginRadius User Registration interfaces that will actually serve the initial registration and login process. Details on this can be found in the getting started guide.

## Apple Developer account configuration

- Go to https://developer.apple.com/account.
- Sign in with Apple ID and password for your developer account.
- After login, you need to create the following keys.
    - Identifiers
    - Service ID(Only for Websites), Keys.

### Create Identifiers

- Click Certificates, Identifiers & Profiles section from the Apple developer dashboard -> Side Panel or you can click this via the quick link. 

    ![](https://apidocs.lrcontent.com/images/1_259065ea17532c84273.91507626.png)

- Now, click Identifiers from the sidebar on the next screen and click (+) button next to Identifiers to add an App.

    ![](https://apidocs.lrcontent.com/images/2_189905ea1755ea885a3.93735147.png )

- Enter any value for Description and Bundle ID. The Bundle ID represents the app's unique identifier. Example Bundle ID:- com.loginradius.AppleSignIn 

    ![](https://apidocs.lrcontent.com/images/3_106275ea17589caa3d1.14835858.png)

>**Note: In case of Native Apple Sign In (iOS)** the value of the bundle identifier in the apple developer account configuration should be the same as the value of bundle identifiers in your Xcode app project.

- Scroll down under the Capabilities section and click the check-box next to Sign In with Apple. 

    ![](https://apidocs.lrcontent.com/images/4_268765ea175a99e20e2.21084539.png)

- Click the Continue and then Register button on the next screen.
 
### Create a Service ID(Only for Websites)

If you also want to implement apple sign in on the website then you will be required to configure the additional web configuration in the apple account.

- Now, click **Identifiers** from the sidebar on the next screen and click (+) button next to Identifiers to add an App.

    ![](https://apidocs.lrcontent.com/images/5_4705ea175c91a8281.79192516.png )

- Select **Services IDs** under Register a New Identifier and click the **Continue** button.

    ![](https://apidocs.lrcontent.com/images/6_88025ea175ef76f5c8.72938314.png)

- Enter any value for the **Description** and **the Identifier** (see screenshot below). The customer will see the value of the Description as the name of the app during the login flow. The value of the Identifier will be used as the client_id in OAuth workflow.

    ![](https://apidocs.lrcontent.com/images/7_278115ea1761279e033.47909262.png)

- Select the checkbox next to Sign In with Apple (as given in above screenshot) and click Configure, a pop box will appear as below. 

    ![](https://apidocs.lrcontent.com/images/8_6785ea1763302f731.69282628.png)

- In this page select the App ID (which you have created in the last section) from the **Primary App ID** dropdown option

    ![](https://apidocs.lrcontent.com/images/9_39705ea176525c9514.87644403.png)

- Enter your Web Domain value and enter
https://&lt;sitename&gt;.hub.loginradius.com:443/socialauth/validate.sauth in the Return URLs. After a successful login, Apple will send the OIDC scope Id_token to this URL.
- Click the **Save** button and once the detail is saved, click **Continue** (see below).

    ![](https://apidocs.lrcontent.com/images/10_311275ea176848f6ef3.27057964.png)

- In the next window review your configuration and click the **Register button**.

    ![](https://apidocs.lrcontent.com/images/11_181435ea176a26ca146.54864669.png)

### Create Keys

- In Certificates, Identifiers & Profiles, select Keys from the sidebar, then click the Add button (+) in the upper-left corner. 

    ![](https://apidocs.lrcontent.com/images/12_225885ea176c2db5ad3.11721142.png)

- In Key Name, register a New Key, enter a unique name for the key.

- Under Capabilities, select the checkbox next to Sign In with Apple and click the Configure button 

    ![](https://apidocs.lrcontent.com/images/13_218625ea176e53479e8.53596347.png)

- Select the primary App ID you have created earlier(Identifiers) in the Choose a Primary App ID dropdown and click Save Button

    ![](https://apidocs.lrcontent.com/images/14_76375ea1770825f4e4.76286796.png)

- Click the Register button. 

    ![](https://apidocs.lrcontent.com/images/15_188665ea17729a0a455.73018104.png)

- Apple will generate a new private key for your app. Click **Download** to download the key. Save this file in a secure place because the key is not saved in your developer account and you won’t be able to download it again. If you download the key, it will be saved as a text file with a .p8 file extension on your computer. 


![](https://apidocs.lrcontent.com/images/16_101885ea177456163a2.39042591.png)

## Configuration in LoginRadius Admin Console

After Apple developer account configuration, to integrate Sign in with Apple in your site, you need to add all the required information in the social provider section for the respective provider. 

**Step 1:** Login to your Admin Console account and Navigate to **Platform Configuration> Authentication Configuration > Social Login > Social Providers**. 

The following screen will appear:

![enter image description here](https://apidocs.lrcontent.com/images/pasted-image-0-7_37545e959d04d462e7.84786052.png "")

**Step 2:** Click on Apple Social ID Provider and follow the step by step guide for configuration. 

The following screen displays the configuration steps window:

![enter image description here](https://apidocs.lrcontent.com/images/pasted-image-0-8_292675e959d594f83b3.19381199.png "")

**Step 3:** Add the following information in the Apple App configuration section in LoginRadius Admin Console, which you have obtained while following  **Step 2** and click on **Generate**.

* Services ID Identifier(Client ID)
* Bundle ID(Only for Mobile)
* Team ID
* key ID
* Client Secret SignIn Key

The following screen displays the configure Apple App section:

![enter image description here](https://apidocs.lrcontent.com/images/pasted-image-0-9_37495e959df15c36e4.65677539.png "")

**Step 4:** After clicking on generate, web secret and app secret will be generated and then click on Save. The following screen will appear:  

![enter image description here](https://apidocs.lrcontent.com/images/apple_7265e9ece2c11ce31.96605223.png "enter image title here")

## How to obtain the Configuration fields

As there are multiple required configuration fields from Apple Developer Account, we have explained the complete steps to obtain each of them in the below steps.
    
### How to Obtain Service ID Identifier?
To obtain service ID, you can open the link https://developer.apple.com/account/resources/identifiers/list/serviceId and find the service id that you created for your web application. After that click on the selected id and copy the Identifier value.    

![](https://apidocs.lrcontent.com/images/17_217245ea17764007ad1.25549528.png)

### How to Obtain a Bundle ID?
For the bundle ID, open the link https://developer.apple.com/account/resources/identifiers/list/bundleId and find the bundle id that you created for your application. After that click on the selected id and copy Bundle Identifier value.

![](https://apidocs.lrcontent.com/images/18_292495ea17781142f73.05288795.png)

### How to Obtain a Team ID?
For the team ID, open the link https://developer.apple.com/account/resources/identifiers/list/bundleId and find the bundle id that you created for your application. After that click on the selected id and copy App ID Prefix value.

![](https://apidocs.lrcontent.com/images/19_318155ea177a14aa272.42576969.png)

### How to Obtain a Key ID?
For the key ID, open the given link https://developer.apple.com/account/resources/authkeys/list and find the key id that you created for your application. After that, click on the selected id and copy the KEY ID value.

![](https://apidocs.lrcontent.com/images/20_19885ea177c16d7667.31251153.png)

### How to Obtain Client Secret Sign In Key?

The information related to Secret Sign In Key is already downloaded in a previous step with .p8 file extension on your computer. The structure of this file will something like below and the complete content of this file will be treated as Secret Sign In Key


```
-----BEGIN PRIVATE KEY-----

.

hashed content

.

-----END PRIVATE KEY-----
```


## Troubleshooting

After the configuration in apple developer console and LoginRadius, If you face any of the following errors, it may be returned from Apple. LoginRadius will relay both status codes and error messages from Apple for any request that fails. Below you can find some general errors and their related troubleshooting steps/actions.

**invalid_client:**

Apple was unable to successfully authenticate with the credentials and this is directly related to the invalid credentials. Open all the related consoles and double-check the provided credentials if they are correct or not.
<br>
* **invalid_grant:**
The authorization code presented to the Apple IdP is not valid. This error generally occurs during the implementation of Apple Sign In in iOS Native Devices. So before calling LoginRadius token exchange API, please make sure the "CODE" parameter value is correct.

    **Note:**
    **In case of Native Apple Sign In (iOS)** the value of the bundle identifier in the apple developer account configuration should be the same as the value of bundle identifiers in your Xcode app project.

    Please see below screenshot for bundle identifier in apple developer account and Xcode project respectively

    ![](https://apidocs.lrcontent.com/images/21_143585ea177e9cae9e0.57325948.png)

    ![apple Xcode app project](https://apidocs.lrcontent.com/images/bundle_117875e5df1db838a93.50017868.png "Xcode app project")


<br>

 **invalid redirect_uri:**
 For the website login process, failure occurs if you are either using blank or wrong "Return URL" while configuring Service ID.
 To resolve this enter your Web Domain value and enter 
 **https://&lt;sitename&gt;.hub.loginradius.com:443/socialauth/validate.sauth** in the Return URLs. After a successful login, Apple will send the OIDC scope Id\_token to this URL. Click the Save button. 

 ![](https://apidocs.lrcontent.com/images/22_1185ea178126fb6e8.54042933.png)



### Important Related Links

- [Implement Apple Login in iOS Apps](/api/v2/deployment/mobile-sdk-libraries/ios-library/#nativesociallogin9)
- [Implement Apple Login in Android Apps](/api/v2/deployment/mobile-sdk-libraries/android-library/#integratesociallogin5)

