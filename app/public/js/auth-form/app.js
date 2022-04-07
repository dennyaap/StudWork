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
let studentDangerAlertContainer = document.getElementById('dangerAlertStudentContainer');

studentBtnAuthElement.addEventListener('click', async (e) =>{
  e.preventDefault();
  await checkAuth();
});
async function checkAuth(){
    let email = studentEmailElement.value;
    let password = studentPasswordElement.value;

    let errors = await Validation.checkErrorsAuth(email, password);

    let errorsText = '';
    if(errors.length != 0){
      errorsText += Alert.createDangerAlert(errors);
    } else {
      console.log('isAuth');
    }
    studentDangerAlertContainer.innerHTML = errorsText;
}
