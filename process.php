<?php

	/*function checkDOI($theDOI){
		$theDOI = strtolower($theDOI); //make doi lowercase

		if ((preg_match($theDOI,"doi:"  	
	}*/
	
	$URLOrDOI = $_POST['RadioSelector'];
        $theAddie = $_POST['theAddie'];

	$theAddie = trim($theAddie); //Remove Whitespace
	
	$theProxy = "http://citytech.ezproxy.cuny.edu:2048/login?url=";
		
	if($URLOrDOI == 'doi'){
		if (filter_var($theAddie, FILTER_VALIDATE_URL) == true){
			$theURL = '<p>'.$theAddie.'<strong>is an invalid DOI</strong>.</p><p> Click <a href="xhttp://www.doi.org/demos.html">here</a> for examples of a DOI.</p>';
		}else{
		$theAddie = strtolower($theAddie);
		$theAddie = preg_replace('/doi:/', '',$theAddie,1);
        	$postProxy = $theProxy.$theAddie;
        	$postProxyDOI = $theProxy."http://dx.doi.org/".$theAddie;
		$theURL = '<p>Your proxied DOI is</p> <h2><a href="'.$postProxyDOI.'">'.$postProxyDOI.'</a></h2>';
		}	
	}else if($URLOrDOI == 'url'){
		if (filter_var($theAddie, FILTER_VALIDATE_URL) == true){
			$postProxy = $theProxy.$theAddie;
        		$theURL =  '<p>Your proxied URL is</p> <h2><a href="'.$postProxy.'"">'.$postProxy.'</a></h2>';
                }if (filter_var($theAddie, FILTER_VALIDATE_URL) == false){
			$postProxy = $theProxy.'http://'.$theAddie;
			$theURL =  '<p>Your proxied URL is</p> <h1><a href="'.$postProxy.'"">'.$postProxy.'</a></h1>';
			$theUrl = $theUrl . '<p><a href="" class="btn">Create short link</a></p>';
	}
}

echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proxy Linker</title>
  <link href="signin.css" rel="stylesheet">
    <!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript" src="magic.js"></script>
	

	</script>
	<style>
	label.error { width: 250px; display: inline; color: red;}
	</style>
</head>
<body>

<div class="container">
  <h1>Proxied Link</h1>';

		echo '<p>'.$theURL.'</p>';
echo '</div>

</div> <!-- container -->


    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>';

?>
