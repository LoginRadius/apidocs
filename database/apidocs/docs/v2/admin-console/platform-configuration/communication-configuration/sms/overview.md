# SMS Workflow Overview

The following diagram illustrates how SMS message sending works in LoginRadius:

![enter image description here](https://apidocs.lrcontent.com/images/SMS_Flow_3_204885b69f48bc781e1.51710453.png "enter image title here")

1. The customer initiates a login request in the application via LoginRadius' API.
2. LoginRadius retrieves the message content and generates the [OTP code](/infrastructure-and-security/loginradius-tokens#phone-otp-one-time-password-). LoginRadius then makes a call to your desired SMS Service Provider with the message content and generated OTP code to form the SMS message.
3. On success, a response is returned to LoginRadius, which is then relayed to the initiating application. The SMS message containing the message content and OTP code is sent by the SMS Service Provider back to the customer.
4. The customer enters the OTP code via LoginRadius' API.
5. The OTP code is authorized by LoginRadius and subsequently returns a success response back to the application.

