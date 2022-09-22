# Overview

There are some third-party applications that do not support industry-standard federated SSO methods like  SAML, Oauth/OIDC, JWT, WS Federation, etc. and provide their own mechanism to create a Single Sign-On workflow for identity provider applications. LoginRadius provides out of box SSO Connector solutions to create a Single Sign-on user experience between LoginRadius and these applications by leveraging these mechanisms.

## Implementation

LoginRadius provides Hosted Plugins for Shopify, Bigcommerce and PerfectMind to integrate LoginRadius features and functionalities into these applications. These integrations inject the LoginRadius JavaScript Interfaces in these applications and call the SSO connector APIs to create a seamless user experience. Please see our [TurnKey Plugins Overview](https://www.loginradius.com/docs/libraries/turn-key-plugins/overview/) document for available plugins for Shopify, Bigcommerce and PerfectMind.
You can also call the SSO connector APIs directly to create your own SSO user workflow. 

 Below are the SSO connectors which can be leveraged in order to get the SSO  between LoginRadius and these applications.

### Shopify 
LoginRadius creates the Shopify Multipass Login URL by using the configured Shopify Store Credentials in the Admin Console. The Shopify Multipass Login URL  seamlessly logs the consumer in with the same email address the consumer used to sign up on the LoginRadius web application. If no account with that email address exists in the Shopify Store, one is created in the Shopify Store. You can call [Shopify Login URL by Access Token](https://www.loginradius.com/docs/api/v2/single-sign-on/sso-connector/shopify-login-url-by-access-token/) API to get the Shopify Login URL by using the LoginRadius access token. You must have configured  Shopify SSO Connector settings in the Admin console to leverage this API. Please see the [Shopify Multipass Integration](https://www.loginradius.com/docs/libraries/turn-key-plugins/shopify-multipass-integration/) document on how to configure the Shopify SSO Connector settings in the Admin Console. 

### Bigcommerce 
LoginRadius creates the Bigcommerce Login URL by using the configured Bigcommerce Store Credentials in the Admin Console. The Bigcommerce Login URL  seamlessly logs the existing consumer in the Bigcommerce store. You can call [Bigcommerce Login URL by Access Token](https://www.loginradius.com/docs/api/v2/single-sign-on/sso-connector/bigcommerce-login-url-by-access-token/) API to get the Bigcommerce Login URL by using the LoginRadius access token. You must have configured  Bigcommerce SSO Connector settings in the Admin Console to leverage this API. Please see the [Bigcommerce BluePrint Integration](https://www.loginradius.com/docs/libraries/turn-key-plugins/bigcommerce-blueprint-plugin/) or [Bigcommerce Stencil Integration](https://www.loginradius.com/docs/libraries/turn-key-plugins/bigcommerce-stencil-plugin/) document on how to configure the Bigcommerce SSO Connector settings in the Admin Console. 

### PerfectMind
LoginRadius creates a temporary session and generates a PerfectMind Login URL to log in to the PerfectMind by using Server Side PerfectMind API calls. You can call  
[PerfectMind](https://www.loginradius.com/docs/api/v2/single-sign-on/sso-connector/perfectmind/) API to get the PerfectMind Session ID and Login URL by using the LoginRadius access token. You must have configured PerfectMind SSO Connector settings in the Admin Console to leverage this API. Please see the [PerfectMind SSO Implementation](https://www.loginradius.com/docs/libraries/turn-key-plugins/perfectmind/) document on how to configure the PerfectMind SSO Connector settings in the Admin Console. 


