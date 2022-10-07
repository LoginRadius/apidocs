Invalid Request URI Error
====


-------
At times, you’ll face an error related to the invalid requested host. It might be due to improper LoginRadius site configurations or some settings not enabled in the [LoginRadius Admin Console](https://adminconsole.loginradius.com). 

![](https://apidocs.lrcontent.com/images/error_screenshot_235775a953fd6a5ab92.99395267.png)

Following guidelines will help you to avoid/fix this error:

## SAML
You might face this error due to SAML feature in the following conditions:

- SAML provider is not valid
- SAML is not configured
- LoginRadius app name/site name invalid

For proper configurations related to SAML, check detailed documentation [here](/api/v2/single-sign-on/saml-security-assertion-markup-language).

## Identity Experience Framework
If you’re facing this error on Identity Experience Framework (i.e. auth.aspx or profile.aspx), it might occur due to following conditions:

- LoginRadius app name/site name is invalid
- User Registration is not enabled
- User Registration form is not setup/configured

You should visit this [document](/api/v2/user-registration/hosted-registration) to ensure proper configuration or customizations related to Identity Experience Framework.<br/>

If you’re still unable to resolve the issue, please raise a support ticket [here](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).
