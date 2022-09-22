# Magento Social Login instructions

---

This document provides instructions for the LoginRadius Social Login for Magento. If you require additional components that are not included in your plugin please contact your product specialist at loginradius.com

##Menu

- Installation Guide
- Activation and Configuration
- Troubleshooting
- Advanced Customization

###Installation Guide

1. Login to Magento Website Admin Panel.
2. Navigate to System->Magento Connect-> Magento Connect Manager. Login again, if asked for.
   ![enter image description here](https://apidocs.lrcontent.com/images/magento-connect-manager-1_3110658d16f4a9b6a09.52042450.png)
3. Under Install New Extensions section paste the key in Paste extension key to install: field and click Install.
   ![enter image description here](https://apidocs.lrcontent.com/images/extension-key-1_3049658d16f5b20ecb2.73995388.png)
4. If you are using .tgz file for installing the module then Under Direct Package File Upload section, hit Choose file.Locate the tgz file provided by LoginRadius and hit Upload.
   ![enter image description here](https://apidocs.lrcontent.com/images/upload-package-file-1_1650258d16f6cd87131.71327177.png)

###Activation and Configuration

####Account Configuration

> Note: The full functionality of this extension requires a LoginRadius Site name, LoginRadius API Key and a LoginRadius API Secret. If you do not have this data only the functionality of the Social Sharing component can be utilized. Please find further documentation on how you can obtain this data [here](http://ish.re/INI1)

####Activation Steps

1. Navigate to System > Configuration.
   ![enter image description here](https://apidocs.lrcontent.com/images/configuration-1_1666358d16fe1d34c21.74796646.png)
2. Configure the settings in Social Login and Social Share" page under "LoginRadius section in the left pan.
   ![enter image description here](https://apidocs.lrcontent.com/images/social-login-social-share_3269758d170182d3293.51655525.png)

   > Note: If you have 404 error after navigating to Social Login and Social Share page, just log out from Magento admin and login again.

3. Insert LoginRadius API Key, and API Secret as provided on your loginradius.com Admin-console.
   ![enter image description here](https://apidocs.lrcontent.com/images/apikey-secret_1610958d1704aedde79.36098514.png)

4. Click Save Config

####Widgets

To enable widgets follow the below mentioned steps:

1. Social login and Sharing Widget Instance
2. Embedding Social Login and Sharing in CMS Content Pages
3. Social login and Sharing Widget Instance <br>If want to show Social Login interface on multiple pages and don’t want to edit each page individually, then you can add a widget instance.

4. Navigate to the Widgets area under the CMS section in admin panel and click Add new widget instance
   ![enter image description here](https://apidocs.lrcontent.com/images/add-new-widgets-1_664658d170dfa7d0a5.25628862.png)

5. Now select the Social Login, Social Sharing - Horizontal or Social Sharing - Vertical in type.Select a design/package theme and click Continue
6. Widget for Horizontal Social Sharing - LoginRadius - Horizontal Sharing

> Note: (Requires Enable Horizontal Social Sharing switch on under Magento Admin Panel>System>Configuration>Social Login and Social Share>Horizontal Social Sharing Tab)

6. Widget for Vertical Social Sharing - "LoginRadius - Vertical Sharing"

> Note: (Requires Enable Vertical Social Sharing switch on under Magento Admin Panel>System>Configuration>Social Login and Social Share>Vertical Social Sharing Tab)

7. Give this widget a title ( for example – Social Login). This won’t display on the page, but serves as unique identifier. Leave the sort order field unless you are going to use this widget a space having multiple blocks of different sort orders.

8. Now click on Add Layout Update and select which place you want to add this widget instance. Finally click Save
   ![enter image description here](https://apidocs.lrcontent.com/images/save-widget-instance-1_2486758d1714631f174.23315974.png)

9. Embedding Social Login and Sharing in CMS Content Pages(Individually)

- Navigate to the Pages area located under the CMS section of the Admin navigation.
  ![enter image description here](https://apidocs.lrcontent.com/images/cms-pages_2360558d17207430a81.26121850.png)
- After this, navigate to the page you want to place Social Login. Click on Content tab on the left bar. Place cursor where you want to place social login and click on Insert Widget icon.
  ![enter image description here](https://apidocs.lrcontent.com/images/content-widget-insertion_1149258d172312dca87.56607150.png)
- Select Social Login, Social Sharing - Horizontal or Social Sharing - Vertical as widget type and enter the text you want to display before Social Login interface.
  ![enter image description here](https://apidocs.lrcontent.com/images/content-widget-insertion-1_668158d17274409010.97691710.png)
- Click Insert widget and Save Page.Now you can see the selected widget on that page. ![enter image description here](https://apidocs.lrcontent.com/images/insert-widget_150558d17287e173a7.64593305.png)
  ![enter image description here](https://apidocs.lrcontent.com/images/save-widget-instance-2_2988958d1729d0680f6.78587909.png)

###Troubleshooting
####CURL and FSOCKOPEN troubleshooting

If you are not logged in after clicking Social Login icons at your website then enable one of the following at your website server (you may need to contact your hosting provider to enable one of these):

CURL requires cURL support = enabled in your php.ini file.

FSOCKOPEN requires allow_url_fopen = On and safemode = off in your php.ini file.

####After installation, Extension menu is not loading properly in Magento admin panel

Follow the steps mentioned below:

1. Navigate to System > Cache Management in Magento admin panel
2. Click Select All, select Refresh in Actions, hit Submit button.
3. ​Click Select All, select Disable in Actions, hit Submit button.
4. Hit Flush Magento Cache and Flush Cache Storage buttons.
5. Open your favorite FTP Application.
6. Delete the contents of var/cache folder (located in your Magento root folder).
7. Navigate to System > Index Management > Select All [check-boxes] > Actions = Reindex Data > Submit
8. Navigate to System > Tools > Compilation and click Disable button. If compilation is already disabled, you need not do this.
   > Note: After you verify and get the extension working, enable the cache and compilation again by navigating to the pages mentioned in step 1 and step 8, respectively.

###Advanced Customization

####How to enable Social Login on checkout page?

1. For Magento v1.9

- Open app\design\frontend{your-theme}\default\template\checkout\onepage.phtml.
- Place following code where you want Social Login interface to appear

```
<?php echo this->getLayout()->createBlock('sociallogin/sociallogin')->setTemplate('sociallogin/sociallogincustom.phtml')->toHtml();?>
```

2. For Magento v1.5 to v1.8.

- Open app\design\frontend\base\default\template\checkout\onepage\login.phtml.This file is template file for Checkout page.
- Place following code where you want Social Login interface to appear (probably below login form) on this page:-

```
<?php echo $this->getLayout()->createBlock('sociallogin/sociallogin')->setTemplate('sociallogin/sociallogincustom.phtml')->toHtml(); ?>
```

- If it doesn’t work then place the above mentioned code in the following file:app\design\frontend\base\default\template\persistent\checkout\onepage\login.phtml
- Save the file back. Clean Magento cache and Social Login Interface is enabled at checkout page.![enter image description here](https://apidocs.lrcontent.com/images/checkout-page_2769058d17375e05390.06212121.png)

####How to Get LoginRadius extension key?

- Go to extension Web Page
- Click on install now. Login if you are not already.
- Select checkbox and click on Get Extension Key.
  ![enter image description here](https://apidocs.lrcontent.com/images/get-lr-extension-key-1_2706958d173b5426d55.18989168.png)

####How to setup plugin extension with Magento multisite?

- Install the Social Login extension on your main website in the multisite network. By default Social Login configuration of the Main Website/Store in the multisite network will be inherited in the other websites/stores. If you want to configure Social Login for each website in the network individually then follow the next steps.
- Navigate to System > Configuration
- Click on Social Login and Social Share in the LoginRadius section in the left pan.
- In the Current Configuration Scope section at the top left, you can select different websites/stores in the multisite network and configure Social Login options for each
  > Note: The single LoginRadius API Key and Secret will work with all the network sites’ Social Login and need not to create social network apps for each subdomain. For this, you have to enable
  > multisite feature in your LoginRadius account. This is a paid feature and comes with LoginRadius Pro and higher plans. Click here to learn
  > more!

####How can i change the email template for the registered users?

1. Navigate to Social Login Advanced Settings section on Social Login and Social Share page in Magento admin panel.
2. You can specify required email message in User notification email message option.
3. Click Save Changes button.

####Where to look at customer details in database?

User details are stored in the sociallogin table ( being your Magento database table prefix) as mentioned below:

| Column         | Info                          |
| -------------- | ----------------------------- |
| sociallogin_id | Social Provider ID            |
| entity_id      | Entity ID of Magento Customer |
| avatar         | Social avatar                 |
| provider       | Social ID Provider            |

####How can I customize the layout of the pop-up?

File responsible for popup css is available in directory root\skin\frontend\base\default\Loginradius\Sociallogin\css\popup.css file in Magento root folder.

####How to display sharing on product list pages?

To add social sharing on product list page please add following code in file app\design\frontend{your-theme}\default\template\catalog\product below `<li class="item<?php` (Below both occurrences)

```
<?php echo '<div class="loginRadiusHorizontalSharing"></div>';?>
```

####How to uninstall the extension?

Remove/Delete the following files/folders from your Magento root folder:

- app/code/community/Loginradius
- app/design/frontend/base/default/layout/sociallogin.xml
- app/design/adminhtml/default/default/layout/loginradius_sociallogin.xml
- app/design/frontend/base/default/template/sociallogin
- app/etc/modules/Loginradius_Sociallogin.xml
- skin/frontend/base/default/Loginradius

Delete [PREFIX]sociallogin table from your magento database. [PREFIX] is your Magento database tables’ prefix. Also delete all table which start from loginradius\_
