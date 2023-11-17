const submitBtn = document.querySelector("#submit_post");
const titleInput = document.querySelector("#title");
const contentInput = document.querySelector("#new_post");
const radios = document.querySelectorAll('input[type="radio"]');
const categoryInput = document.querySelector(".category_selection")

const defaultMsg = ""
const titleErrorMsg = "Title can't be empty"
const categoryErrorMsg = "Choose one category"
const contentErrorMsg = "Content can't be empty"

const titleError = document.createElement('div')
titleError.setAttribute('class', 'error2');
titleInput.after(titleError)

const categoryError = document.createElement('div')
// categoryError.classList.add('error2')
categoryError.className = 'error2';
categoryInput.after(categoryError)

const contentError = document.createElement('div')
contentError.className = 'error2';
contentInput.after(contentError)



const validateTitle = () => {
    let title = titleInput.value
    if(title && title.length > 0){
        return defaultMsg
    }
    return titleErrorMsg
}

const validateCategory = () => {
    let isChecked = false;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            isChecked = true;
            break;
        }
    }
    if (!isChecked) {
        return categoryErrorMsg
    }
    return defaultMsg
}

const validateContent = () => {
    let content = contentInput.value
    if(content && content.length > 0){
        return defaultMsg
    }
    return contentErrorMsg
}

const validate = () => {
    let valid = true;//global validation 

    let titleValidation=validateTitle();
    if(titleValidation !== defaultMsg){
        titleError.textContent = titleValidation;
        valid = false;
    }

    let categoryValidation = validateCategory();
    if(categoryValidation !== defaultMsg){
        categoryError.textContent=categoryValidation;
        valid = false;
    }

    let contentValidation = validateContent();
    if(contentValidation !== defaultMsg){
        contentError.textContent=contentValidation;
        valid = false;
    }

    return valid;

}

titleInput.addEventListener("blur",()=>{ 
    let x = validateTitle();
    if(x == defaultMsg){
        titleError.textContent = defaultMsg;
    }
})

contentInput.addEventListener("blur",()=>{ 
    let x = validateContent();
    if(x == defaultMsg){
        contentError.textContent = defaultMsg;
    }
})


radios.forEach(radio => {
    radio.addEventListener("change",()=>{
        let x=validateCategory();
        if(x == defaultMsg){
            categoryError.textContent = defaultMsg;
        }
    
    }) 
})


submitBtn.addEventListener("click", ()=>{
    fetch('')
})