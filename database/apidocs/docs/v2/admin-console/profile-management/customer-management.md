# Customer Management

## Overview

Under this section, you can manage your customers using the functionality we have provided to assist you in handling your customer base without needing to create your own management tool. Managing the customer base includes searching for some specific customer, taking some specific action on them and some more management related actions.

## Search Customers

Using this section you can search for a given customer through different domains.

Eg: Name, Email, PhoneID etc. or the other fields you have set in Standard login.

See below GIF image to show the search functionality

![Share](https://apidocs.lrcontent.com/images/Customer-Management-LoginRadius-User-Dashboardsearch2_24434622275927a8389.36236625.png "Share")

> **Note:** You can also share a customer profile using the shareable profile URL under the customer profile.

In addition to the search feature available in the Admin Console, you can also use our API’s to get the customer details, please check the below API links

- [Account Identities by Email](/api/v2/customer-identity-api/account/account-identities-by-email/)
- [Account Impersonation API](/api/v2/customer-identity-api/account/account-impersonation-api/)
- [Account Password](/api/v2/customer-identity-api/account/account-password/)
- [Account Profiles by Email](/api/v2/customer-identity-api/account/account-profiles-by-email/)
- [Account Profiles by User Name](/api/v2/customer-identity-api/account/account-profiles-by-user-name/)
- [Account Profiles by Phone ID](/api/v2/customer-identity-api/account/account-profiles-by-phone-id/)
- [Account Profiles by UID](/api/v2/customer-identity-api/account/account-profiles-by-uid/)

## Manage Accounts

Under this section, you can view the complete list of customer management functions such as add, edit or delete customer profiles, as well as trigger emails and reset customer's passwords.

This option presents you all of the fields for that particular user.

E.g. "Personal Info", "Custom Fields", Security, Roles, etc.

For more details on fields available on **Manage** option, you can refer to this [document](/customer-management/profile-view/).

![Manage Button](https://apidocs.lrcontent.com/images/4--Manage-Button_4806630253d8ad2082.72767805.png "Manage Button")

## Blocked Customers

You can further customize your registration form by enabling/disabling and configuring the Brute Force Lockout feature. This allows you to restrict account access based on failed login attempts. Once the limit of failed login attempts is reached, the customer will either be blocked or be prompted to complete an additional security step to login. Brute Force Lockout settings can be updated via Platform Security → Account Protection → Auth Security, please see screenshot below:

![PM3](https://apidocs.lrcontent.com/images/Screenshot-3_9271605495d357b716.37992159.png "PM3")

You can block your customers which will restrict them or block them from logging into your sites or apps. You can check the list of the blocked user under this section and if required this gives you the functionality to unblock as well. See below screenshot which displays the option to unblock a blocked customer.

![Unblock Customer](https://apidocs.lrcontent.com/images/5--Unblock-Customer_2254963025415efc658.49875367.png "Unblock Customer")

Additionally, you can use our API and unblock user by using the access token, please check the below link of our [API document](/api/v2/customer-identity-api/authentication/auth-unlock-account-by-access-token/).

## Add a new Customer

You can manually add a new customer after adding the mandatory fields and because of this, they can avoid going through the full registration process. Once the mandatory fields are filled and the form is submitted, the new customer will be registered with your site. If email settings are configured for your site, you will be able to send a verification email.

See below screenshot to show the process of manually adding a customer

![PM5](https://apidocs.lrcontent.com/images/Screenshot-5_21830605496c7151754.83792953.png "PM5")

You can also use our API which helps you to create a user in the database as well as sends a verification email to the user, please follow this [link](/api/v2/customer-identity-api/authentication/auth-user-registration-by-email/).
