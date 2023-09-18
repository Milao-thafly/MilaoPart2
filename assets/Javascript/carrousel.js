class Diaporama {
    constructor(idContainer) {
        this.container = document.getElementById(idContainer);
        this.btnPrevious = this.container.querySelector(".previous");
        this.btnNext = this.container.querySelector(".next");
        this.image = this.container.querySelectorAll("figure");
        this.index = 0;
        this.affichage();
        this.btnNext.addEventListener("click", () => { this.next() })
        this.btnPrevious.addEventListener("click", () => {this.btnPrevious() })
    }

    next() {
        console.log(this);
        this.index++;
        if (this.index >= this.images.length) this.index =0;
        this.affichage();
    }

    previous() {
        this.index--;
        if (this.index < 0) this.index = this.images.length -1;
        this.affichage();
    }

    affichage() {
        for (const image of this.images) {
            images.style.display ="none";
        }
        this.images[this.index].style.display = "block";
    }
}

const diaporama = new Diaporama("container");