Expression Engine Social Login Instructions
===
----

##Installation

1. [Download the plugin](https://devot-ee.com/add-ons/social-login-and-social-share) to your local computer. You’ll usually need to unzip the file.

2. Move **system/expressionengine/third_party** from the downloaded files to **system/expressionengine/third_party** in your EE install.
 
3. Move **themes/third_party **from the downloaded files to **themes/third_party** in your EE install.
 
4. Go to your admin panel.

5. Click on the Add-Ons tab and then, click on Extensions.

6. Enable the extension Social Login and Share.

##Configuration

1. To configure the plugin, Click on the Add-ons tabs >> Extensions.
 
2. Click on Settings of Social Login and Share extension.
 
3. Enter API key and API secret under LoginRadius API settings section that you get from your LoginRadius Account.
 
4. You can also configure desired settings as per your requirements.
 
5. Click on the submit button.

##Usage Details

###Social Login Widget tag

This widget tag is used to display the social login widget where you’d like the widget to appear and handle login/registration functions.

####Widget Tag:

      {!-- LoginRadius Social Login Widget --}
      {exp:loginradius:sociallogin_widget}
      {!-- LoginRadius Social Login Widget --}

###Social Sharing Widget tag

This widget tag is used to display the social share widget where you'd like the widget to appear.

####Widget tag:

       {!-- LoginRadius Social Sharing Widget --}
       {exp:loginradius:socialshare_widget}
       {!-- LoginRadius Social Sharing Widget --}

####Social sharing widget tag parameter:

**image_url-** Set the image URL which you want to be shared via social networks.

Example:

     {exp:loginradius:socialshare_widget 
     image_url =http://cdn.loginradius.com/ui/prod/v8/images/logo.png}

###Account Linking Widget tag

This widget tag is used to link your account with the existing account.

     {!-- LoginRadius Account Linking Widget --}
     {exp:loginradius: accountlinking_widget }
     {!-- LoginRadius Account Linking Widget --}

##Field Mappings


1. Login to your admin panel.

2. Click on Members >> Member Fields section.
 
3. Create New Member fields that you require.
 
4. All created member fields are listed down under the field mapping tab and you can map social provider data to field by choosing from the select list.
5. You can also show member fields in a popup if the data is not available from LoginRadius.
 
6. After that, click on the Submit button.

##Silverpop


1. Login to your admin panel.

2. Navigate to Social login and Social share extension >> Silverpop settings.
 
3. Enter Client ID, Client Secret, Refresh Token, and Engage pod number that you retrieve from Silverpop. 
4. Enter List ID in which you want to insert your contacts to Silverpop.
 
5. After that click on the save button.
 
6. Here you’ll see columns detailing a list of List IDs.
 
7. Now map the Silverpop columns to the data (LoginRadius data and member data).This mapped data would be inserted into your Silverpop database.