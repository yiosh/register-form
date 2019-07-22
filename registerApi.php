<?php

// header("Access-Control-Allow-Origin: *");

// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// define('NOSSL', 1);

// include('../fl_core/core.php'); // Variabili Modulo

$fileExistsFlag = 0;
  $link = mysqli_connect("localhost","root","","register_form") or die("Error ".mysqli_error($link));

  $name = base64_encode($_POST['name']);
  $lastname = base64_encode($_POST['lastname']);
  $email = base64_encode($_POST['email']);
  $phone = base64_encode($_POST['phone']);
  $codiceFiscale = base64_encode($_POST['codiceFiscale']);
  $birthdate = $_POST['birthdate'];
  $companyName = $_POST['companyName'];
  $piva = $_POST['piva'];
  $companyCodiceFiscale = $_POST['companyCodiceFiscale'];
  $state = $_POST['state'];
  $region = $_POST['region'];
  $province = $_POST['province'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $numeroCivico = $_POST['numeroCivico'];
  $cap = $_POST['cap'];
  // $phone = $_POST['phone'];
  $website = $_POST['website'];
  $pec = $_POST['pec'];
  $planSelected = $_POST['planSelected'];
  $whereTo = $_POST['whereTo'];
  $infoPay = $_POST['infoPay'];

  $query = "INSERT INTO `fl_anagrafica` (`nome`, `cognome`, `telefono`, `codice_fiscale`, `partita_iva`, `regione_sede`, `provincia_sede`, `comune_sede`, `indirizzo_sede_legale`, `cap_sede`, `sito_web`) VALUES ('$name', '$lastname', '$phone', '$codiceFiscale', '$piva', '$region', '$province', '$city', '$address', '$cap', '$website');";
  $link->query($query) or die("Error : ".mysqli_error($link));
  // if (mysql_query($query, CONNECT)) {

  // } else {
  //   echo "Error: " . mysql_error();
  // }
  // mysqli_query($link, $query);
  $idRecord = mysql_insert_id($link);
  // $idRecord = mysql_insert_id(CONNECT);

    if($fileExistsFlag == 0) {
      $target = "upload/";
      $fileName = $_FILES['file0']['name'];
      $fileTarget = $target.$fileName;
      $tempFileName = $_FILES['file0']['tmp_name'];
      $result = move_uploaded_file($tempFileName,$fileTarget);

      /*
      *	If file was successfully uploaded in the destination folder
      */

      if($result) {
        echo "result".$result;
        echo "Your file ".$fileName." has been successfully uploaded";
        $query = "INSERT INTO fl_files(filepath,filename,client_id, created_at, updated_at) VALUES ('$fileTarget','$fileName','$idRecord', NOW(), NOW())";

        // if (mysql_query($query, CONNECT)) {

        // } else {
        //   echo "Error: " . mysql_error();
        // }

        $link->query($query) or die("Error : ".mysqli_error($link));
      }
      else {
        echo "Sorry !!! There was an error in uploading your file";
      }
    }

    /*
    * If file is already present in the destination folder
    */

    else {
      echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
      mysql_close($link);
    }
  mysql_close(CONNECT);
?>