# Drupal v8.x Customer Identity Module Instruction

---

This document provides instructions for installing the LoginRadius Customer Identity module for Drupal v8.x. If you require additional components that are not included in your plugin please contact your product specialist at loginradius.com

##Menu

- [Installation Guide](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#installation)

- [Activation and Configuration](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#activation)

- [Social Login](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#sociallogin)

- [Social Sharing](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#socialsharing)

- [User Registration](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#userregistration)

- [Social Profile Data](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#social-profile-data)

- [Single Sign On](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#single-sign-on)

- [Hosted Page
  ](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#hostedpage)

- [Troubleshooting](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#troubleshooting)

- [Advanced Customization](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#advanced)

###Installation

1. [Download](https://github.com/LoginRadius/drupal-identity-module/blob/master/drupal-8/package/customer_identity_and_access_management.zip) the Customer Identity module.

2. Login to Drupal admin panel.

3. Click on the **Extend** tab and then, click **Install new module**.

4. Browse for the** loginradius** zip file and hit the install button.

5. Click on **Extend** tab and you'll see the **LoginRadius Unified Social API** module in modules list in your site's admin account but** do NOT enable** the module yet because the required LoginRadius PHP SDK library is not installed.

6. First run the composer package ([Check](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#lr_php_sdk)) before enable the module.

7. Enable the Customer Identity modules and click on Save Configuration.

> ######_Note: Make sure you clear the website's cache (To learn how to do that, see ​​[http://drupal.org/node/326504](https://www.drupal.org/node/326504))_

###Activation and Configuration

- [Account Configuration](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#act-acc-config)
- [Activation Steps](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#act-act-step)
- [Field Mapping](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#act-field-map)

####Account Configuration

> ######_Note: The full functionality of this module requires a LoginRadius API Key and a LoginRadius API Secret. Please find further documentation on how you can obtain this data here_

####Activation Steps

1. Click on the **Configuration tab** in the top menu, click on **User Registration** under **People** section.

2. Insert LoginRadius APP Name, API Key, and API Secret as provided on your [loginradius.com](https://secure.loginradius.com/login) Admin-console.

3. Now, go through each tab (i.e. User Registration Settings, Advance Settings, Social Sharing Settings, Social Profile Data Settings and Single sign On Settings) to configure desired settings.

4. Click **Save configuration**.

####Field Mapping

To enable User Fields mapping to Social Provider Data

1. Login to Drupal admin panel.

2. Click on **MANAGE FIELD** section under **Configuration > Account settings**.

3. Create User fields as per your requirements.

4. Go to **Advance Settings** tab to map User Fields to Social Provider Data. All the User Fields will be listed down under **Social Login Field Mapping**.

5. After that, hit the **Save configuration** button.

###Social Login

Please see this [link](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions) to configure the Social Login component

###Social Sharing

Please see this [link](https://support.loginradius.com/hc/en-us/articles/207616986-Drupal-v8-x-Social-Login-and-Social-Sharing-Instructions) to configure the Social Sharing component

###User Registration

1. After plugin has been installed enable Social Login and User Registration under Extend Tab.
2. Click Configure beside Social Login
3. Enter your API Key and Secret available on your LoginRadius Admin-console.
4. Click Save configuration.

###Social Profile Data

####Overview

This module allows you specify the profile data you would like to capture on your site when a user logs in.

####Configuration

1. After installation navigate to the Social Profile Data found at Configuration >> User Registration.
2. Select the Profile Data sections you would like to capture
3. If you would like to show each logged in user their Social Profile Data enable the option "Do you want to show all the saved user profile data for each user in the Drupal admin panel?" by selecting "Yes"

###Single Sign On

####Overview

LoginRadius Single Sign-On(SSO) is a feature for multiple site management. It allows your end users to log into one site, then when they navigate themselves to other sites belonging to you and enabled with LoginRadius Single Sign-On(SSO), they are already identified as registered users and logged in to the site

####Configuration

> ######_Important Note: Make sure same LoginRadius Site should be used in all websites in which you want to enable Single Sign On. Also check Sitename filled under LoginRadius API settings section_

1. Navigate to SSO.

2. Now Set Yes to option "Do you want to enable Single Sign On (SSO) ?".

###Hosted Page

####Overview

LoginRadius Hosted Page is a feature for login and registration through the LoginRadius hosted pages. It allows your end users to log into your site via the LoginRadius hosted page.

####Configuration

1. After installation navigate to the Hosted Page at Configuration >> User Registration
2. Now Set Yes to option "Do you want to enable hosted page ?".

###Troubleshooting

1. [Installation/Upgrading/Performance issue](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#trbl-inst-upgr-perform-issue)
2. [Issue with Upgrade](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#trbl-curl-and-fsockopen)

####Installation/Upgrading/Performance issue

If there are issues related to login, user interface, upgrade and/or module performance then you should clear your website's cache after enabling the LoginRadius Module.

###Advanced Customization

1. [My website is getting spam, how can I prevent it?](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#3-my-website-is-getting-spam-how-can-i-prevent-it)
2. [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#5-where-to-look-user-details-in-database)
3. [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#6-how-to-uninstall-the-module)
4. [Manual Installation of the Module for Drupal 8.x(not recommended)](https://support.loginradius.com/hc/en-us/articles/210111283-Drupal-v8-x-Customer-Identity-Module-Instruction#7-manual-installation-of-the-modulenot-recommended)

####1. My website is getting spam, how can I prevent it?

1. Login to Drupal admin panel.
2. Navigate to **configuration tab **, click on **Account Settings**.
3. Now check the **Require e-mail verification** when a visitor creates an account option under **REGISTRATION AND CANCELLATION** section.

####2. Where to look user details in database

User details are stored in the **users** table and **loginradius_mapusers table**:-

users table :

| Column | Info                                           |
| ------ | ---------------------------------------------- |
| name   | Username                                       |
| email  | user's email addressloginradius_mapusers table |

| Column      | Info                       |
| ----------- | -------------------------- |
| provider    | Social network provider    |
| provider_id | Social network provider ID |

####3. How to uninstall the module?

1. Login to Drupal admin panel.

2. Click on** Uninstall** under **modules** tab and check the **Social Login, User Registration, Social Share, Social Profile Data** and** SSO (Single Sign On)** modules and after that, hit the uninstall button.

3. Go to your FTP and then go to the /modules. Delete the **user_registration_and_management** folder from **modules** directory. The plugin is uninstalled.

####4. Manual Installation of the Module(not recommended)

1. [Download](https://www.drupal.org/project/advanced_user_registration_and_management/) Customer Identity module for Drupal 8.x and extract the zip file.

2. Go to **/modules** directory in your Drupal root folder.

3. Then upload the extracted folder in **/modules/** directory.

4. Click on **modules** tab and you'll see the **LoginRadius Unified Social API modules**.

5. Enable the **Social Login, User Registration, Social Share, Social Profile Data and SSO (Single Sign On) **modules. and click on **Save Configuration**.

###Install LoginRadius PHP SDK

> ######_Note: We’re using php sdk from composer but as of now we currently changed some functions in php sdk which is not uploaded at composer package._

####Manual Steps to install php-sdk

So you should use PHP sdk which is at Gdrive path (\LR Development\Plugin Dev\Drupal\Plugin for testing\Drupal-8\Standard\php-sdk)

Follow the following instruction to upload php sdk manually.

1. Get the loginradius folder from given path and copy the folder
2. Go to your FTP.

3. Open the folder /vendor/.

4. Paste the loginradius folder into this directory.

5. Add the following path in file /vendor/composer/autoload_namespaces.php 'LoginRadiusSDK\\' => array(\$vendorDir . '/loginradius/php-sdk/src'),

####Through Composer

Following step to install php sdk from Composer.

Note: If composer is already installed then follow the Step 3.

**Step 1: **Download and enable Composer Manager module.

** Step 2:** Initialize Composer Manager

There are two ways of initializing Composer Manager.

Option A: Initialize Composer Manager using the init.php script

- Go to composer_manager/scripts directory

- Change the file permission of init.php with a command chmod 700 init.php

- Execute the init. script with a command ./init.php

Option B: Initialize Composer Manager using Drush

- If you are using Drush, you can initialize Composer Manager by drush composer-manager-init

- If you don't know what is Drush, use option A

####Step 3: Download LoginRadius PHP SDK with Composer

Now that we finally have Composer Manager initialized, we are ready to actually download the LoginRadius PHP SDK library with Composer.

1. Go to the root directory of your Drupal installation
2. Run the following command to install php sdk only.

Composer require loginradius/php-sdk:dev-api-v1

Note: If you want to update all required library then use the following command composer drupal-update

Composer is now aware that LoginRadius PHP SDK is required. It will first add this dependency to the /core/composer.json file which contains all external dependencies of your site. Then, it will automatically download the the latest versions of the required libraries. You can verify the result by checking that LoginRadius PHP SDK is downloaded to /vendor/loginradius/php-sdk directory.
