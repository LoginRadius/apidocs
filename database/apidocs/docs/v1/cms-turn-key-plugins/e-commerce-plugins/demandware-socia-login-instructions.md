# Demandware Social Login instructions

---

##Overview

LoginRadius Social Demandware Cartridge that allows users to login with their Social Provider accounts. Contact the LoginRadius support team or our Customer Success representative to get access to the Demandware Social Cartridge.

##Installation

Follow the below steps to setup the LoginRadius Social Login in your Demandware site.

###Import XML Settings

1. Login to your Demandware Business Manager Page.
2. Click on "Administration" in the header.
3. Click on "Site Development".
4. Click on "Import & Export".
5. Click on "upload" in the Import & Export Files section.
6. Click on "Choose File" and select the loginradius_settings.xml included in the Cartridge package and click "upload".
7. Click on "Back" after the upload.
8. Click on "Import" in the Meta Data section.
9. Select the loginradius_settings.xml file and click Next

###Import the Cartridge

1. Login to your Demandware Studio
2. Click on File -> Import
3. Under General select "Existing Projects into Workspace"
4. Select the int_loginradius included in the Cartridge package.
5. Click Finish
6. Click "ok" when Demandware studio requests to link the cartridge to your sandbox server.

###Business Manager
####Register the Cartridge

1. Login to the Demandware Business Manager.
2. Click on "Administration" in the header.
3. Click on "ites".
4. Click on "Manage Sites"
5. Select your Demandware Site.
6. Click on the "Settings" tab.
7. Prepend "int_loginradius:" to the Cartridges section.
8. Click "Apply"

####LoginRadius Settings

1. Login to the Demandware Business Manager
2. Click on "Merchant Tools" in the header.
3. Click on "Site Preferences"
4. Click on "Custom Preferences"
5. Click on LoginRadius and set the custom preferences:

- LoginRadius API Key- Set to your LoginRadius API Key
- LoginRadius API Secret- Set to your LoginRadius API Secret
- LoginRadius Site Name- Set to your LoginRadius Site Name.

Get your LoginRadius Site Name From Admin Console.

6. Click on "Apply".
7. Click on "Back".
8. Click on "LoginRadius_Settings" and Set the custom preferences:

- Social Login Providers- Select the providers that you have configured on your LoginRadius Admin-console.
- Callback URL- Set the location that the users will return to after email verification. This should be a page that has the LoginRadius template files included.
- Email Sent Message- Sets the displayed message on successful email sending.
- Email Verified Message- Sets the message when an email has been successfully verified.
- Update User Information- Sets whether a user"s social data is updated on every login or only on initial registration.

9. Click "Apply"

##Storefront Setup

###Module Configuration

First you must register the LoginRadius Cartridge templates in your Module File in order to use the templates in your storefront templates.

in your storefront templates.

- Open your Storefront Cartridge.
- Expand the Templates Folder.
- Expand the util Folder.
- Open "modules.isml".
- Add the following to the end of the file:

```
<isinclude template="loginradius/modules"/>
```

- Save the template.

###Account Page Interface

Setup the LoginRadius interface on your Account page:

- Open your Storefront Cartridge.
- Expand the Templates folder.
- Expand the account folder.
- Expand the login folder.
- Open "accountlogin.isml"
- Add the following code to the top of the template:

```
<isloginradiusheader></isloginradiusheader>
```

- Add the following code wherever you would like the interface to appear on the login page.

```
 <isloginradiussociallogin></isloginradiussociallogin>
```
