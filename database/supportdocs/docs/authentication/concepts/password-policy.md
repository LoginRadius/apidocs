# Password Policy Introduction

The **Password Policy** feature allows you to enhance security by defining the password rules. This guide will help you in setting up Password Policy by configuring the following in the LoginRadius Admin Console:

- [Password Expiration](#partpasswordexpiration0)
- [Password History](#partpasswordhistory1)
- [Password Complexity](#partpasswordcomplexity2)

In addition, you can find the details of [Default Password Policy](#partdefaultpasswordpolicysettingsinloginradius7), [Password Compliance Check](#partpasswordcompliancecheck8), [Password Hashing](#partpasswordhashingalgorithm9) and [Password Visibility](#partpasswordvisibility10) features.

## Part 1 - Password Expiration

You can set the password expiry configuration  to periodically request an updated password from your customers. This feature allows you to customize how often you want your customers to reset their passwords. 
The following explains how you can configure the password expiration in your LoginRadius Admin Console account: 

**Step 1**: Login to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account and navigate to the <a href = https://adminconsole.loginradius.com/platform-security/account-protection/password-policy/password-expiration target=_blank>**Platform Security > Account Protection > Password Policy**</a>.

The following screen appears:

![](https://apidocs.lrcontent.com/images/1_259235e77d25f766c90.61816479.png)


**Step 2**: Select **Unit of Time (Day/Month/Year)**, enter the value and click the **Save** button as displayed in the screen below:

![](https://apidocs.lrcontent.com/images/2_274925e77d28cf2cc46.48059926.png)

For example, if you have selected **Day** from drop-down and entered **7** in the text box, your customer's account password will expire in every 7 days. Once expired, the customers are required to reset their account password.


## Part 2 - Password History

You can configure the number of unique passwords a customer must set before reusing an old password. This enables you to enhance security by ensuring that old passwords are not reused continually.

The following explains how you can configure the password history in your LoginRadius Admin Console account: 

**Step 1**: Login to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> account and navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/password-policy/password-history target=_blank>**Platform Security > Account Protection > Password Policy > Password History**</a>

The following screen appears:

![](https://apidocs.lrcontent.com/images/3_10895e77d2aed98519.85089464.png)


**Step 2**: Select the **Enable** option to enable the max password history. The Number of Past Passwords User isn’t allowed to use text box appears:

![](https://apidocs.lrcontent.com/images/4_323505e77d2da8a7194.26567393.png)


Enter the desired password history number and click the **Save** button.

For example, if you have entered 3 in the **Number of Past Passwords User isn’t Allowed to Use**, while resetting or changing the password, your customers will not be able to use their 3 previous passwords.


## Part 3 - Password Complexity

You can configure password complexity by defining the validation rules, and preventing the customer from using common passwords, dictionary passwords and profile fields as a password.

The following explains how you can configure the password complexity in your LoginRadius Admin Console account: 

**Step 1**: Login to your <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a>account and navigate to <a href = https://adminconsole.loginradius.com/platform-security/account-protection/password-policy/password-complexity target=_blank>**Platform Security > Account Protection > Password Policy > Password Complexity**</a>.

The following screen appears:

![](https://apidocs.lrcontent.com/images/5_119335e77d316356792.53579630.png)



Password complexity has the following subsections:


- [Password Validations](#passwordvalidations3)
- [Common Password Protection](#commonpasswordprotection4)
- [Dictionary Password Prevention](#dictionarypasswordprevention5)
- [Profile Fields Password Prevention](#profilefieldspasswordprevention6)

> **Note**: The **Password Complexity** rules configured in the LoginRadius Admin Console are only the front-end validations. To enable the same password complexity configurations with the back-end, please contact the <a href = https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket target=_blank> LoginRadius Support Team</a>.

The following explains the usage and configuration of these subsections:

### Password Validations

It displays the list of current applicable password validations. These validations can be configured as explained below:

**Step 1**: To configure **Password Validations**, navigate to <a href =https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/standard-login/data-schema  target=_blank>**Platform Configuration > Authentication Configuration > Standard Login**</a>.


**Step 2**:  In the **Active Fields** section, click the **Edit** sign given against the **Password** field and select the **Advanced** tab as displayed in the screen below:

![](https://apidocs.lrcontent.com/images/6_153745e77d356e46ae1.85832007.png)

**Step 3**:  Enter the desired validation rule in the **Validation String** field and click the **Save** button to save the settings as displayed in the screen below:

![](https://apidocs.lrcontent.com/images/7_29115e77d37e6e19e8.67331250.png)

For more details on the password validations, refer to the [validation rules list](/api/v2/deployment/js-libraries/javascript-hooks/#passwordstrengthfeature21).


### Common Password Protection

This feature prevents your customers from setting a common password for their account. It checks passwords against a predefined list of common passwords maintained by LoginRadius.

To enable this feature, navigate to the <a href = https://adminconsole.loginradius.com/platform-security/account-protection/password-policy/password-complexity target=_blank>**Platform Security > Account Protection > Password Policy > Password Complexity**</a> and click the **Common Password Protection** toggle button to turn on the common password protection.

The following screen displays that the Common Password Protection option is enabled:

![Common Password Protection](https://apidocs.lrcontent.com/images/cp1_267775f2291c15a50c3.56896264.png "Common Password Protection")

> **Note:** You can refer to this [document](/authentication/concepts/common-password/) for a common password list maintained by LoginRadius and this list is dynamic and it gets updated from time to time.

### Dictionary Password Prevention

This feature prevents  your customers from setting a password available in the dynamic password dictionary.  LoginRadius uses this dynamic [Password Dictionary](https://raw.githubusercontent.com/danielmiessler/SecLists/master/Passwords/Common-Credentials/10-million-password-list-top-1000000.txt) to prevent the use of dictionary passwords.

To enable this feature, navigate to the <a href = https://adminconsole.loginradius.com/platform-security/account-protection/password-policy/password-complexity target=_blank>**Platform Security > Account Protection > Password Policy > Password Complexity**</a> and click the **Dictionary Password Protection** toggle button to turn on the dictionary password protection.

![](https://apidocs.lrcontent.com/images/cp2_95725f2291e480ad86.92636721.png)

### Profile Fields Password Prevention

This feature prevents your customers from using the profile data for the account password. For example, if your customer profile has the Username, Email Id, First Name, Last Name and Date of Birth fields, the values of these fields cannot be used as an account password. 

To enable this feature, navigate to the <a href = https://adminconsole.loginradius.com/platform-security/account-protection/password-policy/password-complexity  target=_blank>**Platform Security > Account Protection > Password Policy > Password Complexity**</a>
and click the **Profile Field Password Prevention** toggle button to turn on the profile field password prevention.

![](https://apidocs.lrcontent.com/images/10_91395e77d3f5da59c8.11866279.png)


## Part 4 - Default Password Policy Settings in LoginRadius

LoginRadius provides the following default settings for your site/app for enforcing Password Policy:

- **Password Length and Complexity**: Minimum 10 characters with at least one number and symbol.
- **Password History**: Customers can't use the new password from the last 5 passwords.
- **Maximum Password Age**: The maximum password age is 90 days i.e. it expires after 90 days.

In addition to the above password policy features, LoginRadius Identity Platform also supports following password requirements:

## Part 5 - Password Compliance Check

You can  identify customers who comply with newly configured password complexity requirements, this feature will set a flag on the customer's profile, which can then be used to segment customers via either the Admin Console or Cloud API. 
 
LoginRadius can add an additional field to your customer profile called **IsSecurePassword** as a flag to indicate if the account is complying with the set of rules. This is particularly useful if you have a new set of rules in regards to password strength and would like to enforce these rules on existing users.
 
You can contact the <a href = https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket target=_blank> LoginRadius Support Team</a> to enable the Password Compliance Check. 

## Part 6 - Password Hashing Algorithm

You can view the hashing algorithm currently used with your site/app for password encryption. It also displays password-encryption values that are stored by LoginRadius Cloud Storage for your web application or mobile app. LoginRadius provides one-way encryption, it means that it will never be the case that the password’s ciphertext is decrypted at all. 
 
To view these details, navigate to <a href = https://adminconsole.loginradius.com/data-governance/data-security/hashing-algorithm target=_blank>**Data Governance > Data Security > Hashing Algorithm**</a>. 

The following screen appears:

![](https://apidocs.lrcontent.com/images/11_130975e77d41d63fce2.71566414.png)


For more details on password hashing, password salting and upgrading the hashing algorithms , you can refer to [this document](/authentication/concepts/password-hashing-and-salting/).

If you want to change the Hashing Algorithm, click the **REQUEST CHANGE** button and raise the support ticket. [This document](/authentication/concepts/password-hashing-and-salting/) explains how LoginRadius will handle hashing of existing and new customers password in case of hashing algorithm upgrade.

## Part 7 - Password Visibility

You can view the typed password by clicking a button while typing the password. You can implement the password visibility option using the JavaScript and the following displays how:

> The following considers that you have implemented Registration and Login processes using LoginRadius JavaScript Libraries.

Set the **passwordVisibilityControl** flag true in the Config section of your HTML FIle. For example:

**Code Snippet**:

```
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Authentication Demo</title>
</head>
<body>
  <h1>LoginRadius JS Authentication Demo</h1>
 <script type="text/javascript"   src="https://auth.lrcontent.com/v2/js/LoginRadiusV2.js"></script>
  <script>
 <script>
    var config = {
      'apiKey': “enter your API Key",
      'apiName': "enter your App Name",
      'Sott': “enter your sott key, sott need and generation is explained below”, 
    passwordVisibilityControl: true 
    }; 
  </script>
</body>
</html> 
```

The default text for show and hide stage is **Show Password** and **Hide Password**. However, you can change the same by using the following common option:

**Code Snippet**:

```
commonOptions.togglePasswordOptions = {
  'defaultText': 'Show',
  'toggleText': 'Hide'
}
// where 'defaultText' and 'toggleText' options are for show and hide state respectively.
```

## Part 8 - Next Steps

The following is the list of features you might want to add-on to the above implementation:

[Session Management](/authentication/concepts/session-management/)

[Customer Security](/authentication/concepts/customer-security/)

 
