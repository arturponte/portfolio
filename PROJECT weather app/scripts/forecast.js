
// weather api and getting data

// API key, https://developer.accuweather.com
const key = 'DcW9yOqdfvCXch5hGfC4Qz7GjvM6GslQ';



// get weather information

const getWeather = async (id) => {

    const base = 'http://dataservice.accuweather.com/currentconditions/v1/';
    const query = `${id}?apikey=${key}`;

    const response = await fetch(base + query);
    const data = await response.json();

    //console.log(data);
    return data[0];

    // return data[0] já que é o único elemento desse array

};



// get city information

const getCity = async (city) => {

    // para a pesquisa
    const base = 'http://dataservice.accuweather.com/locations/v1/cities/search';
    const query = `?apikey=${key}&q=${city}`;

    // response = http://dataservice.accuweather.com/locations/v1/cities/search?apikey=${key}&q=${city}
    const response = await fetch(base + query);
    //console.log(response);

    // para os dados em json
    const data = await response.json();

    //console.log(data);
    return data[0];
    // data[0] para ter só o primeiro mais próximo

}


/*
    getCity('porto').then(data => {

        // devolve a key dessa localização, exemplo do Porto que é "275317"
        return getWeather(data.Key);

    }).then(data => {

        // mostra a informação do tempo dessa localização
        console.log(data);

    }).catch(error => console.log(error));
*/


// exemplo da getWeather
//getWeather("329260");
