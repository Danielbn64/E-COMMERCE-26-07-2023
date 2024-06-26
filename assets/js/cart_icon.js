"use strict"

const cart = document.querySelector("#cart");
const cart_menu = document.querySelector("#cart_menu");

cart.addEventListener("mouseover", function () {
  cart_menu.classList.toggle("show");
});

cart.addEventListener("mouseout", function () {
  cart_menu.classList.remove("show");
});
