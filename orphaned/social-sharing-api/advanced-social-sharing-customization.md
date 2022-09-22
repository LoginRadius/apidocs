Advanced Social Sharing Customization
===
----

This section goes over the advanced customizations that are available in with the Social Sharing Interfaces.


##Custom Icons
 **1.Create your custom CSS with your custom provider icons sprite**

```
/ CSS Document /
.custom_lrshare_iconsprite{your sharing interface size like 16,32}{
     width:80px;
     height:34px;
     background-image:url('lr_provider_sprite.png');
     cursor:pointer;
     display:block;
     margin:0auto;
     position:relative;
     z-index:9998;
     outline:0;
}
/icons sprite /
.custom_lrshare_facebook:hover{ width:38px;height:38px;background-position:0px-912px;padding-left:5px;  }
.custom_lrshare_facebook { width:38px;height:38px;background-position:0px-912px;padding-left:5px;   }
.custom_lrshare_google:hover{ width:38px;height:38px;background-position:0px-798px;padding-left:5px;  }
.custom_lrshare_google { width:38px;height:38px;background-position:0px-798px;padding-left:5px;}
.custom_lrshare_linkedin:hover{ width:38px;height:38px;background-position:0px-684px;padding-left:5px;  }
.custom_lrshare_linkedin { width:38px;height:38px;background-position:0px-684px;padding-left:5px;  }
.custom_lrshare_twitter:hover{ width:38px;height:38px;background-position:0px-190px;padding-left:5px;  }
.custom_lrshare_twitter { width:38px;height:38px;background-position:0px-190px;padding-left:5px;  }
.custom_lrshare_yahoo:hover{ width:38px;height:38px;background-position:0px0px;padding-left:5px;  }
.custom_lrshare_yahoo { width:38px;height:38px;background-position:0px0px;padding-left:5px;   }
```
<br>
  **2.Add CSS to your web page**

```
<link href="Content/js/customstyle.css" rel="stylesheet" type="text/css" />
```
<br>
**3.Add the LoginRadius Sharing JS**
```
<script type="text/javascript">
    LoginRadius.util.ready(function(){
        $i = $SS.Interface.horizontal; $SS.Providers.Top={"Facebook","Twitter","LinkedIn","Google","GooglePlus","Email","Digg","Vkontakte","Tumblr","MySpace"];
        $u = LoginRadius.user_settings; $u.sharecounttype ='url'; $u.apikey ='your api key';
        $SS.isCustomcss ='true';
        $SS.url ='<Share URL>';
        $i.size =32; $i.show("lrsharecontainer");
    });
</script>
```
<br>
##Custom Tittle, URL, Description and Image for Each Post
For instances where you have multiple posts in your website and you want to share a different URL, title, description and image according to each post.
```
<script type="text/JavaScript">
    LoginRadius.util.ready (function(){
        $i = $SS.Interface.horizontal; $SS.Providers.Top =["Facebook","Twitter","LinkedIn","GooglePlus"];
        $u = LoginRadius.user_settings; $u.sharecounttype ='url';
        $SS.url ='<Custom Shared URL>';
        $SS.title ='<Custom Shared Title>'; $SS.description ='<Custom Share Description>';
        $SS.imageurl='<Custom Image URL>'
        $u.apikey ='<LoginRadius API Key>';$i.size =32; $i.show("lrsharecontainer");
    });
</script>
//First Post
div class=’lrsharecontainer’ data-share-title='<Custom Shared Title 1>' data-share-description='<Custom Share Description 1>' data-share-imageurl='<Custom Image URL 1>'>my first post
//Second Post
div class=’lrsharecontainer’ data-share-title='<Custom Shared Title 2>' data-share-description=' <Custom Share Description 2>' data-share-imageurl='<Custom Image URL 2>'>my second post
//Third Post
div class=’lrsharecontainer’ data-share-title='<Custom Shared Title 3>' data-share-description='<Custom Share Description 3>' data-share-imageurl='<Custom Image URL 3>'>my third post

```
<br>
##Adding Twitter Mentions
You can add in mentions to your Twitter shares by including the `$u.twittermention` parameter in the sharing widget. This will append the specified mentions after the URL in the format `@mention`.
```
<script type="text/JavaScript">
    LoginRadius.util.ready (function () {
          $i = $SS.Interface.horizontal; $SS.Providers.Top =
          ["Facebook", "Twitter", "LinkedIn","GooglePlus"]
          $u = LoginRadius.user_settings; $u.sharecounttype = 'url';
          $u.twittermention ='Loginradius,YourFriend';
          $u.apikey = '<LoginRadius API Key>';$i.size = 32; $i.show("lrsharecontainer");
    });
</script>
```

**Note:** You can add in multiple mentions by comma separating them, displayed above.

<br>
##Adding Twitter Hashtags
You can add in Hashtags to your Twitter Shares by including the `$u.twitterhashtags` parameter in the sharing widget. This will append the specified word with a prepended # after the URL in the format of `#hashtag`.
```
<script type="text/JavaScript">
    LoginRadius.util.ready (function () {
          $i = $SS.Interface.horizontal; $SS.Providers.Top =
          ["Facebook", "Twitter", "LinkedIn","GooglePlus"]
          $u = LoginRadius.user_settings; $u.sharecounttype = 'url';
          $u.twitterhashtags = 'LoginRadius, Awesome';
          $u.apikey = '<LoginRadius API Key>';$i.size = 32; $i.show("lrsharecontainer");
    });
</script>
```

**Note:** You can add in multiple hashtags by comma separating them, displayed above.

<br>
##Removing the More Providers Pop-up
You can remove the more providers popup by adding in a global variable before the LoginRadius Sharing JavaScript.
```
<script type="text/JavaScript"> var ismorepopup= 'false'</script>
    <script type="text/JavaScript">
        LoginRadius.util.ready (function () {
              $i = $SS.Interface.horizontal; $SS.Providers.Top = ["Facebook", "Twitter", "LinkedIn","GooglePlus"];
              $u = LoginRadius.user_settings; $u.sharecounttype = 'url';
              $u.apikey = '<LoginRadius API Key>';$i.size = 32; $i.show("lrsharecontainer");
        });
    </script>
```
Before (isevenmorepopup=’true’):

![enter image description here](https://apidocs.lrcontent.com/images/Beforeeven_2855658abd32dda2c65.40453530.png "")

<br>
After (isevenmorepopup=’false’):
![enter image description here](https://apidocs.lrcontent.com/images/AfterEven_1375758abd35dabc559.09078849.png "")

<br>
##Displaying A Mobile Friendly Interface
To make the LoginRadius Sharing interfaces compatible with mobile systems you can include the `$u.isMobileFriendly=true;` parameter into the sharing scripts.

<br>
##Provider Specific Custom URLS and Follows
Use this feature to configure separate URLs to be shared with the Social counter interfaces. This is also used to configure the Follow/Mention/Hashtag options.

**Use the following initialization:**
```
$SC.Providers.Customize = [{ 'provider': '<provider_name>', 'url': '<provider_url>' },{ 'provider': '<provider_name_2>', 'url': '<provider_url_2>' }];
```
Ex:
```
$SC.Providers.Customize = [{ 'provider': 'Twitter Follow', 'url': 'https://twitter.com/loginradius' },{ 'provider': 'Facebook Share', 'url': 'https://facebook.com/loginradius' }];
```
<br>

|Provider Name|Url (example)|
|---|---|
|Facebook Share|`<Any Url>`|
|Facebook Follow|`<Any Facebook Page>` (www.facebook.com/loginradius)|
|Twitter Follow|`<Any Twitter Page>` (www.twitter.com/loginradius) or `<Any Twitter Page Name>` (loginradius)|
|Twitter Hashtag|`<Any Twitter HashTag>` (loginradius)|
|Twitter Mention|`<Any Twitter Screen Name>` (loginradius)|
|LinkedIn Follow|`<Enter a company or Showcase Page id in Linkedin>` ( Please visit https://developers.linkedin.com/plugins/follow-company?button-type-count-top=true to get the ID)|
|Youtube Subscribe|Youtube Channel Name (loginradius)|
|Google+ Follow|`<Any Google Plus Page>` (https://plus.google.com/+loginradius)|
|PInterest Follow Button|`<Any Pinterest Page Url>` (http://www.pinterest.com/loginradius/)|
|FourSquare Follow Button|`<FourSquare Page Id>`|
|Vkontakte Share|`<Any Share Url>`,for this widget you need to add its javascript file above sharing js file <br>`<script src="http://vk.com/js/api/share.js?90"></script>`|

<br>
##Provider Specific Short URL
This is used to set the usage of the LoginRadius "ish.re" short-URL for specific social providers.

**Use the following initialization:**
```
$SS.Providers.Customize = [{ 'provider': 'Facebook',  'shorturl': false},
{ 'provider': 'Twitter', 'shorturl': true }, { 'provider': 'Email', 'shorturl': true }];
```
Setting short-URL to true will show the short-URL of the website which is to be shared to the user.

Ex: "[www.loginradius.com](https://www.loginradius.com)" is the long URL and "ish.re/5645" might be the short-URL for the above site.

<br>
##Provider Specific Tittle, Description, and Image URL
You can set custom content for different providers using the Customize parameter. This allows you to included custom content for different Social providers:

Ex:
```
 $SS.Providers.Customize = [{ 'provider': 'Facebook', 'title': 'hello custom facebook title', 'description': 'hello custom facebook description','imageUrl':'http://www.xyz.com/a.png' },
{ 'provider': 'Twitter', 'shorturl': true, 'title': 'hello custom twitter title', 'description': 'hello custom twitter description' }, { 'provider': 'Email', 'shorturl': true }];
```

<br>
##Custom Email Interface
Use these options in your social sharing interface script to customize the interface displayed by clicking on the email sharing option.

 - $u.emailMessage='' (optional Message)
 - $u.emailSubject= '' (optional Subject)
 - $u.isEmailContentReadOnly = true; (to make email’s subject and message field content readonly)

<br>
##Custom Sharing in Facebook
Add following parameters in the sharing script for custom content to work with Facebook sharing:
```
$SS.facebookappid=’<your Facebook AppID>’;
$SS.redirecturi=’<Your Facebook RedirectURI>’;

<script type="text/JavaScript">
   LoginRadius.util.ready (function(){
        $i = $SS.Interface.horizontal; $SS.Providers.Top =["Facebook","Twitter","LinkedIn","GooglePlus"];
        $u = LoginRadius.user_settings; $u.sharecounttype ='url';
        $SS.title ='<Custom Shared Title>'; $SS.description ='<Custom Share Description>';
        $SS.facebookappid='<your Facebook AppID>'; $SS.redirecturi='<Your Facebook RedirectURI>';
        $u.apikey ='<LoginRadius API Key>';$i.size =32; $i.show("lrsharecontainer");
   });
</script>
```
In the above code:

 - Your Facebook App ID: Facebook App ID (Create a Facebook app at [https://developers.facebook.com/](https://developers.facebook.com/) to get your App ID)
 - Your Redirect URL: URL of the webpage where you want to redirect a user to after the content is shared on Facebook. Save this URL in the "Site URL" option of your Facebook App. This redirect URL is opened in the popup (that handled the Facebook sharing interface), so you need to handle on the server side logic to close the popup and redirect the user to your desired page. You will need to add the domain you are redirecting to in your Facebook App ->Settings->Basic->App Domains

<br>
##Facebook Share Location Selector
Use this option to display the old style Facebook share interface which allows users to select where the shared content will be pushed to.
```
$SS.facebookPrivacyShare = true;
```

<br>
##Display/Hide the Hybrid Share Interface Counter
Use this option in your interface script to toggle the display of the total share count with the hybrid interfaces.
```
$SS.isTotalShare = true/false;
```
**Note:** This is set to true by default, setting to false will hide the counter.

<br>
##Customize Providers Included in the Evenmore Pop-up
Use this option in your interface script to define the providers that will be displayed to a user when clicking on the, even more, provider's option of the share interface.

Use the following initialization:
```
$SS.Providers.evenMore = ["Provider1", "Provider2"];
```
Ex:
```
$SS.Providers.evenMore = ["Facebook", "Twitter", "GooglePlus", "LinkedIn"];
```
**Note:** The above example will cause only the 4 specified providers to be displayed in the evenmore popup.

<br>
###Available Parameters
|Parameter|Type|Description|Required|
|-|-|-|-|
|$u.apikey|GUID|The LoginRadius API key found on your LoginRadius Admin Console. Default API key is LoginRadius test key which will prevent you from viewing analytics for your shares.|No|
|$u.hybridsharing|Bool|Defines whether you are using the counters on your social sharing widget. Default value is false.|No|
|$u.sharecounttype|enum: web/url|Changes the type of share counters that are displayed on your interface. Default value is "web"|No|
|$u.twittermention|String|Appends mentions to a Tweet. Multiple mentions can be added comma separated. Default value is empty string.|No|
|$u.twitterrelated|String|Appends mentions to a Tweet with "via" before the mentions. Default value is blank.|No|
|$u.isMobileFriendly|Bool|Displays a mobile-friendly interface. Default value is false|No|
|$u.twitterhashtags|String|Appends hashtags to your Tweet, these can also be added directly in the message body as well. Default value is blank string.|No|
|$u.isEmailContentReadOnly|Bool|Makes email subject and message content readonly|No|
|$u.emailMessage|String|Sets the predefined email message when using the Social Sharing email option|No|
|$u.emailSubject|String|Sets the predefined email subject when using the Social Sharing email option|No|
|$SS.url|URL|The URL that you want to be included in the share. Default value is the current pages URL|No|
|$SS.title|String|Title of the share. Default value is the title of the current page.|No|
|$SS.description|String|The description/body of the share. Default value is a blank string.|No|
|$SS.imageurl|URL|The URL of the image that you would like included in the share. Default value is blank.|No|
|$SS.facebookappid|String|If you want to use the default Facebook sharing interface. Default value is LoginRadius' predefined key.|No|
|$SS.redirecturi|URL|Location that the popup will redirect to after a Facebook share if you have used the default Facebook sharing interface. Default value is http://hub.loginradius.com/ShareSuccess.htm |No|
|$SS.isCustomcss|Bool|Set to true if you want to include your own custom CSS for the sharing interface. If true it will not load LoginRadius' CSS. Default value is false.|No|
|$SS.isTotalShare|Bool|Sets whether the counter is displayed on the Hybrid Sharing interface|No|
|$SS.Providers.evenMore|Array|Defines the list of providers that will be displayed in the, even more, popup option|No|
|$SS.facebookPrivacyShare|Bool|Used to specify the usage of the older style Facebook share interface which allows a user to select the location a share is posted to|No|
|$SS.Providers.Customize|Object Array|Used to specify custom parameters/share URLs for individual providers.|No|
|islrsharing|Bool|Global variable defined before the interface script, this should be set if you want to use sharing on your page. Default value is false.|No|
|islrsocialcounter|Bool|Global variable defined before the interface script, this should be set if you want to use social sharing counters on your page. Default value is false|No|
|ismorepopup|String|Global variable set to "true" or "false" which determines whether the more option is displayed in the Social Sharing interface|No|
|isevenmorepopup|String|Global variable set to "true" or "false" which determines whether the, even more, option is displayed in the more popup|No|
|data-share-url|URL|Used to define URL for individual share interfaces on a single page. Over-rides the `$SS.url`. Default value is `$SS.url`.|No|
|data-share-title|String|Used to define the title for individual share interfaces on a single page. Over-rides the `$SS.title`. Default value is `$SS.title`.|No|
|data-share-description|String|Used to define the description for individual share interfaces on a single page. Over-rides the $SS.description. Default value is `$SS.description`.|No|
|data-share-imageurl|URL|Used to define image URL for individual share interfaces on a single page. Over-rides the `$SS.imageurl`. Default value is `$SS.imageurl`.|No|
|data-counter-url|URL|Used to define URL for individual share interfaces on a single page. Over-rides the `$SS.url` and is only applicable when using counter interfaces. Default value is `$SS.imageurl`.|No|
|$SS.urlShorten|Bool|Used to determine whether or not to use the ish.re URL shortener. Default value is true.|No|
|$SS.openSingleWindow|Bool|Used to determine whether the sharing interface will open in a new popup or replace the existing popup interface. Default set to true which will replace the existing popup|No|
|$SS.isTrackReferralsEnabled|Bool|Used when you are using the full URL instead of shortened URL to disable tracking referrals. We are adding ‘?lrstc=TZLN’ the parameter in the query string for referral tracking. Default to true.|No|

<br>
##Examples of Sharing Interfaces
**Sharing Interfaces:**

![enter image description here](https://apidocs.lrcontent.com/images/Sharinginterfaces_1285858abe02d6e7c54.70844158.png "")

```
<script type="text/JavaScript">
    LoginRadius.util.ready (function () {
          $i = $SS.Interface.horizontal; $SS.Providers.Top = ["Facebook", "Twitter", "LinkedIn","GooglePlu
          $u = LoginRadius.user_settings; $u.sharecounttype = 'url';
          $u.isMobileFriendly=true;
          $SS.title = 'LoginRadius Sharing';
          $u.apikey = '<LoginRadius API Key>';$i.size = 32; $i.show("lrsharecontainer");
    });
</script>
```
<br>
**Counter Interfaces:**

![enter image description here](https://apidocs.lrcontent.com/images/CounterInterfaces_2503858abe056867718.72898566.png "")
```
<script type="text/JavaScript">
    LoginRadius.util.ready (function () {
          $i = $SS.Interface.horizontal; $SS.Providers.Top = ["Facebook", "Twitter", "LinkedIn","GooglePlu
          $u = LoginRadius.user_settings; $u.sharecounttype = 'url';
          $u.isMobileFriendly=true;
          $SS.title = 'LoginRadius Sharing';
          $u.apikey = '<LoginRadius API Key>';$i.size = 32; $i.show("lrsharecontainer");
    });
</script>
```
<br>
**The Mobile Friendly Interface:**

![enter image description here](https://apidocs.lrcontent.com/images/MobileFriendlyInterface_1263558abe11d57f6d6.48869700.png "")