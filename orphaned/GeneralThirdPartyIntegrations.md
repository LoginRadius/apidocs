# General Third Party Integrations – LoginRadius

LoginRadius' flexible Rest API allows for integrations with many third party APIs, the below flowchart and algorithm outlines the basic steps for setting up a third party integration with LoginRadius' API.



**Integration Flowchart**

![][1]

 **Integration Process**

The below series of steps will need to be taken in order to setup an integration with a Third party API.



1. [Setup your LoginRadius account][2] and [configure the Social Networks][3] that will be used in this integration.



2\. Implement LoginRadius on the site that will be utilizing the Third Party integration, use one of our [Prebuilt SDKs][4] or through our [REST APIs][5].



3\. Download a copy of the Third Party SDK or review their API documentation.



4\. Retrieve a copy of the Social Provider user data using LoginRadius' [User Profile API][6], Data is returned in JSON format and sample data-sets can be viewed [here][7].



5\. Depending on the returned User Profile request any missing data-points that are required for the Third Party API. (ex. Twitter does not return email address as a part of their dataset, email is a common unique identity that is used in Third Party data-stores. You will need to request email address directly from the user if it is required.) You can view the data-sets for each provider [here][8].



6\. Pass the User Profile data into the Third Party API.



If you have questions about a specific integration you can reach out to our development team [here][9].



[1]: https://support.loginradius.com/hc/en-ca/article_attachments/201374859/Third-Party-Integration-Flow.png
[2]: https://support.loginradius.com/hc/en-us/articles/203107235-Social-Login-Implementation-Flow
[3]: https://support.loginradius.com/hc/en-us/sections/200714269-Configuration-Guides
[4]: http://apidocs.loginradius.com/api-libraries-overview
[5]: http://apidocs.loginradius.com/
[6]: http://apidocs.loginradius.com/user-profile
[7]: http://www.loginradius.com/datapoints
[8]: https://secure.loginradius.com/datapoints
[9]: https://support.loginradius.com/hc/en-us/requests/new
[Source](https://support.loginradius.com/hc/en-us/articles/203305899-General-Third-Party-Integrations- "Permalink to General Third Party Integrations – LoginRadius")

# General Third Party Integrations – LoginRadius

LoginRadius' flexible Rest API allows for integrations with many third party APIs, the below flowchart and algorithm outlines the basic steps for setting up a third party integration with LoginRadius' API.



**Integration Flowchart**

![][1]

 **Integration Process**

The below series of steps will need to be taken in order to setup an integration with a Third party API.



1. [Setup your LoginRadius account][2] and [configure the Social Networks][3] that will be used in this integration.



2\. Implement LoginRadius on the site that will be utilizing the Third Party integration, use one of our [Prebuilt SDKs][4] or through our [REST APIs][5].



3\. Download a copy of the Third Party SDK or review their API documentation.



4\. Retrieve a copy of the Social Provider user data using LoginRadius' [User Profile API][6], Data is returned in JSON format and sample data-sets can be viewed [here][7].



5\. Depending on the returned User Profile request any missing data-points that are required for the Third Party API. (ex. Twitter does not return email address as a part of their dataset, email is a common unique identity that is used in Third Party data-stores. You will need to request email address directly from the user if it is required.) You can view the data-sets for each provider [here][8].



6\. Pass the User Profile data into the Third Party API.



If you have questions about a specific integration you can reach out to our development team [here][9].



[1]: https://support.loginradius.com/hc/en-ca/article_attachments/201374859/Third-Party-Integration-Flow.png
[2]: https://support.loginradius.com/hc/en-us/articles/203107235-Social-Login-Implementation-Flow
[3]: https://support.loginradius.com/hc/en-us/sections/200714269-Configuration-Guides
[4]: http://apidocs.loginradius.com/api-libraries-overview
[5]: http://apidocs.loginradius.com/
[6]: http://apidocs.loginradius.com/user-profile
[7]: http://www.loginradius.com/datapoints
[8]: https://secure.loginradius.com/datapoints
[9]: https://support.loginradius.com/hc/en-us/requests/new
