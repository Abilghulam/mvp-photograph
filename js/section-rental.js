// Section Rental
// Section 1
const itemDetailModalOne = document.querySelector("#sewa1");
const itemDetailButtonsOne = document.querySelectorAll(".product-class");

itemDetailButtonsOne.forEach((btn) => {
  btn.onclick = (e) => {
    itemDetailModalOne.style.display = "flex";
    itemDetailModalTwo.style.display = "none";
    itemDetailModalThree.style.display = "none";
    e.preventDefault();
  };
});
// Section 2
const itemDetailModalTwo = document.querySelector("#sewa2");
const itemDetailButtonsTwo = document.querySelectorAll(".lensa-class");

itemDetailButtonsTwo.forEach((btn) => {
  btn.onclick = (e) => {
    itemDetailModalTwo.style.display = "flex";
    itemDetailModalThree.style.display = "none";
    itemDetailModalOne.style.display = "none";
    e.preventDefault();
  };
});
// Section 3
const itemDetailModalThree = document.querySelector("#sewa3");
const itemDetailButtonsThree = document.querySelectorAll(".accesories-class");

itemDetailButtonsThree.forEach((btn) => {
  btn.onclick = (e) => {
    itemDetailModalThree.style.display = "flex";
    itemDetailModalOne.style.display = "none";
    itemDetailModalTwo.style.display = "none";
    e.preventDefault();
  };
});
// End Section Rental