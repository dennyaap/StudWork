// const selected = document.querySelector(".selected");
// const optionsContainer = document.querySelector(".options-container");
// const searchBox = document.querySelector(".search-box input");

// const optionsList = document.querySelectorAll(".option");

// selected.addEventListener("click", () => {
//   optionsContainer.classList.toggle("active");

//   searchBox.value = "";
//   filterList("");

//   if (optionsContainer.classList.contains("active")) {
//     searchBox.focus();
//   }
// });

// optionsList.forEach(o => {
//   o.addEventListener("click", () => {
//     selected.innerHTML = o.querySelector("label").innerHTML;
//     optionsContainer.classList.remove("active");
//   });
// });

// searchBox.addEventListener("keyup", function(e) {
//   filterList(e.target.value);
// });

// const filterList = searchTerm => {
//   searchTerm = searchTerm.toLowerCase();
//   optionsList.forEach(option => {
//     let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
//     if (label.indexOf(searchTerm) != -1) {
//       option.style.display = "block";
//     } else {
//       option.style.display = "none";
//     }
//   });
// };




const App = {
    data() {
        return {
            isToggledNavbar: false,
            vacancyName: '',
            nameOrganization: '',
            categoryName: '',
            selectedCategory: 'WEB-Разработчик',
            isActive: false,
            searchBox: '',
            
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        imagePreview(){

        },
        selectCategory(){
            this.isActive = !this.isActive;
        }
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  