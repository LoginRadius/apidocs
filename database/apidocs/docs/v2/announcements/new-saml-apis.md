# New LoginRadius SAML APIs

LoginRadius has recently completed it's transition to a new set of SAML APIs that provide additional capabilities from our original SAML APIs.
While it is not mandatory to upgrade to the newer SAML Endpoints, we highly recommend it to take advantage of our new features and future updates, as of now you can expect the following features in the newer APIs:

1) New Session Index feature:

When the SAML response is sent from the IDP(LoginRadius) to SP(Service Provider), in the SAML assertion we have added one extra property SeesionIndex, which contains the access token of the logged-in user.

e.g.

```
<saml:AuthnStatement AuthnInstant="2020-01-06T05:22:20.769Z" SessionIndex="4717eb31-52bc-40d3-8f48-dfc623a1dd4c"> <saml:AuthnContext> <saml:AuthnContextClassRef>urn:oasis:names:tc:SAML:2.0:ac:classes:unspecified</saml:AuthnContextClassRef> </saml:AuthnContext> </saml:AuthnStatement>
```

2) Better Error Logging: In some cases when running into a configuration error, the APIs will now give you more information regarding the configuration for troubleshooting.

3) More compatiblity with 3rd Party SAML systems.

If you're upgrading please refer to our [SAML IDP initated](/single-sign-on/tutorial/federated-sso/saml/idp-initiated/) or [SAML SP Initiated](/single-sign-on/tutorial/federated-sso/saml/sp-initiated/) docs for the full list of configurations that you may need to make.


For any additional questions please reach out to [LoginRadius Support](https://secure.loginradius.com/support/support-tickets).

