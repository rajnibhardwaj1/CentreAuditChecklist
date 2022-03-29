const button = document.querySelector("button");

button.addEventListener("click", () => {
    if (navigator.geolocation) {
        button.innerText = "Allow to detect location";
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    } else {
        button.innerText = "Your browser not support";
    }
});

function onSuccess(position) {
    button.innerText = "Detecting you location...";
    // console.log(position)
    let { latitude, longitude } = position.coords;
    // console.log(latitude, longitude)
    // https://api.opencagedata.com/geocode/v1/json?q=${latitude}+{longitude}&key=YOUR-API-KEY
    //    button.innerText = "Detecting your location...";
    fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=387e08dae35d4fb99bc0b8aba90d39e9`)
    // .then(response => response.json()).then(result => console.log(result))
    .then(response => response.json()).then(result => {
        let allDetails = result.results[0].components;
        let {industrial, city, state_district, state, postcode, country} = allDetails;
        button.innerText = `${industrial},${city}, ${state_district}, ${state}, ${postcode}, ${country}` ;
        console.table(allDetails);
    }).catch(()=>{
        button.innerText = "Something went wrong";
    })
        // .then(response => response.json()).then(response => {
            // let {latitude, longitude} = position.coords;
            // fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=YOUR_API_KEY`)
        //     let allDetails = response.results[0].components;
        //     console.table(allDetails);
        //     let { county, postcode, country } = allDetails;
        //     button.innerText = `${county} ${postcode}, ${country}`;
        // }).catch(() => {
        //     button.innerText = "Something went wrong";
        // });
}

function onError(error) {
    if (error.code == 1) { //if user denied the request
        button.innerText = "You denied the request";
    } else if (error.code == 2) { //if location is not available
        button.innerText = "Location is unavailable";
    } else {  //if any other error occured
        button.innerText = "Something went wrong";
    }
    button.setAttribute("disabled", "true"); //is user denied the request then button will be disabled
}