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

    <link href="css/main.css" rel="stylesheet">

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

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ik eet</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="nueva_receta.php">Nueva receta<span class="sr-only">(current)</span></a></li>
<!--             <li><a href="../navbar-fixed-top/">Fixed top</a></li>
 -->          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php
	include('database.php');

    $id = $_GET["id"];

  	// Get data from the database depending on the value of the id 
	$strSQL = "SELECT * FROM `recetas` WHERE `id`= $id";
	$rs = mysql_query($strSQL);

	$json_response = array();

	while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
	  $row_array['id'] = $row['id']; 
	  $row_array['nombre'] = $row['nombre'];
	  $row_array['foto'] = $row['foto']; 
	  $row_array['receta'] = $row['receta']; 
	}

?>
<div class="container">

	<div id="plato">
		<div>
			<img src="images/<?php echo $row_array['foto'];?>" style="width:100%;">
		</div>
		<h3><?php echo $row_array['nombre'];?></h3>
		<p><?php echo nl2br($row_array['receta']);?></p>
	</div>
<!-- 	<div id="botones">
	</div> -->
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
<script src="js/bootstrap.min.js"></script>

</body>
