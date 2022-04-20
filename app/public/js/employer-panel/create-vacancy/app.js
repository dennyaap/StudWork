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
            
            categories: [],
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        async renderCategories(){
            let countRow = 5;
            this.categories = await Category.getCategoriesLimit(countRow);
        },
        chooseCategory(e){
            this.selectedCategory = e.target.getAttribute('data-categoryName');
            this.hideCategoryList();
        },
        hideCategoryList(){
            this.isActive = !this.isActive;
        },
        async searchLikeCategory(e){
            let word = e.target.value;
            this.categories = await Category.getLikeCategories(word);
        },
        imagePreview(){

        },
        
    },
    created(){
        this.renderCategories();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  