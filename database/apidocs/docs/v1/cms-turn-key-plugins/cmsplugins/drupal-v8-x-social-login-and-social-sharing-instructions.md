# Drupal v8.x Social Login and Social Sharing Instructions

---

This document provides instructions for the LoginRadius Social Login module for Drupal v8.x. If you require additional components that are not included in your plugin please contact your product specialist at loginradius.com

##Menu

- [Installation Guide](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#installation)

- [Activation and Configuration](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#activation)

- [Troubleshooting](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#troubleshooting)

- [Advanced Customization](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#advanced)

###Installation

1. [Download](https://www.drupal.org/project/sociallogin) the Social Login module.

2. Login to Drupal admin panel.

3. Click on the **Extend** tab and then, click **Install new module**.

4. Browse for the **loginradius** zip file and hit the **install **button.

5. Click on **Extend** tab and you'll see the **LoginRadius Unified Social API module** in modules list in your site's admin account but **do NOT enable** the module yet because the required LoginRadius PHP SDK library is not installed.

6. Module comes with a file loginradius/sociallogin/composer.json. This file contains the dependency to LoginRadius PHP SDK so that Composer will know to download the SDK library in the next step.

7. Download and initialize Composer Manager to the /modules directory.

8. Let Composer download LoginRadius PHP SDK library for you. On command line of your server:

- Go to the root directory of your Drupal installation.
- Execute the following command to install php sdk only
    
   composer require loginradius/php-sdk:dev-api-v1

> ######_Note: If you want to update all required library then use the following command composer drupal-update_

- After successfully install LoginRadius PHP SDK , you can verify it by checking that LoginRadius PHP SDK is downloaded to /vendor/loginradius/php-sdk/src directory

  9.Enable the Social Login and Social Share modules and click on Save Configuration.

###Activation and Configuration

- [Account Configuration](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#act-acc-config)

- [Activation Steps](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#act-act-step)

- [Field Mapping](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#act-field-map)

####Account Configuration

> ######_Note: The full functionality of this module requires a LoginRadius API Key and a LoginRadius API Secret. If you do not have this data only the functionality of the Social Sharing component can be utilized. Please find further documentation on how you can obtain this data here_

####Activation Steps

1. Click on the **Configuration tab** in the top menu, click on **Social Login and Social Share** under People section.

2. Insert LoginRadius API Key, and API Secret as provided on your [loginradius.com](https://secure.loginradius.com/login) Admin-console.

3. Now, go through each tab (i.e. Social Login, Social Sharing, Advance Settings) to configure desired settings.

4. Click **Save configuration.**

####Field Mapping

To enable User Fields mapping to Social Provider Data

1. Login to Drupal admin panel.
2. Click on **MANAGE FIELD** section under **Configuration > Account settings**.
3. Create User fields as per your requirements.
4. Go to **Advance Settings** tab to map User Fields to Social Provider Data. All the User Fields will be listed down under **Social Login Field Mapping**
5. After that, hit the **Save configuration** button.

###Troubleshooting

- [Installation/Upgrading/Performance
  issue](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#trbl-inst-upgr-perform-issue)
- [Issue with Upgrade](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#trbl-curl-and-fsockopen)

####Installation/Upgrading/Performance issue

If there are issues related to login, user interface, upgrade and/or module performance then you should clear your website's cache after enabling the LoginRadius Module.

###Advanced Customization

1. [How can I change the email template for the registered users?](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#2-how-can-i-change-the-email-template-for-the-registered-users)
2. [My website is getting spam, how can I prevent it?](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#3-my-website-is-getting-spam-how-can-i-prevent-it) 3.[ How can I customize the layout of the pop-up?](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#4-how-can-i-customize-the-layout-of-the-pop-up)
3. [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#5-where-to-look-user-details-in-database)
4. [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#6-how-to-uninstall-the-module)
5. [Manual Installation of the Module for Drupal 7.x(not recommended)](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions#7-manual-installation-of-the-modulenot-recommended)

####1.How can I change the email template for the registered users?

1. Login to Drupal admin panel.
2. Navigate to** configuration **tab , click on **Account Settings**.
3. You can change Email-Content under **Email-s** section.

####2.My website is getting spam, how can I prevent it?

1. Login to Drupal admin panel.

2. Navigate to **configuration** tab , click on **Account Settings**.

3. Now check the **Require e-mail verification** when a visitor creates an account option under **REGISTRATION AND CANCELLATION** section.

####3. How can I customize the layout of the pop-up?

You can modify the CSS in

    sites\all\modules\sociallogin\css\socialloginandsocialshare.css file in Drupal root folder.

####4. Where to look user details in database

User details are stored in the **users** table and **loginradius_mapusers** table:-

**users** table :

|Column |Info|
|-||-|
|name| Username|
|email| user's email address|

**loginradius_mapuser**s table

|Column |Info|
|-||-|
|provider |Social network provider|
|provider_id|Social network provider ID|

####5. How to uninstall the module?

1. Login to Drupal admin panel.

2. Click on **Uninstall** under modules tab and check the **Social Login, Social Share **modules and after that, hit the **uninstall** button.

3. Go to your FTP and then go to the /modules. Delete the **loginradius** folder from **modules** directory. The plugin is uninstalled.

####6. Manual Installation of the Module(not recommended)

1. [Download](https://www.drupal.org/project/sociallogin) Social Login module for Drupal 8.x and extract the zip file.
2. Go to **/modules** directory in your Drupal root folder.
3. Then upload the extracted folder in **/modules/** directory.
4. Click on** modules **tab and you'll see the **LoginRadius Unified Social API** modules.
5. Enable the **Social Login** and **Social Share **modules. and click on **Save Configuration**.
