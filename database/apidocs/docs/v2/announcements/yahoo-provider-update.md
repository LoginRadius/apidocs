# Yahoo Provider Update


As a result of recent changes and the upcoming deprecation of the current Social Profile APIs from Yahoo! on March 2nd 2020, to keep the service as smooth as possible, LoginRadius will automatically update you to the newest Social Provider API from Yahoo! that replaces the old one. While the impact is minimal, there are some changes to some of the data being mapped from Yahoo! and into LoginRadius when using Yahoo! as a social provider to fetch a customer profile.

As per the changes being introduced we've compiled a table of the new mappings that will be pulled from the Yahoo! API below.

*Note:* Blank fields indicate that the field is no longer supported by Yahoo!

|Social Provider | Field LoginRadius Field|
| ------------- |:-------------:| -----:|
|sub| ID|
|given_name | FirstName, FullName|
|family_name|  LastName, FullName|
|locale| LocalLanguage|
|email|Email|
|email_verified|EmailVerified|
|preferred_username | |
|nickname |NickName, FullName (if given_name and family_name undefined)|
|picture| ProfileUrl|
|profile_images| ProfileImageUrls|
|birthdate| |
|phone_number| PhoneNumbers|
|gender| Gender |


## Necessary changes that you need to make at your end to support Yahoo! Login

In order to keep the service as smooth as possible you also need to make the following changes at your end:

- You need to update the Redirect URL in your <a href='https://www.loginradius.com/pricing/'> Yahoo App </a> with the following (It shouldn't have 443 port):

```
https://<LoginRadius-SiteName>.hub.loginradius.com/socialauth/validate.sauth
```
- You also need to update your <a href='https://www.loginradius.com/pricing/'> Yahoo App </a> configurations under **API Permissions**, select **OpenID Connect Permission** with **Profile** and **Email permissions**, as displayed below:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/yahoo_app_126695ea03c7f222719.92588969.png "Yahoo App")

- Re-save the <a href='https://www.loginradius.com/pricing/'> Admin Console </a> configurations.

You may also read about this change directly on the [Yahoo! developer](https://developer.yahoo.com/oauth/social-directory-eol/) website.
