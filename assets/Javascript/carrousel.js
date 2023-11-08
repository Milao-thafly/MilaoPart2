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

}

const diaporama = new Diaporama("container")