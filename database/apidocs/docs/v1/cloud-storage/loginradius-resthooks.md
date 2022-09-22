LoginRadius REST Hooks
===
---
Trigger and push profile data to any web endpoint though REST Hooks

##Why enable LoginRadius REST Hooks?

If you need to send the user's profile data to a third party application outside of data syncing that happens as part of the regular login and registration flow on your website or mobile app, you can use LoginRadius REST Hooks to push the data. This process will initiate and push the data to your desired endpoint after any login event such as login, registration, etc.

<br>
>**Learn About REST Hooks**<br>
Before reading further, make sure you understand the concept behind REST Hooks. You can learn more about it at resthooks.org.

<br>
Here is a standard REST Hook usage flow with LoginRadius' platform

![enter image description here](https://apidocs.lrcontent.com/images/ohTGJHtuRaSLIHiuWwO4_LoginRadius-RestHooks---New-Page-1_2060158a6a3abefcfa6.52698151.png "")
##1. Test REST Hook Settings
To test REST Hook settings on your LoginRadius site, use [this API](/api/v1/cloud-directory/rest-hooks-settings)

##2. Get Fields List
To get the list of profile fields for REST Hooks on your LoginRadius site, use [this API](/api/v1/cloud-directory/field-list)

##3. Subscribe to REST Hook
To subscribe to REST Hooks on your LoginRadius site, use [this API](/api/v1/cloud-directory/subscribe-rest-hooks),

<br>
>**For Better Security**<br>
We strongly recommend passing a dynamic URL as the target URL, which means generating a unique string and including it in the URL as part of the query string. After receiving the response on your target URL, validate the unique string contained in the response against the unique string passed in the request. Doing so will prevent your target URL from getting spam and fake user data.
Also make sure to unsubscribe and re-subscribe REST Hooks regularly for security purposes.

##4. Unsubscribe REST Hooks
To unsubscribe REST Hooks on your LoginRadius site, use [this API](/api/v1/cloud-directory/unsubscribe-rest-hooks)

##5. Handle REST Hook Requests
LoginRadius triggers REST Hooks after a login or registration event on your site and sends the response to your target URL which you have specified during the REST Hook subscription.

A few pointers about request type and body:

- The request type is POST
- The request body is JSON. See below for a sample JSON structure:
<br><br>
> **Target URL end with '/'**<br>
Your target URL must be end with '/', this a restriction from LoginRadius side.


<br>
**JSON**
```

 {
        "RelationshipStatus": "RelationshipStatus43eb055c-9436-457b-8c1a-439d72488b2d",
        "ProfessionalHeadline": "ProfessionalHeadline6ed5603c-0cce-4455-a4e7-4d77becc1ed9",
        "Political": "Political76b9e3af-d9fb-4600-9bc1-f262be8be096",
        "Religion": "Religionfaf7a92d-8b2e-4791-980e-d7221101e63b",
        "LRUserID": "LRUserIDbf6409f7-be09-4c67-8ecf-39be175c68b9",
        "CoverPhoto": "CoverPhotob81320a6-2a87-4941-9e13-4ef82bb8af5a",
        "FollowersCount": 17,
        "IsGeoEnabled": "IsGeoEnabled6e0d7bc9-b458-443a-8ef7-3cfbbd170627",
        "Company": "Company7dbe28de-7066-46a3-8828-f417b1a89d94",
        "ThumbnailImageUrl": "ThumbnailImageUrl4038408c-d951-437e-906c-61aede8fff3b",
        "GistsUrl": "GistsUrl6abd6c7d-960d-40df-aac4-1851fd0216de",
        "HomeTown": "HomeTownb84f6026-8e2d-4217-b949-ad0ef62c5146",
        "PublicRepository": "PublicRepository160e1823-7e1d-41ce-8c3d-c47c67f6699c",
        "IsDeleted": true,
        "Volunteer": "Volunteer5684ba0c-6ad5-4052-8903-4045b0c22a86",
        "TotalPrivateRepository": 144,
        "Industry": "Industry8c1e917f-4f58-48a9-96d6-381163541981",
        "TotalStatusesCount": 96,
        "Uid": "Uidba9f936f-2b15-428f-a564-6cc9b27d8113",
        "IMAccounts": "IMAccounts4ab72160-7d7f-427d-b5ca-2f49123fc9e4",
        "Suffix": "Suffix579c9641-3bd5-46ab-9f11-151b7202ad31",
        "Favicon": "Favicon71a925ee-2b3c-41ca-8a5f-e854eaa5b015",
        "LocalLanguage": "LocalLanguage3a4663e2-be44-4fcb-9c04-61b057eac97f",
        "Hireable": false,
        "InspirationalPeople": "InspirationalPeople0bc57368-d2d1-4bca-b6b6-91221e321df3",
        "Badges": "Badges4dd394ea-42f2-46f6-94f3-b6ac67c56a74",
        "JobBookmarks": "JobBookmarks06e4da3a-dd51-4381-b543-c56fe4763a93",
        "UpdatedTime": "UpdatedTimecab7ed1d-5c73-4742-98a7-2f49e8119612",
        "ProfileCity": "City5470c12e-7cb1-4bba-893f-fa87e888ff97",
        "Sports": "Sportsb661e8d2-1ded-47fd-be00-c6411172a4a6",
        "ProfileUrl": "ProfileUrldbd7680f-40e9-4c56-b903-64f8015b9427",
        "State": "State1cbeca91-549c-4182-b735-f5eb6ca37baf",
        "Email": "Emaile88a19e0-658b-46f3-afd6-74e7b7994f1f",
        "Associations": "Associations7091bab2-9345-4c0c-a3b2-59b1ed57e87f",
        "PhoneNumbers": "PhoneNumbers9df15089-74bb-4258-bad4-b5c314a8714c",
        "MiddleName": "MiddleName82af18fe-9015-4835-9cc0-ca5935b11189",
        "Gender": "Gender9bacaabf-a112-4c1e-80d0-044aeffd5c94",
        "MutualFriends": "MutualFriendse55cf53f-b64f-4f2d-9769-150c7e435d9d",
        "Projects": "Projectse58b6ae2-a452-4cd3-adea-c71ae3b2a409",
        "Subscription": {
                "Collaborators": "Collaborators0190d5d4-5ea8-4a34-8f6c-cef45db965b4",
                "PrivateRepos": "PrivateRepos36d5aaea-bc00-4f5d-b809-bf736f65b07c",
                "Name": "Namec7a0f83f-4a82-4a89-8896-f56ca7088bf8",
                "Space": "Spacebdfd73ae-3b63-4df8-9e25-3553793efda3"
        },
        "Website": "Website6dd9f2eb-c016-4ea2-8a43-e1461ee2115c",
        "MainAddress": "MainAddress0d2e028c-4831-4889-a047-08fd4d7c122a",
        "LocalCity": "LocalCity16a4f06e-df19-4dd4-9c78-91a2c249f4ec",
        "Created": "Created8d73c9f0-1db2-42b9-9d4b-82fe64120b5c",
        "Age": "Age32ca5209-5b94-41b3-affc-2dc1120c3a37",
        "HttpsImageUrl": "HttpsImageUrl2b07089c-2966-4bce-9441-39e5c3735565",
        "IsEmailSubscribed": false,
        "RepositoryUrl": "RepositoryUrlfc0bab5d-a147-47b7-8584-57dd6b2877dc",
        "IsProtected": true,
        "PlacesLived": "PlacesLivedf6c9dbed-5f5e-4102-adcf-d0be8d6bf994",
        "Currency": "Currency71b2e46c-9535-4282-a8a9-0ce1b4aaa2d6",
        "IsActive": false,
        "ProfileName": "ProfileName79daebcb-1eba-4bb2-afa0-6b3e01a58e02",
        "Honors": "Honorsa263511c-ee30-4ec7-a57d-2822b3f498e3",
        "Publications": "Publicationsfdda77f6-1145-4c9d-b0b0-3748a81aedd9",
        "Verified": "Verified399d62f6-0a5d-4ef0-8c4e-3d658602f1a6",
        "FirstName": "FirstName82544f21-5b06-45eb-9927-3526b4f7e9f0",
        "KloutScore": {
                "KloutId": "KloutId3ffddc46-83aa-4043-92fc-dc92c9023f29",
                "Score": 79
        },
        "LastName": "LastName78e35ecc-14e0-4bee-b47c-768ef675e00c",
        "ImageUrl": "ImageUrl0d693e16-137b-47d5-8512-adcca2e42c4f",
        "Languages": "Languages331974b0-0d25-4a92-8b63-ecf90402032b",
        "Provider": "Provideraf62229b-e0bd-475e-b1d3-1db0f5162f5f",
        "Interests": "Interests5eba7f77-f36f-4aff-85e3-3d3a81a2f04b",
        "NumRecommenders": 16,
        "ID": "IDfb3d4e41-dfae-4066-b7b1-5b98ab2813e3",
        "Awards": "Awardsc24156b0-110f-4003-b759-c35b200c1e9c",
        "PrivateGists": 99,
        "Certifications": "Certifications0c37f049-6d96-49db-9162-d22110daf1f0",
        "TeleVisionShow": "TeleVisionShowc434571a-3b09-49d4-8c7b-af996ef1a837",
        "Language": "LocalLanguage3a4663e2-be44-4fcb-9c04-61b057eac97f",
        "Positions": "Positions6d886991-160a-4824-9d74-f81071db1259",
        "Courses": "Courses28b192ec-ae9e-4ac7-87c4-fcaf2a01e1dc",
        "ProfileCountry": "Nameaaf34e6d-52a8-44d5-b994-8ba71e604360",
        "Family": "Familye910e7c7-e760-477f-9ac3-f965c43e4d9e",
        "TagLine": "TagLinea46ed176-46ba-476d-95f8-89819e036612",
        "Suggestions": "Suggestions5a1c1946-6004-4312-aca0-bfc4ff6b9860",
        "Prefix": "Prefix1ac243a4-5ee7-4f67-b20e-18490390af44",
        "Books": "Books2ea43974-f5ee-4ec6-9fa8-12a2c78f63bf",
        "CurrentStatus": "CurrentStatus58f10fd5-9532-4278-8e24-dbe492b075ae",
        "FullName": "FullNamebf34895d-48ed-4a71-b524-2735f5fc3f49",
        "City": "City5470c12e-7cb1-4bba-893f-fa87e888ff97",
        "RecommendationsReceived": "RecommendationsReceived4c6a3e28-2c61-474b-ac50-d444abb5e35d",
        "EmailVerified": true,
        "AgeRange": {
                "Max": 235,
                "Min": 241
        },
        "TimeZone": "TimeZonefaa6bbb3-8ace-4e92-aaac-fd20b5523a0c",
        "PublicGists": 184,
        "InterestedIn": "InterestedIn5a365420-1ef1-45d2-b20a-f70afb0ed3e1",
        "MemberUrlResources": "MemberUrlResources02059f0e-9e91-4aba-8f86-96f79c4edc73",
        "Quote": "Quote7a970599-9c77-45d6-98ff-5ff0c4a05294",
        "BirthDate": "BirthDate55f6acc3-5a8c-43cf-875d-cbad741757d9",
        "Educations": "Educations5aeeea0e-65b8-4659-98c2-05130f042065",
        "StarredUrl": "StarredUrl77a59ba9-6d15-452d-85f4-84c6368069ce",
        "RelatedProfileViews": "RelatedProfileViews8f14994b-9499-4cb0-b795-8b938480c229",
        "About": "Aboutf48a61aa-ce0d-4b4c-9026-1dfef4a39a09",
        "Skills": "Skills4525f471-6790-4a7e-b6c2-99947be45285",
        "Country": {
                "Code": "Codefcca250a-f448-4515-b146-0609f5a0f3fa",
                "Name": "Nameaaf34e6d-52a8-44d5-b994-8ba71e604360"
        },
        "Movies": "Movies5af67e32-6374-414c-83b6-2118a015f019",
        "Games": "Gamesfe6a917d-78e2-4c43-94e5-2f0a2cbff102",
        "FavoriteThings": "FavoriteThings1bb0b9af-2254-4418-b079-d2e0efc37192",
        "FriendsCount": 156,
        "NickName": "NickName54a4d261-30dd-4918-a0e7-28d9941c0697",
        "LocalCountry": "LocalCountry43f451f1-5c82-4e38-bee0-8aae322dea01",
        "Patents": "Patents481a8397-6b92-4f4a-bfaa-3a56e6bfe577",
        "Addresses": "Addresses70f544b8-8ca3-41a3-83f5-2335d5d74486"
}
```