Account Linking
=======

The steps for Account linking shown here will only work when the user is logged in.

##Implementation Flow

1. Add Account Linking Interface

  a. Add javascript code

 b. Add HTML Code

 c. Add template code

2. Add REST APIs for Account Linking and Unlinking

 a. Account Linking REST API

 b. Account Unlinking REST API


##Account Linking Interface
a. **Javascript code**

Add the JavaScript framework reference to your web page – first the LoginRadius JS framework and then the LoginRadius User Registration framework.

```
<script src="https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js"></script>
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js"></script>
```

To implement account linking interface, Call LoginRadius.init with the accountlinking action :

```
$SL.util.ready(function() {
  var raasoption = {};
  raasoption.apikey = "<Your API key>";
  raasoption.templatename = "loginradiuscustom_tmpl";
  raasoption.hashTemplate = true;
  LoginRadiusRaaS.CustomInterface(".interfacecontainerdiv", raasoption);
  LoginRadiusRaaS.init(raasoption, 'accountlinking', function(response) {
    // On Success
    console.log(response);
  }, function(errors) {
    // On Errors
    console.log(errors);
  }, "interfacecontainerdiv");
});
```

> Note


> The init functions success callback will return


> 1. When different social providers have the same email address then a json array ’{ isPosted: true }’ as the response.
> 2. Otherwise an accesstoken token as response.

b. Add HTML code

```
<div class="interfacecontainerdiv" id="interfacecontainerdiv"></div>
```

c. Add Template Code

```
<script type="text/html" id="loginradiuscustom_tmpl">
<# if(isLinked) { #>
 <div class="lr-linked">
<a class="lr-provider-label" href="javascript:void(0)" title="<#= Name #>" alt="Connected">
<#=Name#> is connected
</a>
</div>
<# }  else {#>
 <div class="lr-unlinked">
<a class="lr-provider-label" href="javascript:void(0)" onclick="return  $SL.util.openWindow('<#= Endpoint #>&is_access_token=true&ac_linking=true&callback=<#= window.location #>');" title="<#= Name #>" alt="Sign in with <#=Name#>">
<#=Name#></a>	   </div>
  <# } #>
</script>
```

> Note

> This account linking template shows linked account and unlinked
 account on the basis of the variable **isLinked** as used above.

##REST APIs for Account Linking and Unlinking

a. Account Linking REST API

Account Link · LoginRadius API Documentation

b. Account Unlinking REST API

Account Unlink · LoginRadius API Documentation


###Scenarios of Account Linking



1. When a user has an account, connected with one social provider having a UID (Account ID) for example 123456 and tries to link with another social provider through which the user has already created a different account with UID for example 456789. In such case, the account would be linked but UID of the linked account would be of the existing account in which user was logged in. (In this case, it would be 123456).


> 1. User is currently logged in Account 1 with UID of 123456.
>
> 2. Tries to link existing Account 2 with UID 456789.
>
> 3. Once linked, the UID 456789 is removed and is replaced by 123456. The UID 456789 will be lost in this case.


2.When a user has an account, connected with multiple social provider and tries to link with another account which has one social provider. The new account will be connected with the existing logged in account and the new accounts uid will replace the existing logged in accounts uid.


> 1. User currently logged in Account 1 with UID of 123456 which has two social providers connected (FB, Google)
>
> 2. Tries to link existing Account 2 with UID of 456789 which has one social provider (Twitter)
>
> 3. Once linked, the UID 456789 is removed and is replaced by 123456. The UID 456789 will be lost in this case

