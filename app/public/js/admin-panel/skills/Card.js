class Card{
    static createCard({id, name}, numberSkill){
        return `<tr class="category-id" data-id="${id}">
        <td class="td-center">${numberSkill}</td>
        <td>${name}</td>
        <td onclick="showEditSkill(this)" class="td-center" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><i class="fas fa-solid fa-pen"></i></onclick=></td>
        <td onclick="showDeleteSkill(this)" class="td-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td>
      </tr>`
    }
}