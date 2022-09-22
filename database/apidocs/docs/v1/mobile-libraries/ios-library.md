# iOS Library

---

This document provides instructions to integrate the LoginRadius User Registration Service or Social Login in an iOS app.

<select onchange= "detectChange(this.value)">
  <option value = "objectiveC"> Objective-C </option>
  <option value = "swift"> Swift </option>
</select>

> **Disclaimer**

> This library is meant to help you with a quick implementation of the LoginRadius platform and also to serve as a reference point for the LoginRadius API. Keep in mind that it is an open source library, which means you are free to download and customize the library functions based on your specific application needs.

##Requirements
[OS X](http://www.apple.com/macos/sierra/), [Xcode](https://developer.apple.com/xcode/) and iOS 9 or higher.

> See the changelog for our iOS SDK 3.5.0 [here](https://github.com/LoginRadius/ios-sdk/blob/api-v1/CHANGELOG.md)

Follow Migration Guide in the end for step by step instructions on migrating to v3.5 and beyond.

###Installation
We recommend to use CocoaPods for installing the library in a project.

[CocoaPods](http://cocoapods.org/) is a dependency manager for Objective-C, which automates and simplifies the process of using 3rd-party libraries like AFNetworking in your projects. See the ["CocoaPods" documentation for more information](https://guides.cocoapods.org/). You can install it with the following command:

```
$ gem install cocoapods
```

**Podfile**

Open a terminal window and navigate to the location of the Xcode project for your application. If you have not already created a Podfile for your application, create one now:

```
$ pod init
```

To integrate LRSDK into your Xcode project using CocoaPods, specify it in your `Podfile`:

```
source 'https://github.com/CocoaPods/Specs.git'
platform :ios, '9.0'

target 'TargetName' do
pod 'LoginRadiusSDK', '~> 3.5.0'
end
```

Then, run the following command:

```
$ pod install
```

###Configure Your LoginRadius Account
To get your app supported by LoginRadius IOS SDK, you need to configure your LoginRadius user account in the LoginRadius' Admin Console.

- Enable cdn.loginradius.com in your site list
- Enable &lt;SiteName&gt;:// in your site list for Social Login to work properly. Ex: samplesite://

Since this page is hosted in cdn.loginradius.com, please put it under your website URL list in Site Settings

![enter image description here](https://apidocs.lrcontent.com/images/ecgVdomCSGWqnZxDGC9w_Site Configuration LoginRadius User Admin Console_992958a3f892014481.67705102.png "")

###Configure Registration Service
For configuring user registration service please refer to [this](http://support.loginradius.com/hc/en-us/articles/203386455-User-Registration-Implementation-Flow) doc.

###Configure Social Login
For Social login configuration please refer to [this](/api/v1/social-login/social-login-overview) doc.

###Configure Email Templates
By default your email template should look like this:

![enter image description here](https://apidocs.lrcontent.com/images/ATeWnuRTpZ7FpbXJ0QQB_Email Templates LoginRadius User Admin Console_3060158a3f912dff8d9.56085975.png "")

Change the following url

```
#Url#?vtype=emailverification&vtoken=#GUID#
```

to

```
#Url#?vtype=emailverification&vtoken=#GUID#&apikey=<Your-LoginRadius-API-Key>
```

And the same changes should also be applied to your "Reset Password Email Template Configuration".

For more customization please refer to [this](http://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization) doc.

###Initialize SDK

1. Create a new File `LoginRadius.plist` and add it to your App

2. Add the following entries to your `LoginRadius.plist`

|               Key                |                                             Value                                             | Required |
| :------------------------------: | :-------------------------------------------------------------------------------------------: | :------: |
|              ApiKey              |                                   Your LoginRadius API Key                                    |   Yes    |
|             SiteName             |                                   Your LoginRadius Sitename                                   |   Yes    |
|        V2RecaptchaSiteKey        |                                   Google V2RecaptchaSiteKey                                   | Optional |
|          HostedPageURL           |                                   Your Custom Login Website                                   | Optional |
|    EnableGoogleNativeInHosted    |                                            Boolean                                            | Optional |
|   EnableFacebookNativeInHosted   |                                            Boolean                                            | Optional |
| NativeSocialAskForRequiredFields | Boolean, this would prompt the user to input required fields in hosted page from native calls | Optional |

> Obtaining Sitename and API key

> Details on obtaining Sitename [here](http://support.loginradius.com/hc/en-us/articles/204614109-How-do-I-get-my-LoginRadius-Site-Name-) and API key [here](/api/v1/getting-started/get-api-key-and-secret)

1. Import the module in your source code.

```
{class='objectiveC'}
#import <LoginRadiusSDK/LoginRadius.h>
```

```
{class='swift'}
import LoginRadiusSDK
```

> Swift

> For Swift projects, you need to create an Objective-C Bridging Header, please check [Apple Documentation](https://developer.apple.com/library/ios/documentation/swift/conceptual/buildingcocoaapps/MixandMatch.html)

**Application is launched**

Initilize the SDK with your API key and Site name in your `AppDelegate.m` or `AppDelegate.swift`

```
{class='objectiveC'}
//  AppDelegate.m

#import <LoginRadiusSDK/LoginRadius.h>

- (BOOL)application:(UIApplication *)application didFinishLaunchingWithOptions:(NSDictionary *)launchOptions {
    LoginRadiusSDK * sdk =  [LoginRadiusSDK instance];
    [sdk applicationLaunchedWithOptions:launchOptions];

    //Your code

    return YES;
}
```

```
{class='swift'}
import LoginRadiusSDK

...


@UIApplicationMain class AppDelegate: UIResponder, UIApplicationDelegate {

...

    func application(_ application: UIApplication, didFinishLaunchingWithOptions launchOptions:[UIApplicationLaunchOptionsKey: Any]?) -> Bool {

            let sdk:LoginRadiusSDK = LoginRadiusSDK.instance();
            sdk.applicationLaunched(options: launchOptions);

            //Your code

            return true
    }

...

}
```

**Application to listen your URL**

You need to configure your Custom URL Scheme for this library to work.

1. In Xcode, secondary-click your project's .plist file and select Open As -> Source Code.
2. Insert the following XML snippet into the body of your file just before the final </dict> element. Replace `{your-sitename}` with your LoginRadius Site Name.

```
<key>CFBundleURLTypes</key>
<array>
    <dict>
        <key>CFBundleURLSchemes</key>
        <array>
            <string>{your-sitename}</string>
        </array>
    </dict>
</array>
```

**Application is asked to open URL**

Call this to handle URL's for social login to work properly in your `AppDelegate.m`

```
{class='objectiveC'}
//  AppDelegate.m
- (BOOL)application:(UIApplication *)app openURL:(NSURL *)url options:(NSDictionary<UIApplicationOpenURLOptionsKey,id> *)options {
    return [[LoginRadiusSDK sharedInstance] application:app
                                                openURL:url
                                      sourceApplication:options[UIApplicationOpenURLOptionsSourceApplicationKey]
                                             annotation:options[UIApplicationOpenURLOptionsAnnotationKey]];
}

```

```
{class='swift'}
@UIApplicationMain class AppDelegate: UIResponder, UIApplicationDelegate {

...

    func application(_ app: UIApplication, open url: URL, options: [UIApplicationOpenURLOptionsKey : Any] = [:]) -> Bool
    {
        return LoginRadiusSDK.sharedInstance().application(app, open: url, sourceApplication: options[UIApplicationOpenURLOptionsKey.sourceApplication] as! String, annotation: options[UIApplicationOpenURLOptionsKey.annotation])
    }

...

}
```

###Integrate Registration Service
Registration service supports traditional registration and login methods using hosted pages.
Call this function in the view controller you have setup for the button views.

####Supported Actions
Supported actions are** login, registration, forgotpassword, social**

- login - to show login interface

![enter image description here](https://apidocs.lrcontent.com/images/IMoaB8CuQfKT0HTWvTwO_login_1329458a3fd618af367.49370700.png)

- registration - to show the registration form as per your configuration

![enter image description here](https://apidocs.lrcontent.com/images/yEQJsj63S12IT8UVTNUH_registration_1218258a3fd915f2960.67248810.png)

- forgotpassword - to show forgot password interface

![enter image description here](https://apidocs.lrcontent.com/images/mK2eTSmbSsWbhAd3Qcml_forgotpassword_2510758a3fdcb6b34d8.38775326.png)

- social - to show a list of social login providers for login

![enter image description here](https://apidocs.lrcontent.com/images/mfhcZtr5SAOgPStHWgVR_social_1348958a3fdf302d546.97409367.png)

Example using **login** action:

```
{class='objectiveC'}
- (void)viewDidLoad {
    [super viewDidLoad];

    ...

    [[NSNotificationCenter defaultCenter] addObserver:self
    selector:@selector(receiveLogin:)
    name:LoginRadiusLoginEvent
    object:nil];

}

-(void)dealloc {
    [[NSNotificationCenter defaultCenter] removeObserver:self];
}

- (IBAction)login:(id)sender {
    [[LoginRadiusManager sharedInstance] registrationWithAction:@"login" inController:self];
}

- (void) receiveLogin:(NSNotification *) notification
{
    if([[notification userInfo][@"error"] isKindOfClass:[NSError class]])
    {
        NSError *error = (NSError *)[notification userInfo][@"error"];
        NSLog("Error: %@",[error localizedDescription]);

        //Your error handling

    }else
    {
        //Your code after login is succesfully authenticated
        // e.g:  [self showProfileController];
    }
}
```

```
{class='swift'}
override func viewDidLoad()
{
        super.viewDidLoad()

        ...

        NotificationCenter.default.addObserver(self, selector: #selector(ViewController.receiveLogin), name: NSNotification.Name(rawValue: LoginRadiusLoginEvent), object: nil)
}

deinit
{
    NotificationCenter.default.removeObserver(self)
}

func login()
{
    LoginRadiusManager.sharedInstance().registration(withAction: "login", in: self)
}

func receiveLogin(notification:Notification)
{
    if let userInfo  = notification.userInfo,
       let error  = userInfo["error"] as? Error
    {
        self.showAlert(title: "ERROR", message: error.localizedDescription)
    }else
    {
        self.showProfileController()
    }
}

```

####Missing fields

It is very common that a social ID provider does not return all of the fields you specified in your LoginRadius Admin-console, and twitter does not return "Email" field. This situation has been handled in the SDK, if there are missing fields and our system finds it after the user logs in, it will popup a form asking for the missing fields.

![enter image description here](https://apidocs.lrcontent.com/images/smA7RaI8TWay4pXnT9Ab_missingfield_1210558a3fe6c55e307.75916971.png)

####Customize Your Form
If you want a customized form so it is closer to your colour scheme or culture, you can contact us at support@loginradius.com, since all the forms are essentially HTML and CSS, you can host the central mobile page yourself as well, and give it a different outlooking.

###Integrate Social Login

Social Login can be done in two ways.

1. Traditional Social Login: This is done using `SFSafariViewController` or `UIWebView`.

SFSafariViewController is the default choice for authentication. If it is not available i.e < iOS 9,social login falls back to UIWebView.

> Google will no longer allow OAuth requests in embedded browsers UIWebView/WKWebView on iOS.
> For Google Sign In to work for devices with < iOS 8, we suggest to implement Google Native Login.

2. Native Social Login

Login is done natively, utilizing the respective provider SDK's.

#### Native Social Login

**Facebook native login**

> For Native facebook login to work, create and configure your Facebook app as per [facebook docs](https://developers.facebook.com/facebook-login/ios).

You don't need to download and integrate the Facebook SDK with your project. It is distributed as a dependency with LoginRadius SDK. Just make sure your `Info.plist` looks like this

![![Facebook Native Login Configuration](https://apidocs.lrcontent.com/images/Screen-Shot-2017-04-18-at-12-21-30-PM_556158f5b7b278fd19.62604375.png "")](https://apidocs.lrcontent.com/images/fb_config_780858f5b8c422bed2.36763090.png "Facebook Configuration")

and you are calling
`application:openURL:sourceApplication:annotation` in your `AppDelegate.m`.

```
{class='objectiveC'}
//  AppDelegate.m

- (BOOL)application:(UIApplication *)app openURL:(NSURL *)url options:(NSDictionary<UIApplicationOpenURLOptionsKey,id> *)options {
    return [[LoginRadiusSDK sharedInstance] application:app
                                                openURL:url
                                      sourceApplication:options[UIApplicationOpenURLOptionsSourceApplicationKey]
                                             annotation:options[UIApplicationOpenURLOptionsAnnotationKey]];
}

```

```
{class='swift'}
@UIApplicationMain class AppDelegate: UIResponder, UIApplicationDelegate {

...

    func application(_ app: UIApplication, open url: URL, options: [UIApplicationOpenURLOptionsKey : Any] = [:]) -> Bool
    {
        return LoginRadiusSDK.sharedInstance().application(app, open: url, sourceApplication: options[UIApplicationOpenURLOptionsKey.sourceApplication] as! String, annotation: options[UIApplicationOpenURLOptionsKey.annotation])
    }

...

}
```

> Replace the values with your Facebook App ID and Display name from your App Settings page in [Facebook Developer portal](https://developers.facebook.com/)

Call the function to start Facebook Native Login.

```
{class='objectiveC'}
[[LoginRadiusManager sharedInstance] nativeFacebookLoginWithPermissions: @{
                  @"facebookPermissions": @[@"public_profile"]
                }
                inController:self
             completionHandler:^(BOOL success, NSError *error) {
    if (success) {
        NSLog(@"Successfully logged in with facebook");
    } else {
        NSLog(@"Error: %@", [error description]);
    }
}];

```

```
{class='swift'}
LoginRadiusSocialLoginManager.sharedInstance().nativeFacebookLogin(withPermissions: ["facebookPermissions": ["public_profile"]], in: self, completionHandler: {( data, error) -> Void in

    if let err = error {
        print(err.localizedDescription)
    } else {
        print("Successfully logged in with facebook")
    }
})
```

<br>

**Twitter native login**

As of iOS 11, Twitter Native Login is done through the TwitterKit Library. The TwitterKit library works to perform native login on previous iOS versions.

First you need to create a Twitter App.
Get your Twitter Keys from [Twitter Dev Console](https://apps.twitter.com/). Go to your App Page and you will find the keys under **Keys And Access Tokens** tab.

Then add "TwitterKit" Library to your iOS Project's `Podfile`.

```
pod 'TwitterKit'
```

You can follow the original guide over at Twitter's [documentation](https://dev.twitter.com/twitterkit/ios/overview)

Or follow these steps:

1.  Instatiate the TwitterKit in `AppDelegate` during app launch

        ```

    {class='objectiveC'} - (BOOL)application:(UIApplication _)application didFinishLaunchingWithOptions:(NSDictionary _)launchOptions {

            [[Twitter sharedInstance] startWithConsumerKey:@"Your twitter consumer key" consumerSecret:@"Your twitter consumer SECRET key"];

            //Your other Library that needs instantiation, e.g. LoginRadiusSDK
        }
        ```
        ```

    {class='swift'}
    func application(\_ application: UIApplication, didFinishLaunchingWithOptions launchOptions: [UIApplicationLaunchOptionsKey: Any]?) -> Bool {

            Twitter.sharedInstance().start(withConsumerKey:"Your twitter consumer key", consumerSecret:"Your twitter consumer SECRET key")

            //Your other Library that needs instantiation, e.g. LoginRadiusSDK
        }
        ```

2.  Add these in your `Info.plist`

    ```
    <key>CFBundleURLTypes</key>
    <array>
      <dict>
        <key>CFBundleURLSchemes</key>
        <array>
          <string>twitterkit-<consumerKey></string>
        </array>
      </dict>
    </array>
    <key>LSApplicationQueriesSchemes</key>
    <array>
        <string>twitter</string>
        <string>twitterauth</string>
    </array>
    ```

3.  Linking your UIButton to Twitter Native Login link it with LoginRadius on success

        ```

    {class='objectiveC'}
    //This is the function call linked to a UIButton, you can add IBAction in here to link with the storyboard - (void)showNativeTwitterLogin {
    [[Twitter sharedInstance] logInWithCompletion:
    ^(TWTRSession _ \_Nullable session, NSError _ _Nullable error) {
    if (session){
    [[LoginRadiusManager sharedInstance] convertTwitterTokenToLRToken:session.authToken twitterSecret:session.authTokenSecret inController:self completionHandler:^(BOOL success, NSError \*error) {
    if (success){
    //Your Code after LoginRadius Authenticate Twitter Token
    }else if(error){
    //User cancelled or errored on LoginRadius Authentication Page
    }
    }];
    } else if (error){
    //User cancelled or errored on Twitter Authentication Page
    }
    }];
    }
    ``
    {class='swift'}
    //This is the function call linked to a UIButton, you can add IBAction in here to link with the storyboard
    func showNativeTwitterLogin(){
    Twitter.sharedInstance().logIn(completion: { (session, error) in
    if let session = session {
    LoginRadiusManager.sharedInstance().convertTwitterToken(toLRToken: session.authToken, twitterSecret: session.authTokenSecret, in: self, completionHandler: {(_ success: Bool, \_ error: Error?) -> Void in
    if success
    {
    //Your Code after LoginRadius Authenticate Twitter Token
    }else if let err = error
    {
    //User cancelled or errored on LoginRadius Authentication Page
    }
    })
    } else if let err = error{
    //User cancelled or errored on Twitter Authentication Page
    }
    })
    }

    ```

    ```

4.  Add these code to handle Twitter's URL Redirection in `AppDelegate`

        ```

    {class='objectiveC'} - (BOOL)application:(UIApplication _)app openURL:(NSURL _)url options:(NSDictionary<UIApplicationOpenURLOptionsKey,id> \*)options {
    BOOL canOpen = NO;
    canOpen = (canOpen || [[Twitter sharedInstance] application:app openURL:url options:options]);
    canOpen = (canOpen || [[LoginRadiusSDK sharedInstance] application:app
    openURL:url
    sourceApplication:options[UIApplicationOpenURLOptionsSourceApplicationKey]
    annotation:options[UIApplicationOpenURLOptionsAnnotationKey]]);
    return canOpen;
    }
    ``
    {class='swift'}
    func application(\_ app: UIApplication, open url: URL, options: [UIApplicationOpenURLOptionsKey : Any] = [:]) -> Bool{
    var canOpen = false
    canOpen = (canOpen || Twitter.sharedInstance().application(app, open: url, options: options))
    canOpen = (canOpen || LoginRadiusSDK.sharedInstance().application(app, open: url, sourceApplication: options[UIApplicationOpenURLOptionsKey.sourceApplication] as! String, annotation: options[UIApplicationOpenURLOptionsKey.annotation]))

            return canOpen
        }
        ```

5.  As the final step, handle Twitter log out

        ```

    {class='objectiveC'} - (void)logoutPressed:(id)sender {

            [self twitterLogout];
            [LoginRadiusSDK logout];

            //do your UI logout behaviour, e.g:
            [self.navigationController popViewControllerAnimated:YES];
        }

        - (void) twitterLogout
        {
            NSArray * twitterSessions;
            twitterSessions = [[[Twitter sharedInstance] sessionStore] existingUserSessions];
            if (twitterSessions){
                for (id session in twitterSessions){
                    [[[Twitter sharedInstance] sessionStore] logOutUserID:[session userID]];
                }
            }
        }
        ```
        ```

    {class='swift'}
    func logoutPressed() {
    twitterLogout()
    LoginRadiusSDK.logout()

    //do your UI logout behaviour, e.g:
    let \_ = self.navigationController?.popViewController(animated: true)
    }

        func twitterLogout(){
            if let twitterSessions = Twitter.sharedInstance().sessionStore.existingUserSessions() as? [TWTRAuthSession]{
                for session in twitterSessions{
                    Twitter.sharedInstance().sessionStore.logOutUserID(session.userID)
                }
            }
        }
        ```

> We suggest you to OBFUSCATE YOUR KEYS.

**Google native login**

Google Native Login is done through Google SignIn Library, since this is a static library and have problems when you are using CocoaPods with `uses_frameworks!`, you have to manually install the SDK.

To enable Google Native Login add Google SignIn Library to your `Podfile`.

```
pod 'Google/SignIn'
```

And follow these steps:

1.  For Google SignIn you would need a configuration file `GoogleServices-Info.plist`. You can generate one following the steps [here](https://developers.google.com/mobile/add?platform=ios).

2.  Drag the `GoogleService-Info.plist` file you just downloaded into the root of your Xcode project and add it to all targets.

3.  Google SignIn requires a custom URL Scheme to be added to your project. Add it to your `Info.plist` file. Make sure your URL Schemes in URL Types looks like this.

    ![enter image description here](https://apidocs.lrcontent.com/images/google_config_2754258f5bac5a74374.81071661.png)

    > Replace `{your REVERSED_CLIENT_ID}` with value of `REVERSED_CLIENT_ID` from `GoogleServices-Info.plist` file.

4.  Add Google Sign In by following the [documentation](https://developers.google.com/identity/sign-in/ios/sign-in)

5.  Now change your App Delegate's open url to handle both google native sign in and our default logins

        ```

    {class='objectiveC'}

        - (BOOL)application:(UIApplication *)app openURL:(NSURL *)url options:(NSDictionary<UIApplicationOpenURLOptionsKey,id> *)options {

            BOOL canOpen = NO;

            canOpen = [[GIDSignIn sharedInstance] handleURL:url
            sourceApplication:options[UIApplicationOpenURLOptionsSourceApplicationKey]
            annotation:options[UIApplicationOpenURLOptionsAnnotationKey]];

            canOpen = (canOpen || [[LoginRadiusSDK sharedInstance]
            application:app
            openURL:url
            sourceApplication:options[UIApplicationOpenURLOptionsSourceApplicationKey]
            annotation:options[UIApplicationOpenURLOptionsAnnotationKey]]);

            return canOpen;
        }
        ```
        ```

    {class='swift'}
    func application(\_ app: UIApplication, open url: URL, options: [UIApplicationOpenURLOptionsKey : Any] = [:]) -> Bool
    {
    var canOpen = false

    canOpen = (canOpen || GIDSignIn.sharedInstance().handle(url, sourceApplication: options[UIApplicationOpenURLOptionsKey.sourceApplication] as! String, annotation: options[UIApplicationOpenURLOptionsKey.annotation]))

            canOpen = (canOpen || LoginRadiusSDK.sharedInstance().application(app, open: url, sourceApplication: options[UIApplicationOpenURLOptionsKey.sourceApplication] as! String, annotation: options[UIApplicationOpenURLOptionsKey.annotation]))

            return canOpen
        }
        ```

6.  You have to exchange Google token with LoginRadius Token. Call the following function in the SignIn delegate method after successful sign in.

        ```

    {class='objectiveC'} - (void)signIn:(GIDSignIn _)signIn
    didSignInForUser:(GIDGoogleUser _)user
    withError:(NSError *)error {
    NSString *idToken = user.authentication.accessToken;
    UIViewController _currentVC = [(UINavigationController _)[[self window] rootViewController] topViewController];
    [[LoginRadiusManager sharedInstance] convertGoogleTokenToLRToken:idToken inController:currentVC completionHandler:^(BOOL success, NSError \*error) {
    if (success) {
    NSLog(@"successfully logged in with google");

    [[NSNotificationCenter defaultCenter] postNotificationName:@"userAuthenticatedFromNativeGoogle" object:nil userInfo:nil];

                 } else {
                     NSLog(@"Error: %@", [error description]);
                 }
             }];
        }

        ```
        ```

    {class='swift'}
    func sign(\_ signIn: GIDSignIn!, didSignInFor user: GIDGoogleUser!, withError error: Error!) {

            if let err = error
            {
                print("Error: \(err.localizedDescription)")
            }
            else
            {
                let idToken: String = user.authentication.accessToken
                if let navVC = self.window?.rootViewController as? UINavigationController,
                let currentVC = navVC.topViewController
                {
                    LoginRadiusManager.sharedInstance().convertGoogleToken(toLRToken: idToken, in:currentVC, completionHandler: {(_ success: Bool, _ error: Error?) -> Void in
                        if success {
                            print("successfully logged in with google")
                            NotificationCenter.default.post(name: Notification.Name("userAuthenticatedFromNativeGoogle"), object: nil, userInfo: nil)
                        }
                        else {
                            print("Error: \(String(describing: error?.localizedDescription))")
                        }
                    })
                }
            }
        }
        ```

7.  As the final step, add the google native signOut on your logout buttton.

        ```

    {class='objectiveC'}

        - (IBAction)logoutPressed:(id)sender {

          [[GIDSignIn sharedInstance] signOut];

          [LoginRadiusSDK logout];
          [self.navigationController popViewControllerAnimated:YES];
        }
        ```
        ```

    {class='swift'}
    func logoutPressed()
    {
    GIDSignIn.sharedInstance().signOut()

            LoginRadiusSDK.logout()
            let _ = self.navigationController?.popViewController(animated: true)
        }
        ```

### Custom Mobile Hosted Page

As of 3.4 we added the option to show your own custom hosted login page.
You need to get a copy of our cdn hosted page. You can get a copy by contacting us.
See more information about the mobile [here](/api/v1/mobile-libraries/mobile-hosted-page)

Follow these steps to show your custom mobile hosted page in your iOS app

On your LoginRadius.plist put your full url on

|      Key      |           Value           |
| :-----------: | :-----------------------: |
| HostedPageURL | Your Custom Login Website |

Check your LoginRadius' Admin Console to make sure that your HostedPageURL is whitelisted. If not, you need to add it.

![enter image description here](https://apidocs.lrcontent.com/images/ecgVdomCSGWqnZxDGC9w_Site Configuration LoginRadius User Admin Console_992958a3f892014481.67705102.png "")

### Integrate Native Social Login with Mobile Hosted Page

In 3.4 we added an interaction for the Mobile Hosted Page to trigger your native social login in your iOS app. Currently the only supported Native call from Mobile Hosted Page are Facebook Native Login and Google Native Login.

You must have your app configured to perform the [native social login](#nativesociallogin13) before doing this.

Follow these steps:

On your LoginRadius.plist set the enable<Social>NativeInHosted to true

|             Key              |  Value  |
| :--------------------------: | :-----: |
|  EnableGoogleNativeInHosted  | Boolean |
| EnableFacebookNativeInHosted | Boolean |

Then, on your ViewController that handles the login, add these NSNotification and listen to these event to trigger your implemented native social logins. The notification names are: "googleNative" and "facebookNative"

```
{class='objectiveC'}
- (void)viewDidLoad {
    [super viewDidLoad];

    ...

    [[NSNotificationCenter defaultCenter] addObserver:self
    selector:@selector(<# Your Native Social Login Function #>)
    name:@"facebookNative"
    object:nil];

}

-(void)dealloc {

    [[NSNotificationCenter defaultCenter] removeObserver:self name:@"facebookNative" object:nil]

    ...

    [super dealloc];
}

```

```
{class='swift'}
override func viewDidLoad()
{
    super.viewDidLoad()

    ...

    NotificationCenter.default.addObserver(self, selector: #selector(<# Your Native Social Login Function #>), name: NSNotification.Name(rawValue: "facebookNative"), object: nil)
}

deinit
{
    NotificationCenter.default.removeObserver(self)
}

```

###Logout
Log out the user.

```
{class='objectiveC'}
[LoginRadiusSDK logout];

```

```
{class='swift'}
LoginRadiusSDK.logout()

```

###Access Token and User Profile
After successful login or social login loginradius access token and user profile can be accessed like this.

```
{class='objectiveC'}
NSUserDefaults *lrUser = [NSUserDefaults standardUserDefaults];
NSDictionary *profile =  [lrUser objectForKey:@"lrUserProfile"];
NSString *access_token =  [lrUser objectForKey:@"lrAccessToken"];
```

```
{class='swift'}
let defaults = UserDefaults.standard
let profile:NSDictionary? = defaults.object(forKey: "lrUserProfile") as? NSDictionary
let access_token:String? = defaults.object(forKey: "lrAccessToken") as? String
```

###Calling API's
You can access the LoginRadius User API's, Social API's using our REST client or your own networking library.

Example using the REST client distributed as part of the library.

To get user's company details with the [API](/api/v1/social-login/company)

```
{class='objectiveC'}
NSUserDefaults *lrUser = [NSUserDefaults standardUserDefaults];
NSString * access_token =  [lrUser objectForKey:@"lrAccessToken"];

[[LoginRadiusREST sharedInstance] sendGET:@"api/v2/company"
                              queryParams:@{
                                            @"access_token": access_token
                                           }
                        completionHandler:^(NSDictionary *data, NSError *error) {
                                NSLog(@"error %@  data %@", error, data);
                        }];
```

```
{class='swift'}
let defaults = UserDefaults.standard
if let access_token = defaults.object(forKey: "lrAccessToken") as? String
{
    LoginRadiusREST.sharedInstance().sendGET("api/v2/company", queryParams: ["access_token":access_token], completionHandler: {(data, error) in
        print(data);
        print(error);
    })
}
```

[Status POST](/api/v1/social-login/post-status-posting) Example:

```
{class='objectiveC'}
NSUserDefaults *lrUser = [NSUserDefaults standardUserDefaults];
NSString * access_token =  [lrUser objectForKey:@"lrAccessToken"];

[[LoginRadiusREST sharedInstance] sendPOST:@"api/v2/status"
                               queryParams:@{
                                          @"access_token": access_token,
                                          @"status": @"Hello world"
                                        }
                                      body:nil
                         completionHandler:^(NSDictionary *data, NSError *error) {
                            NSLog(@"error %@  data %@", error, data);
                         }];
```

```
{class='swift'}
let defaults = UserDefaults.standard
if let access_token = defaults.object(forKey: "lrAccessToken") as? String
{
    LoginRadiusREST.sharedInstance().sendPOST("api/v2/status", queryParams: ["access_token":access_token,"status":"Hello world"], body:nil, completionHandler: {(data, error) in
        print(data);
        print(error);
    })
}
```

#### Direct Social Login

If you want to call Social Login directly without using the webview. Call this function in the view controller you have setup for the button views.

To integrate Traditional Social Login. Follow the steps

- Call `loginWithProvider:inController:completionHandler:` method with the appropriate params in your Application to start Traditional Social Login.

      Provider name is uncapitalized. e.g `facebook`, `twitter`, `linkedin`, `google` e.t.c
      For complete list of social login providers: Ref to this [support doc](/getting-started/general-questions/supported-social-networks)

      Example:

      ```

  {class='objectiveC'}

  // Social Login using SFSafariViewController or UIWebview
  // Facebook Provider

      [[LoginRadiusManager sharedInstance] loginWithProvider:@"facebook" inController:self completionHandler:^(BOOL success, NSError *error) {
          if (success) {
              NSLog(@"Successfully logged in with facebook");
      		 // Perform any operations on signed in user here.
          } else {
              NSLog(@"Error: %@", [error description]);
          }
      }];

      ```
      ```

  {class='swift'}
  LoginRadiusManager.sharedInstance().login(withProvider: "facebook", in: self, completionHandler: { (data, error) in

  if let err = error {
  print(err.localizedDescription)
  } else {
  print("successfully logged in");
  }
  })

      ```

###Demo
Link to [Demo app](https://github.com/LoginRadius/ios-sdk/tree/master/Example)

The demo app contains implementations of social login and user registration service.

Steps to setup Demo apps.

- Clone the SDK repo. [Link](https://github.com/LoginRadius/ios-sdk)
- Run `pod install`
- Create a plist file named LoginRadius.plist and add it the demo project.
- Add your Sitename and API key in LoginRadius.plist
- For Native social login to work follow the Social Login guide above.

###Migration

#### From any v3.4 to v3.5

1. Update your Podfile
   `pod 'LoginRadiusSDK', '~> 3.5.0'`

2. Google and Twitter native Login have a different function names from
   `LoginRadiusManager.sharedInstance().nativeGoogleLogin( ...` to `LoginRadiusManager.sharedInstance().convertGoogleToken(toLRToken: ...`
   `LoginRadiusManager.sharedInstance().nativeTwitterLogin( ...` to `LoginRadiusManager.sharedInstance().convertTwitterToken(toLRToken: ...`

#### From any v3.3 to v3.4

1. Update your Podfile

   `platform :ios, '9.0'`

   `pod 'LoginRadiusSDK', '~> 3.4'`

2. We merged LoginRadiusSocialLoginManager and LoginRadiusRegistrationManager class into LoginRadiusManager.

   Replace

   `[LoginRadiusRegistrationManager sharedInstance]`

   `[LoginRadiusSocialLoginManager sharedInstance]`

   with

   `[LoginRadiusManager sharedInstance]`

3. Move the completionHandler any usage of 'registrationWithAction' and add event listeners. You need to convert all action into these format.

From:

```
- (IBAction)login:(id)sender {

    [[LoginRadiusRegistrationManager sharedInstance] registrationWithAction:@"login" inController:self
    completionHandler:^(BOOL success, NSError *error) {
        if (success) {
            NSLog(@"successfully logged in");
        } else {
            NSLog(@"Error: %@", [error description]);
        }
    }];
}
```

To:

```
- (IBAction)login:(id)sender {
    [[LoginRadiusManager sharedInstance] registrationWithAction:@"login" inController:self];
}
```

Now move your completionHandler code into a new function. Example:

```
- (void) receiveLogin:(NSNotification *) notification
{
    if([[notification userInfo][@"error"] isKindOfClass:[NSError class]])
    {
        NSError *error = (NSError *)[notification userInfo][@"error"];
        NSLog("Error: %@",[error localizedDescription]);

        //Your error handling

    }else
    {
        //Your code after login is succesfully authenticated
        // e.g:  [self showProfileController];
    }
}

```

Then Add NSNoticationCenter's observers on viewDidLoad:

```
- (void)viewDidLoad {
    [super viewDidLoad];

    ...

    [[NSNotificationCenter defaultCenter] addObserver:self
    selector:@selector(receiveLogin:)
    name:LoginRadiusLoginEvent
    object:nil];

}

-(void)dealloc {
    [[NSNotificationCenter defaultCenter] removeObserver:self];
}

```

#### From any v3.0 to v3.3

1.  Update your Podfile

    `pod 'LoginRadiusSDK', '~> 3.3'`

2.  Change how SDK is imported.
    `#import <LRSDK/LRSDK.h>` to `#import <LoginRadiusSDK/LoginRadius.h>`

3.  SDK initilization is changed.

        	Replace `[LoginRadiusSDK instanceWithAPIKey:<your api key>
                               siteName:<your site name>
                               application:application
                               launchOptions:launchOptions];`

        	with

        	```
        	LoginRadiusSDK * sdk =  [LoginRadiusSDK instance];

    [sdk applicationLaunchedWithOptions:launchOptions];

    ```

    ```

4.  Registraton Service method call has been changed.

    Replace

    ```
    [LoginRadiusSDK registrationServiceWithAction:@"login" inController:self
    completionHandler:^(BOOL success, NSError *error) {
        if (success) {
            NSLog(@"successfully logged in");
        } else {
            NSLog(@"Error: %@", [error description]);
        }
    }];
    ```

    with

    ```
    [[LoginRadiusRegistrationManager sharedInstance] registrationWithAction:@"login" inController:self
    completionHandler:^(BOOL success, NSError *error) {
        if (success) {
            NSLog(@"successfully logged in");
        } else {
            NSLog(@"Error: %@", [error description]);
        }
    }];
    ```

5.  Traditional Social Login is accessible through LoginRadiusSocialLoginManager class.

        	Replace

        	```
        	[LoginRadiusSDK socialLoginWithProvider:@"facebook" parameters:nil inController:self completionHandler:^(BOOL success, NSError *error) {
        	    if (success) {
        	        NSLog(@"successfully logged in with facebook");
        	    } else {
        	        NSLog(@"Error: %@", [error description]);
        	    }
        	}];
        	```

        	with

        	```

    [[LoginRadiusSocialLoginManager sharedInstance] loginWithProvider:@"facebook" inController:self completionHandler:^(BOOL success, NSError \*error) {
    if (success) {
    NSLog(@"Successfully logged in with facebook");
    // Perform any operations on signed in user here.
    } else {
    NSLog(@"Error: %@", [error description]);
    }
    }];

    ```

    ```

6.  Native Social Login is done directly through LoginRadiusSocialLoginManager class.
    Remove `[LoginRadiusSDK sharedInstance].useNativeSocialLogin = YES;`. Look at Native Social Login guide above
    for all available methods.

7.  If you are using `LoginRadiusREST`, `callAPIEndpoint:method:params:completionHandler` is removed. Please look at `LoginRadiusREST.h` for all available methods.
