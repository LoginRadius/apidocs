## Ping Identity Integration

LoginRadius allows your team members to log in to LoginRadius Admin Console using the Ping Identity account.  Using the federated SAML protocol, you can create a Single Sign-On (SSO) workflow between the Ping Identity application and LoginRadius Admin Console. 

### Configuring SAML settings in the Ping Identity application

1. Log in to your Ping Identity dashboard

2. Click on the **Add a SAML App** or **Connections** option on the Home Page.

3. It will open the default apps provided by Ping Identity.

4. Click on the **+ icon** at the top to add a new service/application.

5. Select **Advance Configuration** to create a new SAML app and Click **Configure**.

6. On the next screen, add the **Application Name**, **Description**, and icon image.

7. Select the **Manually Enter** option to add the **app Metadata** under  **Configure SAML Connection** section on the next page.

8. Enter the Assertion Consumer Service (ACS) URL as  `https://lr.hub.loginradius.com/saml/serviceprovider/SpInitiatedACS.aspx`.

9. Leave the **SIGNING KEY, SIGNING ALGORITHM**, and **Encryption** as default. 

10. In **ENTITY ID**, enter `https://lr.hub.loginradius.com/`.

11. Under **SLO ENDPOINT** and **SLO RESPONSE ENDPOINT**, enter `https://secure.loginradius.com/logout` and `https://adminconsole.loginradius.com/dashboard` respectively.

12. Under **SUBJECT NAMEID FORMAT** enter `urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified`

13. The **Assertion validity duration** is the maximum amount of time (in seconds) that an assertion is valid.

14. The Target application URL is required by some applications as the target URL. Put `https://accounts.loginradius.com/` in it. The application URL is passed in the RelayState parameter in the SAML response.

15. Leave **Enforce signed Authn request** and **Verification certificate** as default.

16. Click **Save and Continue**.

17. In attribute mapping, select the **PingOne user attributes** and map it to the same attribute in the LoginRadius Admin Console. (reference screenshots are attached at the end of this section)

18. After filling this **click Save and Close**.

19. For other details and attributes, refer to the LoginRadius SAML document. See the below screenshot for your reference:

    ![PingOne Configurations](https://apidocs.lrcontent.com/images/SAML1_1282611f57f34c9a39.95758091.png "PingOne Configurations")

    ![PingOne Configurations](https://apidocs.lrcontent.com/images/SAML2_12266611f585fb260f1.84047331.png "PingOne Configurations")

20.  Once all the settings are saved, the application will appear on the home page. You need to enable the user access by toggle button to make it active.

        ![PingOne Configurations](https://apidocs.lrcontent.com/images/SAML3_1262611f58d95e36f8.79767000.png "PingOne Configurations")

21. You can download the **METADATA** as mentioned in the below screenshot as it is required to be filled in the [LoginRadius Admin Console](https://adminconsole.loginradius.com/).

    ![PingOne Configurations](https://apidocs.lrcontent.com/images/SAML4_25880611f593c127950.83676250.png "PingOne Configurations")

### Configuring LoginRadius Admin Console

1. Log in to your LoginRadius Admin Console.

2. Navigate to your team management section in LoginRadius Admin Console from [here](https://secure.loginradius.com/account/team).

3. Click on SAML under the **Single Sign-On** tab.

4. Fill in the below form as: 

    - Select the **Service Provider Initiated Login** flow from Login Flow.

    - In ID Provider Binding value, enter `urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST`

    - In **ID Provider Location**, enter the **IdP-Initiated Login URL** which you will get from the Ping Identity app dashboard or metadata file. 

    - **ID Provider Certificate:** enter Ping Identity SAML value. You can get this from the metadata XML downloaded above. You must format it in the correct format using the [online tool](/single-sign-on/concept/saml-miscellaneous/certificate/).

    - Enter LoginRadius' Certificate and Key in **SERVICE PROVIDER CERTIFICATE** and **SERVICE PROVIDER CERTIFICATE**. 

        >**Note:** Certificate and Key can be generated using [online tools](/single-sign-on/concept/saml-miscellaneous/certificate/), with Bits and Digest Algorithm 2056, SHA256 respectively.

    - For **DATA MAPPING**, select the LoginRadius' fields (SP fields) and enter the corresponding Ping Identity, e.g. 

| Fields      |      Profile Key  | 
|----------|:-------------:|
| Email   |  saml_subject |

>**Note:** The value of the key and the name field on the Ping Identity Should be the same. If not, it will not return the value.

- Once all the required fields are completed, scroll down and hit **Add**.

    ![PingOne Configurations](https://apidocs.lrcontent.com/images/PingAdmin_17827611f59c15fe247.96784050.png "PingOne Configurations")
    
- Make Sure that the email address given in the Ping Identity for sign-in must be added as a team member in the Team management section to Access the LoginRadius Admin Console. 
        