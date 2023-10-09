// Cookies
const btnSuccess = document.querySelector('.btn-success');
console.log(btnSuccess);

const cookies = document.querySelector('.cookies');
console.log(cookies);

btnSuccess.addEventListener('click', function() {
    cookies.style.opacity = "0";
});
let jsonRespons = fetch("./service/data.json").then(res => res.json()).then((data) => { return data; }); // Now contains a JSON object - assuming one exists
console.log("jsonRespons")