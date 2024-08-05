Data Points
======

----------

Depending on the social providers you have selected for your application and/or website, you should review what data points are available to you. While LoginRadius does normalize the data retrieved from these providers, there are certain restrictions introduced by specific providers regarding which data points they will allow access to.

An updated chart of all data points available from each provider can be found here:

https://www.loginradius.com/datapoints

User Registration provides some default field settings and details on these can be found here:

http://support.loginradius.com/hc/en-us/articles/204279815-User-Registration-Fields-and-Default-Constraints

<iframe src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fplayer.vimeo.com%2Fvideo%2F129605122&url=https%3A%2F%2Fvimeo.com%2F129605122&image=http%3A%2F%2Fi.vimeocdn.com%2Fvideo%2F581231112_960.jpg&key=02466f963b9b4bb8845a05b53d3235d7&type=text%2Fhtml&schema=vimeo" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>


##Data Structure
The LoginRadius User Registration system utilizes two identifiers in order to uniquely identify your users:



1. Account ID (UID): The identifier for each User Account. The UID may have multiple IDs (identifier for each User Profile) attached to it.
2. User ID (ID): The LoginRadius user identifier for a specific User Profile. A User Profile is a traditional email and password profile or profile created with a social provider. Each ID will be attached to a UID. 

LoginRadius identifies a user's identity based on the Account ID (UID). This Account ID(UID) may be comprised of multiple social provider User Profiles as well as a traditional email and password User Profile. New social provider User Profiles that utilize the same email address will be automatically be linked to this account. New social accounts can also be manually linked to this Account ID (UID) using the [Account Linking API](/api/v1/user-registration/account-linking) and the User ID (ID) for the social provider User Profile that you are trying to link. Custom objects are dynamic JSON objects that can store advanced custom user data and are identified with an Object ID that is provided by LoginRadius and the Account ID (UID).

![enter image description here](https://apidocs.lrcontent.com/images/LoginRadius-Data-Overview_670058a414949994c8.05648291.png "")