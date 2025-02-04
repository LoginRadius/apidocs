# Get User Session Device/Location

[Get Active Session Details](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/get-active-session-details/) API is used to get the current session of the user, it returns IPs and user agent string with it.

**API Response:**

```
{
  "data": [
    {
      "accesstoken": "749****-****-472d-****-12f*****3a39",
      "browser": "Chrome",
      "device": "PC",
      "os": "Windows",
      "deviceType": "Computer",
      "city": null,
      "country": "India",
      "Ip":"192.168.0.1"
      "LoginDate": "2016-06-23T07:58:44.165Z"
    }
  ]
}
```
<br>

|||
|--|--|
|accesstoken|Valid Access Token|
|browser|User's Browser i.e. Chrome, IE|
|device|Device|
|os|Operating System|
|deviceType|Device Type|
|city|Current City of the user|
|country|Current country of the user|
|Ip|IP address of the user|
|LoginDate|Last login details of the user|


## Usecase: Disable concurrent access from multiple devices

When a user logs in with the same credentials on various devices, you can gain insights into their access across different devices. You can determine how many devices the user has logged into. If you wish to revoke access from a specific device, you can easily achieve this by invalidating the associated access token, as each login is linked to a unique access token.

## Get Active Session

To retrieve all active sessions for a specific user on various devices, you can utilize the [Active Session By Account ID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/active-session-by-account-id/) API.

In the event that multiple sessions on different devices exist for a particular user, this API will return the following response:

```
{
    "nextCursor": 0,
    "data": [
        {
            "AccessToken": "11c3b10a-85d2-455b-a9fb-d86c46004766",
            "Browser": "Safari",
            "Device": "iPhone",
            "Os": "iOS",
            "DeviceType": "Mobile",
            "City": "unknown",
            "Country": "unknown",
            "Ip": "49.36.237.46",
            "LoginDate": "2023-09-15T04:09:41.281Z"
        },
        {
            "AccessToken": "aabbe2fb-848a-47f4-bc3a-c6d7d42d2059",
            "Browser": "Chrome",
            "Device": "",
            "Os": "macOS",
            "DeviceType": "Desktop",
            "City": "unknown",
            "Country": "unknown",
            "Ip": "49.36.237.46",
            "LoginDate": "2023-09-15T04:04:16.497Z"
        },
        {
            "AccessToken": "f7c81631-636e-49d0-890d-08120468ada3",
            "Browser": "Chrome",
            "Device": "iPhone",
            "Os": "iOS",
            "DeviceType": "Mobile",
            "City": "unknown",
            "Country": "unknown",
            "Ip": "49.36.237.46",
            "LoginDate": "2023-09-15T04:03:43.72Z"
        }
    ]
}

```

## Implementation

### Client Side Setup

This API requires an **API secret** as a parameter. Due to security considerations, using the API Secret on the client side is not recommended. We suggest using a wrapper to make the API call from the client side. Following this method will not only ensure adherence to superior security practices but also prevent potential compromises of your API secret.

### Server Side Setup

For server-side implementation, you can call this API directly.

**Steps to disallow the Login on Multiple devices:**

1. The user logs in with their credentials, and upon a successful login, LoginRadius will provide the user's profile.
2. Fetch the UID from the user profile, invoke the created endpoint for client-side implementation, and directly invoke [Active Session By Account ID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/active-session-by-account-id/) API for server-side implementation.
3. The [Active Session By Account ID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/active-session-by-account-id/) API will return the session object in response.
4. Implement a checkpoint to allow login when only one session is present. However, if the API returns multiple sessions, prevent the user from logging in.
5. It is important to note that the [Active Session By Account ID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/active-session-by-account-id/) API will provide **access tokens** for all active sessions. For added security, you can log out the user from a specific session by invalidating the corresponding access token through the [Auth Invalidate Access Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-invalidate-access-token/) API.

By following these steps, you can ensure a secure and controlled login process based on the number of active sessions and manage user access effectively.
