## OneLogin Integration

LoginRadius allows your team members to log in to LoginRadius Admin Console using the one login account.  You can create a Single Sign-On (SSO) workflow between the onelogin application and LoginRadius Admin Console using the federated SAML protocol. 

### Configuring SAML settings in the OneLogin application

1. Sign in to OneLogin admin portal as an administrator 

2. Go to **Applications > Add Apps**, then search for and select SAML Custom Connector (Advanced).

3. On the next screen, add the **Application Name, Description**, and icon image and click on **Save**.

4. In **Configuration >> Audience** ( EntityID ), enter `https://lr.hub.loginradius.com/`.

5. Enter the **ACS (Consumer) URL** as  `https://lr.hub.loginradius.com/saml/serviceprovider/SpInitiatedACS.aspx`.

6. Under **SLO ENDPOINT** and **SLO RESPONSE ENDPOINT**, enter `https://adminconsole.loginradius.com/logout` and `https://adminconsole.loginradius.com/dashboard` respectively.

7. After successfully Configuring SAML settings, navigate to the **More action** tab from the top right corner on the dashboard and **download the SAML metadata** file.

8. For other details and attributes, refer the below screenshot for your reference:

     ![OneLogin](https://apidocs.lrcontent.com/images/Onelogin_20919611f55b11da1a0.12063028.png "Configuration")

### Configuring LoginRadius Admin Console

1. Log in to your LoginRadius Admin Console.

2. Navigate to your team management section in LoginRadius Admin Console from [here](https://adminconsole.loginradius.com/account/team).

3. Click on SAML under the **Single Sign-On** tab.

4. Fill in the below form as: 

    - Select the **Service Provider Initiated Login** flow from Login Flow.

    - In ID Provider Binding value, enter `urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST`**`

    - In **ID Provider Location**, enter the **IdP-Initiated Login URL** which you will get from the Ping Identity app dashboard or metadata file. 

    - **ID Provider Certificate**: Enter OneLogin SAML certificate. You can get this from the metadata XML file downloaded from oneLogin dashboard configuration. You must  format it in the correct format using the online [tool](/single-sign-on/concept/saml-miscellaneous/certificate/).

    - Enter LoginRadius' Certificate and Key in **SERVICE PROVIDER CERTIFICATE** and **SERVICE PROVIDER CERTIFICATE**. 

        >**Note:** Certificate and Key can be generated using [online tools](/single-sign-on/concept/saml-miscellaneous/certificate/), with Bits and Digest Algorithm 2056, SHA256 respectively.
    
    - For **DATA MAPPING**, select the LoginRadius' fields (SP fields) and enter the corresponding Ping Identity, e.g. 

| Fields       |  Profile Key |
| :----:        |    :----:   |
| Email       | email     |

>**Note:** The value of the key and the name field on the Ping Identity Should be the same. If not it will not return the value.*

- Once all the required fields are completed, scroll down and hit "**Add**".

   ![Admin Console SAML](https://apidocs.lrcontent.com/images/OneloginAdmin_32431613f13a4537362.73454607.png "Configuration")

- Make Sure that the mail id given in the oneLogin for sign-in must be added as a team member in the Team management section to Access the LoginRadius Admin Console. 
