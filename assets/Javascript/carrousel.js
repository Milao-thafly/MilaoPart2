const img = document.getElementById('container');
const rightBtn = document.getElementById('right-btn');
const leftBtn = document.getElementById('left-btn');

let pictures =['/img/n.jpg','/img/Forest.png','/img/hostel.png'];

img.src = pictures[0];
let position = 0;

const moveRight = () => {
    if (position >= pictures.length - 1) {
        position = 0 
        img.src = pictures[position + 1];
        return;
    }
    img.src = pictures[position + 1];
    position++;
}


const moveLeft = () => {
    if (position < 1) {
        position = 0 
        img.src = pictures[position - 1];
        return;
    }
    img.src = pictures[position - 1];
    position--;
}
rightBtn.addEventListener("click", moveRight);
leftBtn.addEventListener("click", moveLeft);
