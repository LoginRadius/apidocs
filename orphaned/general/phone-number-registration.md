---
title: "Phone Login/Registration"
excerpt: ""
---

```:api-header
{
  "type": "basic",
  "title": "Overview"
}
```

With the rising usage of smart phones and mobile devices many companies are opting to forgo traditional methods of registering a user and allowing their users to register though their phone number. The phone number replaces the unique identifier or the user which, in the past was commonly set to the email address. This simplifies the process for mobile users and allows them to easily access content directly from there mobile device without need for external email providers. LoginRadius has the option to allow your users to ​register through their phone numbers.

```:api-header
{
  "type": "basic",
  "title": "Flow Chart"
}
```

Registration Flow

```:image
{
  "images": [
    {
      "image": [
        "https://files.readme.io/132355e-image03.png",
        "image03.png",
        1812,
        1070,
        "#98aea8"
      ]
    }
  ]
}
```

Login Flow

```:image
{
  "images": [
    {
      "image": [
        "https://files.readme.io/e73adf2-image01.png",
        "image01.png",
        1276,
        629,
        "#8db8bd"
      ]
    }
  ]
}
```

Change Phone No

```:image
{
  "images": [
    {
      "image": [
        "https://files.readme.io/9249d83-image04.png",
        "image04.png",
        1364,
        519,
        "#97b7b3"
      ]
    }
  ]
}
```

Forgot Password

```:image
{
  "images": [
    {
      "image": [
        "https://files.readme.io/fd3bbc1-image02.png",
        "image02.png",
        1448,
        659,
        "#96b6b5"
      ]
    }
  ]
}
```

**Note **: If the phone number login option is enabled then phone number would be the ​primary unique field for user profile and email id will be just another normal field, meaning duplication of emails is possible.

```:api-header
{
  "type": "basic",
  "title": "Technical Flow"
}
```

If phone number login is enabled then it will ask for a phone number on any new registration, this will be displayed on the registration form as a required parameter. If the phone number is included in the social profile data then it will show the phone number already filled in a textbox, the user can change this number.

After submitting the form we will send One Time Password(OTP) for phone number verification to the included phone number, the user has to enter the OTP for account verification. User can then log in by phone number.

Account linking also works on the phone number, in cases where the same phone number exists in another profile, and this phone number has been verified by the social provider, then the new profile will be linked automatically with old profile after phone number verification. Users can also manually link there accounts similar to the existing email flows.

If phone no login is enabled then us​er can log in by phone number only not by email id.

You can manage all configurations for phone number login from our admin-console and
configure your Twilio Account for Sending SMS' from the Admin-console.

```:api-header
{
  "type": "basic",
  "title": "Customization options"
}
```

You can customize SMS templates, OTP expiration time, per day no of SMS, OTP size, OTP type like only numeric, alphanumeric etc from the LoginRadius Admin-console.

OTP Expire: OTP valid time in minutes
OTP Notification Count: How many SMS will be sent to a single phone number.
OTP Notification Frequency: Time period of option 'OTP Notification Count'
OTP length: Default length is 6 but you can customize according to your requirements
OTP Typ : We support three types of OTP by default is numeric OTP. Other supported options are Alphanumeric only caps letters (i.e. 02F5R), Alphanumeric only small letters (i.e. ​45ffr012)

You can customize or add SMS templates from the LoginRadius admin-console

**Supported Templates **

- 1. Verification
- 2. Forgot Password
- 3. Welcome
- 4. Change Phone Number
