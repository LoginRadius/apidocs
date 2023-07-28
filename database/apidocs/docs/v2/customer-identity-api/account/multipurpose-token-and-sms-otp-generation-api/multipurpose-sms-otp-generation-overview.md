# Multipurpose SMS OTP Generation API Guide

This comprehensive guide will provide all the necessary information and instructions to effectively utilize the [**Multipurpose OTP Generation API**](/api/v2/customer-identity-api/account/multipurpose-token-and-sms-otp-generation-api/multipurpose-sms-otp-generation/) that allows you to generate OTPs (One-Time Passwords) for various SMS-based scenarios. To generate OTPs for different use cases, specify the "smsotptype" parameter in the URL.

Possible SMS OTP Types:

- **Add phone:** Generate a token or OTP to add and verify a new phone number to a user's account.
- **Phone id Verification:** Generate a token or OTP to verify the authenticity and validity of a phone ID or phone number.
- **Forgot password:** Generate a token or OTP that enables users to reset their password if they have forgotten it.
- **Forgot Pin:** Generate a token or OTP to reset a user's PIN if it has been forgotten.
- **OneTouch Login:** Generate a token or OTP that allows users to log in to their account with a single touch or click, offering a seamless login experience.
- **Smart Login:** Generate a token or OTP for implementing smart login functionality, enhancing the login process with intelligent and adaptive features.
- **Passwordless Login:** Generate a token or OTP that enables users to log in to their account without needing a traditional password, enhancing security and convenience.

> **Note:** If the **SMS OTP** type is incorrect, then it throws an error of **"ErrorCode":** **1182,** **"Message":** **"You have entered an invalid sms otp type”.**

For detailed instructions on how to utilize each token type, refer below:

### Add Phone OTP

To add and verify a new phone ID using OTP, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"addphone".**
2. In the body of the request, include the following information:
 - Phone: The new phone number you want to add and verify.
 - Uid: The user ID associated with the account.

Body Example:
```
{ 
    "Phone": "xxxxxxxxxxx", 
    "Uid": "<Uid>"
}
```

### Phone ID Verification OTP

To generate an OTP for phone ID verification, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"phoneverification".**
2. In the request's body, include the Phone number you want to verify.

Body Example:
```
{
    "Phone": "xxxxxxxxxxx"
}
```

### Forgot Password OTP

To generate an OTP for password reset, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"forgotpassword".**
2. In the body of the request, include the Phone number associated with the account.

Body Example:
```
{
    "Phone": "xxxxxxxxxxx"
}
```

### Forgot Pin OTP

To generate an OTP for PIN reset, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"forgotpin".**
2. In the body of the request, include the Phone number associated with the account.

Body Example:
```
{
    "Phone": "xxxxxxxxxxx"
}
```

### One-Touch Login OTP

To generate an OTP for one-touch login, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"onetouchlogin".**
2. In the body of the request, include the Phone number associated with the account.

Body Example:
```
{ 
    "Phone": "xxxxxxxxxxx"
}
```

### Smart Login OTP

To generate an OTP for smart login, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"smartlogin".**
2.In the body of the request, include the Phone number associated with the account.

Body Example:
```
{ 
    "Phone": "xxxxxxxxxxx"
}
```

### Passwordless Login OTP

To generate an OTP for passwordless login, follow these steps:

1. Include the **"smsotptype"** parameter in the URL and set its value as **"passwordlesslogin".**
2. In the body of the request, include the Phone number associated with the account.

Body Example:
```
{ 
    "Phone": "xxxxxxxxxxx"
}
```
















