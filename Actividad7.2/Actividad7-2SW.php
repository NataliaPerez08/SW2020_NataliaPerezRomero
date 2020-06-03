<!DOCTYPE html>
<html lang="spa" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contraseña Segura</title>
  </head>
  <body>
    <h1>Una contraseña Segura...</h1>
      <ul>
         <li>No se comparte con otras personas.</li>
         <li>Es única para cada cuenta, no uses la misma
           contraseña en todos los sitios que visites o uses.</li>
         <li>Usa combinaciones de caracteres especiales,
           números, y letras.</li>
         <li>Contiene más de 10 caracteres.</li>
         <li>No contiene datos personales como nombres
             propios o de mascotas.</li>
         <li>Usa palabras aleatorias que juntas no
          tengan un significado pero que para
          usted lo tengan.</li>
        </ul>
    <form action="Actividad7-2SW.php" method="post">
        <label>Ingrese su contraseña</label>
        <br><br><input type="password" name="contraseña"
        title="La contraseña debe tener al menos 10 caracteres, al menos un dígito, al menos una minúscula,
                   al menos una mayúscula y al menos un caracter no alfanumérico."
        pattern="^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$">
        <br><br><input type="submit"name="enviar"/>
    </form>
  </body>
</html>
<?php
if (isset($_POST['contraseña'])&& $_POST['contraseña']!="") {
  $contraseña=$_POST['contraseña'];
    if (preg_match('/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/',$contraseña)){
      echo "Su contraseña es segura";
    }
    else {
      echo "Su contraseña: ".$contraseña."  es insegura";
        }
}
else {
  echo "Rellena el campo";
}
 ?>
