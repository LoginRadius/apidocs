


<?php
if (!defined('ROOT_PATH')) {
    header("Location: /");
}
global $hooks;

$hooks->add_action('docs_head_script', 'inkeepSearch', 10, 0);

$hooks->add_action('docs_searching', 'inkeepSearchHTML');


function inkeepSearch() {
    ?>
    <script id="inkeep-script" src="https://unpkg.com/@inkeep/uikit-js@0.3.19/dist/embed.js" type="module" defer></script>
    <script >
const inkeepScript = document.getElementById("inkeep-script");
 
 // configure and initialize the widget
 const addInkeepWidget = (componentType, targetElementId) => {
   const inkeepWidget = Inkeep().embed({
     componentType,
     ...(componentType !== "ChatButton"
       ? { targetElement: targetElementId }
       : {}),
     properties: {
       baseSettings: {
        apiKey: "<?php echo INKEEP_API_KEY; ?>", // required
        integrationId: "<?php echo INKEEP_INTEGRATION_ID; ?>", // required
        organizationId: "<?php echo INKEEP_ORGANIZATION_ID; ?>", // required
         primaryBrandColor: "#FFFFFF", // your brand color, widget color scheme is derived from this
         organizationDisplayName: "LoginRadius",
       },
       colorMode: {
        enableSystem: true,
    },
      
  
       aiChatSettings: {
        chatSubjectName: "LoginRadius",
        botAvatarSrcUrl: "https://www.loginradius.com/blog/static/59a8962050016aa118585d686adbcd57/e5715/logo-1024x991.png",
        botAvatarDarkSrcUrl: "https://www.loginradius.com/docs/img/logoonly-dark.svg",
        getHelpCallToActions: [
            {
                name: "Contact",
                url: "https://www.loginradius.com/contact-sales/",
                
                icon: {
                    builtIn: "IoChatbubblesOutline"
                }
            }
        ],
        quickQuestions: [
            "How does the LoginRadius User Registration System work?",
            "Invalid Request URI Error?",
            "Consumer Audit Logs?"
        ]
    }
     },
   });
 };
 
 inkeepScript.addEventListener("load", () => {
   const widgetContainer = document.getElementById("inkeepSearchBar");
   
   addInkeepWidget("ChatButton");
   widgetContainer && addInkeepWidget("SearchBar", "#inkeepSearchBar");
 });
   
    </script>

    <?php
}

function inkeepSearchHTML($searchType) {
    ?>
   <div id="inkeepSearchBar"></div>&nbsp;


    <?php
}


