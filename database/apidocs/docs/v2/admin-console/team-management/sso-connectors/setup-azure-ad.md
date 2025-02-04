# Setup Azure AD Plugin

LoginRadius provides a Marketplace plugin to integrate Azure Active Directory (AD) with your LoginRadius Admin Console application. Integrating LoginRadius with Azure AD provides you with the following benefits:

-   You can control in Azure AD who has access to LoginRadius.
    
-   You can enable your users to be automatically signed-in to LoginRadius (Single Sign-On) with their Azure AD accounts.
    
-   You can manage your accounts in one central location - the Azure portal.
    

This document describes the step by step instructions to set up Azure AD as an identity provider for your LoginRadius Admin Console application.

**NOTE:** Find the Azure AD Plugin on Market place [Here](https://azuremarketplace.microsoft.com/en-us/marketplace/apps/aad.lr?tab=Overview)

## Prerequisites

To configure Azure AD integration with LoginRadius, you need the following items:

-   An Azure AD subscription. If you don't have an Azure AD environment, you can get a free account.
    
-   LoginRadius Enterprise Account.
    

## Configuring App on Azure Active Directory

**Steps**

<span>1. </span> Log in to your [Azure Portal](https://portal.azure.com/).
    
<span>2. </span> Click on the Azure Active Directory tab in the Left panel. 

   ![Azure](https://apidocs.lrcontent.com/images/1_1440161602b07cbe5c0.17903856.png "Azure config")

  

<span>3. </span>  From the sub menu appearing at the left, select **Enterprise Applications**.  
  
![Azure](https://apidocs.lrcontent.com/images/2_2275661602b6ba79f18.92554479.png "Azure config")

  

<span>4. </span> Add an application by clicking the **New application** button at the top.  
      
 ![Azure](https://apidocs.lrcontent.com/images/3_801961602bb40d7830.72851867.png "Azure config")

<span>5. </span> In the **Browse Azure AD Gallery**, search for **“LoginRadius”**, as per below screenshot. Once it appears there, click on the LoginRadius logo. This will open a new window at the right. Provide the required name for the app and click on **Create** button to add LoginRadius Application
    
 ![Azure](https://apidocs.lrcontent.com/images/4_1572861602c19c273a0.02718712.png "Azure config")

  

<span>6. </span>This will bring the LoginRadius app in the configured app list as below
    

 ![Azure](https://apidocs.lrcontent.com/images/5_398461602c5f870bd9.08529817.png "Azure config")
 
## Configure and test Azure AD single sign-on


In this section, you will configure and test Azure AD single sign-on with LoginRadius based on a test user called Britta Simon. For single sign-on to work, a relationship between an Azure AD user and the related user in LoginRadius, needs to be established.

To configure and test Azure AD single sign-on with LoginRadius, you need to complete the following building blocks:

1. **Configure Azure AD Single Sign-On** - to enable your users to use this feature.
    
2. **Configure LoginRadius Single Sign-On** - to configure the Single Sign-On settings on the application side.
    
3. **Create an Azure AD test user** - to test Azure AD single sign-on.
    
4. **Assign the user in Azure AD LoginRadius application** - to enable the user to use Azure AD single sign-on.
    
5. **Add a Team member in LoginRadius** - to have a counterpart of Britta Simon in LoginRadius that is linked to the Azure AD representation of the user.
    
6. **Test single sign-on** - to verify whether the configuration works.
    

### Configure Azure AD Single Sign-On

In this section, you enable Azure AD single sign-on in the Azure portal.

To configure Azure AD single sign-on with LoginRadius, perform the following steps:

<span>1. </span> In the [Azure portal](https://portal.azure.com/), on the **Application list** page, click on the LoginRadius application and then select **Single sign-on**.
    
![Azure](https://apidocs.lrcontent.com/images/6_2092361602cc264d408.12277234.png "Azure config")

  

<span>2. </span> On the **Select a Single sign-on method** dialog, select **SAML** mode to enable single sign-on.
    

![Azure](https://apidocs.lrcontent.com/images/7_2656661602d0a4fe303.80164713.png "Azure config")


<span>3. </span> On the **Set up Single Sign-On with SAML** page, click **Edit** icon to open **Basic SAML Configuration** pop up.  
     
      
    

![Azure](https://apidocs.lrcontent.com/images/8_1146361602da650b622.89098255.png "Azure config")

  

<span>4. </span> On the **Basic SAML Configuration** pop up, enter the following values and click the **save** button at the top.
    

-   `https://lr.hub.loginradius.com/` in the **Identifier (Entity ID)** textbox.  
      
    
-   `https://lr.hub.loginradius.com/saml/serviceprovider/AdfsACS.aspx` in the **Reply URL (Assertion Consumer Service URL)** textbox.  
      
    
-   `https://adminconsole.loginradius.com/login` in the **Sign on URL** textbox.  
      
    

![Azure](https://apidocs.lrcontent.com/images/9_991561602dfacd8171.80384459.png "Azure config")

  
  

<span>5. </span> On the **Set up Single Sign-On with SAML** page,download the **Certificate (Base64)** mentioned under the **SAML Signing Certificate** section, and save it on your computer.  
      
    

![Azure](https://apidocs.lrcontent.com/images/10_2204461602e461a70d2.32069454.png "Azure config")


    

<span>6. </span> Similarly, copy the **Login URL** and **Logout URL** from the **Set up LoginRadius** section.
    

  
![Azure](https://apidocs.lrcontent.com/images/11_2065661602e8a06c616.16071214.png "Azure config")

  

### Configuring LoginRadius Single Sign-On

**Steps**

1. Log in to your LoginRadius [Admin Console](https://adminconsole.loginradius.com/login) account.
    
2. Navigate to your team management section in LoginRadius Admin Console from [here](https://adminconsole.loginradius.com/account/team).
    
3. Click on **Azure AD** under the **Single Sign-On** tab.  
    
4. Here, you can see two options.

   - Configure App

   - Configure from Metadata

  ![Main](https://apidocs.lrcontent.com/images/image_13011639263f009fbe4.80441964.png "main")

  ####   **Configure App**
   
   **Step-1:** When you choose to configure through the app section method, the below screen appears and you need to fill in the details in the form shown on the screen: 
      
   ![LR Azure AD](https://apidocs.lrcontent.com/images/Team-SSO-AzureAD-updated_1628215847649f536f4ba2f1.50182192.png "LR Azure AD")

   > **Note:** 
    - To renew the **Service Provider Certificate**, click the designated "**Renew Certificate**" button. Once the renewal is completed, the updated expiry date and time will be promptly shown.
    - If you select the **Switch off Email/Password Login instead of Enable only SSO** option, then login with **Email/Password** will not work, and only SSO Login will work to access LoginRadius Admin Console.

   a. In **ID PROVIDER LOCATION** enter the **Login URL** which you get from the LoginRadius application under Azure AD account.  
      
   b. In **ID PROVIDER LOGOUT URL** enter the **Logout URL** which you get from the LoginRadius application under Azure AD account.  
      
   c. In **ID PROVIDER CERTIFICATE** enter the Azure AD certificate (downloaded as **Certificate (Base64)** ) which you have downloaded earlier from Azure AD account.  
      
   > **NOTE:** Please make sure to enter the certificate value with header and footer  
    E.g.  
    ```
    -----BEGIN CERTIFICATE-----  
    <certifciate value>  
    -----END CERTIFICATE-----
    ```

  
   d. Kindly follow [Generate LoginRadius' Certificate and Key document](https://www.loginradius.com/legacy/docs/single-sign-on/concept/saml-miscellaneous/certificate/) to get the details for the values under **SERVICE PROVIDER CERTIFICATE** and **SERVICE PROVIDER CERTIFICATE KEY**.     
  
   > **NOTE:** Please make sure to enter the certificate value with header and footer  
      E.g.  
      ```
      -----BEGIN CERTIFICATE-----  
      <certifciate value>  
      -----END CERTIFICATE-----
      ```
 

   e. In the **DATA MAPPING** section, select the fields (SP fields) and enter the corresponding Azure AD fields(IdP fields).

  

Following are some listed field names for Azure AD.

| Fields     |Profile Key           | 
| ------------- |:-------------:| 
| Email     | http://schemas.xmlsoap.org/ws/2005/05/identity/claims/name |
| FirstName   | http://schemas.xmlsoap.org/ws/2005/05/identity/claims/givenname      |  
| LastName | http://schemas.xmlsoap.org/ws/2005/05/identity/claims/surname     |   

Once all the fields are filled, click on update button at the bottom of the configuration.


>**NOTE:** The Email field mapping is required. FirstName and LastName field mapping are optional.

####  **Configure From Metadata**

**Step-1:** If you are looking to configure this by uploading a Metadata file follow the below-mentioned steps.

![AzAD 1](https://apidocs.lrcontent.com/images/image-2_2558663926a388e4c22.49865874.png "AzAD 1")

**Step-2:** After you have clicked on the Configure from Metadata file, you are required to upload the XML file, which consists of metadata for SSO setup, and after successful upload, click  Add. And then you will find the below screen.

![Common](https://apidocs.lrcontent.com/images/pasted-image-0_1165463926a9d53a426.51777542.png "Common")

### Create an Azure AD test user

The objective of this section is to create a test user in the Azure portal called Britta Simon.

<span>1. </span>  In the Azure portal home page, in the left panel, select **Azure Active Directory**, and then select **Users**.


![Azure](https://apidocs.lrcontent.com/images/13_2597961602f0a804ca3.78933806.png "Azure config")

<span>2. </span>  This will bring the list of available users, you can also create a new one using the **+ New user** button at the top of the screen.
    

![Azure](https://apidocs.lrcontent.com/images/15_159061602f66d29394.27357176.png "Azure config")

  

<span>3. </span> In the User properties (while adding a new user), perform the following steps.
    

![Azure](https://apidocs.lrcontent.com/images/16_2609761602fa4c3bfa7.33571535.png "Azure config")

  
a. In the **Name** field enter **BrittaSimon**.  
b. In the **User name** field type **brittasimon**, the domain will come from the dropdown itself. The provided username+domain will be the email address of the user.  
c. Select **Show password** checkbox, and then note down the value that's displayed in the Password box.  
d. Click **Create** to save the user.

### Assign the user in Azure AD LoginRadius application

In this section, you will enable Britta Simon to use Azure single sign-on by granting access to LoginRadius application.

<span>1. </span>  In the Azure portal, select **Enterprise Applications**, select **All applications**. This will bring the list of all applications configured, select **LoginRadius** from here. This will open the Dashboard for the application.
    

  ![Azure](https://apidocs.lrcontent.com/images/17_279616160301f174387.76177872.png "Azure config")

<span>2. </span>  In the menu on the left, select Users and groups.
    

  
  ![Azure](https://apidocs.lrcontent.com/images/18_100276160307643dac9.79983646.png "Azure config")

  

<span>3. </span>  Click the **Add user/group** button, this will open a new window to add User and **assign the access**.
    
   <span>4. </span>  In the **Users and groups** dialog select the user from the Users list, then click the **Select** button at the bottom of the screen.
    

 ![Azure](https://apidocs.lrcontent.com/images/19_10161603150353581.47586469.png "Azure config")

<span>5. </span> If you are expecting any role value in the SAML assertion then in the **Select Role** dialog select the appropriate role for the user from the list, then click the Select button at the bottom of the screen.
    
<span>6. </span> In the **Add Assignment** dialog click the **Assign** button.  
      
    

 ![Azure](https://apidocs.lrcontent.com/images/20_15416616032068b3d45.42847142.png "Azure config")

  

### Add a Team member in LoginRadius

<span>1. </span>  Log in to your LoginRadius [Admin Console](https://adminconsole.loginradius.com/login) account.
    
<span>2. </span>  Navigate to your team management section in LoginRadius Admin Console.


  ![Azure](https://apidocs.lrcontent.com/images/24_11663616032f77b0879.20720404.png  "Azure config")
    
<span>3. </span>  Click **ADD TEAM MEMBER** in the side menu to open the form.
    
<span>4. </span> In the **ADD TEAM MEMBER** form, you create a user called Britta Simon in your LoginRadius Site by providing the user's details and assigning the desired permissions.  
      
      
    

  ![Azure](https://apidocs.lrcontent.com/images/22_17479616032b477b7a7.38371415.png  "Azure config")

>**NOTE:** Make sure to use the same email id here that you used in Azure AD.

  
To know more about the permissions based on roles, please refer to the [Role Access Permissions](https://www.loginradius.com/legacy/docs/api/v2/admin-console/team-management/manage-team-members#roleaccesspermissions0) section of our [Manage Team Members](https://www.loginradius.com/legacy/docs/api/v2/admin-console/team-management/manage-team-members#roleaccesspermissions0) documents. Users must be created and activated before you use single sign-on.

### Test single sign-on

In this section, you will test your Azure AD single sign-on configuration using the Access Panel.

1.  Open [https://accounts.loginradius.com/auth.aspx](https://accounts.loginradius.com/auth.aspx) in your browser and click **Fed SSO log in**.
    
2.  Enter your **LoginRadius app name** and click Login.
    
3.  It should open a pop-up for asking you to sign into your Azure Ad account.
    
4.  After the authentication, your pop-up will close and you will be logged into the LoginRadius Admin Console.
    

  
  
  

## Troubleshooting

Below are some general errors and steps to fix them are listed.

<span>**1. </span> AADSTS50105: The signed in user 'BrittaSimon@xxxxxxx.onmicrosoft.com' is not assigned to a role for the application.**  
    Generally this error occurs if the user is not added into the LoginRadius app at Azure AD, please make sure to assign the user / group in Azure AD. Refer the step "[Assign the user in Azure AD LoginRadius application](#assigntheuserinazureadloginradiusapplication6)"  
      
    
 <span>**2. </span>After authentication in the LR admin console it is asking to complete the profile instead of logging me.** 

   ![Azure](https://apidocs.lrcontent.com/images/21_235936160325898e719.83746311.png  "Azure config")
    

   Generally this error occurs due to the incorrect mapping of EmailID or Email ID not found in the Azure AD User profile, In order to fix this please cross check

   -   If the Email mapping is correct in LoginRadius configurations
      
   - EmailAddress field is filled for the user you are testing with
      
   - The user is added as a team member in LoginRadius AdminConsole
    

>**NOTE:** After fixing this problem you will need to test with a new user, as the existing user's profile is already created in LR with wrong mapping.

  
<span>**3. </span>I have updated the configurations in LoginRadius but the changes are not reflecting.**
    

This could be due to the configuration caching, please try out after some time or contact [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).