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