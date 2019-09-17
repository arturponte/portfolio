
// DOM e UI content

const cityForm = document.querySelector('form');

const card = document.querySelector('.card');
const details = document.querySelector('.details');

const time = document.querySelector('img.time');
const icon = document.querySelector('.icon img');



const updateUI = (data) => {

    //console.log(data);

    // destructuring properties
    // from data object store data.cityDetails to cityDetails, and data.weather to weather
    const {cityDetails, weather} = data;

    /*
    OU:
        const cityDetails = data.cityDetails;
        const weather = data.weather;
    */


    // update the day/night image

    // ternary operator
    let timeSrc = weather.IsDayTime ? 'images/day.png' : 'images/night.png';

    time.setAttribute('src', timeSrc);

    /*
    OU:
        let timeSrc = null;

        if(weather.IsDayTime){
            timeSrc = 'images/day.svg';
        } else {
            timeSrc = 'images/night.svg';
        }

        time.setAttribute('src', timeSrc);
    */



    // update the icon
    const iconSrc = `images/icons/${weather.WeatherIcon}.svg`;

    icon.setAttribute('src', iconSrc);



    // update details html template
    details.innerHTML = `
        <h5 class="my-3">${cityDetails.EnglishName}</h5>
        <div class="my-3">${weather.WeatherText}</div>
        <div class="display-4 my-4">
            <span>${weather.Temperature.Metric.Value}</span>
            <span>&deg;C</span>
        </div>
    `;

    // remove the d-none class se existir
    if(card.classList.contains('d-none')){
        card.classList.remove('d-none');
    }

};



const updateCity = async (city) => {

    //console.log(city);

    // await para esperar carregar a function getCity to store no cityDetais
    const cityDetails = await getCity(city);
    // await para o id da function getWeather da cidade escrita
    const weather = await getWeather(cityDetails.Key);

    // return um objecto com as duas propriedades, cityDetails e weather
    return {
        cityDetails,
        weather
    };

    /*
        O MESMO QUE:

        return {
            cityDetails: cityDetails,
            weather: weather
        };
    */

};



cityForm.addEventListener('submit', e => {

    // prevent default action
    e.preventDefault();

    // get city value
    const city = cityForm.city.value.trim();

    // para limpar os campos
    cityForm.reset();

    // update the ui with new city
    updateCity(city)
        .then(data => {

            // mostra na console
            //console.log(data);

            // passar os dados para a function updateUI
            updateUI(data);

        })
        .catch(error => console.log(error));



    // set local storage
    // setItem(key city, value city)
    // overwrite sempre o mais recente
    localStorage.setItem('city', city);

});



// check if there's local storage, para o reflesh
// if localStorage.getItem('city') = true
/*
if(localStorage.getItem('city')){

    updateCity(localStorage.getItem('city'))
    //console.log(localStorage.getItem('city'))

    .then(data => updateUI(data))
    .catch(error => console.log(error));

};
*/


