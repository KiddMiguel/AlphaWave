// Cookies
const btnSuccess = document.querySelector('.btn-success');
console.log(btnSuccess);

const cookies = document.querySelector('.cookies');
console.log(cookies);

btnSuccess.addEventListener('click', function() {
    cookies.style.opacity = "0";
});