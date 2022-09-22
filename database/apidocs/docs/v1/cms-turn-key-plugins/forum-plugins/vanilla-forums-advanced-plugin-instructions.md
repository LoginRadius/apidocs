Vanilla Forums Advanced Plugin Instructions

---

{{table_container}}

####Vanilla Forum Installation Guide

1. Download Customer Identity Plugin for Vanilla Forums and extract he zip file.
2. Go to plugins directory under your FTP and upload the extracted folder in plugins/ directory.
3. Log in to your site admin panel and click on Admin Console tab.
4. After that click on **Plugins** under **Addons**.
   ![enter image description here](https://apidocs.lrcontent.com/images/pasted-image-0_1863458d2088085d415.64671807.png)
5. Here you will see **Customer Registration** Plugin under Manage Plugins section. Enable this plugin.
   ![enter image description here](https://apidocs.lrcontent.com/images/vanilla-1_1622758d208a1f38aa7.86562962.png)
6. Click on Settings of **Customer Registration Plugin**.

####Plugin Configuration

1. To activate the plugin, insert LoginRadius API Key ([How to get API Key and Secret?](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-))

2. Insert your correct API & Secret in textbox, and choose the option of API Connection Method (cURL or FSOCKOPEN).
   ![enter image description here](https://apidocs.lrcontent.com/images/vailla-2_2566058d2090a7e29a0.67812122.png)
3. Verify the API key and secret by hitting Verify API Settings button, and click on Save button.​

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

**(prefix)\_userauthentication table**:

|Column |Info|
|-||-|
|ForeignUserKey |LoginRadius ID for the User|
|ProviderKey |Provider name, from which user loged in|
|UserID |User Id of the User|

####How to uninstall the module:​

1. Log in to your Admin panel and click on **Admin-console** .

2. After that click on **Plugins** under **Addons**
3. Click on **Customer Registration** plugin under **Manage Plugins** section.

4. Disable the **Customer Registration** plugin.
   ![enter image description here](https://apidocs.lrcontent.com/images/vanilla-1-1_87958d20a573befe5.38982846.png)

5.After that go to plugins directory under your FTP and delete CustomerRegistration folder under plugins/ directory.

####Troubleshooting:

####CURL and FSOCKOPEN troubleshooting

- CURL requires cURL support = enabled in your php.ini file.
- FSOCKOPEN requires allow_url_fopen = On and safemode = off in your php.ini file.

If that does not work, you may need to contact your hosting provider to enable one of the option.
