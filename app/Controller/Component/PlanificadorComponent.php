<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Planificador
 *
 * @author marina
 */
App::uses('Component', 'Controller');
include_once 'OperarioAuxiliar.php';
include_once 'TareaAuxiliar.php';
include_once 'CentralAuxiliar.php';
include_once 'JornadaAuxiliar.php';
include_once 'Distance.php';

class PlanificadorComponent extends Component {

    public $matrix;

    function matrizDistancias($type, $allTareas) {
        $distance = new Distance();
        $this->matrix = ($type == "time") ? $distance->getTimeMatrix($allTareas) : $distance->getDistMatrix($allTareas);
    }

    function calcularDistanciaCentral($tareas, $central) {
        //calcularse con google maps

        for ($i = 0; $i < count($tareas); $i++) {
            $tareas[$i]->setDistanciaCentral($tareas[$i]->distancia($central, "K"));
        }
    }

    function sumarHora($hora, $minutos) {
        //// echo "hora inicio " . $hora . "  minutos " . $minutos . "<br>";
        $fecha = strtotime($hora) + ($minutos * 60);
        // echo "fecha ".  date('r', $fecha)."<br>";
        return date('r', $fecha);
    }

    function distanciaEntreDos($tarea1, $tarea2) {
        $id1 = $tarea1->getId();
        $id2 = $tarea2->getId();
        $dist = $this->matrix["$id1"]["$id2"];
        return $dist;
    }

    function distanciaEntreDosById($lat1, $lat2, $long1, $long2) {
        $distance = new Distance();
        $dist = $distance->betweenLatLong($lat1, $lat2, $long1, $long2, 'time');
        return $dist;
    }

   function distribuirTareas($tareasaux, $jornadasaux, $centralaux) {
        $tareas = $this->convertirTareas($tareasaux);
        $jornadas = $this->convertirJornadas($jornadasaux);
        $central = $this->convertirCentral($centralaux);

        $this->calcularDistanciaCentral($tareas, $central);
        usort($tareas, array("TareaAuxiliar", "compareDistancias"));
        $this->matrizDistancias("time", $tareas);

        $pendientes = array();
        $totaltareas = $tareas;
        $numtareas = count($totaltareas);
        $numjornadas = count($jornadas);
        $auxjornada = 0;
        $auxtarea = 0;
        while ($auxtarea < $numtareas && $auxjornada < $numjornadas) {
            $indices = array_keys($totaltareas);
            $nummenos = $numtareas - 1;
            $dist = 0;
            $jor = $jornadas[$auxjornada];
            $auxnum = $jor->numTareas();
            $current = $totaltareas[$indices[$auxtarea]];
            if ($auxnum > 0) {
                $last = $jor->getLast();
                $dist = $this->distanciaEntreDos($current, $last);
                $total = $dist + $current->getTotal();
                $lastfin = $last->getHoraFin();
            } else {
                $dist = $current->getDistanciaCentralDos($central);
                $total = $dist + $current->getTotal();
                $lastfin = $jor->getHoraInicio();
            }
            if ($jor->getMinutosLibres() >= $total) {
                $horainicio = $this->sumarHora($lastfin, $dist);
                $horafin = $this->sumarHora($horainicio, $current->getTotal());
                $current->setHoraInicio($horainicio);
                $current->setHoraFin($horafin);
                $indices = array_keys($totaltareas);
                $jor->addTarea($current, $total);
                unset($totaltareas[$indices[$auxtarea]]);
                $auxtarea++;
            } else {
                array_push($pendientes, $current);
                $auxtarea++;
            }

            


            $numtareas = count($totaltareas);
            if ($auxtarea == $numtareas) {
                $auxjornada++;
                $auxtarea = 0;
            }
        }

        //devuelve las que no se han podido asignar
        return array($jornadas, $pendientes);
    }

    public function convertirTareas($tareas) {
        $listaTareas = array();
        foreach ($tareas as $t) {
            array_push($listaTareas, new TareaAuxiliar($t['Tarea']['fecha'], $t['Tarea']['total'], $t['Tarea']['latitud'], $t['Tarea']['longitud'], $t['Tarea']['id']));
        }
        return $listaTareas;
    }

    public function convertirJornadas($jornadas) {
        $listaJornadas = array();
        foreach ($jornadas as $t) {
            array_push($listaJornadas, new JornadaAuxiliar($t['Jornada']['horaInicio'], $t['Jornada']['horafin'], $t['Jornada']['id'], $t['Jornada']['user_id']));
        }
        return $listaJornadas;
    }

    public function convertirCentral($central) {
        $centralaux = new CentralAuxiliar($central['latitud'], $central['longitud'], $central['dirección']);
        return $centralaux;
    }

}
