#Global Email Settings

We provide some standard configuration settings that you can use to customize some of the behaviors for sending emails. This section covers how to customize these settings. 

Navigate to your LoginRadius [Admin Console ➔ Platform Configuration ➔ Identity Workflow  ➔ Communication Configuration](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/email-configuration), and select "Global Email Settings" from left navigation pannel. Follow the below steps to update your email workflow settings:

- REQUEST LIMIT- The Request Limit is the number of times a user can request a given email during the request period (in minutes) before this feature is temporarily disabled. For example, a user can only request this email 5 times (Request Limit) over the course of 120 minutes (Request Period) before the feature is disabled.
- REQUEST AND DISABLED PERIOD- The amount of time (in minutes) that the given email request feature remains disabled for the user once they have reached their Request Limit.
- VALIDITY LIMIT- The amount of time (in minutes) for which the link included in the given email is valid.

Note that these settings are global and are applied to all your transactional emails. You can further customize settings for individual transactional emails by navigating to Admin Console -> Platform Configuration -> Authentication Configuration -> Standard Login -> Email Templates and clicking on Email Verification Settings to expand it.  

