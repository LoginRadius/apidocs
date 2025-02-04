Cloud Directory Getting Started
====
------

If you are looking to analyze or get details on how a registered users' data is stored in your LoginRadius Cloud Directory, you will need to call the User Identity or Aggregation API.

**NOTE:** This API does not support querying Custom Objects, please refer to our [Custom Object API](https://www.loginradius.com/legacy/docs/api/v2/cloud-directory-api/custom-object/overview/) to query custom objects


## Cloud Directory Overview
The LoginRadius Cloud Directory system is comprised of two APIs: the **User Identity API** and **Aggregation API**. These allow you to quickly view individual user datasets, or get a broad overview of your user base through aggregated user details.

This system also provides you with the ability to recognize your users across your entire ecosystem, while simultaneously providing your users hassle-free navigation across all of your properties via LoginRadius Single Sign On.


##### Base URL
The following is the Base URL for all API requests:

```
https://cloud-api.loginradius.com/identity
```

## Formatting your Identity Queries

The LoginRadius query notation supports multiple terms with AND/OR clauses or multiple clauses that can be grouped together. It is to be noted that, group operator is not required for single rule.

Each key has an associated type and the rule object relies on this type for constructing the database query.

### Rules & Groups

- Query object should have at least one group or it can be `{}`, which gives all the data based on From, To values.
- Each group can have one or more rules and sub groups.
- Each group will have an operator `AND` or `OR` and an array of rules or sub-groups. But, this operator is not required for a single rule.
- Each rule should have the Field name, operator & value based on field type

Example query:

```
"group": {
    "operator": "AND",
    "rules": [<rule>, <rule>, <group>]
}
```

Example rule:

```
{
    "name": <Field Name>,
    "operator": <Supported operator by field type>,
    "value": <valid value based on field type>
}
```

### Supported Types and corresponding Operators/Values:

* Integer/Date:
    - Operators
      - \>
      - \>=
      - <
      - <=
      - BETWEEN
      - =
      - !=
    - Value
      - Should be an integer as per the integer type. Ex: 1, 10, -1, 0
      - Should be a valid date for date type. Ex: 2017-01-01

* String/Array of Strings
    - Operator
      -   =
      -   !=
    -  Value
      - Should be a valid string. String search is case sensitive.
* Bool
    - Operator
      -   =
      -   !=
    -  Value
      -  `true` or `false`
* Text
    - Operator
      -   Contains
      -   Not_Contains
    - Value
      - text
* Objects
    - Depends on the sub field. Check `Querying Objects` section.
* Array of Objects
    - Depends on the sub field. Check `Querying Array of objects` section.

* Common Operators for all field types
    - EXISTS
    - NOT_EXISTS

### Supported Keys and their types

|   Fields                           |             Type     |   Sub Field           | Sub Field Type                       |
|------------------------------------|----------------------|-----------------------|--------------------------------------|
| UID                                | String              |                       |                                      |
| ID                                 | String              |                       |                                      |
| Provider                           | String              |                       |                                      |
| Prefix                             | String              |                       |                                      |
| FirstName                          | Text & String       |                       |                                      |
| MiddleName                         | Text & String       |                       |                                      |
| LastName                           | Text & String       |                       |                                      |
| Suffix                             | String              |                       |                                      |
| FullName                           | Text & String       |                       |                                      |
| NickName                           | Text & String       |                       |                                      |
| ProfileName                        | Text & String       |                       |                                      |
| BirthDate                          | date                 |                       |                                      |
| Gender                             | String              |                       |                                      |
| Website                            | Text                 |                       |                                      |
| Email                              | Array of Objects               | Type                  | String                              |
|                                    |                      | Value                 | Text & String  |
| Country                            | Object               | Code                  | String                              |
|                                    |                      | Name                  | String                              |
| HomeTown                           | Text & String  |                       |                                      |
| State                              | Text & String  |                       |                                      |
| City                               | Text & String  |                       |                                      |
| Industry                           | Text & String  |                       |                                      |
| About                              | Text                 |                       |                                      |
| TimeZone                           | String              |                       |                                      |
| LocalLanguage                      | String              |                       |                                      |
| TagLine                            | Text                 |                       |                                      |
| Language                           | String              |                       |                                      |
| Verified                           | String              |                       |                                      |
| UpdatedTime                        | String              |                       |                                      |
| Positions                          | Array of Objects               | Position              | Text & String                  |
|                                    |                      | Summary               | Text                                 |
|                                    |                      | StartDate             | String                              |
|                                    |                      | EndDate               | String                              |
|                                    |                      | IsCurrent             | String                              |
|                                    |                      | Company               | Array of Objects                               |
|                                    |                      |                       |                                      |
|                                    |                      |                       |                                      |
|                                    |                      | Location              | String                              |
| Educations                         | Array of Objects               | School                | Text                                 |
|                                    |                      | year                  | String                              |
|                                    |                      | type                  | Text & String                  |
|                                    |                      | notes                 | Text                                 |
|                                    |                      | activities            | Text & String                  |
|                                    |                      | degree                | Text & String                  |
|                                    |                      | fieldofstudy          | Text & String                  |
|                                    |                      | StartDate             | String                              |
|                                    |                      | EndDate               | String                              |
| PhoneNumbers                       | Array of Objects               | PhoneType             | String                              |
|                                    |                      | PhoneNumber           | String                              |
| IMAccounts                         | Array of Objects               | AccountType           | String                              |
|                                    |                      | AccountName           | String                              |
| Addresses                          | Array of Objects               | Type                  | String                              |
|                                    |                      | Address1              | Text                                 |
|                                    |                      | Address2              | Text                                 |
|                                    |                      | City                  | Text & String                  |
|                                    |                      | State                 | Text & String                  |
|                                    |                      | PostalCode            | String                              |
|                                    |                      | Region                | Text & String                  |
|                                    |                      | Country               | String                              |
| MainAddress                        | Text                 |                       |                                      |
| Created                            | String              |                       |                                      |
| CreatedDate                        | date                 |                       |                                      |
| ModifiedDate                       | date                 |                       |                                      |
| LocalCity                          | String              |                       |                                      |
| LocalCountry                       | String              |                       |                                      |
| ProfileCountry                     | String              |                       |                                      |
| FirstLogin                         | Bool              |                       |                                      |
| IsProtected                        | Bool              |                       |                                      |
| RelationshipStatus                 | String              |                       |                                      |
| Quota                              | Text                 |                       |                                      |
| InterestedIn                       | Array of Strings    |                       |                                      |
| Interests                          | Array of Objects               | InterestedType        | String                              |
|                                    |                      | InterestedName        | String                              |
| Religion                           | Text                 |                       |                                      |
| Political                          | Text                 |                       |                                      |
| Sports                             | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
| InspirationalPeople                | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
| FollowersCount                     | Integer              |                       |                                      |
| FriendsCount                       | Integer              |                       |                                      |
| IsGeoEnabled                       | String              |                       |                                      |
| TotalStatusesCount                 | Integer              |                       |                                      |
| Associations                       | Text                 |                       |                                      |
| NumRecommenders                    | Integer              |                       |                                      |
| Honors                             | Text                 |                       |                                      |
| Awards                             | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Issuer                | String                              |
| Skills                             | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
| CurrentStatus                      | Array of Objects               | Id                    | String                              |
|                                    |                      | Text                  | Text                                 |
|                                    |                      | Source                | String                              |
|                                    |                      | CreatedDate           | String                              |
| Certifications                     | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Authority             | String                              |
|                                    |                      | Number                | String                              |
|                                    |                      | StartDate             | String                              |
|                                    |                      | EndDate               | String                              |
| Courses                            | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Number                | String                              |
| Volunteer                          | Array of Objects               | Id                    | String                              |
|                                    |                      | Role                  | String                              |
|                                    |                      | Organization          | String                              |
|                                    |                      | Cause                 | String                              |
| RecommendationsReceived            | Array of Objects               | Id                    | String                              |
|                                    |                      | RecommendationType    | String                              |
|                                    |                      | RecommendationText    | Text                                 |
|                                    |                      | Recommender           | String                              |
| Languages                          | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Proficiency           | String                              |
| Projects                           | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Summary               | String                              |
|                                    |                      | With                  | Array of Objects                               |
|                                    |                      |                       |                                      |
|                                    |                      | StartDate             | String                              |
|                                    |                      | EndDate               | String                              |
|                                    |                      | IsCurrent             | String                              |
| Games                              | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Category              | String                              |
|                                    |                      | CreatedDate           | String                              |
| Family                             | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Relationship          | String                              |
| TeleVisionShow                     | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Category              | String                              |
|                                    |                      | CreatedDate           | String                              |
| MutualFriends                      | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | FirstName             | String                              |
|                                    |                      | LastName              | String                              |
|                                    |                      | Birthday              | String                              |
|                                    |                      | Hometown              | String                              |
|                                    |                      | Link                  | String                              |
|                                    |                      | Gender                | String                              |
| Movies                             | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Category              | String                              |
|                                    |                      | CreatedDate           | String                              |
| Books                              | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Category              | String                              |
|                                    |                      | CreatedDate           | String                              |
| AgeRange                           | Object               | Min                   | Integer                              |
|                                    |                      | Max                   | Integer                              |
| Hireable                           | Bool              |                       |                                      |
| Age                                | Integer              |                       |                                      |
| Patents                            | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Type                  | String                              |
| FavoriteThings                     | Array of Objects               | Id                    | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | Type                  | String                              |
| ProfessionalHeadline               | Text                 |                       |                                      |
| RelatedProfileViews                | Array of Objects               | Id                    | String                              |
|                                    |                      | FirstName             | String                              |
|                                    |                      | LastName              | String                              |
| KloutScore                         | Object               | KloutId               | String                              |
|                                    |                      | Score                 | double                               |
| LRUserID                           | String              |                       |                                      |
| PlacesLived                        | Array of Objects               | Name                  | String                              |
|                                    |                      | IsPrimary             | Bool                              |
| Publications                       | Array of Objects               | Id                    |                                      |
|                                    |                      | Title                 |                                      |
|                                    |                      | Publisher             |                                      |
|                                    |                      | Authors               |                                      |
|                                    |                      | Date                  |                                      |
|                                    |                      | Url                   |                                      |
|                                    |                      | Summary               |                                      |
| Suggestions                        | Object               | CompaniestoFollow     | Object                               |
|                                    |                      |                       |                                      |
|                                    |                      | IndustriestoFollow    | Object                               |
|                                    |                      |                       |                                      |
|                                    |                      | NewssourcetoFollow    | Object                               |
|                                    |                      |                       |                                      |
|                                    |                      | PeopletoFollow        | Object                               |
|                                    |                      |                       |                                      |
| Badges                             | Array of Objects               | BadgeId               | String                              |
|                                    |                      | Name                  | String                              |
|                                    |                      | BadgeMessage          | String                              |
|                                    |                      | Description           | String                              |
| TotalPrivateRepository             | Integer              |                       |                                      |
| Currency                           | String              |                       |                                      |
| PublicGists                        | Integer              |                       |                                      |
| PrivateGists                       | Integer              |                       |                                      |
| Subscription                       | Object               | Name                  | String                              |
|                                    |                      | Space                 | String                              |
|                                    |                      | PrivateRepos          | String                              |
|                                    |                      | Collaborators         | String                              |
| Company                            | Text & String  |                       |                                      |
| WebProfiles                        | Object               |                       |                                      |
| PinsCount                          | Integer              |                       |                                      |
| BoardsCount                        | Integer              |                       |                                      |
| LikesCount                         | Integer              |                       |                                      |
| SignupDate                         | date                 |                       |                                      |
| LastLoginDate                      | date                 |                       |                                      |
| CustomFields                       | Object               |                       |                                      |
| LastPasswordChangeDate             | date                 |                       |                                      |
| PasswordExpirationDate             | date                 |                       |                                      |
| LastPasswordChangeToken            | String              |                       |                                      |
| EmailVerified                      | Bool              |                       |                                      |
| IsActive                           | Bool              |                       |                                      |
| IsDeleted                          | Bool              |                       |                                      |
| IsEmailSubscribed                  | Bool              |                       |                                      |
| UserName                           | String              |                       |                                      |
| NoOfLogins                         | Integer              |                       |                                      |
| PreviousUids                       | Array of Strings    |                       |                                      |
| PhoneId                            | String              |                       |                                      |
| PhoneIdVerified                    | Bool              |                       |                                      |
| Roles                              | Array of Strings    |                       |                                      |
| ExternalUserLoginId                | String              |                       |                                      |
| FailedLoginAttempt                 | Integer              |                       |                                      |
| SecurityQuestionFailedLoginAttempt | Integer              |                       |                                      |
| DisableLogin                       | Bool              |                       |                                      |
| RegistrationProvider               | String              |                       |                                      |
| IsLoginLocked                      | Bool              |                       |                                      |
| LastLoginLocation                  | Text $ String              |                       |                                      |
| RegistrationSource                 | String              |                       |                                      |
| IsCustomUid                        | Bool              |                       |                                      |
| UnverifiedEmail                    | Array of Objects               | Type                  | String                              |
|                                    |                      | Value                 | Text                  |
| RoleContext                        | Array of Objects               | Context               | String                              |
|                                    |                      | Roles                 | String                              |
|                                    |                      | AdditionalPermissions | String                              |
| SignupLog                          | Object               | UserAgent             | Text                            |
|                                    |                      | IP                    | String                                   |
|                                    |                      | Host                  | Text & String                  |
| ExternalIds                              | Array of Objects               | Source                  | String
|                                    |                      | SourceId                 | String  |

### Querying Basic fields

```
{
  "name": "Age",
  "operator": ">",
  "value": 20
}
```
```
{
  "name": "Age",
  "operator": "BETWEEN",
  "value": [20, 50]
}
```
```
{
  "name": "Age",
  "operator": "=",
  "value": 20
}
```
```
{
  "name": "EmailVerified",
  "operator": "=",
  "value": true
}
```
```
{
  "name": "Gender",
  "operator": "=",
  "value": "Male"
}
```
```
{
  "name": "Roles",
  "operator": "=",
  "value": "Admin"
}
```
```
{
  "name": "FullName",
  "operator": "Contains",
  "value": "test"
}
```
```
{
  "name": "Website",
  "operator": "Not_Contains",
  "value": ".com"
}
```

> Note for Array of Strings/Integers
> - Querying an array of strings field will return the doc if the array contains the specified value:
> - Ex: If the doc has Roles: ['Admin', 'Developer', 'QA'],
> - `Roles = Admin` will return the doc.
> - `Roles = Developer` will also return the doc.
> - `Roles = Business` will not return the doc


> Note for Range Fields
> - For BETWEEN operator, the value should be array. First value will be used as FROM and second value will be used as TO. The values are inclusive.
> Example `"value": [20, 50]` translates to `20 <= {data} <=50 `. Range is inclusive.


### Querying null values


```
{
  "name": "Gender",
  "operator": "EXISTS"
}
```

The above rule will return docs containing a non-null value in the Gender field.

Example's of non-null values:

```
{ "Gender": "," }
{ "Gender": "Male" }
{ "Gender": "" } // Empty string is a non-null value
{ "Gender": ["Male"] }
{ "Gender": ["Male", null ] }
```

```
{
  "name": "Gender",
  "operator": "NOT_EXISTS"
}
```

The above rule will return docs containing a null value in the Gender field.

Example's of null values:

```
{ "Gender": null }
{ "Gender": [] }
{ "Gender": [null] }
{ "Gender1":  "bar" } // since Gender field doesn't exists
```

### Querying Text

Suppose we have 5 docs with FirstName value's as shown below:

```
FirstName
1. i am identity api
2. i AM insights API
3. i am@insights api's
4. i-am-customobject-api
5. i-customobject-am-api
```

Text values are analyzed into terms.

```
1. i am identity api            // i, am, identity, api
2. i AM insights API            // i, am, insights, api
3. i am@insights api's          // i, am, insights, api's
4. i-am-customobject-api        // i, am, customobject, api
5. i-customobject-am-api        // i, am, customobject, api
```

Search value is also analyzed into terms similary.
Suppose you are searching for `am@insights`. It will be broken into two terms `am`, `insights`.

Following rules will match `1`, `2`, `3`,`4`, `5`

```
{
  "name": "FirstName",
  "operator": "Contains",
  "value": "am"
}
```

```
{
  "name": "FirstName",
  "operator": "Contains",
  "value": "AM"
}
```

Following rules will match `1`, `2`, `4`, `5`

```
{
  "name": "FirstName",
  "operator": "Contains",
  "value": "api"
}
```

```
{
  "name": "FirstName",
  "operator": "Contains",
  "value": "API"
}
```


Following rules will match `3`.

```
{
  "name": "FirstName",
  "operator": "Contains",
  "value": "API's"
}
```

Following rule will also match `1`, `2`, `3`, `4`, `5`

```
{
  "name": "FirstName",
  "operator": "Contains",
  "value": "am-customobject"
}
```

The values passed with Contains rule are analyzed into terms and each terms will be matched to the field. In the above example
`am-customobject` will be broken into `am`, `customobject`. Since `am` is present in all `1`, `2`, `3`, `4`, `5`. All 5 documents will be returned.

If you want to get only `3` & `4` doc. You can combine multiple rules like below

```
"group": {
    "operator": "AND",
    "rules": [
      {
        "name": "FirstName",
        "operator": "=",
        "value": "am"
      },
      {
        "name": "FirstName",
        "operator": "=",
        "value": "customobject"
      }
    ]
}
```

More Example's on tokenization:

* `i am identity api`
  - `i`, `am`, `identity`, `api`
* `i_am identity api`
  - `i_am`, `identity`, `api`
* `i_am-identity-api`
  - `i_am`, `identity`, `api`
* `i_am-identity@api`
  - `i_am`, `identity`, `api`
* `i_am-identity#api`
  - `i_am`, `identity`, `api`
* `i_am-identity@api's`
  - `i_am`, `identity`, `api's`
* `i am 100 identity@api$s.`
  - `i`, `am`, `100`, `identity`,`api`, `s`
* `am i identity api?`
  - `i`, `am`, `identity`, `api`
* `https://cloud-api.loginradius.com/identity?apikey=123&apisecret=456`
  - `https`, `cloud`, `api.loginradius.com`, `identity`, `apikey`, `apisecret`, `123`, `456`

> - The values passed in the rule are also analzed the same way and search engine tries to find atleast 1 matching term in the each doc's analyzed terms.


### Querying Dates

Date fields can be queried by passing a valid ISO8601 date value

Special Case: BirthDate supports MM-DD-YYYY format as well

Examples:
```
{
			"name" : "CreatedDate",
			"operator" : ">",
			"value" : "2001-03-05T18:30:00Z"
}
```
```
{
			"name" : "CreatedDate",
			"operator" : "=",
			"value" : "2001-03-05"
}
```
```
{
			"name" : "CreatedDate",
			"operator" : "!=",
			"value" : "2001-03-05"
}
```
```
{
			"name" : "BirthDate",
			"operator" : "=",
			"value" : "03-19-2019"
}
```
```
{
			"name" : "BirthDate",
			"operator" : "=",
			"value" : "2019-03-19"
}
```


### Querying Objects

Example of an object field that you might want to access:
```
SignupLog : {
  UserAgent: "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0 Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Gecko/20100101 Firefox/42.0.
"
  Host: "example.com"
  IP: "123.13.123.123"
}
```

You can use dot notation to query these fields.

Note: Please check the type of the sub-field before querying

Ex Rule:

```
{
  name: "SignupLog.Host",
  operator: "=",
  Value: "example.com”
}
```

### Querying Array of Objects

Example of an array of objects field you might want to acces:
```
Email:[
{
  Type: "Primary",
  Value: "test@gmail.com"
},
{
  Type: "Secondary",
  Value: "test123@gmail.com"
}
]

```

You can use dot notation to query these fields. Querying an array of objects will search for atleast one object in the array that matches the rule.
Note: Please check the type of the sub-field before querying.

```
{
  name: "Email.Value",
  operator: "=",
  Value: "test123@gmail.com"
}
```

Example:

Querying Positions field. Since Position sub-field is a Text & String field. It supports both `=` and `Contains`

```
{
  name: "Positions.Position",
  operator: "=",
  Value: "Developer"
}
```

```
{
  name: "Positions.Position",
  operator: "Contains",
  Value: "Developer"
}
```

### Combining Rules into a Group

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
        "name": "EmailVerified",
        "operator": "=",
        "value": true
      },
      {
        "group": {
          "operator": "OR",
          "rules": [
            {
              "name": "Provider",
              "operator": "=",
              "value": "Google"
            },
            {
              "name": "Provider",
              "operator": "=",
              "value": "Facebook"
            }
          ]
        }
      }
    ]
}
```

### Example Query:

Get all users created b/w `2016-01-01` & `2016-12-31`. Although you can apply `CreatedDate` rule, from & to are mandatory for the API.

`(` `(`*EmailVerified* as true`)` **AND** `(`*Provider* = Facebook **OR** *Provider* = Google`)` `)`

```
 {
	"from": "2016-01-01",
	"to": "2016-12-31",
	"q": {
		"group": {
		    "operator": "AND",
		    "rules": [
		      {
		        "name": "EmailVerified",
		        "operator": "=",
		        "value": true
		      },
		      {
		        "group": {
		          "operator": "OR",
		          "rules": [
		            {
		              "name": "Provider",
		              "operator": "=",
		              "value": "Google"
		            },
		            {
		              "name": "Provider",
		              "operator": "=",
		              "value": "Facebook"
		            }
		          ]
		        }
		      }
		    ]
		}
	}
}
```
## Example :

**Use-Case 1:** 
When you want to get only the email profiles that do not contain the registration source. In that case you can use the below query:

~~~

{
  "group": {
    "operator": "AND",
    "rules": [
      {
        "name": "RegistrationSource",
        "operator": "NOT_EXISTS",
        "value": null
      },
      {
        "name": "Provider",
        "operator": "=",
        "value": "Email"
      }
    ]
  }
}

~~~

When you run the above query, it will only return the email profiles that do not contain the registration source. 


**Use-case 2:** When you want get the latest updated profiles. In that case you can use the below query:

~~~

{
  "group": {
    "operator": "AND",
    "rules": [
      {
        "name": "Provider",
        "operator": "=",
        "value": "Email"
      },
      {
        "name": "ModifiedDate",
        "operator": ">",
        "value": "2021-08-09T18:47:26Z"
      }
    ]
  }
}

~~~

When you run the above query, it will return the profiles on the basis of the filter applied on modified date.

