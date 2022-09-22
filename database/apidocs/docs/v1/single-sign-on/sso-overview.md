SSO Overview
===
-----

The below chart goes over the logical flow of the Single Sign On system and the Login/Logout processes.
![enter image description here](https://apidocs.lrcontent.com/images/Sv5bmVDQSSt9GcgAHnlj_Single-Sign-On-_3017158ac06abebe3f6.43857523.png "")


1. Once a user lands on a page that is included in a Single Sign On(SSO) grouping the first step is to check for an active [SSO session](/api/v1/single-sign-on/getting-started). This is handled by the isNotLoginThenLogut function which checks for the presence of a browser Cookie on the `<LoginRadius SiteName>.hub.loginradius.com` domain and if present it will go into the success handler(function or redirect URL) or error handler.
2. The function will trigger a [JSON-P](http://json-p.org/) call that will return a response based on the presence of the 'lr-user--token' cookie.
3. Here you will access either the [Login](/api/v1/single-sign-on/getting-started) or [Logout](/api/v1/single-sign-on/getting-started) SSO functions to trigger the Login or Logout Process which direct the user into the handler function or callback URL.
4. In an active SSO Session you will now have a valid Access-Token which you can send to your authentication server or handle client-side your authentication procedures.
5. This generally entails retrieving the User profile with the Access-Token and using the returned data to authenticate the user and set your sites session.
6. If the SSO Session was not present then it will either go into the logout Function or redirect the page to the logout url. Here you can display a message or show the authentication interface where a user will be able to login.
7. Successfully logging in will set the Cookie in your browser on <LoginRadius SiteName>.hub.loginradius.com.
8. You can include the [Login](/api/v1/single-sign-on/getting-started) to redirect the user to your Authentication procedures either through the function handler, or the Callback URL.
9. To Logout a user you would provide a [logout](/api/v1/single-sign-on/getting-started) button. This button would call the Logout function which would clear the SSO browser session and redirect into either the function handler or callback URL.
10. Either in the function handler or callback URL trigger your Logout procedure.
11. Clear any user sessions/storage that you initiated during login and direct user to your Homepage.