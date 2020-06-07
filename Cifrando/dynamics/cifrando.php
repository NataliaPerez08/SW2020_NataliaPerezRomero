<?php
$coso= bin2hex(random_bytes(10));
define("HASH","sha256");
define("METHOD","aes-128-cbc");
define("PASSWORD",$coso);

if (isset($_POST['text']) && $_POST['text']!="" && (isset($_POST['envio']))) {
  echo "<br>Su llave es: ".PASSWORD;
  $text= $_POST['text'];

  $key = openssl_digest(PASSWORD,HASH);
  $iv_len= openssl_cipher_iv_length(METHOD);
  $iv = openssl_random_pseudo_bytes($iv_len);

  $texto= openssl_encrypt(
    $text,
    METHOD,
    $key,
    OPENSSL_RAW_DATA,
    $iv
  );
  $ciffWIv = base64_encode($iv.$texto);
  echo "<br>Cifrado:  ".$ciffWIv;
  echo "<br><a href='../template/formuCifrar.html'>Regresar</a>";
}

if (isset($_POST['cifradoTxt']) && $_POST['cifradoTxt']!="" && (isset($_POST['llave']) && $_POST['llave'])&&(isset($_POST['submit']))) {
  echo "Se envio para descifrado";

  $cifradoTxt = $_POST['cifradoTxt'];
  $llave = $_POST['llave'];

  $cifradoTxt= base64_decode($cifradoTxt);

  $iv_len = openssl_cipher_iv_length(METHOD);
  $iv = substr($cifradoTxt,0,$iv_len);
  $cifrado = substr($cifradoTxt,$iv_len);

  $key= openssl_digest($llave,HASH);

  $desciff= openssl_decrypt(
    $cifrado,
    METHOD,
    $key,
    OPENSSL_RAW_DATA,
    $iv
  );

  echo "<br>Mensaje descifrado:  ".$desciff;
  echo "<br><a href='../template/formuCifrar.html'>Regresar</a>";
}

if (isset($_POST['cifrar'])){
echo "
  <form action='../dynamics/cifrando.php' method='POST'>
    <textarea name='text' rows='8' cols='80'></textarea>
    <br>
    <input type='submit' name='envio'>
  </form>";
}

if (isset($_POST['descifrar'])) {
  echo "
    <form action='../dynamics/cifrando.php' method='POST'>
      <textarea name='cifradoTxt' rows='8' cols='80'></textarea>
      <br><br>
      Ingrese la llave: <input type='text' name='llave'>
      <br>
      <input type='submit' name='submit'>
    </form>";
}

 ?>
