# Overview

This document covers the various authentication [types](#authenticationtype0) and [features](#authenticationfeatures5) supported by the LoginRadius Identity Platform. 

For more details on implementation and deployment of these authentication features refer to the following:

|Quick Starts <br><span style="font-weight:normal;color:#fff;">Learn and implement the basics</span> |Tutorials <br><span style="font-weight:normal;color:#fff;">Learn and implement authentication features</span>| Concepts <br><span style="font-weight:normal;color:#fff;">Learn the supportive concepts of authentication features</span>| 
|---|---|---|
|  [Standard Login](/authentication/quick-start/standard-login/) <br>[Social Login](/authentication/quick-start/social-login/)<br>[Single Sign On](/authentication/quick-start/sso-implementation/)  | [Phone Login](/authentication/tutorial/phone-login/) <br>[One Touch Login](/authentication/tutorial/one-touch-login)<br>[Passwordless Login](/authentication/tutorial/passwordless-login/) <br>[Smart Login](/authentication/tutorial/smart-login/)<br> [Username Login](/authentication/tutorial/username-login/)| [Password Policy](/authentication/concepts/password-policy/)<br>[Email Communication & Configuration](/authentication/concepts/email-communications/)<br> [SMS Provider Configuration](/authentication/concepts/sms-configuration)<br> [Roles, Permissions and Context](/authentication/concepts/roles-and-membership/)<br>[UI and UX Customization of IDX](/authentication/concepts/ui-ux-customizations-idx/)<br> [Email Verification Workflow](/authentication/concepts/email-verification-workflow/)<br> [Session Management](/authentication/concepts/session-management/)<br>[SMS Communication and Configuration](/authentication/concepts/sms-communication/)<br>[Customer Security](/authentication/concepts/customer-security/)<br>[Progressive Profiling](/authentication/concepts/progressive-profiling/)<br>[Customer Data Management](/authentication/concepts/introduction/) | 


##Authentication Type 

The LoginRadius Identity Platform supports the following authentication types:
- Email Authentication
- Phone Authentication
- Username Authentication
- Social Authentication

> **Note:** To check the authentication type enabled for your LoginRadius account, refer to the <a href = https://adminconsole.loginradius.com/platform-configuration/identity-workflow/authentication-workflow/account-workflow target=_blank>**Authentication Workflow**</a>.

### Email Authentication

Email Authentication is the process of registering and accessing an account via Email Address. By default, the Email Authentication feature is enabled for your LoginRadius Account. The [Standard Registration and Login](#standardlogin6) feature is an example of email authentication. 

It is mostly used for businesses that rely on email marketing, including notifications, promotions, and updates. This is widely used in Corporate Sectors, where the email addresses are domain-specific.

###Phone Authentication

Phone Authentication is the process of registering and accessing an account via Phone number. The [Phone Registration](#phonelogin8) and Login feature is an example of phone authentication.

It is mostly used in public websites and apps like food delivery, cab services, and more. It is beneficial for those customers who do not actively use or maintain their email accounts.

###Username Authentication

Username Authentication is the process of registering and accessing the account via a Username. Although you can request your customer to provide an email address during registration, the customer can log in using the unique username and password. 


The [Username Registration](/authentication/tutorial/username-login/) and Login feature is an example of username authentication. It is mostly used in the application where the requirement is to identify the customers by their usernames instead of the real name or identity.

###Social Authentication

Social authentication is the process of registering and accessing the account via the existing social account. In this case, your customers are not required to fill a registration form by skipping the registration form. 

The [Social Login](#sociallogin7) feature is an example of social authentication.

##Authentication Features

###Standard Login

**Standard Login** workflow is a fundamental component of LoginRadius, which allows you to provide your customers with a seamless authentication flow leveraging a unique ID (Email or Username) and password. It consists of Registration, Login, Customer Profile, and Password Management features.

**For example**, an online floral arrangement and delivery service may ask to include the following details:
- Required fields such as First Name, Last Name, and Email
- An optional field with a dropdown menu of specific types of flowers for the users to choose their favorite
- A field for the user to input their favorite color

Refer to this [document](/authentication/quick-start/standard-login/) to configure the Standard Login feature.

###Social Login

**Social Login** is a quick and convenient approach for registration and login, as it allows your customers to skip filling registration forms. It also increases customer conversion rates, by enabling them to sign-in to your website with their existing social media accounts like Facebook, Twitter, Google+ and more.

**For example**, Quora, an online Q&A platform, uses Social Login to make the users experience smooth and fast. Social Login is commonly used in most of the online platforms to ease the user's experience, reduce login failures, and increase registration.


> **Note:** When users log in with a social provider, the application that the user is accessing will never have access to the password of the user's social provider account.

Refer to this [document](/authentication/quick-start/social-login/) to configure the Social Login feature.



###Phone Login

**Phone Login** feature allows your customers to register and log in using their Phone Number. LoginRadius Identity Platform requires you to verify these customers after the registration via a One-Time Password (OTP). In the case of Phone Login, your customers can log in only after the phone number verification.

**For example,** it may be useful to tie the accounts to a phone number, such as when your main product is a mobile app, and you want your users to go through a registration process. In this case, allowing them to register by providing a phone number and password for registration as opposed to an email and password might be a better experience.

In addition, you can allow them to register using Phone Number and OTP, this way they don’t have to remember another password to log into your application.

Refer to [this document](/authentication/tutorial/phone-login/) to configure the Phone Login feature.

###One Touch Login

**One Touch Login** allows your customers to log in without the obligation to **register** first and remember the password. A link or OTP is sent to their email address or phone number respectively, and once the link or OTP is verified, the customer will be logged into the account.

While there are a variety of use cases for this type of authentication workflow, it is most common among IoT devices, Smart TV apps, and Smartphone apps. 

**For example**, a user is willing to participate in a TV show with online voting through the mobile app. After the splash screen, the mobile app prompts the user to enter the mobile number.

- The user enters his mobile number. The user receives an OTP (One-Time-Password) on his phone allowing him to log in.
- The user enters the OTP and completes the authentication process. Now, the user can vote for the favorite candidate in no time.

Similarly, the verification link or OTP can be sent on the email instead of Phone Number. Thus, you can utilize this feature as per the business requirements.

Refer to [this document](/authentication/tutorial/one-touch-login) to configure the One Touch Login feature.

###Passwordless Login

**Passwordless Login** feature allows your registered customers to login without providing a password. A link or OTP is sent to the registered email address or phone number respectively, and once the link or OTP is verified, the customer will be logged into the account.

> Note: In the case of Passwordless Login, the customer needs to **register** by providing a password. Later, the customer can log in using the password, link, or OTP.

**For example**, a traveler check-in for the flight at the airport, which departs at 5:30 am. During the check-in process, the screen asks for an email address. Once entered, LoginRadius checks if their email address exists in the airline database:

- If not, the traveler will be requested to create an account.
- If yes, LoginRadius triggers an email with a link that will log them into the in-flight entertainment portal. 

Similarly, instead of the link, an OTP can be sent on the traveler’s phone number. Thus, you can utilize this feature as per the business requirements.

Refer to [this document](/authentication/tutorial/passwordless-login) to configure the Passwordless Login feature.

###Smart Login

**Smart Login** feature allows your customers to easily log in to a device that may not be accessible with standard web or mobile devices.

The Smart Login feature does not require a password to log in and is designed to help you delegate the authentication process to a different device. It is commonly used in Smart Phone Apps, Smart TV Apps, Gaming Consoles (Xbox, PS, etc).

**For example**, a user has upgraded the smart TV and is setting up a Video Channel Service that he was already using. The user clicks the **Login Now** button and inputs the username/email address, the application sends a message to the respective email address.

The user opens the email on a mobile or web device and clicks the received link. A success message is displayed on the respective mobile/web. On the other hand, it gets authenticated on the Video Channel Service on TV. The user can continue enjoying the video channel without the hassle of remembering the password.

Refer to [this document](/authentication/tutorial/smart-login/) to configure the Smart Login feature.

###Standard and Phone Login Overview

**Standard and Phone Login** workflow allows your customer to login using both Phone Number and Email ID. However, to achieve this, in the registration form, at least one of these two fields should be required. 

> **Note:** To enable this workflow, contact to <a href = https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket target=_blank> LoginRadius Support Team</a>.

**For example**, your customer can provide both OR one of the following during the registration:

- Email ID
- Phone Number

If you require customer verification, LoginRadius sends a verification email or message. If the user has added both Email ID and Phone Number, LoginRadius sends the verification email and message to both mediums, respectively.



Your customer can verify one or both (Email ID and Phone Number). The verified methods can then be used for the login. The following are the possible login workflow based on the above registration and verification actions:

- If your customer has verified the email id, the customer can log in by entering the Email ID and Password.
- If your customer has verified the phone number, the customer can log in by entering the Phone Number and Password.
- If your customer has verified both email id and phone number, the customer can log in by entering Email ID OR Phone Number and Password.

Refer to [Advanced Customization](/api/v2/user-registration/advanced-customization#standardandphonelogin18) and [Phone Login Configuration](/authentication/tutorial/phone-login/) documents to configure this workflow.

### Custom Provider Registration

This feature will allow customers to register via a custom provider if enabled. If you don’t wish your users to be able to register via a custom provider, you can disable this feature from this section.

For more details regarding the custom provider, please refer [here](/single-sign-on/tutorial/custom-identity-providers/overview/).
