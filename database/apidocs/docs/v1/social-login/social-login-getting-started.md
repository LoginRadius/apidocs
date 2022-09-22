# Social Login Getting Started

---

This component of Customer Registration allows your customers to skip the forms by automatically creating customer profiles. This enables them to sign-in to your website with their existing social media accounts like Facebook, Twitter, and Google+."<br>

**Document Disclaimer: Standalone Social Login**

> **This page goes over the steps to implement a standalone Social login interface. If you are implementing the Full User Registration system (both traditional email and password registration as well as social login), this is not the correct Step by Step guide. For Full User Registration implementations, please refer to this documentation for [user registration](/api/v1/user-registration/user-registration)**


## Introduction

Social Login allows your customers to skip the forms by automatically creating customer profiles. This enables them to sign-in to your website with their existing social media accounts like Facebook, Twitter, and Google+.
<br>

<iframe src="https://www.youtube.com/embed/F1FrgjtGXZ8" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

Before choosing your SDK, you should get familiar with your LoginRadius Admin Console. You should be able to comfortably setup and configure social providers before continuing. If you do not configure your social providers correctly, you will run into issues later in these guides.

**Getting Started**

Depending on the social providers you have selected for your application/website, you should review what data points are available to you. While LoginRadius does normalize the data, we cannot guarantee the provider will supply all our data points.

An updated chart of all data points based on providers can be found [here](/api/v1/data-points-and-response-code/data-points)

While many SDKs will abstract away the API requests, you may want to understand all the end points available to you to best utilize your application’s experience.

**End Points**

Base URL for all API requests:

- https://api.loginradius.com

It is also important to include the header with your request:

- Accept: application/json

To better learn how to use each endpoint, check the details within each API.

> Note: Parameters marked as optional should still be included in the request as a blank string. Eg: <Base Url>api/v2/status?access_token=<access_token>&title=&url=&imageurl=&status=<required_field>&caption=&description="

## Displaying Pre-defined Interfaces

Follow the steps below to add a LoginRadius interface to your page:

**1.** Add the following script to the head tag or body tag of your site – replace your API key and callback URL.

```
<script src="//hub.loginradius.com/include/js/LoginRadius.js"></script>
<script type="text/javascript">
function loginradius_interface(){
    $ui = LoginRadius_SocialLogin.lr_login_settings;
    $ui.interfacesize = "small";
    $ui.apikey = "<LoginRadius-API-Key>";
    $ui.callback = "<Your-Callback-Page-Url>";
    $ui.protocol = "http://"; /*or "https://"*/
    $ui.lrinterfacecontainer ="interfacecontainerdiv";
    LoginRadius_SocialLogin.init(options);
  }
  var options={};
  options.login=true;
  LoginRadius_SocialLogin.util.ready(loginradius_interface);
  </script>
```
**2.** Below are a couple of ways to display the LoginRadius interface:

**A) Adding the interface on a static page.**<br>

```
<script>
  $(function() {
    loginradius_interface();
  });
</script>
<div id="interfacecontainerdiv" class="interfacecontainerdiv"></div>
```

<br>

**B) Display interface on the onClick event:**<br>

-  Call the following code onClick event

```
loginradius_interface();
```
<br>

-  After that add the following code where you want to display LoginRadius Interface.

```
<div id=\"interfacecontainerdiv\" class=\"interfacecontainerdiv\"></div>
```

## Setting up a Fully Customizable Interface

Follow the below steps to setup a fully customizable interface on your page:

**1.** Add the LoginRadius Custom Interface script to the Head, Footer or just below closing the body tag.

```
<script src="https://auth.lrcontent.com/v1/js/CustomInterface.2.js" type="text/javascript"></script>
```
> Please use the LoginRadius URL only. This is to prevent any conflicts when we make modifications / updates to our systems. It guarantees you always have an up to date copy of the LoginRadius interface script.

**2.** Add the Calling script by pasting the following code after the script included in step 1

```
<script type="text/javascript">

  $LRIC.util.ready(function() {
    var options = {};
    options.apikey = "<LoginRadius-API-Key>";
    options.templatename = "loginradiuscustom_tmpl";
    $LRIC.renderInterface("interface_container", options);
  });
</script>
```
> Replace with your LoginRadius API key provided by LoginRadius on the site settings page.

**3.** Design your Template Block. The LoginRadius custom interface uses the template system for generating html, it is easy to modify. Paste the following script below the script placed in the previous step.

```
<script type="text/html" id="loginradiuscustom_tmpl">

<a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>');"> <%=Name%></a>
</script>

```

> The above code just shows the links on a page, it does not show any design. To implement design you can modify it. We will elaborate on it in the next slides.

**4.** Add the following div where you want to show the interface, (can be added multiple times on single page).

```
<div class="interface_container"> </div>
```

> You can also change the class name, but you have to change the class name in the calling script as well.

At this point you have a basic interface structure in place and can proceed to customizing the interface

**Example:**

```
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://auth.lrcontent.com/v1/js/CustomInterface.2.js" type="text/javascript"></script>

<script type="text/javascript">

  $LRIC.util.ready(function() {
    var options = {};
    options.apikey = "<LoginRadius-API-Key>";
    options.templatename = "loginradiuscustom_tmpl";
    $LRIC.renderInterface("interface_container", options);
  });

</script>

<!-- Change here for any design change -->
<script type="text/html" id="loginradiuscustom_tmpl">

  <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>');"><%=Name%></a>

</script>

</head>
<body>

  <div class="interface_container"> </div>

</body>
</html>
```

## Customizing the Custom Template
This section goes over some of the modifications you can make to the basic interface template in order to handle common functionality.

**1.** Setting a custom callback

A custom callback allows you to control the location the interface will return the user to after successful authentication. Edit the design template code and specify the callback URL as shown below.

Replace the URL after "callback=" with the URL where you want to redirect your users after login.


```
<script type="text/html" id="loginradiuscustom_tmpl">
  <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>&callback=http://mysite.com/folder/callback.php');">
    <%=Name%>
  </a>
</script>
```


If you want to set the location to be the same page as the interface is displayed on you can set the callback=<%=window.location%>

```
<script type="text/html" id="loginradiuscustom_tmpl">
           <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>&callback=<%=window.location%>');">
              <%=Name%>
           </a>
</script>
```

**2.** Redirect user into the Authentication Popup

This option allows you to keep the user in the popup that they used to authenticate with the Social Provider. You will need to handle closing the Popup window that they are redirected into. If you want to log in users via the social login popup window, append &same_window=1 to the callback parameter.

```
<script type="text/html" id="loginradiuscustom_tmpl">
         <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>&callback=<%=window.location%>&same_window=1');">
             <%=Name%>
         </a>
</script>
```
**3.** Setting Custom Social Provider Icons

Create icons for all providers for which you want to add icons using their name. For example, Facebook's icon name should be Facebook.png. Modify the template to generate the links with an img tag included. This img should point to the location you are storing the Custom Icons.

```
<script type="text/html" id="loginradiuscustom_tmpl">
         <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>');">
               <img src="/your-image-directory-path/<%= Name %>.png" title="sign in with <%= Name%>"/>
        </a>
</script>
```

> We have included<%= Name %>to generate the provider name based on specified interface and in the above it will generate the image sources like \"Facebook.png\". You can also add a prefix or suffix for long names like Facebook-login.png where \"Facebook\" was generated with the<%= Name %> but you will need to change the names of the images appropriately.

**4.** Adding Custom CSS Classes

The Custom Interface templating engine is flexible and supports modifications to the generate HTML Structure. You can add classes directly to the generate icons links by including a class parameter on it.

```
<script type="text/html" id="loginradiuscustom_tmpl">
       <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>'); " class="login-icons <%= Name%>"></a>
</script>
```

> In the above example login-icons class contains background and <%=Name %> is the class name and contains the icon position in the sprite image. <%=Name %> defines to the Social Provider Name ie. Facebook, Twitter, etc

Or you can include additional containers within the template and apply classes/styling to them.


```
<script type="text/html" id="loginradiuscustom_tmpl">
      <div class="<%=Name%>">
          <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>');">
          </a>
      </div>
</script>
```

> The "div" class in the above script will have a dynamic class name according to the provider ie. Facebook, Twitter, etc.

**5.** Additional functionality can be handled by appending additional parameters as shown below to the callback parameter.

## ASP.net & Java Specific Templates

ASP.net and Java do not support the template engine using <% %> so we need to modify this to use <# #> Follow the below steps to update your template.

**1.** Include the following script before you define the template script:

```
<script type="text/javascript">
  var cache = {};
  $LRIC.util.ready(function () {
     $LRIC.util.tmpl = function tmpl(str, data) {
     var fn = !/\W/.test(str) ? cache[str] = cache[str]
     || tmpl($LRIC.util.elementById(str).innerHTML)
     : new Function("obj",
     "var p=[],print=function(){p.push.apply(p,arguments);};"
     + "with(obj){p.push('"
     + str.replace(/[\r\t\n]/g, " ").split("<#")
     .join("\t").replace(
     /((^|#>)[^\t]*)'/g, "$1\r")
     .replace(/\t=(.*?)#>/g, "',$1,'")
     .split("\t").join("');")
     .split("#>").join("p.push('").split("\r").join("\\'")
     + "');}return p.join('');");
     return data ? fn(data) : fn;
   };
   var options = {};
   options.apikey = "{LoginRadius API Key}";
   options.templatename = "loginradiuscustom_tmpl";
   $LRIC.renderInterface("interface_container", options);
});
</script>
```
**2.** Modify your template by replacing the <% %> with <# #>.

```
<script type="text/html" id="loginradiuscustom_tmpl">
   <span class="contantcell" style="margin-top: 15px;">
      <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<#=Endpoint#>&callback=http://example.com/login');">
        <img src="content/images/<#=Name.toLowerCase()#>.png" alt="" />
      </a>
   </span>
</script>
```
## Handling Mobile Browser Redirects
Many mobile browsers handle the redirection of pop-up windows differently and do not allow for normal redirection of the LoginRadius authentication systems. You can handle the redirection in mobile browsers by including an additional custom interface specific to Mobile browsers as shown below:

**a.** Add a check to the location you set the Custom Interface Template

```
var option = {};
option.apikey = "LR-API-KEY";
option.templatename = "loginradiuscustom_tmpl";
option.V2Recaptcha = true;
if(navigator.userAgent.match('CriOS')||navigator.userAgent.match('iPhone')){
    // Is Chrome iOS or iPhone
    option.templatename = "loginradiuscustom_tmpl_MOBILE";
} else {
    option.templatename = "loginradiuscustom_tmpl";
}
raasoption.hashTemplate = true;
```

> **Note: **The above check determines whether the current browser is iOS Chrome or an iPhone and uses the custom template rather than the regular web template. You can use these links for determining what mobile browsers you would like to support:

[Common User Agent Strings](http://www.useragentstring.com/)

[Mobile Specific Strings](http://www.zytrax.com/tech/web/mobile_ids.html)


**b.** Add the Mobile Specific custom interface, This interface should include the "callbacktype" parameter set to "hash" parameter in order to redirect in mobile devices.

```
<script type="text/html" id="loginradiuscustom_tmpl_MOBILE">
    <span class="lr-provider-label lr-sl-shaded-brick-button lr-flat-<#=Name.toLowerCase()#>"
onclick="window.location.href='<#= Endpoint #>&is_access_token=true&callback=<#= window.location.href.split('#')[0] #>&callbacktype=hash';"
title="Sign up with <#= Name #> Mobile" alt="Sign in with <#=Name#> Mobile" >
<span class="lr-sl-icon lr-sl-icon-<#=Name.toLowerCase()#>"></span>
Sign up with <#=Name#> Mobile
    </span>
</script>
```
## Programmatic Link Creation
You can bypass the template engine entirely and create your own links to be included on buttons or triggered events. In order to trigger the authentication you should format your links as follows:

```
https://<Site-Name>.hub.loginradius.com/requesthandlor.aspx?apikey=<LoginRadius API Key>&provider=<Provider Name>
```

In the above replace <Site-Name> with your [LoginRadius Site Name](http://support.loginradius.com/hc/en-us/articles/204614109-How-do-I-get-my-LoginRadius-Site-Name-), <LoginRadius API Key> with your [Loginradius API Key](/api/v1/getting-started/get-api-key-and-secret), and <Provider Name> with the lowercase social provider name(facebook, twitter, etc)

> You will need to have configured the social providers on your LoginRadius account before using them with the above link."

## Additional Parameters

Additional parameters can be added to the predefined interfaces by adding them with \$ui.<Parameter Name>=<Parameter Value> and can be appended to the url in the Custom Interface template as a query parameter.

```
//Pre-defined interface example
 $ui.is_access_token = true;

// Custom Template example
<%= Endpoint %>&is_access_token=true
```

|Parameter|Type|Description|Required|
|-----||-----||-----||-----|
|apikey|GUID|Your LoginRadius account API key|Yes|
|callback|Encoded URL|LoginRadius redirects the user to this URL with token in the Post body,default value is located on your LoginRadius Admin-console|No|
|lrinterfacebackground|Hexadecimal color code|This sets the background color of the LoginRadius interface, Default is transparent|No|
|lrsocialloginheading|String|Sets a header for your social login interface, Default is blank|No|
|same_window|Bool|Redirect user inside the child window(pop-up window) on successful login when set to true, Default is false|No|
|noofcolumns|Int|Sets the number of social provider icons displayed in each row, Default value is determined by theme|No|
|lrinterfacecontainer|String|Accepts the name of the class that will contain the interface|Yes|
|interfacesize|String|Accepts one of two strings "big" or "small" and determines the display size of the icons, Default is "big"|No|
|scope|String|Accepts a valid LoginRadius scope or custom scope set, please refer to scoping documentation for further information, Default value determined by LoginRadius end user settings|No|
|is_access_token|Bool|If set to true it will not post a token to your callback page, rather it will pass the token through HTML5 postMessage to your current page and must be handled with the LoginRadius HTML5 SDK, Default value is false|No|
|enableapicaching|Bool|If set to true the LoginRadius interface will cache loaded API responses in local storage, this will improve the interface rendering time. Default value is false|No|
|isConnectingTextOnInterface|String(True or False)|For enabling and disabling connecting text on interface when clicking on any provider and default value is ‘false’|No|
|InsidePopupfavIcon|URL|For changing favicon of login popup window, default value is LoginRadius’s icon. Make sure loading image should be absolute and https e.g. $ui.InsidePopupfavIcon="https://www.your-lovely-domain.com/content/images/login-loading.gif";|No|
|isConnectingInsidePopup|Bool|For disabling Loading image inside popup and default value is 'true'|No|
|ConnectingTextInsidePopup|Bool|For changing text inside popup and default value is Connecting...|No|
|ConnectingImageURLInsidePopup|String(True or False)|For changing loading image inside popup and default value is LoginRadius's default image. Make sure loading image should be absolute and https. e.g. $ui.ConnectingImageUrlInsidePopup ="https://www.your-lovely-domain.com/content/images/login-loading.gif";|No|
|ac_linking|Bool|For determining whether this is an account linking interface or a standard Login interface. Single Sign On behaviour differs with the account linking interface, Set to false by default|No|
|callbacktype|String|For determining the method used to return the token to the user. Available options are "Post", "QueryString" and "Hash". It is set to "Post" by default.|No|
|DebugMode|String|You can set the value to "on" if you want to enable debug mode which will cause errors to show in your Web console. or you can set the value to "off" to prevent errors from showing|No|
