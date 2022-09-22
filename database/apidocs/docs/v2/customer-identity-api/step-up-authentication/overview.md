# Step-Up Authentication Overview

---

As the name implies, the Step-Up Authentication APIs allow you to prompt your customer to pass authentication once again. It's important to note that the Step-Up Authentication APIs do not invalidate the current session. Rather, they are used to challenge the customer to authenticate using the method of your choice, before they can access a protected resource.

## Workflow

All of the Step-Up Authentication APIs have the following pattern:

1. The Customer is already authenticated/logged in with an `access_token`.

2. The Customer wants to access a protected resource on your website e.g. a document.

3. The Customer is prompted to Step-Up Authenticate via the method of your choice.

4. If the Customer passes Step-Up Authentication, they are returned a `secondfactorauthenticationtoken`

5. The `secondfactorauthenticationtoken` is passed back to your back-end where you can validate if the `secondfactorauthenticationtoken` is valid. If it is valid you can proceed in giving access to the requested resource.

**Note:** The workflow may vary if you're performing [PIN Step-Up Authentication](/api/v2/customer-identity-api/step-up-authentication/pin/overview/) or Multi-Factor Step-Up Authentication, please refer to our documentation on each for details.

## Step-Up Authentication using Email Authenticator workflow

1. Consumer will get the MFA setting on the profile for Step-Up Auth using [Step-Up Authentication trigger API](/api/v2/customer-identity-api/step-up-authentication/mfa/step-up-auth-trigger/)

2. If `IsEmailOtpAuthenticatorVerified` is true in response then the you can prompt the consumer to perform Step-Up Authentication by an email from the email list.

3. Consumer will select an email and [GET Send MFA Step-Up Authentication Email OTP by Access Token](/api/v2/customer-identity-api/step-up-authentication/mfa/send-mfa-step-up-auth-email-otp-by-access-token/) API will be called. It will send an OTP on email.

4. Consumer will pass the OTP and will get verify using [PUT MFA Step-Up Authentication by Email OTP](/api/v2/customer-identity-api/step-up-authentication/mfa/mfa-step-up-authentication-by-email-otp/) API
