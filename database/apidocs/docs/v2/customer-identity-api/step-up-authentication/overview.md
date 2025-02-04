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

**Note:** The workflow may vary if you're performing [PIN Step-Up Authentication](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/pin/overview/) or Multi-Factor Step-Up Authentication, please refer to our documentation on each for details.

## Step-Up Authentication using Email Authenticator workflow

1. Consumer will get the MFA setting on the profile for Step-Up Auth using [Step-Up Authentication trigger API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/mfa/step-up-auth-trigger/)

2. If `IsEmailOtpAuthenticatorVerified` is true in response then the you can prompt the consumer to perform Step-Up Authentication by an email from the email list.

3. Consumer will select an email and [GET Send MFA Step-Up Authentication Email OTP by Access Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/mfa/send-mfa-step-up-auth-email-otp-by-access-token/) API will be called. It will send an OTP on email.

4. Consumer will pass the OTP and will get verify using [PUT MFA Step-Up Authentication by Email OTP](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/mfa/mfa-step-up-authentication-by-email-otp/) API

## Step-Up Authentication by Email OTP (without MFA)

This section describes the extended functionality of Step-Up Authentication using Email OTP, allowing authentication without MFA (Multi-Factor Authentication) being enabled.

### Overview

The Step-Up Authentication by Email OTP feature enables re-authentication of a user after they have logged in. This can now be performed without requiring MFA to be enabled.

### Process Flow

1. **Login & Access Token Retrieval:** The user logs in using their standard credentials, and an access token is obtained upon successful login.

2. **Send OTP to User:** The OTP process is initiated by providing the necessary parameters, including the user's email ID. The [Send Email OTP for Step Up Authentication](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/send-email-otp-for-step-up-auth-without-mfa/) API sends an OTP to the provided email address.

3. **OTP Verification:** The user provides the OTP, which is leveraged in the [Verify Email OTP for Step Up Authentication](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/verify-email-otp-for-step-up-auth-without-mfa/) API. Upon successful verification, a SecondFactorToken is received in the API response.

4. **Verify SecondFactorToken:** The SecondFactorToken is then verified to proceed with further actions, ensuring a successful authentication.

This extended functionality allows secure authentication via Email OTP even when MFA is not enabled, ensuring flexible re-authentication options for various use cases.