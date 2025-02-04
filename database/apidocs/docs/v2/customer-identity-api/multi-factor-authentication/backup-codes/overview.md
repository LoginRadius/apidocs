#Backup Codes

Backup Codes are commonly used in MFA workflows, you can use them to allow you your customers to have a recourse in case they can't provide their second factor e.g. The customer's phone is broken and the customer can't use it for SMS as a second factor, in this case the customer would be able to provide one of the backup codes that was generated in the past. See below for a typical Backup Code workflow.


1. The Customer completes an MFA login.

2. The Customer is provided the option to generate Backup Codes in case they can't provide a second factor. They can be generated with either [MFA Backup Code by Access Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/mfa-backup-code-by-access-token) or [MFA Backup Code by UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/mfa-backup-code-by-uid).

3. The Customer's phone is broken and they can't complete the MFA login as they don't have the device required for the second factor. In this case they can use 1 of the Backup Codes that was previously generated, each code is only valid once. The code to be used can be provided passed to the [MFA Validate Backup code](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/mfa-validate-backup-code) Endpoint. Once this is complete the customer is logged in.

4. Should you want to provide a way for your customers to reset the Backup Codes you can use either [MFA Reset Backup Code by Access Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/mfa-reset-backup-code-by-access-token) or [MFA Reset Backup Code by UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/backup-codes/mfa-reset-backup-code-by-uid).

