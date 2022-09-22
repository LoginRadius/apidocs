# Session Management Configuration

To configure the Session Management, login into your LoginRadius account and navigate to Platform Security ➔ Account Protection ➔ Session Management. There are three sections: **Token Lifetime**, **Force Logout** and **Remember me**.

## Token Lifetime

Displays the token lifetime currently set for your account.
<br><br>![Token Lifetime](https://apidocs.lrcontent.com/images/Session-Management---LoginRadius-User-Dashboard_899462222a324729b7.25902051.png  "Session Management")

### Update Token Expiration/Sliding Token Expiration

This feature will extend the token expiration time with the app configured time (TokenExpiration), it will extend the token validity if it has been accessed/used before the expiration time.So,in order to update the time please follow the below steps:

1. Go to the [Admin Console > Platform Security > Account Protection > Session Management > Token Lifetime](https://adminconsole.loginradius.com/platform-security/account-protection/session-management/token-lifetime).

 ![Session Management](https://apidocs.lrcontent.com/images/image-6_3067862222800434de4.02447665.png "Session Management")

2. Enter time( in minutes) of token expiration and click on the **save** button.

 >**Note:** You can change time from 1 to 129600 minutes (90 days) and if you want more than this,  contact [LoginRadius support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

3. Your token expiration time will be updated.


**Use Case:** A token having the expiration at 7.00 will be extended to the configured expiration time if used before the expiration (i.e. 7.00)

<!-- >**Note:** This feature will only be applicable for V2 Authentication APIs, Social Get Profile API (i.e. api/v2/userprofile), Social Get Refresh User Profile API (api/v2/userprofile/refresh) -->

## Force Logout

1. Click on **Force Logout** tab on left side panel
2. Check **Enable Force Logout** under **Force Logout** to enable Force Logout settings.
   <br><br>![Force Logout](https://apidocs.lrcontent.com/images/ac35_244405e9346796ac635.38248977.png "Force Logout")

## Remember Me

1. Click on **Remember Me** tab on left side panel
2. Check **Enable remember me** option under **Remember Me** and Set **Token Expiration time** in minutes.
   <br><br>![Remember Me](https://apidocs.lrcontent.com/images/ac36_21535e934694b219f5.41595303.png "Remember Me")
3. Now, hit **Save** to save settings.

>**Note**: The Remember Me token can only be set to expire at a time that is less than that of the access_token.
