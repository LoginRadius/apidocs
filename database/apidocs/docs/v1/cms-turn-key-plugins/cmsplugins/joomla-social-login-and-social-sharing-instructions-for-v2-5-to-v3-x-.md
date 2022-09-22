Joomla Social Login and Social Sharing instructions for v2.5 to v3.x
===
----

[Joomla Module Installation Guide
](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#Joomlaguide)
 
[Module Configuration](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#configuration)

[ Further Help](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#further_help)



- [How to integrate Social Login with Joomla Communities?](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginwithcb)
- [How to use SocialLogin on Joomla login and regster page](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginlogin)
- [How to receive email notification whenever a User sign-in using Social Login](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginsignin)
- [How to hide the default Joomla login when using Social Login with Community Builder?](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginhidecb)
- [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginuser)
- [How to uninstall the plugin](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginuninstall)

    - [Manuall uninstall](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginunmanualuninstall)

####Joomla Installation Guide

NOTE : Before installing new version, please uninstall previous version of LoginRadius Social Login.
1. Log in to your Joomla admin panel.
2. Navigate to Extensions in the menu, and click on "Extension Manager".
![enter image description here](https://apidocs.lrcontent.com/images/6-1_2739458d168ebcb9737.27676398.png "")

3.Click on install tab and browse [extension zip](https://github.com/LoginRadius/joomla-identity-extension/blob/api-v1/package/user_registration_and_management.zip) file in Upload Package File Panel.
![enter image description here](https://apidocs.lrcontent.com/images/7-1_2925958d168e13e6e67.90511888.png "")

4.When you** upload zip** file, then you get a status message on same window.


![enter image description here](https://apidocs.lrcontent.com/images/8-1_3229558d1692c8a5386.38071285.png "")

####Module Configuration

1. Navigate to **Extensions** menu, and click on **"Module Manager"**
![enter image description here](https://apidocs.lrcontent.com/images/9-1_2452858d1699f9d2a42.67003476.png "")
2. Filter results with **"Social Login"**.
3 Click on **Social Login** link, and select the position as you wish and change the status **Unpublished **to **Published**. Complete other information such as Show Title, Access etc.
4. In **Menu assignment** panel you can assign module to pages where you want to show Social Login Interface, and click on **Save & Close** button.

![enter image description here](https://apidocs.lrcontent.com/images/10-1_2886058d16a0ceb8957.89591110.png "")

5.Now navigate to **Components **menu, and click on **Social Login and Social Share** submenu.

6.Click on **Social Login** Tab.

7.To activate the plugin, insert LoginRadius API Key & Secret ([How to get API Key and Secret?](/account/get-api-key-and-secret).

------------



####Further Help
1. **How to integrate Social Login with Joomla Communities**(Steps to show community builder profile link)



- Navigate to Menus > Menu Manager.
- Click on Menu Items.
- Create new menu by click on New Button.
- Click on select button in front of Menu Item Type option .
- Select User profile link, and fill other detail and click on Save & Close button.
- Now navigate to Components, and click on Social Login and Social Share submenu.
- Click on Social Login Tab, and change "Where do you want to redirect your users after successfully logging in?" option to the link created above in LoginRadius Basic Settings Panel.
- And click on Save & Close button.

**Paste the code mentioned below in the files mentioned for the corresponding communities**

    <?php
     jimport( 'joomla.application.module.helper' );
     $module = JModuleHelper::getModule( 'mod_socialloginandsocialshare');
     $attribs['style'] = 'xhtml';
     echo JModuleHelper::renderModule( $module, $attribs );
     ?>

####Community builder:

Go to your FTP and open the below file in edit mode and add the above code where you want to display social login module with community builder.

      /modules/mod_cblogin/mod_cblogin.php

####Jom Social:
Go to your FTP and open the below file in edit mode and add the above code where you want to display social login module with jom social.

     /components/com_community/templates/default/frontpage.guests.php

####Kunena Forum:
Go to your FTP and open the below file in edit mode and add the above code where you want to display social login module with kunena.

      /components/com_kunena/template/blue_eagle/html/common/login.php

####K2:
 Go to your FTP and open the below file in edit mode and add the above code where you want to display social login module with K2.

     /modules/mod_k2_user/tmpl/login.php 

####Mijoshop:
Go to your FTP and open the below file in edit mode and add the above code where you want to display social login module with Mijoshop Login Page.

    /components/com_mijoshop/opencart/catalog/view/theme/default/template/account/login.tpl

Go to your FTP and open the below file in edit mode and add the above code where you want to display social login module with Mijoshop Register Page.

    /components/com_mijoshop/opencart/catalog/view/theme/default/template/account/register.tpl

####2. How to use SocialLogin on Joomla login and register page :
​
**Paste the code mentioned below in the files**

    <?php
     jimport( 'joomla.application.module.helper' );
     $module = JModuleHelper::getModule( 'mod_socialloginandsocialshare');
     $attribs['style'] = 'xhtml';
     echo JModuleHelper::renderModule( $module, $attribs );
     ?>
**Show on default Joomla Login Module :**

  Go to your site FTP and open the below file in edit mode and add the above code where you want to display social login module with login Module.

     /modules/mod_login/tmpl/default.php 
**Show on default Joomla Login Page :**
   
Go to your site FTP and open the below file in edit mode and add the above code where you want to display social login module with joomla login page.

    /components/com_users/views/login/tmpl/default_login.php 
**Show on default Joomla Register Page :**
    
Go to your sire FTP and open the below file in edit mode and add the above code where you want to display social login module with joomla registeration page.

    /components/com_users/views/registration/tmpl/default.php 
####3. How to receive email notification whenever a User sign-in using Social Login:



- Navigate to** Components**, and click on **Social Login and Social Share** sub menu.
- Click on **Social Login **Tab and change the setting in **LoginRadius Basic Settings** Panel.
- Change the setting of **"Do you want to send emails to admin after new User registrations at your website?"** to **"Yes"**, and click on Save & Close Button.


####4.How to hide the default Joomla login when using Social Login with Community Builder:



- Navigate to **Component**s, and click on **Social Login and Social Share** submenu.
- Click on **Social Login** Tab and change the setting in **Social Login Interface Settings** Panel.
- Change setting of** "Do you want to show Social Login interface alongside Joomla traditional login form?"** to **"No"**
- Navigate to **Extensions** in the menu, and click **"Extension Manager"**.
- Checked Login Form’s checkbox, and click on** Unpublish** button.


####5.Where to look user details in database:
  User details are stored in the **"loginradius_users"** table in the following columns:-

|Column	|Info|
|-||-|
|id	|User id|
|LoginRadius_id	|Social Provider ID|
|provider|	Social Network Provider|
|lr_picture|	Social Provider avatar|

####6. How to uninstall the plugin:


- Navigate to **Extensions**, and click on **Extension Manager**.
- Click on **Manage** Tab and filter with **"Social Login and Social Share"** word in search box and search it.
- Checked all, and click on **Uninstall** button.

####Manual uninstall



- Navigate to **administrator/components **in your Joomla root folder and remove folder **com_socialloginandsocialshare**
- Navigate to **administrator\language\YOUR_LANGUAGE_CODE** and remove following files:-
    
** YOUR_LANGUAGE_CODE.com_socialloginandsocialshare.ini                  YOUR_LANGUAGE_CODE.com_socialloginandsocialshare.sys.ini**

- Navigate to **language/YOUR_LANGUAGE_CODE** in your Joomla root folder and remove following files:-
    
**YOUR_LANGUAGE_CODE.com_socialloginandsocialshare.ini                YOUR_LANGUAGE_CODE.mod_socialloginandsocialshare.ini                YOUR_LANGUAGE_CODE.mod_socialloginandsocialshare.sys.ini**

- Navigate to **modules** in your joomla root folder and remove folder **mod_socialloginandsocialshare.**
- Navigate to** plugins/content** in your joomla root folder and remove folder **socialshare**.
- Navigate to** plugins/system** in your joomla root folder and remove folder **socialloginandsocialshare.**
- Navigate to **media** in your joomla root folder and remove folder **com_socialloginandsocialshare.**
- Navigate to **components** in root directory and find the folder with **com_socialloginandsocialshare** name, remove it.
- Remove **Images/sociallogin** folder in your joomla root directory.
- Login to your **sql database** and run the following query (Replace PREFIX with your Joomla database prefix)
             DROP TABLE IF EXISTS `PREFIX_LoginRadius_settings`;
             DROP TABLE IF EXISTS `PREFIX_LoginRadius_users`;
             DELETE FROM `PREFIX_assets` WHERE `name` = "com_socialloginandsocialshare";
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'mod_socialloginandsocialshare';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'socialloginandsocialshare';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'socialshare';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'com_socialloginandsocialshare';
             DELETE FROM `PREFIX_menu` WHERE `title` = "COM_SOCIALLOGINANDSOCIALSHARE";
             DELETE FROM `PREFIX_modules` WHERE `module` = 'mod_socialloginandsocialshare';
 
