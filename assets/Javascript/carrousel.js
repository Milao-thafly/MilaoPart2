class Diaporama {


constructor(idContainer){
    this.container = document.getElementById(idContainer);
    this.leftBtn = this.container.querySelector("#left-btn");
    this.rightBtn = this.container.querySelector("#right-btn");
    this.images = this.container.querySelectorAll("figure");
    this.index = 0;
    this.affichage();
    this.rightBtn.addEventListener("click", () => { this.right() })
    this.leftBtn.addEventListener("click", () => { this.left() })

}

right() {
    
    var index = this.index++;
    console.log(index)
    if (this.index >= this.images.length) this.index = 0;
    this.affichage();
}

left() {
    var index = this.index--;
    console.log(index)
    if (this.index < 0) this.index = this.images.length -1;
    this.affichage();
}

    affichage() {
        for (const image of this.images) {
            image.style.display ="none";
        }
        this.images[this.index].style.display = "block";
    }
}

const diaporama = new Diaporama("container");