# OpenID Connect Overview

---

LoginRadius provides a way to integrate your OpenID Connect client with LoginRadius, it supports standard [OpenID Connect specs](http://openid.net/specs/openid-connect-core-1_0.html).

OpenID Connect 1.0 is a simple identity layer on top of the OAuth 2.0 protocol. It enables Clients to verify the identity of the End-User based on the authentication performed by an Authorization Server, as well as to obtain basic profile information about the End-User.

## Configuration

You can configure your OpenID Connect settings in the LoginRadius Admin Console under:

**Platform Configuraton ➔ Access Configuration ➔ Federated SSO ➔ (left sidebar) OpenID Connect**<br>

![OpenID1](https://apidocs.lrcontent.com/images/image-20230407-110053_145825224864345eaf95ddb8.04147039.png "OpenID1")

To begin configuration you will need to click "Add" and fill out the form as follows:

- **App Name:** The name of your OpenID Connect App.

- **Algorithm:** The algorithm you would like to use for OpenID Connect (RS256 is currently the only algorithm supported).

- **Grant Type:** Select any of the following option by using which the app will obtain the access token.
  - Authorization Code
  - Implicit
  - Password Credentials
  - Refresh Token 
  - Device Code


- **Token Expiration (Seconds):** Specify the Access Token lifetime, and after that time, the access token will expire.

- **ID Token Expiration (Seconds):** Specify the ID token lifetime, and after that time, the ID token will expire.

- **Token Endpoint Auth Method:** Select the client authentication method to authenticate the Authorization Server while using the token endpoint.

- **Scopes:** Select the access privileges requested for Access Tokens.

- **Force Reauthentication:** If checked, reauthentication is required for the authorization request. Otherwise, reauthentication is not applicable.

- **Signed User Info:** If checked, user info is returned as a signed JWT Token otherwise, in JSON format.

- **Audiences:** Enter the resource server, which will accept the OIDC.

- **Data Mapping:** Enter your desired fields and how they map out. The left column is how they will show up in the JWT, the right column is the field name in the LoginRadius profile, you can either select through the list or search the profile key. Keep in mind that for some of the profile fields you will need to use dot notation to access them.

- **Meta Data:** Specify the key-value pair of static non-profile data you want to receive in the ID Token payload.

> **Note:** Now you don't have to provide **Secret Key** as LoginRadius automatically generates it for you.

Once this is complete, click on **ADD**.

![OPEN](https://apidocs.lrcontent.com/images/image-20230407-110509_99136378264345f3f9a2cf2.31196040.png "OPEN")

## OpenID Connect Flows

In the OpenID Connect standard There are 3 types authentication flows.

1. [Authorization Code Flow](#authorizationcodeflow2)
2. [Implicit Flow](#implicitflow3)
3. [Hybrid Flow](#hybridflow4)

Each flow requires going through an Authorization Endpoint, essentially the page where the customer is prompted to Login. Depending on the workflow
you choose to leverage, you will need to add different query parameters to the URL that points to the Login page, you can use the table below for an overview of all of the different parameters that can be passed to the Authorization Endpoint.

|               |                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| ------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| client_id     | (required) [LoginRadius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
| redirect_uri  | (required) This is the URI to which the response should be sent. This must be whitelisted in the App Section in Admin Console.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
| response_type | (required) This defines the processing flow to be used when forming the response.<br><br>Authorization Flow:<br>response_type: code<br><br>Implicit Flow:<br>response_type: id_token<br>response_type: token id_token<br><br>Hybrid Flow:<br>response_type: code token<br>response_type: code id_token<br>response_type: code token id_token                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| state         | (optional) It is recommended that the client’s use this parameter to maintain state between the request and the callback. Typically, Cross-Site Request Forgery (CSRF, XSRF) mitigation is done by cryptographically binding the value of this parameter with a browser cookie.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| scope         | (required) This is a space-delimited list of the scopes requested by the client. It must contain the value **openid** to indicate that the application intends to use OIDC. This may also contain other values e.g. `openid`, `profile`,`email`, `phone`, `address` . If you pass only the required parameter **openid** in scope then the id_token in the [userinfo](https://www.loginradius.com/docs/api/v2/single-sign-on/federated-sso/openid-connect/userinfo-by-access-token/) API response will contain only the mapped fields under the OIDC configuration in Admin Console.If you are looking to get additional profile fields in the id_token in the [userinfo](https://www.loginradius.com/docs/api/v2/single-sign-on/federated-sso/openid-connect/userinfo-by-access-token/) API rsponse, you can pass the additional scopes with **openid**. The list of supported scopes and claims in the id_token can be found [here](#listofscopesandclaims5). |
| nonce         | (optional) This serves as a token validation parameter, used to associate a client authentication with an ID Token for mitigating replay attacks. If this value is used, it will be included as a Claim in the ID Token. Clients should verify that this nonce Claim value is equal to the value set in the Authorization Request.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| response_mode | (optional) Informs the Authorization Server of the mechanism to be used for returning parameters from the Authorization Endpoint<br><br>There are three types of response mode<br><br>query → Authorization response will be append in the redirect_uri as the query string.<br> (Ex→ example.com&state=fgfgfg&code=ffgfgfgfgf)<br><br>fragment → Authorization response will be append in the redirect_uri using the fragment (Ex→ example.com#state=fgfgfg&code=ffgfgfgfgf).<br><br>form_post → Authorization response will be posted on the redirect uri, Default Response Mode if not provided<br><br>Authorization code flow → query<br>Implicit Flow → fragment<br>Hybrid Flow → fragment                                                                                                                                                                                                                                                                 |
| ui_locales    | (optional) End-User's preferred languages and scripts for the user interface, represented as a space-separated list of BCP47 [RFC5646] language tag values, ordered by preference. For instance, the value "fr-CA fr en" represents a preference for French as spoken in Canada, then French (without a region designation), followed by English (without a region designation)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 |
| display       | (optional) specifies how the Authorization Server displays the authentication and consent user interface pages to the End-User. The defined values are<br>**1.** page - authentication will be open in the page<br>**2.** popup- authentication will be open in the popup<br>These parameter is send over the hosted page as query string, and hosted page will handle the display type                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| prompt        | (optional) specifies the Authorization Server prompts the End-User for reauthentication and consent. The defined values are<br>**1.** login - it will asked for the reauthentication<br>**2.** none - The Authorization Server MUST NOT display any authentication or consent user interface pages. An error is returned if user is not authenticated.<br>These parameter is send over the hosted page as query string, and hosted page will handle the display type                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      |
| claims        | (optional) Client applications can alternatively request claims via the optional claims parameter. which needs<br>- Setting the exact names of the requested claims<br>- Which claims should be delivered at the UserInfo endpoint and which in the ID token<br>The **claims** request parameter is represented by a simple JSON object that has two members -- userinfo and id_token, which content indicates which claims to return<br>`{ "id_token" : { "email" : null, "email_verified" : null }, "userinfo" { "email" : null, "email_verified" : null, "name" : null } }`<br><br>or<br>`{ "id_token" : { "email" : { "essential" : true }, "email_verified" : { "essential" : true }}, "userinfo" { "email" : { "essential" : true }, "email_verified" : null, "name" : { "essential" : true }} }`<br>`{ "essential" : true }` means the claim should be available in the token but also it should be in the user profile.                                         |
| id_token_hint | (optional) ID Token previously issued by the Authorization Server being passed as a hint about the End-User's current or past authenticated session with the Client. If the End-User identified by the ID Token is logged in or is logged in by the request, then the Authorization Server returns a positive response; otherwise, it will return a login_required error, and invalidate the current access token.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              |
| login_hint    | (optional) Hint to the Authorization Server about the login identifier (Email or PhoneId) the End-User might use to log in (if necessary). If the End-User profile matches that of the login identifier, Authorization Server will return a positive response. Otherwise, it will return a login_required error and invalidate the associated access token. In the future, support could be added to pass this value as a hint to the authorization service. It is RECOMMENDED that the hint value match the value used for discovery.                                                                                                                                                                                                                                                                                                                                                                                                                          |
| max_age       | (optional) Maximum Authentication Age. Specifies the allowable elapsed time in seconds since the last time the End-User was actively authenticated by the OP. If the elapsed time is greater than this value, the OP MUST attempt to actively re-authenticate the End-User. When max_age is used, the ID Token returned MUST include an auth_time Claim Value.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  |
| acr_values    | (optional) If this optional parameter is set to loginradius:nist:level:1:re-auth the user will be forced to re-authenticate regardless of their current session state. This value will also be returned in the acr claim of the ID Token.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       |

### Authorization Code Flow

The authorization code flow (as the title implies) returns an authorization code that can then be exchanged for an identity token and/or access token. This requires client authentication using a client_id and a secret to retrieve tokens from the back end and has the benefit of not exposing tokens to the user agent (i.e. a web browser). This flow allows for long-lived access (through the use of refresh tokens). Clients using this flow must be able to maintain a secret.

This flow obtains the authorization code from the authorization endpoint and all tokens are returned from the token endpoint.

##### Opening the Login Dialog / Authorization Endpoint - Authorization Code Flow

Redirect your user to the following URL to get the login prompt:

`https://<siteurl>/service/oidc/{OIDCAppName}/authorize?client_id={LoginRadius API key}&redirect_uri={Callback URL}&scope={Scope}&response_type={one of the response_types available}&state={random long string}&scope=openid&nonce={Unique Generated nonce}`

> **Note:** This **siteurl** field contains the LoginRadius IDX/Custom Domain url. E.g., if your LoginRadius app name is company name then the siteurl will be companyname.hub.loginradius.com. If you are using a custom domain for your IDX page, then use custom domain value in place of siteurl.

<br>
**Available Query Parameters **
  - client_id: Loginradius API key
  - redirect_uri: Callback URL of your site where you want to redirect back your users
  - response_type : possible value is only 'code' to specify that you are doing the Authorization Code flow. 
  - state:  random string that returned with the access_token in the redirect callback. this parameter will be returned as it is, part of the response.
  - scope: To get values mapped in the admin console configuration you must need to pass the openid as value. If you are looking to get additional profile fields in the id_token, you can pass the additional scopes with **openid**. The list of supported scopes and claims in the id_token can be found [here](#listofscopesandclaims5)
  - nonce: a unique generated nounce.

##### Receiving the Code - Authorization Code Flow

Should the customer authenticate successfully the code will be returned as follows:

**Response of login dialog if response_type=code**

`REDIRECT_URI?code={unique code}&state={Same value which is passed in request}`

If the `response_mode=from_post` is passed then the response will be in post body of the `redirect_url`

e.g.
`
{

    state: {state}

    code: {authorization code}

}
`

Once you have the code you can request an access_token via the [Access token by OpenID Code](/api/v2/single-sign-on/openid/access-token-by-openid-code) API.

> **Note**: To include PKCE within this request, refer to this [document](/single-sign-on/tutorial/federated-sso/pkce-flow/#oidcvpkceflow4) for more information.

### Implicit Flow

The implicit flow requests tokens without explicit client authentication, instead of using the redirect URI to verify the client identity. Because of this, refresh tokens are not allowed, nor is this flow suitable for long lived access tokens. From the client application's point of view, this is the simplest to implement, as there is only one round trip to the openid&nonce={Unique Generated nonce}`

<br>
**Available Query Parameters **
  - client_id: Loginradius API key
  - redirect_uri: Callback URL of your site where you want to redirect back your users
  - response_type : possible values are `token`, `id_token` or `token id_token`.
  - state:  random string that returned with the `access_token` in the redirect callback. this parameter will be returned as it is, part of the response.
  - scope: To get values mapped in the admin console configuration you must need to pass the openid as value. If you are looking to get additional profile fields in the id_token in the [userinfo](https://www.loginradius.com/docs/api/v2/single-sign-on/federated-sso/openid-connect/userinfo-by-access-token/) API response, you can pass the additional scopes with **openid**. The list of supported scopes and claims in the id_token can be found [here](#listofscopesandclaims5).
  - nonce: a unique generated nounce.

#####Receiving Tokens - Implicit Flow

Should the customer authenticate successfully the tokens will be returned as follows:

1. **Response of login dialog if response_type=token**
   `REDIRECT_URI?token={LoginRadius access token}&state={Same value which is passed in request}`
2. **Response of login dialog if response_type=id_token**
   `REDIRECT_URI?id_token={JWT token}&state={Same value which is passed in request}`
3. **Response of login dialog if response_type=token id_token**
   `REDIRECT_URI?{unique code}&token={LoginRadius access token}&id_token={JWT token}&state={Same value which is passed in request}`

### Hybrid Flow

The hybrid flow is a combination of aspects from the previous two. This flow allows the client to make immediate use of an identity token and retrieve an authorization code via one round trip to the authentication server. This can be used for long lived access (again, through the use of refresh tokens). Clients using this flow must be able to maintain a secret.

This flow can obtain an authorization code and tokens from the authorization endpoint, and can also request tokens from the token endpoint.

##### Opening the Login Dialog / Authorization Endpoint - Hybrid Flow

Redirect your user to the following URL to get the login prompt:

`https://<siteurl>/service/oidc/{OIDCAppName}/authorize?client_id={LoginRadius API key}&redirect_uri={Callback URL}&scope={Scope}&response_type={one of the response_types available}&state={random long string}&scope=openid&nonce={Unique Generated nonce}`

> **Note:** This **siteurl** field contains the LoginRadius IDX/Custom Domain url. E.g., if your LoginRadius app name is company name then the siteurl will be companyname.hub.loginradius.com. If you are using a custom domain for your IDX page, then use custom domain value in place of siteurl.

**Available Query Parameters **

- client_id: LoginRadius API key
- redirect_uri: Callback URL of your site where you want to redirect back your users
- scope: To get values mapped in the admin console configuration you must need to pass the openid as value. If you are looking to get additional profile fields in the id_token in the [userinfo](https://www.loginradius.com/docs/api/v2/single-sign-on/federated-sso/openid-connect/userinfo-by-access-token/) API response, you can pass the additional scopes with **openid**. The list of supported scopes and claims in the id_token can be found [here](#listofscopesandclaims5).
- response_type : possible values are `code token`, `code id_token` or `code token id_token`.
- state: random string that returned with the access_token in the redirect callback. this parameter will be returned as it is, part of the response.
- nonce: a unique generated nounce.

#####Receiving Tokens - Hybrid Flow

Should the customer authenticate successfully the tokens will be returned as follows:

1. **Response of login dialog if response_type=token**
   `REDIRECT_URI?token={LoginRadius access_token}&state={Same value which is passed in request}`

2. **Response of login dialog if response_type=id_token**
   `REDIRECT_URI?id_token={JWT token}&state={Same value which is passed in request}`

3. **Response of login dialog if response_type=token id_token**
   `REDIRECT_URI?{unique code}&token={LoginRadius access_token}&id_token={JWT token}&state={Same value which is passed in request}`

> **Note**:We have a 10 minutes limitation on SSO login after initializing the Federated SSO request . If the user is not logged in within 10 minutes, the Federated SSO Session will expire, and after that login will return the error, this is for the security reasons to restrict the session to a limited time.

<br>
<br>

### List of Scopes and Claims

Below are the Supported Scops and its claims:

| Scope       | Claim Name            | LoginRadius Profile Field |
| ----------- | --------------------- | ------------------------- |
| **email**   | email                 | Email.Value               |
|             | email_verified        | EmailVerified             |
| **phone**   | phone_number          | PhoneId                   |
|             | phone_number_verified | PhoneVerified             |
| **profile** | name                  | FullName                  |
|             | family_name           | LastName                  |
|             | given_name            | FirstName                 |
|             | middle_name           | MiddleName                |
|             | nickname              | NickName                  |
|             | preferred_username    | UserName                  |
|             | profile               | Profileurl                |
|             | picture               | GravatarImageUrl          |
|             | website               | Website                   |
|             | gender                | Gender                    |
|             | birthdate             | BirthDate                 |
|             | zoneinfo              | TimeZone                  |
|             | locale                | LocalLanguage             |
|             | updated_at            | ModifiedDate              |
| **address** | street_address        | Addresses.Address1        |
|             | locality              | Addresses.City            |
|             | region                | Addresses.Region          |
|             | postal_code           | Addresses.PostalCode      |
|             | country               | Addresses.Country         |

Scopes are passed in the Authorization Request as a query string, For the openID flow it's required to pass the `openid` scope,
We can pass the multiple scopes separated by space for example:

```
https://<siteurl>/service/oidc/{OIDCAppName}/authorize?scope=openid%20email&client_id=94fa4f2xxxxxxxxxxxxf4124753841bd&redirect_uri=https://example.com&response_type=code&state=7d3dfb2dfgdfgdfdfdf

```
## Device Code Flow

This flow enables OIDC clients on such devices (like smart TVs, media consoles, digital picture frames, and printers) to obtain user authorization to access protected resources without using an on-device user agent.

### Flow Diagram

![FLOW](https://apidocs.lrcontent.com/images/Ae-1_987862fe5b8525d752.10393295.png "FLOW")

### Usage

Used in internet-connected devices that either lack a browser to perform a user-agent based authorization or are input-constrained to the extent that requiring the user to input text to authenticate during the authorization flow is impractical. When signing into apps and services on devices such as a Playstation or an Apple TV.

### Workflow

There are two devices ( one input restricted device and other browser-based device) are involved in this workflow.

  

**Input restricted devices like Smart TVs**

1.  When a consumer comes to input restricted device, the Device Code API will be called to get the device_code and user_code.
    
2.  After that, the Device Code Exchange Token Ping API will be called with a certain internal, PollingInterval and wait till the access token is returned by the Device Code Exchange Token Ping API.

**Browser-based Device**

1.  On the **verification URL**, the consumer will enter the device_code, the customer will be redirected to the Device Code Confirm URL with the user_code `(https://<siteurl>/service/oidc/<OidcAppName>/device/authorize?client_id=<APIKey>&user_code=<User Code Genertaed from the Get Device Code API>)`

2.  The Device Code Confirm URL with the user_code `(https://<siteurl>/service/oidc/<OidcAppName>/device/authorize?client_id=<APIKey>&user_code=<User Code Genertaed from the Get Device Code API>)` will show the IDX page to login.
    
3.  After login, the consumer will be redirected to the **afterverificationURL**.

### Configuration

To activate the device code flow functionality for your account, you can easily choose the Device Code option from the Grant Type drop-down menu and proceed to provide the required information in the designated fields.

- **Device Code App Name:** Please provide a name for the app used in your Device code API calls.
- **Verification Url:** Enter the verification URL where users can manually enter the user code.
- **Verification Complete Url:** Enter the URL where users will be redirected after successful authentication.
- **Device Code Expiration (Seconds):** Specify the duration of the device code's validity in seconds..
- **Polling interval (Seconds):** Enter the minimum time interval in seconds that the client should wait between polling requests to the token endpoint.
- **User Code Character Set:** Select the character set for the user code.
- **User Code Mask:** Enter the pattern for the user code, for example, "-" generates a user code like "ASD-QWE".
- **Token Expiration (Seconds):** Specify the expiration time of the Access Token in seconds.
- **ID Token Expiration (Seconds):** Specify  the lifetime of the ID Token in seconds.
- **Token Endpoint Auth Method:** Select the client authentication method used to authenticate the Authorization Server when using the token endpoint.
- **Scopes:** Select the access privileges requested for Access Tokens by selecting the desired scopes.
- **Force Reauthentication:** Check this option if reauthentication is required for the authorization request; otherwise, leave it unchecked.
- **Signed User Info:** If checked, user info is returned as a signed JWT Token otherwise, in JSON format.
- **Audiences:** Enter the resource server that will accept the OIDC (OpenID Connect) tokens.
- **Data Mapping:** Specify the key-value pairs of LoginRadius profile data points you want to receive in the ID Token payload.
- **Meta Data:** Specify the key-value pairs of static non-profile data you want to receive in the ID Token payload.
    
![Device Code Flow](https://apidocs.lrcontent.com/images/Federated-Sso-LoginRadius-User-Dashboard_928838552645c091a686829.71304439.png "Grant type")

### Implementation Steps

The following explains the implementation sequence for Device Code Flow:

**Step 1:** Use the [**Request Device Code API**](/api/v2/single-sign-on/federated-sso/openid-connect/request-device-code/) to request a new device code, user code from the Device code Endpoint ( you could show a message to ask the consumer to open the verification URL to complete the authetnicaiton on the browser-base device).

  
|  |  |
|--|--|
| Method | POST |
| Endpoint | `https://{siteurl}/api/oidc/{OidcAppName}/device` <br><br>Note: where siteurl is the LoginRadius IDX domain url, e.g., `<LR appname>.hub.loginradius.com`. If you are using a custom domain for your IDX page, then use custom domain value in place of siteurl.|
|Header|application/json OR application/x-www-form-urlencoded|
|Body (json content type)|{<br>"client_id": `<APIKey>`,<br>"scope": "openid email profile"<br>} <br><br>Note: <br>**1.** Please see [LoginRadius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0) for how to get APIkey for your app.<br>**2.** Scope: [optional] (e.g email profile)|
|Response|{<br>"interval": 10,<br>"expires_in": 1800,<br>"device_code": "1522d771f27b408baca35eca7d81c37d",<br>"user_code": "MXD-TPV",<br>"verification_uri":"https://example.com/federation/device/activate.php,<br>"verification_uri_complete":"https://example.com/federation/device/activate.php?user_code=MXD-TPV"<br>}|

**Step 2:** Use the device_code and keep calling [**Device Code Exchange (Ping API)**](/api/v2/single-sign-on/federated-sso/openid-connect/device-code-exchange-token-ping/) till you get the access token.

|  |  |
|--|--|
| Method | POST |
| Endpoint | `https://{siteurl}/api/oidc/{OidcAppName}/token` |
| Header | application/json OR application/x-www-form-urlencoded |
| Body (json content type) | {<br>"client_id": `<APIKey>`,<br>"grant_type":"urn:ietf:params:oauth:grant-type:device_code",<br>"response_type": "token",<br>"device_code": <Device Code generated from the Get Device Code API><br>} |
| Response | {<br>"expires_in": 3598,<br>"refresh_token": "d87cc355cdc61a6b...507",<br>"access_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjkzMWVlYz...Vn33edUA0hQCSA",<br>"token_type": "Bearer",<br>"id_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjkzMWVlYzU2OD...2BTNoyTPC0dAzw"<br>} |

**Step 3:** Once the consumer enters the **user_code** value on the **verificationURL** on the browser-based device, redirect the consumer to the Device Code Confirm URL with the **device_code** `(https://<siteurl>/service/oidc/<OidcAppName>/device/authorize?client_id=<APIKey>&user_code=<User Code Genertaed from the Get Device Code API>)`

**Step 4:** LoginRadius will show IDX page and the consumer logs in successfully on the IDX.  After successful authentication, the consumer will be redirected to **AfterVerificationURL**.

**Step 5:** You can show a static page with a success message on the **AfterVerificationURL**.

The following are some of the error response that you might get during Device Code Flow setup:

| Error Name | Error Response | Error Description |
|--|--|--|
| Authorization Pending | `{"error":"authorization_pending","error_description":""}`| The authorization request is still pending as the end-user hasn't yet completed the user code authentication. The client should repeat the Access Token Request to the token endpoint using polling. |
| Slow Down | `{"error":"slow_down","error_description":""}` | Before each new request, the client MUST wait at least the number of seconds specified by the "interval" parameter of the Device Authorization Response. |
| Expire Token | `{"error":"expired_token","error_description":"" }` | When an access token is expired |
| Access Denied | `{ "error":"access_denied","error_description":"" }` | If the user denied the authorization |


## Post Callback Feature

By default LoginRadius sends the token (Access token) and id_token as a query parameter in the implicit and hybrid workflows. However, it is more secure to send the access token as a post parameter. To leverage such functionality, we are supporting Post Callback in the Cloud Redirection APIs.

In the Post Callback, after the login from the Hosted Page, the token is passed to return_url (Callback Url) as the **Post Form Request**. The token is passed in the Post body instead of the Query String. If you want to send the access token as post parameters instead of QueryString, you can implement this functionality.

You can achieve this by changing code in **default-auth-before-script.js** file under the [Admin Console](https://adminconsole.loginradius.com/deployment/idx). In this file you need to edit the function `redirectToReturnUrl` as given in the below:

```
function redirectToReturnUrl(token) {
  if (queryString.return_url) {
    if (LRObject.util.isCloudApiPostCallbackSupported(queryString.return_url)) {
      LRObject.util.postAndRedirect(queryString.return_url, {
        "token": token
      });
    } else {
      window.location = queryString.return_url.indexOf('?') > -1 ? queryString.return_url + '&token=' + token : queryString.return_url + '?token=' + token;
    }
  } else {
    window.location = 'profile.aspx';
  }
}
```

**Note:**

1. This is the Sample function. You may have some different implementations for this function, So changes will be according to your Implementation.

2. This feature is not enabled for any customer by default, to enable this you need to change the Before Script function according to the above code snippet.

3. By default, the token will be sent to query string for the Cloud Redirection callback URLs, (As currently working), So it will not impact any customer implementation.

##Additional Steps

Once you have obtained a code or access_token (depending on the workflow you've followed) you can take additional steps shown below.

#####Exchanging Code for an Access Token

If you've obtained an authorization code, you're able to exchange it for an access_token.

Use the [Access token by OpenID Code](/api/v2/single-sign-on/openid/access-token-by-openid-code) API to get the access_token, JWT Token and the refresh_token.

#####Revoke Refresh Token

You can use the [Revoke Refresh Token](/api/v2/single-sign-on/openid/revoke-refresh-token) API Call to expire a Refresh Token.

#####Refresh Access Token

You can use the [Refresh Access Token](/api/v2/single-sign-on/openid/revoke-refresh-token) API Call to expire a Refresh Token.

#####Getting the UserInfo

The UserInfo of a logged in user can be retrieved with the [UserInfo by Access Token](/api/v2/single-sign-on/openid/userinfo-by-access-token) API call which will return the UserInfo in a JWT Token.

**Note:** The RSA algorithm is currently the only supported encryption type for the JWT tokens.

##Other OpenID functionality

Here's some other endpoints you will need in your OpenID workflow.

#####Getting The JSON Web Key Set

Our [JSON Web Key Set](/api/v2/single-sign-on/openid/get-json-web-key-set) API Call provides the JWKS that can be used to verify any JWT token with the returned JSON Web Key Set (JWKS).

#####OIDC Discovery Endpoint

The [OIDC Discovery](/api/v2/single-sign-on/openid/oidc-discovery) API Endpoint provides a client with configuration details about the OpenID Connect metadata of Loginradius App.

URL Format:
`https://{siteurl}/service/oidc/{OIDCAppName}/.well-known/openid-configuration`
