# Fraud Prevention On The LoginRadius Platform

---

A major part of the Customer Identity and Access Management (cIAM) solution is not just the ability to improve the user’s experience registering and logging into a website, but also to ensure that there's a robust security layer to prevent or block any fraudulent activities.

LoginRadius offers a number of fully configurable and customizable options, built directly into the platform, that are designed to recognize and prevent any suspicious activity at any point in the user registration and log in-related flows. This document goes into detail about all of the security features available, so that you may choose the best options for your online application, whether it be a website, mobile application, gaming console, smart TV, etc.

## High Level Overview

![High Level Overview](https://apidocs.lrcontent.com/images/Fraud-Prevention_274405abd2977070e94.84271615.png "High Level Overview")

### **User Account Verification**

The user verification process allows our customers to validate a provided identity. There are three types of credentials that can be provided and validated.

- **Email Verification:** If the user provides an email then we have two ways to validate.

  - **Email Link:** Our system sends a verification link to the provided email address.

  - **One Time Password:** Our system sends a One Time Password (OTP) to the provided email address, and the user is prompted to enter the given OTP for system validation.

- **Phone Verification:** If the user provides a phone number, we can send a OTP to the user’s provided phone number and the user is then prompted to enter the OTP in the provided interface.
- **Social Profile Verification:** If an email or phone number is provided by a social provider and is indicated as verified, then our system will automatically mark it as verified, otherwise our system will ask the user for the email or phone number and launch the verification process.

### **Block Fraudulent Domains**

Our system can prevent fraudulent email domains using the methods listed below:

- **Block Spam Email Domains:** We provide our customers with the ability to blacklist or whitelist domains. This allows for blocking out known fraudulent or undesired domains or ensuring that a good domain will never be blocked.

- **Block Disposable Email Domains:** We provide the option to disable registration from all disposable email services such as Mailinator or mail7.io.
- **Business Email Registration Only:** If you want to only allow registration from business/company emails in your system, we have the option to prevent registration from non-business email providers.

### **Password Management**

As passwords are critical when managing identities, we have various features to ensure the security of passwords stored in our system.

- **Dictionary Attack Prevention:** It is common for users to set meaningful passwords and attackers take advantage of this. As a solution we provide the option to disable dictionary words as a password.
- **Profile Fields Password Validation:** Many users set passwords based on identifiable information that can be found in their profile, such as first name or last name etc., and attackers take advantage of this. As a solution we provide the option to disable the use of profile data as a password.
- **Password Policy:** Our system provides the ability to set a password policy to ensure your users setup secure passwords.
- **Complexity Management:** We provide customizable options to make password selection more secured based on length, symbols, and upper/lower case.

- **Complexity Meter:** When enabled, a password complexity meter is displayed during registration that shows the strength of the entered password.
- **Complexity Change Indicator:** When your password policy changes, we can notify existing users about their non-compliant password the next time they log in and prompt them to update it.
- **Password Hashing:** LoginRadius always stores passwords using one-way hashing for maxium security and compliance, this means that anyone who can access the data will not able to view passwords. We use the latest industry standard algorithms for password hashing, please see our[ Cryptographic Hashing Algorithms](/security/platform-security/cryptographic-hashing-algorithms/) document for more details .

  - **Hashing Algorithm Updates:** We provide a mechanism to update the password hashing algorithm without requiring a password reset. This ensures our customer’s passwords are secured with the latest encryption standards.

  - **Multiple Hashing Algorithms:** We support the use of multiple password hashing algorithms per customer account. This allows our customers to migrate data from multiple data sources and keep the existing hashing algorithm from each system.

- **Brute Force Lockout:** To prevent this common technique used for cracking weak passwords, we lock out accounts after a specified number of failed attempts and provide a way for the users to validate themselves for unlocking.

  - **Enforce by Captcha:** We prompt the user with a captcha after a specified number of failed attempts.

  - **Enforce by Security Questions:** We prompt security questions after a specified number of failed attempts, and the user is required to answer them correctly to validate that they are the genuine account owner.

  - **Suspend Account:** We automatically suspend the user for a specified time period after a specified number of failed attempts.

  - **Block Account:** We block the user after a specified number of failed attempts, and only the configured administrators can unblock the blocked account.

- **Password Expiration:** The user's password will expire after the specified time period, and the user will be prompted to reset it during the specified grace period or on their next log in after expiration.
- **Password History:** We restrict the usage of a specified number of previously used passwords.

- **Delete Existing Sessions on Password Reset:** When a user does a password reset on one device, all of their existing log in sessions get purged.
- **Password Reset:** If a user forgets their password, we have three options for them to securely reset it:

  - **Security Question Password Reset:** This option allows the user to reset their password by answering a security question. We store security answers in a hashed format to make it impossible to retrieve answers for those who have access to the database.

  - **OTP Password Reset:** If a user is registered with a phone number, we can allow them to reset their password using a One Time Password (OTP).

  - **Email Password Reset:** If a user is registered with an email then we have two available flows for a password reset:

    - **Email Link:** The user clicks on a link and then sets their new password.

    - **Email OTP:** The user receives a One Time Password (OTP) via email, which can then be entered in the provided password reset interface.

- **Password Reset Success Notification:** If this option is enabled, our system will send password reset notifications:

  - **Notification**

    - **Email:** Sends notifications via email.

    - **SMS:** Sends notifications through SMS.

- **Risk Factors:** Parameter on which we detect risk, each parameter listed below can be configured for risk identification.

  - IP
  - City
  - Country
  - Browser
  - Device

- **Risk Action:** Once a risk factor has been detected by LoginRadius, the below actions can be triggered to prompt the user to validate their identity.

  - **Alert to Admin:** sends an alert to the specified admininistrator.

    - **Email:** sends alert to the administrator's email address.

  - **Alert to User:** sends an alert to the user.

    - **Email:** sends alert to the user’s email address.

  - **Multi-Factor Authentication (MFA):** Require the user to validate via Multi-Factor.

    - **SMS:** The is sent an OTP via SMS and needs to enter it in a given interface.

    - **Google Authenticator:** The user needs to provide the OTP shown in the Google Authenticator app.

    - **Security Questions:** The user needs to correctly answer their configured security questions.

- **Block:** User gets blocked if this action is specified and only an administrator can unblock the user.

### **Multi-Factor Authentication**

This method of authentication is used to prevent access by an unauthorized person. If enabled, the user first needs to provide their user credentials, and after successful validation, they need to provide secondary credentials in the form of a One Time Password (OTP) obtained via SMS or via the Google Authenticator app.

- **Google Authenticator:** The Google Authenticator app generates OTPs and expires them after 30 seconds. The user can type the displayed OTP into a given interface for validation. With this method there's no need to wait for an SMS. LoginRadius also offers it's customers the ability to use a custom Google Authenticator app (as opposed to the one provided by Google) for branding purposes.

- **SMS:** The user is sent a OTP (One Time Password) via SMS and needs to enter it in a given interface for verification.

### **Policy-based Step-Up Authentication**

This is used when the application needs to step-up authenticate a user to perform some critical action or event such as: deleting an account, or access a particular resource, performing high value transactions, etc.

There are two ways to achieve this:

- **Password:** The user is prompted to re-enter their password before they can proceed.
- **MFA:** The user is required to validate via Multi-Factor Authentication before proceding. We support the following two MFA processes:

  - SMS
  - Google Authenticator
