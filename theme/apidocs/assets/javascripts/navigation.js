jQuery(document).ready(function ($) {
  // track changes in window widths and break points (bp)
  var windowWidth;
  const bp1 = 1300; // in px
  const bp2 = 1020; // in px
  var bp1Active = true;
  var bp2Active = false;

  // track status of search
  var searchOpened = false;

  // adjustment for the items inside "more" drop down on the mobile
  var mobileMenuAdjustment = 0;

  // NAV
  const mainNavHeight = 64; // in px

  const mainNavMobileItemHeight = 40; // in px
  var mobileMenuOpened = false;
  var mobileMenuSideOpened = false;

  // track and initial variable needed to control split of panels
  var splitActive = false;
  var splitInstance = null;

  // run to figure out start up window width
  breakPoints();

  function getWindowValues() {
    windowWidth = $(window).width();
  }

  // hide mobile_side_menu on pages that do not have side menu
  if (!$(".split-panels").length) {
    document
      .getElementsByClassName("mobile_side_menu")[0]
      .style.setProperty("display", "none", "important");
  }

  // fix weird overscroll behaviour on changelog page in mobile view
  // in mobile the changelog page will scroll beyond the footer for some reason. This fixes that,
  // but causes problems with full screen code viewers on other pages.
  if ($(".changelog-page").length) {
    document
      .getElementsByClassName("md-main__inner")[0]
      .style.setProperty("position", "fixed", "important");
  }

  // functions for controlling the split screen

  function createSplit() {
    splitInstance = Split(["#panel1", "#panel2"], {
      sizes: [15, 85],
      minSize: [250, 360],
      gutterSize: 24,
      expandToMin: true,
    });

    splitActive = true;
  }

  function killSplit() {
    splitInstance.destroy();

    splitActive = false;
  }

  // ************************************ SEARCH **************************************

  // $("#mobile_search").click(function () {
  //   if (!searchOpened) {
  //     //searchOpen();
  //   }
  // });

  $("#algoliasearch").focusout(function () {
    //searchClose();
  });

  function searchOpen() {
    if (mobileMenuSideOpened && bp2Active) mobileMenuSideClose();
    if (mobileMenuOpened && bp2Active) mobileMenuClose();

    document
      .getElementsByClassName("algolia-autocomplete")[0]
      .style.setProperty("display", "block", "important");

    $("#algoliasearch").focus();

    searchOpened = true;
  }

  function searchClose() {
    if (bp1Active || bp2Active) {
      document
        .getElementsByClassName("algolia-autocomplete")[0]
        .style.setProperty("display", "none", "important");
    }

    searchOpened = false;
  }

  function searchReset() {
    document
      .getElementsByClassName("algolia-autocomplete")[0]
      .style.setProperty("display", "flex", "important");

    searchOpened = false;
  }

  // ************************************** MENUS ******************************************

  // **************** MOBILE MENU ***************
  mobileMenuSetUp();

  function mobileMenuSetUp() {
    $(".md-header-nav__title").each(function (i) {
      // if this is the one that has MORE items inside then adjust the space below it
      var thisOne = false;

      if ($(this).has(".dropdown-container")) {
        $(this)
          .find(".dropdown-content")
          .each(function (i) {
            mobileMenuAdjustment = i;

            thisOne = true;
          });
      }

      var top;

      if (thisOne) {
        top = i * mainNavMobileItemHeight + mainNavHeight;
      } else {
        top =
          (i + mobileMenuAdjustment) * mainNavMobileItemHeight + mainNavHeight;
      }

      // set their positions with top values
      $(this).css("top", top);
    });
  }

  function mobileMenuClose() {
    $(".md-header-nav__title").css("display", "none");
    $(".close-overlay").css("display", "none");
    mobileMenuOpened = false;
  }

  function mobileMenuOpen() {
    if (mobileMenuSideOpened) mobileMenuSideClose();

    $(".md-header-nav__title").css("display", "flex");
    $(".close-overlay").css("display", "block");
    mobileMenuOpened = true;
  }

  // make mobile nav open and close
  $("#mobile_menu").click(function () {
    if (!mobileMenuOpened) {
      mobileMenuOpen();
    } else {
      mobileMenuClose();
    }
  });

  // **************** SIDE MENU ***************
  function mobileMenuSideClose() {
    $(".md-sidebar--primary").css("display", "none");
    $(".close-overlay").css("display", "none");

    mobileMenuSideOpened = false;
  }

  function mobileMenuSideOpen() {
    if (mobileMenuOpened) mobileMenuClose();

    $(".md-sidebar--primary").css("display", "block");
    $(".close-overlay").css("display", "block");
    mobileMenuSideOpened = true;
  }

  function mobileMenuSideReset() {
    $(".md-sidebar--primary").removeAttr("style");
    $(".close-overlay").css("display", "none");
    mobileMenuSideOpened = false;
  }

  // make mobile side nav open and close
  $("#mobile_side_menu").click(function () {
    if (!mobileMenuSideOpened) {
      mobileMenuSideOpen();
    } else {
      mobileMenuSideClose();
    }
  });

  // ************ OVERLAY *********************

  $(".close-overlay").click(function () {
    if (mobileMenuSideOpened) mobileMenuSideClose();

    if (mobileMenuOpened) mobileMenuClose();
  });

  // ******************* ON RESIZE FOLLOW BREAKPOINTS (BPs) *******************
  $(window).resize(function () {
    breakPoints();
  });

  function breakPoints() {
    getWindowValues();

    // control search based on first breakpoint
    if (windowWidth >= bp1 + 1) {
      bp1Active = false;
      //searchReset();
    } else if (searchOpened) {
      bp1Active = true;
    } else {
      bp1Active = true;
      //searchClose();
    }

    // control mobile menu based on second breakpoint
    if (windowWidth <= bp2) {
      bp1Active = false;
      bp2Active = true;

      mobileMenuClose();
      mobileMenuSideClose();

      // kill split in mobile
      if (splitActive) killSplit();
    } else {
      bp2Active = false;

      mobileMenuOpen();
      mobileMenuSideReset();

      // recreate split when sizing up from mobile
      if (!splitActive && $("#panel1").length) createSplit();
    }

    // reset position of split on resize
    if (splitActive) splitInstance.collapse(0);
  }
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
