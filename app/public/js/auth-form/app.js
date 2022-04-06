const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


//validation
let studentEmailElement = document.getElementById('studentEmail');
let studentPasswordElement = document.getElementById('studentPassword');
let studentBtnAuthElement = document.getElementById('studentAuthBtn');

studentBtnAuthElement.addEventListener('click', async (e) =>{
  e.preventDefault();
  await checkAuth();
});
async function checkAuth(){
    let email = studentEmailElement.value;
    let password = studentPasswordElement.value;

    let errors = await Validation.checkErrorsAuth(email, password);
    if(errors.length != 0){
      console.log(errors);
    } else {
      console.log('isAuth');
    }
}
