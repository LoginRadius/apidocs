Advanced Social API Overview
===
----
This section is a brief overview of the Refresh Token API system.

The chart and description below illustrate the logical flow of the process that you will need to follow in order to continuously access a user's social provider data over a span of 60 days.
![enter image description here](https://apidocs.lrcontent.com/images/Refresh-Token_1810058abce9d598249.02010181.png "")



1. Handle the user authentication as detailed in the [Social Login Flow](/api/v2/social-login/getting-started).
2. All responses are formatted in JSON format, and you will receive a LoginRadius [Request-Token](http://support.loginradius.com/hc/en-us/articles/203885385-About-LoginRadius-Tokens) on successful authentication.
3. Call the [Access Token API](/api/v2/social-login/access-token) to generate a [LoginRadius Access-Token](http://support.loginradius.com/hc/en-us/articles/203885385-About-LoginRadius-Tokens).
4. Using the LoginRadius access token, call the [Refresh Token API](/api/v2/advanced-social-api/refresh-token) to extend the lifespan of the provider access token that is attached to the LoginRadius access token.
5. This will return a JSON response with the expiry date of the refreshed token.
6. Using the refreshed token you will be able to call the [Get Refreshed Profile](/api/v2/advanced-social-api/refresh-user-profile) for up to **Refresh Token Expiration Time** or until the user removes the permissions.
7. This will return the standard LoginRadius-normalized JSON response.

**Refresh Token Expiration Time**

* Default: It can be valid for up to 60 days on the LoginRadius APIs, depending on the provider.
* App configured expiration time: Validity of Refresh Access Token can be controlled with "LoginRadius Access Token" expiration time settings.
<br><br>i.e. If Expiration time of LoginRadius Access Token is set to 24 Hours for your app then validity of Refresh Access Token will be 24 hours only instead of 60 Days.

For enabling App configured expiration time of refresh Access Token, please contact LoginRadius [Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).
