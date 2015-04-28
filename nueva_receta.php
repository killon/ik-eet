<?php
// Start the session
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profesionalista: Encuentra el profesional que necesitas</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="../css/main.css" rel="stylesheet">


  <!-- MetisMenu CSS -->
  <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

  <div id="wrapper">

      <div id="page-wrapper">
        <form action="nueva_receta_upload.php" method="post" enctype="multipart/form-data">
          <div class="row">

              <div class="col-lg-12">
                <h2 class="page-header">Introduce una nueva receta</h2>
              </div>

              <h3 id="mensaje_datos_guardados">
                <?php
                  if(!empty($_SESSION['Error_foto_no_guardada'])) { echo $_SESSION['Error_foto_no_guardada'];
                    } else { echo $_SESSION['datos_guardados'];}
                  
                $_SESSION['Error_foto_no_guardada'] = false;
                $_SESSION['datos_guardados'] = false;
                ?>
              </h3>

              <div class="col-md-8" style="background-color: #e7e7e7;">

                <div class="form-group">
                    <label class="sr-only" for="MAX_FILE_SIZE">file size</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" placeholder="file size" value="<?php echo $row_array['filename'];?>" />
                </div>                                        

                <div class="form-group">
                  <label class="sr-only" for="form_data">file</label>
                  <input data-badge="false" class="filestyle" type="file" name="form_data" id="form_data" size="40" placeholder="file" />
                  (Para evitar problemas, asegúrate que las fotos tengan un formato .jpg o .png, y un tamaño máximo de 1000KB)
                </div>

                <div class="form-group">
                    <label class="sr-only" for="plato_nombre"></label>
                    <textarea type="text" class="form-control" name="plato_nombre" placeholder="Nombre del plato" /></textarea>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="plato_tipo"></label>
                    <select class="form-control" name="plato_tipo" placeholder="Tipo de plato" /></textarea>
                      <option value="">Elige una opción</option>     
                      <option value="Pasta">Pasta</option>
                      <option value="Meat">Meat</option>
                      <option value="Vegetable">Vegetable</option>
                      <option value="Soup">Soup</option>
                      <option value="Dessert">Dessert</option>
                      <option value="Salad">Salad</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="plato_tipo_2"></label>
                    <select class="form-control" name="plato_tipo_2" placeholder="Tipo de plato 2" /></textarea>
                      <option value="">Elige una opción</option>     
                      <option value="Pasta">Pasta</option>
                      <option value="Meat">Meat</option>
                      <option value="Vegetable">Vegetable</option>
                      <option value="Soup">Soup</option>
                      <option value="Dessert">Dessert</option>
                      <option value="Salad">Salad</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="plato_receta"></label>
                    <textarea type="text" class="form-control" name="plato_receta" placeholder="Escribe la receta" /></textarea>
                </div>

                <div>
                  <button type="submit" value="submit" class="btn btn-default btn-primary pull-right" >Guardar cambios</button>
                  <p> Si tienes alguna duda, contáctanos en killoooonnnn@hotmail.com</p>
                </div>
              </div>

          </form>

        </div><!-- row -->
    </div><!-- page-wrapper -->
  </div><!-- wrapper -->

<!-- jQuery -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>

</html>