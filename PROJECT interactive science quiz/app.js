
// crio um array com as respostas corretas
const correctAnswers = ['B', 'A', 'A', 'B'];

const form = document.querySelector('.quiz-form');

const result = document.querySelector('.result');


form.addEventListener('submit', e => {

    e.preventDefault();

    // pontuação a começar por zero
    let score = 0;

    // valores que serão introduzidos pelo user
    const userAnswers = [form.q1.value, form.q2.value, form.q3.value, form.q4.value];

    // verificação de respostas
    userAnswers.forEach((answer, index) => {
        
        if(answer === correctAnswers[index]){

            // a cada resposta igual às correctas, incrementa 25 pontos
            score += 25;

        }

    });

    console.log(score);
	
	// fazer scroll para o topo da página
	//scrollTo(0, 0);
	
	// ou com animação
	scroll({top: 0, left: 0, behavior: 'smooth' });

    // mostrar o resultado da página
    //result.querySelector('span').textContent = `${score}%`;

    // tirar o display none
    result.classList.remove('d-none');
	
	// animação do score
	let output = 0;
	const timer = setInterval(() => {
		result.querySelector('span').textContent = `${output}%`;
		if(output === score){
			// parar o timer quando atinge o score (25, ou 50 ou 75 ou 100)
			clearInterval(timer);
		} else {
			// se não atinge o score aumenta sempre mais um até chegar a um score
			output++;
		}
	}, 10);


    // mostrar as respostas erradas em crimson!
	

    if(form.q1.value === 'B'){
        form.querySelector('.q1').style.backgroundColor = '';
    } else {
        form.querySelector('.q1').style.backgroundColor = 'crimson';
    }

    if(form.q2.value === 'A'){
        form.querySelector('.q2').style.backgroundColor = '';
    } else {
        form.querySelector('.q2').style.backgroundColor = 'crimson';
    }

    if(form.q3.value === 'A'){
        form.querySelector('.q3').style.backgroundColor = '';
    } else {
        form.querySelector('.q3').style.backgroundColor = 'crimson';
    }

    if(form.q4.value === 'B'){
        form.querySelector('.q4').style.backgroundColor = '';
    } else {
        form.querySelector('.q4').style.backgroundColor = 'crimson';
    }


});