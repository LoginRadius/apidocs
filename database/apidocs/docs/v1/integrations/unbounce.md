# Unbounce

---

The LoginRadius Unbounce integration will allow you to quickly setup a LoginRadius social interface that will pre-populate your Unbounce landing page forms with the users social data.

##LoginRadius Set-up and configuration

1. Login to your LoginRadius account.
2. Create a site and choose "HTML5" in the "Web Technology" dropdown menu on the "Site Configuration Tab". (For more help visit http://support.loginradius.com/hc/en-us/articles/203107235-Social-Login-Implementation-Flow)
3. In the "Website URL" field enter the URL of the page on which you will show social login interface (if it has not already been defined during site creation).
4. Select the required providers in the provider list.
5. Configure all other settings and hit "Save".
6. Create and configure the provider apps as per instructions on your LoginRadius Admin-console->Social Login-> Social Network Configuration section.

##Add the Unbounce form and get Form Action and Page ID

1.Login to your [Unbounce](https://app.unbounce.com/login) account and create a new landing page.

2.From the left-side pane, drag and place a 'form' on the page. Create this form to contain the following fields:

- Name (required)
- Email (required)
- Phone

3.You need to find out the "action" attribute of the form placed in step 2. For this, right-click the form placed on your page and click "inspect element".

![enter image description here](https://apidocs.lrcontent.com/images/7t3QstPVTxWgIIOxu2vt_unbounce1_3083258a5864ca6d240.32271509.png)

![enter image description here](https://apidocs.lrcontent.com/images/2wlsYjQDRsaJsu2cqaUq_unbounce2_2427758a58667e9be30.16415546.png)

Find the "action" attribute. For example, you will find something similar to this:

`<form action="/ftg?pageId=xxxxxxxxxxxx-xxxx-xxxx-xxxxxxxxxx&variant=a" method="POST">`

4.Make a note of the Action and PageId attributes:

`Action = /ftg?pageId=xxxxxxxxxxxx-xxxx-xxxx-xxxxxxxxxx&variant=a`

`PageId= xxxxxxxxxxxx-xxxx-xxxx-xxxxxxxxxx`

##Add the LoginRadius interface with a customized callback URL and FormID

5.Place a "Custom HTML" block on your Unbounce page where you want to show the social Login interface, and place the following code in the HTML block:

```
<div id="interfacecontainerdiv" class="interfacecontainerdiv"></div>
```

6.Click 'JavaScript' on the bottom left of your Unbounce account. Give a name of your choice to this script and select 'head' in the 'Placement'. [This section will contain the HTML5 SDK]

7.Copy the code from 'Add this code to the <head> tag' section if your LoginRadius account, and paste it in the script block mentioned in step 6.

8.Append the following code to the script added in step 7.

```
<script type="text/javascript">
SDK_CODE
</script>
```

9.Download the LoginRadius HTML5 SDK: https://github.com/LoginRadius/html5-sdk

10.Copy the code contained in the "2.0.0.js" file from the LoginRadius SDK, and replace the SDK_CODE in the code placed in step 8 with the copied code. Once finished, hit the "Done" button.

**Note:** Ignore any warnings while saving JavaScript.

11.Click the HTML block placed in step 5 and note down its Id (without '#') from the Id property in the advanced section on the right side panel. We'll use this ID as the InterfaceContainerID.

12.Click the form placed in step 2 and note down its Id (without '#') from the Id property in the advanced section on the right side panel. We'll use this ID as the FormContainerID.

13.Click JavaScript and click "Add" at the top left in the "Manage Scripts" window.

14.Create a new script with any custom name. Select "Head" in the "Placement" options. Callback handling code will be placed in this script.

Place the following code to the script tab after replacing the following tags.

- Replace the FORM_ACTION parameter with the 'Action' parameter noted in Step 4.
- Replace the INTERFACE_CONTAINER parameter with the InterfaceContainerID (step 11).
- Replace the WHITEPAPER_URL parameter with the whitepaper URL you want your users to download.
- Replace the FORM_CONTAINER parameter with the FormContainerID (step 12).

```
<script type="text/javascript">

// callback handling

LoginRadiusSDK.onlogin = Successfullylogin;

function Successfullylogin() {

                LoginRadiusSDK.getUserprofile(function (data) {

                  //$('#lrFormContainer').html(JSON.stringify(data));

      var name = "";

     if(data.FirstName != null && data.FirstName != ""){

        name += data.FirstName;

      }

      if(data.LastName != null && data.LastName != ""){

        name += " "+data.LastName;

      }

      $('#name').val(name);

                  if(data.Email != null && typeof data.Email[0] != "undefined"){

                                $('#email').val(data.Email[0].Value);

                  }

      if(data.Email == null || typeof data.Email[0] == "undefined" || data.Email[0].Value == ""){

        $('#INTERFACE_CONTAINER').html('');

        $('#INTERFACE_CONTAINER').append($('#FORM_CONTAINER')).css('height', '262px');

        $('#FORM_CONTAINER').css({'display': 'block', 'position':'static'});

      }else{

        // submit form

        var formdata = $('#FORM_CONTAINER').find('form').serialize();

        $.ajax({

          type: "POST",

          url: "FORM_ACTION",

          data: formdata,

          success:function(data){

          location.href = "WHITEPAPER_URL";

          }

        });

      }

    });

 return false;

};

</script>
```

Check the 'jQuery' option in the bottom left and hit the 'Done' button.

**Note:** Ignore any warnings while saving JavaScript.

15.Hit Save at the top left and publish the page.

**TIP 1:** How to keep a landing page with social login

###Disable Form Option

If you want to hide the form, follow the steps mentioned below:

Click "Stylesheets" on the bottom left and add the following CSS (replace FORM_CONTAINER in the CSS below with the id noted in step 13):

```
<style type="text/css">

#FORM_CONTAINER {

    display:none

</style>
```

Whitepaper download on form submission (When using Form option)

To make the user download the whitepaper on form submission, follow the steps mentioned below:

Make the following changes to the form placed in the step 2:

- Click the "Submit" button in the form and change its text to "Download" or a different option that suits your needs.
- Click the form and select "Show form confirmation dialog" in the "Confirmation" option on the right side.
- Switch to the "Form Confirmation Dialog" tab from the top left.
- Place a button on the left-hand side (widget panel) of the form confirmation dialog.
- Click the button and change its "Label Text" property to something similar to "Download Whitepaper".
- In the "Action" property on the right-hand side, you can specify an external URL (to download whitepaper) in "Go to URL" action, OR choose "Download File". Upload and specify the file to download.
- **TIP 2**: HTML5 is not supported with the old browsers such as IE7, IE8 and IE9. Use this code to show traditional forms for these old browsers.

Append the following code after the code placed in step 15 and save the page:

**Note:** Make sure to change the FormContainerID (Step-12).

```
<script type="text/javascript">

var ie = (function(){

    var undef,

        v = 3,

        div = document.createElement('div'),

        all = div.getElementsByTagName('i');

    while (

        div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',

        all[0]

    );

    return v > 4 ? v : undef;

}());

  window.onload = function(){

  if(typeof ie != "undefined"){

    $('#interfacecontainerdiv').css('display', 'none');

    $('#FormContainerID').css('display', 'block');

  }

  }

</script>
```

**Note:** Ignore any warnings while saving JavaScript
