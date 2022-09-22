# Roles Management Overview

---

##### Table of Contents

1. [Overview](#overview0)
2. [Components](#components1)
3. [Role](#role2)
4. [Permission](#permission3)
5. [Context](#context4)
6. [Admin Console Configuration](#adminconsoleconfiguration5)
7. [API Usage](#apiusage6)
8. [Example](#example7)

## Overview
A common addition to user registration systems is the ability to define roles for your users and restrict access to portions of your site based on user permissions. As part of the LoginRadius User Registration system, we have 3 ways to define access "Role, Permission and Context" You can follow the details below to learn more about how to manage User Roles, Permissions, and Context in your implementation:

## Components
The LoginRadius Roles Management is handled by the following 3 components:

1. [Role](#role2)
2. [Permission](#permission3)
3. [Context](#context4)

### Role
The role is the title given to the set of Permissions you will grant the user. A role can have many permissions.

##### Example:
The user John Doe is assigned a role on an internet forum e.g. "Moderator", "Admin"

### Permission
Permissions are used to define what type of permissions you want to grant each role.

##### Example:
You have Moderators on a web forum and you want them to be able to "Edit" posts but not "Delete" them. In this case, you would create a "Moderator" role for your moderators, and you would give the "Moderator" Role the "Edit" Permission.

### Context
Contexts in our APIs are essentially containers/data storage for custom roles and permissions. They are used to give additional permissions to your users on a case by case basis (the Context).
While Contexts are independent of the basic Roles and Permissions and are optional, Contexts can be useful when combined with Roles and Permissions.

Here is the recommended workflow:

1. The first step to using a Context is to give it a name

   e.g. : School, Online Classes

   This will help us know when to use the Context

2. Next you provide the Roles for the Context, you should provide the Roles that are to be receiving additional permissions in the provided Context:

   e.g. Student, Teacher, Principal

3. Context has a field named "Additional Permissions" you can add any additional permission you wish to be tied to the Context.

   e.g. Access to School Activities (for a Student studying at school), Access to 24/7 Online Support System (for a Student studying remotely via Online Classes).

These are essentially Permissions that would not be encountered outside the Context.

[Please see below for a full example of an implementation using Context-based Roles Permissions](#example7)

## Admin Console Configuration

1. The Role and Permission Components can easily be configured via the LoginRadius Admin Console under:

PLATFORM CONFIGURATION >> ACCESS CONFIGURATION >> ROLES AND MEMBERSHIP
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Roles-And-membership---LoginRadius-User-Dashboard_311935e96f956181a82.50759525.png "")

2. To begin configuration make sure that you are under "Manage Roles & Permissions" on the left-hand-side.
   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/Roles-And-membership---LoginRadius-User-Dashboard-1_155505e96fa7224a868.77061536.png "")

3. To add a new role simply click on "Add" on the right-hand-side and give it a name under "Role".
   You will also need to give it at least 1 permission under "ADD PERMISSION(S)". Once you have added all of your desired permissions simply click "Save" to save the role.
   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/Roles-And-membership---LoginRadius-User-Dashboard-4_54565e96fd504af840.63738088.png "")

4. (Optional Step) If you would like to add a Default Role that all of your users should receive upon registration you can click "Default Role & Permission" on the left-hand-side. You will get a list of all the Roles you have created. Simply click the checkmark next to the desired role in the "DEFAULT" column.
   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/Roles-And-membership---LoginRadius-User-Dashboard-6_78625e97004bce31f6.71802961.png "")

## API Usage

If you have any flows that go beyond adding default Roles and Permissions to your users you will need to leverage our Roles Management API.

Steps to implement via API:

1. Create a Role using the [Roles Create API Call](/api/v2/user-registration/roles-create).
   This will add the role to the list of roles you have created (the same that's in your Admin Console)
   if you need to access this list via API you can use our [Roles list API Call](/api/v2/user-registration/roles-list)

2. Check if a user has a Role - You can easily check if a user has a Role using our [Roles by UID API Call](/api/v2/user-registration/roles-by-uid)

3. If you wish to add a Role to a user that doesn't have one you can simply use our [Roles Assign to User API Call](/api/v2/user-registration/roles-assign-to-user)

4. If you wish to remove a role from a specific user you can use our [Roles UnAssign to User](/api/v2/user-registration/roles-unassign-to-user)

5. Customize your workflow - Anything beyond basic functionality can be added with the Roles Management API. For Example if you wish to provide new permissions to roles instead of doing it from the Admin Console you can use our [Account Add Permissions to Role API Call](/api/v2/customer-identity-api/roles-management/add-permissions-to-role/) or if there's an additional permission you'd like to only be applied in a specific Context you can leverage our [Upsert Context API Call](/api/v2/user-registration/roles-create-context)

## Example

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
