# Custom Object Overview

A Custom Object is a schema-less object that can be attached to a specific account. It can have a dynamic storage container that is updated with additional fields or data formats on the fly.  A Custom Object should be used if you are looking to store large amounts of user data and the data can’t be formatted in a structured format because the data format could be different for each user. The Custom Object is serviced by Custom Object Rest APIs, which allows you to store or update complex data objects that would not be easily accessible in a single layer field (Custom Field) such as nested data or objected arrays.

>**NOTE:** This feature is enabled and configured from the back-end. If you want to have this feature enabled on your account, raise a request to the [LoginRadius Support Team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket)

## Main features of Custom Object

- Schema-less data storage object
- Nested data record
- Multiple nested objects inside the main custom object
- Can store different data types
- Can store a large amount of data
- Fully serviced by REST APIs
- Support data query using REST APIs
- Auto indexed and normalized in the data store
- Multiple custom object on a single user profile
- Multiple custom object record in a single custom object

![Custom_objects](https://apidocs.lrcontent.com/images/Custom-Object_54165cca84d0759357.92059160.png "Custom_objects")


## An example of a Custom Object’s schema

```
[
  {
    "Id": "5xxxxxxxxxxxxxxxxxf",
    "IsActive": true,
    "DateCreated": "2015-03-03T21:10:04.83Z",
    "DateModified": "2015-03-03T21:10:04.83Z",
    "IsDeleted": false,
    "Uid": "5xxxxxxxxxxxxxxxxxa",
    "CustomObject": {
      "Test":[
        {
          "field1": "Data3",
          "field2": "Data4",
          "field3": "Data5"
        },
        {
          "field11": "Data31",
          "field21": "Data41",
          "field31": "Data51"
        }
      ]
    }
  }
]
```

## Custom Object FAQ

The following questions may arise while implementing a custom object, please refer to the below section to find the answers of them.

### How can a Custom Object be used?

Custom Objects are used to store large amounts of data for a user. We can use the various Custom Object Rest APIs to create and delete Custom Objects as well as update the stored data.

### How many Custom Objects can I have for each user?

We allow one Custom Object for each user but with multiple data records. As it is schema-less, you can store any type of data in any format, so you only need to utilize one Custom Object per user. If you find yourself requiring more than one per user, raise a request via our Support Ticket with the details.

### Field with a string instead of a boolean, do the indexing of the object imply a verification when it is created? Does it block the creation?

No, there will be no restriction during the creation and the document will be created in the primary database, but it will not be indexed to the analytical database, hence it will become unsearchable.

### What does required fields imply? Some users may not have subscriptions or contexts (empty table)?. 

Required fields are the list of fields on which you can query. This doesn’t enforce data validation when the custom object is created.

## Multiple custom objects on user profile

We have a feature to create multiple custom objects on a single user profile, which can be useful to store different data objects. Using multiple custom objects on a single user profile can be helpful for determining the different data points related to the end user, which in turn can be beneficial for generating different statistics, reports, etc.
Multiple custom object record in the single user profile:
This feature has the capability to create multiple records of custom objects under a single custom object for one specific user profile.

You can also refer to this image for a better understanding:
![enter image description here](https://apidocs.lrcontent.com/images/Customer_Management_LoginRadius_User_Dashboard_34205eb3e18f734785.52124802.png "Custom Object")
 
 ## What are the most common use cases for Custom Objects?

- Store the users search history and activity on your website. It could be a product, an article, travel booking, etc.
- Store purchased product list. If the user has purchased multiple products, you can keep a list of all the purchased products with details such as product ID, description, purchase date, etc.
- Shopping list: If the user has added products to their shopping cart, you can store the whole cart as a Custom Object and retrieve this information during checkout or when the user comes back to the site.
- CRM events/activity list: If the user has bought products/services, you can store the whole event/activity as a Custom Object and retrieve this information when the user comes back to the website/mobile app or sync this during integration.
- Wishlist: If the user has added products to their wish list, you can store the whole list as a Custom Object and retrieve this information during checkout or when the user comes back to the site.


## Different ways of interacting and leveraging custom objects:

We have some dedicated APIs to interact with custom objects for which the list of the APIs to make queries to custom objects are given below:

- [Create Custom Object by UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/create-custom-object-by-uid)
This API is used to post object inside the custom objects using the user’s UID.

- [Create Custom Object by Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/create-custom-object-by-token)
This API is used to post object inside the custom objects using the user’s token
.
- [Custom Object by ObjectRecordId and UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-objectrecordid-and-uid)
This API is used to fetch custom object using objectRecordID and UID.

- [Custom Object by ObjectRecordId and Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-objectrecordid-and-token)
This API is used to fetch custom object using objectRecordID and token.

- [Custom Object by Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-token)
This API is used to retrieve the specified Custom Object data for the specified account using the      access token.

- [Custom Object By UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-uid)
This API is used to retrieve all the custom objects by UID from .

- [Custom Object Update by ObjectRecordId and UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-uid)
This API is used to update the specified custom object data of a specified account. If the value of updatetype is 'replace' then it will fully replace the custom object with new custom object and if the value of updatetype is partialreplace then it will perform an upsert type operation.

- [Custom Object Update by ObjectRecordId and Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-token)
This API is used to update the specified custom object data of the specified account. If the value of updatetype is 'replace' then it will fully replace custom object with the new custom object and if the value of updatetype is 'partialreplace' then it will perform an upsert type operation.

- [Custom Object Delete by ObjectRecordId and Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-delete-by-objectrecordid-and-token)
This API is used to remove the specified Custom Object data using ObjectRecordId of a specified account.


- [Custom Object Delete by ObjectRecordId and UID](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-delete-by-objectrecordid-and-uid)
This API is used to remove the specified Custom Object data using ObjectRecordId of the specified account.


## Indexing and Querying on Custom Object

A query can be applied to the custom object for analysis or segmentation to obtain details on how Custom Objects data is stored in your LoginRadius Cloud Directory.

LoginRadius provides [Cloud Directory Custom Object APIs](https://www.loginradius.com/legacy/docs/api/v2/cloud-directory-api/custom-object/overview#queryingbasicfields5) that can be leveraged for querying on custom object data.

In order to use [Cloud Directory Custom Object APIs](https://www.loginradius.com/legacy/docs/api/v2/cloud-directory-api/custom-object/overview#queryingbasicfields5), it is required to set up the schema and define the indexing on the schema. Indexing is a data structure process for improving the performance of data retrieval queries.

For more details, refer to the Cloud Directory Custom Object API [document](https://www.loginradius.com/legacy/docs/api/v2/cloud-directory-api/custom-object/overview).

>**NOTE:** In case if you want to do any changes, updates  or need to add operation on a custom object and it’s schema, then you can reach out to our support team at [support@loginradius.com](mailto:support@loginradius.com) for assistance.



