<!DOCTYPE html>
<!-- saved from url=(0043)http://startbootstrap.com/templates/agency/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profesionalista: Encuentra el profesional que necesitas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="css/main_ikeet.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
	include('database.php');
?>

<div class="container">

	<div id="plato">
	</div>
	<div id="botones">
	</div>
</div>

<script src="js/jquery-1.11.0.js"></script>

<script type="text/javascript">

  	var recetas = '<?php

	      // Get data from the database depending on the value of the id 
	      $strSQL = "SELECT * FROM `comidas`";
	      $rs = mysql_query($strSQL);
	      
	      $json_response = array();

	      while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
	          $row_array['id'] = $row['id']; 
	          $row_array['comida'] = $row['comida'];
	          $row_array['foto'] = $row['foto']; 

	    //push the values in the array
	    array_push($json_response,$row_array);
	      }
	      echo json_encode($json_response);

	      // Close the database connection
	      mysql_close();
	      ?>';


	var obj = $.parseJSON(recetas);

	var random = Math.floor(Math.random()*obj.length)

	var plato_dia = obj[random].comida;
	var plato_foto = obj[random].foto;

	var carousel = document.getElementById("plato");
	var lista_comidas = document.getElementById("lista_comidas");

	var menu = '<div><img src="images/' + plato_foto + '" style="width:100%;"></div><h3>' + plato_dia + '</h3>';
	carousel.innerHTML += menu;

	var botas = '<div class="row" style="height:100px"><a class="btn btn-primary btn-danger pull-right" style="height:100%; width:50%" href="http://ikeet.hol.es/otro_plato.php?id=' + obj[random].id + '"><span class="glyphicon glyphicon-remove"></span></a><a class="btn btn-primary btn-success pull-right" style="height:100%; width:50%" href="http://ikeet.hol.es/receta.php"><span class="glyphicon glyphicon-ok"></span></a></div><div class="row"><a class="btn btn-primary" style="width:100%" href="http://ikeet.hol.es/recetas.php">Elige un plato</a></div>';
	var divbotones = document.getElementById("botones");
	divbotones.innerHTML += botas;

</script>

</body>
