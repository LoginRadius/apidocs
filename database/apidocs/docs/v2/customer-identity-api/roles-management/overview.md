
# Roles Management Overview

## Overview

LoginRadius also supports the feature to assign the specific role, permission and context to the individual during the time of registration process. Using this you can define role for your users and restrict access to portions of your site based on user permissions. Now let's see how to manage User Roles, Permissions, and Context in your implementation.

  

## Components

The LoginRadius Roles Management is handled by the following 3 components:

1. [Role](#role2)

2. [Permission](#permission3)

3. [Context](#context4)


## Role

The role is the title given to the set of Permissions you will grant the user. A role can have many permissions.

## Permission

Permissions are used to define what type of permissions you want to grant each role.

For the Admin Console Configuration of Roles and Permission you can refer to this [document.](https://www.loginradius.com/legacy/docs/authentication/concepts/roles-and-membership/#partrolesandpermissionsconfiguration0)  

## Context

Contexts in our APIs are essentially containers/data storage for custom roles and permissions.
  
For the Admin Console Configuration of Conntext you can refer to this [document.](https://www.loginradius.com/legacy/docs/authentication/concepts/roles-and-membership/#partcontextconfiguration4)

### LoginRadius API usage for Roles and Permissions


If you have any flows that go beyond adding default Roles and Permissions to your users you will need to leverage our Roles Management API.

**Steps to implement via API:**

1. Create a Role using the [Roles Create API Call](/api/v2/user-registration/roles-create).This will add the role to the list of roles you have created (the same that's in your Admin Console) if you need to access this list via API you can use our [Roles list API Call](/api/v2/user-registration/roles-list).

2. Check if a user has a Role - You can easily check if a user has a Role using our [Roles by UID API Call](/api/v2/user-registration/roles-by-uid).

  

3. If you wish to add a Role to a user that doesn't have one you can simply use our [Roles Assign to User API Call](/api/v2/user-registration/roles-assign-to-user).

  

4. If you wish to remove a role from a specific user you can use our [Roles UnAssign to User](/api/v2/user-registration/roles-unassign-to-user).

  

5. Customize your workflow - Anything beyond basic functionality can be added with the Roles Management API. For Example if you wish to provide new permissions to roles instead of doing it from the Admin Console you can use our [Account Add Permissions to Role API Call](/api/v2/customer-identity-api/roles-management/add-permissions-to-role/) or if there's an additional permission you'd like to only be applied in a specific Context you can leverage our [Upsert Context API Call](/api/v2/user-registration/roles-create-context).


### LoginRadius API usage for Context

1. **Create Context:** You can create a context with a set of existing roles using the [Upsert Context API.](/api/v2/user-registration/roles-create-context).

2. **Delete Context:** You can delete a context using the [Delete Context API.](/api/v2/customer-identity-api/roles-management/delete-context/).

3. **Delete Role from Context:** You can delete a role from the context using the [Delete Role from Context API.](/api/v2/customer-identity-api/roles-management/delete-role-from-context/).

4. **Delete Permissions from Context:** You can delete additional permission(s) from the context using the [Delete Permissions from Context API.](/api/v2/customer-identity-api/roles-management/delete-role-from-context/).

5. **Get Context:** You can get the contexts that have been configured and the associated roles and permissions using the [Get Context API](/api/v2/customer-identity-api/roles-management/get-context/).
  

### Example

Please follow the chart below to see an example of a full implementation of Roles and Permissions including Context being applied to a School that offers both in-person and Online Classes:

![example of context based roles and permissions](https://apidocs.lrcontent.com/images/teachersandstudents---Page-1-2_262459b8236666d638.50884240.png "Example of Roles & Permissions")
 

In the School Students can Access School Activities, however for Online Students they do not have that permission, instead they get the ability to use the Online 24/7 Support System.


##### Example in JSON

```
{
  "Data": [
    {
      "Context": "School",
      "Roles": ["Student", "Principal", "Teacher"],
      "AdditionalPermissions": [
        "Access to School Activities"
      ],
      "Expiration": null
    },
    {
      "Context": "Online Classes",
      "Roles": ["Student", "Principal", "Teacher"],
      "AdditionalPermissions": [
        "Access to 24/7 Support System"
      ],
      "Expiration": null
    }
  ]
}
```
