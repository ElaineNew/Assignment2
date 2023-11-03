const emailInput = document.querySelector("#email")
const passwordInput = document.querySelector("#password")
const submitBtn = document.getElementById("submitBtn")
const resetBtn = document.querySelector("#resetBtn")

const defaultMsg = ""
const emailErrorMsg = "Please enter the valid email"
const passwordErrorMsg = "The password is too short"

const emailError = document.createElement('div')
const passwordError = document.createElement('div')

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

const isPasswordValid = (password) => {
    return (password.length >= 8);
}

const validatePassword = () => {
    let password = passwordInput.value
    let result = isPasswordValid(password)

    if(!result){
        passwordError.classList.add('error')
        passwordError.textContent= passwordErrorMsg 
        passwordInput.after(passwordError)
        console.log("password error")
    }
}


const validateForm = () => {
    validateEmail()
    validatePassword()

}

submitBtn.addEventListener("click", () => {
    validateForm()
})

resetBtn.addEventListener('click', () => {
    emailError.textContent = defaultMsg
    passwordError.textContent = defaultMsg
})