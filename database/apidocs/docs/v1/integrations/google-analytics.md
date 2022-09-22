# Google Analytics

---

Google analytics is usually the first choice when people want to analyze activity on their site. This is because it not only provide information on users, such as their locations, languages, or which kind of device they are using to browse a given site, but with some customization, it can also track the behaviour and events occurring on the site. It can be very helpful to figure out which button has the most clicks or which social provider is favoured by your users. (See what Google Analytics can do [here](https://www.google.com/analytics))

All of the features above are done by the Google Analytics JavaScript code, which is known as analytics.js or universal JavaScript, and it would be a very good practice for LoginRadius users to combine it with the LoginRadius analytics tracking code. There are three major benefits in doing this:1. Automatically track events which are happening; 2. Assign unique social IDs to users in order to gain more precise results; 3. Customize the advanced tracking in a very simple way.

- The basic implementation takes about 20 minutes.

\*\* Before you go any further, make sure your Google Analytics has been activated. It may take up to 24 hrs for it to activate for the first time.

###Video

<iframe src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fplayer.vimeo.com%2Fvideo%2F130800710&url=https%3A%2F%2Fplayer.vimeo.com%2Fvideo%2F130800710&image=http%3A%2F%2Fi.vimeocdn.com%2Fvideo%2F522794074_640.jpg&key=02466f963b9b4bb8845a05b53d3235d7&type=text%2Fhtml&schema=vimeo" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

###Implementation
####Implement basic tracking
To implement this feature, you will first need the following JavaScript files (you probably have some of it already, feel free to skip it, but make sure the order of the scripts are correct).

```
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
```

####LoginRadius HTML5 SDK JS
Get it [here](https://github.com/LoginRadius/HTML5-SDK).

LoginRadius Login Interface Js  
For testing user 'Login' event is being tracked.

```
<script src="https://auth.lrcontent.com/v1/js/LoginRadius.1.0.js"></script>
```

####Google Analytics Universal JS
Start with Google Analytics from [here](http://www.google.com/analytics).

In your Google Analytics Admin-console, go to: 'Admin' -> 'Property' -> 'Tracking Code' - copy and paste without modification.

If you are using PHP as your back-end language, it is recommended to put the script in a separate file, and include it in the page you want to track.

####LoginRadius Login and Tracking Setting Script
You can set the callback page in the script as well, so it can work with your existing system.

```
<script type="text/javascript">
    var apiKey = '<your loginradius api key>';
    var siteUrl = document.URL;
    var loginRadiusOptions = {};
    loginRadiusOptions.login = true;

    LoginRadius_SocialLogin.util.ready(function () {
        $ui = LoginRadius_SocialLogin.lr_login_settings;
        $ui.interfacesize = '';
        $ui.apikey = apiKey;
        $ui.callback = siteUrl;
        $ui.lrinterfacecontainer = "interfacecontainerdiv";
        $ui.interfacesize = "";
        $ui.noofcolumns = 5;
        $ui.lrinterfacebackground = "";
        $ui.is_access_token = 1;
        LoginRadius_SocialLogin.init(loginRadiusOptions);
    });

    LoginRadiusSDK.setLoginCallback(function () {
        var token = LoginRadiusSDK.getToken();

        LoginRadiusSDK.getUserprofile( function(userprofile) {

            // ga( 'set', '&uid', userprofile.ID );

            var form = document.createElement('form');
            var hiddenToken = document.createElement('input');

            form.action = $SL.lr_login_settings.callback;
            form.method = 'POST';

            hiddenToken.type = 'hidden';
            hiddenToken.value = token;
            hiddenToken.name = 'token';

            form.appendChild(hiddenToken);
            document.body.appendChild(form);
        } );
    } );
</script>
```

- Make sure you set `$ui.is_access_token = 1;`

####LoginRadius Analytics JS

```
<script src="https://auth.lrcontent.com/v1/js/lr-google-analyitcs.js" type="text/javascript"></script>
```

###Implementing Advanced Tracking

####Setting User ID from LoginRadius ID
LoginRadius also provides the option to use the User-ID feature (benefits for user_id feature) from Google Analytics. To implement, simply put the following line after the user's profile is retrieved from social ID providers.

So, after this line

```
LoginRadiusSDK.getUserprofile( function(userprofile) {
```

add (or uncomment) this line

```
ga( 'set', '&uid', userprofile.ID );
```

####Action based tracking
Google Analytics - action based

Import the LoginRadius google-analytics.js for Google Analytics event tracking.

Social: Add the following attributes to elements such as the link, button etc.

```
data-lrga="social"
data-lrga-provider="<provider>" :  e.g. facebook, google+, twitter etc.
data-lrga-action="<action>" : e.g. like, plusone, share, tweet
data-lrga-target="<target>" : [default window.location.href] : e.g. page url or any other identifier text
```

Event : Add the following attributes to elements such as the link, button etc.

```
data-lrga="event"
data-lrga-category="<category>" :  button, link , menu etc.
data-lrga-action="<action>" : e.g. click, hover
data-lrga-label="label" : label like features page, service page
data-lrga-value="value" [default 1] : Values must be non-negative. Useful to pass number of clicks
```

###View the data in Google Analytics
Make sure every JavaScript file is put in the correct order.

Click on any social id provider from your LoginRadius login interface, and it will send an event to your Google Analytics Admin-console.  
(It can take up to 24 hours for Google Analytics to show the data.)  
View the data and information.

####Analyze Basic Tracking

#####General Social Events Monitoring
Open Google Analytics and open your web property's reporting.

Navigate to Acquisition > Social > Plugin (as shown in below screenshot).

![enter image description here](https://apidocs.lrcontent.com/images/lr-ga-left-menu_244558a54f7b970937.90277879.png)

You can monitor the social interaction activities happening on your site through LoginRadius.

![enter image description here](https://apidocs.lrcontent.com/images/lr-ga-social-chart_444458a54fdb98e3a5.52985537.png)

The screenshot below shows a table of the number of social actions that have happened, and with which social entity (site URL).

![enter image description here](https://apidocs.lrcontent.com/images/lr-ga-source_1137558a54ffb07c681.30927277.png)

If you change "Social Entity" to "Social Source", you can see the popularity of different ID providers on your site.

![enter image description here](https://apidocs.lrcontent.com/images/lr-ga-entry_3273758a5501baf41c0.69374758.png)

#####Basic Event Tracking
Changing to "Social Source and Action" will also show the actions that have been fired by different id providers, such as: login, share, +1, like, etc.

![enter image description here](https://apidocs.lrcontent.com/images/lr-ga-source-action_895358a5505b59ee21.47213541.png)

####Analyze Advance Tracking

#####User ID Report
In order to view the reports based on the assigned User ID, you need to create at least one other view. You can follow the instructions here.

#####Social Activity tracking - likes, share, tweet
For the social events customized by yourself, just follow the steps in 3.1 and you will be able to view it.

#####Event tracking
For the other events customized by yourself, you can view it in the same way as other Google Analytics events, by navigating to 'Behavior' -> 'Events' -> 'Overview'

![enter image description here](https://apidocs.lrcontent.com/images/lr-ga-advanced-events_3254158a550e18adc26.02176454.png)

###Code Example
If you need a demo project, please [contact the LoginRadius Support team](http://support.loginradius.com/hc/en-us/requests/new).

```
<!DOCTYPE html>
<html>
<head>
    <title>Google Analytics</title>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- LoginRadius SDK -->
    <script src="LoginRadiusSDK.2.0.0.js"></script>

    <!-- LoginRadius Login JS -->
    <script src="//hub.loginradius.com/include/js/LoginRadius.js"></script>

    <!-- Google Analytics Code -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '{{Google Analytics Tracking Code}}', 'auto');
      ga('send', 'pageview');
    </script>

    <script type="text/javascript">
        var apiKey = '{{LoginRadius ApiKey}}';
        var siteUrl = document.URL;
        var loginRadiusOptions = {};
        loginRadiusOptions.login = true;
        LoginRadius_SocialLogin.util.ready(function () {
            $ui = LoginRadius_SocialLogin.lr_login_settings;
            $ui.interfacesize = '';
            $ui.apikey = apiKey;
            $ui.callback = siteUrl;
            $ui.lrinterfacecontainer = "interfacecontainerdiv";
            $ui.interfacesize = "";
            $ui.noofcolumns = 5;
            $ui.lrinterfacebackground = "";
            $ui.is_access_token = 1;
            LoginRadius_SocialLogin.init(loginRadiusOptions);
        });

        LoginRadiusSDK.setLoginCallback(function () {

            var token = LoginRadiusSDK.getToken();
            console.log( 'Token ' + token );

            LoginRadiusSDK.getUserprofile( function(userprofile) {
                ga( 'set', '&uid', userprofile.ID );
                console.log( 'ID ' + userprofile.ID );

                    $('.userprofile').html('<ul>');
                    $.each( userprofile, function(index, val) {
                        if( typeof(val) == 'object' && val != null ){
                            var content = '';
                            $.each( val, function(valindex, valval) {
                                var i = valindex.toString();
                                content =+    '<li>' + i + ': ' + valval + '</li>';
                            });
                            $('.userprofile').append(
                                '<li><ul>' +
                                content +
                                '</ul></li>'
                            );

                        }else{
                             $('.userprofile').append( '<li>' + index + ': ' + val + '</li>');
                        }
                    });
                    $('.userprofile').append('</ul>');
            } );
        } );
    </script>

    <script src="https://auth.lrcontent.com/v1/js/lr-google-analyitcs.js" type="text/javascript"></script>
</head>
<body>
    <h1>Google Analytics Walkthrough</h1>

    <div class="interfacecontainerdiv"></div>
    <div class="userprofile"></div>
</body>
</html>
```

###Other References
####Google Analytics Tutorial  
[About Social Analytics](https://support.google.com/analytics/answer/1683971?hl=en)

####Debugging
There are different kinds of debugging tools for Google Analytics for different browsers. If you are using Chrome, you can install this plugin here.

####Set User-ID from PHP

```
<script>

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];
        a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    // New Google Analytics code to set User ID.

    <?php
    // New Google Analytics code to set User ID.

    // $userId is a unique, persistent, and non-personally identifiable string ID.

    if (isset($userId)) {

     $gacode = "ga('create', 'UA-XXXX-Y', { 'userId': '%s' });";
     echo sprintf($gacode, $userId);
    }?>

    ga('send', 'pageview');

</script>
```
