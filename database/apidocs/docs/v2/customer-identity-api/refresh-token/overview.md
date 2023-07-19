#Refresh Token APIs Overview

The Refresh Token APIs provide you with the ability to extended a session past the Access Token's initial expiration time. This document goes over the different workflows that can be applied in order to perform a refresh with the LoginRadius APIs.
There are multiple reasons why one would want to perform a refresh on a given session, here are two common reasons:

- **Sliding sessions:** A session is considered a sliding session when it becomes expired after a period of inactivity, all sessions within LoginRadius are sliding, due to the access_token having an expiry, the Refresh Token set of APIs allow you to have full customizability around whether a given session should expire at it's given timeframe.

- **Refresh Tokens can be long-lived:** As the `access_token` lives on the customer's device, giving it an indefinite or long life can be a security risk. You can mitigate this risk by providing the customer with a short-lived `access_token` (e.g., 15 minutes) and withholding a long-lived `refresh_token` that you can use when needed to issue the customer with a new short-lived `access_token` in order to maintain a session. Currently, all refresh tokens issued by LoginRadius have a default expiry time of **60 Days (86400 minutes)**. You also have the flexibility to manually update the refresh token’s lifetime from the [Token Lifetime](https://adminconsole.loginradius.com/platform-security/account-protection/session-management/token-lifetime) section of the Admin Console to a maximum of 365 days (525600 minutes).

    > **Note:** When you update the Access Token’s lifetime, the Refresh Token’s lifetime will be set to **1.5 times** the lifetime you set for the Access Token.


##Refreshing a session

When a session is established the access_token is issued with an expiration time, in order to extended the session a new access_token can be issued by performing a refresh. A refresh can be performed in the following ways:

- **Refresh Access Token by Refresh Token:** [This](/api/v2/customer-identity-api/refresh-token/refresh-access-token-by-refresh-token) API takes a refresh_token that was issued at the sametime as the original access_token and will return a new access_token along with a new refresh_token. Once a refresh_token has been used for a refresh, it can not be used again. 

- **Refresh Token API:** If you don't have a refresh_token already, you can use [this](/api/v2/customer-identity-api/refresh-token/refresh-token) API to be issued a new access_token along with a refresh_token. This API allows you to set the Access Token's expiration via the expiresIn parameter, if the expiration is not specified it will default to your current configurations.

- **Sliding Token Expiration:** If you would like the access_token to be automatically refreshed based on it being accessed or used via our APIs, you can have the access_token be automatically refreshed for the same time period as it's set expiration time, this means you can have it refresh for any desired length. E.g. 15 minutes, 60 days, etc. Note: To have this feature enabled please contact [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

> **Note:** Kindly note that using an expired/invalidated refresh token will invalidate all the refresh tokens associated with the user across all the sessions. Consequently, you will be unable to extend any of the user's sessions leveraging the associated refresh token.

##Obtaining a Refresh Token

A Refresh Token can be obtained via one of the methods listed below:

- **Automatic Refresh Token:** When a Login action is taken or the access_token is validated, LoginRadius will automatically return a refresh_token within the API Response. Note: To have this feature enabled please contact [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

- **Refresh Token API:** While the [Refresh Token API](/api/v2/customer-identity-api/refresh-token/refresh-token) can be used to refresh a session without a refresh_token, it also returns a refresh_token upon an initial refresh, simply pass your LoginRadius API Secret and the customer's access_token to obtain a refresh_token. 

- **Refresh Access Token by Refresh Token:** While [this](/api/v2/customer-identity-api/refresh-token/refresh-access-token-by-refresh-token) API requires that you already have a valid refresh_token, you can pass in a refresh_token to obtain both a new access_token and a new refresh_token.

> **Note:** The refresh token feature is enabled for all consumers  by default. However, if you prefer not to receive the refresh token when creating a session and only want the access token, you can contact [**LoginRadius Support**](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

##Revoking the Refresh Token

Currently, any `refresh_token` issued by the LoginRadius has a default expiry time of 60 Days (86400 minutes). If you wish to revoke a refresh_token to ensure that an existing session cannot be extended, simply call the [Revoke Refresh Token API](/api/v2/customer-identity-api/refresh-token/revoke-refresh-token) with your API Credentials and the refresh_token to expire.

> **Note:** Revoking the refresh_token does not invalidate it's associated access_token, if you wish to invalidate the access_token please use the [Invalidate Access Token API](/api/v2/customer-identity-api/authentication/auth-invalidate-access-token).

