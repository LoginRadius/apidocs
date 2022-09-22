# Overview

This document covers the Federated SSO introduction, and its protocols supported by the LoginRadius Identity Platform.

## Federated SSO Introduction

Federated SSO comes handy while implementing SSO with third-party applications. For interaction with third-party web applications, common standards and protocols are used to manage and map user identities via trust relationships. LoginRadius Identity Platform supports SAML, JWT, OAuth, and OpenID [protocols for Federated SSO](#federatedssoprotocols1). In the Federated SSO process, the LoginRadius Identity Platform acts as Identity Provider(IDP).

LoginRadius acts as an IdP, which stores and authenticates the identities that your customers use to log in to your systems, applications, files servers, and more depending upon the configuration. The following flow diagram displays the role of LoginRadius as IDP:

![enter image description here](https://apidocs.lrcontent.com/images/LoginRadius-as-an-Identity-Provider_293735eda5f26474d76.65203454.png "diagram")

## Federated SSO Protocols

The following are the list of Federated SSO Protocols supported by LoginRadius Identity Platform:

- [SAML](#saml2)
- [JWT](#jwt3)
- [OAuth 2.0](#oauth4)
- [OpenID Connect](#openidconnect5)

> **Note:** Below are the validation rules that should be taken care of while creating the **app name**.If any of the below validation rule is not followed the error message: `App Name is not valid` will be shown.

1. Only **\_** (underscore) and **-** (hyphen) are allowed as a special charater.
2. App name should start with a **character**.
3. Alpha numeric values are allowed.
4. No space is allowed in between.
5. Minimum length of the app name should be **[1]** and maximum length upto **[60]** is allowed.
6. Now all the app names are allowed in lowercase only. If the uppercase is entered it will be automatically coverted into lowercase.

### SAML

LoginRadius Identity Platform supports both SAML 1.1 and SAML 2.0 flows to manage to act as either an Identity Provider (IDP) or as a Service Provider (in case of Custom IDP). It supports both IDP initiated, and SP-initiated SAML flows.

The LoginRadius Admin Console allows you to configure the SAML app by customizing the assertions, keys, and endpoints to match any SAML provider requirements.

For more information, refer to the following documents:

- [LoginRadius SAML Docs](/api/v2/single-sign-on/saml-security-assertion-markup-language)
- [SAML Specs Document](http://saml.xml.org/saml-specifications)

### JWT

This protocol allows you to generate a JSON formatted, encrypted token. LoginRadius Admin Console allows you to configure the JWT App and customize the token's encryption method based on the Service Provider requirement.

For more information, refer to the following documents:

- [LoginRadius JWT Document](/api/v2/single-sign-on/jwt-login)
- [JWT RFC 7519](https://tools.ietf.org/html/rfc7519)

### OAuth 2.0

LoginRadius Identity Platform can function as either an OAuth 2.0 Identity Provider or as a Service Provider (In case of Custom IDP) that delegates the authentication process to an IDP that supports the OAuth Framework.

LoginRadius Admin Console allows you to configure the OAuth App. For more information, refer to the following documents:

- [LoginRadius OAuth 2.0 Documentation](/single-sign-on/tutorial/federated-sso/oauth-2-0/oauth-2-0-overview/)
- [OAuth 2 RFC 6749](https://tools.ietf.org/html/rfc6749)

### OpenID Connect

LoginRadius Identity Platform provides a way to integrate your OpenID client with our APIs by following the standards. LoginRadius Admin Console allows you to configure the OAuth App. For more information, refer to the following documents:

- [LoginRadius OpenID Connect Documentation](/api/v2/single-sign-on/openid)
- [OpenID Connect Specs](https://openid.net/specs/openid-authentication-2_0.html)

### Delegation

The delegation concept comes in picture when the SSO needs to be implemented between the applications having different login forms or when the third-party application stores the passwords of your customers.

LoginRadius Delegation APIs cover the following two flows that allow you to:

- Delegate the full authentication via the [Delegation Authentication API](/api/v2/single-sign-on/delegation-login-api).
- Delegate the password management via the [Password Delegation API](/single-sign-on/password-delegation-api/). Password delegation allows you to use a third-party service to store your passwords rather than LoginRadius Cloud Directory.

### WS Federation

There are several identity protocols that are commonly supported by Identity Providers today like OAuth2, OIDC, SAML and many more likewise WS-Federation is also a Legacy Protocol that is used by Microsoft Products.

Web Services Federation (WS-Federation or WS-Fed) is part of the larger WS-Security framework and an extension to the functionality of WS-Trust. The features of WS-Federation can be used directly by SOAP applications and web services. WS-Federation provides mechanisms for brokering of identity, attribute discovery and retrieval, authentication and authorization claims between federation partners, and protecting the privacy of these claims across organizational boundaries.WS-Fed is a protocol that can be used to negotiate the issuance of a token. It works similar to SAML except it has different header input values in URL and it gets response in SAML 1.0.
