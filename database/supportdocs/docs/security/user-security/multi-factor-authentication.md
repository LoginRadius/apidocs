# Multi-Factor Authentication

## What is Multi-Factor Authentication?

Multi-Factor Authentication, or MFA, is a multi-step verification process that provides an extra layer of security for the consumers' accounts.

![enter image description here](https://apidocs.lrcontent.com/images/2factor-authentication-1_148485b58f41a6731b7.07692532.png "enter image title here")

## How Does It Work?

 With MFA, once the consumer enter in their login credentials or select a social login, they are sent a specific authentication code that they have to enter in order to be fully logged in. There are several ways in which the consumer can receive the code:

1. <b>Text Message (SMS)</b> - After the consumer enters in their login credentials, whether it is via email, phone number, username, or social profile, the consumer receives an instant text message with a unique authentication code. Once the consumer receives the code, they are required to enter it into the provided field on your website interface in order to log in to their account.
2. <b>Google Authenticator</b> - This requires the consumer to have the Google Authenticator application downloaded to their mobile device. With this app, it will auto-generate an authentication code that the consumer will have to enter after they've provided their login credentials.
3. <b>Email Passcode</b> - The consumer will receive an email with a verification code that they will need to enter (after they have entered in their usual login credentials) to finish the login process and be fully logged into the website.
4. <b>Security Questions</b> - Consumers can also authenticate themselves using a set of security question which they can set at the time of registration. On the next login attempt of consumer, these security questions will act as second layer of security. Only after giving correct answers of the questions, consumer will be logged in.

## Why is Multi-Factor Authentication Useful?

Multi-Factor authentication is a useful security tool to ensure that it is the correct consumer logging into the account and that the account has not been compromised. This feature is especially appealing for websites and companies that handle sensitive consumer data, such as personal details and credit card information. As well, in the case that an unauthorized consumer has obtained the login credentials to an account, they will still be unable to log in due to the additional measures required in order to obtain account access.

### Example Use Case

For instance, a smart home management application contains sensitive personal information and access to a home's security system. Therefore, Multi-Factor authentication is used as an enhanced security measure to safeguard the information and make sure that it is the authorized consumer who is logging into the account. In this case, once the consumer opens the app and enters their login credentials, they will be redirected to a page where they are required to enter a unique code in order to be logged in. This unique one-time code is instantly sent to the consumer via text message or SMS, and oftentimes these codes will have an expiration time. The consumer will enter the code given, after which they will be fully logged in with full access to their home management account. If for any reason an unauthorized person is trying to log in with the same credentials, they will still be unable to access the account and the personal details within as it is unlikely that they will also have access to the account holder's phone or text messages,
