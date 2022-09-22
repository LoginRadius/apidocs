# Login Process

---

The Login function detects the presence of an active Single Sign On session and logs a user in if it is present.

You can invoke the following functions in order to setup the Single Sign On login on your page:

##1. First Invoke the Init function

```
 LoginRadiusSSO.init('<LoginRadius Site Name>');
```

Replace
`<LoginRadius Site Name>`
with your LoginRadius site name, you can find your site name in your LoginRadius user account Admin-console.

##2. Then Invoke the Login function

```
LoginRadiusSSO.login('<Callback URL>');
```

Replace `<Callback URL>`with your website’s callback URL. This can be independent of the one specified in your LoginRadius Admin Console.

You can also pass callback function instead of callback URL, this callback function allow you to handle login process according to your requirement.

```
LoginRadiusSSO.login(function(){
	//Write your custom code here
});
```

> Token will only be returned if it is not expired

A full example of the Login Process

```
<html>
  <head>
  <title>Your Awesome Site</title>
  <script src="https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js"></script>
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

You can verify that a Single Sign On Session is active by visiting the following URL:

`//<LoginRadius Site Name>.hub.loginradius.com/ssologin/login`

It will return a response in the following format if the session is active:

```
{"token":"xxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxxx","isauthenticated":true}
```
