# Social Login Getting Started

This component of Customer Registration allows your customers to skip the forms by automatically creating customer profiles. This enables them to sign-in to your website with their existing social media accounts like Facebook, Twitter, and Google+.

## Introduction

Social Login allows your customers to skip the forms by automatically creating customer profiles. This enables them to sign-in to your website with their existing social media accounts like Facebook, Twitter, and Google+.

<iframe width="560" height="315" src="https://www.youtube.com/embed/F1FrgjtGXZ8?si=WtElZOAetWPDe8LM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

Before choosing your SDK, you should get familiar with your LoginRadius Admin Console. You should be able to comfortably setup and configure social providers before continuing. If you do not configure your social providers correctly, you will run into issues later in these guides.

## Getting Started

Depending on the social providers you have selected for your application/website, you should review what data points are available to you. While LoginRadius does normalize the data, we cannot guarantee the provider will supply all our data points.

An updated chart of all data points based on providers can be found here:

https://www.loginradius.com/datapoints

While many SDKs will abstract away the API requests, you may want to understand all the endpoints available to you to best utilize your application’s experience.

## Endpoints

Base URL for all API requests:

https://api.loginradius.com

It is also important to include the header with your request:

Accept: application/json

To better learn how to use each endpoint, check the details within each API.

> **For Optional Parameters**  
> **Note:** Parameters marked as optional should still be included in the request as a blank string. Eg: `<Base Url>/identity/v2/auth/account/ping?apikey=<LoginRadius API Key>&clientguid=<Client GUID>&verificationurl=&emailtemplate=&welcomeemailtemplate=`

When a user initiates a social login (e.g., via Facebook or Google), the request is sent to RequestHandler.aspx. If the **NoCallback** feature is enabled, this request includes a **Client GUID** as a query string parameter. The **Client GUID** is a unique identifier for that specific login session.

The **LoginRadius V2.js** library handles the social login process, which involves popping up a window where the user can authenticate with their chosen social provider. Once the user completes the social login process, the popup window closes.

After the popup window closes, the parent page (the original page from which the login was initiated) sends a request to the **Ping API** using the **Client GUID**. The **Ping API** verifies the status of the login session identified by the **Client GUID** and responds with the user profile and access token if the social login was successful. The access token is used for subsequent authenticated requests to the application.

> **Note:** If **LoginRadius V2.js**  is not being utilized, in that case, any random string can be passed as **Client GUID**.

## Social Login with Ping API

In the default social login flow, the LoginRadius can send the access token as a query parameter or as a post parameter depending on the value of **commonOptions.callbackType.** The default value for **commonOptions.callbackType** is Post. In the default workflow when a successful social login completes, an HTTP(s) callback to LoginRadius is required to the parent window URL where the social login was initiated.

**Social Login with Ping API** workflow allows you to access the LoginRadius token via the [SocialLogin by Ping API](/api/v2/customer-identity-api/social-login/social-login-by-ping/) . In this workflow, when the social login is initiated, LoginRadius starts calling continually [SocialLogin by Ping API](/api/v2/customer-identity-api/social-login/social-login-by-ping/) in the parent window. Once the social login is completed at the social provider’s interface, LoginRadius **returns the access token** in the **SocialLogin by Ping API** calls. This feature is not enabled by default. Please contact the LoginRadius [support team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) to enable this for your account.

By enabling the **Social Login with Ping API** feature, you can leverage **SocialLogin by Ping API** to get the access token with the user profile so that you don’t have to use a callback page for your Social login.

### Using LoginRadius SocialLogin library functions

You need to define the **commonOptions.noCallbackForSocialLogin = true** to get the token via the Ping API. LoginRadius starts calling the **SocialLogin by Ping API** automatically and returns the token with the user profile data in the **sl_options.onSuccess** function. Please see Social Login (https://www.loginradius.com/docs/libraries/js-libraries/getting-started/#sociallogin8) for more details on how to implement social login workflow using LoginRadius library function.

### Using Programmatic Link

You can bypass the template engine entirely and create your own links to be included on buttons or triggered events for ping API. You will need to create a unique random string **callbackguid** and include it in your programmatic link. In order to trigger the authentication, you should format your links as follows:

```
https://<Your_Site_Name>.hub.loginradius.com/RequestHandler.aspx?apikey=<API_Key>&provider=google&nocallback=true&callbackguid=<uniuqe random guid value>
```

Here, **nocallback=true** in query indicates that the login request will be without the callback, and **callbackguid=<Random_Identifier>** is a random unique identifier. You will need to call the **SocialLogin by Ping API continually with the same callbackguid** value to fetch the access token with the user profile data.

## FAQ

**Performing social login in the Apps e.g Facebook/Instagram build-in browsers leading to blank screen after authentication.**

If you are using Social Login on websites that are rendered inside the Apps like Facebook/Instagram build-in browsers, then you need to set `callbacktype=hash` in the implementation. **For example:** If you are using the Facebook social provider, then LoginRadius Social Login request handler URL should be as below, i.e., containing a `callbacktype` in query paramter:

```
https://<LoginRadius site name>.hub.loginradius.com/RequestHandler.aspx?apikey=<LoginRadius API Key>&provider=<Social Provider Name>&callbacktype=hash&callback=<Callback URL>
```

**Why it need to be done?**

Whenever a user clicks on the social login option, by default the Social login request handler endpoint directly opens the callback/redirect URL in the child window, since the Apps build-in browsers does not support child window this leads to an error resulting into a blank screen. To avoid that error it is required to use **callbacktype=hash**.

**How will it resolve the issue?**

With the parameter **callbacktype=hash** in the LoginRadius social login request handler url whenever the user clicks on the requestHandler endpoint(social icon), it will redirect to the callbackurl paased, and you will get an access token as a hash (fragment) parameter on the callback url.

Once the access token is received, you can leverage the access token as required.

Example: **With callbacktype=hash :** `https://<Your Callback URL>#lr-token=<LoginRadius Access Token>`

**Will any other callbacktype work?**

Yes, if you need the token in the from of query string than you can use the **callbacktype =QueryString** and after this you will receive the token in the form of **query parameter** and if you want the token in hash format then you can use callbacktype=hash which will give the token in **hash (fragment)**. So, you can use any of **callbacktype** as per you usecase.

Example: **With callbacktype=QueryString :** `https://<Your Callback URL>?lr-token=<LoginRadius Access Token>`
