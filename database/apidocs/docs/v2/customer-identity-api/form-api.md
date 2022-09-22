# Form API

LoginRadius offers Form API which can be leveraged to create an account or update the customer’s profile from your existing web forms by mapping LoginRadius profile fields with the web form input fields. 

This API doesn’t handle the password mapping. The API creates the account by generating a random password at the LoginRadius end.  Once the account is created, you can ask the customer to reset the password.  This API bypasses the verification email workflow and creates the account. This API can be used to gather the customer information without any registration, i.e. feedback form. The Email Id should be passed in the API request to create an account. If phone authentication is enabled, a PhoneId can be passed instead of EmailId.

If the email sent in the request payload exists in the LoginRadius application, the API will update the profile with the request payload. The API can update Custom Fields as well as Custom Object for a customer’s profile but it doesn’t update the password. 
Here is the step by step instruction to set up and implement the Form API for your own application that doesn't want to customize the existing web application.

## Part 1 - Configuration

This feature is not available in the Admin Console. You need to provide the profile field mapping with your web form input fields to the LoginRadius team to configure it for your LoginRadius app. Here is the sample mapping object:

```
 [
    {
        "ProfileKey" : "Email[0].Value",
        "FormKey" : "EmailId",
        "OverwriteExist" : false
     }, {
        "ProfileKey" : "firstname",
        "FormKey" : "fname",
        "OverwriteExist" : true
    }, {
        "ProfileKey" : "lastname",
        "FormKey" : "lastname",
        "OverwriteExist" : true
    }, {
        "ProfileKey" : "About",
        "FormKey" : "Aboutme",
        "OverwriteExist" : true
    }, {
        "ProfileKey" : "Age",
        "FormKey" : "Age1",
        "OverwriteExist" : true
    },{
        "ProfileKey" : "cf_isupdated",
        "FormKey" : "updatestatus",
        "OverwriteExist" : false
    },{
        "ProfileKey" : "co_customobjectdata.Firstname",
        "FormKey" : "fname",
        "OverwriteExist" : true,
        "UpdateType": "replace"
    },{
        "ProfileKey" : "co_customobjectdata.Marks",
        "FormKey" : "marks",
        "OverwriteExist" : true,
        "UpdateType": "replace"
    }
]
```

**Note:**
- The LoginRadius Custom Fields must be prefix with **"cf_"** in the profile key
- The LoginRadius Custom Object must be prefix with **"co_"** in the profile key and Custom Object fields must be separated by the **"."** Ex. let profile key is **"co_customobjectdata.Marks"**, so customobject name is **customobjectdata** and customobject field name is **Marks**.
- If OverwriteExist is false in customobject field mapping, then it will create new record in custom object
- If OverwriteExist is true in customobject field mapping then it first check the existing record in the customobject, if the record is found, then it will update the fields with the **UpdateType** mention in the mapping and if record not found, then it will create new record.
- Possible values for the  UpdateType is **replace** and **partialreplace**, if the UpdateType not defined in the customObject mapping then **partialreplace** will be used as default.

## Part 2 - More Information on API call

The following table displays the Delegation API’s endpoint and related information:

| Description | create/update profile by custom data |
|---|---|
|Endpoint|https://cloud-api.loginradius.com/sso/formapi/form|
|HTTP Method|Post|
|Query Params|apiKey*, apiSecret*, formname*|
|body|{<br>"fname":"test",<br>"lastname":"User",<br>"EmailId":"example@example.com",<br>"Comments":"customfield11",<br>"TitleOrRole":"customfield22",<br>"LevelOfInterest":"customfield33",<br>"fname" : "jim",<br>"marks" : 70<br>}|
|Reponse|{<br>"isPosted": true<br>}|



## Part 3 - Implementing the Form API

Once the configuration for Form API is completed by the LoginRadius team, you can call the Form API from your web server with your existing web form. Please see the following code snippet for reference:

```
var unirest = require("unirest");

let payload = {
    fname:"test",  
    lastname:"user",    
    EmailId:"example@example.com"    
    };
var req = unirest("POST", "https://cloud-api.loginradius.com/sso/formapi/form");
req.query({"apikey":"<LR apiKey>","apisecret":"<LR apiSecret>", "formname":"<form name>"})
req.headers({"content-Type":"application/json"})
req.type("json");
req.send(JSON.stringify(payload))
req.end(function (res) {
    console.log(res.body);
});
```
**Note:** This API should be executed from your server as it requires API secret for your LoginRadius app. 