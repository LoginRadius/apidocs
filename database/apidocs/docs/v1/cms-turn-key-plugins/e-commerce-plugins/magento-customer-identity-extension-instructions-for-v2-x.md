Magento Customer Identity Extension instructions for v2.x
===
---
Based on your LoginRadius plan you have, you may have access to one or more of the following components. This document provides a installation guide for the Magento v2.x Customer Identity Extension. If you require additional components that are not included in your plugin please contact your product specialist at [loginradius.com](https://www.loginradius.com)

##Menu

- Installation Guide
- Activation and Configuration
- Troubleshooting
- Advanced Customization

###Installation

1. Login to your website FTP Manager.
2. Extract the Directory and upload "LoginRadius" Directory in app->code
3. If code directory not found then create directory with name of code in app directory.
![enter image description here](https://apidocs.lrcontent.com/images/3_1809658d16b508d4970.16665901.png "")
4. After Success upload, run following command on your server in magento root directory.
5. Command to Install Loginradius php SDK 
```
composer require loginradius/php-sdk:dev-api-v1
```
![enter image description here](https://apidocs.lrcontent.com/images/5_2748358d16b7f9bef44.66484574.png "")
6. Command to install magento extensions: 
```
php bin/magento setup:upgrade
```
![enter image description here](https://apidocs.lrcontent.com/images/6_197558d16bd8df8b50.40571095.png "")
7. Some time static content not generate so run: 
```
php bin/magento setup:static-content:deploy
```
![enter image description here](https://apidocs.lrcontent.com/images/7_2297458d16c139d78f0.52540530.png "")

8. Cmd for reindex files: 
```
php bin/magento indexer:reindex
```
![enter image description here](https://apidocs.lrcontent.com/images/8_2349158d16c37aebb21.61018688.png "")

####Activation and Configuration

#####Account Configuration

 > Note: The full functionality of this module requires a LoginRadius API Key and a LoginRadius API Secret. Please find further documentation on how you can obtain this data here


#####Activation Steps

1. After successful installation Go to Store -> Configuration. 
![enter image description here](https://apidocs.lrcontent.com/images/1_2587758d16c8f21c827.62652504.png "")

2. You will see LoginRadius Menu Tab After General Setting.
3. Click on this tab and then see submodules in this section. 
![enter image description here](https://apidocs.lrcontent.com/images/2_2967458d16cb749e634.37480619.png "")

4. Go to Customer Registration section and select authentication type i.e either you want to enable Social Login aud Customer Registration.
![enter image description here](https://apidocs.lrcontent.com/images/enable_social_login_3180158d16ce963caf1.80702315.png "")

5. Go to each submodule section and save setting with your selected configuration setting.
6. To change Email Verification Templates or Forgot Password Templates go to Customer Registration and select Email Template Configuration Options:
![enter image description here](https://apidocs.lrcontent.com/images/email_templates_2594058d16d0ebdb456.22019676.png "")

7. To change the layout of popup go to :
`\pub\static\frontend\Magento\blank\en_US\LoginRadius_CustomerRegistration\customerregistration\css\emailpopup.css`
AND
`app\code\LoginRadius\CustomerRegistration\view\frontend\web\customerregistration\css\emailpopup.css`

###Troubleshooting

####Installation/Upgrading/Performance issue

If there are issues related to login, user interface, upgrade and/or module performance then you should clear your website's cache after enabling the LoginRadius Module. Follow these steps to clear the system cache:

1. Login to your admin section.
2. Go to System -> Cache Management select all and then click on Flush Magento Cache

####Interface Example

#####Login Interface:
![enter image description here](https://apidocs.lrcontent.com/images/login_interface_66958d16d9580d709.04019531.png "")
#####Registration Interface:
![enter image description here](https://apidocs.lrcontent.com/images/registration_interface_1764158d16db968d185.92321156.png "")
#####Forgot Password:
![enter image description here](https://apidocs.lrcontent.com/images/forgot_password_95858d16dd24e7ec0.58562173.png "")

###Advanced Customization

####Where to look user details in database

User details are stored in the lr_sociallogin table:-

lr_sociallogin table

|Column	|Info|
|-|-|
|provider|	Social network provider|
|sociallogin_id	|Social network provider ID|
|uid|	UID, the identifier for each user account|
|avatar	|User profile image|
