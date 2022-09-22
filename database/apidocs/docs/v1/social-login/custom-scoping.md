Custom Scoping
=====


-------
Custom scope sets allow you to make permission-based Social Login requests, meaning that you ask for permissions based on your site's requirements. For example, you can ask for "read only" permission from a customer during Social Login and then ask for write permission from the same customer at a later point.

We allow you to create sets based on your requirements and map providers’ scopes to the set. You can pass the scope set during a Social Login request. These sets are admin-console driven so that you can customize everything from LoginRadius without modifying any code.

NOTE: To get access to custom scope sets, you will need to contact [LoginRadius support](http://support.loginradius.com/hc/en-us/requests/new).

<iframe src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fplayer.vimeo.com%2Fvideo%2F129605122&url=https%3A%2F%2Fvimeo.com%2F129605122&image=http%3A%2F%2Fi.vimeocdn.com%2Fvideo%2F521154367_1280.jpg&key=02466f963b9b4bb8845a05b53d3235d7&type=text%2Fhtml&schema=vimeo" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

## Create and Configure Custom Scope Sets

  1. Log into LoginRadius.
  2. From the menu options at the top select , API Configuration -> Social Login
  3. Select the Custom Scope tab in the left.
  4. Enter your custom scope name; ex: "readonly","write","contact". Then click on Add.

![enter image description here](https://apidocs.lrcontent.com/images/lrKMom1IT92xsG6oXlPW_step1-6_3061658a6bc41a35c03.96680988.png "Step 1")

5\. You can edit your custom scope permissions any time by clicking on Edit, as shown in the image

![enter image description here](https://apidocs.lrcontent.com/images/EOjh9xjQKGWyPnivC5Ig_step2-5_2929658a6bcab102f09.51572353.png "Step 2")

6\. Click on Edit button besides the name of the custom scope and configure the settings for the custom scope

![enter image description here](https://apidocs.lrcontent.com/images/MY9zYBjS0OSu1v1J5ht8_step3-2_1714558a6bd09247bc4.85691305.png "Step 3")

## How to Use Custom Scope Sets in Your Custom Social Login Interface

If you are using a custom Social Login interface and want to include custom scope sets as part of your interface, then add a parameter named "scope" (&scope="lrcustomscope") to the custom Social Login interface template script. See the highlighted sample code template below.

If you pass custom scope sets in your LoginRadius Social Login interface script, the providers' scopes will be set from your custom scope settings. Otherwise it uses the default scopes according to your end user settings.
```
<script type="text/html" id="loginradiuscustom_tmpl">
     <span class="contantcell" style="margin-top: 15px;">
             <a href="javascript:void()" onclick="return $LRIC.util.openWindow('<#=Endpoint#>&callback=http://example.com/login&scope=lrcustomscope);">
         		<img src="content/images/<#=Name.toLowerCase()#>.png" alt="" />
             </a>
     </span>
</script>
```