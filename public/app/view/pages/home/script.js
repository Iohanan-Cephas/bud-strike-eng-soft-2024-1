const cartButton = document.querySelector("#cart");

console.log(cartButton)

cartButton.addEventListener("click", () => {
    window.location.href = "../cart"
})