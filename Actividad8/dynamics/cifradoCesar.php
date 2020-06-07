<?php

if (isset($_POST['texto'])&&$_POST['texto']!="") {
  $texto= strtoupper($_POST['texto']);
  if (preg_match('/[á,é,í,ó,ú,ñ,Ñ]/',$texto)) {
    echo "Ingreso un caracter invalidado <br> Favor de no usar acentos ni ñ<br>";
      echo "<a href='../template/textoCifrar.html'>Regresar</a>";
  }
  else {
    $ABC=["A","B","C", "D","E", "F","G","H","I","J", "K", "L", "M", "N","O","P","Q","R","S","T","U","W","X","Y","Z"];

    $ABCesar=["X","Y","Z","A","B","C", "D","E","F","G","H","I", "J", "K", "L", "M", "N","O","P", "Q","R","S","T","U","V","W"];

    $cifrado = str_replace($ABC,$ABCesar,$texto);
    //Replaza cada elemento del arreglo ABC por un de ABCesar en el texto ingresado
    echo "El texto original es: ".$texto."<br>";
    echo "<br>El texto cifrado es: ".$cifrado;
  }
}
else {
  echo "Favor de llenar el campo <br>";
  echo "<a href='../template/textoCifrar.html'>Regresar</a>";
}
?>
