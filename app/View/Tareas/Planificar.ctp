<div class="alert alert-success" role="alert">
    <strong>Planificación finalizada</strong> 
    Vaya a TAREAS para ver los detalles de la asignación.
</div><?php

//include_once 'GoogleMapAPIv3.class.php';
//include_once '../Controller/Component/CentralAauxiliar.php';
//include_once '../Controller/Component/JornadaAauxiliar.php';
//include_once '../Controller/Component/TareaAauxiliar.php';
//$gmap = new GoogleMapAPI();
//$gmap->setDivId('test1');
//$gmap->setDirectionDivId('route');
//$gmap->setCenter($central->getDireccion());
//$gmap->setCenterName($central->getDireccion());
//
//$gmap->setEnableWindowZoom(true);
//$gmap->setEnableAutomaticCenterZoom(true);
////$gmap->setDisplayDirectionFields(true);
//$gmap->setClusterer(true);
//$gmap->setSize('100%', '600px');
//$gmap->setZoom(11);
//$gmap->setLang('es');
//$gmap->setDefaultHideMarker(false);
//// $gmap->addDirection('nantes','paris');
//
//$colorsIcons = $gmap->getColorsIcon();
//$colors = 1;
//$cont = 1;
//foreach ($jornadas as $j) {
//    foreach ($j->getTareas() as $t) {
//
//        $gmap->addMarkerByCoords($t->getLatitud(), $t->getLongitud(), 'Operario ' . $nombre, '<strong>Operario : ' . $nombre . '<br>Inicio : ' . $t->getHoraInicio() . '<br>Fin : ' . $t->getHoraFin() . '<br>Total Minutos: ' . ($t->getTotal() / 60) . '</strong>', '', $colorsIcons[$colors], $cont++, true, $nombre);
//    }
//    $colors++;
//}
//$gmap->addPolyLines();
//$gmap->generate();
//echo $gmap->getGoogleMap();
