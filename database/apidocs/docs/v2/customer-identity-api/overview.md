User Registration Overview
====

This is a quick overview of the LoginRadius User Registration System. 

The LoginRadius User Registration system utilizes two identifiers in order to uniquely identify your users:

**Account ID (UID):** The UID is the unique identifier for each user account. It may have multiple Profile IDs (ID) attached to it via the Identities profile field(see below).

**Profile ID (ID):** The ID is the unique identifier for each profile attached to a LoginRadius UID. There will be a unique ID for each profile (i.e. "Facebook", "Twitter", "Email", etc.) associated with a given UID.

You can see an outline of the data structure [here](/api/v2/data-points-and-response-code/data-points).

## Registration

![Access-Token API](https://apidocs.lrcontent.com/images/Sequence-Charts---Registration_1443258ac0e14495278.42896836.png "Registration")

1. [Initialize the LoginRadius User Registration](/api/v2/user-registration/user-registration-getting-started#initializationofloginradiusobject3) system and [display the Registration Interface](/api/v2/user-registration/user-registration-getting-started#registration5) on the page.
2. You can manage the [Email templates](/api/v2/admin-console/platform-configuration/standard-login/email-templates/) and the [SMTP details](/infrastructure-and-security/smtp-overview) from your LoginRadius [Admin Console](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration).
3. The email will contain a URL with a one-time email-token which should point to a page with the Email Verification function initialized. When the user navigates to the page with the Email Verification function and the correct parameters then the user's Email will be verified and they can now login.

## Login and Social Login

![enter image description here](https://apidocs.lrcontent.com/images/Sequence-Charts---Login-_1366758ac0eb1d80741.72710112.png "Login")

1. Initialize the [Social Login](/api/v2/user-registration/user-registration-getting-started#sociallogin8) or [Login](/api/v2/user-registration/user-registration-getting-started#login7) form to allow the user to authenticate.
2. User Initiates the Login process
3. After a successful authentication, you will receive an access token that you can use to get the [user's profile](/api/v2/social-login/user-profile) data.
4. The User Profile Object is returned in JSON format and will contain the user's ID and UID which are used in the User Registration REST APIs.
5. You can pass the ID or UID with the required parameters into the REST APIs detailed on the [LoginRadius API docs](/api/v2/data-points-and-response-code/data-points) in order to handle admin functionality or setup additional features.
6. All of the REST APIs return responses in JSON format.

## Forgot Password

![enter image description here](https://apidocs.lrcontent.com/images/Sequence-Charts---Forgot-Password_2244958ac0f7790edb9.87329839.png "Forgot-Password")

1. To handle Forgot Password functionality initialize the [Forgot Password Interface](/api/v2/user-registration/user-registration-getting-started#forgotpassword12).
2. You can [manage the Email templates and the SMTP details](/api/v2/admin-console/platform-configuration/standard-login/email-templates/#email-template-management) from your LoginRadius [Admin Console](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration).
3. The email will contain a URL with a one-time password-token which should point to a page with the [Reset Password interface](/api/v2/deployment/js-libraries/getting-started/#resetpassword13) initialized. When the user navigates to the page with the Reset Password interface and the correct parameters in the URL then the user will be prompted to input a new password.
4. This will return a JSON response with either a success or error response. If successful the user will now be able to login with the new password.

##UserName Login

UserName is a secure login option for the Traditional Login flows, which is similar to email login. This can be created at the time of registration. LoginRadius User Registration via UserName provides an easy way to allow your user's to login to your website or app without needing to remember or manage an email.

##### UserName Login Flow

![Username Flow chart](https://apidocs.lrcontent.com/images/Username-flow-3_148616109b07c5f8554-95150622-1_183324833965bc927db83e35.54461446.png "Flow chart")

#####Restrictions on UserName
A UserName should be unique and is treated as an identity in the LoginRadius cloudstorage, therefore, no two UserNames can be alike. By default the UserName is always saved in lowercase characters, for example: If the UserName is "Jon147" during registration it will save as "jon147" in LoginRadius. This is a customizable option and can be configured when initializing your interfaces to support different character sets.
<br>

**NOTE:** Please contact the LoginRadius Customer Success team if you would like to enable case-sensitive UserNames via our API.

#####Allow Duplicate Emails with the UserName Login flow

Given that the UserName is the unique identifier in the UserName Login Flow, you can enable so that the same email can be registered more than once under a different UserName. Please see below for more details as to what impact this would have on your workflow:

**Specifications and Requirements**:

- Email can be duplicated across accounts however it is required.
- Login via email will not work in this flow, as it only requires the UserName to login.
- Get all emails to the given email address like Verification email, Welcome email, Forgot password email.
- When sending a Forgot Password request instead of requiring the user's email, it will require the unique UserName and the Forgot Password email will be sent to the available email address.
- This flow only works with **Disabled email verification**.
- The Add Email API will not work with this flow due to **Disabled email verification**.
- Automatic Account linking is disabled with this flow however manual account linking is possible.
- Compatible with LoginRadius V2 APIs only.
- Easily Delete an Account tied to a UserName.
- Auto Login is supported by providing the UserName.
- Magic link is supported by providing the UserName.

**NOTE**: You need to contact [LoginRadius support](/getting-started/general-questions/support-faq#how-do-i-contact-loginradius-support-) to enable this feature on your LoginRadius site.

##Demo
You can get a simplified demo of the system from our Git repo here: [https://github.com/LoginRadius/demo](https://github.com/LoginRadius/demo)
