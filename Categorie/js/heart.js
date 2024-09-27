var heartButtons = document.querySelectorAll(".fa-heart");
for (var i = 0; i < heartButtons.length; i++) {
  heartButtons[i].addEventListener("click", function () {
    this.classList.toggle("fa-heart");
    this.classList.toggle("fa-times");
  });
}
