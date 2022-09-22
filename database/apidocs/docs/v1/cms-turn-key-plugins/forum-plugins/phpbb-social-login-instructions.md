phpBB Social Login instructions

----------------------------------------

 [phpBB Module Installation Guide](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#phpbb)

 [Module Configuration​](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#configuration)
 
[Further Help](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#further_help)

- [How to add Social Login interface at login page](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#login)?
- [How to add Social Login interface at register page?](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#register)
- [Short code help](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#short_code)
- [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#socialloginuninstall)
- [How to Clear your phpbb cache?](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#cache)
 
[Troubleshooting](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#troubleshooting)

- [CURL and FSOCKOPEN troubleshooting](https://support.loginradius.com/hc/en-us/articles/201994817-phpBB-Social-Login-instructions#curlissue)
 

####phpBB Module Installation Guide:


1. [Download](https://loginradius-social-plugins.s3.amazonaws.com/phpbb/Social-Login-and-Social-Share-1.0.0.zip) LoginRadius Module for phpBB.

2. Upload the module files and folder  contained in **/root** directory via FTP to **root** directory of your phpBB website.

_Note: If you are using custom template at you website. Also upload  the module files from** /root/styles/prosilver/template/ to /root/styles/YOUR_CUSTOM_TEMPLATE/template**._

 
3.Open the file install_loginradius.php in your browser that you have added to root directory in previous step and follow the installation step.

**Example:**

Open the file in your browser

```
http://example.com/install_loginradius.php
```

3(a). Install LoginRadius:: Social Login and Social share module.

![enter image description here](https://apidocs.lrcontent.com/images/blob-4_109258d215da8a1186.99298836.png "")

3(b). Confirm your decision.

![enter image description here](https://apidocs.lrcontent.com/images/blob-5_455758d21601ae6e05.24298099.png "")

3(c). Success Page.

![enter image description here](https://apidocs.lrcontent.com/images/blob-6_3205558d21623c54778.49367779.png "")

​
4.Open the file install.xml contained in the module folder in your browser and follow the given steps to add social login interface and social share widget in your theme.

5.After the installation, Clear your phpBB cache. Please follow the given steps :



- Login to your phpBB Administration control Panel(ACP).
- Click on the **General** tab.
- Press the button **Run Now** next to **Purge the cache**, Confirm your decision and your cache will be refreshed.​

![enter image description here](https://apidocs.lrcontent.com/images/blob-7_1116658d2167fe882c2.40632318.png "")



####Module Configuration:

1. Login to your phpBB  administration control panel (ACP).
2. Open the LOGINRADIUS tab.

![enter image description here](https://apidocs.lrcontent.com/images/blob-8_215158d216bec1f8c3.58537856.png "")


3.To activate the plugin, create an account with LoginRadius and get API Key and Secret to insert under API Settings. Help - How to get LoginRadius API Key and Secret?

####Further Help:


####How to add Social Login interface at login page?


1. Login to your FTP.
2. Open the file /root/styles/ YOUR_CUSTOM_TEMPLATE/template/ login_body.html
3. Add the following code mentioned below where you want to add.

 

      <!-- INCLUDE loginradius_social_login_interface.html -->

 


####How to add Social Login interface at register page?


1. Login to your FTP.
2. Open the file /root/styles/ YOUR_CUSTOM_TEMPLATE/template/ ucp_register.html
3. Add the following code mentioned below where you want to add.

 

    <!-- INCLUDE loginradius_social_login_interface.html -->

 

####Short Code help
You can enable Social Login and Social Share any where in your website page.using short codes. Place the following shortcode where want to show interface:


Shortcode for Social Login interface:

     <!-- INCLUDE loginradius_social_login_interface.html -->

 

ShortCode for Social Share widget:

     {LOGINRADIUS_SOCIAL_SHARE_WIDGET}     

 

####How to uninstall the module:
Open the file install_loginradius.php in your browser  and follow the given steps to uninstall the module.

**Example:**

Open the file in your browser

```
 http://example.com/install_loginradius.php
```
 

####How to Clear your phpbb cache?
1. Login to your phpBB Administration control Panel (ACP) .
2. Click on the **General **tab.
3. Press the button **Run Now** next to **Purge the cache**, Confirm your decision and your cache will be refreshed.

 

####Trouble shooting:
####CURL and FSOCKOPEN troubleshooting



​There is a button **" Verify API Settings "** in the **API Settings** section of the plugin. you need to choose one of following options

 

- CURL requires **cURL support = enabled** in your php.ini file.
- FSOCKOPEN requires **allow_url_fopen = On** and **safemode = off **in your php.ini file.


If that does not work, you may need to contact your hosting provider to enable one of the option.

 