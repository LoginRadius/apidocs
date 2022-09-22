# Password Policy

There are multiple ways in which LoginRadius can improve the security of your end users. Navigate to your LoginRadius [Admin Console](https://adminconsole.loginradius.com/dashboard) from the top header and select **Platform Security**. Under **Account Protection**, select **Password Policy**. On the left-hand panel, you will be provided with the supported password management settings.


## Password Expiration

1. Click on **Password Expiration** tab, select **Unit of Time** and set the number of times for which users are allowed to reset the password.
   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/ac27_126145e934261759b36.19372918.png "Password Expiration")

2. Hit **Save** to save the settings.

## Password History

1. Click on the **Password History** tab, check **Enable** for Max Password History and enter the number of recent past passwords users are not allowed to reuse. 

   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/ac28_191445e9342908ccfc6.90625594.png "Password History")
2. Hit **Save** to save the settings.


>**Note:** The password History field should not accept any negative value as we are creating a new feature to enable/disable(Value should start with 1).


## How it works:

Let's suppose you enabled the password history feature and set the value equal to 1 then it will works as below:

1. Let a consumer during the registration time set the password as **123456**.

2. After sometime the consumer tries to update his password as the same **123456** API will not allow this and shows the error.

3. Now again the consumer tries to update his password to **1234567** this time the API will allow thid and set it as a new password.

4. But after sometime the consumer tries to update his password to **123456** again and the API will throw  an error.Because password history is set to 1.

5. Again the consumer trries to update his password to **12345678** this time the API will allow this and set it as anew password.

6. Now consumer again tries to update password to **123456** this time API will allow the user to set this as a new password.



## Password Complexity

1. To configure Password complexity, go to Platform Configuration → Authenication Configuration → Standard Login.
2. Select the **Data Schema** tab, click on edit icon under **Enabled Fields** and select the **Advanced** tab.
   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/ac29_66785e9342a80896a7.24410670.png)
3. Enter the validation rule in **Validation String** field and hit **Save** to save the settings.
   <br><br>![enter image description here](https://apidocs.lrcontent.com/images/ac30_97595e9342c7e96d67.96094032.png)

>**Note:**  Configuring password complexity rules on your Admin Console will apply to the registration forms only.

### Password Complexity with Update Event

In order to apply Password Complexity configurations when a password is updated, please use our JavaScript hook as displayed below:


**Sample code:**

```
LRObject.$hooks.call('formValidationRules',{
	"newpassword":"required|min_length[8]|max_length[32]",
	"confirmnewpassword":"required|min_length[8]|max_length[32]",
});
```

For additional information on the usage of custom validation hooks, validation rules, and custom validation rules, please see this [documentation](/api/v2/deployment/js-libraries/javascript-hooks#customvalidationhook15).

>**Note:** The Password Complexity rules configured on the Admin Console are front-end validations only. To enable the same Password Complexity configurations with the back-end, please contact <a href = https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket target=_blank> LoginRadius Support Team</a>.

