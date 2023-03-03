# WebHooks

WebHooks allow you to build or set up integrations that subscribe to certain events on LoginRadius. When one of these events is triggered, LoginRadius will automatically send a POST payload over HTTPs to the WebHook's configured URL in real time. WebHooks can be used to update an external tracker or update a backup mirror.

> **Note:** Once the request is submitted to the WebHook's configured URL, LoginRadius does not track payload deliverability.

## Events

When configuring a WebHook, you can select the events for which you would like to receive payloads. Only subscribing to the specific events you plan on handling is useful for limiting the number of HTTP requests to your server. You can change the list of subscribed events through the API at any time. By default, WebHooks are only subscribed to the push event.
The following are the allowed events:
Login, Register, UpdateProfile, ResetPassword, ChangePassword, EmailVerification, AddEmail, RemoveEmail, BlockAccount, DeleteAccount, SetUsername, AssignRoles, UnassignRoles, SetPassword, LinkAccount, UnlinkAccount, UpdatePhoneId, VerifyPhoneNumber, UpdateCustomobject, DeleteCustomObject, CreateCustomObject, InvalidateEmailVerification, InvalidatePhoneVerification, RemovePhoneId, RemoveRoleContext, ConsentProfileUpdate, SetPIN, ResetPIN, ChangePIN, UpdateUID


The APIs associated with these events can be found [here](/api/v2/integrations/webhooks/overview/#apisassociatedwithwebhookevents0).

## WebHook sample header

All webhook POST request headers will contain the following fields: host, accept, accept-encoding, content-type, request-context, request-id, signature, user-agent, content-length, connection. 

Here is the sample for WebHook payload header:


![WebHook Payload header](https://apidocs.lrcontent.com/images/WebhookPayloadHeader_250215d09686fd563c7.31213874.jpg "WebHook Payload header")

## WebHook Security

AAll the WebHook's configured URL must use https as it is more secure. If you use https, your SSL/TLS certificate must be validated. 

A signature field is passed in every WebHook payload header to subscribed URL in Admin Console. The signature field value contains API secret and payload body in the hashed form. The signature data field can be used to verify the source of data for each incoming POST request is LoginRadius. 

The following .net script can be used to generate a signature field from the LoginRadius API secret and WebHook payload Body. You can compare this generated signature with the signature field value in the WebHook payload header to validate the WebHook source of data.


- Replace `<LoginRadius API Secret>` with the API Secret for your LoginRadius site in the below code.
- Replace `<WebHook Payload Body>` with WebHook Payload Body in string format.
- The code will write derived signature in the console.

```
using System;
using System.Text;
using System.Security.Cryptography;

public class Program
{
    private const string key = "<LoginRadius API secret>";
    private const string message = "<WebHook payload body>";
    private static readonly Encoding encoding = Encoding.UTF8;

    static void Main(string[] args)
    {
        var keyByte = encoding.GetBytes(key);
        using (var hmacsha256 = new HMACSHA256(keyByte))
        {
            hmacsha256.ComputeHash(encoding.GetBytes(message));

            Console.WriteLine("Result: {0}", ByteToString(hmacsha256.Hash));
        }
    }
    static string ByteToString(byte[] buff)
    {
        string sbinary = "";
        for (int i = 0; i < buff.Length; i++)
            sbinary += buff[i].ToString("X2"); /* hex format */
        return sbinary;
    }
}
```

## WebHook Sample Payload Body

| Event                       | Sample Payload                                                        |
| --------------------------- | --------------------------------------------------------------------- |
| Login                       | [Link](/integrations/webhooks/samples/#login0)                        |
| Register                    | [Link](/integrations/webhooks/samples/#register1)                     |
| UpdateProfile               | [Link](/integrations/webhooks/samples/#updateprofile2)                |
| ResetPassword               | [Link](/integrations/webhooks/samples/#resetpassword3)                |
| ChangePassword              | [Link](/integrations/webhooks/samples/#changepassword4)               |
| emailVerification           | [Link](/integrations/webhooks/samples/#emailverification5)            |
| AddEmail                    | [Link](/integrations/webhooks/samples/#addemail6)                     |
| RemoveEmail                 | [Link](/integrations/webhooks/samples/#removeemail7)                  |
| BlockAccount                | [Link](/integrations/webhooks/samples/#blockaccount8)                 |
| DeleteAccount               | [Link](/integrations/webhooks/samples/#deleteaccount9)                |
| SetUsername                 | [Link](/integrations/webhooks/samples/#setusername10)                 |
| AssignRoles                 | [Link](/integrations/webhooks/samples/#assignroles11)                 |
| UnassignRoles               | [Link](/integrations/webhooks/samples/#unassignroles12)               |
| SetPassword                 | [Link](/integrations/webhooks/samples/#setpassword13)                 |
| LinkAccount                 | [Link](/integrations/webhooks/samples/#linkaccount14)                 |
| UnlinkAccount               | [Link](/integrations/webhooks/samples/#unlinkaccount15)               |
| UpdatePhoneId               | [Link](/integrations/webhooks/samples/#updatephoneId16)               |
| VerifyPhoneNumber           | [Link](/integrations/webhooks/samples/#verifyphonenumber17)           |
| UpdateCustomobject          | [Link](/integrations/webhooks/samples/#updatecustomobject18)          |
| DeleteCustomObject          | [Link](/integrations/webhooks/samples/#deletevustomobject19)          |
| CreateCustomObject          | [Link](/integrations/webhooks/samples/#createcustomobject20)          |
| InvalidateEmailVerification | [Link](/integrations/webhooks/samples/#invalidateemailverification21) |
| InvalidatePhoneVerification | [Link](/integrations/webhooks/samples/#invalidatephoneverification22) |
| RemovePhoneId               | [Link](/integrations/webhooks/samples/#removephoneid23)               |
| RemoveRoleContext           | [Link](/integrations/webhooks/samples/#removerolecontext24)           |

## Configure WebHook

WebHook can be configured on LoginRadius in Admin Console or by leveraging LoginRadius [WebHook](/api/v2/integrations/webhooks/overview/#webhookapis3) APIs.

### Admin Console

Below are the steps to add a WebHook event to LoginRadius via the Admin Console.

**Step 1:** Navigate to [Integrations > Data Sync > Web Hook](https://adminconsole.loginradius.com/integration/data-sync/web-hooks) in the Admin Console. The following screen will appear.

![WebHooks Section in Admin Console](https://apidocs.lrcontent.com/images/Step-1_1592863501b3a20ab95.98264614.png "WebHooks Section in Admin Console")

**Step 2:** Click **Add** button and assign a **WebHook Name** of your choice, select an event from those available under the **WebHook Event** dropdown, enter a **Subscribe URL** where payload data will be sent when the webhook event is triggered and click **Add**.

![Create a WeebHook](https://apidocs.lrcontent.com/images/Step-2_2411463501ba1444b92.97823692.png "Create a WeebHook")

**Step 3:** Now the successfully configured webhook will be displayed under the **Configured Requests** table.

![Configured Requests Table](https://apidocs.lrcontent.com/images/Step-3_116163501bd2c2cf70.97761867.png "Configured Requests Table")

To **add** or **edit** the **Custom Objects** within the Webhook, click the **dropdown button** from the **Action** column for the corresponding Event in the **Configured Requests** table, and select **Edit**.

>**Note:** Custom Objects can be updated only for the webhooks with SQS URLs. For more information on the SQS url, contact [LoginRadius Support team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

![webhook](https://apidocs.lrcontent.com/images/webhookedit_209271456664019c9ad90787.37196202.png "webhookedit")


Here, you can add the **Custom Objects** directly in the Webhook form and click **Update** to save the changes.

![editcustom obj](https://apidocs.lrcontent.com/images/webhookcsutomobj_87402939864019d69a07b15.28817359.png "editcustomobj")


To **remove** any Webhook event from LoginRadius, click the corresponding **dropdown** button from the Action column in the **Configured Requests** table and select **Unsubscribe**.

![Unsubscribe WebHook URL](https://apidocs.lrcontent.com/images/Unsubscribe-WebHook-URL_2754363501c3cf0a820.79824153.png "Unsubscribe WebHook URL")

> **Note:** For more details on the APIs associated to WebHooks, its handling, payload information and the WebHook APIs, refer to the [Webhook API Overview](/api/v2/integrations/webhooks/overview/) document.
