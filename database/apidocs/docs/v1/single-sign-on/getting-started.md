# SSO Getting Started

---

The SSO API can be accessed with our JavaScript SSO SDK. It is hosted on LoginRadius’ servers for easy access. The API is used to create, maintain, or destroy sessions throughout your website.

The Single-Sign-On SDK will work in conjunction with your social login and won’t affect your traditional login process.

##Overview

![enter image description here](https://apidocs.lrcontent.com/images/loginradius_34558a55144da5b76.91845622.png)

##1. Include the SSO Script
Add this script to your head tag or just before closing body (</body >) tag

```
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js" type="text/javascript"></script>
```

This will take up the LoginRadiusSSO global namespace.

Note: Please utilise the script from our domain rather than making a local copy for yourself. This way we can patch any minor changes to our SDK without breaking your implementation.

##2. Initialize SSO DOM Object
Before performing any actions, please initialise the LoginRadius SSO Object.

```
 LoginRadiusSSO.init('<LoginRadius Site Name>','<app path>','<https>');

```

Note:

- This method should be called, after you call the LoginRadius SSO script.
  Replace `<LoginRadius Site Name>` with your LoginRadius site name, you can find your site name in your LoginRadius user account Admin-console.
- Replace `<app path>` with your root directory(If you are running multiple web on single domain) or you can left this blank.
  e.g Suppose your root directory is `example.com/wordpress` so you need to pass `wordpress` as app path.
- Third parameter should be 'https' if you have enabled secure cookies and you web is running on HTTP.

##3. Login Action
Invoke the function below to check if there is an activated SSO session going. If there is, the token for that activated session will be passed back, and the callback url or function will get executed.

Callback Url:
Replace <Callback URL> with your website’s callback URL. This can be independent of the one specified in your LoginRadius Admin Console.

```
// If found activated session, goto the callback url
// Token string will be submitted to the url as well under request variable name token
LoginRadiusSSO.login('<Callback URL>');
```

- Callback Function:

```
LoginRadiusSSO.login(function(token){
	//Write your custom code here
  console.log(token);
});
```

To manually check if you are logged in or not, you can also visit this url in your browser

http://<LoginRadius Site Name>.hub.loginradius.com/ssologin/login

If the response is like this:

```
{"token":"xxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxxx","isauthenticated":true}
```

It means you have successfully logged in and your SSO session is successfully activated now.

##4. Logout Action
Invoke the function below to sign the user out.

```
 LoginRadiusSSO.logout(‘<URL where user will be redirected after logout>’);
```

Note: Replace <Callback URL> with your website’s callback URL. The callback URL should log the user out on your server as well if you have an existing session.

You can also pass callback function instead of callback URL, this callback function allow you to handle logout process according to your requirement.

```
LoginRadiusSSO.logout(function(){
	//Write your custom code here
});
```

To manually log yourself out, visit this url in your browser:

http://`<LoginRadius Site Name>`.hub.loginradius.com/ssologin/logout

The response should be:

```
{"ok" : true}
```

##5. User Logged in Check
Invoke the function below to verify a user has been logged out from all websites.
The function ```
isNotLoginThenLogout

```takes two kinds of parameters:



- String: In case of String, it should be a website URL which you want your user to goto if he is not logged in.
-
```

LoginRadiusSSO.isNotLoginThenLogout('REDIRECT-URL-IF-NOT-LOGIN');

```
-
Callback Functions: In case of callback functions, it grants you more freedom to control the flow.

```

function logoutCallback()
{
//user logout
}

function loggedInCallback()
{
//user loggedin
}

LoginRadiusSSO.isNotLoginThenLogout(logoutCallback, loggedInCallback);

````

>Best Practice

>This method should be called on page loading. The callback URL should log the user out on your server as well if you have an existing session.

##6. Additional Notes
The script below should be called on every page where you will invoke ```
LoginRadiusSSO.login()
```, ```
LoginRadiusSSO.logout()
```, or ```
isNotLoginThenLogout().```


````

<script src="https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js" type="text/javascript"></script>
<script type="text/javascript">
	LoginRadiusSSO.init('LoginRadius Site Name');
</script>

```

##7. Example Login
Below is a sample login implementation.

```

!DOCTYPE html>

<html>
  <head>
  <title>Your Awesome Site</title>
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js" type="text/javascript"></script>  
  <script>
    LoginRadiusSSO.init('LoginRadius Site Name');
  </script>
  </head>

  <body>
    <button onclick="LoginRadiusSSO.login('REDIRECT-URL-AFTER-LOGIN')">Login</button>
  </body>
</html>
```
##8. Example Logout
Below is a sample logout implementation.

```
<!DOCTYPE html>

<html>
  <head>
  <title>Your Awesome Site</title>
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js" type="text/javascript"></script>
  </head>
  <body>
  <script>
  LoginRadiusSSO.init('LoginRadius Site Name');
  LoginRadiusSSO.logout('REDIRECT-URL-AFTER-LOGOUT');
  </script>
  </body>
</html>
```

##9. Secured or after login page
Below is a sample of secured or after login implementation.

```
<!DOCTYPE html>

<html>
  <head>
  <title>Your Awesome Site</title>
<script src="https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js" type="text/javascript"></script>
  <script>
  	LoginRadiusSSO.init('LoginRadius Site Name');
  </script>
  </head>

	<body>
    <script>
      LoginRadiusSSO.isNotLoginThenLogout('REDIRECTED-URL-IF-NOT-LOGIN');
    </script>
  </body>
</html>
```

##Debug Mode

Debug mode is configured via the LoginRadiusSSO.init initialization
You can pass in "on" or "off"

Example:

```
LoginRadiusSSO.init("appname", "appPath", "protocol", "off");
```

You can set the value to "on" if you want to enable debug mode which will cause errors to show in your Web console.
