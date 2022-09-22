Advanced Social API Overview
===
----
This section is a brief overview of the Refresh Token API system.

The below chart goes over the Logical flow of the process that you will need to take in order to continuously access a users Social Provider data over the span of 60 days.
![enter image description here](https://apidocs.lrcontent.com/images/Refresh-Token_1810058abce9d598249.02010181.png "")



1. Handle the User authentication as detailed in the [Social Login Flow](/api/v1/social-login/social-login-getting-started).
2. All responses are formatted in JSON format, You will receive a LoginRadius [Request-Token](/infrastructure-and-security/loginradius-tokens) on successful authentication.
3. Call the [Access Token API](/api/v1/social-login/access-token) to generate a [LoginRadius Access-Token](/api/v1/social-login/access-token)
4. Using the LoginRadius Access Token call the [Refresh Token API](/api/v1/advanced-social-api/refresh-token) to extend the lifespan of the Provider Access-Token that is attached to the LoginRadius Access-Token
5. This will return a JSON response with the expiry date of the refreshed token.
6. Using the refreshed token you will be able to call the [Get Refreshed Profile](/api/v1/advanced-social-api/refresh-user-profile) for up to 60 days or until the user removes the permissions.
7. This will return the standard LoginRadius Normalize JSON response.