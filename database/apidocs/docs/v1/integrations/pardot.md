Pardot
=====

------

The LoginRadius Pardot integration allows you to quickly setup a Social Login interface on your Pardot landing pages which will allow your users to pre-populate the form fields with their Social Data.

##LoginRadius References

1. Download a copy of the LoginRadius SDK [here]( /api/v1/sdk-libraries/html5-js):
2. Include it in your Pardot site by going to Marketing->Content->Files and uploading the LoginRadius SDK. Save the link provided for inclusion in your Template.
3. Open the template for the form that you are planning on utilizing the LoginRadius Social Login on and click on the "Edit layout template" option.
4. Include the downloaded LoginRadiusSDK and LoginRadius.js references in the template head

```
<script src="//hub.loginradius.com/include/js/LoginRadius.js"></script>
<script src="<Uploaded_File_Path>/LoginRadiusSDK.2.0.0.js"></script>
```
##Interface Setup
Include the following code in the template head in order to initialize the LoginRadius interface

```
              function loginradius_interface(){ 
                $ui = LoginRadius_SocialLogin.lr_login_settings;
                $ui.interfacesize = "small";
                $ui.apikey = "<LoginRadius API KEY>";
                $ui.callback = "<Pardot Form Location>";
                $ui.protocol = "http://";
                $ui.is_access_token=true;
                $ui.lrinterfacecontainer ="interfacecontainerdiv";
                LoginRadius_SocialLogin.init(options);
              }
        	    var options={}; 
        	    options.login=true;
              LoginRadius_SocialLogin.util.ready(loginradius_interface);
```
Include the following container wherever you would like to display the LoginRadius Interface.

```
<div id="interfacecontainerdiv" class="interfacecontainerdiv">
</div>
```
You can further customize the above interface by referring to this documentation on [setting up a fully customizable interface](/api/v1/social-login/social-login-getting-started).

##Handling Data
After Authentication with the above interface you will receive a JSON response into a login callback which you can use to populate forms.



1. Add a LoginRadiusSDK.onlogin function to your Head Section HTML.
```
<script>             
LoginRadiusSDK.setLoginCallback(Successfullylogin);
function Successfullylogin(){}
</script>
```
9. Call the get User Profile function from within the Successfullylogin callback and populate your form data with the response.
```
 LoginRadiusSDK.getUserprofile( function( profile) {
 document.getElementById("formELement1").value=profile.FirstName; 
 document.getElementById("formELement2").value=profile.LastName;
 });
```
