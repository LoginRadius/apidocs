OpenID Connect Overview
===
----------

LoginRadius provides a way to integrate your OpenID Connect client with LoginRadius, it supports standard [OpenID Connect specs](http://openid.net/specs/openid-connect-core-1_0.html).


###Configuration

You can configure your OpenID Connect settings in the LoginRadius Admin Console under:

**Platform Configuraton ➔ Access Management ➔ Federated SSO ➔ (left sidebar) OpenID Connect**<br>

![enter image description here](https://apidocs.lrcontent.com/images/openid1_77415cef71c7683f46.93706291.png "Open ID Connect")

To begin configuration you will need to click "Add" and fill out the form as follows:

- **App Name:** The name of your OpenID Connect App.

- **Secret Key:** You will need to generate an OpenID Connect Secret using RS256 and add it here. You can get the **secret Key** by running the following command:

```
openssl genrsa -out key.pem 2048
```
Additionally, you can use the following command to generate the **Public key** from the private key that will be used to verify generated JWT id_token.

```
openssl rsa -in key.pem -outform PEM -pubout -out public.pem
```

- **Algorithm:** The algorithm you would like to use for OpenID Connect (RS256 is currently the only algorithm supported).

- **Data Mapping:** Enter your desired fields and how they map out the left column is how they will show up in the JWT, the right column is the field name in the LoginRadius profile, keep in mind that for some of the profile fields you will need to use dot notation to access them.

Once this is complete, make sure to hit "Add".

![enter image description here](https://apidocs.lrcontent.com/images/openid2_291095cef72a1134a15.15429356.png "OpenID Connect Configuration")

###Opening the Login Dialog and Setting the Callback URL (redirect_uri)


Redirect your user to the following URL to get the login prompt:

`https://cloud-api.loginradius.com/sso/oidc/authorize?client_id={LoginRadius API key}&redirect_uri={Callback URL}&scope={Scope}&response_type=code&state={random long string}`


<br>
**Required parameters **
  - client_id: Loginradius API key
  - redirect_uri: Callback URL of your site where you want to redirect back your users
  - scope: permission which you want to get approval from users
  - state: this parameter will be returned as it is, part of the response
  - response_type : possible values are code or token or id_token or any combination of these, and multiple response type must be separated by space, find responses below


**Response of login dialog if response_type=code**

`YOUR_CALLBACK_URI?code={unique code}&state={Same value which is passed in request}`

**Response of login dialog if response_type=token**

`YOUR_CALLBACK_URI?token={LoginRadius access token}&state={Same value which is passed in request}`

**Response of login dialog if response_type=id_token**

`YOUR_CALLBACK_URI?id_token={JWT of the userinfo}&state={Same value which is passed in request}`

**Response of login dialog if response_type=code token**

`YOUR_CALLBACK_URI?code={unique code}&token={LoginRadius access token}&state={Same value which is passed in request}`

##Exchanging Code for an Access Token

Use the [Access token by OpenID Code](/api/v2/single-sign-on/openid/access-token-by-openid-code) API to get the access_token, JWT Token and the refresh_token.


##Refresh Access Token

You can use the [Refresh Access Token](/api/v2/single-sign-on/openid/refresh-access-token) API to refresh the access token.



##Revoke Refresh Token

You can use the [Revoke Refresh Token](/api/v2/single-sign-on/openid/revoke-refresh-token) API Call to expire a Refresh Token.


##Getting the UserInfo

The UserInfo of a logged in user can be retrieved with the [UserInfo by Access Token](/api/v2/single-sign-on/openid/userinfo-by-access-token) API call which will return the UserInfo in a JWT Token.

**Note:** The RSA algorithm is currently the only supported encryption type for the JWT tokens.


##Getting The JSON Web Key Set

Our [JSON Web Key Set](/api/v2/single-sign-on/openid/get-json-web-key-set) API Call provides the JWKS that can be used to verify any JWT token with the returned JSON Web Key Set (JWKS).



##OIDC Discovery Endpoint

The [OIDC Discovery](/api/v2/single-sign-on/openid/oidc-discovery) API Endpoint provides a client with configuration details about the OpenID Connect metadata of Loginradius App.


URL Format:
`https://cloud-api.loginradius.com/sso/oidc/{Loginradius App name}/{oidc app name}/.well-known/openid-configuration`
