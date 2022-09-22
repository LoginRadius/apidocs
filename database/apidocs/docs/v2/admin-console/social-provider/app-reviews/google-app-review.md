#Google App Review Process


## When do I need to submit my Google app for Review?

Generally, Google will not ask for you to go through the app review process unless you ask your customers for more permissions than what is already listed in our LoginRadius Basic permissions for Google.

https://www.loginradius.com/datapoints/

However, if you do ask for additional permissions/scopes you will be required to go through Google's app review process, You may also be required to do it again in the future by making subsequent modifications such as adding new redirect URLs, new JavaScript origins, changing the product name and scope changes. 

You can learn more about Google's rules regarding verification [here](https://support.google.com/cloud/answer/7454865?hl=en).

##How do I submit my Google app for review?

In order to configure your Google app to be successfully approved, refer to the below step-by-step guide. Additional information is also available directly from Google [here](https://support.google.com/cloud/answer/7454865) and [here](https://support.google.com/cloud/answer/9110914?hl=en). You can read more about the different permissions/scopes Google offers [here](https://developers.google.com/identity/protocols/googlescopes). Important aspects to pay attention to during configuration are:

##Things To Do Before Submission

1. In the [Google Developer Console](https://console.developers.google.com) make sure you have you app selected in the top drop-down
and click "Credentials" on the left handside, then choose "OAuth consent screen".

	Make sure that all of mandatory fields are filled out with up-to-date information.

	**Note**: Linking to the privacy policy of your website is very important.
	
	![OAuth Consent screen](https://apidocs.lrcontent.com/images/Screenshot-2018-01-22-16-34-14_264685a66835b8ea980.24738807.png "OAuth Consent screen")

2. Google requires that you verify ownership of the website being used, this means that the same website you've provided in step 1. for linking to your privacy policy needs to be verified. To do this you will need to make sure your logged in as either a Project Owner or a Project Editor on the Google App and verify your ownership via the [Google Search Console](https://www.google.com/webmasters/tools/home) you can learn more about Google's site verification process [here](https://support.google.com/webmasters/answer/35179?hl=en).


##Submitting Your App For Verification

1. To begin the review process simply hit the "Submit for verification" button at the bottom of the "OAuth consent screen" page.

  ![enter image description here](https://apidocs.lrcontent.com/images/SubmitforVerifiaction_120475c64be13712d47.72340167.png "enter image title here")

2. Scopes justification: In this field you need to provide each additional scope that you're going to be requesting from your customers that is not part of Google's basic scopes along with a detailed explanation why you need these additional scopes. 
  
   e.g. "Requesting the `https://www.googleapis.com/auth/user.birthday.read` scope as the application will be performing age verification upon login to be compliant with privacy laws, should the user not meet the required age the user will not be allowed to proceed further into the app."

3. Include any information that will help us with verification, like a Google contact or the Project IDs of any other projects that use OAuth: In this field it is highly recommend to explicitly request that you would like to change that the "continue to" on the OAuth consent screen presented to the users be changed to your company's name. Otherwise by default the customers will be prompted if they want to "continue to loginradius.com" and Google may ask you to verify ownership ownership of loginradius.com

  Example of an OAuth consent screen without your company's name being set:
  ![enter image description here](https://apidocs.lrcontent.com/images/loginradiusimage_163795c64b92fc2f2e3.95157072.png "enter image title here")

4. Contact email address: Email that you would like to notified at regarding your Google Social Login.

5. Once you're ready you can hit the "Submit" button. The Verification process typically takes between 3 and 7 business days, however it may be longer. It is not recommended to make changes impacting the Google Social Login during the verification process to avoid having to start over.

  ![enter image description here](https://apidocs.lrcontent.com/images/VerificationRequired_115155c64be3f36f0c6.32510674.png "enter image title here")

