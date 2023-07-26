"use strict";
const in_icon = document.querySelector("#in_icon");
const user_menu = document.querySelector("#user_menu");
const darkening = document.querySelector("#darkening");
const page = document.querySelector("#page");

const cart = document.querySelector("#cart");
const cart_menu = document.querySelector("#cart_menu");

const admin = document.querySelector("#admin");
const admin_menu = document.querySelector("#admin_menu");

function toggleMenu() {
  const categories_menu = document.getElementById('categories_menu');
  categories_menu.classList.toggle("show-list");
}

function closeMenu() {
  const categories_menu = document.getElementById('categories_menu');
  categories_menu.classList.remove("show-list");
}

in_icon.addEventListener("click", function () {
  user_menu.classList.toggle("show-list");
  $(window).scrollTop(0);
});

document.addEventListener("click", function (event) {
  let targetElement = event.target;
  if (targetElement !== in_icon && targetElement !== user_menu) {
    user_menu.classList.remove("show-list");
  }
});

cart.addEventListener("mouseover", function () {
  cart_menu.classList.toggle("show");
});

cart.addEventListener("mouseout", function () {
  cart_menu.classList.remove("show");
});

admin.addEventListener("click", function () {
  admin_menu.classList.toggle("show");
});

document.addEventListener("click", function (event) {
  let targetElement = event.target;
  if (targetElement !== admin && targetElement !== admin_menu) {
    admin_menu.classList.remove("show");
  }
});
