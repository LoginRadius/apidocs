# Wordpress Plugin Advanced Modules

---

Based on your LoginRadius plan you have, you may have access to one or more of the following modules. This document provides an overview of each component listed below. If you require additional components that are not included in your plugin please contact your product specialist at loginradius.com

##Menu

- Activation
- Social Login
- Custom Interface
- Social Sharing
- Social Profile Data
- Social Invite
- Social Commenting
- User Registration
- Single Sign-On
- Custom Object
- Livefyre
- Disqus SSO
- Google Analytics

### Activation

Please see this [link](/api/v1/cms-turn-key-plugins/cmsplugins/wordpress-social-login-instructions) for activation instructions

### Social Login

Please see this [link](/api/v1/cms-turn-key-plugins/cmsplugins/wordpress-social-login-instructions) to configure the Social Login component

### Custom Interface

#### Overview

This module allows you to customize the social platform icons you want to show for your end users in order to make your LoginRadius interfaces better fit into your existing themes.

This module contains three sections, upload image, preview & reorder the icons, and reset all options to default.

#### Configuration

#####Upload an image

To upload an image, first choose the social platform you want to replace its icon in the drop down menu, then click on **Choose file** button beside **Upload Images** to find the image in your local file, finally click on **Upload Image** button to confirm the action.

#####Preview & Reorder

In the second section it provides the preview of how the each Social Login provider is going to look like on your site. The order of the Social Login interface is defined on the [LoginRadius Admin-console](https://secure.loginradius.com/account) under API Configuration->Social Login->Social Network Configuration.

#####Reset all Options

To reset everything within this module to default, click on **Reset all options** at the bottom of the page.

###Social Sharing

Please see this [link](/api/v1/cms-turn-key-plugins/cmsplugins/wordpress-social-login-instructions) to configure the Social Sharing component

###Social Profile Data

####Overview

This module allows you to set the place and permission for who can view the user profile data on your site, and which kind of profile data you want to store into your WordPress database.

This module contains three sections, user profile database settings, user profile permission settings, and reset all options.

####Configuration

#####User Profile Database Settings

Under first section **Save Profile Data**, toggle the buttons to decide which particular information from the user profile you want to save into your database, it will allow you to query your local WordPress database for the data instead of calling LoginRadius APIs.

#####Display Social Profile Data

The first check-box allows you as administrator of the site to view all the social profile data of your site. It will create a tab in the Users page of the admin Admin-console, which will navigate you to the page where all data will be displayed on.

The second check-box allows your end users to see their own social platform profile after they log in. The data will be shown in their personal user admin-console or you can use the provided short-code to display the data at any page you specify.

Select the data you want to display

This section configures the data to be shown to the above location settings, if none of them are selected, a blank page will be shown.

#####Reset all Options

To reset everything within this module to default, click on **Reset all options** at the bottom of the page.

###Social Invite

####Overview

Social Invite enables your users to invite their friends to your site via selected social providers.

####Configuration

#####Enable Social Invite

Turn this toggle switch on to enable this component. Use the shortcode `[LoginRadius_Social_Invite]` to place this component on pages/posts.

#####Sorting Settings

These settings allow you to change the invites Sort By or Sort Direction

Message Settings

These settings allow enabling user editable fields to change the subject and invite message when a social provider sends it's invite by email

Facebook ID

Enter your Facebook App ID here, required for Facebook Invites

Custom Email Settings

Enable this option to send all emails from a custom email that you specify in this section.

###Social Commenting

####Overview

Social Commenting allows users to comment and share using Social Login. The commenting interface once enabled will replace the default WordPress commenting interface.

####Configuration

#####Enable Social Commenting

Use this toggle to turn on the Social Commenting Interface

#####Social Commenting Features

In this section by using the toggle switches you can enable or disable Social Sharing, Comment Formatting and Image Upload.

#####Comment Type Settings

This drop-down allows you to show different types of comments, you can select all types, pingbacks and trackbacks or just show comments

#####Approval Settings

This section allows you to enable or disable auto approving comments that comment using their social providers or users that are already existing

To require users to login before commenting navigate to WordPress Admin->Settings->Discussion and check the option "Users must be registered and logged in to comment"

#####Custom Messages

This section allows you to specify the Title header above the commenting interface as well as the message that shows when a user tried to send a message without entering content

#####Moderation Settings

In this section you are able to show and set a message for users who are awaiting moderation on their comment. Users that have only provided a name and email will not see this message.

###User Registration

####Overview

User Registration allows user data to be stored by LoginRadius. It connects Social Login with registration form that can be customized to show specific data.

####Configuration

Install WordPress plugin
Navigate to WordPress Admin->LoginRadius->User Registration
Enable Auto generate User Registration pages if you would like to generate the User Registration Pages Automatically, otherwise use the drop downs to use the pages already created
Select the location you would like the site to redirect to after login under "Redirection settings after login"
Registering Existing Users with LoginRadius User Registration System

After setup of this plugin the standard WordPress login will be redirecting to your new login page, you will then need to log in through the User Registration system. To setup your administrator after you have setup the plugin:

- Leave a window open with a logged in admin
- Open a new browser window (e.g Anonymous Window)
- In the new browser window navigate to the sites login page
- Login with a Social Provider or use the registration form to register a user with the same email address that exists in the admin account
- Confirm email verification if you have a customization or if you've used the registration form
- Log in with social provider or with email and password entered during registration
- Log out and back in to confirm creation of user registration account
- You should now be able to work in one window, all existing users in the WordPress system will need to go through this process to link the user registration system with the existing WordPress system

#####User Registration WordPress Default Login

Included in this module is a shortcode that allows you to add the default wordpress login to a page or post. This shortcode is intended to be used as an alternative for administrators to log in during the plugin setup and configuration process. This shortcode is `[raas_wp_default_login]`

#####Advanced Settings

In this section a list of shortcodes are shown for each form used in the User Registration system. To use any one of these simply copy the shortcode and paste it within a page or post.

#####Shortcodes

`[raas_login_form]` - Login Form

`[raas_registration_form]` - Registration Form

`[raas_forgotten_form]` - Forgotten Password Form

`[raas_password_form]` - Change Password Form

Select how you would like the WordPress username to be generated

This option allows the admin to select how usernames are created in the WordPress database dash, dot, space are the options available

Select whether to display the social network(s) the user is connected with in the user list

When this option is turned on the social provider used will be shown in the WordPress Admin->Users list for each user

Select whether the user profile data should be updated in your WordPress database, every time a user logs in

Having this option on will update the user data each time a user logs in

Select whether to let users use their social profile picture as an avatar on your website

When yes is selected the WordPress Avatar used will be the image associated with the user's social provider account

Enable account linking

When enabled this option will show a linking interface on a user's profile page allowing them to link other social provider accounts with their existing account

Debug

When this option is on if there is a problem with the user log in process, that process is ended and error reporting is sent to the WP_LOG, please only use this option during development

###Single Sign-On

####Overview

LoginRadius Single Sign-On(SSO) is a feature for multiple site management. It allows your end users to log into one site, then when they navigate themselves to other sites belonging to you and enabled with LoginRadius Single Sign-On(SSO), they are already identified as registered users and logged in to the site.

For WordPress this module only contains a simple toggle button, which allows you to enable/disable the feature for your WordPress site.

The official document of LoginRadius Single Sign-On feature can be found here

####Configuration

#####Enable/Disable SSO

To enable or disable this feature for your WordPress site, click the button under Single Sign On section, then click on **Save Options** to confirm your action.

#####Reset all Options

To reset everything within this module to default, click **Reset all options** at the bottom of the page.

###Custom Object

####Overview

Custom Object allows to to save custom additional data in the User Registration System. This data is also saved in the WordPress Database

####Configuration

- Navigate to WordPress Admin->LoginRadius->User Registration and Enable Custom Object Fields
- Enter your Custom Object ID obtained from your LoginRadius Admin-console
- Enable each custom field up to the amount of custom fields you'd like to enable
- Enter a name for each field that you have enabled
- Check the required field for each field that is mandatory
- Save these Settings

###Livefyre
####Requirements

You will need:

1. a LiveFyre Enterprise account, if you have not set this up please contact LiveFyre
2. the LiveFyre Apps WordPress Plugin available here
3. a LoginRadius Account, if you have not set this up please contact us here
4. a LoginRadius Advanced WordPress plugin with LiveFyre component, contact your LoginRadius product specialist to obtain this

####Video

<iframe src="https://www.youtube.com/embed/xqJQgorOLaE" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

#####Installation

1. Obtain LiveFyre Credentials

- Log in to your LiveFyre Studio
  Click on Settings Integration Settings
  Obtain Network and site credentials

2. Install LiveFyre Wordpress Plugin

- Install LiveFyre Apps WordPress Plugin
- Click WordPress Admin->LiveFyre Apps->General
- Paste the LiveFyre site credentials obtained from step three

3. Install and Activate LoginRadius Wordpress Plugin

- Install LoginRadius Advanced Wordpress plugin
- Activate LoginRadius Advanced Wordpress plugin WordPress Admin->LoginRadius->Activation

4. Enable Custom Interface

- Open WordPress Admin->LoginRadius->Custom Interface
- Turn on Enable Custom Interface (If User Registration is enabled this option is automatically turned on and hidden)

5. Enable LiveFyre

- Open WordPress Admin->LoginRadius->LiveFyre
- Turn on Enable LiveFyre
- Turn on Enable Wordpress Login/Logout LiveFyre integration
- Save Settings

6. Enable LoginRadius Single Sign On ( Optional )

- Open WordPress Admin->LoginRadius->Single Sign-On
- Turn on Enable Single Sign-On

###Disqus SSO
####Overview

Disqus SSO by LoginRadius allows clients to login to the Disqus commenting interface via the LoginRadius Social Login interface. Single Sign on service is available using the Disqus.com network or by adding the LoginRadius Single Sign on service. Please consult your LoginRadius product specialist about your plan for these features.

####Requirements

You will need:

- a Disqus account enabled with SSO, if you have not enabled SSO on your account please contact Disqus [here](https://disqus.com/support/?article=contact_SSO)
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-request-sso_1108158d0fe6e2b39f7.72995314.png)

* the Disqus Comment System Plugin available [here](https://wordpress.org/plugins/disqus-comment-system/)

* a **LoginRadius Account** , if you have not set this up please contact us [here](https://www.loginradius.com/pricing)
* a LoginRadius Advanced WordPress plugin with Disqus SSO component, contact your LoginRadius product specialist to obtain this

####Video

<iframe src="https://www.youtube.com/embed/J0rmIvITYfw" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

#####Installation

1. Obtain Disqus Credentials

- Log in to your Disqus account
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-login_3071858d0ff55c33d05.22268248.png)

- Navigate to Disqus applications [here](https://disqus.com/api/applications/)
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-applications_2603258d0ff7f799eb8.61521725.png)

- The Disqus application Public Key and Secret Key are displayed here. If no application key and secret are displayed here you may need to setup a site with Disqus. Also the Single Sign-On button should be shown if Disqus has activated this feature on your account.

2. Install Disqus Wordpress Plugin

- Install Disqus WordPress Plugin
- Click WordPress Admin->Comments->Disqus->Plugin Settings
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-settings_1008758d0ffbb5cbcf5.48060526.png)

- Under Advanced Single Sign-On enter your Disqus application public key and secret key and change the button image to your specification
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-sso-settings_2516358d0ffd5193a52.24217162.png)

- Save Changes

3. Install and Activate LoginRadius Wordpress Plugin

- Install LoginRadius Advanced Wordpress plugin
- Activate LoginRadius Advanced WordPress Admin->LoginRadius->Activation

4. Enable LoginRadius Disqus SSO

- Create a New Page that will be used for the Disqus SSO modal window and give it a title such as "Disqus Login Page" (This page will be used later)
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-new-page_415158d1000d08bbb6.54099853.png)

- Open WordPress Admin->LoginRadius->Disqus SSO

- Turn on Enable Disqus SSO
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-enable_373758d1002cd5d657.73331875.png)

- Select from the "Disqus Popup Page" drop-down the page (i.e "Disqus Login Page"" that was just created) you would like to use as the Disqus SSO modal window (Note: this will apply a template to the selected page)
  ![enter image description here](https://apidocs.lrcontent.com/images/lr-adv-dq-disqus-popup-dropdown_2026958d10046b138f6.76441544.png)

- Enter a title you would like on the Disqus SSO modal window under "Login Interface Title"

- Save settings

5. Enable LoginRadius Single Sign On ( Optional )

- Open WordPress Admin->LoginRadius->Single Sign-On
- Turn on Enable Single Sign-On

###Google Analytics

####Overview

Google Analytics provides a connection to the analytics services provided by Google. To utilize this component you will first need to configure a Google Analytics account here.

####Configuration

#####Enable/Disable Google Analytics

To enable or disable this feature for your WordPress site, navigate to WordPress Admin->LoginRadius->Google Analytics and toggle the switch on under Google Analytics section.

#####Google Analytics Tracking ID

Enter the tracking ID obtained in your Google Analytics account. This tracking ID can usually be found in the Google Analytics admin panel under "Property Settings"
