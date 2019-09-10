
const clock = document.querySelector('.clock');


const tick = () => {

    const now = new Date();

    let h = now.getHours();
    let m = now.getMinutes();
    let s = now.getSeconds();
    let session = 'AM';

    //console.log(h, m, s);

    // para utilizar o AM e PM
	
	// meia noite, se h = 0, então h = 12
    if(h == 0){
        h = 12;
    }
    
	
	// h = 13
	// se 13 > 12 então 13 = 13 - 12, e session = PM
    if(h > 12){
        h = h - 12;
        session = "PM";
    }

    // para colocar o 0
    // condição, se h for menor que 10 então "0" + h , senão só h
	
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;



    const htmlClock = `${h}:${m}:${s} ${session}`;

    clock.innerHTML = `<p>${htmlClock}</p>`;


    // DATA

    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const weekDay = days[now.getDay()];
    const month = months[now.getMonth()];
    const day = now.getDate();
    const year = now.getFullYear();

    //console.log(weekDay, day, month, year);

    const htmlDate = `${month} ${day}, ${year}`;
    clock.innerHTML += `<span class="date">${weekDay}</span>
    <p>${htmlDate}</p>`;

};

// chama o tick a cada 1000 = 1segundo
setInterval(tick, 1000);
