# Machine to Machine Authorization

This document explains the OAuth 2.0 client credentials grant (M2M) workflow and discusses how to implement this flow to authorize partner internal and external devices.

## Overview

Machine to Machine Authorization is usually an authorization process used to authorize partner internal and external devices. The partner device initiates the authorization process, and the LoginRadius server validates the credentials and provides access to the device to specific resources as per the configuration.

In the normal authorization process, the LoginRadius service authorizes a user, but in M2M authorization, we authorize partner devices based on the Machine to Machine communications. To be clear, in this case, the client is simply an application, process, or even an autonomous system.

There are many use cases of a system where machine-to-machine authorization is required, e.g., service to service, a daemon to the backend, CLI client to internal service, and IoT tools.

## Use Case

Client Credential grant (M2M) flow is used when the app is also the resource owner. For example, an app may need to access a backend cloud-based storage service to store and retrieve data to perform its work, rather than the end-users specific data. This grant-type flow occurs strictly between a client app and the authorization server. An end-user does not participate in this grant-type flow.

1. Service-to-Service (Application) authentication
2. IoT device authorization
3. LoginRadius as authorization provider in the other external API

## How It Works

The following flow diagram illustrates the client credentials flow(M2M) with LoginRadius serving as the authorization server

![M2M Flow Diagram](https://apidocs.lrcontent.com/images/M2M-Flow-Diagram_82926143bbb7f31508-14281419-1_143363650865bc9643660ea2.61774621.png "M2M Flow Diagram")

In the client credentials grant, the client server holds two pieces of information: the **client ID** and the **client secret**. With this information, the client server can request an access token for a protected resource.

1. The client(server) requests the authorization server (Loginradius) and sends the **client ID**, the **client secret**, along with the **audience**, and other claims.
2. The authorization server validates the request and, if successful, sends a response with an access token.
3. The client can now use the access token to request the protected resource from the resource server to access the protected resource.

**Example**

The client credentials grant is very simple to use. The following are the relevant HTTP requests:

```
POST https://<siteurl>/service/oauth/token
Content-Type: application/json
{
  "audience": "<API_IDENTIFIER>",
  "grant_type": "client_credentials",
  "client_id": "<YOUR_CLIENT_ID>",
  "client_secret": "<YOUR_CLIENT_SECRET>"
}
```

A successful authorization request results in a response like the following:

```
HTTP/1.1 200 OK
Content-Type: application/json
{
  "access_token": "eyJz93a...k4laUWw",
  "token_type": "Bearer",
  "expires_in": 86400,
}
```

> **Note:** Clients who hold the **client secret** must always be used in places with no risk of that secret being misused. For example, while it may be a good idea to use the client credentials grant in an internal daemon that sends reports across the web to a different part of your system, it cannot be used as a public tool that any external user can download from GitHub.

## Admin Console configuration for M2M Authentication

Refer to the following steps to configure the M2M authorization flow on your application:

1. Navigate to [Platform Configuration > Authentication Configuration > Machine To Machine Authorization > Authorization Server APIs](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/machine-to-machine-authorization/authorization-server-apis) In this section, you can create APIs according to your business requirements by defining name, identifier, and scope. You can only add the scope name here, and the actual scope must be handled in your implementation.

   ![Manage Authorization Server APIs](https://apidocs.lrcontent.com/images/Manage-Authorization-Server-APIs_2006861439e204a0c66.21249735.png "Manage Authorization Server APIs")

2. Click on **Add API** and fill out the details.

   ![Add a New API](https://apidocs.lrcontent.com/images/Machine-To-machine-authorization---LoginRadius-User-Dashboard_305516202d7f02c5621.38834197.png "Add a New API")

   - The name field will contain the name that you want to put for your API.
   - The Identifier contains the URL of the customer's management API.
   - Scopes fields and their descriptions can be added here.

   > **Note:** You can only add the scope name here. The actual scope must be handled in your implementation. For more information about the available default scopes, refer to the below image.

   ![Scopes](https://apidocs.lrcontent.com/images/Scopes_2148061439f4f05e3f4.86652704.png "Scopes")

3. After adding the details, click on **Save**.

   ![Add a New API](https://apidocs.lrcontent.com/images/Machine-To-machine-authorization---LoginRadius-User-Dashboard_305516202d7f02c5621.38834197.png "Add a New API")

4. Now, navigate [Platform Configuration > Authentication Configuration > Machine To Machine Authorization > Machine To Machine App](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/machine-to-machine-authorization/machine-to-machine-app). In this section, you can create M2M apps and grant them API access as needed. You can select the applicable scope for each app, specify the name, token lifetime (in seconds), and more. A unique API Key and Secret is generated for each app that can be utilized during the Machine to Machine communication.

5. Click on **Add APP** and fill out the details.

   ![Add App](https://apidocs.lrcontent.com/images/Machine_139316202dfd52af9e1.00649751.png "Add App")

   > **Note:** You can now select **multiple** scopes from the list that you have defined when creating the M2M API. Refer to the image below for more clarification.

   ![select scope](https://apidocs.lrcontent.com/images/APP_138296202e0157fc2d7.89780138.png "select scope")

6. After filling out all the details, click on the **Save button**. You will see an App being created for you. Now you will get the Client ID and Client Secret credentials.

   > **Note:** The **Client secret** will be visible only for one time. So it is better to copy it somewhere so that you can easily use it next time.

   ![Client Id and Secret](https://apidocs.lrcontent.com/images/Client-Id-and-Secret_82046143a3a9dcaca5.00814031.png "Client Id and Secret")

The client can use these Client ID and Client Secret credentials to generate the M2M Access Token when he leverages our [Generate Access Token Using Client Credential Flow API](https://www.loginradius.com/legacy/docs/api/v2/single-sign-on/Machine-to-Machine/generate-access-token-using-client-credential-flow/).

## Steps in the client credentials flow

This section will guide you through implementing the client credentials code(M2M) grant type where LoginRadius is the authorization server. Remember, with this flow, the client app simply presents its client ID and secret, and if they are valid, Loginradius returns an access token.

1.  Customer/Server request for JWT token from management API:

    `https://api.loginradius.com/services/oauth/token`

    ```
    POST https://<LoginRadius Site Name>/service/oauth/token
    Content-Type: application/json
    {
    "audience": "https://api.loginradius.com/identity/v2/manage",
    "grant_type": "client_credentials",
    "client_id": "<YOUR_CLIENT_ID>",
    "client_secret": "<YOUR_CLIENT_SECRET>"
    }
    ```

2.  It will validate the requested details, and if all details are valid, it will return them.
    ```
    JWT access token
    {
    "access_token": "eyJz93a...k4laUWw",
    "token_type": "Bearer",
    "expires_in": 86400,
    }
    JWT Token Details
    {
    "iss": "https://<siteurl>/",
    "sub": "<OAuth APPs APIKey>@client",
    "jti": "<unique Identitfier>"
    "aud":"https://api.loginradius.com/identity/v2/manage", //or https://service.example.com/api/v2
    "cid": "<APPConfig APIKey>",
    "sid": "<LR access Token>"
        "exp": 1311281970,
    "iat": 1311281670,
    "scp": [
    "profile:read",
    "profile:create",
    ],
    "gty":"client_credentials"
    }
    ```
3.  Customer/Server validate the token

4.  Now, with a valid JWT token, the customer can call all [management APIs](https://www.loginradius.com/legacy/docs/api/v2/single-sign-on/Machine-to-Machine/validating-the-JWT/). APIs will work as per the assigned permissions, and there is no need to use the secret.

    ```
    curl --request GET \

    --url https://api.loginradius.com/identity/v2/manage/account/{uid} \

    --header 'authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6InVfY1BUdi1hMnF1c2hyYURJbnVWUCJ9.eyJpc3MiOiJodHRwczovL2xlYXJuaW5ndGFiLnVzLmF1dGgwLmNvbS8iLCJzdWIiOiJudHZuSXlHeXFIdmpyRGVrSzJBVHBmNHRTbHlJSXlNdUBjbGllbnRzIiwiYXVkIjoiaHR0cHM6Ly9sZWFybmluZ3RhYi51cy5hdXRoMC5jb20vYXBpL3YyLyIsImlhdCI6MTYxODIxNzkwNywiZXhwIjoxNjE4MzA0MzA3LCJhenAiOiJudHZuSXlHeXFIdmpyRGVrSzJBVHBmNHRTbHlJSXlNdSIsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnNfYXBwX21ldGFkYXRhIHVwZGF0ZTpsaW1pdHMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.kkfuFMQ-wGUcbinXSwfhXS7NwDDPQnvZUM8OWm565BfD26KefAUanUK-Vd6MX7oj4HG6yBoWL_4KxU3x1pI5whNM9Aa3Meu4Mkm8AQvCBqWJ4-7SrHwa9SPscAte9i9_jl_hsCcF13FZcEAbNehH6GFkyKvIvXS-6jEphmDM4u_PWby0IgsqN40SJByg0dLElq7uDourIxBglE7uyi1ebeB7feJ5UQY8qHRX18AhRkXXuALg02f_IyCSLqVBpeTWLazdfNjMqhPSzwpklcLmLCnd9XyerxuwN_C6qd_BXbD1KPRaOFQMgRi9O_8Qu60QADEPwh9iRAtLm27h_jVZ2w'

    --header 'X-LoginRadius-ApiKey: {apiKey}
    ```

5.  According to scope or permission management API will work

## Custom API Authentication

1. You can add multiple custom APIs in your account.

   ```
   POST https://<siteurl>/service/oauth/token
   Content-Type: application/json
   {
   "audience": "<custom API end point>",
   "grant_type": "client_credentials",
   "client_id": "<YOUR_CLIENT_ID>",
   "client_secret": "<YOUR_CLIENT_SECRET>"
   }
   ```

   > **Note:** This **siteurl** field contains the LoginRadius IDX/Custom Domain url. E.g., if your LoginRadius app name is company name then the siteurl will be companyname.hub.loginradius.com. If you are using a custom domain for your IDX page, then use custom domain value in place of siteurl.

2. You can use generated JWT token in the authorization for management APIs

   ```
   curl --request GET \

   --url <Customer API > \

   --header 'authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6InVfY1BUdi1hMnF1c2hyYURJbnVWUCJ9.eyJpc3MiOiJodHRwczovL2xlYXJuaW5ndGFiLnVzLmF1dGgwLmNvbS8iLCJzdWIiOiJudHZuSXlHeXFIdmpyRGVrSzJBVHBmNHRTbHlJSXlNdUBjbGllbnRzIiwiYXVkIjoiaHR0cHM6Ly9sZWFybmluZ3RhYi51cy5hdXRoMC5jb20vYXBpL3YyLyIsImlhdCI6MTYxODIxNzkwNywiZXhwIjoxNjE4MzA0MzA3LCJhenAiOiJudHZuSXlHeXFIdmpyRGVrSzJBVHBmNHRTbHlJSXlNdSIsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnNfYXBwX21ldGFkYXRhIHVwZGF0ZTpsaW1pdHMiLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMifQ.kkfuFMQ-wGUcbinXSwfhXS7NwDDPQnvZUM8OWm565BfD26KefAUanUK-Vd6MX7oj4HG6yBoWL_4KxU3x1pI5whNM9Aa3Meu4Mkm8AQvCBqWJ4-7SrHwa9SPscAte9i9_jl_hsCcF13FZcEAbNehH6GFkyKvIvXS-6jEphmDM4u_PWby0IgsqN40SJByg0dLElq7uDourIxBglE7uyi1ebeB7feJ5UQY8qHRX18AhRkXXuALg02f_IyCSLqVBpeTWLazdfNjMqhPSzwpklcLmLCnd9XyerxuwN_C6qd_BXbD1KPRaOFQMgRi9O_8Qu60QADEPwh9iRAtLm27h_jVZ2w'
   ```
