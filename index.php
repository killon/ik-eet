<!DOCTYPE html>
<!-- saved from url=(0042)http://getbootstrap.com/examples/carousel/ -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">



    <title>Ikeet: wat eet ik vandaag</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

  </head>
<!-- NAVBAR
================================================== -->
  <body cz-shortcut-listen="true">
  	<?php
	include('database.php');
?>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
<!--       <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol> -->

      <div class="carousel-inner"> 
<!--       	content added via js  -->	  
	  </div>       
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span
class="glyphicon glyphicon-chevron-left"></span></a> 

<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span
class="glyphicon glyphicon-chevron-right"></span></a> </div><!-- /.carousel -->





      <!-- FOOTER -->
      <footer>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {

        var recetas = '<?php

            // Get data from the database depending on the value of the id 
            $strSQL = "SELECT * FROM `recetas`";
            $rs = mysql_query($strSQL);
            
            $json_response = array();

            while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
                $row_array['id'] = $row['id']; 
                $row_array['nombre'] = $row['nombre'];
                $row_array['foto'] = $row['foto']; 

          //push the values in the array
          array_push($json_response,$row_array);
            }
            echo json_encode($json_response);

            // Close the database connection
            mysql_close();
            ?>';


      var obj = $.parseJSON(recetas);

      // random = Math.floor(Math.random()*obj.length);
      // var plato_dia = obj[random].nombre;
      // var plato_foto = obj[random].foto;

      var carousel = document.getElementsByClassName("carousel-inner");

      for (var i=0; i < obj.length; i++) {
        var menu = '<div class="item"><img class="img-responsive" src="images/' + obj[i].foto + '" alt=""><div class="container"><div class="carousel-caption"><h1>' + obj[i].nombre + '</h1><p><a class="btn btn-lg btn-primary" href="#" role="button">Ver receta</a></p></div></div></div>';
        carousel[0].innerHTML += menu;
      }
      $(".carousel-inner .item:first-child").addClass("active");
      // $('#quitar_receta').click(function() {
      //  $( "#plato" ).empty();
      //  // $( "#botones" ).empty();
      //  obj.splice(random, 1);
      //  random = Math.floor(Math.random()*obj.length);
      //  var plato_dia2 = obj[random].nombre;
      //  var plato_foto2 = obj[random].foto;
      //  var plato_id = obj[random].id;
      //  var menu2 = '<div><img src="images/' + plato_foto2 + '" style="width:100%;"></div><h3>' + plato_dia2 + '</h3>';
      //  carousel.innerHTML += menu2;
      //  $( "#mostrar_receta" ).attr("href","receta.php?id=" + plato_id + "");
     //    });
    });

  </script>












