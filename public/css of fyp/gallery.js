const pictureModal = document.getElementById("picture-modal")
const picture = document.getElementById("picture")

const imageSrc = document.getElementsByClassName("image-src")

const myFunction = function () {
    const src = this.getAttribute("src")
    picture.src = src
    pictureModal.classList.remove("d-none")
}

for (let i = 0; i < imageSrc.length; i++) {
    imageSrc[i].addEventListener("click", myFunction, false)
}

pictureModal.addEventListener("click", () => {
    pictureModal.classList.add("d-none")
})

// const imageContainer = document.getElementsByClassName("image-container")
// const imageModal = document.getElementsByClassName("image-modal")

// const showModal = function (i) {
//     console.log(i)
//     imageModal[i].classList.remove("d-none")
// }

// const hideModal = function (i) {
//     imageModal[i].classList.add("d-none")
// }

// for (let i = 0; i < imageSrc.length; i++) {
//     imageSrc[i].addEventListener("mouseover", showModal(i), false)
//     imageSrc[i].addEventListener("mouseout", hideModal(i), false)
// }

