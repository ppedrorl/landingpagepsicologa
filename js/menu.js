let btnMenu = document.getElementById("btn-abrir");
let navega = document.getElementById("menu-mobile");
let overlay = document.getElementById("overlay-menu");

function toggleExpand() {
  navega.classList.toggle("abrir-menu-mobile");
}
btnMenu.addEventListener("click", toggleExpand);

navega.addEventListener("click", () => {
  navega.classList.remove("abrir-menu-mobile");
});

overlay.addEventListener("click", () => {
  navega.classList.remove("abrir-menu-mobile");
});

const buttons = document.querySelectorAll(".hover-effect");
buttons.forEach((button) => {
  button.addEventListener("touchstart", () => {
    button.classList.add("hover");
  });

  button.addEventListener("touchend", () => {
    button.classList.remove("hover");
  });
});
