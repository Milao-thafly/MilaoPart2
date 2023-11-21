const menuHamburger = document.querySelector(".hamburger")
const navLinks = document.querySelector(".navlinks-container")

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')
})