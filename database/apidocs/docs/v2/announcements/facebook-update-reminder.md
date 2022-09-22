# Facebook Update Reminder

This is a reminder for those that have a Facebook App running on version 2.12, Facebook will be deprecating this API May 1st, 2020, the next version that will be available is Version 3.0.
In version 3.0 the following fields were deprecated, which means if you currently are capturing the following profile fields during a Facebook Login, you will no longer be able to do so:

- CoverPhoto
- Currency
- LocalLanguage
- TimeZone
- UpdatedTime
- Verified

The scope used to retrieve data from the Social Groups API is also getting changed. If you are using the Social Group API from Facebook, you will have to allow LoginRadius to use the following scopes:

- groups_access_member_info 
- publish_to_groups


Details on Version: 2.12: 
https://developers.facebook.com/docs/graph-api/changelog/version2.12

Details on Version 3.0:
https://developers.facebook.com/docs/graph-api/changelog/version3.0#version-3-0


If you're using LoginRadius API V1 and don't have API V2 enabled, as of May 1st 2020 you will not be able to capture extended data points from Facebook, only the basic profile fields will be available. Please reach out to [LoginRadius Support Team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) if you have any questions.
