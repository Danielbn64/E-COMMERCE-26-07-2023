"use strict"

const admin = document.querySelector("#admin");
const admin_menu = document.querySelector("#admin_menu");

admin.addEventListener("click", function () {
  admin_menu.classList.toggle("show");
});

document.addEventListener("click", function (event) {
  let targetElement = event.target;
  if (targetElement !== admin && targetElement !== admin_menu) {
    admin_menu.classList.remove("show");
  }
});
