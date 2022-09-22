Smart Login Overview
======
------

The LoginRadius [Smart Login](/platform-features-overview/registration-services/smart-login) set of APIs that do not require a password to login and are designed to help you delegate the authentication process to a different device. This type of Authentication workflow while not limited to, is common among Smart TV apps, Smart Phone Apps and IoT devices.

What makes the Smart Login APIs unique to other flows that don't require a password to login is it's [Smart Login Ping API](/api/v2/user-registration/smart-login-ping) which can be used on to query as to wether the customer has clicked the verification link.

**Note:** If you're using LoginRadiusV2.js to implement Smart Login, please see our [Advanced JS Customizations](/api/v2/user-registration/advanced-js-customizations#smartloginfeature20) document. 

## Smart Login Workflow

There are different process flows that can be implemented with the [Smart Login](/platform-features-overview/registration-services/smart-login) set of APIs. This section goes over different implementations that can be achieved.

![Smart Login Flow](https://apidocs.lrcontent.com/images/Smart-Login-flow---Page-1-10_51285b4fb570bf2fb5.89855619.png "smart login flow")

1. The customer requests to login on the Smart device this is done via either the [Smart Login By Email API](/api/v2/user-registration/smart-login-by-email) or the [Smart Login By Username API](/api/v2/user-registration/smart-login-by-username). 
 		
   **Note:** Both APIs require that you generate a GUID to identify the Login attempt.

2. As soon as the customer requests to login, begin pinging the LoginRadius API for a valid email verification by using the [Smart Login Ping API](/api/v2/user-registration/smart-login-ping) and passing in the generated GUID. The Smart Login API should return Error code "1139" to notify that the login link has not been clicked.

3. The [Smart Login By Email API](/api/v2/user-registration/smart-login-by-email) or the [Smart Login By Username API](/api/v2/user-registration/smart-login-by-username) triggers an Email Verification process, a Verification Token is generated and included inside of a Login Link via query parameters, which is sent over to the customer via an email.

4. Once the Customer receives and clicks the Login Link in the email, they will land on your [LoginRadius Identity Experience Framework](/api/v2/user-registration/hosted-registration).

5. The [LoginRadius Identity Experience Framework ](/api/v2/user-registration/hosted-registration) automatically calls the [Smart Login Verify Token API](/api/v2/user-registration/smart-login-verify-token) and passes the Verification Token obtained from the Login Link's query parameters.

   **Note:** The [LoginRadius Identity Experience Framework](/api/v2/user-registration/hosted-registration) is configured as the Login Link by default, you can configure your own page as the Login Link URL via the Smart Login [Email Template](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/advance-login-methods/smart-login).

6. The LoginRadius API validates that the token is valid, if the token is valid, the API will change the status associated to this login attempt.

7. As the Smart device pings again via the [Smart Login Ping API](/api/v2/user-registration/smart-login-ping) for a successful authentication (by passing in the generated GUID), The customer is succesfully logged in via the [Smart Login Ping API](/api/v2/user-registration/smart-login-ping) on the Smart device.

