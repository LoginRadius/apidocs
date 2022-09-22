MailChimp
=====

------

MailChimp is a well-known platform which can help you better manage your subscribers, such as categorizing your subscribers into different groups or sending an email to a specified group.

Integrating MailChimp with LoginRadius significantly simplifies the process of gathering user information because a lot of the information can be retrieved from  the users' social profiles.

##Implementation
Simply follow the flow below to integrate MailChimp with LoginRadius.



1. Download the LoginRadius API library and the MailChimp API (You can use one of their [Libraries](https://apidocs.mailchimp.com/api/downloads/) or directly access their [API](https://apidocs.mailchimp.com/api/2.0/)).

2. Follow [this guide](http://support.loginradius.com/hc/en-us/articles/203107235-Social-Login-Implementation-Flow) to setup LoginRadius on your site.
3. After the user logs in, call the LoginRadius User Profile API through one of our SDKs.

4. Check the returned data set and verify that there is a valid email address present(some providers, such as Twitter, do not return an email address with their data set). 
 - If you have a valid email address, proceed to the next step.
 - If the email address is invalid, you need to implement a pop-up or similar functionality to request your user to manually enter their email address to be used with the Mailchimp API.
5. Retrieve the List ID that you will be subscribing the user to by using MailChimp's [list API](https://apidocs.mailchimp.com/api/2.0/lists/list.php) (PHP example below)
```
$params=array();
$params['apikey']="<MailChimp API key>";
$params = json_encode($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL,"https://<dc>.api.mailchimp.com/2.0/lists/list.json");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$response_body = curl_exec($ch);
```
**Note:** The $response_body will contain a JSON object with the lists associated with your account.
6. Access MailChimp's [subscribe API](https://apidocs.mailchimp.com/api/2.0/lists/subscribe.php) and pass in the user profile data-points to create the user in the list retrieved in step e.(PHP example below)
```
 $email= array("email"=>"<Retrieved Email Address>");
$mergevars=array("FNAME"=>"<Retrieved User First Name>");
$params = array("id" => "<Retrieved List ID>", "email" => $email, "merge_vars"=>$mergevars);
$params['apikey']="<MailChimp API Key>";
$params = json_encode($params);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL,"https://<dc2>.api.mailchimp.com/2.0/lists/subscribe.json");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$response_body = curl_exec($ch);
```
**Note:** In the above 2 steps, replace the following placeholders:



- `<MailChimp API Key>`- With your MailChimp API key Find out how to retrieve your key [here](http://kb.mailchimp.com/accounts/management/about-api-keys).
- `<dc>`-Your MailChimp data center that is appended on the end of your MailChimp API key.
- `<Retrieved List ID>`- Retrieve using the following link [List ID](http://kb.mailchimp.com/lists/managing-subscribers/find-your-list-id)
- `<Retrieved Email Address>`- The email address of the user, either retrieved through the LoginRadius API or manually requested.
- `<Retrieved User First Name>`-The user's first name retrieved through the LoginRadius API.

**Note:** You can pass in additional data-points to your list by including them in the $mergevars array.
