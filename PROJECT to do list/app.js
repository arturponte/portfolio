
// get the input add
const addForm = document.querySelector('.add');

// get the ul
const list = document.querySelector('.to-dos');

// get input search
const search = document.querySelector('.search input');



// função generateTemplate (reutilizável)
const generateTemplate = (todo) => {

    const html = `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>${todo}</span>
            <i class="far fa-trash-alt delete"></i>
        </li>
    `;

    list.innerHTML += html;
    // adiciona ao innerHTML do ul, este template html

}



addForm.addEventListener('submit', e => {

    e.preventDefault();

    const todo = addForm.add.value.trim();
    // trim() tira os espaços em branco antes e depois do que foi escrito
    console.log(todo);


    // verificar se o que foi introduzido tem tamanho, senão está vazio
    // se tiver tamanho, faz o generateTemplate
    if(todo.length){
        generateTemplate(todo);
    }

    // limpar o campo depois do enter
    addForm.reset();

});



// delete to-dos!

list.addEventListener('click', e => {

    // se o que foi clicado contém a classe 'delete' (nesse ul para apanhar só o icone do lixo)
    if(e.target.classList.contains('delete')){

        e.target.parentElement.remove();
        // o pai do i(ícone de lixo) é o li

    }

});



// SEARCH

// function reutilizável
const filterToDos = (term) => {

    // quero os que não fazem match para aplicar o display none no css com a classe filtered

    // converter HTMLCollection para Array
    Array.from(list.children)
        // filter method se não inclui o term
        .filter((toDo) => !toDo.textContent.toLowerCase().includes(term))
        // forEach method para adicionar a classe filtered
        .forEach((toDo) => toDo.classList.add('filtered'));


    // para remover essa classe, o reverse
    Array.from(list.children)
        // filter method se inclui o term
        .filter((toDo) => toDo.textContent.toLowerCase().includes(term))
        // forEach method para remover a classe filtered
        .forEach((toDo) => toDo.classList.remove('filtered'));
};

// search, keyup event
search.addEventListener('keyup', () => {

    // term = o que é introduzido pelo user
    // trim() para retirar os espaço antes e depois, toLowerCase para não acontecer diferença entre maius e minus
    const term = search.value.trim().toLowerCase();

    filterToDos(term);

});