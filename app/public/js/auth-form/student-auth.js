//validation
let studentEmailElement = document.getElementById('studentEmail');
let studentPasswordElement = document.getElementById('studentPassword');
let studentBtnAuthElement = document.getElementById('studentAuthBtn');
let studentDangerAlertContainer = document.getElementById('dangerAlertStudentContainer');

let spinnerStudentElement = document.getElementById('studentSpinner');
spinnerStudentElement.style.display = 'none';

let btnStudentTextElement = document.getElementById('studentBtnText');

studentBtnAuthElement.addEventListener('click', async (e) =>{
  e.preventDefault();

  btnStudentTextElement.style.display = 'none';
  spinnerStudentElement.style.display = '';
  await checkAuth();
  spinnerStudentElement.style.display = 'none';
  btnStudentTextElement.style.display = '';
});
async function checkAuth(){
    let email = studentEmailElement.value;
    let password = studentPasswordElement.value;

    let errors = await Validation.checkErrorsAuth(email, password);

    let errorsText = '';
    if(errors.length != 0){
      errorsText += Alert.createDangerAlert(errors);
    } else {
    //   console.log('isAuth');
        await Autorisation.isAutorisation(email);
        document.location.href = "/";
    }
    studentDangerAlertContainer.innerHTML = errorsText;
}