
const form = document.querySelector('.postComment');
const commentsArea = document.querySelector('.commentsArea');
const commentDay = document.querySelector('.commentDay');
const profile = document.querySelector('.profileImage');

const extraTest = document.querySelector('.extraText');
const moreTextButton = document.querySelector('.moreTextButton');



const textFunction = () => {

    //console.log('clicked!');

    // para o primeiro clique vai ver este extraTest.style.display === ''
    // para os restantes cliques vai ver extraTest.style.display === 'none'

    if(extraTest.style.display === '' || extraTest.style.display === 'none'){
        
        extraTest.style.display = 'inline';
        moreTextButton.textContent = 'Read Less';

        //console.log(extraTest.style.display);

    } else {

        extraTest.style.display = 'none';
        moreTextButton.textContent = 'Read More';
        
        //console.log(extraTest.style.display);

    }

};


moreTextButton.addEventListener('click', textFunction);




// Comment Date

const postDate = new Date('August 31 2019 7:30:59');
const now = new Date();

// timestamps em milisegundos
const difference = now.getTime() - postDate.getTime();
//console.log(difference);

// converting timestamps
const mins = Math.round(difference / 1000 / 60);
const hours = Math.round(mins / 60);
const days = Math.round(hours / 24);
// console.log(days);

commentDay.innerHTML = `<span class="float-left commentDay"><em>${days} days ago</em></span>`;



form.addEventListener('submit', e => {

    // tirar o reload page
    e.preventDefault();

    // validar se tem texto
    if(form.name.value.length === 0){
        form.name.value = 'Anonymous';
        // se fizer só return; aqui, não faz o submit
    }

    if(form.textarea.value.length === 0){
        form.textarea.value = 'A comment was not written by this user :(';
    }


    //inicializo variável vazia
    let src = '';

    const genderProfile = (src) => {

        if(form.gender.value === 'female'){
            src = 'images/placeholder_female.jpg';
        } else {
            src = 'images/placeholder_male.jpg';
        }

        return src;
    };

    

    const specialCharts = (value) => {
        value = value.replace(/&/g, "&amp;")
                     .replace(/</g, "&lt;")
                     .replace(/>/g, "&gt;")
                     .replace(/"/g, "&quot;")
                     .replace(/'/g, "&#039;");

        return value;
    };
    // o replace é para proteger caracteres especiais


    const getDate = () => {

        const newNow = new Date();

        // HORAS

        let h = newNow.getHours();
        let m = newNow.getMinutes();
        let s = newNow.getSeconds();
        let session = 'AM';
        
        if(h == 0){
            h = 12;
        }

        if(h > 12){
            h = h - 12;
            session = "PM";
        }
        
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        
        // DATA

        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        const month = months[newNow.getMonth()];
        const day = newNow.getDate();
        const year = newNow.getFullYear();

        
        // TEMPLATE HTML

        const htmlDate = `${month} ${day}, ${year} at ${h}:${m}:${s} ${session}`;

        return htmlDate;

    };


    newComment = `
        <img src="${genderProfile(src)}" alt="">
        <h5>${specialCharts(form.name.value)} said:</h5>
        <p>${specialCharts(form.textarea.value)}</p>
        <span class="float-left"><em>${getDate()}</em></span>
        <span class="float-right"><a href="#">Reply</a><a href="#">Share</a></span>
        <br/>
        <hr/>
        <div class="clear"></div>
    `;

    //console.log(newComment);
    
    // adicionar como o primeiro filho
    commentsArea.insertAdjacentHTML('afterbegin', newComment);

    // faz o scroll depois do submit
    commentsArea.scrollIntoView({
        behavior: 'smooth'
      });

    form.reset();

});