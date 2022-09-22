# Mobile Features

This document goes over mobile specific UX flows and gives a general idea about what these things are. Currently, LoginRadius supports authentication only through Touch Id & Mobile SSO.

- Touch ID


    Touch ID is a fingerprint recognition feature, designed and released by Apple, that allows users to unlock, authenticate devices, and make purchases in many Apple digital media stores including the iTunes Store, the App Store, and the Apple Books Store.
    Touch ID is built into the home button and features a stainless steel detection ring to help detect the finger of the user without even pressing it.


    The workflow for authentication with Touch ID is:

    1) Touch ID is used in Apple devices only. 

    2) The User needs to log in successfully in the app once and after being logged in successfully they need to add touch id or fingerprint to the app so that they can enable the functionality.

    3) The id generated in the previous step is stored locally in the mobile/device.

    4) Then user Logs-In via touch ID/fingerprint.

- Mobile SSO


    Mobile SSO allows users to access any mobile property with a single identity. Even when customers jump from one site to the next, it will recognize them every time. It eradicates the need for users to memorize and maintain credentials for various applications. In other words, Single Sign-on (SSO) is a service that allows a user to use one set of credentials to access multiple social Identities.

    In other words, it eliminates the time a user spends on re-entering a password, thus improving productivity for users.

    The workflow for authentication with Mobile SSO is

    1. User opens a mobile app where SSO is enabled
    2. Check for active SSO session.
    3. If the session is activated then login user and retrieve user profile or access advanced APIs.
    4. If the session is not activated then login through a social provider or he can use traditional login.
    5. After that, it creates an SSO session and retrieves the user profile.



- Alexa/Google Home Support


    Google Home is a set of smart speakers developed by Google. It enables users to execute their day to day task by enabling them to speak voice commands through Google’s assistant software named *Google Assistant*.

    A large number of services accommodate Google Home to allow users to either listen to music, or read news updates entirely by voice, or change a music track, or perform other tasks. Also, it has support for integrating home automation which allows users to control their home appliances with voice commands.

    **Amazon Alexa**, known as Alexa, is a virtual assistant developed by Amazon, first introduced in the Amazon Echo and the Amazon Echo Dot smart speakers. Alexa can also automate your home by providing such features as controlling your TV, listening to your favorite music and many more things.

-  Mobile anonymous login

    Anonymous login is a process that allows a user to login to a website anonymously, often by using “anonymous” as the username on mobile platforms. It is used to provide easy access to the user to the product. The process involves identifying and assigning a unique ID to each visitor and adding them under the “anonymous login” label, tracking the activity of the visitor, and linking the data to the user profile if that user registers.

## Conclusion



There are various mobile features like 
- Touch ID
- Mobile SSO
- Alexa/Google Home Support
- Mobile anonymous login

Which allow you to achieve extra functionality to increase the power of our product. You can either listen to music, or read news updates entirely by voice, or change a music track using **Google Home** or access any mobile property with a single identity using **Mobile SSO** or track anonymous login using our **Anonymous Login** feature and use a famous fingerprint recognition feature **“TouchID”**.

