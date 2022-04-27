class Card{
    static createCard({id, name, color}, numberCategory){
        return `<tr class="category-id" data-id="${id}">
        <td style="background: ${color}" class="category-color"></td>
        <td class="td-center">${numberCategory}</td>
        <td>${name}</td>
        <td onclick="showEditCategory(this)" class="td-center" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><i class="fas fa-solid fa-pen"></i></onclick=></td>
        <td onclick="showDeleteCategory(this)" class="td-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td>
      </tr>`
    }
}