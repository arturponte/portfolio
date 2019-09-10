
const search = document.querySelector('.search input');
const cards = document.querySelector('.allCards');

const displayMessage = document.querySelector('.displayMessage');


search.addEventListener('keyup', () => {

    const term = search.value.trim().toLowerCase();
    filterMovies(term);


    // mostrar o 'sem resultados'
    if (cards.children.length === cards.querySelectorAll('.filtered').length) {

        // se todos as crianças tiverem a mesma class 'filtered'
        displayMessage.style.display = 'block';

    } else {

        // caso não têm todas
        displayMessage.style.display = 'none';

    }

});



const filterMovies = (term) => {

    // HTMLCollection to Array
    Array.from(cards.children)

        // filter method that not include the term to get the filtered class display none

        .filter(card => !card.textContent.toLowerCase().includes(term))

        .forEach(card => card.classList.add('filtered'));


    // o reverse
    Array.from(cards.children)
        
        .filter(card => card.textContent.toLowerCase().includes(term))
        
        .forEach(card => card.classList.remove('filtered'));


};
