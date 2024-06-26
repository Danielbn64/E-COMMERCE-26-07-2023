"use strict";
const darkening_categories_deploy = document.querySelector("#darkening_categories_deploy");

function toggleMenu() {
  const categories_menu = document.getElementById("categories_menu");
  categories_menu.classList.toggle("show-categories");
  darkening_categories_deploy.classList.toggle("darkening");
}
