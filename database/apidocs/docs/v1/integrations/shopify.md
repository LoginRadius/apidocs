# Shopify

---

This section goes over integrating LoginRadius interfaces in your Shopify site.

##Introduction
To implement LoginRadius User Registration and SSO in Shopify requires editing a few of Shopify's .liquid files, which you can easily do with a theme editor. Follow these instructions to open your Shopify theme editor:

1. Login to admin
2. Click on 'Theme' in the left side menu
3. Click on drop down '...' and select the 'Edit HTML/CSS' option  
   After opening the theme editor, follow the steps below to implement the LoginRadius User
   Registration.

##Upload assets
First of all, extract the zip file you get from LoginRadius and upload the Javascript and CSS files into your theme:

1. Extract 'assets.zip'. Inside the folder, there are several files you are going to use for your LoginRadius Shopify Implementation.
2. Open 'raassettings.js' file in any editor and find the keyword 'functionexchangeMultipassToken'. Within this function, update your multipass API endpoint (setup multipass token API).
3. Expand 'Assets' option in your Shopify theme editor and click on 'Add a new assets' in the Shopify theme editor.
4. Select both files and upload.
5. If you are going to use the default social icon theme as well, you also need to upload two image files inside the same folder: "iconsprite.svg" and "iconsprite32.png".

##Edit 'theme.liquid' file
On the left-hand side of the theme editor menu is a theme file explorer. This Expands the 'Layouts'
option, click on the 'theme.liquid' file.

##Add LoginRadius core JS file and theme css
Add the following tags just before the </head> (closing head tag) tag

```
{{ 'lrraasstyle.css' | asset_url | stylesheet_tag }}
{{ 'https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js' | script_tag }}
{{ 'https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js' | script_tag }}
{{ 'https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js' | script_tag }}
```

##Initialize LoginRadius user registration options
The LoginRadius user registration requires some options: apikey and appname. Add the following
script just before the </body> (closing body tag) and make sure to replace <API KEY> and

<APP NAME> with the LoginRadius API key and site name that are provided in your
LoginRadius site settings page.

```
<script type="text/javascript">
var raasoption = {};
raasoption.apikey = "<API KEY>";
raasoption.appName = "<APP NAME>";
</script>
```

##Add LoginRadius User Registration Shopify extension library
Add the following tag just after the 'Options initialization script'

```
 {{ 'raassettings.js' | asset_url | script_tag }}
```

##Add SSO code
To achieve the best practice for LoginRadius SSO, simply add the following two code blocks to each page where single sign-on is required. Since it needs to work on every page in most cases, we will add them to our theme.liquid file. The first code block is for the scenario when this user is not logged in to Shopify, but he is logged in from other SSO family sites. The second one is used after this user is logged in to Shopify, but has been logged out from other SSO family sites. Put it just after 'raassettings.
js' script tag from the above steps.

```
 {% if customer %}
  <script type = "text/javascript">
    $(document).ready(function() {
    LoginRadiusSSO.init(raasoption.appName);
    LoginRadiusSSO.isNotLoginThenLogout('http://' + window.location.hostname + '/account/logout');
    });
    $('body').on('click', '#customer_logout_link', function() {
      LoginRadiusSSO.logout('/account/logout');
      return false;
    });
  </script>
{ % else %}
  <script type = "text/javascript">
    $(document).ready(function() {
      if (!window.isLoginPage) {
        LoginRadiusSSO.init(raasoption.appName);
        $SL.util.jsonpCall('//' + LoginRadiusSSO.appName + '.hub.loginradius.com/ssologin/login', function(data) {
          if (data.isauthenticated) {
          	window.location.href = '/account/login';
          }
        });
      }
    });
  </script>
{% endif %}
```

##Login
Expand the templates option under the directory 'Template', select 'customers/login.liquid' option, select all, and then delete everything on this page.

**Important:** In this page, you need to make sure jQuery is properly imported, since it varies for different themes. If it does, perfect. If it does not, you can manually import it in the latest version by adding the following line at the top of your page

http://code.jquery.com/jquery-latest.min.js

Then, copy and paste the code from the file 'login.liquid' from the zip folder. This file contains the interface and control for all of the LoginRadius user registration modules, it contains side-by-side social and traditional login interfaces, a message span to show the message, link for 'forgetpassword', and handles for 'forget password' and 'email verification'.

When a user chooses to log in with Twitter, since email is not a mandatory field for Twitter and it usually is for websites, it will populate a form to ask the user to fill in their email address. This is a one-time setup process. When they return, they will be able to directly log in to the system with their email address. As well, the fields in the form can be expanded or customized. For example, the user's address or age can be included.

##Registration
Expand the templates option and click on the 'customers/register.liquid' option to implement the LoginRadius user registration on Shopify's register page. Select everything in the file and replace with the file 'registration.liquid' in the zip folder.

It will generate the user registration form for you with validation logic. All the fields are
customizable, and when the form is being submitted, a verification email will be sent out to the email address that has been just filled in. The user will be officially registered after the verification link has been clicked.

The content of the verification email is also customizable from your LoginRadius Admin-console: side menu >'User Registration' >'Email Settings'.

**Important:** You need to manually setup the email template and map the URL parameter
"vtype=emailverification". Here is a simple template sample:

```
 Hello #Name#, To verify your email, please click on following link and if your
browser does not open it, please copy and paste it in your browser's address bar. #Url#?vtype=emailverification&vtoken=#GUID# Regards, Your Organization name
```

##Theme
The LoginRadius platform is flexible and customizable, so you can always modify it to fit your existing theme or system. However, to customize it might require some HTML and CSS knowledge.

- Social Icons  
  The social icons are generated by HTML and CSS, and they are fully customizable. To modify them, feel free to modify the actual code. Here is a brief example:  
  by default, the "span" to generate the HTML is as follows:

```
 <span datalabelshort="<#=Name #>" datalabel="Sign in with <#= Name #>" onclick="return $SL.util.openWindow('<#=Endpoint#>&is_access_token=true&callback=<#= window.location #>');" class="lrproviderlabel lrslshadedbrickbutton lrflat<#=
Name.toLowerCase()#>">
  <span class="lrslicon lrslicon<#=Name.toLowerCase()#>"></span>
</span>
```

Currently it is displaying "Sign in with Facebook(Provider's name)" inside the icons. What if we just want "Facebook" instead? Go inspect the element and you will see that the content of the "span" is binded with the data attribute like this:

```
 .lr-sl-shaded-brick-frame .lr-sl-shaded-brick-button:after {
  content : attr(data-label);
  display : inline-block;
  margin-left : 10px;
}
```

Modify the HTML template and the data attribute from `datalabel=`, sign in with `<#= Name #>` to `datalabel= <# Name #>`, and you should be good to go.

- Form Fields  
  Each single field has been labeled with different IDs and classes, you can either customize it in CSS or do it in Javascript.

- Custom Fields  
  For custom fields, go to your LoginRadius Admin-console, side menu >"User Registration" >"User Registration Custom Data" at top, and you can set which fields should be shown, and which fields should be added.

- Email Template  
  As mentioned above, go to your LoginRadius Admin-console, side menu >"User Registration">"Email Settings".

If you need more details, please [contact the LoginRadius Support team](http://support.loginradius.com/hc/en-us/requests/new).
