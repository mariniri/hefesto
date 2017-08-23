<?php include_once 'GoogleMapAPI.php'; ?>

<div class="alert alert-success" role="alert">
    <strong>Planificación finalizada</strong> 
    Vaya a TAREAS para ver los detalles de la asignación.
</div>
<div id="container">
 <?php
$gmap = new GoogleMapAPI();
$gmap->setDivId('test1');
$gmap->setDirectionDivId('route');

$gmap->setEnableWindowZoom(true);
$gmap->setEnableAutomaticCenterZoom(true);
//$gmap->setDisplayDirectionFields(true);
$gmap->setClusterer(true);
$gmap->setSize('100%', '600px');
$gmap->setZoom(11);
$gmap->setLang('es');
$gmap->setDefaultHideMarker(false);
$colorsIcons = $gmap->getColorsIcon();
$colors = 1;
$cont = 1;

$gmap->addMarkerByCoords($central['latitud'], $central['longitud'], 'Central :' . $central['dirección'], '<strong>' . '</strong>', '', $colorsIcons[0], 0, true, $central['dirección']);
foreach ($jor as $j) {
    foreach ($j->getTareas() as $t) {
        $gmap->addMarkerByCoords($t->getLatitud(), $t->getLongitud(), 'Operario ' . $j->getOperario(), '<strong>Inicio : ' . $t->getHoraInicio() . '<br>Fin : ' . $t->getHoraFin() . '<br>Total Minutos: ' . $t->getTotal() . '</strong>', '', $colorsIcons[$colors], $cont++, true, $j->getOperario());
    }
    $colors++;
}
$gmap->addPolyLines();

$gmap->generate();
echo $gmap->getGoogleMap();
?></div>