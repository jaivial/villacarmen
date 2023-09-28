<?php
mysqli_report(MYSQLI_REPORT_ERROR);
$servidor="localhost";
$usuario="VILLACARMEN";
$clave="Jaivial_5171";

@$mysqli = new mysqli($servidor,$usuario,$clave);
if ($mysqli->connect_errno)
{
  echo "Fallo conexión a Mysql: ".$mysqli->connect_errno." ".$mysqli->connect_error;
}
else 

$basedatos="u212050690_VILLACARMEN";
$mysqli->select_db($basedatos);

$consulta="CREATE TABLE IF NOT EXISTS FINDE (NUM INT NOT NULL PRIMARY KEY AUTO_INCREMENT, DESCRIPCION VARCHAR(900) NOT NULL, TIPO VARCHAR(100) NOT NULL);";
if (!$resultado=$mysqli->query($consulta))
{
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  echo "Num.error: ".$mysqli->errno."<br>";
  echo "Error: ".$mysqli->error."<br>";
  exit;
}



$mysqli->select_db($basedatos);

$consulta="CREATE TABLE IF NOT EXISTS DIA (NUM INT NOT NULL PRIMARY KEY AUTO_INCREMENT, DESCRIPCION VARCHAR(900) NOT NULL, TIPO VARCHAR(100) NOT NULL);";
if (!$resultado=$mysqli->query($consulta))
{
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  echo "Num.error: ".$mysqli->errno."<br>";
  echo "Error: ".$mysqli->error."<br>";
  exit;
}

$mysqli->select_db($basedatos);

$consulta="CREATE TABLE IF NOT EXISTS POSTRES (NUM INT NOT NULL PRIMARY KEY AUTO_INCREMENT, DESCRIPCION VARCHAR(900) NOT NULL);";
if (!$resultado=$mysqli->query($consulta))
{
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  echo "Num.error: ".$mysqli->errno."<br>";
  echo "Error: ".$mysqli->error."<br>";
  exit;
}


?>