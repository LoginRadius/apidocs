# ADFS Setup in Admin Console

Follow the below Instructions to setup ADFS for your team members in the LoginRadius Admin Console:

## Adding a new relying party trust

The connection between ADFS and LoginRadius is defined using a relying party trust.

1. Sign in to the server where ADFS is installed.

2. Click on **Tools -> ADFS Management** and then select **Relying Party Trusts**.
<br><br>
![enter image description here](https://apidocs.lrcontent.com/images/image1_248225cccc043a1fd33.68701001.png "enter image title here")
<br>
3. Click **Add Relying Party Trust** from the **Actions** sidebar.
<br><br>
![enter image description here](https://apidocs.lrcontent.com/images/image4_110415cccc17dd66a26.70111463.png "enter image title here")
<br>
4. Click Start on the **Add Relying Party Trust wizard**.
<br><br>
![enter image description here](https://apidocs.lrcontent.com/images/image5_161565cccc1c571c8c8.25569308.png "enter image title here")
<br>
5. On the Select **Data Source** screen, click Enter data about the relying party manually and click Next.
<br><br>
![enter image description here](https://apidocs.lrcontent.com/images/image2_80285cccc0e5aab820.72851068.png "enter image title here")
<br>
6. Provide information on each screen 

   a) On the next screen, enter a **Display name** that you'll recognize in the future.
    
   b) Skip the Configure Certificate screen by clicking Next.
    
   c) On the Configure URL, select the box labeled Enable Support for the SAML 2.0 WebSSO protocol. The URL will be   ``https://lr.hub.loginradius.com/saml/serviceprovider/AdfsACS.aspx``
   <br><br>   
   ![enter image description here](https://apidocs.lrcontent.com/images/image8_118995cccc295742933.02122173.png "enter image title here")
    <br>
   d) On the Configure Identifiers screen, enter the Relying party trust identifier. The URL will be `https://lr.hub.loginradius.com/`
    <br><br>
   ![enter image description here](https://apidocs.lrcontent.com/images/image7_73905cccc233cd3226.63878869.png "enter image title here")
    <br>
   e) Skip the Configure Multi-factor Authentication screen (unless you want to configure this) by clicking Next.
    
   f) Skip the Choose Issuance Authorization Rules screen by clicking Next.
    
7. On the Ready to Add Trust screen, review your settings and then click Next.

8. On the final screen, make sure the **“Configure Claim issuance policy for this application”** checkbox is selected and click Finish. This opens the claim rule editor.

## Creating claim rules

After you create the relying party trust, you can create the claim rules.

1. If the claim rules editor appears, click the **Add Rule**. Otherwise, in the Relying Party Trusts list, right-click the relying party object that you created, click Edit Claims Rules, and then click the **Add Rule**.
<br><br>

    ![enter image description here](https://apidocs.lrcontent.com/images/image6_27915cccc1f10c4139.17061020.png "enter image title here")
    <br>

2. In the Claim rule template list, select the **Send LDAP Attributes as Claims template**, and then click Next.

3. Create the following rule:

    a) LDAP Attribute: **E-Mail-Addresses**
    
    b) Outgoing Claim Type: **E-Mail Address**
    
    c) Enter a descriptive rule name 
    
    d) Attribute Store: **Active Directory**
    
    e) Add the following mapping
    
4. Click OK.

5. Create another new rule by clicking Add Rule, this time selecting **Transform an Incoming Claim as the template**. 

6. On the next screen, create the following rule:

    a) Enter a descriptive rule name
    
    b) Incoming Claim Type: **E-Mail Address**
    
    c) Outgoing Claim Type: **Name ID**
    
    d) Outgoing Name ID Format: **Email**
    
    e) Pass through all claim values (the default)
        
7. Finally, click OK to create the claim rule, and then OK again to finish creating rules.


## Configuring LoginRadius

1. Log in to your LoginRadius account.

2. Navigate to your team management section in LoginRadius Admin Console from [here](https://secure.loginradius.com/account/team).

3. Click on ADFS under **Single Sign-On tab**.

4. Fill in the below form as:
<br><br>

![ADFS](https://apidocs.lrcontent.com/images/2_1977362fe497219ea85.57652809.png "ADFS")![ADFS](https://apidocs.lrcontent.com/images/ADFS_680762f203e7518945.34878499.png "ADFS")<br>

>**Note:** If you select the **Switch off Email/Password Login instead of Enable only SSO** option, then login with **Email/Password** will not work, and only SSO Login will work to access LoginRadius Admin Console.



a) In **ID Provider Location**, Enter the correct URL. This is typically ADFS Public URL with /adfs/ls.
    To view this URL :
  - In the ADFS Management application, select **Service > Endpoints**.
  - Scroll down to the endpoint that has **SAML 2.0/WS-Federation** as the type and note the URL path.
             
b) In **ID Provider Certificate**, Export the token-signing certificate with the  ADFS Microsoft Management Console. When using the certificate exporting wizard, ensure you select Base-64 encoded X.509 (.CER) for the encoding format. Open the exported file in a text editor to get the certificate value.

c) Enter the LoginRadius Certificate under **Service Provider Certificate**. You can get the Certificate by running the following command:

   ```openssl genrsa -out lr.hub.loginradius.com.key 2048```

d) Enter the LoginRadius Key under **Service Provider Certificate Key**. You can get the Certificate by running the following command:

   ```openssl req -new -x509 -key lr.hub.loginradius.com.key -out lr.hub.loginradius.com.cert -days 3650 -subj /CN=lr.hub.loginradius.com```
   
 e) For **DATA MAPPING** select the LoginRadius' fields (SP fields) and enter the corresponding ADFS fields (IdP fields).
    <br>
    **Field** : Email 
    <br>
    **Profile Key** : Please check this link for more details - [Link](https://support.templafy.com/hc/en-us/articles/207724789-Supported-claims-and-claims-rules).
    


