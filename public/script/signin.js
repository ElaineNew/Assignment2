const emailInput = document.querySelector("#email")
const passwordInput = document.querySelector("#password")
const submitBtn = document.getElementById("submitBtn")
const resetBtn = document.querySelector("#resetBtn")

const defaultMsg = ""
const emailErrorMsg = "Please enter the valid email"
const passwordErrorMsg = "The password is too short"


const emailError = document.createElement('div')
emailError.classList.add('error')
emailInput.after(emailError)

const passwordError = document.createElement('div')

passwordError.classList.add('error')
passwordInput.after(passwordError)




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

const validate = () => {
    let valid = true;//global validation 

    let emailValidation=validateEmail();
    if(emailValidation !== defaultMsg){
        emailError.textContent = emailValidation;
        valid = false;
    }

    let passwordValidation = validatePassword();
    if(passwordValidation !== defaultMsg){
        passwordError.textContent=passwordValidation;
        valid = false;
    }
    return valid;
}

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

resetBtn.addEventListener('click', () => {
    emailError.textContent = defaultMsg
    passwordError.textContent = defaultMsg
})


