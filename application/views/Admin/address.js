var config = {
    curl : 'https://api.countrystatecity.in/v1/countries',
    ckey : 'V1ZGQ3JPVUVmeGJEcm1ZMllQN3JlWXZ0Tm10N2F1NFVLdjlrNkdCQw=='
}

var countrySelect = document.querySelector('.country'),
 stateSelect = document.querySelector('.state'),
 citySelect = document.querySelector('.city')

 function loadCountries() {
    let apiEndpoint = config.curl
    fetch(apiEndpoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        console.log(data);

        data.forEach(country => {
            const option = document.createElement('option')
            option.value = country.name
            option.textContent = country.name
            countrySelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))

    stateSelect.disabled = true
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'none'
    citySelect.style.pointerEvents = 'none'
}

function loadStates() {
    stateSelect.disabled = false
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'auto'
    citySelect.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value
    console.log(selectedCountryCode)
    stateSelect.innerHTML = '<option value="">Select State</option>'

    fetch(${config.curl}/${selectedCountryCode}/states, {
        headers: { "X-CSCAPI-KEY": config.ckey }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data)
        data.forEach(state => {
            const option = document.createElement('option')
            option.value = state.name
            option.textContent = state.name
            stateSelect.appendChild(option) 
        })
    })
    .catch(error => console.error('Error loading States:', error))
}


function loadCities(){

    citySelect.disabled = false
    citySelect.style.pointerEvents = 'auto'

    const selectedCountryCode = countrySelect.value
    const selectedStateCode = stateSelect.value

    console.log(selectedCountryCode, selectedStateCode);
    citySelect.innerHTML = '<option value="">Select City</option>'//for clearing the exixting Cities

    fetch(${config.curl}/${selectedCountryCode}/states/${selectedStateCode}/cities, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        console.log(data);

        data.forEach(city => {
            const option = document.createElement('option')
            option.value = city.name
            option.textContent = city.name
            citySelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading Cities:', error))

}

window.onload = loadCountries