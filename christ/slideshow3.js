let slideIndex3 = 0;
showSlides3();

function showSlides3() {
  let i3;
  let slides3 = document.getElementsByClassName("placements");
  for (i3 = 0; i3 < slides3.length; i3++) {
    slides3[i3].style.display = "none";
  }
  slideIndex3++;
  if (slideIndex3 > slides3.length) {slideIndex3 = 1}
  slides3[slideIndex3-1].style.display = "block";
  setTimeout(showSlides3, 5000);
}
