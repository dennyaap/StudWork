class Card{
    static createCard({id, name}, numberCategory){
        return `<tr class="category-id" data-id="${id}">
        <td class="td-center">${numberCategory}</td>
        <td>${name}</td>
        <td onclick="showEditCategory(this)" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><i class="fas fa-solid fa-pen"></i></onclick=></td>
        <td onclick="showDeleteCategory(this)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td>
      </tr>`
    }
}