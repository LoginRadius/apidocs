# View and Manage Customers

This guide will take you through searching the customers registered in your LoginRadius account via the LoginRadius Identity Platform.

Search Customers screen displays the list of the customers registered in your account. You can filter or search the customers based on the search parameters available in the dropdown. The fields mainly used as search parameters are Name, Email Address, UID, ID, PhoneID.

> **Note:** You can update these search parameters or fields by adding the custom fields in the Standard Login [Data Schema](/authentication/quick-start/standard-login/) section.

The following explains how you can search and manage the customers registered in your application:

**Step 1:** Log in to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account and navigate to <a href = https://adminconsole.loginradius.com/profile-management/customer-management/search-customers target=_blank>**Profile Management > Customer Management**</a>.

The following screen will appear with the list of the customers registered in your account:

![Search Customer](https://apidocs.lrcontent.com/images/Customer-Management---Search-Customers_10097628204cc8c7137.44155183.png "Search Customer")

**Step 2:** Select the domain and field name from the dropdowns and click the search button, as highlighted in the following screen:

![Customer Management - Search Customers - Search](https://apidocs.lrcontent.com/images/Customer-Management---Search-Customers---Search_30182628206679033d4.29904763.png "Customer Management - Search Customers - Search")

Search results are filtered based on the following:

- **Domain:** This dropdown lists all the domains from where the customers are registered to your application.

- **Fields:** This dropdown lists the following fields along with the **custom fields** available in your Standard Login Data Schema section.
- Name
- Email
- UID
- ID
- PhoneID

You need to enter the customer details in the textbox based on the fields selected from above.

> **Note:** You can update the search parameters(fields) by adding the custom fields in the Standard Login [Data Schema](/authentication/quick-start/standard-login/) section.

From the step 3 it will explain you can **Manage** the customers registered in your application

**Step 3:** Click the **Manage** button to manage the customer profile as highlighted in the following screen:

![Manage](https://apidocs.lrcontent.com/images/cm3_25355e84dc42e551a8.31582813.png "Manage")

**Manage** action provides a comprehensive range of functions and information for each customer. Clicking the Manage button displays the following pop-up:

![Manage Button](https://apidocs.lrcontent.com/images/4--Manage-Button_4806630253d8ad2082.72767805.png "Manage Button")

You can perform the following functions as highlighted in the **right** section of the above screen:

- Update Verification Status
- Reset Password
- Send Reset Password Mail
- Add Secondary Email
- Logout Customer
- Block Customer
- Delete Customer 

You can view the following customer information, as highlighted in the **left** section of the above screen:

- **Account Info** - This contains information like ID, Full name, Emails(Primary and Secondary), Email Verified, and ExternalIds.

  **Note:** While sending the Reset Password Mail or Verification Mail from the available option, the previously used URLs will be automatically prepopulated when you click on the corresponding text box.

   Kindly refer to the below screenshot.
   ![Reset password image](https://apidocs.lrcontent.com/images/Reset-password-URL_13919633fd276742d13.10669880.png "Reset password image")

- **Security** - Security section contains the information like Last Password Change Date, Password Expiration Date, Last Password Change Token, Is Deleted, Is Login Locked, Disable Login.
- **Roles** - From this section, you can configure the **Context** for your application after selecting the created **Roles**. Refer to this [document](/authentication/concepts/roles-and-membership/#partrolesandpermissionsconfiguration0) for detailed information regarding the configuration.
- **Activity** - This section provides you with the customer login information like whether the account is active or not which you can identify by the field **Is Active**, other details like Last Login Date, Last Login Location, No Of Logins, and the Modified Date. 
- **Insights** - This section contains information like account Created Data, Signup Date, Registration source, Signup Log, and User-Agent.
- **Profile Info** - This contains the customer information like Full name, Last name, Prefix, Suffix, Phone numbers, Addresses, Time Zone, Birth data, and Age. You can update these customer details from this section.
- **Social Info** - This section contains the Advanced Data-points that LoginRadius provides. Refer to this [document](/api/v2/admin-console/social-provider/advanced-social-data-points/#facebook0) for more information
- **Custom Fields** - From this section, you can check all the active and inactive(optional) custom fields and update them if required.
- **Custom Objects** - You can check the set custom objects from this section.
- **Consent Info** - This section will show you the **status** of whether the customer has accepted consent or not with a lot of other information like ID, Title, description, and last modified date. To get detailed information regarding **Consent** refer to this [document](/api/v2/customer-identity-api/consent-mangement/overview/).

> **Note:** In addition to the Search and Manage customers features available in the LoginRadius Admin Console, you can use the following Account APIs to get the customer details:
> * [Account Identities by Email](/api/v2/customer-identity-api/account/account-identities-by-email/)
  > * [Account Impersonation API](/api/v2/customer-identity-api/account/account-impersonation-api/)
  > * [Account Password](/api/v2/customer-identity-api/account/account-password/)
  > * [Account Profiles by Email](/api/v2/customer-identity-api/account/account-profiles-by-email/)
  > * [Account Profiles by User Name](/api/v2/customer-identity-api/account/account-profiles-by-user-name)
  > * [Account Profiles by Phone ID](/api/v2/customer-identity-api/account/account-profiles-by-phone-id/)
  > * [Account Profiles by UID](/api/v2/customer-identity-api/account/account-profiles-by-uid/)



