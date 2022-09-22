# LinkedIn Partnership Application

---

LinkedIn released major platform updates on the 12th of May 2015. With this release, LinkedIn brought restrictions in the usage of its platform. It is mandatory to get the approval of your LinkedIn App from LinkedIn. Currently, the following APIs are accessible without approval.

1. Profile API (with basic profile)
1. Share API https://www.linkedin.com/developers/apps
1. Companies API (Not applicable for LoginRadius customers, because LoginRadius doesn't consume this API)
   You can read details about the changes on LinkedIn:

https://developer.linkedin.com/blog/posts/2015/developer-program-changes

As a LoginRadius customer using LinkedIn as a Social Log in provider and looking to ask for advanced permissions from your customer, LinkedIn will not allow advanced permissions to be requested without approval for 'Apply with LinkedIn'. Social Log in for LinkedIn will not be able to retrieve advanced permissions and instead only provide the basic profile.

We have created a full checklist and detailed process that will guide you through the process of getting your app approved.

##Checklist

1. Set proper permissions (scope) on LinkedIn App settings Admin-console
1. Get approval for your LinkedIn App if you require advanced API permissions
1. Update permissions (scope) on LinkedIn App settings admin-console if the app has been approved
   Let's go over this step-by-step:

### Set minimum scopes on LinkedIn APP

Go to https://www.linkedin.com/developers/apps
Log in with your LinkedIn developers account from which you created your LinkedIn App
Click on your App name, the App Authentication page will be opened
![enter image description here](https://apidocs.lrcontent.com/images/3_2951258cfba6aed60f3.53957594.png)
In "Default Application Permissions" check 'r_basicprofile' and 'r_emailaddress'.
![enter image description here](https://apidocs.lrcontent.com/images/4_198558cfba7faf6740.84510858.png)
If you are using LoginRadius 'Post Message' API than check 'w_share'.
Click on the Update button.
![enter image description here](https://apidocs.lrcontent.com/images/5_635058cfba91088703.84682316.png)

### Get LinkedIn App approved for advanced API permissions

If you are using LoginRadius contact API or require Extended user profile (r_fullprofile and r_contactinfo) beyond basic profile data then you will need to get your app approved by LinkedIn. To get your app approved, follow the following steps:

Open https://developer.linkedin.com/content/developer/global/en_us/index/partner-programs/apply

The first field should be a drop-down asking "What are you requesting access to?" clicking the drop-down should provide different types of partnerships available with LinkedIn. a good choice would
be "Applicant Tracking System Partnership" if you're looking to use "Apply with LinkedIn" on your site.
make sure to fill in all required fields and options if applicable. Name, Email Address, Company Name, and any fields that are required in Application Information.

![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-2017-07-04-12-03-35_28371595be6b2d390f5.43500427.png)

Make sure to enter valid information about the application so LinkedIn can approve your desired app workflows.
LinkedIn will respond back to you within 15 business days.

### Update permissions (scope) on LinkedIn App settings admin-console if your app gets approved

If you get approval to access the Advanced API features of LinkedIn then this step is applicable to you. Follow these steps to the update scopes:

Open this URL https://www.linkedin.com/developers/apps
Log in with your LinkedIn account from which you created your LinkedIn App
![enter image description here](https://apidocs.lrcontent.com/images/2-1_1654958cfbb0388e351.22992483.png)
Click on your App name, the App Authentication page will be opened
![enter image description here](https://apidocs.lrcontent.com/images/3-1_791258cfbb1893aa80.16986954.png)
In "Default Application Permissions" Check the permissions which are approved by LinkedIn for your app.
![enter image description here](https://apidocs.lrcontent.com/images/4-1_2325558cfbb2d3ccb71.83592628.png)
Click on the Update button
![enter image description here](https://apidocs.lrcontent.com/images/5-1_2478958cfbb448f3161.19319414.png)
