"use strict";

const user_menu = document.querySelector("#user-menu");
const darkening = document.querySelector("#darkening");
const page = document.querySelector("#page");

const in_icon = document.querySelector("#in_icon");
in_icon.addEventListener("click", function () {
  page.classList.toggle("hide-vertical-scrollbar");
  darkening.classList.toggle("darkening");
  user_menu.classList.add("open-user-menu");
  $(window).scrollTop(0);
});

document.addEventListener("click", function (event) {
  let targetElement = event.target;
  if (targetElement !== in_icon && targetElement !== user_menu) {
    user_menu.classList.remove("show-list");
    page.classList.remove("hide-vertical-scrollbar");
    darkening.classList.remove("darkening");
    user_menu.classList.remove("open-user-menu");
  }
});
