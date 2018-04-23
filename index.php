<?php
require_once('IDNstemmer.php');
?>

</body>
</html>

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
   background-color:green;
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

    <title>Mesin Pencari UUD</title>

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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">MESIN PENCARI UUD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">UPLOAD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">DATA</a>
            </li>
            <li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="#portfolio">QUERY TF2</a>
            </li>
 		<li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/similaritas.php">SIMILARITAS</a>
            </li>
<li class="nav-item">
             <a class="nav-link js-scroll-trigger" href="http://searchuud.rf.gd/hitungbobot.php">Hitung Bobot</a>
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
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>PENCARIAN</strong>
            </h1>
            
          </div>
          <div class="col-lg-8 mx-auto">
             <center> 
                       <html>
<title>Query</title>
<body>
<form enctype="multipart/form-data" method="POST" action="hasilquery.php">
Keyword : <br>
<input class="btn btn-light btn-xl sr-button" type="text" size="50" backgroung-color="green" name="katakunci"><br>
<br>
<input class="btn btn-light btn-xl sr-button" size="50" type="submit" value="CARI" >

</form>
</center>

</form>
<?php
if(isset($_POST['kata'])){
	$teksAsli = $_POST['kata'];
	echo '<br>';
	echo "Teks asli : ".$teksAsli.'<br/>';
	$st = new IDNstemmer();
	$hasil=$st->doStemming($teksAsli);
	echo "Kata dasar : ".$hasil.'<br/>';
}
?>
            <p class="text-faded mb-5">Ketikan Kata yang ingin anda cari di kolom </p>
         
          </div>
        </div>
      </div>
    </header>

 <section class="p-0" id="portfolio">
 <div class="container text-center">
 <br>     
  <h2 class="mb-4">QUERY</h2>
  
<br>  
<html>
<body background-color="green">
<form enctype="multipart/form-data" method="POST" action="querytf2.php">
Kata Kunci : <br>
  <input class="btn btn-danger btn-lg" color="green" type="text" name="keyword"><br>
<br>  
<input class="btn btn-success btn-lg" type=submit value=Submit>
</form>  
   
</section>
   <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h1 class="section-heading text-white">UNGGAH FILE PDF</h1>
              <hr class="light my-4">
                
              <html>
<title>Form Upload</title>
<body>
    <center>
<form enctype="multipart/form-data" method="POST" action="hasil_upload.php">
File yang di upload :
<br>
<input class="btn btn-light btn-xl sr-button" type="file" name="fupload"><br>
<br>
Deskripsi File : <br>
<textarea name="deskripsi" rows="8" cols="40"></textarea><br>
<input class="btn btn-light btn-xl sr-button" type=submit value=Upload>
</form>
</center>          
          
            <p class="text-faded mb-4">File yang di upload adalah File undang-undang berformat PDF !</p>
            
          </div>
        </div>
      </div>
    </section>
     <section id="services">
      <div class="container">
         
           <?php
          
	//koneksi database
	$db =new mysqli("sql303.epizy.com","epiz_21963758","akumanis2018","epiz_21963758_dbstbi");
	echo $db->connect_error?'koneksi gagal:'.$db->connect_error:'';
?>
	<center>
<!DOCTYPE html>
	<html>

	<body>
 <center><h1><b> DATA FILE YANG DI UPLOAD</h1></b></center>
	<table id="customers">
	<tr>
	<td>NO</td>
	<td>Nama File</td>
	<td>Deskripsi</td>
	<td>Tanggal</td></td>
	</tr>
	<?php
	$sql='select * from upload';
	$result=$db->query($sql);
	$no=1;
	while($row=$result ->fetch_object()){
	?>
	<tr>
	<td><?php echo $no++;?></td>
	<td><?php echo $row->nama_file;?></td>
	<td><?php echo $row->deskripsi;?></td>
	<td><?php echo $row->tgl_upload;?></td>

	</tr>
	
	<?php }?>
</center>
         <div class="col-lg-8 mx-auto">
            
            </center>
          </div>
      </div>
    </section>



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

