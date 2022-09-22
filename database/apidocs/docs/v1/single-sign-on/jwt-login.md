JWT (JSON web Token) is a popular method of SSO, which is widely used by B2C apps, through this system you can allow your user to log into an app which supports JWT.

To enable the JWT tokens when using the LoginRadius simply add the following parameters to your initialiation Object: 
```
commonOptions.tokenType = "jwt";
commonOptions.integrationName = "<your jwt configuration integration app name>";
``` 

Upon User login you will receive the standard response that includes the access token and User profile along with the JWT token
```
{
	profile:{<Normalized User Profile>},
	access_token:"<ACCESS Token>",
	expires_in:"<Time Stamp>",
	jwttoken:"<JWT TOKEN Response>"
}
```


A few quick points about the LoginRadius JWT integration. 
1. LoginRadius acts as an Identity Provider, meaning LoginRadius can authorize your app, your app will act as a Service Provider
2. LoginRadius supports Single Logout (SLO)
3. LoginRadius provides custom attributes, so it is possible to customize the JWT response.
```
{
  "type": "basic",
  "title": "Login"
}
```
If a user is not logged in on your service provider app, than redirect user to LoginRadius JWT SSO URL, this validates your request and the response with your defined request

Login URL is 

https://cloud-api.loginradius.com/sso/jwt/redirect/token?apikey=<api key>&jwtapp=<jwt intergation name>&return_url=<JWT token handlor URL>

Response will be encrypted with an encryption algorithm which you set in the settings. 

**LoginRadius support these algorithms** 
Supported JWT algorithms are
- HS256  
- HS384
- HS512
- RS256
- RS384
- RS512


**Payload** 
1. Minimum payload required 
{
    iss: "https://<LOGINRADIUS SITE NAME>.hub.loginradius.com",
    sub: "{uid}",
    jti : "unique string",
    iat: 1372638336
}

2. Profile fields:  LoginRadius JWT supports customizing your profile fields for JWT and filling fields by the LoginRadius User Profile fields.  


```
{
  "title": "Exchange LoginRadius access token to JWT"
}
```

Call following API to get JWT from LoginRadius access _token
```
https://cloud-api.loginradius.com/sso/jwt/api/token?apikey=<api key>&jwtapp=<jwt intergation name>&access_token=<Loginradius API endpoint>
```
**Response**
```
{
	signature: <JWT response>
}
```
This API support JSOP as well. 
```
{
  "type": "basic",
  "title": "Logout"
}
```
You can request logout on LoginRadius by redirecting logout requests to LoginRadius JWT logout URL.

The Logout URL is: 
```
https://<YOUR LOGINRADIUS SITE NAME>.hub.loginradius.com/auth.aspx?action=logout&return_url=<Return URL>
```

```
{
  "type": "basic",
  "title": "LoginRadius JWT settings"
}
```
Please contact LoginRadius support to configure and setup JWT with your account.

LoginRadius Support requires the following information:

**AppName** : Any unique name which will be used by LoginRadius to identify the provider that the request is originating from. 
**Secret**: Encryption secret.
**Algo** : Algorithm to sign data 
**Mapping**: Key value pair of attributes, key will be JWT field and value will be LoginRadius userprofile field.
**QueryStringParameter** : parameter name in which LoginRadius send JWT token 
**Encoding** : [Optional] default is utf8
