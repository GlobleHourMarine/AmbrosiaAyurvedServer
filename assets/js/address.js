document.addEventListener("DOMContentLoaded", function () {
  const countrySelect = document.getElementById("country");
  const stateSelect = document.getElementById("state");
  const citySelect = document.getElementById("city");

  // Load all countries
  fetch("https://countriesnow.space/api/v0.1/countries/positions")
    .then(res => res.json())
    .then(data => {
      data.data.forEach(c => {
        let opt = document.createElement("option");
        opt.value = c.name; // Full country name
        opt.text = c.name;
        countrySelect.appendChild(opt);
      });
    });

  // Load states based on selected country
  countrySelect.addEventListener("change", () => {
    stateSelect.innerHTML = "<option>Loading...</option>";
    citySelect.innerHTML = "<option>Select State First</option>";

    fetch("https://countriesnow.space/api/v0.1/countries/states", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ country: countrySelect.value })
    })
      .then(res => res.json())
      .then(data => {
        stateSelect.innerHTML = "<option value=''>Select State</option>";
        data.data.states.forEach(s => {
          let opt = document.createElement("option");
          opt.value = s.name; // Full state name
          opt.text = s.name;
          stateSelect.appendChild(opt);
        });
      });
  });

  // Load cities based on selected state
  stateSelect.addEventListener("change", () => {
    citySelect.innerHTML = "<option>Loading...</option>";

    fetch("https://countriesnow.space/api/v0.1/countries/state/cities", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        country: countrySelect.value,
        state: stateSelect.value
      })
    })
      .then(res => res.json())
      .then(data => {
        citySelect.innerHTML = "<option value=''>Select City</option>";
        data.data.forEach(city => {
          let opt = document.createElement("option");
          opt.value = city;
          opt.text = city;
          citySelect.appendChild(opt);
        });
      });
  });

  // Handle form submission
  document.getElementById("userinformation").addEventListener("submit", (e) => {
    e.preventDefault();
    const country = countrySelect.value;
    const state = stateSelect.value;
    const city = citySelect.value;

    if (!country || !state || !city) {
      alert("Please select all fields.");
      return;
    }

    // You can send data via AJAX or just log it
    console.log({ country, state, city });
  });
});