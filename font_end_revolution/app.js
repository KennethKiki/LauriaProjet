const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelector(".nav-links li");

hamburger.addEventListener("click", ()=>
{
    navLinks.classLister.toogle("open");
    links.forEach(link => {
        link.classList.toogle('fade');
    });
});