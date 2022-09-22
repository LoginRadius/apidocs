# Data Auditing and Logging
 
LoginRadius platform produces extensive logging for every interaction happening between end-users and LoginRadius applications as well as the internal team activity. This document will be guiding you through all the audits and loggings that LoginRadius do in order to capture different types of activity logs.

## Types of Logs

### Team Management Audit Trails

The team audit trail keeps track of records for all recent account activities. In order to take a detailed look, you can navigate through LoginRadius [**Admin Console > Account > Team > Audit Logs**](https://adminconsole.loginradius.com/account/team/audit-logs).The [Audit Log](/api/v2/admin-console/team-management/audit-logs/#audit-logs) shows the description of actions taken by the Team Members, the time of occurrence and name of the  Team Members.


### User Audit Trails

Under User Audit Trail, our system monitors the end-user activities such as profile edit, account delete, password resets, and more which can further be used in order to track your customer engagement and gain an in-depth understanding of your user base.

**User Audit Trail will have the following features:**

- Data compliance
  - The data storage of audit log storage is in the same region where the primary data is hosted
  - Audit log data 
  - Audit log data can be filtered on data points
  - Audit log data is encrypted  at rest and in transit
- Retention policy
  - The default retention policy is 30 days


**List of User Audit Logs:**

- All LoginRadius API CRUD
- Social Provider APIs logs: Storing logs on failures from the social provider API’s
- Email Providers logs
  - Storing Errors relating to failed email delivery.
  - We have integrations available for SMTP providers such as Sendgrid, Mandrill, etc.
- SMS Providers logs
- Third-Party Integrations API logs
  - Storing third-party integrations API errors.
- Webhook API logs
  - Storing webhook endpoint failures errors.

### Consumer Audit Log


The LoginRadius identity platform offers a consumer audit log that automatically syncs the actionable API logs to your Audit Management/SIEM tools, e.g., Sumologs, Splunk, etc., in real-time. This provides granular insights into an API Level - who, when, and how the API calls are made to the LoginRadius system. You can use this information to prevent any malicious attempt on your application as well track your consumers’ activities to personalize their experience. Please see the [Consumer Audit Log](/security/data-management/consumer-audit-log/) document for more information and its use cases.


