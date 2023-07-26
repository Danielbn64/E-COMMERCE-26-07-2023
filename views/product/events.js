"use strict";

var imgItems = $(".slider li").length;
var imgPosition = 1;

$(document).ready(function () {
  $(".slider li").hide();
  $(".slider li:first").show();
});

function nextSlider() {
  if (imgPosition >= imgItems) {
    imgPosition = 1;
  } else {
    imgPosition++;
  }

  $(".slider li").hide();
  $(".slider li:nth-child(" + imgPosition + ")").fadeIn();
}

function prevSlider() {
  if (imgPosition <= 1) {
    imgPosition = imgItems;
  } else {
    imgPosition--;
  }

  $(".slider li").hide();
  $(".slider li:nth-child(" + imgPosition + ")").fadeIn();
}

// $('.back-arrow').click(prevSlider);
$(".next-arrow").click(nextSlider);
$(".back-arrow").click(prevSlider);
