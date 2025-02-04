# Parent and Child Accounts Overview

This document provides an overview of how Parent and Child Account Relationships can be implemented by leveraging Custom Objects. Before you begin, you should be familiar with **Account IDs** and **Custom Objects**.

## Workflow
As per a typical implementation, any account is created using the **Account Create API** and with the help of **Custom Objects**, we can create additional fields to hold custom data. With these additional fields, we are able to indicate the relationship between the accounts. For example, both the Parent and Child Accounts might have an "**AssociatedAccounts**" field that contains **UIDs** to indicate a many-to-many relationship.

The image below shows two types of relationships (*one-to-many* and *many-to-many*) which we will use as the basis of our example, keep in mind that each field is to be contained inside a custom object associated to the corresponding account.

1) The Parent Account has a "**PrimaryAccountHolder**" field that stores the **UID** of one of the many Child Accounts that will have access to the Parent Account creating a 1:M (one-to-many) relationship. 

2) The Parent Account has a field called "**ChildAccounts**" to list out an array of all the Child Accounts that have access to it, and the Child Account has a "**ParentAccounts**" field storing an array of Parent UIDs to show all the different accounts that the Child Account has access to. This creates a M:M (many-to-many) relationship between a Parent and Child account.

![parent child account diagram](https://apidocs.lrcontent.com/images/Parent-Child-Accounts_109825d5c5139d61298.82328262.png "parent child account diagram")

## Implementing
1. Creating the Parent Account
    1. Generate a fictional email (e.g. parentacct-342@example.com)
    2. (Optional) - Set a UserName
    3. Call the [Account Create API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-create/)
    4. Grab the Parent Account's **UID** (e.g. 24490de9c54145a4818b0cb688a3f3e2)

2. Creating the Parent Account's Custom Object
    2. Using the UID obtained from the [Account Create API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-create/), call the [Create a Custom Object API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/create-custom-object-by-uid/), and leave the fields blank at this point
    3. Store the CustomObjectID for later (e.g. 5d1680d35895633610b18ac7)

3. Creating the Child Account
    3. Using the [Account Create API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-create/), create the Child Account
    4. Store the Child Account's **UID** for later (e.g. 8cfdc5ab1ef546169ff1231003caeefb)

4. Creating the Child Account's Custom Object
    4. Using the UID obtained from the Child Account, call the [Create a Custom Object API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/create-custom-object-by-uid/)
    5. This custom object will contain an array field named **ParentAccounts**, in this field, push the **UID** obtained from the Parent Account

5. [Update the Custom Object](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-uid/) on the Parent Account
    5.  Using the Parent Account’s **UID** and the **CustomObjectID**, include a **PrimaryAccountHolder** field that contains the UID from the child and a **ChildAccounts** array (again, pushing the UIDs of the child accounts)

6. Pull the data when needed by using the [Get Custom Object by UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-uid/)
    6. Example of pulling the data for the Parent:

    ```
    [
        {
            "Id": "5c45f649ae23da3fd8262e7c",
            "IsActive": true,
            "DateCreated": "2019-01-21T16:41:45.2860000Z",
            "DateModified": "2019-01-21T16:41:45.2860000Z",
            "IsDeleted": false,
            "Uid": "24490de9c54145a4818b0cb688a3f3e2",
            "CustomObject": {
            "PrimaryAccountHolder": "8cfdc5ab1ef546169ff1231003caeefb"
            "ChildAccounts": ["8cfdc5ab1ef546169ff1231003caeefb"]
        }
    ]
    ```

    7. Example of pulling the data for the Child Account:
    ```
    [
        {
            "Id": "5c45f649ae23da3fd8262e7c",
            "IsActive": true,
            "DateCreated": "2019-01-21T16:41:45.2860000Z",
            "DateModified": "2019-01-21T16:41:45.2860000Z",
            "IsDeleted": false,
            "Uid": "79fe************************2042",
            "CustomObject": {
            "ParentAccounts": ["24490de9c54145a4818b0cb688a3f3e2"]

        }
    ]
    ```

