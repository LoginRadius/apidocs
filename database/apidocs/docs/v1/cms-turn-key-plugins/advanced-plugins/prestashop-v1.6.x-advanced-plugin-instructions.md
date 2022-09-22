# Prestashop v1.6.x Advanced Plugin Instructions

---

###Menu

- Installation
- Activation and Configuration
- Troubleshooting
- Advanced Customization

###Installation Guide

1. Download Advanced Customer Registration and Management module for PrestaShop v1.6.x by LoginRadius.
2. Login to your PrestaShop’s site admin panel.
3. Now click on Modules tab. enter image description here
   ![enter image description here](https://apidocs.lrcontent.com/images/ps1_1572858d11915c55df7.42814114.png)
4. Click on Add a new module, then browse loginradiusadvancedmodule zip file and click on Upload this module. enter image description here
   ![enter image description here](https://apidocs.lrcontent.com/images/ps2_421958d1192ec0fb89.37235379.png)
5. After successful installation of Advanced Customer Registration and Management, click on Install button.

###Activation and Configuration
####Account Configuration

> Note: The full functionality of this module requires a LoginRadius Site name, LoginRadius API Key and a LoginRadius API Secret. If you do not have this data only the functionality of the Social Sharing component can be utilized. Please find further documentation on how you can obtain this data here

####Activation Steps

1. Navigate to Modules tab. After that go to Advanced Customer Registration and Management and click on Configure.
2. Insert LoginRadius API Key, and API Secret as provided on your loginradius.com Admin-console.
3. Click Save Configuration

###Troubleshooting

CURL and FSOCKOPEN troubleshooting

If you are not logged in after clicking Social Login icons at your website then enable one of the following at your website server (you may need to contact your hosting provider to enable one of these):

- CURL requires cURL support = enabled in your php.ini file.
- FSOCKOPEN requires allow_url_fopen = On and safemode = off in your php.ini file.

###Advanced Customization

#####How to translate language

1. Go to your admin panel.
2. Navigate to modules > Advanced Customer Registration and Management admin configuration settings.
3. Click on the language flags next to Manage Translations at the top.
4. Here you can change text which you want to translate.

#####How to uninstall the extension?

1. Login to your website admin panel.
2. Navigate to modules section under modules tab.
3. Click Uninstall , then Delete below the module that you want to uninstall. Note: For removing the module manually, navigate to "/modules/" folder in your prestashop installation folder and delete "loginradiusadvancemodule" folder.
