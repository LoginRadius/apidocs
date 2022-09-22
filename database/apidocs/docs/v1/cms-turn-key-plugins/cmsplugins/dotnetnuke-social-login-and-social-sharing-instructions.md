DotNetNuke Social Login and Social Sharing instructions
===
----

[DotNetNuke Module Installation Guide](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnnguide)

- [DotNetNuke v7.0](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnn7install)

- [DotNetNuke v6.0](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnn6install)


[ Module Configuration](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#configuration)

- [DotNetNuke v7.0](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnn7configuration)

- [DotNetNuke v6.0](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnn6configuration)
 
[Further Help](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#further_help)

- [How to uninstall the Module](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnnuninstall)
- [How to uninstall the Module Manually](https://support.loginradius.com/hc/en-us/articles/202366158-DotNetNuke-Social-Login-and-Social-Sharing-instructions#dnnmanualuninstall)


####DotNetNuke Installation Guide

**NOTE: Unzip the provided Zip to get the final installation zip for your DNN version (6..xx.xx or 7.xx.xx)**

**NOTE :- Before installing new version, please [uninstall](http://support.desk.com/system/site_not_found#dnnuninstall) previous version of LoginRadius Social Login.**

####DotNetNuke v7.0

1. [Download](http://store.dnnsoftware.com/home/product-details/social-login-and-social-sharing)** Social Login **Module for DotNetNuke.
2. Log in to your **DotNetNuke** website as **super user**.
3. In Host menu, click on Extensions.

![enter image description here](https://apidocs.lrcontent.com/images/1_1983558d12d8d7be883.99135041.png "")

4 Now under Host, click on **Install Extension** Wizard.
![enter image description here](https://apidocs.lrcontent.com/images/2_2690158d12db2e9e862.21844512.png "")

 


5.Browse downloaded LoginRadius module zip file and click Next button. Follow installation instruction and accept license agreement. Finally, after installation is done, click on ‘Return’ and it’ll close the pop-up.

 ![enter image description here](https://apidocs.lrcontent.com/images/3_3117458d12dcfc424f0.16820085.png "")


6.Now, Go to Installed modules list and you’ll find LoginRadius module listed there.

 
![enter image description here](https://apidocs.lrcontent.com/images/4_746158d12de994bd74.20180050.png "")

![enter image description here](https://apidocs.lrcontent.com/images/5_2941058d12dff3a56f2.54462346.png "")

![enter image description here](https://apidocs.lrcontent.com/images/6_1268758d12e19c69f65.18425098.png "")

![enter image description here](https://apidocs.lrcontent.com/images/7_3060458d12e3ab21a28.58654869.png "")



####DotNetNuke v6.0

1. [Download](http://store.dnnsoftware.com/home/product-details/social-login-and-social-sharing) **Social Login module** for **DotNetNuke**.
2.    Log in to your DotNetNuke website as a Super User.
3.    Under Host Menu, Click on Extensions.
![enter image description here](https://apidocs.lrcontent.com/images/8_678258d12e8c4b9663.59143352.png "")

 


4.Under Manage option, Click on Install Extension Wizard to install the module

 ![enter image description here](https://apidocs.lrcontent.com/images/9_872958d12eae797853.60535899.png "")



 

5 Browse for LoginRadius Module zip file and click Next button.  

 

![enter image description here](https://apidocs.lrcontent.com/images/10_317158d12ec2909c34.67864979.png "")

 

6.Follow the Installation instructions and accept the License Agreement. After the installation is complete, click on ‘Return’ and it’ll close the Installation window.

7.Go to Installed modules list and you’ll find LoginRadius module listed as shown in the screenshot below
![enter image description here](https://apidocs.lrcontent.com/images/11_483858d12f1ddfd214.25831756.png "")
![enter image description here](https://apidocs.lrcontent.com/images/12_541958d12f33b45614.90807474.png "")
![enter image description here](https://apidocs.lrcontent.com/images/13_2332858d12f47091eb0.36847951.png "")
![enter image description here](https://apidocs.lrcontent.com/images/14_1443058d12f5a556c07.42049543.png "")
![enter image description here](https://apidocs.lrcontent.com/images/15_486558d12f74cd26b5.20645393.png "")



####Module Configuration

####DotNetNuke v7.0

1. In **Admin** menu, click on **Extensions**

![enter image description here](https://apidocs.lrcontent.com/images/16_2789458d12fb76875e5.32082846.png "")



2 Under Authentication System, click the edit button for**"Loginradius.Authentication.System"**
![enter image description here](https://apidocs.lrcontent.com/images/17_785458d12fe7c57681.17876857.png "")
 


3.Enter the API Key and API Secret for your LoginRadius site as shown in the screenshot below. After that hit **"Update Authentication Settings"**

 ![enter image description here](https://apidocs.lrcontent.com/images/18_491058d130125e7007.59941752.png "")



 

4.In order to display LoginRadius Interface at Registration page, follow the steps below:

  a. list text hereSocial Login Configuration
            
   1. list text herelist text hereIn **Admin** menu, click on **Site Settings**.

 ![enter image description here](https://apidocs.lrcontent.com/images/19_3260958d130437e4774.37746660.png "")



 

   2.list text hereClick on User Account Settings and check the option "User Authentication Providers" under Registration Settings.

 ![
](https://apidocs.lrcontent.com/images/20_2704358d130e2334086.40899039.png "")


 

   3.Click on Update and you are done with Social Login Setup.

 ![enter image description here](https://apidocs.lrcontent.com/images/21_1497758d1311e2dbdf5.41033128.png "")



 

####Login Page

 ![enter image description here](https://apidocs.lrcontent.com/images/22_113058d13137ea1084.61562580.png "")



 

####Registration Page

 ![enter image description here](https://apidocs.lrcontent.com/images/23_2837158d13149ed2e90.18429027.png "")



 

**NOTE :- **How to get LoginRadius API Key & Secret: [See here](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-)
           
####Account Linking Module Configuration

1.    Click on **Super User Account**

 ![enter image description here](https://apidocs.lrcontent.com/images/24_770658d13318bfa1a2.80475819.png "")

2.    Go to **Pages**  in the Top menu bar and click **"Add New Page"** in Page

 
![enter image description here](https://apidocs.lrcontent.com/images/25_1227458d1333cafee60.03090410.png "")

 

   a. Fill the details for Page Name ,Page Title(optional),Description(optional),Keyword(optional), tags(optional) 

 
![enter image description here](https://apidocs.lrcontent.com/images/26_661158d13358cd1d49.29655040.png "")


 

   b. Select** "Activity Feed" **in Parent Page     
c. Select Position where you want add account linking page 

 ![enter image description here](https://apidocs.lrcontent.com/images/27_1705958d13382005566.57098918.png "")



 

3.Click on Permission tab and check view Page Permission for** Registered Users** and click on "Add Page"
![enter image description here](https://apidocs.lrcontent.com/images/28_173658d133d6c49c74.80217509.png "")
 



 

4.Go to on Module on top menu bar and select options as shown in screenshot below

   a. Select "Add New Module"  

 ![enter image description here](https://apidocs.lrcontent.com/images/29_2682858d1340fc98e97.70629254.png "")



 

   b. Select "LoginRadius Account Linking " from available Module Click on add module
Add Module in Content Pane

 ![enter image description here](https://apidocs.lrcontent.com/images/30_1455458d134359b24a3.94119920.png "")



 

5 Now **Account Linking Module** will be shown on the page as shown below

 ![enter image description here](https://apidocs.lrcontent.com/images/31_872058d1354cb1bf20.08532114.png "")



 

####How to add Social Login Interface as per requirement
1. If you want add social login module on home page
2. Go to on **Module **on top menu bar
     
a. Select "Add New Module"
![enter image description here](https://apidocs.lrcontent.com/images/32_2643458d1357f612730.38315289.png "")
 



 

   b. Select "LoginRadius Social Login " from available Module Click on add module

 ![enter image description here](https://apidocs.lrcontent.com/images/33_1187058d1359fb4a7a2.37861029.png "")



 

3.Select Module Location as per your requirement(Location where you want to add social Login interface) and Click on add module as shown in the screenshots below

 ![enter image description here](https://apidocs.lrcontent.com/images/34_240258d135bbba2714.30521188.png "")



 

4.Social Login Interface will be displayed as shown below

 ![enter image description here](https://apidocs.lrcontent.com/images/35_1894158d135d48c17f2.52455638.png "")



 

5.Click on Social Login interface **Settings** and click on settings

 ![enter image description here](https://apidocs.lrcontent.com/images/36_1105158d135eb2bd719.79333365.png "")



 

6.Click on Permission tab and un check "inherit View permission from page"  and check view Module Permission for **Unauthenticated Users** and click on "Update"

 ![enter image description here](https://apidocs.lrcontent.com/images/37_583958d1360d74fc28.77661369.png "")



 

  b. Social Share Configuration
           
 i. Select the page where you’d like to show social login. For example, ‘Home’ page. On the selected page, click on Modules link at top. Drag and drop LoginRadius sharing module on a particular section.

 
![enter image description here](https://apidocs.lrcontent.com/images/38_3219858d13630ebbf20.59544176.png "")


 

   ii.Copy sharing script from your LoginRadius Account and paste in Sharing script box ( This step is required only one time, for next pages onwards, this script will be automatically fetched from DB). LoginRadius Sharing will be enabled on the selected page.

 


![enter image description here](https://apidocs.lrcontent.com/images/39_125758d1364d0b24f7.13129409.png "")
 

   iii.How to get LoginRadius sharing script: [Click here](https://www.loginradius.com/integrations/social-nine/)

 
![enter image description here](https://apidocs.lrcontent.com/images/40_2005758d13667e5e2e3.89492046.png "")


 

   c. Social Counter Configuration
         
   i. Now go to the page where you’d like to show social counter. For example, ‘Home’ page.
![enter image description here](https://apidocs.lrcontent.com/images/41_2373058d1368874e093.68470981.png "")
 



   ii. On the selected page, click on Modules link at top. And drag and drop LoginRadius counter module.
![enter image description here](https://apidocs.lrcontent.com/images/42_719858d136a3b98832.51433471.png "")
 



 

   iii. copy Counter script from your LoginRadius Account and Past in Counter script box ( This step is required only one time, for next pages onwards, this script will be automatically fetched from DB)

 ![enter image description here](https://apidocs.lrcontent.com/images/43_2435358d136ba904dc8.48860863.png "")



  iv. How to get LoginRadius counter script: [Click here](http://www.loginradius.com/social-add-ons)
  
  v. LoginRadius Counter will be enabled on the selected page.

 
![enter image description here](https://apidocs.lrcontent.com/images/44_414758d13700462400.66872241.png "")


 

####DotNetNuke v6.0

1. Social Login Configuration
  
   a. In **Admin** menu, click on **Extensions**.

 
![enter image description here](https://apidocs.lrcontent.com/images/45_2172258d13731ecd0a3.88485265.png "")


 

   b. Authentication System click the edit button for "Loginradius.Authentication.System"

 
![enter image description here](https://apidocs.lrcontent.com/images/46_2783858d1374b5701b4.78979332.png "")


 

  c. Here you are required to enter API Key and API secret that you get from LoginRadius account. After that hit the Update Authentication Settings.

 ![enter image description here](https://apidocs.lrcontent.com/images/47_2744458d137643a1922.74442419.png "")




  d. In order to display LoginRadius Interface at Registration page, follow the steps below:
        
  i. In** Admin** menu, click on **Site Settings**
![enter image description here](https://apidocs.lrcontent.com/images/48_3030158d13796320a99.32793788.png "")

 



 

   ii. Then click on **User Account Setting** and check **the option** "User Authentication Providers"

 ![enter image description here](https://apidocs.lrcontent.com/images/49_3032058d137bd1b8482.19989575.png "")



 

  iii. After that click on Update.

 ![
](https://apidocs.lrcontent.com/images/50_1280058d137d273e675.41374590.png "")

![enter image description here](https://apidocs.lrcontent.com/images/51_1092058d137ee8ab6a9.55046189.png "")
![enter image description here](https://apidocs.lrcontent.com/images/52_2524058d13813ca1ef2.21562466.png "")


**Note:** How to get LoginRadius API Key & Secret: [see here](https://support.loginradius.com/hc/en-us/articles/201894526-How-do-I-get-a-LoginRadius-API-key-and-secret-)

####Account Linking Module Configuration

 

1. Click on **Super User Accoun**t

 
![enter image description here](https://apidocs.lrcontent.com/images/53_1056258d13a3e70b181.67959046.png "")



2. Go to **Page**  in the Top menu bar and Select **"Add"** in Page 

 
![
](https://apidocs.lrcontent.com/images/54_1978058d13a5e6be645.90409008.png "")

 

  a. Fill the details for Page Name ,Page Title(optional),Description(optional),Keyword(optional), tags(optional)
  
b.Select "Activity Feed" in Parent Page
    
 c. Select Position where you want add account linking page

3.Click on Permission tab and check view Page Permission for Registered Users and click on "Add Page"

 
![enter image description here](https://apidocs.lrcontent.com/images/55_2839558d13a97ec27f2.30070482.png "")


 

4. Go to on **Module** on top menu bar and select options as shown in screenshot below
    
 a. Select "All categories" in Category
    
 b. Select "LoginRadius Account Linking " from available Module Click on add module

 ![enter image description here](https://apidocs.lrcontent.com/images/56_1635558d13ab887d986.74106619.png "")

![enter image description here](https://apidocs.lrcontent.com/images/57_2006258d13ac9091ec5.89815718.png "")


 

5.Now Account Linking Module will be shown on the page as shown below

 
![enter image description here](https://apidocs.lrcontent.com/images/58_3000458d13ae27db990.40286533.png "")


 

####How to add Social Login Interface as per requirement
1. If you want add social login module on home page
2. Go to on **Module** on top menu bar

     a. Select "All categories" in Category

     b. Select "LoginRadius Social Login" from available Module
3. Select Module Location as per your requirement(Location where you want to add social Login interface) and Click on add module as shown in the screenshots below

 ![enter image description here](https://apidocs.lrcontent.com/images/59_1806058d13b0e4da939.92488919.png "")


![enter image description here](https://apidocs.lrcontent.com/images/60_279058d13b20087415.26971949.png "")

 

4.Social Login Interface will be displayed as shown below

 
![enter image description here](https://apidocs.lrcontent.com/images/61_1404858d13b3538a175.93036404.png "")



5.Click on Social Login interface **Manage **and click on settings

6.Click on Permission tab and un check "inherit View permission from page"  and check view Module Permission for **Unauthenticated Users** and click on "Update"

 ![enter image description here](https://apidocs.lrcontent.com/images/62_852558d13b6254b745.59441645.png "")



 

2.Social Share Configuration

   a. Select the page where you’d like to show social login. For example, ‘Home’ page. On the selected page, click on Modules link at top. Drag and drop LoginRadius sharing module on a particular section.

 ![
](https://apidocs.lrcontent.com/images/63_1911558d13b8543e258.12611762.png "")


 

   b. Copy sharing script from your LoginRadius Account and paste in Sharing script box ( This step is required only one time, for next pages onwards, this script will be automatically fetched from DB). LoginRadius Sharing will be enabled on the selected page
![enter image description here](https://apidocs.lrcontent.com/images/64_1473758d13ba0983ed5.61009766.png "")
 



 

   c. How to get LoginRadius sharing script: [Click here](https://www.loginradius.com/integrations/social-nine/)

 

![enter image description here](https://apidocs.lrcontent.com/images/65_3200858d13bc6e15093.27208655.png "")

 

3. Social Counter Configuration
  
 a. Now go to the page where you’d like to show social counter. For example, ‘Home’ page.

 



 ![enter image description here](https://apidocs.lrcontent.com/images/66_2012358d13be7c22f86.32285868.png "")

  b. On the selected page, click on Modules link at top. And drag and drop LoginRadius counter module.

 ![enter image description here](https://apidocs.lrcontent.com/images/67_2475158d13bff229675.25447944.png "")



 

  c. copy Counter script from your LoginRadius Account and Past in Counter script box ( This step is required only one time, for next pages onwards, this script will be automatically fetched from DB).

 
![enter image description here](https://apidocs.lrcontent.com/images/68_1792158d13c12c58174.06967869.png "")


 

  d. How to get LoginRadius counter script:[ Click here](http://www.loginradius.com/social-add-ons)
     
e. LoginRadius Counter will be enabled on the selected page.

 ![enter image description here](https://apidocs.lrcontent.com/images/69_2958458d13c37a81de2.44083943.png "")



 

####Further Help
####1. How to uninstall the module:-

- Login to your website admin panel.
- Select **Social Login** and **Click on Delete button**
 

![enter image description here](https://apidocs.lrcontent.com/images/70_45158d13c74ab69c2.61635189.png "")

 

- Select Social Share and Click on Delete button
 
![enter image description here](https://apidocs.lrcontent.com/images/71_1746358d13c8fb5b225.65785334.png "")


 

- Select **Social Counter** and Click on Delete button
 


![enter image description here](https://apidocs.lrcontent.com/images/72_2473958d13ca4a20475.15587893.png "")
 

####2. How to uninstall the module manually:-

1. First of all, please login to your DNN website Database
    - Run the below script to uninstall LoginRadius

       - i. Drop table Loginradiususerprofile

       - ii.Drop table Loginradiusprofilelinking

2. Now get the Installed LoginRadius Module Id by running the query below
 

SELECT DesktopModuleID FROM [dbo].[DesktopModules] WHERE [IsAdmin] = 0 and [FriendlyName]

like '%LoginRadius%'

 <br/>
<br/>


1. Now, You have all the LoginRadius Module Id. Delete the modules from database by using  DeleteDesktopModule stored proc and by passing the module Id
<br/>
 

Example :

 

i. DeleteDesktopModule 84

ii. DeleteDesktopModule 85

iii. DeleteDesktopModule 86

 <br/>


Note: Here 84,85,86 are your module ID

 <br/>




1. After this, get the LoginRadius Social Login Authentication ID

3. select AuthenticationID from Authentication where AuthenticationType like '%LoginRadius%'
 
<br/>

Delete the LoginRadius Social Login Authentication by using AuthenticationID which you got by running the script in step 4

 

 3.LoginRadius Module has been deleted from the DataBase. Now, you require to delete                       LoginRadius Module dll and folder from your project folder

 

  4.Open your project folder and go to Bin. After this, delete the following dll’s

 



1. Newtonsoft.Json.Net20
3. Newtonsoft.Json.dll

5. LoginRadiusSDKv3.0.dll

7. LoginRadiusDataObject.dll

9. LoginRadius.SharingModules.dll

11. LoginRadius.Modules.SocialLogin.dll
 
13. LoginRadius.InviteFriendsModule.dll

15. Loginradius.CounterModules.dll

 

<br/>


1. Go to \DesktopModules\AuthenticationServices and delete the LoginRadiusSocialLogin folder 
3. After this, Go to to \DesktopModules and and delete LoginRadiusCounter, LoginRadiusInviteFriends, LoginRadiusSharing