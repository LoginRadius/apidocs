# Drupal v7.x Customer Identity Module Instructions

---

Based on your LoginRadius plan you have, you may have access to one or more of the following modules. This document provides an overview of each component listed below. If you require additional components that are not included in your plugin please contact your product specialist at loginradius.com

##Menu

- Installation
- Social Login
- Social Sharing
- Social Profile Data
- Single Sign-On
- Hosted Page
- Admin Login Page
- User Registration
- Uninstallation

###Installation

> Note: If you are already using any previous version of Social Login, please follow the Uninstallation section to uninstall the module first.

1. Login to your Drupal admin panel.
2. Click on the Modules tab and then, click Install new module. enter image description here
   ![enter image description here](https://apidocs.lrcontent.com/images/drupal-img-1_3153658d1021179de61.20202815.png)
3. Browse for the advanced-user-registration-and-management zip file and install the module.
4. After successful installation, you'll see the Advanced User Registration and Management modules on the list. Enable the modules that you want. enter image description here
   ![enter image description here](https://apidocs.lrcontent.com/images/durapl_module_list_2493758d10226823b90.28398540.png)

####Configuration

1. To configure the module, click on the Configuration tab in the top menu, click on Advanced User Registration and Management under People section.
2. Enter API Key and API secret under LoginRadius API settings section that you get from your LoginRadius Account.
3. You can also configure desired settings as per your requirement.
4. Hit the Save Configuration button.

###Social Login
Please see this [link](/api/v1/cms-turn-key-plugins/cmsplugins/drupal-v7-x-social-login-and-social-sharing-instructions) to configure the Social Login component

###Social Sharing

Please see this [link](/api/v1/cms-turn-key-plugins/cmsplugins/drupal-v7-x-social-login-and-social-sharing-instructions) to configure the Social Sharing component

###Social Profile Data

####Overview

This module allows you specify the profile data you would like to capture on your site when a user logs in.

####Configuration

1. After installation navigate to the Social Profile Data found at Configuration >> People >>Advanced User Registration and Management
2. Select the Profile Data sections you would like to capture
3. If you would like to show each logged in user their Social Profile Data enable the option "Do you want to show all the saved user profile data for each user in the Drupal admin panel?" by selecting "Yes"

###Single Sign-On

####Overview

LoginRadius Single Sign-On(SSO) is a feature for multiple site management. It allows your end users to log into one site, then when they navigate themselves to other sites belonging to you and enabled with LoginRadius Single Sign-On(SSO), they are already identified as registered users and logged in to the site.

The official document of LoginRadius Single Sign-On feature can be found here

####Configuration

> Important Note: Make sure same LoginRadius Site should be used in all websites in which you want to enable Single Sign On. Also check Sitename filled under LoginRadius API settings section

- Install the Advance module where you want to enable SSO.
- Navigate to SSO.
- Now Set Yes to option "Do you want to enable Single Sign On (SSO) ?".
  ![enter image description here](https://apidocs.lrcontent.com/images/drupal-img-6_1158958d1039c0f6222.09241144.png)

###Hosted Page

####Overview

LoginRadius Hosted Page is a feature for login and registration through the LoginRadius hosted pages. It allows your end users to log into your site via the LoginRadius hosted page.

####Configuration

- After installation navigate to the Hosted Page at Configuration >> User Registration and Management
- Now Set Yes to option "Do you want to enable hosted page ?".

###Admin Login Page

- Navigate to Drupal admin panel -> Structure-> Blocks.
- Search the block LoginRadius Admin Login Block.
- Click on configure button.
- Now select the content in Region in your default theme.
- Now enter the page url in section Show block on specific pages to show admin login area in that page.
- After that, open that page and here you'll see the admin login area.

###User Registration

> Note: User Registration will now replace the default login interfaces. So before enable the User Registration module, Please first create admin login page by following Admin Login Page section to access admin account or the admin to login with their Social Provider with a matching email as used to setup the admin account. It is recommended to open a new incognito window to test the User Registration

1.  After plugin has been installed enable Social Login and User Registration under Modules
2.  Click Configure beside Social Login
3.  Enter your API Key and Secret available on your LoginRadius Admin-console
4.  Click Save configuration

###Uninstallation

1. Login to your Drupal admin panel.
2. Click on the modules tab and search the Advanced User Registration and Management modules.
3. Uncheck the modules of Advanced User Registration and Management from module list and click on Save Configuration.
4. Click on Uninstall under modules tab and check the modules of Advanced User Registration and Management and after that, hit the uninstall button.
