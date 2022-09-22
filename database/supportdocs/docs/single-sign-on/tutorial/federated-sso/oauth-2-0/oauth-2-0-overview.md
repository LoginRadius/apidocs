# OAuth 2.0 Introduction

  

#### Overview

  

OAuth is an open-standard authorization protocol and provides clients secure delegated access to server resources on the behalf of the owner of a resource.

Using OAuth 2.0 the resource owners can authorize the third-party clients to access their server resources without providing credentials.

The authorization server issues an access_token to a third-party client with the approval of the resource owner and the third party then uses the access_token to access the protected resources hosted by the resource server.



#### Oauth 2.0 with LoginRadius

LoginRadius Identity Platform supports standard  [OAuth 2.0 specs](https://tools.ietf.org/html/rfc6749)  to integrate your OAuth client with LoginRadius. Thus, you can allow your application's customers to log in to an OAuth-enabled application without creating an account.  This document goes over the full process of getting the SSO feature implemented with OAuth 2.0.

  

This section covers the basic knowledge of [OAuth Roles](#oauthroles2) that you need to know before configuring the OAuth 2.0 in the LoginRadius Identity Platform.

  

#### OAuth Roles

OAuth 2.0 has the following four roles:

- **Resource Owner:** The resource owner is the consumer who authorizes an application to access their account. The application’s access to the customer’s account is limited to the scope of the authorization granted (e.g., read or write access).  
      
    
- **Client (Service Provider):** The client is the application that wants to access the consumer account. Before it may do so, the consumer must authorize the application, and the API must validate the authorization.  
      
    
- **Resource Server (Identty Proivder LogingRadius) :**  The server hosts the protected resources and this will handle the authenticated request after the client or application obtained an access token.  
      
    
- **Authorization Server (Identity Provider, LoginRadius):**  The server that authenticates the Resource Owner, and issues a token after authorization.
    


## Setup Guide of Oauth 2.0 With LoginRadius

Following is the step-by-step guide to Implementing Oauth 2.0 with LoginRadius

  

- [LoginRadius Admin Console Configuration](#loginradiusadminconsoleconfiguration3)
    
- [Oauth 2.0 Implementation](#oauthimplementation4)
    
- [Supported Query Parameter](#supportedqueryparameter13)
  
- [Additional Steps in Oauth 2.0](#additionalstepsinoauth14)
    

  

#### LoginRadius Admin Console Configuration

  

To configure Oauth 2.0 with LoginRadius, only API Credentials are required and to get the credentials please refer to this [document](/api/v2/admin-console/platform-security/api-key-and-secret/).

#### OAuth 2.0 Implementation

This guide will take you through the implementation of OAuth 2.0 and flow with LoginRadius. It covers everything you need to know on how to configure OAuth 2.0 in your LoginRadius account and deploy it onto your web application.

The OAuth 2.0 authorization protocol specification defines the following flows supported by LoginRadius to get an Access Token, these flows are called grant types. This helps in deciding which one is suited for the case depends mostly on the type of application.

- [Authorization Code Flow (Explicit)](#authorizationcodeflowexplicit6)
    
- [Oauth2.0 PKCE Flow](#oauthpkceflow8)
    
- [Implicit Flow](#implicitflow9)
    
- [Resource Owner Password Credential Flow](#resourceownerpasswordcredentialflow10)
    
- [Device Code Flow](#devicecodeflow12)


#### Authorization Code Flow (Explicit)

This flow is best used by server-side applications where the source code is not publicly exposed. The applications should be server-side because the request that exchanges the authorization code with a token requires a client secret, which will have to be stored in Client(SP).

Flow diagram

![Protocol Flow](https://apidocs.lrcontent.com/images/pasted-image-0-3_211275ed5b85cd59ad2.38717584.png "Flow diagram")  
  

- The client(SP) requests authorization from the authorization server (LoginRadius IDP).
    
- After successful authorization, the end-user will be redirected back to the redirect URL with the code parameter.
    
- The client then sends the code to the LoginRadius authorization server for exchanging the code with the access token.
    
- The authorization server will return the access_token and refresh_token to the client (SP)
    
- The client can access the protected resource on Resource Server using the access token.

**Used By:** Web Applications (that have a server-side component that can keep the client secret confidential), native apps (with a public client and PKCE).

  

#### Implementation Steps

The following explains the implementation sequence for Authorization Code Flow:

**Step 1:** Get Authorization Code

To begin with Authorization Code flow, your application should redirect the consumer to the following authorization URL:

**Api Endpoint:**
```
https://cloud-api.loginradius.com/sso/oauth/redirect?client_id={LoginRadius API key}&redirect_uri={Callback URL}&scope={Scope}&response_type=code&state={random long string}
```

**API Method: GET**

Available Query Parameters

- **client_id:** [required]  The identifier of the customer at the authorization server. Enter the [LoginRadius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
- **redirect_uri:** [required]  Callback URL of your site where you want to redirect back your customers after an authorization code is granted.
    

> **Note:** Make sure to whitelist the Redirect_uri, which you are using to redirect your users on your website from your [Admin Console](https://adminconsole.loginradius.com/deployment/apps/web-apps). For more information refer to this [document](/api/v2/admin-console/deployment/sandbox-environments/).

  

- **scope:** [optional] The value under scope will be sent on the IDX Page.
    
- **state:** [optional] this parameter will be returned as it is, part of the response
    
- **response_type:**[required]  Set to  code to indicate an authorization code flow. find responses below:
     - Response of login dialog if response_type=code: YOUR_CALLBACK_URI?code={unique code}

LoginRadius also supports some additional query parameters that can be used in the authorization endpoint, to know more about this please click [here](#supportedqueryparameter14).

**Step 2:** Exchanging the Code for an Access Token

The authorization code is an intermediate credential, which encodes the authorization obtained at  **Step 1**.

To retrieve the access token, the client must submit the code generated in **Step 1** to the authorization server, using the  [Access token by OAuth 2 token API](/api/v2/single-sign-on/oauth2/access-token-by-oauth2-token).

**API Endpoint:**
```
https://cloud-api.loginradius.com/sso/oauth/access_token
```
**API Method: POST**

**Request Body:**

**Available Request Body Parameters**

Here is an explanation of the Request Body Parameter :

- **client_id:** [required] [LoginRadius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
- **redirect_uri:** [required] Callback URL of your site where you want to redirect back your customers.
    
- **client_secret:** [required] [LoginRadius API secret](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
- **code:** [required] The parameter received from the Login Dialog redirect above.
    
- **response_type:** [required] Value must be 'token' always
 
**API Response containing the access_token:**
```
{
"access_token": {Loginradius Access Token},
"token_type": {type},
"expires_in": {seconds till expiration},
"refresh_token" : {Refresh Token}
}
```

Step 3:  Using the obtained LoginRadius access_token in **Step 2**:

You can use the obtained `access_token`  with any of [LoginRadius  APIs](/api/v2/getting-started/introduction/) supporting the `access_token` until the token expires or revokes.

#### OAuth 2.0 PKCE Flow

PKCE is an extension to the Authorization Code flow to prevent certain attacks and to be able to securely perform the OAuth/OIDC exchange from public clients. It is primarily used by mobile and JavaScript apps, but the technique can be applied to any client as well.

##### Implementation Steps

The following explains the implementation sequence for Authorization Code with PKCE:

**Step 1:** Get the Authorization code

In the OAuth Authorization flow, we need to have the code verifier and code challenge to start with the authentication and an OAuth provider to connect.

The code_challenge and code_challenge_method parameters are only required in PKCE Flow.

API Endpoint:
```
https://cloud-api.loginradius.com/sso/oauth/redirect?client_id={client_id}&redirect_uri={Callback URL}&scope={Scope}&response_type=code&state={random long string}&code_challenge={code challenge}&code_challenge_method=SHA256
```
**API Method: GET**

**Available Query Parameters**

-   **client_id:** [optional] [Loginradius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
-   **redirect_uri:** [required] This will be the callback URL of your site where you want to redirect back your users for e.g https://abc.com.
    
-  **state:** [optional] A random string that returned with the `access_token` in the redirect callback. This parameter will be returned as it is and as part of the response.
    
-   **scope:** [required]  Should be set to one of the values, e.g., `openid`.
    
-   **response_type:** [required] Possible value is only 'code' to specify that you are doing the Authorization Code flow.
    
-   **code_challenge:** A BASE64-URL-encoded string of the SHA256 hash of the code verifier.
    > **Note:** Follow the steps below to generate a code challenge

-   **code_challenge_method:** SHA256 <For **code_challenge_method** currently, we are supporting the **SHA256** Hash algorithm, If this parameter  will not be passed, then the default method **SHA256** will be used>
    

LoginRadius also supports some **additional query parameters** that can be used in the authorization endpoint, to know more about this please click [here](#supportedqueryparameter14).

Steps for using **code_challenge** and **code_challenge_method** in PKCE flow.

1.  **Generate a Code Verifier:** The code verifier will be passed in the code_verifier parameter while exchanging the code with Access Token in  **Step 2**
    
2.  **Generate the code challenge:** This is passed in the **code_challenge** as a query parameter in the Authorization process and will be generated with the help of the code_verifier value.
    

We provide the ready-to-use **code** to generate the **code_verifier** and **code_chalange**, please refer to this [document](/single-sign-on/tutorial/federated-sso/pkce-flow/#generatingpkcecodeverifierandchallenge0)

  

> **Note:**
**The client_secret":**{Loginradius app API secret} is an optional parameter, you may or may not use this for validation purposes.

The provider will redirect you to the authentication/login page and you’ll get the code after successful authentication.

**Step 2:** Exchange Code with Access Token

In the code exchange request, we need to pass the code we have received through the above request and the code verifier that we have is generated in **Step 1**.

**API Endpoint:**
```
https://cloud-api.loginradius.com/sso /oauth/access_token
```

**API Method: POST**

**Request Body:**
```
{
"client_id":"<Your LoginRadius API Key>",
"client_secret":"<Your LoginRadius API Secret>",
"redirect_uri":"redirect_uri",
"response_type":"token",
"code":"code value", // That we have received in authorization request
"code_verifier": "code verifier value" // generated in the first step
}
```
**Available Request Body Parameters**

Here is an explanation of the Request Body Parameter :

  

-   **client_id:** [required] Loginradius app api key,
    
-   **client_secret:** [optional if using code verifier] Loginradius app api secret,
    
-   **redirect_uri:**[required] callback url passed in the authorization API,
    
-   **response_type:** [required] token,
    
-   **code:**[required] Authorization code received in the Authorization API
    
-   **code_verifier:** [required if not using client secret] code verifier (generated in the first step)
    

> **Note:** If you are passing **code_challenge** and the **code_challenge_method** in the authorization request then only the PKCE flow would work and in this case, **code_verifier** would be required to get the token in Exchange the authorization code request.

Once the code verifier hash matches with the **code challenge** of the authorization request, You will get the token in the response with status code 200 OK.

**API Response containing the access_token:**
```
{
"access_token": "c5a****b-****-4*7f-a********e4a",
"token_type": "access_token",
"refresh_token": "5*****82-b***-**82-8c*1-*******7ce",
"expires_in": 11972
}
```
That's it and you've implemented **PKCE** flow in your application.

## Implicit Flow

This section covers using the Implicit flow with LoginRadius. It is similar to Authorization Code flow except that the **response_type** can be a **token** or  both **code** and **token**.

If you are building a Single-Page Application that runs in older browsers that don't support Web Crypto for PKCE, then the Implicit flow is the recommended method for controlling access between your Single-Page Application and a resource server. The Implicit flow is intended for applications where the confidentiality of the customer’s secret can't be guaranteed.

In this grant type flow, the authorization server returns an access token directly when the user is authenticated rather than issuing an authorization code first.  
  
**Used By:** Mobile apps and web apps(applications that run in a web browser)  
  
> **Note:** Because it is intended for less-trusted clients, the Implicit flow doesn't support refresh tokens.

  
  

##### Implementation Steps

The following explains the implementation sequence for Implicit Flow:

**Step 1:**  Opening the login dialogue/authorization endpoint to get Authorization from LoginRadius CIAM.

To begin with Implicit flow , your application should redirect the consumer to the following authorization URL:

**API Endpoint:**
```
https://cloud-api.loginradius.com/sso/oauth/redirect?client_id={LoginRadius API key}&redirect_uri={Callback URL}&scope={Scope}&response_type=code&state={random long string}
```
**API Method: GET**

**Required Parameters**

The access token request will contain the following parameters. Here is an explanation of the URL Parameter:

-   **client_id:** [required]The identifier of the customer at the authorization server. Enter the [LoginRadius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
-   **redirect_uri:** [required] Callback URL of your site where you want to redirect back the customers after an authorization code is granted.
    
> **Note:** Make sure that you have whitelisted the Redirect_uri in your LoginRadius [Admin Console.](https://adminconsole.loginradius.com/deployment/apps/web-apps) For more information, refer to this [document](/api/v2/admin-console/deployment/sandbox-environments/).

-   **scope:** [optional] The value under scope will be sent on the IDX Page.
    
-   **state:** [optional] this parameter will be returned as it is, part of the response
    
-   **response_type:** [required]  Set to  **token**, or it could be both **code** and **token**. The following are the response structures for both cases:
    

   1.Response of login dialog if **response_type=token:** YOUR_CALLBACK_URI?token={LoginRadius access token}
    
   2.Response of login dialog if **response_type=code,token**:  YOUR_CALLBACK_URI?code={unique code}&token={LoginRadius access token}&state={Same value which is passed in request}:
    

**Step 2:** Utilize Access Token:

Now you can use the obtained `access_token`  with any of [LoginRadius  APIs](/api/v2/getting-started/introduction/) supporting the `access_token` until the token expires or revokes.

LoginRadius also supports some **additional query parameters** that can be used in the authorization endpoint, to know more about this please click [here](#supportedqueryparameter14).

## Resource Owner Password Credential Flow

The Resource Owner Password Credentials flow help the client to fetch access_token and refresh_token using the username and password. In this flow, the user’s password is accessible to the application so it requires strong trust in the application by the user.

This flow doesn't require redirects like the Authorization Code or Implicit flows and involves a single authenticated call to the /token endpoint.  
  
**Used By:** It is used by consumer where user has strong trust in the application

#### Implementation Steps

The following explains the implementation sequence for Resource Owner Password Credentials Grant flow:

The Resource Owner Password Credentials Grant flow allows you to obtain an access_token by utilizing the customer’s traditional username/email/phoneid and password credentials.

**Step 1:** Use the [Access Token by Account Password](/api/v2/single-sign-on/oauth2/access-token-by-account-password)  to obtain an access_token.

**API Endpoint:**
```
https://cloud-api.loginradius.com/sso/oauth/access_token
```
**API Method: POST**

Request Body:
```
{
"client_id": "<Your LoginRadius API Key>",
"client_secret": "<Your LoginRadius API Secret>",
"grant_type": "password",
"username": "<Should be, email/phoneid/username of the customer>",
"password": "<The password of the account to login>"
}
```
**Available Request Body Parameters:**

Here is an explanation of the Request Body Parameters :

-   **client_id:** [required] [LoginRadius API key.](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
-   **client_secret:** [required] [LoginRadius API secret.](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
-   **grant_type:** [required] Value must always be 'password'.
    
-   **username:** [required] You must provide the customer's email/username/phoneid, depending on how you have configured LoginRadius for authentication.
    
-   **password:** [required] The customer's account password.

**API Response containing the access token**
```
{
"access_token": {Loginradius Access Token},
"token_type": {type},
"expires_in": {seconds till expiration},
"refresh_token" : {Refresh Token}
}
```
  

**Step 2:**  Using the obtained LoginRadius access_token in **Step 1**:

You can use the obtained access_token with any of [LoginRadius  APIs](/api/v2/getting-started/introduction/) supporting the access_token until the token expires or revokes.
  
## Device Code Flow

  

This flow enables OAuth clients on such devices (like smart TVs, media consoles, digital picture frames, and printers) to obtain user authorization to access protected resources without using an on-device user agent.

  

##### Flow Diagram:

![FLOW](https://apidocs.lrcontent.com/images/Ae-1_987862fe5b8525d752.10393295.png "FLOW")

  

##### Usage

  

Used in internet-connected devices that either lack a browser to perform a user-agent based authorization or are input-constrained to the extent that requiring the user to input text to authenticate during the authorization flow is impractical. When signing into apps and services on devices such as a Playstation or an Apple TV.

  

##### Workflow

  

There are two devices ( one input restricted device and other browser-based device) are involved in this workflow.

  

  

**Input restricted devices like Smart TVs**

  

1. When a consumer comes to input restricted device, the Device Code API will be called to get the device_code and user_code.

2. After that, the Device Code Exchange Token Ping API will be called with a certain internal, PollingInterval and wait till the access token is returned by the Device Code Exchange Token Ping API.

  

**Browser-based Device**

  

1. On the **verification URL**, the consumer will enter the device_code, the customer will be redirected to the Device Code Confirm URL with the user_code `(https://<siteurl>/service/oauth/<OAuthAppName>/device/confirm?client_id=<APIKey>&user_code=<User Code Genertaed from the Get Device Code API>)`

  

2. The Device Code Confirm URL with the user_code `(https://<siteurl>/service/oauth/<OAuthAppName>/device/confirm?client_id=<APIKey>&user_code=<User Code Genertaed from the Get Device Code API>)` will show the IDX page to login.

3. After login, the consumer will be redirected to the **afterverificationURL**.

  

##### Configuration

  

To enable the device code flow feature for your account, you need to [**create a support ticket**](https://adminconsole.loginradius.com/support/tickets) to the LoginRadius Support team. You should provide the following details at the time of configuration :

  

- **Device Code App Name:** Please provide any name you want to use in your Device code API calls.

- **PollingInterval:** When device_code is returned by the Device Code API to the input restricted device, the device will start pinging the Device Code Exchange Token Ping API on the Device, so this Poll Internal is the minimum time between two pings,e.g. the poll interval is set 10 (in second), after first ping if another ping in the 7 seconds, API will return an error of slow_down and if the second ping is called after 10s, then it will return an appropriate response (error authorization_pending in case of token not attached to device code yet or onsuccess will return the access token, etc.)

  

- **Expiry time for device_code (in seconds)**

- **Expiry time for access_token (in seconds)**

- **Expiry time for Id_token (in seconds)**

- **VerificationUrl:** Please provide the URL of page where the user will enter the user code

- **AfterVerificationUrl:** Please provide the URL of page where after successful authentication, user will be redirected)

- **UserCodeMask:** The pattern which will be used to generate the device_code, e.g., `***-*** => ACS-Q23, **-**-** => AX-4R-AW`, etc.)

  

##### Implementation Steps

The following explains the implementation sequence for Device Code Flow:

**Step 1:** Use the **Request Device Code API** to request a new device code, user code from the Device code Endpoint ( you could show a message to ask the consumer to open the verification URL to complete the authetnicaiton on the browser-base device).

| | |
|--|--|
| Method | POST |
| Endpoint | `https://{siteurl}/api/oauth/{OAuthAppName}/device`  <br><br>Note: where siteurl is the LoginRadius IDX domain url, e.g., `<LR appname>.hub.loginradius.com`. If you are using a custom domain for your IDX page, then use custom domain value in place of siteurl.|
|Header|application/json OR application/x-www-form-urlencoded|
|Body (json content type)|{<br>"client_id": "<APIKey>",<br>"scope": "openid email profile"<br>} <br><br>Note: <br>**1.** Please see [LoginRadius API key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0) for how to get APIkey for your app.<br>**2.** Scope: [optional] (e.g email profile)|
|Response|{<br>"interval": 10,<br>"expires_in": 1800,<br>"device_code": "1522d771f27b408baca35eca7d81c37d",<br>"user_code": "MXD-TPV",<br>"verification_uri":"https://example.com/federation/device/activate.php,<br>"verification_uri_complete":"https://example.com/federation/device/activate.php?user_code=MXD-TPV"<br>}|
  
**Step 2:** Use the device_code and keep calling **Device Code Exchange (Ping API)** till you get the access token.

| | |
|--|--|
| Method | POST |
| Endpoint | `https://{siteurl}/api/oauth/{OAuthAppName}/token` |
| Header | application/json OR application/x-www-form-urlencoded |
| Body (json content type) | {<br>"client_id": "<APIKey>",<br>"grant_type":"urn:ietf:params:oauth:grant-type:device_code",<br>"response_type": "token",<br>"device_code": <Device Code generated from the Get Device Code API><br>} |
| Response | {<br>"expires_in": 3598,<br>"refresh_token": "d87cc355cdc61a6b...507",<br>"access_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjkzMWVlYz...Vn33edUA0hQCSA",<br>"token_type": "Bearer"<br>} |

**Step 3:** Once the consumer enters the **user_code** value on the **verificationURL** on the browser-based device, redirect the consumer to the Device Code Confirm URL with the **device_code**  `(https://<siteurl>/service/oauth/<OAuthAppName>/device/confirm?client_id=<APIKey>&user_code=<User Code Genertaed from the Get Device Code API>)`

**Step 4:** LoginRadius will show IDX page and the consumer logs in successfully on the IDX. After successful authentication, the consumer will be redirected to **AfterVerificationURL**.

**Step 5:** You can show a static page with a success message on the **AfterVerificationURL**.

The following are some of the error response that you might get during Device Code Flow setup:

| Error Name | Error Response | Error Description |
|--|--|--|
| Authorization Pending | `{"error":"authorization_pending","error_description":""}`| The authorization request is still pending as the end-user hasn't yet completed the user code authentication. The client should repeat the Access Token Request to the token endpoint using polling. |
| Slow Down | `{"error":"slow_down","error_description":""}` | Before each new request, the client MUST wait at least the number of seconds specified by the "interval" parameter of the Device Authorization Response. |
| Expire Token | `{"error":"expired_token","error_description":"" }` | When an access token is expired |
| Access Denied | `{ "error":"access_denied","error_description":"" }` | If the user denied the authorization |
  

## Supported Query Parameter

Depending on the workflow you choose to leverage, you will need to add different query parameters to the Authorization URL that points to the Login page.

> **Note:** In the [Authorization Code Flow (Explicit)](#authorizationcodeflowexplicit6) the authorization endpoint will be used for authentication and authorization and will return an authorization grant to the client.

You can use the table below for an overview of all of the different parameters that can be passed to the Authorization Endpoint.  

### Authorization Endpoint Supported Parameters

|  |  | 
|--|--|
| client_id | (required) [Loginradius API Key](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0) |
| redirect_uri | (required) This is the URI to which the response should be sent.**Note:** This must be whitelisted in the App Section in the LoginRadius Admin Console.|
|response_type | (required) This defines the processing flow to be used when forming the response.<br><br>**Authorization Code Flow or PKCE Flow:**<br> response_type: code<br><br> <br><b>**Note:** LoginRadius also supports adding multiple response types and the value must be separated by space, like **response_type: code token.**<br> **Implicit Flow:**<br> response_type: token<br>response_type: code token<br> <br>**Exchanging the Code for an Access Token** <br>response_type: token<br> |
| state | (optional) It is recommended that you use this parameter to maintain the state between the request and the callback. Typically, Cross-Site Request Forgery (CSRF, XSRF) mitigation is done by cryptographically binding the value of this parameter with a browser cookie. | 
| scope | optional) Specifies the scope of the requested token. If omitted, the authorization server may assume some default scope. |

> **Note:** While passing the URL with query param in the **scope** you need to double encode the URL and then use it in the scope.

  

**Javascript Example**
```
var registrationUrl = encodeURIComponent(encodeURIComponent("https://www.abc.com/plus?" +encodeURIComponent("param1=aaa&param2=bbb")))

var scope = encodeURIComponent("profile&action=login&registration_url=" + registrationUrl);

var authorizationEndpoint = "https://cloud-api.loginradius.com/sso/oauth/redirect?scope=" + scope + "&state=ddd&response_type=coderedirect_uri=https%3A%2F%2Fabc.com&client_id=";
```

## Additional Steps in Oauth 2.0

### Refresh access token

  

Once you have obtained an access_token, you can use the  [Refresh Access Token API](/api/v2/single-sign-on/oauth2/access-token-by-refresh-token)  to refresh the access_token.

**Available Request Body Parameters:**

Here is an explanation of the Request Body Parameter:

-   **client_id:** [required]  [LoginRadius API key.](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0)
    
-   **client_secret:** [required] [LoginRadius API secret](/api/v2/admin-console/platform-security/api-key-and-secret/#gettingyourapikeyandsecret0).
    
-   **grant_type:** [required] The grant_type needs to be a refresh_token.
    
-   **refresh_token :** [required] This is the refresh_token you received when you used the 'Access token by OAuth 2 token' and 'Access Token by Account Password' API call
    

**API Response containing the refresh access_token:**
```
{
"access_token": "Loginradius Access Token",
"token_type": "type",
"expires_in": "seconds till expiration",
"refresh_token": "Refresh Token"
}
```

### Post Callback Feature

  

By default, LoginRadius sends the token (Access token), id_token, and code as a query parameter in the implicit and hybrid workflows.

However, it is more secure to send an access token as a post parameter. To leverage such functionality, we are supporting Post Callback in the Cloud Redirection APIs.

In the Post Callback, after the login from the Hosted Page, the token is passed to `return_url` (Callback Url) as the **Post Form Request**. The token is passed in the Post body instead of the Query String. If you want to send the Access token as post parameters instead of QueryString, you can implement this functionality.

You can achieve this by changing the code in the **default-auth-before-script.js** file under the [Admin Consol](https://adminconsole.loginradius.com/deployment/idx)(If the Section is not enabled kindly contact [Support team](https://adminconsole.loginradius.com/support/tickets)) In this file you need to edit the function `redirectToReturnUrl` as given in the below:
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

**1.**  This is the Sample function. You may have some different implementations for this function, So changes will be according to your Implementation.
    
**2.**  This feature is not enabled for any customer by default, to enable this you need to change the Before Script function according to the above code snippet.
    
**3.**  By default, the token will be sent to the query string for the Cloud Redirection callback URLs, (As currently working), So it will not impact any customer implementation.

## Troubleshooting & FAQs

#### Troubleshooting

  

-   **I am getting the error “The code has expired” in the Authorization code flow how to fix this?**
    - "The code has been expired" error comes when the auth code is expired. For security concerns, the expiry time is 50 sec, so the code needs to be utilized within 50 sec.

-   **I am getting an invalid_request error while calling Authorization Endpoint?**
    - This error usually occurs when the **client Id (LoginRadius API Key )** is invalid.

-   **While using the [Additional API Secret](https://adminconsole.loginradius.com/platform-security/data-access-protection/api-credentials/additional-api-secrets) it through error `unauthorized_client` having message The `client_secret` is not valid, check your `client_secret` again?**
    - When the Oauth API is hit, we are having caching of AppConfig for 15 min for better Performance. So if the new APISecret is generated in that time (15 min), that will not be able to be used till the cache is expired.
    
     So it is recommended to wait till **15 Min** after generating Additional Secret and after **15 Min** Appconfig gets a new configuration and Additional API Secret will work.

-   **I am getting the error The host is not whitelisted while calling OAuth Authorization Url, how to fix this?**
    - This error occurs when the redirect URL that is being used under **Authorization URL** is not whitelisted so to resolve this issue the redirect URL needs to be whitelisted under [Deployment>Apps>Web Apps](https://adminconsole.loginradius.com/deployment/apps/web-apps).

## Faqs

-   **What is the maximum number of configured Authorization Server APIs or a maximum number of redirect URIs supported by LoginRadius?**
    - There is no limit to adding the Authorization Server API or redirect URLs.

-   **While calling the OAuth Authorization endpoint can we open this inside popup instead of redirection?**
    - You can refer to this [document](/libraries/identity-experience-framework/customization/#implementingthepageasapopup24) for a step by step guide to implement the Popup feature.

-   **Can we share Access Token or code generated in Oauth workflow with a third party application?**
    - Due to security reasons we never recommend sharing a user Access token or Code with a third party.

# Next Steps

The following is the list of documents you might want to look into:

-   [JWT](/single-sign-on/tutorial/federated-sso/jwt-login/jwt-implementation-guide/)
    
-   [Open ID Connect](/single-sign-on/tutorial/federated-sso/openid-connect/openid-connect-overview/)
    
-   [SAML](/single-sign-on/tutorial/federated-sso/saml/overview/)
    
-   [Multipass](/single-sign-on/tutorial/federated-sso/overview/)