# Multiple Social Apps

LoginRadius supports the configuration of a number of social ID providers, as well as multiple options to request data from the social providers and from the customers. With stricter privacy policies and regulations, we also have documents on app review submissions if it is required by the configured social ID provider.
 
Along with configuring the social provider, we also provide a feature that allows multiple apps of the same social provider over the Login/Registration page. At present, this feature can only be activated for the following social providers:

- Google

- Twitter

- Facebook

- Apple

- LinkedIn

- Live
 
> **Note:** This is a new feature that has to be enabled. You can raise a request for it through [LoginRadius support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

## Multiple App Configuration Guide

This guide will take you through the process of setting up multiple apps of the same social provider on your LoginRadius Login/Registration page. 

This can be achieved by following the steps given below:


### Step 1: Configuring the new App

In order to create a new application of the same social provider, you need to add the new app details as shown in the below steps:

- Go to [**Admin Console -> Platform Configuration -> Authentication Configuration -> Social Login -> Social Providers**](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/social-login/social-providers)
- Click on the desired social provider, which exists on the Login/Registration page already.
- Now Click on **Add App**.

  ![Social Login](https://apidocs.lrcontent.com/images/Social-Login-LoginRadius-User-Dashboard_427591137655b07007cb546.27422591.png "enter image title here")

- Now, fill in the required configuration fields that you would have obtained by following the configuration steps given by the selected provider.

  ![Social Login Configuration](https://apidocs.lrcontent.com/images/Social-Login-LoginRadius-Config_1526663214655b0a6293e3f2.93927381.png "enter image title here")

- Click on **Save**.

### Step 2: Customizing the IDX Pages

Now, you need to add the relevant scripts based on this functionality in our IDX page files, to do that, follow the steps given below:

- Go to [**Admin Console -> Deployment -> Identity Experience Framework**](https://adminconsole.loginradius.com/deployment/idx) and select the **Advance Theme Editor** option of the selected theme.
- Now, you need to add the script to both your Authentication and Profile page files.

**For Authentication Page:**

 - In the **End Script** file, add the below script and click on **Save**.

  ```
  const TEXT_LENGTH=40;

  // Here 40 is the defined character for the name of your new app, you can customize it as per your requirement.

  const PROVIDER_ARRAY=["Google",
  "Apple",
  "Facebook",
  "LinkedIn",
  "Live",
  "Twitter",
  "Wordpress",
  "Odnoklassniki",
  "Sinaweibo",
  "Yahoo",
  "Foursquare",
  "Salesforce",
  "Mailru",
  "Paypal",
  "QQ",
  "Amazon",
  "Disqus",
  "Github",
  "Pinterest",
  "Line",
  "Vkontakte",
  "Login with Facebook",
  "Login with Google",
  "Login with Twitter",
  "Login with Apple",
  "Login with LinkedIn",
  "Login with Live",
  "Login with Wordpress",
  "Login with Odnoklassniki",
  "Login with SinaWeibo",
  "Login with Yahoo",
  "Login with FourSquare",
  "Login with Salesforce",
  "Login with Mailru",
  "Login with Paypal",
  "Login with QQ",
  "Login with Amazon",
  "Login with Disqus",
  "Login with Github",
  "Login with Pinterest",
  "Login with Line",
  "Login with Vkontakte",
  ];
  var waitForEl = function(selector, callback) {
    if (jQuery(selector).length) {
      callback();
    } else {
      setTimeout(function() {
        waitForEl(selector, callback);
      }, 1);
    }
  };

  waitForEl(".lr-sl-shaded-brick-frame", function() {
          waitForEl(".lr-provider-label", function() {
                let elementAuth=$(".lr-provider-label");
                for(let i=0; i < elementAuth.length; i++){
                let p= elementAuth[i].className;
                $(elementAuth[i]).removeClass(p);
                $(elementAuth[i]).addClass(p.replace('_',' '));
                }
                let elementAuthIcon=$(".lr-sl-icon");
                for(let i=0; i < elementAuthIcon.length; i++){
                let p= elementAuthIcon[i].className;
                $(elementAuthIcon[i]).removeClass(p);
                $(elementAuthIcon[i]).addClass(p.replace('_',' '));
                let text=$(elementAuthIcon[i]).parent().text();
                if(PROVIDER_ARRAY.includes(text.trim()) && text!=="")
                  $(elementAuthIcon[i]).parent().text("").append(text.trim());
                  else if(!PROVIDER_ARRAY.includes(text.trim()) && text.trim()!=="")
                    $(elementAuthIcon[i]).parent().text("").append("Login with "+(text.match(/_/)?text.split("_")[1].substring(0,TEXT_LENGTH).trim():text));
                }
                let elementAuthIcon1=document.getElementsByClassName("lr-provider-provider-name")
                for(let i=0; i < elementAuthIcon1.length; i++){
                  let text=elementAuthIcon1[i].innerText;
                    if(PROVIDER_ARRAY.includes(text.trim()) && text!=="")
                      elementAuthIcon1[i].innerText=text.substring(0,TEXT_LENGTH).trim();
                    else if(!PROVIDER_ARRAY.includes(text.trim()) && text!=="")
                      elementAuthIcon1[i].innerText=text.match(/_/)?text.split("_")[1].substring(0,TEXT_LENGTH).trim():text.substring(0,TEXT_LENGTH).trim();
                }
            let elementAuthIcon2=document.getElementsByClassName("lr-provider-wrapper")
                for(let i=0; i < elementAuthIcon2.length; i++){
                  let text=(elementAuthIcon2[i]).firstChild.nextSibling.innerText
                    if(PROVIDER_ARRAY.includes(text.trim()) && text!=="")
                      (elementAuthIcon2[i]).firstChild.nextSibling.innerText=text.substring(0,TEXT_LENGTH).trim();
                    else
                      (elementAuthIcon2[i]).firstChild.nextSibling.innerText=text.match(/_/)?text.split("_")[1].substring(0,TEXT_LENGTH).trim():text.substring(0,TEXT_LENGTH).trim(); 
                }
          });
  });
  waitForEl(".interfacecontainerdiv", function() {
    //Auth
        waitForEl(".lr-provider-label", function() {
                    let elementAuth=$(".lr-provider-label");
                    for(let i=0; i < elementAuth.length; i++){
                    let p= elementAuth[i].className;
                    $(elementAuth[i]).removeClass(p);
                    $(elementAuth[i]).addClass(p.replace('_',' '));
                    }
                    let elementAuthIcon=$(".lr-sl-icon");
                    for(let i=0; i < elementAuthIcon.length; i++){
                    let p= elementAuthIcon[i].className;
                    $(elementAuthIcon[i]).addClass(p.replace('_',' '));
                    }
        });
  });
  ```

**For Profile Page:**

In the **End Script** file, add the below script and click on **Save**.

```
var waitForEl = function(selector, callback) {
  if (jQuery(selector).length) {
    callback();
  } else {
    setTimeout(function() {
      waitForEl(selector, callback);
    }, 1);
  }
};

waitForEl(".lr-social-icon", function() {
 //Profile 
  let elementProfileIcon=$(".lr-social-icon");
  for(let i=0; i < elementProfileIcon.length; i++){
  let p= elementProfileIcon[i].className.replace('_',' ');
  $(elementProfileIcon[i]).removeClass(p);
  $(elementProfileIcon[i]).addClass(p.replace('_',' '));
  }
});
```

After doing the above configuration, you can create multiple instances of the same social provider on your Login/Registration page, and they will appear as given in the screenshot below.

![](https://apidocs.lrcontent.com/images/msa3_123075f7f00fb5c1d39.92187022.png)

![](https://apidocs.lrcontent.com/images/msa4_255845f7f01117439a1.55991557.png )


