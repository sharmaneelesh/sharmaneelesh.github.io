let slideIndex2 = 0;
showSlides2();

function showSlides2() {
  let i2;
  let slides2 = document.getElementsByClassName("research");
  for (i2 = 0; i2 < slides2.length; i2++) {
    slides2[i2].style.display = "none";
  }
  slideIndex2++;
  if (slideIndex2 > slides2.length) {slideIndex2 = 1}
  slides2[slideIndex2-1].style.display = "block";
  setTimeout(showSlides2, 5000);
}
