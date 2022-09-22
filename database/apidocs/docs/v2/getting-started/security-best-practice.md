#Security Best Practice

##Overview

LoginRadius is the cornerstone for satisfying customer compliance and business needs. Our LoginRadius security team is continually reviewing and adhering to the latest security and privacy compliances with the relevant regulatory bodies, but there are some main “security best practices” customers should follow to ensure that they do not share/expose any confidential information directly or indirectly, as it can lead to a major security breach. We have documented some topics below to ensure the best protection against cyber attacks and human error.

- Accessing the Admin Console

- Using API Secret

- Calling the LoginRadius API

- Custom Fields and Custom Objects

- SSL Verification

- Multi-Factor Authentication


##Accessing the Admin Console

The LoginRadius Admin Console allows you to secure your platform by assigning roles and access permissions according to your team member’s role in the company. It is important to first identify the required access permissions specific to each team member and then assign the appropriate role to minimize accidental or malicious security breaches. 

For example, a marketing team member does not need access to the API feature, and it is for the best, as it will prevent unauthorized changes to the platform that may potentially breach the security of your web applications. For more details about the roles and permissions of team members, you can refer to the [Team Management document](https://www.loginradius.com/docs/api/v2/admin-console/team-management/manage-team-members).

##Using API Secret

LoginRadius’s API secret is a uniquely generated key which provides access to the Account API. In turn, the Account API provides powerful management capabilities and with it, one can update and manipulate the entire user database, bypass standard workflows, and make direct changes to one's data. LoginRadius will never ask you to share your API secret with us and recommend the following best practices to secure your platform:

- We strongly recommend against sharing API secrets among unauthorized entities. Since API secret has management capabilities, it is deemed a high-security risk to share it.

- For cases where multiple team members need access to your API secret, we recommend that you leverage our Additional API Secret(s) feature. For more details, refer to this [document](https://www.loginradius.com/docs/api/v2/admin-console/deployment/api-key-and-secret#additionalapisecrets2).

- If your API secret is been mistakenly shared with an unauthorized entity, we highly recommend an immediate reset of the API secret. On how to reset the API secret, refer to this [document](https://www.loginradius.com/docs/api/v2/admin-console/deployment/api-key-and-secret#resettingyourapisecret1).

##Calling LoginRadius API


We strongly recommend against the use of illegitimate **third-party applications to call LoginRadius APIs**, as your usage of your API secret on these platforms can potentially result in a security breach. Additionally, such applications may be storing your API credentials and using them secretly in an unauthorized manner that may harm your web applications. 

###Account API

To ensure the security of the API secret, it is recommended that only the account owner access the Account API. For other teammates requiring API access, the Authentication API, which does not require an API secret, should be used.

###Logging

When creating logs for activity results, LoginRadius advises against storing passwords, session tokens, API secrets and other confidential information in logs. If required, it is best practice to store them in hashed form.

###Querying

Passwords, session tokens, API secrets and other confidential information should not appear in the URL, as this can be captured in web server logs and exploited.

##Custom Fields and Custom Objects

Security best practices recommend against storing any confidential information in custom fields or custom objects. Since custom fields and custom objects are used to store multiple data types, including account information and credit card details, sensitive data must be handled carefully. You can store this data in encrypted/hashed forms or leverage the field-level encryption feature. Contact <a href = https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket target=_blank> LoginRadius Support Team</a> for more information on field-level encryption.

##SSL Verification

To prevent man-in-the middle style attacks, SSL must be enabled on all web properties interacting with LoginRadius. For more information, see our Announcements page [here](https://www.loginradius.com/docs/api/v2/announcements/infrastructure-and-api-security).

##Multi-Factor Authentication

Multi-Factor Authentication, or MFA, is a multi-step verification process that provides an extra layer of security for the users' accounts. LoginRadius recommends to use MFA so that when a user tries to login an authentication code will be sent and user needs to type that code in order to log in. There are several ways in which the user can receive the code, including SMS, Google Authenticator app or email.For more details, refer to this [document](https://www.loginradius.com/docs/api/v2/admin-console/platform-security/multi-factor-auth/).
