#Profile Data Points

This document provides a complete hierarchy of profile data points in addition to Type, Constraint, and Editability details.

> **Disclaimer:**<br>
Provider-specific data points are subject to change and vary with provider. Data points available for various providers can be found [here](https://www.loginradius.com/datapoints/).

| Field Name | Type    | 1st level Object Field | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| 2nd level Object Field | Type | 3rd level Object Field | Type | Constraints | Editable via API |
|----------------------------|-------------------------------------|---------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------|---------------------------------------------------------------------|----------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------|
| **UID:** Unique ID of a user account in the LoginRadius system. | String |  |  |  |  |  |  | Generated using .Net Guid.NewGuid(), stripped of all non-alphanumeric characters and stringified.A Guid itself is a 128-bit integer: https://docs.microsoft.com/en-us/dotnet/api/system.guid remarked to have "a very low probability of being duplicated," and can be used as a global unique id to any system that requires one.  | FALSE |
| **ID:** The ID (Also known as Provider ID) is the unique identifier for each profile attached to a LoginRadius UID. There will be a unique ID for each profile (i.e. "Facebook", "Twitter", "Email", etc.) associated with a given UID. | String |  |  |  |  |  |  | Generated using .Net Guid.NewGuid(), stripped of all non-alphanumeric characters and stringified.Note that this value and Uid are both generated using Guid and have the same format but they have different values | FALSE |
| **Password:** Login password of the user | String |  |  |  |  |  |  | Current hashed password  | FALSE |
| **PIN:** A numerical/alpha-numeric Personal Identification Number code used for authentication. | Object | Skipped<br> PIN<br> LastPINChangeDate<br> SkippedDate | Boolean<br> String<br> DateTime<br> DateTime |  |  |  |  |  | FALSE |
| **Provider:** From which provider profile is created of the user(i.e. "Facebook", "Twitter", "Email", etc.) | String |  |  |  |  |  |  |  | FALSE |
| **Prefix:** Prefix of the user | String |  |  |  |  |  |  |  | TRUE |
| **Suffix:** Suffix of the user | String |  |  |  |  |  |  |  | TRUE |
| **FirstName:** First Name of the user | String |  |  |  |  |  |  |  | TRUE |
| **MiddleName:** Middle Name of the user | String |  |  |  |  |  |  |  | TRUE |
| **LastName:** Last Name of the user | String |  |  |  |  |  |  |  | TRUE |
| **FullName:** Full Name of the user | String |  |  |  |  |  |  | Aggregated( FirstName + LastName) | FALSE |
| **NickName:** Nick Name of the user | String |  |  |  |  |  |  |  | TRUE |
| **ProfileName:** Profile name of the user | String |  |  |  |  |  |  |  | TRUE |
| **BirthDate:** Date of birth of the user | String |  |  |  |  |  |  | "MM-dd-yyyy", "MM/dd/yyyy", "M-d-yyyy", "M/d/yyyy" | TRUE |
| **Gender:** Gender of the user | String |  |  |  |  |  |  | male, female, other, unknown, m, f, o, u, 1, 0 | TRUE |
| **Website:** Website  of the user| String |  |  |  |  |  |  |  | TRUE |
| **Email:** user’s email details and its type  (e.g primary ,secondary) | Type<br> Value | String<br> String |  |  |  |  | RFC compliant Email, required | TRUE |
| **Country:** Country details of the user | Code<br> Name | String<br> String |  |  |  |  | Aggregated(Code auto generate based on country name) | TRUE |
| **ThumbnailImageUrl:** User's thumbnail image URL | String |  |  |  |  |  |  |  | TRUE |
| **ImageUrl:** User’s Image URL | String |  |  |  |  |  |  |  | TRUE |
| **Favicon:** User’s favicon details | String |  |  |  |  |  |  |  | TRUE |
| **ProfileUrl:** User’s profile URL | String |  |  |  |  |  |  |  | TRUE |
| **HomeTown:** User’s Home town | String |  |  |  |  |  |  |  | TRUE |
| **State:** User's state | String |  |  |  |  |  |  |  | TRUE |
| **City:** User's city | String |  |  |  |  |  |  |  | TRUE |
| **Industry:** User’s Industry details | String |  |  |  |  |  |  |  | TRUE |
| **About:** User’s information | String |  |  |  |  |  |  |  | TRUE |
| **TimeZone:** User’s Time Zone | String |  |  |  |  |  |  |  | TRUE |
| **LocalLanguage:** locallanguage field returned in the social provider’s profile ( editable) | String |  |  |  |  |  |  |  | TRUE |
| **CoverPhoto:** User’s coverPhoto | String |  |  |  |  |  |  |  | TRUE |
| **TagLine:** TagLine of the User | String |  |  |  |  |  |  |  | TRUE |
| **Language:** Language field returned in the social provider’s profile ( readonly) | String |  |  |  |  |  |  |  | FALSE |
| **Verified:** Verified field returned in the social provider’s profile | String |  |  |  |  |  |  |  | FALSE |
| **UpdatedTime:** This field is updated when the latest profile update time is imported from the social provider. Also, in case if you are not using the social login this field value will be Null.| String |  |  |  |  |  |  |  | FALSE |
| **Positions:** List of user's job positions  | Array of Objects | Position<br> Summary<br> StartDate<br> EndDate<br> IsCurrent<br> Company<br> Location | String<br> String<br> String<br> String<br> String<br> Object<br> String | <Company> Object:<br> Name<br> Type<br> Industry | <br> String<br> String<br> String |  |  |  | TRUE |
| **Educations:** List of user's educations | Array of Objects | School<br> year<br> type<br> notes<br> activities<br> degree<br> fieldofstudy<br> StartDate<br> EndDate | String<br> String<br> String<br> String<br> String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **PhoneNumbers:** List of user's phone numbers | Array of Objects | PhoneType<br> PhoneNumber | String<br> String |  |  |  |  | Prefix country code required| TRUE |
| **IMAccounts:** User’s Positions details | Array of Objects | AccountType<br> AccountName | String<br> String |  |  |  |  |  | TRUE |
| **Addresses:** User’s Addresses details | Array of Objects | Type<br> Address1<br> Address2<br> City<br> State<br> PostalCode<br> Region<br> Country | String <br> String <br> String <br> String <br> String <br> String <br> String <br> String |  |  |  |  |  | TRUE |
| **MainAddress:** User’s Main Address details | String |  |  |  |  |  |  |  | TRUE |
| **Created:** User’s Created details | String |  |  |  |  |  |  |  | FALSE |
| **CreatedDate:** User’s account creation date | DateTime |  |  |  |  |  |  | In UTC format | FALSE |
| **ModifiedDate:** User’s account Modification date | DateTime |  |  |  |  |  |  | In UTC format | FALSE |
| **ProfileModifiedDate:** This field in the user profile gets updated with the timestamp for the last modifications/updations in the profile. | DateTime |  |  |  |  |  |  | In UTC format | FALSE |
| **LocalCity:** The city corresponding to the user's IP address at the time of registration. Auto populated. | String |  |  |  |  |  |  |  | TRUE |
| **ProfileCity:** User’s city name. | String |  |  |  |  |  |  |  | TRUE |
| **LocalCountry:** The country corresponding to the user's IP address at the time of registration.Auto populated. | String |  |  |  |  |  |  |  | TRUE |
| **ProfileCountry:** User's current country (same as Country.Name). | String |  |  |  |  |  |  |  | TRUE |
| **FirstLogin:** Indicate whether the user is logging in for the first time | Boolean |  |  |  |  |  |  |  | TRUE |
| **IsProtected:** Indicate whether the Twitter profile being imported is protected (private) | Boolean |  |  |  |  |  |  |  | TRUE |
| **RelationshipStatus:** User's relationship status | String |  |  |  |  |  |  |  | TRUE |
| **Quota:** User’s Quota | String |  |  |  |  |  |  |  | TRUE |
| **Quote:** User's quote | String |  |  |  |  |  |  |  | TRUE |
| **InterestedIn:** User's interests | Array of String |  |  |  |  |  |  |  | TRUE |
| **Interests:** User’s Interest details | Array of Objects | InterestedType<br> InterestedName | String<br> String |  |  |  |  |  | TRUE |
| **Religion:** User's religion information | String |  |  |  |  |  |  |  | TRUE |
| **Political:** User's politics information | String |  |  |  |  |  |  |  | TRUE |
| **Sports:** User's sports information | Array of Objects | Id <br> Name | String<br> String |  |  |  |  |  | TRUE |
| **InspirationalPeople:** User's inspirational people | Array of Objects | Id <br> Name | String<br> String |  |  |  |  |  | TRUE |
| **HttpsImageUrl:** User's Image path | String |  |  |  |  |  |  |  | TRUE |
| **FollowersCount:** Number of followers on social profile | Int |  |  |  |  |  |  |  | TRUE |
| **FriendsCount:** Number of friends on social profile | Int |  |  |  |  |  |  |  | TRUE |
| **IsGeoEnabled:** Twitter's IsGeoEnabled setting | String |  |  |  |  |  |  |  | TRUE |
| **TotalStatusesCount:** Total number of statuses posted (imported from Twitter) | Int |  |  |  |  |  |  |  | TRUE |
| **Associations:** User's association information (imported from Xing) | String |  |  |  |  |  |  |  | TRUE |
| **NumRecommenders:** Number of user's recommenders | Int |  |  |  |  |  |  |  | TRUE |
| **Honors:** User's honors information | String |  |  |  |  |  |  |  | TRUE |
| **Awards:** User's awards information (imported from Xing) | Array of Objects | Id <br> Name <br> Issuer | String<br> String<br> String |  |  |  |  |  | TRUE |
| **Skills:** User's awards information (imported from Xing) | Array of Objects | Id <br> Name | String<br> String |  |  |  |  |  | TRUE |
| **CurrentStatus:** User's current status | Array of Objects | Id <br> Text <br> Source <br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Certifications:** User's certifications | Array of Objects | Id <br> Name <br> Authority <br> Number <br> StartDate <br> EndDate | String<br> String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Courses:** User's courses | Array of Objects | Id <br> Name <br> Number | String<br> String<br> String |  |  |  |  |  | TRUE |
| **Volunteer:** User's volunteers | Array of Objects | Id<br> Role<br> Organization<br> Cause | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **RecommendationsReceived:** Recommendations received by the user | Array of Objects | Id<br> RecommendationType<br> RecommendationText<br> Recommender | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Languages:** List of user's languages | Array of Objects | Id<br> Name<br> Proficiency | String<br> String<br> String |  |  |  |  |  | TRUE |
| **Projects:** User's projects (imported from GitHub) | Array of Objects | Id<br> Name<br> Summary<br> With<br> StartDate<br> EndDate<br> IsCurrent | String<br> String<br> String<br> Array of Objects<br> String<br> String<br> String | <With> Object:<br> Id<br> Name | <br> String<br> String |  |  |  | TRUE |
| **Games:** User's games (imported from Renren, Facebook, Vkontakte) | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Family:** List of user's family members information | Array of Objects | Id<br> Name<br> Relationship | String<br> String<br> String |  |  |  |  |  | TRUE |
| **TeleVisionShow:** User's TV shows (imported from Facebook and Vkontakte) | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **MutualFriends:** User's mutual friends information (imported from Facebook) | Array of Objects | Id<br> Name<br> FirstName<br> LastName<br> Birthday<br> Hometown<br> Link<br> Gender | String<br> String<br> String<br> String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Movies:** User's movies | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Books:** User's books | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **AgeRange:** User's age range | Object | Min<br> Max | Int<br> Int |  |  |  |  |  | TRUE |
| **PublicRepository:** User's public repository (imported from GitHub) | String |  |  |  |  |  |  |  | TRUE |
| **Hireable:** User's hirable status (imported from GitHub) | Boolean |  |  |  |  |  |  |  | TRUE |
| **RepositoryUrl:** User's repository URL (imported from GitHub) | String |  |  |  |  |  |  |  | TRUE |
| **Age:** User's age | String |  |  |  |  |  |  |  | TRUE |
| **Patents:** User's patents information | Array of Objects | Id <br> Title <br> Date | String<br> String<br> String |  |  |  |  |  | TRUE |
| **FavoriteThings:** User's favorite things | Array of Objects | Id <br> Name <br> Type | String<br> String<br> String |  |  |  |  |  | TRUE |
| **ProfessionalHeadline:** User's professional headline | String |  |  |  |  |  |  |  | TRUE |
| **ProviderAccessCredential:** Credential to access the social provider (API?) | Object | AccessToken<br> TokenSecret | String<br> String |  |  |  |  |  | TRUE |
| **RelatedProfileViews:** List of user's related profile views | Array of Objects | Id <br> FirstName<br>  LastName | String<br> String<br> String |  |  |  |  |  | TRUE |
| **KloutScore:** User’s KloutScore details | Object | KloutId<br> Score | String<br> double |  |  |  |  |  | TRUE |
| **LRUserID:** User’s LRUserID details | String |  |  |  |  |  |  |  | TRUE |
| **PlacesLived:** Places that the user has lived in (imported from Google+) | Array of Objects | Name<br> IsPrimary | String<br> Boolean |  |  |  |  |  | TRUE |
| **Publications:** List of user's publications | Array of Objects | Id<br> Title<br> Publisher<br> Authors<br> Date<br> Url<br> Summary | String<br> String<br> String<br> Array of Objects<br> String<br> String<br> String | <Authors> Object:<br> Id<br> Name | <br> String<br> String |  |  |  | TRUE |
| **JobBookmarks:** List of user's job bookmarks | Array of Objects | IsApplied<br> ApplyTimestamp<br> IsSaved<br> SavedTimestamp<br> Job | Boolean<br> String<br> Boolean<br> String<br> Object | <Job> Object:<br> Active<br> Id<br> DescriptionSnippet<br> Compony<br> Position <br> PostingTimestamp | <br> Boolean<br> String<br> String <br> Object<br> Object<br> String | <Compony> Object:<br> Id<br> Name <br> <Position> Object:<br> Title | <br> String<br> String<br> <br> String |  | TRUE |
| **Suggestions:** List of user's company/industry/people/news source to follow suggestions | Object | CompaniestoFollow<br> IndustriestoFollow<br> NewssourcetoFollow<br> PeopletoFollow | Array of Objects<br> Array of Objects<br> Array of Objects<br> Array of Objects | Objects:<br> Id<br> Name | <br> String<br> String |  |  |  | TRUE |
| **Badges:** List of user's badges | Array of Objects | BadgeId<br> Name<br> BadgeMessage<br> Description<br> ImageUrl | String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **MemberUrlResources:** User’s Member Url Resources details | Array of Objects | Url<br> UrlName | String<br> String |  |  |  |  |  | TRUE |
| **TotalPrivateRepository:** Total number of user's repositories | Int |  |  |  |  |  |  |  | TRUE |
| **Currency:** User's local currency | String |  |  |  |  |  |  |  | TRUE |
| **StarredUrl:** User's starred URL | String |  |  |  |  |  |  |  | TRUE |
| **GistsUrl:** User's Gist URL | String |  |  |  |  |  |  |  | TRUE |
| **PublicGists:** Number of user's public Gists | Int |  |  |  |  |  |  |  | TRUE |
| **PrivateGists:** Number of user's private Gists | Int |  |  |  |  |  |  |  | TRUE |
| **Subscription:** User's GitHub subscription plan | Object | Name<br> Space<br> PrivateRepos<br> Collaborators | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| **Company:** User's company information | String |  |  |  |  |  |  |  | TRUE |
| **GravatarImageUrl:** User's Gravatar Image URL | String |  |  |  |  |  |  |  | TRUE |
| **ProfileImageUrls:** List of user's profile image URLs | Key-value pairs of <string, string> |  |  |  |  |  |  |  | TRUE |
| **WebProfiles:** List of user's web profiles | Key-value pairs of <string, string> |  |  |  |  |  |  |  | TRUE |
| **PinsCount:** Number of user's pins count (Pinterest). | Int |  |  |  |  |  |  |  | FALSE  |
| **BoardsCount:** Number of user's boards count (Pinterest) | Int |  |  |  |  |  |  |  | FALSE |
| **LikesCount:** Number of user's likes count (Pinterest) | Int |  |  |  |  |  |  |  | FALSE |
| **SignupDate:** The date that the user signed up for LoginRadius account (same as CreatedDate) | DateTime |  |  |  |  |  |  |  | FALSE |
| **LastLoginDate:** Date of the last time user logs in | DateTime |  |  |  |  |  |  |  | FALSE |
| **CustomFields:** List of custom field values that LoginRadius collects and the user's information on these custom fields. | Key-value pairs of <string, string> |  |  |  |  |  |  |  | TRUE |
| **LastPasswordChangeDate:** Date of the last time the user changes their password | DateTime |  |  |  |  |  |  |  | FALSE |
| **PasswordExpirationDate:** Date that the password will expire and the user will have to reset their password to access the account. | DateTime |  |  |  |  |  |  |  | FALSE |
| **LastPasswordChangeToken:** The last password reset token that has been used. | String |  |  |  |  |  |  |  | FALSE |
| **EmailVerified:** Indicate whether the user's email has been verified by LoginRadius | Boolean |  |  |  |  |  |  |  | TRUE |
| **IsActive:** Indicate the account status. An account may become "inactive" when it get suspended by Risk Based Auth | Boolean |  |  |  |  |  |  |  | TRUE |
| **IsDeleted:** Indicate whether the account is deleted | Boolean |  |  |  |  |  |  |  | TRUE |
| **IsEmailSubscribed:** User’s IsEmailSubscribed details | Boolean |  |  |  |  |  |  | (1,0, true, false) | TRUE |
| **UserName:** User's username | String |  |  |  |  |  |  |  | TRUE |
| **NoOfLogins:** Count the number of times the user has logged in | Int |  |  |  |  |  |  |  | FALSE |
| **PreviousUids:** List of user's previous Uids. | Array of String |  |  |  |  |  |  |  | FALSE |
| **PhoneId:** User's phone number that is used as an ID for phone login | String |  |  |  |  |  |  | We use Twilio Lookup API to verify the validity of phone number strings. Twilio in turns recommend E.164 format as the standard format for phone numbers. Reference: https://support.twilio.com/hc/en-us/articles/223183008-Formatting-International-Phone-Numbers | TRUE  |
| **PhoneIdVerified:** Indicate whether the PhoneId has been verified by LoginRadius | Boolean |  |  |  |  |  |  |  | TRUE |
| **Roles:** User's assigned roles | Array of String |  |  |  |  |  |  |  | FALSE |
| **ExternalUserLoginId:** User's external user login id | String |  |  |  |  |  |  |  | FALSE |
| **RegistrationProvider:** It provides information on how the consumer profile is registered. | String |  |  |  |  |  |  | Instantiated to be the same as Provider | FALSE |
| **IsLoginLocked:** Indicate whether login is locked (by Risk Based Auth or by Brute Force Lockout) | Boolean |  |  |  |  |  |  |  | FALSE |
| **LastLoginLocation:** LastLoginLocation data are being updated from the user IP address. For this updation, LR uses MaxMind database for fetching city and country details from the IP. | String |  |  |  |  |  |  |  | FALSE |
| **RegistrationSource:** It gets populated with the source URL from where the profile has been registered. If you want to add a custom Registration Source while creating the user, refer to [this section](/api/v2/customer-identity-api/advanced-api-usage/#refererheader9). | String |  |  |  |  |  |  |  | FALSE |
| **IsCustomUid:** This field shows whether a consumer is created using a custom UID or with a LoginRadius system-generated UID. By default, its value is **false**, and when the consumer is created using custom UID its value will be set as **True**. | Boolean |  |  |  |  |  |  |  | FALSE |
| **UnverifiedEmail:** List of user's emails that are currently unverified | Array of Objects | Type<br> Value | String<br> String |  |  |  |  |  | FALSE |
| **ExternalIds:** A set of key value pairs to store external IDs that the user may have. The stored data is interpreted according to each customer's implementation | Array of Objects | SourceId<br> Source | String<br> String |  |  |  |  |  | FALSE |
| **IsRequiredFieldsFilledOnce:** Is True if the profile is registered in the LoginRadius database (?) | Boolean |  |  |  |  |  |  |  | FALSE |
| **IsSecurePassword:** Indicate whether a password is secure | Boolean |  |  |  |  |  |  |  | FALSE |
| **PrivacyPolicy:** The current privacy policy version that the user opted into | Object | Version<br> AcceptSource<br> AcceptDateTime | String<br> String<br> DateTime |  |  |  |  |  | FALSE |
