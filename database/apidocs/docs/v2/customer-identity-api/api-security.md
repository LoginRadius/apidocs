#API Security
---

This document provides details on the different methods for accessing the LoginRadius API Endpoints securely, certain methods are only available on certain API as per the descriptions below.


## Access Token based API Endpoints 

The Access Token is used to access a customer’s session, when communicating with the LoginRadius Authentication APIs. It can be passed to the Authentication APIs in the following ways:

   - **Header:** Can be passed in the request header as the authorization header.

       E.g.  `Authorization : Bearer 2087f23d-2c35-4c1f-a3e9-6a83554a07c4`
       
   - **Query String:** Can be passed by Query String with the parameter name: access_token  

       E.g. `https://api.loginradius.com/identity/v2/auth/account?apikey=********-****-****-****-************&access_token=********-****-****-****-************`

   - **Payload**: Can also be passed in the request body/payload JSON with the key name: access_token


## Credential based API Endpoints 

Some of the LoginRadius APIs (Account API, Roles Management API, Custom Object API) are strictly for back-end use only, they do not make use of the customer's Access Token/session as they provide administrative capabilities. To secure these APIs they require providing API credentials, this section covers how you can call these APIs, Please see below for details:


[API Key and Secret via Headers](#api-key-and-secret-via-headers)

[API Key and Secret via Query String](#api-key-and-secret-via-query-string)

[API Request Signing](#api-request-signing)


#####API Key and Secret via Headers

This method allows you to call our back-end APIs by passing in the [API Key and Secret](https://www.loginradius.com/legacy/docs/account/get-api-key-and-secret) via Headers instead of passing them as query parameters.

Simply pass them as Headers as shown below:

```
content-Type: application/json
X-LoginRadius-ApiKey: <<YOUR API KEY>>
X-LoginRadius-ApiSecret: <<YOUR API SECRET>>
```

#####API Key and Secret via Query String

The [API Key and Secret](https://www.loginradius.com/legacy/docs/account/get-api-key-and-secret) can be passed by Query String with the parameter names: apikey and apisecret

E.g. `https://api.loginradius.com/identity/v2/manage/account?apikey=********-****-****-****-************&apisecret=********-****-****-****-************`


#####API Request Signing

**Note:** if you're interested in enabling this feature please contact [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

LoginRadius supports passing a dynamically generated Hash value as opposed to an API Secret. This Hash is generated with the request expiry time, url and the payload (if there is a payload), with the apisecret to be used as the hashing key. This will allow you to ensure that the payload has not been tampered with in transit.

Available Modes:

   - **Strict:** Hash must be passed with the request.
   - **Preferred:** If the Hash is provided, LoginRadius will validate it, otherwise LoginRadius will fallback to using the apisecret for API authentication.


**Usage:**

1. **Request Expiry Time:** The client will pass a header that contains a request expiration datetime value in UTC format.

	Eg: `X-Request-Expires : 2018-4-18 6:15:10 PM   (yyyy-M-d h:m:s tt) // UTC`

 If this value exceeds the current UTC datetime then the API will return an error message.

2. **Encoded URL:** To create the hash, the URL Must be encoded, please see below for the steps to follow.

      A) Create a URL by concatenating the endpoint and query string parameters. Parameters values should be encoded (This url should be used for calling the API).

      B) Decode the entire URL

      C) Encode the decoded URL. This URL should used to create the Hash.

3. **Creating the Hash:** to create hash following formula must be used

      A) Concatenate the `X-Request-Expires` header values: url and json string with ":" (signingString= X-Request-Expires+":"+Encoded(Url) + ":"+JSON Payload) if it's for a GET request, you can leave out the JSON Payload.

      B) Use your API Secret to sign the Hash: `hashBytes= HMACSHA256(signingString) //Use your API Secret as the key here`

      C) Get the Hash value by converting hashBytes into a base64 string

4.  **Passing the hash in the request:** The Client needs to pass the hash value as part of the header e.g. `digest: SHA-256=<hash value>`


For a demo, please see our fiddle [here](https://dotnetfiddle.net/oKiqCR).
