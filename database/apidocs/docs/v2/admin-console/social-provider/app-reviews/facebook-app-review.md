# Facebook App Review Introduction

Many of the Social Providers review the app before you switch your app to Live mode. Facebook has defined a review process for the App. In the review process they make sure that you will be using their products (Facebook social provider) and data in an approved manner. 

In general, this process involves specifying the type of data your app will be requesting from your customers and describing how you will use that data. And, based on your submission, they may follow up and ask you to provide additional information.

This document covers the step by step guide to get successful app approval for your configured app from Facebook. For additional information refer to the Facebook developers console [guidelines page](https://developers.facebook.com/docs/facebook-login/review). You can read more about Facebook permissions [here](https://developers.facebook.com/docs/facebook-login/permissions/).

## Part 1: Gathering App Details

You need to gather few necessary details which will be required for submitting your App for review:

1. **Logo**: 1024 x 1024 high-resolution image for your app.
2. **Details about the usage of each Permission**: You need to provide brief details about why you require permission and how it is meant to be used.
3. **Video Walkthrough for each permission**: Prepare a Video Walkthrough for each permission that you seek, showing how the permission is used in the app.
4. **Privacy Policy**: An accessible website URL that hosts your privacy policy.
5. **Terms and service URL**: A valid terms and service URL.


## Part 2: Things you need to provide for Status and Review

- General instructions on what your app does.
- Individual notes on each of the additional requested permissions as detailed below.
- Individual video walkthroughs to replicate functionality for additional requested permissions as detailed below.
- A version of your iOS or Android app:
    - iOS Simulator Build or Apple Store ID listed in Settings.
    - APK file or Android Package Name listed in Settings.

## Part 3: Additional Requested Permissions

In this section, you can see the details of the additional permissions that you can request in your app to get the data accordingly.  Additional information on how these scopes correspond with LoginRadius data-points can be found here.

- **publish_actions** - Used when pushing data to Facebook through our API. Ex: Post status API.
- **read_stream** - Used for reading the posts in a person's feed.
- **user_events** - Used to retrieve a list of events that a user has subscribed to.
- **user_groups** - Used to retrieve a list of groups a user is a member of.
- **user_likes** - Used to access a list of all pages and objects that a user has liked.
- **user_videos** - Used to access the videos a user has uploaded or been tagged in.
- **user_photos** - Used to access the images a user has uploaded or been tagged in.

> **Note**: Facebook requires that you have accepted permissions to publish_actions as well when requesting the user_photos API.

- **user_tagged_places** - Used to access the places a user has been tagged in.
- **user_birthday** - Used to access the date and month of a user’s birthday, it may or may not include the year depending on the users' privacy settings.
- **user_age_range** - Used to obtain the user's age range.
- **user_hometown** - Used to access the user's hometown.
- **user_location** - Used to access the user's current city.
- **user_friends** - Used to get a list of the user's friends that have also connected via your Facebook app.
- **user_link** - The link to the user's Facebook profile.
- **user_gender** - The user's gender.
 
## Part 4: Submitting your App for Review

This section covers the required configurations that you need to perform in the Facebook developer portal to submit your app for review:

**Step 1**: To submit your App for review login to [Facebook developer portal](https://developers.facebook.com/) and from **My Apps** button in the top right corner of the page (as shown in the below screenshot), choose the app that you wish to submit. This will take you to the app Admin-console. 

![](https://apidocs.lrcontent.com/images/1_319665ebb2cb833e2c3.90099713.png)


**Step 2**: From the **Admin Console**, Select **Settings >Basic** from the left menu. Here add a 1024 x 1024 logo, valid policy URL, valid terms and service URL, and select one of the Business Use options (shown in the below screen).

![](https://apidocs.lrcontent.com/images/2_101385ebb2cc83e7647.37706824.png)

**Step 3**: For **Business Verification**, you need to verify your business also, click on the **Get Started** button as shown in the below screen.


![](https://apidocs.lrcontent.com/images/3_14835ebb2cd6bd6843.94551011.png)

**Step 4**: If you haven't connected your app to a Facebook Business Manager account, then you are required to Create a **Business Manager account**.

The following screen will appear:

![](https://apidocs.lrcontent.com/images/4_65265ebb2ce60a1a52.63540196.png)


**Step 5**: After creating the business manager account and clicking the verification links or buttons , it will take you to the Business Manager's **Business Settings > Business Info** tab. From there, navigate to the **Security Center** and click **Start Verification**.

The following screen displays:

![](https://apidocs.lrcontent.com/images/5_141485ebb2cf552a081.72957508.png)

> Note: If Facebook can locate your business details via their trusted 3rd party data sources, they will ask you to confirm your association with the business via email or phone. If they cannot locate your business details, you may need to submit additional documentation to complete the business verification process.



**Step 6**: For **Individual Verification**, go to the [Facebook developer portal](https://developers.facebook.com/)  and click on **My Apps** and select **Developer Settings** as shown in the screen below:

![](https://apidocs.lrcontent.com/images/6_266885ebb2d07c94ae7.52423745.png)

**Step 7**: Now, select the **Individual verification** tab as shown below and here you need to upload verified documents for individual verification. 

![](https://apidocs.lrcontent.com/images/7_142255ebb2d1a78ba46.49881797.png)


**Step 8**: After **Business** and **Individual verification**, go to **App Review** and select **Permissions and Features**. From here you can request the **Facebook permissions** that you want your app to have, click on **Request** to request any permissions. You can edit your App Review request by clicking on the **Edit Request** button. 

The following screen displays the **Edit Request** option:

![](https://apidocs.lrcontent.com/images/8_243845ebb2d29aea338.40549187.png)

> **Note**: Refer to the [Facebook Permissions](https://developers.facebook.com/docs/facebook-login/permissions/) document for all the Facebook permissions that you can choose from. 
Some permissions require business verification and/or additional contract signing.

**Step 9**: From here you can update your request and the following screen will appear:

![](https://apidocs.lrcontent.com/images/9_127955ebb2d3acb0c05.42677696.png)

**Step 10**: For completing the verifications click the **"→"** button and complete the form one by one. For example, Facebook permission here, you will need to submit a detailed description and a video walkthrough. Certain permissions may require more questions within the form. Click **Save** after completing the form. Repeat this step for each permission.

![](https://apidocs.lrcontent.com/images/10_318465ebb2d49685652.58404201.png)

**Step 11**: Now go to the **Complete App Verification** section on the same Request page. Click on **Provide Verification Details** as shown in the below screenshot.

![](https://apidocs.lrcontent.com/images/11_137025ebb2d58b87b75.71151774.png)

**Step 12**: Provide the required information here to Complete the **App Verification Details** form. 

![](https://apidocs.lrcontent.com/images/12_246905ebb2d6ba6cbe9.93767807.png)

**Step 13**: Click on the **Submit for Review** button to submit the app for review.
 
![](https://apidocs.lrcontent.com/images/13_159905ebb2d7ca229d2.34344081.png)

**Step 14**: Accept the **terms** and then click on the **Submit** button. You will be able to review your **App Review Status** at **App Review > Requests**.

![](https://apidocs.lrcontent.com/images/14_89575ebb2d91c73600.74260622.png)

## Part 5: Next Step

The following is the list of features you might want to add-on to the above implementation:

- [Advanced Social Data Points](/api/v2/admin-console/social-provider/advanced-social-data-points/)
- [Configure Social Data Settings](/api/v2/admin-console/social-provider/advanced-social-data-points/)
- [Social Provider FAQ](/api/v2/admin-console/social-provider/social-provider-faqs/)
- [Supported Social Networks](/api/v2/admin-console/social-provider/supported-social-networks/)

 
 
 

