let btnMenu = document.getElementById("btn-menu");
let menu = document.getElementById("menu-mobile");
let overlay = document.getElementById("overlay-menu");
btnMenu.addEventListener("click", () => {
  menu.classList.add("abrir-menu-mobile");
});
menu.addEventListener("click", () => {
  menu.classList.remove("abrir-menu-mobile");
});
overlay.addEventListener("click", () => {
  menu.classList.remove("abrir-menu-mobile");
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
