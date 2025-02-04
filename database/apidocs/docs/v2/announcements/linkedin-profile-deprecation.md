
# LinkedIn Profile Deprecation


LinkedIn will be deprecating the use of its v1 APIs and requires all developers to migrate to its v2 APIs and OAuth 2.0 by March 1, 2019. These changes may impact your current LoginRadius implementations. The following documents provide more detail on the upcoming deprecation: 

## LinkedIn API Migration
https://engineering.linkedin.com/blog/2018/12/developer-program-updates 

LinkedIn deprecation of its v1 APIs will occur on March 1, 2019. As a result, developers must migrate to Version 2.0 of LinkedIn’s APIs and OAuth 2.0. 

As a result of the depreciation, this may affect your LoginRadius implementation if you are leveraging the following API:

- **User Profile API:** 

https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/user-profile

The following fields will no longer be available from your LinkedIn Profiles:

| Deprecated Fields: |
 |---|
| Friend Count |
| Suggestions |
| Recommendations Received |
| Related Profile Views |
| Member Url Resources |
| No Recommenders |
| Interests |

You may need to go through an additional review process through LinkedIn to get all other data points.

If you are leveraging the above APIs or data fields, we recommend that you prepare for the changes to these services. If you have any questions about the above migration or their impact on your workflows, please reach out to [LoginRadius support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) for more information or assistance. 
