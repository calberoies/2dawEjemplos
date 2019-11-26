<?php
// TEST DE LA CLASE AGENDA

// ESTE FICHERO NO SE HA DE MODIFICAR!!!! Se encarga de probar la clase agenda

require 'Agenda.class.php';

echo '<h2>Test de la clase Agenda</h2>';
//Define el horario posible de las citas
Agenda::sethorario(['11:00','11:45','12:30','13:15']);

try {
	$agenda=new Agenda(2019,14); //Intenta crear Agenda del mes 14 de 2019
	echo "<li>ERROR en el control de mes de la agenda";
} catch (Exception $e) {
	echo "<li>Funciona el control del mes de la agenda";
}

$agenda=new Agenda(2019,11); //Agenda del mes de noviembre de 2019

//Añade una cita el día 12 a las 11. Devuelve la Cita
$cita=$agenda->anadecita(12,'11:00','Manuela García');

if($cita==1)
	echo "<li>Cita creada: Manuela García";
else {
	echo "<li>ERROR al crear cita";
}
$cita=$agenda->anadecita(26,'11:00','Manuela García');

//Si se fija horario de 11:00 a 13:15, esto debe dar error
$cita2=$agenda->anadecita(12,'08:00','Pepe Pérez');
if($cita2==-1)
	echo "<li>Control de horario de citas correcto!";
else {
	echo "<li>ERROR en control de horario de citas";
}
$cita3=$agenda->anadecita(16,'08:00','Pepe Pérez');

//Intenta cita repetida. Devuelve error
$cita3=$agenda->anadecita(12,'11:00','Andrés');
if($cita3==-2)
   echo "<li>Control de citas repetidas correcto";
else {
	echo "<li>ERROR en control de citas repetidas";
}

$paciente='Manuela García';
echo "<h3>Citas de $paciente:</h3>";
foreach($agenda->getcitaspaciente($paciente) as $cita){
	echo "<li>".$cita;
}
echo "<h3>Borrado de citas</h3>";
$borradas=$agenda->borracitaspaciente($paciente);
if($borradas==2)
	echo "<li>Borrado correcto!";
else 
	echo "<li>ERROR en borrado de citas!";
 ?>
