# Multipurpose Email Token Generation API Guide


This comprehensive document will provide you with all the necessary information and instructions to effectively utilize the [**Multipurpose Token Generation API**](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/multipurpose-token-and-sms-otp-generation-api/multipurpose-email-token-generation/) in your applications. This API offers a versatile solution for generating various types of tokens to support different usecases and functionalities.

The following are the possible token types that can be used:


- **Email Verification:** This token type is used for verifying the authenticity of an email address provided by a user during registration or account setup.


- **Add Email:** By using this token type, you can generate a token for adding a new email address to a user's existing account.


- **Forgot Password:** When a user forgets their password, this token type enables the generation of a token to initiate the password reset process.


- **Delete User:** This token type allows you to generate a token for securely deleting a user's account.


- **Passwordless Login:** With this token type, you can generate a token that enables passwordless login for users, eliminating the need for a traditional password.


- **Forgot PIN:** In scenarios where users have forgotten their PIN, this token type facilitates generating a token for initiating the PIN reset process.


- **One-Touch Login:** By using this token type, you can generate a token that enables seamless and convenient login with just a single touch or click.


- **Autologin:** This token type is used to generate a token for automatic login, allowing users to access their accounts without explicitly entering their credentials.


For detailed instructions on how to utilize each token type,refer below:

### Generating an Email Verification Token

To generate an **Email Verification Token or OTP** for verifying your existing unverified email, you can utilize the Email Verification Token functionality provided by our APIs. Follow the instructions below to generate the token:

1. Include the **"tokentype"** parameter in the URL and set its value as **"emailverification"**. This parameter specifies the type of token you want to generate.

2. In the body of the request, include the email address for which you wish to generate the verification token. This email should be provided as a JSON object with the key "email" and the corresponding value.

Body Example:
```
{
"email": "example@example.com"
}
```

### Add Email Verification Token

To generate an **Add Email Verification token or OTP** for adding and verifying a new email, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"addemail"**.

2. In the body of the request, include the following information:
  - **Email:** The new email address you want to add and verify.
  - **Type:** The type of email (e.g., Primary, Secondary).
  - **UID:** The user ID associated with the account.

Body Example:
```
{ 
 "email": "example@example.com",
 "type": "Secondary", 
 "uid": "<UID>" 
}
```

### Forgot Password Token

To generate a **Forgot Password token or OTP** for resetting your password, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"forgotpassword"**.

2. In the body of the request, include either the email or username associated with the account for which the password reset is requested.

Body Example:
```
{ 
"email": "example@example.com"
}
```

### Delete User Token

To generate a **Delete User token or OTP** for deleting a user account, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"deleteuser"**.

2. In the body of the request, include the UID (user ID) associated with the account you want to delete.

Body Example:
```
{
 "uid": "<UID>" 
}
```

### Passwordless Login Token

To generate a **Passwordless Login token or OTP** for seamless login, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"passwordlesslogin"**.

2. In the body of the request, include either the email or username associated with the account you want to login to.

Body Example:
```
{ 
"email": "example@example.com"
}
```

### Forgot Pin Token

To generate a **Forgot Pin token or OTP** for resetting the PIN associated with an email, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"forgotpin"**.

2. In the body of the request, include the Email associated with the account for which the PIN reset is requested.

Body Example:
```
{ 
"email": "example@example.com"
}
```

### OneTouch Login Token

To generate a **OneTouch Login token or OTP** for easy login, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"onetouchlogin"**.

2. In the body of the request, include the email and ClientGuid associated with the account.

Body Example:
```
{ 
"email": "example@example.com",
 "ClientGuid": ""
}
```

### Auto Login Token

To generate an **Auto Login token or OTP** for automated login, follow these steps:

1. Include the **"tokentype"** parameter in the URL and set its value as **"autologin"**.

2. In the body of the request, include the email or username and ClientGuid associated with the account you want to automatically log in to.

Body Example:
```
{ 
"email": "example@example.com",
 "ClientGuid": ""
}
```

> **Note:**  If you prefer to generate an **OTP (One-Time Password)** instead of a **token**, ensure that the [**OTP Email Verification**](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/verification-workflow/email-workflow) feature is enabled in the Admin Console.




