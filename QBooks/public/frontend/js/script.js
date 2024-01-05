const container = document.getElementById('container-loginn');
const registerBtn = document.getElementById('registerr');
const loginBtn = document.getElementById('loginn');

registerBtn.addEventListener('click', ()=>{
    container.classList.add("active");
})

loginBtn.addEventListener('click', ()=>{
    container.classList.remove("active");
})