# Cloud Directory: Custom Object API Getting Started

---

If you are looking to analyze or get details on how Custom Objects data is stored in your LoginRadius Cloud Directory, you will need to call the Custom Object API.

**NOTE**: In order to use this API, Please set schema for the Custom Object in [Admin Console](https://adminconsole.loginradius.com/data-governance/data-storage/data-fields) and then contact LoginRadius Support for data to be indexed.

##### Base URL

The following is the Base URL for all API requests:

```
https://cloud-api.loginradius.com/customobject
```

### Schema Definition

Schema has to indicate the type of each field and subfields of the nested object if any and the required fields that are should be queryable.

Supported types: `string`, `integer`, `double`, `float`, `short`, `long`, `text`, `boolean`, `object`, `nested` (array of objects). For array of `string`'s, `integer`'s, `text`'s, `boolean`'s, type would be the basic type itself.

Example: To be able to query `Key1: [1, 2, 3]`, Set the type as `integer`

Nested Type should have type information of all the subfields.

Sample Custom Object Schema:

```
{
  "title": "CustomObject Title",
  "type": "object",
  "properties": {
    "key1": {
      "type": "string"
    },
    "key2": {
      "type": "string"
    },
    "key3": {
      "type": "integer"
    },
    "key4": {
      "type": "nested",
      "properties": {
        "Value": {
          "type": "string"
        },
        "Type": {
          "type": "string"
        }
      }
    },
    "key5": {
      "properties": {
        "Code": {
          "type": "string"
        },
        "Name": {
          "type": "string"
        }
      }
    },
    "key6": {
      "type": "text"
    }
  },
  "required": [
    "key1",
    "key2",
    "key3"
    "key4.Value"
    "key4.Type",
    "key5.Code",
    "key5.Name"
    "key6"
  ]
}
```

> If the Custom Object contains fields other than that are specified in schema, they are not queryable.

### Formatting your Custom Object Queries

The LoginRadius query notation supports multiple terms with AND/OR clauses or multiple clauses that can be grouped together. It is to be noted that, group operator is not required for single rule.

Each key has an associated type and the rule object relies on this type for constructing the database query.

- A query object should have at least one group or it can be `{}`, which gives all the data based on From, To values.
- Each group can have one or more rules and sub groups.
- Each rule should have the Field name, operator & value based on field type

#### Supported Types and corresponding Operators:

- Integer/Date:
  - \>
  - \>=
  - <
  - <=
  - BETWEEN
  - =
  - !=
- String/Array of Strings
  - =
  - !=
- Boolean
  - =
  - !=
- Text
  - Contains
  - Not_Contains
- Array of Objects
  - Depends on the sub field. Check `Querying Array of objects` section.
- Objects
  - Depends on the sub field. Check `Querying Objects` section.

#### Supported Keys and their types

Format of Custom Object:

```
 {
      "IsActive": true,
      "DateCreated": "2018-01-31T09:02:40.290Z",
      "DateModified": "2018-01-31T09:02:40.290Z",
      "IsDeleted": false,
      "Uid": 123456,
      "CustomObject": <Actual Custom Object>
}
```

`IsActive: boolean` , `DateModified: date`, `DateCreated: date`, `IsDeleted: boolean`, `Uid: string` are internal fields

CustomObject keys and their types are retrevied from Schema Definition.

#### Rules & Groups

- Query object should have at least one group.
- Each group can have one or more rules and sub groups.
- Each group will have an operator `AND` or `OR` and an array of rules or sub-groups. But, this operator is not required for a single rule.
- Each rule should have the Field name, operator & value based on field type

Example query:

```
"group": {
    "operator": "AND",
    "rules": [<rule>, <rule>, <sub-group>]
}
```

#### Querying Basic fields

```
"rule": {
  "name": "Uid",
  "operator": "=",
  "value": 123
}
```

```
"rule": {
  "name": "IsActive",
  "operator": "=",
  "value": true
}
```

```
"rule": {
  "name": "DateModified",
  "operator": ">",
  "value": "2012-01-01"
}
```

```
"rule": {
  "name": "CustomObject.key1",
  "operator": "=",
  "value": "value1"
}
```

```
"rule": {
  "name": "CustomObject.key3",
  "operator": "BETWEEN",
  "value": [0, 100]
}
```

```
"rule": {
  "name": "CustomObject.key6",
  "operator": "Contains",
  "value": "@"
}
```

```
"rule": {
  "name": "CustomObject.key6",
  "operator": "Not_Contains",
  "value": "@"
}
```

> Note for Array of Strings/Integers
>
> - Querying an array of strings field will return the doc if the array contains the specified value:
> - Ex: If the doc has key2: ['Admin', 'Developer', 'QA'],
> - `key2 = Admin` will return the doc.
> - `key2 = Developer` will also return the doc.
> - `key2 = Business` will not return the doc

> Note for Range Fields
>
> - For BETWEEN operator, the value should be array. First value will be used as FROM and second value will be used as TO. The values are inclusive.
>   Example `"value": [20, 50]` translates to `20 <= {data} <=50`. Range is inclusive.

#### Querying Objects

You can use dot notation to query these fields.

Example of an object field that you might want to access:

```
CustomObject: {
  key1: ...,
  key2: ...,
  key3: ...,
  key4: ...,
  key5: {
    Code: "Dr",
    Name: "Doctor"
  },
}
```

Rule:

```
"rule": {
  "name": "CustomObject.key4.Code",
  "operator": "=",
  "value": "Dr"
}
```

#### Querying Array of Objects

Example of an array of objects field you might want to acces:

```
CustomObject: {
  key1: ...,
  key2: ...,
  key3: ...,
  key4: [
    {
      Type: "Primary",
      Value: "youtube"
    },
    {
      Type: "Secondary",
      Value: "vimeo"
    }
  ],
  key5: ...
}
```

You can use dot notation to query these fields. Querying an array of objects will search for atleast one object in the array that matches the rule.
Note: Please check the type of the sub-field before querying.

```
{
  name: "CustomObject.key4.Value",
  operator: "=",
  Value: "vimeo"
}
```

```
{
  name: "CustomObject.key4.Type",
  operator: "=",
  Value: "Primary"
}
```

The above two rules will match the example doc mentioned.

#### Combining Rules into a Group

Each group can have one or more rules and sub groups.
Each group will have an operator `AND` or `OR` and an array of rules or sub-groups.

```
"group": {
    "operator": "AND",
    "rules": [<rule>, <rule>, <sub-group>]
}
```

Example:

```
"group": {
    "operator": "AND",
    "rules": [
      {
        "name": "IsActive",
        "operator": "=",
        "value": true
      },
      {
        "name": "DateCreated",
        "operator": ">",
        "value": "2017-01-01"
      }
      {
        "group": {
          "operator": "OR",
          "rules": [
            {
              "name": "CustomObject.key1",
              "operator": "=",
              "value": "value1"
            },
            {
              "name": "CustomObject.key2",
              "operator": "=",
              "value": "value2"
            }
          ]
        }
      }
    ]
}
```

#### Example Query:

Get all Custom Object's created b/w `2017-01-01` & `2017-12-31`. Although you can apply `DateCreated` rule, from & to are mandatory for the API.

`(` `(`_IsActive_ as true`)` **AND** `(`_DateCreated_ > 2017-01-01`)` *AND\*\* `(`*CustomObject.key1* = value1 **OR** *CustomObject.key2\* = value2`)` `)`

```
 {
  "from": "2017-01-01",
  "to": "2017-12-31",
  "q": {
    "group": {
      "operator": "AND",
      "rules": [
        {
          "name": "IsActive",
          "operator": "=",
          "value": true
        },
        {
          "name": "DateCreated",
          "operator": ">",
          "value": "2017-01-01"
        },
        {
          "group": {
            "operator": "OR",
            "rules": [
              {
                "name": "CustomObject.key1",
                "operator": "=",
                "value": "value1"
              },
              {
                "name": "CustomObject.key2",
                "operator": "=",
                "value": "value2"
              }
            ]
          }
        }
      ]
  }
}
```
