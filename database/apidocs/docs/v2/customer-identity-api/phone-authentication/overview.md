Phone Authentication Overview
===

The LoginRadius Phone Authentication feature allows customers to register and login via phone number. In addition, Phone Authentication includes phone number verification during registration via a One-Time Password (OTP). Upon verification, users can then log in using their phone number.

![Phone Authentication Flow](https://apidocs.lrcontent.com/images/Phone-Authentication-Workflow_98075cc77db3753d30.55622207.jpg "Phone Authentication Flow")

## Registration by PhoneId

Verified phone numbers are stored on a customer's profile as a [PhoneId](/api/v2/getting-started/data-points-and-response-codes/detailed-data-points). The following APIs are available for Registration with PhoneId.

- [Phone Number Availability](/api/v2/customer-identity-api/phone-authentication/phone-number-availability): Checks whether a phone number is already associated with the PhoneId of an existing customer
- [Phone User Registration by SMS](/api/v2/customer-identity-api/phone-authentication/phone-user-registration-by-sms): Registers new customers by PhoneId, Password and other registration data. This will trigger an OTP to be sent by SMS to verify the PhoneId. You will need to configure your SMS provider settings in the Admin Console to send the SMS
- [Phone Verification by OTP](/api/v2/customer-identity-api/phone-authentication/phone-verify-otp): Validates the OTP sent to verify a customer's PhoneId
- [Phone Resend Verification OTP](/api/v2/customer-identity-api/phone-authentication/phone-resend-otp): Resends the OTP to verify a customer's PhoneId

Once the PhoneId is verified, customers can log in to their account by using their PhoneId and password combination.

##Log in by PhoneId

- [Phone Login](/api/v2/customer-identity-api/phone-authentication/phone-login): Allows existing customers to log in using their PhoneId and password
- [Phone Forgot Password by OTP](/api/v2/customer-identity-api/phone-authentication/phone-forgot-password-by-otp): Sends an OTP to reset a customer's password in case of a forgotten password
- [Phone Reset Password by OTP](/api/v2/customer-identity-api/phone-authentication/phone-reset-password-by-otp): Resets a customer's password
- [Phone Resend Verification OTP API](/api/v2/customer-identity-api/phone-authentication/phone-resend-otp): Resends an OTP.
- [Phone Resend Verification OTP by Token](/api/v2/customer-identity-api/phone-authentication/phone-resend-otp-by-token): Resends an OTP using the access token of the customer

##Other Phone APIs

- [Phone Number Update](/api/v2/customer-identity-api/phone-authentication/phone-number-update): Updates a customer's PhoneId
- [Reset Phone ID Verification](/api/v2/customer-identity-api/phone-authentication/reset-phone-id-verification): Resets the PhoneId verification status of a customer using their access token
- [Remove Phone ID by Access Token](/api/v2/customer-identity-api/phone-authentication/remove-phone-id-by-access-token): Removes the PhoneId of a customer using their access token
- [Phone Verification OTP by Token](/api/v2/customer-identity-api/phone-authentication/phone-verify-otp-by-token): Validates the OTP sent to verify a customer's PhoneId using their access token
- [Phone Resend OTP by Token](/api/v2/customer-identity-api/phone-authentication/phone-resend-otp-by-token): Resends an OTP using a customer's access token

To configure Phone Login settings from the LoginRadius Admin Console, see the instructions [here](/api/v2/admin-console/platform-configuration/phone-login-configuration#phone-login-configuration).
