# Logout Process

---

The Logout function clears the Single Sign On session so the user will no longer be automatically logged in.

you can invoke the following functions in order to setup the Single Sign On logout on your page:

##1. First invoke the init function

```
 LoginRadiusSSO.init('<LoginRadius Site Name>');
```

Replace `<LoginRadius Site Name>`with your LoginRadius site name, you can find your site name in your LoginRadius user account Admin-console.

## 2. Then invoke the logout function

```
LoginRadiusSSO.logout('<URL where user will be redirected after logout>');
```

Note: Replace`<Callback URL>` with your website’s callback URL. The callback URL should log the user out on your server as well if you have an existing session.

You can also pass callback function instead of callback URL, this callback function allow you to handle logout process according to your requirement.

```
LoginRadiusSSO.logout(function(){
	//Write your custom code here
});
```

##3. Invalidate access token on SSO logout

```
LoginRadiusSSO.logout('<LOGOUT URL>', true);

```

Here is a full example of a Logout page:

```
<!DOCTYPE html>

<html>
  <head>
  <title>Your Awesome Site</title>
  <script src="https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js"></script>
  <script src="https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js" type="text/javascript"></script>
  </head>
  <body>
  <script>
  LoginRadiusSSO.init('<LoginRadius Site Name>');
  LoginRadiusSSO.logout('REDIRECT-URL-AFTER-LOGOUT');
  </script>
  </body>
</html>
```

You can also directly log a user out without utilizing our pre-built functions by visiting the following URL in your browser:

//`<LoginRadius Site Name>`
.hub.loginradius.com/ssologin/logout

It will return the following response:

```
{"ok" : true}
```
