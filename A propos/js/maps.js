var mymap = L.map("mapid").setView([36.8065, 10.1815], 6);

// add the tile layer (OpenStreetMap)
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution:
    'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
  maxZoom: 18,
}).addTo(mymap);

// add a marker to the map
L.marker([36.8065, 10.1815]).addTo(mymap).bindPopup("Tunis").openPopup();
L.marker([36.809678344364656, 10.086243168709808])
  .addTo(mymap)
  .bindPopup("manouba")
  .openPopup();

L.marker([36.86801248986982, 10.165548321984836])
  .addTo(mymap)
  .bindPopup("Ariana")
  .openPopup();

L.marker([35.76443564118274, 10.81043900291596])
  .addTo(mymap)
  .bindPopup("Monastir")
  .openPopup();

L.marker([34.743321195658545, 10.76433850275011])
  .addTo(mymap)
  .bindPopup("Sfax")
  .openPopup();

L.marker([33.70723364749197, 8.970936313297807])
  .addTo(mymap)
  .bindPopup("Kebili")
  .openPopup();

L.marker([33.889135312536006, 10.09673577973382])
  .addTo(mymap)
  .bindPopup("Gabes")
  .openPopup();
