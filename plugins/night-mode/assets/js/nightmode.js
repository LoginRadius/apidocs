const nightModeToggle = document.getElementById("nightModeToggle");
const body = document.body;

// Retrieve the value from localStorage and convert it to a boolean
const isNightMode = localStorage.getItem("Nightmode") === "true";

// Apply the initial night mode state

nightModeToggle.addEventListener("change", () => {
  if (nightModeToggle.checked) {
    body.classList.add("dark");
    localStorage.setItem("Nightmode", "true");
    Array.from(document.getElementsByTagName("img")).forEach(function (img) {
      img.setAttribute(
        "src",
        img.getAttribute("src").replace("/apidocs/assets/images/", "/apidocs/assets/images-dark/")
      );
    });
  } else {
    body.classList.remove("dark");
    localStorage.setItem("Nightmode", "false");
    Array.from(document.getElementsByTagName("img")).forEach(function (img) {
      img.setAttribute(
        "src",
        img.getAttribute("src").replace("/apidocs/assets/images-dark/", "/apidocs/assets/images/")
      );
    });
  }
});
if (isNightMode) {
  body.classList.add("dark");
  nightModeToggle.checked = true;
  Array.from(document.getElementsByTagName("img")).forEach(function (img) {
    img.setAttribute(
      "src",
      img.getAttribute("src").replace("/apidocs/assets/images/", "/apidocs/assets/images-dark/")
    );
  });
} else {
  body.classList.remove("dark");
  nightModeToggle.checked = false;
  Array.from(document.getElementsByTagName("img")).forEach(function (img) {
    img.setAttribute(
      "src",
      img.getAttribute("src").replace("/apidocs/assets/images-dark/", "/apidocs/assets/images/")
    );
  });
}
