vBulletin Social Login instructions

----------------------------------------

[vBulletin Plugin Installation Guide](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#pshop)

[Plugin Configuration​](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#configuration)

[Further Help](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#further_help)



- [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#database)
- [Short code help](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#short_code)
- [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#socialloginuninstall)
 

[Troubleshooting
](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#troubleshooting)

- [CURL and FSOCKOPEN troubleshooting](https://support.loginradius.com/hc/en-us/articles/201994887-vBulletin-Social-Login-instructions#curlissue)
 

####vBulletin Plugin Installation Guide

 



1. Download [Social Login plugin ](http://loginradius-social-plugins.s3.amazonaws.com/vBulletin/social-login.zip)for vBulletin and extract the zip file.
2. Unzip the downloaded plugin for vBulletin.
3. Upload the plugin files (sociallogin, includes) via FTP to your website.
4. Login your vBulletin site's admin panel .
5. Then go to Plugins & Products-> Manage Product section and click on [Add/Import Product] after that install the Social_Login_vbulletin.xml file.​

![enter image description here](https://apidocs.lrcontent.com/images/blob-2_189658d20e33946767.03574981.png "")

6.After successful installation. Now, proceed with configuring your plugin! 

 

####Plugin Configuration

 

1. To configure the plugin, click on Social Login And Social share  on left pan in your vBulletin admin panel. Now, you can see tabs for each features with configuration settings.
![enter image description here](https://apidocs.lrcontent.com/images/blob-3_167458d20ede5096d9.79870652.png "")
2. To activate the plugin, create an account with [LoginRadius](https://www.loginradius.com/) and get API Key and Secret to insert under **Social Login**. Help - [How to get LoginRadius API Key and Secret?](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-) 
 
3. Manage social network from your LoginRadius account.

 

####Further Help:
​
####Where to look user details in your database:

User details are stored in the **"user"** table and **"loginradius_user"** table:

**user table:**  

|Column |Info|
|-||-|
|username |Name of user that display|
|email  |Email address of user|
|birthday |Date of birth of user|

** loginradius_user table:**

|Column |Info|
|-||-|
|userid |ID of user|
|loginradius_id |Login Radius Id of user|
|providername​ |Name of the Provider​|

 
####Short code help:

 

You can enable social login, sharing and counter anywhere in your website page using shortcodes. Just place following shortcodes where you want to show interface

 ####Shortcode for Social Login –

(vBulletin v4.x) :-

      {vb:raw template_hook.lr_interface} 

(vBulletin v3.x) :-

     $template_hook[lr_interface]
 

####Shortcode for Horizontal Social Sharing – 

(vBulletin v4.x) :-

     {vb:raw template_hook.lr_share}

(vBulletin v3.x) :-

    $template_hook[lr_share]
 
####Shortcode for  Vertical Social Sharing-

(vBulletin v4.x) :-

    {vb:raw template_hook.lr_vertical_share}

(vBulletin v3.x) :-

     $template_hook[lr_vertical_share]
 

####How to work with field mapping in Social Login:

1. Login to your admin panel.
2. Navigate to Advance Settings under Social Login And Social share.
3. Select Fields where you want to import LoginRadius Data.
 

####How to uninstall the module:

 
1. Login to your website admin panel.
2. Then go to Plugins & Products-> Manage Product section and uninstall the installed products Social Login.
3. Go to your FTP.
4. Remove the folder /root-dir/sociallogin 
 

####Troubleshooting:

####CURL and FSOCKOPEN  troubleshooting

1. CURL requires** cURL support = enabled** in your php.ini file.
2. FSOCKOPEN requires **allow_url_fopen = On** and **safemode = off** in your php.ini file.


If that does not work, you may need to contact your hosting provider to enable one of the option.