<?php

if (isset($_POST['nombre'])&& $_POST['nombre']!="" && (isset($_POST['apaterno'])&& $_POST['apaterno']!="")
&& (isset($_POST['amaterno']) && $_POST['amaterno']!="") && (isset($_POST['nacimiento'])&& $_POST['nacimiento']!="")
&& (isset($_POST['rfc']) && $_POST['rfc']!="") && (isset($_POST['contraseña'])&& $_POST['contraseña']!=""))
{
  $nombre=$_POST['nombre'];
  $apaterno=$_POST['apaterno'];
  $amaterno=$_POST['amaterno'];
  $nacimiento=$_POST['nacimiento'];
  $colegio=$_POST['colegio'];
  $rfc = $_POST['rfc'];
  $contraseña = $_POST['contraseña'];


  if (preg_match('/(([A-Z][a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñ ]{2,20}){2})|([A-Z][a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñ]{2,20})/',$nombre)){
    echo "<br>Nombre valido";
  }
  else {
    echo "<br>Dato invalido: ".$nombre;
  }

  if (preg_match('/(([A-Z][a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñ ]{2,20}){2})|([A-Z][a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñ]{2,20})/',$apaterno)){
    echo "<br>Apellido Paterno valido";
  }
  else {
    echo "<br>Dato invalido: ".$apaterno;
  }

  if (preg_match('/(([A-Z][a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñ ]{2,20}){2})|([A-Z][a-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñ]{2,20})/',$amaterno)){
    echo "<br>Apellido Materno valido";
  }
  else {
    echo "<br>Dato invalido:".$amaterno;
  }

    //La contraseña cubre lo requerido
    if (preg_match('/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/',$contraseña)){
      echo "<br>Contraseña valida";
        }
    else {
          echo "<br>La contraseña no es valida".$contraseña;
        }


  //------Verifica que el rfc sea correcto-----

  $r0=substr("$rfc",0, -3);
  $r1=substr("$apaterno", 0, 2);
  $r2=substr("$amaterno", 0, 1);
  $r3=substr("$nombre", 0, 1);
  $r4=substr("$nacimiento", 2, 2);
  $r5=substr("$nacimiento", 5, 2);
  $r6=substr("$nacimiento", 8,2);

  $posible = $r1.$r2.$r3.$r4.$r5.$r6;

  $ingresado = strtoupper($r0);
  $obtenido = strtoupper($posible);
  //Convierte la cadena enviada y la generada en mayusculas

  if (strpos($ingresado,$obtenido)!== false){
    echo "<br>El RFC es correcto";
  }
  else {
    echo "<br>Dato invalido: ".$ingresado;
  }
}
else {
  echo "<br>Por favor complete los campos";
echo "<a href='../template/datos.html'>Regresar</a>";
}

 ?>
