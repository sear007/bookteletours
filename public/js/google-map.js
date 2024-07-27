function initMap() {
    const title = localStorage.getItem('show_title');
    const lng = localStorage.getItem('show_long');
    const lat = localStorage.getItem('show_lat');
    const position = { lat: parseFloat(lat), lng: parseFloat(lng)};
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: position,
    });
    new google.maps.Marker({
        position, 
        map, 
        title,
        label: title
    });
  }
  
window.initMap = initMap;