# Wordpress Social Login instructions

---

The Social Login and Social Sharing plugin is used to allow user log in, comment, and share via their social accounts like Facebook, Google, Amazon, Twitter, LinkedIn, Vkontakte, QQ and many more! This is a paid subscription plugin offered by LoginRadius. If you need an account, please see our available plans here

##Menu

- Installation Guide
- Activation and Configuration
- Troubleshooting
- Advanced Customization
- Intergration with WooCommerce


###Installation Guide

- Navigate to Wordpress Admin Panel->Plugins
- Click "Add New" button
- To install the LoginRadius plugin, type "loginradius" in the search field, or use the "Upload Plugin" button. You can use the plugin that was provided to you by the LoginRadius team, or download the default plugin here.

![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-install_859358d0ef1a248882.87415043.png)

- Click 'Install Now' for the plugin titled "Social Login, Social Sharing and Social Data Integration".

- Click 'Activate Plugin' after successful installation. Now, proceed with configuring your plugin!

![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-activate_1268158d0ef8815c4e9.90196516.png)

###Activation and Configuration

- [Account Configuration](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#account-configuration)
- [Activation Steps](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#activation-steps)
- [Widgets](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#widgets)
- [Shortcodes
  ](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#shortcode)

####Account Configuration

> ######_**Note: **the full functionality of this plugin requires a LoginRadius Site Name, LoginRadius API Key and a LoginRadius API Secret. If you do not have this data only the functionality of the Social Sharing component can be utilized. Please find further documentation on how you can obtain this data [here](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-)_

####Activation Steps

1. To activate the plugin, navigate to Wordpress Admin Panel->LoginRadius->Activation
2. On the Activation tab enter your Site Name, API Key, and API Secret as provided on your [loginradius.com](https://secure.loginradius.com/login) Admin-console.
3. Optional: Under the Advanced Settings tab you can turn on or off JavaScripts loading in footer option and Plugin Deletion Options
4. 'Click Save Settings'

####Widgets

To enable widgets follow the below mentioned steps:

1. Navigate to **Wordpress Admin Panel->Appearance->Widgets** section in left sidebar
2. Drag required widget from the **Available Widgets** section to the area where you want to show the interface.

![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-widgets_2554258d0f1bb029ed2.46332602.png)

- Widget for Social Login - **LoginRadius - Social Login**

- Widget for Social Linking - **LoginRadius - Social Linking**

- Widget for Horizontal Social Sharing - **LoginRadius - Horizontal Sharing**

  > ######_ Note: Requires **"Enable Horizontal Widget"** switch **ON **under Wordpress Admin Panel->LoginRadius->Social Sharing->Horizontal Sharing Tab_

- Widget for Vertical Social Sharing **- Login Radius - Vertical Sharing**

> ######_Note: Requires **"Enable Vertical Widget"** switch **ON** under Wordpress Admin Panel->LoginRadius->Social Sharing->Vertical Sharing Tab_

> ######_Note: Social Sharing interfaces selected in the Horizontal and Vertical sections of "Select the sharing theme" section, will be displayed as Horizontal and Vertical Social Sharing widgets, respectively._

####Shortcodes

You can enable social login, social linking and sharing anywhere in your website page/post content using shortcodes. Just place following shortcodes where you want to show interface

Shortcode for Social Login **- [LoginRadius_Login]**

> ###### _Note: Social Login will only show to users not logged in_

Shortcode for Social Linking **- [LoginRadius_Linking]**

> ###### _Note: Social Linking will only show to users logged in_

Shortcode for Social Sharing** - [LoginRadius_Share]**

> ###### _To specify CSS styles for interface, you can use "style" parameter (as used in HTML) as mentioned in following example:_

**[LoginRadius_Login]**

OR

**[LoginRadius_Share]**

You can choose sharing theme by specifying "type" parameter (takes two values - 'horizontal' and 'vertical') as mentioned in following example:

**[LoginRadius_Share type="horizontal"]**

OR

**[LoginRadius_Share type="vertical"]**

> ######_ **Note:**_

> ######1. [LoginRadius_Share] shortcode requires **"Enable Horizontal Widget" **switch on under Wordpress Admin Panel->LoginRadius->Social Sharing->Horizontal Sharing Tab.\_
> ######2. If you are not specifying **"type"** parameter in the Shortcode, it will show Horizontal interface.
> ######3.To show Horizontal sharing interface using shortcode requires **"Enable Horizontal Widget" **switch on under Wordpress Admin Panel->LoginRadius->Social Sharing->Horizontal Sharing Tab.
> ######4.To show Vertical sharing interface using shortcode requires **"Enable Vertical Widget" **switch on under Wordpress Admin Panel->LoginRadius->Social Sharing->Vertical Sharing Tab.
> ![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-shortcodes_3076858d0f6f064cbf2.15448558.png)

Troubleshooting

- [ How can I have only certain users access my site?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#user_access)
- [Can I use Social Login with CAPTCHA? My website is getting spam, how can I prevent it?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#captcha)
- [Getting error message, how to resolve it?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#error_message)
- [Social Commenting Troubleshooting](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#commenting)
- [CURL and FSOCKOPEN troubleshooting](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#curl)

####How can I have only certain users access my site?​

Follow the steps mentioned below:

- Login to your website admin panel.
- Navigate to LoginRadius->Social Login->Advanced Settings
- Select **"Yes"** in **"Select whether you would like to control account activation and deactivation?"** option.
- Select **Inactive** from **Select the default status of the user when he/she registers on your website**
- Click "Save Changes" button at the bottom of the page.

This restricts all newly registered users to be inactive until approved by the site administrator. After a user registers, a popup will show advising the user they will be notified through email once activated. To activate or de-activate users:

1. Navigate to Admin->Users
2. In the User list under the **Status** column click on the inactive icon to enable or the active icon to disable

####Can I use Social Login with CAPTCHA? My website is getting spam, how can I prevent it?​

With Social Login, there is no chance of spam. To prevent spam from WordPress traditional registration form follow the steps mentioned below:

1. Navigate to Settings > General section in your website admin panel.
2. Uncheck **"Anyone can register" **in **"Membership"** option.
3. Click **"Save Changes"** button at the bottom of the page.

Although, there is no need of any anti-spam functionality with above settings configured, you can use Social Login with CAPTCHA.

####Getting error message, how to resolve it?

If you get error** "Please check your php.ini settings to enable CURL or FSOCKOPEN" or "Problem in communicating LoginRadius API. Please check if one of the API Connection method mentioned above is working."** then follow the steps at [this link](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#curl)

####Social Commenting Troubleshooting

Social Commenting may not work **if required hook is not found** in your website template or you have enabled **any other commenting plugin**. You can resolve the issues in commenting as follows

1.  If required hook is not found place the following code in the Comment Template file where you want to show Social Login interface:

           <?php do_action('LoginRadius_Login') ?>

    For most of the themes following steps will work:

- Open "/wp-content/themes/YOUR_CURRENT_THEME/comments.php" in your Wordpress installation folder (if the mentioned file doesn't exist then open the appropriate file as per your theme).

- Search "comment_form();" and above this, add following code:

      <?php do_action('LoginRadius_Login') ?>

- Save the file. (Replace existing file, if prompted)

  2.If you have enabled any other commenting plugin then disable that plugin.

  If you have enabled Jetpack commenting, follow the below mentioned steps:

1. Login to your website admin panel.
2. Navigate to "Jetpack" section in left sidebar.
3. Search "Jetpack Comments" section and click "Learn More" button.
4. Click "Deactivate" button.

####CURL and FSOCKOPEN troubleshooting

If you are not logged in after clicking Social Login Icons at your website then follow the steps mentioned here. One of the following must be enabled at your hosting server for Social Login to work (you may need to contact your hosting provider to enable one of these):

- CURL requires **cURL support = enabled **in your **php.ini**

- FSOCKOPEN requires** allow_url_fopen = On **and **safemode = Off** in your **php.ini **file.

###Advanced Customization

- [Disable Sharing on Page/Post](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#pagepostdisableshare)

- [How to setup plugin with WordPress multisite?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#multisite)

- [Where to look at user details in database?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#database)

- [ How can I change the email template for the registered users?​](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#email_template)

- [How can I customize the layout of the pop-up?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#popup_layout)

- [How can I show Social Login Interface in custom Popup?​](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#custom_popup)

- [How can I add Social Login interface to any page?​](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#any_page)

- [Manual Installation of the Plugin (not recommended)](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#manual)

- [How to uninstall the plugin?](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#uninstallation)

####Disable Sharing on Page/Post

On edit Page/Post screen the option **Disable Social Sharing on this page** will disable any sharing widget set in admin settings on that specific page or post. **Note:** Widgets and shortcodes are not affected by this setting.

![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-disable-share_319458d0fe8fc99d70.81661152.png)

####How to setup plugin with WordPress multisite?

1. After creating a multisite network, navigate to** My Sites > Network Admin > Admin Console **at the top bar in the WordPress admin panel.
2. Navigate to **Plugins** on the left sidebar.

3. Click on **"Add New"** and install LoginRadius' WordPress plugin. (Follow [these steps](https://support.loginradius.com/hc/en-us/articles/201968907-Wordpress-Social-Login-instructions#Installation) for installation)

4. Click on **"Network Activate" **under "Social Login for Wordpress".

> ######_Note: The single LoginRadius API Key and Secret will work with all the network sites' Social Login and need not to create social network apps for each subdomain. To make LoginRadius WordPress plugin work with multisite, you have to enable multisite feature in your LoginRadius account. This is a paid feature and comes with LoginRadius Pro Advanced and higher plans. Click here to learn more!_

####Where to look at user details in database?

User details are stored in the **"users"** table and in the following** "meta_key"** fields of user_meta table:

|Meta_key| Info|
|-||-|
|loginradius_provider_id| Social Provider ID|
|loginradius_thumbnail| Social Profile avatar|
|loginradius_provider| Social Network Provider|

####How can I change the email template for the registered users?​

Social Login uses the WordPress' default email functionality to send email to new users registering through Social Login. You can use other plugins to customize that email content.

> ####Plugin Suggestions:

> ######[New User Email Setup](https://wordpress.org/plugins/new-user-email-set-up/)

> ######[SB Welcome Email Editor](https://wordpress.org/plugins/welcome-email-editor/)

####How can I customize the layout of the pop-up?

You can change the layout of the Popup by modifying CSS in the **"wp-content/plugins/loginradius-for-wordpress/lr-social-login/assets/css/loginRadiusStyle.css"** file.

> ###### _Note: If this path is not found please search your plugin for loginRadiusStyle.css and make your styling changes there_

####How can I show Social Login Interface in custom Popup?​

Call the following JavaScript when popup is triggered (**For example** - If at **"onclick"** event of some element at your web page, popup is displayed then you can bind following JavaScript with that event through function. If there is a JavaScript function already to display popup, then you can include following JavaScript in that function.)

####How can I add Social Login interface to any page?​

1. Navigate to** "Pages" **section in your Wordpress admin panel.

2. **Edit** the page you want to add Social Login Interface to.

3. In the page content place ShortCode -** [LoginRadius_Login]** where you want to show Social Login Interface.

####Manual Installation of the Plugin (not recommended)

1. [Download](https://wordpress.org/plugins/loginradius-for-wordpress/) LoginRadius' WordPress Plugin

2. Go to your WordPress admin panel and log in.

3. Upload the folder to your plugins directory (wp-content/plugins/) or Go to Plugins > Add New > Upload > **Browse** and** install the zip file.**
4. Click on Plugins and you'll see Social Login for WordPress. Activate your LoginRadius
   plugin by clicking on **Activate.** Now, proceed with configuring the plugin.

####How to uninstall the plugin?

1. Login to your website admin panel.

2. Navigate to **Plugins** section in left sidebar
3. Click **"Deactivate"** , then **Delete** below the plugin you want to uninstall.
   > ######_Note: For removing the plugin manually, navigate to** "wp-content/plugins/" **folder in your wordpress installation folder and delete **"loginradius-for-wordpress" **folder._

###Intergration with WooCommerce​

Social Login

Open the following file in your text editor **wp-content/plugins/loginradius-for-wordpress/lr-social-login/public/inc/login/class-social-login.php
**

Search for **add_action( 'init', array(\$this, 'social_login_init') );** and add following code:

Enable before WooCommerce login form:

    add_action( 'woocommerce_before_customer_login_form', array('Login_Helper', 'display_social_login_interface') );

Enable after WooCommerce login form:

    add_action( 'woocommerce_after_customer_login_form', array('Login_Helper', 'display_social_login_interface') );

Enable at checkout form before customer details:

    add_action( 'woocommerce_checkout_before_customer_details', array('Login_Helper', 'display_social_login_interface') );

Enable at checkout form after customer details:

    add_action( 'woocommerce_checkout_after_customer_details', array('Login_Helper', 'display_social_login_interface') );

Social Sharing

1.  Add following function in **wp-content/plugins/loginradius-for-wordpress/lr-social-sharing/includes/horizontal/loginradius_simplified_social_share_horizontal.php** in class **LR_Horizontal_Sharing**

        /**

    - social sharing on single product page
      \*/
      public static function loginradius_product_sharing() {
      global $post, $product, \$loginradius_share_settings ;

    if ( isset( $product->id ) && ! empty( $product->id ) ) {
    $lrShareUrl = get_permalink( $product->id );
    }elseif ( isset( $post->ID ) && ! empty( $post->ID ) ) {
    $lrShareUrl = get_permalink( $post->ID );
    }

    if ( isset( $loginradius_share_settings['horizontal_share_interface'] ) && ( $loginradius_share_settings['horizontal_share_interface'] == '32-h' || $loginradius_share_settings['horizontal_share_interface'] == '16-h' || $loginradius_share_settings['horizontal_share_interface'] == 'single-lg-h' || $loginradius_share_settings['horizontal_share_interface'] == 'single-sm-h' ) ){
        $interface = '<div class="lr_horizontal_share" data-share-url="' . $lrShareUrl . '"></div>';
    }elseif ( isset( $loginradius_share_settings['horizontal_share_interface'] ) && ( $loginradius_share_settings['horizontal_share_interface'] == 'hybrid-h-h' || $loginradius_share_settings['horizontal_share_interface'] == 'hybrid-h-v' ) ){
        $interface = '<div class="lr_horizontal_share" data-share-url="' . $lrShareUrl . '" data-counter-url="' . $lrShareUrl . '"></div>';
    }
    echo \$interface;
    }

2.  Place following code in **loginradius-for-wordpress/lr-social-sharing/includes/horizontal/loginradius_simplified_social_share_horizontal.php **in function** \_\_construct** in the end

Enable at checkout success page:

     **`add_action( 'woocommerce_thankyou', array( $this, 'loginradius_product_sharing' ) );`**

Enable at each product in product list:

    **`add_action( 'woocommerce_after_shop_loop_item', array( $this, 'loginradius_product_sharing' ) );`**

Enable before the content at product detail page:

     **`add_action( 'woocommerce_before_single_product_summary', array( $this, 'loginradius_product_sharing' ) );`**

Enable after the content at product detail page:

     **`add_action( 'woocommerce_after_single_product_summary', array( $this, 'loginradius_product_sharing' ) );`**

Facebook Twitter LinkedIn Google+
