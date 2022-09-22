Response/Error Codes
====

----------

This section details the LoginRadius error codes and provides suggestions on how to resolve them.

####HTTP Error Response Structure:
```
{
  "Description": {{String}},
  "ErrorCode": {{Integer}},
  "Message": {{String}},
  "IsProviderError": {{Boolean}},
  "ProviderErrorResponse": {{String or NULL}}
}
```

####Http Error Response Descriptions:

| Error Code    |       Error Message         |    Description |
|:-----------|:------------------------------|:---------------------|
|200        |        OK	                       |     The API was accessed successfully
|400        |	Bad Request	       |     Verify that the API endpoint you are accessing is                         correctly formatted and has all the required parameters
|401	       |        Unauthorized	       |     Verify your LoginRadius API Key and Secret, also verify that your access token has not expired
|403	       |        Forbidden	       |     Verify all parameters are correctly formatted and that the API endpoint is correct
|404	       |        Not Found	       |     The API endpoint is not correct or your account does not have sufficient permissions to access this endpoint
|405	       |        Method not allowed|	Verify that you are accessing the API endpoint with the correct format (ie. Get or Post)
|500	       |        Internal Server Error|	Something has gone wrong with the processing of the request, check your server error logs and [contact us](https://support.loginradius.com/hc/en-us) if the error persists

#### LoginRadius Error Response Descriptions:

| Error Code    |       Error Message         |    Description |
|:-----------|:------------------------------|:---------------------|
|901	        |The API key is invalid	|The provided LoginRadius API Key is invalid or is not authorized, please use a valid LoginRadius API Key or check the API Key for your LoginRadius account
|902	        |The API secret is invalid	|The provided LoginRadius API Secret is invalid or is not authorized, please use a valid LoginRadius API Secret or check the API Secret for your LoginRadius account
|903	|The request token is not valid|	The token passed into the API should be the token returned in the authentication response
|904	|Request token has expired|	The LoginRadius request token has expired, please request a new token from the LoginRadius API
|905	|The access token is not valid	|Request a new access token using the access token API or through the authentication interface
|906	|The access token is expired	|Request a new access token using the access token API or [contact us](https://support.loginradius.com/hc/en-us) to modify the default expiry times
|908	|A parameter is not formatted correctly	|Verify that the data types for all of the parameters and parameters are correct when making the API call
|909	|The site doesn’t have permission to access the endpoint|	You may have accessed a non-existent or improperly formatted API, or your account does not have the correct permissions required to access the specified API
|910	|This endpoint is not supported by the current provider	|You can refer to this page or to the above API endpoint to check whether an API endpoint is supported for each provider
|920|	API key is invalid (Invalid Format)|	The LoginRadius API Key is invalid, please use the API Key in your LoginRadius account.
|921|	API secret is invalid (Invalid Format)	|The LoginRadius API Secret is invalid, please use the API Secret in your LoginRadius account
|925|	The date range has an invalid format	|The "From" date has an invalid format, please use the valid date format (mm/dd/yyyy)
|926|	The date range has an invalid format|	The "To" date has an invalid format, please use the valid date format (mm/dd/yyyy)
|927|	No records are available for this query|	There are no records available for this query, please review the query again
|928|	You have exceeded your API limit|	You have exceeded your API limit, please contact LoginRadius support for more information
|929|	Access token is missing from ID provider (Facebook, Twitter, etc.)	|The ID Provider access token is required to generate the LoginRadius access token, please send the correct token
|930|	Token secret is missing from ID provider (Facebook, Twitter, etc.)	|The ID Provider token secret is required to generate the LoginRadius access token, please send the correct token
|931|	The album ID is not valid|The album ID is required to process this request, please use a valid album ID
|936|	This email address is already registered with your Site.	|The email address has to be unique for your Site, please use a different email address
|937|	User ID is invalid	|The User ID is invalid, please use a valid User ID in order to process this request
|938|	User does not exist|	The user's account does not exist, please use a valid user or create the user before processing this request
|957|	The query is not formatted correctly	|Please use the correct query format, it should be in the format specified in the query documentation
|958|The post body is invalid	|Please use a valid post body (in the format x-www-form-urlencoded)
|959	|The status ID is invalid|	A valid Status ID is required to process this request, please use a valid Status ID
|965|	Post body is invalid|	Please use a valid post body and make sure that it is in a valid JSON format
|966	|Incorrect Email and/or password|	Use the correct email and password combination or reset your password
|967|	Current password is not valid|	Use the correct password for the account
|968	|The date has an invalid format	|Correctly format the date as mm-dd-yyyy
|970|	Email is not verified	|Check the email used to register for the verification link
|971	|Current request is not valid|	Correctly format the API request you are trying to make and include all relevant parameters in the correct format
|973|	Email verification link is not valid|The verification link may have been incorrectly formatted [contact us](https://support.loginradius.com/hc/en-us) with the invalid link
|974|	Email verification link has already been used	|Each verification link can only be used once, You should be able to log in now, if not reset your password with the forgot password option
|975|	Email verification link has expired	|The verification link has expired default expiry times are 24hrs, you can use the forgot password link to verify your email
|979|	The link cannot be accessed	|This link has either expired or already been used, request a new link
|981|	This site is not configured for User Registration	| [Contact support](https://support.loginradius.com/hc/en-us) or your account manager to activate User Registration for your account
|982|	CAPTCHA is not valid	|CAPTCHA was not input correctly, please carefully include the correct CAPTCHA message
|983	|This account cannot be linked	|This is not a valid account to be linked, use a valid Account ID to link
|984|	This account ID is not valid	|Use the correct Account ID as detailed in the user object
|986	|This account is already linked	|Use an unlinked Account ID or use the unlink API to remove the linking with the existing account
|987|	This account can not be unlinked.	|This account is not currently linked up and cannot be unlinked
|988|	An account already exists for this email	|This email is already registered, use a unique email or use the 'forgot password' option for the email
|989|	This provider ID can not be unlinked	|This provider ID is not linked to any account so cannot be unlinked
|990|	This email is not valid	|Use a valid email address format xxx@xxx.xxx
|991	|Your account is blocked	|This account has been blocked. Contact the system admin to reactivate the account
|992|	The page ID is not valid	|The page ID is required to process this request, please use a valid page ID
|993	|Custom field is invalid|	This custom field is invalid, please use a correct or valid custom field
|995|	Unique record ID is invalid|	This unique record ID is invalid, please enter a valid unique record ID
|996|	This cursor value is not valid|	Enter a value higher than zero for the cursor value
|997|	This request does not have more records|	This is the end of the data set, there are no further records to process
|998|	Maximum limit reached for custom object|	There is a limit of 20 custom object containers per account. Please use less than 20 custom objects
|999|	This site is not configured for custom object setting|	Custom objects have not been activated for this account, [contact us](https://support.loginradius.com/hc/en-us) to activate custom objects
|1001	|This custom object ID is not valid|	Check the custom object ID in the user profile object
|1002|	Maximum limit has been reached for this custom object|	Each custom object can hold up to 10 fields, [contact us](https://support.loginradius.com/hc/en-us) for details on adding more custom objects
|1003|	This record is blocked within custom object	|This record is restricted, unlock the record or [contact us](https://support.loginradius.com/hc/en-us)
|1005|	User account should have at least one email address.	|You can’t delete this email address as this is the only email address in your profile. Please add additional email addresses in order to remove this
|1006|	Invalid action for adding or removing email addresses.|This action is not valid. Please take a valid action
|1007|	The Account ID is invalid.| An email address cannot be added to this account.	This Account ID is not valid. Please use a valid Account ID or create an email profile before attempting this action
|1008|	This provider cannot be unlinked.	|This provider cannot be unlinked from your profile
|1009|	The FROM clause is invalid.	|The FROM clause is not valid. Please review the documentation and process your request again
|1010|	The ORDERBY clause is invalid.	|The ORDERBY clause is not valid. Please review the documentation and process your request again
|1011	|The LIMIT clause is invalid.	|The LIMIT clause is not valid. Please review the documentation and process your request again. The request must be between 1-20 records
|1012	|The SKIP clause is invalid.	|The SKIP clause is not valid. Please review the documentation and process your request again. The clause must be non-negative
|1013|	The SELECT clause is invalid.|	The SELECT clause is not valid. Please review the documentation and process your request again
|1014	|The WHERE clause is invalid.	|The WHERE clause is not valid. Please review the documentation and process your request again
|1015|	The new password is not valid.|	Your new password is too similar to your old password(s). Please try another password
|1016|	Password cannot be changed. The profile ID is invalid.|	Please use a valid Profile ID to change your password
|1017	|This username is already registered with this website.	|The username you have selected is already in use. Please choose a different username
|1018|	Username cannot be changed, as your current or existing username is not valid.	|Your current or existing username is not valid. Please use the correct username
|1019	|The First Data point is not valid.|	The First Data point is not valid. Please review the documentation and submit your request again with the correct Data Point
|1020|	The Second Data point is not valid.	|The Second Data point is not valid. Please review the documentation and submit your request again with the correct Data Point
|1021|	Stats type is not valid.	|The Stats type is not valid. Please review the documentation and submit your request again with the correct Stats type
|1022|	This username does not exist.	|The provided username does not exist. Please enter a valid username
|1023|	This email address does not exist.	|The provided email address does not exist. Please use a valid email address
|1024|	This username format is not valid.	|This is not a valid username format. Please enter a username with the correct format
|1025|	This email address is already verified.|	This email address has already been confirmed, so you cannot resend the verification email
|1026|	Cannot login with this social provider as email address is not yet verified.	|Verify your email address first to log in with this social provider
|1027	|You cannot log in or register with this email address, as an account already exists for this email address.|	An account already exists with this email address. If you’ve forgotten which email address/social provider you have previously registered with, you can find out by going through the Forgot User ID or Social Provider link
|1028|	You cannot log in or register with this email, as this email address is already associated with another account but has not been verified	|You are attempting to log in or register with an existing unverified email address. Please verify the email address before logging in or registering
|1030	|Email address cannot be registered, as it is already registered under a social account|	An account already exists with this email address. If you’ve forgotten which social provider you have previously registered with, you can find out by going through the forgot user ID or social provider link
|1031	|Cannot send email verification, as the Link parameter does not exist.	|Link parameter is required for the verification email. Please add a Link parameter
|1032|	You cannot send verification emails, as the email verification option is disabled for your site.|	Email address verification option is disabled for your site. Please enable it before sending any verification emails
|1033|	Cannot login with this social provider as the same email address is already being used with another account|	please login with your existing account. If you’ve forgotten which provider you have previously registered with, you can find out by going through the Forgot User ID or Social Provider link
|1034	|Verification emails cannot be sent, as the email verification option is disabled for your site	|The email address verification option is disabled for your site, please enable it before sending any verification emails
|1035|	Custom object JSON is invalid|	The provided custom object JSON is invalid, please use a valid or well-formatted JSON in order to process this request
|1036|	Custom object ID is required.	|Custom object ID is required, please use a valid custom object ID in order to process this request
|1037|	Account ID is required|	Account ID is required. Please pass account ID in the request
|1038|	Valid Email ID is required.	|The provided email ID is invalid or not well-formatted, a valid email ID is required in order to process this request
|1039|	An email profile is not created or does not exist	|An email profile is not created for this Account ID, please use a valid Account ID or create an email profile before processing this request
|1040|	REST hook target URL is invalid	|The provided REST hook target URL is invalid, it must be a valid web URL
|1041|	Number of REST hook subscriptions exceed the limit.|	Number of REST hook subscriptions must be less than or equal to 5, unsubscribe other and try again
|1042|	Event parameter is not valid.	|Event parameter is not valid, it must be either 'login' or 'register'
|1040|	REST hook target URL is not valid	|REST hook Target URL must be a valid web URL
|1041	|The number of REST hook subscriptions exceed to limit|	The number of REST hook subscriptions must be less than or equal to 5, unsubscribe other and try again
|1042|	Event parameter is invalid	|Event parameter is invalid, it must be either 'login' or 'register'
