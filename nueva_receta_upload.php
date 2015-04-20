<?php 

  //Start session
  session_start();

  include('database.php');

  // Get data from the database depending on the value of the id in the URL
  $user_id = $_SESSION['sess_user_id'];
  $user_email = $_SESSION['sess_username'];

  $plato_nombre  = nl2br($_POST['plato_nombre']);
  $plato_receta  = nl2br($_POST['plato_receta']);
  $plato_tipo  = nl2br($_POST['plato_tipo']);
  $plato_tipo2  = nl2br($_POST['plato_tipo2']);

  // Si ha guardado una foto de un producto, subela al server y guarda el path en la db

  if ($_FILES['form_data']['name']!="") {
  $name = $_FILES['form_data']['name'];
  $target = "images/";  
  $target = $target . basename( $_FILES['form_data']['name']);
      //Writes the photo to the server  
  move_uploaded_file($_FILES['form_data']['tmp_name'], $target);   

  $result2 = "INSERT INTO `recetas` 
  (`id`, `nombre`,`foto`,`tipo`,`tipo2`,`receta`) 
  VALUES
  (NULL,'$plato_nombre','$name','$plato_tipo','$plato_tipo2','$plato_receta')";

  // // Get id from recipe just stored 
  // $strSQL = "SELECT * FROM `comidas` WHERE `comida`= $plato_nombre";
  // $rs = mysql_query($strSQL);

  // $json_response = array();

  // while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
  //   $row_array['id'] = $row['id']; 
  //   $row_array['comida'] = $row['comida'];
  //   $row_array['foto'] = $row['foto']; 
  //   $row_array['receta'] = $row['receta']; 
  // }

  if(mysql_query($result2)){ 
    $_SESSION['datos_guardados'] = "Bien! La receta se ha guardado con éxito! :)";
    $last_id = mysql_insert_id($conn);
    header('Location: receta.php?id='.$last_id);
    } else { 
    $_SESSION['Error_foto_no_guardada'] = "Upps, se ha producido un error y la receta no se ha guardado. Lo sentimos! :( </br> Por favor, inténtalo de nuevo, o envíanos un email a info@profesionalista.com con el problema.</br> Asegúrate que la foto Sube una foto tiene un formato .jpg o .png, y  un tamaño máximo de 1000KB";
    header('Location: nueva_receta.php');
    } 
  } 


?>
