# Salesforce Setup Document  in Admin Console

This document describes the step by step procedure to setup Salesforce as IDP and LoginRadius Admin Console as an SP in SAML workflow.Please see [here](https://www.loginradius.com/legacy/docs/single-sign-on/concept/saml-miscellaneous/certificate/) for more details on SAML workflow


## Configure SAML settings in Salesforce Application

Please follow the steps mentioned below:

1. Login into your [Salesforce account.](https://login.salesforce.com/)
2. Click on **Setup** available on the top right.
3. Move to the **Administer** section in the left Panel.
4. Click on **My domain** under **Domain Management**.

![](https://apidocs.lrcontent.com/images/salesforce_275315d8abce71abb53.88501739.png "")

5. Enter your Domain name and click on **Register Domain**. 
6. Now Move to **Build**section in the left Panel.
7. Click on **Apps **under **Create**. 

![](https://apidocs.lrcontent.com/images/salesforce1_272355d8abcad4bf8e2.74227929.png "")

8. Click on **New** button Under **Connected Apps** section.

9. Enter the following values for **Basic Information** :
      - Enter the connected app’s name. This name is displayed in the App Manager and on its App Launcher tile.
  
      - Enter the API name used when referring to your app from a program. It defaults to a version of the name without spaces. 

      - Enter the contact email for Salesforce to use when contacting you or your support team. 

      - Enter the contact phone for Salesforce to use in case we want to contact you.

      - To display your logo on the App Launcher tile, enter a logo image URL. Your logo also appears on the consent page that users see when authenticating. The URL must use HTTPS. Use a GIF, JPG, or PNG file. 

      - If you have a web page with more information about your app, provide an info URL.

      - To display a description on the connected app’s App Launcher tile, enter a description. 

10. Now fill in all the details given below:

      - Enter https://lr.hub.loginradius.com in Start URL.

      - Enable **SAML**.

      - Enter https://lr.hub.loginradius.com/  in Entity Id.

      - Enter https://lr.hub.loginradius.com/saml/serviceprovider/AdfsACS.aspx in ACS URL.

      - To allow users to be logged out of the LoginRadius application when they log out of Salesforce as an identity provider, select **Enable Single Logout.**

      -  If you selected Enable Single Logout, enter **https://adminconsole.loginradius.com/logout**.

      - Select Name Id format **urn:oasis:names:tc:SAML:2.0:nameid-format:unspecified**.

      - Select the IdP Certificate **Default IDP certificate**.

      - Select **Verify Request Signatures** only if you want to use **Service Provider Initiated Login   Flow** for Login flow. Please see [here ](https://www.loginradius.com/legacy/docs/api/v2/single-sign-on/federated-sso/saml/overview/#serviceproviderinitiatedlogin8) for more details on SP initiated Login Flow. If you have selected **Verify Request Signatures**, get the LoginRadius certificate value and save it as with any filename e.g.filename.cert on your computer. Select the **Choose File** and browse to the filename.cert [i.e The LoginRadius Certificate] and upload the file. Please see [here](https://www.loginradius.com/legacy/docs/single-sign-on/concept/saml-miscellaneous/certificate/) for obtaining the LoginRadius certificate.

      - **Save** the Settings.

      - Now Move to Administer section and Click **Identity Provider** under **Security Controls**.

      - Enable Identity Provider

      - Download **Certificate** and **MetaData**

      ![](https://apidocs.lrcontent.com/images/salesforce2_43025d8abfc6f03a62.79399523.png "")

## Enable Salesforce Users to access LoginRadius application

Go to 'Manager Users -> Users' and click edit on the user you are testing. Click profile name link .e.g System Administrator. This takes to profile page. You can scroll below to 'Connected App Access' and you would see that the access is not given. Give the access to SAML app by clicking the edit profile at the top of the page. 

## Configuring LoginRadius

Steps:

1. Log in to your LoginRadius account.

2. Navigate to your team management section in LoginRadius Admin Console from [here](https://adminconsole.loginradius.com/account/team).

3. Click on Salesforce under the **Single Sign-On tab.**

4. Here, you can see two options.

      - Configure App

      - Configure from Metadata

      ![Main](https://apidocs.lrcontent.com/images/image-1_327263926641577ba1.00753862.png "main")

###  **Configure App**

   
   **Step-1:** When you choose to configure through the app section method, the below screen appears and you need to fill in the details in the form shown on the screen: 

 ![Salesforce](https://apidocs.lrcontent.com/images/Team-SSO-Salesforce-updated_1798966485649f521b2cc454.52928045.png "Salesforce")

 > **Note:** 
  - To renew the **Service Provider Certificate**, click the designated "**Renew Certificate**" button. Once the renewal is completed, the updated expiry date and time will be promptly shown.
  - If you select the **Switch off Email/Password Login instead of Enable only SSO** option, then login with **Email/Password** will not work, and only SSO Login will work to access LoginRadius Admin Console.

 **Step-2:** Fill in the below form as: 

 - Select your desired flow in the LOGIN FLOW dropdown. Select Identity Provider Initiated Login for IdP Initiated SAML workflow or select Service Provider Initiated Login for SP Initiated SAML workflow. Please see the [SAML](https://www.loginradius.com/legacy/docs/api/v2/single-sign-on/federated-sso/saml/overview/#loginradiusactsasanidentityprovider6) overview document for more details. 

 - In **ID Provider Binding**, enter **urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST**.
 
 - In **ID Provider Location**, enter the **IdP-Initiated Login URL** which you will get from the Salesforce dashboard (Setup->Administrater->Manage Apps->Connected Apps). 

 ![](https://apidocs.lrcontent.com/images/salesforce4_118355d8ac154740e86.45217196.png "")

 - In **ID Provider Logout Url**, enter the **Single Logout Endpoint** from the Salesforce dashboard (Setup->Administrater->Manage Apps->Connected Apps).
 - In **ID Provider Certificate**, enter the Salesforce certificate from the Salesforce dashboard (Setup->Administrater->Manage Apps->Connected Apps).
 - In **Service Provider Certificate** and **Service Provider Certificate key** enter LoginRadius certificate and key. Please see [here](https://www.loginradius.com/legacy/docs/single-sign-on/concept/saml-miscellaneous/certificate/) for how to generate the LoginRadius certificate and key.

 - For **DATA MAPPING** select the LoginRadius' fields (SP fields) and enter the corresponding Salesforce fields (IdP fields). 


 | Fields      |      Profile Key  | 
 |----------|:-------------:|
 | Email   |  email |
 |FullName  |  username   | 

 >**Note:** The customer should have an account with the same email address in Salesforce as well as in LoginRadius before using the Salesforce account to login to the LoginRadius Admin Console.

###  **Configure From Metadata**

**Step-1:** If you are looking to configure this by uploading a Metadata file follow the below-mentioned steps.

![SF1](https://apidocs.lrcontent.com/images/image-3_1049763926b183367e0.47147679.png "SF1")

**Step-2:** After you have clicked on the Configure from Metadata file, you are required to upload the XML file, which consists of metadata for SSO setup, and after successful upload, click  Add. And then you will find the below screen.

![Common](https://apidocs.lrcontent.com/images/pasted-image-0_1165463926a9d53a426.51777542.png "Common")