Google+ Deprecations
=================================

Google will be discontinuing support for some of their services which may impact your current LoginRadius implementations. These deprecations will take effect as of March 7, 2019 with some deprecations rolling out  as soon as January 28, 2019. The following Google documents provide more detail on the upcoming deprecations: 

## Google+ API Shutdown

[https://developers.google.com/+/api-shutdown](https://developers.google.com/+/api-shutdown)

This deprecation will occur January 28, 2019 and affect all Google+ APIs and Scopes. 

## Picasa API Deprecation 
[https://developers.google.com/picasa-web/docs/3.0/deprecation](https://developers.google.com/picasa-web/docs/3.0/deprecation)

This is will begin January 28, 2019 with an optional extension to March 7, 2019 and impacts the following Google Scopes: 

- `https://picasaweb.google.com/data`
- `https://photos.googleapis.com/data`
- `https://www.googleapis.com/auth/photos`
- `https://www.googleapis.com/auth/photos.upload`
- `https://www.googleapis.com/auth/picasa`
 
Based on the above deprecations this may affect your LoginRadius implementation if you are leveraging the following APIs: 

- **Albums API:**

	[https://www.loginradius.com/docs/api/v2/customer-identity-api/social-login/advanced-social-api/album](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/album)

- **Contacts API:**

	[https://www.loginradius.com/docs/api/v2/customer-identity-api/social-login/advanced-social-api/contact](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/contact)
	
- **Photos API:**

	[https://www.loginradius.com/docs/api/v2/customer-identity-api/social-login/advanced-social-api/photo](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/photo)

The above deprecations also impact the data you can retrieve via the [User Profile API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/user-profile) from Google. 

The following fields will still be available for your Google Profiles:

|Available Fields   |
|---|
| Email  |
| FirstName   | 
| LastName  |
| Gender  |
| ID  |
| ProfileUrl |
| LocalLanguage  |
| ImageUrl  |
| Gender  |
| ThumbnailImageUrl |
| Verified  |


The below fields will no longer be available from Google Profiles: 


|Deprecated Fields   |
|---|
| About  |
| Age   | 
| Age Range  |
| Birth Date  |
| City |
| First Login |
| Gravatar Image Url  |
| Local City |
| Local Country  |
| No Of Logins |
| Positions  |
| Relationship Status  |
| Skills  |
| Tagline |
| Website  |



If you are leveraging the above APIs or data fields, we recommend that you prepare for the removal of these services. If you have any questions about the above deprecations or their impact on your workflows, please reach out to [LoginRadius support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) for more information or assistance. 
