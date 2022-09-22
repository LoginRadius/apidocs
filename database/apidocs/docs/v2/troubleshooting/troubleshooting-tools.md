# Debugging/Troubleshooting Tools

In this document, you will learn about some troubleshooting tools that will help you capture network browser logs, make a screencast, and find out the browser version you are using. 

Collecting this information will be helpful for further investigation of the issue you are facing with your website and help us quickly identify the exact behavior you are experiencing. 


- [Capture Network Browser logs](#capturenetworkbrowserlogs0)

- [Capture video screen ](#capturevideoscreen8)

- [Check your browser version](#checkyourbrowserversion9)


## Capture Network Browser logs

If you face any issue on your web application while performing any action, you want to capture the error, logs, and API calls made while experiencing the problem.

You can use the step-by-step guide to capture the network logs and share them with the LoginRadius team. The network logs assist the team in troubleshooting the reported issues quickly and help us identify the root cause. 


- [Google Chrome ](#googlechrome1)

- [Firefox](#firefox4)

- [Internet Explorer (IE11)](#internetexplorerie5)

- [Edge](#edge6)

- [Safari](#safari7)


### Google Chrome 

**1**. In Chrome, go to the page within the web application where you are experiencing trouble. At the top-right corner of your browser window, to expand the **Settings **menu, click the Chrome menu (**⋮**) or press F12 key on keyboard to open Developer tool.

   ![enter image description here](https://apidocs.lrcontent.com/images/ch1_4361030ea3849974.82691225.png "enter image title here")

 **2**. From the **Settings** drop-down menu, select **More Tools** and then **Developer Tools** from the pop-out menu that appears. 

>**Note:** Depending on your browser settings and whether or not you've used developer tools previously, the developer tools may show up on the side or the bottom of the browser. 

  ![enter image description here](https://apidocs.lrcontent.com/images/ch2_2975561030f06b46857.78795473.png "enter image title here")

**3**. In the developer tools window, select the **Network** tab. The logs you will want to collect are the **Network** and **Console**. The red circle icon to the far left indicates that you are recording network data. 

![enter image description here](https://apidocs.lrcontent.com/images/ch3_605361030fb796f932.92144874.png "enter image title here")

**4**. Reproduce the issue and then press the red circle(Record network log button), or** Ctrl + E**, to pause recording the network data. The circle will turn grey, indicating that it has stopped recording.
    
![enter image description here](https://apidocs.lrcontent.com/images/ch4_1914661031008d665d5.94340685.png "enter image title here")

**5**. **Capture the network trace**:

Right-click in a white space in the bottom section, where the **Name**, **Status**, **Type**, **Initiator**, **Size**, **Time**, and **Waterfall** sections appear. From the menu that appears,click on the export button as shown in a picture or select** Save all as HAR with content** as given in the following screen. Once selected, the **Save As** window will appear. Pick a name and location on your machine, and then choose **Save**. 

![enter image description here](https://apidocs.lrcontent.com/images/ch5_175676103115648f979.27154010.png "enter image title here")

**6**. **To Capture the Console log**: 

Select the Console tab and right-click in a white space. From the menu that appears, select **Save As** as given in the following screen. Once selected, the **Save As** window will appear. Pick a name and location on your machine, and then choose **Save**.

![enter image description here](https://apidocs.lrcontent.com/images/ch6_4886610311aec56cc0.51764901.png "enter image title here")

**7**. **Capture Logs For Pop-up**: 

If you are looking to capture the logs for workflows where the pop-up window is involved, please follow the below steps in Google Chrome:

**1**. Press **F12**, and go to **Network**, click on **Gear** icon at the top right.

![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-45-_128796261bfe0ce3795.95295111.png "enter image title here")

**2**. Scroll down to **Global**, and enable **Auto-open DevTools for popups**.

![enter image description here](https://apidocs.lrcontent.com/images/Screenshot-47--1_235456261c0894a1863.64154429.png "enter image title here")

**3**. Now you can capture the network log as shown above in this document.


### Firefox

**1**. In Firefox, go to the page within the web application where you are experiencing trouble.


**2**. Click the Firefox menu (three rows) at the top-right of your browser window or press F12 key on the keyboard to open the Developer tool.  

![enter image description here](https://apidocs.lrcontent.com/images/f1_314466107b80a721e90.53989641.png "enter image title here")

**3**. Select **Web Developer > Network**.

![enter image description here](https://apidocs.lrcontent.com/images/f2_81606107b83deeb357.78518458.png "enter image title here")

**4**. The Developer Tools window opens as a docked panel at the side or bottom of Firefox.

**5**. Click the **Network** tab.

![enter image description here](https://apidocs.lrcontent.com/images/f3_189646107b914851271.42957263.png "enter image title here")

**6**. Select **Persist logs**.

![enter image description here](https://apidocs.lrcontent.com/images/f4_149616107b99bdf9616.21193767.png "enter image title here")

**7**. **Refresh the page** and reproduce the problem while the capture is running.
    

**8**. After you successfully reproduce the issue, right-click any row of the activity pane and select **Save all as HAR**.

![enter image description here](https://apidocs.lrcontent.com/images/f5_111656107b9c19eb1b1.88232747.png "enter image title here")

**9**. Select the **Console** tab.


**10**. Right-click any row and select **Select all**.

**11**. Paste the content in a text file and name it **console-log.txt**.

![enter image description here](https://apidocs.lrcontent.com/images/f6_91556107ba0d7c8896.64806419.png "enter image title here")

**12**. Send both files as shared links in a reply to your case. 


### Internet Explorer (IE11)


**1**. In Internet Explorer, go to the page within the web application where you are experiencing trouble.
**2**. Click the gear icon in the top right.
**3**. Select **F12 Developer** Tools or press F12 key on keyboard to open Developer tool.

![enter image description here](https://apidocs.lrcontent.com/images/ie1_30380610bc0291a8fb8.74839220.png "enter image title here")
**4**. Click the **Network** tab.

![enter image description here](https://apidocs.lrcontent.com/images/ie2_15927610bc08460d558.23969737.png "enter image title here")

**5**. Clear the **Clear entries on the navigate** option, which is selected by default. The icon looks like a blue arrow with a red X.

![enter image description here](https://apidocs.lrcontent.com/images/ie3_14826610bc0a49f3f09.53664986.png "enter image title here")

**6**. The green play button (**Start Profiling Session**) is selected by default. It means the capture function is running. 

![enter image description here](https://apidocs.lrcontent.com/images/ie4_6982610bc0ca8d8ed0.09864380.png "enter image title here")

**7.** Refresh the page and reproduce the problem while the capture is running.

**8**. Once you have reproduced the issue, click the **Export as HAR** icon. The icon looks like a floppy disk.
![enter image description here](https://apidocs.lrcontent.com/images/ie5_9159610bc0e607b3b2.86932125.png "enter image title here")

**9**. Click the **Console** tab.

![enter image description here](https://apidocs.lrcontent.com/images/ie6_10292610bc1148a7438.74371405.png "enter image title here")

**10**. Right-click any row and select **Copy all.**

**11**. Paste the content in a text file and name it **console-log.txt**.

**12**. Send both files as shared links in a reply to your case.

### Edge

**1**. In Edge, go to the page within the web application where you are experiencing trouble.

**2**. At the top-right of your browser window, click the Edge menu (**⋮**) or press F12 key on keyboard to open Developer tool.

![enter image description here](https://apidocs.lrcontent.com/images/edge1_31387610bbae4b98000.99303078.png "enter image title here")

**3**. Select **More Tools >Developer Tools** 

![enter image description here](https://apidocs.lrcontent.com/images/edge2_17334610bbe35a2d6b4.18475142.png "enter image title here")

**4**. If the network tab is not present click on the three horizontal buttons on the **developer console->More Tools->Network** to enable the network.

![enter image description here](https://apidocs.lrcontent.com/images/edge3_8717610bbe7e6995d1.82635519.png "enter image title here")

**5**. Click the **Network** tab.

![enter image description here](https://apidocs.lrcontent.com/images/edge4_8514610bbea5024909.03507728.png "enter image title here")
  
**6**. Clear the **Clear entries on the navigate** option, which is selected by default. The icon looks like a blue arrow with a red X.

![enter image description here](https://apidocs.lrcontent.com/images/edge5_16234610bbeec3f4745.14989968.png "enter image title here")

**7**. The green play button (**Start Profiling Session**), should be selected by default. It means the capture function is running.

![enter image description here](https://apidocs.lrcontent.com/images/edge6_4682610bbf12859455.42740723.png "enter image title here")

**8**. Refresh the page and reproduce the problem while the capture is running. 
 
**9**. Once you have reproduced the issue, click the **Export as HAR** icon. The icon looks like a floppy disk.

![enter image description here](https://apidocs.lrcontent.com/images/edge7_20373610bbf32b4e952.48853710.png "enter image title here")

**10**. Click the **Console** tab.

**11**. Right-click any row and select **Copy all.**

![enter image description here](https://apidocs.lrcontent.com/images/edge8_31775610bbff7bf17a3.10114354.png "enter image title here")

**12**. Paste the content in a text file and name it **console-log.txt**.

**13**. Send both files as shared links in reply to your case.

### Safari

**1**. In Safari, first ensure your **Develop** menu is available navigating to the menu bar and selecting **Preferences** > **Advanced**: "Show Develop menu in the menu bar"

**2**. Go to the page within the web application where you are experiencing trouble.

**3**. In the menu bar at the top,  keyboard shortcut Option+Command+i or click **Develop** and select **Show Web Inspector**.

![enter image description here](https://apidocs.lrcontent.com/images/safari1_5646610bc16b7e2fd2.32604174.png "enter image title here")

**4**. Click the **Console** tab and select **Preserve Log**.

**5**. Go back to the **Network** tab.

**6**. **Refresh the page** and reproduce the problem while the capture is running.

![enter image description here](https://apidocs.lrcontent.com/images/safari2_7252610bc18b841a89.24821425.png "enter image title here")

**7**. After you successfully reproduce the issue, right-click any row of the activity pane and select **Export HAR**.

![enter image description here](https://apidocs.lrcontent.com/images/safari3_5747610bc1d92573a4.70975906.png "enter image title here")

**8**. Click the **Console** tab.

**9**. Drag and Select all logs ,Right click on selected logs

![enter image description here](https://apidocs.lrcontent.com/images/safari4_19439610bc1f49f9ea5.33556732.png "enter image title here")

**10**. Click on **Save selected** option from the menu popping and **download the console.txt file.**

**11**. Send both files as shared links in reply to your case.


## Capture video screen

To record the actions made on your web application screen, you can use lots of available extensions like Loom, Awesome Screenshot, Vidyard, etc.

> **Note:** We do not partner with these extensions and aren't responsible for any issues caused by these apps. 

Learn how to capture the screen using the Loom extension and to record your voice and video as you explore your site or application with Chrome.

Creating detailed bug reports can be difficult, especially when it comes to writing long step-by-step instructions. Quick videos are a fast way to document and understand what is going on with your website or application and fix them.

![enter image description here](https://apidocs.lrcontent.com/images/loom1_8164610bc22d3eb008.70508392.png "enter image title here")

Loom allows you to record your browser window and accompanying audio and video as you browse a site in Chrome. 

### Check the following steps. 

**1**. Open your [**Chrome**](https://www.google.com/chrome/) browser.

**2**. Now Install the [**Loom Chrome extension**](https://chrome.google.com/webstore/detail/openvid-screen-mic-and-ca/liecbddmkiiihnedobmlmillhodjkdmb?hl=en-US).

**3**. After that, create an account at[ www.loom.com](https://opentest.co/).

**4**. Let’s open the website you want to record.

**5**. Select the Loom extension: choose the available option for recording (**Screen Camera, Screen only**)

![enter image description here](https://apidocs.lrcontent.com/images/loom2_26359610bc2d0d3a213.88482151.png "enter image title here")

**6**. Click on **Start Recording**. You're now recording a video of the site with audio from your microphone. 

![enter image description here](https://apidocs.lrcontent.com/images/loom3_10329610bc2eab1bd85.85121637.png "enter image title here")

**7**. Select the **circle in the lower left of the browser** to turn on your webcam. 

![enter image description here](https://apidocs.lrcontent.com/images/loom4_16911610bc312cb8792.08861905.png "enter image title here")

**8**. Now, you're recording your face from the webcam, and you can end or cancel the recording just using the options available beside it.

**9**. Select the Loom extension again. 

**10**. Recording ends. 

**11**. See all of your recorded videos at [https://www.loom.com/my-videos](https://www.opentest.co/my-videos).

![enter image description here](https://apidocs.lrcontent.com/images/loom5_13903610bc31f7366a5.01467800.png "enter image title here")

## Check your browser version.

To quickly check the information regarding the browser you are using and know whether your browser is up to date? 

Find these details and more information swiftly! And you can share the details with the support team for further investigation when facing some challenges with your site or web application. 

> **Note:** We do not partner with this website and aren't responsible for any issues caused by it. 


### Check the following steps to get the information quickly.


* Open the browser on which you are facing the issue.
* Now visit [https://www.whatismybrowser.com/](https://www.whatismybrowser.com/) on it.

![enter image description here](https://apidocs.lrcontent.com/images/cb1_2830610bc3987150b1.62895394.png "enter image title here")

* You will get the browser information on the top of the page, and just below, copy the link available under **Your web browser's unique URL.** 

![enter image description here](https://apidocs.lrcontent.com/images/cb2_17560610bc38c485783.86311026.png "enter image title here")

* Send this link to the support team to share information about your system details & configuration.