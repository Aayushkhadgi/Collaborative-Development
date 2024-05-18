document.addEventListener('DOMContentLoaded', () => {
    const selectDrop = document.getElementById('countries');

    fetch('https://restcountries.com/v3.1/all')
      .then(response => response.json())
      .then(data => {
        data.forEach(country => {
          const option = document.createElement('option');
          option.text = country.name.common;
          option.value = country.name.common;
          selectDrop.add(option);
        });
      })
      .catch(error => {
        console.error('Error fetching countries:', error);
      });
});