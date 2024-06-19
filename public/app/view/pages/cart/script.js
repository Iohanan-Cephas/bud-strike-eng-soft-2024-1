<<<<<<< HEAD
const seeMore = document.querySelector("#see-more")
const section = document.querySelector('.total')
const details = document.querySelector('#details')

var control = false;
seeMore.addEventListener("click", ()=>{
  if(!control){
    section.classList.remove("total")
    section.classList.add("total-open")
    details.classList.add("details-open")
    details.classList.remove("details-close")

    control = true 
  }else {
    section.classList.add("total")
    section.classList.remove("total-open")
    details.classList.remove("details-open")
    details.classList.add("details-close")
    control = false;
  }
   
})
=======
// const minus = document.querySelector("#minus");
// const plus = document.querySelector("#plus");
// const count = document.querySelector("#count");

// var countNumber = 1;


// minus.addEventListener('click', () => {
//   if(countNumber >1) {
//     countNumber--
//     count.innerHTML = countNumber;
//   }
  
// })

// plus.addEventListener('click', () => {
//   countNumber++
//   count.innerHTML = countNumber;
// })



>>>>>>> c0faefe70406094744d5a620589e5a3e2be4e545
