const addressInput = document.getElementById('site-address');
const suggestionsContainer = document.getElementById('site-suggestions');

addressInput.addEventListener('input', function () {
  const query = addressInput.value;
  if (query.length > 2) {
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}`)
      .then(response => response.json())
      .then(data => {
        suggestionsContainer.innerHTML = '';
        data.forEach(place => {
          const suggestion = document.createElement('div');
          suggestion.className = 'site-suggestion';
          suggestion.textContent = place.display_name;
          suggestion.addEventListener('click', function () {
            addressInput.value = place.display_name;
            suggestionsContainer.innerHTML = '';
          });
          suggestionsContainer.appendChild(suggestion);
        });
      });
  } else {
    suggestionsContainer.innerHTML = '';
  }
});

document.getElementById('addressForm').addEventListener('submit', function (event) {
  event.preventDefault();
  const address = addressInput.value;
  const osmUrl = `https://www.openstreetmap.org/search?query=${encodeURIComponent(address)}`;
  window.open(osmUrl, '_blank');
});