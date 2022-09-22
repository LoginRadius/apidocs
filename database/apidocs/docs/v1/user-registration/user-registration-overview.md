User Registration Overview
===
---
This is a quick overview of the LoginRadius User Registration System.

The LoginRadius User Registration System relies on two identifiers:

**Account User ID (ID)** - The LoginRadius user identifier for a particular social platform(like "Facebook", "Twitter") attached with that account.

**Account ID (UID)** - The identifier for each account, it may have multiple IDs(identifier for each social platform) attached with it.

You can see a outline of the data structure [here](/api/v1/data-points-and-response-code/data-points).

##Registration
---
![Access-Token API](https://apidocs.lrcontent.com/images/Sequence-Charts---Registration_1443258ac0e14495278.42896836.png "Registration")

1. [Initialize the LoginRadius User Registration](/api/v1/user-registration/user-registration-getting-started) system and [display the Registration Interface](/api/v1/user-registration/user-registration-getting-started) on the page.
2. You can manage the [Email templates and the SMTP details](https://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization) from your LoginRadius Admin Console.
3. The email will contain a URL with a one-time email-token which should point to a page with the [Email Verification function initialized](/api/v1/user-registration/user-registration-getting-started). When the user navigates to the page with the Email Verification function and the correct parameters then the users Email will be verified and they can now login.

##Login and Social Login
---
![enter image description here](https://apidocs.lrcontent.com/images/Sequence-Charts---Login-_1366758ac0eb1d80741.72710112.png "Login")

1. Initialize the [Social Login](/api/v1/user-registration/user-registration-getting-started) or [Login](/api/v1/user-registration/user-registration-getting-started) form to allow the user to authenticate.
2. User Initiates the Login process
3. After successful authentication you will receive an access token that you can use to get the [users profile](/api/v1/social-login/user-profile) data.
4. The User Profile Object is returned in JSON format and will contain the users ID and UID which are used in the User Registration REST APIs.
5. You can pass the ID or UID with the required parameters into the REST APIs detailed on the [LoginRadius API docs](/api/v1/data-points-and-response-code/data-points) in order to handle admin functionality or setup additional features.
6. All of the REST APIs return responses in JSON format.

##Forgot Password
---
![enter image description here](https://apidocs.lrcontent.com/images/Sequence-Charts---Forgot-Password_2244958ac0f7790edb9.87329839.png "Forgot-Password")

1. To handle Forgot Password functionality initialize the [Forgot Password Interface](/api/v1/user-registration/user-registration-getting-started).
2. You can [manage the Email templates and the SMTP details](https://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization) from your LoginRadius Admin Console.
3. The email will contain a URL with a one-time password-token which should point to a page with the [Reset Password interface](/api/v1/user-registration/user-registration-getting-started) initialized. When the user navigates to the page with the Reset Password interface and the correct parameters in the URL then the user will be prompted to input a new password.
4. This will return a JSON response with either a success or error response. If successful the user will now be able to login with the new password.


##UserName Login

UserName is a secure login option for the Traditional Login flows, which is similar to email login. This can be created at time of registration. LoginRadius User Registration via UserName provides an easy way to allow your users to login to your website or app without needing to remember or manage an email. 

##### User Name Login Flow
![enter image description here](https://apidocs.lrcontent.com/images/User-Name-Login---Page-1-1_148058ef5197c91635-18009809_1966558f16e48850294.22467999.png "User Name Login Flow")

#####Restrictions on UserName
A UserName should be unique and is treated as an identity in the LoginRadius Cloud Directorytherefore no two UserNames can be alike. By default the UserName is always saved in lowercase characters, for example: If the UserName is "Jon147" during registration it will save as "jon147" in LoginRadius. This is a customizable option and can be configured when initializing your interfaces to support different character sets.

<br>
**NOTE:** Please contact the LoginRadius Customer Success team if you would like to enable case sensitive UserNames via our API. 



##Demo
You can get a simplified demo of the system from our Git repo here: [https://github.com/LoginRadius/demo/tree/api-v1](https://github.com/LoginRadius/demo/tree/api-v1)
