# Custom SAML Provider Introduction

LoginRadius Identity Platform supports both SAML 1.1 and SAML 2.0 flows to manage an **Identity Provider (IDP)** or as a **Service Provider** in case of Custom IDP and It supports both IDP initiated, and SP-initiated SAML flows.

The LoginRadius Admin Console allows you to configure the SAML app by customizing the assertions, keys, and endpoints to match any SAML provider requirements.

In this document you will learn how to connect your SAML custom IDP provider and how to configure this via LoginRadius Admin Console.

## Part 1 - Configuration

This section covers the required configurations that you need to perform in the LoginRadius Admin Console to implement the SAML Provider.

**Step 1:** Log in to your LoginRadius **[Admin Console](https://adminconsole.loginradius.com/)** by navigating to **Platform Configuration > Authentication Configuration > Custom IDPs**. Click on **SAML Provider** Tab.

The following screen will appear:

![SAML Custom IDP ](https://apidocs.lrcontent.com/images/c1_185956102f2db208fd8.61080527.png "enter image title here")
**Step 2:** To configure the details in the Admin Console, click the **Add A New Provider** button displayed on the screen below

![SAML Custom IDP](https://apidocs.lrcontent.com/images/c2_143806102f304f34993.34536738.png "SAML Custom IDP")

The SAML Provider configuration fields appear on the same screen as displayed below:

![Custom IDP full view](https://apidocs.lrcontent.com/images/custom-idp_271367546425cc5c907093.34091358.png "Custom IDP full view")

**Step 3:** In the **Login Flow choose** the desired SAML flow from the dropdown and in the **Provider Name** field, enter the unique name of the SAML provider.

> **Note:** Below are the validation rules that should be taken care of while creating the **Provider Name**.If any of the below validation rule is not followed the error message: `Provider Name is not valid` will be shown.

1. Only **\_** (underscore) and **-** (hyphen) are allowed as a special charater.
2. App name should start with a **character**.
3. Alpha numeric values are allowed.
4. No space is allowed in between.
5. Minimum length of the app name should be **[1]** and maximum length upto **[60]** is allowed.
6. Now all the app names are allowed in lowercase only. If the uppercase is entered it will be automatically coverted into lowercase.

**Step 4:** In the **Display Provider Name (Optional)** field, enter the Display name options (if any) supported by the provider apart from the default options (it varies from provider to provider).

**Step 5:** in **ID Provider Binding** selected the appropriate provider from the dropdown list.

**Step 6:** In **ID Provider Location** enter the **SIGN-ON ENDPOINT** which you get from the SAML account.

**Step 7:** In **ID Provider Logout Url** enter the **SIGN-OUT ENDPOINT** which you get from the SAML account.

**Step 8:** In **ID PROVIDER CERTIFICATE** enter the certificate for IdP i.e SAML.

> **Note:** The **Service Provider Certificate** and its **Key** are now automatically generated from the backend in the Admin Console, with a default expiry time of **five years.**

**Step 9:** For **RELAY STATE PARAMETER** enter **RelayState**

**Step 10:** For **DATA MAPPING** select the LoginRadius' fields (SP fields) and enter the corresponding SAML supported app fields (IdP fields) e.g.

| Fields | Profile Key |
|--|--|
| Email | email |
| FullName | username |

**Step 11**: Once all the required fields are completed, scroll down and hit **Save**.

> **Note:** You should have an account with the same email address in your SAML application as well as in LoginRadius before using your SAML application to login to the LoginRadius Admin Console.

## Part 2 - Next Step:

The following is the list of documents you might want to look into:

- [Custom OAuth Provider](/single-sign-on/tutorial/custom-identity-providers/custom-oauth-provider/)
- [Custom JWT Provider](/single-sign-on/custom-identity-providers/custom-jwt-provider/)
