Joomla Customer Identity Extension instructions for v3.x
===
----

[ Joomla Module Installation Guide](https://support.loginradius.com/hc/en-us/articles/210000303-Joomla-Customer-Identity-Extension-instructions-for-v3-x#Joomlaguide)

 [Module Configuration](https://support.loginradius.com/hc/en-us/articles/210000303-Joomla-Customer-Identity-Extension-instructions-for-v3-x#configuration)

 [Further Help](https://support.loginradius.com/hc/en-us/articles/210000303-Joomla-Customer-Identity-Extension-instructions-for-v3-x#further_help)

- [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/210000303-Joomla-Customer-Identity-Extension-instructions-for-v3-x#socialloginuser)
- [How to uninstall the plugin](https://support.loginradius.com/hc/en-us/articles/210000303-Joomla-Customer-Identity-Extension-instructions-for-v3-x#socialloginuninstall)

    - [Manual uninstall](https://support.loginradius.com/hc/en-us/articles/210000303-Joomla-Customer-Identity-Extension-instructions-for-v3-x#socialloginunmanualuninstall)
  

####Joomla Installation Guide:-

NOTE : Before installing new version, please [uninstall](https://support.loginradius.com/hc/en-us/articles/201968987-Joomla-Social-Login-and-Social-Sharing-instructions-for-v2-5-to-v3-x-#socialloginuninstall) previous version of Login Radius User registration module.


1. Login to your Joomla admin panel.
3. Navigate to extension in the menu,and click on "Manage".        
![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-19_443458d113cb33acf4.58693504.png "")
5. Click on install tab under manage and browse extension zip file in upload & install Joomla
![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-22_2660958d113e6e5e824.43127864.png "")
 Extension.          

7. When you upload zip file, then you get a status message on same window. 
![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-21_435558d114137988c7.76833014.png "")

 

####Module Configuration:-


1. Navigate to **Extensions** menu, and click on **"Module Manager"**.

3. Filter results with **"User Registration"**.
 
5. Click on **User Registration** link, and select the position as you wish and change the status **Unpublished** to **Published**. Complete other information such as Show Title, Access etc.

7. Navigate to **components** menu, and click on User Registration and Management sub menu.        
![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-23_81458d114f742dfc2.05110836.png "")
9. Click on **User Registration** Tab.

11. To activate the plugin, insert Login radius **Site Name, API Key & Secret Key**.

13. And click on save button.
 
####Further Help:- 

  

####1.  Where to look user details in database:-

      User details are stored in the "PREFIX_loginradius_users" table. 

####5.    How to uninstall the plugin:-          
   
1. Navigate to extensions and click on **"Manage"**.

3.   Click on manage tab and filter with **"user**" word in search box and search it.

5.   Checked **User Registration Module, User Registration Plugin, User Registration and Management **and click on uninstall button.       

     ![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-24_1842358d115f95b8d70.12210444.png "")

####Manual uninstall

 - Navigate to **administrator/components** in your Joomla root folder and remove folder **com_userregistrationandmanagemen**t.

 - Navigate to **administrator\language\YOUR_LANGUAGE_CODE** and remove following files:-
               YOUR_LANGUAGE_CODE.com_userregistrationandmanagement.ini    
               YOUR_LANGUAGE_CODE.com_userregistrationandmanagement.sys.ini

 - Navigate to** language/YOUR_LANGUAGE_CODE **in your Joomla root folder and remove following files:-
              YOUR_LANGUAGE_CODE.com_userregistrationandmanagement.ini 
              YOUR_LANGUAGE_CODE.mod_userregistration.ini 
              YOUR_LANGUAGE_CODE.mod_userregistration.sys.ini

 - Navigate to** modules** in your joomla root folder and remove folder **mod_userregistration**.

- Navigate to **plugins/content** in your joomla root folder and remove folder **socialshare**.

- Navigate to** plugins/system** in your joomla root folder and remove folder **userregistration,singlesignon,socialprofiledata,hostedpage**.

- Navigate to **media** in your joomla root folder and remove folder **com_userregistrationandmanagement**.

- Navigate to **components** in root directory and find the folder with **com_userregistrationandmanagement** name, remove it.

Remove **Images/sociallogin** folder in your joomla root directory.

Login to your **sql database** and run the following query (Replace PREFIX with your Joomla database prefix)
 

             DROP TABLE IF EXISTS `PREFIX_LoginRadius_settings`;
             DROP TABLE IF EXISTS `PREFIX_LoginRadius_users`;
             DELETE FROM `PREFIX_assets` WHERE `name` =                                                              "com_userregistrationandmanagement";
             DELETE FROM `PREFIX_extensions` WHERE `element` =                                                'com_userregistrationandmanagement;
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'mod_userregistration';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'userregistration';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'socialshare';

             DELETE FROM `PREFIX_extensions` WHERE `element` = 'singlesignon';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'socialprofiledata';
             DELETE FROM `PREFIX_extensions` WHERE `element` = 'hostedpage';
             DELETE FROM `PREFIX_menu` WHERE `title` =                                                                 "COM_USERREGISTRATIONANDMANAGEMENT";
             DELETE FROM `PREFIX_modules` WHERE `module` = 'mod_userregistration';

             DELETE FROM `PREFIX_menu` WHERE `title` = "COM_LOGINRADIUS_SOCIAL_SHARING";

             DELETE FROM `PREFIX_menu` WHERE `module` = 'COM_LOGINRADIUS_USERMANAGER';
