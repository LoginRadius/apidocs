Get User Session Device/Location
=====

-----

Get active session API is used to get the current session of the user, it returns IPs and user agent string with it.

Try this API [here](/api/v2/user-registration/get-active-session-details)

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
