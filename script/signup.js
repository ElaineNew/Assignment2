const emailInput = document.querySelector("#email")
const passwordInput = document.querySelector("#password")
const termInput = document.querySelector("#term")
const submitBtn = document.getElementById("submitBtn")
const resetBtn = document.querySelector("#resetBtn")

const defaultMsg = ""
const emailErrorMsg = "Please enter the valid email"
const passwordErrorMsg = "The password must has 8 digits, containing numbers, uppercase and lowercase characters"
const termErrorMsg = "You must agree the terms to sign up"


const emailError = document.createElement('div')
const passwordError = document.createElement('div')
const termError = document.createElement('div')


const validateEmail = () => {
    let email = emailInput.value
    const regEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    let result = regEmail.test(email)
    if(!result){
        emailError.classList.add('error')
        emailError.textContent= emailErrorMsg 
        emailInput.after(emailError)
    }
}


const validatePassword = () => {
    let password = passwordInput.value
    const regPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{9,}$/

    let result = regPassword.test(password)

    if(!result){
        passwordError.classList.add('error')
        passwordError.textContent= passwordErrorMsg 
        passwordInput.after(passwordError)
    }
}


const validateTerm = () => {
    if(!termInput.checked){
        termError.textContent = termErrorMsg
        termInput.after(termError)
        termError.classList.add('error')
    }
}


const validateForm = () => {
    validateEmail()
    validatePassword()
    validateTerm()
}

submitBtn.addEventListener("click", () => {
    validateForm()

})

resetBtn.addEventListener('click', () => {
    emailError.textContent = defaultMsg
    passwordError.textContent = defaultMsg
    termError.textContent = defaultMsg
})