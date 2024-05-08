const userInputContainer = document.querySelector(".user-container")
const passwordContainer = document.querySelector("#password")
const form = document.querySelector(".login-form")
const userInput = document.querySelector("#user-input")
const passwordInput = document.querySelector("#password-input");
const passwordConfirmContainer = document.querySelector("#password-confirm")
const passwordConfirmInput = document.querySelector("#password-input-confirm")

userInput.addEventListener('focus', () => {
  passwordContainer.classList.remove('alert')
  passwordConfirmContainer.classList.remove('alert')
  userInputContainer.classList.remove('alert')

  userInputContainer.classList.add('user-container-selected')
})

userInput.addEventListener('blur', () => {
  userInputContainer.classList.remove('user-container-selected')
})



passwordInput.addEventListener('focus', () => {
  passwordContainer.classList.remove('alert')
  passwordConfirmContainer.classList.remove('alert')
  userInputContainer.classList.remove('alert')

  passwordContainer.classList.add('user-password-selected')
})
passwordInput.addEventListener('blur', () => {
  passwordContainer.classList.remove('user-password-selected')
})


passwordConfirmInput.addEventListener('focus', () => {
  passwordContainer.classList.remove('alert')
  passwordConfirmContainer.classList.remove('alert')
  userInputContainer.classList.remove('alert')

  passwordConfirmContainer.classList.add('user-password-selected')
})

passwordConfirmInput.addEventListener('blur', () => {
  passwordConfirmContainer.classList.remove('user-password-selected')
})


form.addEventListener("submit", (e) => {
  e.preventDefault()

  if(userInput.value != ""  && passwordInput.value != "" && passwordConfirmInput.value != ""){
      
      
  }else if(userInput.value == ""){
      passwordContainer.classList.remove('alert')
      passwordConfirmContainer.classList.remove('alert')


      userInputContainer.classList.add('alert')
  }else if(passwordInput.value == ""){
      userInputContainer.classList.remove('alert')
      passwordConfirmContainer.classList.remove('alert')


      passwordContainer.classList.add('alert')
  }else {
      passwordContainer.classList.remove('alert')
      userInputContainer.classList.remove('alert')

      passwordConfirmContainer.classList.add('alert')
  }

  
})