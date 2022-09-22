# Hosted Registration

---

Hosted pages are hosted on LoginRadius, you can modify the design and script. LoginRadius hosted pages are JavaScript driven, meaning most of the logic is implemented using script.

{{table_container}}

##Introduction

###Available Actions
Below is a list of the available action with the LoginRadius Hosted User Registration Page:

#####1. Login
To display the Login interfaces direct your users to this URL:

```
https://<LoginRadius site name>.hub.loginradius.com/auth.aspx?action=login&return_url=<Return URL>
```

#####2. Registration
To display the Registration interface direct your users to this URL:

```
https://<LoginRadius site name>.hub.loginradius.com/auth.aspx?action=register&return_url=<Return URL>
```

#####3. Forgot Password
To display the Forgot Password interface direct your users to this URL:

```
https://<LoginRadius site name>.hub.loginradius.com/auth.aspx?action=forgotpassword&return_url=<Return URL>
```

#####4. Profile Page
To display the User Profile interfaces direct your users to this URL:

```
https://<LoginRadius site name>.hub.loginradius.com/profile.aspx
```

#####5. Logout
To direct logout from hosted page your users to this URL:

```
https://<LoginRadius site name>hub.loginradius.com/auth.aspx?action=logout&return_url=<Return URL>
```

> Replace `<LoginRadius site name>` with Your LoginRadius Site Name which you can find with [these instructions](https://support.loginradius.com/hc/en-us/articles/204614109-How-do-I-get-my-LoginRadius-Site-Name-) and the `<Return URL>` with the locations you would like to direct users after successfully completing the action.

##Token Handling
LoginRadius’ default script sends an [Access-Token](https://support.loginradius.com/hc/en-us/articles/203885385-About-LoginRadius-Tokens) in the query string as a ‘token’ parameter the return_url that you specified in the action URL. This can be used to retrieve profile data and handle additional user functionality.

Below is an example utilizing PHP and our [PHP SDK](/api/v1/sdk-libraries/php) to identify this token and retrieve user data.

```
<?php
$actual_link = "http://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
$actual_link = preg_replace('/\?.*/', '', $actual_link);
if (isset($_REQUEST['token']) && !empty($_REQUEST['token'])) {
    echo '<a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=logout&return_url=' . $actual_link . '">Logout</a> | ';
    require_once 'LoginRadiusSDK.php';
    $loginradius = new LoginRadius();
    $userProfile = $loginradius->loginradius_get_user_profiledata($_REQUEST['token']);
    echo '<pre>';
    var_dump($userProfile);
    echo '</pre>';
} else {
    echo '<a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=login&return_url=' . $actual_link . '">Login</a> | ';
    echo '<a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=register&return_url=' . $actual_link . '">Register</a>  | ';
    echo '<a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=forgotpassword&return_url=' . $actual_link . '">Forgot Password</a>';
}
```

##Customization
This section goes over customizing the Hosted Registration pages. You can retrieve a copy of the Customizable Hosted Registration files here: https://github.com/LoginRadius/hosted-page/tree/api-v1

###Setting a Custom Domain
You can add a custom site domain that will replace the <LoginRadius Site Name>.hub.loginradius.com with your own domain. Follow the below steps to use your own domain:

1. Change the default domain of LoginRadius with your domain for all pages Login, Registration, Forgot Password and profile page
   Ex:

```
https://<Your domain>/auth.aspx?action=login&return_url=<Return URL>
```

2. Change the CNAME record for your domain by going to your domain DNS manager -> CNAME Record and changing the CNAME record to <LoginRadius Site name>.hub.loginradius.com

> If you are an existing LoginRadius User you will need to update your Social Provider configurations with the new domain

###Customizing the Authentication Page
#####1. Markup

The User Authentication Page is fully customizable. You can modify the the HTML layout as per your requirements. In order to populate the containers we have include some javascript handlers to help make the associations between LoginRadius scripts and the Hosted Registration page.

####Social Login Page
The default Social Login Interface is set to the following container:

```
<div id="interfacecontainerdiv"></div>
```

You can change the above id but will also need to modify the default-auth-before-script.js by changing the value for "lr_raas_settings.sociallogin.interfaceid" to your new id.

The template that will be used for the Social Login Interface is defined with the following code by default:

```
<script type="text/html" id="loginradiuscustom_tmpl">
                <span class="lr-provider-label lr-sl-shaded-brick-button lr-flat-<#=Name.toLowerCase()#>"
                      onclick=" return LoginRadiusRaaS.openWindow('<#= Endpoint #>&is_access_token=true&callback=<#= window.location #>'); "
                      title="Sign up with <#= Name #>" alt="Sign in with <#= Name#>">
                    <span class="lr-sl-icon lr-sl-icon-<#= Name.toLowerCase()#>"></span>
                    Login with <#= Name#>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the default-auth-before-script.js by changing the value for "lr_raas_settings.sociallogin.templateid" to your new id.

####Required Information Popup
If information is missing from the Social provider it will be requested in a Popup interface. This is defined as:

```
<div id="sociallogin-container"></div>
```

You can change the above id but will also need to modify the default-auth-before-script.js by changing the value for "lr_raas_settings.sociallogin.containerid" to your new id.

####Traditional Login Page
The default Traditional Login interface is set to the following container:

```
 <div id="login-container"></div>
```

You can change the above id but will also need to modify the default-auth-before-script.js by changing the value for "lr_raas_settings.login.containerid" to your new id.

####Registration Page
The default Registration interface is set to the following container:

```
<div id="registration-container"></div>
```

You can change the above id but will also need to modify the default-auth-before-script.js by changing the value for "lr_raas_settings.registration.containerid" to your new id.

####Forgot Password Page
The default Forgot Password interface is set to the following container:

`<div id="forgotpassword-container"></div>`

You can change the above id but will also need to modify the default-auth-before-script.js by changing the value for ~~~
"lr_raas_settings.forgotpassword.containerid" ~~~to your new id.

####2. Styling
You can customize the CSS styling applied to the page by making changes to the provided hosted-auth-default.css according to your design/branding requirements.

####3. Script
You can control some additional functionality from the default-auth-before-script.js and include any additional JS you would like to further customize the interfaces based on [our documentation](/api/v1/user-registration/advanced-customization)

The following customizations are included in the provided default-auth-before-script.js:

**To change the messages**: Find function "successMessages" in default-auth-before-script.js and change the message according to your requirements.

**To change the loading image**: Find function "visibleLoadingSpinner" in default-auth-before-script.js and customize it to your requirements.

**To change the callback**: Find function "redirectToReturnUrl" in default-auth-before-script.js and customize it to your requirements.

**To change form settings**: Find functions "showLogin", "showRegister", "showForgotPassword" in default-auth-before-script.js and customize it to your requirements just below the default code.

**To change the message settings**: Find functions "setMessage" in default-auth-before-script.js and customize it to your requirements.

###Customizing the Profile Page
**1. Markup**

The User Profile Page is fully customizable. You can modify the the HTML layout as per your requirements. In order to populate the containers we have include some JavaScript handlers to help make the associations between LoginRadius scripts and the Hosted Registration page.

####Social Linking Interface

The default Social Linking interface is comprised of two templates the first "Linked Account" template is assigned to the following container:

```
<div id="lr-linked-social"></div>
```

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for "window.lr_raas_settings.accountLinking.containerid" to your new id.

The actual template is defined using the following script:

```
<script type="text/html" id="linkedAccountsTemplate">
    <# if(isLinked) { #>
        <div class="lr-social-account">
            <span class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>"></span>
            <span class="lr-social-info"><#= Name #></span>
            <span class="lr-social-unlink" onclick='return unLinkAccount("<#= Name.toLowerCase() #>","<#= providerId #>")'>Unlink</span>
        </div>
    <# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the default-profile-before-script.js by changing the value for `"window.lr_raas_settings.accountLinking.linkedAccountsTemplate"` to your new id.

The second part of the account linking interface is the "Not Linked Account" template and is assigned to the following container:

```
<div id="lr-not-linked-social"></div>
```

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for "window.lr_raas_settings.accountLinking.containerid" to your new id.

The actual template is defined using the following script:

```
<script type="text/html" id="notLinkedAccountsTemplate">
    <# if(!isLinked) { #>
        <span class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>"
              onclick='return LoginRadiusRaaS.openWindow("<#= Endpoint #>&is_access_token=true&callback=<#= window.location.href #>");'>	</span>
    <# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the default-profile-before-script.js by changing the value for

`"window.lr_raas_settings.accountLinking.linkedAccountsTemplate"`
to your new id.

The second part of the account linking interface is the "Not Linked Account" template and is assigned to the following container:

```
<div id="lr-not-linked-social"></div>
```

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for "window.lr_raas_settings.accountLinking.containerid" to your new id.

The actual template is defined using the following script:

```
<script type="text/html" id="notLinkedAccountsTemplate">
                    <# if(!isLinked) { #>
                        <span class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>"
                              onclick='return LoginRadiusRaaS.openWindow("<#= Endpoint #>&is_access_token=true&callback=<#= window.location.href #>");'>	</span>
                        <# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the default-profile-before-script.js by changing the value for

```
"window.lr_raas_settings.accountLinking.linkedAccountsTemplate"
```

to your new id.

####Profile Editor
The default Profile Editor interface is set to the following container:

```
<div id="profile-editor-container"></div>
```

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for`"window.lr_raas_settings.profileEditor.containerid"`to your new id.

####Set Password
The default Set Password interface is set to the following container:

```
<div id="set-password"></div>
```

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for

```
"window.lr_raas_settings.setPassword.containerid"
```

to your new id.

####Change Password
The default Change Password interface is set to the following container:

```
<div id="change-password"></div>
```

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for "window.lr_raas_settings.changePassword.containerid" to your new id.

#####2. Styling
You can customize the CSS styling applied to the page by making changes to the provided hosted-auth-default.css according to your design/branding requirements.

#####3. Script
You can control some additional functionality from the default-profile-before-script.js and include any additional JS you would like to further customize the interfaces based on [our documentation
](/api/v1/user-registration/advanced-customization)

The following customizations are included in the provided default-profile-before-script.js:

**To change the messages**: Find function "successMessages" in default-profile-before-script.js and change the message according to your requirements.

**To change the Loading image**: Find function "visibleLoadingSpinner" in default-profile-before-script.js and customize it to your requirements.

**To change Edit Profile**: Find functions "LoginRadiusRaaS.\$hooks.setRenderProfileEditor" in default-profile-before-script.js and customize it to your requirements just below the default code.

**To change the message settings**: Find functions "setMessage" in default-profile-before-script.js and customize it to your requirements.

##Admin-console Configuration
In your LoginRadius Admin Console you can configure your hosted page customizations and include any reference files that are required:

![enter image description here](https://apidocs.lrcontent.com/images/loginradius_604258a6dfcb64d5f5.39946278.png "Hosted Authentication Page")

1. favicon: Set this to a reference to your favicon file.
2. Before Script: The standard default-auth-before-script.js is found in the package(https://github.com/LoginRadius/hosted-page/blob/api-v1/js/default-auth-before-script.js) \hosted-pages\js\default-auth-before-script.js. This script handles the LoginRadius interfaces and functionality of the hosted page.

3. HTMLBODY: This section is used to customize the customizable portion of the hosted page. This is the section that contains the interface and should not be a full page. You can review a sample of the default customizable content in the package(https://github.com/LoginRadius/hosted-page/blob/api-v1/html/default-auth-page.html) \hosted-pages\html\default-auth-page.html

4. END SCRIPT: This should be another script reference similar to the Before Script and Loads after the page has been loaded.

5. You can add in additional scripts and CSS references using the following options

-**Head Tags**: Can be used to add js references to the header

-**Custom CSS**: add additional CSS references

-**Custom js**: Add additional js references.
