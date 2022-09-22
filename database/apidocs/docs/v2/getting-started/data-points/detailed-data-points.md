#Profile Data Points

This document provides a complete hierarchy of profile data points in addition to Type, Constraint, and Editability details.

> **Disclaimer:**<br>
Provider-specific data points are subject to change and vary with provider. Data points available for various providers can be found [here](https://www.loginradius.com/datapoints/).

| Field Name | Type    | 1st level Object Field | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| 2nd level Object Field | Type | 3rd level Object Field | Type | Constraints | Editable via API |
|----------------------------|-------------------------------------|---------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------|---------------------------------------------------------------------|----------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------|
| UID | String |  |  |  |  |  |  | Generated using .Net Guid.NewGuid(), stripped of all non-alphanumeric characters and stringified.A Guid itself is a 128-bit integer: https://docs.microsoft.com/en-us/dotnet/api/system.guid remarked to have "a very low probability of being duplicated," and can be used as a global unique id to any system that requires one.  | FALSE |
| ID | String |  |  |  |  |  |  | Generated using .Net Guid.NewGuid(), stripped of all non-alphanumeric characters and stringified.Note that this value and Uid are both generated using Guid and have the same format but they have different values | FALSE |
| Password | String |  |  |  |  |  |  | Current hashed password  | FALSE |
| PIN | Object | Skipped<br> PIN<br> LastPINChangeDate<br> SkippedDate | Boolean<br> String<br> DateTime<br> DateTime |  |  |  |  |  | FALSE |
| Provider | String |  |  |  |  |  |  |  | FALSE |
| Prefix | String |  |  |  |  |  |  |  | TRUE |
| Suffix | String |  |  |  |  |  |  |  | TRUE |
| FirstName | String |  |  |  |  |  |  |  | TRUE |
| MiddleName | String |  |  |  |  |  |  |  | TRUE |
| LastName | String |  |  |  |  |  |  |  | TRUE |
| FullName | String |  |  |  |  |  |  | Aggregated( FirstName + LastName) | FALSE |
| NickName | String |  |  |  |  |  |  |  | TRUE |
| ProfileName | String |  |  |  |  |  |  |  | TRUE |
| BirthDate | String |  |  |  |  |  |  | "MM-dd-yyyy", "MM/dd/yyyy", "M-d-yyyy", "M/d/yyyy" | TRUE |
| Gender | String |  |  |  |  |  |  | male, female, other, unknown, m, f, o, u, 1, 0 | TRUE |
| Website | String |  |  |  |  |  |  |  | TRUE |
| Email | Array of Objects | Type<br> Value | String<br> String |  |  |  |  | RFC compliant Email, required | TRUE |
| Country | Object | Code<br> Name | String<br> String |  |  |  |  | Aggregated(Code auto generate based on country name) | TRUE |
| ThumbnailImageUrl | String |  |  |  |  |  |  |  | TRUE |
| ImageUrl | String |  |  |  |  |  |  |  | TRUE |
| Favicon | String |  |  |  |  |  |  |  | TRUE |
| ProfileUrl | String |  |  |  |  |  |  |  | TRUE |
| HomeTown | String |  |  |  |  |  |  |  | TRUE |
| State | String |  |  |  |  |  |  |  | TRUE |
| City | String |  |  |  |  |  |  |  | TRUE |
| Industry | String |  |  |  |  |  |  |  | TRUE |
| About | String |  |  |  |  |  |  |  | TRUE |
| TimeZone | String |  |  |  |  |  |  |  | TRUE |
| LocalLanguage | String |  |  |  |  |  |  |  | TRUE |
| CoverPhoto | String |  |  |  |  |  |  |  | TRUE |
| TagLine | String |  |  |  |  |  |  |  | TRUE |
| Language | String |  |  |  |  |  |  |  | FALSE |
| Verified | String |  |  |  |  |  |  |  | FALSE |
| **UpdatedTime:**This field is updated when the latest profile update time is imported from the social provider. Also, in case if you are not using the social login this field value will be Null.| String |  |  |  |  |  |  |  | FALSE |
| Positions | Array of Objects | Position<br> Summary<br> StartDate<br> EndDate<br> IsCurrent<br> Company<br> Location | String<br> String<br> String<br> String<br> String<br> Object<br> String | <Company> Object:<br> Name<br> Type<br> Industry | <br> String<br> String<br> String |  |  |  | TRUE |
| Educations | Array of Objects | School<br> year<br> type<br> notes<br> activities<br> degree<br> fieldofstudy<br> StartDate<br> EndDate | String<br> String<br> String<br> String<br> String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| PhoneNumbers | Array of Objects | PhoneType<br> PhoneNumber | String<br> String |  |  |  |  | Prefix country code required| TRUE |
| IMAccounts | Array of Objects | AccountType<br> AccountName | String<br> String |  |  |  |  |  | TRUE |
| Addresses | Array of Objects | Type<br> Address1<br> Address2<br> City<br> State<br> PostalCode<br> Region<br> Country | String <br> String <br> String <br> String <br> String <br> String <br> String <br> String |  |  |  |  |  | TRUE |
| MainAddress | String |  |  |  |  |  |  |  | TRUE |
| Created | String |  |  |  |  |  |  |  | FALSE |
| CreatedDate | DateTime |  |  |  |  |  |  | In UTC format | FALSE |
| **ModifiedDate:**This field in the user profile gets updated whenever login action is performed and for any modifications/updations made to the profile. | DateTime |  |  |  |  |  |  | In UTC format | FALSE |
| **ProfileModifiedDate:**This field in the user profile gets updated with the timestamp for the last modifications/updations in the profile. | DateTime |  |  |  |  |  |  | In UTC format | FALSE |
| LocalCity | String |  |  |  |  |  |  |  | TRUE |
| ProfileCity | String |  |  |  |  |  |  |  | TRUE |
| LocalCountry | String |  |  |  |  |  |  |  | TRUE |
| ProfileCountry | String |  |  |  |  |  |  |  | TRUE |
| FirstLogin | Boolean |  |  |  |  |  |  |  | TRUE |
| IsProtected | Boolean |  |  |  |  |  |  |  | TRUE |
| RelationshipStatus | String |  |  |  |  |  |  |  | TRUE |
| Quota | String |  |  |  |  |  |  |  | TRUE |
| Quote | String |  |  |  |  |  |  |  | TRUE |
| InterestedIn | Array of String |  |  |  |  |  |  |  | TRUE |
| Interests | Array of Objects | InterestedType<br> InterestedName | String<br> String |  |  |  |  |  | TRUE |
| Religion | String |  |  |  |  |  |  |  | TRUE |
| Political | String |  |  |  |  |  |  |  | TRUE |
| Sports | Array of Objects | Id <br> Name | String<br> String |  |  |  |  |  | TRUE |
| InspirationalPeople | Array of Objects | Id <br> Name | String<br> String |  |  |  |  |  | TRUE |
| HttpsImageUrl | String |  |  |  |  |  |  |  | TRUE |
| FollowersCount | Int |  |  |  |  |  |  |  | TRUE |
| FriendsCount | Int |  |  |  |  |  |  |  | TRUE |
| IsGeoEnabled | String |  |  |  |  |  |  |  | TRUE |
| TotalStatusesCount | Int |  |  |  |  |  |  |  | TRUE |
| Associations | String |  |  |  |  |  |  |  | TRUE |
| NumRecommenders | Int |  |  |  |  |  |  |  | TRUE |
| Honors | String |  |  |  |  |  |  |  | TRUE |
| Awards | Array of Objects | Id <br> Name <br> Issuer | String<br> String<br> String |  |  |  |  |  | TRUE |
| Skills | Array of Objects | Id <br> Name | String<br> String |  |  |  |  |  | TRUE |
| CurrentStatus | Array of Objects | Id <br> Text <br> Source <br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Certifications | Array of Objects | Id <br> Name <br> Authority <br> Number <br> StartDate <br> EndDate | String<br> String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Courses | Array of Objects | Id <br> Name <br> Number | String<br> String<br> String |  |  |  |  |  | TRUE |
| Volunteer | Array of Objects | Id<br> Role<br> Organization<br> Cause | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| RecommendationsReceived | Array of Objects | Id<br> RecommendationType<br> RecommendationText<br> Recommender | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Languages | Array of Objects | Id<br> Name<br> Proficiency | String<br> String<br> String |  |  |  |  |  | TRUE |
| Projects | Array of Objects | Id<br> Name<br> Summary<br> With<br> StartDate<br> EndDate<br> IsCurrent | String<br> String<br> String<br> Array of Objects<br> String<br> String<br> String | <With> Object:<br> Id<br> Name | <br> String<br> String |  |  |  | TRUE |
| Games | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Family | Array of Objects | Id<br> Name<br> Relationship | String<br> String<br> String |  |  |  |  |  | TRUE |
| TeleVisionShow | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| MutualFriends | Array of Objects | Id<br> Name<br> FirstName<br> LastName<br> Birthday<br> Hometown<br> Link<br> Gender | String<br> String<br> String<br> String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Movies | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Books | Array of Objects | Id<br> Name<br> Category<br> CreatedDate | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| AgeRange | Object | Min<br> Max | Int<br> Int |  |  |  |  |  | TRUE |
| PublicRepository | String |  |  |  |  |  |  |  | TRUE |
| Hireable | Boolean |  |  |  |  |  |  |  | TRUE |
| RepositoryUrl | String |  |  |  |  |  |  |  | TRUE |
| Age | String |  |  |  |  |  |  |  | TRUE |
| Patents | Array of Objects | Id <br> Title <br> Date | String<br> String<br> String |  |  |  |  |  | TRUE |
| FavoriteThings | Array of Objects | Id <br> Name <br> Type | String<br> String<br> String |  |  |  |  |  | TRUE |
| ProfessionalHeadline | String |  |  |  |  |  |  |  | TRUE |
| ProviderAccessCredential | Object | AccessToken<br> TokenSecret | String<br> String |  |  |  |  |  | TRUE |
| RelatedProfileViews | Array of Objects | Id <br> FirstName<br>  LastName | String<br> String<br> String |  |  |  |  |  | TRUE |
| KloutScore | Object | KloutId<br> Score | String<br> double |  |  |  |  |  | TRUE |
| LRUserID | String |  |  |  |  |  |  |  | TRUE |
| PlacesLived | Array of Objects | Name<br> IsPrimary | String<br> Boolean |  |  |  |  |  | TRUE |
| Publications | Array of Objects | Id<br> Title<br> Publisher<br> Authors<br> Date<br> Url<br> Summary | String<br> String<br> String<br> Array of Objects<br> String<br> String<br> String | <Authors> Object:<br> Id<br> Name | <br> String<br> String |  |  |  | TRUE |
| JobBookmarks | Array of Objects | IsApplied<br> ApplyTimestamp<br> IsSaved<br> SavedTimestamp<br> Job | Boolean<br> String<br> Boolean<br> String<br> Object | <Job> Object:<br> Active<br> Id<br> DescriptionSnippet<br> Compony<br> Position <br> PostingTimestamp | <br> Boolean<br> String<br> String <br> Object<br> Object<br> String | <Compony> Object:<br> Id<br> Name <br> <Position> Object:<br> Title | <br> String<br> String<br> <br> String |  | TRUE |
| Suggestions | Object | CompaniestoFollow<br> IndustriestoFollow<br> NewssourcetoFollow<br> PeopletoFollow | Array of Objects<br> Array of Objects<br> Array of Objects<br> Array of Objects | Objects:<br> Id<br> Name | <br> String<br> String |  |  |  | TRUE |
| Badges | Array of Objects | BadgeId<br> Name<br> BadgeMessage<br> Description<br> ImageUrl | String<br> String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| MemberUrlResources | Array of Objects | Url<br> UrlName | String<br> String |  |  |  |  |  | TRUE |
| TotalPrivateRepository | Int |  |  |  |  |  |  |  | TRUE |
| Currency | String |  |  |  |  |  |  |  | TRUE |
| StarredUrl | String |  |  |  |  |  |  |  | TRUE |
| GistsUrl | String |  |  |  |  |  |  |  | TRUE |
| PublicGists | Int |  |  |  |  |  |  |  | TRUE |
| PrivateGists | Int |  |  |  |  |  |  |  | TRUE |
| Subscription | Object | Name<br> Space<br> PrivateRepos<br> Collaborators | String<br> String<br> String<br> String |  |  |  |  |  | TRUE |
| Company | String |  |  |  |  |  |  |  | TRUE |
| GravatarImageUrl | String |  |  |  |  |  |  |  | TRUE |
| ProfileImageUrls | Key-value pairs of <string, string> |  |  |  |  |  |  |  | TRUE |
| WebProfiles | Key-value pairs of <string, string> |  |  |  |  |  |  |  | TRUE |
| PinsCount | Int |  |  |  |  |  |  |  | FALSE  |
| BoardsCount | Int |  |  |  |  |  |  |  | FALSE |
| LikesCount | Int |  |  |  |  |  |  |  | FALSE |
| SignupDate | DateTime |  |  |  |  |  |  |  | FALSE |
| LastLoginDate | DateTime |  |  |  |  |  |  |  | FALSE |
| CustomFields | Key-value pairs of <string, string> |  |  |  |  |  |  |  | TRUE |
| LastPasswordChangeDate | DateTime |  |  |  |  |  |  |  | FALSE |
| PasswordExpirationDate | DateTime |  |  |  |  |  |  |  | FALSE |
| LastPasswordChangeToken | String |  |  |  |  |  |  |  | FALSE |
| EmailVerified | Boolean |  |  |  |  |  |  |  | TRUE |
| IsActive | Boolean |  |  |  |  |  |  |  | TRUE |
| IsDeleted | Boolean |  |  |  |  |  |  |  | TRUE |
| IsEmailSubscribed | Boolean |  |  |  |  |  |  | (1,0, true, false) | TRUE |
| UserName | String |  |  |  |  |  |  |  | TRUE |
| NoOfLogins | Int |  |  |  |  |  |  |  | FALSE |
| PreviousUids | Array of String |  |  |  |  |  |  |  | FALSE |
| PhoneId | String |  |  |  |  |  |  | We use Twilio Lookup API to verify the validity of phone number strings. Twilio in turns recommend E.164 format as the standard format for phone numbers. Reference: https://support.twilio.com/hc/en-us/articles/223183008-Formatting-International-Phone-Numbers | TRUE  |
| PhoneIdVerified | Boolean |  |  |  |  |  |  |  | TRUE |
| Roles | Array of String |  |  |  |  |  |  |  | FALSE |
| ExternalUserLoginId | String |  |  |  |  |  |  |  | FALSE |
| **RegistrationProvider:**It provides information on how the consumer profile is registered. | String |  |  |  |  |  |  | Instantiated to be the same as Provider | FALSE |
| IsLoginLocked | Boolean |  |  |  |  |  |  |  | FALSE |
| LastLoginLocation | String |  |  |  |  |  |  |  | FALSE |
| **RegistrationSource:**It gets populated with the source URL from where the profile has been registered. If you want to add a custom Registration Source while creating the user, refer to [this section](/api/v2/customer-identity-api/advanced-api-usage/#refererheader9). | String |  |  |  |  |  |  |  | FALSE |
| **IsCustomUid:**This field shows whether a consumer is created using a custom UID or with a LoginRadius system-generated UID. By default, its value is **false**, and when the consumer is created using custom UID its value will be set as **True**. | Boolean |  |  |  |  |  |  |  | FALSE |
| UnverifiedEmail | Array of Objects | Type<br> Value | String<br> String |  |  |  |  |  | FALSE |
| ExternalIds | Array of Objects | SourceId<br> Source | String<br> String |  |  |  |  |  | FALSE |
| IsRequiredFieldsFilledOnce | Boolean |  |  |  |  |  |  |  | FALSE |
| IsSecurePassword | Boolean |  |  |  |  |  |  |  | FALSE |
| PrivacyPolicy | Object | Version<br> AcceptSource<br> AcceptDateTime | String<br> String<br> DateTime |  |  |  |  |  | FALSE |
