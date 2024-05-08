const userInput = document.querySelector('#user-input')
const userInputContainer = document.querySelector(".user-container")

const form = document.querySelector(".login-form")
const user = document.querySelector("#user-input")
const passwordInput = document.querySelector("#password-input");
const passwordContainer = document.querySelector('#passwordContainer')


userInput.addEventListener('focus', () => {
  userInputContainer.classList.remove('alert')
  passwordContainer.classList.remove('alert')


  userInputContainer.classList.add('user-container-selected')
})

userInput.addEventListener('blur', () => {
  userInputContainer.classList.remove('user-container-selected')
})



passwordInput.addEventListener('focus', () => {
  userInputContainer.classList.remove('alert')
  passwordContainer.classList.remove('alert')



  passwordContainer.classList.add('user-password-selected')
})
passwordInput.addEventListener('blur', () => {
  passwordContainer.classList.remove('user-password-selected')
})



form.addEventListener("submit", (e) => {
  e.preventDefault()

  if (user.value != "" && passwordInput.value != "") {
    

  } else if (user.value == "") {
    passwordContainer.classList.remove('alert')

    userInputContainer.classList.add('alert')
  } else {
    userInputContainer.classList.remove('alert')

    passwordContainer.classList.add('alert')
  }


})