# Extended Features

This area covers all of the additional functionalities of the LoginRadius V2 API that goes beyond the basics.

## Null Support

The LoginRadius API supports storing NULL values specified as "NULL" in its editable fields however this option is not enabled by default.
Please read the following if you wish to take advantage of NULL support:

- `nullsupport` takes a Boolean value and needs to be passed as a query parameter when doing a POST or UPDATE.

Example:

```
&nullsupport=true
```

Note: By default nullSupport value will be considered false.

- Provided you've specified `nullsupport` to `true` in your query parameters, If you pass`{"FirstName":null}` in the json body then the FirstName value will be set to null.

**Supported fields:** UserName, Prefix, FirstName, MiddleName, LastName, Suffix, NickName, ProfileName, BirthDate, Gender, Website, ThumbnailImageUrl, ImageUrl, Favicon, ProfileUrl, HomeTown, State, City, Industry, About, TimeZone, LocalLanguage, CoverPhoto, TagLine , Language, MainAddress, LocalCity, ProfileCity, LocalCountry, RelationshipStatus, Religion, Political, HttpsImageUrl, IsGeoEnabled, Associations, Honors, PublicRepository, RepositoryUrl, ProfessionalHeadline, Currency, StarredUrl, GistsUrl, Company, GravatarImageUrl, Languages , PlacesLived , Addresses , PhoneNumbers and Custom Fields.

**NOTE:** <br>

- UserName can be set to null only by using the LoginRadius Management API.
- You can get more information about editable fields [here](/api/v2/data-points-and-response-code/list-of-editable-data-fields)

## How to Remove a JSON Object

You can remove an object from array type's field from User profile by passing `{"op":"delete"}` in JSON.

**Supported Fields:** Languages, PlacesLived, Addresses, PhoneNumbers

**Example:** <br>

```
{
    "Languages":[
    {
        "Id":"",
        "Proficiency":"Expert",
        "Name":"Hindi",
        "op":"delete"
    },
    {
        "Id":"",
        "Proficiency":"Intermediate",
        "Name":"English"
    }]
}
```

## Server Side Validation

All client and server side validation are based on your validation schema located at your LoginRadius Admin Console under **Platform Configuration > Standard Login**

Here is an example of a server validation failed response:

**Example:**<br>

```
{
  "Description": "Validation failed for one or more field's. please check errors field for more information.",
  "ErrorCode": 1134,
  "Message": "Validation failed for one or more field's.",
  "IsProviderError": false,
  "ProviderErrorResponse": null,
  "Errors": [
    {
      "FieldName": "city",
      "ErrorMessage": "The City field is required."
    },
    {
      "FieldName": "password",
      "ErrorMessage": "The Password field must be at least 6 characters in length."
    }
  ]
}

```

**NOTE:** You need to contact LoginRadius to enable this feature on your APP.

## Password Compliance Check

If you have validation rules for passwords and you're looking to enforce the existing users to have passwords that comply with these rules. We can add an additional field on the user profile called `IsSecurePassword` as a flag to indicate if the account is complying with the set of rules.

This is particularly useful if you have a new set of rules in regards to password strength and would like to enforce these rules on existing users.

During the Traditional Login (Email + Password) **IsSecurePassword** profile field will return true if an account has the current validation rule and false if validation is outdated.

If the **IsSecurePassword** field is false, you can enforce and prompt the user to reset their password.

**NOTE:** You need to contact LoginRadius to enable this feature on your APP.

## Reset Password Lockout

In addition to being trigged on failed login attempts Account Lockouts can also be triggered by failed Password Resets.

- If a user is trying to reset their password via security answers then after 'X' number of failed reset password attempts the user will be blocked.

- This setting is enabled by default with our API V2 reset password by security question API.
  By default, Maximum Reset Password Attempts is 3

- You can set Maximum Reset Password Attempts in your LoginRadius Admin Console.

## Custom Object updateType

This parameter is used to update custom object, Using this parameter you can update custom object with fully or partial update.

<br>
**Possible Values:** replace and partialreplace.

**Example:**
<br>

- If updateType is partialreplace and saved object is:

```
"CustomObject": {
    "first": "first",
    "two": "two",
    "three": [
      "a",
      "b",
      "c"
    ]
  }

```

- And the new object is:
  <br>

```
"CustomObject":
{
    "two":"updatevalue",
    "four":"addvalue"
}
```

- Now the new object after update will be

```
"CustomObject": {
    "first": "first",
    "two": "updatevalue",
    "three": [
      "a",
      "b",
      "c"
    ],
    "four": "addvalue"
  }
```

If updateType is replace then it will replace the complete saved object with the new one.

## Projection of fields

The `fields` parameter filters the API response so that the response only includes a specific set of fields. The `fields` parameter allows you to remove nested properties from an API response and thereby reduce your bandwidth usage.
This allows you to select fields which you require as an API response. The `fields` parameter is applicable to all LoginRadius APIs.

The following rules explain the supported syntax for the `fields` parameter value:

- Use a comma-separated list (`fields=a,b`) to select multiple fields.
- Use an asterisk (`fields=*`) as a wildcard to identify all fields.
- Use parentheses (`fields=a(b,c)`) to specify a group of nested properties that will be included in the API response.
- Use a forward slash (`fields=a/b`) to identify a nested property.

These rules usually allow several different fields parameter values to retrieve from the same API response. for instance, if you wish to retrieve the listing **Email** Value or Identities' listing **Email** Value for each item in a Identities, you could use any of the subsequent values:

- `fields=Identities/Email/Value,Email/Value`
- `fields=Identities(Email/Value,Addresses(Address1,Address2),ProfileImageUrls/Large)`

**Note:** as with all query parameter values, the fields parameter value should be URL encoded. For better readability, the examples in this document omit the encoding.

## Limit Social Data Collection

To improve privacy your LoginRadius site can be configured via our backend to limit the amount of data stored
from Social Providers when a user performs a Social Login / Registration. We can configure our system so that only the Registration schema is stored within our system.

**NOTE:** You need to contact LoginRadius to enable this feature on your APP.


## Environment Data as Headers

LoginRadius allows you to specify desired values in your headers, this can be useful to overcome analytics discrepencies when the analytics depend on header data.

For example, there may be a proxy between the LoginRadius APIs and the client browser, preventing you from obtaining the correct IP address for your analytics.

Please see below for a list of Headers and the Values that you can provide to further your analytics data:

 - **Language Header:** `X-Origin-Accept-Language : <language value>` Here, the Origin accepts language, for the client language.

 - **IP Header:** `X-Origin-IP : <Origin IP Address>` Here, X-Origin-IP, determines the IP address of the client's request.

 - **UserAgent Header:** `X-Origin-User-Agent : <User Agent String>` Here, X-Origin-User-Agent, is the origin for the user agent string.

 - **Host Header:** `X-Origin-Host : <Host Address Absolute URI>` Here, X-Origin-Host, is the client host address. Validation on this field specifies that it must be a valid absolute URL.

- **Platform Header:** `X-Platform : <Platform info such as android/ios/.net>` Platform header, that identifies the target framework.

## Referer-Header

The Referer HTTP request header contains an absolute or partial address of the page that makes the request. The Referer header allows a server to identify a page where people are visiting it from. This data can be used for analytics, logging, optimized caching, and more.

You can leverage Referer Header for changing the value of the **Registration Source** Field in the user profile with the use of the following API’s.

- https://www.loginradius.com/docs/api/v2/customer-identity-api/authentication/auth-user-registration-by-email/ 

- https://www.loginradius.com/docs/api/v2/customer-identity-api/account/account-create/ 

You can change the Registration Source value by passing the referer value in the header.

Refer the below Screenshot 

![Registration Source](https://apidocs.lrcontent.com/images/PM_8910619c0098ccb5e8.98154705.png "Registration Source")

The default Registration Source  values are shown in the below table.

| Source      | Registration Source value in the Profile(default) |
| ----------- | ----------- |
|Android(When using android SDK)|Android|
|iOS(When using iOS SDK )|iOS|
|Identity Experience Framework(IDX page)|URL of the IDX page|
|Loginradius Docs API /API/Postman/ Registration through Admin console |API|

To update the Registration Source using iOS SDK, see [here](/libraries/mobile-sdk-libraries/ios-library/#registrationbyemail16) and for Android, have a look [here](/libraries/mobile-sdk-libraries/android-library/#refererheaderoptional4).


## Prevent Webhooks from triggering via header

**Note:** The LoginRadius Webhooks API is an add-on please [contact us](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) for details.

If you are using Webhooks, and you have an event registered.  You can prevent the Webhooks API from triggering when making a call that can be associated to that configured event.

For example, let's say you have the "Login" event registered in the Webhooks API, this would normally cause a full profile to be sent to the registered addresses when a Login is triggered via any API that performs a Login.

e.g. [Auth Login by Email API](/api/v2/customer-identity-api/authentication/auth-login-by-email)

You can pass `X-PreventWebhook` into your request header with the value of either `true` or `false` to prevent the Webhook from triggering.

As shown below:

```

content-Type: application/json
X-PreventWebhook: true

```

## Accessing the LoginRadius API via a Proxy

When making requests to the LoginRadius API, you will need to set the proxy for your web requests so that requests made to api.loginradius.com will be processed by your proxy.

For the SDKs supported by LoginRadius, you will need to modify the relevant web request methods in the SDK that you are using to support your proxy.

If you need assistance with this, [submit a ticket](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) with the LoginRadius support team and someone will be able to assist.
```
