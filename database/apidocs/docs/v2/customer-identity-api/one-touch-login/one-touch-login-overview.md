One-Touch Login Overview
=====

The [One-Touch Login](/platform-features-overview/registration-services/one-touch-login) set of APIs does not require customers to provide a password at registration and/or login, which makes it useful when the authentication of the customer is given priority. The One-Touch Login APIs can be used to query whether the customer has clicked on the verification link or entered their one time passcode (OTP). This approach can be defined as a modern way of authentication, as it is much faster and easy-to-use for the customer. While there is a variety of use cases for this type of authentication workflow, it is most common among IoT devices, Smart TV apps, and Smart Phone apps.

**Note:** If you're using LoginRadiusV2.js to implement One-Touch Login, please see our [Advanced JS Customizations](/api/v2/deployment/js-libraries/advanced-js-customizations).

## One-Touch Login Workflow

While this module is similar to Smart Login, One-Touch Login does not require the customer to be an existing customer in the system. For this approach, customers register and/or log in with the help of a generated link sent to their email address or a one time passcode sent to their phones. 

### **One-Touch Login by Email**

1. The customer logs in a website or mobile app via [One-Touch Login by Email](/api/v2/customer-identity-api/one-touch-login/one-touch-login-by-email-captcha).
<br>
**Note:** One-Touch Login by Email API requires that you generate a GUID to identify the Login attempt.

2. As soon as the customer sends a request to log in, [One-Touch Login Ping](/api/v2/customer-identity-api/one-touch-login/one-touch-login-ping) will begin pinging the LoginRadius API for valid email verification and passing the generated GUID. One-Touch Login Ping should return error code "1139" if the login link has not been clicked.

3. One-Touch Login by Email API triggers the email verification process, so a verification token is generated and included inside the login link via query parameters. This login link will be sent over to the customer via email. [One-Touch Email Verification](/api/v2/customer-identity-api/one-touch-login/one-touch-email-verification) API is used to verify the provided token.

4. If the LoginRadius API finds that the token is valid, the API will change the status of this login attempt.
 
5. When the website or mobile app pings again via the [One-Touch Login Ping](/api/v2/customer-identity-api/one-touch-login/one-touch-login-ping) for a successful authentication by passing in the generated GUID, the customer will be able to successfully log in.

### **One-Touch Login by Phone**

1. The customer logs in a website or mobile app via the [One-Touch Login by Phone](/api/v2/customer-identity-api/one-touch-login/one-touch-login-by-phone-captcha).
 
2. One-Touch Login by Phone API triggers an OPT verification process. An OPT is generated and sent to the customer via SMS. [One-Touch Verify OTP](/api/v2/one-touch/one-touch-verify-otp) API is used to verify the provided token for One-Touch Login.

3. Upon the successful verification of the token, the customer can log in.
<br>
**Note:** This process is similar to the Passwordless Login by Phone flow.
