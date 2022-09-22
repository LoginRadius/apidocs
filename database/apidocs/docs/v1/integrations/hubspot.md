HubSpot
=====

--------


The LoginRadius Hubspot integration allows you to quickly setup a Social Login interface on your Hubspot landing pages which will allow your users to pre-populate the form fields with their Social Data.

##Initial LoginRadius Setup
1.Include the LoginRadius reference script in your Options->Head Section HTML.

```
<script src="https://auth.lrcontent.com/v1/js/CustomInterface.2.js" type="text/javascript"></script>
```
![enter image description here](https://apidocs.lrcontent.com/images/DbWucxk5QKazeh76meit_1_1413258a57074955367.37074860.png "")



2.Add the following script to your Options->Head Section HTML below the previous script:

```
<script type="text/javascript"> 
  $LRIC.util.ready(function () { 
		var options = {}; 
		options.apikey = "<YOUR LoginRadius API KEY>";
    options.templatename = "loginradiuscustom_tmpl";
		$LRIC.renderInterface("interface_container", options); 
	});
</script> 
```
**Note:** Replace <YOUR API KEY> with the API key displayed on your LoginRadius
account page.

![enter image description here](https://apidocs.lrcontent.com/images/FmTpO9GoQYWCIRspMpA3_2_3134258a5712ed93838.78644684.png "")

3.Add the following script to your Options->Head Section HTML below the previous script.

```
 <script type="text/html" id="loginradiuscustom_tmpl">
<a href="javascript:void()" onclick="return $LRIC.util.openWindow('<%=Endpoint%>');"><%=Name%></a>
</script> 
```

**Note:** This displays the basic login interface with simple text links, see the Customizing Your Interface section for additional design steps.

![enter image description here](https://apidocs.lrcontent.com/images/pSYt69TTACdF2nKWxDFw_3_2382458a5717482b237.92650497.png "")

4.Add a Custom HTML Module and include the following script in the Module wherever you would like the login interface to be displayed.

```
 <div class="interface_container"> </div>
```

**Note:** The class name can be changed but requires the script in Step 2 to be changed as well.

![enter image description here](https://apidocs.lrcontent.com/images/9evwGWStkNHE88UZhigr_4_938058a57207f2f0d5.02909998.png "")

##Customizing the Login Interface
You can further customize the Login interface by following the custom interface instructions to modify the template included in step 3. Documentation on this is available [here](/api/v1/social-login/social-login-getting-started).

##Populating Form Data
1.Add a LoginRadiusSDK.onlogin function to your Head Section HTML.

```
 <script type="text/javascript">
LoginRadiusSDK.onlogin = Successfullylogin;
function Successfullylogin(){};
</script>
```

2.Call the GetUserProfile() function from within the Successfullylogin() function and assign data points to the desired form element once you have successfully logged in.

```
 LoginRadiusSDK.getUserprofile(function (data)
{
document.forms[0].elements[0].value=data.FirstName;
});
```
