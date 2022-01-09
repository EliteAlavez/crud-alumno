<?php  
include("conexion.php");
$con=conectar();

$sql="SELECT *  FROM alumno";
$query=mysqli_query($con,$sql);


$res = $query; 
//var_dump($res);
$xml = new XMLWriter();
$xml->openUri("php://output");
$xml->startDocument();
$xml->setIndent(true);
$xml->startElement('alumno');

forEach($res as $alumno) {
  $xml->startElement('alumnos');
    $xml->startElement('cod_estudiante');
    $xml->writeRaw($alumno['cod_estudiante']);
    $xml->endElement();
    $xml->startElement('dni');
    $xml->writeRaw($alumno['dni']);
    $xml->endElement();
    $xml->startElement('nombres');
    $xml->writeRaw($alumno['nombres']);
    $xml->endElement();
    $xml->startElement('apellidos');
    $xml->writeRaw($alumno['apellidos']);
    $xml->endElement();
  $xml->endElement();
}
$xml->endElement();
header('Content-type: text/xml');
$xml->flush();