# SignIn with AppleID

## Overview

Sign In with Apple allows you to set up a user account in your system, complete with name, verified email address, and unique stable identifiers that allow the user to sign in to your app with their Apple ID. It works on iOS, macOS, tvOS, and watchOS. You can also add Sign In with Apple to your website or versions of your app running on other platforms. Once a user sets up their account, they can sign in anywhere you deploy your app.

## How “Sign In with Apple ID” works

Apple uses open standards OAuth 2.0 and OpenID Connect in API Calls. To leverage Apple's API to sign users in you need to register an application in Apple Developer Portal. Then you need to complete the Registration. After completing the registration, you'll have a client_id( commonly known as Service ID) and a private key which will be available to you as a file. 

## Use Cases

- People might need to personalize the experience, access additional features by creating an account.

- Offering Sign in with Apple for your app or websites across all Apple platforms lets you have a consistent sign-in experience

- When people are forced to sign in before doing anything useful, they tend to abandon the apps. To lessen the chance of abandoning the apps you need to give them a chance to familiarize themselves with your app before making a commitment to it.
 Like for example, a live-streaming app lets people explore the content that’s been offered and let them choose if they wish to signup or not.

- Managing the checkout process after the transaction in a guest checkout system provides people a quick way to create an account.

- Displaying a brief, friendly explanation on the login if your app requires signing into an account,
screen that describes the reasons for the requirement and its benefits.

## Benefits

- Sign In with Apple ID provides the users with an alternative to major social providers like Google or Facebook.
- Sign In with Apple lets you create a randomly-generated email address that hides your own email address when you're signing up for an app or service.
- Sign In with Apple authenticates a user with Face ID or Touch ID keeping personal information of Users safe from app and website developers. 

## How to configure Sign In with Apple ID 

Before you can implement Sign in with Apple you will have to use Certificates, Identifiers & Profiles to set up identifiers and keys in your Apple Developer account. For configuring Apple Sign in, a Services ID must be created and associated with your primary iOS, macOS, tvOS, or watchOS App ID.

1. On the Apple Developer portal, go to Certificates, Identifiers, & Profiles 
2. Select the Identifier and create a new App ID
3. Add a description and Bundle ID (the domain of your app) using reverse-dns style string 
ie. com.loginradius will be loginradius.com
4. Scroll down and select the checkbox next to Sign In with Apple, and confirm the changes
5. You will then need to create a Services ID, create a new identifier and choose Services ID 
6. Add a description, which will be the name of your app when users log in and add an Identifier which will be used as the OAuth client id
7. Scroll down and select the checkbox next to Sign In with Apple and click Configure to define your app domain and the redirect URLs
8. Ensure your Primary App ID is the same as your previously defined App ID, input your domain and return URLs (note that Apple does not allow localhost URLs in this step).
9. Next, you will need to create a Private Key for Client Authentication
10. Go to Certificates, Identifiers, & Profiles, select Keys, and create a new key
11. Add a name and select the checkbox next to Sign In with Apple, and click the Configure button to select the Primary App ID of your app, then click save
12. Apple will generate a private key that can only be downloaded once
13. To view your Key ID, click on view key information 
14. To generate the client secret, use a library that supports the elliptic curve methods/ES256 JWT algorithm, such as Ruby JWT

Once we get the key & secret, we can use below apple APIs for user authentication : 


1. Authentication API: https://appleid.apple.com/auth/authorize
Please see https://developer.apple.com/documentation/signinwithapplerestapi/authenticating_users_with_sign_in_with_apple for more details on OAuth flow.

2. Generate and validate tokens: https://appleid.apple.com/auth/token
Please see https://developer.apple.com/documentation/signinwithapplerestapi/generate_and_validate_tokens for more details on getting and handling tokens.


*Remainder will be specific to how the client uses these credentials to configure their application*

Please see see our Custom IDP [documentation](https://www.loginradius.com/legacy/docs/api/v2/single-sign-on/custom-identity-providers/providers/apple) for step by step instructions on how-to configure "Sign In with Apple" whithin LoginRadius.

## Learn More
Please refer to the following Links to learn more about Apple Sign in:


- [Sign In with Apple.](https://developer.apple.com/sign-in-with-apple/get-started/)
- [Sign In with Apple REST API ](https://developer.apple.com/documentation/signinwithapplerestapi)
- [Generate and validate tokens](https://developer.apple.com/documentation/signinwithapplerestapi/generate_and_validate_tokens)
- [TokenResponse](https://developer.apple.com/documentation/signinwithapplerestapi/tokenresponse#properties)


Start Building

- [About Sign In with Apple](https://help.apple.com/developer-account/#/devde676e696)
- [Group Apps for Sign In with Apple](https://help.apple.com/developer-account/#/dev04f3e1cfc)
- [Create a Sign In with Apple private key](https://help.apple.com/developer-account/#/dev77c875b7e)
- [Configure Sign In with Apple for the web](https://help.apple.com/developer-account/#/dev1c0e25352)
- [Configure Private Email Relay Service](https://help.apple.com/developer-account/#/devf822fb8fc)
