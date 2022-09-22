# Progressive Profiling

## Overview

Progressive profiling automates the gradual gathering of data from consumers. This is done by requesting permissions at various stages of your consumer’s life cycle, rather than all at once. Below you can customize your desired progressive profiling steps and fields, add or remove fields, set validation strings, and configure field types. For example, you can create a step called "Third Login" where an additional set of permissions are requested on a consumer's third login.
Here's some other useful examples as to when you could prompt a consumer for additional information/permissions:


- Upon First Login
- At a custom defined Number of Logins
- Upon Navigating to a specific property
- Clicking a specific link or CTA button


This document describes the process to retrieve progressive profile information via registration form data.

![progressive profile](https://apidocs.lrcontent.com/images/progressive-data-gather_283765a39b2a60c40a9.96778619.jpg)


## Customer Registration Progressive Profiling

Customer Registration Progressive Profiling allows you to split a potentially complicated registration process into multiple steps. This allows you to capture business critical information upfront and then slowly build out a holistic view of your consumers through subsequent steps/actions. The subsequent steps often take the place of secondary registration forms or event-driven calls to actions for your consumers to supply additional profile metadata.


By default, these progressive fields are available only at the first invocation, and if the consumer wants to edit some of his details later on, then they cannot edit/modify the same. With the **progressive fields** feature, the LoginRadius platform allows the consumer to modify the progressive fields on the profile editor page. You can refer to the [Progressive Profiling customization](/api/v2/deployment/js-libraries/advanced-js-customizations/#progressiveprofiling27) for more details.


### Configuration

In this flow, the consumer will be prompted for additional profile fields that they haven't provided during the standard registration process. To begin, you will need to configure individual steps in the LoginRadius Admin Console, along with which fields these steps should be prompted. In the Admin Console go to [Deployment > Progressive Profiling](https://adminconsole.loginradius.com/deployment/profiling/progressive-profiling).


Follow the instructions below to configure a step:

1. First, you will need to create a step under 'Add New Step'. For example, we will create a step called 'step1', and click 'Add' to create the step. 

   ![step1](https://apidocs.lrcontent.com/images/1_41205f8dc9e62d3024.54472889.png "enter image title here")

2. Once the step is created, click the pencil icon next to the step name.

   ![click the pencil icon](https://apidocs.lrcontent.com/images/1_300065f8dcab6ca9aa3.18219619.png "enter image title here")

3. Clicking the pencil icon will open the below screen

   ![enter image description here](https://apidocs.lrcontent.com/images/1_209745f8dcb0e13c250.06547997.png "enter image title here")

4. Using the Disabled Fields section on the right-hand-side, you can choose from any Standard Field or Custom Fields that you would like to request from the consumer progressively, each step can have multiple Fields to prompt the consumer. For example, we click on **Standard Fields** and choose **Country**.

   ![Disabled Fields](https://apidocs.lrcontent.com/images/1_95295f8dcba347f8a6.22466801.png "enter image title here")

5. The field will now be displayed in your step, you can optionally hit the edit pencil to make additional changes, such as changing the field name or adding validation rules.

     ![enter image description here](https://apidocs.lrcontent.com/images/1_221285f8dcbf8460840.00702073.png "enter image title here")

   Here you can edit the fields by selecting the appropriate options:

   ![enter image description here](https://apidocs.lrcontent.com/images/1_192555f8dcca2e73688.74292396.png "enter image title here")

6. Once you're done simply click the "Save" button within your step.

    ![Save](https://apidocs.lrcontent.com/images/1_303495f8dccd64925f6.48296636.png "enter image title here")

7. Your step is now complete, you can now programmatically call it whenever you need it.


## Implementation

Once you have created the different progressive profiling steps in the LoginRadius Admin Console that each contains the fields you would like to prompt your consumers. You simply need to use the [Progressive Profiling Interface](/api/v2/deployment/js-libraries/advanced-js-customizations#progressiveprofiling14)  to prompt the desired step to your consumer.



>**Note:** The [Progressive Profiling Interface](/api/v2/deployment/js-libraries/advanced-js-customizations#progressiveprofiling14) is part of the LoginRadiusV2.js Interfaces, we recomend reading our [Getting Started](/api/v2/deployment/js-libraries/getting-started) documentation if you're not familiar with our JavaScript Interfaces.
