# Identity Experience Framework Customizations


This section goes over customizing specific aspects of the Identity Experience Framework pages.

## Authentication Page

1. [Markup](#markup1)
   - [Social Login Interface](#sociallogininterface2)
   - [Required Fields Interface](#requiredfieldinterface3)
   - [Traditional Login Interface](#traditionallogininterface4)
   - [Registration Interface](#registrationinterface5)
   - [Forgot Password Interface](#forgotpasswordinterface6)
2. [Custom Styling](#customstyling7)
3. [Custom Scripts](#customscripts8)

### 1. Markup

The User Authentication Page is fully customizable. You can modify the HTML layout as per your requirements. To populate the containers, we have to include some JavaScript handlers to help make the associations between LoginRadius scripts and the Identity Experience Framework Registration page.

#### Social Login Interface

The default Social Login Interface is set to the following container:

`<div id="interfacecontainerdiv"></div>`

You can change the above id but will also need to modify the `default-auth-before-script.js` by changing the value for `lr_raas_settings.sociallogin.interfaceid` to your new id.

The template that will be used for the Social Login Interface is defined with the following code by default:

```
<script type="text/html" id="loginradiuscustom_tmpl">

  <span class="lr-provider-label lr-sl-shaded-brick-button lr-flat-<#=Name.toLowerCase()#>"
        onclick="return LRObject.util.openWindow('<#= Endpoint #>&is_access_token=true&callback=<#= window.location.href #>'); "
        title="Sign up with <#= Name #>" alt="Sign in with <#= Name#>">
       <span class="lr-sl-icon lr-sl-icon-<#= Name.toLowerCase()#>"></span>
       Login with <#= Name#>
        </span>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the **default-auth-before-script.js** by changing the value for `lr_raas_settings.sociallogin.templateid` to your new id.

#### Required Field Interface

If information is missing from the Social provider it will be requested in a Popup interface. This is defined as:

`<div id="sociallogin-container"></div>`

You can change the above id but you will also need to modify the default-auth-before-script.js by changing the value for `lr_raas_settings.sociallogin.containerid` to your new id.

#### Traditional Login Interface

The default Traditional Login interface is set to the following container:

`<div id="login-container"></div>`

You can change the above id but you will also need to modify the **default-auth-before-script.js** by changing the value for `lr_raas_settings.login.containerid` to your new id.

#### Registration Interface

The default Registration interface is set to the following container:

`<div id="registration-container"></div>`

You can change the above id but you will also need to modify the **default-auth-before-script.js** by changing the value for `lr_raas_settings.registration.containerid` to your new id.

#### Forgot Password Interface

The default Forgot Password interface is set to the following container:

`<div id="forgotpassword-container"></div>`

You can change the above id but you will also need to modify the **default-auth-before-script.js** by changing the value for `lr_raas_settings.forgotpassword.containerid` to your new id.

### 2. Custom Styling

You can customize the CSS styling applied to the page by making changes to the provided **hosted-auth-default.css** according to your design/branding requirements.

### 3. Custom Scripts

You can control some additional functionality from the default-auth-before-script.js and include any additional JS you would like to further customize the interfaces based on [our documentation](/api/v2/user-registration/advanced-customization)

The following customizations are included in the provided **default-auth-before-script.js:**

**To change the success messages**: Find function **successMessages** in `default-auth-before-script.js` and change the message according to your requirements.

**To change the loading image**: Find function **visibleLoadingSpinner** in `default-auth-before-script.js` and customize it to your requirements.

**To change the callback**: Find function **redirectToReturnUrl** in `default-auth-before-script.js` and customize it to your requirements.

**To change form settings**: Find functions **showLogin, showRegister, showForgotPassword** in `default-auth-before-script.js` and customize it to your requirements just below the default code.

**To change the message settings**: Find functions **setMessage** in `default-auth-before-script.js` and customize it to your requirements.

## Profile Page

1. [Markup](#markup10)
   - [Social Login Interface](#sociallinkinginterface11)
   - [Profile Editor](#profileeditor12)
   - [Set Password](#setpassword13)
   - [Change Password](#changepassword14)
2. [Custom Styling](#customstyling15)
3. [Custom Scripts](#customscripts16)

### 1. Markup

The User Profile Page is fully customizable. You can modify the HTML layout as per your requirements. In order to populate the containers, we have to include some JavaScript handlers to help make the associations between LoginRadius scripts and the Identity Experience Framework Registration page.

#### Social Linking Interface

The default Social Linking Interface is comprised of two templates, the first **Linked Account** template is assigned to the following container:

`<div id="lr-linked-social"></div>`

You can change the above id but will also need to modify the `default-profile-before-script.js` by changing the value for `window.lr_raas_settings.accountLinking.containerid` to your new id.

The actual template is defined using the following script:

```
<script type="text/html" id="linkedAccountsTemplate">
    <# if(isLinked) { #>
        <div class="lr-social-account">
            <span class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>"></span>
            <span class="lr-social-info"><#= Name #></span>
            <span class="lr-social-unlink"><a onclick='return window["loginradiusv1"]? unLinkAccount(\"<#= Name.toLowerCase() #>\",\"<#= providerId #>\") : LRObject.util.unLinkAccount(\"<#= Name.toLowerCase() #>\",\"<#= providerId #>\")'>Unlink</a></span>
        </div>
        <# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the `default-profile-before-script.js` by changing the value for `window.lr_raas_settings.accountLinking.linkedAccountsTemplate` to your new id.

The second part of the account linking interface is the **Not Linked Account** template and is assigned to the following container:

`<div id="lr-not-linked-social"></div>`

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for `window.lr_raas_settings.accountLinking.containerid` to your new id.

The actual template is defined using the following script:

```
<script type="text/html" id="notLinkedAccountsTemplate">
    <# if(!isLinked) { #>
        <span class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>"
              onclick='LRObject.util.openWindow("<#= Endpoint #>&is_access_token=true&callback=<#= window.location.href #>");'></span>
        <# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the **default-profile-before-script.js** by changing the value for `window.lr_raas_settings.accountLinking.linkedAccountsTemplate` to your new id.


#### Profile Editor

The default Profile Editor interface is set to the following container:

`<div id="profile-editor-container"></div>`

You can change the above id but you will also need to modify the default-profile-before-script.js by changing the value for`window.lr_raas_settings.profileEditor.containerid`to your new id.

#### Set Password

The default Set Password interface is set to the following container:

`<div id="set-password"></div>`

You can change the above id but you will also need to modify the default-profile-before-script.js by changing the value for `window.lr_raas_settings.setPassword.containerid` to your new id.

#### Change Password

The default Change Password interface is set to the following container:

`<div id="change-password"></div>`

You can change the above id but you will also need to modify the default-profile-before-script.js by changing the value for `window.lr_raas_settings.changePassword.containerid` to your new id.

### 2.Custom Styling

You can customize the CSS styling applied to the page by making changes to the provided hosted-auth-default.css according to your design/branding requirements.

### 3. Custom Scripts

You can control some additional functionality from the default-profile-before-script.js and include any additional JS you would like to further customize the interfaces based on [our documentation
](/api/v2/user-registration/advanced-customization)

The following customizations are included in the provided **default-profile-before-script.js:**

**To change the messages**: Find function **successMessages** in `default-profile-before-script.js` and change the message according to your requirements.

**To change the Loading image**: Find function **visibleLoadingSpinner** in `default-profile-before-script.js` and customize it to your requirements.

**To change Edit Profile**: Find functions **LoginRadiusRaaS.\$hooks.setRenderProfileEditor** in `default-profile-before-script.js` and customize it to your requirements just below the default code.

**To change the message settings**: Find functions **setMessage** in `default-profile-before-script.js` and customize it to your requirements.

## Basic Theme Profile Page

1. [Markup](#markup18)
   - [Social Login Interface](#sociallinkinginterface19)
   - [Update Profile](#updateprofile20)
   - [Add Email](#addemail21)
   - [Change Password](#changepassword22)
2. [Custom Styling](#customstyling23)
3. [Custom Scripts](#customscripts24)

### 1. Markup

The Basic Theme Profile Page is fully customizable. You can modify the HTML layout as per your requirements. In order to populate the containers, we have to include some JavaScript handlers to help make the associations between LoginRadius scripts and the Identity Experience Framework Registration page.

#### Social Linking Interface

The default Social Linking Interface is comprised of two templates, the first **Linked Account** template is assigned to the following container:

`<div id="lr-linked-social"></div>`

You can change the above id but will also need to modify the `default-profile-before-script.js` by changing the value for `window.lr_raas_settings.accountLinking.containerid` to your new id.

The actual template is defined using the following script:

```
<script type="text/html" id="linkedAccountsTemplate">
    <# if(isLinked) { #>
        <div class="lr-social-account">
            <a
                onclick='confirmationd("Unlink My Account","Are you sure? You want to unlink <#= Name.toLowerCase() #> account?","unlinksocial","<#= Name.toLowerCase() #>","<#= providerId #>");'
                title="Unlink <#= Name #>" alt="Unlink the <#=Name#> account">
                <span
                class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>"
                ></span
           ></a>
        </div>
    <# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the `default-profile-before-script.js` by changing the value for `window.lr_raas_settings.accountLinking.linkedAccountsTemplate` to your new id.

The second part of the account linking interface is the **Not Linked Account** template and is assigned to the following container:

`<div id="lr-not-linked-social"></div>`

You can change the above id but will also need to modify the default-profile-before-script.js by changing the value for `window.lr_raas_settings.accountLinking.containerid` to your new id.

The actual template is defined using the following script:

```
<script type="text/html"
    id="notLinkedAccountsTemplate"><# if(!isLinked) { #> <span class="lr-social-icon lr-flat-<#= Name.toLowerCase() #> button-shade lr-sl-icon lr-sl-icon-<#= Name.toLowerCase() #>" onclick='LRObject.util.openWindow("<#= Endpoint #>");'title="Sign up with <#= Name #>" alt="Sign in with <#=Name#>"></span><# } #>
</script>
```

You can modify the above template as per your design requirements but if you change the script id you will need to modify the **default-profile-before-script.js** by changing the value for `window.lr_raas_settings.accountLinking.linkedAccountsTemplate` to your new id.


#### Update Profile

The default Profile Editor interface is set to the following container:

`<div id="profile-editor-container"></div>`

You can change the above id but you will also need to modify the default-profile-before-script.js by changing the value for`window.lr_raas_settings.profileEditor.containerid`to your new id.

#### Add Email 

The default Add Email interface is set to the following container:

`<div id="addemail-container"></div>`

You can change the above id but you will also need to modify the default-profile-before-script.js by changing the value for `addemail_options.container` to your new id.

#### Change Password

The default Change Password interface is set to the following container:

`<div id="change-password"></div>`

You can change the above id but you will also need to modify the default-profile-before-script.js by changing the value for `window.lr_raas_settings.changePassword.containerid` to your new id.

### 2.Custom Styling

You can customize the CSS styling applied to the page by making changes to the provided hosted-auth-default.css according to your design/branding requirements.

### 3. Custom Scripts

You can control some additional functionality from the default-profile-before-script.js and include any additional JS you would like to further customize the interfaces based on [our documentation
](/api/v2/user-registration/advanced-customization)

The following customizations are included in the provided **default-profile-before-script.js:**

**To change the messages**: Find function **successMessages** in `default-profile-before-script.js` and change the message according to your requirements.

**To change the Loading image**: Find function **visibleLoadingSpinner** in `default-profile-before-script.js` and customize it to your requirements.

**To change the message settings**: Find functions **setMessage** in `default-profile-before-script.js` and customize it to your requirements.


## Admin Console Configuration

In your LoginRadius Admin Console, you can customize your Identity Experience Framework page, we have provided with two kinds of template editors.
- Basic Theme Editor 
- Advanced Theme Editor. 

This section will take you through the theme settings that you can customize for your IDX page. Refer below to customize both the themes as per your requirements.


### Basic Theme Editor 

Basic theme customization not required high-level technical knowledge, as we have provided ready to use options for customization. All you need to do is select the option which you want to use in your theme. 

The following screen displays how you can select the **Basic Theme**:

![enter image description here](https://apidocs.lrcontent.com/images/Deployment_LoginRadius_User_Dashboard-8-1_126765ee200530d9526.70420124.png "Basic Theme Editor")

**Step 1:** To customize the Identity Experience Framework page, navigate to [**Deployment > Identity Experience Framework > Basic Theme Editor > Theme**](https://adminconsole.loginradius.com/deployment/idx). Here, by default, the **Basic Theme** will be selected.

**Step 2:** Select the **Configuration** tab and here you will see the provided setting for Basic Theme, as shown in the below screenshot. You can customize/beautify your theme by clicking any of the settings as per your requirement.

![enter image description here](https://apidocs.lrcontent.com/images/unnamed-12_15395ee2013fdf90b9.53907129.png "")

**Step 3:** After customizing the settings, click on the **Save** button to save the settings. And, if you want to reset all your changes then click on the **Reset** button.

![enter image description here](https://apidocs.lrcontent.com/images/Deployment_LoginRadius_User_Dashboard-11-1_205675ee201b8dee6b4.48224949.png "")

**Step 4:** Select the **Preview** tab to preview your beautified/customized theme, as shown in the below screen.

![enter image description here](https://apidocs.lrcontent.com/images/unnamed-13_143585ee202144ef052.88062953.png "")

**Step 5:** Select the **Implement** tab to see the URLs of the Identity Experience Framework, as shown in the below screenshot.

![enter image description here](https://apidocs.lrcontent.com/images/unnamed-14_46335ee20290376fc7.79317793.png "")

### Advanced Theme Editor

**Step 1:** To customize the Identity Experience Framework Advanced Theme, navigate to [**Deployment > Identity Experience Framework**](https://adminconsole.loginradius.com/deployment/idx). 

**Step 2:** Select any of the **Advanced Editor Only** Theme and click on the **Customize** button as shown in the screen.

![enter image description here](https://apidocs.lrcontent.com/images/unnamed-15_245765ee20321b44e51.11462380.png "")

**Step 3:** Select the **Customization** tab and click on **Authentication Page** tab as shown in the below screenshot:

![enter image description here](https://apidocs.lrcontent.com/images/Deployment_LoginRadius_User_Dashboard-3-1_295485ee203a12b92a7.21598389.png "")

1. **HTML BODY** : This section is used to customize the customizable portion of the Identity Experience Framework page. This is the section that contains the interface and should not be a full page. You can review a sample of the default customizable content in the [package](https://github.com/LoginRadius/hosted-page) **"hosted-page/authentication-page-sample/authentication-page-sample.html".**

2. **Before Script** :
   <br><br>Before script file is provided with 2 options one is ‘Replace’ where you can upload a new file or Add URL and another one is ‘Before-Script.js’ where you can update the existing JS File.
   <br><br>This should set to a specific js reference like the default js file which is included in the customization package that you can download [here](https://github.com/LoginRadius/hosted-page), the standard "default-auth-before-script.js" is found in the [package](https://github.com/LoginRadius/hosted-page) "hosted-page/authentication-page-sample/default-auth-before-script.js". This script handles the LoginRadius interfaces and functionality of the Identity Experience Framework page.
   <br><br> Following are the functionality handled by the _Before script_:

    - Login
  <br><br>To handle login functionality refer the below code, it handles login, login container, success, error.

    ```
    lr_raas_settings.login = {};
    lr_raas_settings.login.containerid = "login-container";
    lr_raas_settings.login.success = function (response, flag) {
         if (response.access_token) {
            redirectToReturnUrl(response.access_token);
        }
        else {
            if(response.AccountSid || (response.IsPosted && response.Data && response.Data.AccountSid)){
              setMessage(successMessages.ResendOTP);
            }
           else if (_queryString.indexOf('return_url') != -1) {
            registrationSuccess('register');
        } else {
            if(flag == 'register'){
                 setMessage(successMessages.Register);
           resetForm('loginradius-registration');
            }
            else {
            setMessage(successMessages.InstantLink);
            resetForm('loginradius-login');
        }
        }
        }
    };
    lr_raas_settings.login.error = function (errors) {
        if (!errors[0].rule)
            setMessage(errors[0].Description, true);
    };
    ```
    - Registration
      <br><br>To handle registration functionality refer the below code, it handles registration, registration container, success, error.

    ```
      var lr_raas_settings = window.lr_raas_settings || {};

    lr_raas_settings.registration = {};
    lr_raas_settings.registration.containerid = "registration-container";
    lr_raas_settings.registration.success = function (response) {
        if (response.access_token) {
            redirectToReturnUrl(response.access_token);
        }
        else {
            if (queryString.return_url) {
                registrationSuccess('register');
            } else {
                setMessage(successMessages.Register);
                resetForm('loginradius-raas-registration');
            }
        }
    };
    lr_raas_settings.registration.error = function (errors) {
        if (!errors[0].rule)
            setMessage(errors[0].message, true);
    };
    ```

    - Forgot Password
     <br><br>To handle Forgot Password functionality refer the below code, it handles forgot password, forgot password container, success, error.
 
    ```
    lr_raas_settings.forgotpassword = {};
    lr_raas_settings.forgotpassword.containerid = "forgotpassword-container";
    lr_raas_settings.forgotpassword.success = function (response) {
        if (queryString.return_url) {
            registrationSuccess('forgotpassword');
        } else {
            setMessage(successMessages.PasswordForgot);
            resetForm('loginradius-raas-forgotpassword');
        }
    };
    lr_raas_settings.forgotpassword.error = function (errors) {
        if (!errors[0].rule)
            setMessage(errors[0].message, true);
    };
    ```

    - Profile page
    <br><br>To handle Profile page functionality refer the below code, it handels profileEditor, profileEditor.container, success, error.

    ```
    window.lr_raas_settings.profileEditor = {};
    window.lr_raas_settings.profileEditor.containerid = "profile-editor-container";
    window.lr_raas_settings.profileEditor.error = function (errors) {
        if (!errors[0].rule)
            setApiMessage(errors);

    };
    window.lr_raas_settings.profileEditor.success = function (response) {
        setMessage(successMessages.ProfileUpdated);
    };
    ```
3. **END SCRIPT** : This should be another script reference similar to the Before Script and Loads after the page has been loaded.

    > You can use this part of you IDX page files for configuring multiple social apps, for more information, refer to this [document](/api/v2/admin-console/social-provider/multiple-social-apps/).

4. **Additional Scripts** : You can add in additional scripts and CSS references using the following option.
  - **Head Tags**: Can be used to add js references to the header
  <br><br>
  - **Custom CSS**: add additional CSS references
  <br><br>
  - **Custom js**: Add additional js references.

**Step 4:** Select the **Preview** tab to preview your customized theme, as shown in the below screen.

![enter image description here](https://apidocs.lrcontent.com/images/Deployment_LoginRadius_User_Dashboard-14-1_202095ee20489d2a846.28004409.png "Preview")

**Step 5:** Select the **Implement** tab to see the URLs of the Identity Experience Framework, as shown in the below screenshot.

![enter image description here](https://apidocs.lrcontent.com/images/unnamed-16_49775ee2052619bb72.38300751.png "")

### Basic or Advanced Editor Theme

We have provided a Theme which can be customized by Basic and Advanced Editor both as shown in the below screen.

![enter image description here](https://apidocs.lrcontent.com/images/Deployment_LoginRadius_User_Dashboard_17_2__58865ee208dc5b1920.45534702.png "")

>**Note:** 
> - In order to customize the theme by **Advanced Theme Editor**, click on **Switch to Advanced Theme Editor** as shown in the above screen and customize further as explained in the above [Advanced Theme Editor](#advancedthemeeditor10) steps. 
> - In order to customize the theme by Basic Theme Editor follow the steps given above in [Basic Theme Editor](#basicthemeeditor9).

## General Customizations

This section covers some of the more general Identity Experience Framework page customizations as refer below:  

### Loading Spinner

You can customize the loading spinner on your Identity Experience Framework page according to your specific requirements. There are two ways in which the loading spinner can be customized in the LoginRadius Identity Experience Framework page. One method is changing the colors of the default jumping dots loading animation as per the site theme. Another method is to specify a custom GIF image as a loading spinner by changing the existing structure of jumping dots animation. More details are discussed in the following sections.



##### Changing colors of jumping dots animation

![Default Spinner](https://apidocs.lrcontent.com/images/spinner1_55295afdbe163238b5.14719808.png "Default Spinner")

To change the colors of jumping dots loading animation, you need to download the CSS of the Identity Experience Framework page from the following link: [https://cdn.loginradius.com/hub/prod/v1/css/hosted-auth-default.css](https://cdn.loginradius.com/hub/prod/v1/css/hosted-auth-default.css)

Then, you need to edit the downloaded CSS and provide the color values according to the theme in the existing CSS classes as follows:

```
.lr-loading-screen-overlay .load-dot{
    background: <theme-color-light>;
}

@-webkit-keyframes shapes {
    0% {
        -webkit-transform: translatey(-5px);
        transform: translatey(-5px);
    }

    50% {
        -webkit-transform: translatey(5px);
        transform: translatey(5px);
        background: <theme-color-dark>;
    }

    100% {
        -webkit-transform: translatey(-5px);
        transform: translatey(-5px);
    }
}

@keyframes shapes {
    0% {
        -webkit-transform: translatey(-5px);
        transform: translatey(-5px);
    }

    50% {
        -webkit-transform: translatey(5px);
        transform: translatey(5px);
        background: <theme-color-dark>;
    }

    100% {
        -webkit-transform: translatey(-5px);
        transform: translatey(-5px);
    }
}
```

Save the file and upload the same in the [LoginRadius Admin Console](https://secure.loginradius.com/). To do so, go to **Deployment > Identity Experience Framework > Authentication Page > Custom CSS > Add New**.

To update the changes in the Profile page,  upload the same edited CSS file by navigating to **Deployment > Identity Experience Framework > Profile Page > Custom CSS > Add New**.

![enter image description here](https://apidocs.lrcontent.com/images/Deployment_LoginRadius_User_Dashboard-4-1_211855ee20638272362.35582371.png "Add CSS")


##### Custom GIF image as loading spinner

For providing custom GIF image as loading spinner on Identity Experience Framework page, you need to replace the existing jumping dots animation with the new structure. The default structure can be found in the [LoginRadius Admin Console](https://secure.loginradius.com/). Go to **Deployment > Identity Experience Framework > Authentication Page or Profile page**. It is defined as follows:

```
<div class='lr_fade lr-loading-screen-overlay' id='loading-spinner'>
<div class='load-dot'></div>
<div class='load-dot'></div>
<div class='load-dot'></div>
<div class='load-dot'></div>
</div>
```

Replace the above structure with the following code:

```
<div class="lr-loading-screen-overlay-img" id='loading-spinner'>
        <img src="<loading-image-gif-url>" width="50" >
</div>

```

>**Note:** It is recommended to use the transparent GIF image without additional padding for better adaptability.

In the next step, you have to download the CSS file of the IDX page from the following link:

[https://cdn.loginradius.com/hub/prod/v1/css/hosted-auth-default.css](https://cdn.loginradius.com/hub/prod/v1/css/hosted-auth-default.css)

Then, you need to edit the downloaded CSS file and add a new CSS class for defining the path of the custom GIF image as follows:

```
.lr-loading-screen-overlay-img{
  background-color: rgba(255, 255, 255, 0.91);
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
  margin: 0;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 9999;
}

```

Save the file and upload the same in the [LoginRadius Admin Console](https://secure.loginradius.com/).To do so, go to [Deployment > Identity Experience Framework > Authentication Page > Custom CSS > Add New](https://adminconsole.loginradius.com/deployment/idx).

To update the changes in the **Profile Page**, upload the same edited CSS file by following the same steps.

If all the steps are followed correctly, you’ll be able to apply the custom GIF image as loading spinner.

![New Spinner](https://apidocs.lrcontent.com/images/spinner3_108415afdbe84a72bb2.52210310.png "New Spinner")

### Remember me

To configure Remember Me feature, make sure you have enabled **Remember Me option** settings from Admin Console, for more details regarding **Remember Me** feature click [here](/api/v2/admin-console/platform-security/token-management#rememberme3).

After enabling the settings from the Admin Console, add the following SSO login code on the Identity Experience Framework page **before script**:

```
// If found activated session, go to the callback function
var ssologin_options= {};

ssologin_options.onSuccess = function(response) {
// On Success
//Write your custom code here
console.log(response);
};

LRObject.util.ready(function() {

LRObject.init("ssoLogin", ssologin_options);

});
```

### Implementing the page as a pop-up

In order to implement the page as a pop-up on an existing website, you can follow the steps below:

1. Open the page from a link:
  ```
   <button onclick="window.open('https://<LOGINRADIUS_SITE_NAME>.hub.loginradius.com/auth.aspx?action=login&return_url=<URL_TO_HANDLE_TOKEN>', 'myWindow', 'width=500, height=600')">SignIn</button>
  ```
2. You will get the access token at     
  ``` <URL_TO_HANDLE_TOKEN> ``` and require to handle the token's associated         property here.
  ```
  if (isset($_REQUEST['token']) && !empty($_REQUEST['token']))
  {
   $token = trim($_REQUEST['token']);
    //add all of your functionality here
  }
  ```
   >**Note:** Above sample code is in PHP, handle this functionality as per your language.

3. Now you can close the window popup and reload parent window to get login      effect on the front page.

  ```
  <script>
  window.onunload = refreshParent;
  function refreshParent()
  { window.opener.location.reload(); }
  window.close();
  </script>
  ```
4. Make some changes in the page as defined in [auth.aspx](/libraries/identity-experience-framework/customization) file:
  ```
  <script type="text/html" id="loginradiuscustom_tmpl"><span class="lr-provider-label lr-sl-shaded-brick-button lr-flat-<#=Name.toLowerCase()#>" onclick=" return LRObject.util.openWindow('<#= Endpoint #>'); " title="Sign up with <#= Name #>" alt="Sign in with <#= Name#>"><span class="lr-sl-icon lr-sl-icon-<#= Name.toLowerCase()#>"></span>Login with <#= Name#> </span> </script>
  ```
Replace the code with:
  ```
  <script type="text/html" id="loginradiuscustom_tmpl"><a class="lr-provider-label lr-sl-shaded-brick-button lr-flat-<#=Name.toLowerCase()#>" href="<#= Endpoint #>&same_window=1" title="Sign up with <#= Name #>" alt="Sign in with <#= Name#>"><span class="lr-sl-icon lr-sl-icon-<#= Name.toLowerCase()#>"></span>Login with <#= Name#> </a></script>
  ```
  >**Note:** This will allow the social login to occur in the same popup window.
5. Save the file and you are done with the setting up the Identity Experience Framework page as a pop-up.
