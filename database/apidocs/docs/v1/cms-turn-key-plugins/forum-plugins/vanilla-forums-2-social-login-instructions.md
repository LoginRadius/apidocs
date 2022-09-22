Vanilla Forums 2 Social Login instructions

---

[Vanilla Forum Installation Guide](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#vanilla)

[​Plugin Configuration ](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#vanilla1)

[Further Help](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#further_help)

- [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#database)
- [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#socialloginuninstall)

[Troubleshooting](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#troubleshooting)

- [CURL and FSOCKOPEN troubleshooting
  ](https://support.loginradius.com/hc/en-us/articles/201896886-Vanilla-Forums-2-Social-Login-instructions#curlissue)

####Vanilla Forum Installation Guide

**Note :-** If you want to upgrade Social Login From old version to new version then uninstall the previous version and upload the new version with following instructions:

1. [Download](https://open.vanillaforums.com/addon/sociallogin-plugin) **Social Login** plugin for Vanilla Forums and extract the zip file.
2. Go to **plugins** directory under your FTP and upload the extracted folder in **plugins/ **directory.
3. Log in to your site **admin panel** and click on **Admin-console** tab.
4. After that click on **Plugins** under **Addons**.
   ![enter image description here](https://apidocs.lrcontent.com/images/blob-9_680658d21e476fa077.99219292.png)

5. Here you will see **Social Login **plugin under **Manage Plugins** section. Enable the **Social Login** plugin.
   ![enter image description here](https://apidocs.lrcontent.com/images/blob-10_1877058d21eb8a9dc64.57049929.png)

6. Click on **Settings** of Social Login Plugin.

![enter image description here](https://apidocs.lrcontent.com/images/blob-12_1893858d21faa1c5dc8.36264181.png)

####Plugin Configuration

1. To activate the plugin, insert LoginRadius API Key ([How to get API Key and Secret?](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-))
2. Insert your correct **API & Secret** in textbox, and choose the option of **API Connection** Method (cURL or FSOCKOPEN).

![enter image description here](https://apidocs.lrcontent.com/images/blob-13_1718158d2206ee05d94.89502244.png)

3.Verify the API key and secret by hitting **Verify API Settings** button, and click on **Save** button.​

####Further Help:

####Where to look user details in your database:

User details are stored in the "(prefix)\_user" table and "(prefix)\_userauthentication" table:-

**(prefix)\_user table: **

|Column |Info|
|-||-|
|Name |Name of the User|
|Email |Email address of user|
|Photo |Picture of the User|
|About​ |Thing about the User|
|DateOfBirth |Date of birth of User|
|DateFirstVisit​ |Date of first visit when the User SignUp|
|InsertIPAddress |IP address of User's server|

**(prefix)\_userauthentication table: **

|Column |Info|
|-||-|
|ForeignUserKey |LoginRadius ID for the User|
|ProviderKey |Provider name, from which user loged in|
|UserID |User Id of the User|

####How to uninstall the module:
​

1. Log in to your Admin panel and click on **Admin-console** .
2. After that click on **Plugins** under **Addons**
3. Click on **Social Login** plugin under **Manage Plugins** section.
4. Disable the **Social Login** plugin.

![enter image description here](https://apidocs.lrcontent.com/images/blob-14_1672658d22245d45e65.64855284.png)
​
5.After that click on **remove** button.

![enter image description here](https://apidocs.lrcontent.com/images/blob-15_1458158d223073dbf97.50436335.png)

####Troubleshooting:

####CURL and FSOCKOPEN troubleshooting

There is a button **" Verify API Settings " **in the **API Settings** section of the plugin. you need to choose one of following options

- CURL requires **cURL support = enabled** in your php.ini file.
- FSOCKOPEN requires **allow_url_fopen = On **and **safemode = off** in your php.ini file.

If that does not work, you may need to contact your hosting provider to enable one of the option.
