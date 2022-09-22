# Magento Advanced Plugin Instructions

---

Based on your LoginRadius plan you have, you may have access to one or more of the following components. This document provides a installation guide for the Magento Advanced Plugin. If you require additional components that are not included in your plugin please contact your product specialist at [loginradius.com](https://www.loginradius.com)

##Menu

- Installation
- Activation and Configuration
- User Registration
- Troubleshooting
- Integrations
- Advanced Customization

###Installation Guide

> Note: To obtain the latest LoginRadius User Registration plugin please navigate here to the Magento plugins page by LoginRadius or download the plugin via the LoginRadius Admin-console

1. Login to Magento Website Admin Panel.
2. Navigate to System->Magento Connect-> Magento Connect Manager. Login again, if asked for.
   ![enter image description here](https://apidocs.lrcontent.com/images/magento-connect-manager_276358d1056755c068.43656773.png)
3. Under Install New Extensions section paste the key in Paste extension key to install: field and click Install.
   ![enter image description here](https://apidocs.lrcontent.com/images/extension-key_1455458d1058f7daa90.93262884.png)
4. If you are using .tgz file for installing the module then Under Direct Package File Upload section, hit Choose file.Locate the tgz file provided by LoginRadius and hit Upload.
   ![enter image description here](https://apidocs.lrcontent.com/images/upload-package-file_3199058d105b748a060.59716390.png)

###Activation and Configuration
####Account Configuration

> Note: The full functionality of this extension requires a LoginRadius Site name, LoginRadius API Key and a LoginRadius API Secret. If you do not have this data only the functionality of the Social Sharing component can be utilized. Please find further documentation on how you can obtain this data [here](http://ish.re/INI1)

####Activation Steps

1. Navigate to System > Configuration.
   ![enter image description here](https://apidocs.lrcontent.com/images/configuration_799458d106a9a15143.67892122.png)
2. Configure the settings in the Activation page under the LoginRadius section in the left panel.
   ![enter image description here](https://apidocs.lrcontent.com/images/social-share-new_827658d106b563c824.08264568.png)

   > Note: If you have 404 error after navigating to Activation, just log out from Magento admin and login again.

3. Insert LoginRadius API Key, and API Secret as provided on your loginradius.com Admin-console.
   ![enter image description here](https://apidocs.lrcontent.com/images/apikey-secret-new_263158d106c09560a1.07758602.png)
4. Click Save Config

###User Registration

1. Install the plugin using the same install guide above
2. After installing the plugin navigate to Magento Admin Panel->System->Configuration
3. On the left you will find the LOGINRADIUS plugin configuration
4. Click on the Customer Registration section
5. The Customer Registration component should have been activated by entering your API Key and Secret as per the activation steps above
6. Logout and navigate to the frontend of your site
7. Click Account->Log In in the top right hand corner of your site
8. You should now see the login interface by default and any social login providers that you have configured on the loginradius.com Admin-console
   > Note: You will still have access to your admin accounts by navigating to the admin login page for your site

###User Registration Configuration

####Basic Settings:

A) Enable Hosted Page : You can enable or disable the hosted page login/register functionality by using this option.
![enter image description here](https://apidocs.lrcontent.com/images/enablehostedpage_2197458d10734d8cf38.88501651.png)
B) Redirection After Login: You can choose the page where to redirect after successful login.
####Interface Customization Settings
![enter image description here](https://apidocs.lrcontent.com/images/interfacecustomization_905658d1075ba3f703.19409255.png)

1. **Title** : You can set the title name according to you and it will reflect on the front end just above the social login interface
2. **Display Form Validation Message** : You can select to "Yes" if you want to show the validation message on registration page below the form fields.
3. **Displays Terms and Condition** : You can write your own terms and condition in this field and it reflects just above the submit button on registration page.
4. **Form Render Delay Time** : You can set the delay time in milliseconds to delay the registration form to load on front end Ex: you can set 5000 in the field then form will load in 5 secs.
5. **Google Recaptcha** : Enter your v2 google recaptcha public key if you have configured in Admin-console.
6. **Password Configuration** : You can set the min-length and max-length of password accordingly in the given fields and it will reflect on the password field of registration page on front end.

####Advance Settings
![enter image description here](https://apidocs.lrcontent.com/images/advance-settings_122958d107bd8025b0.71840698.png)

1. **Update profile data** : Select "Yes" if you want to update the profile data in magento website database everytime when user logged In.
2. **Email Verification** : You can select the options based on the app settings you have configured i.e you can choose either one from required,optional or disable.
3. **Enable UserName Login** : If you have selected "Yes" then you can login with your user name also, this option will show on the login form with email address i.e user can login with either of email address or username. Note:- This option will only be visible when you have selected Email Verification to "required".
4. **Login Upon Email Verification** : If you have selected "Yes" then after email verification process user will be successfully login. Note:- This option will only visible when you have selected email verification to "required or optional".
5. **Prompt Password on Social Login** : If you have selected "Yes" then when user login with social provider a popup will generate to ask for password after filling the password then a traditional profile will be created for the user. Note:- This option will only be visible when you have selected email verification to "required".
6. **Email Template Configuration**: You can add the template id of the template which you have created in Admin-console.
7. **Debug Configuration** : If you have selected "Yes" then all the api logs will be created and saved into the magento database.

####Social Share Settings Configuration :

1. Enable the sharing theme accordingly i.e Horizontal sharing or Vertical Sharing.
   ![enter image description here](https://apidocs.lrcontent.com/images/advanced-social-share_1288558d10899a38d73.16159306.png)

2. **Mobile Friendly** : Enabling this option shows a mobile sharing interface to the mobile users.
3. **Email Content read only** : Enabling this options means user won’t be able to change the email address during sharing.
4. **Email Subject** : You can add the email subject accordingly during sharing.
5. **Email Message** : You can add email message accordingly during sharing.
6. **Short Url** : Enabling this will create the short url of sharing by using ish.re
7. **Total Share** : Enabling this will display total shares from all providers.
8. **Open all providers in single window** : Enabling this will open all the providers in single window popup.
9. **Custom PopUp Window Size** : You can set your own PopUp window size by defining height and width.
10. **Twitter Handle** : Entering the text in this field will be shown during twitter share "via @twitterhandle".
11. **Twitter Hash tags** : Entering the hashtag text in this field will be shown in all tweets.
12. **Facebook AppId** : If you want to track social sharing on your app then enter your facebook appId.
13. **Custom Sharing Options** : You can add custom sharing options accordingly for example you can visit the [link](/api/v2/social-sharing-api/advanced-social-sharing-customization#customicons0)

####Social Profile Data
![enter image description here](https://apidocs.lrcontent.com/images/social-data-profile_2572958d10958e959b2.46608909.png)

You can select the profile data options accordingly to save in your database

###Interface Examples
####Login Interface
![enter image description here](https://apidocs.lrcontent.com/images/lr-ma-advanced-login_1974258d109a61add78.10867319.png)
####Registration Interface
![enter image description here](https://apidocs.lrcontent.com/images/lr-ma-advanced-registration_584558d109b222b675.51120347.png)
####Lost Password Interface
![enter image description here](https://apidocs.lrcontent.com/images/lr-ma-advanced-lostpass_1983958d10b36c374a0.64471189.png)

###Integrations
####Mailchimp

1. Navigate to your Magento Admin Panel->System->Configuration->LoginRadius->MailChimp Settings.
2. Set "Do you want to enable MailChimp" to Yes
3. Input your Mailchimp API key and click Save config.
4. Click on Get Lists.
5. Select from the dropdown the list you would like to send users into.
6. Under "Mapping Fields Configuration" select the LoginRadius fields that you would like to associate with the List Items.
7. Click on Save Settings.

####Troubleshooting

##### CURL and FSOCKOPEN troubleshooting

If you are not logged in after clicking Social Login icons on your website then enable one of the following at your website server (you may need to contact your hosting provider to enable one of these)

- CURL requires cURL support = enabled in your php.ini file.
- FSOCKOPEN requires allow_url_fopen = On and safemode = off in your php.ini file.

##### After installation, Extension menu is not loading properly in Magento admin panel

Follow the steps mentioned below:

1. Navigate to System > Cache Management in Magento admin panel
2. Click Select All, select Refresh in Actions, hit Submit button.
3. Click Select All, select Disable in Actions, hit Submit button.
4. Hit Flush Magento Cache and Flush Cache Storage buttons.
5. Open your favorite FTP Application.
6. Delete the contents of var/cache folder (located in your Magento root folder).
7. Navigate to System > Index Management > Select All [check-boxes] > Actions = Reindex Data > Submit
8. Navigate to System > Tools > Compilation and click Disable button. If compilation is already disabled, you need not do this.
   > Note: After you verify and get the extension working, enable the cache and compilation again by navigating to the pages mentioned in step 1 and step 8, respectively.

###Advanced Customization

#####How to Get LoginRadius extension key?

- Go to extension Web Page
- Click on install now. Login if you are not already.
- Select checkbox and click on Get Extension Key.
  ![enter image description here](https://apidocs.lrcontent.com/images/get-lr-extension-key_2401958d10cf8f32fa8.01912643.png)

#####Where to look at customer details in database?

- User details are stored in the sociallogin table ( being your Magento database table prefix) as mentioned below:

| Column         | Info                          |
| -------------- | ----------------------------- |
| sociallogin_id | Social provider ID            |
| entity_id      | Entity ID of Magento customer |
| avatar         | Social avatar url             |
| provider       | Social provider name          |

> Note: Tables which stores extra data are prefixed with <loginradius\_>

#####How can I customize the layout of the pop-up?

File responsible for popup css is available in directory `root\skin\frontend\base\default\Loginradius\Sociallogin\css\popup.css` file in Magento root folder.

#####How to display sharing on product list pages?

To add social sharing on product list page please add following code in file `app\design\frontend{your-theme}\default\template\catalog\product` below `<li class="item<?php` (Below both occurrences)

```
<?php echo '<div class="loginRadiusHorizontalSharing"></div>'; ?>
```

#####How to setup plugin extension with Magento multisite?

1. Install the Social Login extension on your main website in the multisite network. By default Social Login configuration of the Main Website/Store in the multisite network will be inherited in the other websites/stores. If you want to configure Social Login for each website in the network individually then follow the next steps.
2. Navigate to System > Configuration
3. Click on Social Login and Social Share in the LoginRadius section in the left pan.
4. In the Current Configuration Scope section at the top left, you can select different websites/stores in the multisite network and configure Social Login options for each
5. Note: The single LoginRadius API Key and Secret will work with all the network sites’ Social Login and need not to create social network apps for each subdomain. For this, you have to enable multisite feature in your LoginRadius account. This is a paid feature and comes with LoginRadius Pro and higher plans. Click here to learn more!

###Widgets

To enable widgets follow the below mentioned steps:

Social Sharing Widget Instance
Embedding Social Sharing in CMS Content Pages

Social Sharing Widget Instance

If want to show Social Sharing multiple pages and don’t want to edit each page individually, then you can add a widget instance.

1. Navigate to the Widgets area under the CMS section in admin panel and click Add new widget instance
   ![enter image description here](https://apidocs.lrcontent.com/images/add-new-widgets_1488658d10ded2c7b66.43752347.png)
2. Select the Social Sharing - Horizontal orSocial Sharing - Vertical in type. Select a design/package theme and click Continue

Widget for Horizontal Social Sharing - LoginRadius - Horizontal Sharing

> Note: (Requires Enable Horizontal Social Sharing switch on under Magento Admin Panel->System>Configuration->Social Share->Horizontal Social Sharing Tab)

Widget for Vertical Social Sharing - LoginRadius - Vertical Sharing

> Note: (Requires Enable Vertical Social Sharing switch on under Magento Admin Panel->System->Configuration-> Social Share->Vertical Social Sharing Tab)

3. Give this widget a title ( for example – Social Sharing). This won’t display on the page, but serves as unique identifier. Leave the sort order field unless you are going to use this widget a space having multiple blocks of different sort orders.

4. Now click on Add Layout Update and select which place you want to add this widget instance. Finally click Save
   ![enter image description here](https://apidocs.lrcontent.com/images/save-widget-instance_3255358d10e69e1cfc9.91602949.png)
   Embedding Social Sharing in CMS Content Pages(Individually)

5. Navigate to the Pages area located under the CMS section of the Admin navigation
   ![enter image description here](https://apidocs.lrcontent.com/images/lr-ma-advanced-cms-pages_545458d10e8e404447.29892157.png)

6. Navigate to the page you want to place Social Sharing. Click on Content tab on the left bar. Place cursor where you want to place social sharing and click on Insert Widget icon.
   ![enter image description here](https://apidocs.lrcontent.com/images/lr-ma-advanced-content-widget-insertion_2336658d10eacba7d66.11323468.png)

7. Select Social Sharing - Horizontal or Social Sharing - Vertical as widget type.
   ![enter image description here](https://apidocs.lrcontent.com/images/lr-ma-advanced-content-widget-insertion-1_213458d10ecd268dc9.55055664.png)

8. Click Insert widget and Save Page. Now you can see the selected widget on that page.

###How to uninstall the extension?

Remove/Delete the following files/folders from your Magento root folder:

- app/code/community/Loginradius
- app/design/frontend/base/default/layout/sociallogin.xml
- app/design/adminhtml/default/default/layout/loginradius_sociallogin.xml
- app/design/frontend/base/default/template/sociallogin
- app/etc/modules/Loginradius_Sociallogin.xml
- skin/frontend/base/default/Loginradius

  > Note: If you have User Registration module installed, then remove following files also.

- app/code/community/LoginradiusRaas
- app/design/frontend/base/default/layout/raas.xml
- app/design/adminhtml/default/default/layout/loginradiusraas_raas.xml
- app/design/frontend/base/default/template/raas
- app/etc/modules/LoginradiusRaas_Raas.xml
- skin/frontend/base/default/LoginradiusRaas
- skin/adminhtml/default/default/LoginradiusRaas
  Delete [PREFIX]sociallogin table from your magento database. [PREFIX] is your Magento database tables' prefix. Also delete all table which start from loginradius\_
