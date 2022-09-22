# Getting Started with Social Sharing API

This document details the steps that you will need to take in order to setup your account to support social sharing.

---

JS Widget Sharing  
Steps to Implement the Social Sharing JS Widget:

1. Login to your LoginRadius User Account
2. Navigate to the 'Social Sharing' Section (Admin-console -> Integrations -> Social Sharing)
3. Select 'Social Share Theme'

![enter image description here](https://apidocs.lrcontent.com/images/loginradius_1985458a442ea63b285.50490262.png)

##Customization of JS Widget
LoginRadius provides the full customization (Images and CSS) to the Social Sharing Widget. Please follow the documentation below to customize the LoginRadius Social Sharing JS widget:

[Advanced Customization · LoginRadius API Documentation](/api/v1/social-sharing-api/advanced-social-sharing-customization)
##Permission-Based API Sharing

![enter image description here](https://apidocs.lrcontent.com/images/social-sharing---Social-Sharing-Simplified_463158a4435430fa82.11935945.png)
LoginRadius Permission-Based Social Sharing

#####Description of the Steps:
Steps for implementing the permission-based API social sharing. See an example of permission-based sharing here:

- Display the social sharing providers that you want to offer sharing with using the [Interface Customization API](/api/v1/social-login/social-login-getting-started)
- Enable the "Profile Access Permissions" for the Social ID providers within your LoginRadius User Account. Please find more details [here](/development/social-network/social-networks-permissions)
- Setup the Sharing Content - Choose to either have predefined sharing fields/content or display an interface to retrieve the customer input for the sharing content or any combination of the two.
- Call the Post API and pass in the collected or predefined parameters to share the message to the selected social provider.
- The API returns a bool that will identify whether or not the share was successful.
