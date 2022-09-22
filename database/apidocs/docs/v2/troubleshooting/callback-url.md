# Callback URL

---

This document outlines the details of the LoginRadius option "Callback URL" and goes over what it is used for and how to properly configure the URL through the social login interface script.

## Description
The Callback URL refers to the location that a user will return to after having completed the social login/authentication process.

## Usage
To configure the callback URL through the social login interface script, you need to specify the `callbackType` parameter to either "Hash" or "QueryString" and `callbackUrl` in your options object, you can use the following code for reference where we set callbackUrl:

```
<script src="https://auth.lrcontent.com/v2/js/LoginRadiusV2.js">

</script>
<script type='text/javascript'>
       …….
        var commonOptions = {};
        commonOptions.apiKey = "<your loginradius api key>";
        commonOptions.hashTemplate= true;
        commonOptions.callbackType= Hash;
        commonOptions.sott ="<Get_Sott>";
        commonOptions.verificationUrl = window.location; //Change as per requirement
        commonOptions.callbackUrl = "<Callback_URL> "; //Set callback url here
        var LRObject= new LoginRadiusV2(commonOptions);
        ……….
        var sl_options = {};
        sl_options.onSuccess = function(response) {
        	//On Success
          //Here you get the access token
        	console.log(response);
        };


      sl_options.onError = function(errors) {
       	//On Errors
          console.log(errors);
       };
      sl_options.container = "sociallogin-container";

      LRObject.util.ready(function() {
      LRObject.init('socialLogin', sl_options);
     });
    ……...
</script>

```

To make sure the callback URL option is working, you need to whitelist that URL in the LoginRadius Admin Console. You can whitelist the Callback URL from your LoginRadius Admin Console by [logging in to your Admin Console](https://secure.loginradius.com/account) then navigating to Deployment ➔ Apps


## Error
You might get an error as shown below, if the callback URL is not whitelisted in the LoginRadius Admin Console.

![](https://apidocs.lrcontent.com/images/error_screenshot_249325a9e77cceede31.75614641.png)
