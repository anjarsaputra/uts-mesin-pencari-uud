
<!DOCTYPE html>
<html lang="en">

  <head>
      <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    color:white;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
   background-color:red;
}

#customers tr:nth-child(even){background-color: green;}

#customers tr:hover {background-color: red;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: red;
    color: white;
}
</style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIDEO PRESENTASI</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="http://www.searchuud.rf.gd/">MESIN PENCARI UUD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/#about">UPLOAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/#services">DATA UPLOAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/similaritas.php">SIMILARITAS</a>
            </li>
<li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/hitungbobot.php">HITUNG BOBOT</a>
            </li>
	 <li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/hitungvektor.php">HITUNG VEKTOR</a>
            </li>
            <li class="nav-item">
 <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/video.php">VIDEO</a>
            </li>
<li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/tentang.php">TENTANG</a>
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
        </div>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
              	<center>
         <h1>VIDEO PRESENTASI </h1>  

<?php 
function youtube($url){
	$link=str_replace('http://www.youtube.com/watch?v=', '', $url);
	$link=str_replace('https://www.youtube.com/watch?v=', '', $link);
	$data='<object width="800" height="500" data="http://www.youtube.com/v/'.$link.'" type="application/x-shockwave-flash">
	<param name="src" value="http://www.youtube.com/v/'.$link.'" />
	</object>';
	return $data;
}
 
?>

<?php
		echo youtube("https://www.youtube.com/watch?v=6GSNY19ecj8&feature=youtu.be");

?>
</center>
          </div>
         
        </div>
       
          </div>
      </div>
    </header>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>

