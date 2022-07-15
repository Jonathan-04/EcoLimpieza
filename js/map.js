//Script para utilizar el Mapa Opensource de Leaflet | https://leafletjs.com

//Ubicación de Bogotá
let map = L.map('map').setView([4.610, -74.082], 12);

//URL del mapa
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

let popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng) // Sets the geographical point where the popup will open.
        //.setContent("Has hecho click en la coordenada:<br> " +  e.latlng.lat.toString() + "," +  e.latlng.lng.toString()) // Sets the HTML content of the popup.
        //.setContent("Ubicación Seleccionada")
        //.openOn(map); // Adds the popup to the map and closes the previous one. 

    let lat = e.latlng.lat.toString();
    let lng = e.latlng.lng.toString();

 let latInput = document.getElementById('lat')
 latInput.value = lat

 let lngInput = document.getElementById('lng')
 lngInput.value = lng

}


map.on('click', onMapClick);


/*
var marker = L.marker([3.375518, -76.548184]).addTo(map);
marker.bindPopup("<b>Solicitud</b><br>Casa").OpenPopup();
*/
