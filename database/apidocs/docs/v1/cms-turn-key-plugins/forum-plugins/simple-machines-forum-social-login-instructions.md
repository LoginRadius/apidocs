Simple Machines Forum Social Login instructions

----------------------------------------

{{table_container}}


####SMF Package Module Installation Guide:

1. [Download](http://dvlirrepj1d2t.cloudfront.net/downloads/plugins/LoginRadius-for-SMF.zip) **Social Login and Social Share** Package for SMF 2.x.

2. Login to Your Site Admin control panel (ACP)..

3. Select **Package Manager** under **Admin** menu.


 ![enter image description here](https://apidocs.lrcontent.com/images/blob-16_1169058d225a66e6793.16654288.png "")


4.Select [Download](http://dvlirrepj1d2t.cloudfront.net/downloads/plugins/LoginRadius-for-SMF.zip) **Package** sub Menu.

![enter image description here](https://apidocs.lrcontent.com/images/blob-17_2598758d225fabfd0a3.28433165.png "")


 

5.Uploads a **Social Login and Social Share** Package file Under **Upload a Package** and **Hit Upload **button.

 

![enter image description here](https://apidocs.lrcontent.com/images/blob-18_1689458d226545b4ad9.98829109.png "")

 

6.Your** Social Login and Social Share** Package upload successfully. Now select **install mod** as showing in image.

 
![enter image description here](https://apidocs.lrcontent.com/images/blob-19_375558d22692353c03.72270820.png "")


 

7.Select Your themes and click on** Install Now** at bottom of page.

 

![enter image description here](https://apidocs.lrcontent.com/images/blob-20_3064958d226c8671709.18013747.png "")

 

####Module Configuration:

 
1. Login to your SMF **Admin control panel** (ACP).
2. Select **Social Login and Social Share **under **Admin** menu.
 

![enter image description here](https://apidocs.lrcontent.com/images/blob-21_1203358d2273fb9d256.87522640.png "")


 



- To activate the module, insert LoginRadius API Key & Secret ([How to get API Key and Secret?](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-)).
- Insert your right **API KEY & API SECRET** in textbox, and choose the option of **API Connection Method** (cURL  or FSOCKOPEN )
- Verify the **API Key** and **API Secret** by hitting **Verify API Setting** button, and click on **save** button.
 

 

####Troubleshooting:



####CURL and FSOCKOPEN troubleshooting



​There is a button **" Verify API Settings " **in the API Settings section of the plugin. you need to choose one of following options

 





- CURL requires **cURL support = enabled **in your **php.ini** file.
- FSOCKOPEN requires **allow_url_fopen = On** and **safemode = off** in your php.ini file.
 

If that does not work, you may need to contact your hosting provider to enable one of the option.