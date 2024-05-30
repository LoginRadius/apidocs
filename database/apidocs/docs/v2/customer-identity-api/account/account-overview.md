# Account Overview

The Account APIs enable administrators to fetch and update customer details within the Admin Console. These APIs should be used exclusively by system administrators or via a secure backend setup. Understanding the impact of any changes made through these APIs is crucial, as they have administrative capabilities that can override default LoginRadius workflows.

There are four types of request methods available:

- [Account APIs for registration](#accountapisforregistration0)
- [Account APIs to obtain customer profile data after successful registration](#accountapistoobtaincustomerprofiledataaftersuccessfulregistration1)
- [Account APIs related to profile update](#accountapisrelatedtoprofileupdate2)
- [Account APIs related to delete profile](#accountapisrelatedtodeleteprofile3)

> **Note:** Account APIs use an API secret with *management capabilities*, primarily for backend operations. As such, they do not adhere to some security settings defined in the Admin Console.

## Account APIs for registration

These APIs are used for creating accounts in the LoginRadius Admin Console, bypassing the normal email verification process. You need to format a JSON request body with all mandatory fields for a successful response. Commonly used APIs include:

- [Account Create](/api/v2/customer-identity-api/account/account-create) API - Creates a LoginRadius account in the Cloud Directory with the necessary details.

- [Email Verification token](/api/v2/customer-identity-api/account/get-email-verification-token) - Returns an email verification token by requesting the customer’s email ID. This token helps verify a customer account.

- [Forgot Password Token](/api/v2/customer-identity-api/account/get-forgot-password-token) - Returns a forgot password token, which is useful for sending a forgot password email to the customer. It's important yo use 'username' instead of 'email' in the request body if the Username Registration workflow is enabled in the [Account Workflow](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/authentication-workflow/account-workflow) section of the Admin Console.

## Account APIs to obtain customer profile data after successful registration

These APIs retrieve all identities (UID and Profiles) associated with a specific customer profile in the dashboard. Types of Read Customer Profile APIs include:

- [Account Identities by Email](/api/v2/customer-identity-api/account/account-identities-by-email) -  Retrieves all identities linked to a specific LoginRadius profile.

- [Access Token based on UID or User impersonation API](/api/v2/customer-identity-api/account/account-impersonation-api) - Obtains a LoginRadius access token based on UID, useful in the login process.

- [Account Password](/api/v2/customer-identity-api/account/account-password) - Retrieves the hashed password of a specified account in the Cloud Directory, accessible by the system administrator.

- [Account Profiles by Email](/api/v2/customer-identity-api/account/account-profiles-by-email) - This API is used to fetch all of the profile details provided at the time of registration by the Customer, which is associated with a  specified email in Cloud Directory.

- [Account Profiles by Username](/api/v2/customer-identity-api/account/account-profiles-by-user-name) - This API is used to retrieve all of the profile details provided at the time of registration by the Customer, associated with the specified account by the specified Username in Cloud Directory.

- [Account Profile by Phone ID](/api/v2/customer-identity-api/account/account-profiles-by-phone-id) - This API is used to retrieve all of the profile details provided at the time of registration by the Customer, associated with the specified account by the specified PhoneID in Cloud Directory.

- [Account Profiles by UID](/api/v2/customer-identity-api/account/account-profiles-by-uid) - This API is used to retrieve all of the profile details provided at the time of registration by the Customer, associated with the specified account by the specified UID in Cloud Directory.

- [Privacy Policy History by UID](/api/v2/customer-identity-api/account/privacy-policy-history-by-uid) - This API is used to retrieve all of the accepted Policies by the Customer, associated with their UID at the time of Registration. This API returns the “Current version”, “AcceptSource”(from where the Customer accepted the Privacy Policy), “AcceptDateTime” the Date and time at which the Customer accepted the Privacy Policy. You can configure Privacy Policy by following the [Privacy Policy Versioning](/api/v2/dashboard/data-governance/privacy-policy) document.

## Account APIs related to profile update

These APIs update information for existing accounts in your dashboard. Types of Update APIs include:

- [Account Set Password](/api/v2/customer-identity-api/account/account-set-password) - Sets the password of an account in the Cloud Directory based on UID, returning a hashed password upon success.

- [Account Update](/api/v2/customer-identity-api/account/account-update) - Updates information for existing accounts in the Cloud Directory.

- [Account Update Security Question Configuration](/api/v2/customer-identity-api/account/account-update-security-question) - Updates the configuration of security questions, including the security answer.

- [Account Invalidate Verification Email](/api/v2/customer-identity-api/account/account-invalidate-verification-email) -  Invalidates the verification status of an account, requiring re-verification for further actions. Verification status can be checked under [Customer Management](https://adminconsole.loginradius.com/profile-management/customer-management/search-customers) section of the Admin Console.

## Account APIs related to delete profile

These APIs allow for the deletion of customer accounts or emails, enabling re-registration for a new account. Types of Delete APIs include:

- [Account Email Delete](/api/v2/customer-identity-api/account/account-email-delete) -  Removes an email from a customer account.

    > **Note:** You can only delete an email if more than one email ID is verified.

- [Account Delete](/api/v2/customer-identity-api/account/account-delete) - This API deletes the Customers account and allows them to re-register for a new account. This API will delete all the related account information associated with the email address including Secondary Email Address and other details.

These APIs provide robust tools for managing customer accounts, ensuring secure and efficient administration within the LoginRadius system.
