<footer><h6>Framework</h6><h7>by Toni</h7><br><h7>edited by Andreu</h7></footer>
<script>
var mapa=new google.maps.Map(document.getElementById('mimapa'),{
center:{
    lat:41.3037026,
    lng: 2.0033665
    },
    zoom:5
});
//añadir marcador
var marker=new google.maps.Marker({
    position:{
        lat:41.3037026,
        lng: 2.0033665
    },
    map:mapa,
    draggable:true
});
//buscar direccion y colocarlo en el mapa
var searchBox=new google.maps.places.SearchBox(document.getElementById('cajabusqueda'));
//colocamos el cambio de evento de la caja
google.maps.event.addListener(searchBox,'places_changed',function(){
    var sitios=searchBox.getPlaces();
    var bordes=new google.maps.LatLngBounds();
    var i, place;
    for(i=0;place=sitios[i];i++){
    bordes.extend(place.geometry.location);
    marker.setPosition(place.geometry.location);    

    }
    
    mapa.fitBounds(bordes);
    mapa.setZoom(20);
    
    })


</script>
</body>
</html>