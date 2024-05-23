
# Account Overview

The Account APIs are used to fetch and update details about the customers in the Admin Console. The Account APIs are only to be used by a system administrator or via your back-end in a secured setup. In either case, you'll want to be sure you know the impact of the changes being applied, as this API carries administrative capabilities that can override default behavior in the LoginRadius workflows.

There are four types of request methods that can be made:

- [Account APIs for registration](#accountapisforregistration0)
- [Account APIs to obtain customer profile data after successful registration](#accountapistoobtaincustomerprofiledataaftersuccessfulregistration1)
- [Account APIs related to profile update](#accountapisrelatedtoprofileupdate2)
- [Account APIs related to delete profile](#accountapisrelatedtodeleteprofile3)

> **Note:** Account APIs make use of an API secret with **management capabilities**, which are primarily used for backend operations. As a result, they do not adhere to some security settings defined in the Admin Console.

#### Account APIs for registration

These sets of APIs are used for creation-related tasks e.g., to create an account in the LoginRadius Admin Console. This API bypasses the normal email verification process and manually creates the customer. For a successful response, you need to format a JSON request body with all of the mandatory fields. Here are some of the common ones you'll encounter:



- [Account Create](/api/v2/customer-identity-api/account/account-create) - Creates a LoginRadius account in the Cloud Directory with the necessary details provided. 
- [Email Verification token](/api/v2/customer-identity-api/account/get-email-verification-token) - This API Returns an Email Verification token by requesting the Email ID of the particular customer. The verification token returned helps in verifying a customer account.
- [Forgot Password Token](/api/v2/customer-identity-api/account/get-forgot-password-token) - This API returns a Forgot Password Token which is helpful in sending a Forgot Password email to the customer. Note: Replace ‘email’ parameter with ‘username’ in the body if you have the UserName workflow enabled.


#### Account APIs to obtain customer profile data after successful registration
You can retrieve all identities (UID and Profiles) associated with a specific Customer profile which exists in dashboard via these sets of APIs. You can view various details based on the APIs been used. There are the following types of Read Customer Profile APIs:



- [Account Identities by Email](/api/v2/customer-identity-api/account/account-identities-by-email) - This API is used to retrieve all of the identities linked to a particular LoginRadius Profile.
- [Access Token based on UID or User impersonation API](/api/v2/customer-identity-api/account/account-impersonation-api) - This API is used to get LoginRadius access token based on UID which is further helpful in Login Process.

- [Account Password](/api/v2/customer-identity-api/account/account-password) - This API is used to retrieve the hashed password of a specified account in Cloud Directory. The hashed password can be fetched by the system administrator of the organization.

- [Account Profiles by Email](/api/v2/customer-identity-api/account/account-profiles-by-email) - This API is used to fetch all of the profile details provided at the time of registration by the Customer, which is associated with a  specified email in Cloud Directory.

- [Account Profiles by Username](/api/v2/customer-identity-api/account/account-profiles-by-user-name) - This API is used to retrieve all of the profile details provided at the time of registration by the Customer, associated with the specified account by the specified Username in Cloud Directory.

- [Account Profile by Phone ID](/api/v2/customer-identity-api/account/account-profiles-by-phone-id) - This API is used to retrieve all of the profile details provided at the time of registration by the Customer, associated with the specified account by the specified PhoneID in Cloud Directory.

- [Account Profiles by UID](/api/v2/customer-identity-api/account/account-profiles-by-uid) - This API is used to retrieve all of the profile details provided at the time of registration by the Customer, associated with the specified account by the specified UID in Cloud Directory.


- [Privacy Policy History by UID](/api/v2/customer-identity-api/account/privacy-policy-history-by-uid) - This API is used to retrieve all of the accepted Policies by the Customer, associated with their UID at the time of Registration. This API returns the “Current version”, “AcceptSource”(from where the Customer accepted the Privacy Policy), “AcceptDateTime” the Date and time at which the Customer accepted the Privacy Policy. You can configure Privacy Policy by following [this doc](/api/v2/dashboard/data-governance/privacy-policy).



#### Account APIs related to profile update
You can update the information of existing accounts in your dashboard via these sets of API. You can update the details like FirstName, LastName, Gender and many others. There are  four types of Update APIs:

- [Account Set Password](/api/v2/customer-identity-api/account/account-set-password) - This API is used to set the password of an account in Cloud Directory based on the UID. It returns a hashed password in case of a Successful response.
- [Account Update](/api/v2/customer-identity-api/account/account-update) - This API is used to update the information of existing accounts in your Cloud Directory. 

- [Account Update Security Question Configuration](/api/v2/customer-identity-api/account/account-update-security-question) - This API is used to update security questions configuration which includes updating the Security Answer.

- [Account Invalidate Verification Email](/api/v2/customer-identity-api/account/account-invalidate-verification-email) - This API is used to invalidate the verification status of an account. You can check the verification status of a particular account by navigating to Profile Management > Customer Management. You need to reverify the account in order to perform further actions.


#### Account APIs related to delete profile
You can delete the Customer account or delete an Email and re-register for a new account via [this API](/api/v2/customer-identity-api/account/account-delete).
There are two types of Account Delete APIs:

- [Account Email Delete](/api/v2/customer-identity-api/account/account-email-delete) - Use this API to Remove emails from a Customer Account. Note: You can only delete an Email only if more than one Email Id is verified. 
- [Account Delete](/api/v2/customer-identity-api/account/account-delete) - This API deletes the Customers account and allows them to re-register for a new account. This API will delete all the related account information associated with the email address including Secondary Email Address and other details.