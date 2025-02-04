# Passwordless Login Overview

LoginRadius Passwordless Login provides customers with the ability to login to their accounts through an email or mobile device instead of inputting a password. Benefits of using Passwordless Login include the following:

- A Frictionless Experience: Customers will not need to create and maintain a password for their account.
- Enhanced Security: Since Passwordless Login By Phone requires physical access to the customer's mobile device, it is more difficult for an attacker to access the profile.
- Flexible workflows: Create many unique workflows to cater to your customer use cases.
- Save Time: Passwordless Login relieves the customer from the hassle of remembering their password or potentially needing to reset their password in order to log in. This also relieves the burden of any customer-facing departments who assist customers with their accounts.

## Passwordless Login Workflow

1. The customer with an existing account begins the Passwordless Login flow using the [Passwordless Login By Email API](/api/v2/customer-identity-api/passwordless-login/passwordless-login-by-email), [ Passwordless Login By Username API](/api/v2/customer-identity-api/passwordless-login/passwordless-login-by-username)
   or Passwordless Login By Phone.
2. If the Passwordless Login is initiated with a phone or a mobile device, an SMS is sent to the device with a One Time Passcode (OTP). Otherwise, an email is sent to the customer to login via a login link or verification token.
3. The Passwordless Login Phone Verification [API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/passwordless-login-phone-verification) validates the OTP sent to the SMS and returns the standard Login response with a Profile object and an access token.
4. The [Passwordless Login Verification API] validates the verification token sent to the customer's email and returns the standard Login response with a Profile object and an access token.

## Passwordless Login Templates

When initiating a Passwordless Login, based on the selected options, either an email or SMS is sent to the customer attempting to authenticate. Create different templates on the Admin Console to match your use cases. To view your list of templates and to create more, access the Admin Console under Platform Configuration > Passwordless Login and select Passwordless Login with Email in the left-hand side pane.

![enter image description here](https://apidocs.lrcontent.com/images/Passwordless-Login---LoginRadius-User-Dashboard-7_298235e9705c06a3ae5.83954125.png "")
Templates on this page can be sent through the optional template query parameters as part of the API request.
