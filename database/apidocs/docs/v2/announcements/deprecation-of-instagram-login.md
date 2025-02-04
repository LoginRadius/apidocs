# Deprecation of Instagram Login

Instagram will soon deprecate its Instagram API Platform in favor of the Instagram Basic Display API in turn, which means that you will no longer be able to use Instagram as a social login identity provider. Due to this change in development from Instagram, LoginRadius will no longer support Instagram Login. Any customer whose implementation relies on Instagram social login should begin transitioning away from the service as soon as possible.

In order to let existing customers continue to access your application, you will need to ask the customers who are authenticating using Instagram, to authenticate using a different authentication workflow available in LoginRadius.

 ## FAQ

 - [What happens if I am currently using Instagram Login?](#whathappensifiamcurrentlyusinginstagramlogin1)
 - [What happens to my customer data, registered via Instagram?](#whathappenstomycustomerdataregisteredviainstagram2)
 - [Will my customers still be able to log in via Instagram?](#willmycustomersstillbeabletologinviainstagram3)
 - [What happens to my LoginRadius interfaces that have Instagram on them?](#whathappenstomyloginradiusinterfacesthathaveinstagramonthem4)
 - [How can I proactively remove Instagram from my auth providers list?](#howcaniproactivelyremoveinstagramfrommyauthproviderslist5)

### What happens if I am currently using Instagram Login?

Since Instagram will be removed soon, your customer won't be able to log in via the Instagram Login flow. Your customer can follow the below steps for login:

- Login With another social provider.
- Login with Email and Password. 
- If Email and Password credentials are not set, then the customer should go with **Forgot Password** flow to set the password. 

### What happens to my customer data, registered via Instagram?

Your customer's data will continue to be securely stored on the LoginRadius database and you will be able to retrieve either via the LoginRadius Admin console or via API calls. 

### Will my customers still be able to log in via Instagram?

Yes, there are the following ways by which your customers can login with:

1. **If the customer has only configured Instagram:** The customer can choose **Forgot Password** and he will receive a reset password email. After resetting the password, the customer will be able to log in.

2. **If the customer has more than one social login:** Your customer will be able to log in through other social providers.

3. **If the customer has traditional login & social login:** Your customer will be able to access his account, they can link other social providers using our [account linking](https://www.loginradius.com/legacy/docs/authentication/FAQ/account-linking/#account-linking) workflow.
4. You can send **Reset Password** email through the LoginRadius Admin Console by following steps:
<br> - Login to the Admin Console and navigate to [**Profile management -> Customer Management -> Search customer**](https://adminconsole.loginradius.com/profile-management/customer-management/search-customers).
<br> - Click on the **Manage** button,  a popup will appear then click on **Send Reset Password Mail** button.
<br> - A password reset link has been sent to your customer's email. 

### What happens to my LoginRadius interfaces that have Instagram on them? 

LoginRadius JavaScript interface is managed dynamically. The Instagram login button will be removed from the LoginRadius interface automatically. In case if you have the Instagram button added statically, then you need to remove it.

### How can I proactively remove Instagram from my auth providers list? 

By following the below steps, you can remove it from the provider list:

- Login to the Admin Console and navigate to [**Platform Configuration -> Authentication Configuration ->  Social Login ->  Social Providers**](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/social-login/social-providers).
- Click on the **Cross** button of the Instagram social icon as displayed below, it will ask you **“Are you sure you want to disable this?”**  then click on the **Confirm** button.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Social-Login---LoginRadius-User-Dashboard-13_120145ea0034e4bf354.81624665.png "Instagram Icon")
- Now the Instagram Login will be removed from the provider list.



