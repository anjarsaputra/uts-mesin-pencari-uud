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

    <title>HASIL PENCARIAN QUERY</title>

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
        <a class="navbar-brand js-scroll-trigger" href="http://searchuud.rf.gd//">MESIN PENCARI UUD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
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
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
             <br> 
             <br>
        
  <br> 
             <br>
     <h1>HASIL PENCARIAN QUERY</h1>
<?php
////
function hitungsim($query) {
	//ambil jumlah total dokumen yang telah diindex (tbindex atau tbvektor), n
$host='sql303.epizy.com';
$user='epiz_21963758';
$pass='akumanis2018';
$database='epiz_21963758_dbstbi';

$conn=mysqli_connect($host,$user,$pass,$database);

//echo "hitung sim";

	$resn = mysqli_query($conn,"SELECT Count(*) as n FROM tbvektor");
	$rown = mysqli_fetch_array($resn);	
	$n = $rown['n'];
	//echo "hasil tbvektor";
	
	
	
	//terapkan preprocessing terhadap $query
	$aquery = explode(" ", $query);
	
	//hitung panjang vektor query
	$panjangQuery = 0;
	$aBobotQuery = array();
	
	for ($i=0; $i<count($aquery); $i++) {
		//hitung bobot untuk term ke-i pada query, log(n/N);
		//hitung jumlah dokumen yang mengandung term tersebut
		$resNTerm = mysqli_query($conn,"SELECT Count(*) as N from tbindex WHERE Term like '%$aquery[$i]%'");
//		echo "query >SELECT Count(*) as N from tbindex WHERE Term like '%$aquery[$i]%'";
		$rowNTerm = mysqli_fetch_array($resNTerm);	
		$NTerm = $rowNTerm['N'] ;
		
		$idf = log($n/$NTerm);
		
		//simpan di array		
		$aBobotQuery[] = $idf;
		
		$panjangQuery = $panjangQuery + $idf * $idf;		
	}
	
	$panjangQuery = sqrt($panjangQuery);
	
	$jumlahmirip = 0;
	
	//ambil setiap term dari DocId, bandingkan dengan Query
	$resDocId = mysqli_query($conn,"SELECT * FROM tbvektor ORDER BY DocId");
	while ($rowDocId = mysqli_fetch_array($resDocId)) {
	
		$dotproduct = 0;
			
		$docId = $rowDocId['DocId'];
		$panjangDocId = $rowDocId['Panjang'];
		
		$resTerm = mysqli_query($conn,"SELECT * FROM tbindex WHERE DocId = '$docId'");
	//	echo "query ->SELECT * FROM tbindex WHERE DocId = '$docId'".'<br>';
		
		
		while ($rowTerm = mysqli_fetch_array($resTerm)) {
			for ($i=0; $i<count($aquery); $i++) {
				//jika term sama
				//echo "1-->".$rowTerm['Term'];
			//	echo "2-->".	$aquery[$i].'<br>';
				
				if ($rowTerm['Term'] == $aquery[$i]) {
					$dotproduct = $dotproduct + $rowTerm['Bobot'] * $aBobotQuery[$i];		
		//			echo "hasil =".$dotproduct.'<br>';
			//		echo "1-->".$rowTerm['Term'];
			//	echo "2-->".	$aquery[$i].'<br>';
					
				} //end if
					else
					{
					}
			} //end for $i		
		} //end while ($rowTerm)
		
		if ($dotproduct != 0) {
			$sim = $dotproduct / ($panjangQuery * $panjangDocId);	
			//echo "insert >>INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', '$docId', $sim)";
			//simpan kemiripan > 0  ke dalam tbcache
			$resInsertCache = mysqli_query($conn,"INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', '$docId', $sim)");
			$jumlahmirip++;
		} 
			
	if ($jumlahmirip == 0) {
		$resInsertCache = mysqli_query($conn,"INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', 0, 0)");
	}	
	} //end while $rowDocId
	
		
} //end hitungSim()





////
$host='sql303.epizy.com';
$user='epiz_21963758';
$pass='akumanis2018';
$database='epiz_21963758_dbstbi';




$keyword=$_POST[keyword];
$conn=mysqli_connect($host,$user,$pass);
mysqli_select_db($conn,$database);
$resCache = mysqli_query($conn,"SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
	$num_rows = mysqli_num_rows($resCache);
	if ($num_rows >0) {

		//tampilkan semua berita yang telah terurut
		while ($rowCache = mysqli_fetch_array($resCache)) {
			$docId = $rowCache['DocId'];
			$sim = $rowCache['Value'];
					
				//ambil berita dari tabel tbberita, tampilkan
				//echo ">>>SELECT nama_file,deskripsi FROM upload WHERE nama_file = '$docId'";
				$resBerita = mysqli_query($conn,"SELECT nama_file,deskripsi FROM upload WHERE nama_file = '$docId'");
				$rowBerita = mysqli_fetch_array($resBerita);
					
				$judul = $rowBerita['nama_file'];
				$berita = $rowBerita['deskripsi'];
					
				print($docId . ". (" . $sim . ") <font color=blue><b><a href=" . $judul . "> </b></font><br />");
				print($berita . "<hr /></a>"); 		
			
		}//end while (rowCache = mysqli_fetch_array($resCache))
	}
		else
		{
		hitungsim($keyword);
		//pasti telah ada dalam tbcache		
		$resCache = mysqli_query($conn,"SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
		$num_rows = mysqli_num_rows($resCache);
		
		while ($rowCache = mysqli_fetch_array($resCache)) {
			$docId = $rowCache['DocId'];
			$sim = $rowCache['Value'];
					
				//ambil berita dari tabel tbberita, tampilkan
				$resBerita = mysqli_query($conn,"SELECT nama_file,deskripsi FROM upload WHERE nama_file = '$docId'");
				$rowBerita = mysqli_fetch_array($resBerita);
					
				$judul = $rowBerita['nama_file'];
				$berita = $rowBerita['deskripsi'];
					
				print($docId . ". (" . $sim . ") <font color=blue><b><a href=" . $judul . "> </b></font><br />");
				print($berita . "<hr /></a>");
		
		} //end while
		}

?>
          </div>
         
        </div>
       
          </div>
    </span>
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



