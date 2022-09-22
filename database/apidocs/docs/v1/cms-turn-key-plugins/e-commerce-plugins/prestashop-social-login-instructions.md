Prestashop Social Login instructions
===
---
##Prestashop Module Installation Guide
>Note :- If you want to upgrade Social Login From old version to new version then uninstall the previous version and upload the new version with following instructions:

###Prestashop v1.6
1. [Download](http://loginradius-social-plugins.s3.amazonaws.com/Prestashop/v1.6/sociallogin.zip) Social Login module for PrestaShop v2.9 by LoginRadius.
2. Login to your PrestaShop’s site admin panel.
3. Now click on Modules tab.
![enter image description here](https://apidocs.lrcontent.com/images/ps1_1780758d20c29ee1603.49459151.png "")

4. Click on Add a new module, then browse Social Login zip file and click on Upload this module. 
![enter image description here](https://apidocs.lrcontent.com/images/ps2_133758d20c4594ce81.68049486.png "")

5. After successful installation of Social Login, click on Install button.

 ![enter image description here](https://apidocs.lrcontent.com/images/ps3_1755158d20c66ed9704.38809533.png "")

###Prestashop v1.5
1. Download Social Login module for PrestaShop v2.9 by LoginRadius.
2. Login to your PrestaShop’s site admin panel.
3. Now click on Modules tab.
![enter image description here](https://apidocs.lrcontent.com/images/prest0_672058d20c914d42d9.74415436.jpg "")

4. Click on Add a new module, then browse Social Login zip file and click on Upload this module. 
![enter image description here](https://apidocs.lrcontent.com/images/prest1_2918558d20caa5ca765.46475367.jpg "")

5. After successful installation of Social Login, click on Install button.
![enter image description here](https://apidocs.lrcontent.com/images/prest4_2571558d20cc6e88ad7.20956944.jpg "")
 
###Prestashop v1.4
1. [Download](http://loginradius-social-plugins.s3.amazonaws.com/Prestashop/v1.4/sociallogin.zip) Social Login module for PrestaShop v2.5 by LoginRadius.
2. Login to your PrestaShop’s site admin panel.
3. Now click on Modules tab.

 ![enter image description here](https://apidocs.lrcontent.com/images/Untitle1_2135558d20cf3be1026.56456953.jpg "")

4. Click on Add a new module, then browse Social Login zip file and click on Upload this module.
![enter image description here](https://apidocs.lrcontent.com/images/Untitled-2_2285958d20d08e8d7f5.61252498.jpg "")

5. After successful installation of Social Login, click on Install button.

 ![enter image description here](https://apidocs.lrcontent.com/images/Untitled-4_775058d20d2e7cd0f4.92061519.jpg "")

###Prestashop v1.3
1. [Download](http://loginradius-social-plugins.s3.amazonaws.com/Prestashop/v1.3/sociallogin.zip) Social Login module for PrestaShop v2.5 by LoginRadius.
2. Login to your PrestaShop’s site admin panel.
3. Now click on Modules tab.

 ![enter image description here](https://apidocs.lrcontent.com/images/Untitled-1_785958d20e05d0d344.61857223.jpg "")

4. Click on Add a new module, then browse Social Login zip file and click on Upload this module.
![enter image description here](https://apidocs.lrcontent.com/images/Untitled-9_3014358d20e12c09f02.43356885.jpg "")
 
5. After successful installation of Social Login, click on Install button.

 ![enter image description here](https://apidocs.lrcontent.com/images/Untitled-10_2158658d20e1f4a88f9.33477665.jpg "")


------- 


###Prestashop v1.6
1. Navigate to Modules tab .After that go to Social Login and click on Configure.
![enter image description here](https://apidocs.lrcontent.com/images/ps4_2148158d20e6b49e668.62316040.png "")
 2. To activate the plugin, insert LoginRadius API Key (How to get API Key and Secret?)
3. Insert your correct API & Secret in textbox, and choose the option of API Connection Method (cURL or FSOCKOPEN.
4. Verify the API key and secret by hitting Verify API Settings button, and click on Save Configuration button.
button.

###Prestashop v1.5
1. Navigate to Modules tab .After that go to Social Login and click on Configure.
![enter image description here](https://apidocs.lrcontent.com/images/prest2_253758d210565873d0.08922193.jpg "")

2. To activate the plugin, insert LoginRadius API Key (How to get API Key and Secret?)
3. Insert your correct API & Secret in textbox, and choose the option of API Connection Method (cURL or FSOCKOPEN.
4. Verify the API key and secret by hitting Verify API Settings button, and click on Save Configuration button.
button.
 

###Prestashop v1.4
1. Navigate to Modules tab .After that go to Social Login and click on Configure.
![enter image description here](https://apidocs.lrcontent.com/images/Untitled-6_1714658d2107de826d2.54083450.jpg "")
 
2. To activate the plugin, insert LoginRadius API Key (How to get API Key and Secret?)
3. Insert your correct API & Secret in textbox, and choose the option of API Connection Method (cURL or FSOCKOPEN.
4. Verify the API key and secret by hitting Verify API Settings button, and click on Save Configuration button.
button.


###Prestashop v1.3
1. Navigate to Modules tab .After that go to Social Login and click on Configure.
![enter image description here](https://apidocs.lrcontent.com/images/Untitled-4-1_2033058d21104cb6da5.66710018.jpg "")
 
2. To activate the plugin, insert LoginRadius API Key (How to get API Key and Secret?)
3. Insert your correct API & Secret in textbox, and choose the option of API Connection Method (cURL or FSOCKOPEN.
4. Verify the API key and secret by hitting Verify API Settings button, and click on Save Configuration button.
button.

------- 

##Further Help:-

###How to add Social Login interface at Login page on Prestashop 1.6 

1. Go to your FTP.
2. Open the file /themes/your_theme_name_folder/authentication.tpl
3. Add the following mentioned code where you want to add:
```
<div id="interfacecontainerdiv"  class="interfacecontainerdiv"></div>
```
![enter image description here](https://apidocs.lrcontent.com/images/ps5_1628658d211553f1de5.39972347.png "")
###How to add Social Login block at Login page on Prestashop v1.5


1. Go to your FTP.
2. Open the file  /themes/your_theme_name_folder/authentication.tpl
3. Add the following mentioned code where you want to add:

```
<div id="login_form" class="std">
<fieldset>
​<h3>{l s='Social Login'}</h3>
<div style='padding: 15px 10px;' >
​​<p class="title_block">{l s='Login with Social ID'}.</p>
​<center><div id="interfacecontainerdiv"  class="interfacecontainerdiv"></div></center>
​​</fieldset>
</div>
 ```

![enter image description here](https://apidocs.lrcontent.com/images/prestshop1_1463458d21176c13130.05258358.jpg "")

 ###How to add Social Login Interface at login page on Prestashop v1.5

(a). Add Social Login Interface in CREATE AN ACCOUNT block
1. Go to your FTP.
2. Open the file  /themes/your_theme_name_folder/authentication.tpl.
3. Search the following code:
```
<h3>{l s='Create an account'}</h3>
 ```

4. After that add the following code

```
<center>
<p class="title_block">{l s='Login with Social ID'}.</p>
<div id="interfacecontainerdiv" class="interfacecontainerdiv">
</center>​
```
![enter image description here](https://apidocs.lrcontent.com/images/prestahsop3_358358d211a8704481.42412944.jpg "")

(b). Add Social Login Interface in ALREADY REGISTERED? block
1. Go to your FTP.
2. Open the file /themes/your_theme_name_folder/authentication.tpl.
3. Search the following code:

```
<h3>{l s='Already registered?'}</h3>
 ```

4. After that add the following code:

```
<center>
<p class="title_block">{l s='Login with Social ID'}.</p>
<div id="interfacecontainerdiv" class="interfacecontainerdiv">
</center>
 ```
![enter image description here](https://apidocs.lrcontent.com/images/prestahsop2_1107558d211cd2361a7.60002707.jpg "")

###How to change the CSS of popup:-
[when option: Do you want users to provide required Prestashop profile fields before completing registration process? (A pop-up will open asking user to provide details of the fields not coming from Social ID provider) is set YES in admin configuration of Social Login module]  
1. Go to your FTP.
2. Open file /modules/sociallogin/sociallogin_functions.php
3. Search the following code
```
function popUpWindow($msg='',$data=array()){
 ```
4. Inside the adove code, pick the class or Id of form element and change css as per your requirement.

####How to translate language
1. Go to your admin panel.
2. Navigate to modules > Social Login admin configuration settings.
3. Click on the language flags next to Manage Translations at the top.
4. Here you can change  text which you want to translate.
 

####Where to look user details in your database:
User details are stored in the "customer" table ,"sociallogin" table and "address" table:-
**customer table:  **

|Column|	Info|
|-|-|
|id_gender|	Gender of customer|
|firstname	|First Name of customer|
|lastname|	Last Name of customer|
|email	|Email Address of customer|
|birthday|	Date of birth of customer|
 

**sociallogin table:**

|Column|	Info|
|-|-|
|id_custmer|	Customer id|
|provider_id	|Social Provider ID|
|Provider_name	|Social Provider|
 
**address table:**

|Column|	Info|
|-|-|
|Id_country	|Country ID|
|Id_state|	State ID|
|postcode	|ZIP /Postal code|
|city	|City|
|alias	|Address title for refrence|
|phone_mobile|	Mobile number|
 

####How to uninstall the module:
1. Login to your website admin panel.
2. Navigate to modules section under modules tab.
3. Click Uninstall , then Delete below the module that you want to uninstall.
>Note: For removing the module manually, navigate to "/modules/" folder in your prestashop installation folder and delete "sociallogin" folder.

---
 
###Troubleshooting:

There is a button " Verify API Settings " in the API Settings section of the plugin. you need to choose one of following options

 - CURL requires cURL support = enabled in your php.ini file.
 - FSOCKOPEN requires allow_url_fopen = On and safemode = off in your php.ini file.
 
If that does not work, you may need to contact your hosting provider to enable one of the option.
