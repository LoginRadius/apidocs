# Shopify- Cloud API

---

This section goes over integrating LoginRadius Interfaces in your Shopify Site

##Introduction
To implement LoginRadius User Registration and SSO in Shopify, it requires editing a few of Shopify's .liquid files, you can do it easily with a theme editor, follow these instructions to open your Shopify theme editor:

1. Login to admin
2. Click on 'Theme' in the left side menu
3. Click on drop down '...' and select the 'Edit HTML/CSS' option  
   After opening the theme editor, follow the following steps to implement LoginRadius User
   Registration.

##Upload assets
First of all, extract the zip file you get from [LoginRadius Github](https://github.com/LoginRadius/shopify-identity-plugin) and upload the Javascript and css files into your theme:

**Contents:**

- raas-settings.js - The javascript file that handles the LoginRadius initializations and functionality. More details on how the various calls in this file work can be found [here](/api/v1/user-registration/user-registration-getting-started).
- lr-raas-style.css - The default Styles applied to the LoginRadius interfaces.
- register.liquid - A sample Register .liquid file.
- login.liquid - A sample Login .liquid file.

1. Extract 'Shopify.Assets', inside the folder there are several files you are going to use for your LoginRadius Shopify Implementation.
2. Expand 'Assets' option in your Shopify theme editor and click on 'Add a new assets' in the Shopify theme editor.
3. Select both files and upload.
4. If you are going to use the default social icon theme as well, you also need to upload two image files inside the same folder "iconsprite.svg" and "iconsprite32.png".

##Edit 'theme.liquid' file
In the left side theme editor menu there is a theme file explorer, this expands the 'Layouts'
option, click on the 'theme.liquid' file.

##Add LoginRadius core JS file and theme css
Add the following tags just before the </head> (closing head tag) tag

```
{{ 'lr-raas-style.css' | asset_url | stylesheet_tag }}
{{ 'https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js' | script_tag }}
{{ 'https://auth.lrcontent.com/v1/js/LoginRadiusRaaS.js' | script_tag }}
{{ 'https://auth.lrcontent.com/v1/js/LoginRadiusSSO.js' | script_tag }}
```

##Initialize LoginRadius user registration options
LoginRadius user registration requires some options; apikey and appname, add the following
script just before the </body> (closing body tag) and make sure to replace <API KEY> and

<APP NAME> with the LoginRadius API KEY and Site Name respectively provided on your
LoginRadius site settings page

```
<script type="text/javascript">
var raasoption = {};
raasoption.apikey = "<API KEY>";
raasoption.appName = "<APP NAME>";
raasoption.emailVerificationUrl=escape("{{ shop.domain }}");
raasoption.forgotPasswordUrl=escape("{{ shop.domain }}");
raasoption.V2RecaptchaSiteKey="<your custom Vcaptcha Key>";
var lrshopifystore="{{ shop.name }}";
</script>
```

##Add LoginRadius User Registration Shopify extension library
Add the following tag just after the 'Options initialization script'

```
 {{ 'raas-settings.js' | asset_url | script_tag }}
```

##Add SSO code
To achieve the best practice for LoginRadius SSO, simply add the following two code blocks to each page where single sign on is required, since for most cases it needs to work on every page, we will add them to our theme.liquid file. The first code block is for the scenario when this user is not logged into Shopify but he is logged in from other SSO family sites. The second one is used after this user is logged into Shopify, but has been logged out from other SSO family sites. Put it just after 'raassettings.
js' script tag from the above steps.

```
{% if customer %}
  <script type = "text/javascript">
    $(document).ready(function() {
      LoginRadiusSSO.init(raasoption.appName);

      jsonpCall('//' + raasoption.appName + '.hub.loginradius.com/ssologin/login', function (data) {
        if (!data.isauthenticated) {
          window.location = 'http://{{ shop.domain }}/account/logout';
        }
      });

      $('body').on('click', '.customer-logout-link', function() {
        LoginRadiusSSO.logout('/account/logout');
        return false;
      });
    });

  </script>
{% else %}
  <script type = "text/javascript">

    $(document).ready(function() {

      LoginRadiusSSO.init(raasoption.appName);

      jsonpCall('//' + raasoption.appName + '.hub.loginradius.com/ssologin/login', function (data) {
        if (data.isauthenticated) {
          exchangeMultipassToken(data.token, function(data) {
            $.ajax({
              method: "GET",
              url: data.url
            })
            .done(function() {
              window.location.reload();
            })
            .fail(function(jqXHR, textStatus) {
              console.error( "Login Request failed: " + textStatus );
            });
          });
        }
      });
    });

  </script>
{% endif %}
```

##Login
Expand templates option under directory 'Template', select 'customers/login.liquid' option, select all and then delete everything on this page.

**Important:** In this page you need to make sure Jquery is properly imported, since it varies for different themes, if it does, perfect. If it does not, you can import it in the latest version manually by adding the following line at the top of your page

http://code.jquery.com/jquery-latest.min.js

Then copy and paste the code from the file 'login.liquid' from the zip folder. This file contains the interface and control for all the LoginRadius User Registration modules, it contains sidebyside social and traditional login interfaces, a message span to show the message, link for 'forgetpassword', and handles for 'forget password' and 'email verification'.

When a user chooses to login with Twitter, since email is not a mandatory field for Twitter but usually it is for sites, it will populate a form to ask the user to fill in their email address. This is a one time setup process and next time they can login into the system with their email address directly. And the fields can be expanded or customized, for example user's address or age can be included.

##Registration
Expand the templates option and click on the 'customers/register.liquid' option, to implement LoginRadius User Registration register on Shopify Register page. Select everything in the file and replace with the file 'registration.liquid' in the zip folder.

It will generate the user registration form for you with validation logic. All the fields are
customizable, when the form is being submitted, a verification email will be sent out to the email address that has been just filled in. The user will be officially registered after the verification link has been clicked.

The content of the verification email is also customizable in your LoginRadius Admin-console, side menu >'User Registration' >'Email Settings'.

**Important:** You need to manually setup the email template and map the url parameter
"vtype=emailverification", here is simple template sample:

```
 Hello #Name#, To verify your email, please click on following link and if your
browser does not open it, please copy and paste it in your browser's address bar. #Url#?vtype=emailverification&vtoken=#GUID# Regards, Your Organization name
```

##Theme
Pretty much everything in LoginRadius is customizable, so you can always modify it to fit your existing theme or system, but to customize it, it might require some Html and CSS knowledge.

- Social Icons  
  The social icons are generated by html and css, they are fully customizable, to modify them, feel free to modify the actual code. Here is a brief example:  
  By default the "span" to generate the html is like this:

```
 <span datalabelshort="<#=Name #>" datalabel="Sign in with <#= Name #>" onclick="return $SL.util.openWindow('<#=Endpoint#>&is_access_token=true&callback=<#= window.location #>');" class="lrproviderlabel lrslshadedbrickbutton lrflat<#=
Name.toLowerCase()#>">
  <span class="lrslicon lrslicon<#=Name.toLowerCase()#>"></span>
</span>
```

Right now it is saying "Sign in with Facebook(Provider's name)" inside the icons, what if we just want "Facebook" instead? Just go inspect the element, you will see the content of the "span" is binded with the data attribute like this:

```
 .lr-sl-shaded-brick-frame .lr-sl-shaded-brick-button:after {
  content : attr(data-label);
  display : inline-block;
  margin-left : 10px;
}
```

Just go modify the html template and the data attribute from `datalabel=` Sign in with `<#= Name #>` to `datalabel= <# Name #>`, you should be good to go.

- Form Fields  
  Each single field has been labeled with different IDs and classes, you can either customize it in CSS or do it in Javascript.

- Custom Fields or Objects  
  For custom fields or objects, go to your LoginRadius Admin-console->API Configuration->Registration Service, you can set which fields should be shown, and which fields should be added.
- Email Template  
  Go to your LoginRadius Admin Console ➔ Deployment ➔ Email Workflow To customize the email templates and functionality.

If you need more details, please contact LoginRadius support: support@loginradius.com .
