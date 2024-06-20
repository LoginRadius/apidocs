# Customer Management

## Overview

Under this section, you can manage your customers using the functionality we have provided to assist you in handling your customer base without needing to create your own management tool. Managing the customer base includes searching for specific customers, taking specific action on them, and taking other management-related actions.

## Search Customers

Using this section, you can search for a given customer through different domains.

Eg: Name, Email, PhoneID, etc., or the other fields you have set in Standard login.

![Search](https://apidocs.lrcontent.com/images/cm-1_3620931166662b04031f3b8.53503324.png "Search")

> **Note:** You can also share a customer profile using the shareable profile URL by clicking the copy icon.

In addition to the search feature available in the Admin Console, you can also use our APIs to get the customer details. Please check the below API links.

- [Account Identities by Email](/api/v2/customer-identity-api/account/account-identities-by-email/)
- [Account Impersonation API](/api/v2/customer-identity-api/account/account-impersonation-api/)
- [Account Password](/api/v2/customer-identity-api/account/account-password/)
- [Account Profiles by Email](/api/v2/customer-identity-api/account/account-profiles-by-email/)
- [Account Profiles by User Name](/api/v2/customer-identity-api/account/account-profiles-by-user-name/)
- [Account Profiles by Phone ID](/api/v2/customer-identity-api/account/account-profiles-by-phone-id/)
- [Account Profiles by UID](/api/v2/customer-identity-api/account/account-profiles-by-uid/)

## Manage Accounts

This section provides a complete list of customer management functions, such as adding, editing, or deleting their profiles, triggering emails, and resetting passwords.

This option presents you with all of the fields for that particular user.

E.g., "Personal Info", "Custom Fields", Security, Roles, etc.

For more details on fields available on the **Manage** option, you can refer to this [document](/customer-management/profile-view/).

![Manage Button](https://apidocs.lrcontent.com/images/4--Manage-Button_4806630253d8ad2082.72767805.png "Manage Button")

## Blocked Customers

You can further customize your registration form by enabling/disabling and configuring the Brute Force Lockout feature. This allows you to restrict account access based on failed login attempts. Once the limit of failed login attempts is reached, the customer will either be blocked or be prompted to complete an additional security step to login. Brute Force Lockout settings can be updated via Platform Security → Account Protection → Auth Security. Please see the screenshot below:

![block](https://apidocs.lrcontent.com/images/cm-2_6263326736662b11d7021b0.05026120.png "block")

You can block your customers, which will restrict them, or block them from logging into your sites or apps. You can check the list of blocked users under this section, and if required, this gives you the functionality to unblock as well. See the below screenshot, which displays the option to unblock a blocked customer.

![Unblock Customer](https://apidocs.lrcontent.com/images/5--Unblock-Customer_2254963025415efc658.49875367.png "Unblock Customer")

Additionally, you can use our API to unblock users by using the access token. Please check the link below to our [API document](/api/v2/customer-identity-api/authentication/auth-unlock-account-by-access-token/).

> **Note:** Alternatively, you can block or unblock an account using the [**Account Update API**](/api/v2/customer-identity-api/account/account-update/) by passing the value of the **IsActive** field as **false or true**, respectively. If the passed value is **false**, the account will be **blocked**, whereas if the passed value is **true**, the account will be **unblocked.** 

## Add a new Customer

You can manually add a new customer after adding the mandatory fields, which allows them to avoid going through the full registration process. Once the mandatory fields are filled and the form is submitted, the new customer will be registered with your site. If email settings are configured for your site, you will be able to send a verification email.

See the screenshot below to show the process of manually adding a customer.


![Add New Customer](https://apidocs.lrcontent.com/images/cm-3_14607435196662b22552a357.24276831.png  "Add New Customer")

You can also use our API, which helps you create a user in the database and sends a verification email to the user. Please follow this [link](/api/v2/customer-identity-api/authentication/auth-user-registration-by-email/).


## Consumer Audit Logs

The Consumer Audit logs enable you to monitor and track activities within your LoginRadius environment for the user profile based on their UID.

> **Note:** The consumer audit logs will display a maximum of the recent 1000 logs. To enable this feature, contact the [LoginRadius Support Team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

To access these logs, go to [Profile Management > Customer Management > Consumer Audit Logs](https://adminconsole.loginradius.com/profile-management/customer-management/consumer-audit-logs) section of the Admin Console.

![Search](https://apidocs.lrcontent.com/images/cal-1_1299852886662ad746cbcd4.02569578.png "Search logs by UID")

For more details regarding a specific log, click on the **View** button.

![detailed view](https://apidocs.lrcontent.com/images/cal-2_6687330646662adc1192eb6.52007441.png "detailed view")
