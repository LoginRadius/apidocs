# Federated SSO Overview

LoginRadius supports external identity data held by partners using industry-standard Single Sign-On (SSO) protocols allowing your customers to gain access to your web properties without authentication barriers.

Below are the SSO protocols supported by us:

## [SAML](https://www.loginradius.com/legacy/docs/single-sign-on/federated-sso/saml/overview/)

LoginRadius supports both SAML 1.1 and SAML 2.0 flows to act as either an Identity Provider (IDP) or as a Service Provider (SP) as we support both IDP initiated and SP-initiated SAML flows. The LoginRadius Admin Console allows for full self-service of your SAML configurations, allowing you to customize the assertions, keys, and endpoints to match any SAML provider requirements. More information regarding this protocol can be found here in [SAML](http://saml.xml.org/saml-specifications) document.


## [JWT](https://www.loginradius.com/legacy/docs/single-sign-on/federated-sso/jwt-login/jwt-login-overview/)

JSON Web Token or JWT is a commonly used Single-Sign-On protocol which is used widely in B2C apps and is covered in [RFC 7519](https://tools.ietf.org/html/rfc7519). This protocol allows you to generate a JSON formatted, encrypted token. In LoginRadius, this can be generated either via API or be requested directly through the Login and Social Login interface responses. This token is then passed to the Third-Party Service Provider and consumed. The data that would be extracted can be mapped on the LoginRadius Admin Console, you can also customize the encryption method of the token based on the requirements of the Service Provider that would be consuming the token.


## [OAuth](https://www.loginradius.com/legacy/docs/single-sign-on/federated-sso/oauth-2-0/oauth-2-0-overview/)

OAuth 2.0 is an authorization framework that allows you to delegate your authentication process to a Third-Party service in order to obtain data access based on a set of requested scopes. LoginRadius can function either as an OAuth 2.0 Identity Provider or as a Service Provider that delegates the authentication process to an IDP that supports the OAuth Framework. The OAuth 2.0 specs are covered in [RFC 6749](https://tools.ietf.org/html/rfc6749).


## [OpenID Connect](https://www.loginradius.com/legacy/docs/single-sign-on/federated-sso/openid-connect/openid-connect-overview/)

OpenID Connect or (OIDC) is an authentication layer on top of the OAuth 2.0 framework that is standardized by the OpenID Foundation. LoginRadius provides a way to integrate your OpenID Connect client with our APIs by following the standards specified in the [OpenID Connect specs](https://openid.net/specs/openid-authentication-2_0.html). These specs cover the various requirements and standardized process that OpenID Connect encompasses.

**Note :** We have a 10 minutes limitation on SSO login after initializing the Federated SSO request . If the user is not logged in within 10 minutes, the Federated SSO Session will expire, and after that login will return the error,  this is for the security reasons to restrict the session to a limited time.