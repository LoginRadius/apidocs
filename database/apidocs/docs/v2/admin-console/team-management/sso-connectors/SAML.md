# Setting up SAML SSO in Admin Console
This document goes over how you can enable Single-sign-on in Admin Console using the SAML supported app. Your SAML app will act as an IDP and LoginRadius as SP. 
## Configuring SAML App
Each authentication system is unique and might require different configuration settings. Please use the following values for configuring LoginRadius as a service provider in your application to enable SAML flow. 
1. Login in to your SAML supported app
2. Enable and configure Single-sign-on method SAML 
3. Configure LoginRadius as a Service Provider in your application with the following values :
      - Enter https://lr.hub.loginradius.com in Start URL.
      - Enter https://lr.hub.loginradius.com/  in Entity Id.
      - Enter https://lr.hub.loginradius.com/saml/serviceprovider/AdfsACS.aspx in ACS URL.
      - Select Name Id format:  **urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified.**
4. Download the metadata for SAML configuration

## Configuring LoginRadius Admin Console

1.  Log in to your LoginRadius account.
2. Navigate to your team management section in LoginRadius Admin Console from [here](https://adminconsole.loginradius.com/account/team).
3. Click on SAML under the **Single Sign-On** tab. 
4. Fill in the below form as: 

  a. Select any flow from **Login Flow**.

  b. In **ID Provider Binding value** from the Identity Provider metadata file.

  c. In **ID Provider Location** enter the **IdP-Initiated Login URL** which you will get from the SAML supported app dashboard or metadata file. 

  ![SAML](https://apidocs.lrcontent.com/images/SAML_1987562f2089639a5e4.83372731.png "SAML")

  >**Note:** If you select the **Switch off Email/Password Login instead of Enable only SSO** option, then login with **Email/Password** will not work, and only SSO Login will work to access LoginRadius Admin Console.

  d. **ID Provider Certificate**: Certificate of SAML supported app working as identity Provider in this case. 

  e. Enter LoginRadius' Certificate and Key in **SERVICE PROVIDER CERTIFICATE** and **SERVICE   PROVIDER CERTIFICATE**. 


   >**Note:**Certificate and Key can be generated using online tools, for an example. with Bits and Digest Algorithm 2056, SHA256 respectively.

  f.Once all the required fields are completed, **scroll down** and hit **Add**.

  
  
  g.For **DATA MAPPING** select the LoginRadius' fields (SP fields) and enter the corresponding SAML supported app fields (IdP 
    fields)e.g.

   | Fields      |      Profile Key  | 
   |----------|:-------------:|
   | Email   |  email |
   |FullName  |  username   | 

>**Note:**  Please see [ADFS](/api/v2/admin-console/team-management/sso-connectors/adfs-setup-in-admin-console), [Azure AD](/api/v2/admin-console/team-management/setup-azure-ad), salesforce for specific examples for implementing SSO in Admin Console using SAML.

>The customer should have an account with the same email address in your SAML application as well as in LoginRadius before using your SAML application to login to the LoginRadius Admin Console.

