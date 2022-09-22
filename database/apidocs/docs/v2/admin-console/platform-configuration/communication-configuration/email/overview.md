#Email Workflow Overview

The following diagram illustrates how email-sending works in LoginRadius:

![enter image description here](https://apidocs.lrcontent.com/images/SMTP_Flow_3_244665b69f80261ec05.27196148.png "enter image title here")

1. The customer initiates a login request in the application via LoginRadius' API.
2. LoginRadius retrieves the message content and generates a token. LoginRadius then makes a call to your desired SMTP Service Provider with the message content and generated token to form the email.
3. On success, a response is returned to LoginRadius, which is then relayed to the initiating application. The email containing the message content and token is sent by the SMTP Service Provider back to the customer.
4. The customer clicks the link in the email to trigger the token authorization via LoginRadius' API.
5. The token is authorized by LoginRadius and subsequently returns a success response back to the application.
