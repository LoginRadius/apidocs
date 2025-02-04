# Live Social Provider Updates

As a result of the incoming deprecation of Microsoft’s Live providers, LoginRadius has replaced the previous Live API with the new Microsoft Graph API. The social provider used by LoginRadius will continue to be named the Live.

## Changes made regarding Social Login and User Profile fetching: 

1. Users can now log in to their work or school Microsoft account using the social provider.
2. Users can continue logging into the provider using their consumer accounts (hotmail.com, outlook.com, live.com). 
3. The mapping for consumer accounts has a number of changes:
    - BirthDate/Age is not mapped in LoginRadius User Profile
    - Gender is not mapped in LoginRadius User Profile
    - ThumbnailImageUrl is not mapped in LoginRadius User Profile
    - ImageUrl is not mapped in LoginRadius User Profile
    - ProfileUrl is not mapped in LoginRadius User Profile
    - UpdatedTime is not mapped in LoginRadius User Profile
    - Positions is not mapped in LoginRadius User Profile  
    - Addresses is not mapped in LoginRadius User Profile
    - ProfileImageUrls are not mapped in LoginRadius User Profile
    - Emails will be mapped to Primary and Secondary emails, instead of Account, Business, Personal and Preferred emails
4. There are more fields that will be mapped for work and school accounts that are not available for consumer accounts. These are listed below under “Work/School Account Mapping”.

## Changes made regarding Advanced Social APIs:

 - Contact and Event API data have been mapped differently. The changes can be found below in “Contact Advanced Social API Mapping” and “Event Advanced Social API Mapping”.
 - [Audio](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/audio/), [Album](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/album/), [Photo](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/photo/) and [Video](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/video/) APIs, which were previously supported by the Live provider, have now been deprecated.

## Consumer and Work/School Account Mapping

| **Social Provider Field**  | **LoginRadius Field**|
| -------------------------- | -------------------- |
| businessPhones             | PhoneNumbers (Mapped to Type “Business”) |
| displayName                | FullName             |
| givenName                  | FirstName            |
| jobTitle                   |                      |
| mail                       |                      |
| mobilePhone                | PhoneNumbers (Mapped to Type “Mobile”)  |
| officeLocation             |                      |
| preferredLanguage          | LocalLanguage        |                        
| surname                    | LastName             |
| userPrincipalName          | Email.Value          |

## Work/School Account Mapping

| **Social Provider Field**  | **LoginRadius Field**|
| -------------------------- | -------------------- |
|aboutMe|About|
|ageGroup| |
|birthday|BirthDate|
|city|City| 
|companyName|Company|
|country|LocalCountry|
|department| |
|faxNumber| |
|hireDate| |
|interests|InterestedIn|
|mySite|Website|
|otherMails|Email.Value|
|pastProjects|Projects|
|postalCode| |
|preferredName|NickName|
|responsibilities|
|schools|Educations|
|skills|Skills|
|state|State|
|streetAddress|MainAddress|
 
## Contact Advanced Social API Mapping

| **Social Provider Field**  | **LoginRadius Field**|
| -------------------------- | -------------------- |
|assistantName| |
|birthday|DateOfBirth|
|businessAddress| |
|businessHomePage| |
|businessPhones|PhoneNumber|
|categories| |
|changeKey| |
|children| |
|companyName| |
|createdDateTime| |
|department| |
|displayName| |
|emailAddresses|EmailID|
|fileAs| |
|generation| |
|givenName|Name|
|homeAddress| |
|homePhones|PhoneNumber|
|id|ID|
|imAddresses| |
|initials| |
|jobTitle| |
|lastModifiedDateTime| |
|manager| |
|middleName| |
|mobilePhone|PhoneNumber|
|nickName| |
|officeLocation|Location|
|otherAddress| |
|parentFolderId| |
|personalNotes| |
|profession| |
|spouseName| |
|surname|Name|
|title| |
|yomiCompanyName| |
|yomiGivenName| |
|yomiSurname| || 

## Event Advanced Social API Mapping

| **Social Provider Field**  | **LoginRadius Field**|
| -------------------------- | -------------------- |
|attendees| |
|body| |
|bodyPreview|Description|
|categories| |
|changeKey | |
|createdDateTime| |
|end|EndTime |
|hasAttachments| |
|iCalUId|  |
|id|ID|
|importance | |
|isAllDay| |
|isCancelled| |
|isOrganizer| |
|isReminderOn| |
|lastModifiedDateTime|UpdatedTime|
|location|Location|
|locations|Location|
|onlineMeetingUrl| |
|organizer|OwnerId and OwnerName|
|originalEndTimeZone| |
|originalStart| |
|originalStartTimeZone| |
|recurrence| |
|reminderMinutesBeforeStart| |
|responseRequested| |
|responseStatus|RsvpStatus|
|sensitivity|Privacy|
|seriesMasterId| |
|showAs| |
|start|StartTime|
|subject|Name|
|type| |
|webLink| | |



