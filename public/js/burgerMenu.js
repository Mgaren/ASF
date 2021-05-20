function openNav()
{
    if (window.matchMedia("(max-width: 1000px)").matches) {
        document.querySelector('.sideNav').style.width = "35%";
        document.querySelector('.nav').style.display = "flex";
    }
}

function closeNav()
{
    document.querySelector('.sideNav').style.width = "0";
    document.querySelector('.nav').style.display = "none";
}

const burgerButton = document.querySelector('.openButton');
const closeButton = document.querySelector('.closeButton');

burgerButton.addEventListener('click',openNav);
closeButton.addEventListener('click',closeNav);
