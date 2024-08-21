# Single Sign-On Overview

---

LoginRadius SSO encompasses two features that allow you to streamline and unify your userbase across all of your properties. Please see below for details as to what each section offers.

## [Web & Mobile SSO](/single-sign-on/web-and-mobile-sso/loginradius-mobile-sso/)

### [Web SSO](/single-sign-on/web-and-mobile-sso/loginradius-web-sso/)
Web Single Sign-On also referred to as [LoginRadius SSO](/api/v2/single-sign-on/getting-started) is a method of Browser-Based Session Management which utilizes browser storage mechanisms (sessionStorage, localStorage, Cookies) in order to maintain the user's session across your properties. This storage is stored on a centralized LoginRadius managed domain and can be accessed via our provided JavaScript [Single Sign-On APIs](/api/v2/single-sign-on/getting-started) or directly via a JSONP call. This session is seamlessly integrated into our standard Customer Identity and Access Managment scripts.

### [Mobile Single Sign-On](/single-sign-on/web-and-mobile-sso/loginradius-mobile-sso/)

Mobile SSO allows you to unify a users session across multiple apps that are serviced by a single LoginRadius account. This works by storing the LoginRadius access token in a shared session, either shared preferences in Android or keychain in iOS which allows you to identify a currently active session and access the current sessions user data to initialize your user account in each linked app.

- [iOS SSO Document](/api/v2/mobile-libraries/ios-library#singlesignon11)
- [Android SSO Document](/api/v2/mobile-libraries/android#singlesignon18)

## [Federated SSO](/single-sign-on/federated-sso/multipass/)
Leverage external identity data held by partners using industry-standard Single Sign-On (SSO) protocols allowing your customers to gain access to your web properties without authentication barriers. LoginRadius acts as both Identity Provider and Service Provider. LoginRadius supports all of the major industry SSO protocols.
 
LoginRadius acts as an IdP which stores and authenticates the identities end-users use to log in to customer systems, applications, files servers, and more depending upon the configuration. Below is the flow diagrams showing the role of LoginRadius as an Identity provider:

![LoginRadiusIDP](https://apidocs.lrcontent.com/images/LoginRadius-as-an-Identity-Provider_178095e6fee0c235b98.50241623.png "LoginRadiusIDP")

LoginRadius acts as a service provider that provides services to the end-user. LoginRadius does not authenticate users but instead requests authentication from a third-party identity provider. LoginRadius depends upon the identity providers to verify the identity of a user, and if needed then verify certain attributes about the user that are managed by the identity provider. Please see [Custom Identity Provider Overview](/single-sign-on/custom-identity-providers/overview/) for more information. 
Below is the flow diagrams showing the role of LoginRadius as a service provider:

![LoginRadiusSP](https://apidocs.lrcontent.com/images/LoginRadius-as-a-Service-Provider_233125e6fee54a66c30.83673293.png "LoginRadiusSP")

### [SAML](/single-sign-on/federated-sso/saml/overview/)
LoginRadius supports both SAML 1.1 and SAML 2.0 flows to support LoginRadius acting as either an Identity Provider (IDP) or as a Service Provider (SP). LoginRadius supports both IDP initiated and SP-initiated SAML flows. The LoginRadius Admin Console allows for full self-service of your SAML configurations, allowing you to customize the assertions, keys, and endpoints to match any SAML provider requirements.

- [SAML Specs Document](http://saml.xml.org/saml-specifications)
- [LoginRadius SAML Docs](/single-sign-on/federated-sso/saml/overview/)

### [JWT](/single-sign-on/federated-sso/jwt-login/jwt-login-overview/)
JSON Web Token or JWT is a commonly used Single Sign-On protocol which is used widely in B2C apps and is covered in [RFC 7519](https://tools.ietf.org/html/rfc7519). This protocol allows you to generate a JSON formatted, encrypted token. In LoginRadius, this can be generated either via API or be requested directly through the Login and Social Login interface responses. This token is then passed to the Third-Party Service Provider and consumed. The data that would be extracted can be mapped on the LoginRadius Admin Console, you can also customize the encryption method of the token based on the requirements of the Service Provider that would be consuming the token.

- [JWT RFC 7519](https://tools.ietf.org/html/rfc7519)
- [LoginRadius JWT Document](/single-sign-on/federated-sso/jwt-login/jwt-login-overview/)

### [OAuth](/single-sign-on/federated-sso/oauth-2-0/oauth-2-0-overview/)
OAuth 2.0 is an authorization framework that allows you to delegate your authentication process to a Third-Party service in order to obtain data access based on a set of requested scopes. LoginRadius can function as either an OAuth 2.0 Identity Provider or as a Service Provider that delegates the authentication process to an IDP that supports the OAuth Framework. The OAuth 2.0 specs are covered in [RFC 6749](https://tools.ietf.org/html/rfc6749). These specs cover the various requirements and standardized process that OAuth encompasses. From authorizing the SP that is requesting the authentication, to requesting authorization from the end user, to generate the access token which is used to request the scoped data from the IDP after the authentication has been completed.

- [OAuth 2.0 RFC 6749](https://tools.ietf.org/html/rfc6749)
- [LoginRadius OAuth Documentation](/single-sign-on/federated-sso/oauth-2-0/oauth-2-0-overview/)

### [OpenID Connect](/single-sign-on/federated-sso/openid-connect/openid-connect-overview/)
OpenID Connect or (OIDC) is an authentication layer on top of the OAuth 2.0 framework that is standardized by the OpenID Foundation. LoginRadius provides a way to integrate your OpenID Connect client with our APIs by following the standards specified in the [OpenID Connect specs](https://openid.net/specs/openid-authentication-2_0.html). These specs cover the various requirements and standardized process that OpenID Connect encompasses.

- [OpenID Connect specs](https://openid.net/specs/openid-authentication-2_0.html)
- [LoginRadius OpenID Connect Documentation](/api/v2/single-sign-on/openid)

### [Multipass](/single-sign-on/federated-sso/multipass/)
Multipass is one of the simplest forms of SSO authentication. Multipass is handled by generating an encrypted JSON hash of the values that need to be sent to the Service Provider.

- [LoginRadius Multipass Documentation](/api/v2/single-sign-on/multipass)

## [Custom Identity Providers](/single-sign-on/custom-identity-providers/overview/)

If you're looking to add an Identity Provider that's not already listed in the LoginRadius Admin Console, The Custom Identity Providers section contains documentation on setting up custom providers along with specific details on configuring some of the more popular ones.


<!--
### [Delegation](/single-sign-on/delegation-login-api/)
The LoginRadius Delegation APIs cover two system flows that allow you to delegate either the full authentication via the [Delegation Authentication APIs](/single-sign-on/delegation-login-api/) or just delegate the password management via the Password delegation API. Password Delegation Allows you to use a third-party service to store your passwords rather than LoginRadius Cloud Directory.

- [Delegated Authentication Documentation](/single-sign-on/delegation-login-api/)
- [Password Delegation Document](/single-sign-on/password-delegation-api/)
-->

