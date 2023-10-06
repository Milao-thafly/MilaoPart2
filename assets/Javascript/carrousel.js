class Diaporama {


constructor(idContainer){
    this.container = document.getElementById(idContainer);
    this.leftBtn = this.container.querySelector("#left-btn");
    this.rightBtn = this.container.querySelector("#right-btn");
    this.img = this.container.querySelectorAll("figure");
    this.index = 0;
    this.affichage();
    this.rightBtn.addEventListener("click", () => { this.right() })
    this.leftBtn.addEventListener("click", () => { this.left() })

}

right() {
    console.log(this);
    var index = this.index++;
    console.log(index)
    if (this.index >= this.img.length) this.index = 0;
    this.affichage();
}

left() {
    var index = this.index--;
    console.log(index)
    if (this.index < 0) this.index = this.img.length -1;
    this.affichage();
}

affichage(){
    for (const image of this.img){
        image.style.display = "none";
    }
    this.img[this.index].style.display = "block";

}
// const img = document.getElementsById('carrousel');
// const rightBtn = document.getElementById('right-btn');
// const leftBtn = document.getElementById('left-btn');









// img.src = pictures[0];
// let position = 0;

// const moveRight = () => {
//     if (position >= pictures.length - 1) {
//         position = 0 
//         img.src = pictures[position + 1];
//         return;
//     }
//     img.src = pictures[position + 1];
//     position++;
// }


// const moveLeft = () => {
//     if (position < 1) {
//         position = 0 
//         img.src = pictures[position - 1];
//         return;
//     }
//     img.src = pictures[position - 1];
//     position--;
// }
// rightBtn.addEventListener("click", moveRight);
// leftBtn.addEventListener("click", moveLeft);
}

const diaporama = new Diaporama("container")