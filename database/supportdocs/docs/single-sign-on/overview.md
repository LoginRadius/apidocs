# Overview

<!-- This document covers the <a href ="https://www.loginradius.com/docs/api/v2/getting-started/glossary/#s15" target=_blank>SSO</a> introduction and the various SSO types supported by the LoginRadius Identity Platform. For more details on implementation and deployment of these SSO features refer to the following:

|Tutorials <br><span style="font-weight:normal;color:#fff;">Learn and implement various SSO types and protocols</span>| Concepts <br><span style="font-weight:normal;color:#fff;">Learn the supportive concepts of SSO feature</span>| 
|---|---|
|[**Web SSO**](/single-sign-on/tutorial/web-sso/overview/)<br>[**Mobile SSO**](/single-sign-on/tutorial/mobile-sso/overview/)<br>**Fedrated SSO**<li>[Overview](/single-sign-on/tutorial/federated-sso/overview/)<li> [OAuth 2.0](/single-sign-on/tutorial/federated-sso/oauth-2-0/oauth-2-0-overview/)</li><li>[JWT Login](/single-sign-on/tutorial/federated-sso/jwt-login/jwt-login-overview/)</li><li>[OpenID Connect](/single-sign-on/tutorial/federated-sso/openid-connect/openid-connect-overview/)</li><li>[SAML](/single-sign-on/tutorial/federated-sso/saml/overview/)</li><li>[WS Federation](/single-sign-on/tutorial/federated-sso/ws-federation/overview/)</li>**Custom IDPs**<li>[Overview](/single-sign-on/tutorial/custom-identity-providers/overview/)</li><li> [Custom OAuth Provider](/single-sign-on/tutorial/custom-identity-providers/custom-oauth-provider/)</li><li>[Custom JWT Provider](/single-sign-on/tutorial/custom-identity-providers/custom-jwt-provider/)</li>|**SAML Providers**<li>[Domo](/single-sign-on/concept/saml-providers/domo/)</li><li>[Jira](/single-sign-on/concept/saml-providers/jira/)</li><li>[Salesforce](/single-sign-on/concept/saml-providers/salesforce/)</li><li>[SharePoint](/single-sign-on/concept/saml-providers/SharePoint/)</li>**SAML Miscellaneous**<li>[Troubleshooting](/single-sign-on/concept/saml-miscellaneous/Usage/)</li><li> [Generate Certificate & Key](/single-sign-on/concept/saml-miscellaneous/certificate/)</li>**WS Federation Provider**<li>[SharePoint](/single-sign-on/concept/ws-fed-provider/sharepoint/)</li>**Custom IDP Providers**<li>[Doximity](/single-sign-on/concept/custom-idp-provider/doximity/)</li><li>[Alipay](/single-sign-on/concept/custom-idp-provider/alipay/)</li><li>[WeChat](/single-sign-on/concept/custom-idp-provider/wechat/)</li>**Delegation**<li>[Password Delegation](/single-sign-on/concept/password-delegation-api/)</li><li>[Delegation Auth](/single-sign-on/concept/delegation-login-api/)</li>  | -->

## SSO Introduction

Single Sign-On (SSO) refers to the authentication process that allows your customers to access multiple applications with a single set of login credentials and an active login session. The following are the two examples of the Single Sign-On environments:

- Where **Customers** access multiple applications of the same provider. Customers dont need to create and remember separate credentials for each application; they log in once and access various applications of that provider. **Example:** Google, Youtube, Gmail, etc. 

- Where **Employees** access numerous applications daily. Employees dont need to create and remember separate credentials for each application; they can log in once and access various applications used in the organization. **Example:** HR Portal, Resource Portal, Organizational Account, etc.


> **Note:** SSO can facilitate the following for a developer:
> - Users to log in across multiple applications without re-promoting them to log in
> - Users to log in to all their SaaS applications by only typing the credentials once
> - Aligning SaaS applications with organizational IAM policies.

> With SSO implementation, the SLO (Single Logout) is also required, i.e. if a user has logged out from one application, they should be logged out from other linked applications too.

The following is a representation of the SSO scenario:
![enter image description here](https://apidocs.lrcontent.com/images/0_0_197095f4b96eed3fc00.10890318.png "SSO overviewchart")

1. User lands on the a.com to log in, clicking the login link redirects the user to the Identity Provider page. 

2. On the Identity Provider page, the user enters the login credentials and gets logged into the a.com application.

3. Later, the user lands on the b.com to log in, clicking the login link redirects the user to the Identity Provider page.

4. Since the user is already logged in on the Identity Profile, the user gets automatically logged into the b.com application.

Where a.com and b.com applications are the service providers (SP). Since we have been using the Identity Provider and Service Provider terms, let’s have a quick look at their definitions:
- **Service Provider:** The user visits this application for service. For example, eCommerce application. In the SSO ecosystem, the SP is considered a Slave.

- **Identity Provider:** The service provider receives the user authentication status from the Identity Provider. In the SSO ecosystem, the IDP is considered a Master.

Taking the **LoginRadius Identity Platform** into consideration, if you have multiple websites and want to establish SSO and SLO across them, these websites will act as Service Providers, and LoginRadius will act as Identity Provider.

The **LoginRadius Identity Platform** allows you to implement SSO in the following ways:

## Web SSO

Web SSO is a method of browser-based session management that utilizes browser storage mechanisms like sessionStorage, localStorage, cookies to maintain the user’s session across your applications. When the Single Sign-on is required between two or more web applications and LoginRadius Identity Platform acts as an Identity Provider. 

A centralized domain managed by LoginRadius IDX is utilized to perform the authentication. When requested, this centralized domain shares the session with authorized applications. For more details on Web SSO refer to our documentation [here](/single-sign-on/tutorial/web-sso/overview/).

## Mobile SSO

Mobile SSO works by storing the LoginRadius access token in a shared session, either shared preferences in Android or keychain in iOS. It allows you to identify a currently active session and access the current sessions’ user data to initialize your user account in each linked app.

When the Single Sign-on is required between two or more mobile apps and LoginRadius Identity Platform acts as an Identity Provider. For more details on Mobile SSO refer to our documentation [here](/single-sign-on/tutorial/mobile-sso/overview/).


## Federated SSO
 When the Single Sign-on is required between two or more web applications and LoginRadius Identity Platform either acts as Identity Provider or Service Provider. This comes handy while implementing SSO with third-party applications. For interaction with third-party web applications, LoginRadius Identity Platform supports SAML, JWT, OAuth, and OpenID SSO protocols.

Accept tokens and identities issued by niche identity providers of your choice and allow your customers to authenticate on your website for seamless transactions. Identity providers can be your organizational partners who already issue and hold digital identities/tokens/tickets. With LoginRadius **[Federated SSO](/single-sign-on/tutorial/federated-sso/overview/)**, your business can leverage that identity and make authentication seamless for your customers.

<div align="center">
<table style="align-content: center; width:80%;border:1px solid #BEBEBE;vertical-align: middle;" cellspacing="0" cellpadding="0">
<tr>
<td align="center"> <a href="https://www.loginradius.com/docs/single-sign-on/concept/saml-providers/domo/" title="Domo" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/DOMO_11828603f612bc26109.63273896.png" alt="Domo" /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/concept/saml-providers/SharePoint/" title="Microsoft SharePoint" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/SharePoint_14882603f626a669568.46863074.png"  alt="Microsoft SharePoint" /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/concept/saml-providers/jira/" title="Jira" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/Jira_24053603f62d3866c17.31856567.png"  alt="Atlassian Jira"  /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/concept/saml-providers/salesforce/" title="salesforce" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/salesforce_22418603f6309dd6985.71711623.png"  alt="salesforce"/></a></td></tr>

<tr valign="middle">
<td align="center" ><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/federated-sso/oauth-2-0/oauth-2-0-overview/" title="oAuth Provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/oauth_7476610c41c3205150.04273025.png" alt="oAuth Provider" /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/federated-sso/jwt-login/jwt-login-overview/" title="JWT Provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/jwt_20746610c440de7dfd5.38688409.png"  alt="JWT Provider" /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/federated-sso/openid-connect/openid-connect-overview/" title="OIDC provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/oidc_13585610c43386ebb63.46511943.png"  alt="OIDC provider"/></a></td>

<td align="center" ><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/federated-sso/saml/overview/" title="SAML provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/SAML_9259610c4fa4550a35.69868053.png"  alt="SAML provider"/></a></td>
</tr>


</table>
</div>


## Custom IDPs

This can be understood as Social Login. You can use it to configure a designed Social Login provider for your web application(s), which is not available in the default social login providers list by the LoginRadius Identity Platform.

Custom OAuth Provider is the most implemented protocol by the customers to set up a custom Identity Provider. LoginRadius provides a wide range of social providers for social login. **[Custom Identity providers](/single-sign-on/tutorial/custom-identity-providers/overview/)** are used, where customers requirement is not getting fulfilled by the provided range of social providers in LoginRadius

<br />

<div align="center">
<table style="align-content: center; width:80%;border:1px solid #BEBEBE;">
<tr valign="top">
<td align="center">
<a href="https://www.loginradius.com/docs/single-sign-on/concept/custom-idp-provider/doximity/" title="Doximity" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/doximity_18348603f646111d0d1.98766990.png" alt="Doximity" /></a>&nbsp; &nbsp;&nbsp;</td><td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/concept/custom-idp-provider/alipay/" title="Alipay" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/Alipay_31743603f65719a44a2.66611193.png"  alt="Alipay" /></a>&nbsp; &nbsp;&nbsp;</td><td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/concept/custom-idp-provider/wechat/" title="Wechat" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/Wechat_16086603f65f15f88d7.56271634.png"  alt="Wechat" /></a>
</td></tr>

<tr valign="middle">
<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/custom-identity-providers/custom-oauth-provider/" title="oAuth Provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/oauth_7476610c41c3205150.04273025.png" alt="oAuth Provider" /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/custom-identity-providers/custom-jwt-provider/" title="JWT Provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/jwt_20746610c440de7dfd5.38688409.png"  alt="JWT Provider" /></a></td>

<td align="center"><a href="https://www.loginradius.com/docs/single-sign-on/tutorial/custom-identity-providers/custom-saml-provider/" title="JWT Provider" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/SAML_9259610c4fa4550a35.69868053.png"  alt="SAML Provider" /></a></td>

</tr></table>
</div>

## SSO Connectors

There are some third-party applications that do not support industry-standard federated SSO methods like SAML, Oauth/OIDC, JWT, etc. and provide their own mechanism to create a Single Sign-On workflow for identity provider applications. 

LoginRadius provides out of box SSO Connector solutions to create a Single Sign-on user experience between LoginRadius and these applications by leveraging these mechanisms. For more details on Password Delegation refer to our documentation [here](/api/v2/single-sign-on/sso-connector/overview/).



<br />

<div align="center">
<table style="align-content: center; width:80%;border:1px solid #BEBEBE;">
<tr valign="middle">
<td align="center">
<a href="https://www.loginradius.com/docs/libraries/turn-key-plugins/shopify-multipass-integration/" title="Shopify" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/shopify_270716119e22d3a6f54.93838500.png" alt="Shopify" /></a>&nbsp; &nbsp;&nbsp;</td>

<td align="center"><a href="https://www.loginradius.com/docs/libraries/turn-key-plugins/bigcommerce-stencil-plugin/" title="bigcommerce" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/bigcommerce_322866119e245634873.55225452.png"  alt="bigcommerce" /></a>&nbsp; &nbsp;&nbsp;</td>


<td align="center"><a href="https://www.loginradius.com/docs/libraries/turn-key-plugins/perfectmind/" title="PerfectMind" target="_blank"><img class="app-icon" src="https://apidocs.lrcontent.com/images/perfectmind_159926119e2ada71a34.88409846.png"  alt="PerfectMind " /></a>
</td></tr>
</table>
</div>

## Password Delegation

The Password Delegation feature allows you to authenticate a user for which password is stored with a third-party application during the initial login. For more details on Password Delegation refer to our documentation [here](/single-sign-on/concept/password-delegation-api/).

## Delegation Auth

This concept of Delegation Auth is useful when you want to establish SSO among applications that have different login form fields. The Delegation Auth API is used to integrate the LoginRadius Authentication APIs with the existing login setup on your application(s). 

For more details on Delegation Auth refer to our documentation [here](/single-sign-on/concept/delegation-login-api/).






<!-- # Overview

This document covers the <a href ="https://www.loginradius.com/docs/api/v2/getting-started/glossary/#s15" target=_blank>SSO</a> introduction and the various SSO types supported by the LoginRadius Identity Platform. For more details on implementation and deployment of these SSO features refer to the following:

|Tutorials <br><span style="font-weight:normal;color:#fff;">Learn and implement various SSO types and protocols</span>| Concepts <br><span style="font-weight:normal;color:#fff;">Learn the supportive concepts of SSO feature</span>| 
|---|---|
|[**Web SSO**](/single-sign-on/tutorial/web-sso/overview/)<br>[**Mobile SSO**](/single-sign-on/tutorial/mobile-sso/overview/)<br>**Fedrated SSO**<li>[Overview](/single-sign-on/tutorial/federated-sso/overview/)<li> [OAuth 2.0](/single-sign-on/tutorial/federated-sso/oauth-2-0/oauth-2-0-overview/)</li><li>[JWT Login](/single-sign-on/tutorial/federated-sso/jwt-login/jwt-login-overview/)</li><li>[OpenID Connect](/single-sign-on/tutorial/federated-sso/openid-connect/openid-connect-overview/)</li><li>[SAML](/single-sign-on/tutorial/federated-sso/saml/overview/)</li><li>[WS Federation](/single-sign-on/tutorial/federated-sso/ws-federation/overview/)</li>**Custom IDPs**<li>[Overview](/single-sign-on/tutorial/custom-identity-providers/overview/)</li><li> [Custom OAuth Provider](/single-sign-on/tutorial/custom-identity-providers/custom-oauth-provider/)</li><li>[Custom JWT Provider](/single-sign-on/tutorial/custom-identity-providers/custom-jwt-provider/)</li>|**SAML Providers**<li>[Domo](/single-sign-on/concept/saml-providers/domo/)</li><li>[Jira](/single-sign-on/concept/saml-providers/jira/)</li><li>[Salesforce](/single-sign-on/concept/saml-providers/salesforce/)</li><li>[SharePoint](/single-sign-on/concept/saml-providers/SharePoint/)</li>**SAML Miscellaneous**<li>[Troubleshooting](/single-sign-on/concept/saml-miscellaneous/Usage/)</li><li> [Generate Certificate & Key](/single-sign-on/concept/saml-miscellaneous/certificate/)</li>**WS Federation Provider**<li>[SharePoint](/single-sign-on/concept/ws-fed-provider/sharepoint/)</li>**Custom IDP Providers**<li>[Doximity](/single-sign-on/concept/custom-idp-provider/doximity/)</li><li>[Alipay](/single-sign-on/concept/custom-idp-provider/alipay/)</li><li>[WeChat](/single-sign-on/concept/custom-idp-provider/wechat/)</li>**Delegation**<li>[Password Delegation](/single-sign-on/concept/password-delegation-api/)</li><li>[Delegation Auth](/single-sign-on/concept/delegation-login-api/)</li>  |

## SSO Introduction

Single Sign-On (SSO) refers to the authentication process that allows your customers to access multiple applications with a single set of login credentials and an active login session. The following are the two examples of the Single Sign-On environments:

- Where **Customers** access multiple applications of the same provider. Customers dont need to create and remember separate credentials for each application; they log in once and access various applications of that provider. **Example:** Google, Youtube, Gmail, etc. 

- Where **Employees** access numerous applications daily. Employees dont need to create and remember separate credentials for each application; they can log in once and access various applications used in the organization. **Example:** HR Portal, Resource Portal, Organizational Account, etc.


> **Note:** SSO can facilitate the following for a developer:
> - Users to log in across multiple applications without re-promoting them to log in
> - Users to log in to all their SaaS applications by only typing the credentials once
> - Aligning SaaS applications with organizational IAM policies.

> With SSO implementation, the SLO (Single Logout) is also required, i.e. if a user has logged out from one application, they should be logged out from other linked applications too.

The following is a representation of the SSO scenario:
![enter image description here](https://apidocs.lrcontent.com/images/0_0_197095f4b96eed3fc00.10890318.png "SSO overviewchart")

1. User lands on the a.com to log in, clicking the login link redirects the user to the Identity Provider page. 

2. On the Identity Provider page, the user enters the login credentials and gets logged into the a.com application.

3. Later, the user lands on the b.com to log in, clicking the login link redirects the user to the Identity Provider page.

4. Since the user is already logged in on the Identity Profile, the user gets automatically logged into the b.com application.

Where a.com and b.com applications are the service providers (SP). Since we have been using the Identity Provider and Service Provider terms, let’s have a quick look at their definitions:
- **Service Provider:** The user visits this application for service. For example, eCommerce application. In the SSO ecosystem, the SP is considered a Slave.

- **Identity Provider:** The service provider receives the user authentication status from the Identity Provider. In the SSO ecosystem, the IDP is considered a Master.

Taking the **LoginRadius Identity Platform** into consideration, if you have multiple websites and want to establish SSO and SLO across them, these websites will act as Service Providers, and LoginRadius will act as Identity Provider.

The **LoginRadius Identity Platform** allows you to implement SSO in the following ways:

- **Web SSO:** When the Single Sign-on is required between two or more web applications and LoginRadius Identity Platform acts as an Identity Provider.

- **Mobile SSO:** When the Single Sign-on is required between two or more mobile apps and LoginRadius Identity Platform acts as an Identity Provider.

- **Federated SSO:** When the Single Sign-on is required between two or more web applications and LoginRadius Identity Platform either acts as Identity Provider or Service Provider. This comes handy while implementing SSO with third-party applications. For interaction with third-party web applications, LoginRadius Identity Platform supports SAML, WS Federation, JWT, OAuth, and OpenID SSO protocols.

- **Custom IDPs:** This can be understood as Social Login. You can use it to configure a designed Social Login provider for your web application(s), which is not available in the default social login providers list by the LoginRadius Identity Platform.
 -->
