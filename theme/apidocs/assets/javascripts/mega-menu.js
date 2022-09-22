var slideOutOpened = false;
var slideOutThatIsOpened = "";

jQuery(document).ready(function ($) {

  // the megamenu slideouts (sub items)
  var slideOuts = $(".slideouts");
  //    var slideOutOpened = false;
  //    var slideOutThatIsOpened = "";

  var clickedElement;

  // tabs inside identity platform (ip=identity platform)
  var clickedIpElement;
  var ipElementThatIsOpened = "authentication";

  // set speed of animation in milliseconds (should be same as css @keyframe animations)
  var animationSpeed = 300;

  // the dark overlay when menu is opened
  var overlay = $(".mega-menu-overlay");

  //tracking slideouts states
  var moving = false;

  // track search states
  var searchOpened = false;
  var searchAnimating = false;

  // track mobile menu states
  var mobileNavOpened = false;
  var mobileNavAnimating = false;

  // track the mobile vs desktop nav states
  var mobileNav = false;

  if ($(".hamburger").css("display") == "block") {
    mobileNav = true;
  } else {
    mobileNav = false;
  }

  var navHeight = $("nav").outerHeight();

  // position the mobile menu slideouts correctly
  var topOffset = 0;

  // set height of the menu background so that it has the correct height
  animateHeightOfMenuBackground(0, 0);

  // adjust the height of slideouts background on desktop on window resize
  $(window).resize(function (mouseEvent) {
    if (!mobileNav && slideOutThatIsOpened != "")
      slideOuts.css("height", $("#" + slideOutThatIsOpened).outerHeight());
    setSlideOutsHeight();

    checkIfOnMobileOrNot();
  });

  function setSlideOutsHeight() {
    if (!mobileNav && slideOutThatIsOpened != "")
      slideOuts.css("height", $("#" + slideOutThatIsOpened).outerHeight());
  }

  // track the changing of mobile to desktop and desktop to mobile
  function checkIfOnMobileOrNot() {
    if ($(".hamburger").css("display") == "block") {
      if (!mobileNav) {
        mobileNav = true;
        reset();
      }
    } else {
      if (mobileNav) {
        mobileNav = false;
        reset();
      }
    }
  }

  // Main Level 1 Navigation items
  $(".lvl1 > *")
    .not(".not-a-dropdown")
    .click(function () {
      if (!moving) {
        // get clicked element and it's text and figure out what is triggered to open
        clickedElement = $(this);

        var clickedElementText = $(clickedElement).attr('value');
        // clickedElementText = clickedElementText
        //   .replace(/[^\w\s]/g, "")
        //   .toLowerCase()
        //   .replace(/ /g, "-");

        var slideOutTriggered = $("#" + clickedElementText);

        slideOuts.children().each(function () {
          $(this).css("opacity", 1);
        });

        // OPEN IF NOTHING IS OPENED
        if (!slideOutOpened) {
          topOffset = 0;

          if (mobileNav) openMobileDropDown(slideOutTriggered, animationSpeed);

          slideOutTriggered.removeClass(
            "slideDown slideDownInst slideUp slideUpInst"
          );

          waitForAnimationFinish();
          // desktop animation
          if (!mobileNav) slideOutTriggered.addClass("slideDown");

          // mobile animation
          if (mobileNav) {
            slideOutTriggered.animate(
              { top: topOffset + slideOutTriggered.outerHeight() },
              animationSpeed
            );
          }

          // mega menu indicator
          clickedElement.removeClass("menuIndicatorDown");
          clickedElement.addClass("menuIndicatorUp");


          if(clickedElementText !== "quick-start" && clickedElementText !== "changelog" && clickedElementText !== "homepage")
          {
          showOverlay();
          }

          slideOuts.css("opacity", 1);
          slideOuts.animate(
            { height: slideOutTriggered.outerHeight() },
            animationSpeed
          );

          slideOutOpened = true;
          slideOutThatIsOpened = clickedElementText;

          setTimeout(function () {
            slideOuts.children().each(function () {
              if ($(this).is("#" + slideOutThatIsOpened)) {
                $(this).css("opacity", 1);
              } else {
                $(this).css("opacity", 0);
              }
            });
          }, animationSpeed);

          // IF SLIDEOUT THAT IS OPENED IS WANTING TO CLOSE
        } else if (
          slideOutOpened &&
          slideOutThatIsOpened == clickedElementText
        ) {
          // close drop down if in mobile and hide overlay in desktop
          if (mobileNav) {
            closeMobileDropDown(clickedElement);
          } else {
            hideOverlay();
          }

          hideOpenedSlideOut();

          setTimeout(function () {
            slideOuts.css("opacity", 0);
          }, animationSpeed);

          // SLIDE OUT SWITCH TO A DIFFERENT ONE
        } else if (slideOutOpened) {
          var slideOutOpenedElement = $("#" + slideOutThatIsOpened);

          if (mobileNav) {
            closeMobileDropDown(slideOutOpenedElement); // pass in the element that is currently highlighted
            hideOpenedSlideOut();
          }

          topOffset = 0;

          // if on mobile wait for animation of closing the other drop down to finish and then open the drop down that is triggered
          if (mobileNav)
            setTimeout(function () {
              openMobileDropDown(slideOutTriggered, animationSpeed);
            }, animationSpeed);

          // reset the animation classes
          slideOutTriggered.removeClass(
            "slideDown slideDownInst slideUp slideUpInst"
          );

          waitForAnimationFinish();

          // if on mobile wait for animation of closing the other drop down to finish and then open the drop down that is triggered
          if (mobileNav) {
            setTimeout(function () {
              slideOutTriggered.animate(
                { top: topOffset + slideOutTriggered.outerHeight() },
                animationSpeed
              );
            }, animationSpeed);
          }

          // if on desktop animate the desktop indicator when switching tabs
          // in on mobile animate the one that is clicked
          if (!mobileNav) {
            var elementWithIndicator = $(".menuIndicatorUp");
            elementWithIndicator.removeClass("menuIndicatorUp");
            elementWithIndicator.addClass("menuIndicatorDown");
          }
          //                    else {
          //                         setTimeout(function(){
          //
          //                            clickedElement.removeClass("menuIndicatorDown");
          //                            clickedElement.addClass("menuIndicatorUp");
          //
          //                         }, animationSpeed);
          //                     }

          // show mega menu indicator
          clickedElement.removeClass("menuIndicatorDown");
          clickedElement.addClass("menuIndicatorUp");

          if (!mobileNav) {
            // loop through the children but execute next step only at the end of the last child's animation end
            // fade out the content of current slideOut then adjust the height of the slideOut background then fade in the content of a new slideOut

            var leng = slideOutOpenedElement.children().length;
            slideOutOpenedElement.children().each(function () {
              if ($(this).index() < leng - 1) {
                // fade out all the children
                $(this).animate({ opacity: "0.0" }, animationSpeed / 5.0);
              } else {
                // as the last child is done fading out, animate the rest of the effect: ie. hide this slideOut and bring the other one in
                $(this).animate(
                  { opacity: "0.0" },
                  animationSpeed / 5.0,
                  function () {
                    slideOutOpenedElement.addClass("slideUpInst");
                    // make sure the contents are shown afterwards
                    slideOutOpenedElement.children().css("opacity", "1.0");

                    slideOuts.animate(
                      { height: slideOutTriggered.outerHeight() },
                      (animationSpeed / 5) * 3.0,
                      function () {
                        // make sure the contents are hidden
                        slideOutTriggered.children().css("opacity", "0.0");
                        // reset the classes
                        slideOutTriggered.removeClass(
                          "slideDown slideDownInst slideUp slideUpInst"
                        );
                        // slideDown instantly
                        slideOutTriggered.addClass("slideDownInst");
                        // fade the content of the new slideOut in
                        slideOutTriggered
                          .children()
                          .animate({ opacity: "1.0" }, animationSpeed / 5.0);
                      }
                    );
                  }
                );
              }
            });
          }

          // set the slideout variables accordingly
          slideOutOpened = true;
          slideOutThatIsOpened = clickedElementText;

          setTimeout(function () {
            slideOuts.children().each(function () {
              if ($(this).is("#" + slideOutThatIsOpened)) {
                $(this).css("opacity", 1);
              } else {
                $(this).css("opacity", 0);
              }
            });
          }, animationSpeed);
        }
      }
    });

  function hideOpenedSlideOut() {
    var slideOutThatIsOpenedElement = $("#" + slideOutThatIsOpened);
    slideOutThatIsOpenedElement.removeClass(
      "slideDown slideDownInst slideUp slideUpInst"
    );

    waitForAnimationFinish();

    if (mobileNav) {
      slideOutThatIsOpenedElement.animate(
        { top: topOffset },
        animationSpeed,
        function () {
          slideOutThatIsOpenedElement.css("top", "");
        }
      );
    } else {
      slideOutThatIsOpenedElement.addClass("slideUp");
    }

    // reset the background back to zero when slideouts are hidden
    slideOuts.animate({ height: "0.0" }, animationSpeed);

    // indicator on the menu menu level 1
    var elementWithIndicator = $(".menuIndicatorUp");
    elementWithIndicator.removeClass("menuIndicatorUp");
    elementWithIndicator.addClass("menuIndicatorDown");

    // set the slideout variables accordingly
    slideOutOpened = false;
    slideOutThatIsOpened = "";
  }

  // OVERLAY
  function showOverlay() {
    overlay.css("display", "block");
    overlay.animate({ opacity: 1.0 }, animationSpeed);
  }

  function hideOverlay() {
    overlay.animate({ opacity: 0.0 }, animationSpeed, function () {
      overlay.css("display", "none");
    });
  }

  // hide overlay on click
  overlay.click(function () {
    hideOverlay();
    if (slideOutOpened && !mobileNav) hideOpenedSlideOut();
    if (mobileNavOpened) closeMobileMenu();
  });

  function waitForAnimationFinish() {
    moving = true;
    setTimeout(function () {
      moving = false;
    }, animationSpeed * 1.2);
  }

  // Identity Platform Tabs
  $(".ip-tabs > *").click(function (e) {
    if (!mobileNav) {
      // do not follow the link on click on desktop
      e.preventDefault();
      clickedIpElement = $(this);
      var clickedIpElementText = clickedIpElement.text();

      // get rid of anything but letters and replace spaces with '-' and trim the ends
      clickedIpElementText = clickedIpElementText
        .replace(/[^\w\s]/g, "")
        .toLowerCase()
        .replace(/ /g, "-");
      clickedIpElementText = clickedIpElementText.replace("&", "");
      clickedIpElementText = clickedIpElementText.replace(/  +/g, "-");
      clickedIpElementText = clickedIpElementText.replace(/--+/g, "-");

      var triggeredIpElement = $("#ip-" + clickedIpElementText);

      // if the tab that is opened clicked - do nothing,
      // othervise animate opacity of opened tab and show the triggered tab
      if (clickedIpElement.hasClass("mega-menu-tabs-opened")) {
      } else {
        var openedMenu = $(".mega-menu-tabs-opened");
        openedMenu.removeClass("mega-menu-tabs-opened");

        clickedIpElement.addClass("mega-menu-tabs-opened");

        $("#ip-" + ipElementThatIsOpened).animate(
          { opacity: 0.0 },
          animationSpeed / 2,
          function () {
            $("#ip-" + ipElementThatIsOpened).css("display", "none");
            $("#ip-" + ipElementThatIsOpened).css("opacity", "1");
            triggeredIpElement.css("display", "block");
            triggeredIpElement.css("opacity", "0.0");

            var slideOutTriggered = $("#" + slideOutThatIsOpened);
            slideOuts.animate(
              { height: slideOutTriggered.outerHeight() },
              animationSpeed / 2
            );

            triggeredIpElement.animate({ opacity: 1.0 }, animationSpeed / 2);

            ipElementThatIsOpened = clickedIpElementText;
          }
        );
      }
    }
  });

  // close the drop down in the mobile
  function closeMobileDropDown(clickedElement) {
    // get the amount of childreninside level 1
    // loop through them and animate the change of background as well as the arrows

    var leng = $(".lvl1").children().length;
    var encounteredOpenedOne = false;

    $(".lvl1")
      .children()
      .each(function () {
        $(this).animate({ top: 0 }, animationSpeed);

        animateHeightOfMenuBackground(0, 1);

        // change the background to white of all drop downs since none are opened
        $(this)
          .find(".selected-background")
          .animate({ opacity: "0.00" }, animationSpeed);

        // morph the arrows
        var save1 = $(this).find(".drop-down-arrow").children().first();
        save1.removeClass("mobileMenuArrow1 mobileMenuArrow1Reset");
        save1.addClass("mobileMenuArrow1Reset");

        var save2 = $(this).find(".drop-down-arrow").children().last();
        save2.removeClass("mobileMenuArrow2 mobileMenuArrow2Reset");
        save2.addClass("mobileMenuArrow2Reset");
      });

    // move bottom portion down
    $(".right-side").animate({ top: 0 }, animationSpeed);
  }

  function openMobileDropDown(slideOutTriggered, animationSpeed) {
    // get the height coordinates where to open the slide out
    topOffset =
      clickedElement.offset().top +
      clickedElement.outerHeight() -
      navHeight -
      $("nav").offset().top;

    // move the slideout to that height so that it can animate smoothly into place
    slideOutTriggered.css("top", topOffset);

    // loop through children and fine which one was clicked hide other show the one that was clicked
    // morph the up down arrows accordinly
    var leng = $(".lvl1").children().length;
    var encounteredOpenedOne = false;

    $(".lvl1")
      .children()
      .each(function () {
        if ($(this).is(clickedElement)) {
          encounteredOpenedOne = true;
          $(this)
            .find(".selected-background")
            .animate({ opacity: "1.00" }, animationSpeed);

          // morph arrows
          var arrowPiece1 = $(this).find(".drop-down-arrow").children().first();
          arrowPiece1.removeClass("mobileMenuArrow1 mobileMenuArrow1Reset");
          arrowPiece1.addClass("mobileMenuArrow1");

          var arrowPiece2 = $(this).find(".drop-down-arrow").children().last();
          arrowPiece2.removeClass("mobileMenuArrow2 mobileMenuArrow2Reset");
          arrowPiece2.addClass("mobileMenuArrow2");
        } else {
          $(this)
            .find(".selected-background")
            .animate({ opacity: "0.00" }, animationSpeed);

          // morph arrows
          var arrowPiece1 = $(this).find(".drop-down-arrow").children().first();
          arrowPiece1.removeClass("mobileMenuArrow1 mobileMenuArrow1Reset");
          arrowPiece1.addClass("mobileMenuArrow1Reset");

          var arrowPiece2 = $(this).find(".drop-down-arrow").children().last();
          arrowPiece2.removeClass("mobileMenuArrow2 mobileMenuArrow2Reset");
          arrowPiece2.addClass("mobileMenuArrow2Reset");

          // when the opened one is found move all to that level
          if (encounteredOpenedOne) {
            $(this).animate(
              { top: slideOutTriggered.outerHeight() },
              animationSpeed
            );
          }
        }
      });

    animateHeightOfMenuBackground(slideOutTriggered.outerHeight(), 1);
    console.log("once");

    // move bottom portion down
    //        $(".right-side").animate({top: slideOutTriggered.outerHeight()}, animationSpeed,$.bez([0.42, 0, 0.58, 1.0]));
    $(".right-side").animate(
      { top: slideOutTriggered.outerHeight() },
      animationSpeed
    );
  }

  // MOBILE MENU TOGGLING

  $(".hamburger").click(function () {
    if (!mobileNavOpened && !mobileNavAnimating) {
      openMobileMenu();
      showOverlay();
    }

    if (mobileNavOpened && !mobileNavAnimating) {
      closeMobileMenu();
      hideOverlay();
    }
  });

  function mobileMenuTimeOut() {
    mobileNavAnimating = true;
    setTimeout(function () {
      mobileNavAnimating = false;
    }, animationSpeed * 1.2);
  }

  function openMobileMenu() {
    mobileMenuTimeOut();

    $(".lvl1").removeClass("mobileNavOpen mobileNavClose");
    $(".lvl1").addClass("mobileNavOpen");

    $(".right-side").removeClass("mobileNavOpen mobileNavClose");
    $(".right-side").addClass("mobileNavOpen");

    $(".slideouts").removeClass("mobileNavOpen mobileNavClose");
    $(".slideouts").addClass("mobileNavOpen");

    $(".mobile-background").removeClass("mobileNavOpen mobileNavClose");
    $(".mobile-background").addClass("mobileNavOpen");

    $(".hamburger > span:nth-child(1)").removeClass(
      "hamburgerIconTransformToArrow1 hamburgerIconTransformToArrow1Reset"
    );
    $(".hamburger > span:nth-child(1)").addClass(
      "hamburgerIconTransformToArrow1"
    );

    $(".hamburger > span:nth-child(2)").removeClass(
      "hamburgerIconTransformToArrow2 hamburgerIconTransformToArrow2Reset"
    );
    $(".hamburger > span:nth-child(2)").addClass(
      "hamburgerIconTransformToArrow2"
    );

    $(".hamburger > span:nth-child(3)").removeClass(
      "hamburgerIconTransformToArrow3 hamburgerIconTransformToArrow3Reset"
    );
    $(".hamburger > span:nth-child(3)").addClass(
      "hamburgerIconTransformToArrow3"
    );

    mobileNavOpened = true;
  }

  function closeMobileMenu() {
    mobileMenuTimeOut();

    $(".lvl1").removeClass("mobileNavOpen mobileNavClose");
    $(".lvl1").addClass("mobileNavClose");

    $(".right-side").removeClass("mobileNavOpen mobileNavClose");
    $(".right-side").addClass("mobileNavClose");

    $(".slideouts").removeClass("mobileNavOpen mobileNavClose");
    $(".slideouts").addClass("mobileNavClose");

    $(".mobile-background").removeClass("mobileNavOpen mobileNavClose");
    $(".mobile-background").addClass("mobileNavClose");

    menuArrowToHam();

    mobileNavOpened = false;
  }

  function menuArrowToHam() {
    $(".hamburger > span:nth-child(1)").removeClass(
      "hamburgerIconTransformToArrow1 hamburgerIconTransformToArrow1Reset"
    );
    $(".hamburger > span:nth-child(1)").addClass(
      "hamburgerIconTransformToArrow1Reset"
    );

    $(".hamburger > span:nth-child(2)").removeClass(
      "hamburgerIconTransformToArrow2 hamburgerIconTransformToArrow2Reset"
    );
    $(".hamburger > span:nth-child(2)").addClass(
      "hamburgerIconTransformToArrow2Reset"
    );

    $(".hamburger > span:nth-child(3)").removeClass(
      "hamburgerIconTransformToArrow3 hamburgerIconTransformToArrow3Reset"
    );
    $(".hamburger > span:nth-child(3)").addClass(
      "hamburgerIconTransformToArrow3Reset"
    );
  }

  function menuArrowToHamReset() {
    $(".hamburger > span:nth-child(1)").removeClass(
      "hamburgerIconTransformToArrow1 hamburgerIconTransformToArrow1Reset"
    );

    $(".hamburger > span:nth-child(2)").removeClass(
      "hamburgerIconTransformToArrow2 hamburgerIconTransformToArrow2Reset"
    );

    $(".hamburger > span:nth-child(3)").removeClass(
      "hamburgerIconTransformToArrow3 hamburgerIconTransformToArrow3Reset"
    );
  }

  // SEARCH
  $(".search-form-input").click(function () {
    openSearch();
  });

  $(".mega-menu-search").click(function () {
    openSearch();
  });

  function openSearch() {
    if (!searchOpened && !searchAnimating) {
      searchAnimatingTimeOut();

      $(".search-form").removeClass("searchFieldOpen searchFieldClose");
      $(".search-form").addClass("searchFieldOpen");

      $(".search-form-input").removeClass("searchIconOpen searchIconClose");
      $(".search-form-input").addClass("searchIconOpen");

      // after animation is done set the focus
      setTimeout(function () {
        $(".search-form-input").focus();
      }, animationSpeed * 1.2);

      searchOpened = true;
    }
  }

  $(".search-form-input").focusout(function () {
    if (searchOpened && !searchAnimating) {
      searchAnimatingTimeOut();

      $(".search-form").removeClass("searchFieldOpen searchFieldClose");
      $(".search-form").addClass("searchFieldClose");

      $(".search-form-input").removeClass("searchIconOpen searchIconClose");
      $(".search-form-input").addClass("searchIconClose");

      searchOpened = false;
    }
  });

  function searchAnimatingTimeOut() {
    searchAnimating = true;
    setTimeout(function () {
      searchAnimating = false;
    }, animationSpeed * 1.2);
  }

  function reset() {
    $(".search-form-input").removeClass("searchIconOpen searchIconClose");
    $(".search-form").removeClass("searchFieldOpen searchFieldClose");

    $(".slideouts > *").removeClass(
      "slideUpInst slideUp slideDown slideDownInst"
    );
    $(".slideouts > *").addClass("slideUpInst");
    $(".slideouts > *").css("top", "");
    $(".lvl1 > *").css("top", "");
    $(".right-side").css("top", "");
    $(".slideouts").removeAttr("style");

    $(".slideouts").removeClass("mobileNavOpen mobileNavClose");
    $(".mobile-background").removeClass("mobileNavOpen mobileNavClose");

    if (mobileNav) $(".slideouts").addClass("mobileNavClose");

    slideOutOpened = false;
    slideOutThatIsOpened = "";
    moving = false;
    searchOpened = false;
    searchAnimating = false;

    mobileNavOpened = false;
    mobileNavAnimating = false;

    $(".lvl1").removeClass("mobileNavClose mobileNavOpen");
    $(".right-side").removeClass("mobileNavClose mobileNavOpen");
    $(".lvl1 > *").removeClass("menuIndicatorUp");
    $(".lvl1 > *").addClass("menuIndicatorDown");
    hideOverlay();

    var counter = 0;
    $(".lvl1 .drop-down-arrow")
      .children()
      .each(function () {
        if (counter % 2 == 0) {
          var save = $(this);
          save.removeClass("mobileMenuArrow1 mobileMenuArrow1Reset");
          save.addClass("mobileMenuArrow1Reset");
        } else {
          var save = $(this);
          save.removeClass("mobileMenuArrow2 mobileMenuArrow2Reset");
          save.addClass("mobileMenuArrow2Reset");
        }

        counter += 1;
      });

    var ipTabThatShouldBeOpened;
    $(".ip-tabs > *").each(function () {
      if ($(this).hasClass("mega-menu-tabs-opened")) {
        ipTabThatShouldBeOpened = $(this).text();

        ipTabThatShouldBeOpened = ipTabThatShouldBeOpened
          .replace(/[^\w\s]/g, "")
          .toLowerCase()
          .replace(/ /g, "-");
        ipTabThatShouldBeOpened = ipTabThatShouldBeOpened.replace("&", "");
        ipTabThatShouldBeOpened = ipTabThatShouldBeOpened.replace(/  +/g, "-");
        ipTabThatShouldBeOpened = ipTabThatShouldBeOpened.replace(/--+/g, "-");
        ipTabThatShouldBeOpened = $("#ip-" + ipTabThatShouldBeOpened);

        $("#product > div:first-child > *:not(.ip-tabs)").each(function () {
          $(this).css("opacity", 0);
          $(this).css("display", "none");
        });

        ipTabThatShouldBeOpened.css("opacity", 1);
        ipTabThatShouldBeOpened.css("display", "block");
      }
    });

    $(".lvl1 .selected-background").css("opacity", "0.00");

    if (mobileNav) $(".tab-content").removeAttr("style");

    menuArrowToHamReset();
  }

  function animateHeightOfMenuBackground(finalHeight, show) {
    finalHeight =
      finalHeight + $(".right-side").outerHeight() + $(".lvl1").outerHeight();

    //        $(".mobile-background").animate({height: finalHeight}, animationSpeed/2, $.bez([0.42, 0, 0.58, 1.0]));
    $(".mobile-background").animate(
      { height: finalHeight },
      animationSpeed / 2,
      function () {
        if (show) $(this).css("display", "block");
      }
    );
  }

  if ($("body.lp-pom-body.lp-convertable-page").height()) {
    console.log($("body.lp-pom-body.lp-convertable-page").height());
  }

  var mutationObserver = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      if ($(".ub-emb-container").length) {
        var height = $(".ub-emb-bar-frame").height();

        $("nav").css("padding-top", height);
        $(".site-inner").css("padding-top", height);

        mutationObserver.disconnect();

        mutationObserver2.observe(document.documentElement, {
          attributes: true,
          childList: true,
          subtree: true,
        });
      }
    });
  });

  mutationObserver.observe(document.documentElement, {
    attributes: true,
    childList: true,
    subtree: true,
  });

  var mutationObserver2 = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      if (!$(".ub-emb-bar-frame").length) {
        $("nav").css("padding-top", 0);
        $(".site-inner").css("padding-top", 0);
        mutationObserver2.disconnect();
      }
    });
  });

  mutationObserver2.disconnect();
});

// MAKE NAV STICKY

// (function (document, window, index) {
//   var nav = document.querySelector("nav");
//   var slideouts = document.querySelector(".slideouts");

//   var lvl1 = document.querySelector(".lvl1");
//   var rightSide = document.querySelector(".right-side");

//   var navHeight = 0,
//     navTop = 0,
//     documentHeight = 0,
//     windowHeight = 0,
//     scrollCurrent = 0,
//     scrollPrevious = 0,
//     scrollDelta = 0;

//   // check for mobile layout
//   var mobileNav = false;

//   if ($(".hamburger").css("display") == "block") {
//     mobileNav = true;
//   } else {
//     mobileNav = false;
//   }

//   var mobileNavOpen = false;

//   window.addEventListener("scroll", function () {
//     // check for mobile layout
//     if ($(".hamburger").css("display") == "block") {
//       mobileNav = true;
//     } else {
//       mobileNav = false;
//     }

//     // check if mobile nav is opened; if is the attachment point needs to be reset below
//     if ($(".lvl1").hasClass("mobileNavOpen")) {
//       mobileNavOpen = true;
//     } else {
//       mobileNavOpen = false;
//     }

//     // set attachement point accordingly
//     if (mobileNav && mobileNavOpen) {
//       //                navHeight = nav.offsetHeight + slideouts.offsetHeight + lvl1.offsetHeight + rightSide.offsetHeight;
//       navHeight =
//         nav.offsetHeight +
//         document.querySelector(".mobile-background").offsetHeight;
//     } else {
//       navHeight = nav.offsetHeight + slideouts.offsetHeight;
//     }

//     documentHeight = document.body.offsetHeight;
//     windowHeight = window.innerHeight;
//     scrollCurrent = window.pageYOffset;
//     scrollDelta = scrollPrevious - scrollCurrent;
//     navTop =
//       parseInt(window.getComputedStyle(nav).getPropertyValue("top")) +
//       scrollDelta;

//     // scrolled to the very top; nav sticks to the top
//     if (scrollCurrent <= 0) {
//       nav.style.top = "0px";
//     } else if (scrollDelta > 0) {
//       // scrolled up; nav slides in
//       nav.style.top = (navTop > 0 ? 0 : navTop) + "px";
//     } else if (scrollDelta < 0) {
//       // scrolled down
//       nav.style.top =
//         (Math.abs(navTop) > navHeight ? -navHeight : navTop) + "px";
//     }

//     scrollPrevious = scrollCurrent;
//   });
// })(document, window, 0);
