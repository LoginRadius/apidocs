## PIN Step-Up Authentication

The Step-Up Authentication APIs were designed to help challenge the customer to go through Step-Up Authentication whenever required. In the case of PIN Step-Up Authentication, the customers are asked for the PIN configured on their account in order to pass Step-Up Authentication (as opposed to re-providing their password).

**Note:** We recommend reading our [PIN Authentication](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/pin-authentication/overview/) document for details on how PINs are handled in LoginRadius. [PIN Login](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/pin-authentication/overview/#pinlogin1) does not need to be enabled for PIN Step-Up Authentication to be used in your environment.

The flow is as follows:

1. A customer will first have to Authenticate using their password and will receive an `access_token`. **Note:** The `session_token` commonly used in the PIN Login flow is not useful for this flow.

2. The customer navigates around the site and you choose that to access a certain resource they must Step-Up Authenticate by providing a PIN.

3. The customer provides the PIN and it is sent to the [Step-Up Authenticate By PIN](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/pin/step-up-auth-by-pin/) which returns a `secondFactorValidationToken`.

4. The `secondFactorValidationToken` is passed to your back-end where you use the [Step-Up Auth Validate PIN API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/step-up-authentication/pin/step-up-auth-validate-pin/) to validate the `secondFactorValidationToken`, if the token is valid, you can choose to allow the customer to proceed.

The below chart goes over the logical flow of the PIN Step-Up Authentication process :

![Pin Step-Up Authentication Process](https://apidocs.lrcontent.com/images/PIN-Step-Up-Authentication-Process-Gurjyot-Singh_21508612c97d491d9a0.72801897.png "Pin Step-Up Authentication Process")
