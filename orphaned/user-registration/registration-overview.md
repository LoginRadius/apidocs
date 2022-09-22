User Registration Overview
=====


-------

This is a quick overview of the LoginRadius User Registration System.

The LoginRadius User Registration System relies on two identifiers:

**User ID (ID)** - The LoginRadius user identifier for a particular social platform(like "Facebook", "Twitter") attached with that account.

**Account ID (UID)** - The identifier for each account. This identifier may have multiple IDs(identifier for each social platform) attached with it.

You can see an outline of the data structure [here](/api/v2/data-points-and-response-code/data-points).

##Registration
![enter image description here](https://apidocs.lrcontent.com/images/ZwWKkEuQpuRzzo8uojWq_Sequence-Charts---Registration_270758aabf15c7fe47.43693464.png "Sequence Charts - Registration")

1. [Initialize the LoginRadius User Registration system](/api/v1/user-registration/user-registration) and [display the Registration Interface](/api/v1/user-registration/user-registration#titile2) on the page.
2. You can [manage the Email templates and the SMTP details](https://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization) from your LoginRadius Admin Console.
3. The email will contain an URL with a one-time email-token which should point to a page with the [Email Verification function initialized](/api/v1/user-registration/user-registration#titile10). When the user navigates to the page with the Email Verification function and the correct parameters, then the user's Email will be verified and they will be able to log in.

##Login and Social Login
![enter image description here](https://apidocs.lrcontent.com/images/76L2rXxfTq2hZQivB20y_Sequence-Charts---Login-_1675358aac061e31bb0.79318896.png "Sequence Charts - Login")

1. Initialize the [Social Login](/api/v1/user-registration/user-registration#titile7) or [Login](/api/v1/user-registration/user-registration#titile6) form to allow the user to authenticate.
2. The user initiates the Login process.
3. After successful authentication, you will receive an access token that you can use to [get the user's profile data](/api/v2/social-login/user-profile).
4. The User Profile Object is returned in JSON format and will contain the user's ID and UID which are used in the User Registration REST APIs.
5. You can pass the ID or UID with the required parameters into the REST APIs detailed on the [LoginRadius API]() docs in order to handle admin functionality or setup additional features.
6. All of the REST APIs return responses in JSON format.

##Forgot Password

![enter image description here](https://apidocs.lrcontent.com/images/cFIugceSai0AkwknPtLu_Sequence-Charts---Forgot-Password_2257058aacff8904758.54603970.png "Sequence Charts - Forgot Password")

1. To handle Forgot Password functionality, initialize the [Forgot Password Interface](/api/v1/user-registration/user-registration#titile8).
2. You can [manage the Email templates and the SMTP details](https://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization) from your LoginRadius Admin Console.
3. The Email will contain an URL with a one-time password token which should point to a page with the [Reset Password interface initialized](/api/v1/user-registration/user-registration#titile9). When the user navigates to the page with the Reset Password interface and the correct parameters in the URL, then the user will be prompted to input a new password.
4. This will return a JSON response with either a success or error response. If successful, the user will then be able to login with the new password.

##Demo
You can get a simplified demo of the system from our Git repo here: https://github.com/LoginRadius/demo
