// const btn_decrease = document.querySelector('btn_decrease');
// const btn_increase = document.querySelector('btn_increase');
// const ticketNumber = document.querySelector('ticketNumber');


// let count = 0;

// ticketNumber.setAttribute('innerText', count);
    
// btn_decrease.addEventListener('click', (e) => {
//     const styles = e.currentTarget.classList
//     if(styles.contains('btn_decrease')) {
//         count--;

//         // console.log(ticketNumber);
//     }
//     count.textContent = count;
// })


    // btn_increase.addEventListener('click', (e) => {
    //     const styles = e.currentTarget.classList
    //     if(styles.contains('btn_increase')) {
    //         count++;
    //         // console.log(ticketNumber);
    //     }
    //     count.textContent = count;

    // })



    //Je récupère dans une variable la valeur du compteur 
    // Je fais le count-- 
    // Je donne la nouvelle valeur comme la valeur affiché


    //     btn_increase.onclick = function(){
    //         count++;
    //         ticketNumber.innerHTML = count;
    //     }

    //     btn_decrease.onclick = function(){
    //     count--;
    //     ticketNumber.innerHTML = count;
    // }


const inputList = document.getElementById("inputList");


const ticketsList = inputList.getElementsByClassName("ticket");

for(ticket of ticketsList) {
    ticket.ticketValue = 0;
    ticket.ticketNumber = ticket.querySelector(".ticketNumber");
    ticket.btnIncrease = ticket.querySelector(".btn_increase");
    ticket.btnDecrease = ticket.querySelector(".btn_decrease");

    ticket.btnIncrease.ticket = ticket.btnDecrease.ticket = ticket;

    ticket.btnIncrease.onclick = function(){
        this.ticket.ticketValue++;
        this.ticket.ticketNumber.innerHTML = this.ticket.ticketValue;
    }
    ticket.btnDecrease.onclick = function(){
        this.ticket.ticketValue--;
        this.ticket.ticketNumber.innerHTML = this.ticket.ticketValue;
    }
}