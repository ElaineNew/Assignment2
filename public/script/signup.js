const usernameInput = document.querySelector("#username")
const emailInput = document.querySelector("#email")
const passwordInput = document.querySelector("#password")
const termInput = document.querySelector("#term")
const checkbox = document.querySelector('.checkbox_group')
const resetBtn = document.querySelector("#resetBtn")
const submitBtn = document.getElementById("submitBtn")

const defaultMsg = ""
const emailErrorMsg = "Please enter the valid email"
const passwordErrorMsg = "The password is too short"
const termErrorMsg = "You must agree the terms to sign up"
const usernameErrorMsg = "Username cannot be null"


const usernameError = document.createElement('div')
usernameError.classList.add('error')
usernameInput.after(usernameError)

const emailError = document.createElement('div')
emailError.classList.add('error')
emailInput.after(emailError)

const passwordError = document.createElement('div')
passwordError.classList.add('error')
passwordInput.after(passwordError)

const termError = document.createElement('div')
termError.classList.add('error')
checkbox.after(termError)

const validateUsername = () => {
    let username = usernameInput.value
    if(username && username !==""){
        return defaultMsg
    }
    return usernameErrorMsg
}

const validateEmail = () => {
    let email = emailInput.value
    const regEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    if(regEmail.test(email)){
        return defaultMsg
    }
    return emailErrorMsg
}

const isPasswordValid = (password) => {
    return (password.length >= 8);
}

const validatePassword = () => {
    let password = passwordInput.value
    if(isPasswordValid(password)){
        return defaultMsg
    }
    return passwordErrorMsg
}


const validateTerm = () => {
    if(termInput.checked){
        return defaultMsg
    }
    return termErrorMsg
}

const validate = () => {
    console.log("validated")

    let valid = true;//global validation 

    let usernameValidation=validateUsername();
    console.log(usernameValidation)
    if(usernameValidation !==defaultMsg){
        usernameError.textContent = usernameValidation;
        valid = false;
    }

    let emailValidation=validateEmail();
    console.log(emailValidation)
    if(emailValidation !==defaultMsg){
        emailError.textContent = emailValidation;
        valid = false;
    }

    let passwordValidation=validatePassword();
    console.log(passwordValidation)
    if(passwordValidation!==defaultMsg){
        passwordError.textContent=passwordValidation;
        valid = false;
    }

    let termValidation = validateTerm()
    if(termValidation !== defaultMsg){
        termError.textContent = termValidation
        valid = false
    }

    return valid;
}

usernameInput.addEventListener("blur",()=>{ 
    let x = validateEmail();
    if(x == defaultMsg){
        emailError.textContent = defaultMsg;
    }
})

emailInput.addEventListener("blur",()=>{ 
    let x = validateEmail();
    if(x == defaultMsg){
        emailError.textContent = defaultMsg;
    }
})

passwordInput.addEventListener("blur",()=>{
    let x=validatePassword();
    if(x == defaultMsg){
        passwordError.textContent = defaultMsg;
    }
}) 

termInput.addEventListener("change",()=>{
    let x= validateTerm();
    if(x == defaultMsg){
        termError.textContent = defaultMsg;
    }
}) 

resetBtn.addEventListener('click', () => {
    emailError.textContent = defaultMsg
    passwordError.textContent = defaultMsg
    termError.textContent = defaultMsg
})

