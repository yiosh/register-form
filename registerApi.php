<?php

header("Access-Control-Allow-Origin: *");

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('NOSSL', 1);

include('../fl_core/core.php'); // Variabili Modulo

// $fileExistsFlag = 0;
//   $link = mysqli_connect("localhost","root","","register_form") or die("Error ".mysqli_error($link));

  $nome = $_POST['nome'];
  $cognome = $_POST['cognome'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $codice_fiscale = $_POST['codice_fiscale'];
  $data_di_nascita = $_POST['data_di_nascita'];
  $nome_aziendale = $_POST['nome_aziendale'];
  $partita_iva = $_POST['partita_iva'];
  $codice_fiscale_aziendale = $_POST['codice_fiscale_aziendale'];
  $telefono_aziendale = $_POST['telefono_aziendale'];
  $sito_web = $_POST['sito_web'];
  $regione_sede = $_POST['regione_sede'];
  $provincia_sede = $_POST['provincia_sede'];
  $comune_sede = $_POST['comune_sede'];
  $indirizzo_sede_legale = $_POST['indirizzo_sede_legale'];
  $numero_civico = $_POST['numero_civico'];
  $cap_sede = $_POST['cap_sede'];
  $ricezione_fatture = $_POST['ricezione_fatture'];
  $pec_destinatario = isset($_POST['pec_destinatario']) ? $_POST['pec_destinatario'] : "";
  $codice_destinatario = isset($_POST['codice_destinatario']) ? $_POST['codice_destinatario'] : "";

  $query = "INSERT INTO `fl_anagrafica` (`nome`, `cognome`, `telefono`, `codice_fiscale`, `partita_iva`, `regione_sede`, `provincia_sede`, `comune_sede`, `indirizzo_sede_legale`, `cap_sede`, `sito_web`) VALUES ('$nome', '$cognome', '$telefono', '$codice_fiscale', '$partita_iva', '$regione_sede', '$provincia_sede', '$comune_sede', '$indirizzo_sede_legale', '$cap_sede', '$sito_web');";
  // $link->query($query) or die("Error : ".mysqli_error($link));
  if (mysql_query($query, CONNECT)) {

  } else {
    echo "Error: " . mysql_error();
  }
  // mysqli_query($link, $query);
  // $idRecord = mysql_insert_id($link);
  // // $idRecord = mysql_insert_id(CONNECT);

  //   if($fileExistsFlag == 0) {
  //     $target = "upload/";
  //     $fileName = $_FILES['file0']['name'];
  //     $fileTarget = $target.$fileName;
  //     $tempFileName = $_FILES['file0']['tmp_name'];
  //     $result = move_uploaded_file($tempFileName,$fileTarget);

  //     /*
  //     *	If file was successfully uploaded in the destination folder
  //     */

  //     if($result) {
  //       echo "result".$result;
  //       echo "Your file ".$fileName." has been successfully uploaded";
  //       $query = "INSERT INTO fl_files(filepath,filename,client_id, created_at, updated_at) VALUES ('$fileTarget','$fileName','$idRecord', NOW(), NOW())";

  //       // if (mysql_query($query, CONNECT)) {

  //       // } else {
  //       //   echo "Error: " . mysql_error();
  //       // }

  //       $link->query($query) or die("Error : ".mysqli_error($link));
  //     }
  //     else {
  //       echo "Sorry !!! There was an error in uploading your file";
  //     }
  //   }

  //   /*
  //   * If file is already present in the destination folder
  //   */

  //   else {
  //     echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
  //     mysql_close($link);
  //   }
  mysql_close(CONNECT);
?>