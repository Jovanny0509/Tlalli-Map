// Mi ubicación de inicio
let miUbicacion = [];
// Ventana de información
let infoWindowContent = [];
// Marcadores
let markers = []; 

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'hybrid'
    };
                    
    // Muestra el mapa en pantalla
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
    
    // Ventana informativa
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Genero la posición en sus correspondientes longitudes y latitudes
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Clic sobre cada marcador para habilitar ventana informativa    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Centrar el mapa
        map.fitBounds(bounds);
    }

    // Zoom del mapa
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(19);
        google.maps.event.removeListener(boundsListener);
    });        
}

// Función para extraer la relación entre rutas y el usuario
function getRelacionUsuarioLugares(){

    let idRuta      = $("#idRuta").attr("value");
    let idUsuario   = $("#idUsuario").attr("value");
    let bandera     = "extraerRelacion";

    $.ajax({
        method: "POST",
        url: "consultarRelacionUsuarioLugar.php",
        data: {"idUsuario":idUsuario, "idRuta":idRuta, "bandera":bandera},
        dataType: "json"
    })
    .done(function(datos) {

        var avanza=0;
        console.log("Relación obtenida");

        $("#explorar").click(function(){

            $("#map_canvas").css("display","block");
            var estado = $("#explorar").attr("data-action");
            console.log(estado);

            // SI APENAS VAMOS A INICIAR EL RECORRIDO
            if(estado == 'inicio'){
                console.log("Primera ubicación");
                console.log(datos[avanza]);

                infoWindowContent = [
                                        ['<div class="info_content">'+datos[avanza]['nombreLugar']+'<br><p>'+datos[avanza]['descripcion']+'</p></div>']
                                    ];
                markers =   [
                                [datos[avanza]['nombreLugar'], datos[avanza]['latitud'], datos[avanza]['longitud']]
                            ];

                var script = document.createElement('script');
                script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
                document.body.appendChild(script);

                // ENVIAR OBJETO Y MARCADOR
                idLugar   = datos[avanza]['idLugar'];
                idUsuario = datos[avanza]['idUsuario'];
                recurso   = datos[avanza]['recurso'];
                marcador  = datos[avanza]['marcador'];
                audio     = datos[avanza]['audio'];
                texto     = datos[avanza]['texto'];

                $(".btn-warning").css("display","block");

                $(".btn-warning").click(function(){
                    window.open('realidadAumentada.php?idUsuario='+idUsuario+'&idLugar='+idLugar+'&recurso='+recurso+'&marcador='+marcador+'&audio='+audio+'&texto='+texto, '_blank');
                });

                $("#explorar").text("Siguiente sitio");
                $("#explorar").attr("data-action","accion");
                $("#items").css("display","block");
                $(".btn-warning").text("Activar cámara");
                avanza = avanza+1;
            }

            //SI ESTAMOS EN UN PUNTO Y VAMOS AL OTRO
            if(estado == 'accion'){
                if(typeof datos[avanza] == 'undefined'){
                    console.log("La ruta terminó");
                    location.replace("main.php");
                }
                console.log(datos[avanza]);
                infoWindowContent = [
                                        ['<div class="info_content">'+datos[avanza]['nombreLugar']+'<br><p>'+datos[avanza]['descripcion']+'</p></div>']
                                    ];
                markers =   [
                                [datos[avanza]['nombreLugar'], datos[avanza]['latitud'], datos[avanza]['longitud']]
                            ];

                console.log(infoWindowContent);
                console.log(markers);

                var script = document.createElement('script');
                script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
                document.body.appendChild(script);

                idLugar   = datos[avanza]['idLugar'];
                idUsuario = datos[avanza]['idUsuario'];
                recurso   = datos[avanza]['recurso'];
                marcador  = datos[avanza]['marcador'];
                audio     = datos[avanza]['audio'];
                texto     = datos[avanza]['texto'];
                
                $("#ar").click(function(){
                    window.open('realidadAumentada.php?idUsuario='+idUsuario+'&idLugar='+idLugar+'&recurso='+recurso+'&marcador='+marcador+'&audio='+audio+'&texto='+texto, '_blank');
                });

                console.log("Avanza al siguiente punto");
                avanza = avanza+1;
            }
        });         
    });
}

getRelacionUsuarioLugares();