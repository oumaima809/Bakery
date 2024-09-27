const produCtcontainers = document.querySelector(".product_container");
const nxtBtn = document.querySelector(".next-btn");
const pretBtn = document.querySelector(".pre-btn");

let containerDimensions = produCtcontainers.getBoundingClientRect();
let containerWidth = containerDimensions.width;
nxtBtn.addEventListener("click", () => {
  produCtcontainers.scrollLeft += containerWidth;
});
pretBtn.addEventListener("click", () => {
  produCtcontainers.scrollLeft -= containerWidth;
});

var magnifying_area = document.getElementById("magnifying_area");
var magnifying_img = document.getElementById("magnifying_img");

magnifying_area.addEventListener("mousemove", function (event) {
  //Ces quatre lignes récupèrent les coordonnées de la souris par rapport à l'élément "magnifying_area" (l'élément contenant l'image),
  // et les dimensions de cet élément.
  clientX = event.clientX - magnifying_area.offsetLeft;
  clientY = event.clientY - magnifying_area.offsetTop;
  mWidth = magnifying_area.offsetWidth;
  mHeight = magnifying_area.offsetHeight;

  clientX = (clientX / mWidth) * 100;
  clientY = (clientY / mHeight) * 100;

  magnifying_img.style.transform =
    "translate(-" + clientX + "%,-" + clientY + "%) scale(1.5)";
});
magnifying_area.addEventListener("mouseleave", function () {
  magnifying_img.style.transform = "translate(-50%,-50%) scale(1)";
});

const buttons = document.querySelectorAll(".product-btn");
function showButtons(i) {
  buttons[i].style.bottom = "3px";
  buttons[i].style.opacity = "1";
}

function hideButtons(i) {
  buttons[i].style.bottom = "-50px";
  buttons[i].style.opacity = "0";
}

var heartButtons = document.querySelectorAll(".fa-heart");
for (var i = 0; i < heartButtons.length; i++) {
  heartButtons[i].addEventListener("click", function () {
    this.classList.toggle("fa-heart");
    this.classList.toggle("fa-times");
  });
}

const plusBtn = document.getElementById("plus");
const minusBtn = document.getElementById("minus");
const quantityElement = document.getElementById("quantity");

plusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.innerHTML);
  quantity += 1;
  quantityElement.innerHTML = quantity.toString();
  alert(quantity);
});

minusBtn.addEventListener("click", function () {
  let quantity = parseInt(quantityElement.innerHTML);
  if (quantity > 1) {
    quantity -= 1;
    quantityElement.innerHTML = quantity.toString();
  }
});
