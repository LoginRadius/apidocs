# Audit Logs

The Audit Logs help you check and keep track of the activity occurring in your LoginRadius environment. The monitored activity includes what types of changes have been made on which date and by whom.

Follow the following steps on how to access Audit Logs section:

**1.**  Log in to the LoginRadius [Admin Console](https://adminconsole.loginradius.com/login).
    
**2.**  Click on the avatar in the top right corner, and select Team Management from the drop-down menu.
    

![image ](https://apidocs.lrcontent.com/images/a_174986322e9ed1c9767.13485643.png)

Note: By default, the Account Owner, Administrators and Managers have access to this section. For more details, refer to the [Team Managment](/api/v2/admin-console/team-management/manage-team-members/#roleaccesspermissions0) document.

**3.**  Once you are in the Team Management section, click on Audit Logs on the left-hand side.
    

![image ](https://apidocs.lrcontent.com/images/b_121276322ea10ac8253.07105082.png)

**4.**  You will see the different actions taken (Activity Type) within the LoginRadius Admin Console by each of your Team Members (User), including the time of occurrence (Time Stamp).
    
**5.**  If you have more than one LoginRadius environment, choose the environment you would like to review from the drop-down on the right.    

![image ](https://apidocs.lrcontent.com/images/c_5496322ea388a88a0.42097182.png)


## Audit Logs Detailed View

Below are the logs (Activity Type) that will be generated in accordance with team members’ actions which are done in the Admin console respectively.


### Platform Configuration Audit Logs

| Description 	| Logs statement 	|
|---	|---	|
| Case-Sensitive Username 	| Updated Basic Configuration 	|
| Social login via ping API 	| Updated Site Features 	|
| Email Verification 	| Updated Site Features 	|
| OTP Email Verification 	| Updated Site Features 	|
| Email Configuration 	| Configured SMTP Settings 	|
| Global Email Settings 	| Update Global Email Settings 	|
| SMS Configuration 	| Configured SMS Provider Settings 	|
| Global SMS Settings 	| Update Global SMS Settings 	|
| If the Email Setting has been updated for the individual Email template. 	| Updated User Registration Email Settings 	|
| If the SMS Setting has been updated for the individual Sms template. 	| Updated User Registration SMS Settings 	|
| Data Schema 	| Update Optional Captcha Configuration<br><br>Updated Basic Configuration<br><br>Updated Registration Form Schema 	|
| Edit/Reset Default Email Template 	| Updated '' Email Template 	|
| Add/Update/Delete Custom Email Template 	| Added `<TEMPLATE ID>` Email Template<br><br>Updated `<TEMPLATE ID>` Email Template<br><br>Removed `<TEMPLATE ID>` Email Template 	|
| Phone Login (OTP Settings) 	| 1. Configured SMS Provider Settings<br><br>2. Updated Site Features 	|
| Edit/Reset Default SMS Template 	| Updated '' SMS Template 	|
| Add/Update/Delete Custom SMS Template 	| Added `<TEMPLATE ID>` SMS Template<br><br>Updated `<TEMPLATE ID>` SMS Template<br><br>Removed `<TEMPLATE ID>` SMS Template 	|
| Edit/Reset Default Email Template of Passwordless Login with Email 	| Updated '' Email Template 	|
| Add/Update/Delete Custom Email Template of Passwordless Login with Email 	| Added `<TEMPLATE ID>` Email Template<br><br>Updated `<TEMPLATE ID>` Email Template<br><br>Removed `<TEMPLATE ID>` Email Template 	|
| Edit/Reset Default SMS Template of Passwordless Login with OTP 	| Updated '' SMS Template 	|
| SOCIAL PROVIDERS 	| Updated Social Provider Configuration 	|
| If any Custom IDPs app was updated, deleted, or configured. 	| 1. <Provider> Service Provider app name `<Name of an APP>` was updated.<br><br>2. <Provider>Service Provider app name `<Name of an APP>` was removed.<br><br>3. <Provider>Service Provider app name `<Name of an APP>` was configured 	|
| If any Federated SSO app was updated, deleted, or configured. 	| 1. <Federated SSO method> app name <App name> was updated.<br><br>2. <Federated SSO method> app name <App name> was removed.<br><br>3. <Federated SSO method> app name <App name> was configured 	|
| If any SSO Connector was updated, deleted, or configured. 	| 1. <SSO Connector method> app name <App name> was configured.<br><br>2. <SSO Connector method> app name <App name> was updated.<br><br>3. <SSO Connector method> app name <App name> was removed. 	|

### Platform Security Audit Logs

| Description 	| Logs statement 	|
|---	|---	|
| Configure Google reCAPTCHA 	| Updated Google reCAPTCHA Configuration 	|
| Configure QQ reCAPTCHA 	| Updated Tencent Captcha Configuration 	|
| Update Registration Restriction 	| Updated Access Restriction Configuration 	|
| Remove Registration Restriction 	| Updated Basic Configuration 	|
| Configure Brute Force Lockout 	| Updated Basic Configuration 	|
| Set Password Expiration 	| Updated Password Expiration Settings 	|
| Enable/Set/Disable Max Password History 	| Updated Site Features<br><br>Updated Basic Configuration 	|
| Configure Password Complexity 	| Updated Basic Configuration 	|
| Update Token Lifetime 	| Updated Site Features 	|
| Enable/Disable Force Logout 	| Updated Site Features 	|
| Enable/Set/Disable Remember Me 	| Updated Basic Configuration 	|
| Add a Security Question 	| Added a Security Question 	|
| Update No. of Security Questions and Attempt Limit 	| Updated Security Question Render Limit<br><br>Updated Basic Configuration 	|
| Edit a Security Question 	| Updated a Security Question 	|
| Remove a Security Question 	| Removed a Security Question 	|
| Configure RBA Settings,<br>Multi factor Settings or<br>Admin Email 	| Updated Risk Based Auth Settings 	|
| Edit/Reset Default Email Template (RBA) 	| Updated '' Email Template 	|
| Edit/Reset Default SMS Template (RBA) 	| Updated '' SMS Template 	|
| Add/Update/Delete Custom Email Template (RBA) 	| Added `<TEMPLATE ID>` Email Template<br><br>Updated `<TEMPLATE ID>` Email Template<br><br>Removed `<TEMPLATE ID>` Email Template 	|
| Add/Update/Delete Custom SMS Template (RBA) 	| Added `<TEMPLATE ID>` SMS Template<br><br>Updated `<TEMPLATE ID>` SMS Template<br><br>Removed `<TEMPLATE ID>` SMS Template 	|
| Suspicious Email Setting (RBA) 	| Updated User Registration Email Settings 	|
| Suspicious SMS Setting (RBA) 	| Updated User Registration SMS Settings 	|
| Enable/Disable PIN Authentication 	| Updated Couldn't evaluate the activity 	|
| Edit/Reset Default Email Templates (PIN Authentication) 	| Updated '' Email Template 	|
| Edit/Reset Default SMS Templates (PIN Authentication) 	| Updated '' SMS Template 	|
| Add/Update/Delete Custom Email Template (PIN Authentication) 	| Added `<TEMPLATE ID>` Email Template<br><br>Updated `<TEMPLATE ID>` Email Template<br><br>Removed `<TEMPLATE ID>` Email Template 	|
| Add/Update/Delete Custom SMS Template (PIN Authentication) 	| Added `<TEMPLATE ID>` SMS Template<br><br>Updated `<TEMPLATE ID>` SMS Template<br><br>Removed `<TEMPLATE ID>` SMS Template 	|
| Forgot PIN with Email Setting (PIN Authentication) 	| Updated User Registration Email Settings 	|
| Forgot PIN with SMS Setting (PIN Authentication) 	| Updated User Registration SMS Settings 	|
| Reset Primary Secret 	| Reset Primary Secret 	|
| Add/Remove Additional API Secret(s) 	| Added a Secondary Secret<br><br>Removed a Secondary Secret 	|
| Enable MFA 	| Updated Multi-Factor Auth Settings 	|
| Email Passcode Settings(MFA) 	| Updated User Registration Email Settings 	|
| Email Passcode template default edit/update and new template Added/Update/Delete 	| Updated '' Email Template<br><br>Added `<TEMPLATE ID>` Email Template<br><br>Updated `<TEMPLATE ID>` Email Template<br><br>Removed `<TEMPLATE ID>` Email Template 	|
| SMS Passcode Settings(MFA) 	| Updated User Registration SMS Settings 	|
| SMS Passcode template default edit/update and new template added/update/deleted 	| Updated '' SMS Template<br><br>Added `<TEMPLATE ID>` SMS Template<br><br>Updated `<TEMPLATE ID>` SMS Template<br><br>Removed `<TEMPLATE ID>` SMS Template. 	|
| Google Authenticator(MFA)(Enable/Disable) 	| Configured Multi-Factor Auth Google Authenticator Settings 	|
| Security Questions(MFA)(Enable/Disable) 	| Configured Multi-Factor Auth Security Question Settings 	|
| Bot Protection (Emable/Disable) 	| Update Optional Captcha Configuration 	|
| IP Access Restriction(Enable/Disable) 	| Updated Site Features 	|
| IP Access Restriction settings 	| Updated IP Access Control Settings 	|


### Data Governance Audit Logs

| Description | Logs statement |
|---|---|
| Data Center | "Changed Data Storage Region" |
| Create Custom Object | Created 'xyz' Custom Object |
| Update Custom Object | Updated 'xyz' Custom Object Schema |
| Delete Custom Object | Deleted 'xyz' Custom Object |
| Privacy Versioning settings(Enable/Disbale) | Updated Privacy Policy Settings |
| Adding new Privacy version | Configured '<version no.>' Privacy Policy |
| Age Verification | Updated Basic Configuration |
| Consent Management Added | Configured Consent Management |
| Consent Management Removed | Removed Consent Management Configuration |


### Deployment Audit Logs

   | Description | Logs statement |
|---|---|
| Web Apps | Updated <LoginRadius Site Name> site Configuration |
| Generate a new Mobile Apps (SOTT) | Generated SOTT |
| Delete a SOTT | Revoked SOTT |
| Create a Custom Domain | Created Custom Domain Request |
| Delete a Custom Domain | Removed Custom Domain Request |
| Update Progressive Profiling  | Configured 'Profile' Progressive Profiling |
| Delete Progressive Profiling | Deleted ‘Profile’ Progressive Profiling |
| Identity Experience Framework/Theme/Customize | Updated Hosted Registration 'Profile' Page Configuration |
| Identity Experience Framework/Theme/Customize/SAVE | Updated Hosted Registration 'Auth' Page Configuration |
| Identity Experience Framework/Theme/Custom js | Added Hosted Registration 'Auth' Page Custom Resource |
| Identity Experience Framework/JS Widgets | Updated basic configuration |
| Data Migration | Added ‘LR Site Name' Bulk Data Operation Record |


### Integration Audit Logs 

| Description | Logs statement |
|---|---|
| WebHook Added  | WebHook app name <NAME> was configured |
| WebHook Deleted | WebHook app name <NAME> was removed |
| Added Data Export Request | Created Data Export Request |
| Deleted Data Export Request | Removed Data Export Request |
| Added Scheduled Data Export Request | Created Data Export Request |
| Deleted Scheduled Data Export Request | Removed Data Export Request |
