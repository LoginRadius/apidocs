# Social Login Getting Started

This component of Customer Registration allows your customers to skip the forms by automatically creating customer profiles. This enables them to sign-in to your website with their existing social media accounts like Facebook, Twitter, and Google+.

## Introduction

Social Login allows your customers to skip the forms by automatically creating customer profiles. This enables them to sign-in to your website with their existing social media accounts like Facebook, Twitter, and Google+.

<iframe src="https://www.youtube.com/embed/F1FrgjtGXZ8" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

Before choosing your SDK, you should get familiar with your LoginRadius Admin Console. You should be able to comfortably setup and configure social providers before continuing. If you do not configure your social providers correctly, you will run into issues later in these guides.

## Getting Started

Depending on the social providers you have selected for your application/website, you should review what data points are available to you. While LoginRadius does normalize the data, we cannot guarantee the provider will supply all our data points.

An updated chart of all data points based on providers can be found here:

http://www.loginradius.com/datapoints

While many SDKs will abstract away the API requests, you may want to understand all the endpoints available to you to best utilize your application’s experience.

## Endpoints

Base URL for all API requests:

https://api.loginradius.com

It is also important to include the header with your request:

Accept: application/json

To better learn how to use each endpoint, check the details within each API.

> **For Optional Parameters**   
> **Note:** Parameters marked as optional should still be included in the request as a blank string. Eg: <Base Url>api/v2/status?access_token= <access_token>&title=&url=&imageurl=&status=<required_field>&caption=&description=


## Social Login with Ping API

In the default social login flow, the LoginRadius can send the access token as a query parameter or as a post parameter depending on the value of **commonOptions.callbackType**. The default value for **commonOptions.callbackType** is post. In the default workflow when a successful social login completes, an HTTP(s) callback to LoginRadius is required to the parent window URL where the social login was initiated. 

**Social Login with Ping API** workflow allows you to access the LoginRadius token via the [**SocialLogin by Ping API**](/api/v2/customer-identity-api/social-login/social-login-by-ping/). In this workflow, when the social login is initiated, LoginRadius starts calling  continually [**SocialLogin by Ping API**](/api/v2/customer-identity-api/social-login/social-login-by-ping/). in the parent window. Once the social login is completed at the social provider’s interface, LoginRadius **returns the access token** in the **SocialLogin by Ping API** calls. 

>**Note**: The NoCallback feature is not enabled by default, for enabling this feature contact the LoginRadius [support team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket). 
>By enabling the **Social Login with Ping API** feature, you can leverage **SocialLogin by Ping API** to get the access token with the user profile so that you don’t have to use a callback page for your Social login.

### Using LoginRadius SocialLogin library functions

You need to define the **commonOptions.noCallbackForSocialLogin = true** to get the token via the Ping API. LoginRadius starts calling the **SocialLogin by Ping API** automatically and returns the token with the user profile data in the **sl_options.onSuccess** function. Refer to [Social Login](https://www.loginradius.com/docs/libraries/js-libraries/getting-started/#sociallogin8) for more details on how to implement social login workflow using LoginRadius library function. 

### Using Programmatic Link 

You can bypass the template engine entirely and create your own links to be included on buttons or triggered events for ping API. You will need to create a unique random string **callbackguid** and include it in your programmatic link. In order to trigger the authentication, you should format your links as follows:

```
https://<Your_Site_Name>.hub.loginradius.com/requesthandlor.aspx?apikey=<API_Key>&provider=google&nocallback=true&callbackguid=<uniuqe random guid value>
```

Here, **nocallback=true** in query indicates that the login request will be without the callback, and **callbackguid=<<here>Random_Identifier>** is a random unique identifier. You will need to call the **SocialLogin by Ping API continually with the same callbackguid** value to fetch the access token with  the user profile data.
