Advanced Social Login Customization
=====


------- 

This section goes over the advanced features for customizing your Social Login Interface.

{{table_container}}

## Setting up social account linking

Social account linking lets you map multiple social providers to one user. One common use case is getting a complete set of user data by combining your user's various social providers into one user account. We go through a simple algorithm for implementing this feature on your site. 

1. Display the social login interface to the user with a title similar to "Link Social IDs".

2. When the user authenticates with any of the social providers, call the user profile API to fetch the social ID of the given user. 

3. Assign this social ID to the unique ID for the corresponding user account within your website database.

4. Display a list of the linked ID's to the signed in user account with an option to remove the linked ID.

5. To remove the linked account, remove the social ID from the user table in your site's database.  

6. When a user logs in in the future, retrieve the social ID of that user and check whether it already exists in the user table in your site's database. 

Example:

A user registers on your website using Facebook login. This user's unique ID for your website and social ID retrieved using the LoginRadius API are 56 and 78797978574xxxx respectively. The user is displayed the Social Login interface for account linking on their profile page. The user chooses to link their Google+ account to this user account. The Google+ social ID is retrieved from the user profile data and is saved your sites database user table associated with the logged in user.

Your site's user table:

|user_id|LoginRadius_id|
|----||-----||-----||-----|
|56|FACEBOOK_ID|
|56|GOOGLE_ID|
|56|OTHER_ACCOUNT_ID|

When the user clicks on the remove icon associated with on of the social providers, delete the row in the above table that has a LoginRadius_id that is equal to the social ID (Linked Accounts ID) of the provider.

Now whenever a user logs into your site check the table for the corresponding LoginRadius_id of the social provider they are logging in with and if it exists log them in as the associated user_id instead.

## Setting up custom error pages

This feature allows you to customize your error page, which can sometimes crop up during the login process.

Instead of showing an error page to your user, you can also redirect users to your callback URL if an error occurs.

**Process flow:**
To use this feature you need to send one of the following parameters, `is_error_redirect=1` or `is_error_redirect=true`, with the request.

**Request:**
```
https://<LoginRadius-site-name>.hub.loginradius.com/requesthandlor.aspx?apikey=<LoginRadius_Api_Key>&provider=<provider name>&callback=<custom callback>&is_error_redirect=true
```

**Implement in JS code:**
Add `is_error_redirect` to the callback parameter as shown in the above request.

**Example: **
```
$ui.callback="http://yourdomain.com/callback&is_error_redirect=true";
```

**Full Example Code:**
```
<script type="text/javascript"> var options={}; options.login=true; LoginRadius_SocialLogin.util.ready(function () { $ui = LoginRadius_SocialLogin.lr_login_settings;
$ui.interfacesize = "";
$ui.apikey = "LoginRadius-api-key";
$ui.callback = "http://yourdomain.com/callback&is_error_redirect=true";
$ui.lrinterfacecontainer ="interfacecontainerdiv";
$ui.interfacesize = "";
$ui.lrinterfacebackground = "";
LoginRadius_SocialLogin.init(options); }); </script>
```

**Response:**
After getting an exception on LoginRadius' side, LoginRadius will redirect the user to your callback URL with the following query string ?message=<error message>&code=<error code>

**Example:**
```
http://yourdomain.com/callback?message=twitter%20is%20not%20working&code=forbidden
```

## Setting up the redirect callback in the pop-up window

The same window option allows you to redirect your page into the child pop-up window which is opened by the LoginRadius interface.

**Potential Use Cases**

1. You don't want your parent page to refresh, so you can do all of the login functionality in a pop-up and communicate using JavaScript with your parent page.
2. You want control over closing the pop-up window.

**Process Flow**

Request: pass same_window=1 with the request.
```
https://<LoginRadius-Site-Name>.hub.loginradius.com/requesthandlor.aspx?apikey=<LoginRadius-Api-Key>&provider=<provider-name>&callback=<custom-callback>&same_window=1
```

After successfully logging in you will get a token on the callback page in a pop-up (so LoginRadius will not close the pop-up and will not refresh the parent page).

Now you have to handle any further communication between these pages.

We recommend using JavaScript communication to send an action to the parent page.

**Example 1:**
1. Add a method on the parent page with a required action. [e.g. `loginAction()`]
2. After getting the token and finishing any tasks, call the method using window.opener [e.g. `window.opener.loginAction();`]

**Example 2:**
1. After finishing any tasks, refresh the page's parent page using `window.opener.location.reload()`;
2. Or you can set a custom URL using `window.opener.location = "<URL>"`;
To close the popup, use `window.close()`

## Removing the default loading spinner from the authentication popup
You can remove the loading spinner displayed in the authentication pop-up by including the following parameter into your interface script:
```
$ui.isConnectingInsidePopup=false;
```

The above parameter is a bool and should be set to false.

Example:
```
<script type="text/javascript"> var options={};

options.login=true; LoginRadius_SocialLogin.util.ready(function () {
$ui = LoginRadius_SocialLogin.lr_login_settings;
$ui.interfacesize = "";
$ui.apikey = "<LoginRadius_api_key>";
$ui.callback="";
$ui.isConnectingInsidePopup=false;
$ui.lrinterfacecontainer ="interfacecontainerdiv";
LoginRadius_SocialLogin.init(options); });

</script>
```

You can view additional customizable parameters that can be applied to the interface [here](/api/v1/social-login/social-login-getting-started#title8).

## Stay in the pop-up window after successful login (without being redirected)
In order to stay in the same pop-up window, simply append "&same_window=1" into your Javascript template code, like this:
```
<script type="text/html" id="loginradiuscustom_tmpl">

<a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>&callback=<%=window.location%>
&same_window=1');"><%=Name%></a>
</script>
```

You can view additional customizable parameters that can be applied to the interface [here](/api/v1/social-login/social-login-getting-started#title8).

## Handling redirection after cancellation when not using the social provider's pop-up window
If you are not opening a pop-up for login, and if the user clicks the cancel button on the provider's page during login, LoginRadius redirects the user back to your callback page with the following query string:

?denied_access=user has denied access

Example: `http://yourdomain.com/callback?denied_access=user` has denied access

You can retrieve this query string and redirect the user as per your requirements.

## Disable Social Registration Feature

Disable Social Registration feature allows you to block registering new users through social registration. Enabling this option on the LoginRadius site blocks new registration and permits only existing users to log in. This will have no impact on registering new users through a traditional sign-up form. Disable social registration feature is used in such a scenario wherever you want to allow users only to log in and not to register using the social provider.

The following implementation steps assume that you have already configured LoginRadius' social login interface if you haven't please visit [here](/api/v1/social-login/social-login-getting-started#title3) for initial setup of user registration social interface.

In order to implement this feature, please add/set the following JavaScript parameter to the social login interface implemented page if you are using User Registration or Custom Interface skip the step.
```
$ui = LoginRadius_SocialLogin.lr_login_settings;
$ui.disablesign= true ;
```
In case of User Registration or Custom Social Login Interface, Use the following Javascript code:
```
<script type="text/html" id="loginradiuscustom_tmpl_mobile">
  <span class="lr-provider-label" onclick="window.location.href = '<#= Endpoint  #>&disablesignup=true&is_access_token=true&callback=<#= window.location.href.split('#')[0] #>&callbacktype=hash';" title="<#= Name #>" alt="Sign in with <#=Name#>"><#=Name#>	
  </span>
</script>
```

> Note:

>Adding the above JavaScipt won't make any difference until the feature has been enabled on your LoginRadius site, Please contact LoginRadius support in order to activate this feature on your Account.