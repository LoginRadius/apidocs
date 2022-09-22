Landing Page Integration
=====

-------

This document goes over the steps to integrate LoginRadius social login on a landing page, which will allow you to populate your landing page forms with the users' social data.

##LoginRadius References


1. Download a copy of the LoginRadius SDK [here]( /api/v1/sdk-libraries/html5-js).

2. Include it in your landing page site or CDN by uploading the LoginRadius SDK with your FTP provider. Save the link or file location provided to include in your template.
 
3. Open the template for the form where you are planning to utilize the LoginRadius social login.
 
4. Include the downloaded LoginRadius SDK and LoginRadius.js references in the template head.

```
<script src="//hub.loginradius.com/include/js/LoginRadius.js"></script>
<script src="<Uploaded_File_Path>/LoginRadiusSDK.2.0.0.js"></script>
```

##Interface Setup
Include the following code in the template head in order to initialize the LoginRadius interface.

```
              function loginradius_interface(){ 
                $ui = LoginRadius_SocialLogin.lr_login_settings;
                $ui.interfacesize = "small";
                $ui.apikey = "<LoginRadius API KEY>";
                $ui.callback = "<Landing Form Location>";
                $ui.protocol = "http://";
                $ui.is_access_token=true;
                $ui.lrinterfacecontainer ="interfacecontainerdiv";
                LoginRadius_SocialLogin.init(options);
              }
              LoginRadius_SocialLogin.util.ready(loginradius_interface);
```



> The above script is a default interface and you can include the fully customizable interface by replacing this with the scripts detailed [here](/api/v1/social-login/social-login-getting-started).

Include the following container wherever you would like to display the LoginRadius Interface.

```
<div id="interfacecontainerdiv" class="interfacecontainerdiv">
</div>
```

You can further customize the above interface by referring to this documentation on [setting up a fully customizable interface](/api/v1/social-login/social-login-getting-started).

##Handling Data
After authentication with the above interface, you will receive a JSON response into a login callback which you can use to populate forms.

1. Add a LoginRadiusSDK.onlogin function to your head section HTML.
```
<script>             
LoginRadiusSDK.setLoginCallback(Successfullylogin);
  function Successfullylogin(){
  }
</script>
```
2. Call the Get User Profile function from within the Successfullylogin callback and populate your form data with the response.
```
LoginRadiusSDK.getUserprofile( function( profile) {
 document.getElementById("formELement1").value=profile.FirstName; 
 document.getElementById("formELement2").value=profile.LastName;
 });
```
You should notice that the specified elements are now being populated with data after a user authenticates through one of your social providers.
