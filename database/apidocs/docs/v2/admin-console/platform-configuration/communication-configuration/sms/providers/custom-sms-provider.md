# Custom SMS/Text Providers

LoginRadius provides you the ability to implement any custom SMS/Text providers as per your requirements. Using this feature, you can implement various SMS/Text providers such as Twillio on WhatsApp, TextLocal, Line, MessageBird, etc. LoginRadius uses this SMS service for phone authentication, sending OTP, and others. This section describes configuring different types of SMS/Text providers with LoginRadius.

- Navigate to the [**Text And SMS And Voice OTP Configuration**](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/text-and-sms-and-voice-otp-configuration) section of the Admin Console and select **Custom Text/ SMS Provider** from the dropdown.

![Overview](https://apidocs.lrcontent.com/images/Communication-Configuration-LoginRadius-User-Dashboard_962626584658620cddb0081.21099861.png "Overview")

- Enter the **Delivery Provider URL**. Please note this URL is different for each provider. To obtain them, you can either refer to the provider’s documents, or you can also obtain this from the CURL request you get after configuring the SMS/Text/ Voice providers. 


Select the Authentication type, which consists of the following options:

1. Basic Authentication
2. Bearer
3. No Authentication

### Basic Authentication

When you select this option, you will have to pass the username and password, which are generally SID and Auth Token. In addition to username and password, we have to pass the HTTPS method, for example, GET, POST, and PUT. Kindly refer to some of the following sample CURL request for **basic authentication** method:

```
curl 'https://api.twilio.com/2010-04-01/Accounts/[username]/Messages.json' -X POST \
--data-urlencode 'To=whatsapp:[Receiver Phone number]' \
--data-urlencode 'From=whatsapp:[Sender’s Phone number]' \
--data-urlencode 'Body=[BODY]' \
-u ACe6dd976c6cb42473c757e7fba6761446:[AuthToken(Password)]
```

### Bearer

When you select this option, you will be required to pass the bearer token along with the HTTPS method. Kindly refer to some of the following sample CURL request for **bearer** method

```
curl --location 'https://api.line.me/v2/bot/profile/[APP ID]' \
--header 'Authorization: Bearer UcjDR3Kmfm5M/gPKlezOd9hnYeN3ub/L+Vt97x73z1Tr…….[Bearer Token]/1O/w1cDnyilFU='
```

### No Authentication

- In this method, there is no requirement to pass the username and password or even the bearer token. However, here, you do have to select the HTTPS method. Kindly refer to some of the following sample CURL request for **no authentication** method

```
curl --location --request PUT 'https://api.textlocal.in/send/?apikey=[API KEY]&sender=600010&numbers=[Phone number]&message=Hi%20there%2C%20thank%20you%20for%20sending%20your%20first%20test%20message%20from%20Textlocal.%20See%20how%20you%20can%20send%20effective%20SMS%20campaigns%20here%3A%20https%3A%2F%2Ftx.gl%2Fr%2F2nGVj%2F'
```


- After filling in the above details, provide the **Body**, which generally contains details about the **sender's phone number**, the **body of the SMS**, where you can pass the placeholders, etc.

- LoginRadius allows you to specify desired values in your **headers**. This can be useful to overcome analytics discrepancies when the analytics depend on header data. For more details on headers, kindly refer to this [**document**](/api/v2/customer-identity-api/advanced-api-usage/#refererheader9).


If you need assistance with this, [**submit a ticket**](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) with the LoginRadius support team and someone will be able to assist.