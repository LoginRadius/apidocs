
# Apple’s Account deletion requirement

  

## Overview

  
As per Apple’s [announcement](https://developer.apple.com/news/?id=12m75xbj), Starting June 30, 2022, Apps that support account creation must also let users initiate the deletion of their account within the app.

  
If you’re updating an app or submitting a new app with account creation, please read the following document for account deletion Guidance to prevent delays in review: https://developer.apple.com/support/offering-account-deletion-in-your-app.

  
  

In addition to account deletion, If your app offers Sign in with Apple, you’ll need to use the Sign in with Apple REST API to revoke user tokens when deleting an account.  
  

Screenshot reference:  
![Apple](https://apidocs.lrcontent.com/images/Untitled_19009629fa34a0e0eb9.78875705.png "Apple")

## How to Invalidate the user token when deleting an account?

  
Please refer to the following guide:  
  
1. Fetch the Apple signin token from the LoginRadius GET [user profile API](/api/v2/customer-identity-api/authentication/auth-read-profiles-by-token/) response.  
  
Under the **Identities** ( type: array of object), check the object having provider as “apple” ie. **"Provider": "apple",** respectively, that object will have **AccessToken** field under the **ProviderAccessCredential** data field, this field contains the user’s Apple sign-in token value.  
  
Screenshot reference:  
  
![Code](https://apidocs.lrcontent.com/images/Untitled-1_16698629fa398c84478.08104901.png "Code")  
  
 ``` 
"ProviderAccessCredential": {

"AccessToken": "ad8a4xxxxxxxxxxxxxxxxxxxxxxxxx.0.rrsvq.VZsACxh4h8xxxxxxxxx",

"TokenSecret": null

}
```
**2.** Once the Apple token is fetched from step 1, call the Sign in with Apple Rest API’s [Revoke tokens](https://developer.apple.com/documentation/sign_in_with_apple/revoke_tokens) endpoint.  
  
> **Note:** The Apple Sign-in APIs require **client_secret** as a parameter.

As mentioned in the apple document, **client_secret**:  A secret JSON Web Token (JWT) that uses the Sign in with Apple private key associated with your developer account.  
  
Regardless of the programming language, you’re using with the Sign in with Apple REST API, there are a variety of open-source libraries available online for creating and signing JWT tokens. For more information about creating client secrets, see [Generate and Validate Tokens](https://developer.apple.com/documentation/sign_in_with_apple/generate_and_validate_tokens).  
  
As a developer, it could be challenging to convert client_secret into the required JWT format and then sign it. To mitigate this we have put together a sample code on how to generate the **client_secret** as a reference here (Node.js):

https://github.com/LoginRadius/apple-client-secret-generator  
  

**3.** On the success response of the step2 API call, delete the account at the LoginRadius end by leveraging the Delete Account APIs.

   a. **Delete Account with Email confirmation**: https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-delete-account-with-email-confirmation/
    
   b. **Delete Account**: https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-delete-account/