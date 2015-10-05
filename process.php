<?php

function shortenTheAddie($MakeItShort){

  $username = 'YOURUSERNAME';
  $password = 'YOURPASSWORD';
  $api_url =  'http://cityte.ch/yourls-api.php';

  // Init the CURL session
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $api_url);
  curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
  curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
  curl_setopt($ch, CURLOPT_POSTFIELDS, array(     // Data to POST
        'shorturl' => 'ozh',
        'format'   => 'json',
        'action'   => 'shorturl',
        'username' => $username,
        'password' => $password,
        'url' => $MakeItShort
    ));

  // Fetch and return content
  $data = curl_exec($ch);
  curl_close($ch);

  // Do something with the result. Here, we echo the long URL
  $data = json_decode($data);
  return $data->shorturl; 

}

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
			$theURL = '<p>'.$theAddie.'<strong>is an invalid DOI</strong>.</p><p> Click <a href="http://www.doi.org/demos.html">here</a> for examples of a DOI.</p>';
		
    }else{

		$theAddie = strtolower($theAddie);
		$theAddie = preg_replace('/doi:/', '',$theAddie,1);
        	$postProxy = $theProxy.$theAddie;
        	$postProxyDOI = $theProxy."http://dx.doi.org/".$theAddie;

          $turnedShort = shortenTheAddie($postProxyDOI);


		$theURL = '<p>Your proxied DOI is</p> <h2><a href="'.$postProxyDOI.'">'.$postProxyDOI.'</a></h2><br><p>Short URL:<br><h2> <a href="'.$turnedShort.'">'.$turnedShort.'</a></h2>';

		}	
	}else if($URLOrDOI == 'url'){

		if (filter_var($theAddie, FILTER_VALIDATE_URL) == true){
			$postProxy = $theProxy.$theAddie;
      $turnedShort = shortenTheAddie($postProxy);

      $theURL =  '<p>Your proxied URL '.$theAddie.' is</p> <h2><a href="'.$postProxy.'"">'.$postProxy.'</a></h2><br><p>Short URL:<br><h2> <a href="'.$turnedShort.'">'.$turnedShort.'</a></h2>';
               
    }if (filter_var($theAddie, FILTER_VALIDATE_URL) == false){
			$postProxy = $theProxy.'http://'.$theAddie;

			$theURL =  '<p>The proxied URL you entered ('.$theAddie.') is invalid';
      //</p> <h1><a href="'.$postProxy.'"">'.$postProxy.'</a></h1>';



	
  }
}



echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permalinker</title>
  <link href="signin.css" rel="stylesheet">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script type="text/javascript" src="magic.js"></script>
	

	</script>
	<style>
	label.error { width: 250px; display: inline; color: red;}
	</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="https://library.citytech.cuny.edu/uploads/logo.ico" type="image/vnd.microsoft.icon" />
<link rel="shortlink" href="/node/378" />
<link rel="canonical" href="/about/policies/index.php" />
<meta name="Generator" content="Drupal 7 (http://drupal.org)" />
  <title>Permalinker | Ursula C. Schwerin Library</title>
  <style>
@import url("https://library.citytech.cuny.edu/modules/system/system.base.css?nttgxx");
</style>
<style>
@import url("https://library.citytech.cuny.edu/sites/all/modules/date/date_api/date.css?nttgxx");
@import url("https://library.citytech.cuny.edu/sites/all/modules/date/date_popup/themes/datepicker.1.7.css?nttgxx");
@import url("https://library.citytech.cuny.edu/sites/all/modules/date/date_repeat_field/date_repeat_field.css?nttgxx");
@import url("https://library.citytech.cuny.edu/modules/field/theme/field.css?nttgxx");
@import url("https://library.citytech.cuny.edu/sites/all/modules/calendar/css/calendar_multiday.css?nttgxx");
@import url("https://library.citytech.cuny.edu/sites/all/modules/views/css/views.css?nttgxx");
</style>
<style>
@import url("https://library.citytech.cuny.edu/sites/all/modules/ctools/css/ctools.css?nttgxx");
@import url("https://library.citytech.cuny.edu/sites/all/modules/custom_search/custom_search.css?nttgxx");
</style>
<link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.0.2/cerulean/bootstrap.min.css" media="all" />
<style>
@import url("https://library.citytech.cuny.edu/sites/all/themes/bootstrap/css/overrides.css?nttgxx");
@import url("https://library.citytech.cuny.edu/themes/bootstrap/bootstrap_citytech/css/style.css?nttgxx");
</style>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>window.jQuery || document.write("<script src=/sites/all/modules/jquery_update/replace/jquery/1.9/jquery.js>\x3C/script>")</script>
<script src="https://library.citytech.cuny.edu/misc/jquery.once.js?v=1.2"></script>
<script src="https://library.citytech.cuny.edu/misc/drupal.js?nttgxx"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="https://library.citytech.cuny.edu/sites/all/modules/iframe/iframe.js?nttgxx"></script>
<script src="https://library.citytech.cuny.edu/sites/all/modules/custom_search/js/custom_search.js?nttgxx"></script>
<script src="https://library.citytech.cuny.edu/sites/all/modules/google_analytics/googleanalytics.js?nttgxx"></script>
<script>(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create", "UA-4084741-1", {"cookieDomain":"auto"});ga("require", "linkid", "linkid.js");ga("set", "page", location.pathname + location.search + location.hash);ga("send", "pageview");</script>
<script src="https://library.citytech.cuny.edu/sites/all/modules/piwik/piwik.js?nttgxx"></script>
<script>var _paq = _paq || [];(function(){var u=(("https:" == document.location.protocol) ? "" : "http://library.citytech.cuny.edu/piwik/");_paq.push(["setSiteId", "1"]);_paq.push(["setTrackerUrl", u+"piwik.php"]);_paq.push(["setDocumentTitle", "research\/permalinker"]);_paq.push(["setDoNotTrack", 1]);_paq.push(["trackPageView"]);_paq.push(["setIgnoreClasses", ["no-tracking","colorbox"]]);_paq.push(["enableLinkTracking"]);var d=document,g=d.createElement("script"),s=d.getElementsByTagName("script")[0];g.type="text/javascript";g.defer=true;g.async=true;g.src="https://library.citytech.cuny.edu/uploads/piwik/piwik.js?nttgxx";s.parentNode.insertBefore(g,s);})();</script>
<script>jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"","ajaxPageState":{"theme":"bootstrap_citytech","theme_token":"Uu-wZyejMdMb6zfMENWaT3DZsEZI7LEWrgjrZZrB84A","js":{"sites\/all\/modules\/click_heatmap\/click_heatmap.js":1,"sites\/all\/modules\/click_heatmap\/clickheat\/js\/clickheat.js":1,"0":1,"sites\/all\/themes\/bootstrap\/js\/bootstrap.js":1,"\/\/ajax.googleapis.com\/ajax\/libs\/jquery\/1.9.1\/jquery.js":1,"1":1,"misc\/jquery.once.js":1,"misc\/drupal.js":1,"\/\/netdna.bootstrapcdn.com\/bootstrap\/3.0.2\/js\/bootstrap.min.js":1,"sites\/all\/modules\/iframe\/iframe.js":1,"sites\/all\/modules\/custom_search\/js\/custom_search.js":1,"sites\/all\/modules\/google_analytics\/googleanalytics.js":1,"2":1,"sites\/all\/modules\/piwik\/piwik.js":1,"3":1},"css":{"modules\/system\/system.base.css":1,"sites\/all\/modules\/date\/date_api\/date.css":1,"sites\/all\/modules\/date\/date_popup\/themes\/datepicker.1.7.css":1,"sites\/all\/modules\/date\/date_repeat_field\/date_repeat_field.css":1,"modules\/field\/theme\/field.css":1,"sites\/all\/modules\/calendar\/css\/calendar_multiday.css":1,"sites\/all\/modules\/views\/css\/views.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/custom_search\/custom_search.css":1,"\/\/netdna.bootstrapcdn.com\/bootswatch\/3.0.2\/cerulean\/bootstrap.min.css":1,"sites\/all\/themes\/bootstrap\/css\/overrides.css":1,"themes\/bootstrap\/bootstrap_citytech\/css\/style.css":1}},"custom_search":{"form_target":"_self","solr":1},"googleanalytics":{"trackOutbound":1,"trackMailto":1,"trackDownload":1,"trackDownloadExtensions":"7z|aac|arc|arj|asf|asx|avi|bin|csv|doc(x|m)?|dot(x|m)?|exe|flv|gif|gz|gzip|hqx|jar|jpe?g|js|mp(2|3|4|e?g)|mov(ie)?|msi|msp|pdf|phps|png|ppt(x|m)?|pot(x|m)?|pps(x|m)?|ppam|sld(x|m)?|thmx|qtm?|ra(m|r)?|sea|sit|tar|tgz|torrent|txt|wav|wma|wmv|wpd|xls(x|m|b)?|xlt(x|m)|xlam|xml|z|zip","trackUrlFragments":1},"piwik":{"trackMailto":1},"urlIsAjaxTrusted":{"\/about\/policies\/index.php":true},"bootstrap":{"anchorsFix":1,"anchorsSmoothScrolling":1,"popoverEnabled":1,"popoverOptions":{"animation":1,"html":0,"placement":"auto right","selector":"","trigger":"click hover","title":"","content":"","delay":0,"container":"body"},"tooltipEnabled":1,"tooltipOptions":{"animation":1,"html":0,"placement":"auto right","selector":"","trigger":"hover focus","delay":0,"container":"body"}}});</script>
<style>
.form-horizontal .form-group label{ padding: 25px; margin: 0px;}
</style>

</head>
<body class="html not-front not-logged-in one-sidebar sidebar-second page-node page-node- page-node-378 node-type-page navbar-is-fixed-top" >
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable">Skip to main content</a>
  </div>
    <header id="navbar" role="banner" class="navbar navbar-fixed-top navbar-default navbar-inverse">
  <div class="container">
    <div class="navbar-header">
            <a class="logo navbar-btn pull-left" href="/" title="Home">
        <img src="https://library.citytech.cuny.edu/themes/bootstrap/bootstrap_citytech/logo.png" alt="Home" />
      </a>
      
            <a class="name navbar-brand" href="/" title="Home">Ursula C. Schwerin Library</a>
      
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

          <div class="navbar-collapse collapse">
        <nav role="navigation">
                      <ul class="menu nav navbar-nav"><li class="first expanded dropdown"><a href="/research/index.php" class="dropdown-toggle" data-toggle="dropdown">Find <span class="caret"></span></a><ul class="dropdown-menu"><li class="first leaf"><a href="http://library.citytech.cuny.edu/research/books.php" title="CUNY+ Online catalog">Books+</a></li>
<li class="collapsed"><a href="/research/articles/subjects/index.php">Articles+</a></li>
<li class="leaf"><a href="/research/journals.php">Journals</a></li>
<li class="leaf"><a href="http://citytech.ezproxy.cuny.edu:2048/login?url=http://sfx.cuny.edu:9003/sfx_local/cgi/core/citation-linker.cgi">Citation Linker</a></li>
<li class="leaf"><a href="/research/eBooks/index.php">eBooks</a></li>
<li class="leaf"><a href="http://library.citytech.cuny.edu/research/subjectGuides/wiki/index.php/Main_Page" title="Subject Guides Wiki">Research Guides</a></li>
<li class="leaf"><a href="/research/otherLibraries/index.php">Other Libraries</a></li>
<li class="last leaf"><a href="/research/subjectSpecialists.php">Library Subject Specialists</a></li>
</ul></li>
<li class="expanded dropdown"><a href="/services/index.php" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a><ul class="dropdown-menu"><li class="first leaf"><a href="/services/circulation/index.php">Borrow, Renew, Request</a></li>
<li class="leaf"><a href="/services/technology/index.php">Technology</a></li>
<li class="leaf"><a href="/services/interlibraryLoan/index.php">Interlibrary Loan</a></li>
<li class="leaf"><a href="/services/student/index.php">Student Services</a></li>
<li class="leaf"><a href="/services/faculty/index.php">Faculty Services</a></li>
<li class="leaf"><a href="/services/multimedia/index.php">Multimedia Resources Center</a></li>
<li class="last leaf"><a href="/services/archives/index.php">Archives</a></li>
</ul></li>
<li class="expanded dropdown"><a href="/help/index.php" title="" class="dropdown-toggle" data-toggle="dropdown">Help <span class="caret"></span></a><ul class="dropdown-menu"><li class="first leaf"><a href="/help/ask/index.php" title="Ask a Librarian">Ask a Librarian</a></li>
<li class="collapsed"><a href="/help/classes/index.php">Library Classes</a></li>
<li class="leaf"><a href="/help/lib1201.php">LIB 1201</a></li>
<li class="leaf"><a href="/help/workshops/index.php">Workshops</a></li>
<li class="collapsed"><a href="/help/how/index.php">How Do I...?</a></li>
<li class="leaf"><a href="/help/tutorials/index.php">Tutorials</a></li>
<li class="leaf"><a href="http://library.citytech.cuny.edu/research/subjectGuides/wiki/index.php/Style_Guides_and_Research_Paper_Support" title="Style Guides - APA Style">Citations &amp; Writing</a></li>
<li class="last leaf"><a href="/help/plagiarism.php">Avoiding Plagiarism </a></li>
</ul></li>
<li class="expanded active-trail dropdown"><a href="/about/index.php" title="" class="active-trail dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a><ul class="dropdown-menu"><li class="first leaf"><a href="/about/hours/index.php" title="">Hours</a></li>
<li class="leaf"><a href="/about/directions.php">Directions</a></li>
<li class="leaf"><a href="/about/faculty/index.php" title="">Library Faculty &amp; Staff</a></li>
<li class="leaf"><a href="http://library.citytech.cuny.edu/blog" title="">LibraryBuzz News Blog</a></li>
<li class="leaf"><a href="http://library.citytech.cuny.edu/newsletter/" title="">Library Newsletter</a></li>
<li class="leaf"><a href="/about/mission/index.php">Mission &amp; History</a></li>
<li class="expanded active-trail dropdown-submenu active"><a href="/about/policies/index.php" class="active-trail dropdown-toggle active" data-toggle="dropdown">Policies</a><ul class="dropdown-menu"><li class="first leaf"><a href="/services/archives/index.php" title="Archives Policy">Archives</a></li>
<li class="leaf"><a href="/about/policies/ill.php">Interlibrary Loan</a></li>
<li class="leaf"><a href="/about/policies/access/index.php">Access Policies</a></li>
<li class="leaf"><a href="/about/policies/access/metrocard.php">METRO Card Policy</a></li>
<li class="leaf"><a href="/about/policies/studyrooms.php">Study Room Policy</a></li>
<li class="leaf"><a href="/about/policies/archives/index.php">Archives</a></li>
<li class="leaf"><a href="/about/policies/computer.php">Computer Use Policies</a></li>
<li class="leaf"><a href="/about/policies/eresources.php">Electronic Resources Policy</a></li>
<li class="leaf"><a href="/about/policies/openaccess.php">Open Access Pledge</a></li>
<li class="leaf"><a href="/about/policies/collectionDev.php">Collection Development Policy</a></li>
<li class="leaf"><a href="/about/policies/multimedia/index.php">Multimedia Policies</a></li>
<li class="leaf"><a href="/about/policies/classvisits/index.php">Class Visits to the Library</a></li>
<li class="collapsed"><a href="/about/policies/exhibit.php">Exhibit Policy</a></li>
<li class="last leaf"><a href="/about/policies/gifts.php">Gifts Policy</a></li>
</ul></li>
<li class="last leaf"><a href="/about/openPositions.php">Employment</a></li>
</ul></li>
<li class="leaf"><a href="http://libsearch.cuny.edu/F?func=BOR-INFO" title="">My Library Account</a></li>
<li class="last leaf"><a href="/user">Staff Login</a></li>
</ul>                                      </nav>
      </div>
      </div>
</header>

<div class="main-container container">

  <header role="banner" id="page-header">
    
      </header> <!-- /#page-header -->

  <div class="row">

    
    <section class="col-sm-9">
            <ol class="breadcrumb"><li class="first"><a href="../research/index.php" title="">Find</a></li>
<li class="active last">Permalinker</li>
</ol>      <a id="main-content"></a>
                    <h1 class="page-header">Permalinker</h1>
                                                          <div class="region region-content">
    <section id="block-system-main" class="block block-system clearfix">

      
  <div id="node-378" class="node node-page clearfix" about="/about/policies/index.php" typeof="sioc:Item foaf:Document">

  
      <span property="dc:title" content="Permalinker" class="rdf-meta element-hidden"></span>

<body>

<div class="container">';

		echo '<p>'.$theURL.'</p><br><br>';

		echo '</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h2>Problems?</h2></a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

<p>If you are having problems with the permalinker or the links don\'t work, get in touch!</p>


<form class="form-horizontal" method="post" action="mailProblems.php"> 
<fieldset>

<!-- Form Name -->
<legend>Permalinker Troubleshooting</legend>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Name">Name</label>  
<div class="col-md-4">
<input id="Name" name="name" type="text" placeholder="Name" class="form-control input-md">

</div>
</div>

<!-- hidden input -->
<input type="hidden" name="theURL" value="';

echo $theAddie;
echo '">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="email" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="problem">Problem</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="problem" name="problem"></textarea>
  </div>
</div>

<input type="submit" value="Submit">

</fieldset>
</form>
 </div>
    </div>
  </div>
';


echo '<div>

</div> <!-- container -->


    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<footer class="footer container">
    <div class="region region-footer">
    <section id="block-block-73" class="block block-block clearfix">

      
  <div class="row">
<div class="col-md-4">
<h3><a href="http://library.citytech.cuny.edu/about/faculty/directory.php">Contact</a></h3>
<p>Ursula C. Schwerin Library<br> New York City College of Technology<br> of the City University of New York<br> <a href="http://maps.apple.com/maps?q=300+Jay+Stret,+Brooklyn&amp;hl=en&amp;sll=40.696974,-73.987083&amp;sspn=0.047764,0.104713&amp;z=16" target="_blank">300 Jay Street, Brooklyn, NY 11201</a>
<br> Circulation: <a href="tel:7182605470">718.260.5470</a><br> Reference: <a href="tel:7182605485">718.260.5485</a>
<p><a href="http://library.citytech.cuny.edu/sitemap">Site Map</a><br>
<a href="http://library.citytech.cuny.edu/comments.php">Comments</a><br>
<a href="http://library.citytech.cuny.edu/privacy.php">Privacy Policy</a><br></p>
</div>


<div class="col-md-4">

<h3><a href="https://library.citytech.cuny.edu/help/ask/index.php">Ask A Librarian</a></h3>
 
<p><span class="glyphicon glyphicon-phone-alt"></span> <a href="tel:7182605485">Call Us</h3></a></p>

<p><span class="glyphicon glyphicon-envelope"></span><a href="http://library.citytech.cuny.edu/help/ask/webForm.php"> Email Us</p></a>



<p><span class="glyphicon glyphicon-calendar"></span><a href="http://library.citytech.cuny.edu/help/ask/appointments.php"> Schedule a Research Appointment</p></a>

</div>

<div class="col-md-4">
<h3><a href="http://www.citytech.cuny.edu/" target="_blank">City Tech</a></h3>
<p>
<a href="http://www.citytech.cuny.edu/myinfo/"> CUNY MyInfo</a><br>
<a href="http://www.citytech.cuny.edu/cunyfirst/">CUNYFirst</a><br>
<a href="https://cunyportal.cuny.edu/cpr/authenticate/portal_login.jsp">Blackboard</a><br>
<a href="http://outlook.com/mail.citytech.cuny.edu" target="_blank">Campus Email</a></p>
</div>
</div>
</section> <!-- /.block -->
<section id="block-block-132" class="block block-block clearfix">

      
  <br>
<h3>Follow Us:</h3>
</section> <!-- /.block -->
<section id="block-on-the-web-0" class="block block-on-the-web clearfix">

      
  <span class="on-the-web otw-flickr"><a href="http://www.flickr.com/photos/24553081@N03/" title="Find Ursula C. Schwerin Library on Flickr" rel="nofollow" target="_blank"><img typeof="foaf:Image" src="https://library.citytech.cuny.edu/sites/all/modules/on_the_web/images/sm/flickr.png" alt="Find Ursula C. Schwerin Library on Flickr" title="Find Ursula C. Schwerin Library on Flickr" /></a></span><span class="on-the-web otw-youtube"><a href="http://www.youtube.com/citytechlibrary" title="Find Ursula C. Schwerin Library on YouTube" rel="nofollow" target="_blank"><img typeof="foaf:Image" src="https://library.citytech.cuny.edu/sites/all/modules/on_the_web/images/sm/youtube.png" alt="Find Ursula C. Schwerin Library on YouTube" title="Find Ursula C. Schwerin Library on YouTube" /></a></span><span class="on-the-web otw-pinterest"><a href="http://pinterest.com/citytechlibrary/" title="Find Ursula C. Schwerin Library on Pinterest" rel="nofollow" target="_blank"><img typeof="foaf:Image" src="https://library.citytech.cuny.edu/sites/all/modules/on_the_web/images/sm/pinterest.png" alt="Find Ursula C. Schwerin Library on Pinterest" title="Find Ursula C. Schwerin Library on Pinterest" /></a></span><span class="on-the-web otw-facebook"><a href="http://www.facebook.com/pages/City-Tech-Library/124918657563065" title="Find Ursula C. Schwerin Library on Facebook" rel="nofollow" target="_blank"><img typeof="foaf:Image" src="https://library.citytech.cuny.edu/sites/all/modules/on_the_web/images/sm/facebook.png" alt="Find Ursula C. Schwerin Library on Facebook" title="Find Ursula C. Schwerin Library on Facebook" /></a></span><span class="on-the-web otw-twitter"><a href="http://www.twitter.com/citytechlibrary" title="Find Ursula C. Schwerin Library on Twitter" rel="nofollow" target="_blank"><img typeof="foaf:Image" src="https://library.citytech.cuny.edu/sites/all/modules/on_the_web/images/sm/twitter.png" alt="Find Ursula C. Schwerin Library on Twitter" title="Find Ursula C. Schwerin Library on Twitter" /></a></span>
</section> <!-- /.block -->
  </div>
</footer>
  <script src="https://library.citytech.cuny.edu/sites/all/modules/click_heatmap/click_heatmap.js?nttgxx"></script>
<script src="https://library.citytech.cuny.edu/sites/all/modules/click_heatmap/clickheat/js/clickheat.js?nttgxx"></script>
<script>var clickHeatSite = \'default\';
var clickHeatGroup = \'about/policies/index.phpi\';
var clickHeatServer = \'https://library.citytech.cuny.edu/sites/all/modules/click_heatmap/clickheat/click.phpo\';
initClickHeat();</script>
<script src="https://library.citytech.cuny.edu/sites/all/themes/bootstrap/js/bootstrap.js?nttgxx"></script>
  </body>
</html>



  </body>
</html>';

?>
