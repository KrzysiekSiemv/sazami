const menu = document.getElementById("menu");
const menubtn = document.getElementById("menubtnicon");
let opened = 0;

function addZero(i) {
    if (i < 10) {i = "0" + i}  // add zero in front of numbers < 10
    return i;
}

function showMenu(){
    if(opened === 0) {
        menu.style.display = "block";

        menubtn.classList.remove("fa-caret-down");
        menubtn.classList.add("fa-caret-up");

        opened = 1;
    } else {
        menu.style.display = "none";

        menubtn.classList.remove("fa-caret-up");
        menubtn.classList.add("fa-caret-down");

        opened = 0;
    }
}