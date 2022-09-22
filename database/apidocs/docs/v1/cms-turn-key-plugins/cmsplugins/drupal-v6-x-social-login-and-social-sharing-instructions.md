# Drupal v6.x Social Login and Social Sharing Instructions

---

This document provides instructions for the LoginRadius Social Login for Drupal v6.x. If you require additional components that are not included in your plugin please contact your product specialist at loginradius.com

##Menu

- [Installation Guide](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#installation)

- [Activation and Configuration](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#activation)

- [ Troubleshooting](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#troubleshooting)

- [Advanced Customization](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#advanced)

- [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#uninstall)

###Installation

1. [Download](https://www.drupal.org/project/sociallogin) the Social Login module and extract the zip file.

2. Go to **/sites/all/ **directory in your Drupal root folder and search the **modules** directory . If it doesn't exist, create one.

3. Upload the extracted folder in **/sites/all/modules/** directory.

4. Login to Drupal admin panel. Click on the **Administer** tab and then under **Site building** click on **Modules**.
   ![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-6-module_5458d15830a208c4.55600612.png)

5. After successful installation, you'll see the Social Login and Social Share modules in the module list. Enable the modules and click on **Save Configuration**.

6. Now, proceed with configuring your module!

###Activation and Configuration

- [Account Configuration](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#act-acc-config)

- [Activation Steps](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#act-act-step)

- [Blocks](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#act-blocks)

- [ Field Mapping](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#act-field-map)

####Account Configuration

> ######_Note: The full functionality of this module requires a LoginRadius API Key and a LoginRadius API Secret. If you do not have this data only the functionality of the Social Sharing component can be utilized. Please find further documentation on how you can obtain this data here_

####Activation Steps

1. Click on the **User Management** tab and click on **Social Login and Social Share**.
   ![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-6-activation_1308358d159d9565206.39936477.png)
2. Insert LoginRadius API Key, and API Secret as provided on your loginradius.com Admin-console.

3. Now, go through each tab (i.e. Social Login, Social Sharing, Advance Settings) to configure desired settings.

4. Click Save configuration.

####Blocks

To enable blocks follow the steps below:

1.  Navigate to **Administer -> Site buliding -> Blocks.
    **
2.  Add the required block to the area where you want to show the interface.

         - **Social Login** Block

         - **Social sharing** Block

    ![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-6-blocks_902758d15ac997d313.76007402.png)

    > ######**Note**:
    > ######1. Requires **Enable Horizontal Social Sharing** switch on under **Drupal admin panel** > **Configuration** > **Social Login and Social Share** > **Social Sharing** > **Horizontal Social Sharing** tab.
    > ######2. Requires **Enable Vertical Social Sharing** switch on under **Drupal admin panel** > **Configuration** > **Social Login and Social Share** > **Social Sharing** > **Vertical Social Sharing** tab.

3.  Click on **save blocks**.

####Field Mapping

To enable User Fields mapping to Social Provider Data

1. Login to Drupal admin panel.

2. Enable the **Profile** module under modules list.

3. Go to **Profiles** module under **User Management tab**.

4. Create User fields as per your requirements.

5. Go to **Advance Settings** tab to map User Fields to Social Provider Data. All the User Fields will be listed down under **Social Login Field Mapping**.
   ![enter image description here](https://apidocs.lrcontent.com/images/lr-social-login-6-mapping_1624358d15bfed2e033.88895977.png)

6. After that , hit the **Save configuration** button.

####Troubleshooting

1. [CURL and FSOCKOPEN troubleshooting](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#trbl-curl-and-fsockopen)
2. [Installation/Upgradation/Performance issue](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#trbl-inst-upgr-perform-issue)
3. [Issue with Upgrade](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#trbl-issue-with-upgrade)

####CURL and FSOCKOPEN troubleshooting

If you are not logged in after clicking Social Login icons at your website then enable one of the following at your hosting server for Social Login to work (you may need to contact your hosting provider to enable one of these):

1. CURL requires cURL support = enabled in your php.ini file.
2. FSOCKOPEN requires allow_url_fopen = On and safemode = off in your php.ini file

####Installation/Upgrading/Performance issue

If there are issues related to login, user interface, upgrade and/or module performance then you should clear your website’s cache after enabling the LoginRadius Module. To learn how to do that, see [http://drupal.org/node/326504](https://www.drupal.org/node/326504)

####Issue with Upgrade

If you want to upgrade the LoginRadius Module to latest version then you have to uninstall older version properly and install the newer version. Please make sure you clear the website’s cache after installation.

###Advanced Customization

- [ How can I show Social Login Interface with a custom interface?](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#adv-custom)
- [How can I change the email template for the registered users?​](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#adv-email-temp)
- [My website is getting spam, how can I prevent it?](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#adv-spam)
- [ How can I customize the layout of the pop-up?](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#adv-popup-layout)
- [Where to look user details in database](https://support.loginradius.com/hc/en-us/articles/205144715-Drupal-v6-x-Social-Login-and-Social-Sharing-Instructions#adv-details)

####How can I show Social Login Interface with a custom interface?

1.  Go to your FTP
2.  Open file **/sites/all/modules/sociallogin/socialloginandsocialshare.module**
3.  Search the following code: **https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js**
4.  Replace this with: **https://auth.lrcontent.com/v1/js/CustomeInterface.2.js**
5.  Open file**/sites/all/modules/sociallogin/theme/socialloginandsocialshare_links.tpl.php**
6.  Search for the following code and comment out or delete:

    var options = {};
    options.login = true;
    LoginRadius_SocialLogin.util.ready(function() {
    $ui = LoginRadius_SocialLogin.lr_login_settings;
       $ui.interfacesize = "<?php print $interfaceiconsize ?>";
    $ui.lrinterfacebackground = "<?php print $interfacebackgroundcolor ?>";
    $ui.noofcolumns = <?php print $interfacerow ?>;
    $ui.apikey = "<?php print $api_key ?>";
    $ui.is_access_token = true;
       $ui.callback = "<?php print url('', array('absolute' => TRUE)); ?>";
    \$ui.lrinterfacecontainer = "interfacecontainerdiv";
    LoginRadius_SocialLogin.init(options);
    });

7.  Now search for:
    <script type="text/javascript">
8.  Add the following code before the above searched code:

            <script type="text/javascript">
             $LRIC.util.ready(function() {
             var lr_options = {};
             lr_options.apikey = "<?php print $api_key; ?>";
             lr_options.templatename = "loginradiuscustome_tmpl";
             $LRIC.renderInterface("interface_container", lr_options);
             });
           </script>
           <script type="text/html" id="loginradiuscustome_tmpl"><a href="javascript:void()" onClick="return $LRIC.util.openWindow('<%=Endpoint%>&is_access_token=true&callback=<?php print url('', array('absolute' => TRUE)); ?>');"><%=Name%></a>
           </script>

    > ######Note: Create icons for all providers for which you want to add icons using their name. For example, Facebook's icon name should be Facebook.png. Replace

           <%=Name%>

    with

           <img src="/your-image-directory-path/<%= Name %>.png"  title="sign in with <%= Name%>"/>

9.  Search the following:

        <div class="interfacecontainerdiv"></div>

10. Replace with:

         <div class="interface_container"></div>

####How can I change the email template for the registered users?

1. Login to Drupal admin panel.
2. Navigate to **User Settings** under **User Management tab**.
3. You can change Email-content under **User e-mail Settings**.

####My website is getting spam, how can I prevent it?

1. Login to Drupal admin panel.
2. Navigate to **User Settings** under **User Management tab**.
3. Now check the **Require e-mail verification when a visitor creates an account** option under **User Registration Settings**.

####How can I customize the layout of the pop-up?

You can modify the CSS in **sites\all\modules\sociallogin\css\socialloginandsocialshare.css** file in Drupal root folder.

####Where to look user details in database

User details are stored in the **users** table and **socialloginandsocialshare_mapusers** table

**users** table

|Column |Info|
|-||-|
|name |Username|
|email |user's email address|

**socialloginandsocialshare_mapuser**s table

|Column |Info|
|-||-|
|provider |Social network provider|
|provider_id |Social network provider ID|

###How to uninstall the module?

1. Login to Drupal admin panel.
2. Click on the **modules** tab and search the **LoginRadius Unified Social API modules**.
3. Uncheck the **Social Login** and **Social Share** modules from module list and click on **Save Configuration**.
4. Click on **Uninstall **under **modules** tab and check the **Social Login** and **Social Share** modules and after that, hit the uninstall button.
5. ​Go to your FTP and then go to the **/sites/all/modules.** Delete the **sociallogin** folder from **modules** directory. The plugin is uninstalled.
